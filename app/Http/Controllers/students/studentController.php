<?php

namespace App\Http\Controllers\students;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Attendee;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $today = date('Y-m-d');
        $attended = Attendee::where('user_id', Auth::user()->id)->get();
        $attendances = Attendance::with(['user', 'faculty', 'department', 'course'])->orderBy('id', 'desc')->where(['level'=>Auth::user()->level, 'department_id'=>Auth::user()->department_id, 'faculty_id'=>Auth::user()->faculty_id, 'date'=>$today])->get();
        $tattendances = Attendance::with(['user', 'faculty', 'department', 'course'])->orderBy('id', 'desc')->where(['level'=>Auth::user()->level, 'department_id'=>Auth::user()->department_id, 'faculty_id'=>Auth::user()->faculty_id])->get();
        // return $attendances;
        return view('users.students.index', compact(['attendances', 'tattendances', 'attended']));
    }
    public function courseTaken(){
        $courses = Course::where(['level'=>Auth::user()->level, 'department_id'=>Auth::user()->department_id, 'faculty_id'=>Auth::user()->faculty_id])->get();

        return view('users.students.courses', compact(['courses']));
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

    public function scanninigQRcode(Request $request){
        $id = $request->id;
        $today = date('Y-m-d');
        $now = date('Y-m-d h:i:s');

        $attendee = Attendance::with(['faculty', 'department', 'user', 'course'])->where('id', $id)->firstOrFail();
        $departmentId = $attendee->department->id;
        if($departmentId ==Auth::user()->department_id){
            if($attendee->date == $today){
            $attendance = Attendee::where(['attendance_id' => $id, 'user_id' => Auth::user()->id])->exists();
            if($attendance){
                $attendance = Attendee::where(['attendance_id' => $id, 'user_id' => Auth::user()->id])->first();
                if($attendance->out_date == null){
                    $status = "out";
                $attendance->out_date = $now;
                $attendance->update();
                return view('users.students.attendee', compact(['attendee', 'status', 'attendance']));
                }else{
                    $status = "already";
                    return view('users.students.attendee', compact(['attendee', 'status', 'attendance']));

                }
            }else{
                $attendance = new Attendee();
                $attendance->user_id = Auth::user()->id;
                $attendance->attendance_id = $id;
                $attendance->in_date = $now;
                $attendance->save();
                $status = "in";
                return view('users.students.attendee', compact(['attendee', 'status', 'attendance']));


             }
            }else{
                $status = "nottoday";
                $attendance="";
                return view('users.students.attendee', compact(['attendee', 'status', 'attendance']));
            }

        }else{
            $status = "not";
            $attendance="";
            return view('users.students.attendee', compact(['attendee', 'status', 'attendance']));
            // return redirect()->back()->with('fail','');
        }

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
