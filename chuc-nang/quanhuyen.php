<option value="">- Rỗng -</option>
<?php
error_reporting(0);
$data = $_POST["ProvineId"];
$response = file_get_contents('https://raw.githubusercontent.com/madnh/hanhchinhvn/master/dist/quan-huyen/'.$data.'.json');
$response = json_decode($response,true);

foreach($response as $r){ 
    echo "<option value='".$r['code']."'>".$r['name']."</option>"; 
} 

