<!-- ==================start content body section=============== -->
<section id="contentSection">
<div class="row">
<div class="col-lg-8 col-md-8 col-sm-8">
    <div class="left_content">
        <div class="single_page">
            <h1><?php echo $onenews['name']; ?></h1>
            <div class="post_commentbox">

                <a href="<?php echo 'mailto:'.$author['email']?>" title="<?php echo $author['email']?>">
                    <i class="fa fa-user"></i>
                    <?php echo '<b>Автор: '.$author['name'].' '.$author['surname'].'</b>';?>
                </a>
                <span><i class="fa fa-calendar"></i><?php echo $onenews['date'];?></span>
                <a href="#"><i class="fa fa-tags"></i><?php echo $category['name'];?></a>
            </div>
            <div class="single_page_content">
                <!--Слайдер с фотками-->
                <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                    <div id="carousel" class="carousel slide col-md-12 col-sm-12 col-lg-12 col-xs-12">
                        <!--Слайды-->
                        <div class="carousel-inner">
                            <?php
                            $dir = "usrfiles/".$onenews['id']."/";
                            $files = scandir($dir);

                            if (count($files) == 2) { //Папка с картинками пуста
                                echo '<div class="item active" align="center">';
                                echo '<img class="slideimg" src="../../images/logo.png">';
                                echo '<div class="carousel-caption"></div>';
                                echo '</div>';
                            }

                            $tmp = 0;//переменная для стиля актив
                            for ($i = 0; $i < count($files); $i++) //перебираем все файлы
                            {
                                if (($files[$i] != ".") && ($files[$i] != "..")) //Если файл не точка или 2 точки
                                {
                                    $active = 'item'; //стиль
                                    $path = $dir . $files[$i];
                                    if ($tmp == 0) {
                                        $active = 'item active'; //Стилль для первого елемента
                                        $tmp = $tmp + 1;
                                    }
                                    echo '<div class="' . $active . '" align="center">';
                                    echo '<img class="slideimg" src="' . $path . '">';
                                    echo '<div class="carousel-caption"></div>';
                                    echo '</div>';
                                }
                            }


                            ?>

                        </div>
                        <!--СТрелки переключение слайдов-->
                        <?php
                        if (count($files) > 3)//Если в папке с картинками ничего нет
                        {
                            ?>
                            <a href="#carousel" class="left carousel-control" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a href="#carousel" class="right carousel-control" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <p><?php echo $onenews['text'];?></p>
                <div id="vk_comments"></div>
                <script type="text/javascript">
                    VK.Widgets.Comments("vk_comments", {limit: 20, width: "600", attach: "*"});
                </script>

            </div>



            <div class="related_post">
                <h2>Новини категорії<i class="fa fa-thumbs-o-up"></i></h2>
                <ul class="spost_nav wow fadeInDown animated">
                    <?php

                    $number = 0;

                    foreach($catnews as $item): {
                    $number += 1;

                    $dir = "usrfiles/".$item['id']."/";
                    $files = scandir($dir);

                    if (count($files) == 2)
                    {
                        $url = "../../images/logo.png";
                    }
                    else
                    {
                        $url = $dir . $files[2];
                    }
                    ?>
                    <li>
                        <div class="media">
                            <a class="media-left" href="../../index.php?view=news&id=<?php echo $item['id'];?>">
                                <img src="<?php echo $url; ?>" alt="img">
                            </a>
                            <div class="media-body">
                                <a class="catg_title" href="../../index.php?view=news&id=<?php echo $item['id'];?>">
                                    <?php echo $item['name'];?>
                                </a>
                            </div>
                        </div>
                    </li>
                        <?php
                        if ($number == 3)
                        {
                            break;
                        }
                    }
                    endforeach;
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-4 col-md-4 col-sm-4">
    <aside class="right_content">

        <!-- sponsor add -->
        <?php include ("reklama.php");?>
        <!-- End sponsor add -->

    </aside>
</div>
</div>
</section>
<!-- ==================End content body section=============== -->