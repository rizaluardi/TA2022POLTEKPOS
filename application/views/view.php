<table border="1" cellpadding="8">
  <tr>
    <th>NPM</th>
    <th>Nama</th>
    <th>ADDRESS</th>
    <th>Transaksi IRC</th>
    <th>QR</th>
    <th>Data Transaksi</th>
  </tr>
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
  <?php
  if( ! empty($mahasiswa)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
    foreach($mahasiswa as $data){ // Lakukan looping pada variabel siswa dari controller
      echo "<tr>";
      echo "<td>".$data->nim."</td>";
      echo "<td>".$data->nama."</td>";
      echo "<td>".$data->address."</td>";?>
      <center><td style="vertical-align: middle;"><?php 
$curl = curl("https://public-api.solscan.io/account/splTransfers?account=".$data->address);
$propil = json_decode($curl, TRUE); echo $propil["total"];?></td></center>
      <td><img style="width: 100px;" src="<?php echo base_url().'assets/images/'.$data->qr_code;?>"></td>
      <td width='180px' align='center'>
                <a class='btn btn-danger btn-sm' href="https://solscan.io/account/<?php echo $data->address;?>#splTransfers" target="_blank" >Cek Data Transaksi</a>
              </td>
      <?php
      echo "</tr>";
    }
  }else{ // Jika data tidak ada
    echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
  }
  ?>
</table>
