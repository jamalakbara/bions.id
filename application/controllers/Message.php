<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {

    public function __construct()
    {
         parent::__construct();
		 $this->load->model('message_model');
		 $this->load->model('menu_model');
		 $this->load->model('botmenu_model');
		 $this->load->model('config_model');
		 $this->load->model('user_model');
		 $this->load->model('categories_model');
    }

	public function index()
	{
		$catmenu = $this->categories_model->listingmod('learning');
		$categories = $this->categories_model->listingmod('message');
		$config = $this->config_model->detail(1);
		$menu = $this->menu_model->listing();
		$botmenu = $this->botmenu_model->listing();

		$data = array(	'title'	=>	$config->site_title,
						'meta'	=>	$config->site_meta,
						'desc'	=>	$config->site_desc,
						'og_url'	=>	base_url(),
						'og_type'	=>	'website',
						'og_title'	=>	$config->site_title,
						'og_desc'	=>	$config->site_desc,
						'og_image'	=>	base_url('images/logobions.png'),
						'author'	=>	$config->name,
						'categories' => $categories,
						'catmenu' => $catmenu,
						'menu' => $menu,
						'botmenu' => $botmenu,
						'config' => $config,
						'isi'	=>	'home/'.$config->template.'/message');

		$this->load->view('home/'.$config->template.'/layout/wrapper',$data);

	}


	public function getbotmessage()
	{
			$txt = $this->db->escape_like_str($this->input->post('txt'));
            $this->db->select('*');
            $this->db->from('chatbot_hints');
	        $this->db->like('question',$txt);
			$query = $this->db->get();
//			$result = $query->num_rows();
//			echo $this->db->last_query();
			//$result = $query->result();
			//echo $result->reply;
			if($query->num_rows()>0) {
				$result = $query->row();
				$html = $result->reply;
			} else {
				$html="Sorry not be able to understand you";
			}
			$added_on=date('Y-m-d h:i:s');
			$datadb = array('message'	=> $txt,
							'added_on'	=> $added_on,
							'type'	=> 'user'
			);
			$this->message_model->add($datadb);
			$added_on=date('Y-m-d h:i:s');
			$datadb = array('message'	=> $txt,
							'added_on'	=> $added_on,
							'type'	=> 'bot'
			);
			$this->message_model->add($datadb);
			echo $html;
	}

	public function getbotmessage2()
	{
		$txt = $this->input->get('txt');
		$sql = "select reply from st_chatbot_hints where question like '%".$this->db->escape_like_str($txt)."%'ESCAPE'!'";
//		$sql = "SELECT * FROM data WHERE nama LIKE '%".
//		$this->db->escape_like_str($search)."%'ESCAPE'!'".
//		$sql = "OR nisn LIKE '%".
//		$this->db->escape_like_str($search)."%'ESCAPE'!'";
		$query = $this->db->query($sql);
		if($query->num_rows()>0) {
			//$row=mysqli_fetch_assoc($res);
			$result = $query->row();
   foreach( $result as $row )
    {
         //access columns as $row->column_name
		 $html=$row['reply'];
    }
//			$html=$row['reply'];
		}else{
			$html="Sorry not be able to understand you";
		}
			$added_on=date('Y-m-d h:i:s');
			$datadb = array('message'	=> $txt,
							'added_on'	=> $added_on,
							'type'	=> 'user'
			);
			$this->message_model->add($datadb);
			$added_on=date('Y-m-d h:i:s');
			$datadb = array('message'	=> $txt,
							'added_on'	=> $added_on,
							'type'	=> 'bot'
			);
			$this->message_model->add($datadb);
//mysqli_query($con,"insert into message(message,added_on,type) values('$txt','$added_on','user')");
//$added_on=date('Y-m-d h:i:s');
//mysqli_query($con,"insert into message(message,added_on,type) values('$html','$added_on','bot')");
			echo $html;
	}
}
