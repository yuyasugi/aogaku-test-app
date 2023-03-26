<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Issue extends Model
{
    use HasFactory;


    public function get_all_issue(){
        $Issue = DB::table('issues')->get();
        return $Issue;
     }
}
