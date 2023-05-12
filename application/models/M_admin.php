<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
	
	public function get_admin()
	{
		$id_admin = $this->session->userdata('id');
		$data_admin = $this->db->get_where('auth', ['id' => $id_admin])->row();
		return $data_admin;
	}

	public function save_photo()
	{
		$post = $this->input->post();
		$id = $post['id'];
		$this->picture = $this->uploadPhoto();
		$this->db->update('auth', $this, ['id' => $id]);
	}

	private function uploadPhoto()
	{
		$config['upload_path']          = './layouts/images/photo/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $nama_lengkap = $_FILES['picture']['name'];
        $config['file_name']            = $nama_lengkap;
        $config['overwrite']            = true;
        $config['max_size']             = 3024;

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('picture')) {
            return $this->upload->data("file_name");
        }
        print_r($this->upload->display_errors());
	}

	public function update_profile()
	{
		$post = $this->input->post();
		$id = $post['id'];
		$this->full_name = $post['full_name'];
		$this->address = $post['address'];
		$this->email = $post['email'];
		$this->db->update('auth', $this, ['id' => $id]);
	}

	public function get_category()
	{
		return $this->db->order_by('id', 'desc')->get('category')->result();
	}

	public function save_category()
	{
		$post = $this->input->post();
		$this->name_category = $post['name_category'];
		$this->image = $this->upload_imageCategory();
		$this->db->insert('category', $this);
	}

	public function update_category()
	{
		$post = $this->input->post();
		$id = $post['id'];
		$this->name_category = $post['name_category'];
		if (!empty($_FILES["image"]["name"])) {
            $this->image = $this->upload_imageCategory();
        } else {
            $this->image = $post["old_image"];
        }
		$this->db->update('category', $this, ['id' => $id]);
	}

	private function upload_imageCategory()
	{
		$config['upload_path']          = './layouts/images/category/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $nama_lengkap = $_FILES['image']['name'];
        $config['file_name']            = $nama_lengkap;
        $config['overwrite']            = true;
        $config['max_size']             = 3024;

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }
        print_r($this->upload->display_errors());
	}

	public function get_subCategory()
	{
		$query = $this->db->select('sub_category.*, category.name_category')
					->from('sub_category')
					->join('category', 'sub_category.category_id = category.id')
					->order_by('id', 'desc')
					->get()->result();
		return $query;
	}

	public function get_paymentMethods()
	{
		return $this->db->order_by('id', 'desc')->get('payment_methods')->result();
	}

	public function get_mutationBalance()
	{
		$query = $this->db->select('mutation.*, payment_methods.payment_name')
						->from('mutation')
						->join('payment_methods', 'mutation.from_id = payment_methods.id')
						->get()->result();
		return $query;
	}

	public function get_product()
	{
		$query = $this->db->select('product.*, category.name_category, sub_category.name_subcategory')
						->from('product')
						->join('category', 'product.category_id = category.id')
						->join('sub_category', 'product.subcategory_id = sub_category.id')
						->get()->result();
		return $query;
	}

	public function save_product()
	{
		$name = [strtoupper($this->input->post('product_name'))];
		$pecahan_nama = explode(" ", $name[0]);
		$kata = explode(" ", $name[0][0]);
		$jml_kata = count($kata);
		$max_code = $this->db->query("SELECT max(product_code)")->row();

	}
}
