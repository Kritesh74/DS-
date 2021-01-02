<?php
      class Dashio_Store_Model extends CI_model
      {


   /*Customer Activity Function*/

     public function insert_customer_data($data)
        {	
              if($this->db->insert('customer_act',$data))
              {
                return 1;
              }
              else
              {
                return 0;
              }
        	
        }

      public function get_customer_data()
      {
      
      
          $this->db->select("customer_act.*,brand.brand_name as brand_name,handset_model.model_no as model_no");
          $this->db->from("customer_act");
          $this->db->join("brand","customer_act.handset_name=brand.bid","inner");
          $this->db->join("handset_model","customer_act.model_no=handset_model.mid","inner");
          $this->db->where("customer_act.status=1");
          $q=$this->db->get();

        
              // cc
        //select * from empdata where status='1';
          return $q->result_array();
     } 

     /*Customer Activity Function END*/

     /*Product Activity Function*/

     public function get_customer_pagination($limit, $offset, $search, $count)
    {
              $this->db->select("customer_act.*,brand.brand_name as brand_name,handset_model.model_no as model_no");
              $this->db->from("customer_act");
              $this->db->join("brand","customer_act.handset_name=brand.bid","inner");
              $this->db->join("handset_model","customer_act.model_no=handset_model.mid","inner");
              if($search)
              {
                  $this->db->where("customer_act.customer_name LIKE '%$search%'");
              }
              if($count)
              {
                return $this->db->count_all_results();
              }
              else 
              {
                $this->db->limit($limit, $offset);
                $query = $this->db->get();
                  //exit($this->db->last_query());
                if($query->num_rows() > 0) {
                  return $query->result();
                }
              }
        
        return array();
    }

      public function insert_products_data($data)
      { 

              if($this->db->insert('add_product',$data))
              {
                
                return 1;
              }
              else
              {
                return 0;
              }
        
      }
      public function get_product_list_data()
      {
      
      
          $this->db->select("add_product.*,brand.brand_name as brand_name,handset_model.model_no as model_no");
          $this->db->from("add_product");
          $this->db->join("brand","add_product.handset_name=brand.bid","inner");
          $this->db->join("handset_model","add_product.model_no=handset_model.mid","inner");
          $this->db->join("add_stock","add_product.model_no=handset_model.mid","inner");
          $this->db->where("add_product.status=1");
          $q=$this->db->get();
          return $q->result_array();
     } 

     public function get_products_pagination($limit, $offset, $search, $count)
     {

                $this->db->select("add_product.*,brand.brand_name as brand_name,handset_model.model_no as model_no");
                $this->db->from("add_product");
                $this->db->join("brand","add_product.handset_name=brand.bid","inner");
                $this->db->join("handset_model","add_product.model_no=handset_model.mid","inner");
                if($search){
                    $this->db->where("add_product.color LIKE '%$search%'");
                }
                if($count){
                  return $this->db->count_all_results();
                }
                else {
                  $this->db->limit($limit, $offset);
                  $query = $this->db->get();
                    if($query->num_rows() > 0) {
                      return $query->result();
                  }
                }
          
                return array();
     }
      /*Product Activity Function END*/

       /*Stock Activity Function*/

      public function insert_stock_data($data)
      { 
              if($this->db->insert('add_stock',$data))
              {
                return 1;
              }
              else
              {
                return 0;
              }
         
       }
       public function get_addstock_data()
      {
      
        
           $this->db->select("add_stock.*,brand.brand_name as brand_name,handset_model.model_no as model_no");
           $this->db->from("add_stock");
           $this->db->join("brand","add_stock.handset_name=brand.bid","inner");
           $this->db->join("handset_model","add_stock.model_no=handset_model.mid","inner");
           $this->db->where("add_stock.status=1");
           $q=$this->db->get();
           /*exit($this->db->last_query());*/

              // cc
        //select * from empdata where status='1';
         return $q->result_array();
      }

      public function get_stock_pagination($limit, $offset, $search, $count)
    {

               $this->db->select("add_stock.*,brand.brand_name as brand_name,handset_model.model_no as model_no");
               $this->db->from("add_stock");
               $this->db->join("brand","add_stock.handset_name=brand.bid","inner");
               $this->db->join("handset_model","add_stock.model_no=handset_model.mid","inner");
                if($search){
                    $this->db->where("add_stock.color LIKE '%$search%'");
                }
                if($count)
                {
                  return $this->db->count_all_results();
                }
                else 
                {
                  $this->db->limit($limit, $offset);
                  $query = $this->db->get();
                  if($query->num_rows() > 0) {
                    return $query->result();
                  }
                }
          
                return array();
    }
      /*Stock Activity Function END*/

      /*Brand Activity Function*/

      public function insert_brand_data($data)
      {	
              
            if($this->db->insert('brand',$data))
              {
                return 1;
              }
              else
              {
                return 0;
              }
           
      	
      }

       public function get_handset()
      {
                $q=$this->db->get("brand");
                //exit($this->db->last_query());
                return $q->result_array();            
       }

       /*Brand Activity Function END*/

       /*Model NO Activity Function*/

      public function insertmodel($data1)
      {    
              
          
           if($this->db->insert('handset_model',$data1))
            {
              return 1;
            }
            else
            {
              return 0;
            }
           
        
      }
	   
	    public function get_model_no($brand_id)
      {
          $this->db->where("bid",$brand_id);
          $q=$this->db->get("handset_model");
          return $q->result_array();
      }

      /*Model NO Activity Function END*/

      /*Price List Activity Function*/
      public function get_price($model_no)
      {    
           $this->db->select("s_price");
           $this->db->where("model_no",$model_no);
           $q=$this->db->get("add_stock");
           return $q->result_array();
      }
       /*Price List Activity Function END*/

        /*Color Activity Function*/
      public function get_color($model_no)
      {    
           $this->db->select("color");
           $this->db->where("model_no",$model_no);
           $q=$this->db->get("add_stock");
          return $q->result_array();
     }
         /*Price List Activity Function END*/

       /*Stock Quantity Activity Function*/
     public function get_qunatity($model_no)
     {    
           $this->db->select("quantity,sid");
           $this->db->where("model_no",$model_no);
           $q=$this->db->get("add_stock");
           return $q->result_array();
    }
     /*Stock Quantity Activity Function END*/

      /*Basic Detail Activity Function*/

     public function get_basic_detail()
         {    
            $q=$this->db->get("basic_detail");
            return $q->result_array();  
      }
 // Get About Us
      public function get_about_us()
         {    
            $q=$this->db->get("about_us");
            return $q->result_array();  
      } 

       /*Stock Quantity Activity Function END*/

        /*Stock Update Qunatity Activity Function */

     public function updaterecords($id,$data1)
      {
            
           if($this->db->set($data1)->where('id', $id)->update('basic_detail'))
            
                {
                  return true;
               }
               else
                {
                  return false;
                }
      }
      //User Personl Detail
      public function update_user_personal($id,$data1)
      {
            
           if($this->db->set($data1)->where('id', $id)->update('basic_detail'))
            
                {
                  return true;
               }
               else
                {
                  return false;
                }
      }

      //Update About Us Function
       public function updateaboutus($id,$data1)
      {
            
           if($this->db->set($data1)->where('id', $id)->update('about_us'))
            
                {
                  return true;
               }
               else
                {
                  return false;
                }
      }

      public function update_data($sid,$data1)
      {
            
           if($this->db->set($data1)->where('sid', $sid)->update('add_stock'))
           
                {
                  return true;
               
               }
               else
                {
                  return false;
                }
      }
     /*Stock Update Qunatity Activity Function END */
      
     

// Website Content Fetch Function
     

     public function get_product_data($pid)
     {
          
          
              $this->db->select("add_product.*,brand.brand_name as brand_name,handset_model.model_no as model_no,add_stock.s_price as s_price,handset_model.mid as stock_model_no,add_stock.a_price as a_price");
              $this->db->from("add_product");
              $this->db->join("brand","add_product.handset_name=brand.bid","inner");
              $this->db->join("handset_model","add_product.model_no=handset_model.mid","inner");
              $this->db->join("add_stock","add_product.model_no=add_stock.model_no","inner");
              $this->db->where("add_product.status=1 and add_product.handset_name=$pid");
              $q=$this->db->get();
              return $q->result_array();
      } 
      
      public function get_product_data_list($mid)
      {
          
          
              $this->db->select("add_product.*,brand.brand_name as brand_name,handset_model.model_no as model_no,add_stock.s_price as s_price,handset_model.mid as stock_model_no,add_stock.a_price as a_price");
             $this->db->from("add_product");
             $this->db->join("brand","add_product.handset_name=brand.bid","inner");
             $this->db->join("handset_model","add_product.model_no=handset_model.mid","inner");
             $this->db->join("add_stock","add_product.model_no=add_stock.model_no","inner");
             $this->db->where("add_product.status=1 and add_product.model_no=$mid");
             $q=$this->db->get();
             return $q->result_array();
      } 

     //User Sign Up Function 

      public function insert_sign_up_data($data)
      {
              if($this->db->insert('sign_up',$data))
              {
                return 1;
              }
              else
              {
                return 0;
              }
      }
      
      public function get_user_name($sign_id)
      {
               $this->db->where("sign_id",$sign_id);
                $q=$this->db->get("sign_up");
                //exit($this->db->last_query());
                return $q->result_array();         
       }
       public function get_login_detail($email,$password)
       {
        /*$this->db->where('user_email', $email);
        $this->db->where('user_password', $password);
        $query = $this->db->get('sign_up');*/
        $query = $this->db->get_where('sign_up', array('user_email'=>$email, 'user_password'=>$password));

       // exit($this->db->last_query());

        if($query->num_rows() == 1) {
            return $query->row();
        }
        else
        {

          if($query->num_rows() == 1) {
              return $query->row();
          } 
        }

        return false;
       }

       //Insert Contact Page Detail

      public function insert_contact_detail($data)
      {

          if($this->db->insert('contact',$data))
              {
                return 1;
              }
              else
              {
                return 0;
              }

      } 


      //Cart Detail Insert Function

      public function insert_cart_data($data)
        { 
              if($this->db->insert('user_cart_table',$data))
              {
                return 1;
              }
              else
              {
                return 0;
              }
          
        }

 // Fetch Cart Data
        public function get_cart_data()
        {
          

            if($this->session->userdata('sign_id')) 
            {
            $username = $this->session->userdata('sign_id');
            /*$q=$this->db->get("user_cart_table")=>where('sign_id'=$username);*/
            $q = $this->db->get_where('user_cart_table', array('sign_id'=>$username,'status'=>'1'));
            return $q->result_array();


        }

       } 

  // Delete Data Cart
  
  public function delete_cart($id)
     {
         $this->db->where('cid', $id);
        if($this->db->update('user_cart_table',array('status'=>0)))
        //exit($this->db->last_query());
        {
          return true;
        }
        else
        {
          return false;
        }

     }   

   //Update User Personal Detail
   public function update_user_p($sign_id,$post)
     {    
           $this->db->set($post);
           $this->db->where("sign_id",$sign_id);
           if($this->db->update("sign_up"))
           //exit($this->db->last_query());
           {
              return true;
            }
            else
            {
              return false;
            }
           
    }

    //Get Sign Up Detail 
    public function get_update_details()
      {    
            $q=$this->db->get("sign_up");
            return $q->result_array();  
      } 

      //After Payment Insert Data of User Function

      public function insert_order_detail($data)
        { 
              if($this->db->insert('user_order',$data))
              {
                return 1;
              }
              else
              {
                return 0;
              }
          
        }

        //Admin Login Data Function

        public function get_admin_login_data($data)
        {
             
            $query=$this->db->get_where('admin_login',array('admin_name'=>$data['admin_name'],'admin_password'=>$data['admin_password'])); 
           //exit($this->db->last_query()); 
                
            if($query->num_rows())
            {
              return $query->row();
            }
            else
            {
              return false;
            }
           /* $query = $this->db->where(['admin_name'=>$admin_name,'password'=>$password])->get('admin_login');
            */
        }

    //Update Add Product Status
    public function update_status($tb,$where,$set)
    {
        if($set['status']==1)
        {
                $set['status']=0;
        }
        else
        {
            $set['status']=1;
        }
      if($this->db->set($set)->where($where)->update($tb))
      {

          return true;
      }
      else
      {
        return false;
       }
    }
           
  // Check User Already Login Or not
    public function get_check_login($sign_id)
    {

         $this->db->where('sign_id', $sign_id);
        if($this->db->update('sign_up',array('login_check'=>1)))
        //exit($this->db->last_query());
        {
          return true;
        }
        else
        {
          return false;
        }
    }
    public function get_user_order()
    {
            if($this->session->userdata('sign_id')) 
            {
            $sign_id = $this->session->userdata('sign_id');
            /*$q=$this->db->get("user_cart_table")=>where('sign_id'=$username);*/
           /* $q = $this->db->get_where('user_order', array('sign_id'=>$username,'status'=>'success'));*/
              /*"select user_cart_table.*,user_order.amount from user_cart_table  inner join user_order on user_cart_table.sign_id=user_order.sign_id WHERE user_cart_table.status=1";*/


              $this->db->select("user_cart_table.*,user_order.amount as total_amount,user_order.productinfo,user_order.address1");
              $this->db->from("user_cart_table");
              $this->db->join("user_order","user_cart_table.sign_id=user_order.sign_id","INNER");
              $this->db->where("user_cart_table.status='1' AND user_cart_table.sign_id=$sign_id");
              $res=$this->db->get();
            /*exit($this->db->last_query());*/
            return $res->result_array();
          }

    }

        
    //exit($this->db->last_query());
    

    }  
?>