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
								<?php foreach($total_modal_harian->result() as $look) { ?>
								
								<h2><strong text-align='right'>Modal Hari Ini Rp. <?php echo number_format($look->total,0,',','.');?></strong></h2>
												
									<?php } ?>
																			
									<div class="clearfix"></div>
								</div>
						<div class="x_content">
						<br />
							<form id="demo-form2" data-parsley-validate method="post" action="<?php echo base_url('admin/tambah_modal_proses');?>" enctype="multipart/form-data" class="form-horizontal form-label-left">
							<?php validation_errors();?>
							
							
							<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Bahan Baku</label>
								<div class="col-md-5 col-sm-9 col-xs-12">
									<?php echo cmb_dinamis('id_biaya', 'tbl_daftar_biaya', 'nama_biaya', 'id_biaya', $id_biaya) ?>
								</div>
							</div>
							<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Kuantitas<span class="required">*</span>                      </label>
								<div class="col-md-1 col-sm-6 col-xs-12">
									<?php echo form_input(array('name'=>'kuantitas','type'=>'number','placeholder'=>'60','class'=>'form-control col-md-3 col-xs-12','required' => 'required')); ?> 
								</div>
							</div>
							<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Harga<span class="required">*</span></label>
								<div class="col-md-3 col-sm-6 col-xs-12">
								<?php echo form_input(array('name'=>'harga','placeholder'=>'10000','type'=>'number','class'=>'form-control col-md-3 col-xs-12','required' => 'required')); ?> 
								</div>
							</div>  								
							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<?php echo form_submit(array('value'=>'Tambah','name'=>'Simpan','class'=>'btn btn-primary source'));?>
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
							<?php foreach($lihat_modal_harian->result() as $look) { ?>
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

								
		


       