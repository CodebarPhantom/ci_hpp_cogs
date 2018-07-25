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
                  <h2><strong>Data Menu</strong></h2>
				  
                  <div class="clearfix"></div>
                </div>
				<a type="button" class="btn btn-round btn-success" href="<?php echo base_url('admin/tambah_menu');?>"><i class="fa fa-plus-square">&nbsp </i>Tambah Menu</a>
                <div class="x_content">
                  <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>ID Menu</th>                        
                        <th>Nama Menu</th>
						<th>Katergori</th>
						<th>Harga</th>						
						<th>Action</th>
                      </tr>
                    </thead>


                     <tbody>
					
					<?php $no = 1; ?>
							<?php foreach($lihat_menu as $look) { ?>
						<tr> 
							<td><?php echo $no++; ?></td>
							<td><?=$look->id_menu;?></td>							
							<td><?=$look->nama_menu; ?></td>
							<td><?=$look->category_menu; ?></td>
							<td>Rp. <?php echo number_format($look->harga,0,',','.');?></td>													
							<td>
								<?php echo anchor('admin/details_menu/'.$look->id_menu,'<i class="fa fa-bars"></i>',array('class'=>'btn btn-primary','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Details'));?>
								<?php echo anchor('admin/update_menu/'.$look->id_menu,'<i class="fa fa-pencil"></i>',array('class'=>'btn btn-info','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Edit'));?>
								<?php echo anchor('admin/delete_menu/'.$look->id_menu,'<i class="fa fa-trash"></i>',array('class'=>'btn btn-danger hapus','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Hapus'));?>
							</td>
							
							<?php } ?>
							
						</tr>
						
                      
                    </tbody>
                  </table>
                </div>
			  </div>
            </div>
        </div>
		
								
		


       