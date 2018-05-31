<!-- ==================start content body section=============== -->




<section id="contentSection">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="left_content">
                <!-- start contact area -->



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
                LOSHARAAAAAAAAAAAAAAAAAAAAAAAAAA


                <div class="contact_area">
                    <h2>Наші контакти</h2>
                    <ul>
                        <li>
							<b>Реклама на ресурсі:</b> <br>
							reklama@vinsport.info 
						</li>
                        <li>
							<b>Спіпраця щодо висвітлення новин:</b> 
							<br>
							+38 (093) 250-31-36
							<br>
							<a href="http://vk.com/vinsportinf">http://vk.com/vinsportinf</a>
						</li>
						<li>
							<b>Офіційні акаунти</b> 
							<br>
							<a href="https://vk.com/vinsportinfo">Вконтакте</a>
							<br>
							<a href="https://www.youtube.com/channel/UCM6WsDxV8GHT0nBdPiel-PQ">YouTube</a>
							<br>
							<a href="https://www.facebook.com/%D0%92%D1%96%D0%BD%D0%BD%D0%B8%D1%86%D1%8C%D0%BA%D0%B8%D0%B9-%D1%81%D0%BF%D0%BE%D1%80%D1%82-182349455447433/">Facebook</a>
						</li>
                    </ul>
                </div>
                <!-- End contact area -->
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