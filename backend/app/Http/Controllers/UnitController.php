<?php

namespace App\Http\Controllers;

use App\Models\ReferenceBook;
use App\Models\UnitTest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UnitController extends Controller
{
    public function unit($reference_book_id){
        $Unit = UnitTest::where('reference_book_id', '=', $reference_book_id)->get();
        return view('unit',compact('Unit'));
     }
}