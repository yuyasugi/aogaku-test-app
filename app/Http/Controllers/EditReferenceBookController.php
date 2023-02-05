<?php

namespace App\Http\Controllers;

use App\Models\ReferenceBook;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class EditReferenceBookController extends Controller
{
    public function edit_reference($subject_id){
        $EditReferenceBook = ReferenceBook::where('subject_id', '=', $subject_id)->get();
        return view('admin.edit_reference_book',compact('EditReferenceBook'));
     }
}
