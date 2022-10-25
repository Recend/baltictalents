<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Lecture;
use Illuminate\Http\Request;

class FileController extends Controller
{

    public function __construct()
    {
    }

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
    public function store(Request $request)
    {
        $failas= new File();
        $file=$request->file('file');
        $filename=$request->lecture_id.'-'.rand().'.'.$file->extension();
        $failas->lecture_id=$request->lecture_id;
        $failas->file=$filename;
        $failas->name=$request->name;
        $file->storeAs('files',$filename);
        $failas->save();

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        $files=File::all();
        return view("lectures.show",['files'=>$files, 'file'=>$file]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        unlink( storage_path('/app/files/'.$file->file));
        $file->delete();
        return redirect()->back();
    }


    public function display($name,Request $request){
        $file=storage_path('app/files/'.$name);
        return response()->file( $file );
    }

    public  function hide(File $file, Request $request, $add)
    {
        $file=File::find($add);
        $file->showhide=$request->showhide;
        $file->save();
        return redirect()->back();
    }

    public  function unhide(File $file, Request $request, $remove)
    {
        $file=File::find($remove);
        $file->showhide=$request->showhide;
        $file->save();
        return redirect()->back();
    }

    public  function download( $id)
    {
        $failas= storage_path('/app/files/'.$id);
        return response()->download( $failas);

    }


}
