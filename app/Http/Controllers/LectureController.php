<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\File;
use App\Models\Group;
use App\Models\Lecture;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses=Course::all();
        $groups=Group::all();
        $lectures=Lecture::all();
        return view("lectures.index",['lectures'=>$lectures, 'groups'=>$groups, 'courses'=>$courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Group $group)
    {
        $groups=Group::all();
        return view('lectures.create',['groups'=>$groups]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lecture = new Lecture();
        $lecture->name = $request->name;
        $lecture->group_id = $request->group_id;
        $lecture->data = $request->data;
        $lecture->about = $request->about;
        $lecture->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function show(Lecture $lecture)
    {
        $files=File::all();
        return view("lectures.show",['files'=>$files, 'lecture'=>$lecture]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function edit(Lecture $lecture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lecture $lecture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecture $lecture)
    {
        //
    }


    public function groupLectures ($group_id){
        $group=Group::find($group_id);
        $lectures=Lecture::where('group_id', $group_id)->get();
        return view('lectures.index',['lectures'=>$lectures, 'group'=>$group]);
    }




}
