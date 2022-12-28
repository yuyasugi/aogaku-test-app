<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ReferenceBookPracticeController extends Controller
{
    public function reference_practice(){
        $ReferenceBookPractice = DB::table('reference_books')->get();
        return view('reference_book_practice',compact('ReferenceBookPractice'));
     }
}