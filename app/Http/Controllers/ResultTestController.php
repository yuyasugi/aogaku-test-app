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
use Illuminate\Support\Facades\Auth;


class ResultTestController extends Controller
{
    public function result_test(Request $request){
        return response()->json($request);
        $result = Result::create(['unit_id' => $request->unit_id, 'user_id' => 1]);
        $issue = new Issue;
        $posts = $request->except(['_token', 'unit_id']);
        $keys = array_keys($posts);
        $issues = array_map( function($posts) {
            $issue = new Issue;
            return $issue->find($posts);
           }, $keys);

           foreach( $request->answers as $index => $answer){
            // return response()->json($issue->find($answer['issueId'])->anser);
            $issueId = $answer['issueId'];
            $correct =  $issue->find($issueId)->anser === $answer['answer'];
            if($correct == true){
                IssueResult::create(['issue_id' => $issueId, 'correct'=> true, 'result_id' => $result->id]);
                } else{
                    IssueResult::create(['issue_id' => $issueId,'correct'=> false, 'result_id' => $result->id]);
                }
            };

            //間違えた問題のみ表示する
            $issueResult = Issue::select()
                ->join('issue_results','issue_results.issue_id','=','issues.id')
                ->where('correct',0)
                ->where('result_id', $result->id)
                ->whereNull('issues.deleted_at')
                ->get();

            $issueCount = IssueResult::select()
                            ->where('result_id', $result->id)
                            ->count('correct');
            $score = IssueResult::select()
                            ->where('result_id', $result->id)
                            ->where('correct', '=', 1)->count();

        return response()->json(
            [
                "issueResult" => $issueResult,
                "issueCount" => $issueCount,
                "score" => $score
                ],
                200,[],
                JSON_UNESCAPED_UNICODE //文字化け対策
            );
     }
}
