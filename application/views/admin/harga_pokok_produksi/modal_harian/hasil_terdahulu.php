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
									<?php foreach($total_modal->result() as $lihat) { ?>								
									<h2><strong text-align='right'>Total Modal Rp. <?php echo number_format($lihat->total_modal,0,',','.');?></strong></h2>	
									<?php } ?>
									<div class="clearfix"></div>
								</div>
						<div class="x_content">
						<br />
							<form id="demo-form2" data-parsley-validate method="post" action="<?php echo base_url('admin/hasil_terdahulu');?>" enctype="multipart/form-data" class="form-horizontal form-label-left">
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
								<th>Nama Modal</th>                        
								<th>Kuantitas</th>
								<th>Harga</th>
								<th>Jumlah</th>
								<th>Golongan</th>									
								<th>Action</th>
							</tr>
							</thead>
							<tbody>					
							<?php $no = 1; ?>
							<?php foreach($data_modal as $look) { ?>
							<tr> 
								<td><?php echo $no++; ?></td>
								<td><?=$look->nama_biaya;?></td>							
								<td><?=$look->kuantitas; ?>&nbsp<?=$look->satuan; ?></td>
								<td>Rp. <?php echo number_format($look->harga,0,',','.');?> /<?=$look->satuan; ?></td>
								<td>Rp. <?php echo number_format($look->jumlah,0,',','.');?></td>
								<td><?=$look->golongan_biaya;?></td>
								<td><?php echo anchor('admin/update_modal/'.$look->id_modal,'<i class="fa fa-pencil"></i>',array('class'=>'btn btn-info','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Edit'));?></td>					
														
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

								
		


       