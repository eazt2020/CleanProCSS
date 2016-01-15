<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller {
    function __construct() {
        parent::__construct();
		$userid = $this->session->userdata('uid');
		$status = $this->session->userdata('isLoggedIn');
        $sessionid = $this->session->session_id;
		
		$this->db->trans_start();
		$query = $this->db->query("SELECT id FROM config_sessions where id=?",array($sessionid));
		$this->db->trans_complete();
		
        if($query->num_rows() > 0 && !empty($userid) && $status == TRUE)
        {
            log_message('info','session validated. redirecting to requested controller...');
        }
        else {
            log_message('info','session invalid. redirecting to login controller...');
            redirect('login');
        }
    }
}