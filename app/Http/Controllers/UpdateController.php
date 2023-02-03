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

class UpdateController extends Controller
{
    public function update(Request $request){
        $posts = $request->all();

        Issue::where('id', $posts['issue_id'])->update(['problem' => $posts['problem'], 'anser' => $posts['anser'], 'commentary' => $posts['commentary']]);

        return view('admin.edit_issue');
     }
}
