<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    protected $fillable = [
        'image_1',
        'image_2',
        'greeting',
        'introduction',
        'button_text',
    ];

    protected $table = 'homes';
}
