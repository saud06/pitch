<footer class="footer">
	<div class="d-sm-flex justify-content-center justify-content-sm-between">
    	<span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <?= date('Y') ?> <a style="color: #ff5722" href="http://www.pitchbrothers.de" target="_blank">Pitchblack</a>. All rights are reserved.</span>
    	
    	<span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
  	</div>
</footer>

<script src="vendors/js/vendor.bundle.base.js"></script>
<script src="vendors/js/vendor.bundle.addons.js"></script>
<script src="js/off-canvas.js"></script>
<script src="js/hoverable-collapse.js"></script>
<script src="js/template.js"></script>
<script src="js/settings.js"></script>
<script src="js/todolist.js"></script>
<script src="js/dashboard.js"></script>
<script src="js/chart.js"></script>
<script src="js/data-table.js"></script>
<script src="js/tooltips.js"></script>
<script src="js/modal-demo.js"></script>
<script src="js/form-validation.js"></script>
<script src="js/form-addons.js"></script>
<script src="js/form-repeater.js"></script>
<script src="js/dropify.js"></script>
<script src="js/jquery-file-upload.js"></script>
<script src="js/formpickers.js"></script>
<script src="vendors/summernote/dist/summernote-bs4.min.js"></script>
<script src="js/editorDemo.js"></script>
<script src="js/toastDemo.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $.datetimepicker.setLocale('en');
        $('#reschedule_datetime').datetimepicker({
            format:'Y-m-d h:i:s a'
        });
    });
</script>