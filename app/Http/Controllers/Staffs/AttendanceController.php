<?php

namespace App\Http\Controllers\Staffs;

use App\Http\Controllers\Controller;
use App\Http\Requests\attendanceRequest;
use App\Models\Attendance;
use App\Models\Attendee;
use App\Models\Course;
use App\Models\Department;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AttendanceController extends Controller
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

        // return $message;


        $qrcode = str_replace(" ", "Faculty::", $course->faculty->faculty."_".$course->department->dept."_". $course->title."_".$course->code).".png";
        $attendance->qrcode = $qrcode;

        $attendance->save();
        // return $attendance->id;
        $message = "Faculty:".$course->faculty->faculty."\n";
        $message .= "Department:".$course->department->dept."\n";
        $message .= "Course title:".$course->title."\n";
        $message .= "Course code:".$course->code."\n";
        $message .= "Course unit:".$course->unit."\n";
        $message .= "Attendance date:".$request->date."\n";
        $message .= "Smartcode:smartme".time()."_".$attendance->id;
        if(!is_dir(public_path()."/qrcode")){
            mkdir(public_path()."/qrcode");
        }
        QrCode::size(400)->format('png')->generate(html_entity_decode($message), public_path().'/qrcode/'.$qrcode);
        return redirect()->back()->with('success', 'New attendance created successfully');


    }
    public function showTodaysAttendance(){
        $attendance = Attendee::with(['user'])->join('attendances', 'attendances.id', 'attendees.attendance_id')
        ->join('courses', 'attendances.course_id', 'courses.id')
        ->join('departments', 'departments.id', 'attendances.department_id')
        ->join('users', 'users.id', 'attendees.user_id')->whereDate('attendees.created_at',date('Y-m-d'))->get();
    //    return $attendance;
        return view('users.staffs.todays-attendance',compact(['attendance']));
    }

    public function showTodaysClass(){
        $today = date('Y-m-d');
        $attendance = Attendance::with(['user', 'faculty', 'department', 'course'])->orderBy('id', 'desc')->whereDate('date','=', $today)->get();
        return view('users.staffs.todays-class', compact(['attendance']));

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
        $attendance = Attendee::with(['user'])->where('attendance_id', $id)->orderBy('id', 'desc')->get();
    //    return $attendance;
        return view('users.staffs.attendance.attendee', compact(['attendance']));
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

        if($attendance->qrcode){
            unlink(public_path()."/qrcode/".$attendance->qrcode);
        }
        $course = Course::with(['faculty', 'department'])->where('id', $request->course)->firstOrFail();
       $qrcode = str_replace(" ", "-", $course->faculty->faculty."_".$course->department->dept."_". $course->title."_".$course->code). time() .".png";
        $qrcodes = str_replace(" ", "-", $course->faculty->faculty."_".$course->department->dept."_". $course->title."_".$course->code)."|";
        $attendance->qrcode = $qrcode;
        $attendance->update();
        // return $attendance->id;
        $message = "Faculty:".$course->faculty->faculty."\n";
        $message .= "Department:".$course->department->dept."\n";
        $message .= "Course title:".$course->title."\n";
        $message .= "Course code:".$course->code."\n";
        $message .= "Course unit:".$course->unit."\n";
        $message .= "Attendance date:".$request->date."\n";
        $message .= "Smartcode:smartme".time()."_".$attendance->id;
        QrCode::size(400)->format('png')->generate(html_entity_decode($message), public_path().'/qrcode/'.$qrcode);
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
        $attendance = Attendance::with(['course'])->where('id', $id)->firstOrFail();
        if($attendance->qrcode){
            unlink(public_path()."/qrcode/".$attendance->qrcode);
        }
        $attendance->forceDelete();

        return redirect()->back()->with('success', 'Attendance '. $attendance->course->title.' deleted successfully');

    }
}
