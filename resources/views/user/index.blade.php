@extends('template.base')
@section('title','User')
@section('content')
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <div align="right" class="mb-3">
                <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah User</a>
                </td>
            </div>
            @forelse ($user as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>
                    <a href="{{ route('user.edit',$item->id) }}" class="btn btn-xs btn-warning">Edit</a>
                    <form action="{{ route('user.destroy',$item->id) }}" method="post" style="display: inline-block"
                        onsubmit="return confirm('apakah anda ingin menghapus user')">
                        @csrf
                        @method('delete')
                        <button class="btn btn-xs btn-danger" type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <td colspan="5">Data kosong</td>
            @endforelse
        </tbody>
    </table>
</div>
@endsection