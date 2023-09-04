<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require __DIR__ . '/Baseregistration.php';

class Download extends Baseregistration {

    public function __construct()
    {
         parent::__construct();
         $this->load->helper('download');
         $this->load->model('pages_model');
		 $this->load->model('menu_model');
		 $this->load->model('botmenu_model');
		 $this->load->model('config_model');
		 $this->load->model('user_model');
    }

	public function syaratketentuan(){
		if(isset($_SESSION['data']['acctype'])){
			
			if($_SESSION['data']['acctype'] == '70'){ //syariah
				$data   = file_get_contents(base_url('assets/document/registration/syaratketentuansyariah.pdf'));
				force_download('syaratketentuansyariah.pdf', $data);	
			}	else{
				$data   = file_get_contents(base_url('assets/document/registration/syaratketentuanregular.pdf'));
				force_download('syaratketentuanregular.pdf', $data);	
			}
		} else{
			$data   = file_get_contents(base_url('assets/document/registration/syaratketentuanregular.pdf'));
			force_download('syaratketentuanregular.pdf', $data);	
		}
		
	}

	public function report(){
		$parameters = $this->input->get();
		
		$args = new PrintReport();


		if(isset($parameters['formno']) 
			&& isset($parameters['email']) 
			&& isset($parameters['branch'])){
			
			$formno = $parameters['formno'];
			$email = $parameters['email'];
			$branch = $parameters['branch'];


			$args->setFormno($formno);
            $args->setEmail($email);
            $args->setBranch($branch);
            $args->setLang('en');
			$args->setSource('WS');
          	
          	try{
	            $response = $this->client->printReport($args); 
	            if($response){
	                $return = $response->getReturn();
	                force_download($formno.'.pdf', base64_decode($return));
	                
	            }
        	} catch(Exception $e){
        		// echo 'Caught exception: ',  $e->getMessage(), "\n";
        		echo "No Report found \n";
        	}

			
		}
		

	}

	public function pdf()
	{
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
						'menu' => $menu,
						'botmenu' => $botmenu,
						'config' => $config,
						'isi'	=>	'home/'.$config->template.'/registration/pdf');

		$this->load->view('home/'.$config->template.'/layout/wrapper',$data);
	}
}
