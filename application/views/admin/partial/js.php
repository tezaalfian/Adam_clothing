<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="<?= base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>

<script src="<?= base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>

<script src="<?= base_url('assets/dist/js/adminlte.min.js') ?>"></script>
<script src="<?= base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>
<!-- <script src="<?= base_url('assets/bower_components/datatables.net/js/datatables.min.js') ?>"></script> -->
<script src="<?= base_url('assets/dist/js/sweetalert.min.js') ?>"></script>
<script src="<?= base_url('assets/bower_components/moment/min/moment.min.js')?>"></script>
<script src="<?= base_url('assets/bower_components/select2/dist/js/select2.full.min.js') ?>"></script>
<script src="<?= base_url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
<script src="<?= base_url('assets/dist/js/printThis.js') ?>"></script>
<script src="<?= base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>"></script>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })

    $('.select2').select2()

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    $('#reservation').daterangepicker({
      autoUpdateInput: false,
      locale: {
        cancelLabel: 'Clear'
      }
    })

    $('#reservation').on('apply.daterangepicker', function(ev, picker){
      $(this).val(picker.startDate.format('MM/DD/YYYY')+ ' - ' + picker.endDate.format('MM/DD/YYYY'));
    });

    $('#reservation').on('cancel.daterangepicker', function(ev, picker){
      $(this).val('');
    });

    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

  })

  $(document).ready(function () {
        $('#dtHorizontalVerticalExample').DataTable({
        "scrollX": true
        // "scrollY": true,
        });
        $('.dataTables_length').addClass('bs-select');
      });
</script>