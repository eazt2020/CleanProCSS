<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Roles extends MY_Controller {
    function __construct() {
        parent::__construct();
    }

	public function index()
	{
		$powerval = 'r';
		$screenid = '3.5.0';
		$faqscrid = '3.5.0';
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
			$usrole00 = $this->db->query("SELECT p1.id AS id,p1.name AS name FROM roles AS p1;");
			$this->db->trans_complete();
			
			$version0 = $version0->row();
			$header00 = $header00->row();
		
			//page arrays
			$attr['usrole00'] = $usrole00->result_array();
			
			//global arrays
			$attr['version0'] = $version0->value;
			$attr['header00'] = $header00->value;
			$attr['flashmsg'] = $this->session->flashdata('message');
			$attr['screenid'] = $screenid;
			$attr['faqscrid'] = $faqscrid;
			$attr['sdbaract'] = 'class="active"';
			$attr['sidebar0'] = $sidebar0->result_array();
			$attr['breadcrb'] = '<li class="crumb-link"><a href="'.base_url('dashboard').'">Dashboard</a></li><li class="crumb-trail">System Settings</li><li class="crumb-trail">Users Settings</li><li class="crumb-trail">Roles</li>';

			$data['headervw'] = $this->load->view('templates/headerview',	$attr, true);
			$data['sidebrvw'] = $this->load->view('templates/sideview',		$attr, true);
			$data['contntvw'] = $this->load->view('modules/roleview',		$attr, true);

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
		$screenid = '3.5.0';
		$userid00 = $this->session->uid;

		$this->db->trans_start();
		$matchp00 = $this->db->query("SELECT p4.value AS priv from identities AS p1 INNER JOIN local_identities AS p2 ON p1.id = p2.id INNER JOIN roles AS p3 ON p2.role = p3.id INNER JOIN privilege AS p4 ON p3.id = p4.roleId WHERE p1.username = ? AND p4.screen = ?",array($userid00,$screenid));
		$this->db->trans_complete();

		$matchp01 = $matchp00->row();

		if($matchp00->num_rows() > 0){$powermat = $matchp01->priv;}else{$powermat = 'x';}

		if (strpos($powermat,$powerval) !== false) {
			$this->db->trans_start();
			$idcalt00 = $this->db->query('SELECT id FROM roles ORDER BY id DESC LIMIT 1');
			$this->db->trans_complete();
			
			$calcul00 = $idcalt00->row();
			
			if(isset($_GET['id']) && $_GET['id'] !== 0){$calcul00 = $_GET['id'];}else {$calcul00 = 1 + $calcul00->id;}
			
			$datins00 = array(
				'id'		=> $calcul00,
				'name'		=> strtolower($_POST['name']),
				'userArc'	=> $userid00,
				'dateArc'	=> time()
			);
			
			$datins01 = array(
				array(
					'roleId'	=> $calcul00,
					'screen'	=> '1.0.0',
					'value'		=> 'crud',
					'userArc'	=> $userid00,
					'dateArc'	=> time()
				),
				array(
					'roleId'	=> $calcul00,
					'screen'	=> '1.1.0',
					'value'		=> ($_POST['compvr00'].$_POST['compvr01'].$_POST['compvr02']),
					'userArc'	=> $userid00,
					'dateArc'	=> time()
				),
				array(
					'roleId'	=> $calcul00,
					'screen'	=> '1.2.0',
					'value'		=> ($_POST['outpvr00'].$_POST['outpvr01'].$_POST['outpvr02']),
					'userArc'	=> $userid00,
					'dateArc'	=> time()
				),
				array(
					'roleId'	=> $calcul00,
					'screen'	=> '1.3.0',
					'value'		=> ($_POST['macpvr00'].$_POST['macpvr01'].$_POST['macpvr02']),
					'userArc'	=> $userid00,
					'dateArc'	=> time()
				),
				array(
					'roleId'	=> $calcul00,
					'screen'	=> '1.4.0',
					'value'		=> ($_POST['ticpvr00'].$_POST['ticpvr01'].$_POST['ticpvr02']),
					'userArc'	=> $userid00,
					'dateArc'	=> time()
				),
				array(
					'roleId'	=> $calcul00,
					'screen'	=> '3.1.0',
					'value'		=> 'crud',
					'userArc'	=> $userid00,
					'dateArc'	=> time()
				),
				array(
					'roleId'	=> $calcul00,
					'screen'	=> '3.2.0',
					'value'		=> ($_POST['notpvr00'].$_POST['notpvr01'].$_POST['notpvr02']),
					'userArc'	=> $userid00,
					'dateArc'	=> time()
				),
				array(
					'roleId'	=> $calcul00,
					'screen'	=> '3.3.0',
					'value'		=> ($_POST['errpvr00'].$_POST['errpvr01'].$_POST['errpvr02']),
					'userArc'	=> $userid00,
					'dateArc'	=> time()
				),
				array(
					'roleId'	=> $calcul00,
					'screen'	=> '3.4.0',
					'value'		=> ($_POST['usrpvr00'].$_POST['usrpvr01'].$_POST['usrpvr02']),
					'userArc'	=> $userid00,
					'dateArc'	=> time()
				),
				array(
					'roleId'	=> $calcul00,
					'screen'	=> '3.5.0',
					'value'		=> ($_POST['rolpvr00'].$_POST['rolpvr01'].$_POST['rolpvr02']),
					'userArc'	=> $userid00,
					'dateArc'	=> time()
				),
				array(
					'roleId'	=> $calcul00,
					'screen'	=> '1.5.0',
					'value'		=> ($_POST['reppvr00']),
					'userArc'	=> $userid00,
					'dateArc'	=> time()
				),
				array(
					'roleId'	=> $calcul00,
					'screen'	=> '3.6.0',
					'value'		=> ($_POST['faqpvr00'].$_POST['faqpvr01'].$_POST['faqpvr02']),
					'userArc'	=> $userid00,
					'dateArc'	=> time()
				),
				array(
					'roleId'	=> $calcul00,
					'screen'	=> '1.6.0',
					'value'		=> 'crud',
					'userArc'	=> $userid00,
					'dateArc'	=> time()
				)
			);
			
			if(isset($_GET['id']) && $_GET['id'] !== 0){
				$this->db->trans_start();
				$this->db->replace('roles',				$datins00);
				$this->db->update_batch('privilege', 	$datins01);
				$this->db->trans_complete();
			}
			else {
				$this->db->trans_start();
				$this->db->insert('roles', 				$datins00);
				$this->db->insert_batch('privilege',	$datins01);
				$this->db->trans_complete();
			}
			
			if(isset($_GET['id']) && $_GET['id'] !== 0){
				$this->session->set_flashdata('message','<div class="col-md-12"><div class="alert alert-success dark alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Details of User ID #<strong>'.$calcul00.'</strong> successfully updated.</div></div>');
				redirect('roles/details?id='.$_GET['id']);
			}
			else {
				$this->session->set_flashdata('message','<div class="col-md-12"><div class="alert alert-success dark alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>User with ID #<strong>'.$calcul00.'</strong> successfully created.</div></div>');
				redirect('roles');
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
		$screenid = '3.5.0';
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
					$validp00 = $this->db->query("SELECT COUNT(p1.id) AS total FROM local_identities AS p1 WHERE p1.role =?",array($introw00));
					$this->db->trans_complete();
					
					$validp00 = $validp00->row();
					$validp00 = $validp00->total;
					
					if($validp00 == 0){
						$this->db->trans_start();
						$this->db->where('roleId', 	$introw00);
						$this->db->delete('privilege');
						$this->db->where('id',		$introw00);
						$this->db->delete('roles');
						$this->db->trans_complete();
					}
					else{
						$this->session->set_flashdata('message','<div class="col-md-12"><div class="alert alert-danger dark alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Could not delete the role. There are stil users bound to the role.</strong></div></div>');
						redirect('roles');
					}
				}
			}
		}
		$this->session->set_flashdata('message','<div class="col-md-12"><div class="alert alert-success dark alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>'.$calcul00.'</strong> role(s) successfully deleted</div></div>');
		redirect('roles');
	}
	
	public function details()
	{
		$powerval = 'r';
		$screenid = '3.5.0';
		$faqscrid = '3.5.1';
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
			$usrole00 = $this->db->query("SELECT p1.id AS id,p1.name AS name FROM roles AS p1 WHERE p1.id=?",array($_GET['id']));
			$rolpvl00 = $this->db->query("SELECT p1.id AS id,p1.screen AS screen,p1.value AS value FROM privilege AS p1 WHERE p1.roleId=?",array($_GET['id']));
			$this->db->trans_complete();
			
			$version0 = $version0->row();
			$header00 = $header00->row();
			$usrole01 = $usrole00->row();
		
			//page arrays
			$attr['usrole00'] = $usrole00->result_array();
			$attr['rolpvl00'] = $rolpvl00->result_array();
			
			//global arrays
			$attr['version0'] = $version0->value;
			$attr['header00'] = $header00->value;
			$attr['usrole01'] = $usrole01->name;
			$attr['flashmsg'] = $this->session->flashdata('message');
			$attr['screenid'] = $screenid;
			$attr['faqscrid'] = $faqscrid;
			$attr['sdbaract'] = 'class="active"';
			$attr['sidebar0'] = $sidebar0->result_array();
			$attr['breadcrb'] = '<li class="crumb-link"><a href="'.base_url('dashboard').'">Dashboard</a></li><li class="crumb-trail">System Settings</li><li class="crumb-trail">Users Settings</li><li class="crumb-trail"><a href="'.base_url('roles').'">Roles</a></li><li class="crumb-trail">'.strtoupper($attr['usrole01']).'</li>';

			$data['headervw'] = $this->load->view('templates/headerview',	$attr, true);
			$data['sidebrvw'] = $this->load->view('templates/sideview',		$attr, true);
			$data['contntvw'] = $this->load->view('modules/roledetailsview',$attr, true);

			$this->load->view('parserview', $data);	
		}
		else {
			$errcode0 = '<div class="col-md-12"><div class="alert alert-success dark alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>You do not have enough privilege to view the screen</div></div>';
			$this->session->set_flashdata('message', $errcode0);
			redirect('dashboard');
		}
	}
}