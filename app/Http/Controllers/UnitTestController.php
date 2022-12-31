<?php

namespace App\Http\Controllers;

use App\Models\ReferenceBook;
use App\Models\UnitTest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UnitTestController extends Controller
{
    public function unit_test($id){
        $UnitTest = DB::table('unit_tests')->select('name')->get();

        $ReferenceUnit = ReferenceBook::find($id);
        return view('unit_test',compact('UnitTest', 'ReferenceUnit'));
     }
}