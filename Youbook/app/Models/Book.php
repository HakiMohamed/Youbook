<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
  
public function reservation()
{
    return $this->hasOne(Reservation::class);
}

    public $timestamps = false;
    use HasFactory;

    protected $fillable = ['title', 'description', 'status', 'image'];
}
