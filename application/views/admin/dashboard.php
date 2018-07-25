   <!-- page content -->
   
      <div class="right_col" role="main">
		<?php foreach($tot_penjualan as $tot_pem) {$tot_pem->total;} ?>
				<?php foreach($tot_biaya_lain as $tot_bia) {$tot_bia->total;} ?>
        <!-- top tiles -->
        <div class="row top_tiles">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-exchange"></i>
                </div>
				<?php foreach($total_transaksi as $tran) { ?>
                <div class="count"><?=$tran->total_transaksi;?></div>
				<?php } ?>
                <h3>Jumlah Transaksi</h3>
               
              </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-bar-chart-o"></i>
                </div>
				<?php foreach($total_modal_harian->result() as $tot_mo) { 
				$modal=($tot_bia->total+$tot_mo->total);
				?>
                <div class="count"><font size="5">Rp. <?php echo number_format($modal,0,',','.');?></font></div>
				<?php } ?>
                <h3>Modal Hari Ini</h3>
               
              </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-line-chart"></i>
                </div>
				<?php foreach($total_omzet_harian->result() as $tot_om) { ?>
                <div class="count"><font size="5">Rp. <?php echo number_format($tot_om->total,0,',','.');?></font></div>
				<?php } ?>
                <h3>Omzet</h3>
                
              </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-money"></i>
                </div>
			
					<?php $hasil=(($tot_pem->total)-($tot_mo->total)-($tot_bia->total));?>
                <div class="count"><font size="5">Rp. <?php echo number_format($hasil,0,',','.');?></font></div>

                <h3>Keuntungan</h3>
                
              </div>
            </div>
	
          </div>
        <!-- /top tiles -->
	
        <div class="row">
	
            <div class="box-body chart-responsive">                  
				<div id="grafik" style="height:480px"></div>
            </div>

        </div>
        <br />

       
		


       