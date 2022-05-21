<?php

namespace App\Http\Controllers;

use App\Models\Checkins;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckinController extends Controller
{
    //
    public function index()
    {
        $checkins = Checkins::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $checkin = $checkins->last();
        if( $checkin && \Carbon\Carbon::parse($checkin->updated_at)->day == Carbon::now()->day )
        {
            return redirect('/checkin-list')->with('success', 'You have already checked in today.');
        }

        if(Auth::user()->checkedIn()){
            $checkin = $checkins;
            return view('hrms.checkin.index', compact('checkin'));
        }
        $checkin = new Checkins();
        $checkin->user_id = Auth::user()->id;
        $checkin->action = 'in';
        $checkin->late =  \Carbon\Carbon::parse(Auth::user()->employee->time_in)->diffInMinutes(\Carbon\Carbon::now(), false);
        if($checkin->late<0){
            $checkin->late = 0;
        }
        $checkin->save();
        $checkin = Checkins::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        
        return view('hrms.checkin.index', compact('checkin'))->with('success', 'Checked In');
    }

    public function showCheckin(){
        $checkin = Checkins::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('hrms.checkin.index', compact('checkin'));
    }

    public function checkout()
    {
        $checkins = Checkins::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $checkin = $checkins->last();
        if($checkin->action == 'in'){
            $checkin->action = 'out';
            $checkin->save();
            $checkin =  Checkins::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
            return redirect('checkin-list')->with('success', 'Checked Out');
        }
        return redirect('checkin-list')->with('error', 'You are already checked out');
    }


    public function create()
    {
        return view('hrms.checkin.create');
    }

    public function store(Request $request)
    {
        $checkin = new Checkins();
        $checkin->user_id = $request->user_id;
        $checkin->save();
        return redirect()->route('checkin.index');
    }

    public function edit($id)
    {
        $checkin = Checkins::find($id);
        return view('checkin.edit', compact('checkin'));
    }

    public function update(Request $request, $id)
    {
        $checkin = Checkins::find($id);
        $checkin->user_id = $request->user_id;
        $checkin->save();
        return redirect()->route('checkin.index');
    }

    public function destroy($id)
    {
        $checkin = Checkins::find($id);
        $checkin->delete();
        return redirect()->route('checkin.index');
    }


    
}
