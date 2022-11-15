<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content" style="background-image: url(assets/home/popup.jpg);
    background-repeat: no-repeat;
    background-size: contain;height: 315px;">
      <div class="modal-header" style="border-bottom: unset;">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

    </div>
  </div>
</div>

<!-- Footer-->
<footer class="py-3 bg-success">
  <div class="container px-4 px-lg-5">
    <p class="m-0 text-center text-white"> <strong>Copyright &copy; <?= COPYRIGHT_YEAR; ?> <?= SYSTEM_NAME; ?>.</strong> All rights reserved.</p>
  </div>
</footer>
<!-- Bootstrap core JS-->
<script src="js/landing_page_bootstrap.js"></script>
<script src="js/jquery.js"></script>
<script src="js/landing_page.js"></script>

<script src="css/jquery/dist/jquery.min.js"></script>
<script src="css/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="css/moment/min/moment.min.js"></script>
<script src="css/bootstrap-daterangepicker/daterangepicker.js"></script>
<script>
  $(document).ready(function() {
    $('#exampleModal').modal('show');
  });
</script>
<!-- Core theme JS-->
</body>

</html>