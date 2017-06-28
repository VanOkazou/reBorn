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

            // Copy and delete attachment to public/uploads folder
            copy(storage_path('app/public/tmp/' . $attachment->url), public_path('uploads/'. $attachment->url));
            unlink(storage_path('app/public/tmp/' . $attachment->url));
        }

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
        $project = Project::find($id);

        return View('admin.projects.show' , compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        $cats = [];
        $categories = Category::all();

        foreach($project->categories as $cat) {
            array_push($cats, $cat->name);
        }
        return View('admin.projects.edit' , compact('project','categories','cats'));
    }

    public function update(Request $request, $id)
    {
        //init
        $input = $request->input();
        $files = $request->file();
        $project = Project::find($id);

        $validator = $this->validateRules($request->all());

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput($input);
        }

        $uneName = $project->une;
        if(isset($files['une'])) {
            $uneName = 'uploads/' . time().'-'.$files['une']->getClientOriginalName();
            $files['une']->move(public_path('uploads'), $uneName);
        }


        // Update project
        $project = Project::find($id);
        $project->une = $uneName;
        $project->title = $input['title'];
        $project->description = $input['description'];
        $project->date = $input['date'];
        $project->save();

        if (count(scandir(storage_path('app/public/tmp'))) > 2 ) {
            $attachments = Attachment::all();
            foreach ($attachments as $attachment){
                if($attachment->project_id == $id){
                    $attachment->delete();
                }
            }

            //Create attachment
            $files = Storage::files('public/tmp');
            foreach ($files as $file){
                // Save image in database
                $newFile = explode('/', $file);
                $attachment = new Attachment();
                $attachment->url = end($newFile);
                $attachment->project_id = $project->id;
                $attachment->save();

                // Copy and delete attachment to public/uploads folder
                copy(storage_path('app/public/tmp/' . $attachment->url), public_path('uploads/'. $attachment->url));
                unlink(storage_path('app/public/tmp/' . $attachment->url));
            }
        }

        //Link belongToMany
        if(isset($input['category'])){

            $project->categories()->sync($input['category']);

        }else{

            $project->categories()->sync([]);
        }

        Session::flash('message', 'Modifications have been saved!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();

        Session::flash('message', 'Votre projet a été supprimé !');
        return redirect()->back();
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
