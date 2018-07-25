   <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2><strong>Tambah Pegawai</strong></h2>
                <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form id="demo-form2" data-parsley-validate method="post" action="<?php echo base_url('admin/tambah_pegawai_proses');?>" enctype="multipart/form-data" class="form-horizontal form-label-left">
					<?php validation_errors();?>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">NIK<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
						<?php echo form_input(array('name'=>'nik','type'=>'number','placeholder'=>'NIK','class'=>'form-control col-md-7 col-xs-12','required'=>'required')); ?> 
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Pegawai<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_input(array('name'=>'nama_pegawai','placeholder'=>'Nama Pegawai','class'=>'form-control col-md-7 col-xs-12','required'=>'required')); ?>
                      </div>
                    </div>
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin<span class="required">*</span>
					  </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="jk" class="form-control" required>
                          <option value="Laki-laki">Laki-laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                      </div>
                    </div>
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
					  <textarea class="form-control" rows="5" id="comment" placeholder="Alamat" name="alamat" required ></textarea>                       
                      </div>
                    </div>
					
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Tempat dan Tanggal Lahir <span class="required">*</span>
                      </label>
					  <div class="col-md-2 col-sm-6 col-xs-12">
						 <?php echo form_input(array('name'=>'tempat_lahir','placeholder'=>'Bekasi','class'=>'form-control col-md-6 col-xs-12','required'=>'required')); ?>
                      </div>
                      <div class="col-md-1 col-sm-6 col-xs-12">
						 <?php echo form_input(array('name'=>'hari','type'=>'number','placeholder'=>'01','class'=>'form-control col-md-6 col-xs-12','required'=>'required')); ?>
                      </div>
					  <div class="col-md-2 col-sm-6 col-xs-12">
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
					  <div class="col-md-1 col-sm-6 col-xs-12">
						 <?php echo form_input(array('name'=>'tahun','placeholder'=>'1995','class'=>'form-control col-md-6 col-xs-12','required'=>'required')); ?>
                      </div>
                    </div>	                   	
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Jabatan <span class="required">*</span>
					  </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="jabatan" class="form-control" required>
                          <option value="Kasir">Kasir</option>
                          <option value="Koki">Koki</option>
						  <option value="Pelayan">Pelayan</option>
						  
                        </select>
                      </div>
                    </div>	
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">No. HP<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
					  
                        <?php echo form_input(array('name'=>'no_hp','required'=>'required','placeholder'=>'0857-XXXX-XXXX','class'=>'form-control col-md-7 col-xs-12','data-inputmask'=>"'mask' : '****-****-****'")); ?>
                      </div>
                    </div>		
											
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Foto<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input  id="fileInput" type="file" name="filefoto" required > Maximal Tinggi 1920, Lebar 1080, Size 2MB 
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
                </div>
              </div>
            </div>
          </div>

  


         