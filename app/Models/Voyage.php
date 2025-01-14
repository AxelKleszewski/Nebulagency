<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voyage extends Model {
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'titre', 'resume', 'description', 'duree_jours', 'galaxie', 'prix_euros', 'en_ligne', 'visuel', 'user_id'
    ];

    public function editeur() {
        return $this->belongsTo(User::class, "user_id");
    }

    public function avis() {
        return $this->hasMany(Avis::class);
    }

    public function likes() {
        return $this->belongsToMany(User::class, 'likes');
    }

    public function etapes() {
        return $this->hasMany(Etape::class, "voyage_id");
    }
    public function casts() {
        return [
            'en_ligne' => 'boolean',
        ];
    }
}
