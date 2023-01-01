<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class IssueController extends Controller
{
    public function issue(){
        $Issue = DB::table('issues')->get();
        return view('issue',compact('Issue'));
     }
}