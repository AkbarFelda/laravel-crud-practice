@extends('layouts.main')

@section('container')
    {{-- tempat content --}}
    <h1>Tabel Data Kelas</h1>
    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="{{ route('kelas.all') }}" method="get">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search.." name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-danger" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    @if ($kelasList->isNotEmpty())
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kelasList as $kelas)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kelas->kelas }}</td>
                        <td>
                            <form id="delete-form-{{ $kelas->id }}"
                                action="{{ url('/kelas/destroy', ['student' => $kelas->id]) }}" method="post"
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
    @else
        <p class="text-center fs-4">No class found.</p>
    @endif
    {{ $kelasList->links() }}
@endsection
