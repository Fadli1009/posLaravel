@extends('template.base')
@section('title', 'Tambah user')
@section('content')
    <form action="{{ route('level.update', $level->id) }}" method="POST">
        @method('put')
        @csrf
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="form-group">
            <label for="nama">Nama Level</label>
            <input type="text" class="form-control" id="nama" name="nama_level" required
                value="{{ $level->nama_level }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
