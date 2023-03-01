<?php

namespace App\Http\Controllers;

use App\Models\ReferenceBook;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class EditUnitController extends Controller
{
    public function edit_unit($reference_book_id){
        $editUnit = Unit::where('reference_book_id', '=', $reference_book_id)->get();
        return response()->json(
            [
                "editUnit" => $editUnit
             ],
             200,[],
             JSON_UNESCAPED_UNICODE //文字化け対策
            );
     }
}
