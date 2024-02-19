@extends('layouts.main')

@section('container')
    <h1>Edit Data</h1>
    <a type="button" class="btn btn-primary" href="/dashboard/students">Back</a>
    <form action="{{ route('student.update', ['id' => $student->id]) }}" method="post">
        @csrf
        @method('patch')
        <div class="form-group" >
            <label for="nis">NIS:</label>
            <input type="number" name="nis" id="nis" class="form-control" readonly required value="{{ old( 'nis', $student->nis) }}">
        </div>
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" class="form-control" required value="{{ old( 'nama', $student->nama) }}">
        </div>
        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir:</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required
                value="{{ old( 'tanggal_lahir', $student->tanggal_lahir) }}">
        </div>
        <div class="form-group">
            <label for="kelas">Kelas:</label>
            <select class="form-select" name="kelas_id" id="">
                @foreach ($kelas as $item)
                    <option value="{{ $item->id }}" @if($item->id == $student->kelas_id) selected @endif>{{ $item->kelas }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <input type="text" name="alamat" id="alamat" class="form-control" required
                value="{{ old( 'alamat', $student->alamat)  }}">
        </div>

        <button type="submit" class="btn btn-primary"
            onclick="return confirm('Apakah kamu yakin ingin mengupdate data siswa')">Update Data Student</button>
    </form>
@endsection
