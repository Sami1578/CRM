<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\LeadStatusUpdatedMail;
use App\Mail\LeadUpdatedMail;
use App\Models\Country;
use App\Models\Lead;
use App\Models\LeadStage;
use App\Models\LeadStatus;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        $member = DB::table('members')->where('user_id', $user->id)->first();
//        $countries = Country::select('id', 'name')->get();
//        $states = State::select('id', 'name')->get();
//        $cities = City::select('id', 'name')->get();
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

            $queryMain = DB::table('leads')->leftJoin('members', 'leads.member_id', 'members.id')
                ->leftJoin('lead_stages', 'leads.lead_stage_id', 'lead_stages.id')
                ->leftJoin('lead_statuses', 'leads.lead_status_id', 'lead_statuses.id')
                ->select('leads.*', 'members.id as member_id', 'members.name as member_name', 'lead_stages.name as lead_stage_name', 'lead_statuses.name as lead_status_name');
            if(isset($_GET['status_id']) && ($_GET['status_id'] != '')){
                $queryMain = $queryMain->where('leads.lead_status_id', '=', $_GET['status_id']);
            }
            if(isset($_GET['service_id']) && ($_GET['service_id'] != '')){
                $queryMain = $queryMain->where('leads.service_id', '=', $_GET['service_id']);
            }
//            $queryMain = Lead::all();
//            dd($queryMain->get());

            $leads = $queryMain;
            $total = $leads->count();

            $totalFilter = $queryMain;
            if(!empty($searchValue)){
                $totalFilter = $totalFilter->where(function($q) use ($searchValue){
                    $q->where('first_name', 'LIKE', '%'.$searchValue.'%')
                        ->orWhere('members.name', 'LIKE', '%'.$searchValue.'%')
                        ->orWhere('last_name', 'LIKE', '%'.$searchValue.'%')
                        ->orWhere('business_name', 'LIKE', '%'.$searchValue.'%')
                        ->orWhere('leads.email', 'LIKE', '%'.$searchValue.'%')
                        ->orWhere('phone', 'LIKE', '%'.$searchValue.'%')
                        ->orWhere('street', 'LIKE', '%'.$searchValue.'%')
                        ->orWhere('lead_stages.name', 'LIKE', '%'.$searchValue.'%')
                        ->orWhere('lead_statuses.name', 'LIKE', '%'.$searchValue.'%')
                        ->orWhere('address', 'LIKE', '%'.$searchValue.'%');
                });
            }
            $totalFilter = $totalFilter->count();
            $arrData = $queryMain;
            $arrData = $arrData->skip($start)->take($rowPerPage);
            $arrData = $arrData->orderBy($columnName, $columnSortOrder);
//            dd($arrData->get());
            if(!empty($searchValue)){
                $arrData = $arrData->where(function($q) use ($searchValue){
                    $q->where('first_name', 'LIKE', '%'.$searchValue.'%')
                        ->orWhere('members.name', 'LIKE', '%'.$searchValue.'%')
                        ->orWhere('last_name', 'LIKE', '%'.$searchValue.'%')
                        ->orWhere('business_name', 'LIKE', '%'.$searchValue.'%')
                        ->orWhere('leads.email', 'LIKE', '%'.$searchValue.'%')
                        ->orWhere('phone', 'LIKE', '%'.$searchValue.'%')
                        ->orWhere('street', 'LIKE', '%'.$searchValue.'%')
                        ->orWhere('lead_stages.name', 'LIKE', '%'.$searchValue.'%')
                        ->orWhere('lead_statuses.name', 'LIKE', '%'.$searchValue.'%')
                        ->orWhere('address', 'LIKE', '%'.$searchValue.'%');
                });

            }
            $arrData = $arrData->get();
