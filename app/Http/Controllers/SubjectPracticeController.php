<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SubjectPracticeController extends Controller
{
    public function subject_practice(){
        $subjectPractice = DB::table('subjects')->get();

     return response()->json(
        [
            "subjectPractice" => $subjectPractice
         ],
         200,[],
         JSON_UNESCAPED_UNICODE //文字化け対策
        );
       }
}
