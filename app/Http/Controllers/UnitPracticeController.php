<?php

namespace App\Http\Controllers;

use App\Models\ReferenceBook;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UnitPracticeController extends Controller
{
    public function unit_practice($reference_book_id){
        $unitPractice = Unit::where('reference_book_id', '=', $reference_book_id)->get();
        return response()->json(
            [
                "unitPractice" => $unitPractice
             ],
             200,[],
             JSON_UNESCAPED_UNICODE //文字化け対策
            );
     }
}
