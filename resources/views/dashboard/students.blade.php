@extends('dashboard.layouts.main')
@section('container')
    <br></br>
    <h3 class="text-center">Data Siswa</h3>
    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="{{ route('dashboard.students') }}" method="get">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search.." name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-danger" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
    <a type="button" class="btn btn-primary" href="/student/create/">Add Data</a>
    <br></br>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($students->isNotEmpty())
    @else
        <p class="text-center fs-4">No class found.</p>
    @endif
    </table>
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
                        <a type="button" class="btn btn-primary" href="/dashboard/detail/{{ $student->id }}">Detail</a>
                        <a type="button" class="btn btn-warning" href="/student/edit/{{ $student->id }}">Edit</a>
                        <form id="delete-form-{{ $student->id }}"
                            action="{{ url('/student/destroy', ['student' => $student->id]) }}" method="post"
                            class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Apakah kamu yakin ingin menghapus data?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $students->links() }}
@endsection
