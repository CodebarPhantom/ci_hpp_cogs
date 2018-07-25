   <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Update Pegawai</h2>
                <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
					<?php foreach ($detail as $query) { ?>
					
					
                  <form id="demo-form2" method="post" action="<?php echo base_url('admin/update_pegawai_proses');?>" enctype="multipart/form-data" class="form-horizontal form-label-left">
					<div class="form-group">                      
                      <div class="col-md-6 col-sm-6 col-xs-12">
						<?php echo form_input(array('name'=>'id_pegawai','type'=>'hidden','class'=>'form-control col-md-7 col-xs-12','required'=>'required','value'=>$query->id_pegawai)); ?> 
                      </div>
                    </div>					  
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">NIK<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
						<?php echo form_input(array('name'=>'nik','placeholder'=>'NIK','class'=>'form-control col-md-7 col-xs-12','required'=>'required','value'=>$query->nik)); ?> 
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Pegawai<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_input(array('name'=>'nama_pegawai','placeholder'=>'Nama Pegawai','class'=>'form-control col-md-7 col-xs-12','required'=>'required','value'=>$query->nama_pegawai)); ?>
                      </div>
                    </div>
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin <span class="required">*</span>
					  </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="jk" class="form-control">
								<option value="Laki-laki" <?php if($query->jk =='Laki-laki'){echo"selected";}?>>Laki-laki</option> 
								<option value="Perempuan" <?php if($query->jk =='Perempuan'){echo"selected";}?>>Perempuan</option> 
						</select>
                      </div>
                    </div>
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
					  <textarea class="form-control" rows="5" id="comment" placeholder="Alamat" name="alamat" required ><?php echo $query->alamat;?></textarea>                       
                      </div>
                    </div>
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Tempat dan Tanggal Lahir<span class="required">*</span>
                      </label>
					  <div class="col-md-2 col-sm-6 col-xs-12">
						 <?php echo form_input(array('name'=>'tempat_lahir','placeholder'=>'Bekasi','class'=>'form-control col-md-6 col-xs-12','required'=>'required','value'=>$query->tempat_lahir)); ?>
                      </div>
                      <div class="col-md-1 col-sm-6 col-xs-12">
						 <?php echo form_input(array('name'=>'hari','placeholder'=>'01','class'=>'form-control col-md-6 col-xs-12','type'=>'number','required'=>'required','value'=>$query->hari)); ?>
                      </div>
					  <div class="col-md-2 col-sm-6 col-xs-12">
						 <select name="bulan" class="form-control" required>
						 <option value='01' <?php if($query->bulan =='01'){echo"selected";}?>>Januari</option>
						 <option value='02' <?php if($query->bulan =='02'){echo"selected";}?>>Febuari</option>
						 <option value='03' <?php if($query->bulan =='03'){echo"selected";}?>>Maret</option>
						 <option value='04' <?php if($query->bulan =='04'){echo"selected";}?>>April</option>
						 <option value='05' <?php if($query->bulan =='05'){echo"selected";}?>>Mei</option>
						 <option value='06' <?php if($query->bulan =='06'){echo"selected";}?>>Juni</option>
						 <option value='07' <?php if($query->bulan =='07'){echo"selected";}?>>Juli</option>
						 <option value='08' <?php if($query->bulan =='08'){echo"selected";}?>>Agustus</option>
						 <option value='09' <?php if($query->bulan =='09'){echo"selected";}?>>September</option>
						 <option value='10' <?php if($query->bulan =='10'){echo"selected";}?>>Oktober</option>
						 <option value='11' <?php if($query->bulan =='11'){echo"selected";}?>>November</option>
						 <option value='12' <?php if($query->bulan =='12'){echo"selected";}?>>Desember</option>
						          
                        </select>
                      </div>
					  <div class="col-md-1 col-sm-6 col-xs-12">
						 <?php echo form_input(array('name'=>'tahun','placeholder'=>'1995','class'=>'form-control col-md-6 col-xs-12','required'=>'required','value'=>$query->tahun)); ?>
                      </div>
                    </div>
					
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Jabatan <span class="required">*</span>
					  </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="jabatan" class="form-control" required>
                          <option value="Kasir" <?php if($query->jabatan =='Kasir'){echo"selected";}?>>Kasir</option>
                          <option value="Koki"<?php if($query->jabatan =='Koki'){echo"selected";}?>>Koki</option>
						  <option value="Pelayan"<?php if($query->jabatan =='Pelayan'){echo"selected";}?>>Pelayan</option>						  
                        </select>
                      </div>
                    </div>					
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">No. HP<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
					  <?php echo form_input(array('name'=>'no_hp','required'=>'required','placeholder'=>'0857-XXXX-XXXX','class'=>'form-control col-md-7 col-xs-12','value'=>$query->no_hp,'data-inputmask'=>"'mask' : '****-****-****'")); ?>
                        
                      </div>
                    </div>
					
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Foto<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input  id="fileInput" type="file" name="filefoto"> Maximal Tinggi 1920, Lebar 1080, Size 2MB
                      </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <?php echo form_submit(array('value'=>'Simpan','name'=>'Simpan','class'=>'btn btn-primary'));?>
						<a href="<?php echo base_url('admin/lihat_pegawai');?>" class="btn btn-danger batal" role="button">Cancel</a>
                      </div>
                    </div>
					
                  </form>
				  <?php }?>
                </div>
              </div>
            </div>
          </div>

         


         