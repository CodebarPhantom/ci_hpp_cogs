<!-- page content -->
      <div class="right_col" role="main">

        <div class="">
          
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2><strong>Data Resep</strong></h2>
				 
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
				<?php foreach($details as $look) { ?>
                  <div class="col-md-7 col-sm-7 col-xs-12">
                    <div class="product-image">
					<img src="<?php echo base_url()?>/assets/image/foto_menu/<?=$look->foto?>" alt="..." class="img-thumbnail img-responsive">                      
                    </div>
					 
                  </div>

                  <div class="col-md-5 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">

                    <h3 class="prod_title"><?=$look->category_menu?></h3>
					<h3 class=""><?=$look->nama_menu?></h3>
                    <div class="">
                      <div class="product_price">
                        <h1 class="price">Rp. <?php echo number_format($look->harga,0,',','.');?></h1>                        
                      </div>
                    </div>
					<form id="demo-form2" data-parsley-validate method="post" action="<?php echo base_url('admin/tambah_resep_proses');?>" enctype="multipart/form-data" class="form-horizontal form-label-left">
					<div class="form-group">                      
                      <div class="col-md-6 col-sm-6 col-xs-12">
						<?php echo form_input(array('name'=>'id_menu','type'=>'hidden','class'=>'form-control col-md-7 col-xs-12','value'=>$look->id_menu)); ?> 
                      </div>
                    </div>	
					<div class="form-group">
					<label class="control-label col-md-2 col-sm-3 col-xs-12"><strong>Tambah Resep</strong></label>
						<div class="col-md-7 col-sm-7 col-xs-12">
							<?php echo cmb_dinamis('id_biaya', " tbl_daftar_biaya WHERE (golongan_biaya = 'Biaya Bahan Baku' OR golongan_biaya = 'Biaya Bahan Penolong')", 'nama_biaya', 'id_biaya', $id_biaya) ?>
						</div>
						<div class="col-md-3 col-sm-7 col-xs-12">
							<?php echo form_submit(array('value'=>'Tambah','name'=>'Simpan','class'=>'btn btn-primary source'));?>
						</div>
					</div>
					 
					</form>					
                
					<br/>
					<br/>
					<br/>
					
                  </div>
				  <?php }?>
					
					
                  <div class="col-md-12">
				<div class="ln_solid"></div>
								
                   <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>#</th>
                                               
                        <th>Nama Resep</th>
										
						<th>Action</th>
                      </tr>
                    </thead>


                      <tbody>
					
					<?php $no = 1; ?>
							<?php foreach($query as $lihat) { ?>
						<tr> 
							<td><?php echo $no++; ?></td>
												
							<td><?=$lihat->nama_biaya; ?></td>
																			
							<td>
							<form id="demo-form2" data-parsley-validate method="post" action="<?php echo base_url('admin/delete_resep/'.$lihat->id_resep);?>" enctype="multipart/form-data" class="form-horizontal form-label-left">
							<?php echo form_input(array('name'=>'id_menu','type'=>'hidden','class'=>'form-control col-md-7 col-xs-12','value'=>$look->id_menu)); ?> 
                   			<?php echo form_submit(array('value'=>'Hapus','name'=>'Simpan','class'=>'btn btn-danger source'));?>				
							</form>	
							
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

        
      <!-- /page content -->