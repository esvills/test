<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    const ACTIVE = 1;

    protected $fillable = ['user_id', 'link', 'created_at', 'active'];

    public $timestamps = false;

    protected $dates = [
        'created_at',
    ];

    public function scopeActive($query)
    {
        return $query->where('active', self::ACTIVE);
    }
}
