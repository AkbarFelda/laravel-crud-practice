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

    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
          <form action="/posts">
            @if (request('category'))
              <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            @if (request('author'))
              <input type="hidden" name="author" value="{{ request('author') }}">
            @endif
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
              <button class="btn btn-danger" type="submit">Search</button>
            </div>
          </form>
        </div>
      </div>
    

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
