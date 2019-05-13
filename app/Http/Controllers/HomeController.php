<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    	$users = User::all();
        return view('home',["users"=>$users]);
    }

    /**
     * Load new form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create_form()
    {
	    return view( 'new');
    }

	/**
	 * Edit an user.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function create(Request $request)
	{
		$validator = \Validator::make($request->all(), [
			'name' => 'required|string',
			'lastname' => 'required|string',
			'tel' => 'required|numeric',
			'email' => 'required|e-mail',
		]);

		if ($validator->fails())
		{
			return view('error',['errors'=>$validator->errors()->all()]);
		}

		$name = $request->input( 'name' );
		$lastname = $request->input( 'lastname' );
		$tel = $request->input( 'tel' );
		$email = $request->input( 'email' );


		$user = new User;
		$user->name = $name;
		$user->lastname = $lastname;
		$user->tel = $tel;
		$user->email = $email;
		$user->password = md5('DefaultPassword!');
		if($user->save()) {
			return view( 'success');
		} else {
			return view('error');
		}
	}

	/**
     * Load edit form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id)
    {
    	$user = User::find($id);
	    return view( 'edit', ['user' => $user]);
    }

    /**
     * Edit an user.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function save($id, Request $request)
    {
	    $validator = \Validator::make($request->all(), [
		    'name' => 'required|string',
		    'lastname' => 'required|string',
		    'tel' => 'required|numeric',
		    'email' => 'required|e-mail',
	    ]);

	    if ($validator->fails())
	    {
		    return view('error');
	    }

	    $name = $request->input( 'name' );
	    $lastname = $request->input( 'lastname' );
	    $tel = $request->input( 'tel' );
	    $email = $request->input( 'email' );


    	$user = User::find($id);
    	$user->name = $name;
    	$user->lastname = $lastname;
    	$user->tel = $tel;
    	$user->email = $email;
    	if($user->save()) {
		    return view( 'success');
	    } else {
    		return view('error');
	    }
    }

    /**
     * Delete an user.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function delete($id)
    {
    	$user = User::findOrFail($id);
    	if($user->delete()) {
		    return view( 'success');
	    } else {
    		return view('error');
	    }
    }
}
