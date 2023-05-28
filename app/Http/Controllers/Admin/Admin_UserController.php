<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use DB;

class Admin_UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::get();

        return view("admin.user.index", compact("data"));
    }

    // Edit table - apply changes
    public function action(Request $request)
    {
    	if ($request->ajax()) {

    		if ($request->action == 'edit')
            {
    			$data = array(
                    'username' => $request->username,
    				'first_name' => $request->first_name,
    				'last_name' => $request->last_name,
                    'middle_name' => $request->middle_name,
    				'email' => $request->email,
                    'phone' => $request->phone,
                    'country_id' => $request->country_id,
                    'city' => $request->city,
                    'region' => $request->region,
                    'street_address' => $request->street_address,
                    'street_address_2' => $request->street_address_2,
                    'zip_code' => $request->zip_code,
                    'created_at' => $request->created_at,
    			);
    			User::where('id', $request->id)->update($data);
    		}

    		if ($request->action == 'delete')
    		{
    			User::where('id', $request->id)->delete();
                DB::table('model_has_roles')->where('model_id', $request->id)->delete();
    		}
    		return response()->json($request);
    	}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.user.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_user = new User();
        
        $new_user->email = $request->email;
        $new_user->password = $request->password;
        $new_user->first_name = $request->first_name;
        $new_user->last_name = $request->last_name;
        $new_user->middle_name = $request->middle_name;
        $new_user->phone = $request->phone;
        $new_user->country_id = $request->country_id;
        $new_user->city = $request->city;
        $new_user->region = $request->region;
        $new_user->zip_code = $request->zipcode;
        $new_user->street_address = $request->street_address;
        $new_user->street_address_2 = $request->street_address_2;

        $new_user->assignRole("consumer");

        $new_user->save();

        return redirect()->back()->withSuccess("User was added successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
