<?php

namespace App\Http\Controllers\staffs;

use App\Http\Controllers\Controller;
use App\Http\Requests\attendanceRequest;
use App\Models\Attendance;
use App\Models\Course;
use App\Models\Department;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class attendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $faculties = Faculty::orderBy('id', 'desc')->get();
        $attendance = Attendance::with(['user', 'faculty', 'department', 'course'])->orderBy('id', 'desc')->where('user_id', Auth::user()->id)->get();
        return view('users.staffs.attendance.index', compact(['faculties', 'attendance']));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.staffs.attendance.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(attendanceRequest $request)
    {
        //
        $attendance = new Attendance();
        $attendance->department_id = $request->dept;
        $attendance->course_id = $request->course;
        $attendance->user_id = Auth::user()->id;
        $attendance->faculty_id = $request->faculty;
        $attendance->date = $request->date;
        $attendance->level = $request->level;
        $course = Course::with(['faculty', 'department'])->where('id', $request->course)->firstOrFail();
        $qrcode = str_replace(" ", "-", $course->faculty->faculty."_".$course->department->dept."_". $course->title."_".$course->code).".png";
        $qrcodes = str_replace(" ", "-", $course->faculty->faculty."_".$course->department->dept."_". $course->title."_".$course->code)."|";
        $attendance->qrcode = $qrcode;

        $attendance->save();
        // return $attendance->id;
        QrCode::size(500)->format('png')->generate($qrcodes."smartqrcode".$attendance->id, public_path('qrcode/'.$qrcode));
        return redirect()->back()->with('success', 'New attendance created successfully');


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
    public function update(attendanceRequest $request, $id)
    {
        //
        $attendance = Attendance::where('id', $id)->firstOrfail();
        $attendance->department_id = $request->dept;
        $attendance->course_id = $request->course;
        $attendance->user_id = Auth::user()->id;
        $attendance->faculty_id = $request->faculty;
        $attendance->date = $request->date;
        $attendance->level = $request->level;
        $course = Course::with(['faculty', 'department'])->where('id', $request->course)->firstOrFail();
        $qrcode = str_replace(" ", "-", $course->faculty->faculty."_".$course->department->dept."_". $course->title."_".$course->code).".png";
        $qrcodes = str_replace(" ", "-", $course->faculty->faculty."_".$course->department->dept."_". $course->title."_".$course->code)."|";
        $attendance->qrcode = $qrcode;
        $attendance->update();
        // return $attendance->id;
        // QrCode::size(500)->format('png')->generate($qrcodes."smartqrcode".$attendance->id, public_path('qrcode/'.$qrcode));
        return redirect()->back()->with('success', $course->title." || ".$course->code.' attendance updated successfully');

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
        $course = Attendance::with(['course'])->where('id', $id)->firstOrFail();
        $course->forceDelete();
        return redirect()->back()->with('success', 'Attendance '. $course->course->title.' deleted successfully');

    }
}
