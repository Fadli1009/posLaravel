@extends('template.base')
@section('title','Category')
@section('content')
<div class="table-responsive">
    @if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>

            @forelse ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->category_name }}</td>
                <td>
                    <a href="{{ route('category.edit',$item->id) }}" class="btn btn-xs btn-warning">Edit</a>
                    <form action="{{ route('category.destroy',$item->id) }}" method="post" style="display: inline-block"
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