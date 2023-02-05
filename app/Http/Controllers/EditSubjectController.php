<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class EditSubjectController extends Controller
{
    public function edit_subject(){
        $EditSubject = DB::table('subjects')->get();
        return view('admin.edit_subject',compact('EditSubject'));
     }
}
