<!-- start slider section -->
<section id="sliderSection">
    <div class="row">
        <?php
        // Устанавливаем соединение с базой данных
        db_connect();
        // Переменная хранит число сообщений выводимых на станице
        $num = 10;
        // Извлекаем из URL текущую страницу
        $page = $_GET['page'];
        // Определяем общее число сообщений в базе данных
        $result = mysql_query("SELECT COUNT(*) FROM news");
        $posts = mysql_result($result, 0);
        // Находим общее число страниц
        $total = intval(($posts - 1) / $num) + 1;
        // Определяем начало сообщений для текущей страницы
        $page = intval($page);
        // Если значение $page меньше единицы или отрицательно
        // переходим на первую страницу
        // А если слишком большое, то переходим на последнюю
        if(empty($page) or $page < 0) $page = 1;
        if($page > $total) $page = $total;
        // Вычисляем начиная к какого номера
        // следует выводить сообщения
        $start = $page * $num - $num;
        $catID = $_GET['id'];
        // Выбираем $num сообщений начиная с номера $start
        $result = mysql_query("SELECT * FROM news WHERE catID='$catID'  ORDER BY id DESC LIMIT $start, $num");
        // В цикле переносим результаты запроса в массив $postrow
        while ( $postrow[] = mysql_fetch_array($result))
        ?>

        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">

            <!-- тУРНИРная таблица -->
            <div class="single_sidebar wow fadeInDown">

                <?php
                    $kil = 0;
                    $i=0;
                    foreach($turnirtable as $item):
                        if (isset($item['catID'])) $kil += 1;
                    endforeach;

                    if ($kil == 2)
                    {
                        ?>
                        <h2><span>Турнірна таблиця</span></h2>

                        <div class="tabbable"> <!-- Only required for left/right tabs -->
                            <ul class="nav nav-tabs">
                                <?php
                                    foreach($turnirtable as $item):
                                        if ($i == 0) echo '<li class="active"><a href="#tab1" data-toggle="tab">'.$item['name'].'</a></li>';
                                        if ($i == 1) echo ' <li><a href="#tab2" data-toggle="tab">'.$item['name'].'</a></li>';
                                        $i++;
                                    endforeach;
                                ?>
                            </ul>
                            <div class="tab-content">
                                <?php
                                    $i=0;
                                    foreach($turnirtable as $item):
                                        if ($i == 0) echo ' <div class="tab-pane active" id="tab1">
                                                                <p>'.$item['kod'].'</p>
                                                            </div>';
                                        if ($i == 1) echo '    <div class="tab-pane" id="tab2">
                                                                <p>'.$item['kod'].'</p>
                                                             </div>';
                                        $i++;
                                    endforeach;
                                ?>

                            </div>
							</div>

                    <?php

                    }
                    if ($kil == 1)
                    {
                        echo '<h2><span>Турнірна таблиця</span></h2>';
                        foreach($turnirtable as $item):
                            echo $item['kod'];
                        endforeach;
                    }
                ?>

            </div>

            <?php


            $isFirst = 0;
            for($i = 0; $i < $num; $i++) {
                $isFirst += 1;
                if (!isset($postrow[$i]['id'])) break;
                $dir = "usrfiles/" . $postrow[$i]['id'] . "/";
                $files = scandir($dir);

                if (count($files) == 2) {
                    $url = "../../images/logo.png";
                } else {
                    $url = $dir . $files[2];
                }

                if ($isFirst > 0) {
                    ?>
                    <div style="margin-top: 10px;" class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <a href="../../index.php?view=news&id=<?php echo $postrow[$i]['id']; ?>">
                                <img style="width: 100%;" src="<?php echo $url; ?>">
                            </a>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <h3>
                                    <a href="../../index.php?view=news&id=<?php echo $postrow[$i]['id'];; ?>">
                                        <?php echo $postrow[$i]['name']; ?>
                                    </a>
                                </h3>
                            </div>
                            <div style="margin-top: 8px;" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <p>
                                    <a href="../../index.php?view=news&id=<?php echo $postrow[$i]['id']; ?>">
                                        <?php echo $postrow[$i]['shortText']; ?>
                                    </a>
                                </p>
                            </div>
                            <div style="margin-top: 10px;" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <a href="../../index.php?view=news&id=<?php echo $postrow[$i]['id']; ?>">
                                    <button style="float: right;" type="button" class="btn btn-info btn-primary btn-md">
                                        Читати далі
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php
                } else {
                    ?>

                <?php
                }
            }
            ?>




    <div class="row">
        <div style="text-align: center; margin-top: 35px;" class="span12">

                <div class="btn-group">

                    <?php
                    // Проверяем нужны ли стрелки назад
                    if ($page != 1) $pervpage = '<a href= ../../index.php?view=cat&id='.$_GET['id'].'&page=1><button type="button" class="btn btn-default"><<<</button></a>
                                       <a href= ../../index.php?view=cat&id='.$_GET['id'].'&page='. ($page - 1) .'><button type="button" class="btn btn-default"><</button></a> ';
                    // Проверяем нужны ли стрелки вперед
                    if ($page != $total) $nextpage = '<a href= ../../index.php?view=cat&id='.$_GET['id'].'&page='. ($page + 1) .'><button type="button" class="btn btn-default">></button></a>
                                           <a href= ../../index.php?view=cat&id='.$_GET['id'].'&page=' .$total. '><button type="button" class="btn btn-default">>>></button></a>';

                    // Находим две ближайшие станицы с обоих краев, если они есть
                    if($page - 2 > 0) $page2left = ' <a href= ../../index.php?view=cat&id='.$_GET['id'].'&page='. ($page - 2) .'><button type="button" class="btn btn-default">'. ($page - 2) .'</button></a>  ';
                    if($page - 1 > 0) $page1left = '<a href= ../../index.php?view=cat&id='.$_GET['id'].'&page='. ($page - 1) .'><button type="button" class="btn btn-default">'. ($page - 1) .'</button></a> ';
                    if($page + 2 <= $total) $page2right = '  <a href= ../../index.php?view=cat&id='.$_GET['id'].'&page='. ($page + 2) .'><button type="button" class="btn btn-default">'. ($page + 2) .'</button></a>';
                    if($page + 1 <= $total) $page1right = '  <a href= ../../index.php?view=cat&id='.$_GET['id'].'&page='. ($page + 1) .'><button type="button" class="btn btn-default">'. ($page + 1) .'</button></a>';

                    $subpage = '<a href="#"><button type="button" class="btn btn-primary">'.$page.'</button></a>';
                    // Вывод меню
                    echo $pervpage.$page2left.$page1left.$subpage.$page1right.$page2right.$nextpage;

                    //if (isset($pervpage)) echo '<button type="button" class="btn btn-default">Перша сторінка</button>';
                    //if (isset($page2left)) echo '<button type="button" class="btn btn-default">2</button>';
                    //if (isset($page1left)) echo '<button type="button" class="btn btn-default">3</button>';

                    ?>

                </div>

        </div>
    </div>

            </div>

        <div class="col-lg-4 col-sm-4 col-md-4">
            <!-- sponsor add -->
            <?php include ("reklama.php");?>
            <!-- End sponsor add -->
        </div>
    </div>



