<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    use HasFactory;
    public function attendance(){
        return $this->belongsTo('App\Models\Faculty');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function getDepartment($id){
        $dept = Department::where('id', $id)->first();
        return $dept->dept;
    }
    public function getFaculty($id){
        $faculty = Faculty::where('id', $id)->first();
        return $faculty->faculty;
    }
    public function getCourseTitle($id){
        $dept = Department::where('id', $id)->first();
        return $dept->dept;
    }

}
