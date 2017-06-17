<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    private $validationRules = [
        'username' => 'required|filled|max:255',
        'slug' => 'required|filled',
        'about' => 'nullable|filled|string|',
        'slogan' => 'nullable|min:0|max:4294967295',
        'description' => 'nullable|min:0|max:4294967295',
        'email' => 'required|min:0|max:4294967295',
        'fb' => 'nullable|min:10|max:4294967295',
        'tw' => 'nullable|min:10|max:4294967295',
        'ln' => 'nullable|min:10|max:4294967295',
        'bh' => 'nullable|min:10|max:4294967295',
        'db' => 'nullable|min:10|max:4294967295',
        'viadeo' => 'nullable|min:10|max:4294967295',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return View('admin.index');
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
        //
    }


    public function show($id,Request $request)
    {
        $user = User::find($id);

        return View('admin.users.edit' , compact('user'));

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
     * @param  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request,$id)
    {
        $input = $request->input();

        //Check with validator
        $validator = $this->validateRules($request->all());

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput($input);
        }

        //Update if Ok
        $dataUpdate = [
          'username' => $input['username'],
          'slug' => $input['slug'],
          'about' => $input['about'],
          'slogan' => $input['slogan'],
          'description' => $input['description'],
          'lastname' => $input['lastname'],
          'firstname' => $input['firstname'],
          'job' => $input['job'],
          'city' => $input['city'],
          'email' => $input['email'],
          'fb' => $input['facebook'],
          'tw' => $input['twitter'],
          'ln' => $input['linkedin'],
          'bh' => $input['behance'],
          'db' => $input['dribble'],
          'viadeo' => $input['viadeo'],
        ];
        User::where('id', $id)
            ->update($dataUpdate);

        Session::flash('message', 'Votre profil a été modifié !');
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
