<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class NotificationController extends Controller
{
    //

    public function showAll()
    {
        $notifications = Notification::where('recipients', Auth::user()->id)->get();
        return view('hrms.notifications.all', compact('notifications'));
    }
    

    
    
}
