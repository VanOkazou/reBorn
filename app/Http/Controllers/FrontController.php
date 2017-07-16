<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use App\Models\Techno;
use App\Models\User;

class FrontController extends Controller
{

    /**
     * Display Homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function homeIndex()
    {
        $users = User::all();
        $projects = Project::with('categories')->get();
        $cats = Category::all();

        foreach ($projects as $project) {
            $arr_cats = [];

            foreach ($project->categories as $cat) {
                array_push($arr_cats, ucfirst($cat->name));
            }

            $stringCats = implode(' | ', $arr_cats);
            $project['stringCats'] = $stringCats;
        }

        return View('pages.homepage', compact('users', 'projects', 'cats'));
    }

    /**
     * Display an evangelist.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function evangelistIndex(User $user)
    {
        $initialFirstname = $user->firstname[0];
        $initialLastname = $user->lastname[0];

        // Projects
        $user->load('projects', 'technos');
        $projects = $user->projects()->with('categories')->get();
        $cats = Category::all();
        $arr_cat = [];
        foreach ($projects as $project) {
            $arr_cats = [];
            foreach ($project->categories as $cat) {
                array_push($arr_cats, ucfirst($cat->name));
                if(!in_array($cat->name, $arr_cat, true)){
                    array_push($arr_cat, $cat->name);
                }
            }

            $stringCats = implode(' | ', $arr_cats);
            $project['stringCats'] = $stringCats;
        }

        // Technos
        $experts = [];
        if(!is_null($user->expert)) {
            foreach(unserialize($user->expert) as $expert) {
                $technoExpert = Techno::find($expert);
                array_push($experts, $technoExpert);
            }
        }

        return View('pages.evangelist', compact('user', 'initialFirstname', 'initialLastname', 'projects', 'arr_cat', 'experts'));
    }

    /**
     * Display a project.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function projectIndex($id)
    {
        $project = Project::findOrFail($id)->load('attachments', 'users');

        // Categories
        $arr_cats = [];
        foreach ($project->categories as $cat) {
            array_push($arr_cats, ucfirst($cat->name));
        }
        $stringCats = implode(' | ', $arr_cats);
        $project['stringCats'] = $stringCats;

        return View('pages.project', compact('project'));
    }

}
