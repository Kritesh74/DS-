<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Dashio_Store_Controller extends CI_controller
   {

/*------------------------------User Page Function-------------------------*/

      /*Load Model And Library*/ 

      public function __construct()
     {
          parent::__construct();
          $this->load->model('Dashio_Store_Model');
          $this->load->library('pagination');
        
     } 



        /*Load User Index Page*/  

      public function index()
      {
           
            $data['title']=$this->Dashio_Store_Model->get_basic_detail();
            $data['brand_list']=$this->Dashio_Store_Model->get_handset();
            $this->load->view('ucommon/uheader',$data);
            $this->load->view('user_webpage/index');
            $data['title']=$this->Dashio_Store_Model->get_basic_detail();
            $this->load->view('ucommon/ufooter',$data);
           
      }    

        /*Load User About Page*/  
      
      public function about_page()
      {
            $data['title']=$this->Dashio_Store_Model->get_basic_detail();
            $data['brand_list']=$this->Dashio_Store_Model->get_handset();
            $this->load->view('ucommon/uheader',$data);
            $data['about_title']=$this->Dashio_Store_Model->get_about_us();
            $this->load->view('user_webpage/about',$data);
            $data['title']=$this->Dashio_Store_Model->get_basic_detail();
            $this->load->view('ucommon/ufooter',$data);
            
      }   

         /*Load User Contact Page*/ 
      public function contact_page()
      {
              $data['title']=$this->Dashio_Store_Model->get_basic_detail();
              $data['brand_list']=$this->Dashio_Store_Model->get_handset();
              $this->load->view('ucommon/uheader',$data);
              $this->load->view('user_webpage/contact',$data);
              $data['title']=$this->Dashio_Store_Model->get_basic_detail();
              $this->load->view('ucommon/ufooter',$data);
            
      } 

        /*Product Detail Page*/  

      public function getdata()
      {
                       $pid=$this->uri->segment(3);
                       $data['title']=$this->Dashio_Store_Model->get_basic_detail();
                       $data['brand_list']=$this->Dashio_Store_Model->get_handset();
                       $this->load->view('ucommon/uheader',$data);
                       $editdb['page_list']=$this->Dashio_Store_Model->get_product_data($pid);
                      $this->load->view('user_webpage/product_detail_page',$editdb);
                      $data['title']=$this->Dashio_Store_Model->get_basic_detail();
                      $this->load->view('ucommon/ufooter',$data);
        }

         /*Singel Page */  

        public function get_single()
        {
                      $mid=$this->uri->segment(3);
                       $data['title']=$this->Dashio_Store_Model->get_basic_detail();
                       $data['brand_list']=$this->Dashio_Store_Model->get_handset();
                       $this->load->view('ucommon/uheader',$data);
                       $editdb['page_list']=$this->Dashio_Store_Model->get_product_data_list($mid);
                       $this->load->view('user_webpage/single',$editdb);
                       $data['title']=$this->Dashio_Store_Model->get_basic_detail();
                       $this->load->view('ucommon/ufooter',$data);
        }

                  //Website About Us Page Detail    
          public function update_about_detail()
          {

                $post=$this->input->post();
                 $data['title']=$this->Dashio_Store_Model->get_basic_detail(); 
                $data['about_title']=$this->Dashio_Store_Model->get_about_us();
                $this->load->view('common/header',$data);
                $this->load->view('pages/about_us');
                $this->load->view('common/footer');

        }  
          

      //User Cart Page Function    

      public function user_cart_fun()
      {
            $mid=$this->uri->segment(3);
            $data['title']=$this->Dashio_Store_Model->get_basic_detail();
            $data['brand_list']=$this->Dashio_Store_Model->get_handset();
            $this->load->view('ucommon/uheader',$data);
            $data['about_title']=$this->Dashio_Store_Model->get_about_us();
            $data['page_list']=$this->Dashio_Store_Model->get_product_data_list($mid);
            $data['cart_detail']=$this->Dashio_Store_Model->get_cart_data();
            
            $this->load->view('user_webpage/user_cart',$data);
            $data['title']=$this->Dashio_Store_Model->get_basic_detail();
            $this->load->view('ucommon/ufooter',$data);
            
      }

      //Add to cart item in user account function

      public function add_to_cart()
      {
           $post=$this->input->post();
           /*echo "<pre>";
           print_r($post);
           exit; */ 


                                if($result=$this->Dashio_Store_Model->insert_cart_data($post))
                                   {
                                      

                                          $sign_id = $this->session->userdata('sign_id');
                                            $this->db->select("*");
                                            $this->db->from("user_cart_table");
                                             $this->db->where("status=1 AND sign_id=".$sign_id);
                                            $res=$this->db->get();
                                            $result=$res->result_array();
                                            
                                               

                                                
                                                $this->session->set_userdata('cart_data',$result);

                                                echo json_encode( array('message'=>"Record Inserted Successfully"));
                                   }
                                   else
                                   {
                                            echo json_encode( array('message'=>"Fail"));
                                   }

                          

      }
   
   // Remove Item From Cart
      public function deletedata()
         {
           $post = $this->input->post();
           $id=$post['id'];
          
           if($this->Dashio_Store_Model->delete_cart($id))
           {

             $sign_id = $this->session->userdata('sign_id');
                        $this->db->select("*");
                        $this->db->from("user_cart_table");
                        $this->db->where("status=1 AND sign_id=".$sign_id);
                        $res=$this->db->get();
                        $result=$res->result_array();
                        /*echo "<pre>";
                        print_r($result);
                        exit;*/
    
                            
                         $this->session->set_userdata('cart_data',$result);

            $json = array('message' => " Delete Record Added Successfully");
              echo json_encode($json);

             // $this->load->view('company_emp/show');
             
           }
           else
           {
                 /*redirect("empcon/getdata");*/
                 $json = array('message' => " Delete Record Fail");
              echo json_encode($json);               
           }
       }    


       //User Panel Detail Function 

       public function user_personal_detail()
       {
          $post=$this->input->post();
          
          $id=$post['id'];
          unset($post['id'],$post['IsLive1'],$post['IsLive2'],$post['IsLive3']);

               if($detail['personal_detail']=$this->Dashio_Store_Model->update_user_p($id,$post))
               {
                        $this->db->select("*");
                        $this->db->from("sign_up");
                        $this->db->where("sign_id",$id);
                        $res=$this->db->get();
                        $result=$res->row();
                        

                        $this->session->set_userdata('sign_id',$result->sign_id);
                                   $this->session->set_userdata('user_name',$result->user_name);
                                   $this->session->set_userdata('user_mobile_num',$result->user_mobile_num);
                                    $this->session->set_userdata('user_d_address',$result->user_d_address);
                                    $this->session->set_userdata('user_s_address',$result->user_s_address);
                                    $this->session->set_userdata('user_email',$result->user_email);
                                    $this->session->set_userdata('user_password',$result->user_password);
                        echo json_encode( array('message'=>"Record Update Successfully"));
               }
               else
               {
                        echo json_encode( array('message'=>"Fail"));
               }
                              


       }

       //User Order Check Out Page

       public function check_out()
       {
                    $data['title']=$this->Dashio_Store_Model->get_basic_detail();
                    $data['brand_list']=$this->Dashio_Store_Model->get_handset();
                    $this->load->view('ucommon/uheader',$data);
                    $this->load->view('user_webpage/PayUMoney_form');
                    $data['title']=$this->Dashio_Store_Model->get_basic_detail();
                    $this->load->view('ucommon/ufooter',$data);
       }


       //User Payment Success Function
        
        public function success()
        {
          $post=$this->input->post();
         
          $email_p=$post['email'];
          $email_array =explode("__",$email_p
          );
          $email =$email_array[0];
          $sign_id =$email_array[1];
          $post['sign_id']=$sign_id;
          $address1=$post['address1'];
          $handset_name_p=$post['productinfo'];
          $handset_array =explode("__",$handset_name_p
          );
          $productinfo =$handset_array[0];
          $model_no =$handset_array[1]; 
          $post['model_no']=$model_no;       
          $data['title']=$this->Dashio_Store_Model->get_basic_detail();
          $data['brand_list']=$this->Dashio_Store_Model->get_handset();
          $this->load->view('ucommon/uheader',$data);
          unset($post['isConsentPayment'],$post['mihpayid'],$post['unmappedstatus'],$post['addedon'],$post['key'],$post['lastname'],$post['address2'],$post['city'],$post['state'],$post['country'],$post['zipcode'],$post['udf1'],$post['udf2'],$post['udf3'],$post['udf4'],$post['udf5'],$post['udf6'],$post['udf7'],$post['udf8'],$post['udf9'],$post['udf10'],$post['hash'],$post['field1'],$post['field2'],$post['field3'],$post['field4'],$post['field5'],$post['field6'],$post['field7'],$post['field8'],$post['field9'],$post['giftCardIssued'],$post['PG_TYPE'],$post['bank_ref_num'],$post['bankcode'],$post['error'],$post['error_Message'],$post['cardnum'],$post['cardhash'],$post['amount_split'],$post['payuMoneyId'],$post['discount']);

          $this->Dashio_Store_Model->insert_order_detail($post);
          $this->load->view("payumoney/success");
          $data['title']=$this->Dashio_Store_Model->get_basic_detail();
          $this->load->view('ucommon/ufooter',$data);
        }

        //User Payment Fail Page Function

        public function failure()
        {
          $data['title']=$this->Dashio_Store_Model->get_basic_detail();
          $data['brand_list']=$this->Dashio_Store_Model->get_handset();
          $this->load->view('ucommon/uheader',$data);
          $this->load->view("payumoney/failure");
          $data['title']=$this->Dashio_Store_Model->get_basic_detail();
          $this->load->view('ucommon/ufooter',$data);
        }
        public function pay()
        {
          $data['title']=$this->Dashio_Store_Model->get_basic_detail();
          $data['brand_list']=$this->Dashio_Store_Model->get_handset();
          $this->load->view('ucommon/uheader',$data);
          $sign_id = $this->session->userdata('sign_id');
                        $this->db->select("*");
                        $this->db->from("user_cart_table");
                        $this->db->where("status=1 AND sign_id=".$sign_id);
                        $res=$this->db->get();
                        $result=$res->result_array();
                        /*echo "<pre>";
                        print_r($result);
                        exit;*/
    
                            
                         $this->session->set_userdata('cart_data',$result);
          $this->load->view("payumoney/PayUMoney_form");
          $data['title']=$this->Dashio_Store_Model->get_basic_detail();
          $this->load->view('ucommon/ufooter',$data);
        }

                    //User Sign up Function
          public function user_sign_up()
          {
              
               $post= $this->input->post();

               if($post)
               {
                /*echo "<pre>";
               print_r($post);
               exit;*/
                      $this->form_validation->set_rules('user_name','Enter User Name', 'required');
                     $this->form_validation->set_rules('user_email','Enter Email Id', 'required|valid_email|is_unique[sign_up.user_email]');
                     $this->form_validation->set_rules('user_password', 'Enter Password', 'required');
                     $this->form_validation->set_rules('c_u_password', 'Confirm Password', 'required|matches[user_password]');

                      if ($this->form_validation->run() == FALSE)
                      {
                                            $json = array(
                          'user_name' => form_error('user_name', '<p class="mt-3 text-danger">', '</p>'),                 
                            'user_email' => form_error('user_email', '<p class="mt-3 text-danger">', '</p>'),
                           'user_password' => form_error('user_password', '<p class="mt-3 text-danger">', '</p>'),
                            'c_u_password' => form_error('c_u_password', '<p class="mt-3 text-danger">', '</p>')
                            
                        );
                         echo json_encode($json);       

                      }
                      else
                      {

                        if($add_user=$this->Dashio_Store_Model->insert_sign_up_data($post))
                          {
                            echo json_encode(array("message"=>"Record Inserted Successfully","status"=>"1"));  

                          }else
                          {
                             //
                            echo json_encode(array("message"=>"Fail","status"=>"0"));
                          }
                      }    

               }   


             
            }

            //User Sign In Function

            public function user_sign_in()
            {
              
                  $post =$this->input->post();

               if(!empty($post))
                 {
                    $this->form_validation->set_rules('user_email', 'Username', 'required');
                     $this->form_validation->set_rules('user_password', 'Password', 'required',
                                      array('required' => 'You must provide a %s.')
                              );
                      if($this->form_validation->run() == FALSE)
                      {
                            $json = array(
                
                                'user_email' => form_error('user_email', '<p class="mt-3 text-danger">', '</p>'),
                               'user_password' => form_error('user_password', '<p class="mt-3 text-danger">', '</p>')
                                
                            );
                             echo json_encode($json);
                      }
                      else
                      {
                         $user_email = $this->input->post('user_email');
                         $user_password = $this->input->post('user_password');

                         if($result=$this->Dashio_Store_Model->get_login_detail($user_email,$user_password))
                         {
                             
                               if($result->user_email==$user_email && $result->user_password==$user_password && $result->login_check=='1')
                               {   
                                   
                                    $this->session->set_userdata('sign_id',$result->sign_id);
                                    $sign_id = $result->sign_id;                                    
                                    $this->db->where("sign_id",$sign_id);
                                    $this->db->update("sign_up",array('login_check'=>0));

                                    $this->session->set_userdata('sign_id',$result->sign_id);
                                    $this->session->set_userdata('user_name',$result->user_name);
                                    $this->session->set_userdata('user_mobile_num',$result->user_mobile_num);
                                    $this->session->set_userdata('user_d_address',$result->user_d_address);
                                    $this->session->set_userdata('user_s_address',$result->user_s_address);
                                    $this->session->set_userdata('user_email',$result->user_email);
                                    $this->session->set_userdata('user_password',$result->user_password);
                                     echo json_encode(array("message"=>"User Login Successfully","status"=>"1"));
                                }
                                else 
                                {  

                                  if($result->user_email==$user_email && $result->user_password==$user_password && $result->login_check=='0')
                                    {
                                      
                                        echo json_encode(array("message"=>"User Login Already in Other Device","status"=>"0"));
                                    }
                                    
                                 }   

                          }
                          else
                          {
                                    
                              echo json_encode(array("message"=>"Fail","status"=>"3"));

                          }
                            

                          
                        } 
                   }                    
                
            } 

         //User Order
         public function user_order()
        {

            $data['title']=$this->Dashio_Store_Model->get_basic_detail();
            $data['brand_list']=$this->Dashio_Store_Model->get_handset();
            $this->load->view('ucommon/uheader',$data);
            $data['user_order']=$this->Dashio_Store_Model->get_user_order();
            $this->load->view('user_webpage/user_order',$data);
            $data['title']=$this->Dashio_Store_Model->get_basic_detail();
            $this->load->view('ucommon/ufooter',$data);
        }     

         //Load User Panel   
        public function user_panel()
        {

            $data['title']=$this->Dashio_Store_Model->get_basic_detail();
            $data['brand_list']=$this->Dashio_Store_Model->get_handset();
            
            $this->load->view('ucommon/uheader',$data);
            $data['personal_detail']=$this->Dashio_Store_Model->get_update_details();
            $this->load->view('user_webpage/user_panel');
            $data['title']=$this->Dashio_Store_Model->get_basic_detail();
            $this->load->view('ucommon/ufooter',$data);
        }  


        //User Logout Account Function
        public function logout_account()
         {
                $sign_id = $this->session->userdata('sign_id');
                $this->db->where("sign_id",$sign_id);
               $this->db->update("sign_up",array('login_check'=>1));   
               $this->session->unset_userdata('sign_id');
               $this->session->unset_userdata('user_name');
               $this->session->unset_userdata('user_email');
               return redirect("Dashio_Store_Controller"); 
               $this->session->sess_destroy();
            
            
         } 

         //User Contact Page Function

        public function user_contact()
        {
          $post=$this->input->post();
          if($post)
          {

               $this->form_validation->set_rules('u_name','Enter User Name', 'required');
               $this->form_validation->set_rules('u_email','Enter Email Id', 'required');
               $this->form_validation->set_rules('u_subject','Enter Subject', 'required');
               $this->form_validation->set_rules('u_message','Enter Message', 'required');
                      if ($this->form_validation->run() == FALSE)
                      {
            
                          $json = array(
                'u_name' => form_error('u_name', '<p class="mt-3 text-danger">', '</p>'),                 
                  'u_email' => form_error('u_email', '<p class="mt-3 text-danger">', '</p>'),
                 'u_subject' => form_error('u_subject', '<p class="mt-3 text-danger">', '</p>'),
                  'u_message' => form_error('u_message', '<p class="mt-3 text-danger">', '</p>')
                  
              );
               echo json_encode($json);         
                                     

                      }
                      else
                      {   

                        if($add_contact=$this->Dashio_Store_Model->insert_contact_detail($post))
                        {
                            echo json_encode(array("message"=>"Record Inserted Successfully","status"=>"1"));  

                        }else
                        {
                        
                          echo json_encode(array("message"=>"Fail","status"=>"0"));
                        }

                      }
             }
          

               
          }


  

   /*------------------------Admin Page Function-----------------------------------------------*/

        /*Admin Index Page*/

       	public function admin_index()
        {
         		$data['title']=$this->Dashio_Store_Model->get_basic_detail();
         		$this->load->view('common/header',$data);
         		$this->load->view('pages/index');
         		$this->load->view('common/footer');
         }

        /*Admin Add Product Detail Page*/

        public function dashio_product_detail()
        {
            $data['title']=$this->Dashio_Store_Model->get_basic_detail();
            $this->load->view('common/header',$data);
            if($handset_result=$this->Dashio_Store_Model->get_handset())          
            {  
                     $this->load->view('pages/add_product',['hr'=>$handset_result]);

            }
            else
            {
                     $this->load->view('pages/add_product');
            }
            
            $this->load->view('common/footer');
        }

         //Insert Product Detail

        public function insertproduct()
        {

         $post= $this->input->post();
         
         if($post)
         { 
               

               $this->form_validation->set_rules('model_no','Enter model_no', 'required|is_unique[add_product.model_no]');
               $this->form_validation->set_rules('color','Enter model_no', 'required');
                       if ($this->form_validation->run() == FALSE)
                              {
                                            
                                 $data['title']=$this->Dashio_Store_Model->get_basic_detail();
                                  $this->load->view('common/header',$data);
                                       if($handset_result=$this->Dashio_Store_Model->get_handset())          
                                          {  
                                             $this->load->view('pages/add_customer',['hr'=>$handset_result]);

                                           }
                                           else
                                           {
                                                  $this->load->view('pages/add_customer');
                                           }
                                  $this->load->view('common/footer');           

                              }
                              else
                              {

                                
                  
                                  if(isset($_FILES['file']['name'][0]))
                                      {
                                        

                                        $file_count= count($_FILES['file']['tmp_name']);
                                        $file =$_FILES['file'];
                                        $files = array();
                                        $images="";
                                       
                                        $p=0;
                                              for($i=0;$i<$file_count;$i++)
                                              {
                                                    $image =md5(date("Y-m-d h:i:s")).$i.".jpg";
                                                    if($file['type'][$i]!="image/jpeg" && $file['type'][$i]!="image/png" && $file['type'][$i]!="image/jpg"&& $file['type'][$i]!="image/gif")
                                                    {
                                                        $p=1;
                                                    }
                                                    else
                                                    {
                                                        $this->resizeImage($file['tmp_name'][$i],"./p_image_upload/".$image);
                                                    }
                                                    $images=$images.$image.",";
                                                }
                                         
                                                if($p==1)
                                                {
                                                    $error = array('error' => 'Please Image Type jpg OR jpeg Or PNG OR GIF');
                                            echo json_encode($error);
                                                  
                                                }
                                         
                                      }
                                      else
                                      {
                                        $images="";
                                      }
                        
                                        if($p==0)
                                        {
                                          $post['file']=$images;

                                    if($add_customer=$this->Dashio_Store_Model->insert_products_data($post))
                                               {
                                                  echo json_encode($add_customer);
                                               }
                                        }else
                                        {
                                          $json=array('error'=>'Please Select JPG image select');
                                          echo json_encode($json);
                                        
                                        }  
                                }          
          
             }
       }   

//Prodcut Image Resize Function

          public function resizeImage($filename,$newimagename)
          {
                      $source_path =   $filename;
                      $target_path = $newimagename;
                      $this->load->library('image_lib');
                      $config_manip = array(
                            'image_library' => 'gd2',
                            'source_image' => $source_path,
                            'new_image' => $target_path,
                            'quality'=>"80%",
                            'maintain_ratio' => TRUE,
                            'width'         => 500,
                            'height'       => 500
                      );

                      $this->image_lib->clear();
                      $this->image_lib->initialize($config_manip);
                      if(!$this->image_lib->resize())
                      {
                        echo $this->image_lib->display_errors();
                      }
                      $d=$this->image_lib->display_errors();
                      $this->image_lib->clear();
          }

      // Manage Prodcut Detail

         public function dashio_manage_product()
         {
                  $data['title']=$this->Dashio_Store_Model->get_basic_detail();
                  $this->load->view('common/header',$data);
                  $customer['cs']=$this->Dashio_Store_Model->get_product_list_data();
                  $this->load->view('pages/manage_product',$customer);
                  $this->load->view('common/footer');
              
          }  
     // Product Pagination Function


         public function pagination_list_product($offset=null)
         {
                 
                  
                  $search= $this->input->post('search_key');
                  if($this->input->post('perpage'))
                  {
                      $limit=$this->input->post('perpage');
                  }
                  else
                  {
                           $limit = 5;  
                }
                  
                 
                  $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                         
                  $config['base_url'] = base_url('Dashio_Store_Controller/pagination_list_stock');
                  $config['total_rows'] = $this->Dashio_Store_Model->get_products_pagination($limit, $offset, $search, $count=true);
                            $config['per_page'] =  $limit;
                            $config["uri_segment"] = 3;
                            $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
                            $config['full_tag_close']   = '</ul></nav></div>';
                            $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
                            $config['num_tag_close']    = '</span></li>';
                            $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link"  id="currentpage">';
                            $config['cur_tag_close']    = '<span class="sr-only"></span></span></li>';
                            $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
                            $config['next_tag_close']  = '<span aria-hidden="true"></span></span></li>';
                            $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
                            $config['prev_tag_close']  = '</span></li>';
                            $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
                            $config['first_tag_close'] = '</span></li>';
                            $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
                            $config['last_tag_close']  = '</span></li>';
               
                  
                    $this->pagination->initialize($config);     
                    $data['result'] = $this->Dashio_Store_Model->get_products_pagination($limit, $offset, $search, $count=false);
                    $data['pagination'] = $this->pagination->create_links();
                 
                 
                  
                     echo json_encode($data);


          } 
     


        //Add Customer Function Only Page Load 

       	public function dashio_add_customer()
        {
         		$data['title']=$this->Dashio_Store_Model->get_basic_detail();
         		$this->load->view('common/header',$data);
                 if($handset_result=$this->Dashio_Store_Model->get_handset())          
                    {  
                       $this->load->view('pages/add_customer',['hr'=>$handset_result]);

                     }
                     else
                     {
           	               	$this->load->view('pages/add_customer');
                     }
         		$this->load->view('common/footer');      
         		
        }

        /*Insert Customer Detail*/

       public function insertrecord()
       {

               $post= $this->input->post();
               if($add_customer=$this->Dashio_Store_Model->insert_customer_data($post))
               {
                  echo json_encode($add_customer);
               }

               
        
        }

        
    //Customer Detail View Function

        public function dashio_manage_customer()
        { 
           		   $data['title']=$this->Dashio_Store_Model->get_basic_detail();
           		   $this->load->view('common/header',$data);
                 $customer['cs']=$this->Dashio_Store_Model->get_customer_data();
                 $this->load->view('pages/manage_customer',$customer);
           		   $this->load->view('common/footer');
           		
        }
         //Customer Pagination Function   

        public function pagination_list($offset=null)
        {
                   
                    
                    $search= $this->input->post('search_key');
                      if($this->input->post('perpage'))
                      {
                          $limit=$this->input->post('perpage');
                      }
                      else
                      {
                               $limit = 5;  
                      }
                    
                  
                   $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                           
                    $config['base_url'] = base_url('Dashio_Store_Controller/pagination_list');
                    $config['total_rows'] = $this->Dashio_Store_Model->get_customer_pagination($limit, $offset, $search, $count=true);
                              $config['per_page'] =  $limit;
                              $config["uri_segment"] = 3;
                              $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
                              $config['full_tag_close']   = '</ul></nav></div>';
                              $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
                              $config['num_tag_close']    = '</span></li>';
                              $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link"  id="currentpage">';
                              $config['cur_tag_close']    = '<span class="sr-only"></span></span></li>';
                              $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
                              $config['next_tag_close']  = '<span aria-hidden="true"></span></span></li>';
                              $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
                              $config['prev_tag_close']  = '</span></li>';
                              $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
                              $config['first_tag_close'] = '</span></li>';
                              $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
                              $config['last_tag_close']  = '</span></li>';
                 
                    
                      $this->pagination->initialize($config);
                            
                          
                      $data['result'] = $this->Dashio_Store_Model->get_customer_pagination($limit, $offset, $search, $count=false);
                      $data['pagination'] = $this->pagination->create_links();
                   
                   
                   
                       echo json_encode($data);


           }               

      //Add Stock Function Only Page Load

         public function dashio_add_stock()
         {
           		$data['title']=$this->Dashio_Store_Model->get_basic_detail();
           		$this->load->view('common/header',$data);
           		if($handset_result=$this->Dashio_Store_Model->get_handset())          
                    {  
                       $this->load->view('pages/add_stock',['hr'=>$handset_result]);

                     }
              else
                     {
                            $this->load->view('pages/add_stock');
                     }       
           		$this->load->view('common/footer');
           		
         }

    //Add Stock Function 

        public function add_stock()
        {
             $post= $this->input->post();
             if($add_st=$this->Dashio_Store_Model->insert_stock_data($post))
             {
                echo json_encode($add_st);
             }


        }

        // Add Stcok Detail View Page
        public function dashio_manage_stock()
        {
         		$data['title']=$this->Dashio_Store_Model->get_basic_detail();
         		$this->load->view('common/header',$data);
         		$stock['st']=$this->Dashio_Store_Model->get_addstock_data();
               $this->load->view('pages/manage_stock',$stock);
         		$this->load->view('common/footer');
         		
        }
  
  // Stock Pagination Function

        public function pagination_list_stock($offset=null)
        {
                  
                  $search= $this->input->post('search_key');
                    if($this->input->post('perpage'))
                    {
                        $limit=$this->input->post('perpage');
                    }
                    else
                    {
                             $limit = 5;  
                    }
                  
                 $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                         
                  $config['base_url'] = base_url('Dashio_Store_Controller/pagination_list_stock');
                  $config['total_rows'] = $this->Dashio_Store_Model->get_stock_pagination($limit, $offset, $search, $count=true);
                            $config['per_page'] =  $limit;
                            $config["uri_segment"] = 3;
                            $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
                            $config['full_tag_close']   = '</ul></nav></div>';
                            $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
                            $config['num_tag_close']    = '</span></li>';
                            $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link"  id="currentpage">';
                            $config['cur_tag_close']    = '<span class="sr-only"></span></span></li>';
                            $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
                            $config['next_tag_close']  = '<span aria-hidden="true"></span></span></li>';
                            $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
                            $config['prev_tag_close']  = '</span></li>';
                            $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
                            $config['first_tag_close'] = '</span></li>';
                            $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
                            $config['last_tag_close']  = '</span></li>';
               
                  
                    $this->pagination->initialize($config);
                          
                        
                    $data['result'] = $this->Dashio_Store_Model->get_stock_pagination($limit, $offset, $search, $count=false);
                    $data['pagination'] = $this->pagination->create_links();
                   
                   
                    
                     echo json_encode($data);


         } 
    
            //Add Brand Function Only Page Load  
             
        public function dashio_add_brand()
        {
           		$data['title']=$this->Dashio_Store_Model->get_basic_detail();
           		$this->load->view('common/header',$data);
           		if($handset_result=$this->Dashio_Store_Model->get_handset())          
                    {  
                       $this->load->view('pages/add_brand',['hr'=>$handset_result]);

                     }
                     else
                     {
                         $this->load->view('pages/add_brand');
                     }
           		$this->load->view('common/footer');
           		
       }

            //Add Brand Function 
      public function add_brand()
      {
                 $post=$this->input->post();
                 if($post)
                 {

                  $this->form_validation->set_rules('brand_name','Enter Brand Name', 'required|alpha|is_unique[brand.brand_name]');
                  if ($this->form_validation->run() == FALSE)
                      {
                                    
                            $data['title']=$this->Dashio_Store_Model->get_basic_detail();
                              $this->load->view('common/header',$data);
                              if($handset_result=$this->Dashio_Store_Model->get_handset())          
                                    {  
                                       $this->load->view('pages/add_brand',['hr'=>$handset_result]);

                                     }
                                   else
                                   {
                                       $this->load->view('pages/add_brand');
                                   }
                            $this->load->view('common/footer');         

                       }
                          
                      else
                      {
                       if($add_brand=$this->Dashio_Store_Model->insert_brand_data($post))
                           {
                               echo json_encode($add_brand);
                              
                           }
                      }     
                  }   

       }
      
                  //Add Brand Detail View Page
       public function dashio_manage_brand()
       {
                        $data['title']=$this->Dashio_Store_Model->get_basic_detail();
                        $this->load->view('common/header',$data);
                        $brand['ht']=$this->Dashio_Store_Model->get_handset();
                        $this->load->view('pages/manage_brand',$brand);
                        $this->load->view('common/footer');
                    
        }   

                    //Add Model Function 
        public function add_model_no()
        {
                        $post=$this->input->post();
                        if($add_model=$this->Dashio_Store_Model->insertmodel($post))
                           {
                               echo json_encode($add_model);
                           }

        }
              //Fetch Model No List
        public function fetch_model_no()
        {
                    $post=$this->input->post('brand_id');         
                    $brand_result=$this->Dashio_Store_Model->get_model_no($post);
                    $output="<select value=''>-Select City-";
                       foreach ($brand_result as $row) 
                        {
                           $output.="<option value='$row[mid]'>$row[model_no]</option>";
                        }
                    echo $output.="</select>";
                 
                  
          }

               //Update Stcok Quantity   
          public function update_stock_quantity()
          {
                $post=$this->input->post('mid');
                $update=$this->input->post('update_quantity');
                $data=$this->Dashio_Store_Model->get_qunatity($post);
                $upadate_quan=$data[0]['quantity'];
                $sid=$data[0]['sid'];
                $total_quantity=$upadate_quan+$update;
                $data1['quantity']=$total_quantity;
                 if($data_st=$this->Dashio_Store_Model->update_data($sid,$data1))
                     {
                         echo json_encode($data_st);
                     }

           }       

          
// Update Basid Detail Function
          public function update_site_record()
          {
               $post=$this->input->post();
               $id=$post['id'];
               if($detail['site_detail']=$this->Dashio_Store_Model->updaterecords($id,$post))
               {
                        echo json_encode( array('message'=>"Record Update Successfully"));
               }
               else
               {
                        echo json_encode( array('message'=>"Fail"));
               }


          }       
          public function update_basic_detail()
          {

                $post=$this->input->post();
                  
                $data['title']=$this->Dashio_Store_Model->get_basic_detail();
                $this->load->view('common/header',$data);
                $this->load->view('pages/update_site_details');
                $this->load->view('common/footer');

        }    


           //Fetch List Function
          

           // Price List Function
        public function price_list()
        {
                    $post=$this->input->post('mid');         
                    $price_result=$this->Dashio_Store_Model->get_price($post);
                    $s_price=$price_result[0]['s_price'];
                    echo ($s_price);
                    

                   
         } 
          // Color List Function
         public function color_list()
         {
                      $post=$this->input->post('mid');         
                      $color_result=$this->Dashio_Store_Model->get_color($post);
                      $output="<select value=''>-Select Color-";
                       foreach ($color_result as $row) 
                        {
                           $output.="<option value='$row[color]'>$row[color]</option>";
                        }
                        echo $output.="</select>";
                    

                   
          }     


          

          //Update About Page Detail From Admin Panel
          public function update_about_us()
          {
               $post=$this->input->post();
               $id=$post['id'];
               if($detail['site_detail']=$this->Dashio_Store_Model->updateaboutus($id,$post))
               {
                        echo json_encode( array('message'=>"Record Update Successfully"));
               }
               else
               {
                        echo json_encode( array('message'=>"Fail"));
               }


          }   


        
        //Admin Login Page Function
        public function admin_login()
        {
            
            $this->load->view('pages/login');
            

        } 

        //Check Admin Login Detail
        public function admin_login_detail()

        {
            $post=$this->input->post();

            $login_detail=$this->Dashio_Store_Model->get_admin_login_data($post);
           if(!empty($login_detail))
           {
                 echo json_encode(array("message"=>"login successfull","status"=>"1"));
           }
           else
           {  
                echo json_encode(array("message"=>"login fail","status"=>"0")); 
           }
         
       }

      //Admin Panel Logout Function

      public function admin_logout_account()
         {
                        
                        $this->session->sess_destroy();
                         $this->load->view('pages/login');
                        
           
            
            
         }

      //Admin Panel Product Status Changed Function 

      public function status_change()

      {
            $post=$this->input->post();
            $id=$post['pid'];
            unset($post['id']);

            if($result= $this->Dashio_Store_Model->update_status('add_product','pid ='.$id,$post))
            {
              echo json_encode(array("message"=>"status update successfully","status"=>"1"));
            }
            else
            {
              echo json_encode(array("message"=>"status fail","status"=>"0")); 
            }
       }
   




        

          


       
           
      /*echo "<pre>";
               print_r($post);
               exit;*/

                /*$post= $this->input->post();
                       $mid=$post['mid'];*/
                       /*echo "<pre>";
                       print_r($post);
                       exit;*/
        
                         

   }

?>