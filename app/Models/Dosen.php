<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory,HasUuids;
    protected $table = 'dosen';
    protected $fillable = [
        'user_id','prodi'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}