@extends('template.base')
@section('title','Tambah user')
@section('content')
<form action="{{ route('user.store') }}" method="POST">
    @csrf
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" id="nama" name="name" required value="{{ old('name') }}">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" required value="{{ old('email') }}">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>

    <div class="form-group">
        <label for="password">Konfirmasi Password</label>
        <input type="password" class="form-control" id="password" name="konfirmasi_password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection