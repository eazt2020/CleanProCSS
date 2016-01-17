<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Systeminfo extends MY_Controller {
    function __construct() {
        parent::__construct();
    }
	
	public function index()
	{
		$powerval = 'r';
		$screenid = '3.1.0';
		$scrncast = '3.1.0';
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
			$builid = $this->db->query("SELECT value FROM config_system_info WHERE id = ?",array(1004));
			$core00 = $this->db->query("SELECT value FROM config_system_info WHERE id = ?",array(1002));
			$sidebar0 = $this->db->query("SELECT p4.screen AS screen from identities AS p1 INNER JOIN local_identities AS p2 ON p1.id = p2.id INNER JOIN roles AS p3 ON p2.role = p3.id INNER JOIN privilege AS p4 ON p3.id = p4.roleId WHERE p1.username = ? AND p4.value != '' ORDER BY p4.screen ASC;",array($userid00));
			$addon0 = $this->db->query("SELECT * FROM config_system_kb;");
			$this->db->trans_complete();
			
			$version0 = $version0->row();
			$header00 = $header00->row();
			$builid = $builid->row();
			$core00 = $core00->row();
			
			$attr['builid'] = $builid->value;
			$attr['core00'] = $core00->value;
			$attr['addon0'] = $addon0->result_array();
			
			$attr['version0'] = $version0->value;
			$attr['header00'] = $header00->value;
			$attr['flashmsg'] = $this->session->flashdata('message');
			$attr['screenid'] = $scrncast;
			$attr['sdbaract'] = 'class="active"';
			$attr['sidebar0'] = $sidebar0->result_array();
			$attr['breadcrb'] = '<li class="crumb-link"><a href="'.base_url('dashboard').'">Dashboard</a></li><li class="crumb-trail">Tickets</li>';
			
			$data['headervw'] = $this->load->view('templates/headerview',$attr, true);
			$data['sidebrvw'] = $this->load->view('templates/sideview',$attr, true);
			$data['contntvw'] = $this->load->view('modules/systeminfo',$attr, true);
			
			$this->load->view('parserview', $data);	
		}
		else {
			$errcode0 = '<div class="col-md-12"><div class="alert alert-success dark alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>You do not have enough privilege to view the screen</div></div>';
			$this->session->set_flashdata('message', $errcode0);
			redirect('dashboard');
		}
	}
}
