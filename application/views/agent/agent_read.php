<!doctype html>
<html>
    <head>
        <title>Liat Data Agent</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
				background-color: #cccc;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Liat Data Agent</h2>
        <table>
			<style>
				table{
					border-collapse:collapse;
				}
				table, th, td{
					border:1px solid black;
					padding: 5px;
					margin-bottom: 15px
				}
			</style>
	    <tr><td>Agent</td><td><?php echo $agent; ?></td></tr>
	    <tr><td>Kota</td><td><?php echo $kota; ?></td></tr>
	    <tr><td>Created At</td><td><?php echo $created_at; ?></td></tr>
	    <tr><td>Created By</td><td><?php echo $created_by; ?></td></tr>
	    <tr><td>Updated At</td><td><?php echo $updated_at; ?></td></tr>
	    <tr><td>Updated By</td><td><?php echo $updated_by; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('agent') ?>" class="btn btn-default">Batal</a></td></tr>
	</table>
        </body>
</html>