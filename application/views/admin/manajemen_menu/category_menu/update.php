   <!-- page menu -->
      <div class="right_col" role="main">
        <div class="">
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Update Category menu</h2>
                <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
					<?php foreach ($update as $query) { ?>
					
					
                  <form id="demo-form2" method="post" action="<?php echo base_url('admin/update_category_menu_proses');?>" enctype="multipart/form-data" class="form-horizontal form-label-left">
					  <div class="form-group">
                      
                      <div class="col-md-6 col-sm-6 col-xs-12">
						<?php echo form_input(array('name'=>'id_category','type'=>'hidden','class'=>'form-control col-md-7 col-xs-12','value'=>$query->id_category)); ?> 
                      </div>
                    </div>
					  
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Category menu <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
						<?php echo form_input(array('name'=>'category_menu','placeholder'=>'Category menu','class'=>'form-control col-md-7 col-xs-12','required'=>'required','value'=>$query->category_menu)); ?> 
                      </div>
                    </div>
					
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <?php echo form_submit(array('value'=>'Simpan','name'=>'Simpan','class'=>'btn btn-primary'));?>
						<a href="<?php echo base_url('admin/lihat_category_menu');?>" class="btn btn-danger batal" role="button">Cancel</a>
                      </div>
                    </div>
					
                  </form>
				  <?php }?>
                </div>
              </div>
            </div>
          </div>

         


         