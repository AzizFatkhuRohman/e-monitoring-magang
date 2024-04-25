<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory,HasUuids;
    protected $fillable = [
        'section'
    ];
    public function sectionHead(){
        return $this->hasMany(SectionHead::class);
    }
    public function Show(){
        return $this->latest()->get();
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
