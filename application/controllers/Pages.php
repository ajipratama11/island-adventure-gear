<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		// $this->load->model('M_pages', 'models');
		$this->load->model('M_admin', 'models');
	}

	public function index()
	{
		$var['title'] = 'Home';
		$var['product'] = $this->models->get_productHome();
		$this->load->view('pages/index', $var);
	}

	public function about_us()
	{
		$var['title'] = 'About Us';
		$this->load->view('pages/about', $var);
	}

	public function product()
	{
		$var['title'] = 'Product';
		$var['category'] = $this->models->get_category();
		$this->load->view('pages/product', $var);
	}

	public function blog()
	{
		$var['title'] = 'Blog';
		$this->load->view('pages/blog', $var);
	}

	public function cart()
	{
		$var['title'] = 'Cart';
		$this->load->view('pages/cart', $var);
	}

}
