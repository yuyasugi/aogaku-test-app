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

class UpdateController extends Controller
{
    public function update(Request $request, $unit_id){
        $posts = $request->all();

        Issue::where('id', $posts['issue_id'])->update(['problem' => $posts['problem'], 'anser' => $posts['anser'], 'commentary' => $posts['commentary']]);

        $UnitIssue = UnitIssue::select()
                    ->where('unit_id', '=', $unit_id)
                    ->join('units', 'units.id', '=', 'unit_issues.unit_id')
                    ->join('issues', 'issues.id', '=', 'unit_issues.issue_id')
                    ->get();

        return view('admin.edit_issue',compact('UnitIssue'));
     }
}
