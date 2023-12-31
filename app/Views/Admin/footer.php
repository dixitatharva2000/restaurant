<footer class="main-footer">

    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">Esenceweb IT</a>.</strong>

    All rights reserved.

    <div class="float-right d-none d-sm-inline-block">

        <b>Version</b> 3.2.0

    </div>

</footer>



<!-- Control Sidebar -->

<aside class="control-sidebar control-sidebar-dark">

    <!-- Control sidebar content goes here -->

</aside>

<!-- /.control-sidebar -->

</div>

<!-- ./wrapper -->



<!-- jQuery -->

<script src="<?= base_url(); ?>static/admin/plugins/jquery/jquery.min.js"></script>

<!-- jQuery UI 1.11.4 -->

<script src="<?= base_url(); ?>static/admin/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<script>

    $.widget.bridge('uibutton', $.ui.button)

</script>

<!-- Bootstrap 4 -->

<script src="<?= base_url(); ?>static/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- ChartJS -->

<script src="<?= base_url(); ?>static/admin/plugins/chart.js/Chart.min.js"></script>

<!-- Sparkline -->

<script src="<?= base_url(); ?>static/admin/plugins/sparklines/sparkline.js"></script>

<!-- JQVMap -->

<script src="<?= base_url(); ?>static/admin/plugins/jqvmap/jquery.vmap.min.js"></script>

<script src="<?= base_url(); ?>static/admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

<!-- jQuery Knob Chart -->

<script src="<?= base_url(); ?>static/admin/plugins/jquery-knob/jquery.knob.min.js"></script>

<!-- daterangepicker -->

<script src="<?= base_url(); ?>static/admin/plugins/moment/moment.min.js"></script>

<script src="<?= base_url(); ?>static/admin/plugins/daterangepicker/daterangepicker.js"></script>

<!-- Tempusdominus Bootstrap 4 -->

<script
    src="<?= base_url(); ?>static/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Summernote -->

<script src="<?= base_url(); ?>static/admin/plugins/summernote/summernote-bs4.min.js"></script>

<!-- overlayScrollbars -->

<script src="<?= base_url(); ?>static/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- AdminLTE App -->

<script src="<?= base_url(); ?>static/admin/dist/js/adminlte.js"></script>

<!-- AdminLTE for demo purposes -->

<script src="<?= base_url(); ?>static/admin/dist/js/demo.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<script src="<?= base_url(); ?>static/admin/dist/js/pages/dashboard.js"></script>





<!-- DataTables  & Plugins -->

<script src="<?= base_url(); ?>static/admin/plugins/datatables/jquery.dataTables.min.js"></script>

<script src="<?= base_url(); ?>static/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

<script src="<?= base_url(); ?>static/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>

<script src="<?= base_url(); ?>static/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script src="<?= base_url(); ?>static/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>

<script src="<?= base_url(); ?>static/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>

<script src="<?= base_url(); ?>static/admin/plugins/jszip/jszip.min.js"></script>

<script src="<?= base_url(); ?>static/admin/plugins/pdfmake/pdfmake.min.js"></script>

<script src="<?= base_url(); ?>static/admin/plugins/pdfmake/vfs_fonts.js"></script>

<script src="<?= base_url(); ?>static/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>

<script src="<?= base_url(); ?>static/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>

<script src="<?= base_url(); ?>static/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>









<!-- Page specific script -->

<script>

    $(function () {

        $("#example1").DataTable({

            "responsive": true, "lengthChange": false, "autoWidth": false,

            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    });





    // EDIT-Restaurant 

    function editrestaurent(restaurent_id) {

        $('#editrestaurent_modal').modal('show');

        $.ajax({

            url: '<?= base_url('edit-restaurent/'); ?>' + restaurent_id,

            type: 'get',

            success: function (result) {

                $('#formdata').html(result);

            }

        });

    }



    // EDIT-FRANCHISE 

    function editfranchise(franchise_id) {
        $('#editfranchise_modal').modal('show');
        $.ajax({
            url: '<?= base_url('edit-franchise/'); ?>' + franchise_id,
            type: 'get',
            success: function (result) {
                $('#form-data').html(result);
            }
        });
    }


 
 // EDIT-TABLES 

    function edittables(table_id) {
        $('#edittables_modal').modal('show');
        $.ajax({
            url: '<?= base_url('edit-table/'); ?>' + table_id,
            type: 'get',
            success: function (result) {
                $('#form-data').html(result);
            }
        });
    }


 // EDIT-SubCategory 

    function editcategory(category_id){

        $('#editcategory_modal').modal('show');
        $.ajax({

            url:'<?=base_url('edit-category/');?>' + category_id ,
            type:'get',
            success:function(result){

                $('#formdata').html(result);
            }


        });

    }

// EDIT-SubCategory 

      function editsubcategory(subcategory_id) {
        $('#editsubcategory_modal').modal('show');
        $.ajax({
            url: '<?= base_url('edit-subcategory/'); ?>' + subcategory_id,
            type: 'get',
            success: function (result) {
                $('#formdata').html(result);
            }
        });
    }


     // EDIT-MENU 

     function editmenu(menu_id) {
        $('#editmenu_modal').modal('show');
        $.ajax({
            url: '<?= base_url('edit-menu/'); ?>' + menu_id,
            type: 'get',
            success: function (result) {
                $('#formdata').html(result);
            }
        });
    }

</script>

</body>



</html>