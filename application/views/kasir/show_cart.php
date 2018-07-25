   <!-- page content -->
      <div class="right_col" role="main">

        <!-- top tiles -->
        
        <!-- /top tiles -->

        <br />

        <div class="row">
		
		
		
          <div class="col-md-12 col-sm-12 col-xs-12">
		  
              <div class="x_panel">
                <div class="x_title">
                  <h2><strong>Kelola Pemesanan</strong> </h2>
                  <div class="clearfix"></div>
                </div>
				<div class="x_content">
						<br />
							<form id="demo-form2" data-parsley-validate method="post" action="<?php echo base_url('kasir/transaksi_proses');?>" enctype="multipart/form-data" class="form-horizontal form-label-left">
							<?php validation_errors();?>
							<div class="form-group">
							<label class="control-label col-md-2 col-sm-3 col-xs-12">Nomor Meja<span class="required">*</span></label>
							<div class="col-md-4 col-sm-9 col-xs-12">
								<select name="no_meja" class="form-control" required>
									<option value=""></option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="Bungkus">Bungkus</option>
								</select>
							</div>
							</div>
							<div class="form-group">
							<label class="control-label col-md-2 col-sm-3 col-xs-12">Keterangan</label>
								<div class="col-md-4 col-sm-6 col-xs-12">
								<textarea class="form-control" name="keterangan"></textarea>
								</div>
							</div>
							<div class="form-group">
							<label class="control-label col-md-2 col-sm-3 col-xs-12">Total Pembelian</label>
								<div class="col-md-4 col-sm-6 col-xs-12">
								<?php $carttotal = 'Rp.'.number_format($this->cart->total(),0,',','.');?>
								<?php echo form_input(array('placeholder'=>'0','disabled'=>'disabled','class'=>'form-control','value'=>$carttotal)); ?>
								
								</div>
							</div>  							
							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-2">
								<?php echo form_submit(array('value'=>'Pesan','name'=>'Simpan','class'=>'btn btn-primary source'));?>
								<a class="btn btn-danger btn-sm batal" href="<?php echo base_url('kasir/destroy_cart/');?>"><i class="fa fa-trash-o"></i></a>
								</div>
							</div>
							</form>
							<div class="ln_solid"></div>
						</div>
				
				
                <div class="x_content">
                  <table  class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nama Menu</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Total</th>
						<th>Action</th>
                      </tr>
                    </thead>

					
                     <tbody>
					
					<?php $no = 1; $i=1;  ?>
				
        	
			
			
							<?php foreach ($this->cart->contents() as $menu){ ?>
						
						<tr> 
						
						<input type = "hidden" name="rowid" value="<?php echo$i++?>"/>
							<td><?php echo $no++; ?></td>
							<td><?php echo $menu['name'];?></td>
							<form method="post" action="<?php echo base_url('kasir/update_pesanan/');?>" >
							<td><?php echo form_input(array('name'=>'qty', 'type'=>'number', 'placeholder'=>'0', 'class'=>'form-control ','required'=>'required','value'=>$menu['qty'])); ?>
							<?php echo form_input(array('name'=>'rowid', 'type'=>'hidden','value'=>$menu['rowid'])); ?></td>
							<td><?php echo number_format($menu['price'],0,',','.');?></td>
							<td><?php echo number_format($menu['subtotal'],0,',','.');?></td>
							<td>
								<button type="submit" class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
								</form>
								<a class="btn btn-danger btn-sm batal1" href="<?php echo base_url('kasir/delete_pesanan/'.$menu['rowid']);?>"><i class="fa fa-trash-o"></i></a>
							</td>
							
							<?php } ?>
							
						</tr>
					
                    </tbody>
                  </table>
                </div>
				
			  </div>
            </div>
        </div>
		
								
		


       