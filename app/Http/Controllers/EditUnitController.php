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
        $EditUnit = Unit::where('reference_book_id', '=', $reference_book_id)->get();
        return view('admin.edit_unit',compact('EditUnit'));
     }
}
