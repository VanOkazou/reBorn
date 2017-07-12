<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Techno;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminTechnosController extends Controller
{

    private $validationRules = [
        'name' => 'required|filled|unique:technos|max:255',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technos = Techno::all()->sortByDesc('created_at');
        
        return View('Admin.technos.index', compact('technos'));
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //init
        $input = $request->input();
        $files = $request->file();
        if(isset($files['icon'])) {
            $iconName = 'images/icon/'.$files['icon']->getClientOriginalName();
            $files['icon']->move(public_path('images/icon/'), $iconName);
        }

        $validator = $this->validateRules($request->all());

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors());
        }

        $techno = new Techno();
        $techno->name = $input['name'];
        $techno->icon = $iconName;
        $techno->type = $input['type'];
        $techno->save();

        Session::flash('message', 'la techno ' . $techno->name . ' a été crée !');
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
        $input = $request->input();
        $files = $request->file();
        $techno = Techno::find($id);

        $iconName = $techno->icon;
        if(isset($files['icon'])) {
            $iconName = 'images/icon/'.$files['icon']->getClientOriginalName();
            $files['icon']->move(public_path('uploads'), $iconName);
        }

        // Update project
        $techno->icon = $iconName;
        $techno->type = $input['type'];
        $techno->save();

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
        $techno = Techno::find($id);
        $msg = $techno->name . ' a été supprimé !';
        $techno->delete();

        Session::flash('message', $msg);
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
