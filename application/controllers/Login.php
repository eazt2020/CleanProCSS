<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
	
	public function index()
	{
		$this->db->trans_start();
		$query1 = $this->db->query("SELECT value FROM config_system_info WHERE id = ?",array(1001));
		$query2 = $this->db->query("SELECT value FROM config_system_info WHERE id = ?",array(1003));
		$row1 = $query1->row();
		$row2 = $query2->row();
		$this->db->trans_complete();
		
		$data['version'] = $row1->value;
		$data['header'] = $row2->value;
		$data['flash_message'] = $this->session->flashdata('message');

		$this->load->view('loginview',$data);
	}
	
	public function validate()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$enc=md5(sha1(sha1($username.$password)));

		$this->db->trans_start();
		$query = $this->db->query("SELECT p1.username AS uid,p1.name AS fullname,p2.secret AS pid from identities AS p1 INNER JOIN local_identities AS p2 ON p1.id = p2.id WHERE p1.username = ? AND p2.secret = ? AND status = ?",array($username,$enc,1));
		$this->db->trans_complete();
		
		$fullname = $query->row();
		$fullname = $fullname->fullname;
		
		if($query->num_rows() > 0){
			$newsession=array(
                   'uid'		=> $username,
                   'pid'		=> $enc,
                   'isLoggedIn'	=> TRUE,
				   'fullname'	=> $fullname
               );
			$this->session->set_userdata($newsession);
			redirect('dashboard');
		}
		else{
			$errorcode = '<div class="alert alert-danger dark alert-dismissable" id="alert-2"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Provided Username and Password is not valid</div>';
			$errormsg = $this->session->set_flashdata('message', $errorcode);
			redirect('login');
		}
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
