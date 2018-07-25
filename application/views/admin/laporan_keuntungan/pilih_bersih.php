   <!-- page menu -->
      <div class="right_col" role="main">

        <!-- top tiles -->
        
        <!-- /top tiles -->

        <br />

        <div class="row">
		
		<?php echo $this->session->flashdata('pesan');?>
		
          <div class="col-md-12 col-sm-12 col-xs-12">
		  
              <div class="x_panel">
                <div class="x_title">
                  <h2><strong>Pilih Periode Keuntungan Bersih</strong></h2>
                  <div class="clearfix"></div>
                </div>
				<div class="x_content">
                  <br />
                  <form id="demo-form2" data-parsley-validate method="post" action="<?php echo base_url('admin/keuntungan_bersih');?>" enctype="multipart/form-data" class="form-horizontal form-label-left">
					<?php validation_errors();?>
                    
					 <div class="form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12">Bulan</label>
					<div class="col-md-5 col-sm-9 col-xs-12">
						 <select name="bulan" class="form-control" required>
                          <option value="01">Januari</option>
                          <option value="02">Febuari</option>
                          <option value="03">Maret</option>
						  <option value="04">April</option>
                          <option value="05">Mei</option>
                          <option value="06">Juni</option>
						  <option value="07">Juli</option>
                          <option value="08">Agustus</option>
                          <option value="09">September</option>
						  <option value="10">Oktober</option>
                          <option value="11">November</option>
                          <option value="12">Desember</option>
                        </select>
                      </div>
					</div>	
					<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Tahun</label>
						<div class="col-md-5 col-sm-9 col-xs-12">
							<select name="tahun" class="form-control" required>
							<?php
							for($i=date('Y'); $i>=2018; $i--) {
							$selected = '';
							if ($tahun == $i) $selected = ' selected="selected"';
							print('<option value="'.$i.'"'.$selected.'>'.$i.'</option>'."\n");
							}?>
							</select>  
						</div>
					</div>					
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <?php echo form_submit(array('value'=>'Lihat','name'=>'Simpan','class'=>'btn btn-primary'));?>
                      </div>
                    </div>
                  </form>
				  <div class="ln_solid"></div>
                </div>
				
			  </div>
            </div>
        </div>
		
								
		


       