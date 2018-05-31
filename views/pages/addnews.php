<script type="text/javascript" src="../../js/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
    tinyMCE.init({
        mode : "textareas",
        theme : "simple"
    });
</script>



<?php

@session_start();
if ($_POST['login'] == 'kresh' && $_POST['pass'] == 'fcnivavn')
{
    $_SESSION['auth'] = '1';
    $authorizac = 1;
}

if (isset($_GET['logout']))
{
    unset($_SESSION['auth']);
    $authorizac = 0;
}


if (isset($_SESSION['auth']))
    echo 'Привіт'.$admin.', <a href="/index.php?view=addnews&logout">Вихід';
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
if (isset($_SESSION['auth'])) {
    include('adminmenu.php');
    ?>


    <div style="margin-bottom: 100px;" class="addorders col-lg-offset-1 col-lg-10 col-md-offset-0 col-md-12 col-xs-12 col-sm-12">

        <form action="index.php?view=addnews" method="post" id="addProduct" enctype="multipart/form-data">
            Назва cтатті: <input type="text" name="title" class="input-sm" style="width: 100%;">
            <br/>
            Текст статті: <textarea id="letter" style="width: 100%; height: 200px;" name="newstext"></textarea><br/>
            Короткий опис: <textarea  style="width: 100%; height: 200px;" name="desc"></textarea><br/>

            <div class="row">
                <div class="col-lg-5 col-md-5 col-xs-12 col-sm-12">
                    Категорія:
                    <select name="cat">
                        <?php
                            foreach($categories as $item): {
                        ?>
                        <option value="<?php echo $item['id']; ?>"><?php echo $item['name']." ".$item['surname']; ?></option>
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
                        <option value="<?php echo $item['id']; ?>"><?php echo $item['name']." ".$item['surname']; ?></option>
                        <?php
                        }
                        endforeach;
                        ?>
                    </select>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
                    <input type="file" name="file" class="input-sm">
                </div>
            </div>

            <div style="margin-top: 15px;" align="center">
                <button class="btn btn-success" type="submit" name="order">
                    Додати новину
                </button>
            </div>
    </div>


    </form>


    <?php

    if (isset($_POST['order'])) {
        $title = $_POST['title'];
        $desc = $_POST['desc'];
        $text = $_POST['newstext'];
        $cat = $_POST['cat'];
        $author = $_POST['author'];
        $file = $_POST['file'];
        $date = date('Y-m-d');

        /*Добавление в таблицу Продукты*/
        $sql = mysql_query("INSERT INTO news (name,shortText,text,catID,author,date)  VALUES ('$title','$desc','$text','$cat','$author','$date')");
        /*Последний идентификатор в базе*/
        $lastid = mysql_insert_id();

        $papka = 'usrfiles/' . $lastid . '/';
        /*Создание папки для изображения*/
        @mkdir($papka, 0777);
        /*Залив файла на сервак*/
        @copy($_FILES['file']["tmp_name"], $papka .'1'.'.jpg');

    }


    if (isset($_POST['order2'])) {
        $title = $_POST['team1'];
        $title2 = $_POST['team2'];
        $title3 = $_POST['logo1'];
        $title4 = $_POST['logo2'];
        $misce = $_POST['misce'];

        $date = date('Y-m-d');

        /*Добавление в таблицу Продукты*/
        $sql = mysql_query("INSERT INTO onlinelist (team1,team2,logo1,logo2,misce)  VALUES ('$title','$title2','$title3','$title4','$misce')");


    }

}?>
