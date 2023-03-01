<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class EditSubjectController extends Controller
{
    public function edit_subject(){
        $editSubject = DB::table('subjects')->get();

        return response()->json(
            [
                "editSubject" => $editSubject
             ],
             200,[],
             JSON_UNESCAPED_UNICODE //文字化け対策
            );
           }
}
