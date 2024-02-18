<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
class KelasController extends Controller
{
    public function index()
    {
        return view(
            'kelas.all',
            [
                "title" => "Kelas",
                "kelasList" => Kelas::all()
            ]
        );
    }

    public function show($kelas)
    {
        return view('kelas.detail', [
            "title" => "Detail Kelas",
            "kelas" => Kelas::find($kelas)
        ]);
    }

    public function create()
    {
        return view('kelas.create', [
            'title' => 'Add Kelas',
            'kelas' => new Kelas(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kelas' => 'required',
        ]);

        $result = Kelas::create($validatedData);
        if ($result) {
            return redirect('/kelas/all')->with('success', 'Data Kelas added successfully');
        }
    }

    public function edit($kelas)
    {
        return view('kelas.edit', [
            "title" => "Edit Kelas",
            "kelas" => Kelas::find($kelas)
        ]);
    }

    public function destroy($kelas)
    {
        $kelas = Kelas::find($kelas);
        if ($kelas) {
            $kelas->delete();
            return redirect()->route('kelas.all')->with('success', 'Data kelas berhasil dihapus.');
        } else {
            return redirect()->route('kelas.all')->with('error', 'Data Kelas tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kelas' => 'required|string|max:255',
        ]);

        $student = Kelas::find($id);
        if ($student) {
            $student->update([
                'kelas' => $request->input('kelas'),
            ]);


            return redirect()->route('kelas.all')->with('success', 'Data Kelas telah diperbarui.');
        } else {
            return redirect()->route('kelas.all')->with('error', 'Data Kelas tidak ditemukan.');
        }
    }
}
