<html>
<head>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<?php
    include ('../db_fnc.php');
    $id = $_GET['id'];

    if (isset($_GET['id']))
    {
        db_connect();
        $result = mysql_query("SELECT * FROM textonline WHERE onlineID = '$id' ORDER BY id DESC");
        $myonline = mysql_fetch_array($result);

        $result2 = mysql_query ("SELECT * FROM onlinelist WHERE id='$id'");
        $myonline2 = mysql_fetch_array($result2);

        if (isset($_POST['start1'])) {

            $starttime = time();
            $text = '<td style="text-align: center;"><b>Пролунав стартовий свисток!</b></td><td><img width="25px" src="images/svist.png"></td>';
            $sql = mysql_query("INSERT INTO textonline (onlineID,starttime,time,text) VALUES ('$id','$starttime','$starttime','$text')");
            $sql = mysql_query("UPDATE onlinelist SET stat = '1' WHERE id = '$id'");


        }

        if (isset($_POST['pererva'])) {
            $sql = mysql_query("UPDATE onlinelist SET stat = '2' WHERE id = '$id'");

            $time = time();
            $starttime=$myonline['starttime'];
            $goal1 = $myonline['gol1'];
            $goal2 = $myonline['gol2'];
            $kut1 = $myonline['ugol1'];
            $kut2 = $myonline['ugol2'];
            $yc1 = $myonline['yc1'];
            $yc2 = $myonline['yc2'];
            $rc1 = $myonline['rc1'];
            $rc2 = $myonline['rc2'];
			$secondHalf = $myonline['secondHalf'];

            $timez = floor (($time-$starttime)/60) + 1;
            $text = '<td style="text-align: center;"><b>Команди пішли на перерву!</b></td><td><img width="25px" src="images/svist.png"></td>';
            $sql = mysql_query("INSERT INTO textonline (onlineID,gol1,gol2,ugol1,ugol2,yc1,yc2,rc1,rc2,text,starttime,time,secondHalf) VALUES ('$id','$goal1','$goal2','$kut1','$kut2','$yc1','$yc2','$rc1','$rc2','$text','$starttime','$time','$secondHalf')");
        }
        if (isset($_POST['start2'])) {
            $sql = mysql_query("UPDATE onlinelist SET stat = '3' WHERE id = '$id'");
            $sql = mysql_query("UPDATE onlinelist SET secondHalf = '2' WHERE id = '$id'");
			
			$secondHalf = 2;
            $time = time()+2700;
            $starttime = time();
            $goal1 = $myonline['gol1'];
            $goal2 = $myonline['gol2'];
            $kut1 = $myonline['ugol1'];
            $kut2 = $myonline['ugol2'];
            $yc1 = $myonline['yc1'];
            $yc2 = $myonline['yc2'];
            $rc1 = $myonline['rc1'];
            $rc2 = $myonline['rc2'];
		
            $text = '<td style="text-align: center;"><b>Розпочався другий тайм!</b></td><td><img width="25px" src="images/svist.png"></td>';
            $sql = mysql_query("INSERT INTO textonline (onlineID,gol1,gol2,ugol1,ugol2,yc1,yc2,rc1,rc2,text,starttime,time,secondHalf) VALUES ('$id','$goal1','$goal2','$kut1','$kut2','$yc1','$yc2','$rc1','$rc2','$text','$starttime','$time','$secondHalf')");
        }
        if (isset($_POST['finish'])) {
            $sql = mysql_query("UPDATE onlinelist SET stat = '4' WHERE id = '$id'");

            $time = time();
            $starttime=$myonline['starttime'];
            $goal1 = $myonline['gol1'];
            $goal2 = $myonline['gol2'];
            $kut1 = $myonline['ugol1'];
            $kut2 = $myonline['ugol2'];
            $yc1 = $myonline['yc1'];
            $yc2 = $myonline['yc2'];
            $rc1 = $myonline['rc1'];
            $rc2 = $myonline['rc2'];
			$secondHalf = $myonline['secondHalf'];

            $timez = floor (($time-$starttime)/60) + 1;
            $text = '<td style="text-align: center;"><b>Гра закінчилась!</b></td><td><img width="25px" src="images/svist.png"></td>';
            $sql = mysql_query("INSERT INTO textonline (onlineID,gol1,gol2,ugol1,ugol2,yc1,yc2,rc1,rc2,text,starttime,time,secondHalf) VALUES ('$id','$goal1','$goal2','$kut1','$kut2','$yc1','$yc2','$rc1','$rc2','$text','$starttime','$time','$secondHalf')");
        }
        if (isset($_POST['gol1'])) {
            $time = time();
            $starttime=$myonline['starttime'];
            $goal1 = $myonline['gol1'];
            $goal2 = $myonline['gol2'];
            $kut1 = $myonline['ugol1'];
            $kut2 = $myonline['ugol2'];
            $yc1 = $myonline['yc1'];
            $yc2 = $myonline['yc2'];
            $rc1 = $myonline['rc1'];
            $rc2 = $myonline['rc2'];
			$secondHalf = $myonline['secondHalf'];

            $goal1 = $goal1 + 1;
            if (isset($_POST['goalauthor']))
            {
                $text = '<td style="text-align: center;">Гол забиває команда '.$myonline2['team1'].' '.$_POST['goalauthor'].'</td><td><img width="25px" src="images/goal.png"></td>';
            }
            else $text = '<td style="text-align: center;">Гол забиває команда '.$myonline2['team1'].'</td><td><img width="25px" src="images/goal.png"></td>';
            $sql = mysql_query("INSERT INTO textonline (onlineID,gol1,gol2,ugol1,ugol2,yc1,yc2,rc1,rc2,text,starttime,time,secondHalf) VALUES ('$id','$goal1','$goal2','$kut1','$kut2','$yc1','$yc2','$rc1','$rc2','$text','$starttime','$time','$secondHalf')");
            $sql2 = mysql_query("UPDATE onlinelist SET goal1 = '$goal1' WHERE id = '$id'");

        }

        if (isset($_POST['gol2'])) {
            $time = time();
            $starttime=$myonline['starttime'];
            $goal1 = $myonline['gol1'];
            $goal2 = $myonline['gol2'];
            $kut1 = $myonline['ugol1'];
            $kut2 = $myonline['ugol2'];
            $yc1 = $myonline['yc1'];
            $yc2 = $myonline['yc2'];
            $rc1 = $myonline['rc1'];
            $rc2 = $myonline['rc2'];
			$secondHalf = $myonline['secondHalf'];

            $goal2 = $goal2 + 1;
            if (isset($_POST['goalauthor']))
            {
                $text = '<td style="text-align: center;">Гол забиває команда '.$myonline2['team2'].' '.$_POST['goalauthor'].'</td><td><img width="25px" src="images/goal.png""></td>';
            }
            else $text = '<td style="text-align: center;">Гол забиває команда '.$myonline2['team2'].'</td><td><img width="25px" src="images/goal.png""></td>';
            $sql = mysql_query("INSERT INTO textonline (onlineID,gol1,gol2,ugol1,ugol2,yc1,yc2,rc1,rc2,text,starttime,time,secondHalf) VALUES ('$id','$goal1','$goal2','$kut1','$kut2','$yc1','$yc2','$rc1','$rc2','$text','$starttime','$time','$secondHalf')");
            $sql2 = mysql_query("UPDATE onlinelist SET goal2 = '$goal2' WHERE id = '$id'");

        }

        if (isset($_POST['kut1'])) {
            $time = time();
            $starttime=$myonline['starttime'];
            $goal1 = $myonline['gol1'];
            $goal2 = $myonline['gol2'];
            $kut1 = $myonline['ugol1'];
            $kut2 = $myonline['ugol2'];
            $yc1 = $myonline['yc1'];
            $yc2 = $myonline['yc2'];
            $rc1 = $myonline['rc1'];
            $rc2 = $myonline['rc2'];
			$secondHalf = $myonline['secondHalf'];
            $kut1= $kut1 + 1;
            if (isset($_POST['ugol']))
            {
                $text = '<td style="text-align: center;">Кутовий виконує команда: '.$myonline2['team1'].'. '.$_POST['ugol'].'</td><td><img width="25px" src="images/ugol.png""></td>';
            }
            else $text = '<td style="text-align: center;">Кутовий виконує команда: '.$myonline2['team1'].'</td><td><img width="25px" src="images/ugol.png"></td>';
            $sql = mysql_query("INSERT INTO textonline (onlineID,gol1,gol2,ugol1,ugol2,yc1,yc2,rc1,rc2,text,starttime,time,secondHalf) VALUES ('$id','$goal1','$goal2','$kut1','$kut2','$yc1','$yc2','$rc1','$rc2','$text','$starttime','$time','$secondHalf')");
        }
        if (isset($_POST['kut2'])) {
            $time = time();
            $starttime=$myonline['starttime'];
            $goal1 = $myonline['gol1'];
            $goal2 = $myonline['gol2'];
            $kut1 = $myonline['ugol1'];
            $kut2 = $myonline['ugol2'];
            $yc1 = $myonline['yc1'];
            $yc2 = $myonline['yc2'];
            $rc1 = $myonline['rc1'];
            $rc2 = $myonline['rc2'];
			$secondHalf = $myonline['secondHalf'];
            $kut2= $kut2 + 1;
            if (isset($_POST['ugol']))
            {
                $text = '<td style="text-align: center;">Кутовий виконує команда: '.$myonline2['team2'].'. '.$_POST['ugol'].'</td><td><img width="25px" src="images/ugol.png"></td>';
            }
            else $text = '<td style="text-align: center;">Кутовий виконує команда: '.$myonline2['team2'].'</td><td><img width="25px" src="images/ugol.png"></td>';
            $sql = mysql_query("INSERT INTO textonline (onlineID,gol1,gol2,ugol1,ugol2,yc1,yc2,rc1,rc2,text,starttime,time,secondHalf) VALUES ('$id','$goal1','$goal2','$kut1','$kut2','$yc1','$yc2','$rc1','$rc2','$text','$starttime','$time','$secondHalf')");
        }

        if (isset($_POST['yc1'])) {
            $time = time();
            $starttime=$myonline['starttime'];
            $goal1 = $myonline['gol1'];
            $goal2 = $myonline['gol2'];
            $kut1 = $myonline['ugol1'];
            $kut2 = $myonline['ugol2'];
            $yc1 = $myonline['yc1'];
            $yc2 = $myonline['yc2'];
            $rc1 = $myonline['rc1'];
            $rc2 = $myonline['rc2'];
			$secondHalf = $myonline['secondHalf'];
            $yc1= $yc1 + 1;
            if (isset($_POST['yc']))
            {
                $text = '<td style="text-align: center;">Жовту картку отримує гравець команди '.$myonline2['team1'].' '.$_POST['goalauthor'].'</td><td><img width="15px" src="images/yc.jpg"></td>';
            }
            else $text = '<td style="text-align: center;">Жовту картку отримує гравець команди '.$myonline2['team1'].'</td><td><img width="15px" src="images/yc.jpg"></td>';
            $sql = mysql_query("INSERT INTO textonline (onlineID,gol1,gol2,ugol1,ugol2,yc1,yc2,rc1,rc2,text,starttime,time,secondHalf) VALUES ('$id','$goal1','$goal2','$kut1','$kut2','$yc1','$yc2','$rc1','$rc2','$text','$starttime','$time','$secondHalf')");
        }
        if (isset($_POST['yc2'])) {
            $time = time();
            $starttime=$myonline['starttime'];
            $goal1 = $myonline['gol1'];
            $goal2 = $myonline['gol2'];
            $kut1 = $myonline['ugol1'];
            $kut2 = $myonline['ugol2'];
            $yc1 = $myonline['yc1'];
            $yc2 = $myonline['yc2'];
            $rc1 = $myonline['rc1'];
            $rc2 = $myonline['rc2'];
			$secondHalf = $myonline['secondHalf'];
            $yc2 = $yc2 + 1;
            if (isset($_POST['yc']))
            {
                $text = '<td style="text-align: center;">Жовту картку отримує гравець команди '.$myonline2['team2'].' '.$_POST['yc'].'</td><td><img width="15px" src="images/yc.jpg""></td>';
            }
            else $text = '<td style="text-align: center;">Жовту картку отримує гравець команди '.$myonline2['team2'].'</td><td><img width="15px" src="images/yc.jpg""></td>';
           $sql = mysql_query("INSERT INTO textonline (onlineID,gol1,gol2,ugol1,ugol2,yc1,yc2,rc1,rc2,text,starttime,time,secondHalf) VALUES ('$id','$goal1','$goal2','$kut1','$kut2','$yc1','$yc2','$rc1','$rc2','$text','$starttime','$time','$secondHalf')");
        }

        if (isset($_POST['rc1'])) {
            $time = time();
            $starttime=$myonline['starttime'];
            $goal1 = $myonline['gol1'];
            $goal2 = $myonline['gol2'];
            $kut1 = $myonline['ugol1'];
            $kut2 = $myonline['ugol2'];
            $yc1 = $myonline['yc1'];
            $yc2 = $myonline['yc2'];
            $rc1 = $myonline['rc1'];
            $rc2 = $myonline['rc2'];
			$secondHalf = $myonline['secondHalf'];

            $rc1 = $rc1 + 1;
            if (isset($_POST['rc']))
            {
                $text = '<td style="text-align: center;">З поля вилучений гравець команди '.$myonline2['team1'].' '.$_POST['rc'].'</td><td><img width="15px" src="images/rc.png""></td>';
            }
            else $text = '<td style="text-align: center;">З поля вилучений гравець команди '.$myonline2['team1'].'</td><td><img width="15px" src="images/rc.png"></td>';
            $sql = mysql_query("INSERT INTO textonline (onlineID,gol1,gol2,ugol1,ugol2,yc1,yc2,rc1,rc2,text,starttime,time,secondHalf) VALUES ('$id','$goal1','$goal2','$kut1','$kut2','$yc1','$yc2','$rc1','$rc2','$text','$starttime','$time','$secondHalf')");
        }
        if (isset($_POST['rc2'])) {
            $time = time();
            $starttime=$myonline['starttime'];
            $goal1 = $myonline['gol1'];
            $goal2 = $myonline['gol2'];
            $kut1 = $myonline['ugol1'];
            $kut2 = $myonline['ugol2'];
            $yc1 = $myonline['yc1'];
            $yc2 = $myonline['yc2'];
            $rc1 = $myonline['rc1'];
            $rc2 = $myonline['rc2'];
			$secondHalf = $myonline['secondHalf'];
            $rc2 = $rc2 + 1;
            if (isset($_POST['rc']))
            {
                $text = '<td style="text-align: center;">З поля вилучений гравець команди '.$myonline2['team2'].' '.$_POST['rc'].'</td><td><img width="15px" src="images/rc.png"></td>';
            }
            else $text = '<td style="text-align: center;">З поля вилучений гравець команди '.$myonline2['team2'].'</td><td><img width="15px" src="images/rc.png"></td>';
            $sql = mysql_query("INSERT INTO textonline (onlineID,gol1,gol2,ugol1,ugol2,yc1,yc2,rc1,rc2,text,starttime,time,secondHalf) VALUES ('$id','$goal1','$goal2','$kut1','$kut2','$yc1','$yc2','$rc1','$rc2','$text','$starttime','$time','$secondHalf')");
        }

        if (isset($_POST['msg'])) {
            $time = time();
            $starttime=$myonline['starttime'];
            $goal1 = $myonline['gol1'];
            $goal2 = $myonline['gol2'];
            $kut1 = $myonline['ugol1'];
            $kut2 = $myonline['ugol2'];
            $yc1 = $myonline['yc1'];
            $yc2 = $myonline['yc2'];
            $rc1 = $myonline['rc1'];
            $rc2 = $myonline['rc2'];
			$secondHalf = $myonline['secondHalf'];

            $text = '<td style="text-align: center;">'.$_POST['msg'].'</td><td></td>';
           $sql = mysql_query("INSERT INTO textonline (onlineID,gol1,gol2,ugol1,ugol2,yc1,yc2,rc1,rc2,text,starttime,time,secondHalf) VALUES ('$id','$goal1','$goal2','$kut1','$kut2','$yc1','$yc2','$rc1','$rc2','$text','$starttime','$time','$secondHalf')");
        }
        if (isset($_POST['img'])) {
            $time = time();
            $starttime=$myonline['starttime'];
            $goal1 = $myonline['gol1'];
            $goal2 = $myonline['gol2'];
            $kut1 = $myonline['ugol1'];
            $kut2 = $myonline['ugol2'];
            $yc1 = $myonline['yc1'];
            $yc2 = $myonline['yc2'];
            $rc1 = $myonline['rc1'];
            $rc2 = $myonline['rc2'];
			$secondHalf = $myonline['secondHalf'];

            $text = '<td style="text-align: center;"><img width="75%" src="'.$_POST['img'].'"></td><td></td>';
            $sql = mysql_query("INSERT INTO textonline (onlineID,gol1,gol2,ugol1,ugol2,yc1,yc2,rc1,rc2,text,starttime,time,secondHalf) VALUES ('$id','$goal1','$goal2','$kut1','$kut2','$yc1','$yc2','$rc1','$rc2','$text','$starttime','$time','$secondHalf')");
        }
        ?>
        <form action=" " method="post" enctype="multipart/form-data">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                    <button style="width: 100%;" class="btn btn-success" type="submit" name="start1">
                        Матч почався
                    </button>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                    <button style="width: 100%;" class="btn btn-warning" type="submit" name="pererva">
                        Перерва
                    </button>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                    <button style="width: 100%;" class="btn btn-success" type="submit" name="start2">
                        2 тайм почався
                    </button>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <button style="width: 100%;" class="btn btn-danger" type="submit" name="finish">
                        Кінець
                    </button>
                </div>
            </div>
        </form>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div style="text-align: center;" class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <?php echo '<h2>'.$myonline2['team1'].'</h2>'; ?>
                </div>
                <div style="text-align: center;" class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <?php echo '<h2>'.$myonline['gol1'].':'.$myonline['gol2'].'</h2>'; ?>
                    <br>

                </div>
                <div style="text-align: center;" class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <?php echo '<h2>'.$myonline2['team2'].'</h2>'; ?>
                </div>
            </div>

        <form action="" method="post" enctype="multipart/form-data">
            <!--Голы-->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div style="text-align: center;" class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <button style="width: 100%;" class="btn btn-success" type="submit" name="gol1">
                        Гол+
                    </button>
                </div>
                <div style="text-align: center;" class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <input type="text" name="goalauthor" class="input-lg" style="width: 100%;">
                </div>
                <div style="text-align: center;" class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <button style="width: 100%;" class="btn btn-success" type="submit" name="gol2">
                        Гол+
                    </button>
                </div>
            </div>
        </form>

        <form action="" method="post" enctype="multipart/form-data">
            <!--Угловые-->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div style="text-align: center;" class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <button style="width: 100%;" class="btn btn-success" type="submit" name="kut1">
                        Кутовий+
                    </button>
                </div>
                <div style="text-align: center;" class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <input type="text" name="ugol" class="input-lg" style="width: 100%;">
                </div>
                <div style="text-align: center;" class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <button style="width: 100%;" class="btn btn-success" type="submit" name="kut2">
                        Кутовий+
                    </button>
                </div>
            </div>
        </form>

        <form action="" method="post" enctype="multipart/form-data">
            <!--Желтые карточки-->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div style="text-align: center;" class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <button style="width: 100%;" class="btn btn-warning" type="submit" name="yc1">
                        Жовта+
                    </button>
                </div>
                <div style="text-align: center;" class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <input type="text" name="yc" class="input-lg" style="width: 100%;">
                </div>
                <div style="text-align: center;" class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <button style="width: 100%;" class="btn btn-warning" type="submit" name="yc2">
                        Жовта+
                    </button>
                </div>
            </div>
        </form>
        <!--красные карточки-->
        <form action="" method="post" enctype="multipart/form-data">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div style="text-align: center;" class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <button style="width: 100%;" class="btn btn-danger" type="submit" name="rc1">
                        Червона+
                    </button>
                </div>
                <div style="text-align: center;" class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <input type="text" name="rc" class="input-lg" style="width: 100%;">
                </div>
                <div style="text-align: center;" class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <button style="width: 100%;" class="btn btn-danger" type="submit" name="rc2">
                        Червона+
                    </button>
                </div>
            </div>
        </form>

        <form action="" method="post" enctype="multipart/form-data">
            <div style="margin-top: 35px;" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div style="text-align: center;" class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    <input type="text" name="msg" class="input-lg" style="width: 100%;">
                </div>
                <div style="text-align: center;" class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <button style="width: 100%;" class="btn btn-succes" type="submit" name="msg_btn">
                        Додати повідомлення
                    </button>
                </div>
            </div>
        </form>
        <form action="" method="post" enctype="multipart/form-data">
            <div style="margin-top: 35px;" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div style="text-align: center;" class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    <input type="text" name="img" class="input-lg" style="width: 100%;">
                </div>
                <div style="text-align: center;" class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <button style="width: 100%;" class="btn btn-succes" type="submit" name="img_btn">
                        Додати картинку
                    </button>
                </div>
            </div>
        </form>

        <?php
    }

