<div class="row">

                    <div class="col-md-6 col-xs-12">

                        <div class="widget stacked">

                            <div class="widget-header">
                                <i class="icon-star"></i>
                                <h3>Погода в ближайшие дни</h3>
                            </div> <!-- /widget-header -->

                            <div class="widget-content">
                                <?php

                                function get_weather($city, $col = 10, $day_of_the_week_array = array(1 => 'пн', 2 => 'вт', 3 => 'ср', 4 => 'чт', 5 => 'пт', 6 => 'сб', 7 => 'вс'), $time_of_day = array(0 => 'утро', 1 => 'день', 2 => 'вечер', 3 => 'ночь')) {
                                    $data_file = 'http://export.yandex.ru/weather-ng/forecasts/' . $city . '.xml';
                                    $xml = simplexml_load_file($data_file); // загружаем xml файл через simple_xml
                                    $out = array(); // Массив вывода прогноза
                                    $counter = 0; // Счетчик количества дней, для которых доступен прогноз
                                    foreach ($xml->day as $day) {
                                        if ($counter == $col) {
                                            break;
                                        }
                                        $get_date = explode("-", $day['date']);
                                        $day_of_week = date("N", mktime(0, 0, 0, $get_date[1], $get_date[2], $get_date[0]));
                                        $out[$counter]['day'] = $get_date[2];
                                        $out[$counter]['month'] = $get_date[1];
                                        $out[$counter]['year'] = $get_date[0];
                                        $out[$counter]['day_of_week'] = $day_of_the_week_array[$day_of_week];
                                        for ($i = 0; $i <= 3; $i++) {

                                            if ($day->day_part[$i]->temperature == '') {
                                                $get_temp_from = $day->day_part[$i]->temperature_from;
                                                $get_temp_to = $day->day_part[$i]->temperature_to;
                                            } else {
                                                $get_temp_from = (integer) $get_temp - 1;
                                                $get_temp_to = (integer) $get_temp + 1;
                                            }
                                            if ($get_temp_from > 0) {
                                                $get_temp_from = '+' . $get_temp_from;
                                            }
                                            if ($get_temp_to > 0) {
                                                $get_temp_to = '+' . $get_temp_to;
                                            }
                                            $out[$counter]['weather'][$i]['temp_from'] = $get_temp_from;
                                            $out[$counter]['weather'][$i]['temp_to'] = $get_temp_to;
                                            $out[$counter]['weather'][$i]['image'] = $day->day_part[$i]->{'image-v3'};
                                            $out[$counter]['weather'][$i]['time_of_day'] = $time_of_day[$i];
                                        } $counter++;
                                    }
                                    return $out;
                                }

                                $w_city_id = 27612;
                                $col = 10;
                                $day_of_the_week_array = array(1 => 'Пн.', 2 => 'Вт.', 3 => 'Ср.', 4 => 'Чт.', 5 => 'Пт.', 6 => 'Сб.', 7 => 'Вс.');
                                $time_of_day = array(0 => 'утро', 1 => 'день', 2 => 'вечер', 3 => 'ночь');
                                $out = get_weather($w_city_id, $col, $day_of_the_week_array, $time_of_day);
                                ?>

                                <div class="shortcuts">
                                    <?php
                                    foreach ($out as $key => $value) {

                                        $day_title = 'Есть свободное время<br />Записаться!';
                                        $day_link = '?page=calendar&day='.$value['day'].'&month='.$value['month'];

                                        $p_class = ($value['day_of_week'] == 'Сб.' || $value['day_of_week'] == 'Вс.') ? 'red' : '';
                                        echo '<a href="'.$day_link.'" class="shortcut tooltiped" title="'.$day_title.'"><span class="shortcut-label" title="title">';
                                        echo '<p>' . $value['day'] . '.' . $value['month'] . '</p>';
                                        echo '<img src="http://yandex.st/weather/1.1.78/i/icons/48x48/' . $value['weather'][1]['image'] . '.png" width="24" height="24" />';
                                        echo '<p>';
                                        $i = 1;
                                        foreach ($value['weather'] as $key1 => $value1) {
                                            if ($i == 1 || $i == 3) {
                                                echo '<small>' . $value1['temp_from'] . '..' . $value1['temp_to'] . '</small>';
                                            }
                                            $i++;
                                        }
                                        echo '</span></p>';
                                        echo '</a>';
                                    }
                                    ?>                                        
                                </div>

                            </div> <!-- /widget-content -->

                        </div> <!-- /widget -->	


                        <div class="widget widget-nopad stacked">

                            <div class="widget-header">
                                <i class="icon-list-alt"></i>
                                <h3>Последние новости ассоциации</h3>
                            </div> <!-- /widget-header -->

                            <div class="widget-content">

                                <ul class="news-items">
                                    <li>
                                        <div class="news-item-detail">										
                                            <a href="javascript:;" class="news-item-title">Добавлен новый пункт шиномонтажа</a>
                                            <p class="news-item-preview">В ассоциацию шиномонтажей Зеленограда вступил новый член. Пункт шиномонтажа расположен по адресу г. Зеленоград ул. Заводская 10. Режим работы: круглосуточно. </p>
                                        </div>

                                        <div class="news-item-date">
                                            <span class="news-item-day">31</span>
                                            <span class="news-item-month">Октября</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="news-item-detail">										
                                            <a href="javascript:;" class="news-item-title">Добавлен новый пункт шиномонтажа</a>
                                            <p class="news-item-preview">В ассоциацию шиномонтажей Зеленограда вступил новый член. Пункт шиномонтажа расположен по адресу г. Зеленоград ул. Заводская 10. Режим работы: круглосуточно. </p>
                                        </div>

                                        <div class="news-item-date">
                                            <span class="news-item-day">31</span>
                                            <span class="news-item-month">Октября</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="news-item-detail">										
                                            <a href="javascript:;" class="news-item-title">Добавлен новый пункт шиномонтажа</a>
                                            <p class="news-item-preview">В ассоциацию шиномонтажей Зеленограда вступил новый член. Пункт шиномонтажа расположен по адресу г. Зеленоград ул. Заводская 10. Режим работы: круглосуточно. </p>
                                        </div>

                                        <div class="news-item-date">
                                            <span class="news-item-day">31</span>
                                            <span class="news-item-month">Октября</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="news-item-detail">										
                                            <a href="javascript:;" class="news-item-title">Добавлен новый пункт шиномонтажа</a>
                                            <p class="news-item-preview">В ассоциацию шиномонтажей Зеленограда вступил новый член. Пункт шиномонтажа расположен по адресу г. Зеленоград ул. Заводская 10. Режим работы: круглосуточно. </p>
                                        </div>

                                        <div class="news-item-date">
                                            <span class="news-item-day">31</span>
                                            <span class="news-item-month">Октября</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="news-item-detail">										
                                            <a href="javascript:;" class="news-item-title">Добавлен новый пункт шиномонтажа</a>
                                            <p class="news-item-preview">В ассоциацию шиномонтажей Зеленограда вступил новый член. Пункт шиномонтажа расположен по адресу г. Зеленоград ул. Заводская 10. Режим работы: круглосуточно. </p>
                                        </div>

                                        <div class="news-item-date">
                                            <span class="news-item-day">31</span>
                                            <span class="news-item-month">Окт</span>
                                        </div>
                                    </li>
                                </ul>

                            </div> <!-- /widget-content -->

                        </div> <!-- /widget -->	


                        <div class="widget stacked">

                            <div class="widget-header">
                                <i class="icon-file"></i>
                                <h3>Content</h3>
                            </div> <!-- /widget-header -->

                            <div class="widget-content">

                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>


                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>					

                            </div> <!-- /widget-content -->

                        </div> <!-- /widget -->

                    </div> <!-- /span6 -->


                    <div class="col-md-6">	


                        <div class="widget stacked">

                            <div class="widget-header">
                                <i class="icon-bookmark"></i>
                                <h3>Навигация</h3>
                            </div> <!-- /widget-header -->

                            <div class="widget-content">

                                <div class="shortcuts">
                                    <a href="javascript:;" class="shortcut">
                                        <i class="shortcut-icon icon-list-alt"></i>
                                        <span class="shortcut-label">Записаться</span>
                                    </a>

                                    <a href="javascript:;" class="shortcut">
                                        <i class="shortcut-icon icon-bookmark"></i>
                                        <span class="shortcut-label">Услуги</span>								
                                    </a>

                                    <a href="javascript:;" class="shortcut">
                                        <i class="shortcut-icon icon-signal"></i>
                                        <span class="shortcut-label">Ассоциация</span>	
                                    </a>

                                    <a href="javascript:;" class="shortcut">
                                        <i class="shortcut-icon icon-comment"></i>
                                        <span class="shortcut-label">Вступить в ассоциацию</span>								
                                    </a>

                                    <a href="javascript:;" class="shortcut">
                                        <i class="shortcut-icon icon-user"></i>
                                        <span class="shortcut-label">Материалы</span>
                                    </a>

                                    <a href="javascript:;" class="shortcut">
                                        <i class="shortcut-icon icon-file"></i>
                                        <span class="shortcut-label">Личный кабинет</span>	
                                    </a>

                                    <a href="javascript:;" class="shortcut">
                                        <i class="shortcut-icon icon-picture"></i>
                                        <span class="shortcut-label">Контакты</span>	
                                    </a>

                                    <a href="javascript:;" class="shortcut">
                                        <i class="shortcut-icon icon-tag"></i>
                                        <span class="shortcut-label">Онлайн консультация</span>
                                    </a>				
                                </div> <!-- /shortcuts -->	

                            </div> <!-- /widget-content -->

                        </div> <!-- /widget -->




                        <div class="widget stacked">

                            <div class="widget-header">
                                <i class="icon-signal"></i>
                                <h3>Расположение пунктов шиномонтажа на карте</h3>
                            </div> 

                            <div class="widget-content">					
                                <script type="text/javascript" charset="utf-8" src="//api-maps.yandex.ru/services/constructor/1.0/js/?sid=6otDhBWoPC_1B9BIS83N5L-mwWVNjaqF&width=530&height=340"></script>					
                            </div> <!-- /widget-content -->

                        </div> <!-- /widget -->




                        <div class="widget stacked widget-table action-table">

                                                     <div class="widget-header">
                                                         <i class="icon-th-list"></i>
                                                     <h3>Базовая стоимость услуг</h3>
                                                 </div> <!-- /widget-header -->

                                                 <div class="widget-content">

                                                 <table class="table table-striped table-bordered">
                                                     <thead>
                                                         <tr>
                                                             <th>Услуга</th>
                                                             <th>Описание</th>
                                                             <th class="td-actions">Стоимость</th>
                                                         </tr>
                                                     </thead>
                                                     <tbody>
                                                         <tr>
                                                             <td>Переобувка 17</td>
                                                             <td>Замена колес, балансировка, бортирование 17 радиуса</td>
                                                             <td class="td-actions">
                                                                 1700р.
                                                             </td>
                                                         </tr>
                                                     </tbody>
                                                 </table>

                                             </div> <!-- /widget-content -->

                        </div> <!-- /widget -->

                    </div> <!-- /span6 -->

                </div>