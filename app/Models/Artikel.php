<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'artikels';
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}