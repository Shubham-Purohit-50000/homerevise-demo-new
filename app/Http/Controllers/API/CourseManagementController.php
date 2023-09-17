<?php

namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Exception;
use App\Models\Activation;
use Carbon\Carbon;

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

    public function course_old(Request $request) {
        // Get the authenticated user
        $user = auth()->user();
    
        // Check if the user has an activation and related models
        if ($user->activation) {
            $activation = $user->activation;//->course->standard;
    
            if (filled($activation->course->standard)) {
                $activation->load('course.standard.subjects.chapters.topics.subtopics');
            }
            if (filled($activation->subject)) {
                $activation->load('course.subject.chapters.topics.subtopics');
            }

            return $this->sendResponse(['activation'=>$activation], 'user course details.');
        }
        // Handle the case where there's no activation or standard associated with the user.
        return response()->json(['message' => 'No standard found for this user.'], 404);
    }

    public function course(Request $request) {
        // Get the authenticated user
        $user = auth()->user();
    
        // Get all activation keys associated with the user
        $activations = $user->activation;
    
        // Check if the user has any activation keys
        if ($activations->isEmpty()) {
            return $this->sendError('Unauthorised.', ['error' => 'No activation keys found for this user.'], 401);
        }
    
        // Initialize an array to store activation details for all keys
        $activationDetails = [];
    
        // Loop through each activation key and load related models
        foreach ($activations as $activation) {
            $activationData = [];
    
            if (filled($activation->course->standard)) {

                $givenDatetime = Carbon::parse($activation->activation_time);
                $futureDatetime = $givenDatetime->addMonths($activation->course->duration);
                $futureDatetimeFormatted = $futureDatetime->format('Y-m-d H:i:s');

                $isExpired = Carbon::now()->greaterThan($futureDatetime);

                if ($isExpired) {
                    // The course is expired
                    $activationData['course_status'] = 'expired';
                } else {
                    // The course is not expired
                    $activationData['course_status'] = 'active';
                }

                $activationData['expiry_time'] = $futureDatetimeFormatted;
                $activationData['course'] = $activation->load('course.standard.subjects.chapters.topics.subtopics');
                //$activation->load('course.standard.subjects.chapters.topics.subtopics');
            }
    
            if (filled($activation->subject)) {
                $activationData['subject'] = $activation->load('course.subject.chapters.topics.subtopics');
                //$activation->load('course.subject.chapters.topics.subtopics');
            }
    
            // You can load more related data as needed
    
            $activationDetails[] = $activationData;
        }
        return $this->sendResponse($activationData, 'user course details.');
    }
    
    
    
}