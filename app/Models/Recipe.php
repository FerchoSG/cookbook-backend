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

    public function toArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description'   => $this->description,
            'image' => $this->image,
            'ingredients'   => json_decode($this->ingredients),
            'user_id'   => $this->user_id,
        ];
    }
}
