<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {
        $params = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:50',
            'password' => 'required|max:50',
        ]);
        User::create($params);
        $users = User::all();
        return view('user.index', compact('users'));
//        return redirect()->route('user.index', compact('users'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user=User::find($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user=User::find($id);
        $params = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:50',
            'password' => 'required|max:50',
        ]);
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->password=$request->input('password');
        $user->update();
        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $user=User::find($id);
        $user->forceDelete();
        $users = User::all();
        return view('user.index', compact('users'));
    }
}
