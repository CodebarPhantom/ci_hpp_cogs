   <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Update Modal Harian</h2>
                <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
					<?php foreach ($update as $query) { ?>
					
					
                  <form id="demo-form2" method="post" action="<?php echo base_url('admin/update_modal_proses');?>" enctype="multipart/form-data" class="form-horizontal form-label-left">
					<?php validation_errors();?>
					<div class="form-group">                      
                      <div class="col-md-6 col-sm-6 col-xs-12">
						<?php echo form_input(array('name'=>'id_modal','type'=>'hidden','class'=>'form-control col-md-7 col-xs-12','value'=>$query->id_modal)); ?> 
                      </div>
                    </div>					
                    <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Bahan Baku</label>
								<div class="col-md-5 col-sm-9 col-xs-12">
									<?php echo cmb_dinamis('id_biaya', 'tbl_daftar_biaya', 'nama_biaya', 'id_biaya', $id_biaya) ?>
								</div>
					</div>
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Kuantitas <span class="required">*</span>
                      </label>
                      <div class="col-md-1 col-sm-6 col-xs-12">
						<?php echo form_input(array('name'=>'kuantitas','type'=>'number','placeholder'=>'Satuan','class'=>'form-control col-md-3 col-xs-12','required' => 'required','value'=>$query->kuantitas)); ?> 
                      </div>
                    </div>	
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga <span class="required">*</span>
                      </label>
                      <div class="col-md-3 col-sm-6 col-xs-12">
						<?php echo form_input(array('name'=>'harga','placeholder'=>'Satuan','class'=>'form-control col-md-3 col-xs-12','required' => 'required','value'=>$query->harga)); ?> 
                      </div>
                    </div>  
									
                                      
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <?php echo form_submit(array('value'=>'Simpan','name'=>'Simpan','class'=>'btn btn-primary'));?>
						<a href="<?php echo base_url('admin/lihat_modal_harian');?>" class="btn btn-danger batal" role="button">Cancel</a>

                      </div>
                    </div>
					
                  </form>
				  <?php }?>
                </div>
              </div>
            </div>
          </div>

         


         