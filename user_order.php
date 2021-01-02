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
				    <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio" checked=""><i></i><a href="<?php echo base_url('Dashio_Store_Controller/user_order'); ?>">My Order</a></label> </div></div>
					<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio" ><i></i><a href="<?php echo base_url('Dashio_Store_Controller/user_panel'); ?>">My Profile</a></label> </div></div>
					<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio" ><i></i><a href="<?php echo base_url('Dashio_Store_Controller/user_cart_fun');?>">My Cart</a></label> </div></div>		
					<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i><a href="<?php echo base_url('Dashio_Store_Controller/logout_account');?>">Logout</a></label> </div></div>		
					</form>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="col-md-8 products-right">
			<div class="sort-grid">
				<h2>My Order</h2>            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Brand Name</th>
        <th>Model No</th>
        <th>Price</th>
        <th>Shipping Address</th>
        <th></th>
      </tr>
    </thead>
    <tbody>

    	<?php 
    	if(!empty($user_order))
    	{
        $total_amount=$user_order[0]['total_amount'];
    	foreach($user_order as $page) {
    	$handset_name_p=$page['productinfo'];
          $handset_array =explode("__",$handset_name_p
          );
          ?>
      <tr>
      	
        <td align="right"><?php echo $page['handset_name'];?></td>
         <td align="right"><?php echo $page['model_no'];?></td>
        
        <td align="right"><?php echo $page['handset_price'];?>/-</td>
        <td align="left"><?php echo $page['address1'];?>/-</td>
        <td><a href="#" class="btn btn-danger remove_cart">Cancel</a></td>
      </tr>
      <?php }?>
            <tr>  
             <td colspan="2" align="right"><b>Order Total</b></td> 
             <td colspan="1" align="right"><b><?php echo $total_amount?></b></td>  
             
		</td>

      </tr>
      
      <tr>
      <?php }else{?>
      	<td colspan="4"><p align="center">Your Order Panel Empty</p></td>
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

