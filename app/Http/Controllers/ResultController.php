<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\IssueResult;
use App\Models\ReferenceBook;
use App\Models\Result;
use App\Models\Unit;
use App\Models\UnitIssue;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class ResultController extends Controller
{
    public function result(Request $request){
        $issue = new Issue;
        $posts = $request->all();
        $issues = $issue->select()
                    ->join('unit_issues', 'unit_issues.issue_id', '=', 'issues.id')
                    ->get();
        foreach( $issues as $index => $issue){
            $correct =  $issue->anser === $posts[$index+1];
            if($correct == true){
                IssueResult::create(['issue_id' => $issue->id, 'correct'=> true, 'result_id' => 1]);
                Result::create(['unit_id' => 1, 'user_id' => 1]);
                } else{
                    IssueResult::create(['issue_id' => $issue->id,'correct'=> false, 'result_id' => 1]);
                    Result::create(['unit_id' => 1, 'user_id' => 1]);
                }
            };

            $issue_result = Issue::select()
                ->join('issue_results','issue_results.issue_id','=','issues.id')
                ->where('correct',0)
                ->get();

            $issue_count = IssueResult::count('correct');
            $score = IssueResult::where('correct', '=', 1)->count();

            return view('result',compact(['issue_result', 'issue_count', 'score']));
     }
}
