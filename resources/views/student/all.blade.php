@extends('layouts.main')

@section('container')
    {{-- tempat content --}}
    <h3 class="text-center">Data Siswa</h3>

    <div class="row justify-content-center mb-3">
      <div class="col-md-6">
        <form action="{{ route('student.all') }}" method="get">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
            <button class="btn btn-danger" type="submit">Search</button>
          </div>
        </form>
      </div>
    </div>

    @if ($students->isNotEmpty())
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
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-center fs-4">No student found.</p>
    @endif
    {{ $students->links() }}
@endsection

