<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ($_GET['view'] == 'online') echo '<meta http-equiv="Refresh" content="1000" />'; ?>
    <meta name="description" content="Весь спорт Вінничини на одному ресурсі">
    <title>
        <?php
        if ($_GET['view']=='news' && isset($_GET['id']))
        {
            $news_name = get_news_name($_GET['id']);
            echo $news_name['name'].' - ';
        }

        ?>Вінницький спорт.info
    </title>

    <!-- Bootstrap -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <!--Menu-->
    <link rel="stylesheet" href="../../style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="../../font-awesome/css/font-awesome.css" >
    <!-- for fontawesome icon css file -->
    <link href="../../css/font-awesome.min.css" rel="stylesheet">
    <!-- for content animate css file -->
    <link rel="stylesheet" href="../../css/animate.css">
    <!-- google fonts  -->
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Varela' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!-- for news ticker css file -->
    <link href="../../css/li-scroller.css" rel="stylesheet">
    <!-- slick slider css file -->
    <link href="../../css/slick.css" rel="stylesheet">
    <!-- for fancybox slider -->
    <link href="../../css/jquery.fancybox.css" rel="stylesheet">
    <!-- website theme file -->
    <!-- <link href="css/theme-red.css" rel="stylesheet"> -->
    <link href="../../css/menu/style.css" rel="stylesheet">

    <link href="../../css/theme.css" rel="stylesheet">
    <!-- main site css file -->
    <link href="../../style.css" rel="stylesheet">

    <script src="../../js/menu.js"></script>

    <script src="calendar/jQuery/jquery-1.6.1.min.js"></script>
    <script src="calendar/valid.js"></script>

    <!-- Put this script tag to the <head> of your page -->
    <script type="text/javascript" src="//vk.com/js/api/openapi.js?121"></script>

    <script type="text/javascript">
        VK.init({apiId: 5357788, onlyWidgets: true});
    </script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
</head>
<body>

<!-- =========================
  //////////////This Theme Design and Developed //////////////////////
  //////////// by www.wpfreeware.com======================-->

<!-- Preloader -->
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
<!-- End Preloader -->

<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>

<div class="container">
<!-- start header section -->
<header id="header">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="header_top">
                <div class="header_top_left">
                    <ul class="top_nav">
                        <li><a href="../../index.php">Головна</a></li>

                        <li><a href="../../index.php?view=contacts">Контакти</a></li>
                    </ul>
                </div>
                <div class="header_top_right">
                    <p>
                        ВЕСЬ СПОРТ ВІННИЧИНИ НА ОДНОМУ РЕСУРСІ
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="header_bottom">
                <div class="logo_area">

                    <a href="../../index.php" class="logo">
                      <img src="../../img/logo.png" alt="Весь спорт Вінничини на одному ресурсі">
                    </a>
                    <!-- for your text logo format -->
                    <!--<a href="../../index.php" class="logo">
                        Вінницький <span>СПОРТ</span>
                    </a>-->
                </div>
                <div class="add_banner">
                    <a href="../../index.php"><img src="../../img/addbanner_728x90_V1.jpg" alt="img"></a>
                </div>
            </div>
        </div>
    </div>
