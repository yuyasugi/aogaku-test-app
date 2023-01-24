<?php

namespace App\Http\Controllers;

use App\Models\ReferenceBook;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ReferenceBookPracticeController extends Controller
{
    public function reference_practice($subject_id){
        $ReferenceBookPractice = ReferenceBook::where('subject_id', '=', $subject_id)->get();
        return view('reference_book_practice',compact('ReferenceBookPractice'));
     }
}
