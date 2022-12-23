<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SubjectTestController extends Controller
{
    public function subject_test(){
        return view('subject_test');
     }
}