<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\IssueResult;
use App\Models\ReferenceBook;
use App\Models\UnitTest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ResultController extends Controller
{
    public function result(Request $request){
        $issue = new Issue;
        $posts = $request->all();
        $issues = $issue->get_all_issue();

        foreach( $issues as $index => $issue){
            $correct =  $issue->anser === $posts[$index+1];
            if($correct){
            IssueResult::create(['user_id' => 1, 'unit_id' => 1, 'issue_id' => 1, 'correct'=> true]);
            }
            IssueResult::create(['user_id' => 1, 'unit_id' => 1, 'issue_id' => 1,'correct'=> false]);
            };
            dd($issues);
        return view('result');
     }
}
