<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Tbl_modal Read</h2>
        <table class="table">
	    <tr><td>Id Biaya</td><td><?php echo $id_biaya; ?></td></tr>
	    <tr><td>Kuantitas</td><td><?php echo $kuantitas; ?></td></tr>
	    <tr><td>Harga</td><td><?php echo $harga; ?></td></tr>
	    <tr><td>Jumlah</td><td><?php echo $jumlah; ?></td></tr>
	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('tbl_modal') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>