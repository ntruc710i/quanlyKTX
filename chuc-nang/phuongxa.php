<option value="">- Rỗng -</option>
<?php
error_reporting(0);
$data = $_POST["DistrictId"];

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://raw.githubusercontent.com/madnh/hanhchinhvn/master/dist/xa-phuong/".$data.".json",
  CURLOPT_RETURNTRANSFER => true,
));
$response = curl_exec($curl);
curl_close($curl);


$response = json_decode($response,true);
foreach($response as $r){ 
    echo "<option value='".$r['code']."'>".$r['name']."</option>"; 
} 

