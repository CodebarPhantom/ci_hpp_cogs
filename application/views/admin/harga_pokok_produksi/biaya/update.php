   <!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"/>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Update Komponen Biaya HPP</h2>
						<div class="clearfix"/>
					</div>
					<div class="x_content">
						<br />
						<?php foreach ($update as $query) { ?>


						<form id="demo-form2" method="post" action="<?php echo base_url('admin/update_biaya_proses');?>" enctype="multipart/form-data" class="form-horizontal form-label-left">
								<?php validation_errors();?>
								<div class="form-group">                      
									<div class="col-md-6 col-sm-6 col-xs-12">
										<?php echo form_input(array('name'=>'id_biaya','type'=>'hidden','class'=>'form-control col-md-7 col-xs-12','required' => 'required','value'=>$query->id_biaya)); ?> 
									</div>
								</div>					  


								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Overhead Pabrik <span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<?php echo form_input(array('name'=>'nama_biaya','placeholder'=>'Nama Biaya','class'=>'form-control col-md-7 col-xs-12','required' => 'required','value'=>$query->nama_biaya)); ?> 
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12">Satuan <span class="required">*</span>
									</label>
									<div class="col-md-3 col-sm-6 col-xs-12">
										<?php echo form_input(array('name'=>'satuan','placeholder'=>'Satuan','class'=>'form-control col-md-3 col-xs-12','required' => 'required','value'=>$query->satuan)); ?> 
									</div>
								</div>                   
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12">Golongan Overhead <span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<select name="golongan_biaya" class="form-control" required>
											<option value="Biaya Bahan Baku" <?php if($query->golongan_biaya =='Biaya Bahan Baku'){echo"selected";}?>>Biaya Bahan Baku</option>
												<option value="Biaya Tenaga Kerja Langsung"<?php if($query->golongan_biaya =='Biaya Tenaga Kerja Langsung'){echo"selected";}?>>Biaya Tenaga Kerja Langsung</option>
													<option value="Biaya Bahan Penolong" <?php if($query->golongan_biaya =='Biaya Bahan Penolong'){echo"selected";}?>>Biaya Bahan Penolong</option>
														<option value="Biaya Tenaga Kerja Tak Langsung"<?php if($query->golongan_biaya =='Biaya Tenaga Kerja Tak Langsung'){echo"selected";}?>>Biaya Tenaga Kerja Tak Langsung</option>
															<option value="Biaya Reparasi dan Pemeliharaan"<?php if($query->golongan_biaya =='Biaya Reparasi dan Pemeliharaan'){echo"selected";}?>>Biaya Reparasi dan Pemeliharaan</option>
																<option value="Biaya Overhead Pabrik Lain"<?php if($query->golongan_biaya =='Biaya Overhead Pabrik Lain'){echo"selected";}?>>Biaya Overhead Pabrik Lain</option>
																</select>
															</div>
														</div>	                  
														<div class="ln_solid"/>
														<div class="form-group">
															<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
																<?php echo form_submit(array('value'=>'Simpan','name'=>'Simpan','class'=>'btn btn-primary'));?>
																<a href="<?php echo base_url('admin/lihat_daftar_biaya');?>" class="btn btn-danger batal" role="button">Cancel</a>

															</div>
														</div>

													</form>
													<?php }?>
												</div>
											</div>
										</div>
									</div>




									