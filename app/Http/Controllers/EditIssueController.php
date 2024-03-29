<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Issue;
use App\Models\UnitIssue;

class EditIssueController extends Controller
{
    public function edit_issue($unit_id){
        $issue = new Issue;
        $Issue = $issue->get_all_issue();

        $unitIssue = UnitIssue::select()
                    ->where('unit_id', '=', $unit_id)
                    ->join('units', 'units.id', '=', 'unit_issues.unit_id')
                    ->join('issues', 'issues.id', '=', 'unit_issues.issue_id')
                    ->whereNull('issues.deleted_at')
                    ->get();

        return response()->json(
            [
                "Issue" => $Issue,
                "unitIssue" => $unitIssue
             ],
             200,[],
             JSON_UNESCAPED_UNICODE //文字化け対策
            );
     }
}
