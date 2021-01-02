<?php foreach($title as $ti) { 
$id=$ti['id'];
$site_name=$ti['site_name'];
$mail_id=$ti['mail_id'];
$mobile_number=$ti['mobile_number'];
$s_address=$ti['s_address'];
 }?>
 <style type="text/css">
	.page-head_agile_info_w3l {
    background: url(../images/12.jpg) no-repeat center !important;
    background-size: cover;
    -webkit-background-size: cover;
    -o-background-size: cover;
    -ms-background-size: cover;
    -moz-background-size: cover;
    min-height: 200px;
    padding-top: 50px;
}
</style>

<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
		<div class="container">
			<h3>C<span>ontact Us </span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="<?php echo base_url();?>index.php">Home</a><i>|</i></li>
								<li>Contact</li>
							</ul>
						 </div>
				</div>
	   <!--//w3_short-->
	</div>
</div>
   <!--/contact-->
    <div class="banner_bottom_agile_info">
	    <div class="container">
		  <div class="contact-grid-agile-w3s">
				<div class="col-md-4 contact-grid-agile-w3">
						<div class="contact-grid-agile-w31">
							<i class="fa fa-map-marker" aria-hidden="true"></i>
							<h4>Address</h4>
							<p><?php echo $s_address;?></p>
						</div>
					</div>
					<div class="col-md-4 contact-grid-agile-w3">
						<div class="contact-grid-agile-w32">
							<i class="fa fa-phone" aria-hidden="true"></i>
							<h4>Call Us</h4>
							<p><?php echo $mobile_number;?></p></div></span></p>
						</div>
					</div>
					<div class="col-md-4 contact-grid-agile-w3">
						<div class="contact-grid-agile-w33">
							<i class="fa fa-envelope-o" aria-hidden="true"></i>
							<h4>Email</h4>
							<p><?php echo $mail_id;?></p>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
	   </div>
	 </div>
	   <div class="contact-w3-agile1 map" data-aos="flip-right">
			
		   <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14352.661955847281!2d74.63832506639045!3d25.92979043696918!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1605178525406!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
	   </div>
   <div class="banner_bottom_agile_info">
	<div class="container">
	   <div class="agile-contact-grids">
				<div class="agile-contact-left">
					<div class="col-md-6 address-grid">
						<h4>For More <span>Information</span></h4>
							<div class="mail-agileits-w3layouts">
								<i class="fa fa-volume-control-phone" aria-hidden="true"></i>
								<div class="contact-right">
									<p>Telephone </p><span><?php echo $mobile_number;?></span>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="mail-agileits-w3layouts">
								<i class="fa fa-envelope-o" aria-hidden="true"></i>
								<div class="contact-right">
									<p>Mail </p><?php echo $mail_id;?>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="mail-agileits-w3layouts">
								<i class="fa fa-map-marker" aria-hidden="true"></i>
								<div class="contact-right">
									<p>Location</p><span><?php echo $s_address;?></span>
								</div>
								<div class="clearfix"> </div>
							</div>
							<ul class="social-nav model-3d-0 footer-social w3_agile_social two contact">
							                              <li class="share">SHARE ON : </li>
															<li><a href="#" class="facebook">
																  <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="twitter"> 
																  <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="instagram">
																  <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="pinterest">
																  <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
														</ul>
					</div>
					<div class="col-md-6 contact-form">
						<h4 class="white-w3ls">Contact <span>Form</span></h4>
						<form  method="post" id="contact_form">
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="u_name" id="u_name" class="u_name_page" required="">
								<label>Name</label>
								<p style="color:red;" id="u_nameerror" class="u_name_error"></p>
							</div>
							<div class="styled-input">
								<input type="email" name="u_email" id="u_email" class="u_email_page" required=""> 
								<label>Email</label>
								<p style="color:red;" id="u_emailerror" class="u_email_error"></p>
							</div> 
							<div class="styled-input">
								<input type="text" name="u_subject" id="subject" class="u_subject_page" required="">
								<label>Subject</label>
								<p style="color:red;" id="u_subjecterror" class="u_subject_error"></p>
							</div>
							<div class="styled-input">
								<textarea name="u_message" id="u_message" class="u_message_page" required=""></textarea>
								<label>Message</label>
								<p style="color:red;" id="u_messageerror" class="u_message_error"></p>
							</div>	 
							<input type="button" value="SEND" id="contact_btn">
						</form>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
       </div>
	</div>
 <!--//contact-->
