<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupLeader extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = [
        'section_head_id',
        'nama_grup_leader'
    ];
    public function sectionHead(){
        return $this->belongsTo(SectionHead::class);
    }
    public function mentorVokasi(){
        return $this->hasMany(MentorVokasi::class);
    }
    public function Show(){
        return $this->with('sectionHead')->latest()->get();
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
