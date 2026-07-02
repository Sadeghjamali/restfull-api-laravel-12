<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return $this->showAll($users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=> 'required|email|unique:users',
            'password'=> 'required|confirmed'
        ]);
        $data = $request->all();
        $data['password']=bcrypt($request->password);
        $data['verified']=User::UNVERIFIED_USER;
        $data['verification_token']=User::generateVerificationCode();
        $data['admin']=User::REGULAR_USER;
        $user = User::create($data);

        return $this->showOne($user,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return $this->showOne($user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'email'=> 'email|unique:users,email,' .$user->id,
            'password'=> 'confirmed',
            'admin'=> 'in:' . User::ADMIN_USER . ',' .User::REGULAR_USER 
        ]);

        if($request->has('name')){
            $user->name = $request->name;
        }

        if ($request->has('email') && $user->email !== $request->email) {
            $user->email = $request->email;
            $user->verified = User::UNVERIFIED_USER;
            $user->verification_token = User::generateVerificationCode();
        }

        if($request->has('password')){
            $user->password = bcrypt($request->password);
        }

        if ($request->has('admin')) {
            if (!$user->isVerified()) {
                return $this->errorResponse('only Verified user can modify the admin field',409);
            }
            $user->admin = $request->admin;
        }

        if (!$user->isDirty()) {
            return $this->errorResponse('You need to specify a different value to update',422);
        }

        $user->save();
        return $this->showOne($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return $this->showOne($user);
    }
}
