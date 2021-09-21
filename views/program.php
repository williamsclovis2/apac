<div class="service_area" style="padding-bottom: 10px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title mb-30">
                    <h3>Program</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="prog_tabs_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row" id="myProgram">
                        <?php
                            $getDays  = DB::getInstance()->get('future_event', array('id', '=', $activeEventId));
                            $days = 0;
                            $current  = strtotime(dateFormat($getDays->first()->start_date));
                            $end_date = strtotime(dateFormat($getDays->first()->end_date));
                            $stepVal  = '+1 day';
                            while($current <= $end_date) {
                                $days++;
                                $current = strtotime($stepVal, $current);
                            }
                            if ($days == 2) {
                                $col  = 6;
                            } elseif ($days == 3) {
                                $col  = 4;
                            } elseif ($days == 4) {
                                $col  = 3;
                            } else {
                                $col  = 2;
                            }

                            $i = 0;
                            $format   = 'd-m-Y';
                            $current  = strtotime(dateFormat($getDays->first()->start_date));
                            $end_date = strtotime(dateFormat($getDays->first()->end_date));
                            $stepVal  = '+1 day';
                            while($current <= $end_date) {
                                $i++;
                                $date    = date($format, $current);
                                $day     = date('l', strtotime($date));
                                $dayDate = date("j F Y", strtotime($date));
                                $current = strtotime($stepVal, $current);
                        ?>
                        <div class="col-md-<?=$col?> col-xs-6 div-program-mc div-program-mc-border-left <?php echo ($i == "1" ? "active-pg" : "")?>" onclick="openCity(event, <?=$i?>)" id="defaultOpen">
                            <div class="pog-day">
                                <h4><?=$day?></h4>
                                <p><?=$dayDate?></p>
                            </div>
                        </div>
                        <?php } ?>
                    </div>

                    <script type="text/javascript">
                        var header = document.getElementById("myProgram");
                        var btns = header.getElementsByClassName("div-program-mc");
                        for (var i = 0; i < btns.length; i++) {
                          btns[i].addEventListener("click", function() {
                            var current = document.getElementsByClassName("active-pg");
                            current[0].className = current[0].className.replace(" active-pg", "");
                            this.className += " active-pg";
                          });
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>

    <div class="service_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="agenda-content">
                        <?php
                            $i = 0;
                            $current  = strtotime(dateFormat($getDays->first()->start_date));
                            $end_date = strtotime(dateFormat($getDays->first()->end_date));
                            $stepVal  = '+1 day';
                            $format   = 'd-m-Y';
                            while($current <= $end_date) {
                                $i++;
                                $date    = date($format, $current);
                                $dayDate = date("j F Y", strtotime($date));
                                $current = strtotime($stepVal, $current);
                        ?>
                        <div id="<?=$i?>" class="daycontent program-<?=$i?>">
                            <?php
                            $day = "Day".$i;
                            $getVenue  = DB::getInstance()->get('future_homepage_about', array('event_id', '=', $activeEventId));
                            $city      = $getVenue->first()->inperson_city;
                            $country   = countryCodeToCountry($getVenue->first()->inperson_country);
                            $continent = country_to_continent($getVenue->first()->inperson_country);
                            $timezone  = $continent."/".$city;
                            // $getSessions = DB::getInstance()->query("SELECT * FROM `future_homepage_program` WHERE `event_id` = '$activeEventId' AND `day` = '$day' ORDER BY DATE(start_time) ASC");
                            $getSessions = DB::getInstance()->query("SELECT * FROM `future_homepage_program` WHERE `event_id` = '$activeEventId' AND `day` = 'Day1' ORDER BY DATE(start_time) ASC");
                            if (!$getSessions->count()) {
                                    Danger("No session recorded");
                            } else {
                                foreach($getSessions->results() as $resSession) {
                                    $session_id = $resSession->id;
                                    $description = htmlspecialchars_decode(stripslashes($resSession->description));
                            ?>
                            <div class="prog-border row">
                                <div class="col-md-2 prog-time">
                                    <h4><?php echo date('g:ia', strtotime($resSession->start_time));?></h4>
                                    <p>(<?=$city?>)</p>
                                    <h5><?php echo date('g:ia', strtotime(utc_time($resSession->start_time, $timezone)));?></h5>
                                    <p style="color: #5b2711;">(GMT)</p>
                                </div>
                                <div class="col-md-10 prog-title">
                                    <div class="prog-details">
                                        <div title="Add to Calendar" class="addeventatc">
                                            Add to my Calendar
                                            <span class="start"><?php echo $dayDate." ".$resSession->start_time;?></span>
                                            <span class="end"><?php echo $dayDate." ".$resSession->end_time;?></span>
                                            <span class="timezone"><?php echo $timezone;?></span>
                                            <span class="title"><?php echo $resSession->session_name;?></span>
                                            <span class="location"><?php echo $city.", ".$country;?></span>
                                        </div>
                                        <h4><?php echo $resSession->session_name;?></h4>
                                        <h5><?php echo $resSession->session_type;?></h5>
                                        <p>
                                            <?php
                                                if(strlen($description) > 180) {
                                                    echo html_cut($description, 180)."... <strong><a href='#' data-toggle='modal' data-target='#sessionModal$session_id'>More info<small><span class='fa fa-plus'></small></a></strong>";
                                                } else {
                                                    echo $description;
                                                }
                                            ?>
                                        </p>
                                        <p style="margin-top: 10px; color: #7A838B;">
                                            <?php
                                            $videoLink = $resSession->video;
                                            if(!empty($resSession->room) AND !empty($resSession->video)) {
                                                echo "<strong>In-person</strong>: ".$resSession->room."<br>";
                                                echo "<strong>Virtual</strong>: <a href='$videoLink' target='_blank'>Click here to attend virtually</a>";
                                            } elseif (!empty($resSession->room)) {
                                                echo "<strong>In-person</strong>: ".$resSession->room;
                                            } elseif (!empty($resSession->video)) {
                                                echo "<strong>Virtual</strong>: <a href='$videoLink' target='_blank'>Click here to attend virtually</a>";
                                            }
                                            ?>
                                        </p>
                                        <div class="modal fade" id="sessionModal<?=$session_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" style="color: #5a280f;"><?php echo $resSession->session_name;?><br>
                                                            <small><?php echo date('g:ia', strtotime($resSession->start_time));?></small>
                                                        </h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h5><?php echo $resSession->session_type;?></h5>
                                                        <p><?php echo $description;?></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn py-1 btn-white" data-dismiss="modal" style="font-size: 12px;"><i class="fa fa-times-circle"></i> Close</button>
                                                        <div title="Add to Calendar" class="addeventatc">
                                                            Add to my Calendar
                                                            <span class="start"><?php echo $dayDate." ".$resSession->start_time;?></span>
                                                            <span class="end"><?php echo $dayDate." ".$resSession->end_time;?></span>
                                                            <span class="timezone"><?php echo $timezone;?></span>
                                                            <span class="title"><?php echo $resSession->session_name;?></span>
                                                            <span class="location"><?php echo $city.", ".$country;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } } ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <script>
                    function openCity(evt, cityName) {
                        var i, tabcontent, tablinks;
                        tabcontent = document.getElementsByClassName("daycontent");
                        for (i = 0; i < tabcontent.length; i++) {
                            tabcontent[i].style.display = "none";
                        }
                        tablinks = document.getElementsByClassName("tablinks");
                        for (i = 0; i < tablinks.length; i++) {
                            tablinks[i].className = tablinks[i].className.replace(" active-day", "");
                        }
                        document.getElementById(cityName).style.display = "block";
                        evt.currentTarget.className += " active-day";
                    }

                    document.getElementById("defaultOpen").click();
                </script>
            </div>
        </div>
    </div>