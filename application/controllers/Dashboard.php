<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends MY_Controller {
    function __construct() {
        parent::__construct();
    }
	
	public function index()
	{
		$screenid = '1.0.0';
		$faqscrid = '1.0.0';
		$time2day = time();
	
		$this->db->trans_start();
		$version0 = $this->db->query("SELECT value FROM config_system_info WHERE id = ?",array(1001));
		$header00 = $this->db->query("SELECT value FROM config_system_info WHERE id = ?",array(1003));
		$usrole00 = $this->db->query("SELECT p1.id AS id,p1.name AS name FROM roles AS p1;");
		$notify00 = $this->db->query("SELECT p1.name AS name,p1.description AS description,p2.name AS sevName FROM config_notification AS p1 INNER JOIN config_system_alert AS p2 ON p1.sev = p2.id WHERE p1.valid >= ?;",array($time2day));
		$compan00 = $this->db->count_all('companies');
		$outlet00 = $this->db->count_all('outlets');
		$machin00 = $this->db->count_all('machines');
		$ticket00 = $this->db->count_all('tickets');
		$ticket01 = $this->db->query("SELECT COUNT(p1.id) AS total FROM tickets AS p1 WHERE p1.status = 100001;");
		$ticket02 = $this->db->query("SELECT SUM(p1.amount) AS total FROM tickets AS p1 WHERE p1.status = 100001;");
		$this->db->trans_complete();
		
		$version0 = $version0->row();
		$header00 = $header00->row();
		
		$ticket01 = $ticket01->row();
		$ticket02 = $ticket02->row();
		
		$attr['notify00'] = $notify00->result_array();
		$attr['compan00'] = $compan00;
		$attr['outlet00'] = $outlet00;
		$attr['machin00'] = $machin00;
		$attr['ticket00'] = $ticket00;
		$attr['ticket01'] = $ticket01->total;
		$attr['ticket02'] = $ticket02->total;
	
		$attr['version0'] = $version0->value;
		$attr['header00'] = $header00->value;
		$attr['flashmsg'] = $this->session->flashdata('message');
		$attr['screenid'] = $screenid;
		$attr['faqscrid'] = $faqscrid;
		$attr['sdbaract'] = 'class="active"';
		$attr['breadcrb'] = '<li class="crumb-trail">Dashboard</li>';
		
		$data['headervw'] = $this->load->view('templates/headerview',$attr, true);
		$data['sidebrvw'] = $this->load->view('templates/sideview',$attr, true);
		$data['contntvw'] = $this->load->view('modules/dashboardview',$attr, true);
		
		$this->load->view('parserview', $data);
	}
}
