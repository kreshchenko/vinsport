<?php
// Соединиться с сервером БД
mysql_connect("mysql301.1gb.ua", "gbua_overtime", "b0b50fff1ghj") or die (mysql_error ());

// Выбрать БД
mysql_select_db("gbua_overtime") or die(mysql_error());
mysql_query("SET NAMES utf8");
// SQL-запрос
$strSQL = "SELECT * FROM textonline WHERE onlineID = '$id' ORDER BY id";
$strSQL3 = "SELECT * FROM textonline WHERE onlineID = '$id' ORDER BY id DESC";
$strSQL2 = "SELECT * FROM onlinelist WHERE id='$id'";

// Выполнить запрос (набор записей $rs содержит результат)
$rs = mysql_query($strSQL);
$rs3 = mysql_query($strSQL3);
$rs2 = mysql_query($strSQL2);

$myonline2 = mysql_fetch_array($rs2);
$myonline = mysql_fetch_array($rs);
$myonline3 = mysql_fetch_array($rs3);

$time = time();
$rz1 = ($time - $myonline3['starttime'])%60;
$rz2 = floor (($time-$myonline3['starttime'])/60);


?>
<!-- ==================start content body section=============== -->
<section id="contentSection">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="left_content">
                <div class="single_page">

                    <div class="single_page_content">
                        <div class="row">
                            <div style="text-align: center" class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <h2> <?php echo $myonline2['team1'];?></h2><br>
                                <img width="35%" src="<?php echo $myonline2['logo1'];?>">
                            </div>
                            <div style="text-align: center"  class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <h1>
                                    <?php
                                        echo $myonline2['goal1'].':'.$myonline2['goal2'];
                                    ?>
                                </h1>
                                <span style="margin-top: -15px;"><?php echo $myonline2['misce'];?></span><br/>
                                <span style="margin-top: -15px;">
                                    <?php
                                        if ($myonline2['stat'] == 2) echo 'Перерва';
                                        if ($myonline2['stat'] == 4) echo 'Гра закінчилась';
                                        if ($myonline2['stat'] == 1) { echo '1 тайм. ';
                                    ?>
                                            <div style="font-size: 15px; font-weight: bold;" id="tm1">0</div>
                                            <script>
                                                var t=setInterval("tm()",1000);
                                                var xt2=<?php echo $rz1;?>;
                                                var xt3=<?php echo $rz2;?>;
                                                function tm() {
                                                    xt2++;
                                                    if(xt2>59) {
                                                        xt3++;
                                                        xt2=0;
                                                    }
                                                    if(xt2>9) {
                                                        xt=xt2;
                                                    } else {
                                                        xt="0"+xt2;
                                                    }

                                                    document.getElementById("tm1").innerHTML=xt3+"' "+xt+"\"";
                                                }
                                                function tm2() {
                                                    document.getElementById("tm2").innerHTML+=document.getElementById("tm1").innerHTML+" | ";
                                                    xt++;
                                                }
                                            </script>
                                    <?php
                                        }
                                    ?>
                                    <?php
                                    if ($myonline2['stat'] == 3) { echo '2 тайм. ';
                                    ?>
                                            <div style="font-size: 15px; font-weight: bold;" id="tm1">0</div>
                                            <script>
                                                var t=setInterval("tm()",1000);
                                                var xt2=<?php  echo $rz1;?>;
                                                var xt3=<?php $rz2 += 45; echo $rz2;?>;
                                                function tm() {
                                                    xt2++;
                                                    if(xt2>59) {
                                                        xt3++;
                                                        xt2=0;
                                                    }
                                                    if(xt2>9) {
                                                        xt=xt2;
                                                    } else {
                                                        xt="0"+xt2;
                                                    }

                                                    document.getElementById("tm1").innerHTML=xt3+"' "+xt+"\"";
                                                }
                                                function tm2() {
                                                    document.getElementById("tm2").innerHTML+=document.getElementById("tm1").innerHTML+" | ";
                                                    xt++;
                                                }
                                            </script>
                                    <?php
                                    }
                                    ?>
                                </span>
                            </div>
                            <div style="text-align: center"  class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <h2><?php echo $myonline2['team2'];?></h2><br>
                                <img width="35%" src="<?php echo $myonline2['logo2'];?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
                                <table class="table table-hover">
                                    <tr>


<?php
// Цикл по набору записей $rs
while($row = mysql_fetch_array($rs)) {
    $time = $row['time'];
    $starttime=$row['starttime'];
	if ($myonline2['stat'] == 3) {
		
		$timez = floor (($time-$starttime)/60) + 46;
	}
	else{$timez = floor (($time-$starttime)/60) + 1;}
    

    echo '<tr><td>'.$timez.'</td>'.$row['text'] . "</tr>";
}
?>

                                    </tr>
                                </table>
                            </div>
                        </div>
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

                                        <?php
// Закрыть соединение с БД
mysql_close();
?>

<script type="text/javascript">new Image().src="http://pix-00.tizerbank.com/pixel/tz/6YT9k?"+Math.random(); new Image().src="http://ucounter.ucoz.net/"+Math.random()+".gif?cid=ucoz&r64="+window.btoa(document.referrer)+"&cb="+Math.random();</script>


