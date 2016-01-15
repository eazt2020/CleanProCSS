<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends MY_Controller {
    function __construct() {
        parent::__construct();
    }

	public function index()
	{
		$powerval = 'r';
		$screenid = '3.4.0';
		$faqscrid = '3.4.0';
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
			$sysuser0 = $this->db->query("SELECT p1.id AS id,p1.username AS username,p1.name AS name,p1.email AS email,p1.status AS status FROM identities AS p1;");
			$usrole00 = $this->db->query("SELECT p1.id AS id,p1.name AS name FROM roles AS p1;");
			$this->db->trans_complete();
			
			$version0 = $version0->row();
			$header00 = $header00->row();
		
			//page arrays
			$attr['sysuser0'] = $sysuser0->result_array();
			$attr['usrole00'] = $usrole00->result_array();
			
			//global arrays
			$attr['version0'] = $version0->value;
			$attr['header00'] = $header00->value;
			$attr['flashmsg'] = $this->session->flashdata('message');
			$attr['screenid'] = $screenid;
			$attr['faqscrid'] = $faqscrid;
			$attr['sdbaract'] = 'class="active"';
			$attr['sdbarmen'] = 'menu-open';
			$attr['breadcrb'] = '<li class="crumb-link"><a href="'.base_url('dashboard').'">Dashboard</a></li><li class="crumb-trail">System Settings</li><li class="crumb-trail">Users Settings</li><li class="crumb-trail">System Users</li>';

			$data['headervw'] = $this->load->view('templates/headerview',	$attr, true);
			$data['sidebrvw'] = $this->load->view('templates/sideview',		$attr, true);
			$data['contntvw'] = $this->load->view('modules/userview',		$attr, true);

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
		$screenid = '3.4.0';
		$userid00 = $this->session->uid;

		$this->db->trans_start();
		$matchp00 = $this->db->query("SELECT p4.value AS priv from identities AS p1 INNER JOIN local_identities AS p2 ON p1.id = p2.id INNER JOIN roles AS p3 ON p2.role = p3.id INNER JOIN privilege AS p4 ON p3.id = p4.roleId WHERE p1.username = ? AND p4.screen = ?",array($userid00,$screenid));
		$this->db->trans_complete();

		$matchp01 = $matchp00->row();

		if($matchp00->num_rows() > 0){$powermat = $matchp01->priv;}else{$powermat = 'x';}

		if (strpos($powermat,$powerval) !== false) {
			$this->form_validation->set_error_delimiters('', '');
			$this->form_validation->set_rules('name', 		'name', 	'required',	array('required' => 'You must provide the Full Name in the \'Full Name\' field.<br>'));
			$this->form_validation->set_rules('username', 	'username', 'required',	array('required' => 'You must username for login in the \'Username\' field.<br>'));
			$this->form_validation->set_rules('email', 		'email', 	'required',	array('required' => 'You must provide an email address in the \'Email Address\' field.<br>'));
			$this->form_validation->set_rules('role', 		'role', 	'required',	array('required' => 'Please choose role for the user<br>'));
			$this->form_validation->set_rules('status', 	'status', 	'required',	array('required' => 'Please choose the initial status for the user<br>'));
			$this->form_validation->set_rules('secret', 	'secret', 	'required',	array('required' => 'You must provide user password for login purpose<br>'));
		
			if ($this->form_validation->run() == FALSE){
				$errcode0 = '<div class="col-xs-12"><div class="alert alert-danger dark alert-dismissable" id="alert-2"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.validation_errors().'</div></div>';
				$errormsg = $this->session->set_flashdata('message', $errcode0);
				
				if(isset($_GET['id']) && $_GET['id'] !== 0){redirect('users/details?id='.$_GET['id']);}else {redirect('users');}
			}
			else{
				$this->db->trans_start();
				$idcalt00 = $this->db->query('SELECT id FROM identities ORDER BY id DESC LIMIT 1');
				$this->db->trans_complete();
				
				$calcul00 = $idcalt00->row();
				
				if(isset($_GET['id']) && $_GET['id'] !== 0){$calcul00 = $_GET['id'];}else {$calcul00 = 1 + $calcul00->id;}
				
				$datins00 = array(
					'id'		=> $calcul00,
					'username'	=> $_POST['username'],
					'name'		=> strtolower($_POST['name']),
					'email'		=> $_POST['email'],
					'status'	=> $_POST['status'],
					'userArc'	=> $userid00,
					'dateArc'	=> time()
				);
				
				$datins01 = array(
					'id'		=> $calcul00,
					'secret'	=> md5(sha1(sha1($_POST['username'].$_POST['secret']))),
					'role'		=> $_POST['role'],
					'encrypt'	=> base64_encode($_POST['secret']),
					'userArc'	=> $userid00,
					'dateArc'	=> time()
				);
				
				if(isset($_GET['id']) && $_GET['id'] !== 0){
					$this->db->trans_start();
					$this->db->replace('identities', 		$datins00);
					$this->db->replace('local_identities', 	$datins01);
					$this->db->trans_complete();
				}
				else {
					$this->db->trans_start();
					$this->db->insert('identities', 		$datins00);
					$this->db->insert('local_identities', 	$datins01);
					$this->db->trans_complete();
				}
				
				if(isset($_GET['id']) && $_GET['id'] !== 0){
					$this->session->set_flashdata('message','<div class="col-md-12"><div class="alert alert-success dark alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Details of User ID #<strong>'.$calcul00.'</strong> successfully updated.</div></div>');
					redirect('users/details?id='.$_GET['id']);
				}
				else {
					$this->session->set_flashdata('message','<div class="col-md-12"><div class="alert alert-success dark alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>User with ID #<strong>'.$calcul00.'</strong> successfully created.</div></div>');
					redirect('users');
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
		$screenid = '3.4.0';
		$userid00 = $this->session->uid;
		$calcul00 = 0;
		
		$this->db->trans_start();
		$matchp00 = $this->db->query("SELECT p4.value AS priv from identities AS p1 INNER JOIN local_identities AS p2 ON p1.id = p2.id INNER JOIN roles AS p3 ON p2.role = p3.id INNER JOIN privilege AS p4 ON p3.id = p4.roleId WHERE p1.username = ? AND p4.screen = ?",array($userid00,$screenid));
		$this->db->trans_complete();

		$matchp01 = $matchp00->row();

		if($matchp00->num_rows() > 0){$powermat = $matchp01->priv;}else{$powermat = 'x';}

		if (strpos($powermat,$powerval) !== false) {
			if (isset($_POST['checkList'])){
				$listck00 = $_POST['checkList'];
				foreach ($listck00 as $listck00=>$introw00){
					$calcul00++;
					$this->db->trans_start();
					$this->db->where('id', $introw00);
					$this->db->delete('identities');
					$this->db->where('id', $introw00);
					$this->db->delete('local_identities');
					$this->db->trans_complete();
				}
			}
		}
		$this->session->set_flashdata('message','<div class="col-md-12"><div class="alert alert-success dark alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>'.$calcul00.'</strong> user(s) successfully deleted</div></div>');
		
		redirect('users');
	}
	
	public function details()
	{
		$powerval = 'r';
		$screenid = '3.4.0';
		$faqscrid = '3.4.1';
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
			$sysusr00 = $this->db->query("SELECT p1.id AS id,p1.name AS name,p1.username AS username,p1.email AS email,p1.status AS status,p2.secret AS secret,p2.role AS role,p3.name AS roleName,p2.encrypt AS encrypt FROM identities AS p1 INNER JOIN local_identities AS p2 ON p1.id = p2.id INNER JOIN roles AS p3 ON p2.role = p3.id WHERE p1.id =?",array($_GET['id']));
			$usrole00 = $this->db->query("SELECT p1.id AS id,p1.name AS name FROM roles AS p1;");
			$this->db->trans_complete();
			
			$version0 = $version0->row();
			$header00 = $header00->row();
			$sysusr01 = $sysusr00->row();
			
			//page arrays
			$attr['sysusr01'] = $sysusr01->name;
			$attr['sysusr00'] = $sysusr00->result_array();
			$attr['usrole00'] = $usrole00->result_array();
			
			$data['sysusr01'] = $sysusr01->name;
			
			//global arrays
			$attr['version0'] = $version0->value;
			$attr['header00'] = $header00->value;
			$attr['flashmsg'] = $this->session->flashdata('message');
			$attr['screenid'] = $screenid;
			$attr['faqscrid'] = $faqscrid;
			$attr['sdbaract'] = 'class="active"';
			$attr['sdbarmen'] = 'menu-open';
			$attr['breadcrb'] = '<li class="crumb-link"><a href="'.base_url('dashboard').'">Dashboard</a></li><li class="crumb-trail">System Settings</li><li class="crumb-trail">Users Settings</li><li class="crumb-link"><a href="'.base_url('users').'">System Users</a></li><li class="crumb-trail">'.strtoupper($attr['sysusr01']).'</li>';

			$data['headervw'] = $this->load->view('templates/headerview',$attr, true);
			$data['sidebrvw'] = $this->load->view('templates/sideview',$attr, true);
			$data['contntvw'] = $this->load->view('modules/userdetailsview',$attr, true);

			$this->load->view('parserview', $data);	
		}
		else {
			$errcode0 = '<div class="col-md-12"><div class="alert alert-success dark alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>You do not have enough privilege to view the screen</div></div>';
			$this->session->set_flashdata('message', $errcode0);
			redirect('dashboard');
		}
	}
	
	public function dmz()
	{
		$this->db->trans_start();
		$version0 = $this->db->query("SELECT value FROM config_system_info WHERE id = ?",array(1001));
		$header00 = $this->db->query("SELECT value FROM config_system_info WHERE id = ?",array(1003));
		$sysusr00 = $this->db->query("SELECT p1.id AS id,p1.name AS name,p1.username AS username,p1.email AS email,p1.status AS status,p2.secret AS secret,p2.role AS role,p3.name AS roleName,p2.encrypt AS encrypt FROM identities AS p1 INNER JOIN local_identities AS p2 ON p1.id = p2.id INNER JOIN roles AS p3 ON p2.role = p3.id WHERE p1.id =?",array($_GET['id']));
		$usrole00 = $this->db->query("SELECT p1.id AS id,p1.name AS name FROM roles AS p1;");
		$this->db->trans_complete();
		
		$version0 = $version0->row();
		$header00 = $header00->row();
		$sysusr01 = $sysusr00->row();
		
		//page arrays
		$attr['sysusr01'] = $sysusr01->name;
		$attr['sysusr00'] = $sysusr00->result_array();
		$attr['usrole00'] = $usrole00->result_array();
		
		$data['sysusr01'] = $sysusr01->name;
		
		//global arrays
		$attr['version0'] = $version0->value;
		$attr['header00'] = $header00->value;
		$attr['flashmsg'] = $this->session->flashdata('message');
		$attr['screenid'] = $screenid;
		$attr['sdbaract'] = 'class="active"';
		$attr['breadcrb'] = '<li class="crumb-link"><a href="'.base_url('dashboard').'">Dashboard</a></li><li class="crumb-trail">System Settings</li><li class="crumb-trail">Users Settings</li><li class="crumb-link"><a href="'.base_url('users').'">System Users</a></li><li class="crumb-trail">'.strtoupper($attr['sysusr01']).'</li>';
		
		$data['headervw'] = $this->load->view('templates/headerview',$attr, true);
		$data['sidebrvw'] = $this->load->view('templates/sideview',$attr, true);
		$data['contntvw'] = $this->load->view('modules/userdetailsview',$attr, true);
		
		$this->load->view('parserview', $data);	
	}
}