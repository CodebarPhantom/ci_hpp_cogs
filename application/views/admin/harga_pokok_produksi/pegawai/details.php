   <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2><strong>Details Pegawai</strong></h2>
                <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
					<?php foreach ($detail as $query) { ?>
					<div class="col-md-2 col-sm-4 col-xs-12 animated fadeInDown"></div>
					 <div class="col-md-8 col-sm-4 col-xs-12 animated fadeInDown">
                      <div class="well profile_view">
                        <div class="col-sm-12">
                          <h3 class="brief"><strong>Kode Pegawai</strong></br><?php echo $query->id_pegawai?></h3>
                          <div class="left col-xs-7">
							<h2><strong>NIK </strong></br><?php echo $query->nik?></h2><div class="clearfix"></div>
                            <h2><strong>Nama </strong></br><?php echo $query->nama_pegawai?></h2><div class="clearfix"></div>
							<h2><strong>Tempat dan Tanggal Lahir </strong></br><?php echo $query->tempat_lahir?>, <?php echo $query->tgl?></h2><div class="clearfix"></div>
							<h2><strong>Jenis Kelamin </strong></br><?php echo $query->jk?></h2><div class="clearfix"></div>
							<h2><strong>Alamat </strong></br><?php echo $query->alamat?></h2><div class="clearfix"></div>
							<h2><strong>Jabatan </strong></br><?php echo $query->jabatan?></h2><div class="clearfix"></div>
							<h2><strong>No. HP </strong></br><?php echo $query->no_hp?></h2><div class="clearfix"></div>
							
							
							
							</br>
                          </div>
                          <div class="right col-xs-5 text-center">
                            <img src="<?php echo base_url()?>/assets/image/foto_pegawai/<?=$query->foto?>" alt="" class="img-thumbnail img-responsive">
							</br>
							</br>
                          </div>
                        </div>
                        <div class="col-xs-12 bottom text-center">
                           <a type="button" class="btn btn-round btn-success" href="<?php echo base_url('admin/lihat_pegawai');?>"><i class="fa fa-chevron-left">&nbsp </i>Kembali</a>
                        </div>
                      </div>
                    </div>
					
					
                  <?php }?>
                </div>
              </div>
            </div>
          </div>

         


         