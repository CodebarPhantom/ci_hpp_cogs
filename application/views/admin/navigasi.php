 <!-- sidebar menu -->
 <?php foreach($queries as $look) { ?>
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
			
              <h3>&nbsp;</h3>
			 
              <ul class="nav side-menu">
                <li>
					<a href="<?php echo base_url('admin');?>"><i class="fa fa-home"></i> Home </a> 
                </li>
				<li><a><i class="fa fa-money"></i>Harga Pokok Produksi<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
				  <li><a href="<?php echo base_url('admin/lihat_daftar_biaya');?>">Komponen Biaya HPP</a>
                    </li>	
                   <li><a href="<?php echo base_url('admin/pilih_hpp');?>">Lihat HPP</a>
                    </li>			
                  </ul>
                </li>
				<li><a><i class="fa fa-bar-chart-o"></i>Modal Harian<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">				 
                    <li><a href="<?php echo base_url('admin/lihat_modal_harian');?>">Kelola Modal Harian</a></li>
					<li><a href="<?php echo base_url('admin/modal_terdahulu');?>">Rekap Modal Harian</a>
                    </li>
                   </ul>
                </li>
				<li><a><i class="fa fa-area-chart"></i>Laporan Keuntungan<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">				 
                    <li><a href="<?php echo base_url('admin/periode_keuntungan_bersih');?>">Keuntungan Bersih</a></li>
					<li><a href="<?php echo base_url('admin/periode_keuntungan_kotor');?>">Keuntungan Kotor</a>
                    </li>
                   </ul>
                </li>
				<li><a href="<?php echo base_url('admin/lihat_biaya_lain');?>"><i class="fa fa-exchange"></i>Biaya Lain-lain</a>                  
                </li>
				<li><a><i class="fa fa-cutlery"></i>Manajemen Menu<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo base_url('admin/lihat_category_menu');?>">Kategori Menu</a>
                    </li>
                    <li><a href="<?php echo base_url('admin/lihat_menu');?>">Menu</a>
                    </li>
                  </ul>
                </li>
                <li><a><i class="fa fa-group"></i>Master Data User <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">				 
                    <li><a href="<?php echo base_url('admin/lihat_user');?>">Data User</a></li>
					<li><a href="<?php echo base_url('admin/lihat_pegawai');?>">Data Pegawai</a>
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
             <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="<?php echo base_url('./assets/image/foto_user/admin_icon.png')?>" alt=""><?php echo $look->nama_user ?>
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