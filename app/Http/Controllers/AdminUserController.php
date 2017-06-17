<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class AdminUserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @var array
     */
    private $validationRules = [
        'username' => 'required|filled|alpha_dash|unique:products,sku|max:255',
        'slug' => 'required|filled|digits_between:12,13|unique:products,barcode',
        'about' => 'required|filled|string|max:255',
        'slogan' => 'nullable|integer|min:0|max:4294967295',
        'description' => 'nullable|integer|min:0|max:4294967295',
        'email' => 'nullable|integer|min:0|max:4294967295',
        'fb' => 'nullable|integer|min:0|max:4294967295',
        'tw' => 'nullable|integer|min:0|max:4294967295',
        'ln' => 'nullable|integer|min:0|max:4294967295',
        'bh' => 'nullable|integer|min:0|max:4294967295',
        'db' => 'nullable|integer|min:0|max:4294967295',
        'viadeo' => 'nullable|integer|min:0|max:4294967295',
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $input = Input::all();

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
        $user = User::where('id', $id)
            ->update($dataUpdate);

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
}
