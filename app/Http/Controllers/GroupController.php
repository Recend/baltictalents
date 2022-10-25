<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Group;
use App\Models\Group_User;
use App\Models\User;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        $users = User::with('teacher')->where('role', '==', 'teacher')->get();
        $groups=Group::with(['teacher'])->where('teacher_id',  Auth::user()->id)->get();
        $grupe=Group::all();
        $courses=Course::all();
        $students=Group_User::all();
        $users=User::find($request->user()->id);
         if ($users->role =='teacher'){
         return view("groups.index",['groups'=>$groups, 'courses'=>$courses, 'users'=>$users, 'students'=>$students]);
         }else{
          return view("students.courses",['grupe'=>$grupe, 'courses'=>$courses, 'users'=>$users, 'students'=>$students]);
         }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups=Group::all();
        $courses=Course::all();
        return view('groups.create',['groups'=>$groups, 'courses'=>$courses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $groups = new Group();
            $groups->name = $request->name;
            $groups->course_id = $request->course_id;
            $groups->teacher_id = $request->teacher_id;
            $groups->begins = $request->begins;
            $groups->ends = $request->ends;

            $groups->save();



        return redirect()->route('groups.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        $course=Course::all();
        $user=User::all();
        return view("groups.update",['group'=>$group, 'course'=>$course, 'user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $group->course_id=$request->course_id;
        $group->teacher_id=$request->teacher_id;
        $group->name=$request->name;
        $group->begins=$request->begins;
        $group->ends=$request->ends;
        $group->save();
        return redirect()->route('groups.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $group->delete();
        return redirect()->back();
    }

    public function groupStudents ($user_id){
        $groups=Group::find($user_id);
        $students=Group_User::where('user_id', $user_id)->get();
        $users=User::all();
        return view('students.index',['students'=>$students, 'groups'=>$groups, 'users'=>$users]);
    }

    public function viewStudent(){
        $users=User::all();
        $groups=Group::all();
        return view('groups.addstudent',['groups'=>$groups, 'users'=>$users]);
    }

    public function addStudent(Request $request){
         $students = new Group_User();
        $students->group_id = $request->group_id;
        $students->user_id = $request->user_id;
        $students->save();
        return redirect()->route('groups.index');

    }
}
