   <!-- page content -->
<div class="right_col" role="main">

	<?php foreach($hitung_bop_dll as $bop_dll) { 
		$bop_dll->total;
			}?>
	<?php foreach($total_bbb_bbp as $tot_bb_bp){$tot_bb_bp->total;}?>

	<?php foreach($total_bop_dll as $tot_bop_dll){$tot_bop_dll->total;}?>
	<style>
@media print {
  body * {
    visibility: hidden;

  }
  .x_panel, .x_panel * {
    visibility: visible;
  }
  .x_panel {
    position: relative;
    left: 0px;
    top: 0px;
  }
}
	</style>
	<br />

	<div class="row">



		<div class="col-md-12 col-sm-12 col-xs-12">

			<div class="x_panel">
				<div class="x_title">
					<?php if($bulan=='01'){$bulan='Januari';}else if($bulan=='02'){$bulan='Februari';}else if($bulan=='03'){$bulan='Maret';}else if($bulan=='04'){$bulan='April';}else if($bulan=='05'){$bulan='Mei';}else if($bulan=='06'){$bulan='Juni';}else if($bulan=='07'){$bulan='July';}else if($bulan=='08'){$bulan='Agustus';}else if($bulan=='09'){$bulan='September';}else if($bulan=='10'){$bulan='Oktober';}else if($bulan=='11'){$bulan='November';}else if($bulan=='12'){$bulan='Desember';}else{$bulan='Tidak Tersedia !';}
				;?>
					<h2>
						<strong>Laporan Keuntungan Bersih <?php echo $bulan;?>
							<?php echo $tahun;?>
						</strong>
					</h2>         
					<div align="right">
						<strong>
							<p align="right">
								<a type="button" class="btn btn-round btn-success" onclick="window.print()">
									<i class="fa fa-print">&nbsp </i>Print</a>
							</p>
						</strong> 
					</div>
					<div class="clearfix"/>
				</div>
				<div class="x_content">

					<div class="x_panel">



						<div class="x_content">
							<table class="table table-hover">
								<thead>
									<tr>

										<th>Keterangan</th>
										<th>Sub Total</th>
										<th>Total</th>

									</tr>
								</thead>
								<tbody>
									<tr>                      
										<th>Total Penjualan</th>
										<td>
											<?php foreach($total_penjualan as $tot_pem) { ?>
										</td>
										<td>
											<strong>Rp. <?php echo number_format($tot_pem->total,0,',','.');?></strong>
										</td>
										<?php }?>
									</tr>
									<tr>                      
										<th>Harga Pokok Produksi</th>
										<td/>
										<td/>
									</tr>
									<?php foreach($hitung_bbb_bbp as $bb_bp) { ?>
									<tr>

										<td>&emsp;&emsp;<?=$bb_bp->golongan_biaya;?></td>

										<td>Rp. <?php echo number_format($bb_bp->total,0,',','.');?></td>
										<td/>

									</tr>
									<?php } ?>

									<?php foreach($hitung_bop_dll as $bop_dll) { ?>
									<tr>

										<td>&emsp;&emsp;<?=$bop_dll->golongan_biaya;?></td>

										<td>Rp. <?php echo number_format($bop_dll->total,0,',','.');?></td>
										<td/>

									</tr>
									<?php } ?>



									<tr>                      
										<th>&emsp;&emsp;Total Harga Pokok Produksi</th>
										<td/>
										<td>
											<strong>(Rp. <?php $hasil=($tot_bop_dll->total+$tot_bb_bp->total);
																echo number_format($hasil,0,',','.');?>)</strong>
										</td>

									</tr>

									<tr>                      
										<th>Keuntungan Kotor</th>
										<td/>
										<td>
											<strong>Rp. <?php $keuntungan_kotor=($tot_pem->total-$hasil);
																echo number_format($keuntungan_kotor,0,',','.')?></strong>
										</td>
									</tr>

									<tr>                      
										<th>Biaya Lain-lain</tH>
										<td/>
										<td/>
									</tr>
									<?php foreach($biaya_lain as $bl) { ?>
									<tr>

										<td>&emsp;&emsp;<?=$bl->nama_biaya_lain;?></td>

										<td>Rp. <?php echo number_format($bl->total,0,',','.');?></td>
										<td/>

									</tr>
									<?php } ?>

									<tr>                      
										<th>&emsp;&emsp;Total Biaya Lain-lain</th>
										<td/>
										<?php foreach($total_biaya_lain as $tot_bl) { ?>
										<td>
											<strong>(Rp. <?php echo number_format($tot_bl->total,0,',','.');?>)</strong>
										</td>
										<?php } ?>
									</tr>
									<tr>                      
										<th>Keuntungan Bersih</th>
										<td/>
										<td>
											<strong>Rp. <?php $keuntungan_kotor=($tot_pem->total-$hasil-$tot_bl->total);
																echo number_format($keuntungan_kotor,0,',','.')?></strong>
										</td>
									</tr>				

								</tbody>
							</table>


						</div>

					</div>
				</div>


			</div>
		</div>
	</div>



	