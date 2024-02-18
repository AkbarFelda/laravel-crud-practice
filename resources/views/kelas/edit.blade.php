@extends('layouts.main')

@section('container')
    <h1>Edit Data Kelas</h1>
    <br></br>
    <a type="button" class="btn btn-primary" href="{{ route('kelas.all') }}">Back</a>
    <form action="{{ route('kelas.update', ['id' => $kelas->id]) }}" method="post">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="kelas">Kelas:</label>
            <input type="text" name="kelas" id="kelas" class="form-control" required value="{{ old( 'kelas', $kelas->kelas) }}">
        </div>
        <button type="submit" class="btn btn-primary"
            onclick="return confirm('Apakah kamu yakin ingin mengubah data kelas')">Update Data kelas</button>
    </form>
@endsection
