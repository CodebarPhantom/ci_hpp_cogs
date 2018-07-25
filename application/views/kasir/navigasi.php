 <!-- sidebar menu -->
 <?php foreach($queries as $look) { ?>
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
			
              <h3>&nbsp;</h3>
			 
              <ul class="nav side-menu">
                <li>
					<a href="<?php echo base_url('kasir');?>"><i class="fa fa-home"></i>Home</a> 
                </li>
				<li>
					<a href="<?php echo base_url('kasir/pemesanan');?>"><i class="fa fa-shopping-cart"></i>Pemesanan</a> 
                </li>
               
                <li><a><i class="fa fa-money"></i>Pembayaran<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo base_url('kasir/pembayaran');?>">Pembayaran</a>
                    </li>
                    <li><a href="<?php echo base_url('kasir/rekap_pembayaran');?>">Rekapitulasi Pembayaran</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
		  
         
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
    <div class="top_nav">

        <div class="nav_menu">
          <nav class="" role="navigation">
            

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
				
                  <img src="<?php echo base_url('./assets/image/foto_user/cashier_icon.png')?>" alt=""><?php echo $look->nama_user ?>
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                    <li><a href="<?php echo base_url('auth/logout'); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                 </li>
                </ul>
              </li>		

            </ul>
          </nav>
        </div>

      </div>
	   <?php } ?>
      <!-- /top navigation -->