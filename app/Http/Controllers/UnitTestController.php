<?php

namespace App\Http\Controllers;

use App\Models\ReferenceBook;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UnitTestController extends Controller
{
    public function unit_test($reference_book_id){
        $unitTest = Unit::where('reference_book_id', '=', $reference_book_id)->get();
        return response()->json(
            [
                "unitTest" => $unitTest
             ],
             200,[],
             JSON_UNESCAPED_UNICODE //文字化け対策
            );
     }
}
