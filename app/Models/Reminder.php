<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    protected $guarded = [];

    public function getStatusAttribute ($value) {
        return ucfirst($value);
    }


    public function lead () {
        return $this->belongsTo(Lead::class);
    }
}
