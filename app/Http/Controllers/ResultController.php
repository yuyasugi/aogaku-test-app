<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\IssueResult;
use App\Models\ReferenceBook;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ResultController extends Controller
{
    public function result(Request $request){
        $issue = new Issue;
        $posts = $request->all();//⇦10番の問題の解答しか入ってこない
        $issues = Issue::select()
                    ->join('unit_issues', 'unit_issues.issue_id', '=', 'issues.id')
                    ->where('unit_id', 1)
                    ->get();
        //ここの$issuesで全ての問題が取れてしまっている。unit_idで指定したい

        foreach( $issues as $index => $issue){
            $correct =  $issue->anser === $posts[$index+1];
            if($correct == true){
            IssueResult::create(['user_id' => 1, 'unit_id' => 1, 'issue_id' => $issue->id, 'correct'=> true]);
            } else{
                IssueResult::create(['user_id' => 1, 'unit_id' => 1, 'issue_id' => $issue->id,'correct'=> false]);
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
