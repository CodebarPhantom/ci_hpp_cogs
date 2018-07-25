      <!-- footer content -->

        <footer>
          <div class="copyright-info">
            <p class="pull-right">Skripsi - <a href="https://www.facebook.com/eryan.fauzan.1">Eryan Fauzan</a> - Fasilkom UNSIKA 2016-2017 
            </p>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
      <!-- /page content -->

    </div>

  </div>

  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>

  <script src="<?php echo base_url();?>assets/gentelella/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>assets/gentelella/js/input_mask/jquery.inputmask.js"></script>

  <!-- gauge js -->
  <script type="text/javascript" src="<?php echo base_url();?>assets/gentelella/js/gauge/gauge.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/gentelella/js/gauge/gauge_demo.js"></script>
  <!-- bootstrap progress js -->
  <script src="<?php echo base_url();?>assets/gentelella/js/progressbar/bootstrap-progressbar.min.js"></script>
  <script src="<?php echo base_url();?>assets/gentelella/js/nicescroll/jquery.nicescroll.min.js"></script>
  <!-- icheck -->
  <script src="<?php echo base_url();?>assets/gentelella/js/icheck/icheck.min.js"></script>
  <!-- daterangepicker -->
  <script type="text/javascript" src="<?php echo base_url();?>assets/gentelella/js/moment/moment.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/gentelella/js/datepicker/daterangepicker.js"></script>
  <!-- chart js -->
  <script src="<?php echo base_url();?>assets/gentelella/js/chartjs/chart.min.js"></script>

  


  </script>
  <!-- skycons -->
  <script src="<?php echo base_url();?>assets/gentelella/js/skycons/skycons.min.js"></script>
  

  <!-- dashbord linegraph -->
 
  <!-- /dashbord linegraph -->
  <script src="<?php echo base_url();?>assets/gentelella/js/custom.js"></script>
 
  <!-- select2 -->
  <script src="<?php echo base_url();?>assets/gentelella/js/select/select2.full.js"></script>
 
  <!-- Autocomplete -->
  <script type="text/javascript" src="<?php echo base_url();?>assets/gentelella/js/autocomplete/countries.js"></script>
  <script src="<?php echo base_url();?>assets/gentelella/js/autocomplete/jquery.autocomplete.js"></script>
  <!-- Datatables-->
        <script src="<?php echo base_url();?>assets/gentelella/js/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url();?>assets/gentelella/js/datatables/dataTables.bootstrap.js"></script>
        <script src="<?php echo base_url();?>assets/gentelella/js/datatables/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url();?>assets/gentelella/js/datatables/buttons.bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>assets/gentelella/js/datatables/jszip.min.js"></script>
        <script src="<?php echo base_url();?>assets/gentelella/js/datatables/pdfmake.min.js"></script>
        <script src="<?php echo base_url();?>assets/gentelella/js/datatables/vfs_fonts.js"></script>
        <script src="<?php echo base_url();?>assets/gentelella/js/datatables/buttons.html5.min.js"></script>
        <script src="<?php echo base_url();?>assets/gentelella/js/datatables/buttons.print.min.js"></script>
        <script src="<?php echo base_url();?>assets/gentelella/js/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="<?php echo base_url();?>assets/gentelella/js/datatables/dataTables.keyTable.min.js"></script>
        <script src="<?php echo base_url();?>assets/gentelella/js/datatables/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url();?>assets/gentelella/js/datatables/responsive.bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>assets/gentelella/js/datatables/dataTables.scroller.min.js"></script>

  <!-- pace -->
  <script src="<?php echo base_url();?>assets/gentelella/js/pace/pace.min.js"></script>
  <script type="text/javascript">
    $(function() {
      'use strict';
      var countriesArray = $.map(countries, function(value, key) {
        return {
          value: value,
          data: key
        };
      });
      // Initialize autocomplete with custom appendTo:
      $('#autocomplete-custom-append').autocomplete({
        lookup: countriesArray,
        appendTo: '#autocomplete-container'
      });
    });
  </script>
  

		<script type="text/javascript">
          $(document).ready(function() {
            $('#datatable').dataTable();
            $('#datatable-keytable').DataTable({
              keys: true
            });
            $('#datatable-responsive').DataTable();
            $('#datatable-scroller').DataTable({
              ajax: "<?php echo base_url();?>assets/gentelella/js/datatables/json/scroller-demo.json",
              deferRender: true,
              scrollY: 380,
              scrollCollapse: true,
              scroller: true
            });
            var table = $('#datatable-fixed-header').DataTable({
              fixedHeader: true
            });
          });
          TableManageButtons.init();
        </script>

  <?php if ($this->session->flashdata('input_sukses')) {?>   
			<script type="text/javascript">
			$(function(){
				swal("Success", "Berhasil Disimpan ke Database", "success")
				});
			</script>
		<?php }?>
		<?php if ($this->session->flashdata('input_gagal')) {?>   
			<script type="text/javascript">
			$(function(){
				swal("Failed", "Gagal Menyimpan ke Database", "error")
				});
			</script>
		<?php }?>
		<?php if ($this->session->flashdata('update_sukses')) {?>   
			<script type="text/javascript">
			$(function(){
				swal("Information", "Data Berhasil di Update", "info")
				});
			</script>
		<?php }?>
		<?php if ($this->session->flashdata('update_gagal')) {?>   
			<script type="text/javascript">
			$(function(){
				swal("Failed", "Data Gagal di Update", "error")
				});
			</script>
		<?php }?>
		
		 <?php if ($this->session->flashdata('delete_sukses')) {?>   
			<script type="text/javascript">
			$(function(){
				swal("Deleted", "Data Berhasil di Hapus", "error")
				});
			</script>
		<?php }?>
		
		<script>		
        jQuery(document).ready(function($){
            $('.hapus').on('click',function(){
               
				var url = $(this).attr('href');
				swal({
					title: 'Delete Data dari Database?',
					
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Ya, Hapus Data'
					}).then(function () {
					window.location.href = url});
                
                return false;
            });
        });
    </script>
	<script>		
        jQuery(document).ready(function($){
            $('.batal').on('click',function(){
               
				var url = $(this).attr('href');
				swal({
					title: 'Batal ?',
					text: "Segala Input dan Perubahan Tidak akan Tersimpan",
					type: 'question',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'OK'
					}).then(function () {
					window.location.href = url});
                
                return false;
            });
        });
    </script>	
	<script>
    $(document).ready(function() {
      $(":input").inputmask();
    });
  </script>

		
