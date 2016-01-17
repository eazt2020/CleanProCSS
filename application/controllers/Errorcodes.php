<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Errorcodes extends MY_Controller {
    function __construct() {
        parent::__construct();
    }

	public function index()
	{
		$powerval = 'r';
		$screenid = '3.3.0';
		$faqscrid = '3.3.0';
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
			$errorcod = $this->db->query("SELECT p1.id,p1.name FROM config_machine_error AS p1;");
			$this->db->trans_complete();
			
			$version0 = $version0->row();
			$header00 = $header00->row();
		
			//page arrays
			$attr['errorcod'] = $errorcod->result_array();
			
			//global arrays
			$attr['version0'] = $version0->value;
			$attr['header00'] = $header00->value;
			$attr['flashmsg'] = $this->session->flashdata('message');
			$attr['screenid'] = $screenid;
			$attr['faqscrid'] = $faqscrid;
			$attr['sdbaract'] = 'class="active"';
			$attr['sidebar0'] = $sidebar0->result_array();
			$attr['breadcrb'] = '<li class="crumb-link"><a href="'.base_url('dashboard').'">Dashboard</a></li><li class="crumb-trail">System Settings</li><li class="crumb-trail">Error Code Settings</li>';

			$data['headervw'] = $this->load->view('templates/headerview',$attr, true);
			$data['sidebrvw'] = $this->load->view('templates/sideview',$attr, true);
			$data['contntvw'] = $this->load->view('modules/errorcodeview',$attr, true);

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
		$screenid = '3.3.0';
		$userid00 = $this->session->uid;

		$this->db->trans_start();
		$matchp00 = $this->db->query("SELECT p4.value AS priv from identities AS p1 INNER JOIN local_identities AS p2 ON p1.id = p2.id INNER JOIN roles AS p3 ON p2.role = p3.id INNER JOIN privilege AS p4 ON p3.id = p4.roleId WHERE p1.username = ? AND p4.screen = ?",array($userid00,$screenid));
		$this->db->trans_complete();

		$matchp01 = $matchp00->row();

		if($matchp00->num_rows() > 0){$powermat = $matchp01->priv;}else{$powermat = 'x';}

		if (strpos($powermat,$powerval) !== false) {
			$this->form_validation->set_error_delimiters('<p>', '</p>');
			$this->form_validation->set_rules('name', 'name', 'required',array('required' => 'You must provide the Notification title in the \'Error Code Name\' field.<br>'));
		
			if ($this->form_validation->run() == FALSE){
				$errcode0 = '<div class="alert alert-danger dark alert-dismissable" id="alert-2"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.validation_errors().'</div>';
				$errormsg = $this->session->set_flashdata('message', $errcode0);
				
				if(isset($_GET['id']) && $_GET['id'] !== 0){redirect('errorcodes/details?id='.$_GET['id']);}else {redirect('errorcodes');}
			}
			else{
				$errorcod = $this->db->query('SELECT id FROM config_machine_error ORDER BY id DESC LIMIT 1');
				$calcul00 = $errorcod->row();
				
				if(isset($_GET['id']) && $_GET['id'] !== 0){$calcul00 = $_GET['id'];}else {$calcul00 = 1 + $calcul00->id;}
				
				$ops = array(
					'id'			=> $calcul00,
					'name'			=> strtolower($_POST['name']),
					'userArc'		=> $userid00,
					'dateArc'		=> time()
				);
				
				if(isset($_GET['id']) && $_GET['id'] !== 0){
					$this->db->trans_start();
					$this->db->replace('config_machine_error', $ops);
					$this->db->trans_complete();
				}
				else {
					$this->db->trans_start();
					$this->db->insert('config_machine_error', $ops);
					$this->db->trans_complete();
				}
				
				if(isset($_GET['id']) && $_GET['id'] !== 0){
					$this->session->set_flashdata('message','<div class="col-md-12"><div class="alert alert-success dark alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error Code with ID #<strong>'.$calcul00.'</strong> successfully updated.</div></div>');
				
					redirect('errorcodes/details?id='.$_GET['id']);
				}
				else {
					$this->session->set_flashdata('message','<div class="col-md-12"><div class="alert alert-success dark alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error Code with ID #<strong>'.$calcul00.'</strong> successfully created.</div></div>');
					
					redirect('errorcodes');
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
		$screenid = '3.3.0';
		$userid00 = $this->session->uid;

		$this->db->trans_start();
		$matchp00 = $this->db->query("SELECT p4.value AS priv from identities AS p1 INNER JOIN local_identities AS p2 ON p1.id = p2.id INNER JOIN roles AS p3 ON p2.role = p3.id INNER JOIN privilege AS p4 ON p3.id = p4.roleId WHERE p1.username = ? AND p4.screen = ?",array($userid00,$screenid));
		$this->db->trans_complete();

		$matchp01 = $matchp00->row();

		if($matchp00->num_rows() > 0){$powermat = $matchp01->priv;}else{$powermat = 'x';}

		if (strpos($powermat,$powerval) !== false) {
			if (isset($_POST['checkList'])){
				$remlist0 = $_POST['checkList'];
				$calcul00 = 0;
				
				foreach ($remlist0 as $remlist0=>$row){
					$this->db->trans_start();
					$verify00 = $this->db->query('SELECT p1.id AS total FROM tickets AS p1 where p1.error=?',array($row));
					$this->db->trans_complete();
					
					if ($verify00->num_rows() == 0) {
						$calcul00++;
						$this->db->trans_start();
						$this->db->where('id', $row);
						$this->db->delete('config_machine_error');
						$this->db->trans_complete();
					}
				}
			}
		}
		$this->session->set_flashdata('message','<div class="col-md-12"><div class="alert alert-success dark alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>'.$calcul00.'</strong> Error Code(s) successfully deleted</div></div>');
		redirect('errorcodes');
	}
	
	public function details()
	{
		$powerval = 'r';
		$screenid = '3.3.0';
		$faqscrid = '3.3.1';
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
			$errorcod = $this->db->query("SELECT p1.id,p1.name FROM config_machine_error AS p1 WHERE p1.id = ?",array($_GET['id']));
			$this->db->trans_complete();
			
			$version0 = $version0->row();
			$header00 = $header00->row();
			$errornam = $errorcod->row();
			
			//page arrays
			$attr['errornam'] = $errornam->name;
			$attr['errorcod'] = $errorcod->result_array();
			
			//global arrays
			$attr['version0'] = $version0->value;
			$attr['header00'] = $header00->value;
			$attr['flashmsg'] = $this->session->flashdata('message');
			$attr['screenid'] = $screenid;
			$attr['faqscrid'] = $faqscrid;
			$attr['sdbaract'] = 'class="active"';
			$attr['sidebar0'] = $sidebar0->result_array();
			$attr['breadcrb'] = '<li class="crumb-link"><a href="'.base_url('dashboard').'">Dashboard</a></li><li class="crumb-trail">System Settings</li><li class="crumb-link"><a href="'.base_url('errorcodes').'">Error Code Settings</a></li><li class="crumb-trail">'.strtoupper($attr['errornam']).'</li>';

			$data['headervw'] = $this->load->view('templates/headerview',$attr, true);
			$data['sidebrvw'] = $this->load->view('templates/sideview',$attr, true);
			$data['contntvw'] = $this->load->view('modules/errorcodedetailsview',$attr, true);

			$this->load->view('parserview', $data);	
		}
		else {
			$errcode0 = '<div class="col-md-12"><div class="alert alert-success dark alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>You do not have enough privilege to view the screen</div></div>';
			$this->session->set_flashdata('message', $errcode0);
			redirect('dashboard');
		}
	}
}