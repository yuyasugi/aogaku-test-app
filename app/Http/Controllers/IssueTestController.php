<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Issue;
use App\Models\UnitIssue;

class IssueTestController extends Controller
{
    public function issue_test($unit_id){
        $issue = new Issue;
        $Issue = $issue->get_all_issue();

        $UnitIssue = UnitIssue::select()
                    ->where('unit_id', '=', $unit_id)
                    ->join('units', 'units.id', '=', 'unit_issues.unit_id')
                    ->join('issues', 'issues.id', '=', 'unit_issues.issue_id')
                    ->where('unit_id', $unit_id)
                    ->inRandomOrder()->limit(5)
                    ->get();
        $UnitId = $unit_id;
        return view('issue_test',compact(['Issue', 'UnitIssue', 'UnitId']));
     }
}