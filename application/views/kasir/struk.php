<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Cetak Struk</title>
    <link href="<?php echo base_url();?>assets/gentelella/css/bootstrap.min.css" rel="stylesheet">
    <style>
      @import url(http://fonts.googleapis.com/css?family=Bree+Serif);
      body, h1, h2, h3, h4, h5, h6{
      font-family: 'Bree Serif', serif;
      }
	  
    </style>
  </head>
  
  <body>
    <div class="container">
      <div class="row">
        <table class="col-xs-5" >  
		<tr>
            <td>
             <img class="img-responsive" src="<?php echo base_url('./assets/gentelella/banner.png')?>" width="470px" height="125px">
            </td>			
		  </tr>
          <tr>
				<td><hr/></td>
			</tr>
        </table>         
      </div>
      <div class="row ">
	   <?php foreach($keterangan_pembeli as $lihat) { ?>
        <table class="col-xs-5" >        
          <tr>
            <td>
              <strong>No. Meja</strong>
            </td>
			<td>
              <strong>:&nbsp <?=$lihat->no_meja;?></strong>
            </td>
		  </tr>
		  <tr>
            <td>
              <strong>Tanggal</strong>
            </td>
			<td>
              <strong>:&nbsp <?=date("d-M-Y");?></strong>
            </td>
		  </tr>
		  <tr>
            <td>
              <strong>Keterangan</strong>
            </td>
			<td>
              <strong>:&nbsp <?=$lihat->keterangan;?></strong>
            </td>
		  </tr> 
			<tr>
				<td colspan="2"><hr/></td>
			</tr>			  
      </table>
	   <?php } ?>	        
      </div>
      <!-- / end client details section -->
	  <div class="row ">
      <table class="col-xs-5">
        <thead>		
          <tr>
            <th>
              <h4>Menu</h4>
            </th>
            <th>
              <h4>Harga</h4>
            </th>
            <th>
              <h4 align="right">Qty</h4>
            </th>
            <th>
              <h4 align="right">Sub Total</h4>
            </th> 
			<tr>
				<td colspan="4"><hr/></td>
			</tr>			
          </tr>
        </thead>
        <tbody>
			<?php foreach($detail_pembayaran as $look) { ?>
				<tr>
					<td><?=$look->nama_menu;?></td>
					<td>Rp. <?php echo number_format($look->price,0,',','.');?></td>
					<td align="right" ><?=$look->qty;?></td>
					<td align="right">Rp. <?php echo number_format(($look->price)*($look->qty),0,',','.');?></td>		
				</tr>
			<?php } ?>
						
                      
        </tbody>
      </table>
    </div>
	<div class="row ">
	   
        <table class=" col-xs-5" >    
			<tr>
				<td colspan="4"><hr/></td>
			</tr>		
          <tr>           	
			<td colspan="3" align="right">
              <strong>Total</strong>
            </td>
			<td align="right">
			<?php foreach($total_pembelian as $tot_pem) { ?>
              <strong>Rp.<?php echo number_format($tot_pem->total,0,',','.');?> </strong>
			 <?php } ?> 
            </td>			
		  </tr>
		   <tr>           	
			<td colspan="3" align="right">
              <strong>Bayar</strong>
            </td>
			<td align="right">
			
              <strong>Rp. <?php echo number_format($lihat->bayar,0,',','.');?> </strong>
            </td>			
		  </tr>
		  <tr>           	
			<td colspan="3" align="right">
              <strong>Kembalian</strong>
            </td>
			<td align="right">
              <strong>Rp. <?php echo number_format(($lihat->bayar)-($tot_pem->total),0,',','.');?></strong>
            </td>			
		  </tr>
		  <tr>
				<td colspan="4"><hr/></td>
			</tr>	
			<tr>
				<td colspan="4" align="center"><strong>---- Terimakasih ----</strong></td>
				
			</tr>				
      </table>
	   	        
      </div>
	</div>
  </body>
</html>
