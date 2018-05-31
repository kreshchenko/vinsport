<?php require_once("db_fnc.php");?>
<html>
<head>
    <title>Ajax</title>
    <script type="application/javascript" src="jQuery/jquery-1.6.1.min.js"></script>
    <script type="application/javascript" src="valid.js"></script>
</head>

<body>

<div class="col-lg-3 col-md-3 col-xs-12 col-sm-6">
    <table></table>
</div>


<form action="" id="form">
    <div id="container">
        <div>
            <label>Оберіть дату</label><br>
            <select id="datedropdown">
                <option>Оберіть дату</option>

                <?php
                    $data_list= get_data_list();
                    foreach ($data_list as $item): {
                        echo '<option value="'.$item['id'].'">'.$item['date'].'</option>';
                    }
                    endforeach;


                ?>
            </select>
        </div>
        <div id="data">
        </div
    </div>
</form>


</body>

</html>