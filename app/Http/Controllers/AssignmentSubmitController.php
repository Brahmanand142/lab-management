<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 use App\Users;
 use App\Assign_Submit;
 

class AssignmentSubmitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         

        $assignmentSubmits = Assign_Submit::all();
        // dd($assignmentSubmits);
        return view('user.assignments.index', compact('assignmentSubmits'));
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request input (you can customize rules)
        $validated = $request->validate([
            'student_name' => 'required|string|max:255',
            'student_id' => 'required|string|max:100',
            'assignment_title' => 'required|string|max:255',
            'subject_name' => 'required|string|max:255',
            'labname' => 'nullable|string|max:255',
            'teacher_name' => 'nullable|string|max:255',
            'due_date' => 'required|date',
            'assignment_files.*' => 'required|file|mimes:pdf,jpeg,png,jpg,gif,svg', // Add other mime types if needed
            'comments' => 'nullable|string',
            'html_code' => 'nullable|string',
            'css_code' => 'nullable|string',
            'js_code' => 'nullable|string',
            'feedback' => 'nullable|string',
        ]);

        // Handle multiple file uploads
        $uploadedFiles = [];
        if ($request->hasFile('assignment_files')) {
            foreach ($request->file('assignment_files') as $file) {
                // Store each file in storage/app/public/assignments (adjust path as needed)
                $path = $file->store('assignments', 'public');

                // Collect file metadata
                $uploadedFiles[] = [
                    'filename' => basename($path),
                    'path' => $path,
                    'mime_type' => $file->getClientMimeType(),
                    'original_name' => $file->getClientOriginalName(),
                    'size' => $file->getSize(),
                ];
            }
        }

        // Create the database record
    //   dd($validated);
$assignmentSubmit = AssignSubmit::create([
    'student_name' => $validated['student_name'],
    'student_id' => $validated['student_id'],
    'assignment_title' => $validated['assignment_title'],
    'subject_name' => $validated['subject_name'],
    'labname' => $validated['labname'] ?? null,
    'teacher_name' => $validated['teacher_name'] ?? null,
    'due_date' => $validated['due_date'],
    'assignment_files' => json_encode($uploadedFiles), // store as JSON string
    'comments' => $validated['comments'] ?? null,
    'html_code' => $validated['html_code'] ?? null,
    'css_code' => $validated['css_code'] ?? null,
    'js_code' => $validated['js_code'] ?? null,
    'feedback' => $validated['feedback'] ?? null,
    'feedback_timestamp' => now(),
]);


        return redirect()->back()->with('success', 'Assignment submitted successfully!');
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
         $assignmentSubmits = Assign_Submit::all();
        //  dd($assignmentSubmits);
       return view('user.assignment.index'. compact('assignmentSubmits'));
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssignmentSubmit $assignmentSubmit)
    {
        
        try {
            // Optional: Delete associated files from storage
            if (!empty($assignmentSubmit->assignment_files) && is_array($assignmentSubmit->assignment_files)) {
                foreach ($assignmentSubmit->assignment_files as $file) {
                    if (isset($file['path'])) {
                        Storage::disk('public')->delete($file['path']);
                    }
                }
            }

            $assignmentSubmit->delete();

            return redirect()->back()->with('success', 'Assignment submission deleted successfully!');
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Error deleting assignment submission: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete assignment submission. Please try again.');
        }
    }
    }

