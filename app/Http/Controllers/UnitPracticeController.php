<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UnitPracticeController extends Controller
{
    public function unit_practice(){
        $UnitPractice = DB::table('unit_tests')->get();
        return view('unit_practice',compact('UnitPractice'));
     }
}