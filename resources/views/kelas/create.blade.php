@extends('layouts.main')

@section('container')
    <h1>Add Student</h1>
    <a type="button" class="btn btn-primary" href="{{ route('kelas.all') }}">Back</a>
    <form action="/kelas/add" method="post">
        @csrf
        <div class="form-group">
            <label for="kelas">Kelas:</label>
            <input type="text" name="kelas" id="kelas" class="form-control" required value="{{ old('kelas') }}">
        </div>
        <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah kamu yakin untuk menambahkan data Kelas?')">Add Data Kelas</button>
    </form>
@endsection
