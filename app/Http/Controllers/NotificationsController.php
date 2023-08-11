<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notifications;

class NotificationsController extends Controller
{
    public function index(){
        $notifikasi = Notifications::all();
        return view('notifikasi.home');
    }
}
