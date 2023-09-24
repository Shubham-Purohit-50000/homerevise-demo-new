<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Activation;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function create($type, $id)
    {
        $data['type'] = $type;
        $data['id'] = $id;
        
        // You can load data for dropdowns like standards and subjects here
        return view('courses.create', compact('data'));
    }

    public function store(Request $request)
    {
        
        if ($request->type == 'subject') {
            $request->merge(['subject_id' => $request->id]);
        } elseif ($request->type == 'standard') {
            $request->merge(['standard_id' => $request->id]);
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'folder_name' => 'nullable|string|max:255',
            'duration' => 'required|numeric',
            'count' => 'required|numeric',
            'status' => 'required|numeric',
        ]);

        $course = Course::create($request->all());

        for($i = 0; $i < $request->count; $i++){

            // Generate a unique 10-digit activation key
            $activationKey = 'HR'.generateRandomString(6);

            // Check if the generated key already exists in the activations table
            while (Activation::where('activation_key', $activationKey)->exists()) {
                // If it exists, generate a new key and check again
                $activationKey = 'HR'.generateRandomString(6);
            }

            Activation::create([
                'course_id' => $course->id,
                'activation_key' => $activationKey,
            ]);
        }

        return redirect()->route('courses.index')
            ->with('success', 'Course created successfully.');
    }

    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        // You can load data for dropdowns like standards and subjects here
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'duration' => 'required|numeric',
            'status' => 'required|numeric',
        ]);

        $course->update($validatedData);

        return redirect()->route('courses.index')
            ->with('success', 'Course updated successfully.');
    }

    public function showActivation(Course $course){
        return view('courses.show', compact('course'));
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')
            ->with('success', 'Course deleted successfully.');
    }

    function deleteActivation($id){
        $activation = Activation::findOrFail($id);
    
        $activation->delete();
        return redirect()->back()
            ->with('success', 'Key deleted successfully.');
    }

}
