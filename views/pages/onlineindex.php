<!-- ==================start content body section=============== -->




<section id="contentSection">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <h1 align="center">Прямі трансляції подій</h1>
            </br>
            <p align="center">
                <iframe align="center" width="640" height="360" src="http://www.ustream.tv/embed/21787782?html5ui" allowfullscreen webkitallowfullscreen scrolling="no" frameborder="0" style="border: 0 none transparent;"></iframe>
            </p>
            <p>
              <span style="font-size: 18px">
                  <b>Розклад відеотрансляцій</b>
                  <br>
                  20/02/2016 Вища ліга міста з футзалу 
				  <br>
                  14:00 Енергетик - ДФС
				  <br>
				  <br>
                  20/02/2016 Перша ліга міста з футзалу 
				  <br>
                  17:20 Едельвейс - Володимир
				  
              </span>
            </p>
            </br></br>
            <h2 align="center">Текстові трансляції</h2>
            </br>

            <div align="center" class="col-lg-12">
            <?php
            foreach ($onlinelist as $item):
            {
            ?>

            <a href="<?php echo 'http://vinsport.info/index.php?view=online&id='.$item['id'];?>">
            <div align="center" class="col-lg-6 col-md-6  col-xs-12 col-sm-6" style="background-color: whitesmoke; margin-top: 5px; border: groove">
                <div style="text-align: center" class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                    <b>
                        <?php
                        switch ($item['stat'])
                        {
                            case (0):
                                echo 'Гра не почалась';
                                break;
                            case (1):
                                echo 'Перший тайм';
                                break;
                            case (2):
                                echo 'Перерва';
                                break;
                            case (3):
                                echo 'Другий тайм';
                                break;
                            case (4):
                                echo 'Гра закінчилась';
                                break;
                        }

                        ?>
                    </b>
                </div>
                <div align="center" class="col-lg-4 col-lg-offset-1 col-sm-6 col-xs-6 col-md-4 col-md-offset-1">
                    <img style="height: 100px; max-width: 100px;" src="<?php echo $item['logo1'];?>">
                </div>
                <div align="center" class="col-lg-4 col-lg-offset-2 col-sm-6 col-xs-6 col-md-4 col-md-offset-2">
                    <img style="max-width: 100px;" height="100px" src="<?php echo $item['logo2'];?>">
                </div>
                <div align="center" class="col-lg-4 col-lg-offset-1 col-sm-6 col-xs-6 col-md-4 col-md-offset-1">
                    <span style=" text-align: center;"><?php echo $item['team1'];?></span>
                </div>
                <div align="center" class="col-lg-4 col-lg-offset-2 col-sm-6 col-xs-6 col-md-4 col-md-offset-2">
                    <span style=" text-align: center;"><?php echo $item['team2'];?></span>
                </div>
                <div style="text-align: center; background-color: #adadad;" class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                    <?php echo $item['misce'];?>
                </div>
            </div>
            </a>

            <?php
            }
            endforeach;
            ?>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4">
            <aside class="right_content">
                <?php include ("reklama.php");?>
            </aside>
        </div>
    </div>
</section>
<!-- ==================End content body section=============== -->