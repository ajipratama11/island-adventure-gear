<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		// $this->load->model('M_pages', 'models');
		$this->load->library('cart');
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
		// var_dump($product->price);die;
		$category = $product->category_id;
		if($product->stock == 0) {
			$this->session->set_flashdata('out_of_stock', true);
			redirect('pages/product_detail/' . $category);
		}
		// $ip_address = $this->getClientIP();
		// $cart =  array(
		// 	'product_id' => $id,
		// 	'date'	=> date('Y-m-d'),
		// 	'ip_address' => $ip_address
		// );
		
		$data = array(
			'id'      => $id,
			'qty'     => 1,
			'price'   => $product->price,
			'name'    => $product->product_name,
			'product_options' => array(
				'images' => $product->image
			)
		);
		
		$this->cart->insert($data);
		// var_dump($this->cart->contents());die;
		$this->session->set_flashdata('success_add_cart', true);
		redirect('pages/product_detail/' . $category);
	}

	public function add_to_cart2($id)
	{
		// $ip_address = $this->getClientIP();
		$product = $this->db->get_where('product', ['id' => $id])->row();
		if($product->stock == 0) {
			$this->session->set_flashdata('out_of_stock', true);
			redirect('pages');
		}
		$data = array(
			'id'      => $id,
			'qty'     => 1,
			'price'   => $product->price,
			'name'    => $product->product_name,
			'product_options' => array(
				'images' => $product->image
			)
		);
		$this->cart->insert($data);
		// $this->db->insert('cart', $cart);
		$this->session->set_flashdata('success_add_cart', true);
		redirect('pages');
	}

	public function cart()
	{
		$var['title'] = 'Cart';
		// $ip_address = $this->getClientIP();
		$var['cart'] = $this->cart->contents();
		// var_dump($var['cart']);die;
		// $var['cart'] = $this->models->get_product_by_id($id);
		$this->load->view('pages/cart', $var);
	}

	public function delete_from_cart($id)
	{
		// $this->db->delete('cart', ['id' => $id]);
		$data = [
			'rowid' => $id,
			'qty' => 0,
		];
		// var_dump($data);die;
		$this->cart->update($data);
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
			// var_dump($val);die;
			$message .= $no++ . '. ' . $val->product_name . ' (qty ' . $this->input->post('qty')[$key] . '), ';
			$product[] = [
				'product_name' 	=> $val->product_name,
				'qty'			=> $this->input->post('qty')[$key],
			];
		}

		$message .= 'From Website Island Adventure Gear';

		$this->send_email('cart', $product);

		foreach($_POST['product_id'] as $key => $value) {
			$pid = $this->input->post('product_id')[$key];
			$this->db->delete('cart', ['id' => $pid]);
		}

		redirect('https://wa.me/6281353012947?text='. $message);
	}

	public function order2() 
	{
		$id = $this->input->get('id');
		$pages = $this->input->get('hal');
		$val = $this->db->get_where('product', ['id' => $id])->row();

		if($val->stock == 0) {
			$this->session->set_flashdata('out_of_stock', true);
			redirect($pages);
		}

		$message = 'I Want To Order Product : ';
		$message .= $no++ . '. ' . $val->product_name .' (qty 1), ';
		$message .= 'From Website Island Adventure Gear';
		$product = $val->product_name;

		$this->send_email('non_cart', $product);
		redirect('https://wa.me/6281353012947?text='. $message);
	}

	private function send_email($type, $product)
	{
		$email = 'ardiyanramadhan4@gmail.com';
		$no = 1;
		$message = 'This is a list of orders:<br>';
		$config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'islandadventuregear@gmail.com',
            'smtp_pass' => 'iqnvhdijutfulhgc',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];
        $this->load->library('email', $config);
        $this->email->from('islandadventuregear@gmail.com', 'User Island Adventure Gear');

        $this->email->to($email);
		$this->email->subject('New Order From Website');
		if($type == 'cart') {
			foreach($product as $value) {
				$message .= $no++ . '. ' . $value['product_name'] . ' (qty '. $value['qty']. ')' .'<br>';
			}
			$message .= 'Please check your whatsapp';
			$this->email->message('
			<!DOCTYPE html>
				<html lang="en">
				<head>
					<meta charset="UTF-8">
					<meta http-equiv="X-UA-Compatible" content="IE=edge">
					<meta name="viewport" content="width=device-width, initial-scale=1.0">
					<title>Received Order</title>
					<style>
						@import url("https://fonts.googleapis.com/css2?family=Rubik&display=swap");
					</style>
				</head>
				<body style="font-family: Rubik, sans-serif;">
	
					<div class="" style="border: 1px solid rgba(0,0,0,.125); padding: 10px 5px; padding-bottom: 20px; background-color: white">
	
						<div class="" style="text-align: center; margin-top: 20px;">
							<img src="' . base_url('layouts/images/logo1.png') . '" alt="logo" width="250px" alt="">
						</div>
	
						<div class="" style="text-align: center; margin-top: 20px;">
							<h2><b> Here a new order </b></h2>
							<label for="">'.$message.'</label>
						</div>
	
					</div>
	
					<div class="" style="background: #0077b6; color: white; padding: 15px 10px; text-align: center;">
						<small style="margin: 0px">© Copyright 2022 Island Adventure Gear.</small>
					</div>
	
				</body>
				</html>
			');
		} else if($type == 'non_cart') {
			$message .= $product .' (qty 1) <br>';
			$message .= 'Please check your whatsapp';
			$this->email->message('
			<!DOCTYPE html>
				<html lang="en">
				<head>
					<meta charset="UTF-8">
					<meta http-equiv="X-UA-Compatible" content="IE=edge">
					<meta name="viewport" content="width=device-width, initial-scale=1.0">
					<title>Received Order</title>
					<style>
						@import url("https://fonts.googleapis.com/css2?family=Rubik&display=swap");
					</style>
				</head>
				<body style="font-family: Rubik, sans-serif;">
	
					<div class="" style="border: 1px solid rgba(0,0,0,.125); padding: 10px 5px; padding-bottom: 20px; background-color: white">
	
						<div class="" style="text-align: center; margin-top: 20px;">
							<img src="' . base_url('layouts/images/logo1.png') . '" alt="logo" width="250px" alt="">
						</div>
	
						<div class="" style="text-align: center; margin-top: 20px;">
							<h2><b> Here a new order </b></h2>
							<label for="">'.$message.'</label>
						</div>
	
					</div>
	
					<div class="" style="background: #0077b6; color: white; padding: 15px 10px; text-align: center;">
						<small style="margin: 0px">© Copyright 2022 Island Adventure Gear.</small>
					</div>
	
				</body>
				</html>
			');
		}

		if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }

	}

}
