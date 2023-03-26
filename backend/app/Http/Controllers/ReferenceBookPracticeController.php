<?php

namespace App\Http\Controllers;

use App\Models\ReferenceBook;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ReferenceBookPracticeController extends Controller
{
    public function reference_practice($subject_id){
        $referenceBookPractice = ReferenceBook::where('subject_id', '=', $subject_id)->get();
        return response()->json(
            [
                "referenceBookPractice" => $referenceBookPractice
             ],
             200,[],
             JSON_UNESCAPED_UNICODE //文字化け対策
            );
     }
}
