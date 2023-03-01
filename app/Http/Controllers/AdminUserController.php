<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\IssueResult;
use Illuminate\Support\Facades\DB;

class AdminUserController extends Controller
{
    public function user(){
        $users = DB::table('users')->get();
        return response()->json(
            [
                "users" => $users
             ],
             200,[],
             JSON_UNESCAPED_UNICODE //文字化け対策
            );
     }
}
