<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserNotificationsController extends Controller
{
    public function markAsRead($notificationId)
    {
        $notification = auth()->user()->notifications()->findOrFail($notificationId);
        $notification->markAsRead();
        return redirect($notification->data['action']);
    }
    public function markAllAsRead()
    {
        auth()->user()->unreadNotifications()->read();
        return redirect()->back()->with('msg', "All notifications have been read !");
    }

    public function notificationsList()
    {
        return view("website/notifications_list");
    }
}
