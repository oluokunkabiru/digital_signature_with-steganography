<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;


    public function faculty(){
        return $this->belongsTo('App\Models\Faculty');
    }
    public function numbersOfExist($id){
        $no = Course::where('department_id', $id)->get();
        return count($no);
    }
}


