<?php

namespace App\Http\Controllers\Staffs;

use App\Http\Controllers\Controller;
use App\Http\Requests\facultRequest;
use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(facultRequest $request)
    {
        //
        $faculty = new Faculty();
        $faculty->faculty = $request->faculty;
        $faculty->save();
        return redirect()->back()->with('success', 'New faculty '. ucwords($request->faculty).' added successfully ');


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
    public function update(facultRequest $request, $id)
    {
        //
        $faculty = Faculty::where('id', $id)->firstOrFail();
        $faculty->faculty = $request->faculty;
        $faculty->update();
        return redirect()->back()->with('success', 'Faculty <b>'. $faculty->faculty.'</b> updated successfully');
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

        $faculty = Faculty::where('id', $id)->firstOrFail();
        $faculty->forceDelete();
        return redirect()->back()->with('success', 'faculty '. $faculty->faculty.' deleted successfully');
    }
}
