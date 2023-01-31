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

            // return array(
            //     'unitName' => $unit->name,
            //     'ReferenceBookName' => ReferenceBook::find($unit->referencebook_id)->name,
            //     'subjectName' => Subject::find($referenceBookId->subject_id)->name,
            // );
            };


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


            return view('admin.user_result',compact(['user', 'results','Users']));
    }
}
