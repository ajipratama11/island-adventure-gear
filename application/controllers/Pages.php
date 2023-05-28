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

	function getClientIP() {

		if (isset($_SERVER)) {
	
			if (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
				return $_SERVER["HTTP_X_FORWARDED_FOR"];
	
			if (isset($_SERVER["HTTP_CLIENT_IP"]))
				return $_SERVER["HTTP_CLIENT_IP"];
	
			return $_SERVER["REMOTE_ADDR"];
		}
	
		if (getenv('HTTP_X_FORWARDED_FOR'))
			return getenv('HTTP_X_FORWARDED_FOR');
	
		if (getenv('HTTP_CLIENT_IP'))
			return getenv('HTTP_CLIENT_IP');
	
		return getenv('REMOTE_ADDR');
	}

	public function add_to_chart($id)
	{
		$product = $this->db->get_where('product', ['id' => $id])->row();
		$category = $product->category_id;
		$ip_address = $this->getClientIP();
		// var_dump($ip_address);die;
		$cart = [
			'product_id' => $id,
			'date'	=> date('Y-m-d'),
			'ip_address' => $ip_address
		];
		$this->db->insert('cart', $cart);
		$this->session->set_flashdata('success_add_cart', true);
		redirect('pages/product_detail/' . $category);
	}

	public function add_to_cart2($id)
	{
		$ip_address = $this->getClientIP();
		$cart = [
			'product_id' => $id,
			'date'	=> date('Y-m-d'),
			'ip_address' => $ip_address
		];
		$this->db->insert('cart', $cart);
		$this->session->set_flashdata('success_add_cart', true);
		redirect('pages');
	}

	public function cart()
	{
		$var['title'] = 'Cart';
		$ip_address = $this->getClientIP();
		$var['cart'] = $this->models->get_cart($ip_address);
		$this->load->view('pages/cart', $var);
	}

	public function delete_from_cart($id)
	{
		$this->db->delete('cart', ['id' => $id]);
		$this->session->set_flashdata('delete_cart', true);
		redirect('pages/cart');
	}

	public function order()
	{
		if(empty($this->input->post('product_id'))) {
			$this->session->set_flashdata('not_checklist', true);
			redirect('pages/cart');
		}
		$no = 1;
		$message = 'I Want To Order Product : ';
		foreach($_POST['product_id'] as $key => $value) {
			$product_id = $this->input->post('product_id')[$key];
			$val = $this->db->get_where('product', ['id' => $product_id])->row();
			$message .= $no++ . '. ' . $val->product_name .', ';
		}

		$message .= 'From Website Island Adventure Gear';

		foreach($_POST['product_id'] as $key => $value) {
			$pid = $this->input->post('product_id')[$key];
			$this->db->delete('cart', ['id' => $pid]);
		}

		redirect('https://wa.me/6281353012947?text='. $message);
	}

}
