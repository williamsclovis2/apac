<div class="service_area speakers_area" id="speakers_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title">
                    <h3>Featured Speakers</h3> 
                </div>
                <hr>
                <div id="speakers" class="owl-carousel owl-theme">
                    <?php
                        $controller->get('future_homepage_speakers', '*', NULL, "`event_id` = '$activeEventId'");
                        if (!$controller->count()) {
                            Danger("No speakers yet");
                        } else {
                            foreach($controller->data() as $resSpeaker) {
                                $imageUrl = "img/speakers/".$resSpeaker->picture;
                    ?>
                    <div class="client-item speakers">
                        <img src="<?php linkto($imageUrl); ?>" class="img-fluid" alt="speakers">
                        <h4><?=$resSpeaker->name?></h4>
                        <p><?=$resSpeaker->job_title?></p>
                    </div>
                    <?php }}?>
                </div>
                <div class="text-center">
                    <a href="speakers" class="btn btn-primary px-5 py-1 mt-2 wow fadeInRight" data-wow-duration="1s" data-wow-delay=".4s">See more speakers</a>
                </div>
            </div>
        </div>
    </div>
</div>