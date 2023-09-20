<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ChartController;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Setting;
use Auth;
use Hash;
use Illuminate\Support\Facades\Storage;

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
            return redirect()->intended('admin/dashboard')
                        ->withSuccess('You have Successfully loggedin');
        }
  
        return redirect("/")->with('error','Oppes! You have entered invalid credentials');
    }

    public function dashboard(){
        return view('backend.dashboard');
    }

    
    public function setting(){
        $settings = Setting::get();
        return view('backend.setting', compact('settings'));
    }
    
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/'); // You can redirect the user to any URL after logout.
    }

    public function maintainanceMode(Request $request){

        $request->validate([
            'maintain_mode' => 'required',
            'message' => 'required|string|max:250',
        ]);

        $app_maintainance = Setting::where('setting_option', 'app_maintainance')->first();
        $app_maintainance->value = $request->all();
        $app_maintainance->update();

        return redirect()->back()
            ->with('success', 'setting updated successfully.');
    }

    public function appVerion(Request $request){
        
        $request->validate([
            'link' => 'required|string|max:250',
            'version' => 'required|string|max:250',
        ]);

        $setting = Setting::where('setting_option', 'app_version')->first();
        $setting->value = $request->all();
        $setting->update();

        return redirect()->back()
            ->with('success', 'setting updated successfully.');
    }

    public function pages(Request $request){
        $request->validate([
            'privacy_policy' => 'required',
            'term_condition' => 'required',
            'Support' => 'required',
        ]);

        $setting = Setting::where('setting_option', 'pages')->first();
        $setting->value = $request->all();
        $setting->update();

        return redirect()->back()
            ->with('success', 'setting updated successfully.');
    }

    public function announcement(Request $request){
        
        $request->validate([
            'status' => 'required|string',
            'heading' => 'required|string',
            'body' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $input = $request->all();
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('announcement_pictures', 'public');
            // Save the image path in the user's database record
            $input['image'] = $imagePath;
        }

        $setting = Setting::where('setting_option', 'announcements')->first();
        $setting->value = json_encode($input);
        $setting->update();

        return redirect()->back()
            ->with('success', 'setting updated successfully.');
    }

    public function base_url(Request $request){

        $request->validate([
            'url' => 'required',
        ]);

        $setting = Setting::where('setting_option', 'base_url')->first();
        $setting->value = $request->all();
        $setting->update();

        return redirect()->back()
            ->with('success', 'setting updated successfully.');
    }

}
