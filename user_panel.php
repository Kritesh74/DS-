
<?php

if($this->session->userdata('sign_id')) 
{
$sign_id = $this->session->userdata('sign_id');
$username = $this->session->userdata('user_name');
$useremail = $this->session->userdata('user_email');
$user_mobile_num = $this->session->userdata('user_mobile_num');
$user_d_address = $this->session->userdata('user_d_address');
$user_s_address = $this->session->userdata('user_s_address');
}
else
{
	redirect("Dashio_Store_Controller");
	exit;
}
?>






<!-- /banner_bottom_agile_info -->
		<div class="container" style="display: none;">
			
			 

						<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="<?php echo base_url('Dashio_Store_Controller/index');?>">Home</a><i>|</i></li>
								<li>About</li>
							</ul>
						 </div>
				</div>
		
	   <!--//w3_short-->
	  <div class="page-head_agile_info_w3l">

	</div>
</div>
          <!-- banner-bootom-w3-agileits -->
	<div class="banner-bootom-w3-agileits">
	<div class="container">
         <!-- mens -->
		<div class="col-md-4 products-left">
			<div class="filter-price">
				
					<ul class="dropdown-menu6">
						<li>                
							<div id="slider-range"></div>							
							<input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;" />
						</li>			
					</ul>
			</div>
			
			<div class="community-poll">
				<h4>Activity List</h4>
				<div class="swit form">	
					<form>
					<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i><a href="<?php echo base_url('Dashio_Store_Controller/user_order'); ?>">My Order</a></label> </div></div>	
					<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio" checked=""><i></i><a href="<?php echo base_url('Dashio_Store_Controller/user_panel'); ?>">My Profile</a></label> </div></div>
					<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i><a href="<?php echo base_url('Dashio_Store_Controller/user_cart_fun');?>">My Cart</a></label> </div></div>		
					<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i><a href="<?php echo site_url('Dashio_Store_Controller/logout_account');?>">Logout</a></label> </div></div>		
					</form>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="col-md-8 products-right">
			<h5>Hello <span><?php echo $username?></span></h5>
			<div class="sort-grid">
				<table class="table table-borderless">
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Name</td>
      <td><?php echo $username?></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Email Id</td>
      <td><?php echo $useremail?></td>
    </tr>
    <form method="post" id="add_user_detail">
    	<input type="hidden" name="id" id="id" value="<?php echo $sign_id;?>">
    <tr>
      <th scope="row">3</th>
      <td>Mobile Number</td>
      <td>
      	
      	
			<div class="col-sm-6">
			  <input type="text" id="user_mobile_num" name="user_mobile_num" class="form-control" value="<?php echo $user_mobile_num?>">
			</div>
			<label class="radio-inline">
			  <input type="radio" value="Y" name="IsLive1" class="grey"> YES
			</label>
			<label class="radio-inline">
			  <input type="radio" value="N" name="IsLive1" class="grey"> NO
			</label>

      </td>
    </tr>
    <tr>
      <th scope="row">4</th>
      <td>Default Address</td>
      <td>
      	
            <div class="col-sm-6">
			  <textarea type="text" id="user_d_address" name="user_d_address" class="form-control"><?php echo $user_d_address?></textarea>
			</div>
			<label class="radio-inline">
			  <input type="radio" value="Y" name="IsLive2" class="grey"> YES
			</label>
			<label class="radio-inline">
			  <input type="radio" value="N" name="IsLive2" class="grey"> NO
			</label>

      </td>
    </tr>
    <tr>
      <th scope="row">5</th>
      <td>Shipping Address</td>
      <td>

      	<div class="col-sm-6">
			  <textarea type="text" id="user_s_address" name="user_s_address" class="form-control"><?php echo $user_s_address?></textarea>
			</div>
			<label class="radio-inline">
			  <input type="radio" value="Y" name="IsLive3" class="grey"> YES
			</label>
			<label class="radio-inline">
			  <input type="radio" value="N" name="IsLive3" class="grey"> NO
			</label>

		</td>
	</tr>

	<tr>
		<td>
			<input type="button" id="add_detail" value="Update" class="btn btn-primary">
		</td>
    </tr>
</form>
  </tbody>
</table>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>Mobile Number</th>
      <td><?php echo $user_mobile_num?></td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Default Address</th>
      <td><?php echo $user_d_address?></td>
    </tr>
    <tr>
      <th scope="row">Shipping Address</th>
       <td><?php echo $user_s_address?></td>
    </tr>
  </tbody>
</table>				
<div class="clearfix"></div>
</div>
<div class="men-wear-top">
	<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
	</div>
</div>	

<!-- //mens -->
<div class="modal fade" id="update_detail_alert" aria-hidden="true">
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
              <h3>Update Done !</h3>
              <p>Basic Detail Update Sucessfully</p>
              
              
            </div>
           </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
<!--/grids-->
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--grids-->
<script type="text/javascript">
	$(document).ready(function(){
		$("input#user_mobile_num").prop('disabled', true);
			$('input:radio[name="IsLive1"]').change(function() {
			  if ($(this).is(':checked') && $(this).val() == 'Y') {
			    // append goes here
			    $("input#user_mobile_num").prop('disabled', false);
			  } else {
			    $("input#user_mobile_num").prop('disabled', true);
			  }
        });

			$("textarea#user_d_address").prop('disabled', true);
			$('input:radio[name="IsLive2"]').change(function() {
			  if ($(this).is(':checked') && $(this).val() == 'Y') {
			    // append goes here
			    $("textarea#user_d_address").prop('disabled', false);
			  } else {
			    $("textarea#user_d_address").prop('disabled', true);
			  }
        });

			$("textarea#user_s_address").prop('disabled', true);
			$('input:radio[name="IsLive3"]').change(function() {
			  if ($(this).is(':checked') && $(this).val() == 'Y') {
			    // append goes here
			    $("textarea#user_s_address").prop('disabled', false);
			  } else {
			    $("textarea#user_s_address").prop('disabled', true);
			  }
        });
        $("#add_detail").click(function(){
                   var form = $('#add_user_detail')[0];
                   var data = new FormData(form);
                   base_url = "<?php echo base_url('Dashio_Store_Controller/user_personal_detail')?>/";
                   var data = new FormData(form); 
                   $.ajax({
			                   	  url: base_url,
			                      data: data,
			                      type: "post",
			                      async: false,
			                      processData: false,
			                      contentType: false,
			                      cache: false,
			                      dataType: 'json',
			                      success:function(response)
			                      {
                                    $("#update_detail_alert").modal("show");
                                    window.location.href = "<?php echo base_url('Dashio_Store_Controller/user_panel'); ?>";
			                      }
			             });            
        });


	});
</script>