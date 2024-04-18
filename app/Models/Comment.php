<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;



    public function idea()
    {
        $this->belongsTo(Idea::class);
    }

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
