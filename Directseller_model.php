<?php
#[\AllowDynamicProperties]
class Directseller_model extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->db2=$this->load->database('db2',true);

	}

	public function getDB2TotalRecords($table_name,$where){
		if(!empty($where) && count($where) > 0 ){
            $this->db2->where($where);
        }
        return $this->db2->count_all_results($table_name);
	}

	public function getDB2SumRecords($tbl_name,$colname,$where){
		$sum=0;
		$this->db2->select('sum('.$colname.')as TotalCnt')->from($tbl_name);
		if(!empty($where) && count($where) > 0 ){
			$this->db2->where($where);
		}
		$resp=$this->db2->get()->row();
		if(!empty($resp)){$sum=$resp->TotalCnt;}
		return $sum;
	}

	public function getDirectSellerRegistrationList($limit,$start){
		$this->db2->select('usr.status,upd.distributerId,upd.tempIdBefAct,upd.firstName,upd.lastName,upd.sponsorId,upd.placementId,usr.createdAt,usr.activatedAt,usr.id');
		$this->db2->from('users as usr');
		$this->db2->join('user_peronal_details as upd','upd.userId=usr.id');
		$this->db2->limit($limit,$start);
		$this->db2->order_by('usr.id','desc');
		return $this->db2->get()->result();
	}
	public function getNewJoineeList($limit,$start,$from_date,$to_date,$sponsorId,$status){
		$this->db2->select('usr.*,upd.*');
		$this->db2->from('users as usr');
		$this->db2->join('user_peronal_details as upd','upd.userId=usr.id');
		$this->db2->limit($limit,$start);
		$this->db2->order_by('usr.id','desc');
		return $this->db2->get()->result();
	}

	public function getnewjoineereportList($limit,$start,$from_date,$to_date,$sponsorId,$status){
		$this->db2->select('usr.distributerId,usr.id,usr.distributerName,usr.createdAt,usr.activatedAt,usr.status,upd.placementId,upd.sponsorId')->from('users as usr','usr.distributerId',$sponsorId);
		$this->db2->join('user_peronal_details as upd','usr.id=upd.userId');
		if(!empty($from_date)){
			$this->db2->where('usr.createdAt >=',$from_date);
		}
		if(!empty($to_date)){
			$this->db2->where('usr.createdAt <=',$to_date);
		}
		if(!empty($sponsorId)){
			$this->db2->where('upd.sponsorId',$sponsorId);
		}
		if(!empty($status)){
			$this->db2->where('usr.status',$status);
		}
		$this->db2->limit($limit,$start);
		$this->db2->order_by('usr.id','desc');
		return $this->db2->get()->result();
	}

	public function getnewjoineereportListExcel($from_date,$to_date,$sponsorId,$status){
		$this->db2->select('usr.distributerId,usr.id,usr.distributerName,usr.createdAt,usr.activatedAt,usr.status,upd.placementId,upd.sponsorId')->from('users as usr','usr.distributerId',$sponsorId);
		$this->db2->join('user_peronal_details as upd','usr.id=upd.userId');
		if(!empty($from_date)){
			$this->db2->where('usr.createdAt >=',$from_date);
		}
		if(!empty($to_date)){
			$this->db2->where('usr.createdAt <=',$to_date);
		}
		if(!empty($sponsorId)){
			$this->db2->where('upd.sponsorId',$sponsorId);
		}
		if(!empty($status)){
			$this->db2->where('usr.status',$status);
		}
		$this->db2->order_by('usr.id','desc');
		return $this->db2->get()->result();
	}

	public function getDirectSellerRegistrationSearch($limit,$start,$date,$directSellerID,$sponsorId,$status){
		$this->db2->select('usr.status,upd.distributerId,upd.tempIdBefAct,upd.firstName,upd.lastName,upd.sponsorId,upd.placementId,usr.createdAt,usr.activatedAt,usr.id');
		$this->db2->from('users as usr');
		$this->db2->join('user_peronal_details as upd','upd.userId=usr.id');
		$this->db2->limit($limit,$start);
		if(!empty($date)){
			$this->db2->where('usr.createdAt >=',$date.' 00:00:00');
			$this->db2->where('usr.createdAt <=',$date.' 23:59:59');
		}
		if(!empty($directSellerID)){
			$this->db2->where('upd.distributerId',$directSellerID);
		}
		if(!empty($sponsorId)){
			$this->db2->where('upd.sponsorId',$sponsorId);
		}
		if(!empty($status)){
			$this->db2->where('usr.status',$status);
		}
		$this->db2->order_by('usr.id','desc');
		return $this->db2->get()->result();
	}

	public function getActiveDirectSellerRegistrationList($limit,$start){
		$this->db2->select('usr.status,upd.distributerId,upd.tempIdBefAct,upd.firstName,upd.lastName,upd.sponsorId,upd.placementId,usr.createdAt,usr.activatedAt,usr.id');
		$this->db2->from('users as usr');
		$this->db2->join('user_peronal_details as upd','upd.userId=usr.id');
		$this->db2->where('usr.status','Active');
		$this->db2->limit($limit,$start);
		$this->db2->order_by('usr.id','desc');
		return $this->db2->get()->result();
	}

	public function getInactiveDirectSellerRegistrationList($limit,$start){
		$this->db2->select('usr.status,upd.distributerId,upd.tempIdBefAct,upd.firstName,upd.lastName,upd.sponsorId,upd.placementId,usr.createdAt,usr.activatedAt,usr.id');
		$this->db2->from('users as usr');
		$this->db2->join('user_peronal_details as upd','upd.userId=usr.id');
		$this->db2->where('usr.status','Inactive');
		$this->db2->limit($limit,$start);
		$this->db2->order_by('usr.id','desc');
		return $this->db2->get()->result();
	}

	public function getPendingDirectSellerRegistrationList($limit,$start){
		$this->db2->select('usr.status,upd.distributerId,upd.tempIdBefAct,upd.firstName,upd.lastName,upd.sponsorId,upd.placementId,usr.createdAt,usr.activatedAt,usr.id');
		$this->db2->from('users as usr');
		$this->db2->join('user_peronal_details as upd','upd.userId=usr.id');
		$this->db2->where('usr.status','Pending');
		$this->db2->limit($limit,$start);
		$this->db2->order_by('usr.id','desc');
		return $this->db2->get()->result();
	}

	public function getDirectSellerbyId($id){
		 $this->db2->select('usr.id,usr.distributerId,upd.tempIdBefAct,usr.mobileNo,usr.emailId,usr.distributerName,usr.createdAt,usr.activatedAt,usr.status,upd.firstName,upd.lastName,upd.dateOfBirth,upd.spouseName,upd.nomineeName,upd.nomineeRelationship,upd.gender,upd.alternateMobileNo,upd.sponsorId as sponsorDisId,upd.placementId as placementDisId,upd.sponsorName,upd.placementName,upd.registerType,ubd.accountNo,ubd.accountName,ubd.bankName,ubd.branch,ubd.ifscCode,uca.doorNo as cdoorNo,uca.street as cstreet,uca.address as caddress,uca.landmark as clandmark,uca.pincode as cpincode,uca.city as ccity,uca.state as cstate,upa.doorNo as udoorNo,upa.street as ustreet,upa.address as uaddress,upa.landmark as ulandmark,upa.pincode as upincode,upa.city as ucity,upa.state as ustate,ukd.panNo,ukd.panFirstName,ukd.idProofType,ukd.idProofNo,ukd.idProofFilepath,ukd.idProofFileName,ukd.addressProofType,ukd.addressProofNo,ukd.addressProofFilePath,ukd.addressProofFileName,ukd.addressDetails,ukd.gstNo,usd.sponsorId as sponsorUserId,usd.placementId as placementUserId,usd.placedOrder,usd.PBV,usd.GBV, usd.rank,usd.walletBalance,usd.commission,utc.ageTerms,utc.ageIP,utc.ageTime,utc.frontTerms,utc.frontTermsIP,utc.frontTermsTime,utc.lastTerms,utc.lastTermsIP,utc.lastTermsTime,ubd.updatedAt as Bankdetailsupdatedat');
		$this->db2->from('users as usr');
		$this->db2->join('user_peronal_details as upd','upd.userId=usr.id');
		$this->db2->join('user_bank_details as ubd','ubd.userId=usr.id');
		$this->db2->join('user_communication_address as uca','uca.userId=usr.id');
		$this->db2->join('user_kyc_details as ukd','ukd.userId=usr.id');
		$this->db2->join('user_personal_address as upa','upa.userId=usr.id');
		$this->db2->join('user_sponsor_details as usd','usd.userId=usr.id');
		$this->db2->join('user_terms_conditions as utc','utc.userId=usr.id');
		$this->db2->where('usr.id',$id);
		return $this->db2->get()->row();
	}

	public function getStateById($id){
		$state="";
		$resp=$this->db2->where('id',$id)->get('states')->row();
		if(!empty($resp)){$state=$resp->name;}
		return $state;
	}

	public function getDocumentType($id){
		$document_type="";
		switch ($id) {
		   	case '1':
	            $document_type='Voter ID';
	            break;
	        case '2':
	            $document_type='Driving License';
	            break;
	        case '3':
	            $document_type='PAN Card';
	            break;
	        case '4':
	            $document_type='Aadhaar Card';
	            break;
	        case '5':
	            $document_type='Passport';
	            break;
	        default:
	            $document_type=''; 
		}
		return $document_type;
	}

	public function GetUserStatus($id){
		$res="";
		$resp=$this->db2->where('id',trim($id))->get('users')->row();
		if(!empty($resp)){$res=$resp->status;}
		return $res;
	}

	public function updateUser($id,$data){
		return $this->db2->where('id',$id)->set($data)->update('users');
	}

	public function insertUserPasswordTracks($data){
        return $this->db2->insert('user_password_tracks',$data);
    }
    public function searchActiveDirectSellerRegistrationList($limit,$start,$distributer_id){
		$this->db2->select('usr.status,upd.distributerId,upd.firstName,upd.lastName,upd.sponsorId,upd.placementId,usr.createdAt,usr.activatedAt,usr.id');
		$this->db2->from('users as usr');
		$this->db2->join('user_peronal_details as upd','upd.userId=usr.id');
		$this->db2->where('usr.status','Active');
		$this->db2->like('usr.distributerId',$distributer_id);
		$this->db2->limit($limit,$start);
		$this->db2->order_by('usr.id','desc');
		return $this->db2->get()->result();
	}

	public function searchAllDirectSellerRegistrationList($limit,$start,$distributer_id){
		$this->db2->select('usr.status,upd.distributerId,upd.firstName,upd.lastName,upd.sponsorId,upd.placementId,usr.createdAt,usr.activatedAt,usr.id');
		$this->db2->from('users as usr');
		$this->db2->join('user_peronal_details as upd','upd.userId=usr.id');
		$this->db2->like('usr.distributerId',$distributer_id);
		$this->db2->limit($limit,$start);
		$this->db2->order_by('usr.id','desc');
		return $this->db2->get()->result();
	}

	public function GenerateDirectSellerIDS($userId){
		$stcode=$this->getUserStateCode($userId);
		$dis=array();
		$prefix=DISTR_PREFIX.$stcode;
		$pad_len=DISTR_PREFIX_LENGTH;
		$inp=$this->get_last_distributer_id($stcode);
		$input=$inp+1;
		$num=str_pad($input, $pad_len, "0", STR_PAD_LEFT);
		$distributer_id=$prefix.$num;
		$dis=array('distributer_code'=>$num,'distributer_id'=>$distributer_id,'state_code'=>$stcode);
		return $dis;
	}

	public function getUserStateCode($userId){
		$stateCode="";
		$resp=$this->db2->where('userId',$userId)->get('user_personal_address')->row();
		if(!empty($resp)){
			$stResp=$this->db2->where('id',$resp->state)->get('states')->row();
			if(!empty($stResp)){
				$stateCode=$stResp->state_code;
			}
		}
		return $stateCode;
	}

	public function get_last_distributer_id($stateCode){
		$code=0;
		$resp=$this->db2->select('max(distributerCode) as code')->where('stateCode',$stateCode)->get('user_peronal_details')->row();
		if(!empty($resp)){
			$code=$resp->code;
		}
		return $code;
	}

	public function GetLastRefId(){
		$refId="";
		$resp=$this->db2->select('max(refId) as id')->get('user_peronal_details')->row();
		if(!empty($resp)){
			$refId=$resp->id;
		}
		return $refId;
	}

	public function updateUserPersonalDetails($id,$data){
		return $this->db2->where('userId ',$id)->set($data)->update('user_peronal_details');
	}

	public function getMobileNoByID($Id){
		$mobileNo="";
		$resp=$this->db2->where('id',$Id)->get('users')->row();
		if(!empty($resp)){ $mobileNo=$resp->mobileNo; }
		return $mobileNo;
	}

	public function getEmailByID($Id){
		$emailId="";
		$resp=$this->db2->where('id',$Id)->get('users')->row();
		if(!empty($resp)){ $emailId=$resp->emailId; }
		return $emailId;
	}


	public function checkMobile($id,$mobile){
		return $this->db2->where(array('id'=>$id,'mobileNo'=>$mobile))->get('users')->row();
	}

	public function checkMobileExist($mobile){
		return $this->db2->where(array('mobileNo'=>$mobile))->get('users')->row();
	}


	public function checkEmail($id,$email){
		return $this->db2->where(array('id'=>$id,'emailId'=>$email))->get('users')->row();
	}

	public function checkEmailExist($email){
		return $this->db2->where(array('emailId'=>$email))->get('users')->row();
	}

	public function CheckDistributerExist($distributerId){
		$status=false;
		$res=$this->db2->where(array('distributerId'=>$distributerId))->get('users')->row();
		if(!empty($res)){$status=true;}
		return $status;
	}
	
	public function getbvdateBv($user_id){
		$res['first_bv_date']='---';
		$res['total_bv']='---';
		$response=$this->db2->where('userId',$user_id)->order_by('id','ASC')->get('user_invoice_bv_track')->row();
		if(!empty($response)){
			$res['first_bv_date']=$response->Date;
			$res_total_bv=$this->db2->select('SUM(BV) as total_bv')->where('userId',$user_id)->get('user_invoice_bv_track')->row();
			if(!empty($res_total_bv)){ $res['total_bv']=$res_total_bv->total_bv;}
		}
		return $res;
	}
}