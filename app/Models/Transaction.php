<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'hours'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}