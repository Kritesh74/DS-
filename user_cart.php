
<?php

if($this->session->userdata('sign_id')) 
{
$sign_id = $this->session->userdata('sign_id');
$username = $this->session->userdata('user_name');
$useremail = $this->session->userdata('user_email');
}
if($this->session->userdata('cart_data')) 
{
$cart_data = $this->session->userdata('cart_data');

}
?>

<!-- /banner_bottom_agile_info -->
<!-- /banner_bottom_agile_info -->
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
					<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i><a href="<?php echo base_url('Dashio_Store_Controller/user_panel'); ?>">My Profile</a></label> </div></div>
					<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio" checked=""><i></i><a href="<?php echo base_url('Dashio_Store_Controller/user_cart_fun');?>">My Cart</a></label> </div></div>		
					<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i><a href="<?php echo base_url('Dashio_Store_Controller/logout_account');?>">Logout</a></label> </div></div>		
					</form>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="col-md-8 products-right">
			<div class="sort-grid">
				<h2>My Cart</h2>            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Brand Name</th>
        <th>Model No</th>
        <th>Price</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>

    	<?php 
    	if(!empty($cart_detail))
    	{
        
    	foreach($cart_detail as $page) {?>
      <tr>
        <td><?php echo $page['handset_name'];?></td>
        <td><?php echo $page['model_no'];?></td>
        <td align="right"><?php echo $page['handset_price'];?>/-</td>
        <td><a href="#" class="btn btn-danger remove_cart" data-cartid="<?php echo $page['cid'];?>">Remove</a></td>
      </tr>
      <?php }?>
      <?php 
	    	$total = 0;
	    	foreach($cart_detail as $page) {
	    		$total += $page['handset_price'];
	    		}?>
      <tr>  
             <td colspan="2" align="right"><b>Cart Total</b></td>  
             <td align="right"><b><?php echo $total; ?>&nbsp;/- INR</b></td>  
             <td><form action="#" method="post">
                
				<a href="<?php echo base_url('Dashio_Store_Controller/pay')?>" name="Place Order" class="button btn btn-success order_now"
                
				data-userid="<?php if(!empty($sign_id))
				   {
						echo $sign_id ;
					}
				    else
					{
						echo "<script>alert('login need to that');</script>";
				    }

				    ?>">Place Order</a>
																				
			</form>
		</td>

      </tr>
      <tr>
      	<td><b>Note</b>-  Before Place a order you need to check default address and shipping address added or not and then place your order order</td>
      </tr>
      <tr>
      <?php }else{?>
      	<td colspan="4"><p align="center">Your Cart Is Empty</p></td>
      <?php }?>
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
		$('.remove_cart').click(function(e){
			e.preventDefault();  
           var id = $(this).data('cartid');
           /*alert(id);*/
           if(confirm("Are you sure Remove this Item From Cart?"))
	    		{
	      			$.ajax({
			        url:"<?php echo base_url('Dashio_Store_Controller/deletedata'); ?>",
			        type:"POST",
			        dataType : "JSON",
			        data:{id:id},
				        success:function(data)
				        {
				         window.location.href = "<?php echo base_url('Dashio_Store_Controller/user_cart_fun'); ?>";	
				         if(data.message=="message")
				          {
				          $('#alert_action').fadeIn().html('<div class="alert alert-info">'+data.message+'</div>').delay(2000).fadeOut('show');
				               loadPagination(page_url =false, search_text ='',perpage =50);



				            }

		      		    }
	                });
	             }
			    else
			    {
			      return false;
			    }

		});

	});
</script>