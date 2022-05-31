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
                    <a href=""> Chatbox </a>
                </li>
                <li class="breadcrumb-current-item"> Messages </li>
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
                            <span class="panel-title hidden-xs"> INTERNAL CHAT BOX </span>
                        </div>
                        <div class="panel-body pn">
                          
                            @if(Session::has('flash_message'))
                                <div class="alert alert-success">
                                    {{ Session::get('flash_message') }}
                                </div>
                            @endif
                           <div class="d-flex" style="min-height: 50vh;
                           max-height: 60vh;
                           overflow: auto;
                           padding: 12px;">
                           <ul class="list-splitter" id="chatitems">
                                 @foreach($allchat as $proof)
                                 <li class={{ $proof->user->id== \Auth::user()->id ? "sent" : "rec"}}>
                                      <a href="#">
                                            <span class="thumb-sm pull-left mr">
                                                <img class="img-circle" src="{{asset('assets/img/avatars/profile_pic.png')}}" alt="..." width="50px">
                                            </span>
                                            <span class="ml">
                                                <span class="text-dark">{{$proof->message}}</span><br/>
                                                <span class="text-muted">{{$proof->user->name}}</span>
                                                <small class="text-muted">{{\Carbon\Carbon::parse($proof->created_at)->month}}/{{\Carbon\Carbon::parse($proof->created_at)->day}}/{{\Carbon\Carbon::parse($proof->created_at)->year}}</small>
                                            </span>
                                      </a>
                                 </li>
                                 @endforeach
                           </ul>
                           </div>
                            <div class="card w-100 d-flex" style="display: flex; justify-content:space-around">
                                <form id="chat_form" style="display: flex; width:100%" >
                           <input type="text" class="select2-single form-control" id="msg" placeholder="Enter message....." style="width:70%" />
                           <button class="btn btn-primary w-75">SEND</button>
                                </form>     
                            </div>   
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
            </div>
    </section>

</div>
<script>

// submit form usinf ajax


</script>
@endsection