</header><!-- End header section -->
<!-- start nav section -->
<section id="navArea">
    <!-- Start navbar -->
    <nav>
        <ul class="menu">
            <li><a  href="#">ФУТБОЛ</a>
                <ul class="sub-menu">
                    <li><a href="#">Область</a>
                        <ul>
                            <li><a href="../../index.php?view=cat&id=1">Чемпіонат</a></li>
                            <li><a href="../../index.php?view=cat&id=3">Першість</a></li>
                            <li><a href="../../index.php?view=cat&id=4">Райони</a></li>
                            <li><a href="../../index.php?view=cat&id=5">Кубок</a></li>
                            <li><a href="../../index.php?view=cat&id=6">Інше</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Вінниця</a>
                        <ul>
                            <li><a href="../../index.php?view=cat&id=7">Чемпіонат</a></li>
                            <li><a href="../../index.php?view=cat&id=8">Кубок</a></li>
                            <li><a href="../../index.php?view=cat&id=41">ФБР</a></li>
                            <li><a href="../../index.php?view=cat&id=42">ВПЛ</a></li>
                            <li><a href="../../index.php?view=cat&id=11">Інше</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Вінницький р-н</a>
                        <ul>
                            <li><a href="../../index.php?view=cat&id=12">Прем'єр ліга</a></li>
                            <li><a href="../../index.php?view=cat&id=13">Перша ліга</a></li>
                            <li><a href="../../index.php?view=cat&id=14">Кубок</a></li>
                            <li><a href="../../index.php?view=cat&id=15">Інше</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Футзал</a>
                        <ul>
                            <li><a href="../../index.php?view=cat&id=16">Чемпіонати</a></li>
                            <li><a href="../../index.php?view=cat&id=17">Кубок</a></li>
                            <li><a href="../../index.php?view=cat&id=18">Діти</a></li>
                            <li><a href="../../index.php?view=cat&id=39">Райони</a></li>
                            <li><a href="../../index.php?view=cat&id=19">Інше</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="#">ВОЛЕЙБОЛ</a>
                <ul class="sub-menu">
                    <li><a href="../../index.php?view=cat&id=20">Чоловіки</a></li>
                    <li><a href="../../index.php?view=cat&id=21">Жінки</a></li>
                    <li><a href="../../index.php?view=cat&id=22">Інше</a></li>
                </ul>
            </li>
            <li><a href="#">БАСКЕТБОЛ</a>
                <ul class="sub-menu">
                    <li><a href="../../index.php?view=cat&id=23">Чоловіки</a></li>
                    <li><a href="../../index.php?view=cat&id=24">Жінки</a></li>
                    <li><a href="../../index.php?view=cat&id=25">Інше</a></li>
                </ul>
            </li>
            <li><a href="#">ХОКЕЙ</a>
                <ul class="sub-menu">
                    <li><a href="../../index.php?view=cat&id=26">На траві</a></li>
                    <li><a href="../../index.php?view=cat&id=27">З шайбою</a></li>
                </ul>
            </li>
            <li><a href="#">АТЛЕТИКА</a>
                <ul class="sub-menu">
                    <li><a href="../../index.php?view=cat&id=28">Важка атлетика</a></li>
                    <li><a href="../../index.php?view=cat&id=29">Легка атлетика</a></li>
                </ul>
            </li>
            <li><a href="#">ІНШІ</a>
                <ul class="sub-menu">
                    <li><a href="../../index.php?view=cat&id=30">Бокс/Боротьба</a></li>
                    <li><a href="../../index.php?view=cat&id=32">Настільний теніс</a></li>
                    <li><a href="../../index.php?view=cat&id=33">Водні</a></li>
                    <li><a href="../../index.php?view=cat&id=34">Шашки/Шахи</a></li>
                    <li><a href="../../index.php?view=cat&id=36">Кульова стрільба</a></li>
                    <li><a href="../../index.php?view=cat&id=37">Армспорт</a></li>
                    <li><a href="../../index.php?view=cat&id=40">Інші</a></li>
                </ul>
            </li>
            <li><a style="color: #d083cf;" href="../../index.php?view=onlineindex">ОНЛАЙН</a></li>
        </ul>
    </nav>
</section><!-- End nav section -->

<section id="newsSection">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <!-- start news sticker -->
            <div class="latest_newsarea">
                <span>Останні новини</span>
                <ul id="ticker01" class="news_sticker">
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
                    <li><a href="../../index.php?view=news&id=<?php echo $item['id'];?>"><img src="<?php echo $url; ?>" alt=""><?php echo $item['name'];?></a></li>
                        <?php
                        if ($number == 12)
                        {
                            break;
                        }
                    }
                    endforeach;
                    ?>
                </ul>
                <div class="social_area">
                    <ul class="social_nav">
                        <li class="vimeo"><a href="https://vk.com/vinsportinfo"></a></li>
                        <li class="facebook"><a href="https://www.facebook.com/%D0%92%D1%96%D0%BD%D0%BD%D0%B8%D1%86%D1%8C%D0%BA%D0%B8%D0%B9-%D1%81%D0%BF%D0%BE%D1%80%D1%82-182349455447433/"></a></li>
                        <li class="youtube"><a href="https://www.youtube.com/channel/UCM6WsDxV8GHT0nBdPiel-PQ"></a></li>
                        <li class="mail"><a href="http://vinsport.info/index.php?view=contacts"></a></li>
                    </ul>
                </div>
            </div><!-- End news sticker -->
        </div>
    </div>
    <div class="row">
        <a href="http://katran.vn.ua/">
            <img width="45%" align="left" src="http://vinsport.info/images/hb.png">
        </a>
        <a href="http://happybox.vn.ua/">
            <img width="45%" align="right" src="http://vinsport.info/images/katran.png">
        </a>

    </div>
</section>


<!-- ==================start content body section=============== -->
<?php include($_SERVER['DOCUMENT_ROOT'].'/views/pages/'.$view.'.php'); ?>
<!-- ==================End content body section=============== -->


<div class="single_sidebar wow fadeInDown">
    <h2><span>Наші партнери</span></h2>
    <a href="http://www.noc-vin.org.ua/">
        <img width="28%" src="images/noc.png">
    </a>
    <a href="http://www.vin.gov.ua/web/Upravlinnya/web_upr_sport.nsf/webgr_view/main?OpenDocument&RestrictToCategory=GrA9ALH">
        <img width="10%" src="images/obl.jpg">
    </a>
    <a href="http://www.vmr.gov.ua/Executives/Lists/SportCommitte/Default.aspx">
        <img width="10%" src="images/kfcs.JPG">
    </a>
    <a href="http://basketballcity.vn.ua/">
        <img width="10%" src="images/bask.png">
    </a>
    <a href="http://voff.org.ua/">
        <img width="10%" src="images/voff.gif">
    </a>
    <a href="http://vinff.com.ua/">
        <img width="28%" src="images/vinff.png">
    </a>
