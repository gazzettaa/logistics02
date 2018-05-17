<!doctype html>
<html>
    <head>
        <title>Liat Data Customer</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
				background-color: #cccc;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Liat Data Customer</h2>
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
	    <tr><td>Admin Id</td><td><?php echo $admin_id; ?></td></tr>
	    <tr><td>Name</td><td><?php echo $name; ?></td></tr>
	    <tr><td>Address</td><td><?php echo $address; ?></td></tr>
	    <tr><td>Jenis Kelamin</td><td><?php echo $jenis_kelamin; ?></td></tr>
	    <tr><td>Phone</td><td><?php echo $phone; ?></td></tr>
	    <tr><td>Birthday</td><td><?php echo $birthday; ?></td></tr>
	    <tr><td>Created At</td><td><?php echo $created_at; ?></td></tr>
	    <tr><td>Created By</td><td><?php echo $created_by; ?></td></tr>
	    <tr><td>Updated At</td><td><?php echo $updated_at; ?></td></tr>
	    <tr><td>Updated By</td><td><?php echo $updated_by; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('customer') ?>" class="btn btn-default">Batal</a></td></tr>
	</table>
        </body>
</html>