<?php

namespace App\Controllers;

use App\Models\LearningModel;
use App\Models\MenuModel;
use App\Models\BotmenuModel;
use App\Models\ConfigModel;
use App\Models\UserModel;
use App\Models\CategoriesModel;

class Learning extends BaseController
{
    protected $learningModel;
    protected $menuModel;
    protected $botmenuModel;
    protected $configModel;
    protected $userModel;
    protected $categoriesModel;


    public function __construct()
    {
        $this->learningModel = new LearningModel();
        $this->menuModel = new MenuModel();
        $this->botmenuModel = new BotmenuModel();
        $this->configModel = new ConfigModel();
        $this->userModel = new UserModel();
        $this->categoriesModel = new CategoriesModel();
    }

    public function listing($catid)
    {
        $catmenu = $this->categoriesModel->getCategoriesByModule('learning');
        $category = $this->categoriesModel->getConfigDetail($catid);
        $config = $this->configModel->getConfigDetail(1);
        $menu = $this->menuModel->findAll();
        $botmenu = $this->botmenuModel->findAll();

        $jumlah= $this->learningModel->jumlah($catid);
        $config1['base_url'] = base_url().'learning/listing/'.$catid;
        $config1['total_rows'] = $jumlah; //menghitung total baris
        $config1['per_page'] = 6; //mengatur total data yang tampil per halamannya

        $config1['base_url'] = base_url().'learning/listing/'.$catid;
        $config1['total_rows'] = $jumlah; //menghitung total baris
        $config1['per_page'] = 6; //mengatur total data yang tampil per halamannya

        // Produces: class="myclass"
        $config1['attributes'] = array('class' => 'page-link');
        
        //berfungsi untuk melampirkan markup
        $config1['full_tag_open'] = '<ul class="pagination">';
        $config1['full_tag_close'] = '</ul>';
        
        //berfungsi untuk Menyesuaikan "first" Link
        $config1['first_link'] = 'FIRST';
        $config1['first_tag_open'] = '<li class="page-item">';
        $config1['first_tag_close'] = '</li>';
        
        //berfungsi untuk Menyesuaikan Link terakhir
        $config1['last_link'] = 'LAST';
        $config1['last_tag_open'] = '<li class="page-item">';
        $config1['last_tag_close'] = '</li>';
        
        //berfungsi untuk Menyesuaikan "next" Link
        $config1['next_link'] = '<i class="fa fa-angle-right"></i>';
        $config1['next_tag_open'] = '<li class="page-item">';
        $config1['next_tag_close'] = '</li>';
        
        //berfungsi untuk Menyesuaikan "previous" Link
        $config1['prev_link'] = '<i class="fa fa-angle-left"></i>';
        $config1['prev_tag_open'] = '<li class="page-item">';
        $config1['prev_tag_close'] = '</li>';
        
        //berfungsi untuk Menyesuaikan "Current Page" Link
        $config1['cur_tag_open'] = '<li class="page-item"><a class="page-link active" href="#">';
        $config1['cur_tag_close'] = '</a></li>';
        
        //berfungsi untuk Menyesuaikan "digit angka" Link
        $config1['num_tag_open'] = '<li class="page-item">';
        $config1['num_tag_close'] = '</li>';
        
        // $dari =  (service('uri')->getSegments(4)) ? service('uri')->getSegments(4) : 0;
        // $learning = $this->learningModel->lihat($config1['per_page'],$dari,$catid);
        // $this->pagination->initialize($config1);

        $menuModel = $this->menuModel;

        $task = service('uri')->getSegments(1);
        $action = service('uri')->getSegments(2);

        $data = array(	'title'	=>	$config['site_title'],
                'meta'	=>	$config['site_meta'],
                'desc'	=>	$config['site_desc'],
                'og_url'	=>	base_url(),
                'og_type'	=>	'website',
                'og_title'	=>	$config['site_title'],
                'og_desc'	=>	$config['site_desc'],
                'og_image'	=>	base_url('images/logobions.png'),
                'author'	=>	$config['name'],
                'catmenu' => $catmenu,
                'learning' => isset($learning) ? $learning : array(),
                'category' => $category,
                'menu' => $menu,
                'botmenu' => $botmenu,
                'config' => $config,
                'catid' => $catid,
                'menuModel' => $menuModel,
                'task' => $task,
                'action' => $action,
                'isi'	=>	'home/'.$config['template'].'/learninglist');

          return view('home/'.$config['template'].'/layout/wrapper',$data);
    }
}
