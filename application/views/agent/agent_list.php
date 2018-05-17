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
        <h2 style="text-align:center">Agent List</h2>
		<input type="button" class="btn btn-default" onclick="window.open('http://[::1]/logistics/codeIgniter/agent/', '_self')" value="Agent"></input>
		
		<input type="button" class="btn btn-default" onclick="window.open('http://[::1]/logistics/codeIgniter/customer/', '_self')" value="Customer"></input>
		
		<input type="button" class="btn btn-default" onclick="window.open('http://[::1]/logistics/codeIgniter/admin/', '_self')" value="Admin"></input>
		<br></br>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('agent/create'),'Buat', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('agent/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('agent'); ?>" class="btn btn-default">Reset</a>
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
			<th><center> Agent</center></th>
			<th><center> Kota </center></th>
			<th><center> Created At</center> </th>
			<th><center> Created By</center></th>
			<th><center> Updated At </center></th>
			<th><center> Updated By </center></th>
			<th><center> Action </center></th>
            </tr><?php
            foreach ($agent_data as $agent)
            {
                ?>
                <tr>
			<td width="30px"><?php echo ++$start ?></td>
			<td><?php echo $agent->agent ?></td>
			<td><?php echo $agent->kota ?></td>
			<td><?php echo $agent->created_at ?></td>
			<td><?php echo $agent->created_by ?></td>
			<td><?php echo $agent->updated_at ?></td>
			<td><?php echo $agent->updated_by ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('agent/read/'.$agent->id),'Liat'); 
				echo ' | '; 
				echo anchor(site_url('agent/upadate/'.$agent->id),'Ubah'); 
				echo ' | '; 
				echo anchor(site_url('agent/delete/'.$agent->id),'Hapus','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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