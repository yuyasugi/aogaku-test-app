<?php

namespace App\Http\Controllers;

use App\Models\ReferenceBook;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UnitPracticeController extends Controller
{
    public function unit_practice($reference_book_id){
        $UnitPractice = Unit::where('reference_book_id', '=', $reference_book_id)->get();
        $reference_book_id = array(1 => 'reference_book_id');
        return view('unit_practice',compact('UnitPractice'));
     }
}