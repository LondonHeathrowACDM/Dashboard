@extends('acdm.layout.app')


@section('styles')


@stop

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            @if($user = Auth::user())
                <div class="content-body">

                    <!-- Revenue, Hit Rate & Deals -->


                    <section class="row">
                        <div class="col-sm-12">

                            <!-- Simple Card-->
                            <div id="simple-card" class="card">
                                <div class="card-header">
                                    <h4 class="card-title">General Airport Operations</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show" style="background-color: #f4f5fa;">
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-xl-3 codfl-6">
                                                <div class="row">
                                                    <div class="col-lg-12 col-6">
                                                        <div class="card pull-up">
                                                            <div class="card-content collapse show bg-gradient-directional-danger ">
                                                                <div class="card-body">
                                                                    <h4 class="card-title white">Arrival Runway
                                                                        {{--<span class="float-right">--}}
                          {{--<span class="white">152</span>--}}
                                                                            {{--<span class="red lighten-4">/200</span>--}}
                        {{--</span>--}}
                                                                    </h4>
                                                                    <div class="chartjs">
                                                                        <canvas id="arrival-doughnut"></canvas>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <style>
                                                td {border: 1px solid #e3ebf3;}
                                            </style>

                                            <div class="col-12 col-md-6">
                                                <div class="card">
                                                </div>
                                                <div class="card">

                                                </div>
                                            </div>

                                            <div class="col-xl-3 col-6">
                                                <div class="row">
                                                    <div class="col-lg-12 col-6">
                                                        <div class="card pull-up">
                                                            <div class="card-content collapse show bg-gradient-directional-success">
                                                                <div class="card-body">
                                                                    <h4 class="card-title white">Departure Runway
                                                                        <span class="float-right">
                          {{--<span class="white">152</span>--}}
                                                                            {{--<span class="red lighten-4">/200</span>--}}
                        {{--</span>--}}
                                                                    </h4>
                                                                    <div class="chartjs">
                                                                        <canvas id="departure-doughnut"></canvas>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <!--/ Revenue, Hit Rate & Deals -->
                                    </div>
                                </div>
                            </div>
                            <!--/ How to-->
                        </div>
                    </section>{{----}}
                    <section class="row">
                        <div class="col-sm-12">

                            <!-- Simple Card-->
                            <div id="simple-card" class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Departure Validation Check</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show" style="background-color: #f4f5fa;">
                                    <div class="card-body">
                                        <div class="row">


                                            <style>
                                                td {border: 1px solid #e3ebf3;}
                                            </style>

                                            <div class="col-12 col">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4 class="card-title"><b>EGLL Departures:</b></h4>
                                                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                                        <div class="heading-elements">
                                                            <p class="text-muted"></p>
                                                        </div>
                                                    </div>
                                                    <style>
                                                        th {
                                                            text-align: center;
                                                            vertical-align: middle;
                                                        }
                                                        td {
                                                            text-align: center;
                                                            vertical-align: middle;
                                                        }
                                                    </style>
                                                    <div class="card-content">
                                                        <div class="table-responsive">
                                                            <table class="table table-de mb-0" >
                                                                <thead>

                                                                <tr>
                                                                    <th>CALLSIGN</th>
                                                                    <th>DEST</th>
                                                                    <th>ROUTE</th>

                                                                    <th>ROUTE VALIDITY</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($departures as $key => $data)
                                                                    <tr class="bg-success bg-lighten-5">
                                                                        <td>{{$data->callsign}}</td>
                                                                        <td>{{$data->destination}}</td>
                                                                        <td>{{$data->route}}</td>
                                                                        @if($callsign != false)
                                                                            @if ($data->correctRoute)
                                                                                <td><i class="la la-check-circle"></i></td>
                                                                            @else
                                                                                <td><i class="la la-times-circle"></i></td>
                                                                            @endif
                                                                        @endif
                                                                    </tr>
                                                                @endforeach
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{--<div class="card">--}}
                                                {{--<div class="card-header">--}}
                                                {{--<h4 class="card-title">Live Arrivals</h4>--}}
                                                {{--<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>--}}
                                                {{--<div class="heading-elements">--}}
                                                {{--<p class="text-muted">Total BTC available: 6542.56585</p>--}}
                                                {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="card-content">--}}
                                                {{--<div class="table-responsive">--}}
                                                {{--<table class="table table-de mb-0">--}}
                                                {{--<thead>--}}
                                                {{--<tr>--}}
                                                {{--<th>Callsign</th>--}}
                                                {{--<th></th>--}}
                                                {{--<th></th>--}}
                                                {{--</tr>--}}
                                                {{--</thead>--}}
                                                {{--<tbody>--}}
                                                {{--<tr class="bg-success bg-lighten-5">--}}
                                                {{--<td>10583.4</td>--}}
                                                {{--<td><i class="cc BTC-alt"></i> 0.45000000</td>--}}
                                                {{--<td>$ 4762.53</td>--}}
                                                {{--</tr>--}}
                                                {{--</tbody>--}}
                                                {{--</table>--}}
                                                {{--</div>--}}
                                                {{--</div>--}}
                                                {{--</div>--}}
                                            </div>


                                        </div>
                                        <!--/ Revenue, Hit Rate & Deals -->
                                    </div>
                                </div>
                            </div>
                            <!--/ How to-->
                        </div>
                    </section>


                </div>
            @endif
        </div>
    </div>
@stop

@section('scripts')
    <script src="{{ asset("acdm_assets/vendors/js/forms/icheck/icheck.min.js")}}" type="text/javascript"></script>

@stop
