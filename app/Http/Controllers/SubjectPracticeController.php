<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SubjectPracticeController extends Controller
{
    public function subject_practice(){
        $SubjectPractice = DB::table('subjects')->get();
        return view('subject_practice',compact('SubjectPractice'));
     }
}
