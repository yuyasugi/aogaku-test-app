<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function user(){
        $Users = DB::table('users')->get();
        return view('admin',compact('Users'));
     }
}
