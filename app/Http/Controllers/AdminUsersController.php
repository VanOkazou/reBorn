<?php

namespace App\Http\Controllers;


use App\Models\Techno;
use App\Models\User;
use App\TechnoUserPivot;
use Illuminate\Support\Facades\Auth;
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
        'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'bgimg' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
        $user = User::find($id);

        $technos = Techno::pluck('name', 'id');
        return View('admin.users.edit' , compact('user','technos'));
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
        $files = $request->file();
        $user = User::find($id);


        //Check with validator
        $validator = $this->validateRules($request->all());

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput($input);
        }

        // Prepare images
        $avatarName = $user->avatar;
        $bgimgName = $user->bgimg;

        if(isset($files['avatar'])) {
            $avatarName = 'uploads/' . time().'-'.$files['avatar']->getClientOriginalName();
            $files['avatar']->move(public_path('uploads'), $avatarName);
        }

        if(isset($files['bgimg'])) {
            $bgimgName = 'uploads/' . time().'-'.$files['bgimg']->getClientOriginalName();
            $files['bgimg']->move(public_path('uploads'), $bgimgName);
        }

        //Update if Ok
        $dataUpdate = [
          'username' => $input['username'],
          'slug' => $input['slug'],
          'about' => $input['about'],
          'slogan' => $input['slogan'],
          'avatar' =>  $avatarName,
          'bgimg' => $bgimgName,
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

        //Pourcentage et version
        $user->technos()->save(Techno::find($input['techno']),
            [
            'pourcentage' => $input['pourcentage'],
                'version' => $input['version']
            ]);


        Session::flash('message', 'Votre profil a été modifié !');
        return redirect()->back();
    }

    /**
     * Store a techno for an user
     *
     */
    public function storeTechno($id, $version, $percent)
    {
        $user = User::find(Auth::id());
        $user->technos()->save(Techno::find($id),
            [
                'pourcentage' => $percent,
                'version' => $version
            ]);
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
     * Remove a techno.
     *
     * @param  int  $idTechno
     * @return \Illuminate\Http\Response
     */
    public function destroyTechno($idTechno)
    {
        $user = User::find(Auth::id());
        $user->technos()->detach(Techno::find($idTechno));
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
