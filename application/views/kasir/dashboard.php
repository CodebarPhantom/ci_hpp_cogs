   <!-- page content -->
      <div class="right_col" role="main">
		<?php foreach($status as $stat) { ?>
			
		
        <!-- top tiles -->
                <div class="row top_tiles">
            <div class="animated flipInY col-lg-4 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-exchange"></i>
                </div>
				
                <div class="count"><?=$stat->total;?></div>
				
                <h3>Jumlah Transaksi</h3>
               
              </div>
            </div>
            <div class="animated flipInY col-lg-4 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-check-circle"></i>
                </div>			
                <div class="count"><?=$stat->paid;?></div>				
                <h3>Paid</h3>
               
              </div>
            </div>
            <div class="animated flipInY col-lg-4 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-times-circle"></i>
                </div>			
                <div class="count"><?=$stat->unpaid;?></div>				
                <h3>Unpaid</h3>
               
              </div>
            </div>
            
	
          </div>
		  <?php } ?>
        <!-- /top tiles -->

        <div class="row">
		
            <div class="box-body chart-responsive">
                  
				<div id="grafik1" style="height:450px"></div>
            </div>

        </div>
        <br />
