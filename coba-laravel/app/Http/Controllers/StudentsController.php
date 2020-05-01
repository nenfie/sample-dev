<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;

class StudentsController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students/index', ['students' => $students]);
    }

    public function create()
    {
        return view('students/create');
    }

    public function store(Request $request)
    {
        // $student = new Student;
        // $student->nama = $request->nama;
        // $student->nrp = $request->nrp;
        // $student->email = $request->email;
        // $student->jurusan = $request->jurusan;
        // $student->save();

        // Student::create([
        //     'nama' => $request->nama,
        //     'nrp' => $request->nrp,
        //     'email' => $request->email,
        //     'jurusan' => $request->jurusan
        // ]);

        $request->validate([
            'nama' => 'required',
            'nrp' => 'required|size:9'
        ]);

        Student::create($request->all());

        return redirect('/students')->with('status', 'Data successfully added');
    }

    public function show(Student $student)
    {
        return view('students/show', ['student' => $student]);
    }

    public function edit(Student $student)
    {
        return view('students/edit', ['student' => $student]);        
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'nama' => 'required',
            'nrp' => 'required|size:9'
        ]);

        Student::where('id', $student->id)
            ->update([
                'nama' =>$request->nama,
                'nrp' =>$request->nrp,
                'email' =>$request->email,
                'jurusan' =>$request->jurusan
            ]);

        return redirect('/students')->with('status', 'Data successfully updated');
    }

    public function destroy(Student $student)
    {
        Student::destroy($student->id);

        return redirect('/students')->with('status', 'Data successfully deleted');
    }
}