</div>
<footer id="footer">
    <div class="footer_top">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                <div class="footer_widget wow fadeInLeftBig">
                    <h2 align="center">Контакти</h2>
                    Вінницький спорт це портал, який об'єднує весь спорт м. Вінниці та регіону. З питань реклами звертатись за адресою reklama@vinsport.info
                </div>
            </div>
        </div>
		
		<p align="center">
			<!-- Рейтинг винницких сайтов , code for http://vinsport.info -->
<script type="text/javascript">java="1.0";java1=""+"refer="+escape(document.referrer)+"&page="+escape(window.location.href); document.cookie="astratop=1; path=/"; java1+="&c="+(document.cookie?"yes":"now");</script>
<script type="text/javascript1.1">java="1.1";java1+="&java="+(navigator.javaEnabled()?"yes":"now")</script>
<script type="text/javascript1.2">java="1.2";java1+="&razresh="+screen.width+'x'+screen.height+"&cvet="+(((navigator.appName.substring(0,3)=="Mic"))? screen.colorDepth:screen.pixelDepth)</script>
<script type="text/javascript1.3">java="1.3"</script>
<script type="text/javascript">java1+="&jscript="+java+"&rand="+Math.random(); document.write("<a href='http://rating.vn.ua/?fromsite=5166'><img "+" src='http://rating.vn.ua/img.php?id=5166&"+java1+"&' border='0' alt='Рейтинг винницких сайтов' width='88' height='31'><\/a>");</script>
<noscript><a href="http://rating.vn.ua/?fromsite=5166" target="_blank"><img src="http://rating.vn.ua/img.php?id=5166" border="0" alt="Рейтинг винницких сайтов" width="88" height="31"></a></noscript>
<!-- /Рейтинг винницких сайтов -->

<!-- counter.1Gb.ua -->
<script language="javascript" type="text/javascript">
cgb_js="1.0"; cgb_r=""+Math.random()+"&r="+
escape(document.referrer)+"&pg="+
escape(window.location.href);
document.cookie="rqbct=1; path=/"; cgb_r+="&c="+
(document.cookie?"Y":"N");
</script><script language="javascript1.1" type="text/javascript">
cgb_js="1.1";cgb_r+="&j="+
(navigator.javaEnabled()?"Y":"N")</script>
<script language="javascript1.2" type="text/javascript">
cgb_js="1.2"; cgb_r+="&wh="+screen.width+
'x'+screen.height+"&px="+
(((navigator.appName.substring(0,3)=="Mic"))?
screen.colorDepth:screen.pixelDepth)</script>
<script language="javascript1.3" type="text/javascript">
cgb_js="1.3"</script>
<script language="javascript" 
type="text/javascript">cgb_r+="&js="+cgb_js; 
document.write("<a href='http://www.1Gb.ua?cnt=17508'>"+
"<img src='http://counter.1Gb.ua/cnt.aspx?"+
"u=17508&"+cgb_r+
"&' border=0 width=88 height=31 "+
"alt='1Gb.ua counter'><\/a>")</script>
<noscript><a href='http://www.1Gb.ua?cnt=17508'>
<img src="http://counter.1Gb.ua/cnt.aspx?u=17508" 
border=0 width="88" height="31" alt="1Gb.ua counter"></a>
</noscript>
<!-- /counter.1Gb.ua -->


		</p>

    <div class="footer_bottom">
        <p class="copyright">
            Всі права захищено <a href="../../index.php">Вінницький спорт</a></br>
            Будь-яке використання матеріалів без згоди редакції "Вінницький спорт" ЗАБОРОНЕНЕ
        </p>
        <p class="developer">Розроблено: <a href="https://vk.com/kreshchenko_igor" rel="nofollow">Ігор Крещенко</a></p>
    </div>
</footer>
</div> <!-- /.container -->


<!-- jQuery Library -->
<script src="js/jquery.min.js"></script>
<!-- For content animatin  -->
<script src="js/wow.min.js"></script>
<!-- bootstrap js file -->
<script src="js/bootstrap.min.js"></script>
<!-- slick slider js file -->
<script src="js/slick.min.js"></script>
<!-- news ticker jquery file -->
<script src="js/jquery.li-scroller.1.0.js"></script>
<!-- for news slider -->
<script src="js/jquery.newsTicker.min.js"></script>
<!-- for fancybox slider -->
<script src="js/jquery.fancybox.pack.js"></script>
<!-- custom js file include -->
<script src="js/custom.js"></script>
<script src="js/bootstrap-submenu.min.js"></script>
<script src="js/menu.js" type="text/javascript"></script>



<!-- =========================
      //////////////This Theme Design and Developed //////////////////////
      //////////// by www.wpfreeware.com======================-->


</body>
</html>