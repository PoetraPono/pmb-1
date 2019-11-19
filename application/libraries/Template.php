<?php 
//class
class Template{

	//properties
	protected $_ci;
	private $template;
	private $data;

	function __construct(){
		$this->_ci=&get_instance();
	}

	//set properties
	function display($template, $data=null){
		$data['_content']=$this->_ci->load->view($template, $data, true);
		$data['_header']=$this->_ci->load->view('template/header', $data, true);
		$data['_sidemenu']=$this->_ci->load->view('template/sidemenu', $data, true);
		$data['_footer']=$this->_ci->load->view('template/footer', $data, true);
		$this->_ci->load->view('/template.php', $data);
	}
}