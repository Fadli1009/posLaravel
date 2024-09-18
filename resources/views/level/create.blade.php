@extends('template.base')
@section('title', 'Tambah user')
@section('content')
    <form action="{{ route('level.store') }}" method="POST">
        @csrf
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama_level" required value="{{ old('name') }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
