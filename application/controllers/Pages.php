<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		// $this->load->model('M_pages', 'models');
		date_default_timezone_set('Asia/Jakarta');
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
		$var['value'] = $this->db->get_where('article', ['slug' => $slug])->row();
		$var['title'] = $var['value']->title;
		$var['latest'] = $this->db->order_by('id', 'desc')->limit(3)->get('article')->result();
		$this->load->view('pages/fullpage_blog', $var);
	}

	public function add_to_chart($id)
	{
		$product = $this->db->get_where('product', ['id' => $id])->row();
		$category = $product->category_id;
		$cart = [
			'product_id' => $id,
			'date'	=> date('Y-m-d')
		];
		$this->db->insert('cart', $cart);
		$this->session->set_flashdata('success_add_cart', true);
		redirect('pages/product_detail/' . $category);
	}

	public function add_to_cart2()
	{
		$cart = [
			'product_id' => $id,
			'date'	=> date('Y-m-d')
		];
		$this->db->insert('cart', $cart);
		$this->session->set_flashdata('success_add_cart', true);
		redirect('pages');
	}

	public function cart()
	{
		$var['title'] = 'Cart';
		$var['cart'] = $this->models->get_cart();
		$this->load->view('pages/cart', $var);
	}

	public function delete_from_cart($id)
	{
		$this->db->delete('cart', ['id' => $id]);
		$this->session->set_flashdata('delete_cart', true);
		redirect('pages/cart');
	}

}
