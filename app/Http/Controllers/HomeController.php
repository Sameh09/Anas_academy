<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Livewire\Actions\Logout;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }

    public function test($value = 'none'){
        return view('test',compact('value'));
    }

    public function log_request(){
        return view('log_request');
    }

    public function logout(Logout $logout){
        $logout();
        return redirect()->route('home');
    }
}
