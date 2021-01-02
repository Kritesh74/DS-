<?php
if($this->session->userdata('sign_id')) 
{
$sign_id = $this->session->userdata('sign_id');
$username = $this->session->userdata('user_name');
$useremail = $this->session->userdata('user_email');
}

?>



<!-- /banner_bottom_agile_info -->
		<div class="container" style="display: none;">
			
			 <?php foreach($page_list as $page) {?>

			<h3><?php echo $page['brand_name']?></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="<?php echo base_url('Dashio_Store_Controller/index');?>">Home</a><i>|</i></li>
								<li>About</li>
							</ul>
						 </div>
				</div>
			<?php }?>
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
			<div class="css-treeview">
				<h4>Brands List</h4>
				<ul class="tree-list-pad">
					
				<li><input type="checkbox" checked="checked" id="item-2" /><label for="item-2"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> Mobile Brands</label>
					
						<ul>
							<?php foreach($brand_list as $brand){?>
							<li><input type="checkbox"  id="item-2-0" /><label for="item-2-0"><i class="fa fa-long-arrow-right" aria-hidden="true"></i><a href="<?php echo base_url()?>Dashio_Store_Controller/getdata/<?php echo $brand['bid']?>" class="get_list" data-user_id="<?php echo $brand['bid']?>"><?php echo $brand['brand_name'];?></a></label>
                                
	
								
								<?php }?>
							</li>
							
						</ul>
					</li>

			</div>
			<div class="clearfix"></div>
		</div>
		<div class="col-md-8 products-right">
			<h5>Product <span>List</span></h5>
			<div class="sort-grid">
				
				<div class="clearfix"></div>
			</div>
			<div class="men-wear-top">
				
				
				<div class="clearfix"></div>
			</div>
			<?php foreach($page_list as $page) {
                 $spi=$page['file'];
                 $image_array=explode(",",$spi);
				?>

				<div class="col-md-4 product-men">
								<div class="men-pro-item simpleCart_shelfItem">
									<div class="men-thumb-item" style="height:245px !important">
										<img src="<?php echo base_url();?>p_image_upload/<?php echo $image_array[0]?>" alt="" class="pro-image-front">
										<img src="<?php echo base_url();?>p_image_upload/<?php echo $image_array[0]?>" alt="" class="pro-image-back">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="<?php echo base_url()?>Dashio_Store_Controller/get_single/<?php echo $page['stock_model_no'];?>" class="link-product-add-cart">Quick View</a>
												</div>
											</div>
											<span class="product-new-top">New</span>
											
									</div>
									<div class="item-info-product get_single_detail">
										
										<h4><a href="<?php echo base_url()?>Dashio_Store_Controller/get_single/<?php echo $page['stock_model_no'];?>" class="get_single_list" data-user_id="<?php echo $page['handset_name'];?> " data-model_id="<?php echo $page['stock_model_no'];?> "><?php echo $page['brand_name'];?>&nbsp;<?php echo $page['model_no'];?></a></h4>
									
										<div class="info-product-price">
											<span class="item_price">Rs.<?php echo $page['s_price']?></span>
											<del><?php echo $page['a_price']?></del>
										</div>

										<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
															<form action="#" method="post">
																<fieldset>
																	<input type="button" value="Add to cart" class="button add_cart_btn" data-productid="<?php echo $page['pid'];?>"
																	data-productname="<?php echo $page['brand_name'];?>" 
																	data-productmodelno="<?php echo $page['model_no'];?>" data-productprice="<?php echo $page['handset_price'] ;?>" data-userid="<?php if(!empty($sign_id))
																	{
																		echo $sign_id ;
																	}
																	else
																	{
																		echo "<script>alert('login need to that');</script>";
																	}

																	?>">
																</fieldset>
																	
															</form>
														</div>
																			
									</div>
								</div>
							</div>
                            
							<?php }?>
				
				<div class="clearfix"></div>
		</div>

		<div class="clearfix"></div>
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
<!-- //mens -->
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
<div class="modal fade" id="createModalerror" aria-hidden="true">
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
              <h1>Item Already Added In Your Cart</h1>
              <p>Please Check It</p>
              
              
            </div>
           </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
        </div>


<!--grids-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
<script type="text/javascript">
      $(document).ready(function(){

          $('.get_single_detail').on('click','h4  a ' , function(){

             var mid=$(this).data('model_id');
           // alert(mid);

             if(mid!='')
             {

		        $.ajax({
		        	url:"<?php echo base_url('Dashio_Store_Controller/get_single'); ?>",
					data:{mid:mid},
				    type: "POST",
					success:function(response)
					{
					}
				});	
			}



          });

          $('.add_cart_btn').click(function(){
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
                                   },
			                     error: function()
			                     {
			                      $('#createModalerror').modal('show');
			                     }

              });
	        	<?php
	          }
	        ?>

     	                    

      });


      });
    </script>

