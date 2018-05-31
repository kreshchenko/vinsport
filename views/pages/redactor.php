<?php
@session_start();
if ($_POST['login'] == 'admin' && $_POST['pass'] == 'admin')
{
    $_SESSION['auth'] = '1';
    $authorizac = 1;
}
if (isset($_GET['logout']))
{
    unset($_SESSION['auth']);
    $authorizac = 0;
}

?>

<?php
if (isset($_SESSION['auth']))
    echo 'Привіт начальнік, <a href="/index.php?view=addnews&logout">Выход';
else {
    ?>

    <br>
    <div align="center">
        <form method='POST' action = '/index.php?view=addnews'>
            <div class="col-lg-3 col-lg-offset-1 col-sm-3 col-sm-offset-1 col-xs-3 col-xs-offset-1 col-md-3 col-xs-offset-1"> Логин <input type='text' name='login'></div>
            <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3 ">Пароль<input type='password' name='pass'></div>
            <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3"><input type='submit' value='Ввойти'></div>
        </form>

    </div>
<?php }?>



<?php
if (isset($_SESSION['auth']))
{
include ('adminmenu.php');
?>






<div align="center" class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
    <form action="index.php?view=redactor" method="post" id="product_for_redact">
        <input type="text" width="20px" name="id">
        <button class="btn btn-success" type="submit" name="idproduct">
            Відкрити статтю
        </button>
    </form>
</div>


<script type="text/javascript" src="../../js/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
    tinyMCE.init({
        mode : "textareas",
        theme : "simple"
    });
</script>

<br/>
<br/>
<br/>
<br/>

<?php
$id = $_GET['id'];
    $idproduct = $_POST['id'];//Строка товара
    $i = 0;


    if (isset($_GET['refreash']))
    {
        echo '<meta http-equiv="refresh" content="0; url=index.php?view=redactor&id='.$id.'">';
    }

if (isset($_GET['deleteimg']))
{
    @unlink($_GET['deleteimg']);
}

    while (isset($idproduct[$i]))//Находим ID  в строке
    {
        if ($idproduct[$i] == 'i' && $idproduct[$i + 1] == 'd') {
            if (isset($idproduct[$i + 3])) {
                $id = $idproduct[$i + 3];
            }
            if (isset($idproduct[$i + 4])) {
                $id = $idproduct[$i + 3] . $idproduct[$i + 4];
            }
            if (isset($idproduct[$i + 5])) {
                $id = $idproduct[$i + 3] . $idproduct[$i + 4] . $idproduct[$i + 5];
            }
            if (isset($idproduct[$i + 6])) {
                $id = $idproduct[$i + 3] . $idproduct[$i + 4] . $idproduct[$i + 5] . $idproduct[$i + 6];
            }
        }
        $i++;
    }


if (isset($id))
{
    $news = get_one_news($id);


    /*Работаем с картинками*/
    $dir = "usrfiles/".$news['id']."/";
    $files = scandir($dir);

    ?>

<form action="index.php?view=redactor&refreash=1&id=<?php echo $id;?>" method="post" id="redactForm" enctype="multipart/form-data">

<div class="row">
<div align="center" class="col-sm-10 col-xs-12 col-lg-12 col-md-12">
    <?php

    echo "Добавить ещё картинку:";
    echo "<input type=\"file\" name=\"file\" class=\"input-sm\"><br/>";

    for ($i = 0; $i < count($files); $i++) //перебираем все файлы
    {
        if (($files[$i] != ".") && ($files[$i] != "..")) //Если файл не точка или 2 точки
        {
            $path = $dir . $files[$i];
            echo "<a href=\"index.php?view=redactor&id=".$id."&deleteimg=".$path."\"><img width=\"100px\" onmouseover=\"this.src='../../images/del.jpg'; this.width=100;this.height=100;\" onmouseout=\"this.src='".$path."'; this.width=100;this.height=100;\" height=\"100px\" src=\"".$path."\"></a>";
        }
    }

    ?>
</div>
</div>



    <div class="row">
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
            Назва cтатті:
                <input type="text" name="title" value="<?php echo $news['name']?>" class="input-sm" style="width: 100%;">
            <br/>
            Текст статті:
                <textarea id="letter" style="width: 100%; height: 200px;" name="newstext">
                    <?php echo $news['text']?>
                </textarea>
            <br/>
            Короткий опис:
                <textarea  style="width: 100%; height: 200px;" name="desc">
                    <?php echo $news['shortText']?>
                </textarea>
            <br/>

            <div class="row">
                <div class="col-lg-5 col-md-5 col-xs-12 col-sm-12">
                    Категорія:
                    <select name="cat">
                        <?php
                        foreach($categories as $item): {
                            ?>
                            <option value="<?php echo $item['id'];?>" <?php if ($news['catID']==$item['id']) echo 'selected';?>>
                                <?php echo $item['name']." ".$item['surname']; ?>
                            </option>
                        <?php
                        }
                        endforeach;
                        ?>
                    </select>
                </div>
                <div class="col-lg-3 col-md-3 col-xs-12 col-sm-12">
                    Автор:
                    <select name="author">
                        <?php
                        foreach($authors as $item): {
                            ?>
                            <option value="<?php echo $item['id']; ?>"<?php if ($news['author']==$item['author']) echo 'selected';?>>
                                <?php echo $item['name']." ".$item['surname']; ?>
                            </option>
                        <?php
                        }
                        endforeach;
                        ?>
                    </select>
                </div>

            </div>
        </div>
    </div>




    <div align="center" class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
        <button class="btn btn-success" type="submit" name="order">
            Редагувати
        </button>
        <a class="btn btn-danger" href="index.php?view=redactor&del=<?php echo $id; ?>">Видалити</a>
    </div>
</form>


<?php
}// Если прислано ID

/*Обработчик*/
if(isset($_POST['order']))
{
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $text = $_POST['newstext'];
    $cat = $_POST['cat'];
    $author = $_POST['author'];
    $file = $_POST['file'];

    $date_today = date("mdyhIs");
    $papka = 'usrfiles/'.$id.'/';
    /*Создание папки для изображения*/

    $files = scandir($papka);
    $filesCount = count($files);
    $fileName = $filesCount - 1;

    /*Залив файла на сервак*/
    copy($_FILES['file']["tmp_name"],$papka.$fileName.'.jpg');





        /*Добавление в таблицу Продукты*/
    $sql = mysql_query("UPDATE news SET name = '$title' , text = '$text' , shortText = '$desc' , catID = '$cat' , author = '$author' WHERE id = '$id'");


    if (isset($_GET['del']))
    {
        $id = $_GET['del'];
        
        $sql = mysql_query("DELETE FROM news WHERE id = '$id'");
        unset($_POST);
    }
    ?>

</form>

<?php }}?>