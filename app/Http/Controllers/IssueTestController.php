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

        $unitIssue = UnitIssue::select()
                    ->where('unit_id', '=', $unit_id)
                    ->join('units', 'units.id', '=', 'unit_issues.unit_id')
                    ->join('issues', 'issues.id', '=', 'unit_issues.issue_id')
                    ->where('unit_id', $unit_id)
                    ->whereNull('issues.deleted_at')
                    ->inRandomOrder()->limit(5)
                    ->get();
        $unitId = $unit_id;
        return response()->json(
            [
                "Issue" => $Issue,
                "unitIssue" => $unitIssue,
                "unitId" => $unitId
             ],
             200,[],
             JSON_UNESCAPED_UNICODE //文字化け対策
            );
     }
}
