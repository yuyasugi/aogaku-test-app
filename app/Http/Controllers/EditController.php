<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Issue;
use App\Models\Unit;

class EditController extends Controller
{
    public function edit($id){

        $issue = Issue::find($id)
                ->join('unit_issues', 'unit_issues.issue_id', '=', 'issues.id')
                ->where('issue_id', '=', $id)
                ->first();

                return response()->json(
                    [
                        "issue" => $issue
                     ],
                     200,[],
                     JSON_UNESCAPED_UNICODE //文字化け対策
                    );
     }
}
