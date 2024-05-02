<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartementHead extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = [
        'departement_id','nama_departement_head','nomor_induk_pegawai','lokasi'
    ];
    public function departement(){
        return $this->belongsTo(Departement::class);
    }
    public function sectionHead(){
        return $this->hasOne(SectionHead::class);
    }
    public function Add($data){
        return $this->create($data);
    }
    public function Show(){
        return $this->with('departement')->latest()->get();
    }
    public function Put($id,$data){
        return $this->find($id)->update($data);
    }
    public function Del($id){
        return $this->find($id)->delete();
    }
}
