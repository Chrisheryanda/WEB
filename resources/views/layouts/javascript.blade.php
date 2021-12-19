<!-- Bootstrap core JavaScript-->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script src="{{ asset('vendor/datatables/DataTables-1.10.25/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script src="{{ asset('vendor/datatables/Buttons-1.7.1/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/Buttons-1.7.1/js/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/JSZip-2.5.0/jszip.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/pdfmake-0.1.36/pdfmake.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/pdfmake-0.1.36/vfs_fonts.js') }}"></script>
<script src="{{ asset('vendor/datatables/Buttons-1.7.1/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/Buttons-1.7.1/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/Buttons-1.7.1/js/buttons.colVis.min.js') }}"></script>

<script type="text/javascript">
    // Call the dataTables jQuery plugin
    $(document).ready(function() {
        var table = $('#dataTable').DataTable( {
            lengthMenu:[
                [5,10,25,50,100,-1],
                [5,10,25,50,100,"All"]
            ],

            "language": {
            
                "search": "Cari:",
                
                "lengthMenu": "Tampilkan _MENU_ baris",
                
                "zeroRecords": "Data tidak ditemukan",
                
                "info": "Halaman _PAGE_ dari _PAGES_",
                
                "infoEmpty": "Tidak ada data",
                
                "infoFiltered": "(pencarian dari _MAX_ data)",
            
            },
            
            responsive: true,
            
            stateSave: true, // keep paging

            "scrollX": true
        } );
    } );

    $(document).ready(function() {
        var table = $('#dataTableTanpaScroll').DataTable( {

            buttons: [ 'copy', 'csv', 'print', 'excel', 'pdf', 'colvis' ],
            dom:
                "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>"+
                "<'row'<'col-md-12'tr>>"+
                "<'row'<'col-md-5'i><'col-md-7'p>>",
            lengthMenu:[
                [5,10,25,50,100,-1],
                [5,10,25,50,100,"All"]
            ],

            "language": {
            
                "search": "Cari:",
                
                "lengthMenu": "Tampilkan _MENU_ baris",
                
                "zeroRecords": "Data tidak ditemukan",
                
                "info": "Halaman _PAGE_ dari _PAGES_",
                
                "infoEmpty": "Tidak ada data",
                
                "infoFiltered": "(pencarian dari _MAX_ data)",

                "buttons": {
				    "colvis": "Kolom"
				}
            
            },
            
            responsive: true,
            
            stateSave: true, // keep paging
        } );
    
        table.buttons().container()
            .appendTo( '#dataTable_wrapper .col-md-5:eq(0)' );
    } );

    $(document).ready(function() {
        var table = $('#dataTableTanpaScroll2').DataTable( {

            buttons: [ 'copy', 'csv', 'print', 'excel', 'pdf', 'colvis' ],
            dom:
                "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>"+
                "<'row'<'col-md-12'tr>>"+
                "<'row'<'col-md-5'i><'col-md-7'p>>",
            lengthMenu:[
                [5,10,25,50,100,-1],
                [5,10,25,50,100,"All"]
            ],

            "language": {
            
                "search": "Cari:",
                
                "lengthMenu": "Tampilkan _MENU_ baris",
                
                "zeroRecords": "Data tidak ditemukan",
                
                "info": "Halaman _PAGE_ dari _PAGES_",
                
                "infoEmpty": "Tidak ada data",
                
                "infoFiltered": "(pencarian dari _MAX_ data)",

                "buttons": {
				    "colvis": "Kolom"
				}
            
            },
            
            responsive: true,
            
            stateSave: true, // keep paging
        } );
    
        table.buttons().container()
            .appendTo( '#dataTable_wrapper .col-md-5:eq(0)' );
    } );

    $(document).ready(function() {
        var table = $('#dataTableAdmin').DataTable( {

            buttons: [ 'copy', 'csv', 'print', 'excel', 'pdf', 'colvis' ],
            dom:
                "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>"+
                "<'row'<'col-md-12'tr>>"+
                "<'row'<'col-md-5'i><'col-md-7'p>>",
            lengthMenu:[
                [5,10,25,50,100,-1],
                [5,10,25,50,100,"All"]
            ],

            "language": {
            
                "search": "Cari:",
                
                "lengthMenu": "Tampilkan _MENU_ baris",
                
                "zeroRecords": "Data tidak ditemukan",
                
                "info": "Halaman _PAGE_ dari _PAGES_",
                
                "infoEmpty": "Tidak ada data",
                
                "infoFiltered": "(pencarian dari _MAX_ data)",

                "buttons": {
				    "colvis": "Kolom"
				}
            
            },
            
            responsive: true,
            
            stateSave: true, // keep paging

            "scrollX": true
        } );
    
        table.buttons().container()
            .appendTo( '#dataTable_wrapper .col-md-5:eq(0)' );
    } );

    $(document).ready(function() {
        var table = $('#dataTableAdmin2').DataTable( {

            buttons: [ 'copy', 'csv', 'print', 'excel', 'pdf', 'colvis' ],
            dom:
                "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>"+
                "<'row'<'col-md-12'tr>>"+
                "<'row'<'col-md-5'i><'col-md-7'p>>",
            lengthMenu:[
                [5,10,25,50,100,-1],
                [5,10,25,50,100,"All"]
            ],

            "language": {
            
                "search": "Cari:",
                
                "lengthMenu": "Tampilkan _MENU_ baris",
                
                "zeroRecords": "Data tidak ditemukan",
                
                "info": "Halaman _PAGE_ dari _PAGES_",
                
                "infoEmpty": "Tidak ada data",
                
                "infoFiltered": "(pencarian dari _MAX_ data)",

                "buttons": {
				    "colvis": "Kolom"
				}
            
            },
            
            responsive: true,
            
            stateSave: true, // keep paging

            "scrollX": true
        } );
    
        table.buttons().container()
            .appendTo( '#dataTable_wrapper .col-md-5:eq(0)' );
    } );

</script>
@section('page-script')
@show
</body>

</html>