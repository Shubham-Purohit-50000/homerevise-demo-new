<?php

namespace App\Http\Controllers;

use App\Models\Standard;
use App\Models\Subject;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Storage;

class SubjectController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search'); // Get the search input from the request
        $query = Subject::with('standard');

        if (!empty($search)) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        $subjects = $query->paginate(10)->appends(['search' => $search]); // 10 chapters per page

        return view('subjects.index', compact('subjects', 'search'));
    }

    public function create()
    {
        $standards = Standard::all();
        return view('subjects.create', compact('standards'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'folder_name' => 'required|string|max:255',
            'standard_id' => 'required|exists:standards,id',
        ]);

        Subject::create($validatedData);

        return redirect()->route('subjects.index')
            ->with('success', 'Subjects created successfully');
    }

    public function edit(Subject $subject)
    {
        $standards = Standard::all();
        return view('subjects.edit', compact('subject'), compact('standards'));
    }

    public function update(Request $request, Subject $subject)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'standard_id' => 'required|exists:standards,id',
        ]);

        $subject->update($validatedData);

        return redirect()->route('subjects.index')
            ->with('success', 'Subjects updated successfully');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->route('subjects.index')
            ->with('success', 'Subject deleted successfully');
    }

    public function show(){
        return view('subjects.import');

    }
    public function subjectBulkUpload(Request $request){
        if($request->all('subjectFile')['subjectFile'] ){
            if($request->all('subjectFile')['subjectFile']){
                $file = $request->file('subjectFile');
                $spreadsheet = IOFactory::load($file);
                $worksheet = $spreadsheet->getActiveSheet();
                $columns = [];
                foreach ($worksheet->getRowIterator() as $row) {
                    $cellIterator = $row->getCellIterator();
                    $rowData = [];
                    foreach ($cellIterator as $cell) {
                        $rowData[] = $cell->getValue();
                    }
                    $columns[] = $rowData;
                }
                $result = array_slice($columns, 1);
                if(count($result) > 0){
                    
                    foreach ($result as $column){ 
                        $subject = new Subject;
                        $subject->name = $column[0];
                        $subject->standard_id = $column[1];
                        $subject->folder_name = $column[2]; 
    
                        $subject->save();
                    }
                }else{
                    return redirect()->route('subjects.index')
                    ->with('success', 'Corrupt Subject File Inputs.');
                }
            }
     

            return redirect('/admin/subjects/index')
            ->with('success', 'Data Imported Successfully.');

        }        

        return redirect('/admin/subjects/index')
        ->with('success', 'Please Select the File.');
    }


    public function subjectAddCourses(){
        $subject = Subject::all();
        return view('subjects.add-courses',compact('subject'));
    }
}
