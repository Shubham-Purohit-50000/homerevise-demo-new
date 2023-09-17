<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Activation;
use Illuminate\Http\Request;
use Hash;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'activation_key' => 'required|exists:activations,activation_key',
        ]);

        $data['password'] =  Hash::make($request->password);

        $user = User::create($data);
        $activation = Activation::where('activation_key', $request->activation_key)->first();
        if($activation->user_id == null){
            $activation->user_id = $user->id;
            $activation->activation_time = Carbon::now();
            $activation->save();
        }else{
            return redirect()->route('users.index')->with('error', 'This activation key is already in use, please asign a new key to this user');
        }
        

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->all();

        if($request->has('password')){
            $data['password'] =  Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function addKey(User $user){
        return view('users.addCourse', compact('user'));
    }

    public function submitKey(Request $request, User $user){
        $data = $request->validate([
            'activation_key' => 'required|exists:activations,activation_key',
        ]);
        $activation = Activation::where('activation_key', $request->activation_key)->first();
        $activation->user_id = $user->id;
        $activation->activation_time = Carbon::now();
        $activation->save();

        return redirect()->route('users.index')->with('success', 'Course added successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