//            dd($arrData);
            $data = array();
            foreach($arrData as $arrItem){
                // $editData = route('user.edit', $arrItem->id);
                $country = DB::table('countries')->where('id', $arrItem->country_id)->select('name', 'phonecode')->first();
                $state = DB::table('states')->where('id', $arrItem->state_id)->select('name')->first();
                $city = DB::table('cities')->where('id', $arrItem->city_id)->select('name')->first();
                $leadstage = DB::table('lead_stages')->where('id', $arrItem->lead_stage_id)->first();
                $leadStatus = DB::table('lead_statuses')->where('id', $arrItem->lead_status_id)->first();
                $style = '';
                if($arrItem->lead_status_id == 1){
                    $style = 'font-size: 12px;color: white;background: green;padding: 0 4px;border-radius: 10px;';
                }elseif($arrItem->lead_status_id == 2){
                    $style = 'font-size: 12px;color: white;background: red;padding: 0 4px;border-radius: 10px;';
                }elseif($arrItem->lead_status_id == 3){
                    $style = 'font-size: 12px;color: white;background: blue;padding: 0 4px;border-radius: 10px;';
                }
                $leadstatus_name = '<p style="'.$style.'">'.$leadStatus->name.'</p>';
                $member = DB::table('members')->where('id', $arrItem->member_id)->first();
                $itemnesteddata['created_at'] = date('j M Y h:i a',strtotime($arrItem->created_at));
                $itemnesteddata['rep_id'] = 'REP '.$member->id;
                $itemnesteddata['rep_name'] = $member->name;
                $itemnesteddata['id'] = $arrItem->id;
                $itemnesteddata['name'] =   $arrItem->first_name.' '.$arrItem->last_name;
                $itemnesteddata['bussiness'] = $arrItem->business_name;
                $itemnesteddata['phone'] = '+'.$country->phonecode.'-'.$arrItem->phone;
                $itemnesteddata['email'] = $arrItem->email;
                $itemnesteddata['country'] = $country->name;
                $itemnesteddata['state'] = $state->name;
                $itemnesteddata['city'] = $city->name;
                $itemnesteddata['zipcode'] = $arrItem->zipcode;
                $itemnesteddata['street'] = $arrItem->street;
                $itemnesteddata['address'] = $arrItem->address;
                $itemnesteddata['revenue'] = $arrItem->revenue;
                $itemnesteddata['lead_stage'] = $leadstage->name;
                $itemnesteddata['status'] = $leadstatus_name;
                $itemnesteddata['call_back_time'] = date('j M Y h:i a',strtotime($arrItem->call_back_time));
                $itemnesteddata['options'] = '<a title="Edit" data-id="'.encrypt(encrypt(encrypt($arrItem->id))).'" href="javascript:void(0)" class="edit"><i class="fa fa-edit"></i></a>&emsp;
                            <a title="Delete" data-id="'.encrypt(encrypt(encrypt($arrItem->id))).'" href="javascript:void(0)" class="ml-3 delete text-danger"><i class="fa fa-trash"></i></a>&emsp;<a title="Change Status" data-id="'.encrypt(encrypt(encrypt($arrItem->id))).'" href="javascript:void(0)" class="ml-3 changeStatus text-success">
                                <i class="fa fa-cogs"></i></a>&emsp;<a title="Messages" data-id="'.encrypt(encrypt(encrypt($arrItem->id))).'" href="javascript:void(0)" class="ml-3 message text-primary">
                                <i class="fa fa-envelope"></i></a>&emsp;';
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

        $services = Service::select('id', 'name')->get();
        $leadstages = LeadStage::all();
        $leadstatuses = LeadStatus::all();
        return view('admin.leads.index', compact('services', 'leadstages', 'leadstatuses'));
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
            $validator = Validator::make($request->all(), [
                'first_name' => 'required|max:50',
                'last_name' => 'max:50',
                'business_name' => 'required|max:100',
                'revenue' => 'required|numeric|max:9999999',
                'call_back_time' => 'required',
                'service' => 'required',
                'message' => 'max:1000',
                'country' => 'required',
                'state' => 'required',
                'city' => 'required',
                'zipcode' => 'max:20',
                'street' => 'max:50',
                'address' => 'required|max:500',
                'phone' => 'required|max:500',
                'email' => 'required|email|max:100',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'code' => 100,
                    'error'=>$validator->messages(),
                ]);
            }

//            if(isset($id)){
//                $id = decrypt(decrypt(decrypt($request->id)));
//            }
//            $user = auth()->user();
//            $member = DB::table('members')->where('user_id', $user->id)->first();
            $country = Country::select('id')->where('iso2', $request['country'])->first();
            $lead = Lead::updateOrCreate(['id' => $request->id],
                [
                    'first_name' => $request['first_name'],
                    'last_name' => $request['last_name'],
                    'business_name' => $request['business_name'],
                    'phone' => $request['phone'],
                    'email' => $request['email'],
                    'country_id' => $country->id,
                    'state_id' => $request['state'],
                    'city_id' => $request['city'],
                    'service_id' => $request['service'],
                    'member_id' => $request['member_id'],
                    'zipcode' => $request['zipcode'],
                    'street' => $request['street'],
                    'address' => $request['address'],
                    'message' => $request['message'],
                    'revenue' => $request['revenue'],
                    'status' => 'pending',
                    'call_back_time' => $request['call_back_time'],
                ]);
            $admin = \App\Models\User::whereHas("roles", function($q) {
                $q->where("name", "admin");
            })->first();
            \Mail::to($admin->email)->send(new LeadUpdatedMail($lead));

            return response()->json(['code' => 200,'message'=>'Lead created successfully.']);
        }catch (\Exception $e){

            return response()->json(['code' => 100,'message'=> $e->getMessage()]);
        }    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
            $lead = Lead::where('id', $id);
            $country = Country::where('id', $lead->country_id)->first();
            return response()->json(['code' => 200, 'data' => $lead, 'country' => $country ]);
        }catch (\Exception $e){
            return response()->json(['code' => 100, 'message' => $e->getMessage()]);
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
            $lead = Lead::where('id', $id)->first();
//            dd($lead);
            return response()->json(['code' => 200, 'data' => $lead]);
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
            $lead = Lead::where('id', $id)->first();
            $lead->lead_status_id = $request->status;
            $lead->lead_stage_id = $request->lead_stage;
            $lead->call_back_time = $request->call_back_time;
            if(($lead->lead_status_id == 1) && ($lead->confirmed_at == null)){
                $lead->confirmed_at = now();
            }
            $lead->save();

            $admin = \App\Models\User::whereHas("roles", function($q) {
                $q->where("name", "admin");
            })->first();

            \Mail::to($admin->email)->send(new LeadStatusUpdatedMail($lead));


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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
            $lead = decrypt(decrypt(decrypt($id)));
            Lead::destroy($lead);
            return response()->json(['code' => 200, 'message' => 'Lead Deleted Successfully!']);
        }catch (\Exception $e){
            return response()->json(['code' => 100,'message'=> $e->getMessage()]);
        }
    }
}
