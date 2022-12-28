<?php

namespace App\Http\Controllers;

use App\Models\UnitTest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UnitTestController extends Controller
{
    public function unit_test(){
        $UnitTest = DB::table('unit_tests')->get();
        return view('unit_test',compact('UnitTest'));
     }
}