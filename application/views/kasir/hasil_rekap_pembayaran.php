   <!-- page content -->
      <div class="right_col" role="main">

        <!-- top tiles -->
        
        <!-- /top tiles -->

        <br />

	<div class="row">	
			 <div class="col-md-12 col-sm-6 col-xs-12">
             
               
                <div class="x_content">                                 
						<div class="col-md-12 col-sm-12 col-xs-12">		  
							<div class="x_panel">
								<div class="x_title">
															
									<h2><strong text-align='right'>Data Rekapitulasi Pembayaran</strong></h2>	
									
									<div class="clearfix"></div>
								</div>
						<div class="x_content">
						<br />
							<form id="demo-form2" data-parsley-validate method="post" action="<?php echo base_url('kasir/hasil_rekap_pembayaran');?>" enctype="multipart/form-data" class="form-horizontal form-label-left">
							<?php validation_errors();?>							
							<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Awal Tanggal<span class="required">*</span>                      </label>
								<div class="col-md-4 col-sm-6 col-xs-12">
									<input name="awal" class="form-control "type="date" required>
								</div>
							</div>
							<div class="form-group">
							<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Akhir Tanggal<span class="required">*</span>                      </label>
								<div class="col-md-4 col-sm-6 col-xs-12">
									<input name="akhir" class="form-control " type="date" required>
								</div>
							</div>								
							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<?php echo form_submit(array('value'=>'Cari','name'=>'cari','class'=>'btn btn-primary source'));?>
								</div>
							</div>
							</form>
							<div class="ln_solid"></div>
						</div>
						<div class="x_content">
						<table id="datatable" class="table table-striped table-bordered">
							<thead>
							<tr>
								<th>#</th>
							
								<th>Tanggal</th>
								<th>Keterangan</th>
								<th>Status</th>									
								<th>Action</th>
							</tr>
							</thead>
							<tbody>					
							<?php $no = 1; ?>
							<?php foreach($data_pembayaran as $look) { ?>
							<tr> 
								<td><?php echo $no++; ?></td>
								
								<td><?=$look->tgl; ?></td>
								<td><?=$look->keterangan; ?></td>
								<td <?php if($look->status=='paid'){echo "bgcolor='#336E7B'";}if($look->status=='unpaid'){echo "bgcolor='#CF000F'";}?> ><font color="white"><center><?=$look->status; ?></center></font> </td>		
								<td>	
							<?php echo anchor('kasir/detail_pembayaran/'.$look->id_pembeli,'<i class="fa fa-bars"></i>',array('class'=>'btn btn-info','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Detail'));?>							
							<?php echo anchor('kasir/cetak_struk/'.$look->id_pembeli,'<i class="fa fa-print"></i>',array('class'=>'btn btn-success','id'=>'proses_cetak','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Print'));?>		
							</td>						
							<?php } ?>							
							</tr>  
							
							</tbody>
							
					
						</table>				
						</div>	
											
						
						</div>			  
						</div>
                      
               

                </div>
              
            </div>					
        </div>
		</div>

								
		


       