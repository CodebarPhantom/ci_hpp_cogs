   <!-- page content -->
      <div class="right_col" role="main">

        <!-- top tiles -->
        
        <!-- /top tiles -->

        <br />

        <div class="row">
		
		<?php echo $this->session->flashdata('pesan');?>
		
          <div class="col-md-12 col-sm-12 col-xs-12">
		  
              <div class="x_panel">
                <div class="x_title">
                  <h2><strong>Data Pembayaran</strong></h2>
                  <div class="clearfix"></div>
                </div>
				
                <div class="x_content">
				<?php foreach($keterangan_pembeli as $lihat) { ?>
				
				<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">No. Meja : <strong><?=$lihat->no_meja;?></strong> </span>
                      </label>
                     
                </div>
				<br/>				
				<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan : <strong><?=$lihat->keterangan;?></strong> </span>
                      </label>

                </div>	
				<br/>
				<?php } ?>					
				
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>#</th>                                          
                        <th>Nama Menu</th>						
						<th>Quantity</th>
						<th>Harga</th>
						<th>Total</th>
                      </tr>
                    </thead>


                     <tbody>
					
						<?php $no = 1; ?>
							<?php foreach($detail_pembayaran as $look) { ?>
						<tr> 
						
							<td><?php echo $no++; ?></td>
							<td><?=$look->nama_menu;?></td>
							
							<td><?=$look->qty;?></td>
							<td>Rp. <?php echo number_format($look->price,0,',','.');?></td>
							<td>Rp. <?php echo number_format(($look->price)*($look->qty),0,',','.');?></td>												
							
							
							
							
						</tr>
						<?php } ?>
						
                      
                    </tbody>
                  </table>
                </div>
				
				<div class="x_content">
					<br />
					
					<form id="demo-form2" data-parsley-validate method="post"   action="<?php echo base_url('kasir/proses_pembayaran');?>" enctype="multipart/form-data" class="form-horizontal form-label-left">

							<div class="form-group">
								<label class="control-label col-md-8 col-sm-3 col-xs-12">Total <span class="required">*</span>
								</label>
								<div class="col-md-3 col-sm-6 col-xs-12">								
								<?php foreach($total_pembelian as $tot_pem) { ?>
								<?php $total = number_format($tot_pem->total,0,',','.');?>
								<?php echo form_input(array('name'=>'total','type'=>'number','type'=>'hidden','id'=>'total','value'=>$tot_pem->total)); ?> 
								<?php echo form_input(array('name'=>'id_pembeli','type'=>'hidden','value'=>$tot_pem->id_pembeli)); ?> 
									<?php echo form_input(array('placeholder'=>'0','class'=>'form-control col-md-7 col-xs-12','disabled'=>'disabled','value'=>$total,'onkeyup'=>'pengurangan()')); ?> 
								<?php } ?>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-8 col-sm-3 col-xs-12">Bayar <span class="required">*</span>
								</label>
								<div class="col-md-3 col-sm-6 col-xs-12">
									<?php echo form_input(array('name'=>'bayar','placeholder'=>'0','class'=>'form-control col-md-3 col-xs-12','type'=>'number','required' => 'required', 'id'=>'bayar','onkeyup'=>'pengurangan()','value'=>$lihat->bayar)); ?> 
								</div>
							</div>     
							<div class="form-group">
								<label class="control-label col-md-8 col-sm-3 col-xs-12">Kembalian <span class="required">*</span>
								</label>
								<div class="col-md-3 col-sm-6 col-xs-12">
									<?php echo form_input(array('name'=>'kembalian','placeholder'=>'0','class'=>'form-control col-md-3 col-xs-12','disabled'=>'disabled','type'=>'number','id'=>'kembalian')); ?> 
								</div>
							</div>    
							<div class="form-group">
								<label class="control-label col-md-8 col-sm-3 col-xs-12">&nbsp
								</label>
								<div class="col-md-3 col-sm-6 col-xs-12">
								
									<?php echo form_submit(array('value'=>'Proses','name'=>'proses','class'=>'btn btn-primary','id'=>'proses','disabled'=>'disabled'));?>
									<a href="<?php echo base_url('kasir/pembayaran');?>" class="btn btn-danger" role="button">Cancel</a>
								</div>
							</div>						
						</form>
						
						<div class="ln_solid"/>
					</div>	
			  </div>
            </div>
        </div>
		</div>
		<script type="text/javascript">
            function pengurangan(){
                //nilai pertamaa
                var total=document.getElementById("total").value;
                //nilai kedua
                var bayar=document.getElementById("bayar").value;
                //operasi tambah
                var kembalian=parseInt(bayar)-parseInt(total);
                //menampilkan hasil tambah
                document.getElementById("kembalian").value=parseInt(kembalian);
			if (kembalian >= 0) {
	      $('#proses').removeAttr("disabled");
	    }else{
	      $('#proses').attr("disabled","disabled");
	    };

            }
           
        </script>
	      