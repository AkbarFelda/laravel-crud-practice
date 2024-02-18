<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\Student;



class StudentsController extends Controller
{
    public function index()
    {
        return view(
            'student.all',
            [
                "title" => "Students",
                "students" => Student::all()
            ]
        );
    }

    public function show($student)
    {
        return view('student.detail', [
            "title" => "detail-student",
            "student" => Student::find($student)
        ]);
    }

    public function create()
    {
        return view('student.create', [
            'title' => 'Add Student',
            // 'student' => new Student(),
            "kelas" => Kelas::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nis' => 'required|max:255',
            'nama' => 'required|max:255',
            'tanggal_lahir' => 'required',
            'kelas_id' => 'required',
            'alamat' => 'required',
        ]);

        $result = Student::create($validatedData);
        if ($result) {
            return redirect('/student/all')->with('success', 'Data Student added successfully');
        }
    }

    public function edit($student)
    {
        return view('student.edit', [
            "title" => "Edit student",
            "student" => Student::find($student),
            "kelas" => Kelas::all(),
        ]);
    }

    public function destroy($student)
    {
        $student = Student::find($student);
        if ($student) {
            $student->delete();
            return redirect()->route('student.all')->with('success', 'Data siswa berhasil dihapus.');
        } else {
            return redirect()->route('student.all')->with('error', 'Data Siswa tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nis' => 'required|numeric',
            'nama' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'kelas_id' => 'required|numeric',
            'alamat' => 'required|string',
        ]);

        $student = Student::find($id);
        $student->update($validatedData);

        return redirect('/student/all')->with('success', 'Data Student updated successfully');
    }
}
