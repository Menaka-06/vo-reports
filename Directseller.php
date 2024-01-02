<?php
class Directseller extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->common_model->check_login();
    }
    
    public function directSellerRegistration(){
        $this->common_model->CommentsLog();
        $data['page_name']='Direct Seller Registration';
        $data['sub_page']='directseller/ListDirectSeller';
        $config['base_url']=base_url()."Directseller/directSellerRegistration";
        $config['total_rows']=$this->directseller_model->getDB2TotalRecords('users','');
        $config['per_page']=PAGINATION_COUNT;
        $config=$this->common_model->paginationStyle($config);
        $this->pagination->initialize($config);
        $lmt=0;
        $lmt=$this->uri->segment(3);
        $data['user_details']=$this->directseller_model->getDirectSellerRegistrationList($config['per_page'],$lmt);
        $this->load->view('user_index',$data);
    }

    public function searchDirectSeller(){
        $this->common_model->CommentsLog();
        $lmt=$date=$directSellerID=$sponsorId=$status="";
        $date=$this->security->xss_clean($this->input->post('date'));
        $directSellerID=$this->security->xss_clean($this->input->post('directSellerID'));
        $sponsorId=$this->security->xss_clean($this->input->post('sponsorId'));
        $status=$this->security->xss_clean($this->input->post('status'));

        if(empty($date)){
            $date=$this->input->get('date');
            if(!empty($date)){
                $date=date('Y-m-d',$date);
            }
        }

        if(empty($directSellerID)){
            $directSellerID=$this->input->get('directSellerID');
            if(!empty($directSellerID)){
                $directSellerID=$this->common_model->decode($directSellerID);
            }
        }
        if(empty($sponsorId)){
            $sponsorId=$this->input->get('sponsorId');
            if(!empty($sponsorId)){
                $sponsorId=$this->common_model->decode($sponsorId);
            }
        }
        if(empty($status)){
            $status=$this->input->get('status');
            if(!empty($status)){
                $status=$this->common_model->decode($status);
            }
        }
        if($lmt==""){
            $lmt=$this->input->get('lmt');
        }
        $encoded_date=$encoded_directSellerid=$encodedSponserid=$encoded_status="";

        if(!empty($date)){$encoded_date=strtotime($date);}
        if(!empty($directSellerID)){$encoded_directSellerid=$this->common_model->encode($directSellerID);}
        if(!empty($sponsorId)){$encodedSponserid=$this->common_model->encode($sponsorId);}
        if(!empty($status)){$encoded_status=$this->common_model->encode($status);}
        
        if(!empty($date)){
            $config['base_url']=base_url()."Directseller/searchDirectSeller?date=".$encoded_date.$lmt;
            $config['total_rows']=$this->directseller_model->getDB2TotalRecords('users',array('createdAt >='=>$date.' 00:00:00','createdAt <='=>$date.' 23:59:59'));
        }
        
        if(!empty($directSellerID)){
            $config['base_url']=base_url()."Directseller/searchDirectSeller?encoded_directSellerid=".$encoded_directSellerid.$lmt;
            $config['total_rows']=$this->directseller_model->getDB2TotalRecords('users',array('distributerId'=>$directSellerID));
        }
        
        if(!empty($sponsorId)){
            $config['base_url']=base_url()."Directseller/searchDirectSeller?sponsorId=".$encodedSponserid.$lmt;
            $config['total_rows']=$this->directseller_model->getDB2TotalRecords('users','');
        }

        if(!empty($status)){
            $config['base_url']=base_url()."Directseller/searchDirectSeller?status=".$encoded_status.$lmt;
            $config['total_rows']=$this->directseller_model->getDB2TotalRecords('users',array('status'=>$status));
        }

        if(!empty($date)& !empty($sponsorId)){
            $config['base_url']=base_url()."Directseller/searchDirectSeller?date=".$encoded_date.'&sponsorId='.$encodedSponserid.$lmt;
            $config['total_rows']=$this->directseller_model->getDB2TotalRecords('users',array('createdAt >='=>$date.' 00:00:00','createdAt <='=>$date.' 23:59:59'));
        }

        if(!empty($date)& !empty($status)){
            $config['base_url']=base_url()."Directseller/searchDirectSeller?date=".$encoded_date.'&status='.$encoded_status.$lmt;
            $config['total_rows']=$this->directseller_model->getDB2TotalRecords('users',array('createdAt >='=>$date.' 00:00:00','createdAt <='=>$date.' 23:59:59','status'=>$status));
        }

        if(!empty($date)& !empty($directSellerID)){
            $config['base_url']=base_url()."Directseller/searchDirectSeller?date=".$encoded_date.'&directSellerID='.$encoded_directSellerid.$lmt;
            $config['total_rows']=$this->directseller_model->getDB2TotalRecords('users',array('createdAt >='=>$date.' 00:00:00','createdAt <='=>$date.' 23:59:59','distributerId'=>$directSellerID));
        }

        if(!empty($directSellerID)& !empty($sponsorId)){
            $config['base_url']=base_url()."Directseller/searchDirectSeller?directSellerID=".$encoded_directSellerid.'&sponsorId='.$encodedSponserid.$lmt;
            $config['total_rows']=$this->directseller_model->getDB2TotalRecords('users',array('distributerId'=>$directSellerID));
        }

        if(!empty($directSellerID)& !empty($status)){
            $config['base_url']=base_url()."Directseller/searchDirectSeller?directSellerID=".$encoded_directSellerid.'&status='.$encoded_status.$lmt;
            $config['total_rows']=$this->directseller_model->getDB2TotalRecords('users',array('distributerId'=>$directSellerID,'status'=>$status));
        }

        
        if(!empty($sponsorId)& !empty($status)){
            $config['base_url']=base_url()."Directseller/searchDirectSeller?sponsorId=".$encodedSponserid.'&status='.$encoded_status.$lmt;
            $config['total_rows']=$this->directseller_model->getDB2TotalRecords('users',array('status'=>$status));
        }

        if(!empty($date)& !empty($directSellerID)& !empty($sponsorId)){
            $config['base_url']=base_url()."Directseller/searchDirectSeller?date=".$encoded_date.'&directSellerid='.$encoded_directSellerid.'&sponsorId='.$encodedSponserid.$lmt;
            $config['total_rows']=$this->directseller_model->getDB2TotalRecords('users',array('createdAt >='=>$date.' 00:00:00','createdAt <='=>$date.' 23:59:59','distributerId'=>$directSellerID));
        }

        if(!empty($date)& !empty($directSellerID)& !empty($status)){
            $config['base_url']=base_url()."Directseller/searchDirectSeller?date=".$encoded_date.'&directSellerid='.$encoded_directSellerid.'&status='.$encoded_status.$lmt;
            $config['total_rows']=$this->directseller_model->getDB2TotalRecords('users',array('createdAt >='=>$date.' 00:00:00','createdAt <='=>$date.' 23:59:59','distributerId'=>$directSellerID,'status'=>$status));
        }

        if(!empty($date)& !empty($sponsorId)& !empty($status)){
            $config['base_url']=base_url()."Directseller/searchDirectSeller?date=".$encoded_date.'&sponsorId='.$encodedSponserid.'&status='.$encoded_status.$lmt;
            $config['total_rows']=$this->directseller_model->getDB2TotalRecords('users',array('createdAt >='=>$date.' 00:00:00','createdAt <='=>$date.' 23:59:59','status'=>$status));
        }

        if(!empty($directSellerID)& !empty($sponsorId)& !empty($status)){
            $config['base_url']=base_url()."Directseller/searchDirectSeller?directSellerID=".$encoded_directSellerid.'&sponsorId='.$encodedSponserid.'&status='.$encoded_status.$lmt;
            $config['total_rows']=$this->directseller_model->getDB2TotalRecords('users',array('distributerId'=>$directSellerID,'status'=>$status));
        }

        if(!empty($date)& !empty($directSellerID)& !empty($sponsorId)& !empty($status)){
            $config['base_url']=base_url()."Directseller/searchDirectSeller?date=".$encoded_date.'&directSellerid='.$encoded_directSellerid.'&sponsorId='.$encodedSponserid.'&status='.$encoded_status.$lmt;
            $config['total_rows']=$this->directseller_model->getDB2TotalRecords('users',array('createdAt >='=>$date.' 00:00:00','createdAt <='=>$date.' 23:59:59','distributerId'=>$directSellerID,'status'=>$status));
        }
        
        $config['per_page']=PAGINATION_COUNT;
        $config['page_query_string']=true;
        $config['query_string_segment']="lmt";
        $config=$this->common_model->paginationStyle($config);
        $this->pagination->initialize($config);
        $data['user_details']=$this->directseller_model->getDirectSellerRegistrationSearch($config['per_page'],$lmt,$date,$directSellerID,$sponsorId,$status);
        $data['date']=$date;
        $data['directSellerID']=$directSellerID;
        $data['sponsorId']=$sponsorId;
        $data['status']=$status;
        $data['page_name']='Direct Seller Registration';
        $data['sub_page']='directseller/ListDirectSeller';
        $this->load->view('user_index',$data);
        
    }

    public function viewDirectSeller($id){
        $id=$this->common_model->decode($id);
        $this->common_model->CommentsLog();
        $data['page_name']='View Direct Seller';
        $data['sub_page']='directseller/viewDirectSeller';
        $data['user_details']=$this->directseller_model->getDirectSellerbyId($id);
        $this->load->view('user_index',$data);
    }

    public function addDirectSellerRegistration(){
        $this->common_model->CommentsLog();
        $data['page_name']='Add Direct Seller Registration';
        $data['sub_page']='directseller/AddDirectSeller';
        $this->load->view('user_index',$data);
    }
    
    public function tabularView($ref=""){
        $this->common_model->CommentsLog();
        $user_id=ROOT_USER_ID;
        if(!empty($ref)){$user_id=$this->common_model->decode($ref);}
        $data['page_name']='Tabular View';
        $data['sub_page']='directseller/TabularView';
        $data['tree_sponser']=$this->genelogy_model->getSponserUserDetails($user_id);
        $this->load->view('user_index',$data);
    }
    public function searchTabularView(){
        if(isset($_POST['search_tabular_view'])){
            $this->common_model->CommentsLog();
            $distributer_id=$this->security->xss_clean($this->input->post('distributer_id'));
            
            if(empty($distributer_id)){
                $this->session->set_flashdata('warning','Distributer ID Cannot be empty');
                redirect(base_url().'directseller/tabularView');
            }
            $checkDistID=$this->genelogy_model->validDistributerID($distributer_id);
            if(!$checkDistID){
                $this->session->set_flashdata('warning','Invalid Distributer ID,Please try Again with Valid Distributer Id');
                redirect(base_url().'directseller/tabularView');
            }
            $user_id=$this->genelogy_model->getUserIdbyDistibuterId($distributer_id);
            if(empty($user_id)){
                $this->session->set_flashdata('warning','Invalid Distributer ID,Please try Again with Valid Distributer Id');
                redirect(base_url().'directseller/tabularView');
            }
            $data['distributer_id']=$distributer_id;
            $data['page_name']='Tabular View';
            $data['sub_page']='directseller/TabularView';
            $data['tree_sponser']=$this->genelogy_model->getSponserUserDetails($user_id);
            $this->load->view('user_index',$data);
        }else{
            $this->session->set_flashdata('warning','Invalid Request');
            redirect(base_url().'directseller/tabularView');
        }
    }

    public function sponsorChange(){
        $this->common_model->CommentsLog();
        $data['page_name']='Sponsor Change';
        $data['sub_page']='directseller/Sponsorchange';
        $config['base_url']=base_url()."Directseller/sponsorChange";
        $config['total_rows']=$this->directseller_model->getDB2TotalRecords('users',array('status'=>'Active'));
        $config['per_page']=PAGINATION_COUNT;
        $config=$this->common_model->paginationStyle($config);
        $this->pagination->initialize($config);
        $lmt=0;
        $lmt=$this->uri->segment(3);
        $data['user_details']=$this->directseller_model->getActiveDirectSellerRegistrationList($config['per_page'],$lmt);
        $this->load->view('user_index',$data);
    }
    public function directSellerspasswordChange(){
        $this->common_model->CommentsLog();
        $data['page_name']='Direct Sellers Password Change';
        $data['sub_page']='directseller/Directsellerpasswordchange';
        $config['base_url']=base_url()."Directseller/directSellerspasswordChange";
        $config['total_rows']=$this->directseller_model->getDB2TotalRecords('users',array('status'=>'Active'));
        $config['per_page']=PAGINATION_COUNT;
        $config=$this->common_model->paginationStyle($config);
        $this->pagination->initialize($config);
        $lmt=0;
        $lmt=$this->uri->segment(3);
        $data['user_details']=$this->directseller_model->getActiveDirectSellerRegistrationList($config['per_page'],$lmt);
        $this->load->view('user_index',$data);
    }

    public function changeuserpassword(){
        $this->common_model->CommentsLog();
        if(isset($_POST['change_password'])){
            $password=$this->security->xss_clean($this->input->post('password'));
            $expid=$this->security->xss_clean($this->input->post('expid'));
            $confirm_password=$this->security->xss_clean($this->input->post('confirm_password'));
            if(empty($expid)){
                $this->session->set_flashdata('warning','Something Went Wrong');
                redirect(base_url().'Directseller/directSellerspasswordChange');
            }
            if($password==$confirm_password){
                $pass=array('password'=>password_hash($confirm_password,PASSWORD_BCRYPT),'encryptionKey'=>md5($confirm_password),'passChangeTime'=>date('Y-m-d h:i:s'));
                    $res=$this->directseller_model->updateUser($expid,$pass);
                    $password_track=array(
                        'userId'=>$expid,
                        'oldPass'=>Null,
                        'oldEncry'=>Null,
                        'newPass'=>password_hash($confirm_password,PASSWORD_BCRYPT),
                        'newPassEncy'=>md5($confirm_password),
                        'Tag'=>'Admin',
                        'createdAt'=>date('Y-m-d h:i:s'),
                    );
                    $this->directseller_model->insertUserPasswordTracks($password_track);
                    $this->common_model->CommentsLog(json_encode($pass));
                $this->session->set_flashdata('success','Password Changed Successfully');
                redirect(base_url().'Directseller/directSellerspasswordChange');
            }else{
                $this->session->set_flashdata('warning','Password and Confirm Password Mismatch');
                redirect(base_url().'Directseller/directSellerspasswordChange');
            }

        }else{
            $this->session->set_flashdata('error','Invalid Request');
            redirect(base_url().'Directseller/directSellerspasswordChange');
        }
    }

    public function directSelleractivation(){
        $data['page_name']='Direct Seller Activation';
        $data['sub_page']='directseller/Directselleractivation';
        $config['base_url']=base_url()."Directseller/directSelleractivation";
        $config['total_rows']=$this->directseller_model->getDB2TotalRecords('users',array('status'=>'Pending'));
        $config['per_page']=PAGINATION_COUNT;
        $config=$this->common_model->paginationStyle($config);
        $this->pagination->initialize($config);
        $lmt=0;
        $lmt=$this->uri->segment(3);
        $data['user_details']=$this->directseller_model->getPendingDirectSellerRegistrationList($config['per_page'],$lmt);
        $this->load->view('user_index',$data);
    }
    public function kycAddresschange(){
        $data['page_name']='KYC & Address Change';
        $data['sub_page']='directseller/KycAddresschange';
        $config['base_url']=base_url()."Directseller/kycAddresschange";
        $config['total_rows']=$this->directseller_model->getDB2TotalRecords('users','');
        $config['per_page']=PAGINATION_COUNT;
        $config=$this->common_model->paginationStyle($config);
        $this->pagination->initialize($config);
        $lmt=0;
        $lmt=$this->uri->segment(3);
        $data['user_details']=$this->directseller_model->getActiveDirectSellerRegistrationList($config['per_page'],$lmt);
        $this->load->view('user_index',$data);
    }

    public function editKycDetails($id){
        $id=$this->common_model->decode($id);
    }
    
    public function approveDirectSeller($id){
        $id=$this->common_model->decode($id);
        $data['page_name']='Approve Direct Seller';
        $data['sub_page']='directseller/viewDirectSeller';
        $status=$this->directseller_model->GetUserStatus($id);
        if($status!='Pending'){
            $this->session->set_flashdata('warning','User Already Activated');
            redirect(base_url().'Directseller/directSelleractivation');
        }
        $data['user_details']=$this->directseller_model->getDirectSellerbyId($id);
        $this->load->view('user_index',$data);
    }

    public function ActivateDirectSeller(){
        if(isset($_POST['approval'])){
            $userid=$this->input->post('userid');
            $userid=$this->common_model->decode($userid);
            $approval=$this->security->xss_clean($this->input->post('approval'));
            if(!isset($_POST['approval'])){
                $this->session->set_flashdata('warning','Please Check the approval checkbox');
                redirect(base_url().'Directseller/directSelleractivation');
            }
            $status=$this->directseller_model->GetUserStatus($userid);
            if($status=='Pending'){
                $directSellerID=$this->directseller_model->GenerateDirectSellerIDS($userid);
                $lastRefID=$this->directseller_model->GetLastRefId();
                $lastRefID=$lastRefID+1;
                $update=array(
                    'distributerId'=>$directSellerID['distributer_id'],
                    'status'=>'Active',
                    'activatedAt'=>date('Y-m-d H:i:s'),
                );
                $user_personal_details_update=array(
                    'distributerId'=>$directSellerID['distributer_id'],
                    'distributerCode'=>$directSellerID['distributer_code'],
                    'stateCode'=>$directSellerID['state_code'],
                    'refId'=>$lastRefID,
                );
                
                $this->common_model->CommentsLog(json_encode($update));
                $this->common_model->CommentsLog(json_encode($user_personal_details_update));
                $this->directseller_model->updateUser($userid,$update);
                $this->directseller_model->updateUserPersonalDetails($userid,$user_personal_details_update);
                 $this->session->set_flashdata('success','User Activated Successfully');
                redirect(base_url().'Directseller/directSelleractivation');
            }else{
                $this->session->set_flashdata('warning','User Already Activated');
                redirect(base_url().'Directseller/directSelleractivation');
            }
        }else{
            $this->session->set_flashdata('error','Invalid Request');
            redirect(base_url().'Directseller/directSelleractivation');
        }
    }

    public function bonusCommissions(){
        $data['page_name']='Bonus Commissions';
        $data['sub_page']='directseller/BonusCommissions';
        $this->load->view('user_index',$data);
    }

    public function directSellerReports(){
        $data['page_name']='Reports';
        $data['sub_page']='directseller/DirectSellerReports';
        $this->load->view('user_index',$data);
    }
    public function directSellerSettings(){
        $data['page_name']='Settings';
        $data['sub_page']='directseller/DirectSellerSettings';
        $this->load->view('user_index',$data);
    }

    public function getSponsorHTML(){
        $enc_code=$this->uri->segment(4);
        $str=$this->genelogy_model->getSponsorHTML($enc_code);     
        echo $str;
    }
     public function newJoineeReport(){
        $data['page_name']='New Joinee Reports';
        $data['sub_page']='directseller/NewJoineeReport';
        $data['from_date']=date('Y-m-01');
        $data['to_date']=date('Y-m-t');
        $this->load->view('user_index',$data);
    }
    public function generateNewJoineeReport(){
          $this->common_model->CommentsLog();
         $lmt=$from_date=$to_date=$sponsorId=$status="";

        $from_date=$this->security->xss_clean($this->input->post('from_date'));
        $to_date=$this->security->xss_clean($this->input->post('to_date'));
        $sponsorId=$this->security->xss_clean($this->input->post('sponsorId'));
        $status=$this->security->xss_clean($this->input->post('status'));

        
        if(empty($from_date)){
            $from_date=$this->input->get('from_date');
            if(!empty($from_date)){
                $from_date=date('Y-m-d',$from_date);
            }
        }
         if(empty($to_date)){
            $to_date=$this->input->get('to_date');
            if(!empty($to_date)){
                $to_date=date('Y-m-d',$to_date);
            }
        }
        if(empty($sponsorId)){
            $sponsorId=$this->input->get('sponsorId');
            if(!empty($sponsorId)){
                $sponsorId=$this->common_model->decode($sponsorId);
            }
        }
        if(empty($status)){
            $status=$this->input->get('status');
            if(!empty($status)){
                $status=$this->common_model->decode($status);
            }
        }
        if($lmt==""){
            $lmt=$this->input->get('lmt');
        }
        $encoded_from_date=$encoded_to_date=$encoded_sponsor_id=$encoded_status="";
         if(!empty($from_date)){$encoded_from_date=strtotime($from_date);}
          if(!empty($to_date)){$encoded_to_date=strtotime($to_date);}
        
        if(!empty($sponsorId)){$encoded_sponsor_id=$this->common_model->encode($sponsorId);}
        if(!empty($status)){$encoded_status=$this->common_model->encode($status);}
       if(!empty($from_date)){
            $config['base_url']=base_url()."Directseller/generateNewJoineeReport?from_date=".$encoded_from_date.$lmt;
            $config['total_rows']=$this->directseller_model->getDB2TotalRecords('users',array('createdAt >='=>$from_date));
        }
        if(!empty($to_date)){
            $config['base_url']=base_url()."Directseller/generateNewJoineeReport?to_date=".$encoded_to_date.$lmt;
            $config['total_rows']=$this->directseller_model->getDB2TotalRecords('users',array('createdAt <='=>$to_date));
        }
        if(!empty($sponsorId)){
            $config['base_url']=base_url()."Directseller/generateNewJoineeReport?sponsorId=".$encoded_sponsor_id.$lmt;
            $config['total_rows']=$this->directseller_model->getDB2TotalRecords('users','');
        }

        if(!empty($status)){
            $config['base_url']=base_url()."Directseller/generateNewJoineeReport?status=".$encoded_status.$lmt;
            $config['total_rows']=$this->directseller_model->getDB2TotalRecords('users',array('status'=>$status));
        }
         if(!empty($from_date)& !empty($to_date)){
            $config['base_url']=base_url()."Directseller/generateNewJoineeReport?from_date=".$encoded_from_date.'&to_date='.$encoded_to_date.$lmt;
            $config['total_rows']=$this->directseller_model->getDB2TotalRecords('users',array('createdAt >='=>$from_date,'createdAt <='=>$to_date));
        }
        if(!empty($from_date)& !empty($sponsorId)){
            $config['base_url']=base_url()."Directseller/generateNewJoineeReport?from_date=".$encoded_from_date.'&sponsorId='.$encoded_sponsor_id.$lmt;
            $config['total_rows']=$this->directseller_model->getDB2TotalRecords('users',array('createdAt >='=>$from_date,'distributerId'=>$sponsorId));
        }
        if(!empty($from_date)& !empty($status)){
            $config['base_url']=base_url()."Directseller/generateNewJoineeReport?from_date=".$encoded_from_date.'&status='.$encoded_status.$lmt;
            $config['total_rows']=$this->directseller_model->getDB2TotalRecords('users',array('createdAt >='=>$from_date,'status'=>$status));
        }
        if(!empty($to_date)& !empty($sponsorId)){
            $config['base_url']=base_url()."Directseller/generateNewJoineeReport?to_date=".$encoded_to_date.'&sponsorId='.$encoded_sponsor_id.$lmt;
            $config['total_rows']=$this->directseller_model->getDB2TotalRecords('users',array('createdAt <='=>$to_date,'distributerId'=>$sponsorId));
        }
        if(!empty($to_date)& !empty($status)){
            $config['base_url']=base_url()."Directseller/generateNewJoineeReport?to_date=".$encoded_to_date.'&status='.$encoded_status.$lmt;
            $config['total_rows']=$this->directseller_model->getDB2TotalRecords('users',array('createdAt <='=>$to_date,'status'=>$status));
        }
        if(!empty($sponsorId)& !empty($status)){
            $config['base_url']=base_url()."Directseller/generateNewJoineeReport?sponsorId=".$encoded_sponsor_id.'&status='.$encoded_status.$lmt;
            $config['total_rows']=$this->directseller_model->getDB2TotalRecords('users',array('distributerId='=>$sponsorId,'status'=>$status));
        }
        if(!empty($from_date)& !empty($to_date)& !empty($sponsorId)){
            $config['base_url']=base_url()."Directseller/generateNewJoineeReport?from_date=".$encoded_from_date.'&to_date='.$encoded_to_date.'&sponsorId='.$encoded_sponsor_id.$lmt;
            $config['total_rows']=$this->directseller_model->getDB2TotalRecords('users',array('createdAt >='=>$from_date,'createdAt <='=>$to_date,'distributerId'=>$sponsorId));
        }
        if(!empty($from_date)& !empty($to_date)& !empty($status)){
            $config['base_url']=base_url()."Directseller/generateNewJoineeReport?from_date=".$encoded_from_date.'&to_date='.$encoded_to_date.'&status='.$encoded_status.$lmt;
            $config['total_rows']=$this->directseller_model->getDB2TotalRecords('users',array('createdAt >='=>$from_date,'createdAt <='=>$to_date,'status'=>$status));
        }
        if(!empty($to_date)& !empty($sponsorId)& !empty($status)){
            $config['base_url']=base_url()."Directseller/generateNewJoineeReport?to_date=".$encoded_to_date.'&sponsorId='.$encoded_sponsor_id.'&status='.$encoded_status.$lmt;
            $config['total_rows']=$this->directseller_model->getDB2TotalRecords('users',array('createdAt <='=>$to_date,'distributerId'=>$sponsorId,'status'=>$status));
        }
        if(!empty($from_date)& !empty($sponsorId)& !empty($status)){
            $config['base_url']=base_url()."Directseller/generateNewJoineeReport?from_date=".$encoded_from_date.'&sponsorId='.$encoded_sponsor_id.'&status='.$encoded_status.$lmt;
            $config['total_rows']=$this->directseller_model->getDB2TotalRecords('users',array('createdAt >='=>$from_date,'distributerId'=>$sponsorId,'status'=>$status));
        }
         if(!empty($from_date)& !empty($to_date)& !empty($sponsorId)& !empty($status)){
            $config['base_url']=base_url()."Directseller/generateNewJoineeReport?from_date=".$encoded_from_date.'&to_date='.$encoded_to_date.'&sponsorId='.$encoded_sponsor_id.'&status='.$encoded_status.$lmt;
            $config['total_rows']=$this->directseller_model->getDB2TotalRecords('users',array('createdAt >='=>$from_date,'createdAt <='=>$to_date,'distributerId'=>$sponsorId,'status'=>$status));
        }

        // $config['total_rows']=$this->directseller_model->getDB2TotalRecords('users',array('createdAt >='=>$from_date,'createdAt <='=>$to_date,'','status'=>$status));
        
        $config['per_page']=PAGINATION_COUNT;
        $config['page_query_string']=true;
        $config['query_string_segment']="lmt";
        
        $config=$this->common_model->paginationStyle($config);
        $this->pagination->initialize($config);
        $data['page_name']='Search New Joinee Reports';
        $data['sub_page']='directseller/NewJoineeReport';
        $data['new_joinee']=$this->directseller_model->getnewjoineereportList($config['per_page'],$lmt,$from_date,$to_date,$sponsorId,$status);
        $data['lmt']=$lmt;
        $data['from_date']=$from_date;
        $data['to_date']=$to_date;
        $data['sponsorId']=$sponsorId;
        $data['status']=$status;
        
        $this->load->view('user_index',$data);
        
    }

    public function NewJoineereportExcelDownload(){
        $from_date=$this->security->xss_clean($this->input->post('search_from_date'));
        $to_date=$this->security->xss_clean($this->input->post('search_to_date'));
        $sponsorId=$status="";
        $new_joinee=$this->directseller_model->getnewjoineereportListExcel($from_date,$to_date,$sponsorId,$status);
        if(!empty($new_joinee)){
            foreach($new_joinee as $NJ){
                $first_bv_date=$total_bv='----'; 
                if($NJ->status=='Active'){ 
                    $bvdetails=$this->directseller_model->getbvdateBv($NJ->id);
                    $first_bv_date=$bvdetails['first_bv_date'];
                    $total_bv=$bvdetails['total_bv'];
                } 
    			$perBV['User ID']=$NJ->id;
    			$perBV['Direct Seller ID']=$NJ->distributerId;
    			$perBV['Username']=$NJ->distributerName;
    			$perBV['Sponsor ID']=$NJ->sponsorId;
    			$perBV['Placement ID']=$NJ->placementId;
    			$perBV['Registeration Date']=date('d-M-Y',strtotime($NJ->createdAt));
    			$perBV['Registeration Time']=date('h:i:s:a',strtotime($NJ->createdAt));
				$perBV['Activation Date']=date('d-M-Y',strtotime($NJ->activatedAt));
    			$perBV['Activation Time']=date('h:i:s:a',strtotime($NJ->activatedAt));
                $perBV['Status']=$NJ->status;
                $perBV['First BV Acheived Date']=$first_bv_date;
                $perBV['Total BV Acheived']=$total_bv;
    			$per_ata[]=$perBV;
    		}
            $data=$per_ata;
        	$filename="New-Joinee-Report-".$from_date."-".$to_date;
        	$export=$this->common_model->ExcelExport($filename,$data);
        }else{
            $this->session->set_flashdata('warning','Something went Wrong');
                redirect(base_url().'Directseller/newJoineeReport');
        }
        
    }
    

    public function directsellerpasssearch(){
        if(isset($_POST['password_search'])){
            $this->common_model->CommentsLog();
            $distributer_id=$this->security->xss_clean($this->input->post('distributer_id'));
            if(empty($distributer_id)){
                $distributer_id=$this->input->get('distributer_id');
                $distributer_id=$this->common_model->decode($distributer_id);
            }
            if(empty($distributer_id)){
                $this->session->set_flashdata('warning','Distributer ID Cannot be empty');
                redirect(base_url().'Directseller/directSellerspasswordChange');
            }
            $data['page_name']='Search Direct Sellers Password Change';
            $data['sub_page']='directseller/Directsellerpasswordchange';
            $data['distributer_id']=$distributer_id;
            $config['base_url']=base_url()."Directseller/directsellerpasssearch?distributer_id=".$this->common_model->encode($distributer_id);
            $config['total_rows']=$this->directseller_model->getDB2TotalRecords('users',array('status'=>'Active','distributerId'=>$distributer_id));
            $config['per_page']=PAGINATION_COUNT;
            $config=$this->common_model->paginationStyle($config);
            $this->pagination->initialize($config);
            $lmt=0;
            $lmt=$this->uri->segment(3);
            $data['user_details']=$this->directseller_model->searchActiveDirectSellerRegistrationList($config['per_page'],$lmt,$distributer_id);
            $this->load->view('user_index',$data);
        }else{
            $this->session->set_flashdata('error','Invalid Request');
            redirect(base_url().'Directseller/directSellerspasswordChange');
        }
    }

    public function searchDirectSelleractivation(){
        if(isset($_POST['activation_search'])){
            $data['page_name']='Direct Seller Activation';
            $data['sub_page']='directseller/Directselleractivation';
            $config['base_url']=base_url()."Directseller/searchDirectSelleractivation";
            $config['total_rows']=$this->directseller_model->getDB2TotalRecords('users',array('status'=>'Pending'));
            $config['per_page']=PAGINATION_COUNT;
            $config=$this->common_model->paginationStyle($config);
            $this->pagination->initialize($config);
            $lmt=0;
            $lmt=$this->uri->segment(3);
            $data['user_details']=$this->directseller_model->getPendingDirectSellerRegistrationList($config['per_page'],$lmt);
            $this->load->view('user_index',$data);
        }
        
    }
    public function State(){
        $data['page_name']='State';
        $data['sub_page']='directseller/State';
        $this->load->view('user_index',$data);
        }
        public function City(){
        $data['page_name']='City';
        $data['sub_page']='directseller/City';
        $this->load->view('user_index',$data);
        }
        public function Country(){
        $data['page_name']='Country';
        $data['sub_page']='directseller/Country';
        $this->load->view('user_index',$data);
        }

    public function listEmailMobileChange(){
        $data['page_name']='DS Mobile/Email Change';
        $data['sub_page']='directseller/listmobileEmailchange';
        $config['base_url']=base_url()."directseller/listEmailMobileChange";
        $config['total_rows']=$this->directseller_model->getDB2TotalRecords('users','');
        $config['per_page']=PAGINATION_COUNT;
        $config=$this->common_model->paginationStyle($config);
        $this->pagination->initialize($config);
        $lmt=0;
        $lmt=$this->uri->segment(3);
        $data['user_details']=$this->directseller_model->getDirectSellerRegistrationList($config['per_page'],$lmt);
        $this->load->view('user_index',$data);
    }

    public function updateMobileNo(){
        if(isset($_POST['change_mobile'])){
            $mobile_no=$this->security->xss_clean($this->input->post('mobile_no'));
            $expid=$this->security->xss_clean($this->input->post('expid'));
                if(empty($mobile_no)){
                    $this->session->set_flashdata('warning','Mobile No Cannot be empty');
                    redirect(base_url().'Directseller/listEmailMobileChange');
                }
                if(!empty($mobile_no)){
                    $checkMobile=$this->directseller_model->checkMobile($expid,$mobile_no);
                    if(empty($checkMobile)){
                        $MOBeXIST=$this->directseller_model->checkMobileExist($mobile_no);
                        if(empty($MOBeXIST)){
                            $upMobile=array('mobileNo'=>$mobile_no,'mobileVerified'=>2);
                            $res=$this->directseller_model->updateUser($expid,$upMobile);
                            $upPers=array('mobileNo'=>$mobile_no);
                            $this->directseller_model->updateUserPersonalDetails($expid,$upPers);
                            if($res){
                                $this->session->set_flashdata('success','Mobile No Updated Successfully');
                                redirect(base_url().'Directseller/listEmailMobileChange');
                            }else{
                               $this->session->set_flashdata('warning','Something Went Wrong, Please Try again');
                                redirect(base_url().'Directseller/listEmailMobileChange'); 
                            }
                        }else{
                            $this->session->set_flashdata('warning','Mobile No Already using by other Distributer');
                            redirect(base_url().'Directseller/listEmailMobileChange');
                        }
                    }else{
                        $this->session->set_flashdata('warning','Trying to Update te Old Mobile Number itself');
                            redirect(base_url().'Directseller/listEmailMobileChange');
                    }
                }

        }else{
            $this->session->set_flashdata('error','Invalid Request');
            redirect(base_url().'Directseller/listEmailMobileChange');
        }
    }

    public function updateEmailAddress(){
        if(isset($_POST['change_email'])){
            $email_id=$this->security->xss_clean($this->input->post('email_id'));
            $hiden_id=$this->security->xss_clean($this->input->post('hiden_id'));
                if(empty($email_id)){
                    $this->session->set_flashdata('warning','Email Address Cannot be empty');
                    redirect(base_url().'Directseller/listEmailMobileChange');
                }
                if(!empty($email_id)){
                    $checkMobile=$this->directseller_model->checkEmail($hiden_id,$email_id);
                    if(empty($checkMobile)){
                        $MOBeXIST=$this->directseller_model->checkEmailExist($email_id);
                        if(empty($MOBeXIST)){
                            $upMobile=array('emailId'=>$email_id,'emailVerified'=>2);
                            $res=$this->directseller_model->updateUser($hiden_id,$upMobile);
                            
                            if($res){
                                $this->session->set_flashdata('success','Email Address Updated Successfully');
                                redirect(base_url().'Directseller/listEmailMobileChange');
                            }else{
                               $this->session->set_flashdata('warning','Something Went Wrong, Please Try again');
                                redirect(base_url().'Directseller/listEmailMobileChange'); 
                            }
                        }else{
                            $this->session->set_flashdata('warning','Email Address Already using by other Distributer');
                            redirect(base_url().'Directseller/listEmailMobileChange');
                        }
                    }else{
                        $this->session->set_flashdata('warning','Trying to Update te Old Email Address itself');
                            redirect(base_url().'Directseller/listEmailMobileChange');
                    }
                }
        }else{
            $this->session->set_flashdata('error','Invalid Request');
            redirect(base_url().'Directseller/listEmailMobileChange');
        }
    }


     public function directsellerMobileEmailsearch(){
        if(isset($_POST['email_search'])){
            $this->common_model->CommentsLog();
            $distributer_id=$this->security->xss_clean($this->input->post('distributer_id'));
            if(empty($distributer_id)){
                $distributer_id=$this->input->get('distributer_id');
                $distributer_id=$this->common_model->decode($distributer_id);
            }
            if(empty($distributer_id)){
                $this->session->set_flashdata('warning','Distributer ID Cannot be empty');
                redirect(base_url().'Directseller/listEmailMobileChange');
            }
            $checkDistExist=$this->directseller_model->CheckDistributerExist($distributer_id);
            if(!$checkDistExist){
                $this->session->set_flashdata('warning','Distributer ID Not registered With us');
                redirect(base_url().'Directseller/listEmailMobileChange');
            }
            $data['page_name']='Search DS Mobile/Email Change';
            $data['sub_page']='directseller/listmobileEmailchange';
            $data['distributer_id']=$distributer_id;
            $config['base_url']=base_url()."directseller/listEmailMobileChange?distributer_id=".$this->common_model->encode($distributer_id);
            $config['total_rows']=$this->directseller_model->getDB2TotalRecords('users',array('distributerId'=>$distributer_id));
            $config['per_page']=PAGINATION_COUNT;
            $config=$this->common_model->paginationStyle($config);
            $this->pagination->initialize($config);
            $lmt=0;
            $lmt=$this->uri->segment(3);
            $data['user_details']=$this->directseller_model->searchAllDirectSellerRegistrationList($config['per_page'],$lmt,$distributer_id);
            $this->load->view('user_index',$data);
        }else{
            $this->session->set_flashdata('error','Invalid Request');
            redirect(base_url().'Directseller/listEmailMobileChange');
        }
    }
}