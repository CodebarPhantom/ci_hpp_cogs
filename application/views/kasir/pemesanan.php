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
					<h2>
						<strong>Pemesanan</strong>
					</h2>
					<div align="right">
						<strong><p align="right">Total Menu yang Dipesan : <?php echo $this->cart->total_items();?> <a type="button" class="btn btn-round btn-success" href="<?php echo base_url('kasir/show_cart');?>"><i class="fa fa-shopping-cart">&nbsp </i>Proses</a></p></strong> 
					</div>
					<div class="clearfix"/>
				</div>
				<div class="x_content">
					<br />
					<!-- Projects Row -->

					<div class="row">
						<?php foreach($lihat_menu->result() as $look) { ?>

						<div class="col-md-55">
							<div class="thumbnail">
								<div class="image view view-first">
									<img style="width: 100%; height:100%; display: block;" src="<?php echo base_url()?>assets/image/foto_menu/<?=$look->foto?>" alt="image"  />
											<div class="mask">
												<p>
													<?=$look->nama_menu;?></p>
												<div class="tools tools-bottom">
													<a href="#" style="text-decoration: none">Rp. <?php echo number_format($look->harga,0,',','.');?></a>                           
												</div>
											</div>
										</div>
									</br>
									<form method="post" action="<?php echo base_url('kasir/add_to_cart');?>" enctype="multipart/form-data" data-parsley-validate>						
											<div class="col-md-7">
												<?php echo form_input(array('name'=>'qty', 'type'=>'number', 'placeholder'=>'0', 'class'=>'form-control','required'=>'required')); ?> 				        
											</div>

											<?php echo form_input(array('name'=>'id_menu','type'=>'hidden','value'=>$look->id_menu)); ?> 
											<?php echo form_input(array('name'=>'price','type'=>'hidden','value'=>$look->harga)); ?>
											<?php echo form_input(array('name'=>'nama_menu','type'=>'hidden','value'=>$look->nama_menu)); ?>
											<?php echo form_submit(array('value'=>'Buy','name'=>'Simpan','class'=>'btn btn-primary source'));?>
										</form>
									</div>
								</div> 

								<?php } ?>		
							</div>

							<!-- /.row -->
							<div class="ln_solid"/>
						</div>


					</div>
				</div>
			</div>





			