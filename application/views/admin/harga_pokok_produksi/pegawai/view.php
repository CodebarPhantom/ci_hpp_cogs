   <!-- page content -->
      <div class="right_col" role="main">

        <!-- top tiles -->
        
        <!-- /top tiles -->

        <br />

        <div class="row">
		 			
		
          <div class="col-md-12 col-sm-12 col-xs-12">
		  
              <div class="x_panel">
                <div class="x_title">
                  <h2><strong>Data Pegawai</strong></h2>
				  
                  <div class="clearfix"></div>
                </div>
				<a type="button" class="btn btn-round btn-success" href="<?php echo base_url('admin/tambah_pegawai');?>"><i class="fa fa-plus-square">&nbsp </i>Tambah Pegawai</a>
                <div class="x_content">
                  <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>ID Pegawai</th>                        
                        <th>Nama Pegawai</th>
						<th>JK</th>
						<th>Jabatan</th>
						<th>No HP</th>
						
						<th>Action</th>
                      </tr>
                    </thead>


                     <tbody>
					
					<?php $no = 1; ?>
							<?php foreach($lihat_pegawai->result() as $look) { ?>
						<tr> 
							<td><?php echo $no++; ?></td>
							<td><?=$look->id_pegawai;?></td>							
							<td><?=$look->nama_pegawai; ?></td>
							<td><?=$look->jk; ?></td>
							<td><?=$look->jabatan; ?></td>
							<td><?=$look->no_hp;?></td>	
															
							<td>
								<?php echo anchor('admin/details_pegawai/'.$look->id_pegawai,'<i class="fa fa-bars"></i>',array('class'=>'btn btn-primary','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Details'));?>
								<?php echo anchor('admin/update_pegawai/'.$look->id_pegawai,'<i class="fa fa-pencil"></i>',array('class'=>'btn btn-info','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Edit'));?>
								<?php echo anchor('admin/delete_pegawai/'.$look->id_pegawai,'<i class="fa fa-trash"></i>',array('class'=>'btn btn-danger hapus','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Hapus'));?>
							</td>
							
							<?php } ?>
							
						</tr>
						
                      
                    </tbody>
                  </table>
                </div>
			  </div>
            </div>
        </div>
		
								
		


       