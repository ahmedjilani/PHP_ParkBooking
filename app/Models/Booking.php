<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'park_name',
        'user_name',
        'contact',
        'email',
        'sport',
        'date',
        'time',
        'user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
