<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Outlets extends MY_Controller {
    function __construct() {
        parent::__construct();
    }
	
	public function index()
	{
		$powerval = 'r';
		$screenid = '1.2.0';
		$faqscrid = '1.2.0';
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
			$sidebar0 = $this->db->query("SELECT p4.screen AS screen from identities AS p1 INNER JOIN local_identities AS p2 ON p1.id = p2.id INNER JOIN roles AS p3 ON p2.role = p3.id INNER JOIN privilege AS p4 ON p3.id = p4.roleId WHERE p1.username = ? AND p4.value != '' ORDER BY p4.screen ASC;",array($userid00));
			$outlet00 = $this->db->query("SELECT p1.id AS id,p1.compId AS compId,p1.name AS name,p1.contact AS contact,p1.primeAdd AS primeAdd,p1.secondAdd AS secondAdd,p1.city AS city,p2.name AS state,p1.postcode AS postcode FROM outlets AS p1 INNER JOIN config_state AS p2 ON p1.state = p2.id");
			$facili00 = $this->db->query("SELECT p1.outletId AS outletId,p1.type AS type, p2.type AS typeName,p2.imageName AS imageName FROM machines AS p1 INNER JOIN config_machine_type AS p2 ON p1.type = p2.id GROUP BY p1.type,p1.outletId;");
			$company0 = $this->db->query("SELECT id,name FROM companies");
			$states00 = $this->db->query("SELECT id,name FROM config_state");
			$this->db->trans_complete();
			
			$version0 = $version0->row();
			$header00 = $header00->row();
			
			$attr['outlet00'] = $outlet00->result_array();
			$attr['facili00'] = $facili00->result_array();
			$attr['company0'] = $company0->result_array();
			$attr['states00'] = $states00->result_array();
		
			$attr['version0'] = $version0->value;
			$attr['header00'] = $header00->value;
			$attr['flashmsg'] = $this->session->flashdata('message');
			$attr['screenid'] = $screenid;
			$attr['faqscrid'] = $faqscrid;
			$attr['sdbaract'] = 'class="active"';
			$attr['sidebar0'] = $sidebar0->result_array();
			$attr['breadcrb'] = '<li class="crumb-link"><a href="'.base_url('dashboard').'">Dashboard</a></li><li class="crumb-trail">Outlets</li>';
			
			$data['headervw'] = $this->load->view('templates/headerview',$attr, true);
			$data['sidebrvw'] = $this->load->view('templates/sideview',$attr, true);
			$data['contntvw'] = $this->load->view('modules/outletview',$attr, true);
			
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
		$screenid = '1.2.0';
		$userid00 = $this->session->uid;

		$this->db->trans_start();
		$matchp00 = $this->db->query("SELECT p4.value AS priv from identities AS p1 INNER JOIN local_identities AS p2 ON p1.id = p2.id INNER JOIN roles AS p3 ON p2.role = p3.id INNER JOIN privilege AS p4 ON p3.id = p4.roleId WHERE p1.username = ? AND p4.screen = ?",array($userid00,$screenid));
		$this->db->trans_complete();

		$matchp01 = $matchp00->row();

		if($matchp00->num_rows() > 0){$powermat = $matchp01->priv;}else{$powermat = 'x';}

		if (strpos($powermat,$powerval) !== false) {
			$this->form_validation->set_error_delimiters('<p>', '</p>');
			$this->form_validation->set_rules('compId', 'compId', 'required',array('required' => 'You must choose a company name in the \'Company Name\' field.<br>'));
			$this->form_validation->set_rules('name', 'name', 'required',array('required' => 'You must provide an outlet name in the \'Outlet Name\' field.<br>'));
			$this->form_validation->set_rules('contact', 'contact', 'numeric',array('numeric' => '\'Contact Number\' field only accept numeric values.<br>'));
			$this->form_validation->set_rules('add1', 'add1', 'required',array('required' => 'You must provide a valid address in the \'Address Line 1\' field.<br>'));
			$this->form_validation->set_rules('city', 'city', 'required',array('required' => 'You must complete the company address \'City\' field.<br>'));
			$this->form_validation->set_rules('state', 'state', 'required',array('required' => 'You must complete the company address \'State\' field.<br>'));
			$this->form_validation->set_rules('postcode', 'postcode', 'required|numeric',array('required' => 'You must complete the company address \'Postcode\' field.<br>','numeric' => '\'Postcode\' field only accept numeric values.<br>'));
		
			if ($this->form_validation->run() == FALSE){
				$errorcode = '<div class="alert alert-danger dark alert-dismissable" id="alert-2"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.validation_errors().'</div>';
				$errormsg = $this->session->set_flashdata('message', $errorcode);
				
				if(isset($_GET['id']) && $_GET['id'] !== 0){
					redirect('outlets/edit?id='.$_GET['id']);
				}
				else {
					redirect('outlets/add');
				}
			}
			else{
				$query = $this->db->query('SELECT id FROM outlets ORDER BY id DESC LIMIT 1');
				$calt = $query->row();
				
				if(isset($_GET['id']) && $_GET['id'] !== 0){
					$calt = $_GET['id'];
				}
				else {
					$calt = 1 + $calt->id;
				}
				

				$ops = array(
					'id' => $calt,
					'compId' => $_POST['compId'],
					'name' => strtolower($_POST['name']),
					'contact' => $_POST['contact'],
					'primeAdd' => strtolower($_POST['add1']),
					'secondAdd' =>  strtolower($_POST['add2']),
					'city' => strtolower($_POST['city']),
					'state' => strtolower($_POST['state']),
					'postcode' => $_POST['postcode'],
					'userArc' => 'admin',
					'dateArc' => time()
				);
				
				if(isset($_GET['id']) && $_GET['id'] !== 0){
					$this->db->trans_start();
					$this->db->replace('outlets', $ops);
					$this->db->trans_complete();
				}
				else {
					$this->db->trans_start();
					$this->db->insert('outlets', $ops);
					$this->db->trans_complete();
				}
				
				
				if(isset($_GET['id']) && $_GET['id'] !== 0){
					$this->session->set_flashdata('message','<div class="col-md-12"><div class="alert alert-success dark alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Details of outlet <strong>'.$calt.'</strong> successfully updated.</div></div>');
				
					redirect('outlets/details?id='.$_GET['id']);
				}
				else {
					$this->session->set_flashdata('message','<div class="col-md-12"><div class="alert alert-success dark alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Outlet with ID <strong>'.$calt.'</strong> successfully created.</div></div>');
					
					redirect('outlets');
				}
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
		$screenid = '1.2.0';
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
					$this->db->where('outletId', $row);
					$this->db->delete('tickets');
					$this->db->where('outletId', $row);
					$this->db->delete('machines');
					$this->db->where('id', $row);
					$this->db->delete('outlets');
					$this->db->trans_complete();
				}
			}
		}
		$this->session->set_flashdata('message','<div class="col-md-12"><div class="alert alert-success dark alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>'.$calt.'</strong> outlet(s) successfully deleted</div></div>');
		redirect('outlets');
	}
	
	public function details()
	{
		$powerval = 'r';
		$screenid = '1.2.0';
		$faqscrid = '1.2.1';
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
			$sidebar0 = $this->db->query("SELECT p4.screen AS screen from identities AS p1 INNER JOIN local_identities AS p2 ON p1.id = p2.id INNER JOIN roles AS p3 ON p2.role = p3.id INNER JOIN privilege AS p4 ON p3.id = p4.roleId WHERE p1.username = ? AND p4.value != '' ORDER BY p4.screen ASC;",array($userid00));
			$outlet00 = $this->db->query("SELECT p1.id AS id,p1.compId AS compId, p3.name AS compName, p1.name AS name,p1.contact AS contact,p1.primeAdd AS primeAdd,p1.secondAdd AS secondAdd,p1.city AS city,p2.name AS state,p1.postcode AS postcode FROM outlets AS p1 INNER JOIN config_state AS p2 ON p1.state = p2.id INNER JOIN companies AS p3 ON p1.compId = p3.id WHERE p1.id =?",array($_GET['id']));
			$machi000 = $this->db->query("select p1.id AS id,p1.name AS name,p1.outletId AS outletId,p1.compId AS compId,p3.type AS type,p2.status AS status from machines AS p1 INNER JOIN config_machine_status AS p2 ON p1.status = p2.id  INNER JOIN config_machine_type AS p3 ON p1.type = p3.id  WHERE p1.outletId=?",array($_GET['id']));
			$ticket00 = $this->db->query("SELECT p1.id AS id,p1.compId AS compId,p1.outletId AS outletId,p1.machId AS machId,p1.name AS name,p1.contact As contact,p1.callType AS callType,p2.name AS error,p1.status AS status FROM tickets AS p1 INNER JOIN config_machine_error AS p2 ON p1.error = p2.id WHERE p1.outletId =?",array($_GET['id']));
			$company0 = $this->db->query("SELECT id,name FROM companies");
			$states00 = $this->db->query("SELECT id,name FROM config_state");
			$this->db->trans_complete();
			
			$version0 = $version0->row();
			$header00 = $header00->row();
			$outlet01 = $outlet00->row();

			$attr['outlet01'] = $outlet01->name;
			$attr['outlet00'] = $outlet00->result_array();
			$attr['machi000'] = $machi000->result_array();
			$attr['ticket00'] = $ticket00->result_array();
			$attr['company0'] = $company0->result_array();
			$attr['states00'] = $states00->result_array();
			
			$attr['version0'] = $version0->value;
			$attr['header00'] = $header00->value;
			$attr['flashmsg'] = $this->session->flashdata('message');
			$attr['screenid'] = $screenid;
			$attr['faqscrid'] = $faqscrid;
			$attr['sdbaract'] = 'class="active"';
			$attr['sidebar0'] = $sidebar0->result_array();
			$attr['breadcrb'] = '<li class="crumb-link"><a href="'.base_url('dashboard').'">Dashboard</a></li><li class="crumb-link"><a href="'.base_url('outlets').'">Outlets</a></li><li class="crumb-trail">'.strtoupper($attr['outlet01']).'</li>';
			
			$data['headervw'] =  $this->load->view('templates/headerview',$attr, true);
			$data['sidebrvw'] =  $this->load->view('templates/sideview',$attr, true);
			$data['contntvw'] =  $this->load->view('modules/outletdetailsview',$attr, true);
			
			$this->load->view('parserview', $data);	
		}
		else {
			$errcode0 = '<div class="col-md-12"><div class="alert alert-success dark alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>You do not have enough privilege to view the screen</div></div>';
			$this->session->set_flashdata('message', $errcode0);
			redirect('dashboard');
		}
	}
}
