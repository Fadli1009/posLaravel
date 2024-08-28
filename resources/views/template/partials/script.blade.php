<script src="{{ asset('adm/plugins/jquery/jquery.min.js') }}"></script>\
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
<script src="{{ asset('adm/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adm/dist/js/adminlte.min.js') }}"></script>
{{-- <script src="{{ asset('adm/dist/js/demo.js') }}"></script> --}}
<script src="{{ asset('adm/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adm/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adm/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('adm/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adm/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('adm/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adm/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('adm/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('adm/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('adm/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('adm/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('adm/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script>
    $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
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