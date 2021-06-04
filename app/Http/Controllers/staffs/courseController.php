<?php

namespace App\Http\Controllers\staffs;

use App\Http\Controllers\Controller;
use App\Http\Requests\courseRequest;
use App\Models\Course;
use App\Models\Department;
use App\Models\Faculty;
use Illuminate\Http\Request;

class courseController extends Controller
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
        return view('users.staffs.courses.index', compact(['faculties']));
    }

    public function selesctFaculty(Request $request){
        $id =  $request->facultyid;
        $depts = Department::where('faculty_id', $id)->orderBy('id', 'desc')->get();
        return view('users.staffs.courses.departmenList', compact(['depts']));
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
    public function store(courseRequest $request)
    {
        //
        $course = new Course();
        $course->code = $request->coursecode;
        $course->title = $request->coursetitle;
        $course->unit = $request->courseunit;
        $course->faculty_id = $request->faculty;
        $course->department_id = $request->dept;
        $course->level = $request->level;
        $course->save();
        return redirect()->back()->with('success', 'New course '. $request->coursetitle.' added successfully');

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
