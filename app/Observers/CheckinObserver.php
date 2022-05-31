<?php

namespace App\Observers;

use App\Models\Checkins;
use App\Models\Notification;

class CheckinObserver
{
   
    /**
     * Handle the Checkins "created" event.
     *
     * @param  \App\Models\Checkins  $checkins
     * @return void
     */
    public function created(Checkins $checkins)
    {
        //
        if($checkins->late > 0) {
            $notification = new Notification();
            $notification->data = 'You have been late for '.$checkins->late.' minutes';
            $notification->recipients = $checkins->user_id;
            $notification->save();
        }
        $allCheckins = Checkins::where('user_id', $checkins->user_id)->get();
        $totalLate = 0;
        foreach($allCheckins as $checkin) {
            $totalLate += $checkin->late;
        }
        if($totalLate >= 480) {
            $notification = new Notification();
            $username = $checkins->userName();
            $notification->data = $username.' have been late for '.$totalLate.' minutes [ Equal to 1 day ]';
            $notification->recipients = 1;
            $notification->save();
        }
    }

    /**
     * Handle the Checkins "updated" event.
     *
     * @param  \App\Models\Checkins  $checkins
     * @return void
     */
    public function updated(Checkins $checkins)
    {
        //
    }

    /**
     * Handle the Checkins "deleted" event.
     *
     * @param  \App\Models\Checkins  $checkins
     * @return void
     */
    public function deleted(Checkins $checkins)
    {
        //
    }

    /**
     * Handle the Checkins "restored" event.
     *
     * @param  \App\Models\Checkins  $checkins
     * @return void
     */
    public function restored(Checkins $checkins)
    {
        //
    }

    /**
     * Handle the Checkins "force deleted" event.
     *
     * @param  \App\Models\Checkins  $checkins
     * @return void
     */
    public function forceDeleted(Checkins $checkins)
    {
        //
    }
}
