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
                  <h2><strong>Data Pembayaran</strong></h2>
                  <div class="clearfix"></div>
                </div>
				
                <div class="x_content">
                  <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Antrian</th>                                          
                        <th>No. Meja</th>						
						<th>Keterangan</th>
						<th>Status</th>
						<th>Action</th>
                      </tr>
                    </thead>


                     <tbody>
					
				
							<?php foreach($lihat_pembayaran as $look) { ?>
				
						<tr > 
							<td><?=$look->antrian;?></td>
							<td><?=$look->no_meja;?></td>
							<td><?=$look->keterangan; ?></td>
							<td <?php if($look->status=='paid'){echo "bgcolor='#336E7B'";}if($look->status=='unpaid'){echo "bgcolor='#CF000F'";}?> ><font color="white"><center><?=$look->status; ?></center></font> </td>													
							<td>	
							<?php echo anchor('kasir/detail_pembayaran/'.$look->id_pembeli,'<i class="fa fa-bars"></i>',array('class'=>'btn btn-info','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Detail'));?>							
							<?php echo anchor('kasir/cetak_struk/'.$look->id_pembeli,'<i class="fa fa-print"></i>',array('class'=>'btn btn-success','id'=>'proses_cetak','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Print','target'=>'_blank'));?>		
							</td>
							
							<?php } ?>
							
						</tr>
						
                      
                    </tbody>
                  </table>
                </div>
			  </div>
            </div>
        </div>
		
								
		


       