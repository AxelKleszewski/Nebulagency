<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentEtape extends Model
{
    use HasFactory;

    protected $table = 'etapecomments';

    protected $fillable = [
        'user_id',
        'etape_id',
        'comment',
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function etape()
    {
        return $this->belongsTo(Etape::class);
    }
}
