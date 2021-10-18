<?php
require_once 'admin/core/init.php';


?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <?php include 'includes/head.php';?>
</head>

<body>

   <?php include 'includes/nav.php';?>

    <div class="slider_area">
        <div class="single_slider single_slider_reg d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-12">
                        <div class="slider_text slider_text_register">
                            <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">Reset your password </h3>
                            <span class="separator-line wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="service_area about_event" style="margin-top: -4%;">
        <div class="container">
            <div class="row">
            <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    <form class="login-form bg-gray mt-5" id="email_data" action="" method="post" role="form">
                        <span class="col-md-12" style="text-align: center;">
                            
                        </span>
                        <h4>Confirm your email</h4>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input class="form-control" id="email" name="email" value="" type="email" placeholder="Email" required>
                                    <p style="font-size: 80%; color: red;" id="email_error"></p>
                                </div>
                            </div>
                          
                        </div>
                       
                        <div class="form-group mt-3">
                            <input type="hidden" name="request" value="reset-account"> 
                            <button type="button" class="btn btn-primary py-1 text-white" onclick="checkEmail()">Confirm</button>
                        </div>
                          
                    </form>
                </div>
                <div class="col-lg-4"></div>
            </div>
        </div>
    </div>


    <?php include'includes/footer.php';?>



    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript">

        function checkEmail(){
            var email=document.getElementById("email").value.trim();

            if(email==""){
                $("#email").css("border", "1px solid red");
                $("#email_error").html("Please enter your email address");
            } else{

                // form data
			var form_data=$("#email_data").serialize();
            
            $.ajax({  
                
                type: 'POST',  
                url: '<?=linkto("admin/accountsapi")?>',
                data: form_data, 
                content:false, //
                processData: false,//These three must be false
                contentType: 'application/x-www-form-urlencoded',  
                dataType: 'text',  
                success: function (out) { 

                    var res=JSON.parse(out);
                    
                    if(res.success=="1"){
                        
                        
                        window.setTimeout(function(){
                            $("#load").attr("hidden", "");
                        }, 1100);
                        
                        window.setTimeout(function(){
                        
                        Swal.fire({
                            title: 'Success',
                            html: "Request successfully sent.",
                            icon: 'success',
                            timer: 3000,
                            
                            showConfirmButton: false,
                            
                        }).then((result) => {
                                location.reload();  
                        });
                    }, 1100);
                        
                            
                    } else{
                            window.setTimeout(function(){
                            $("#load").attr("hidden", "");
                        }, 2000);
                        
                            // Notifying the user
                            window.setTimeout(function(){
                                
                                Swal.fire({
                                    title: 'Failed',
                                    html: "Email address not found",
                                    icon: 'warning',
                                    timer: 3000,
                                    
                                    showConfirmButton: false,
                                    
                                }).then((result) => {
                                        
                                });
                            }, 1100);         
                    }  
                }  
            });

            }
        }

    </script>

</body>

</html>