<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Issue;
use App\Models\ReferenceBook;
use App\Models\Subject;
use App\Models\Unit;
use App\Models\UnitIssue;

class StoreController extends Controller
{
    public function store(Request $request){
        $posts = $request->all();

        DB::transaction(function() use($posts){
            $issue_id = Issue::insertGetId(['problem' => $posts['problem'], 'anser' => $posts['anser'], 'commentary' => $posts['commentary']]);
            
            $subject_exists = Subject::where('name', '=', $posts['subject'])->exists();
            $reference_book_exists = ReferenceBook::where('name', '=', $posts['referenceBook'])->exists();
            $unit_exists = Unit::where('name', '=', $posts['unit'])->exists();

            if( !$subject_exists && !$reference_book_exists && !$unit_exists ){
                $subject_id = Subject::insertGetId(['name' => $posts['subject']]);
                $reference_book_id = ReferenceBook::insertGetId(['name' => $posts['referenceBook'], 'subject_id' => $subject_id]);
                $unit_id = Unit::insertGetId(['name' => $posts['unit'], 'reference_book_id' => $reference_book_id]);
                UnitIssue::insert(['unit_id' => $unit_id, 'issue_id' => $issue_id]);
            }
        });

        return view('create_issue');
     }
}
