<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class TestResultController extends Controller
{
    public function test_result(){
        $TestResults = DB::table('test_results')->get();
        return view('admin',compact('TestResults'));
     }
}
