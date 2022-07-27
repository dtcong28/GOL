<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attachment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function messages()
    {
        return $this->belongsTo(Message::class);
    }
}
