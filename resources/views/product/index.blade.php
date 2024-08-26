@extends('template.base')
@section('title','User')
@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Katagori</th>
                <th>Nama Produk</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <div align="right" class="mb-3">
                <a href="{{ route('product.create') }}" class="btn btn-primary">Tambah Product</a>
                </td>
            </div>
            @forelse ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->category->category_name }}</td>
                <td>{{ $item->product_name }}</td>
                <td>{{ $item->qty }}</td>
                <td>Rp. {{ number_format($item->price,0,'.',',') }}</td>
                <td>{{ $item->description }}</td>
                <td>
                    <a href="{{ route('product.edit',$item->id) }}" class="btn btn-xs btn-warning">Edit</a>
                    <form action="{{ route('product.destroy',$item->id) }}" method="post" style="display: inline-block"
                        onsubmit="return confirm('apakah anda ingin menghapus user')">
                        @csrf
                        @method('delete')
                        <button class="btn btn-xs btn-danger" type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <td colspan="6" class="text-center">Data kosong</td>
            @endforelse
        </tbody>
    </table>
</div>
@endsection