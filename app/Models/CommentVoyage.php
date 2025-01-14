<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentVoyage extends Model
{
    use HasFactory;

    protected $table = 'voyagecomments';

    protected $fillable = [
        'user_id',
        'voyage_id',
        'comment',
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function voyage()
    {
        return $this->belongsTo(Voyage::class);
    }
}
