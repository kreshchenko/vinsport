<?php
require_once("db_fnc.php");

$area = $_POST['area'];

$city = get_city_list($area);

foreach ($city as $item):{
    echo '<option>'.$item['city'].'</option>';
}
    endforeach;

echo '<option>asd</option>';



?>