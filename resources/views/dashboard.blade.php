@extends('layouts.master')
@section('content')
    <!--  .row 1-->
    <div class="content py-5">
        @role('admin')
        <section class="content">
            <div class="container-fluid">
                <h1>Teams</h1>
                <div class="row">
                    <div class="col-md-4 col-6">
                        <!-- small card -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $totalTeamsCount }}</h3>
                                <p>Total Teams Count</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user"></i>
                            </div>
                            <a href="{{ route('teams.index') }}" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $lastMonthTeamsCount }}</h3>
                                <p>Last Month</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user"></i>
                            </div>
                            <a href="{{ route('teams.index') }}" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $lastMonthTeamsPer.'%' }}</h3>
                                <p>Net Change</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-exchange-alt"></i>
                            </div>
                            <a href="{{ route('teams.index') }}" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row (main row) -->

                <h1>Members</h1>
                <div class="row">
                    <div class="col-md-4 col-6">
                        <!-- small card -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $totalMembersCount }}</h3>
                                <p>Total Members Count</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <a href="{{ route('members.index') }}" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $lastMonthMembersCount }}</h3>
                                <p>Last Month</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <a href="{{ route('members.index') }}" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $lastMonthMembersPer.'%' }}</h3>
                                <p>Net Change</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-exchange-alt"></i>
                            </div>
                            <a href="{{ route('members.index') }}" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <h1>Leads</h1>
                <div class="row">
                    <div class="col-md-4 col-6">
                        <!-- small card -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $totalLeadsCount }}</h3>
                                <p>Total Leads Count</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-shoe-prints"></i>
                            </div>
                            <a href="{{ route('leads.index') }}" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $lastMonthLeadsCount }}</h3>
                                <p>Last Month</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-shoe-prints"></i>
                            </div>
                            <a href="{{ route('leads.index') }}" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $lastMonthLeadsPer.'%' }}</h3>
                                <p>Net Change</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-exchange-alt"></i>
                            </div>
                            <a href="{{ route('leads.index') }}" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- small card -->
                </div>

                <h1>Sales</h1>
                <div class="row">
                    <div class="col-md-4 col-6">
                        <!-- small card -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $totalSalesCount }} $</h3>
                                <p>Total Sales Count</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <a href="{{ route('myleads.index') }}" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $lastMonthSalesCount }} $</h3>
                                <p>Last Month</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <a href="{{ route('myleads.index') }}" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $lastMonthSalesPer.'%' }}</h3>
                                <p>Net Change</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-exchange-alt"></i>
                            </div>
                            <a href="{{ route('myleads.index') }}" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- small card -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
        @endrole

        @role('member')
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3>REP {{ auth()->user()->id }}</h3>

                                    <p>REP ID</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
{{--                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{ auth()->user()->member->team->name }}</h3>

                                    <p>TEAM NAME</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
{{--                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ $remainingTeamTarget }} </h3>

                                    <p>TEAM TARGET</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
{{--                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{ $remainingIndividualTarget }}</h3>

                                    <p>INDIVIDUAL TARGET</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
{{--                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
                            </div>
                        </div>
                    </div>
{{--                    <div class="row">--}}
{{--                        <!-- ./col -->--}}
{{--                        <div class="col-lg-3 col-6">--}}
{{--                            <!-- small box -->--}}
{{--                            <div class="small-box bg-danger">--}}
{{--                                <div class="inner">--}}
{{--                                    <h3>{{ auth()->user()->member->leads->count() }}</h3>--}}

{{--                                    <p>Total No. of Leads</p>--}}
{{--                                </div>--}}
{{--                                <div class="icon">--}}
{{--                                    <i class="ion ion-bag"></i>--}}
{{--                                </div>--}}
{{--                                --}}{{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <h1>My Leads</h1>
                    <div class="row">
                        <div class="col-md-4 col-6">
                            <!-- small card -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $totalLeadsCount }}</h3>
                                    <p>Total Leads Count</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <a href="{{ route('myleads.index') }}" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ $lastMonthLeadsCount }}</h3>
                                    <p>Last Month</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <a href="{{ route('myleads.index') }}" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{ $lastMonthLeadsPer.'%' }}</h3>
                                    <p>Net Change</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-exchange-alt"></i>
                                </div>
                                <a href="{{ route('myleads.index') }}" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- small card -->
                    </div>

                    <h1>My Sales</h1>
                    <div class="row">
                        <div class="col-md-4 col-6">
                            <!-- small card -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $totalIndividualSalesCount }} $</h3>
                                    <p>Total Sales Count</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <a href="{{ route('myleads.index') }}" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ $lastMonthIndividualSalesCount }} $</h3>
                                    <p>Last Month</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <a href="{{ route('myleads.index') }}" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{ $lastMonthIndividualSalesPer.'%' }}</h3>
                                    <p>Net Change</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-exchange-alt"></i>
                                </div>
                                <a href="{{ route('myleads.index') }}" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- small card -->
                    </div>

                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        @endrole
    </div>
@endsection
