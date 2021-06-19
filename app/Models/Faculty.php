<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'faculty'];
    public function numbersOfExist($id){
        $no = Department::where('faculty_id', $id)->get();
        return count($no);
    }
}
