<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Tbl_modal List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Biaya</th>
		<th>Kuantitas</th>
		<th>Harga</th>
		<th>Jumlah</th>
		<th>Tanggal</th>
		
            </tr><?php
            foreach ($tbl_modal_data as $tbl_modal)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $tbl_modal->id_biaya ?></td>
		      <td><?php echo $tbl_modal->kuantitas ?></td>
		      <td><?php echo $tbl_modal->harga ?></td>
		      <td><?php echo $tbl_modal->jumlah ?></td>
		      <td><?php echo $tbl_modal->tanggal ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>