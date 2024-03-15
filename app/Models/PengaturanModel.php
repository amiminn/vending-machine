<?php

namespace App\Models;

use Amiminn\Support\Response;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengaturanModel extends Model
{
    use HasFactory;
    protected $table = "pengaturan";
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = Response::epoch();
        });
    }
}
