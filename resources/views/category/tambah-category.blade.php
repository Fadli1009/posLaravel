@extends('template.base')
@section('title','Tambah Category')
@section('content')
<form action="{{ route('category.store') }}" method="POST">
    @csrf
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" id="nama" name="category_name" required
            value="{{ old('category_name') }}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection