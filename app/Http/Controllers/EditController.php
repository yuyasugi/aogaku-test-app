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

        $Issue = Issue::find($id)
                ->join('unit_issues', 'unit_issues.issue_id', '=', 'issues.id')
                ->where('issue_id', '=', $id)
                ->first();

        return view('admin.edit',compact('Issue'));
     }
}
