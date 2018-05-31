<?php
function db_connect()
{
   /* $host = 'localhost';
    $user = 'root';
    $pswd = '';
    $db = 'overtime';*/
    //$sql = mysql_query("UPDATE news SET name = '$title' , text = '$text' , shortText = '$desc' , catID = '$cat' , author = '$author' WHERE id = '$id'");

    $host = 'mysql301.1gb.ua';
    $user = 'gbua_overtime';
    $pswd = 'b0b50fff1ghj';
    $db = 'gbua_overtime';


    $connection = @mysql_connect($host, $user, $pswd);
    mysql_set_charset( 'utf8' );
    if(!$connection || !mysql_select_db($db,$connection))
    {
        return false;
    }
    return $connection;
}




function db_result_to_array($result)
{
    $res_array = array();

    $count = 0;

    while($row = mysql_fetch_array($result))
    {
        $res_array[$count] = $row;
        $count++;
    }
    return $res_array;
}

function get_online_list (){
    db_connect();
    $query = "SELECT * FROM onlinelist ORDER BY id DESC LIMIT 10";
    $result = mysql_query($query);
    $result = db_result_to_array($result);
    return $result;
}


function get_data_list()
{
    db_connect();

    $query = "SELECT * FROM dates";

    $result = mysql_query($query);

    $result = db_result_to_array($result);

    return $result;
}
function get_data_list_by_date($date)
{
    db_connect();

    $query = "SELECT * FROM calendar WHERE date = '$date'";

    $result = mysql_query($query);

    $result = db_result_to_array($result);

    return $result;
}


function get_news()
{
    db_connect();

    $query = "SELECT * FROM news ORDER BY id DESC";

    $result = mysql_query($query);

    $result = db_result_to_array($result);

    return $result;
}



function get_last_news ()
{
    db_connect();

    $query = "SELECT * FROM news ORDER BY id LIMIT 10";

    $result= mysql_query($query);

    $result = db_result_to_array($result);

    return $result;
}

function get_cat()
{
    db_connect();

    $query = "SELECT * FROM category ORDER BY id";

    $result = mysql_query($query);

    $result = db_result_to_array($result);

    return $result;
}

function get_authors_list ()
{
    db_connect();

    $query = "SELECT * FROM authors ORDER BY id";

    $result = mysql_query($query);

    $result = db_result_to_array($result);

    return $result;
}

function get_categories_list ()
{
    db_connect();

    $query = "SELECT * FROM category ORDER BY id";

    $result = mysql_query($query);

    $result = db_result_to_array($result);

    return $result;
}

function get_one_news($id)
{
    db_connect();
    $query = ("SELECT * FROM news WHERE id = '$id' ");

    $result = mysql_query($query);

    $row = mysql_fetch_array($result);

    return $row;
}

function get_news_name($id)
{
    db_connect();
    $query = ("SELECT name FROM news WHERE id = '$id'");

    $result = mysql_query($query);

    $row = mysql_fetch_array($result);

    return $row;
}

function get_one_translation ($id){
    db_connect();
    $query = ("SELECT * FROM textonline WHERE onlineID = '$id' ORDER BY id");

    $result = mysql_query($query);

    $row = mysql_fetch_array($result);

    return $row;
}
/*Автор статьи по айди*/
    function get_news_author ($authorid)
    {
        db_connect();

        $query2 = ("SELECT * FROM authors WHERE id = '$authorid' ") ;
        $result2 = mysql_query ($query2);
        $row2 = mysql_fetch_array($result2);

        return $row2;
    }
/*Категория статьи по айди*/
function get_news_cat_by_id ($catid)
{
    db_connect();

    $query3 = ("SELECT * FROM category WHERE id = '$catid' ") ;
    $result3 = mysql_query ($query3);
    $row3 = mysql_fetch_array($result3);

    return $row3;
}


function get_cat_news($catID)
{
    db_connect();

    $query = "SELECT * FROM news WHERE catID='$catID' ORDER BY id DESC";

    $result = mysql_query($query);

    $result = db_result_to_array($result);

    return $result;
}

function get_table ($catID)
{
    db_connect();

    $query = "SELECT * FROM turnirs WHERE catID='$catID'";

    $result = mysql_query($query);

    $result = db_result_to_array($result);

    return $result;
}

function get_football_news()
{
    db_connect();

    $query = "SELECT * FROM news WHERE
              catID='1' OR
              catID='3' OR
              catID='4' OR
              catID='5' OR
              catID='6' OR
              catID='7' OR
              catID='8' OR
              catID='11' OR
              catID='12' OR
              catID='13' OR
              catID='14' OR
              catID='15' OR
              catID='16' OR
              catID='17' OR
              catID='18' OR
              catID='38' OR
              catID='39' OR
              catID='19' ORDER BY id DESC LIMIT 5";

    $result = mysql_query($query);

    $result = db_result_to_array($result);

    return $result;
}
function get_voleyball_news()
{
    db_connect();

    $query = "SELECT * FROM news WHERE
              catID='20' OR
              catID='21' OR
              catID='22'  ORDER BY id DESC LIMIT 5";

    $result = mysql_query($query);

    $result = db_result_to_array($result);

    return $result;
}
function get_basketball_news()
{
    db_connect();

    $query = "SELECT * FROM news WHERE
              catID='23' OR
              catID='24' OR
              catID='25'  ORDER BY id DESC LIMIT 5";

    $result = mysql_query($query);

    $result = db_result_to_array($result);

    return $result;
}


/*Разница дат для админордер*/
function get_duration ($date_from, $date_till) {
    $date_from = explode('-', $date_from);
    $date_till = explode('-', $date_till);

    $time_from = mktime(0, 0, 0, $date_from[1], $date_from[2], $date_from[0]);
    $time_till = mktime(0, 0, 0, $date_till[1], $date_till[2], $date_till[0]);

    $diff = ($time_till - $time_from)/60/60/24;
    //$diff = date('d', $diff); - как делал))

    return $diff;
}


?>