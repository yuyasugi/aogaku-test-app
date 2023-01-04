<?php

namespace App\Http\Controllers;

use App\Models\ReferenceBook;
use App\Models\UnitTest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ResultController extends Controller
{
    public function result(Request $request){
        $posts = $request->all();
        dd($posts);
        return view('result');
     }
}