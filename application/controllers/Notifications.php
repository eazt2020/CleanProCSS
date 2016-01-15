<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Notifications extends MY_Controller {
    function __construct() {
        parent::__construct();
    }

	public function index()
	{
		$powerval = 'r';
		$screenid = '3.2.0';
		$faqscrid = '3.2.0';
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
			$notify00 = $this->db->query("SELECT p1.id,p1.name,p1.valid,p2.name AS sev FROM config_notification AS p1 INNER JOIN config_system_alert AS p2 ON p1.sev = p2.id;");
			$severity = $this->db->query("SELECT id,name FROM config_system_alert;");
			$this->db->trans_complete();
			
			$version0 = $version0->row();
			$header00 = $header00->row();
		
			//page arrays
			$attr['notify00'] = $notify00->result_array();
			$attr['severity'] = $severity->result_array();
			
			//global arrays
			$attr['version0'] = $version0->value;
			$attr['header00'] = $header00->value;
			$attr['flashmsg'] = $this->session->flashdata('message');
			$attr['screenid'] = $screenid;
			$attr['faqscrid'] = $faqscrid;
			$attr['sdbaract'] = 'class="active"';
			$attr['breadcrb'] = '<li class="crumb-link"><a href="'.base_url('dashboard').'">Dashboard</a></li><li class="crumb-trail">System Settings</li><li class="crumb-trail">Notifications</li>';

			$data['headervw'] = $this->load->view('templates/headerview',$attr, true);
			$data['sidebrvw'] = $this->load->view('templates/sideview',$attr, true);
			$data['contntvw'] = $this->load->view('modules/notificationview',$attr, true);

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
		$screenid = '3.2.0';
		$userid00 = $this->session->uid;

		$this->db->trans_start();
		$matchp00 = $this->db->query("SELECT p4.value AS priv from identities AS p1 INNER JOIN local_identities AS p2 ON p1.id = p2.id INNER JOIN roles AS p3 ON p2.role = p3.id INNER JOIN privilege AS p4 ON p3.id = p4.roleId WHERE p1.username = ? AND p4.screen = ?",array($userid00,$screenid));
		$this->db->trans_complete();

		$matchp01 = $matchp00->row();

		if($matchp00->num_rows() > 0){$powermat = $matchp01->priv;}else{$powermat = 'x';}

		if (strpos($powermat,$powerval) !== false) {
			$this->form_validation->set_error_delimiters('<p>', '</p>');
			$this->form_validation->set_rules('name', 'name', 'required',array('required' => 'You must provide the Notification title in the \'Notification Title\' field.<br>'));
			$this->form_validation->set_rules('sev', 'sev', 'required',array('required' => 'You must choose the notification type in the \'Alert Type\' field.<br>'));
			$this->form_validation->set_rules('valid', 'valid', 'required',array('required' => 'You must choose the expiry date for the notification in the \'Expiry Date\' field.<br>'));
			$this->form_validation->set_rules('description', 'description', 'required',array('required' => 'The notification does not have any content!<br>'));
		
			if ($this->form_validation->run() == FALSE){
				$errcode0 = '<div class="alert alert-danger dark alert-dismissable" id="alert-2"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.validation_errors().'</div>';
				$errormsg = $this->session->set_flashdata('message', $errcode0);
				
				if(isset($_GET['id']) && $_GET['id'] !== 0){redirect('notifications/details?id='.$_GET['id']);}else {redirect('notifications');}
			}
			else{
				$notify00 = $this->db->query('SELECT id FROM config_notification ORDER BY id DESC LIMIT 1');
				$calcul00 = $notify00->row();
				
				if(isset($_GET['id']) && $_GET['id'] !== 0){$calcul00 = $_GET['id'];}else {$calcul00 = 1 + $calcul00->id;}
				
				$ops = array(
					'id'			=> $calcul00,
					'name'			=> $_POST['name'],
					'description'	=> base64_encode($_POST['description']),
					'sev'			=> $_POST['sev'],
					'valid'			=> strtotime(str_replace('/', '-',$_POST['valid'])),
					'userArc'		=> $userid00,
					'dateArc'		=> time()
				);
				
				if(isset($_GET['id']) && $_GET['id'] !== 0){
					$this->db->trans_start();
					$this->db->replace('config_notification', $ops);
					$this->db->trans_complete();
				}
				else {
					$this->db->trans_start();
					$this->db->insert('config_notification', $ops);
					$this->db->trans_complete();
				}
				
				if(isset($_GET['id']) && $_GET['id'] !== 0){
					$this->session->set_flashdata('message','<div class="col-md-12"><div class="alert alert-success dark alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Details of Notification ID #<strong>'.$calcul00.'</strong> successfully updated.</div></div>');
				
					redirect('notifications/details?id='.$_GET['id']);
				}
				else {
					$this->session->set_flashdata('message','<div class="col-md-12"><div class="alert alert-success dark alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Notification with ID #<strong>'.$calcul00.'</strong> successfully created.</div></div>');
					
					redirect('notifications');
				}
			}
		}
		else {
			redirect('dashboard');
		}
	}
	
	public function remove()
	{
		$powerval = 'd';
		$screenid = '3.2.0';
		$userid00 = $this->session->uid;
		$calt = 0;

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
					$this->db->delete('config_notification');
					$this->db->trans_complete();
				}
			}
		}
		$this->session->set_flashdata('message','<div class="col-md-12"><div class="alert alert-success dark alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>'.$calt.'</strong> notification(s) successfully deleted</div></div>');
		
		redirect('notifications');
	}
	
	public function details()
	{
		$powerval = 'r';
		$screenid = '3.2.0';
		$faqscrid = '3.2.1';
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
			$notify00 = $this->db->query("SELECT p1.id,p1.name,p1.valid,p1.sev AS sev,p2.name AS sevName,p1.description FROM config_notification AS p1 INNER JOIN config_system_alert AS p2 ON p1.sev = p2.id WHERE p1.id =?",array($_GET['id']));
			$severity = $this->db->query("SELECT id,name FROM config_system_alert;");
			$this->db->trans_complete();
			
			$version0 = $version0->row();
			$header00 = $header00->row();
			$notify01 = $notify00->row();
			
			//page arrays
			$attr['notify00'] = $notify00->result_array();
			$attr['severity'] = $severity->result_array();
			$attr['notify01'] = $notify01->name;
			$data['notify01'] = $notify01->name;
			
			//global arrays
			$attr['version0'] = $version0->value;
			$attr['header00'] = $header00->value;
			$attr['flashmsg'] = $this->session->flashdata('message');
			$attr['screenid'] = $screenid;
			$attr['faqscrid'] = $faqscrid;
			$attr['sdbaract'] = 'class="active"';
			$attr['breadcrb'] = '<li class="crumb-link"><a href="'.base_url('dashboard').'">Dashboard</a></li><li class="crumb-trail">System Settings</li><li class="crumb-link"><a href="'.base_url('notifications').'">Notifications</a></li><li class="crumb-trail">'.strtoupper($attr['notify01']).'</li>';

			$data['headervw'] = $this->load->view('templates/headerview',$attr, true);
			$data['sidebrvw'] = $this->load->view('templates/sideview',$attr, true);
			$data['contntvw'] = $this->load->view('modules/notificationdetailsview',$attr, true);

			$this->load->view('parserview', $data);	
		}
		else {
			$errcode0 = '<div class="col-md-12"><div class="alert alert-success dark alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>You do not have enough privilege to view the screen</div></div>';
			$this->session->set_flashdata('message', $errcode0);
			redirect('dashboard');
		}
	}
}