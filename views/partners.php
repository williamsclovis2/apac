<div class="service_area partner_area bg-gray" id="program">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title">
                    <h3><?=$_Dictionary->translate('Partners/ Sponsors')?></h3> 
                </div>

                <div id="partners" class="owl-carousel owl-theme">
                    <?php
                        $controller->get('future_homepage_partners', '*', NULL, "`event_id` = '$activeEventId'", 'p_order ASC');
                        $i = 1;
                        if (!$controller->count()) {
                            Danger($_Dictionary->translate("No partners yet"));
                        } else {
                            foreach($controller->data() as $resPartner) {
                                $i++;
                                $imageUrl = "img/partners/".$resPartner->logo;
                    ?>
                    <div class="client-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".<?=$i?>s" style="padding: 0 10px;">
                        <img src="<?php linkto($imageUrl); ?>" alt="<?=$resSpeaker->job_title?>" class="img img-responsive">
                    </div>
                    <?php } } ?>
                </div>
            </div>
        </div>
    </div>
</div>