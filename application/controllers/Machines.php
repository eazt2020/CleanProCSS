<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Machines extends MY_Controller {
    function __construct() {
        parent::__construct();
    }
	
	public function index()
	{
		$powerval = 'r';
		$screenid = '1.3.0';
		$faqscrid = '1.3.0';
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
			$machines = $this->db->query("SELECT p1.id AS id,p1.machNo AS machNo,p1.name AS name,p1.outletId AS outletId,p1.compId AS compId,p4.name AS compName,p5.name AS outletName ,p3.type AS type,p3.imageName AS imageName,p2.status AS status from machines AS p1 INNER JOIN config_machine_status AS p2 ON p1.status = p2.id  INNER JOIN config_machine_type AS p3 ON p1.type = p3.id INNER JOIN companies AS p4 ON p4.id = p1.compId INNER JOIN outlets AS p5 ON p1.outletId = p5.id");
			$compan00 = $this->db->query("SELECT p1.id AS id,p1.name AS name FROM companies AS p1");
			$mactyp00 = $this->db->query("SELECT p1.id AS id,p1.type AS type FROM config_machine_type AS p1;");
			$status00 = $this->db->query("SELECT p1.id AS id,p1.status AS status FROM config_machine_status AS p1");
			$this->db->trans_complete();
			
			$version0 = $version0->row();
			$header00 = $header00->row();
			
			$attr['machines'] = $machines->result_array();
			$attr['mactyp00'] = $mactyp00->result_array();
			$attr['compan00'] = $compan00->result_array();
			$attr['status00'] = $status00->result_array();
		
			$attr['version0'] = $version0->value;
			$attr['header00'] = $header00->value;
			$attr['flashmsg'] = $this->session->flashdata('message');
			$attr['screenid'] = $screenid;
			$attr['faqscrid'] = $faqscrid;
			$attr['sdbaract'] = 'class="active"';
			$attr['sidebar0'] = $sidebar0->result_array();
			$attr['breadcrb'] = '<li class="crumb-link"><a href="'.base_url('dashboard').'">Dashboard</a></li><li class="crumb-trail">Machines</li>';
			
			$data['headervw'] = $this->load->view('templates/headerview',$attr, true);
			$data['sidebrvw'] = $this->load->view('templates/sideview',$attr, true);
			$data['contntvw'] = $this->load->view('modules/machineview',$attr, true);
			
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
		$screenid = '1.3.0';
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
					$this->db->where('machId', $row);
					$this->db->delete('tickets');
					$this->db->where('Id', $row);
					$this->db->delete('machines');
					$this->db->trans_complete();
				}
			}
		}
		$this->session->set_flashdata('message','<div class="col-md-12"><div class="alert alert-success dark alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>'.$calt.'</strong> machine(s) successfully deleted</div></div>');
		
		redirect('machines');
	}
	
	public function validate()
	{
		$powerval = 'c';
		$screenid = '1.3.0';
		$userid00 = $this->session->uid;

		$this->db->trans_start();
		$matchp00 = $this->db->query("SELECT p4.value AS priv from identities AS p1 INNER JOIN local_identities AS p2 ON p1.id = p2.id INNER JOIN roles AS p3 ON p2.role = p3.id INNER JOIN privilege AS p4 ON p3.id = p4.roleId WHERE p1.username = ? AND p4.screen = ?",array($userid00,$screenid));
		$this->db->trans_complete();

		$matchp01 = $matchp00->row();

		if($matchp00->num_rows() > 0){$powermat = $matchp01->priv;}else{$powermat = 'x';}

		if (strpos($powermat,$powerval) !== false) {
			$query = $this->db->query('SELECT id FROM machines ORDER BY id DESC LIMIT 1');
			$calt = $query->row();
			
			if(isset($_GET['id']) && $_GET['id'] !== 0){
				$calt = $_GET['id'];
			}
			else {
				$calt = 1 + $calt->id;
			}
			
			$ops = array(
				'id'		=> $calt,
				'compId'	=> $_POST['compId'],
				'outletId'	=> $_POST['outletId'],
				'name'		=> strtolower($_POST['name']),
				'machNo'	=> strtolower($_POST['machNo']),
				'status'	=> $_POST['status'],
				'type'		=> $_POST['type'],
				'userArc'	=> $userid00,
				'dateArc'	=> time()
			);
			
			if(isset($_GET['id']) && $_GET['id'] !== 0){
				$this->db->trans_start();
				$this->db->replace('machines', $ops);
				$this->db->trans_complete();
				
				$this->session->set_flashdata('message','<div class="col-md-12"><div class="alert alert-success dark alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Details of machine <strong>'.$calt.'</strong> successfully updated.</div></div>');
				redirect('machines/details?id='.$_GET['id']);
			}
			else {
				$this->db->trans_start();
				$this->db->insert('machines', $ops);
				$this->db->trans_complete();
				
				$this->session->set_flashdata('message','<div class="col-md-12"><div class="alert alert-success dark alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Machine with ID <strong>'.$calt.'</strong> successfully created.</div></div>');
				redirect('machines');
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
		$screenid = '1.3.0';
		$faqscrid = '1.3.1';
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
			$machines = $this->db->query("select p1.id AS id,p1.machNo AS machNo,p1.name AS name,p3.imageName AS imageName,p4.name AS compName, p5.name AS outletName, p1.outletId AS outletId,p1.compId AS compId,p3.type AS type,p1.type AS typeId,p2.status AS status ,p1.status AS statusId from machines AS p1 INNER JOIN config_machine_status AS p2 ON p1.status = p2.id  INNER JOIN config_machine_type AS p3 ON p1.type = p3.id  INNER JOIN companies AS p4 ON p1.compId = p4.id INNER JOIN outlets AS p5 ON p1.outletId = p5.id WHERE p1.id=?",array($_GET['id']));
			$ticket00 = $this->db->query("SELECT p1.id AS id,p1.compId AS compId,p1.outletId AS outletId,p1.machId AS machId,p1.name AS name,p1.contact As contact,p1.callType AS callType,p2.name AS error,p1.status AS status FROM tickets AS p1 INNER JOIN config_machine_error AS p2 ON p1.error = p2.id WHERE p1.outletId =?",array($_GET['id']));
			$mactyp00 = $this->db->query("SELECT p1.id AS id,p1.type AS type FROM config_machine_type AS p1;");
			$status00 = $this->db->query("SELECT p1.id AS id,p1.status AS status FROM config_machine_status AS p1");
			$this->db->trans_complete();
			
			$version0 = $version0->row();
			$header00 = $header00->row();
			$machnam0 = $machines->row();
			
			$attr['machnam0'] = $machnam0->name;
			$attr['machines'] = $machines->result_array();
			$attr['mactyp00'] = $mactyp00->result_array();
			$attr['status00'] = $status00->result_array();
			$attr['ticket00'] = $ticket00->result_array();

			
			$attr['version0'] = $version0->value;
			$attr['header00'] = $header00->value;
			$attr['flashmsg'] = $this->session->flashdata('message');
			$attr['screenid'] = $screenid;
			$attr['faqscrid'] = $faqscrid;
			$attr['sdbaract'] = 'class="active"';
			$attr['sidebar0'] = $sidebar0->result_array();
			$attr['breadcrb'] = '<li class="crumb-link"><a href="'.base_url('dashboard').'">Dashboard</a></li><li class="crumb-link"><a href="'.base_url('machines').'">Machines</a></li><li class="crumb-trail">'.strtoupper($attr['machnam0']).'</li>';
			
			$data['headervw'] = $this->load->view('templates/headerview',$attr, true);
			$data['sidebrvw'] = $this->load->view('templates/sideview',$attr, true);
			$data['contntvw'] = $this->load->view('modules/machinedetailsview',$attr, true);
			
			$this->load->view('parserview', $data);	
		}
		else {
			$errcode0 = '<div class="col-md-12"><div class="alert alert-success dark alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>You do not have enough privilege to view the screen</div></div>';
			$this->session->set_flashdata('message', $errcode0);
			redirect('dashboard');
		}
	}

	public function machinedropdown()
	{
		$this->db->trans_start();
		$query = $this->db->query('SELECT * FROM outlets WHERE compId =?',array($_GET['choice']));
		$this->db->trans_complete();
		$outlets = $query->result_array();
	
		$calt = 0;
		
		foreach($outlets as $row) {
			$calt++;
			echo '<option value="'.$row['id'].'">#'.$row['id'].'| '.strtoupper($row['name']).'</option>';
		}
		echo '<option selected value="default">Choose Outlet from list ('.$calt.' found)</option>';
	}
}
