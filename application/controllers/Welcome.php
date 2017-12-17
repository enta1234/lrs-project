<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','html','array','date'));
		$this->load->model(array('clinic','news'));

	}

	public function index()
	{
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
		$data['getArea'] = $this->clinic->getArea(); //a.area_id 
		$data['getClinic'] = $this->clinic->getAllClinic(); // c.area_id <fk>
		$data['getNews'] = $this->news->getOrderNews(); //
		$data['getNewsTop'] = $this->news->getTopNews(); //

		$this->load->view('home', $data);
		$this->load->view('template/header');
		$this->load->view('template/news');
		$this->load->view('template/map');
		$this->load->view('template/footer');
	}
	public function news($id,$name,$date){
		if(isset($id)){
			$news['newsshow'] = $this->news->_getNewsById($id);
			$news['getnews'] = $this->news->getOrderNews(); //
			$this->load->view('template/news/news',$news);
		}
	}
}
