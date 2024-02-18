@extends('layouts.main')

@section('container')
    {{-- tempat content --}}
    <h1>Tabel Data Siswa</h1>
    <a type="button" class="btn btn-primary" href="/student/create/">Add Data</a>
    <br></br>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">NIS</th>
                <th scope="col">Nama</th>
                <th scope="col">Kelas</th>
                <th scope="col">Alamat</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $student->nis }}</td>
                    <td>{{ $student->nama }}</td>
                    <td>{{ $student->kelas->kelas }}</td>
                    <td>{{ $student->alamat }}</td>
                    <td>
                        <a type="button" class="btn btn-primary" href="/student/detail/{{ $student->id }}">Detail</a>
                        <a type="button" class="btn btn-warning" href="/student/edit/{{ $student->id }}">Edit</a>
                        <form id="delete-form-{{ $student->id }}"
                            action="{{ url('/student/destroy', ['student' => $student->id]) }}" method="post"
                            class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit"
                                class="btn btn-danger"
                                onclick="return confirm('Apakah kamu yakin ingin menghapus data?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
