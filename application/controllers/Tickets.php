<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Tickets extends MY_Controller {
    function __construct() {
        parent::__construct();
    }
	
	public function index()
	{
		//screen 1.4.0
		$powerval = 'r';
		$screenid = '1.4.0';
		$faqscrid = '1.4.0';
		$userid00 = $this->session->uid;

		$this->db->trans_start();
		$matchp00 = $this->db->query("SELECT p4.value AS priv from identities AS p1 INNER JOIN local_identities AS p2 ON p1.id = p2.id INNER JOIN roles AS p3 ON p2.role = p3.id INNER JOIN privilege AS p4 ON p3.id = p4.roleId WHERE p1.username = ? AND p4.screen = ?",array($userid00,$screenid));
		$this->db->trans_complete();

		$matchp01 = $matchp00->row();

		if($matchp00->num_rows() > 0){$powermat = $matchp01->priv;}else{$powermat = 'x';}

		if (strpos($powermat,$powerval) !== false) {
			$this->db->trans_start();
			$version0 = $this->db->query("SELECT value FROM config_system_info WHERE id = ?",array(1001));
			$header00 = $this->db->query("SELECT value FROM config_system_info WHERE id = ?",array(1003));
			$tickets = $this->db->query('SELECT p1.id AS id,p1.compId AS compId,p4.name AS compName,p1.outletId AS outletId,p5.name AS outletName,p1.machId AS machId,p6.id AS machName,p1.crDate AS crDate,p1.name AS name,p1.contact AS contact,p1.callType AS callType,p3.name AS callTypeName,p1.error AS error,p7.name AS errorName,p1.status AS status,p2.name AS statusName,p1.amount AS amount,p1.remark AS remark,p1.bankAc AS bankAc,p1.ref AS ref FROM tickets AS p1 INNER JOIN config_ticket_status AS p2 ON p1.status = p2.id INNER JOIN config_call_type AS p3 ON p1.callType = p3.id INNER JOIN companies AS p4 ON p1.compId = p4.id INNER JOIN outlets AS p5 ON p1.outletId = p5.id INNER JOIN machines AS p6 ON p1.machId = p6.id INNER JOIN config_machine_error AS p7 ON p1.error = p7.id');
			$companies = $this->db->query("SELECT id,name FROM companies");
			$macherror = $this->db->query("SELECT id,name FROM config_machine_error");
			$calltype0 = $this->db->query("SELECT id,name FROM config_call_type");
			$ticstatus = $this->db->query("SELECT id,name FROM config_ticket_status");
			$this->db->trans_complete();
			
			$version0 = $version0->row();
			$header00 = $header00->row();
			
			$attr['tickets'] = $tickets->result_array();
			$attr['companies'] = $companies->result_array();
			$attr['errorcode'] = $macherror->result_array();
			$attr['calltype0'] = $calltype0->result_array();
			$attr['ticstatus'] = $ticstatus->result_array();
		
			$attr['version0'] = $version0->value;
			$attr['header00'] = $header00->value;
			$attr['flashmsg'] = $this->session->flashdata('message');
			$attr['screenid'] = $screenid;
			$attr['faqscrid'] = $faqscrid;
			$attr['sdbaract'] = 'class="active"';
			$attr['breadcrb'] = '<li class="crumb-link"><a href="'.base_url('dashboard').'">Dashboard</a></li><li class="crumb-trail">Tickets</li>';
			
			$data['headervw'] = $this->load->view('templates/headerview',$attr, true);
			$data['sidebrvw'] = $this->load->view('templates/sideview',$attr, true);
			$data['contntvw'] = $this->load->view('modules/ticketview',$attr, true);
			
			$this->load->view('parserview', $data);	
		}
		else {
			$errcode0 = '<div class="col-md-12"><div class="alert alert-success dark alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>You do not have enough privilege to view the screen</div></div>';
			$this->session->set_flashdata('message', $errcode0);
			redirect('dashboard');
		}
	}
	
	public function validate()
	{
		$powerval = 'c';
		$screenid = '1.4.0';
		$userid00 = $this->session->uid;

		$this->db->trans_start();
		$matchp00 = $this->db->query("SELECT p4.value AS priv from identities AS p1 INNER JOIN local_identities AS p2 ON p1.id = p2.id INNER JOIN roles AS p3 ON p2.role = p3.id INNER JOIN privilege AS p4 ON p3.id = p4.roleId WHERE p1.username = ? AND p4.screen = ?",array($userid00,$screenid));
		$this->db->trans_complete();

		$matchp01 = $matchp00->row();

		if($matchp00->num_rows() > 0){$powermat = $matchp01->priv;}else{$powermat = 'x';}

		if (strpos($powermat,$powerval) !== false) {
			$query = $this->db->query('SELECT id FROM tickets ORDER BY id DESC LIMIT 1');
			$calt = $query->row();
			
			if(isset($_GET['id']) && $_GET['id'] !== 0){$calt = $_GET['id']; $crDate = $_POST['crDate'];}else {$calt = 1 + $calt->id; $crDate = time();}
			if(isset($_POST['refund'])){$refund = $_POST['refund'];}else{$refund = 0;}

			$ops = array(
				'id'		=> $calt,
				'compId'	=> $_POST['compId'],
				'outletId'	=> $_POST['outletId'],
				'machId'	=> $_POST['machId'],
				'crDate'	=> $crDate,
				'name'		=> strtolower($_POST['name']),
				'contact'	=> $_POST['contact'],
				'callType'	=> strtolower($_POST['callType']),
				'error'		=> strtolower($_POST['error']),
				'status'	=> strtolower($_POST['status']),
				'amount'	=> $_POST['amount'],
				'bankAc'	=> $_POST['bankAc'],
				'remark'	=> $_POST['remark'],
				'ref'		=> $_POST['ref'],
				'pic'		=> $_POST['pic'],
				'refund'	=> $refund,
				'userArc' => 'admin',
				'dateArc' => time()
			);
			
			if(isset($_GET['id']) && $_GET['id'] !== 0){
				$this->db->trans_start();
				$this->db->replace('tickets', $ops);
				$this->db->trans_complete();
			}
			else {
				$this->db->trans_start();
				$this->db->insert('tickets', $ops);
				$this->db->trans_complete();
			}
			
			if(isset($_GET['id']) && $_GET['id'] !== 0){
				$this->session->set_flashdata('message','<div class="col-md-12"><div class="alert alert-success dark alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Details of ticket <strong>'.$calt.'</strong> successfully updated.</div></div>');
				redirect('tickets/details?id='.$_GET['id']);
			}
			else {
				$this->session->set_flashdata('message','<div class="col-md-12"><div class="alert alert-success dark alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ticket with ID <strong>'.$calt.'</strong> successfully created.</div></div>');
				redirect('tickets');
			}
		}
		else {
			$errcode0 = '<div class="col-md-12"><div class="alert alert-success dark alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>You do not have enough privilege to view the screen</div></div>';
			$this->session->set_flashdata('message', $errcode0);
			redirect('dashboard');
		}
	}
	
	public function remove()
	{
		$powerval = 'd';
		$screenid = '1.4.0';
		$userid00 = $this->session->uid;

		$this->db->trans_start();
		$matchp00 = $this->db->query("SELECT p4.value AS priv from identities AS p1 INNER JOIN local_identities AS p2 ON p1.id = p2.id INNER JOIN roles AS p3 ON p2.role = p3.id INNER JOIN privilege AS p4 ON p3.id = p4.roleId WHERE p1.username = ? AND p4.screen = ?",array($userid00,$screenid));
		$this->db->trans_complete();

		$matchp01 = $matchp00->row();

		if($matchp00->num_rows() > 0){$powermat = $matchp01->priv;}else{$powermat = 'x';}

		if (strpos($powermat,$powerval) !== false) {
			if (isset($_POST['checkList'])){
				$list = $_POST['checkList'];
				foreach ($list as $list=>$row){
					$calt++;
					$this->db->trans_start();
					$this->db->where('id', $row);
					$this->db->delete('tickets');
					$this->db->trans_complete();
				}
			}
			$this->session->set_flashdata('message','<div class="col-md-12"><div class="alert alert-success dark alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>'.$calt.'</strong> Ticket(s) successfully deleted</div></div>');
		}
		else {
			$this->session->set_flashdata('message','<div class="col-md-12"><div class="alert alert-danger dark alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>You have not enough privilege to execute such operation</div></div>');
		}
		redirect('tickets');
	}
	
	public function faq()
	{
		$this->load->view('parserview', $data);
	}
	
	public function details()
	{
		//screen 1.4.1
		$powerval = 'r';
		$screenid = '1.4.0';
		$faqscrid = '1.4.1';
		$userid00 = $this->session->uid;

		$this->db->trans_start();
		$matchp00 = $this->db->query("SELECT p4.value AS priv from identities AS p1 INNER JOIN local_identities AS p2 ON p1.id = p2.id INNER JOIN roles AS p3 ON p2.role = p3.id INNER JOIN privilege AS p4 ON p3.id = p4.roleId WHERE p1.username = ? AND p4.screen = ?",array($userid00,$screenid));
		$this->db->trans_complete();

		$matchp01 = $matchp00->row();

		if($matchp00->num_rows() > 0){$powermat = $matchp01->priv;}else{$powermat = 'x';}

		if (strpos($powermat,$powerval) !== false) {	
			$this->db->trans_start();
			$version0 = $this->db->query("SELECT value FROM config_system_info WHERE id = ?",array(1001));
			$header00 = $this->db->query("SELECT value FROM config_system_info WHERE id = ?",array(1003));
			$tickets = $this->db->query('SELECT p1.id AS id,p1.compId AS compId,p4.name AS compName,p1.outletId AS outletId,p5.name AS outletName,p1.machId AS machId,p6.name AS machName,p1.crDate AS crDate,p1.name AS name,p1.contact AS contact,p1.callType AS callType,p3.name AS callTypeName,p1.error AS error,p7.name AS errorName,p1.status AS status,p2.name AS statusName,p1.amount AS amount,p1.remark AS remark,p1.bankAc AS bankAc,p1.ref AS ref,p1.refund AS refund,p1.pic AS pic FROM tickets AS p1 INNER JOIN config_ticket_status AS p2 ON p1.status = p2.id INNER JOIN config_call_type AS p3 ON p1.callType = p3.id INNER JOIN companies AS p4 ON p1.compId = p4.id INNER JOIN outlets AS p5 ON p1.outletId = p5.id INNER JOIN machines AS p6 ON p1.machId = p6.id INNER JOIN config_machine_error AS p7 ON p1.error = p7.id WHERE p1.id =?',array($_GET['id']));
			$macherror = $this->db->query("SELECT id,name FROM config_machine_error");
			$calltype0 = $this->db->query("SELECT id,name FROM config_call_type");
			$ticstatus = $this->db->query("SELECT id,name FROM config_ticket_status");
			$this->db->trans_complete();
			
			$version0 = $version0->row();
			$header00 = $header00->row();
			$customn = $tickets->row();
			
			$attr['tickets'] = $tickets->result_array();
			$attr['customn'] = $customn->id;
			$attr['errorcode'] = $macherror->result_array();
			$attr['calltype0'] = $calltype0->result_array();
			$attr['ticstatus'] = $ticstatus->result_array();
			
			$attr['version0'] = $version0->value;
			$attr['header00'] = $header00->value;
			$attr['flashmsg'] = $this->session->flashdata('message');
			$attr['screenid'] = $screenid;
			$attr['faqscrid'] = $faqscrid;
			$attr['sdbaract'] = 'class="active"';
			$attr['breadcrb'] = '<li class="crumb-link"><a href="'.base_url('dashboard').'">Dashboard</a></li><li class="crumb-link"><a href="'.base_url('tickets').'">Tickets</a></li><li class="crumb-trail">Ticket ID #'.$attr['customn'].'</li>';
			
			$data['headervw'] = $this->load->view('templates/headerview',$attr, true);
			$data['sidebrvw'] = $this->load->view('templates/sideview',$attr, true);
			$data['contntvw'] = $this->load->view('modules/ticketdetailsview',$attr, true);
			
			$this->load->view('parserview', $data);	
		}
		else {
			$errcode0 = '<div class="col-md-12"><div class="alert alert-success dark alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>You do not have enough privilege to view the screen</div></div>';
			$this->session->set_flashdata('message', $errcode0);
			redirect('dashboard');
		}
	}
	
	//Begin outletdropdown dynamic dropdown
	public function outletdropdown()
	{
		if($_GET['choice'] != 0){
			$this->db->trans_start();
			$query = $this->db->query('SELECT id,name FROM outlets WHERE compId =?',array($_GET['choice']));
			$this->db->trans_complete();
			$outlets = $query->result_array();
		
			$calt = 0;
			
			foreach($outlets as $row) {$calt++;echo '<option value="'.$row['id'].'">#'.$row['id'].'| '.strtoupper($row['name']).'</option>';}
			echo '<option selected value="default">Choose Outlet from list ('.$calt.' found)</option>';
		}
		else{echo '<option value="default">Choose a Company first..</option>';}
	}
	//End outletdropdown dynamic dropdown
	
	
	//Begin outletdropdown dynamic dropdown
	public function machinedropdown()
	{
		$this->db->trans_start();
		$query = $this->db->query('SELECT id,name FROM machines WHERE outletId =?',array($_GET['choice']));
		$this->db->trans_complete();
		$machines = $query->result_array();
	
		$calt = 0;
		
		foreach($machines as $row) {$calt++;echo '<option value="'.$row['id'].'">#'.$row['id'].'| '.strtoupper($row['name']).'</option>';}
		echo '<option selected value="default">Choose machine from list ('.$calt.' found)</option>';
	}
}
