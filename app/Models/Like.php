<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public $timestamps = false;

    public function __construct($user_id, $voyage_id){
        $this->user_id = $user_id;
        $this->voyage_id = $voyage_id;
    }

    protected $fillable = ['user_id', 'voyage_id'];

    protected $casts = [
        'user_id' => 'integer',
        'voyage_id' => 'integer',
    ];

    public function voyage() {
        return $this->belongsTo(Voyage::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
