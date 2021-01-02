<?php

if($this->session->userdata('sign_id')) 
{
$sign_id = $this->session->userdata('sign_id');
$username = $this->session->userdata('user_name');
$useremail = $this->session->userdata('user_email');
}

?>
<!--/single_page-->
  <!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
	<div class="container">
	     <div class="col-md-4 single-right-left ">
			<div class="grid images_3_of_2">
				<div class="flexslider">
					<?php foreach($page_list as $page) {
							 $spi=$page['file'];
                 $image_array=explode(",",$spi);
                 ?>
					<ul class="slides">
						

						<li data-thumb="<?php echo base_url();?>p_image_upload/<?php echo $image_array[0]?>">
							<div class="thumb-image"><img src="<?php echo base_url();?>p_image_upload/<?php echo $image_array[0]?>"data-imagezoom="true" class="img-responsive"></div>
						</li>
						<li data-thumb="<?php echo base_url();?>p_image_upload/<?php echo $image_array[1]?>" >
							<div class="thumb-image"><img src="<?php echo base_url();?>p_image_upload/<?php echo $image_array[1]?>" data-imagezoom="true" class="img-responsive"></div>
						</li>	
						<li data-thumb="<?php echo base_url();?>p_image_upload/<?php echo $image_array[2]?>">
							<div class="thumb-image"><img src="<?php echo base_url();?>p_image_upload/<?php echo $image_array[2]?>" data-imagezoom="true" class="img-responsive"></div>
						</li>
						
					</ul>
					<?php }?> 
					<div class="clearfix"></div>
				</div>	
			</div>
		</div>

		<div class="col-md-8 single-right-left simpleCart_shelfItem">

			<?php foreach($page_list as $page) {?>

					<h3><?php echo $page['brand_name']?>&nbsp;<?php echo $page['model_no']?></h3>
                   <?php 
					     $t_price=$page['a_price'] - $page['s_price'];
					      ?> 
					      &nbsp;
					      &nbsp;
                       <h4><b>Extra <?php echo $t_price; ?> off</b><del>Rs. <?php 
					echo $page['a_price']?></del></h4>
						
					<p><span class="item_price">Rs.<?php echo $page['s_price']?></span> </p>
			<?php }?>		
					<div class="rating1">
						<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3" checked="">
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1">
							<label for="rating1">1</label>
						</span>
					</div>
					
					
					<div class="occasional col-md-12">
					<div class="col-md-4">

						<?php foreach($page_list as $page) {?>
						<h5>Color :<label class="radio"><?php echo $page['color']?></label></h5>
						<?php }?>	
						<div class="clearfix"> </div>
					</div>
					<div class="col-md-5">
						<?php foreach($page_list as $page) {?>
						<h5>Warranty Period :&nbsp;<label><?php echo $page['warranty_time']?>&nbsp;Year</label></h5>
						<?php }?>
						<div class="clearfix"> </div>
					</div>
                    </div>

					<div class="occasion-cart">
						<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
															<form action="#" method="post">
																<?php foreach($page_list as $page) {?>
																<fieldset>
																	<input type="button" value="Add to cart" class="button" id="add_cart_btn" data-productid="<?php echo $page['pid']?>"
																	data-productname="<?php echo $page['brand_name']?>" 
																	data-productmodelno="<?php echo $page['model_no']?>" data-productprice="<?php echo $page['handset_price']?>" data-userid="<?php if(!empty($sign_id))
																	{
																		echo $sign_id ;
																	}
																	else
																	{
																		echo "<script>alert('login need to that');</script>";
																	}

																	?>">
																</fieldset>
																<?php }?>	
															</form>


														</div>
																			
					</div>

					<ul class="social-nav model-3d-0 footer-social w3_agile_social single_page_w3ls">
						                                   <li class="share">Share On : </li>
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
	 			<div class="clearfix"> </div>
				<!-- /new_arrivals --> 
	<div class="responsive_tabs_agileits"> 
				<div id="horizontalTab">
						<ul class="resp-tabs-list">
							<li>Specification</li>
							<li>Reviews</li>
							<li>Description</li>
						</ul>
					<div class="resp-tabs-container">
					<!--/tab_one-->
					   <div class="tab1">
                          <?php foreach($page_list as $page) {?>
							<div class="single_page_agile_its_w3ls">
							  <h6>Mobile Details</h6>
							  <table class="table table-bordered">
								  <tbody>
								    <tr>
								      <th scope="row">Color</th>
								      <td><?php echo $page['color']?></td>
								      <th scope="row">RAM</th>
								      <td><?php echo $page['ram']?> GB</td>
								    </tr>
								    <tr>
								      <th scope="row">ROM</th>
								      <td><?php echo $page['rom']?> GB</td>
								      <th scope="row">Front Camera</th>
								      <td><?php echo $page['f_camera']?> MP</td>
								    </tr>
								    <tr>
								      <th scope="row">Back Camera</th>
								      <td><?php echo $page['b_camera']?> MP</td>
								      <th scope="row">Battery Life</th>
								      <td><?php echo $page['battery_life']?> mAh</td>
								    </tr>
								     <tr>
								      <th scope="row">Sim Type</th>
								      <td><?php echo $page['sim_type']?></td>
								      <th scope="row">Processor</th>
								      <td><?php echo $page['p_name']?></td>
								    </tr>
								     <tr>
								      <th scope="row">Display Type</th>
								      <td><?php echo $page['display_type']?></td>
								      <th scope="row">Display Size</th>
								      <td><?php echo $page['display_size']?>cm</td>
								    </tr>
								  </tbody>
								</table>

							</div>
							<?php }?>
						</div>
						<!--//tab_one-->
						<div class="tab2">
							
							<div class="single_page_agile_its_w3ls">
								<div class="bootstrap-tab-text-grids">
									<div class="bootstrap-tab-text-grid">
										<div class="bootstrap-tab-text-grid-left">
											<img src="<?php echo base_url();?>images/t1.jpg" alt=" " class="img-responsive">
										</div>
										<div class="bootstrap-tab-text-grid-right">
											<ul>
												<li><a href="#">Admin</a></li>
											</ul>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elPellentesque vehicula augue eget.Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis 
												suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem 
												vel eum iure reprehenderit.</p>
										</div>
										<div class="clearfix"> </div>
						             </div>
								 </div>
								 
							 </div>
						 </div>
						   <div class="tab3">

							<div class="single_page_agile_its_w3ls">
							  <?php foreach($page_list as $page) {?>
											<p><?php echo $page['product_description']?></p>
											<?php } ?>

							</div>
						</div>
					</div>
				</div>	
			</div>
	<!-- //new_arrivals --> 
		         </div>
	        </div>
 </div>
 <div class="modal fade" id="cart_model" aria-hidden="true">
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
              <h1>Your Item Selected</h1>
              <p>please check your cart</p>
              
              
            </div>
           </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
<!--//single_page-->
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
<!--grids-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){  
     $('#add_cart_btn').click(function(){
     	var sign_id = $(this).data("userid");
     	var handset_name = $(this).data("productname");
     	var model_no = $(this).data("productmodelno");
     	var handset_price = $(this).data("productprice");

     	<?php 
	        	if(empty($this->session->userdata('sign_id')))
	        	{ ?>
                     alert("First You need to Login Then Open Cart");
	        	<?php }
	        	else
	        	{ ?>
                      $.ajax({
			                   	  url:"<?php echo base_url('Dashio_Store_Controller/add_to_cart')?>",
			                      data: {sign_id:sign_id,handset_name:handset_name,model_no:model_no,handset_price:handset_price},
			                      type: "post",
			                      async: false,
			                      dataType: 'json',
			                      success:function(response)
			                      { 
                                     $("#cart_model").modal('show');
                                  }
              });
	        	<?php
	          }
	        ?>

     	                    

      });
	});
</script>