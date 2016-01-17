<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Companies extends MY_Controller {
    function __construct() {
        parent::__construct();
    }
	
	public function index()
	{
		$powerval = 'r';
		$screenid = '1.1.0';
		$faqscrid = '1.1.0';
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
			$company0 = $this->db->query('SELECT comp.id AS id,comp.name AS name,comp.contact AS contact,comp.primeAdd AS primeAdd,comp.secondAdd AS secondAdd,comp.city AS city,stat.name AS state,comp.postcode AS postcode FROM companies AS comp INNER JOIN config_state AS stat ON comp.state = stat.id');
			$state000 = $this->db->query("SELECT * FROM config_state");
			
			
			$this->db->trans_complete();
			
			$version0 = $version0->row();
			$header00 = $header00->row();
			
			$attr['company0'] = $company0->result_array();
			$attr['state000'] = $state000->result_array();
		
			$attr['version0'] = $version0->value;
			$attr['header00'] = $header00->value;
			$attr['flashmsg'] = $this->session->flashdata('message');
			$attr['screenid'] = $screenid;
			$attr['faqscrid'] = $faqscrid;
			$attr['sdbaract'] = 'class="active"';
			$attr['sidebar0'] = $sidebar0->result_array();
			$attr['breadcrb'] = '<li class="crumb-link"><a href="'.base_url('dashboard').'">Dashboard</a></li><li class="crumb-trail">Companies</li>';
			
			$data['headervw'] = $this->load->view('templates/headerview',$attr, true);
			$data['sidebrvw'] = $this->load->view('templates/sideview',$attr, true);
			$data['contntvw'] = $this->load->view('modules/companyview',$attr, true);
			
			$this->load->view('parserview', $data);	
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
		$screenid = '1.1.0';
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
					$this->db->where('compId', $row);
					$this->db->delete('tickets');
					$this->db->where('compId', $row);
					$this->db->delete('machines');
					$this->db->where('compId', $row);
					$this->db->delete('outlets');
					$this->db->where('id', $row);
					$this->db->delete('companies');
					$this->db->trans_complete();
				}
			}
			$this->session->set_flashdata('message','<div class="col-md-12"><div class="alert alert-success dark alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>'.$calt.'</strong> company(s) successfully deleted</div></div>');
			redirect('companies');
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
		$screenid = '1.1.0';
		$userid00 = $this->session->uid;

		$this->db->trans_start();
		$matchp00 = $this->db->query("SELECT p4.value AS priv from identities AS p1 INNER JOIN local_identities AS p2 ON p1.id = p2.id INNER JOIN roles AS p3 ON p2.role = p3.id INNER JOIN privilege AS p4 ON p3.id = p4.roleId WHERE p1.username = ? AND p4.screen = ?",array($userid00,$screenid));
		$this->db->trans_complete();

		$matchp01 = $matchp00->row();

		if($matchp00->num_rows() > 0){$powermat = $matchp01->priv;}else{$powermat = 'x';}

		if (strpos($powermat,$powerval) !== false) {
			$query = $this->db->query('SELECT id FROM companies ORDER BY id DESC LIMIT 1');
			$calt = $query->row();
			
			if(isset($_GET['id']) && $_GET['id'] !== 0){$calt = $_GET['id'];}else {$calt = 1 + $calt->id;}
			
			$ops = array(
				'id' => $calt,
				'name' => strtolower($_POST['name']),
				'regNo' => strtolower($_POST['regNo']),
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
				$this->db->replace('companies', $ops);
				$this->db->trans_complete();
			}
			else {
				$this->db->trans_start();
				$this->db->insert('companies', $ops);
				$this->db->trans_complete();
			}
			
			if(isset($_GET['id']) && $_GET['id'] !== 0){
				$this->session->set_flashdata('message','<div class="col-md-12"><div class="alert alert-success dark alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Details of company <strong>'.$calt.'</strong> successfully updated.</div></div>');
			
				redirect('companies/details?id='.$_GET['id']);
			}
			else {
				$this->session->set_flashdata('message','<div class="col-md-12"><div class="alert alert-success dark alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Company with ID <strong>'.$calt.'</strong> successfully created.</div></div>');
				
				redirect('companies');
			}
		}
		else {
			$errcode0 = '<div class="col-md-12"><div class="alert alert-success dark alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>You do not have enough privilege to view the screen</div></div>';
			$this->session->set_flashdata('message', $errcode0);
			redirect('dashboard');
		}
	}
	
	public function details()
	{
		$powerval = 'r';
		$screenid = '1.1.0';
		$faqscrid = '1.1.1';
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
			$query3 = $this->db->query("SELECT comp.id AS id, comp.name AS name, comp.regNo AS regNo, comp.contact AS contact, comp.primeAdd as primeAdd, comp.secondAdd AS secondAdd, comp.city AS city, stat.name AS state, comp.postcode AS postcode FROM companies AS comp INNER JOIN config_state AS stat ON comp.state = stat.id WHERE comp.id =?",array($_GET['id']));
			$query4 = $this->db->query("SELECT p1.id AS id,p1.compId AS compId,p1.name AS name,p1.contact AS contact,p1.primeAdd AS primeAdd,p1.secondAdd AS secondAdd,p1.city AS city,p2.name AS state,p1.postcode AS postcode FROM outlets AS p1 INNER JOIN config_state AS p2 ON p1.state = p2.id WHERE p1.compId =?",array($_GET['id']));
			$query5 = $this->db->query("select p1.id AS id,p1.name AS name,p1.outletId AS outletId,p1.compId AS compId,p3.type AS type,p2.status AS status from machines AS p1 INNER JOIN config_machine_status AS p2 ON p1.status = p2.id  INNER JOIN config_machine_type AS p3 ON p1.type = p3.id  WHERE p1.compId=?",array($_GET['id']));
			$query6 = $this->db->query("SELECT p1.id AS id,p1.compId AS compId,p1.outletId AS outletId,p1.machId AS machId,p1.name AS name,p1.contact As contact,p1.callType AS callType,p2.name AS error,p1.status AS status FROM tickets AS p1 INNER JOIN config_machine_error AS p2 ON p1.error = p2.id WHERE p1.compId =?",array($_GET['id']));
			$state000 = $this->db->query("SELECT * FROM config_state");
			$this->db->trans_complete();
			
			$version0 = $version0->row();
			$header00 = $header00->row();
			$row3 = $query3->row();
			
			$attr['company'] = $row3->name;
			$attr['details'] = $query3->result_array();
			$attr['outlets'] = $query4->result_array();
			$attr['machines'] = $query5->result_array();
			$attr['tickets'] = $query6->result_array();
			$attr['state000'] = $state000->result_array();
			
			$attr['version0'] = $version0->value;
			$attr['header00'] = $header00->value;
			$attr['flashmsg'] = $this->session->flashdata('message');
			$attr['screenid'] = $screenid;
			$attr['faqscrid'] = $faqscrid;
			$attr['sdbaract'] = 'class="active"';
			$attr['sidebar0'] = $sidebar0->result_array();
			$attr['breadcrb'] = '<li class="crumb-link"><a href="'.base_url('dashboard').'">Dashboard</a></li><li class="crumb-link"><a href="'.base_url('companies').'">Companies</a></li><li class="crumb-trail">'.strtoupper($attr['company']).'</li>';
			
			$data['headervw'] = $this->load->view('templates/headerview',$attr, true);
			$data['sidebrvw'] = $this->load->view('templates/sideview',$attr, true);
			$data['contntvw'] = $this->load->view('modules/companydetailsview',$attr, true);
			
			$this->load->view('parserview', $data);	
		}
		else {
			redirect('dashboard');
		}
	}
}
