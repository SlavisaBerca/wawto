<?php

namespace App\Http\Controllers\Platform\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Platform\Notification;

class AjaxRequestsController extends Controller
{
    public function countNotifications(){
        $user=auth()->user();
        $data = $user->notification->count();

        return response()->json($data);
    }

    public function jsonNotifications(){

        $user=auth()->user();
        $data = $user->notification;

        return response()->json($data);
    }

    public function deleteNotification($notificaion_id){

        $notification = Notification::where('notification_id',$notificaion_id)->delete();

        return 'success';
    }
    public function hardDeleteNotification($notificaion_id){

        $notification = Notification::where('notification_id',$notificaion_id)->delete();

        return back()->with('success','Notificare a fost stersa cu success');
    }
}
