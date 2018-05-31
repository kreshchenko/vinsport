<?php
require_once("db_fnc.php");

$date = $_POST['date'];

$area = get_data_list_by_date($date);

foreach ($area as $item): {
    echo '<option>'.$item['time'].' '.$item['name'].'</option>';
}
    endforeach;


?>