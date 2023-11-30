<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use function decrypt;
use function encrypt;
use function response;
use function view;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $draw = $request->get('draw');
            $start = $request->get("start");
            $rowPerPage = $request->get("length");

            $orderArray = $request->get('order');
            $columnNameArray = $request->get('columns');

            $searchArray = $request->get('search');
            $columnIndex = $orderArray[0]['column'];

            $columnName = $columnNameArray[$columnIndex]['data'];

            $columnSortOrder = $orderArray[0]['dir'];
            $searchValue = $searchArray['value'];

            $categories = DB::table('teams');
            $total = $categories->count();

            $totalFilter = DB::table('teams');
            if(!empty($searchValue)){
                $totalFilter = $totalFilter->where('name', 'LIKE', '%'.$searchValue.'%')
                    ->orWhere('type', 'LIKE', '%'.$searchValue.'%');
            }
            $totalFilter = $totalFilter->count();

            $arrData = DB::table('teams');
            $arrData = $arrData->skip($start)->take($rowPerPage);
            $arrData = $arrData->orderBy($columnName, $columnSortOrder);

            if(!empty($searchValue)){
                $arrData = $arrData->where('name', 'LIKE', '%'.$searchValue.'%')
                    ->orWhere('type', 'LIKE', '%'.$searchValue.'%');
            }
            $arrData = $arrData->get();
            $data = array();
            foreach($arrData as $arrItem){
                // $editData = route('user.edit', $arrItem->id);
                $itemnesteddata['created_at'] = date('j M Y h:i a',strtotime($arrItem->created_at));
                $itemnesteddata['id'] = $arrItem->id;
                $itemnesteddata['name'] = '<a title="Show Members" data-id="'.encrypt(encrypt(encrypt($arrItem->id))).'" href="javascript:void(0)" class="showMembers">'.$arrItem->name.'</a>' ;
                $itemnesteddata['type'] = $arrItem->type;
                $itemnesteddata['target'] = $arrItem->target;
                $itemnesteddata['commission'] = $arrItem->commission.'%';
                $itemnesteddata['min_sales'] = $arrItem->min_sales_required_for_bonus;
                $itemnesteddata['options'] = '<a title="Edit" data-id="'.encrypt(encrypt(encrypt($arrItem->id))).'" href="javascript:void(0)" class="edit"><i class="fa fa-edit"></i></a>&emsp;
                            <a title="Delete" data-id="'.encrypt(encrypt(encrypt($arrItem->id))).'" href="javascript:void(0)" class="ml-3 delete text-danger"><i class="fa fa-trash"></i></a>&emsp;';
                // $itemnesteddata['options'] = "Edit Data";
                $data[] = $itemnesteddata;
            }



            $response = array(
                "draw" => intval($draw),
                "recordsTotal" => $total,
                "recordsFiltered" => $totalFilter,
                "data" => $data,
            );

            return response()->json($response);
        }


        return view('admin.teams.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            if($request->id){
                $validator = Validator::make($request->all(), [
                    'name' => 'required|max:50',
                    'type' => 'required',
                    'target' => 'required|numeric',
                    'commission' => 'required|numeric|max:100',
                    'min_sales' => 'required|numeric',
                ]);
            }else{
                $validator = Validator::make($request->all(), [
                    'name' => 'required|unique:teams|max:50',
                    'type' => 'required',
                    'target' => 'required|numeric',
                    'commission' => 'required|numeric|max:100',
                    'min_sales' => 'required|numeric',
                ]);
            }


            if ($validator->fails()) {
                return response()->json([
                    'code' => 100,
                    'error'=>$validator->messages(),
                ]);
            }

//            if(isset($id)){
//                $id = decrypt(decrypt(decrypt($request->id)));
//            }
            Team::updateOrCreate(['id' => $request->id],
                ['name' => $request['name'],'type' => $request['type'], 'target' => $request['target'], 'commission' => $request['commission'], 'min_sales_required_for_bonus' => $request['min_sales']] );

            return response()->json(['code' => 200,'message'=>'Team created successfully.']);
        }catch (\Exception $e){

            return response()->json(['code' => 100,'message'=> $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
//        dd($id);
        $id = decrypt(decrypt(decrypt($id)));
        if($request->ajax()){
            $draw = $request->get('draw');
            $start = $request->get("start");
            $rowPerPage = $request->get("length");

            $orderArray = $request->get('order');
            $columnNameArray = $request->get('columns');

            $searchArray = $request->get('search');
            $columnIndex = $orderArray[0]['column'];

            $columnName = $columnNameArray[$columnIndex]['data'];

            $columnSortOrder = $orderArray[0]['dir'];
            $searchValue = $searchArray['value'];

            $members = DB::table('members')->where('team_id', $id);
            $total = $members->count();

            $totalFilter = DB::table('members')->where('team_id', $id);
            if(!empty($searchValue)){
                $totalFilter = $totalFilter->where('name', 'LIKE', '%'.$searchValue.'%')
                    ->orWhere('email', 'LIKE', '%'.$searchValue.'%');
            }
            $totalFilter = $totalFilter->count();

            $arrData = DB::table('members')->where('team_id', $id);
            $arrData = $arrData->skip($start)->take($rowPerPage);
            $arrData = $arrData->orderBy($columnName, $columnSortOrder);

            if(!empty($searchValue)){
                $arrData = $arrData->where('name', 'LIKE', '%'.$searchValue.'%')
                    ->orWhere('email', 'LIKE', '%'.$searchValue.'%');
            }
            $arrData = $arrData->get();
            $data = array();
            foreach($arrData as $arrItem){
                // $editData = route('user.edit', $arrItem->id);
                $team = Team::where('id', $arrItem->team_id)->first();
                $itemnesteddata['created_at'] = date('j M Y h:i a',strtotime($arrItem->created_at));
                $itemnesteddata['id'] = $arrItem->id;
                $itemnesteddata['name'] = $arrItem->name;
                $itemnesteddata['email'] = $arrItem->email;
                $itemnesteddata['target'] = $arrItem->target;
                $itemnesteddata['commission'] = $arrItem->commission.'%';
                $itemnesteddata['min_sales'] = $arrItem->min_sales_required_for_bonus;
                $itemnesteddata['bonus'] = $arrItem->bonus_on_acheiving_target.'%';
                $itemnesteddata['team'] = $team->name;
                $itemnesteddata['options'] = '<a title="Edit" data-id="'.encrypt(encrypt(encrypt($arrItem->id))).'" href="javascript:void(0)" class="edit"><i class="fa fa-edit"></i></a>&emsp;
                            <a title="Delete" data-id="'.encrypt(encrypt(encrypt($arrItem->id))).'" href="javascript:void(0)" class="ml-3 delete text-danger"><i class="fa fa-trash"></i></a>&emsp;';
                // $itemnesteddata['options'] = "Edit Data";
                $data[] = $itemnesteddata;
            }



            $response = array(
                "draw" => intval($draw),
                "recordsTotal" => $total,
                "recordsFiltered" => $totalFilter,
                "data" => $data,
            );

            return response()->json($response);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $id = decrypt(decrypt(decrypt($id)));
            $team = Team::find($id);
            return response()->json(['code' => 200, 'data' => $team ]);
        }catch (\Exception $e){
            return response()->json(['code' => 100, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $team = decrypt(decrypt(decrypt($id)));
            Team::destroy($team);
            return response()->json(['code' => 200, 'message' => 'Team Deleted Successfully!']);
        }catch (\Exception $e){
            return response()->json(['code' => 100,'message'=> $e->getMessage()]);
        }
    }
}
