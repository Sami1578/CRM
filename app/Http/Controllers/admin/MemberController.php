<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use function decrypt;
use function encrypt;
use function response;
use function view;
use Illuminate\Support\Facades\Hash;


class MemberController extends Controller
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

            $members = DB::table('members');
            $total = $members->count();

            $totalFilter = DB::table('members');
            if(!empty($searchValue)){
                $totalFilter = $totalFilter->where('name', 'LIKE', '%'.$searchValue.'%')
                    ->orWhere('email', 'LIKE', '%'.$searchValue.'%');
            }
            $totalFilter = $totalFilter->count();

            $arrData = DB::table('members');
//            dd($arrData);
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
                $itemnesteddata['target'] = $arrItem->target.'$';
                $itemnesteddata['commission'] = $arrItem->commission.'%';
                $itemnesteddata['min_sales'] = $arrItem->min_sales_required_for_bonus.'$';
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

        $teams = Team::all();
        return view('admin.members.index', ['teams' => $teams]);
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
//        dd($request->all());
        try {
            if($request->id){
                $validator = Validator::make($request->all(), [
                    'team' => 'required',
                    'name' => 'required|max:50',
                    'email' => 'email|exists:members',
                    'target' => 'required|numeric',
                    'commission' => 'required|numeric|max:100',
                    'min_sales' => 'required|numeric',
                    'bonus' => 'required|numeric|max:100',
                ]);
            }else{
                $validator = Validator::make($request->all(), [
                    'team' => 'required',
                    'name' => 'required|max:50',
                    'email' => 'email|unique:members',
                    'target' => 'required|numeric',
                    'commission' => 'required|numeric|max:100',
                    'min_sales' => 'required|numeric',
                    'bonus' => 'required|numeric|max:100',
                ]);
            }


            if ($validator->fails()) {
                return response()->json([
                    'code' => 100,
                    'error'=>$validator->messages(),
                ]);
            }
            // dd($request->all());
            $user = User::updateOrCreate(
                ['id' => $request->user_id],
                [
                'email' => $request->email,
                'name' => $request->name,
                'password' => Hash::make('12345678'),
                'email_verified_at' =>  DB::raw('NOW()')
                ]);

            $user->assignRole('member');

            Member::updateOrCreate(
                ['id' => $request->id],
                [
                    'team_id' => $request['team'],
                    'user_id' => $user->id,
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'target' => $request['target'],
                    'commission' => $request['commission'],
                    'min_sales_required_for_bonus' => $request['min_sales'],
                    'bonus_on_acheiving_target' => $request['bonus']
                ]);

            return response()->json(['code' => 200,'message'=>'Member created successfully.']);
        }catch (\Exception $e){

            return response()->json(['code' => 100,'message'=> $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
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
            $team = Member::find($id);
            return response()->json(['code' => 200, 'data' => $team ]);
        }catch (\Exception $e){
            return response()->json(['code' => 100, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        dd($id);
        try{
            $member = decrypt(decrypt(decrypt($id)));
            Member::destroy($member);
            return response()->json(['code' => 200, 'message' => 'Member Deleted Successfully!']);
        }catch (\Exception $e){
            return response()->json(['code' => 100,'message'=> $e->getMessage()]);
        }
    }
}
