<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('M_admin', 'models');
		$this->load->library('form_validation');
		date_default_timezone_set('Asia/Jakarta');
		if (empty($this->session->userdata('id'))) {
            $this->session->set_flashdata('login_dulu', true);
            redirect('Auth');
        }
	}

	public function index()
	{
		$var['title'] = 'Dashboard';
		$this->load->view('admin/dashboard', $var);
	}

	//profile
	public function profile()
	{
		$var['title'] = 'Profile';
		$var['value'] = $this->models->get_admin();
		$this->load->view('admin/profile', $var);
	}

	public function save_photo()
	{
		$this->models->save_photo();
		$this->session->set_flashdata('upload_succcess', true);
		redirect('Admin/profile');
	}

	public function update_profile()
	{
		$this->models->update_profile();
		$this->session->set_flashdata('success_update', true);
		redirect('Admin/profile');
	}

	public function update_password()
	{
		$id = $this->input->post('id');
		$password = $this->input->post('password');
		$this->db->set('password', password_hash($password, PASSWORD_BCRYPT));
		$this->db->where('id', $id);
		$this->db->update('auth');
		$this->session->set_flashdata('update_password', true);
		redirect('Admin/profile');
	}


	//product
	public function category()
	{
		$var['title'] = 'Category';
		$var['category'] = $this->models->get_category();
		$this->load->view('admin/product/category', $var);
	}

	public function save_category()
	{
		$this->models->save_category();
		$this->session->set_flashdata('success_insert', true);
		redirect('Admin/category');
	}

	public function update_category()
	{
		$this->models->update_category();
		$this->session->set_flashdata('success_update', true);
		redirect('Admin/category');
	}

	public function delete_category($id)
	{
		$this->delete_image_category($id);
		$this->db->delete('category', ['id' => $id]);
		$this->session->set_flashdata('success_delete', true);
		redirect('Admin/category');
	}

	private function delete_image_category($id)
	{
		$image = $this->db->get_where('category', ['id' => $id])->row();
        if ($image->image != "01.jpg") {
            $filename = explode(".", $image->image)[0];
            return array_map('unlink', glob(FCPATH . "/layouts/images/category/$filename.*"));
        }
	}

	public function sub_category()
	{
		$var['title'] = 'Sub Category';
		$var['sub_category'] = $this->models->get_subCategory();
		$var['category'] = $this->models->get_category();
		$this->load->view('admin/product/sub_category', $var);
	}

	public function save_subCategory()
	{
		$value = [
			'category_id'		=> $this->input->post('category_id'),
			'name_subcategory'	=> $this->input->post('name_subcategory')
		];
		$this->db->insert('sub_category', $value);
		$this->session->set_flashdata('success_insert', true);
		redirect('Admin/sub_category');
	}

	public function update_subCategory()
	{
		$id = $this->input->post('id');
		$value = [
			'category_id'		=> $this->input->post('category_id'),
			'name_subcategory'	=> $this->input->post('name_subcategory')
		];
		$this->db->update('sub_category', $value, ['id' => $id]);
		$this->session->set_flashdata('success_update', true);
		redirect('Admin/sub_category');
	}

	public function delete_subCategory($id)
	{
		$this->db->delete('sub_category', ['id' => $id]);
		$this->session->set_flashdata('success_delete', true);
		redirect('Admin/sub_category');
	}

	public function product()
	{
		$var['title'] = 'Product';
		$var['product'] = $this->models->get_product();
		$this->load->view('admin/product/product', $var);
	}

	public function add_product()
	{
		$var['title'] = 'Add Product';
		$var['category'] = $this->models->get_category();
		$var['sub_category'] = $this->models->get_subCategory();
		$this->load->view('admin/product/add_product', $var);
	}

	public function save_product()
	{
		$this->form_validation->set_rules('product_name', 'product name', 'required|trim', ['required' => 'product name is required']);
		$this->form_validation->set_rules('stock', 'stock', 'required|trim', ['required' => 'stock is required']);
		$this->form_validation->set_rules('price', 'harga', 'required|trim', ['required' => 'price is required']);
		$this->form_validation->set_rules('description', 'deskripsi', 'required|trim', ['required' => 'description is required']);
		$this->form_validation->set_rules('category_id', 'ketegori', 'required|trim', ['required' => 'category is required']);
		if (empty($_FILES['image']['name']))
		{
			$this->form_validation->set_rules('image', 'Image', 'required', ['required' => 'image is required']);
		}
		if ($this->form_validation->run() == false) {
            $this->add_product();
        } else {
			$this->models->save_product();
			$this->session->set_flashdata('success_insert', true);
			redirect('Admin/product');
		}	

	}

	public function sub_categoryAjax()
	{
		$category_id = $_POST['category_id'];
		if ($category_id == '') {
			exit;
		} else {
			$sub_category = $this->db->query("SELECT * FROM sub_category WHERE category_id ='$category_id' ORDER BY id ASC")->result_array();
			foreach ($sub_category as $get) {
				echo '<option value="' . $get['id'] . '">' . $get['name_subcategory'] . '</option>';
			}
			exit;
		}
	}

	public function detail_product($slug)
	{
		$var['title'] = 'Detail Product';
		$var['value'] = $this->models->get_detailProduct($slug);
		$var['category'] = $this->models->get_category();
		$this->load->view('admin/product/detail_product', $var);
	}

	public function edit_product($slug)
	{
		$var['title'] = 'Edit Product';
		$var['edit'] = $this->models->get_detailProduct($slug);
		$var['category'] = $this->models->get_category();
		$var['sub_category'] = $this->models->get_subCategory();
		$this->load->view('admin/product/edit_product', $var);
	}

	public function update_product()
	{
		$slug = $this->input->post('slug');
		$this->form_validation->set_rules('product_name', 'product name', 'required|trim', ['required' => 'product name is required']);
		$this->form_validation->set_rules('stock', 'stock', 'required|trim', ['required' => 'stock is required']);
		$this->form_validation->set_rules('price', 'harga', 'required|trim', ['required' => 'price is required']);
		$this->form_validation->set_rules('description', 'deskripsi', 'required|trim', ['required' => 'description is required']);
		$this->form_validation->set_rules('category_id', 'ketegori', 'required|trim', ['required' => 'category is required']);
		if ($this->form_validation->run() == false) {
            $this->edit_product($slug);
        } else {
			$this->models->update_product();
			$this->session->set_flashdata('success_update', true);
			redirect('Admin/product');
		}
	}

	public function add_stock()
	{
		$id = $this->input->post('id');
		$stock = $this->input->post('stock');
		$this->db->query("UPDATE `product` SET `stock`=stock+'$stock' WHERE id='$id'");
		$this->session->set_flashdata('success_addition_stock', true);
		redirect('Admin/product');
	}

	public function delete_product($id)
	{
		$this->delete_image_product($id);
		$this->db->delete('product', ['id' => $id]);
		$this->session->set_flashdata('success_delete', true);
		redirect('Admin/product');
	}

	private function delete_image_product($id)
	{
		$image = $this->db->get_where('product', ['id' => $id])->row();
        if ($image->image != "01.jpg") {
            $filename = explode(".", $image->image)[0];
            return array_map('unlink', glob(FCPATH . "/layouts/images/product/$filename.*"));
        }
	}

	public function product_photo()
	{
		$var['title'] = 'Product Photo';
		$var['photo'] = $this->models->get_productPhoto();
		$var['product'] = $this->models->get_product();
		$this->load->view('admin/product/product_photo', $var);
	}

	public function save_productPhoto()
	{
		$this->models->save_productPhoto();
		$this->session->set_flashdata('success_insert', true);
		redirect('Admin/product_photo');
	}

	public function update_productPhoto()
	{
		$this->models->update_productPhoto();
		$this->session->set_flashdata('success_update', true);
		redirect('Admin/product_photo');
	}

	public function delete_productPhoto($id)
	{
		$this->delete_product_photo($id);
		$this->db->delete('product_photo', ['id' => $id]);
		$this->session->set_flashdata('success_delete', true);
		redirect('Admin/product_photo');
	}

	public function delete_product_photo($id)
	{
		$photo = $this->db->get_where('product_photo', ['id' => $id])->row();
        if ($photo->photo != "01.jpg") {
            $filename = explode(".", $photo->photo)[0];
            return array_map('unlink', glob(FCPATH . "/layouts/images/product_photo/$filename.*"));
        }
	}

	//payment / finance
	public function payment_methods()
	{
		$var['title'] = 'Payment Methods';
		$var['payment'] = $this->models->get_paymentMethods();
		$this->load->view('admin/finance/payment_methods', $var);
	}

	public function save_paymentMethods()
	{
		$value = [
			'payment_name'	=> $this->input->post('payment_name'),
			'balance'		=> str_replace(",","", $this->input->post('balance'))
		];

		$this->db->insert('payment_methods', $value);
		$this->session->set_flashdata('success_insert', true);
		redirect('Admin/payment_methods');
	}

	public function update_paymentMethods()
	{
		$id = $this->input->post('id');
		$value = [
			'payment_name'	=> $this->input->post('payment_name'),
			'balance'		=> str_replace(",","", $this->input->post('balance'))
		];

		$this->db->update('payment_methods', $value, ['id' => $id]);
		$this->session->set_flashdata('success_update', true);
		redirect('Admin/payment_methods');
	}

	public function delete_paymentMethods($id)
	{
		$this->db->delete('payment_methods', ['id' => $id]);
		$this->session->set_flashdata('success_delete', true);
		redirect('Admin/payment_methods');
	}

	public function mutation_balance()
	{
		$var['title'] = 'Mutation Balance';
		$var['mutation'] = $this->models->get_mutationBalance();
		$var['payment'] = $this->models->get_paymentMethods();
		$this->load->view('admin/finance/mutation_balance', $var);
	}

	public function save_mutationBalance()
	{
		$from = $this->input->post('from_id');
		$to = $this->input->post('to_id');
		$nominal = str_replace(",","", $this->input->post('nominal'));
		$query = $this->db->get_where('payment_methods', ['id' => $from])->row();

		if($from != $to) {
			
			if($nominal > $query->balance) {
				$this->session->set_flashdata('failed_balance', true);
				redirect('Admin/mutation_balance');
			} else {

					$this->db->query("UPDATE `payment_methods` SET `balance`=balance-'$nominal' WHERE id='$from'");
					$this->db->query("UPDATE `payment_methods` SET `balance`=balance+'$nominal' WHERE id='$to'");
		
					$value = [
						'from_id' => $from,
						'to_id' => $to,
						'nominal' => $nominal,
						'date_mutation' => date('Y-m-d')
					];
					$this->db->insert('mutation', $value);
					$this->session->set_flashdata('success_insert', true);
					redirect('Admin/mutation_balance');

			}

		} else {
			$this->session->set_flashdata('failed_same', true);
			redirect('Admin/mutation_balance');
		}

	}

	//Transaction
	public function transaction()
	{
		$var['title'] = 'Transaction';
		$var['transaction'] = $this->models->get_transaction();
		$this->load->view('admin/menu/transaction', $var);
	}

	public function add_transaction()
	{
		$var['title'] = 'Add Transaction';
		$var['payment'] = $this->models->get_paymentMethods();
		$this->load->view('admin/menu/add_transaction', $var);
	}

	public function max_transCode()
	{
		$data = $this->models->max_transCode()->row();
        $json['maxs'] = @$data->maxs;
        echo json_encode($json);
	}

	public function ajax_detail_produk($nomor)
	{
		$list = $this->models->get_datatablesid();
        $data = array();
        $no = $_REQUEST['start'];
        foreach ($list as $orde) {

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $orde->product_name;
            $row[] = $orde->price;
            $row[] = '<img src="'. base_url('layouts/images/product/'. $orde->image).'" width="100">';

            $row[] = ' <button type="button" class="btn btn-primary "onclick="pencarian_produk(\'' . $orde->id . '\',\'' . $orde->product_name . '\',\'' . $orde->price . '\',\'' . $orde->image . '\',\'' . $nomor . '\')">Pilih</button>';


            $data[] = $row;
        }
        $output = array(
            "draw" => $_REQUEST['draw'],
            "recordsTotal" => $this->models->count_allid(),
            "recordsFiltered" => $this->models->count_filteredid(),
            "data" => $data,
        );
        echo json_encode($output);
	}

}
