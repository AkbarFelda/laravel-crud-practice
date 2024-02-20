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

    public function students(Request $request) 
{
    $search = $request->input('search');

    $query = Student::query();

    if ($search) {
        $query->where('nis', 'like', '%' . $search . '%')
            ->orWhere('nama', 'like', '%' . $search . '%')
            ->orWhere('alamat', 'like', '%' . $search . '%');
    }

    $students = $query->paginate(5);

    return view('dashboard.students', [
        "title" => "Students",
        "students" => $students,
    ]);
}

    public function kelas()
    {
        $search = request('search');
        $query = Kelas::query();

        if ($search) {
            $query->where('kelas', 'like', '%' . $search . '%');
        }

        $kelasList = $query->paginate(5);
        
        return view('dashboard.kelas', [
            "title" => "Kelas",
            "kelasList" => $kelasList, // Menambah koma untuk pemisah
            "search" => $search,
        ]);
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
