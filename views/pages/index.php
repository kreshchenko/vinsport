<section id="sliderSection">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <!-- Set up your HTML////Слайдер -->

            <div class="slick_slider">
                <?php
                $number = 0;

                foreach($news as $item): {
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
                <div class="single_iteam">
                    <a href="../../index.php?view=news&id=<?php echo $item['id'];?>">
                        <img src="<?php echo $url; ?>">
                    </a>
                    <div class="slider_article">
                        <h2>
                            <a class="slider_tittle" href="../../index.php?view=news&id=<?php echo $item['id'];?>">
                                <?php echo $item['name'];?>
                            </a>
                        </h2>
                        <p>
                            <?php echo $item['shortText'];?>
                        </p>
                    </div>
                </div>
                <?php
                    if ($number == 3)
                    {
                        break;
                    }
                }
                endforeach;
                ?>

            </div>
        </div>
        <!-- Останні новини справа від слайдера-->
        <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="latest_post">
                <h2><span>Останні новини</span></h2>
                <div class="latest_post_container">
                    <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
                    <ul class="latest_postnav">
                        <?php
                        $number = 0;

                        foreach($news as $item): {
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
                                <a href="../../index.php?view=news&id=<?php echo $item['id'];?>" class="media-left">
                                    <img alt="img" src="<?php echo $url; ?>">
                                </a>
                                <div class="media-body">
                                    <a href="../../index.php?view=news&id=<?php echo $item['id'];?>" class="catg_title">
                                        <?php echo $item['name'];?>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <?php
                            if ($number == 5)
                            {
                                break;
                            }
                        }
                        endforeach;
                        ?>
                    </ul>
                    <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
                </div>
            </div>
        </div>
        <!--Кінець Останні новини справа від слайдера-->
    </div>
</section><!-- End slider section -->
<!-- =========================


<!-- ==================start content body section=============== -->
<section id="contentSection">
<div class="row">
<div class="col-lg-8 col-md-8 col-sm-8">
<div class="left_content">

<!-- start 2 style category design -->
<div class="fashion_technology_area">
    <div class="fashion">
        <div class="single_post_content">
            <h2><span>Волейбол</span></h2>

                <?php
                /*Вывод товаров*/

                $isFirst = 0;
                foreach($NewsForVoleyball as $item):
                $isFirst += 1;

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

                if ($isFirst == 1) {
                    ?>
                    <ul class="business_catgnav wow fadeInDown">
                    <li>

                        <figure class="bsbig_fig">
                            <a href="../../index.php?view=news&id=<?php echo $item['id'];?>" class="featured_img">
                                <img alt="img" src="<?php echo $url;?>">
                                <span class="overlay"></span>
                            </a>
                            <figcaption>
                                <a href="../../index.php?view=news&id=<?php echo $item['id'];?>">
                                    <?php echo $item['name'];?>
                                </a>
                            </figcaption>
                            <p>
                                <?php echo $item['shortText'];?>
                            </p>
                        </figure>
                    </li>
                    </ul>
                    <ul class="spost_nav">
                        <?php
                        }
                        else {
                            ?>
                            <li>
                                <div class="media wow fadeInDown">
                                    <a href="../../index.php?view=news&id=<?php echo $item['id'];?>" class="media-left">
                                        <img src="<?php echo $url;?>">
                                    </a>
                                    <div class="media-body">
                                        <a href="../../index.php?view=news&id=<?php echo $item['id'];?>" class="catg_title">
                                            <?php echo $item['name'];?>
                                        </a>
                                    </div>
                                </div>
                            </li>

                        <?php
                        }
                        endforeach;
                        ?>
                    </ul>
        </div>
    </div>
    <div class="technology">
        <div class="single_post_content">
            <h2><span>Баскетбол</span></h2>
            <?php
            /*Вывод товаров*/

            $isFirst = 0;
            foreach($NewsForBasketball as $item):
            $isFirst += 1;

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

            if ($isFirst == 1) {
            ?>
            <ul class="business_catgnav wow fadeInDown">
                <li>

                    <figure class="bsbig_fig">
                        <a href="../../index.php?view=news&id=<?php echo $item['id'];?>" class="featured_img">
                            <img alt="img" src="<?php echo $url;?>">
                            <span class="overlay"></span>
                        </a>
                        <figcaption>
                            <a href="../../index.php?view=news&id=<?php echo $item['id'];?>">
                                <?php echo $item['name'];?>
                            </a>
                        </figcaption>
                        <p>
                            <?php echo $item['shortText'];?>
                        </p>
                    </figure>
                </li>
            </ul>
            <ul class="spost_nav">
                <?php
                }
                else {
                    ?>
                    <li>
                        <div class="media wow fadeInDown">
                            <a href="../../index.php?view=news&id=<?php echo $item['id'];?>" class="media-left">
                                <img alt="img" src="<?php echo $url;?>">
                            </a>
                            <div class="media-body">
                                <a href="../../index.php?view=news&id=<?php echo $item['id'];?>" class="catg_title">
                                    <?php echo $item['name'];?>
                                </a>
                            </div>
                        </div>
                    </li>

                <?php
                }
                endforeach;
                ?>
            </ul>
        </div>
    </div>
</div>
<!-- End 2 style category design -->

<!-- start games category design -->
<div class="single_post_content">
    <h2><span>Футбол</span></h2>
    <div class="single_post_content_left">
        <?php

        $isFirst = 0;
        foreach($NewsForFootball as $item):
        $isFirst += 1;

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

        if ($isFirst == 1) {
        ?>

        <ul class="business_catgnav">
            <li>
                <figure class="bsbig_fig  wow fadeInDown">
                    <a class="featured_img" href="../../index.php?view=news&id=<?php echo $item['id'];?>">
                        <img src="<?php echo $url;?>" alt="img">
                        <span class="overlay"></span>
                    </a>
                    <figcaption>
                        <a href="../../index.php?view=news&id=<?php echo $item['id'];?>"><?php echo $item['name'];?></a>
                    </figcaption>
                    <p><?php echo $item['shortText']?></p>
                </figure>
            </li>
        </ul>
    </div>
    <div class="single_post_content_right">
        <ul class="spost_nav">
            <?php
            }
            else {
            ?>
            <li>
                <div class="media wow fadeInDown">
                    <a href="../../index.php?view=news&id=<?php echo $item['id'];?>" class="media-left">
                        <img alt="img" src="<?php echo $url;?>">
                    </a>
                    <div class="media-body">
                        <a href="../../index.php?view=news&id=<?php echo $item['id'];?>" class="catg_title"><?php echo $item['name'];?></a>
                    </div>
                </div>
            </li>
            <?php
            }
            endforeach;
            ?>
        </ul>
    </div>
</div>
<!-- End games category design -->
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