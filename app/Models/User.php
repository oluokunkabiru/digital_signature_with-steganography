<?php

namespace App\Models;

use Hamcrest\Type\IsNumeric;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    function nextMatric(){
        $last = User::where('role', 'student')->max('id');
        $student = User::where('id', $last)->firstOrFail();
        $matric = !empty($student->matric_no) && is_numeric($student->matric_no)?$student->matric_no+1:date('y')."0001";
        return $matric;
    }
    function nextEmail($sname, $fname, $lname){
        $new =strtolower($sname[0].$fname[0].$lname);
        $proposeEmail = strtolower($new."@student.smartqrcode");
        // $proposeEmail = "admin@vb.com";
        $last = User::where('email', $proposeEmail)->first();
        if($last != null){
             $prevEmail = $last->email;
            $extractmail = explode("@", $prevEmail);
            $extractedmail = $extractmail[0];
            $newcheck = explode($new, $extractedmail);
            $number = $newcheck[1];
            $newNumber  = isset($number) && is_numeric($number)?$number+1:0;
            $newEmail = $new.$newNumber."@student.smartqrcode";
            return $newEmail;
        }
        return $proposeEmail;

    }
}
