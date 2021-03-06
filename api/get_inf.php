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
        '\u2116' => '№',
        '\n' => '\n \n',
        '\r' => '',
        '\u2013' => '-',
        '\"' => '\'\'',
        '\t' => ''
    );

    foreach ($cyr as $cyr_key => $cyr_char) {
        $json_res = str_replace($cyr_key, $cyr_char, $json_res);
    }
    return $json_res;
}



function html_fix($html_res) {
    $cyr = array (
        '&ndash;' => '-', '&laquo;' => '"',
        '&nbsp;' => ' ', '&raquo;' => '"'

    );

    foreach ($cyr as $cyr_key => $cyr_char) {
        $html_res = str_replace($cyr_key, $cyr_char, $html_res);
    }
    return $html_res;
}




$response = array();

require 'db_connect.php';

$db = new DB_CONNECT();

if (isset($_GET["pid"])) {
    $pid = $_GET['pid'];

    $result = mysql_query("SELECT *FROM news WHERE id = $pid");

    if (!empty($result)) {
        if (mysql_num_rows($result) > 0) {

            $result = mysql_fetch_array($result);

            $product = array();
            $product["pid"] = $result["id"];
            $product["name"] = $result["name"];
            $product["text"] = strip_tags(html_fix($result["text"]));
            $dir = "../usrfiles/".$result['id']."/";
            $files = scandir($dir);

            if (count($files) == 2)
            {
                $product["img"] = "http://vinsport.info/images/logo.png";
            }
            else
            {
                $url = $files[2];
                $product["img"] = 'http://vinsport.info/usrfiles/'.$result['id'].'/'.$url;
            }

            $response["success"] = 1;

            $response["news"] = array();

            array_push($response["news"], $product);

            echo json_fix(json_encode($response));
        } else {
            $response["success"] = 0;
            $response["message"] = "Не знайдено новину";

            echo json_fix(json_encode($response));
        }
    } else {
        $response["success"] = 0;
        $response["message"] = "Не знайдено новину";

        echo json_fix(json_encode($response));
    }
} else {
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    echo json_fix(json_encode($response));
}
?>