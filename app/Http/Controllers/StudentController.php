<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        // dd($students);
        return view('student.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->name);

        // Validation
        $request->validate([
            "rollno" => 'required|min:5|unique:students',
            "name" => 'required',
            "email"  => 'required|unique:students',
            "phoneno" => 'required',
            "address" => 'required'
        ],
        [
            "name.required" => 'နာမည်ဖြည့်စွက်ပေးပါ'
        ]);
        
        // Object Relational Mapping (Eloquent ORM)
        $student = new Student;
        $student->rollno = $request->rollno;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phoneno = $request->phoneno;
        $student->address = $request->address;
        $student->save();

        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('student.show',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('student.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        // dd($request->name);

        // Validation
        // if ($student->email == $request->email && $student->rollno == $request->rollno) {
        //     $request->validate([
        //         "name" => 'required',
        //         "phoneno" => 'required',
        //         "address" => 'required'
        //     ],
        //     [
        //         "name.required" => 'နာမည်ဖြည့်စွက်ပေးပါ'
        //     ]);
        // }else{
            $request->validate([
                "rollno" => 'required|min:5|unique:students,rollno,'.$student->id,
                "name" => 'required',
                "email"  => 'required|unique:students,email,'.$student->id,
                "phoneno" => 'required',
                "address" => 'required'
            ],
            [
                "name.required" => 'နာမည်ဖြည့်စွက်ပေးပါ'
            ]);
        // }
        
        // Object Relational Mapping (Eloquent ORM)
        $student->rollno = $request->rollno;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phoneno = $request->phoneno;
        $student->address = $request->address;
        $student->save();

        return redirect()->route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student) // ORM
    {
        $student->delete(); 
        return redirect()->route('student.index');
    }
}
