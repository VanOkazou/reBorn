<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\Category;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $user = User::find(Auth::id());

        $user->load('projects.categories');
        return View('admin.projects.index' , compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return View('admin.projects.create' , compact('categories'));
    }

    public function uploadImage(Request $request){

        $file = $request->file('file');

        $filename = uniqid() . $file->getClientOriginalName();

        // * 3
        $file->move('uploads/images', $filename);

        // * 4
        $lastProjectId = Project::all()->last()->id;

        $image = new Attachment();
        $image->url = 'uploads/images/' . $filename;
        $image->user_id = Auth::id();
        $image->project_id = $lastProjectId;
        $image->save();



        //var_dump($bo);
        //return $image;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->input();

        dd($input);
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
