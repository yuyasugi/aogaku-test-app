<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ReferenceBook;
use Illuminate\Support\Facades\DB;

class ReferenceBookTestController extends Controller
{
    public function reference_test($subject_id){
        $referenceBookTest = ReferenceBook::where('subject_id', '=', $subject_id)->get();
        return response()->json(
            [
                "referenceBookTest" => $referenceBookTest
             ],
             200,[],
             JSON_UNESCAPED_UNICODE //文字化け対策
            );
     }
}
