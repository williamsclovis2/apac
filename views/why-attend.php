<div class="service_area why_attend_area">
	<div class="container">
		<div class="row">
            <div class="col-lg-12">
            	<div class="section_title mb-30">
                    <h3>Why Attend</h3>
                </div>
                <div class="row align-items-stretch why_attend">
                	<?php
				        $getContent = DB::getInstance()->get('future_homepage_whyattend', array('event_id', '=', $activeEventId));
			            $reason_1   = $getContent->first()->reason_1;
			            $reason_2   = $getContent->first()->reason_2;
			            $reason_3   = $getContent->first()->reason_3;
			            $reason_4   = $getContent->first()->reason_4;
			            $reason_5   = $getContent->first()->reason_5;
			            $reason_6   = $getContent->first()->reason_6;
				    ?>
                	<div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">
                        <div class="unit-4 d-flex">
                          	<div class="unit-4-icon mr-4"><span class="fa fa-check"></span></div>
                          	<div><p><?=$reason_1?></p></div>
                        </div>
                    </div>
                    <?php if (!empty($reason_2)) {?>
                    <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">
                        <div class="unit-4 d-flex">
                          	<div class="unit-4-icon mr-4"><span class="fa fa-check"></span></div>
                          	<div><p><?=$reason_2?></p></div>
                        </div>
                    </div>
                	<?php }?>
                	<?php if (!empty($reason_3)) {?>
                    <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">
                        <div class="unit-4 d-flex">
                          	<div class="unit-4-icon mr-4"><span class="fa fa-check"></span></div>
                          	<div><p><?=$reason_3?></p></div>
                        </div>
                    </div>
                	<?php }?>
                	<?php if (!empty($reason_4)) {?>
                    <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">
                        <div class="unit-4 d-flex">
                          	<div class="unit-4-icon mr-4"><span class="fa fa-check"></span></div>
                          	<div><p><?=$reason_4?></p></div>
                        </div>
                    </div>
                	<?php }?>
                	<?php if (!empty($reason_5)) {?>
                    <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">
                        <div class="unit-4 d-flex">
                          	<div class="unit-4-icon mr-4"><span class="fa fa-check"></span></div>
                          	<div><p><?=$reason_5?></p></div>
                        </div>
                    </div>
                	<?php }?>
                	<?php if (!empty($reason_6)) {?>
                    <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">
                        <div class="unit-4 d-flex">
                          	<div class="unit-4-icon mr-4"><span class="fa fa-check"></span></div>
                          	<div><p><?=$reason_6?></p></div>
                        </div>
                    </div>
                	<?php }?>
                </div>
            </div>
        </div>
	</div>
</div>