else {
?>



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
    $result = mysql_query("SELECT COUNT(*) FROM onlinelist");
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
    $result = mysql_query("SELECT * FROM onlinelist ORDER BY id LIMIT $start, $num");
    // В цикле переносим результаты запроса в массив $postrow
    while ( $postrow[] = mysql_fetch_array($result))
    ?>

    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">

        <?php
        $isFirst = 0;
        for($i = 0; $i < $num; $i++) {
            $isFirst += 1;
            if (!isset($postrow[$i]['id'])) break;

            if ($isFirst > 0) {
                ?>
                <div style="margin-top: 10px; text-align: center" class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <h3>
                                <a href="online.php?id=<?php echo $postrow[$i]['id'];; ?>">
                                    <?php echo 'Матч: '.$postrow[$i]['team1'].' - '.$postrow[$i]['team2'].' ('.$postrow[$i]["misce"].')'; ?>
                                </a>
                            </h3>
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
</div>




<?php
//endElse
}
?>




</body>

</html>



<script type="text/javascript">
    /*<![CDATA[*/
    function myfunc(){
        document.getElementById("heretext").innerHTML="Ну и зачем ты это сделал?!";
    }
    /*]]>*/
</script>
<input type="button" value="Нажми меня" onclick="myfunc()" />
<div id="heretext"></div>