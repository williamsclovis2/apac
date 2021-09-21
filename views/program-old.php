<div class="service_area">
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
                        <div class="col-md-3 col-xs-6 div-program-mc div-program-mc-border-left active-pg" onclick="openCity(event, 'one')" id="defaultOpen">
                            <div class="pog-day">
                                <h4>Tuesday</h4>
                                <p>1 June 2021</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-6 div-program-mc div-program-mc-border" onclick="openCity(event, 'two')" id="defaultOpen">
                            <div class="pog-day">
                                <h4>Wednesday</h4>
                                <p>2 June 2021</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-6 div-program-mc" onclick="openCity(event, 'three')" id="defaultOpen">
                            <div class="pog-day">
                                <h4>Thursday</h4>
                                <p>3 June 2021</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-6 div-program-mc div-program-mc-border" onclick="openCity(event, 'four')" id="defaultOpen">
                            <div class="pog-day">
                                <h4>Friday</h4>
                                <p>4 June 2021</p>
                            </div>
                        </div>
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
                        <div id="one" class="daycontent program-one">
                            <div class="prog-border row">
                                <div class="col-md-2 prog-time">
                                    <h4>11:00am CAT</h4>
                                    <p>(Central Afican Time)</p>
                                    <span>5:00am <strong>Washington DC</strong></span>
                                    <span>10:00am <strong>London</strong></span>
                                    <span>12:pm <strong>Nairobi</strong></span>
                                    <span>1:00pm <strong>Dubai</strong></span>
                                    <span>5:00pm <strong>Hong Kong</strong></span>
                                </div>
                                <div class="col-md-10 prog-title">
                                    <div class="prog-details">
                                        <h4>Highlights of the Day</h4>
                                        <p>Each morning get the highlights of the upcoming day, understand the themes under discussion, and find out all the interesting places to interact with thought leaders.</p>

                                        <a href="#" class="btn btn-primary px-2 py-1 text-white pull-right"><i class="fa fa-calendar"></i> Add to my calendar</a>
                                        <div class="more_info">
                                            <a href="#" data-toggle="modal" data-target="#exampleModal">More info</a>
                                        </div>
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                                    <h5>Conversation Leaders</h5>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi at consequatur unde molestiae quidem provident voluptatum deleniti quo iste error eos est praesentium distinctio cupiditate tempore suscipit inventore deserunt tenetur.</p>
                                                    <h5>Special Interventions</h5>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi at consequatur unde molestiae quidem provident voluptatum deleniti quo </p>
                                                    <h5>Moderated by</h5>
                                                    <p>Lorem ipsum dolor</p>
                                              </div>
                                              <div class="modal-footer">
                                               <a href="#" class="btn btn-primary px-2 py-1 text-white pull-right"><i class="fa fa-calendar"></i> Add to my calendar</a>
                                              </div>
                                            </div>
                                          </div>
                                        </div>

                                        <!-- <div id="accordion">
                                            <div class="card">
                                                <div class="card">
                                                    <div class="card-header" id="headingDay1A">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseDay1A" aria-expanded="false" aria-controls="collapseDay1A">More info</button>
                                                            <a href="#" class="btn btn-primary px-2 py-1 text-white pull-right"><i class="fa fa-calendar"></i> Add to my calendar</a>
                                                        </h5>
                                                    </div>
                                                    <div id="collapseDay1A" class="collapse" aria-labelledby="headingDay1A" data-parent="#accordion" style="">
                                                        <div class="card-body">
                                                            <h5>Conversation Leaders</h5>
                                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi at consequatur unde molestiae quidem provident voluptatum deleniti quo iste error eos est praesentium distinctio cupiditate tempore suscipit inventore deserunt tenetur.</p>
                                                            <h5>Special Interventions</h5>
                                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi at consequatur unde molestiae quidem provident voluptatum deleniti quo </p>
                                                            <h5>Moderated by</h5>
                                                            <p>Lorem ipsum dolor</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                    <hr class="prog-hr"/>
                                    <div class="prog-details">
                                        <h4>Culture Track</h4>
                                        <p>The culture track is an educational and exciting moment for participants featuring daily exercise, healthy recipes, music, art, design, literature and more!</p>
                                    </div>
                                </div>
                            </div>

                            <div class="prog-border row">
                                <div class="col-md-2 prog-time">
                                    <h4>12:00pm CAT</h4>
                                    <p>(Central Afican Time)</p>
                                    <span>5:00am <strong>Washington DC</strong></span>
                                    <span>10:00am <strong>London</strong></span>
                                    <span>12:pm <strong>Nairobi</strong></span>
                                    <span>1:00pm <strong>Dubai</strong></span>
                                    <span>5:00pm <strong>Hong Kong</strong></span>
                                </div>
                                <div class="col-md-10 prog-title">
                                    <div class="prog-details">
                                        <h4>Agri-Business & Deal Room</h4>
                                        <h5>Developing a Pipeline for AgriBusiness Deals in Africa</h5>
                                        <p>The AgriBusiness Deal Room will hold a Symposia session on Developing a Pipeline for AgriBusiness Deals in Africa to explore ways to expand the pool of investment ready Agribusiness companies, particularly SME’s, in Sub-Saharan Africa.</p>
                                        <div id="accordion">
                                            <div class="card">
                                                <div class="card">
                                                    <div class="card-header" id="headingDay1B">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseDay1B" aria-expanded="false" aria-controls="collapseDay1B">More info</button>
                                                            <a href="#" class="btn btn-primary px-2 py-1 text-white pull-right"><i class="fa fa-calendar"></i> Add to my calendar</a>
                                                        </h5>
                                                    </div>
                                                    <div id="collapseDay1B" class="collapse" aria-labelledby="headingDay1B" data-parent="#accordion" style="">
                                                        <div class="card-body">
                                                            <h5>Conversation Leaders</h5>
                                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi at consequatur unde molestiae quidem provident voluptatum deleniti quo iste error eos est praesentium distinctio cupiditate tempore suscipit inventore deserunt tenetur.</p>
                                                            <h5>Special Interventions</h5>
                                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi at consequatur unde molestiae quidem provident voluptatum deleniti quo </p>
                                                            <h5>Moderated by</h5>
                                                            <p>Lorem ipsum dolor</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="prog-hr"/>
                                    <div class="prog-details">
                                        <h4>Regional Trade</h4>
                                        <h5>Jumpstarting the African trade agreement from an agricultural perspective</h5>
                                        <p>The session will address policy, regulatory and capacity gaps for jumpstarting food trade under the AfCFTA.  AfCFTA will be a mechanism for building long-term continental resilience and volatility management through increased intra-African food trade.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="prog-border row">
                                <div class="col-md-2 prog-time">
                                    <h4>1:00pm CAT</h4>
                                    <p>(Central Afican Time)</p>
                                    <span>5:00am <strong>Washington DC</strong></span>
                                    <span>10:00am <strong>London</strong></span>
                                    <span>12:pm <strong>Nairobi</strong></span>
                                    <span>1:00pm <strong>Dubai</strong></span>
                                    <span>5:00pm <strong>Hong Kong</strong></span>
                                </div>
                                <hr class="prog-hr"/>
                                <div class="col-md-10 prog-title">
                                    <div class="prog-details">
                                        <h4>Virtual Outings</h4>
                                        <p>A daily virtual farm tour will offer participants the opportunity to explore and discover real farms in AGRA’s target countries; and get practical advice on improving farming practices to sustainable increase yields.</p>
                                    </div>
                                    <hr class="prog-hr"/>
                                    <div class="prog-details">
                                        <h4>Culture Track</h4>
                                        <p>The culture track is an educational and exciting moment for participants to breathe outside the main sessions. Three culture sessions will run per day featuring daily exercise, healthy recipes, music, art, design, and literature and more!</p>
                                        <div id="accordion">
                                            <div class="card">
                                                <div class="card">
                                                    <div class="card-header" id="headingDay1C">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseDay1C" aria-expanded="false" aria-controls="collapseDay1C">More info</button>
                                                            <a href="#" class="btn btn-primary px-2 py-1 text-white pull-right"><i class="fa fa-calendar"></i> Add to my calendar</a>
                                                        </h5>
                                                    </div>
                                                    <div id="collapseDay1C" class="collapse" aria-labelledby="headingDay1C" data-parent="#accordion" style="">
                                                        <div class="card-body">
                                                            <h5>Conversation Leaders</h5>
                                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi at consequatur unde molestiae quidem provident voluptatum deleniti quo iste error eos est praesentium distinctio cupiditate tempore suscipit inventore deserunt tenetur.</p>
                                                            <h5>Special Interventions</h5>
                                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi at consequatur unde molestiae quidem provident voluptatum deleniti quo </p>
                                                            <h5>Moderated by</h5>
                                                            <p>Lorem ipsum dolor</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="prog-border row">
                                <div class="col-md-2 prog-time">
                                    <h4>2:00pm CAT</h4>
                                    <p>(Central Afican Time)</p>
                                    <span>5:00am <strong>Washington DC</strong></span>
                                    <span>10:00am <strong>London</strong></span>
                                    <span>12:pm <strong>Nairobi</strong></span>
                                    <span>1:00pm <strong>Dubai</strong></span>
                                    <span>5:00pm <strong>Hong Kong</strong></span>
                                </div>
                                <div class="col-md-10 prog-title">
                                    <div class="prog-details">
                                        <h4>Opening Ceremony</h4>
                                        <p>This Opening Ceremony will launch the Virtual 2020 AGRF as a key platform to continue advancing the continental agenda, particularly in light of multiple challenges from climate change to the COVID-19 pandemic. The theme of the summit, Feed the Cities, Grow the Continent: Leveraging Urban Food Markets to Achieve Sustainable Food Systems in Africa, will be highlighted with a call to action to rethink our food systems and rise to the challenge to feed Africa’s growing urban population.</p>
                                        <div id="accordion">
                                            <div class="card">
                                                <div class="card">
                                                    <div class="card-header" id="headingDay1D">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseDay1D" aria-expanded="false" aria-controls="collapseDay1B">More info</button>
                                                            <a href="#" class="btn btn-primary px-2 py-1 text-white pull-right"><i class="fa fa-calendar"></i> Add to my calendar</a>
                                                        </h5>
                                                    </div>
                                                    <div id="collapseDay1D" class="collapse" aria-labelledby="headingDay1D" data-parent="#accordion" style="">
                                                        <div class="card-body">
                                                            <h5>Conversation Leaders</h5>
                                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi at consequatur unde molestiae quidem provident voluptatum deleniti quo iste error eos est praesentium distinctio cupiditate tempore suscipit inventore deserunt tenetur.</p>
                                                            <h5>Special Interventions</h5>
                                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi at consequatur unde molestiae quidem provident voluptatum deleniti quo </p>
                                                            <h5>Moderated by</h5>
                                                            <p>Lorem ipsum dolor</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="prog-border row">
                                <div class="col-md-2 prog-time">
                                    <h4>3:00pm CAT</h4>
                                    <p>(Central Afican Time)</p>
                                    <span>5:00am <strong>Washington DC</strong></span>
                                    <span>10:00am <strong>London</strong></span>
                                    <span>12:pm <strong>Nairobi</strong></span>
                                    <span>1:00pm <strong>Dubai</strong></span>
                                    <span>5:00pm <strong>Hong Kong</strong></span>
                                </div>
                                <div class="col-md-10 prog-title">
                                    <div class="prog-details">
                                        <h4>Results Factory</h4>
                                        <p>Results Factory sessions are a series of events geared towards delivering and discussing tangible outcomes for this year’s summit. They will focus on: <br>
                                        •   Markets and trade<br>
                                        •   Nutritious Food<br>
                                        •   Resilience <br>
                                        •   Food Systems </p>
                                    </div>
                                </div>
                            </div>

                            <div class="prog-border row">
                                <div class="col-md-2 prog-time">
                                    <h4>4:00pm CAT</h4>
                                    <p>(Central Afican Time)</p>
                                    <span>5:00am <strong>Washington DC</strong></span>
                                    <span>10:00am <strong>London</strong></span>
                                    <span>12:pm <strong>Nairobi</strong></span>
                                    <span>1:00pm <strong>Dubai</strong></span>
                                    <span>5:00pm <strong>Hong Kong</strong></span>
                                </div>
                                <div class="col-md-10 prog-title">
                                    <div class="prog-details">
                                        <h4>Feed the Cities</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis deleniti reprehenderit animi est eaque corporis! Nisi, asperiores nam amet doloribus, soluta ut reiciendis. Consequatur modi rem, vero eos ipsam voluptas.<br>
                                        Error minus sint nobis dolor laborum architecto, quaerat. Voluptatum porro expedita labore esse velit veniam laborum quo obcaecati similique iusto delectus quasi!<br>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis deleniti reprehenderit animi est eaque corporis! Nisi, asperiores nam amet doloribus, soluta ut reiciendis. Consequatur modi rem, vero eos ipsam voluptas.<br>
                                        Error minus sint nobis dolor laborum architecto, quaerat. Voluptatum porro expedita labore esse velit veniam laborum quo obcaecati similique iusto delectus quasi!</p>
                                    </div>
                                </div>
                            </div>

                            <div class="prog-border row">
                                <div class="col-md-2 prog-time">
                                    <h4>5:00pm CAT</h4>
                                    <p>(Central Afican Time)</p>
                                    <span>5:00am <strong>Washington DC</strong></span>
                                    <span>10:00am <strong>London</strong></span>
                                    <span>12:pm <strong>Nairobi</strong></span>
                                    <span>1:00pm <strong>Dubai</strong></span>
                                    <span>5:00pm <strong>Hong Kong</strong></span>
                                </div>
                                <div class="col-md-10 prog-title">
                                    <div class="prog-details">
                                        <h4>Red Threads</h4>
                                        <p>The Red Threads session at the end of the day provides a cohesive synopsis of the day’s activities and focuses on the outcomes from the discussion.</p>
                                    </div>
                                    <hr class="prog-hr"/>
                                    <div class="prog-details">
                                        <h4>Culture Track</h4>
                                        <p>The culture track is an educational and exciting moment for participants to breathe outside the main sessions. Three culture session will run per day featuring daily exercise, healthy recipes, music, art, design, literature and more!</p>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div id="two" class="daycontent program-two">
                            <div class="prog-border row">
                                <div class="col-md-2 prog-time">
                                    <h4>Sunrise</h4>
                                    <p>10:00 – 11:00</p>
                                </div>
                                <div class="col-md-10 prog-title">
                                    <div class="prog-details">
                                        <h4>Highlights of the Day</h4>
                                        <p>Each morning get the highlights of the upcoming day, understand the themes under discussion, and find out all the interesting places to interact with thought leaders.</p>
                                    </div>
                                    <hr class="prog-hr"/>
                                    <div class="prog-details">
                                        <h4>Culture Track</h4>
                                        <p>The culture track is an educational and exciting moment for participants to breathe outside the main sessions. Three culture sessions will run per day featuring daily exercise, healthy recipes, music, art, design, and Literature and more!</p>
                                    </div>
                                </div>
                            </div>

                            <div class="prog-border row">
                                <div class="col-md-2 prog-time">
                                    <h4>Symposia</h4>
                                    <p>11:00 – 13:00</p>
                                </div>
                                <div class="col-md-10 prog-title">
                                    <div class="prog-details">
                                        <h4>Resilience & Adaptation</h4>
                                        <h5>Resilience frameworks developed for sustainable production, access, and consumption of healthy foods</h5>
                                        <p>The Symposium will showcase cities with the best practices on sustainable food systems. Appropriate innovations, and enterprises for building resilient food systems will be identified. The commitments made during the AGRF 2019 climate and resilience declaration will be revisited?</p>
                                    </div>
                                    <hr class="prog-hr"/>
                                    <div class="prog-details">
                                        <h4>Women in Agriculture</h4>
                                        <h5>Finding and Funding the Hidden Middle</h5>
                                        <p>Feeding Cities and Growing the Continent means linking rural and urban supply chains.  This middle ground is populated by MSMEs that need the resources to thrive. This session dubbed Finding and Funding the Hidden Middle will identify challenges to finding and funding the missing middle of Small and Micro Enterprises.</p>
                                    </div>
                                    <hr class="prog-hr"/>
                                    <div class="prog-details">
                                        <h4>Agtech & Digitalization</h4>
                                        <h5>Accelerating the Growth, Sustainability, and Inclusivity of Digital Agricultural Solutions</h5>
                                        <p>This session on Accelerating the Growth, Sustainability, and Inclusivity of Digital Agricultural Solutions will discuss recommendations towards increasing the overall sustainability of digital solutions for African agriculture.</p>
                                    </div>
                                    <hr class="prog-hr"/>
                                    <div class="prog-details">
                                        <h4>Policy & State Capability</h4>
                                        <h5>Implementation of continental agri-food policy reforms under the AfCFTA framework</h5>
                                        <p>Countries and RECs desire to advance and implement their policy and political commitments as well as priorities of AU CAADP goals and targets. Governments’ will step up capacity to attract agro-investments for economic recovery and responsiveness to changing market dynamics, and to accelerate the rate of growth of agriculture and food-systems in particular.</p>
                                    </div>
                                    <hr class="prog-hr"/>
                                    <div class="prog-details">
                                        <h4>Sustainable Productivity</h4>
                                        <h5>How can Africa address the acidic soil health problem and inform national liming campaigns?</h5>
                                        <p>Twenty percent of the soils in SSA are acidic resulting in low productivity. The symposium will focus on mechanisms of raising awareness on the use of lime and cost-effective lime delivery and application mechanisms. The outputs will feed into the Second Africa Fertilizer Summit to be hosted by the African Union in 2021.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="prog-border row">
                                <div class="col-md-2 prog-time">
                                    <h4>Midday</h4>
                                    <p>13:00 – 14:00</p>
                                </div>
                                <div class="col-md-10 prog-title">
                                    <div class="prog-details">
                                        <h4>Virtual Outings</h4>
                                        <p>A daily virtual farm tour will offer participants the opportunity to explore and discover real farms in AGRA’s target countries; and get practical advice on improving farming practices to sustainable increase yields.</p>
                                    </div>
                                    <hr class="prog-hr"/>
                                    <div class="prog-details">
                                        <h4>Culture Track</h4>
                                        <p>The culture track is an educational and exciting moment for participants to breathe outside the main sessions. Three culture sessions will run per day featuring daily exercise, healthy recipes, music, art, design, and literature and more!</p>
                                    </div>
                                    <hr class="prog-hr"/>
                                    <div class="prog-details">
                                        <h4>Farmers Forum</h4>
                                        <p>Africa’s farmers are a vibrant community. Mixed or specialized; local or global; urban or rural –  food producers discuss the paths that drive their sustainability.  Expect some hard talk about how to survive recent challenges and increase resilience.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="prog-border row">
                                <div class="col-md-2 prog-time">
                                    <h4>Plenary & Headliners</h4>
                                    <p>14:00 – 15 :00</p>
                                </div>
                                <div class="col-md-10 prog-title">
                                    <div class="prog-details">
                                        <h4>Grow the Continent</h4>
                                        <p>Sourcing African products by creating value chains that work demands a unique eco-system.  Watch leaders from agro-processors to aggregators; retailers to input companies; farmers to consumers get linked up to Grow the Continent.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="prog-border row">
                                <div class="col-md-2 prog-time">
                                    <h4>Results Factory</h4>
                                    <p>15:15 – 17:00</p>
                                </div>
                                <div class="col-md-10 prog-title">
                                    <div class="prog-details">
                                        <h4>Results Factory</h4>
                                        <p>Results Factory sessions are a series of events geared towards delivering and discussing tangible outcomes for this year’s summit. They will focus on: 
                                        •   Markets and trade<br>
                                        •   Nutritious Food<br>
                                        •   Resilience<br>
                                        •   Food Systems (with an eye on the 2021 Summit)</p>
                                    </div>
                                </div>
                            </div>

                            <div class="prog-border row">
                                <div class="col-md-2 prog-time">
                                    <h4>Plenary & Headliners</h4>
                                    <p>17:00 – 18:00</p>
                                </div>
                                <div class="col-md-10 prog-title">
                                    <div class="prog-details">
                                        <h4>The Great Debate: Reimagining post-COVID-19 Food Systems</h4>
                                        <p>The COVID-19 pandemic has placed immense pressure on the global food system and has made transforming our food systems more urgent than ever. This critical debate will discuss how to rethink the ways we produce, distribute, and eat food to help build a healthier and more sustainable world post COVID-19.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="prog-border row">
                                <div class="col-md-2 prog-time">
                                    <h4>Sundowner</h4>
                                    <p>18:00 – 19:00</p>
                                </div>
                                <div class="col-md-10 prog-title">
                                    <div class="prog-details">
                                        <h4>Red Threads</h4>
                                        <p>The Red Threads session at the end of the day provides a cohesive synopsis of the day’s activities and focuses on the outcomes from the discussion.</p>
                                    </div>
                                    <hr class="prog-hr"/>
                                    <div class="prog-details">
                                        <h4>Culture Track</h4>
                                        <p>The culture track is an educational and exciting moment for participants to breathe outside the main sessions. Three culture session will run per day featuring daily exercise, healthy recipes, music, art, design, and Literature and more!</p>
                                    </div>
                                    <hr class="prog-hr"/>
                                    <div class="prog-details">
                                        <h4>Special Events</h4>
                                        <h5>Youth-Driven Change</h5>
                                        <p>Hear directly from Youth as they explain the future they want.  A new generation of young people are entering agriculture and bringing fresh new ideas.  See the changing face of agriculture as the next generation of agri-food leaders describe exactly what is needed for change.</p>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div id="three" class="daycontent program-three">
                            <div class="prog-border row">
                                <div class="col-md-2 prog-time">
                                    <h4>Sunrise</h4>
                                    <p>10:00 – 11:00</p>
                                </div>
                                <div class="col-md-10 prog-title">
                                    <div class="prog-details">
                                        <h4>Highlights of the Day</h4>
                                        <p>Each morning get the highlights of the upcoming day, understand the themes under discussion, and find out all the interesting places to interact with thought leaders.</p>
                                    </div>
                                    <hr class="prog-hr"/>
                                    <div class="prog-details">
                                        <h4>Culture Track</h4>
                                        <p>The culture track is an educational and exciting moment for participants to breathe outside the main sessions. Three culture sessions will run per day featuring daily exercise, healthy recipes, music, art, design, and Literature and more!</p>
                                    </div>
                                </div>
                            </div>

                            <div class="prog-border row">
                                <div class="col-md-2 prog-time">
                                    <h4>Symposia</h4>
                                    <p>11:00 – 13:00</p>
                                </div>
                                <div class="col-md-10 prog-title">
                                    <div class="prog-details">
                                        <h4>Agri-Business & Deal Room</h4>
                                        <h5>Innovative Financial Solutions for Sub-Saharan Africa’s Agribusiness Sector</h5>
                                        <p>The Agri-Business Deal Room will hold a Symposia session on Innovative Financial Solutions for Sub-Saharan Africa’s Agribusiness Sector to explore how innovative development finance solutions can help Agribusiness enterprises grow, scale and reach their full potential to transform and support livelihoods.</p>
                                    </div>
                                    <hr class="prog-hr"/>
                                    <div class="prog-details">
                                        <h4>Regional Trade</h4>
                                        <h5>Strengthening agri-food data systems to foster predictability and evidence-based policies</h5>
                                        <p>Data and information availability are key ingredients for policy predictability. This session will leverage digital technologies in food and nutrition security data generation (food production forecasting, trade, and stock monitoring) for improved policy predictability and decision making.</p>
                                    </div>
                                    <hr class="prog-hr"/>
                                    <div class="prog-details">
                                        <h4>Generation Africa</h4>
                                        <h5>Linking youth Agri-Preneurs to urban value chain markets</h5>
                                        <p>Under the Generation Africa Thematic Platform, the voice of young agri-preneurs will be presented through different sessions like Match Matching with FAO and an Agri-Business Deal room for youth agri-preneurs; a GoGettaz Community Session and Pitch Final Presentation as well as a members group session of young agri-preneurs.</p>
                                    </div>
                                    <hr class="prog-hr"/>
                                    <div class="prog-details">
                                        <h4>Rural & Market Development</h4>
                                        <h5>Resilience Transformation: Getting to market and finance through digital innovation</h5>
                                        <p>Digital innovation and emerging technologies can increase the resilience of MSMEs in the food system.  Hard hit by the pandemic, climate change, and on the front lines of an economic downturn, digital solutions can link agri-food businesses to urban markets and create a food system that grows forward.</p>
                                    </div>
                                    <hr class="prog-hr"/>
                                    <div class="prog-details">
                                        <h4>Food Systems & Nutrition</h4>
                                        <h5>Reaching Urban Food Consumers Through Resilient Supply Chains</h5>
                                        <p>The symposium will examine policies, technologies, and investments that are needed to make food system supply chains more responsive, reliable, and resilient for urban populations in Africa. The merits of local, regional, or global supply options will be interrogated and amplified and, mechanisms for connecting smallholder producers with urban consumers will be defined.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="prog-border row">
                                <div class="col-md-2 prog-time">
                                    <h4>Midday</h4>
                                    <p>13:00 – 14:00</p>
                                </div>
                                <div class="col-md-10 prog-title">
                                    <div class="prog-details">
                                        <h4>Virtual Outings</h4>
                                        <p>A daily virtual farm tour will offer participants the opportunity to explore and discover real farms in AGRA’s target countries; and get practical advice on improving farming practices to sustainable increase yields.</p>
                                    </div>
                                    <hr class="prog-hr"/>
                                    <div class="prog-details">
                                        <h4>Culture Track</h4>
                                        <p>The culture track is an educational and exciting moment for participants to breathe outside the main sessions. Three culture session will run per day featuring daily exercise, healthy recipes, music, art, design, literature and more!</p>
                                    </div>
                                </div>
                            </div>

                            <div class="prog-border row">
                                <div class="col-md-2 prog-time">
                                    <h4>Plenary & Headliners</h4>
                                    <p>14:00 – 15 :00</p>
                                </div>
                                <div class="col-md-10 prog-title">
                                    <div class="prog-details">
                                        <h4>Build Back Better</h4>
                                        <p>This plenary session will discuss how to Build Back Better food systems to feed Africa’s growing urban population, especially following the COVID-19 pandemic. We cannot return to business as usual. It is now more urgent than ever that Food Systems are transformed to reduce poverty, improve food and nutrition security, and improve the quality of natural resources and ecosystem services by investing in enterprises and innovations to build a more sustainable and inclusive future.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="prog-border row">
                                <div class="col-md-2 prog-time">
                                    <h4>Results Factory</h4>
                                    <p>15:15 – 17:00</p>
                                </div>
                                <div class="col-md-10 prog-title">
                                    <div class="prog-details">
                                        <h4>Results Factory</h4>
                                        <p>Results Factory sessions are a series of events geared towards delivering and discussing tangible outcomes for this year’s summit. They will focus on: 
                                        •   Markets and trade<br>
                                        •   Nutritious Food<br>
                                        •   Resilience (with a bias for COVID-19) <br>
                                        •   Food Systems (with an eye on the 2021 Summit)</p>
                                    </div>
                                </div>
                            </div>

                            <div class="prog-border row">
                                <div class="col-md-2 prog-time">
                                    <h4>Plenary & Headliners</h4>
                                    <p>17:00 – 18:00</p>
                                </div>
                                <div class="col-md-10 prog-title">
                                    <div class="prog-details">
                                        <h4>Presidential Roundtable - Grow it Forward</h4>
                                        <p>Building an inter-connected African market that creates opportunities, right from rural smallholders to urban supermarkets will be the focus of this year’s Presidential Roundtable. Heads of state will discuss growing Africa’s Agricultural sector through market-led, inter-African trade and global exports by delivering the Malabo Declaration despite an economic slowdown. Agriculture, farmers, and agribusinesses together account for nearly 50 percent of Africa’s total economic activity. Africa’s farmers and agribusinesses can create a trillion-dollar food market starting with the right leadership.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="prog-border row">
                                <div class="col-md-2 prog-time">
                                    <h4>Sundowner</h4>
                                    <p>18:00 – 19:00</p>
                                </div>
                                <div class="col-md-10 prog-title">
                                    <div class="prog-details">
                                        <h4>Red Threads</h4>
                                        <p>The Red Threads session at the end of the day provides a cohesive synopsis of the day’s activities and focuses on the outcomes from the discussion.</p>
                                    </div>
                                    <hr class="prog-hr"/>
                                    <div class="prog-details">
                                        <h4>Culture Track</h4>
                                        <p>The culture track is an educational and exciting moment for participants to breathe outside the main sessions. Three culture session will run per day featuring daily exercise, healthy recipes, music, art, design, literature and more!</p>
                                    </div>
                                    <hr class="prog-hr"/>
                                    <div class="prog-details">
                                        <h4>Africa Food Prize</h4>
                                        <p>Celebrate the continent’s best.  The Africa Food Prize puts a spotlight on bold initiatives and technical innovations that can be replicated across the continent to create a new era of food security and economic opportunity for all Africans.</p>
                                    </div>
                                </div>
                            </div>                       
                        </div>


                        <div id="four" class="daycontent program-four">
                            <div class="prog-border row">
                                <div class="col-md-2 prog-time">
                                    <h4>Sunrise</h4>
                                    <p>10:00 – 11:00</p>
                                </div>
                                <div class="col-md-10 prog-title">
                                    <div class="prog-details">
                                        <h4>Highlights of the Day</h4>
                                        <p>Each morning get the highlights of the upcoming day, understand the themes under discussion, and find out all the interesting places to interact with thought leaders.</p>
                                    </div>
                                    <hr class="prog-hr"/>
                                    <div class="prog-details">
                                        <h4>Culture Track</h4>
                                        <p>The culture track is an educational and exciting moment for participants to breathe outside the main sessions. Three culture sessions will run per day featuring daily exercise, healthy recipes, music, art, design, and Literature and more!</p>
                                    </div>
                                </div>
                            </div>

                            <div class="prog-border row">
                                <div class="col-md-2 prog-time">
                                    <h4>Symposia</h4>
                                    <p>11:00 – 13:00</p>
                                </div>
                                <div class="col-md-10 prog-title">
                                    <div class="prog-details">
                                        <h4>Resilience & Adaptation</h4>
                                        <h5>Investment mechanisms and partnerships for food systems resilience plans</h5>
                                        <p>Cities struggle to implement resilience plans due to inadequate resources. The symposium will showcase models for financing the resilience plans, helping identify partnerships and sources of funding.</p>
                                    </div>
                                    <hr class="prog-hr"/>
                                    <div class="prog-details">
                                        <h4>Women in Agriculture</h4>
                                        <h5>Women-led resilience strategies</h5>
                                        <p>Women have faced particular challenges during the pandemic.  From increased violence to lack of market access, women have had to create new strategies to cope.  Hear about the most innovative solutions from the field to school-feeding to achieve food security.</p>
                                    </div>
                                    <hr class="prog-hr"/>
                                    <div class="prog-details">
                                        <h4>Agtech & Digitalization</h4>
                                        <h5>Accelerating the Growth, Sustainability, and Inclusivity of Digital Agricultural Solutions</h5>
                                        <p>Accelerating the Growth, Sustainability, and Inclusivity of Digital Agricultural Solutions will discuss concrete outcomes to  increase the overall sustainability of digital solutions for African agriculture.</p>
                                    </div>
                                    <hr class="prog-hr"/>
                                    <div class="prog-details">
                                        <h4>Policy & State Capability</h4>
                                        <h5>Implementation of continental agri-food policy reforms under the AfCFTA framework</h5>
                                        <p>Countries, and RECs, are advancing and implementing their policy and political commitments as well as priorities of AU CAADP goals and targets. Stepping up governments’ capacity to attract agro-investments is essential for economic recovery and responsiveness to changing market dynamics, and to accelerate the rate of growth of agriculture and food-systems.</p>
                                    </div>
                                    <hr class="prog-hr"/>
                                    <div class="prog-details">
                                        <h4>Sustainable Productivity</h4>
                                        <h5>Building Resilience in African Food Systems- The Role of Sustainable Productivity</h5>
                                        <p>he symposium will focus on preparing farmers, input suppliers, agro-dealers, and the broader productivity ecosystems to come back to growth and profitability. Focus will be on financing arrangements and mechanisms to reduce external dependencies to meet the compelling urban market.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="prog-border row">
                                <div class="col-md-2 prog-time">
                                    <h4>Midday</h4>
                                    <p>13:00 – 14:00</p>
                                </div>
                                <div class="col-md-10 prog-title">
                                    <div class="prog-details">
                                        <h4>Virtual Outings</h4>
                                        <p>A daily virtual farm tour will offer participants the opportunity to explore and discover real farms in AGRA’s target countries; and get practical advice on improving farming practices to sustainable increase yields.</p>
                                    </div>
                                    <hr class="prog-hr"/>
                                    <div class="prog-details">
                                        <h4>Culture Track</h4>
                                        <p>The culture track is an educational and exciting moment for participants to breathe outside the main sessions. Three culture session will run per day featuring daily exercise, healthy recipes, music, art, design, and Literature and more!</p>
                                    </div>
                                    <hr class="prog-hr"/>
                                    <div class="prog-details">
                                        <h4>Go Gettaz Finals</h4>
                                        <p>Youth winners of the Go Gettaz Finals are the future of Food.  Be inspired by the next generation.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="prog-border row">
                                <div class="col-md-2 prog-time">
                                    <h4>Plenary & Headliners</h4>
                                    <p>14:00 – 15 :00</p>
                                </div>
                                <div class="col-md-10 prog-title">
                                    <div class="prog-details">
                                        <h4>Growing Africa’s Food</h4>
                                        <p>How can we create demand for African products that fuel diverse, healthy diets with the safety and quality every consumer needs? African food and African food products generate agriculture-driven economic growth in Africa that develops urban food markets, fosters urban-rural linkages and contributes to reducing poverty and hunger in Africa. It also celebrates the rich food culture across the continent. </p>
                                    </div>
                                </div>
                            </div>

                            <div class="prog-border row">
                                <div class="col-md-2 prog-time">
                                    <h4>Results Factory</h4>
                                    <p>15:15 – 17:00</p>
                                </div>
                                <div class="col-md-10 prog-title">
                                    <div class="prog-details">
                                        <h4>Results Factory</h4>
                                        <p>Results Factory sessions are a series of events geared towards delivering and discussing tangible outcomes for this year’s summit. They will focus on: 
                                        •   Markets and trade<br>
                                        •   Nutritious Food <br>
                                        •   Resilience <br>
                                        •   Food Systems <br><br>

                                        Including</p>
                                        <h4>Chefs Feed Cities</h4>
                                        <p>Chefs are influencers, artisans, and part of the food system.  They can encourage food use well beyond the customers they serve and the books they write.  AGRF 2020 and the Chef’s Manifesto of the SDG2 Advocacy Hub will bring together some of Africa’s biggest food influencers to spark interest in African cuisine sourced from African products with an emphasis on diverse healthy diets.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="prog-border row">
                                <div class="col-md-2 prog-time">
                                    <h4>Plenary & Headliners</h4>
                                    <p>17:00 – 18:00</p>
                                </div>
                                <div class="col-md-10 prog-title">
                                    <div class="prog-details">
                                        <h4>Food Systems of the Future & Closing</h4>
                                        <p>Defining the food systems Africa wants, this closing plenary session will provide a multi-stakeholder vison heading into the Food Systems Summit. The food systems of the future must be sustainable, resilient, and capable of meeting the current global challenges of malnutrition, poverty and climate change as well as be responsive to emerging and unforeseen challenges.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="prog-border row">
                                <div class="col-md-2 prog-time">
                                    <h4>Sundowner</h4>
                                    <p>18:00 – 19:00</p>
                                </div>
                                <div class="col-md-10 prog-title">
                                    <div class="prog-details">
                                        <h4>Red Threads</h4>
                                        <p>The Red Threads session will feature the outcomes from the week and the next steps to build the food systems of the future.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
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