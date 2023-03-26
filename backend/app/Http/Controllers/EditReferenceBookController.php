<?php

namespace App\Http\Controllers;

use App\Models\ReferenceBook;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class EditReferenceBookController extends Controller
{
    public function edit_reference($subject_id){
        $editReferenceBook = ReferenceBook::where('subject_id', '=', $subject_id)->get();
        return response()->json(
            [
                "editReferenceBook" => $editReferenceBook
             ],
             200,[],
             JSON_UNESCAPED_UNICODE //文字化け対策
            );
     }
}
