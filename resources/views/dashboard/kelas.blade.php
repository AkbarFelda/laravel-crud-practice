@extends('dashboard.layouts.main')
@section('container')
    <h1>Tabel Data Kelas</h1>
    <a type="button" class="btn btn-primary" href="/kelas/create/">Add Data</a>
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
                <th scope="col">Kelas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kelasList as $kelas)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $kelas->kelas }}</td>
                    <td>
                        <a type="button" class="btn btn-primary" href="/kelas/detail/{{ $kelas->id }}">Detail</a>
                        <a type="button" class="btn btn-warning" href="/kelas/edit/{{ $kelas->id }}">Edit</a>
                        <form id="delete-form-{{ $kelas->id }}"
                            action="{{ url('/kelas/destroy', ['student' => $kelas->id]) }}" method="post" class="d-inline">
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
    @endsection
