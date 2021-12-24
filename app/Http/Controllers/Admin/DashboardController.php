<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function showprofile(){
        $user=User::find(Auth::user()->id);
        return view('admin.profile',compact('user'));
    }
}
