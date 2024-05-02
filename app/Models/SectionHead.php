<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionHead extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = [
        'section_id',
        'departement_head_id',
        'nama_section_head',
        'nomor_induk_pegawai'
    ];
    public function departementHead()
    {
        return $this->belongsTo(DepartementHead::class);
    }
    public function section(){
        return $this->belongsTo(Section::class);
    }
    public function grupLeader(){
        return $this->hasMany(GrupLeader::class);
    }
    public function Show(){
        return $this->with('departementHead','section')->latest()->get();
    }
    public function Post($data){
        return $this->create($data);
    }
    public function Put($id,$data){
        return $this->find($id)->update($data);
    }
    public function Del($id){
        return $this->find($id)->delete();
    }
}
