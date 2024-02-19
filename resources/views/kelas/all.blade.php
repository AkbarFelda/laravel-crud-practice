@extends('layouts.main')

@section('container')
    {{-- tempat content --}}
    <h1>Tabel Data Kelas</h1>

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
