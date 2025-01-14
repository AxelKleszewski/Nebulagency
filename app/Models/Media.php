<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model {
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['titre', 'url', 'format', 'etape_id'];

    public function etape() {
        return $this->belongsTo(Etape::class);
    }
}
