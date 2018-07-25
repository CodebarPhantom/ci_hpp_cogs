   <!-- page menu -->
      <div class="right_col" role="main">

        <!-- top tiles -->
        
        <!-- /top tiles -->

        <br />

        <div class="row">
		
		<?php echo $this->session->flashdata('pesan');?>
		
          <div class="col-md-12 col-sm-12 col-xs-12">
		  
              <div class="x_panel">
                <div class="x_title">
                  <h2><strong>Data Category Menu</strong></h2>
                  <div class="clearfix"></div>
                </div>
				<div class="x_content">
                  <br />
                  <form id="demo-form2" data-parsley-validate method="post" action="<?php echo base_url('admin/tambah_category_menu_proses');?>" enctype="multipart/form-data" class="form-horizontal form-label-left">
					<?php validation_errors();?>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Category Menu <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
						<?php echo form_input(array('name'=>'category_menu','placeholder'=>'Category menu','class'=>'form-control col-md-7 col-xs-12','required'=>'required')); ?> 
                      </div>
                    </div>
                   
					
                    
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <?php echo form_submit(array('value'=>'Tambah','name'=>'Simpan','class'=>'btn btn-primary'));?>
                      </div>
                    </div>
                  </form>
				  <div class="ln_solid"></div>
                </div><div class="x_content">
                  <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>ID Category Menu</th>
                        
                        <th>Category Menu </th>
						
						<th>Action</th>
                      </tr>
                    </thead>


                     <tbody>
					
					<?php $no = 1; ?>
							<?php foreach($lihat_category_menu->result() as $look) { ?>
						<tr> 
							<td><?php echo $no++; ?></td>
							<td><?=$look->id_category;?></td>
							
							<td><?=$look->category_menu; ?></td>
													
							<td>
								
								<?php echo anchor('admin/update_category_menu/'.$look->id_category,'<i class="fa fa-pencil"></i>',array('class'=>'btn btn-info','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Edit'));?>
								<?php echo anchor('admin/delete_category_menu/'.$look->id_category,'<i class="fa fa-trash"></i>',array('class'=>'btn btn-danger hapus','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Hapus','onclick'=>"pesan()"));?>
							</td>
							
							<?php } ?>
							
						</tr>
						
                      
                    </tbody>
                  </table>
                </div>
			  </div>
            </div>
        </div>
		
								
		


       