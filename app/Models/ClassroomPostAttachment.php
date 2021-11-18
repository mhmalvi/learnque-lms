<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassroomPostAttachment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function classroom_post()
    {
        return $this->belongsTo(ClassroomPost::class);
    }
}