<!--/grids-->
<div class="coupons">
		<div class="coupons-grids text-center">
			<div class="w3layouts_mail_grid">
				<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-truck" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>FREE SHIPPING</h3>
						<p>We deliver your order at your door step</p>
					</div>
				</div>
				<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-headphones" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>24/7 SUPPORT</h3>
						<p>Help Team For Customer</p>
					</div>
				</div>
				<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-shopping-bag" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>MONEY BACK GUARANTEE</h3>
						<p>Money Return Promise</p>
					</div>
				</div>
					<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-gift" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>FREE GIFT COUPONS</h3>
						<p>Customer Get Reward Points and Gift</p>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

		</div>
</div>
<div class="modal fade" id="pop" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
             
            <div class="form-group">
              <div class="thank-you-pop">
              <h1>Thank You for Contact to Dashio Store!</h1>
              <p>We are contact to you as soon as possible</p>
              
              
            </div>
           </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
<!--grids-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
<script type="text/javascript">
      $(document).ready(function(){
      	$('#contact_btn').click(function(){
      	          var form = $('#contact_form')[0];
                   var data = new FormData(form);
                   base_url = "<?php echo base_url('Dashio_Store_Controller/user_contact')?>/";
                   var data = new FormData(form);
                    $.ajax({
			                   	  url: base_url,
			                      data: data,
			                      type: "post",
			                      async: false,
			                      processData: false,
			                      contentType: false,
			                      cache: false,
			                     // dataType: 'json',  
			                      success:function(response)
			                       { 
                                   //console.log(response);
                                   var obj = JSON.parse(response);

						            $.each(obj, function(key, value) 
						           {

						           //   alert(key+":::"+value);
						              if(key=="message")
						              {
						                
						                $('#contact_form')[0].reset();
                                            //$("#myModal2").modal('hide');
				                              $("#pop").modal('show');

						                /*setTimeout(function(){ location.reload(true); }, 1000);
						                   $(window).scrollTop(0);*/
						                   
						              }
						              else
						              { 
						              	//alert(value);
						                $('.u_email_error').removeClass('hidden');
						                $( "#"+key ).focus();
						                $('#'+key+'error').html(value);

						              }
						            });
						         }   

			                      /*{
			                      	if(response.status=="1")
				                    {

			                      	  		$('#contact_form')[0].reset();
				                              $("#pop").modal('show');
				                      }
				                     else
				                     {
											alert("Invaild Login ! fill correct details");
											
				                      }         
			                      },
			                      error: function()
			                     {
			                       alert("email id already exits");
			                     }*/
                });   
            });

            var $regexname = /^([a-zA-Z]{2,16})$/;
            $('.u_name_page').on('keypress keydown keyup', function () {
		    if (!$(this).val().match($regexname)) {
		      // there is a mismatch, hence show the error message
		      $('.u_name_error').removeClass('hidden');
		    } else {
		      // else, do not display message
		      $('.u_name_error').addClass('hidden');
		    }
         });

            var $regexname1 = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
           $('.u_email_page').on('keypress keydown keyup', function () {
		    if (!$(this).val().match($regexname1)) {
		      // there is a mismatch, hence show the error message
		      $('.u_email_error').removeClass('hidden');
		    } else {
		      // else, do not display message
		      $('.u_email_error').addClass('hidden');
		    }
          });

           var $regexname = /^([a-zA-Z]{2,16})$/;
            $('.u_subject_page').on('keypress keydown keyup', function () {
		    if (!$(this).val().match($regexname)) {
		      // there is a mismatch, hence show the error message
		      $('.u_subject_error').removeClass('hidden');
		    } else {
		      // else, do not display message
		      $('.u_subject_error').addClass('hidden');
		    }
         });
            var $regexname = /^([a-zA-Z]{2,16})$/;
            $('.u_message_page').on('keypress keydown keyup', function () {
		    if (!$(this).val().match($regexname)) {
		      // there is a mismatch, hence show the error message
		      $('.u_message_error').removeClass('hidden');
		    } else {
		      // else, do not display message
		      $('.u_message_error').addClass('hidden');
		    }
         });


      	});

</script>