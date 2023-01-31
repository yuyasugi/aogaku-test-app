<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CreateIssueController extends Controller
{
    public function create_issue(){
        $createSubjects = DB::table('subjects')->get();
        $createReferenceBooks = DB::table('reference_books')->get();
        $createUnits = DB::table('units')->get();
        return view('admin.create_issue', compact(['createSubjects', 'createReferenceBooks', 'createUnits']));
     }
}

