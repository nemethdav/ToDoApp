<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToDo extends Model
{
    protected $fillable = ['title', 'description', 'deadline', 'reminder', 'completed', 'reminder_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
