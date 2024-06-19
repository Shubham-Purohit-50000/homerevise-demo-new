<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Chapter;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Storage;

class ChapterController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search'); // Get the search input from the request
        $query = Chapter::with('subject');

        if (!empty($search)) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        $chapters = $query->paginate(10)->appends(['search' => $search]); // 10 chapters per page

        return view('chapters.index', compact('chapters', 'search'));
//        return view('chapters.index');
    }

    public function create()
    {
        $subjects = Subject::all();
        return view('chapters.create', compact('subjects'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'folder_name' => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',
        ]);

        Chapter::create($validatedData);

        return redirect()->route('chapters.index')
            ->with('success', 'Chapter created successfully');
    }

    public function edit(Chapter $chapter)
    {
        $subjects = Subject::all();
        return view('chapters.edit', compact('chapter'), compact('subjects'));
    }

    public function update(Request $request, Chapter $chapter)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',
        ]);

        $chapter->update($validatedData);

        return redirect()->route('chapters.index')
            ->with('success', 'Chapter updated successfully');
    }

    public function destroy(Chapter $chapter)
    {
        $chapter->delete();

        return redirect()->route('chapters.index')
            ->with('success', 'Chapter deleted successfully');
    }


    public function show(){
        return view('chapters.import');

    }
    public function chaptersBulkUpload(Request $request){
        if($request->all('chapterFile')['chapterFile'] ){
            if($request->all('chapterFile')['chapterFile']){
                $file = $request->file('chapterFile');
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
                        $chapter = new Chapter;
                        $chapter->name = $column[0];
                        $chapter->folder_name = $column[1]; 
                        $chapter->subject_id = $column[2];
    
                        $chapter->save();
                    }
                }else{
                    return redirect()->route('chapters.index')
                    ->with('success', 'Corrupt Chapter File Inputs.');
                }
            }
     

            return redirect('/admin/chapters/index')
            ->with('success', 'Data Imported Successfully.');

        }        

        return redirect('/admin/chapters/index')
        ->with('success', 'Please Select the File.');
    }


    public function getChapters(Request $request){ 
        $chapters = Chapter::join('subjects','chapters.subject_id','subjects.id')
                    ->join('standards','subjects.standard_id','standards.id')
                    ->join('mediums','standards.medium_id','mediums.id')
                    ->join('boards','mediums.board_id','boards.id')
                    ->join('states','boards.state_id','states.id')
                    ->select('chapters.id','chapters.name','subjects.name as subject_name','standards.name as standard_name','mediums.name as medium_name','boards.name as board_name','states.name as state_name')
                    ->get();

        return DataTables::of($chapters)
            ->addIndexColumn()
            ->addColumn('action', function ($chapter) { 
                return '
                    <a href="' . route('chapters.edit', ['chapter' => $chapter->id]) . '" class="btn btn-sm btn-info"><span class="mdi mdi-pen"></span> Edit</a>
                    <form action="' . route('chapters.destroy', ['chapter' => $chapter->id]) . '" method="POST" class="d-inline">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                        <button type="submit" class="btn btn-sm btn-danger text-white" onclick="return confirmDelete(\'On delete this record, All data such as courses, topics, and subtopics under this record will be deleted\')"><span class="mdi mdi-delete-empty"></span> Delete</button>
                    </form>
                ';
            })
            ->addColumn('id', function ($chapter) {
                return $chapter->id;
            })
            ->addColumn('state', function ($chapter) {
                return $chapter->state_name;
            })
            ->editColumn('board', function ($chapter) {
                return $chapter->board_name;
            })
            ->addColumn('medium', function ($chapter) {
                return $chapter->medium_name;
            })
            ->editColumn('standard', function ($chapter) {
                return $chapter->standard_name;
            })
            ->addColumn('subject', function ($chapter) {
                return $chapter->subject_name;
            })
            ->addColumn('chapter', function ($chapter) {
                return $chapter->chapter_name;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

}
