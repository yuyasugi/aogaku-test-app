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
        // $results = DB::table('results')->get();
        // $Users = DB::table('users')->get();
        // $TestResults = User::select()
        //                 ->join('results', 'results.user_id', '=', 'users.id')
        //                 ->join('units', 'units.id', '=', 'results.unit_id')
        //                 ->join('reference_books', 'reference_books.id', '=', 'units.reference_book_id')
        //                 // ->join('subjects', 'subjects.id', '=', 'reference_books.subject_id')
        //                 ->where('users.id', '=', $user_id)
        //                 ->get();
        //                 dd($TestResults);
        $user = User::find($user_id);
        $results = Result::where('user_id', '=', $user_id)->get();
        $result = DB::table('results')->get();
        foreach($results as $index => $result) {
            $unit = Unit::find($results[$result->unit_id]);
            dd($unit);
            $refecnceBookId = ReferenceBook::find($results[$unit->reference_book_id]);
            return
                $unitName = $unit->name;
                $ReferenceBookName = ReferenceBook::find($unit->referencebook_id)->name;
                $subjectName = Subject::find($ReferenceBookName->subject_id)->name;
            }


            // $issue_count = IssueResult::select()
            //                 ->join('results', 'results.id', '=', 'issue_results.result_id')
            //                 ->join('users', 'users.id', '=', 'results.user_id')
            //                 ->where('result_id', 194)
            //                 ->where('users.id', '=', $user_id)
            //                 ->where('users.id', $user_id)
            //                 ->count('correct');

            // $score = IssueResult::select()
            //                 ->join('results', 'results.id', '=', 'issue_results.result_id')
            //                 ->join('users', 'users.id', '=', 'results.user_id')
            //                 ->where('result_id', 194)
            //                 ->where('users.id', '=', $user_id)
            //                 ->where('users.id', $user_id)
            //                 ->where('correct', '=', 1)
            //                 ->count();


            return view('user_result',compact(['Users','TestResults', 'issue_count', 'score']));
    }
}
