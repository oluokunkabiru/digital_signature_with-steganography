<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Attendee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentAttendance extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $courses = Attendee::join('attendances', 'attendances.id', 'attendees.attendance_id')
        ->join('courses', 'attendances.course_id', 'courses.id')
        ->join('departments', 'departments.id', 'attendances.department_id')
        ->join('users', 'users.id', 'attendances.user_id')->where('attendees.user_id', Auth::user()->id)->get();
        return view('users.students.attendance-history', compact(['courses']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
