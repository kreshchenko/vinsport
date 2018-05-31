<?php
session_start();
include('db_fnc.php');



$view = empty($_GET['view']) ? 'index' : $_GET['view'];

switch($view)
{
    case ('index'):
        $news = get_news();
        $NewsForVoleyball = get_voleyball_news('1');
        $NewsForBasketball = get_basketball_news('1');
        $NewsForFootball = get_football_news();
        break;

    case ('cat'):
        $cat=$_GET['id'];
        $news = get_news();
        $catnews = get_cat_news($cat);
        $turnirtable = get_table ($cat);
        break;

    case ('news'):
        $id = $_GET['id'];
        $news = get_news();
        $onenews = get_one_news($id);
        $author =  get_news_author($onenews['author']);
        $category = get_news_cat_by_id($onenews['catID']);
        $catnews = get_cat_news($onenews['catID']);
        break;

    case ('contacts'):

        break;

    case ('addnews'):
        $authors = get_authors_list();
        $categories = get_categories_list ();
        break;

    case ('online'):
        $id=$_GET['id'];
        break;

    case ('redactor'):
        $authors = get_authors_list();
        $categories = get_categories_list ();
        break;

    case ('createOnline'):

        break;
    case ('onlineindex'):
        $onlinelist = get_online_list();
        break;
}


$arr = array('index','news','cat','contacts' , 'addnews' , 'redactor','createOnline','online','onlineindex');
if (!in_array($view, $arr)) $view='notfound';


include ($_SERVER['DOCUMENT_ROOT'].'/views/layouts/tamplet.php');
?>