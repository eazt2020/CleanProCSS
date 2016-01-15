<?php defined('BASEPATH') OR exit('No direct script access allowed');
class System extends CI_Controller {

	public function error404()
	{
		$this->load->view('errors/html/error_404.php');
	}
}
