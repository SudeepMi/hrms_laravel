
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
                        <a href="#">Notifications</a>
                    </li>
                    <li class="breadcrumb-current-item">
                        <a href=""> All Notifications</a> </li>
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
                                    <span class="panel-title hidden-xs">  Notifications </span>
                                </div>
                                <div class="panel-body pn">
                                    @if(Session::has('success'))
                                        <div class="alert alert-warning">
                                            {{ Session::get('success') }}
                                        </div>
                                    @endif
                                    {!! Form::open(['class' => 'form-horizontal']) !!}
                                    <div class="table-responsive">
                                        <table class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                            <thead>
                                            <tr class="bg-light">
                                                <th class="text-center">Id</th>
                                                <th class="text-center">Date</th>
                                                <th class="text-center">Time</th>
                                                <th class="text-center">Message</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($notifications as $client)
                                                <tr>
                                                    <td class="text-center">{{$client->id}}</td>
                                                    <td class="text-center">{{ \Carbon\Carbon::parse($client->created_at)->isoFormat('MMM Do YY'); }}</td>
                                                    <td class="text-center">{{ \Carbon\Carbon::parse($client->created_at)->isoFormat('h:mm:ss a'); }}</td>
                                                    <td class="text-center">{{$client->data}}</td>
                                                  
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