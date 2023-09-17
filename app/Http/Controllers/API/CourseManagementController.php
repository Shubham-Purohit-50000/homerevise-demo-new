<?php

namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Exception;
use App\Models\Activation;

class CourseManagementController extends BaseController
{
    public function addKey(Request $request){
        $user = auth()->user();
        $data = $request->validate([
            'activation_key' => 'required|exists:activations,activation_key',
        ]);
        $activation = Activation::where('activation_key', $request->activation_key)->first();
        $activation->user_id = $user->id;
        $activation->save();

        $data['status'] = true;

        return $this->sendResponse($data, 'Course activation Key added Successfully.');
    } 
    public function course_old(Request $request){
        $couser = auth()->user()->activation->course;//->standard->subject->chapter->topic;//->with('subtopic');
        return response()->json($couser);
    }

    public function course(Request $request) {
        // Get the authenticated user
        $user = auth()->user();
    
        // Check if the user has an activation and related models
        if ($user->activation) {
            $activation = $user->activation;//->course->standard;
    
            if ($activation) {
                // Load the subjects with chapters and topics
                $activation->load('course.standard.subjects.chapters.topics.subtopics');
    
                //return response()->json(['activation'=>$activation]);
                return $this->sendResponse(['activation'=>$activation], 'user course details.');
            }
        }
    
        // Handle the case where there's no activation or standard associated with the user.
        return response()->json(['message' => 'No standard found for this user.'], 404);
    }
    
    
}