<?php

namespace App\Http\Controllers;

use App\Models\ReferenceBook;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UnitTestController extends Controller
{
    public function unit_test($reference_book_id){
        $UnitTest = Unit::where('reference_book_id', '=', $reference_book_id)->get();
        return view('unit_test',compact('UnitTest'));
     }
}