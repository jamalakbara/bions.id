<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RedirectLink extends CI_Controller {

    public function __construct()
    {
         parent::__construct();
    }

	public function index()
	{
		header('Location: https://zoom.us/j/95998871606?pwd=MSs1UHlIb01FckxBZTJ4SEtmSFdhdz09');
	}
}
