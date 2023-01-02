<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class TestIssueController extends Controller
{
    public function test_issue(){
        $TestIssue = DB::table('test_issues')->get();
        return view('test_issue',compact('TestIssue'));
     }
}