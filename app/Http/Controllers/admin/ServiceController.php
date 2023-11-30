<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class ServiceController extends Controller
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

            $services = DB::table('services');
            $total = $services->count();

            $totalFilter = DB::table('services');
            if(!empty($searchValue)){
                $totalFilter = $totalFilter->where('name', 'LIKE', '%'.$searchValue.'%');
            }
            $totalFilter = $totalFilter->count();

            $arrData = DB::table('services');
            $arrData = $arrData->skip($start)->take($rowPerPage);
            $arrData = $arrData->orderBy($columnName, $columnSortOrder);

            if(!empty($searchValue)){
                $arrData = $arrData->where('name', 'LIKE', '%'.$searchValue.'%');
            }
            $arrData = $arrData->get();
            $data = array();
            foreach($arrData as $arrItem){
                // $editData = route('user.edit', $arrItem->id);
                $itemnesteddata['created_at'] = date('j M Y h:i a',strtotime($arrItem->created_at));
                $itemnesteddata['id'] = $arrItem->id;
                $itemnesteddata['name'] = $arrItem->name;
                $itemnesteddata['created_by'] = 'Admin';
                $itemnesteddata['status'] = $arrItem->status;
                $itemnesteddata['options'] = '<a title="Edit" data-id="'.encrypt(encrypt(encrypt($arrItem->id))).'" href="javascript:void(0)" class="edit"><i class="fa fa-edit"></i></a>&emsp;
                            <a title="Delete" data-id="'.encrypt(encrypt(encrypt($arrItem->id))).'" href="javascript:void(0)" class="ml-3 delete text-danger"><i class="fa fa-trash"></i></a>&emsp;<a title="Change Status" data-id="'.encrypt(encrypt(encrypt($arrItem->id))).'" href="javascript:void(0)" class="ml-3 changeStatus text-success">
                                <i class="fa fa-cogs"></i>
                            </a>&emsp;';
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

        return view('admin.services.index');
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
//            dd($request->all());
            if($request->id){
                $validator = Validator::make($request->all(), [
                    'name' => 'required|max:50',
                ]);
            }else{
                $validator = Validator::make($request->all(), [
                    'name' => 'required|unique:services|max:50',
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
            Service::updateOrCreate(['id' => $request->id],
                ['name' => $request['name']]);

            return response()->json(['code' => 200,'message'=>'Service created successfully.']);
        }catch (\Exception $e){

            return response()->json(['code' => 100,'message'=> $e->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function changeStatus($id)
    {
        try {
            $id = decrypt(decrypt(decrypt($id)));
            $service = Service::where('id', $id)->first();
            $status = $service->status;
//        dd($id);
            return response()->json(['code' => 200, 'status' => $status]);
        }catch (\Exception $e){
            return response()->json(['code' => 100, 'error' => $e->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request)
    {
        try {
//            dd($request->all());
            $id = decrypt(decrypt(decrypt($request->id)));
//        dd($id);
            $service = Service::where('id', $id)->first();
            $service->status = $request->status;
            $service->save();
            return response()->json([
                'code' => 200,
                'message' => 'Status Updated Successfully'
            ]);
        }catch(\Exception $e){
            return response()->json([
                'code' => 100,
                'message' => $e->getMessage()
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
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
            $team = Service::find($id);
            return response()->json(['code' => 200, 'data' => $team ]);
        }catch (\Exception $e){
            return response()->json(['code' => 100, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
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
            $service = decrypt(decrypt(decrypt($id)));
            Service::destroy($service);
            return response()->json(['code' => 200, 'message' => 'Service Deleted Successfully!']);
        }catch (\Exception $e){
            return response()->json(['code' => 100,'message'=> $e->getMessage()]);
        }
    }
}
