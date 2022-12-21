<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function user(){
        $TestResults = DB::table('test_results')->get();
        $Users = DB::table('users')->get();
        return view('admin',compact(['Users', 'TestResults']));
     }
}
