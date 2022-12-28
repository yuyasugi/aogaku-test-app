<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ReferenceBookTestController extends Controller
{
    public function reference_test(){
        $ReferenceBookTest = DB::table('reference_books')->get();
        return view('reference_book_test',compact('ReferenceBookTest'));
     }
}