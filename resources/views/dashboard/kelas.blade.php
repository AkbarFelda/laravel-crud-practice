@extends('dashboard.layouts.main')
@section('container')
    <br></br>
    <h3 class="text-center">Data Kelas</h3>
    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="{{ route('dashboard.kelas') }}" method="get">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search.." name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-danger" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
    <a type="button" class="btn btn-primary" href="/kelas/create/">Add Data</a>
    <br></br>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($kelasList->isNotEmpty())
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kelas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kelasList as $kelas)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kelas->kelas }}</td>
                        <td>
                            <a type="button" class="btn btn-warning" href="/kelas/edit/{{ $kelas->id }}">Edit</a>
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
