<?php

namespace App\Http\Controllers\staffs;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Attendee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
