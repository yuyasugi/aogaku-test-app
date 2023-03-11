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

        DB::transaction(function() use($request){
            // return response()->json($request);
            $issue_id = Issue::insertGetId(['problem' => $request->valueProblem, 'anser' => $request->valueAnser, 'commentary' => $request->valueVCommentary]);

            $unit_id = $request->selectedUnit;
            UnitIssue::insert(['unit_id' => $unit_id, 'issue_id' => $issue_id]);

        });
     }
}
