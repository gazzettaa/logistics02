<!doctype html>
<html>
    <head>
        <title>Courier Logistics</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
			body{
				padding: 15px;
				background-color: #cccc;
            }
        </style>
    </head>
    <body>
        <h2 style="text-align:center">Customer List</h2>
		<input type="button" class="btn btn-default" onclick="window.open('http://[::1]/logistics/codeIgniter/agent/', '_self')" value="Agent"></input>
		
		<input type="button" class="btn btn-default" onclick="window.open('http://[::1]/logistics/codeIgniter/customer/', '_self')" value="Customer"></input>
		
		<input type="button" class="btn btn-default" onclick="window.open('http://[::1]/logistics/codeIgniter/admin/', '_self')" value="Admin"></input>
		<br></br>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('customer/create'),'Buat', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('customer/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('customer'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Cari</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
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
				<tr>
			<th><center> No </center></th>
			<th><center> Admin Id </center></th>
			<th><center> Name </center></th>
			<th><center> Address </center></th>
			<th><center> Jenis Kelamin </center></th>
			<th><center> Phone </center></th>
			<th><center> Birthday </center></th>
			<th><center> Created At</center> </th>
			<th><center> Created By</center></th>
			<th><center> Updated At </center></th>
			<th><center> Updated By </center></th>
			<th><center> Action </center></th>
				</tr>
				<?php
				foreach ($customer_data as $customer)
				{
                ?>
                <tr>
			<td width="30px"><?php echo ++$start ?></td>
			<td><?php echo $customer->admin_id ?></td>
			<td><?php echo $customer->name ?></td>
			<td><?php echo $customer->address ?></td>
			<td><?php echo $customer->jenis_kelamin ?></td>
			<td><?php echo $customer->phone ?></td>
			<td><?php echo $customer->birthday ?></td>
			<td><?php echo $customer->created_at ?></td>
			<td><?php echo $customer->created_by ?></td>
			<td><?php echo $customer->updated_at ?></td>
			<td><?php echo $customer->updated_by ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('customer/read/'.$customer->id),'Liat'); 
				echo ' | '; 
				echo anchor(site_url('customer/update/'.$customer->id),'Ubah'); 
				echo ' | '; 
				echo anchor(site_url('customer/delete/'.$customer->id),'Hapus','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total List : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>