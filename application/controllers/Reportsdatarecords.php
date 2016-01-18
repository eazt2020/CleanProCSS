<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Reportsdatarecords extends MY_Controller {
    function __construct() {
        parent::__construct();
    }
	
	public function overallreport()
	{
		$powervalue = 'r';
		$screenid = '1.5.0';
		$userid = $this->session->uid;
		
		$this->db->trans_start();
		$query = $this->db->query("SELECT fourt.value AS priv from identities AS prime INNER JOIN local_identities AS secon ON prime.id = secon.id INNER JOIN roles AS third ON secon.role = third.id INNER JOIN privilege AS fourt ON third.id = fourt.roleId WHERE prime.username = ? AND fourt.screen = ?",array($userid,$screenid));
		$this->db->trans_complete();
		$row = $query->row();

		if($query->num_rows() > 0){$powermatch = $row->priv;}else {$powermatch = 'x';}
		
		if (strpos($powermatch,$powervalue) !== false) {
			$this->load->library('m_pdf');
			
			$datefr00 = 0;
			$dateto00 = time();
			
			if(!empty($_POST['datefr00'])){ $datefr00 = strtotime(str_replace('/', '-',$_POST['datefr00']));}
			if(!empty($_POST['dateto00'])){ $dateto00 = strtotime(str_replace('/', '-',$_POST['dateto00']));}
			
			$this->db->trans_start();
			$query = $this->db->query('SELECT p1.id , p1.name , COUNT(p2.id) AS total FROM outlets AS p1 INNER JOIN tickets AS p2 ON p1.id = p2.outletId GROUP BY p2.outletId;');
			$this->db->trans_complete();
			$data['tickets'] = $query->result_array();
			
			$this->db->trans_start();
			$query = $this->db->query('SELECT COUNT(id) AS total FROM tickets;');
			$row = $query->row();
			$this->db->trans_complete();
			$data['total'] = $row->total;
			
			if($_POST['preview0'] == '1'){
				$this->load->view('modules/html2pdf/overallreport', $data);
			}
			else{
				$html = $this->load->view('modules/html2pdf/overallreport', $data,true);
				$time = date("d/m/Y H:i:s",time());
				
				$pdfFilePath = "overall_report.pdf";
				$this->m_pdf->pdf->AddPage('L','', '', '', '',10,10,10,10,5,5);
				$this->m_pdf->pdf->setHTMLFooter('<table border="0" width="100%"><tr><td width="50%" align="left"><p style="font-family:Tahoma, Geneva, sans-serif"; font-size:"9px;"><i>This report was generated on '.$time.'</i></p></td><td width="50%" align="right"><p style="font-family:Tahoma, Geneva, sans-serif; font-size:12px;">Page {PAGENO} of {nb}</p></td></tr></table>');
				$this->m_pdf->pdf->WriteHTML($html);
	
				$this->m_pdf->pdf->Output($pdfFilePath, "D");
			}
		}
		else {
			redirect('dashboard');
		}
	}
	
	public function overallrefund()
	{
		$powervalue = 'r';
		$screenid = '1.5.0';
		$userid = $this->session->uid;
		
		$this->db->trans_start();
		$query = $this->db->query("SELECT fourt.value AS priv from identities AS prime INNER JOIN local_identities AS secon ON prime.id = secon.id INNER JOIN roles AS third ON secon.role = third.id INNER JOIN privilege AS fourt ON third.id = fourt.roleId WHERE prime.username = ? AND fourt.screen = ?",array($userid,$screenid));
		$this->db->trans_complete();
		$row = $query->row();

		if($query->num_rows() > 0){$powermatch = $row->priv;}else {$powermatch = 'x';}
		
		if (strpos($powermatch,$powervalue) !== false) {
			$this->load->library('m_pdf');
			
			$datefr00 = 0;
			$dateto00 = time();
			
			if(!empty($_POST['datefr00'])){ $datefr00 = strtotime(str_replace('/', '-',$_POST['datefr00']));}
			if(!empty($_POST['dateto00'])){ $dateto00 = strtotime(str_replace('/', '-',$_POST['dateto00']));}
			
			$this->db->trans_start();
			$query = $this->db->query('SELECT p1.id , p1.name , SUM(p2.amount) AS total FROM outlets AS p1 INNER JOIN tickets AS p2 ON p1.id = p2.outletId WHERE p2.crDate BETWEEN ? AND ? GROUP BY p2.outletId;',array($datefr00,$dateto00));
			$this->db->trans_complete();
			$data['tickets'] = $query->result_array();
			
			$this->db->trans_start();
			$query = $this->db->query('SELECT SUM(amount) AS total FROM tickets;');
			$row = $query->row();
			$this->db->trans_complete();
			$data['total'] = $row->total;
			
			if($_POST['preview0'] == '1'){
				$this->load->view('modules/html2pdf/overallrefund', $data);
			}
			else{
				$html = $this->load->view('modules/html2pdf/overallrefund', $data,true);
				$time = date("d/m/Y H:i:s",time());
				
				$pdfFilePath = "overall_refund.pdf";
				$this->m_pdf->pdf->AddPage('L','', '', '', '',10,10,10,10,5,5);
				$this->m_pdf->pdf->setHTMLFooter('<table border="0" width="100%"><tr><td width="50%" align="left"><p style="font-family:Tahoma, Geneva, sans-serif"; font-size:"9px;"><i>This report was generated on '.$time.'</i></p></td><td width="50%" align="right"><p style="font-family:Tahoma, Geneva, sans-serif; font-size:12px;">Page {PAGENO} of {nb}</p></td></tr></table>');
				$this->m_pdf->pdf->WriteHTML($html);
	
				$this->m_pdf->pdf->Output($pdfFilePath, "D");
			}
		}
		else {
			redirect('dashboard');
		}
	}
	
	public function companyreport()
	{
		$powervalue = 'r';
		$screenid = '1.5.0';
		$userid = $this->session->uid;
		
		$this->db->trans_start();
		$query = $this->db->query("SELECT fourt.value AS priv from identities AS prime INNER JOIN local_identities AS secon ON prime.id = secon.id INNER JOIN roles AS third ON secon.role = third.id INNER JOIN privilege AS fourt ON third.id = fourt.roleId WHERE prime.username = ? AND fourt.screen = ?",array($userid,$screenid));
		$this->db->trans_complete();
		$row = $query->row();

		if($query->num_rows() > 0){$powermatch = $row->priv;}else {$powermatch = 'x';}
		
		if (strpos($powermatch,$powervalue) !== false) {
			$this->load->library('m_pdf');
			
			$datefr00 = 0;
			$dateto00 = time();
			
			if(!empty($_POST['datefr00'])){ $datefr00 = strtotime(str_replace('/', '-',$_POST['datefr00']));}
			if(!empty($_POST['dateto00'])){ $dateto00 = strtotime(str_replace('/', '-',$_POST['dateto00']));}
			
			$this->db->trans_start();
			$company = $this->db->query('SELECT p1.id AS id,p1.name AS name FROM companies AS p1;');
			$outlet0 = $this->db->query('SELECT p1.id AS id,p1.name AS name,p1.compId AS compId,SUM(p2.amount) AS total FROM outlets AS p1 INNER JOIN tickets AS p2 ON p1.id = p2.outletId WHERE p2.crDate BETWEEN ? AND ? GROUP BY p2.outletId;',array($datefr00,$dateto00));
			$this->db->trans_complete();
			
			$data['company'] = $company->result_array();
			$data['outlet0'] = $outlet0->result_array();

			if($_POST['preview0'] == '1'){
				$this->load->view('modules/html2pdf/companyreport', $data);
			}
			else{
				$html = $this->load->view('modules/html2pdf/companyreport', $data,true);
				$time = date("d/m/Y H:i:s",time());
				
				$pdfFilePath = "company_report.pdf";
				$this->m_pdf->pdf->AddPage('L','', '', '', '',10,10,10,10,5,5);
				$this->m_pdf->pdf->setHTMLFooter('<table border="0" width="100%"><tr><td width="50%" align="left"><p style="font-family:Tahoma, Geneva, sans-serif"; font-size:"9px;"><i>This report was generated on '.$time.'</i></p></td><td width="50%" align="right"><p style="font-family:Tahoma, Geneva, sans-serif; font-size:12px;">Page {PAGENO} of {nb}</p></td></tr></table>');
				$this->m_pdf->pdf->WriteHTML($html);
	
				$this->m_pdf->pdf->Output($pdfFilePath, "D");
			}
		}
		else {
			redirect('dashboard');
		}
	}
	
	public function outletreport()
	{
		$powervalue = 'r';
		$screenid = '1.5.0';
		$userid = $this->session->uid;
		
		$this->db->trans_start();
		$query = $this->db->query("SELECT fourt.value AS priv from identities AS prime INNER JOIN local_identities AS secon ON prime.id = secon.id INNER JOIN roles AS third ON secon.role = third.id INNER JOIN privilege AS fourt ON third.id = fourt.roleId WHERE prime.username = ? AND fourt.screen = ?",array($userid,$screenid));
		$this->db->trans_complete();
		$row = $query->row();

		if($query->num_rows() > 0){$powermatch = $row->priv;}else {$powermatch = 'x';}
		
		if (strpos($powermatch,$powervalue) !== false) {
			$this->load->library('m_pdf');
			
			$datefr00 = 0;
			$dateto00 = time();
			
			if(!empty($_POST['datefr00'])){ $datefr00 = strtotime(str_replace('/', '-',$_POST['datefr00']));}
			if(!empty($_POST['dateto00'])){ $dateto00 = strtotime(str_replace('/', '-',$_POST['dateto00']));}
			
			$this->db->trans_start();
			$outlet0 = $this->db->query('SELECT p1.id AS id,p1.name AS name FROM outlets AS p1;');
			$ticket0 = $this->db->query('SELECT p1.id AS id, p1.outletId AS outletId, p1.name AS name,p2.name AS error,p1.amount FROM tickets AS p1 INNER JOIN config_machine_error AS p2 ON p1.error = p2.id WHERE p1.crDate BETWEEN ? AND ?;',array($datefr00,$dateto00));
			$totalt0 = $this->db->query('SELECT p1.id AS id,SUM(p2.amount) AS total FROM outlets AS p1 INNER JOIN tickets AS p2 ON p1.id = p2.outletId WHERE p2.crDate BETWEEN ? AND ? GROUP BY p2.outletId;',array($datefr00,$dateto00));
			$this->db->trans_complete();
			
			$data['outlet0'] = $outlet0->result_array();
			$data['ticket0'] = $ticket0->result_array();
			$data['totalt0'] = $totalt0->result_array();
			
			if($_POST['preview0'] == '1'){
				$this->load->view('modules/html2pdf/outletreport', $data);
			}
			else{
				$html = $this->load->view('modules/html2pdf/outletreport', $data,true);
				$time = date("d/m/Y H:i:s",time());
				
				$pdfFilePath = "outlet_report.pdf";
				$this->m_pdf->pdf->AddPage('L','', '', '', '',10,10,10,10,5,5);
				$this->m_pdf->pdf->setHTMLFooter('<table border="0" width="100%"><tr><td width="50%" align="left"><p style="font-family:Tahoma, Geneva, sans-serif"; font-size:"9px;"><i>This report was generated on '.$time.'</i></p></td><td width="50%" align="right"><p style="font-family:Tahoma, Geneva, sans-serif; font-size:12px;">Page {PAGENO} of {nb}</p></td></tr></table>');
				$this->m_pdf->pdf->WriteHTML($html);
	
				$this->m_pdf->pdf->Output($pdfFilePath, "D");
			}
		}
		else {
			redirect('dashboard');
		}
	}
	
	public function machinesreport()
	{
		$powervalue = 'r';
		$screenid = '1.5.0';
		$userid = $this->session->uid;
		
		$this->db->trans_start();
		$query = $this->db->query("SELECT fourt.value AS priv from identities AS prime INNER JOIN local_identities AS secon ON prime.id = secon.id INNER JOIN roles AS third ON secon.role = third.id INNER JOIN privilege AS fourt ON third.id = fourt.roleId WHERE prime.username = ? AND fourt.screen = ?",array($userid,$screenid));
		$this->db->trans_complete();
		$row = $query->row();

		if($query->num_rows() > 0){$powermatch = $row->priv;}else {$powermatch = 'x';}
		
		if (strpos($powermatch,$powervalue) !== false) {
			$this->load->library('m_pdf');
			
			$datefr00 = 0;
			$dateto00 = time();
			
			if(!empty($_POST['datefr00'])){ $datefr00 = strtotime(str_replace('/', '-',$_POST['datefr00']));}
			if(!empty($_POST['dateto00'])){ $dateto00 = strtotime(str_replace('/', '-',$_POST['dateto00']));}
			
			$this->db->trans_start();
			$machi00 = $this->db->query('SELECT p1.id AS id,p1.name AS name FROM machines AS p1;');
			$tickee0 = $this->db->query('SELECT p1.machId AS machId,p1.error AS error, p2.name AS errorName,COUNT(p1.error) AS total FROM tickets AS p1 INNER JOIN config_machine_error AS p2 ON p1.error = p2.id WHERE p1.crDate BETWEEN ? AND ? GROUP BY p1.error;',array($datefr00,$dateto00));
			$totale0 = $this->db->query('SELECT p1.id AS id,COUNT(p2.id) AS total FROM machines AS p1 INNER JOIN tickets AS p2 ON p1.id = p2.machId WHERE p2.crDate BETWEEN ? AND ? GROUP BY p2.machId;',array($datefr00,$dateto00));
			$this->db->trans_complete();
			
			$data['machi00'] = $machi00->result_array();
			$data['tickee0'] = $tickee0->result_array();
			$data['totale0'] = $totale0->result_array();

			if($_POST['preview0'] == '1'){
				$this->load->view('modules/html2pdf/machinesreport', $data);
			}
			else{
				$html = $this->load->view('modules/html2pdf/machinesreport', $data,true);
				$time = date("d/m/Y H:i:s",time());
				
				$pdfFilePath = "machines_report.pdf";
				$this->m_pdf->pdf->AddPage('L','', '', '', '',10,10,10,10,5,5);
				$this->m_pdf->pdf->setHTMLFooter('<table border="0" width="100%"><tr><td width="50%" align="left"><p style="font-family:Tahoma, Geneva, sans-serif"; font-size:"9px;"><i>This report was generated on '.$time.'</i></p></td><td width="50%" align="right"><p style="font-family:Tahoma, Geneva, sans-serif; font-size:12px;">Page {PAGENO} of {nb}</p></td></tr></table>');
				$this->m_pdf->pdf->WriteHTML($html);
	
				$this->m_pdf->pdf->Output($pdfFilePath, "D");
			}
		}
		else {
			redirect('dashboard');
		}
	}
	
	public function errorcodesreport()
	{
		$powervalue = 'r';
		$screenid = '1.5.0';
		$userid = $this->session->uid;
		
		$this->db->trans_start();
		$query = $this->db->query("SELECT fourt.value AS priv from identities AS prime INNER JOIN local_identities AS secon ON prime.id = secon.id INNER JOIN roles AS third ON secon.role = third.id INNER JOIN privilege AS fourt ON third.id = fourt.roleId WHERE prime.username = ? AND fourt.screen = ?",array($userid,$screenid));
		$this->db->trans_complete();
		$row = $query->row();

		if($query->num_rows() > 0){$powermatch = $row->priv;}else {$powermatch = 'x';}
		
		if (strpos($powermatch,$powervalue) !== false) {
			$this->load->library('m_pdf');
			
			$datefr00 = 0;
			$dateto00 = time();
			
			if(!empty($_POST['datefr00'])){ $datefr00 = strtotime(str_replace('/', '-',$_POST['datefr00']));}
			if(!empty($_POST['dateto00'])){ $dateto00 = strtotime(str_replace('/', '-',$_POST['dateto00']));}
			
			$this->db->trans_start();
			$errors0 = $this->db->query('SELECT p1.id AS id,p1.name AS name FROM config_machine_error AS p1;');
			$ticket0 = $this->db->query('SELECT p1.id AS id, p1.name AS errorName,COUNT(p1.id) AS total FROM config_machine_error AS p1 INNER JOIN tickets AS p2 ON p1.id = p2.error WHERE p2.crDate BETWEEN ? AND ? GROUP BY p1.id;',array($datefr00,$dateto00));
			$totale0 = $this->db->query('SELECT COUNT(p1.id) AS total FROM tickets AS p1 WHERE p1.crDate BETWEEN ? AND ?;',array($datefr00,$dateto00));
			$this->db->trans_complete();
			
			$totale0 = $totale0->row();
			
			$data['errors0'] = $errors0->result_array();
			$data['ticket0'] = $ticket0->result_array();
			$data['totale0'] = $totale0->total;
			
			if($_POST['preview0'] == '1'){
				$this->load->view('modules/html2pdf/errorcodesreport', $data);
			}
			else{
			$html = $this->load->view('modules/html2pdf/errorcodesreport', $data,true);
			$time = date("d/m/Y H:i:s",time());
			
			$pdfFilePath = "error_codes_report.pdf";
			$this->m_pdf->pdf->AddPage('L','', '', '', '',10,10,10,10,5,5);
			$this->m_pdf->pdf->setHTMLFooter('<table border="0" width="100%"><tr><td width="50%" align="left"><p style="font-family:Tahoma, Geneva, sans-serif"; font-size:"9px;"><i>This report was generated on '.$time.'</i></p></td><td width="50%" align="right"><p style="font-family:Tahoma, Geneva, sans-serif; font-size:12px;">Page {PAGENO} of {nb}</p></td></tr></table>');
			$this->m_pdf->pdf->WriteHTML($html);
			
			$this->m_pdf->pdf->Output($pdfFilePath, "D");
			}
		}
		else {
			redirect('dashboard');
		}
	}
	
	public function filteredrefund()
	{
		$powervalue = 'r';
		$screenid = '1.5.0';
		$userid = $this->session->uid;
		
		$this->db->trans_start();
		$query = $this->db->query("SELECT p4.value AS priv from identities AS p1 INNER JOIN local_identities AS p2 ON p1.id = p2.id INNER JOIN roles AS p3 ON p2.role = p3.id INNER JOIN privilege AS p4 ON p3.id = p4.roleId WHERE p1.username = ? AND p4.screen = ?",array($userid,$screenid));
		$this->db->trans_complete();
		$row = $query->row();

		if($query->num_rows() > 0){$powermatch = $row->priv;}else {$powermatch = 'x';}
		
		if (strpos($powermatch,$powervalue) !== false) {
			$this->load->library('m_pdf');
			
			$datefr00 = 0;
			$dateto00 = time();
			
			if(!empty($_POST['datefr00'])){ $datefr00 = strtotime(str_replace('/', '-',$_POST['datefr00']));}
			if(!empty($_POST['dateto00'])){ $dateto00 = strtotime(str_replace('/', '-',$_POST['dateto00']));}
			
			$this->db->trans_start();
			$refprm00 = $this->db->query("SELECT p1.id AS id,p1.crDate AS crDate,p1.name AS name,p1.contact AS contact,p7.name AS status, p1.pic AS pic, p1.amount AS amount FROM tickets AS p1 INNER JOIN companies AS p2 ON p1.compId = p2.id INNER JOIN outlets AS p3 ON p1.outletId = p3.id INNER JOIN machines AS p4 ON p1.machId = p4.id INNER JOIN config_call_type AS p5 ON p1.callType = p5.id INNER JOIN config_machine_error AS p6 ON p1.error = p6.id INNER JOIN config_ticket_status AS p7 ON p1.status = p7.id WHERE p1.refund = ? AND p1.crDate BETWEEN ? AND ?;",array(1,$datefr00,$dateto00));
			$refcnt00 = $this->db->query("SELECT SUM(p1.amount) AS total FROM tickets AS p1 INNER JOIN companies AS p2 ON p1.compId = p2.id INNER JOIN outlets AS p3 ON p1.outletId = p3.id INNER JOIN machines AS p4 ON p1.machId = p4.id INNER JOIN config_call_type AS p5 ON p1.callType = p5.id INNER JOIN config_machine_error AS p6 ON p1.error = p6.id INNER JOIN config_ticket_status AS p7 ON p1.status = p7.id WHERE p1.refund = ? AND p1.crDate BETWEEN ? AND ?;",array(1,$datefr00,$dateto00));
			$refprm01 = $this->db->query("SELECT p1.id AS id, p1.crDate AS crDate, p1.name AS name, p1.contact AS contact, p7.name AS status, p1.pic AS pic, p1.amount AS amount FROM tickets AS p1 INNER JOIN companies AS p2 ON p1.compId = p2.id INNER JOIN outlets AS p3 ON p1.outletId = p3.id INNER JOIN machines AS p4 ON p1.machId = p4.id INNER JOIN config_call_type AS p5 ON p1.callType = p5.id INNER JOIN config_machine_error AS p6 ON p1.error = p6.id INNER JOIN config_ticket_status AS p7 ON p1.status = p7.id WHERE p1.refund = ? AND p1.crDate BETWEEN ? AND ?;
			",array(0,$datefr00,$dateto00));
			$refcnt01 = $this->db->query("SELECT SUM(p1.amount) AS total FROM tickets AS p1 INNER JOIN companies AS p2 ON p1.compId = p2.id INNER JOIN outlets AS p3 ON p1.outletId = p3.id INNER JOIN machines AS p4 ON p1.machId = p4.id INNER JOIN config_call_type AS p5 ON p1.callType = p5.id INNER JOIN config_machine_error AS p6 ON p1.error = p6.id INNER JOIN config_ticket_status AS p7 ON p1.status = p7.id WHERE p1.refund = ? AND p1.crDate BETWEEN ? AND ?;",array(0,$datefr00,$dateto00));
			$this->db->trans_complete();
			
			$totalr00 = $refcnt00->row();
			$totalr01 = $refcnt01->row();
			
			$data['refprm00'] = $refprm00->result_array();
			$data['refprm01'] = $refprm01->result_array();
			$data['totalr00'] = $totalr00->total;
			$data['totalr01'] = $totalr01->total;
			
			if($_POST['preview0'] == '1'){
				$this->load->view('modules/html2pdf/filteredrefund', $data);
			}
			else{
				$html = $this->load->view('modules/html2pdf/filteredrefund', $data,true);
				$time = date("d/m/Y H:i:s",time());
				
				$pdfFilePath = "filtered_refund.pdf";
				$this->m_pdf->pdf->AddPage('L','', '', '', '',10,10,10,10,5,5);
				$this->m_pdf->pdf->setHTMLFooter('<table border="0" width="100%"><tr><td width="50%" align="left"><p style="font-family:Tahoma, Geneva, sans-serif"; font-size:"9px;"><i>This report was generated on '.$time.'</i></p></td><td width="50%" align="right"><p style="font-family:Tahoma, Geneva, sans-serif; font-size:12px;">Page {PAGENO} of {nb}</p></td></tr></table>');
				$this->m_pdf->pdf->WriteHTML($html);
	
				$this->m_pdf->pdf->Output($pdfFilePath, "D");
			}

		}
		else {
			redirect('dashboard');
		}
	}
}
