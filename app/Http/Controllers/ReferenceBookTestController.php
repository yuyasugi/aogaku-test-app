<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ReferenceBook;
use Illuminate\Support\Facades\DB;

class ReferenceBookTestController extends Controller
{
    public function reference_test($subject_id){
        $ReferenceBookTest = ReferenceBook::where('subject_id', '=', $subject_id)->get();
        return view('reference_book_test',compact('ReferenceBookTest'));
     }
}
