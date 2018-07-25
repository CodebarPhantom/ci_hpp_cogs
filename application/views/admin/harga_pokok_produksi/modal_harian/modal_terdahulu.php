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
									<h2><strong text-align='right'>Modal Terdahulu</strong></h2>																	
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
						
											
						
						</div>			  
						</div>
                      
               

                </div>
              
            </div>					
        </div>
		</div>

								
		


       