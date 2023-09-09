<?php

namespace App\Controllers;

use App\Models\MenuModel;
use App\Models\BotMenuModel;
use App\Models\ConfigModel;
use App\Models\FaqModel;
use App\Models\BionsModel;
use App\Models\UserModel;
use App\Models\CategoriesModel;

class Home extends BaseController
{
    protected $categoriesModel;
    protected $menuModel;
    protected $botMenuModel;
    protected $configModel;
    protected $faqModel;
    protected $bionsModel;
    protected $userModel;

    public function __construct()
    {
        $this->categoriesModel = new CategoriesModel();
        $this->menuModel = new MenuModel();
        $this->botMenuModel = new BotMenuModel();
        $this->configModel = new ConfigModel();
        $this->faqModel = new FaqModel();
        $this->bionsModel = new BionsModel();
        $this->userModel = new UserModel();
    }

    public function index(): string
    {
        $catmenu = $this->categoriesModel->getCategoriesByModule('learning');
        $config = $this->configModel->find(1);
        $bions = $this->bionsModel->find(1);
        $menu = $this->menuModel->findAll();
        $botmenu = $this->botMenuModel->findAll();

        $menuModel = $this->menuModel;

        if ($bions["faqid"] > 0) {
            $faq = $this->faqModel->getFaqsByCategory($bions["faqid"]);
        } else {
            $faq = $this->faqModel->getFaqsByCategory(1);
        }

        $data = [
            'title' => $config["site_title"],
            'meta' => $config["site_meta"],
            'desc' => $config["site_desc"],
            'og_url' => base_url(),
            'og_type' => 'website',
            'og_title' => $config["site_title"],
            'og_desc' => $config["site_desc"],
            'og_image' => base_url('images/logobions.png'),
            'author' => $config["name"],
            'catmenu' => $catmenu,
            'menu' => $menu,
            'botmenu' => $botmenu,
            'bions' => $bions,
            'faq' => $faq,
            'config' => $config,
            'menuModel' => $menuModel,
            'isi' => 'home/' . $config["template"] . '/home',
        ];

        var_dump('home/' . $config["template"] . '/layout/wrapper');
        return view('home/' . $config["template"] . '/layout/wrapper', $data);
        // return view('welcome_message');
    }
}
