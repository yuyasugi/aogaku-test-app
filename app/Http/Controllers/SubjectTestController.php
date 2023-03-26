<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SubjectTestController extends Controller
{
    public function subject_test(){
        $subjectTest = DB::table('subjects')->get();
        return response()->json(
            [
                "subjectTest" => $subjectTest
             ],
             200,[],
             JSON_UNESCAPED_UNICODE //文字化け対策
            );
     }
}
