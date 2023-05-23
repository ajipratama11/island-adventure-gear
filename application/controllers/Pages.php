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
		$var['testimony'] = $this->models->get_testimony();
		// var_dump($var['testimony']);die;
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

	public function product_detail($category)
	{
		$var['title'] = 'Product';
		$var['sub_category'] = $this->models->get_user_subCategory($category);
		$var['product'] = $this->models->get_userProduct($category);
		$this->load->view('pages/product2', $var);
	}

	public function product_show($slug)
	{
		$var['value'] = $this->db->get_where('product', ['slug' => $slug])->row();
		$var['title'] = $var['value']->product_name;
		$var['photo_product'] = $this->models->get_productPhoto2($var['value']->id);
		$this->load->view('pages/product_show', $var);
	}

	public function blog()
	{
		$var['title'] = 'Blog';
		$var['blog'] = $this->models->get_article();
		$this->load->view('pages/blog', $var);
	}

	public function full_blog($slug)
	{
		$var['blog'] = $this->db->get_where('article', ['slug' => $slug])->row();
		$var['title'] = $var['blog']->title;
		$this->load->view('pages/fullpage_blog', $var);
	}

	public function cart()
	{
		$var['title'] = 'Cart';
		$this->load->view('pages/cart', $var);
	}

}
