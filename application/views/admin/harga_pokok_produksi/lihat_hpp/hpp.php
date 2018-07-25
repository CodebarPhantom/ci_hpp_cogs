   <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
				<?php error_reporting(0);; ?>
				<?php foreach($tampil_nama_menu as $tampil_nm) { ?>
                  <h2>Harga Pokok Produksi <?=$tampil_nm->nama_menu;?></h2>
				  <?php } ?>
                <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                            
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        
                        <th>Jenis Biaya</th>
						<th>Biaya</th>
                        <th>Total Biaya</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <tr>                      
                        <th>Biaya Bahan Baku</th>
						<td></td>
						<td></td>
                      </tr>
					  <?php foreach($bahan_baku as $bb) { ?>
                      <tr>
                        
                        <td>&emsp;&emsp;<?=$bb->nama_biaya;?></td>						
                        <td>Rp. <?php echo number_format($bb->total,0,',','.');?></td>
						<td></td>
					           
                      </tr>
					  <?php } ?>
					  
					  
                      <tr>                      
                        <th>&emsp;&emsp;Total Biaya Bahan Baku</th>
                        <td></td>
						<?php foreach($total_bahan_baku as $tbb) { ?>
						<th>Rp. <?php echo number_format($tbb->total,0,',','.');?></th>
						<?php } ?>
                      </tr>
					  
					  <tr>                      
                        <th>Biaya Tenaga Kerja Langsung</th>
						<td></td>
						<td></td>
                      </tr>
					  <?php foreach($tkl as $tenaga) { ?>
					  <tr>                      
                        <td>&emsp;&emsp;<?=$tenaga->nama_biaya;?></td>
						<td>Rp. <?php echo number_format($tenaga->total,0,',','.');?></td>
						<td></td>
                      </tr>
					  <?php } ?>					  
					  <tr>                      
                        <th>&emsp;&emsp;Total Biaya Tenaga Kerja Langsung</th>
                        <td></td>
						<?php foreach($total_tkl as $t_tkl) { ?>
						<th>Rp. <?php echo number_format($t_tkl->total,0,',','.');?></th>
						<?php } ?>
                      </tr>
					  
					  <tr>                      
                        <th>Biaya Overhead Pabrik</th>
						<td></td>
						<td></td>
                      </tr>
					  <tr>                      
                        <th>&emsp;&emsp;Biaya Bahan Penolong</th>
						<td></td>
						<td></td>
                      </tr>
					  <?php foreach($bahan_penolong as $bp) { ?>
					  <tr>                        
                        <td>&emsp;&emsp;&emsp;<?=$bp->nama_biaya;?></td>						
                        <td>Rp. <?php echo number_format($bp->total,0,',','.');?></td>
						<td></td>					           
                      </tr>
					  <?php } ?>
					  <tr>                      
                        <th>&emsp;&emsp;&emsp;Total Biaya Bahan Penolong</th>
						<td></td>
						<?php foreach($total_bahan_penolong as $tbp) { ?>
						<th>Rp. <?php echo number_format($tbp->total,0,',','.');?></th>
						<?php } ?>
                      </tr>
					  
					  <tr>                      
                        <th>&emsp;&emsp;Biaya Tenaga Kerja Tak Langsung</th>
						<td></td>
						<td></td>
                      </tr>
					  <?php foreach($tktl as $lol) { ?>
					  <tr>                        
                        <td>&emsp;&emsp;&emsp;<?=$lol->nama_biaya;?></td>
                        <td>Rp. <?php echo number_format($lol->total,0,',','.');?></td>
						<td></td>					           
                      </tr>
					  <?php } ?>
					  <tr>                      
                        <th>&emsp;&emsp;&emsp;Total Biaya Tenaga Kerja Tak Langsung</th>
						<td></td>
						<?php foreach($total_tktl as $t_tktl) { ?>
						<th>Rp. <?php echo number_format($t_tktl->total,0,',','.');?></th>
						<?php } ?>
                      </tr>
					  
					   <tr>                      
                        <th>&emsp;&emsp;Biaya Reparasi dan Pemeliharaan</th>
						<td></td>
						<td></td>
                      </tr>
					  <?php foreach($pemeliharaan as $pem) { ?>
					  <tr>                        
                        <td>&emsp;&emsp;&emsp;<?=$pem->nama_biaya;?></td>
                        <td>Rp. <?php echo number_format($pem->total,0,',','.');?></td>
						<td></td>					           
                      </tr>
					  <?php } ?>
					  <tr>                      
                        <th>&emsp;&emsp;&emsp;Total Reparasi dan Pemeliharaan</th>
						<td></td>
						<?php foreach($total_pemeliharaan as $t_p) { ?>
						<th>Rp. <?php echo number_format($t_p->total,0,',','.');?></th>
						<?php } ?>
                      </tr>
					  
					  <tr>                      
                        <th>&emsp;&emsp;Biaya Overhead Pabrik Lainnya</th>
						<td></td>
						<td></td>
                      </tr>
					  <?php foreach($bop_lain as $bl) { ?>
					  <tr>                        
                        <td>&emsp;&emsp;&emsp;<?=$bl->nama_biaya;?></td>
                        <td>Rp. <?php echo number_format($bl->total,0,',','.');?></td>
						<td></td>						           
                      </tr>
					  <?php } ?>
					  <tr>                      
                        <th>&emsp;&emsp;&emsp;Total Biaya Overhead Pabrik Lainnya</th>
						<td></td>
						<?php foreach($total_bop_lain as $t_b_l) { ?>
						<th>Rp. <?php echo number_format($t_b_l->total,0,',','.');?></th>
						<?php } ?>
                      </tr>
					  <tr>
						<!-- Menampilkan Total Biaya Produksi Suatu Produk -->                      
                        <th>Total Biaya Produksi</th>
						<?php $grand=(($tbb->total)+($t_tkl->total)+($tbp->total)+($t_tktl->total)+ ($t_p->total)+($t_b_l->total));?>
						<td></td>
						<th>Rp. <?php echo number_format($grand,0,',','.');?></th>
                      </tr>
					  <!-- Menampilkan HPP Persatuan Suatu Produk -->    
					  <tr> 
						<?php foreach($hasil_produksi as $hasil){$hasil->total;}?>					
                        <th>Harga Pokok Produksi <?=$tampil_nm->nama_menu;?> Persatuan</th>
						<?php $hpp=((($tbb->total)+($t_tkl->total)+($tbp->total)+($t_tktl->total)+ ($t_p->total)+($t_b_l->total))/($hasil->total));?>
						<td></td>
						<th>Rp. <?php echo number_format($hpp,0,',','.');?>
						</th>
                      </tr>
					  
                    </tbody>
                  </table>

                </div>
              </div>
            </div>
                </div>
              </div>
            </div>
          </div>
		  </div>

         


         