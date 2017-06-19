<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminProjectsController extends Controller
{
    private $validationRules = [
        'title' => 'required|filled|max:255',
        'description' => 'required|filled',
        'date' => 'nullable|filled|string|',
    ];
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
        $file->move(storage_path('app/public/tmp'), $filename);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //init
        $input = $request->input();
        $arrayImg = [];

        $validator = $this->validateRules($request->all());

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput($input);
        }

        //Create project
        $project = new Project();
        $project->title = $input['title'];
        $project->description = $input['description'];
        $project->date = $input['date'];
        $project->save();

        //Create attachment
        $files = Storage::files('public/tmp');
        foreach ($files as $file){


            // Save image in database
            $newFile = explode('/', $file);
            $attachment = new Attachment();
            $attachment->url = end($newFile);
            $attachment->project_id = $project->id;
            $attachment->save();

            // Move attachment to public/uploads folder
            Storage::move('public', storage_path());
        }

        //delete attachments from storage directory
        //Storage::deleteDirectory('app/public/tmp');

        //Link belongToMany
        $project->categories()->attach($input['category']);
        $project->users()->attach(Auth::id());

        Session::flash('message', 'Votre projet a été crée !');
        return redirect()->back();

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

    /**
     * @param array $attributes
     * @return Validator
     */
    private function validateRules(array $attributes)
    {
        return Validator::make($attributes, $this->validationRules);
    }
}
