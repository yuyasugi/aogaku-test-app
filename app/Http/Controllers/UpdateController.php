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
        return response()->json($request);
        Issue::where('id', $request->id)->update(['problem' => $request->editProblem, 'anser' => $request->editAnser, 'commentary' => $request->editCommentary]);
     }

     public function destroy(Request $request){
        Issue::where('id', $request->id)->update(['deleted_at' => date("Y-m-d H:i:s", time())]);
     }
}
