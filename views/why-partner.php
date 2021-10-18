<div class="service_area why_attend_area" id="why_attend_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title mb-30">
                        <h3>Why Partner With Us</h3>
                    </div>
                    <div class="row align-items-stretch why_attend">
                      <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">
                        <div class="unit-4 d-flex">
                          <div class="unit-4-icon mr-4"><span class="fa fa-check"></span></div>
                          <div>
                            <!-- <h3>Lorem ipsum</h3> -->
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="unit-4 d-flex">
                          <div class="unit-4-icon mr-4"><span class="fa fa-check"></div>
                          <div>
                            <!-- <h3>Lorem ipsum</h3> -->
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="unit-4 d-flex">
                          <div class="unit-4-icon mr-4"><span class="fa fa-check"></div>
                          <div>
                            <!-- <h3>Lorem ipsum</h3> -->
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                          </div>
                        </div>
                      </div>


                      <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="unit-4 d-flex">
                          <div class="unit-4-icon mr-4"><span class="fa fa-check"></div>
                          <div>
                            <!-- <h3>Lorem ipsum</h3> -->
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="unit-4 d-flex">
                          <div class="unit-4-icon mr-4"><span class="fa fa-check"></div>
                          <div>
                            <!-- <h3>Lorem ipsum</h3> -->
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="500">
                        <div class="unit-4 d-flex">
                          <div class="unit-4-icon mr-4"><span class="fa fa-check"></div>
                          <div>
                            <!-- <h3>Lorem ipsum</h3> -->
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8 col-sm-12">
                          <div class="row">
                            <div class="col-md-6">
                                <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary px-5 py-1 mt-2" style="width: 100%;">Download sponsorship pack</a>
                            </div>
                            <div class="col-md-6">
                                <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary px-5 py-1 mt-2" style="width: 100%;">Download exhibition pack</a>
                            </div>
                          </div>
                        </div>
                       <div class="col-lg-2"></div>
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
                            <form class="form-contact contact_form" method="POST" style="padding: 0px;box-shadow: none;">
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <div class="row">
                                            <label for="firstname" class="col-sm-3">First name</label>
                                            <div class="col-sm-9">
                                              <input class="form-control" name="firstname" id="firstname" type="text" value="<?php echo escape(Input::get('firstname')); ?>" placeholder="First name">
                                              <small><span id="firstname_error" style="color: red;"></span></small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12">
                                        <div class="row">
                                            <label for="lastname" class="col-sm-3">Last name</label>
                                            <div class="col-sm-9">
                                              <input class="form-control" name="lastname" id="lastname" value="<?php echo escape(Input::get('lastname')); ?>" type="text" placeholder="Last name">
                                              <small><span id="lastname_error" style="color: red;"></span></small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12">
                                        <div class="row">
                                            <label for="email" class="col-sm-3">Email</label>
                                            <div class="col-sm-9">
                                              <input class="form-control" name="email" id="email" type="email" value="<?php echo escape(Input::get('email')); ?>" placeholder="Email">
                                              <small><span id="email_error" style="color: red;"></span></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mt-2" style="overflow: auto;">
                                  <a href="#" onclick=""><button type="button" class="btn btn-primary px-5 py-1 text-white pull-right">Submit</button></a>
                                </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                </div>
            </div>
        </div>
    </div>