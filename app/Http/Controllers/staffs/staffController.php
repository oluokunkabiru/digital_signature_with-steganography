<?php

namespace App\Http\Controllers\staffs;

use App\Http\Controllers\Controller;
use App\Http\Requests\studentRegisterRequest;
use App\Models\Attendance;
use App\Models\Attendee;
use App\Models\Faculty;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class staffController extends Controller
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
        $attendances = Attendance::with(['user', 'faculty', 'department', 'course'])->orderBy('id', 'desc')->whereDate('date','=', $today)->get();
        $incomingattendances = Attendance::with(['user', 'faculty', 'department', 'course'])->orderBy('id', 'desc')->whereDate('date','>', $today)->get();
        $tattendances = Attendance::with(['user', 'faculty', 'department', 'course'])->orderBy('id', 'desc')->get();
        $students = User::where('role', 'student')->OrderBy('id','desc')->get();
        $totalatendee = Attendee::get();
        $todayatendee = Attendee::whereDate('created_at', $today)->get();

        return view('users.staffs.dashboard', compact([ 'todayatendee','totalatendee','students', 'attendances', 'tattendances', 'incomingattendances']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function staffsInfo(){
        $students = User::where('role', 'staff')->OrderBy('id','desc')->get();
         return view('users.staffs.staff-info.index', compact(['students']));
     }
    public function create()
    {
        //
        $faculties = Faculty::orderBy('id', 'desc')->get();

        return view('users.staffs.staff-info.create', compact(['faculties']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(studentRegisterRequest $request)
    {
        //
        $student = new User();
        $student->name = $request->sname." ". $request->fname." ". $request->lname;
        $student->password = Hash::make(strtolower($request->fname));
        $student->email = $student->nextStaffEmail($request->sname,$request->fname,$request->lname);
        $student->country = $request->country;
        $student->dob = $request->dob;
        $student->city = $request->city;
        $student->state = $request->state;
        $student->faculty_id = $request->faculty;
        $student->department_id = $request->dept;
        $student->level = $request->level;
        $student->phone = $request->phone;
        $student->gender = $request->gender;
        $student->role = "staff";
        $student->save();
        return redirect()->route('manage-staffs')->with('success', 'New staff '. $student->name.' added successfully');

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
        $student = User::with(['faculty', 'department'])->where('id', $id)->firstOrfail();
        $faculties = Faculty::orderBy('id', 'desc')->get();
        return view('users.staffs.staff-info.update', compact(['student', 'faculties']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(studentRegisterRequest $request, $id)
    {
        //
        $student = User::where('id', $id)->first();
        $student->name = $request->sname." ". $request->fname." ". $request->lname;
        $student->country = $request->country;
        $student->dob = $request->dob;
        $student->city = $request->city;
        $student->state = $request->state;
        $student->faculty_id = $request->faculty;
        $student->department_id = $request->dept;
        $student->level = $request->level;
        $student->phone = $request->phone;
        $student->gender = $request->gender;

        $student->update();
        return redirect()->route('manage-staffs')->with('success', $student->name.' details updated successfully');

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
        $user = User::where('id', $id)->firstOrFail();
        $user->forceDelete();
        return redirect()->back()->with('success', 'Staff '. $user->name.' deleted successfully');

    }
}
