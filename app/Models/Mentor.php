<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = [
        'user_id',
        'section_id',
        'no_telp',
        'leader'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the section that owns the mentor.
     */
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }
}
