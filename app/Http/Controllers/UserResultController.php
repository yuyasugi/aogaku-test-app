<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\IssueResult;
use App\Models\Result;
use App\Models\Unit;
use App\Models\ReferenceBook;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;

class UserResultController extends Controller
{
    public function user_result($user_id){
        $Users = DB::table('users')->get();
        $user = User::find($user_id);
        $results = Result::where('user_id', '=', $user_id)->get();
        foreach($results as $index => $result) {
            $unit = Unit::find($result->unit_id);
            $referenceBook = ReferenceBook::find($unit->reference_book_id);


                $result->unitName = $unit->name;
                $result->referenceBookName = $referenceBook->name;
                $result->subjectName = Subject::find($referenceBook->subject_id)->name;
                $result->issueCount = IssueResult::select()
                                        ->join('results', 'results.id', '=', 'issue_results.result_id')
                                        ->where('result_id', $result->id)
                                        ->count('correct');
                $result->score = IssueResult::select()
                                        ->join('results', 'results.id', '=', 'issue_results.result_id')
                                        ->where('result_id', $result->id)
                                        ->where('correct', '=', 1)->count();
            };
            return view('admin.user_result',compact(['user', 'results','Users']));
    }
}
