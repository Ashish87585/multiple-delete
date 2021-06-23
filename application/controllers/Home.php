<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct(){
        parent::__construct();
		$this->load->model('Home_model');
    }
	public function index()
	{
		$data['data'] = $this->Home_model->getAll();
		$this->load->view('home',$data);
	}

	public function delete_multiple() //Delete Multiple Data
	{
		$ids = $this->input->post('ids');
		$this->Home_model->delete_multiple($ids);
	}
}
