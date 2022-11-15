      </section>
      <!-- /.content -->
      </div>

      <div class="col-md-3" style="position: fixed;right: 0;bottom: 50px;z-index: 99;background: white;padding: unset;margin: unset;">
        <div class="box box-success direct-chat direct-chat-warning collapsed-box">
          <div class="box-header with-border">
            <h3 class="box-title">Chat Bot</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
              </button>
            </div>
          </div>
          <div class="box-body">
            <div class="direct-chat-messages">
              <div class="direct-chat-msg">
                <div class="direct-chat-info clearfix">
                  <span class="direct-chat-name pull-left">System Bot</span>
                  <span class="direct-chat-timestamp pull-right"><?php echo date('d M y') ?></span>
                </div>
                <img class="direct-chat-img" src="<?= BASE_URL . "assets/default.jpg" ?>" alt="message user image">
                <div class="direct-chat-text">
                  Thank you for getting in touch!

                  We appreciate you contacting us. One of our customer happiness members will be getting back to you within a few hours.

                  In the meantime, you can check out the following resources:


                  Pop-up Step-by-Step Tutorials
                  Get in touch Section

                  Have a great day ahead!
                </div>
              </div>
            </div>
          </div>
          <div class="box-footer">
            <form action="#" method="post">
              <div class="input-group">
                <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                <span class="input-group-btn">
                  <button type="button" class="btn btn-success btn-flat">Send</button>
                </span>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- /.content-wrapper -->
      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
          V <?= VERSION_NO; ?>
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; <?= COPYRIGHT_YEAR; ?> <a href="#"> <?= SYSTEM_NAME; ?></a>.</strong> All rights reserved.
      </footer>


      <!-- ./wrapper -->

      <!-- REQUIRED JS SCRIPTS -->
      <!-- jQuery 3 -->
      <script src="css/jquery/dist/jquery.min.js"></script>


      <script src="js/datatable.js"></script>
      <!-- <script src="js/datable_fixheader.js"></script> -->
      <script src="js/datable_button.js"></script>
      <script src="js/datable_zip.js"></script>
      <script src="js/datable_fonts.js"></script>
      <script src="js/datable_html.js"></script>
      <script src="js/datable_print.js"></script>


      <!-- <script src="css/datatables.net/js/jquery.dataTables.min.js"></script> -->
      <!-- Bootstrap 3.3.7 -->
      <script src="css/bootstrap/dist/js/bootstrap.min.js"></script>
      <!-- Select2 -->
      <script src="css/select2/dist/js/select2.full.min.js"></script>
      <!-- InputMask -->
      <script src="plugins/input-mask/jquery.inputmask.js"></script>
      <script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
      <script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
      <!-- date-range-picker -->
      <script src="css/moment/min/moment.min.js"></script>
      <script src="css/bootstrap-daterangepicker/daterangepicker.js"></script>
      <!-- bootstrap datepicker -->
      <script src="css/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
      <!-- bootstrap color picker -->
      <script src="css/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
      <!-- bootstrap time picker -->
      <script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
      <!-- AdminLTE App -->
      <script src="js/adminlte.min.js "></script>


      <!-- <script src="css/datatables.net-bs/js/dataTables.bootstrap.min.js"></script> -->
      <script src="plugins/iCheck/icheck.min.js"></script>
      <script src="css/jquery-slimscroll/jquery.slimscroll.min.js"></script>

      <script src="css/fastclick/lib/fastclick.js"></script>

      <script src="js/main.js "></script>

      <!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. 
      <script>
        $(function() {
          //Initialize Select2 Elements
          $('.select2').select2()

          //Datemask dd/mm/yyyy
          $('#datemask').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
          })
          //Datemask2 mm/dd/yyyy
          $('#datemask2').inputmask('mm/dd/yyyy', {
            'placeholder': 'mm/dd/yyyy'
          })
          //Money Euro
          $('[data-mask]').inputmask()

          //Date range picker
          $('#reservation').daterangepicker()
          //Date range picker with time picker
          $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
              format: 'MM/DD/YYYY hh:mm A'
            }
          })
          //Date range as a button
          $('#daterange-btn').daterangepicker({
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },
            function(start, end) {
              $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
          )

          //Date picker
          $('#datepicker').datepicker({
            autoclose: true
          })

          //iCheck for checkbox and radio inputs
          $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
          })
          //Red color scheme for iCheck
          $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
          })
          //Flat red color scheme for iCheck
          $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
          })

          //Colorpicker
          $('.my-colorpicker1').colorpicker()
          //color picker with addon
          $('.my-colorpicker2').colorpicker()

          //Timepicker
          $('.timepicker').timepicker({
            showInputs: false
          })
        });
      </script>
-->
      <script>
        window.addEventListener('online', updateOnlineStatus);
        window.addEventListener('offline', updateOnlineStatus);

        function updateOnlineStatus() {
          var status = navigator.onLine ? '<i class="fa fa-circle text-success "></i> Online' : '<i class="fa fa-circle text-danger"></i> Offline';
          const elem = $('#connection').html(status);
        }
      </script>
      </body>

      </html>