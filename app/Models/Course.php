<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function faculty(){
        return $this->belongsTo('App\Models\Faculty');
    }
    public function department(){
        return $this->belongsTo('App\Models\Department');
    }
    public function numbersOfExist($id){
        $no = Attendance::where('course_id', $id)->get();
        return count($no);
    }
}
