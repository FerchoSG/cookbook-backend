<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use CloudinaryLabs\CloudinaryLaravel\MediaAlly;
class Recipe extends Model
{
    use HasFactory, MediaAlly;

    protected $fillable = [
        'title',
        'description',
        'image',
        'ingredients',
        'user_id',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
