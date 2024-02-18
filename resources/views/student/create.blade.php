@extends('layouts.main')

@section('container')
    <h1>Add Student</h1>
    <a type="button" class="btn btn-primary" href="{{ route('student.all') }}">Back</a>
    <form action="/student/add" method="post">
        @csrf

        <div class="form-group" >
            <label for="nis">Nis:</label>
            <input type="number" name="nis" id="nis" class="form-control" required value="{{ old('nis') }}">
        </div>
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" class="form-control" required value="{{ old('nama') }}">
        </div>
        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir:</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required
                value="{{ old('tanggal_lahir') }}">
        </div>
        <div class="form-group">
            <label for="kelas">Kelas:</label>
            {{-- <input type="text" name="kelas" id="kelas" class="form-control" required value="{{ old('kelas') }}"> --}}
            <select class="form-select" name="kelas_id" id="">
                @foreach ($kelas  as $kelas)
                    <option value="{{ $kelas->id }}">{{ $kelas->kelas }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <input type="text" name="alamat" id="alamat" class="form-control" required value="{{ old('alamat') }}">
        </div>

        <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah kamu yakin untuk menambahkan data siswa?')">Add Data Student</button>
    </form>
@endsection
