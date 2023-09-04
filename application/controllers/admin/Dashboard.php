<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
    {
         parent::__construct();
		 $this->load->model('categories_model');
         $this->load->model('config_model');
         $this->load->model('user_model');
    }

	public function index() 
	{
		if($this->session->userdata('status') != "login"){
			$this->session->set_flashdata('login_error','You must login to use this feature');
			redirect(base_url('admin/login'));
		} else if($this->session->userdata('usertype') == 0) {
			$this->session->set_flashdata('login_error','You are not allowed to use this feature');
			redirect(base_url('admin/login'));
		}

		$users = $this->user_model->listing();
		$config = $this->config_model->detail(1);

		$data = array(	'title'	=>	'Administrator Panel',
						'config'	=> $config,
						'users'	=> $users,
						'isi'	=>	'admin/dashboard/list');
		$this->load->view('admin/layout/wrapper',$data);
	}

	public function getnotif() {

		$orders = $this->order_model->listingbaru();

		$count = count($orders);
		$pre = '<li>';
		$post = '</li>';
		$html = '';
		$merged = Array();
		$output = '';

		foreach($orders as $row) {
			     $output .= '<li>';
			     $output .= '<a href="'.base_url('admin/order/detail/'.$row->id).'">';
                 $output .= '<i class="fa fa-shopping-cart text-green"></i>'.$row->invoiceid;
                 $output .= '</a>';
			     $output .= '</li>';
		}

    if($count > 0){
        $data['status'] = 'ok';
        $data['count'] = $count;
        $data['result'] = $orders;
        $data['output'] = $output;
    }else{
        $data['status'] = 'err';
        $data['count'] = '';
        $data['result'] = '';
        $data['output'] = '';
    }

		echo json_encode($data);
	}
}
