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
        $students = Student::all() ;
        
        return view('student',['students'=>$students,'layout'=>'index']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $students = Student::all() ;
      return view('student',['students'=>$students,'layout'=>'create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new Student() ;
        $student->cne = $request->input('cne') ;
        $student->firstName = $request->input('firstName') ;
        $student->secondName = $request->input('secondName') ;
        $student->age = $request->input('age') ;
        $student->speciality = $request->input('speciality') ;
        $student->save() ;
        return redirect('/') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        $students = Student::all() ;
        return view('student',['students'=>$students,'student'=>$student,'layout'=>'show']);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $student = Student::find($id);
      $students = Student::all() ;
      return view('student',['students'=>$students,'student'=>$student,'layout'=>'edit']);

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
      $student = Student::find($id);
      $student->cne = $request->input('cne') ;
      $student->firstName = $request->input('firstName') ;
      $student->secondName = $request->input('secondName') ;
      $student->age = $request->input('age') ;
      $student->speciality = $request->input('speciality') ;
      $student->save() ;
      return redirect('/') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $student = Student::find($id);
      $student->delete() ;
      return redirect('/') ;
    }
}
