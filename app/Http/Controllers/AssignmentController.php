<?php

namespace App\Http\Controllers;

use App\Assignment;
use Illuminate\Http\Request;
use App\User;
class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        // $assignments = Assignment::paginate(20);
        // return view('teacher.assignment.index', compact('assignments'));
        $assignments = Assignment::paginate(10);
return view('teacher.assignment.index', compact('assignments'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.assignment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $validated = $request->validate([
        'assignment_id' => '', 
        'assignment_name' => '', 
        'assignment_description' => '', 
        'assignment_type' => '', 
        'submission_date' => '', 
        'subject' => '', 
        'faculty' => '', 
        't_name' =>'',
    ]);
    //  dd($validated);  

    

    Assignment::create($validated);

    return redirect()->route('assignment.index')->with('success', 'Assignment created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show(Assignment $assignment)
     {
            $assignments = Assignment::paginate(10);
        //   dd($assignments);
        return view('user.assignments.show', compact('assignments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function edit(Assignment $assignment)
    {
       return view('teacher.assignment.edit', compact('assignment'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assignment $assignment)
    {
        $validated = $request->validate([
        'assignment_name' => 'required|string|max:255',  
        'assignment_description' => 'nullable|string',  
        'assignment_type' => 'required|string|max:50', 
        'submission_date' => 'required|date',  
        'subject' => 'required|string|max:100', 
        'faculty' => 'required|string|max:100', 
        't_name' => 'required|string|max:100', 
    ]);
    //  dd($validated);  
    $assignment->update($validated);
    return redirect()->route('assignment.index')->with('success', 'Assignment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assignment $assignment)
    {
        $assignment->delete();
        return redirect()->route('assignment.index')->with('success', 'Assignment deleted successfully.');
    }
    public function showSubmitForm(Request $request)
{
    // Collect the input data passed via query params
       $data = $request->only([
        'assignment_name',
        'teacher_name',
        'faculty',
        'subject',
        'labname',
    ]);

    // Pass the data to the view
    return view('user.assignments.submit_form', $data);
}
}