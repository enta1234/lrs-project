<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/dashboard/'); ?>jquery/jquery.min.js"></script>
<script src="<?php echo base_url('assets/web/'); ?>assets/jquery/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/dashboard/'); ?>bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dashboard/'); ?>themelte/js/adminlte.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url('assets/dashboard/'); ?>select2/js/select2.min.js"></script>
<!-- Bootstrap Wysihtml5 -->
<script src="<?php echo base_url('assets/dashboard/'); ?>bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js"></script>
<!-- Bootstrap Table -->
<script src="<?php echo base_url('assets/dashboard/'); ?>bootstraptable/dist/bootstrap-table.js"></script>
<script src="<?php echo base_url('assets/dashboard/'); ?>bootstraptable/dist/extensions/export/bootstrap-table-export.js"></script>
<script src="<?php echo base_url('assets/dashboard/'); ?>bootstraptable/dist/extensions/editable/bootstrap-table-editable.js"></script>
<script src="<?php echo base_url('assets/dashboard/'); ?>bootstraptable/dist/locale/bootstrap-table-th-TH.js"></script>
<script src="<?php echo base_url('assets/dashboard/'); ?>bootstraptable/dist/tableexport.js"></script>
<!-- Alert2 -->
<script src="https://unpkg.com/sweetalert2@7.0.9/dist/sweetalert2.all.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/dashboard/'); ?>icheck/js/icheck.js"></script>
<!-- Custom JS -->
<?php if ($ac_staff=='active'): ?>
	<script src="<?php echo base_url('assets/dashboard/'); ?>js/managestaff.js"></script>
<?php endif ?>
<?php if ($ac_addnews=='active'): ?>
	<script src="<?php echo base_url('assets/dashboard/'); ?>js/addnews.js"></script>
<?php endif ?>
<?php if ($ac_news=='active'): ?>	
	<script src="<?php echo base_url('assets/dashboard/'); ?>js/managenews.js"></script>
<?php endif ?>
<?php if ($ac_register=='active'): ?>   
    <script src="<?php echo base_url('assets/dashboard/'); ?>js/manageregister.js"></script>
<?php endif ?>
<?php if ($ac_historyregister=='active'): ?>    
    <script src="<?php echo base_url('assets/dashboard/'); ?>js/historyregister.js"></script>
<?php endif ?>
<?php if ($ac_historylawyer=='active'): ?>    
    <script src="<?php echo base_url('assets/dashboard/'); ?>js/historylawyer.js"></script>
<?php endif ?>
<?php if ($ac_lawyer=='active'): ?> 
    <script src="<?php echo base_url('assets/dashboard/'); ?>js/managelawyer.js"></script>
<?php endif ?>
<?php if ($ac_lawyer70=='active'): ?>   
    <script src="<?php echo base_url('assets/dashboard/'); ?>js/managelawyer70.js"></script>
<?php endif ?>
<?php if ($ac_lawyerban=='active'): ?>	
	<script src="<?php echo base_url('assets/dashboard/'); ?>js/managelawyerban.js"></script>
<?php endif ?>
<script>
	$(document).ready(function() {
    	$('.select2').select2({
    		theme: "bootstrap"
    	});
	});
	$(function () {
    $('.textediter').wysihtml5({
        toolbar: {
            "fa": true,
            "html": true,
        }
    })
  })
</script>
</body>
</html>