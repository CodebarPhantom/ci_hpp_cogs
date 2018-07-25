   <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2><strong>Tambah User</strong></h2>
                <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form id="demo-form2" data-parsley-validate method="post" action="<?php echo base_url('admin/tambah_user_proses');?>" enctype="multipart/form-data" class="form-horizontal form-label-left">
					<?php validation_errors();?>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
						<?php echo form_input(array('name'=>'nama_user','placeholder'=>'Nama','class'=>'form-control col-md-7 col-xs-12','required'=>'required')); ?> 
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Username<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_input(array('name'=>'username','placeholder'=>'Username','class'=>'form-control col-md-7 col-xs-12','required'=>'required')); ?>
                      </div>
                    </div>
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Password<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_password(array('name'=>'password','placeholder'=>'Password','class'=>'form-control col-md-7 col-xs-12','required'=>'required')); ?>
                      </div>
                    </div>									
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">User Type <span class="required">*</span>
					  </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="level" class="form-control" required>
                          <option value="Admin">Admin</option>
                          <option value="Kasir">Kasir</option>
                        </select>
                      </div>
                    </div>		
					
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <?php echo form_submit(array('value'=>'Simpan','name'=>'Simpan','class'=>'btn btn-primary'));?>
						<a href="<?php echo base_url('admin/lihat_user');?>" class="btn btn-danger batal" role="button">Cancel</a>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>

  


         