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
                    <a href=""> Roles </a>
                </li>
                <li class="breadcrumb-current-item"> Role Listings </li>
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
                            <span class="panel-title hidden-xs"> Role Lists </span>
                        </div>
                        <div class="panel-body pn">
                            <a href="/add-proof-of-work" class="btn btn-primary btn-alt btn-xs">
                                <span class="glyphicon glyphicon-plus"></span>
                                Add New Proof of work
                            </a>
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
                                            <th class="text-center">User</th>
                                            <th class="text-center">Title</th>
                                            <th class="text-center">Attachment</th>
                                            <th class="text-center">Date</th>
                                        </tr>
                                   </thead>
                                    <tbody>
                                    <?php $i =0;?>
                            @foreach($pow as $role)
                                <tr>
                                    <td class="text-center">{{$i+=1}}</td>
                                    <td class="text-center">{{$role->user->name}}</td>
                                    <td class="text-center">{{$role->title}}</td>
                                    <td class="text-center">
                                        <a href="{{$role->pow}}" download>
                                            <span class="fa fa-download"></span>
                                        </a>
                                    </td>
                                    <td class="text-center">{{$role->created_at}}</td>
                                </tr>
                            @endforeach
                            <tr>
                                {{-- {!! $roles->render() !!} --}}
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