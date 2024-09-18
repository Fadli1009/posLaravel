@extends('template.base')
@section('title', 'Level')
@section('content')
    <div class="table-responsive">
        <table class="table table-bordered" id="example1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <div align="right" class="mb-3">
                    <a href="{{ route('level.create') }}" class="btn btn-primary">Tambah Level</a>
                    </td>
                </div>
                @forelse ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_level }}</td>
                        <td>
                            <a href="{{ route('level.edit', $item->id) }}" class="btn btn-xs btn-warning">Edit</a>
                            <form action="{{ route('level.destroy', $item->id) }}" method="post"
                                style="display: inline-block"
                                onsubmit="return confirm('apakah anda ingin menghapus level')">
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
@section('scripts')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

@endsection
