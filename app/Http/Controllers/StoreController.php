<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Issue;
use App\Models\ReferenceBook;
use App\Models\Subject;
use App\Models\Unit;
use App\Models\UnitIssue;

class StoreController extends Controller
{
    public function store(Request $request){
        $posts = $request->all();
        $createSubjects = DB::table('subjects')->get();
        $createReferenceBooks = DB::table('reference_books')->get();
        $createUnits = DB::table('units')->get();

        DB::transaction(function() use($posts){
            $issue_id = Issue::insertGetId(['problem' => $posts['problem'], 'anser' => $posts['anser'], 'commentary' => $posts['commentary']]);

            $unit_id = $posts['unit'];
            UnitIssue::insert(['unit_id' => $unit_id, 'issue_id' => $issue_id]);

        });

        return view('admin.create_issue', compact(['createSubjects', 'createReferenceBooks', 'createUnits']));
     }
}
