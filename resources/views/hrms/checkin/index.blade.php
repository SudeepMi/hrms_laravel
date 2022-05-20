
@extends('hrms.layouts.base')

@section('content')
    <!-- START CONTENT -->
    <div class="content">

        <header id="topbar" class="alt">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="breadcrumb-icon">
                        <a href="/dashboard">
                            <span class="fa fa-home"></span>
                        </a>
                    </li>
                    <li class="breadcrumb-active">
                        <a href="/dashboard"> Dashboard </a>
                    </li>
                    <li class="breadcrumb-link">
                        <a href="#">Checkins</a>
                    </li>
                    <li class="breadcrumb-current-item">
                        <a href=""> Client Listings</a> </li>
                </ol>
            </div>
        </header>

        

        <!-- -------------- Content -------------- -->
        <section id="content" class="table-layout animated fadeIn">

            <!-- -------------- Column Center -------------- -->
            <div class="chute chute-center">

                <!-- -------------- Products Status Table -------------- -->
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-success">
                            <div class="panel">
                                <div class="panel-heading">
                                    <span class="panel-title hidden-xs">  Checkings </span>
                                </div>
                                <div class="panel-body pn">
                                    @if(Session::has('flash_message'))
                                        <div class="alert alert-success">
                                            {{ Session::get('flash_message') }}
                                        </div>
                                    @endif
                                    {!! Form::open(['class' => 'form-horizontal']) !!}
                                    <div class="table-responsive">
                                        <table class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                            <thead>
                                            <tr class="bg-light">
                                                <th class="text-center">Id</th>
                                                <th class="text-center">Date</th>
                                                <th class="text-center">Checkin Time</th>
                                                <th class="text-center">Checkout Time</th>
                                                <th class="text-center">Status</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($checkin as $client)
                                                <tr>
                                                    <td class="text-center">{{$client->id}}</td>
                                                    <td class="text-center">{{ \Carbon\Carbon::parse($client->created_at)->isoFormat('MMM Do YY'); }}</td>
                                                    <td class="text-center">{{ \Carbon\Carbon::parse($client->created_at)->isoFormat('h:mm:ss a'); }}</td>
                                                    <td class="text-center">{{$client->action=="out" ? \Carbon\Carbon::parse($client->updated_at)->isoFormat('h:mm:ss a') : ''}}</td>
                                                    <td class="text-center">{{ \Carbon\Carbon::createFromTimestamp(strtotime($client->created_at))->diffForHumans()}}</td>
                                                  
                                                </tr>
                                            @endforeach
                                            <tr>
                                                {{-- {!! $checkins->render() !!} --}}
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection