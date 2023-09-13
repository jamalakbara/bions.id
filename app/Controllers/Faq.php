<?php

namespace App\Controllers;

use App\Models\FaqModel;
use App\Models\MenuModel;
use App\Models\BotmenuModel;
use App\Models\ConfigModel;
use App\Models\UserModel;
use App\Models\CategoriesModel;

class Faq extends BaseController
{
    protected $faqModel;
    protected $menuModel;
    protected $botmenuModel;
    protected $configModel;
    protected $userModel;
    protected $categoriesModel;


    public function __construct()
    {
        $this->faqModel = new FaqModel();
        $this->menuModel = new MenuModel();
        $this->botmenuModel = new BotmenuModel();
        $this->configModel = new ConfigModel();
        $this->userModel = new UserModel();
        $this->categoriesModel = new CategoriesModel();
    }

    public function index()
    {
        $catmenu = $this->categoriesModel->getCategoriesByModule('learning');
        $categories = $this->categoriesModel->getCategoriesByModule('faq');
        $config = $this->configModel->getConfigDetail(1);
        $menu = $this->menuModel->findAll();
        $botmenu = $this->botmenuModel->findAll();

        $menuModel = $this->menuModel;
        $faqModel = $this->faqModel;

        $task = service('uri')->getSegments(1);
        $action = service('uri')->getSegments(2);

        $data = [
            'title' => $config["site_title"],
            'meta' => $config["site_meta"],
            'desc' => $config["site_desc"],
            'og_url' => base_url(),
            'og_type' => 'website',
            'og_title' => $config["site_title"],
            'og_desc' => $config["site_desc"],
            'og_image' => '/images/logobions.png',
            'author' => $config["name"],
            'categories' => $categories,
            'catmenu' => $catmenu,
            'menu' => $menu,
            'botmenu' => $botmenu,
            'config' => $config,
            'menuModel' => $menuModel,
            'faqModel' => $faqModel,
            'task' => $task,
            'action' => $action,
            'isi' => 'home/' . $config["template"] . '/faq',
        ];

        return view('home/' . $config["template"] . '/layout/wrapper', $data);
    }

    public function detail($id)
    {
        $config = $this->configModel->getConfigDetail(1);
        $faq = $this->faqModel->getConfigDetail(1);
        $menu = $this->menuModel->findAll();
        $botmenu = $this->botmenuModel->findAll();

        $data = [
            'title' => $config["site_title"],
            'meta' => $config["site_meta"],
            'desc' => $config["site_desc"],
            'og_url' => base_url(),
            'og_type' => 'website',
            'og_title' => $config["site_title"],
            'og_desc' => $config["site_desc"],
            'og_image' => '/images/logobions.png',
            'author' => $config["name"],
            'faq' => $faq,
            'menu' => $menu,
            'botmenu' => $botmenu,
            'config' => $config,
            'isi' => 'home/' . $config["template"] . '/faq',
        ];

        return view('home/' . $config["template"] . '/layout/wrapper', $data);
    }
}
