<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Kelas;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            "title" => "Dashboard"
        ]);
    }

    public function students()
    {
        $students = Student::with('kelas')->get();
        return view('dashboard.students', [
            "title" => "Students",
            "students" => $students
        ]);
    }

    public function kelas()
    {
        return view(
            'dashboard.kelas',
            [
                "title" => "Kelas",
                "kelasList" => Kelas::all()
            ]
        );
    }

    public function detail($id)
    {
        $student = Student::find($id);

        if (!$student) {
            abort(404); // Atau atur respons lain sesuai kebutuhan Anda
        }

        return view('dashboard.detail', ['student' => $student]);
    }
}