<script type="text/javascript" src="<?php echo base_url('/assets/highcharts/highcharts.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/highcharts/modules/exporting.js'); ?>"></script>

<script type="text/javascript" src="<?php echo base_url('/assets/highcharts/modules/data.js'); ?>"></script>

	

<script type="text/javascript">
$('#grafik').highcharts({
 chart: {
  type: 'column',
  marginTop: 80,
  colors: ['#ff0000', '#434348']
 },
 credits: {
  enabled: false
 }, 
 tooltip: {
  shared: true,
  crosshairs: true,
  headerFormat: '<b>{point.key}</b>< br />'
 },
 title: {
  text: 'Grafik Penjualan '
 },
 subtitle: {
  text: 'Kurva Penjualan RM. Saung Tenda'
 },
 colors:['#CF000F', '#336E7B', '#00B16A'
 ], 
 yAxis:{
	 labels:{
		 formatter: function(){
		 return (this.value/1000000)+" JT"}
		 }
	 },
 
 xAxis: {
  categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun','Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
  labels: {
   rotation: 0,
   align: 'right',
   style: {
    fontSize: '10px',
    fontFamily: 'Verdana, sans-serif'
   }
  }
 },
 legend: {
  enabled: true
 },
 series: [{
  "name":"Modal",
  "data": <?php echo json_encode($grafik1); ?>
  },{
  "name":"Omzet",
  "data":<?php echo json_encode($grafik); ?>
 },{
  "name":"Keuntungan",
  "data":<?php echo json_encode($grafik2); ?>
 }]
});
</script>
 <!-- select2 -->
  <script>
    $(document).ready(function() {
      $(".select2_single").select2({
        placeholder: "Pilih Kategori",
        allowClear: true
      });
      $(".select2_group").select2({});
      $(".select2_multiple").select2({
        maximumSelectionLength: 4,
        placeholder: "With Max Selection limit 4",
        allowClear: true
      });
    });
  </script>
  <!-- /select2 -->


  
  

  
  
  
  <!-- /footer content -->
</body>

</html>
