<?php

namespace App\Http\Controllers;
use App\Models\City;
use App\Models\Country;
use App\Models\Lead;
use App\Models\Member;
use App\Models\State;
use App\Models\Team;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'reset.password']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $previousMonthStart = Carbon::now()->subMonth(1)->startOfMonth()->toDateString();
        $previousMonthEnd = Carbon::now()->subMonth(1)->endOfMonth()->toDateString();
        $user = auth()->user();
        if(auth()->user()->hasRole('admin')){

            //total teams count
            $totalTeamsCount = Team::count();
            $lastMonthTeamsCount  = Team::whereBetween('created_at', [ $previousMonthStart, $previousMonthEnd])->count();
            if($totalTeamsCount == 0){
                $lastMonthTeamsPer = 0;
            }else{
                // Last Month Users Percentage Variable
                $lastMonthTeamsPer = round((  $lastMonthTeamsCount  / $totalTeamsCount )*100, 2);
            }

            //total members count
            $totalMembersCount = Member::count();
            $lastMonthMembersCount  = Member::whereBetween('created_at', [ $previousMonthStart, $previousMonthEnd])->count();
            if($totalMembersCount == 0){
                $lastMonthMembersPer = 0;
            }else{
                // Last Month Users Percentage Variable
                $lastMonthMembersPer = round((  $lastMonthMembersCount  / $totalMembersCount )*100, 2);
            }

            //total leads count
            $totalLeadsCount = Lead::count();
            $lastMonthLeadsCount  = Lead::whereBetween('created_at', [ $previousMonthStart, $previousMonthEnd])->count();
            if($totalLeadsCount == 0){
                $lastMonthLeadsPer = 0;
            }else{
                // Last Month Users Percentage Variable
                $lastMonthLeadsPer = round((  $lastMonthLeadsCount  / $totalLeadsCount )*100, 2);
            }

            //total sales count
            $totalSales = Lead::where('confirmed_at', '!=', null);
            $totalSalesCount = $totalSales->sum('revenue');
            $lastMonthSalesCount  = $totalSales->whereBetween('confirmed_at', [ $previousMonthStart, $previousMonthEnd])->sum('revenue');
            if($totalSalesCount == 0){
                $lastMonthSalesPer = 0;
            }else{
                // Last Month Users Percentage Variable
                $lastMonthSalesPer = round((  $lastMonthSalesCount  / $totalSalesCount )*100, 2);
            }
        }else{

            if(isset($user->member->team) && ($user->member->team->count() != null)){
                //total Team Target
                $totalTeamTarget = $user->member->team->target;
            }

            if(isset($user->member->target) && ($user->member->target != null)){

                //total Individual Target
                $totalIndividualTarget = $user->member->target;
            }
            
            //total individual leads count
            $totalLeads = $user->member->leads;
            $totalLeadsCount = $totalLeads->count();
            $lastMonthLeadsCount  = $totalLeads->whereBetween('created_at', [ $previousMonthStart, $previousMonthEnd])->count();
            if($totalLeadsCount == 0){
                $lastMonthLeadsPer = 0;
            }else{
                // Last Month Users Percentage Variable
                $lastMonthLeadsPer = round((  $lastMonthLeadsCount  / $totalLeadsCount )*100, 2);
            }


            //total individual sales count
            $totalIndividualSales = $user->member->leads->where('confirmed_at', '!=', null);
            $totalIndividualSalesCount = 0;
            $totalIndividualSalesCount = $totalIndividualSales->sum('revenue');
            $lastMonthIndividualSalesCount  = $totalIndividualSales->whereBetween('confirmed_at', [ $previousMonthStart, $previousMonthEnd])->sum('revenue');
            if($totalIndividualSalesCount == 0){
                $lastMonthIndividualSalesPer = 0;
            }else{
                // Last Month Users Percentage Variable
                $lastMonthIndividualSalesPer = round((  $lastMonthIndividualSalesCount  / $totalIndividualSalesCount )*100, 2);
            }

            //total team sales
            $team = $user->member->team;
            $teamMembers = $team->members;
            $totalTeamSalesCount = 0;
            foreach ($teamMembers as $member){
                $totalTeamSalesCount += $member->leads->where('confirmed_at', '!=', null)->sum('revenue');
            }

            // remaining team target and individual target
            $remainingTeamTarget = $totalTeamTarget;
            $remainingIndividualTarget = $totalIndividualTarget;
            if($totalIndividualSalesCount > 0){
                $remainingTeamTarget =  $totalTeamTarget - $totalTeamSalesCount;
                if($remainingTeamTarget < 0){
                    $remainingTeamTarget = "Achieved - ".$totalTeamTarget."$";
                }
                $remainingIndividualTarget = $totalIndividualTarget - $totalIndividualSalesCount;
                if($remainingIndividualTarget < 0){
                    $remainingIndividualTarget = "Achieved - ".$totalIndividualTarget."$";
                }
            }



        }
        return view('dashboard', get_defined_vars());
    }

    public function getCountries(Request $request){
        if($request->ajax()) {
            try {
                $countries = Country::all();
                $data = '';
                if($countries->count() != 0){
                    $data .= '<option value="">Please Choose a Country</option>';
                    foreach($countries as $country){
                        $data .= '<option value="'.$country->id.'">'.$country->name.'</option>';
                    }
                }else{
                    $data .= '<option value="">No Countries Available</option>';
                }
                return response()->json(['code' => 200, 'data' => $data]);

            } catch (\Exception $e) {
                return response()->json(['code' => 100, 'error' => $e->getMessage()]);
            }
        }
    }

    public function getStates(Request $request, $country){
        if($request->ajax()) {
            try {
                $states = State::where('country_code', $country)->get();
                $data = '';
                if($states->count() != 0){
                    $data .= '<option value="">Please Choose a State</option>';
                    foreach($states as $state){
                        $data .= '<option value="'.$state->id.'">'.$state->name.'</option>';
                    }
                }else{
                    $data .= '<option value="">No States Available</option>';
                }
                return response()->json(['code' => 200, 'data' => $data]);

            } catch (\Exception $e) {
                return response()->json(['code' => 100, 'error' => $e->getMessage()]);
            }
        }
    }

    public function getCities(Request $request, $state){
        if($request->ajax()) {
            try {
                $cities = City::where('state_id', $state)->get();
                $data = '';
                if($cities->count() != 0){
                    $data .= '<option value="">Please Choose a City</option>';
                    foreach($cities as $city){
                        $data .= '<option value="'.$city->id.'">'.$city->name.'</option>';
                    }
                }else{
                    $data .= '<option value="">No Cities Available</option>';
                }
                return response()->json(['code' => 200, 'data' => $data]);

            } catch (\Exception $e) {
                return response()->json(['code' => 100, 'error' => $e->getMessage()]);
            }
        }
    }
}
