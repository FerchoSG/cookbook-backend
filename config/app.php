<?php


return [

    'providers' => [
        CloudinaryLabs\CloudinaryLaravel\CloudinaryServiceProvider::class,
    ],
    'aliases' => [
        'Cloudinary' => CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary::class,
    ],
    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

];
