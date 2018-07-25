   <!-- page content -->
      <div class="right_col" role="main">

        <!-- top tiles -->
        
        <!-- /top tiles -->

        <br />

        <div class="row">
		
		<?php echo $this->session->flashdata('pesan');?>
		
          <div class="col-md-12 col-sm-12 col-xs-12">
		  
              <div class="x_panel">
                <div class="x_title">
                  <h2><strong>Data Users</strong></h2>
                  <div class="clearfix"></div>
                </div>
				<a type="button" class="btn btn-round btn-success" href="<?php echo base_url('admin/tambah_user');?>"><i class="fa fa-plus-square">&nbsp </i>Tambah User</a>
                <div class="x_content">
                  <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>ID User</th>
                        
                        <th>Nama</th>
						<th>Username</th>
						<th>password</th>
						<th>User Type</th>
						<th>Action</th>
                      </tr>
                    </thead>


                     <tbody>
					
					<?php $no = 1; ?>
							<?php foreach($lihat_user->result() as $look) { ?>
						<tr> 
							<td><?php echo $no++; ?></td>
							<td><?=$look->id_user;?></td>
							
							<td><?=$look->nama_user; ?></td>
							<td><?=$look->username; ?></td>
							<td><?=$look->password; ?></td>
							<td><?=$look->level;?></td>							
							<td>
								
								<?php echo anchor('admin/update_user/'.$look->id_user,'<i class="fa fa-pencil"></i>',array('class'=>'btn btn-info','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Edit'));?>
								<?php echo anchor('admin/delete_user/'.$look->id_user,'<i class="fa fa-trash"></i>',array('class'=>'btn btn-danger hapus','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Hapus'));?>
							</td>
							
							<?php } ?>
							
						</tr>
						
                      
                    </tbody>
                  </table>
                </div>
			  </div>
            </div>
        </div>
		
								
		


       