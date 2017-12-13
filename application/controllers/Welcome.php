<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->helper(array('url','html','array','date'));
		$this->load->model(array('Clinic','News'));

		$data = array(
			'title' => 'หน้าแรก',
			'titleRegister' => 'สมัครเป็นที่ปรึกษาทางกฏหมายได้ทีนี่',
			'titleRegisterSub' => 'Full screen intro with background image, color overlay and icons',
			'register' => 'สมัคร',
			'news' => 'ข่าวสาร',
			'lastnews' => 'ข่าวสารล่าสุด',
			'clinic' => 'คลินิกยุติธรรม',
			'contact' => 'ติดต่อเรา',
		);
		$data['getArea'] = $this->Clinic->getArea(); //a.area_id 
		$data['getClinic'] = $this->Clinic->getAllClinic(); // c.area_id <fk>
		$data['getNews'] = $this->News->getOrderNews(); //
		$data['getNewsTop'] = $this->News->getTopNews(); //

		$this->load->view('home', $data);
		$this->load->view('template/header');
		$this->load->view('template/news');
		$this->load->view('template/map');
		$this->load->view('template/footer');
	}
}
