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
                  <h2><strong>Data Biaya Lain-lain </strong></h2>
                  <div class="clearfix"></div>
                </div>
				<div class="x_content">
                  <br />
                  <form id="demo-form2" data-parsley-validate method="post" action="<?php echo base_url('admin/tambah_biaya_lain_proses');?>" enctype="multipart/form-data" class="form-horizontal form-label-left">
					<?php validation_errors();?>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Biaya Lain-lain <span class="required">*</span>
                      </label>
                      <div class="col-md-4 col-sm-6 col-xs-12">
						<?php echo form_input(array('name'=>'nama_biaya_lain','placeholder'=>'Biaya Lain-lain','class'=>'form-control col-md-7 col-xs-12','required'=>'required')); ?> 
                      </div>
                    </div>
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Kuantitas<span class="required">*</span>
                      </label>
                      <div class="col-md-1 col-sm-6 col-xs-12">
						<?php echo form_input(array('name'=>'kuantitas','placeholder'=>'1','type'=>'number','class'=>'form-control col-md-7 col-xs-12','required'=>'required')); ?> 
                      </div>
                    </div>
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga Satuan<span class="required">*</span>
                      </label>
                      <div class="col-md-2 col-sm-6 col-xs-12">
						<?php echo form_input(array('name'=>'harga','placeholder'=>'60000','type'=>'number','class'=>'form-control col-md-7 col-xs-12','required'=>'required')); ?> 
                      </div>
                    </div>
                   
              
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <?php echo form_submit(array('value'=>'Tambah','name'=>'Simpan','class'=>'btn btn-primary'));?>
                      </div>
                    </div>
                  </form>
				  <div class="ln_solid"></div>
                </div><div class="x_content">
                  <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nama Biaya Lain-lain</th>                        
                        <th>Jumlah </th>
						<th>Harga Satuan</th>
						<th>Total</th>
						<th>Tanggal Pengeluaran</th>
						<th>Action</th>
                      </tr>
                    </thead>


                     <tbody>
					
					<?php $no = 1; ?>
							<?php foreach($lihat_biaya_lain as $look) { ?>
						<tr> 
							<td><?php echo $no++; ?></td>							
							<td><?=$look->nama_biaya_lain; ?></td>
							<td><?=$look->kuantitas; ?></td>
							<td>Rp. <?php echo number_format($look->harga,0,',','.');?></td>
							<td>Rp. <?php echo number_format(($look->harga)*($look->kuantitas),0,',','.');?></td>
							<td><?=$look->tgl_pengeluaran; ?></td>													
							<td>								
								<?php echo anchor('admin/update_biaya_lain/'.$look->id_biaya_lain,'<i class="fa fa-pencil"></i>',array('class'=>'btn btn-info','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Edit'));?>
								<?php echo anchor('admin/delete_biaya_lain/'.$look->id_biaya_lain,'<i class="fa fa-trash"></i>',array('class'=>'btn btn-danger hapus','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Hapus'));?>
							</td>
							
							<?php } ?>
							
						</tr>
						
                      
                    </tbody>
                  </table>
                </div>
			  </div>
            </div>
        </div>
		
								
		


       