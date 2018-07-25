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
						<strong>Komponen Biaya HPP</strong>
					</h2>				  
					<div class="clearfix"/>
				</div>
				<div class="x_content">
					<br />
					<form id="demo-form2" data-parsley-validate method="post" action="<?php echo base_url('admin/tambah_biaya_proses');?>" enctype="multipart/form-data" class="form-horizontal form-label-left">

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Biaya <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<?php echo form_input(array('name'=>'nama_biaya','placeholder'=>'Nama Biaya','class'=>'form-control col-md-7 col-xs-12','required' => 'required')); ?> 
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Satuan <span class="required">*</span>
								</label>
								<div class="col-md-3 col-sm-6 col-xs-12">
									<?php echo form_input(array('name'=>'satuan','placeholder'=>'Satuan','class'=>'form-control col-md-3 col-xs-12','required' => 'required')); ?> 
								</div>
							</div>     
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Golongan Biaya <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select name="golongan_biaya" class="form-control" required>
										<option value="Biaya Bahan Baku">Biaya Bahan Baku</option>
										<option value="Biaya Tenaga Kerja Langsung">Biaya Tenaga Kerja Langsung</option>
										<option value="Biaya Bahan Penolong">Biaya Bahan Penolong</option>
										<option value="Biaya Tenaga Kerja Tak Langsung">Biaya Tenaga Kerja Tak Langsung</option>
										<option value="Biaya Reparasi dan Pemeliharaan">Biaya Reparasi dan Pemeliharaan</option>
										<option value="Biaya Overhead Pabrik Lain">Biaya Overhead Pabrik Lain</option>
									</select>
								</div>
							</div>					
							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									<?php echo form_submit(array('value'=>'Tambah','name'=>'Simpan','class'=>'btn btn-primary source'));?>
								</div>
							</div>
						</form>
						<div class="ln_solid"/>
					</div>				
					<div class="x_content">
						<table id="datatable" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>ID Biaya</th>                        
									<th>Nama Biaya</th>
									<th>Satuan</th>
									<th>Golongan Biaya</th>						
									<th>Action</th>
								</tr>
							</thead>


							<tbody>

								<?php $no = 1; ?>
								<?php foreach($lihat_daftar_biaya->result() as $look) { ?>
								<tr> 
									<td>
										<?php echo $no++; ?>
									</td>
									<td>
										<?=$look->id_biaya;?></td>							
									<td>
										<?=$look->nama_biaya; ?></td>
									<td>
										<?=$look->satuan; ?></td>
									<td>
										<?=$look->golongan_biaya; ?></td>

									<td>

										<?php echo anchor('admin/update_biaya/'.$look->id_biaya,'<i class="fa fa-pencil"></i>',array('class'=>'btn btn-info','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Edit'));?>
										<?php echo anchor('admin/delete_biaya/'.$look->id_biaya,'<i class="fa fa-trash"/></i>',array('class'=>'btn btn-danger hapus','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Hapus'));?>
										
									</td>

									<?php } ?>

								</tr>


							</tbody>
						</table>
						<div class="toast toast-default">

						</div>
					</div>
				</div>
			</div>
		</div>





		