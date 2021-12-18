<?php

namespace App\Http\Controllers\Staffs;

use App\Http\Controllers\Controller;
use App\Http\Requests\deptRequest;
use App\Models\Department;
use App\Models\Faculty;
use Illuminate\Http\Request;

class DeptController extends Controller
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
        $departments = Department::with(['faculty'])->orderBy('id', 'desc')->get();
        return view('users.staffs.department.index', compact(['faculties', 'departments']));
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
    public function store(deptRequest $request)
    {
        //

        $dept = new Department();
        $dept->dept = $request->dept;
        $dept->faculty_id = $request->faculty;
        $dept->save();
        return redirect()->back()->with('success', 'New depatment '. ucwords($request->dept).' created succesfully');
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
    public function update(deptRequest $request, $id)
    {
        //

        $dept = Department::where('id', $id)->firstOrFail();
        $dept->dept = $request->dept;
        $dept->faculty_id = $request->faculty;
        $dept->update();
        return redirect()->back()->with('success',  ucwords($request->dept).' updated succesfully');
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

        $dept = Department::where('id', $id)->firstOrFail();
        $dept->forceDelete();
        return redirect()->back()->with('success', 'Department '. $dept->dept.' deleted successfully');
    }
}
