<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avis extends Model {
    use HasFactory;

    protected $table = 'avis';

    protected $fillable = ['contenu', 'user_id', 'voyage_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function voyage() {
        return $this->belongsTo(Voyage::class);
    }
}
