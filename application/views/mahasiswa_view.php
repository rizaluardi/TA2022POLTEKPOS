<!DOCTYPE html>
<html>
<head>
	<title>Data Mahasiswa</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
<script>
    var baseurl = "<?php echo base_url("index.php/"); ?>"; // Buat variabel baseurl untuk nanti di akses pada file config.js
    </script>
    <script src="<?php echo base_url("js/jquery.min.js"); ?>"></script> <!-- Load library jquery -->
    <script src="<?php echo base_url("js/config.js"); ?>"></script> <!-- Load file process.js -->
<style type="text/css">
	.gp_btn ul {
                 list-style-type: none;
                 margin: 0;
                 padding: 0;
            }

            .gp_btn li {
                 display: inline-block;
            }

            .btn2 {
                 border:solid 1px;
                 border-radius:3px;
                 -moz-border-radius:3px;
                 -webkit-border-radius:3px;
                 padding:6px 9px 6px 9px;
                 color:black;
                 display:block;

                 color:black;
                 border-color:black;
                 background:#F8FCFF;
                 text-align: center;
                 text-decoration: none;
                 display: inline-block;
                 margin: 4px 2px;
                 cursor: pointer;
            }

            .btn2:hover {
                 text-shadow:0px 1px #388DBE;
                 border-color:#3390CA;
                 background:#58B0E7;
                 background:-moz-linear-gradient(top, #B4F6FF 1px, #63D0FE 1px, #58B0E7);
                 background:-webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #B4F6FF), color-stop(0.02, #63D0FE), color-stop(1, #58B0E7));
            }
</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<h2>Data <small>Mahasiswa</small></h2>
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Add New</button>
<br><br>
 <div class="gp_btn">
 	<ul>
                           <li>
                                <?php echo form_open('mahasiswa/cari');?>
                                     <input type="text" name="key" placeholder="NPM" size="50" required>
                                     <input type="submit" name="search" value="Search">
                                <?php echo form_close();?>
                            </li>
                        </ul>
                 </div>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>NPM</th>
						<th>NAMA</th>
						<th>ADDRESS</th>
						<th>IRC TRANSACTION</th>
						<th>QR CODE</th>
						<th>Re QR</th>
						<th>Data</th>
					</tr>
				</thead>
				<tbody>
					<?php 
function curl($url){
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $output = curl_exec($ch);  
    curl_close($ch);      
    return $output;
}

?>
					<?php foreach($data->result() as $row):?>
						
					<tr>
						<td style="vertical-align: middle;"><?php echo $row->nim;?></td>
						<td style="vertical-align: middle;"><?php echo $row->nama;?></td>
						<td style="vertical-align: middle;"><?php echo $row->address;?></td>
						<center><td style="vertical-align: middle;"><?php 
$curl = curl("https://public-api.solscan.io/account/splTransfers?account=".$row->address);
$propil = json_decode($curl, TRUE); echo $propil["total"];?></td></center>
						<td><img style="width: 100px;" src="<?php echo base_url().'assets/images/'.$row->qr_code;?>"></td>
						<td width='180px' align='center'>
								<a class='btn btn-success btn-sm' href="<?php echo site_url('mahasiswa/recetak2?nim='.$row->nim.'&nama='.$row->nama.'&address='.$row->address)?>" >Cetak QR Ulang (L)</a>
								<a class='btn btn-success btn-sm' href="<?php echo site_url('mahasiswa/recetak3?nim='.$row->nim.'&nama='.$row->nama.'&address='.$row->address)?>" >Cetak QR Ulang (M)</a>
								<a class='btn btn-success btn-sm' href="<?php echo site_url('mahasiswa/recetak4?nim='.$row->nim.'&nama='.$row->nama.'&address='.$row->address)?>" >Cetak QR Ulang (Q)</a>
								<a class='btn btn-success btn-sm' href="<?php echo site_url('mahasiswa/recetak?nim='.$row->nim.'&nama='.$row->nama.'&address='.$row->address)?>" >Cetak QR Ulang (H)</a>
							</td>
						<td width='180px' align='center'>
								<a class='btn btn-danger btn-sm' href="https://solscan.io/account/<?php echo $row->address;?>#splTransfers" target="_blank" >Data Transaksi</a>
							</td>


					</tr>

					<?php endforeach;?>

				</tbody>
			</table>
			<div class="row">
        <div class="col">
            <!--Tampilkan pagination-->
            <?php echo $pagination; ?>
        </div>
    </div>
		</div>
	</div>

	<!-- Modal add new mahasiswa-->
	<form action="<?php echo base_url().'index.php/mahasiswa/simpan'?>" method="post">
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Add New Mahasiswa</h4>
		      </div>
		      <div class="modal-body">
		    
		          <div class="form-group">
		            <label for="nim" class="control-label">NPM:</label>
		            <input type="text" name="nim" class="form-control" id="nim">
		          </div>
		          <div class="form-group">
		            <label for="nama" class="control-label">NAMA:</label>
		            <input type="text" name="nama" class="form-control" id="nama">
		          </div>
		           <div class="form-group">
		            <label for="address" class="control-label">ADDRESS:</label>
		            <input type="text" name="address" class="form-control" id="address">
		          </div>
	        
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
		        <button type="submit" class="btn btn-primary">Simpan</button>
		      </div>
		    </div>
		  </div>
		</div>
	</form>

	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-2.1.4.min.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
</body>

</html>