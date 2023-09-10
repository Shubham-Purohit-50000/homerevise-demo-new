<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ChartController;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use Auth;

class AdminController extends Controller
{

    public function login(){
        return view('backend.login');
    }

    public function postLogin(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('admin')
                        ->withSuccess('You have Successfully loggedin');
        }
  
        return redirect("admin/login")->with('error','Oppes! You have entered invalid credentials');
    }

    public function dashboard(){
        return view('backend.dashboard');
    }

    public function userList(){
        return view('backend.user_list');
    }

    public function createUser(){
        return view('backend.create_user');
    }
    
    public function plans(){
        return view('backend.plan_list');
    }

    public function createPlan(){
        return view('backend.create_plan');
    }

    public function states(){
        return view('backend.state_list');
    }

    public function createState(){
        return view('backend.create_state');
    }

    public function boards(){
        return view('backend.board_list');
    }

    public function createBoard(){
        return view('backend.create_board');
    }

    public function medium(){
        return view('backend.medium_list');
    }

    public function createMedium(){
        return view('backend.create_medium');
    }

    public function requestSession(){
        return view('backend.request_session_list');
    }

    public function quizedList(){
        return view('backend.quize_list');
    }
    
    public function quizCreate(){
        return view('backend.create_quiz');
    }

    public function journelsList(){
        return view('backend.journel_list');
    }

    public function createJournel(){
        return view('backend.create_journel');
    }

    public function requestCounselling(){
        return view('backend.request_counselling');
    }

    public function therapyIntake(){
        return view('backend.therapy_intake');
    }
    
    public function counsellorList(){
        return view('backend.counsellor_list');
    }

    public function transactions(){
        return view('backend.transaction_list');
    }
    
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login'); // You can redirect the user to any URL after logout.
    }
}
