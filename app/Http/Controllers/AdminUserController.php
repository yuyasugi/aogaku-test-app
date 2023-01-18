<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\IssueResult;
use Illuminate\Support\Facades\DB;

class AdminUserController extends Controller
{
    public function user(){
        $Users = DB::table('users')->get();
        return view('layouts.admin',compact(['Users']));
     }
}
