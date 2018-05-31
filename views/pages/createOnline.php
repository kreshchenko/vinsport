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
            Команда 1: <input type="text" name="team1" class="input-sm" style="width: 100%;">
            Команда 2: <input type="text" name="team2" class="input-sm" style="width: 100%;">
            Лого команда 1: <input type="text" name="logo1" class="input-sm" style="width: 100%;">
            Лого команда 2: <input type="text" name="logo2" class="input-sm" style="width: 100%;">
            Место и время (Колос, 11.12.2015 12-30): <input type="text" name="misce" class="input-sm" style="width: 100%;">
            <br/>


            <div style="margin-top: 15px;" align="center">
                <button class="btn btn-success" type="submit" name="order2">
                    Додати онлайн
                </button>
            </div>
    </div>


    </form>


    <?php

}?>
