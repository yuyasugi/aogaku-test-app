<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitIssue extends Model
{
    use HasFactory;

    public function units()
{
    return $this->belongsTo(Unit::class, 'unit_id');
}
}
