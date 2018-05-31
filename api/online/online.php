<?php
function json_fix($json_res) {
    $cyr = array (
        '\u0430' => 'а', '\u0410' => 'А',
        '\u0431' => 'б', '\u0411' => 'Б',
        '\u0432' => 'в', '\u0412' => 'В',
        '\u0433' => 'г', '\u0413' => 'Г',
        '\u0434' => 'д', '\u0414' => 'Д',
        '\u0435' => 'е', '\u0415' => 'Е',
        '\u0451' => 'ё', '\u0401' => 'Ё',
        '\u0436' => 'ж', '\u0416' => 'Ж',
        '\u0437' => 'з', '\u0417' => 'З',
        '\u0438' => 'и', '\u0418' => 'И',
        '\u0439' => 'й', '\u0419' => 'Й',
        '\u0457' => 'ї', '\u0407' => 'Ї',
        '\u0456' => 'і', '\u0406' => 'І',
        '\u043a' => 'к', '\u041a' => 'К',
        '\u043b' => 'л', '\u041b' => 'Л',
        '\u043c' => 'м', '\u041c' => 'М',
        '\u043d' => 'н', '\u041d' => 'Н',
        '\u043e' => 'о', '\u041e' => 'О',
        '\u043f' => 'п', '\u041f' => 'П',
        '\u0440' => 'р', '\u0420' => 'Р',
        '\u0441' => 'с', '\u0421' => 'С',
        '\u0442' => 'т', '\u0422' => 'Т',
        '\u0443' => 'у', '\u0423' => 'У',
        '\u0444' => 'ф', '\u0424' => 'Ф',
        '\u0445' => 'х', '\u0425' => 'Х',
        '\u0446' => 'ц', '\u0426' => 'Ц',
        '\u0447' => 'ч', '\u0427' => 'Ч',
        '\u0448' => 'ш', '\u0428' => 'Ш',
        '\u0449' => 'щ', '\u0429' => 'Щ',
        '\u044a' => 'ъ', '\u042a' => 'Ъ',
        '\u044b' => 'ы', '\u042b' => 'Ы',
        '\u044c' => 'ь', '\u042c' => 'Ь',
        '\u044d' => 'э', '\u042d' => 'Э',
        '\u044e' => 'ю', '\u042e' => 'Ю',
        '\u0454' => 'є', '\u0404' => 'Є',
        '\u044f' => 'я', '\u042f' => 'Я',
        '\/' => '/',
        '\r' => '',
        '\"' => '\'\'',
        '\n' => '<br />',
        '\t' => ''
    );

    foreach ($cyr as $cyr_key => $cyr_char) {
        $json_res = str_replace($cyr_key, $cyr_char, $json_res);
    }
    return $json_res;
}


$response = array();

require '../db_connect.php';

$db = new DB_CONNECT();

$sql = "SELECT * FROM onlinelist ORDER BY id DESC";

$result = mysql_query($sql) or die(mysql_error());

if (mysql_num_rows($result) > 0) {
    $response["online"] = array();

    while ($row = mysql_fetch_array($result)) {
        $product = array();
        $product["team1"] = $row["team1"];
        $product["team2"] = $row["team2"];
        $product["goal1"] = $row["goal1"];
        $product["goal2"] = $row["goal2"];
        $product["misce"] = $row["misce"];
        if ($row["stat"] == 0){
            $product["stat"] = 'Матч не розпочався';
        }
        if ($row["stat"] == 1){
            $product["stat"] = '1 тайм';
        }
        if ($row["stat"] == 2){
            $product["stat"] = 'Перерва';
        }
        if ($row["stat"] ==3){
            $product["stat"] = '2 тайм';
        }
        if ($row["stat"] ==4){
            $product["stat"] = 'Кінець';
        }



        array_push($response["online"], $product);
    }
    $response["success"] = 1;

    echo json_fix(json_encode($response)) ;
} else {
    $response["success"] = 0;
    $response["message"] = "Немає онлайн трансляцій";

    echo json_encode($response);
}
?>