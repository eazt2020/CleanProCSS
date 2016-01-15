<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Reports extends MY_Controller {
    function __construct() {
        parent::__construct();
    }
	
	public function index()
	{
		$powerval = 'r';
		$screenid = '1.5.0';
		$faqscrid = '1.5.0';
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
			$this->db->trans_complete();
			
			
			$version0 = $version0->row();
			$header00 = $header00->row();
			
			$attr['tickets'] = $tickets->result_array();
		
			$attr['version0'] = $version0->value;
			$attr['header00'] = $header00->value;
			$attr['flashmsg'] = $this->session->flashdata('message');
			$attr['screenid'] = $screenid;
			$attr['faqscrid'] = $faqscrid;
			$attr['sdbaract'] = 'class="active"';
			$attr['breadcrb'] = '<li class="crumb-link"><a href="'.base_url('dashboard').'">Dashboard</a></li><li class="crumb-trail">Tickets</li>';
			
			$data['headervw'] = $this->load->view('templates/headerview',$attr, true);
			$data['sidebrvw'] = $this->load->view('templates/sideview',$attr, true);
			$data['contntvw'] = $this->load->view('modules/reportview',$attr, true);
			
			$this->load->view('parserview', $data);	
		}
		else {
			$errcode0 = '<div class="col-md-12"><div class="alert alert-success dark alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>You do not have enough privilege to view the screen</div></div>';
			$this->session->set_flashdata('message', $errcode0);
			redirect('dashboard');
		}
	}
}
