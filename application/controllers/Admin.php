<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
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
		$var['transaction_amount'] = $this->models->get_transactionAmount();
		$var['product_amount'] = $this->models->get_productAmount();
		$var['transaction_total'] = $this->models->get_transactionTotal();
		$var['total_customer'] = $this->models->get_customerAmount();
		$var['payment_methods'] = $this->models->get_paymentMethods();
		$tahun = $this->input->get('tahun');
        if (empty($tahun)) {
            foreach ($this->models->grafik_pengunjung()->result_array() as $row) {
                $var['transaction_chart'][] = (int) $row['Januari'];
                $var['transaction_chart'][] = (int) $row['Februari'];
                $var['transaction_chart'][] = (int) $row['Maret'];
                $var['transaction_chart'][] = (int) $row['April'];
                $var['transaction_chart'][] = (int) $row['Mei'];
                $var['transaction_chart'][] = (int) $row['Juni'];
                $var['transaction_chart'][] = (int) $row['Juli'];
                $var['transaction_chart'][] = (int) $row['Agustus'];
                $var['transaction_chart'][] = (int) $row['September'];
                $var['transaction_chart'][] = (int) $row['Oktober'];
                $var['transaction_chart'][] = (int) $row['November'];
                $var['transaction_chart'][] = (int) $row['Desember'];
            }
        } else {
            foreach ($this->models->filter_grafik_pengunjung()->result_array() as $row) {
                $var['transaction_chart'][] = (int) $row['Januari'];
                $var['transaction_chart'][] = (int) $row['Februari'];
                $var['transaction_chart'][] = (int) $row['Maret'];
                $var['transaction_chart'][] = (int) $row['April'];
                $var['transaction_chart'][] = (int) $row['Mei'];
                $var['transaction_chart'][] = (int) $row['Juni'];
                $var['transaction_chart'][] = (int) $row['Juli'];
                $var['transaction_chart'][] = (int) $row['Agustus'];
                $var['transaction_chart'][] = (int) $row['September'];
                $var['transaction_chart'][] = (int) $row['Oktober'];
                $var['transaction_chart'][] = (int) $row['November'];
                $var['transaction_chart'][] = (int) $row['Desember'];
            }
        }
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

	public function save_transaction()
	{
		$total_qty = 0;
		foreach($_POST['qty'] as $value_qty) {
			$total_qty += $value_qty;
		}

		$code_trans = $this->input->post('code_trans');
		$date_trans = $this->input->post('date_trans');
		$name_customer = $this->input->post('name_customer');
		$address_customer = $this->input->post('address_customer');
		$no_telp_customer = $this->input->post('no_telp_customer');
		$transaction_total = $this->input->post('transaction_total');
		$discount = $this->input->post('discount');
		$totally_payment = $this->input->post('totally_payment');
		$payment_methods_id = $this->input->post('payment_methods_id');

		if($discount > $transaction_total) {
			$this->session->set_flashdata('excess_discount', true);
			redirect('Admin/add_transaction');
		}

		$transaction = [
			'code_trans'				=> $code_trans,
			'name_customer'				=> $name_customer,
			'address_customer'			=> $address_customer,
			'no_telp_customer'			=> $no_telp_customer,
			'date_trans'				=> $date_trans,
			'totally_qty'				=> $total_qty,
			'transaction_total'			=> $transaction_total,
			'discount'					=> $discount,
			'totally_payment'			=> $totally_payment,
			'payment_methods_id'		=> $payment_methods_id
		];
		// var_dump($transaction);die;
		$this->db->insert('transaction', $transaction);

		foreach($_POST['product_id'] as $key => $value) {
			$product_id = $this->input->post('product_id')[$key];
			$sold =  $this->input->post('qty')[$key];
			$detail_transaction = [
				'trans_code' 	=> $code_trans,
				'product_id' 	=> $product_id,
				'qty'			=> $sold,
				'price'			=> $this->input->post('price')[$key],
				'sub_totally'	=> $this->input->post('sub_totally')[$key]
			];
			$this->db->insert('detail_transaction', $detail_transaction);
			$this->db->query("UPDATE `product` SET `sold`=sold+'$sold' WHERE id='$product_id'");
			$this->db->query("UPDATE `product` SET `stock`=stock-'$sold' WHERE id='$product_id'");
		}
		$this->db->query("UPDATE `payment_methods` SET `balance`=balance+'$totally_payment' WHERE id='$payment_methods_id'");
		
		$this->session->set_flashdata('success_insert', true);
		redirect('Admin/transaction');
	}

	public function detail_transaction($code)
	{
		$var['title'] = 'Detail Transaction';
		$var['value'] = $this->models->get_detailTransaction($code);
		$var['product_trans'] = $this->models->get_productTrans($code);
		$this->load->view('admin/menu/detail_transaction', $var);
	}

	public function print_invoice($code)
	{
		$var['title'] = 'Print Invoice';
		$var['value'] = $this->models->get_detailTransaction($code);
		$var['product_trans'] = $this->models->get_productTrans($code);
		$this->load->view('admin/menu/print_invoice', $var);
	}

	public function delete_transaction($id)
	{
		$query_trans = $this->db->get_where('transaction', ['id' => $id])->row();
		$query_details = $this->db->get_where('detail_transaction', ['trans_code' => $query_trans->code_trans])->result();

		if($query_trans) {
			$totally_payment = $query_trans->totally_payment;
			$payment_methods_id = $query_trans->payment_methods_id;
			$this->db->query("UPDATE `payment_methods` SET `balance`=balance-'$totally_payment' WHERE id='$payment_methods_id'");	
		}
		
		if($query_details) {
			foreach($query_details as $value) {
				$sold = $value->qty;
				$product_id = $value->product_id;
				$this->db->query("UPDATE `product` SET `sold`=sold-'$sold' WHERE id='$product_id'");
				$this->db->query("UPDATE `product` SET `stock`=stock+'$sold' WHERE id='$product_id'");
			}
		}
		
		$this->db->delete('transaction', ['id' => $id]);
		$this->db->where_in('trans_code', $query_trans->code_trans)->delete('detail_transaction');
		$this->session->set_flashdata('success_delete', true);
		redirect('Admin/transaction');
	}

	public function article()
	{
		$var['title'] = 'Article';
		$var['article'] = $this->models->get_article();
		$this->load->view('admin/menu/article', $var);
	}

	public function add_article()
	{
		$var['title'] = 'Add Article';
		$this->load->view('admin/menu/add_article', $var);
	}

	public function save_article()
	{
		$this->form_validation->set_rules('title', 'title', 'required|trim', ['required' => 'title is required']);
		$this->form_validation->set_rules('topic_article', 'topic_article', 'required|trim', ['required' => 'topic article is required']);
		$this->form_validation->set_rules('author', 'author', 'required|trim', ['required' => 'author is required']);
		$this->form_validation->set_rules('description', 'description', 'required|trim', ['required' => 'description is required']);
		if (empty($_FILES['images']['name']))
		{
			$this->form_validation->set_rules('images', 'Images', 'required', ['required' => 'images is required']);
		}

		if ($this->form_validation->run() == false) {
            $this->add_article();
        } else {
			$this->models->save_article();
			$this->session->set_flashdata('success_insert', true);
			redirect('Admin/article');
		}
	}

	public function edit_article($slug)
	{
		$var['title'] = 'Edit Article';
		$var['edit'] = $this->db->get_where('article', ['slug' => $slug])->row();
		$this->load->view('admin/menu/edit_article', $var);
	}

	public function update_article()
	{
		$slug = $this->input->post('slug');
		$this->form_validation->set_rules('title', 'title', 'required|trim', ['required' => 'title is required']);
		$this->form_validation->set_rules('topic_article', 'topic_article', 'required|trim', ['required' => 'topic article is required']);
		$this->form_validation->set_rules('author', 'author', 'required|trim', ['required' => 'author is required']);
		$this->form_validation->set_rules('description', 'description', 'required|trim', ['required' => 'description is required']);

		if ($this->form_validation->run() == false) {
            $this->add_article($slug);
        } else {
			$this->models->update_article();
			$this->session->set_flashdata('success_update', true);
			redirect('Admin/article');
		}
	}

	public function delete_article($id)
	{
		$this->delete_article_image($id);
		$this->db->delete('article', ['id' => $id]);
		$this->session->set_flashdata('success_delete', true);
		redirect('Admin/article');
	}

	public function delete_article_image($id)
	{
		$images = $this->db->get_where('article', ['id' => $id])->row();
        if ($images->images != "01.jpg") {
            $filename = explode(".", $images->images)[0];
            return array_map('unlink', glob(FCPATH . "/layouts/images/article/$filename.*"));
        }
	}

	public function transaction_report()
	{
		$var['title'] = 'Transaction Report';
		$start_date = $this->input->get('start_date');
		$end_date = $this->input->get('end_date');
		$var['start_date'] = $start_date;
		$var['end_date'] = $end_date;
		if(empty($start_date) && empty($end_date)) {
			$var['transaction'] = $this->models->get_transaction();
			$var['transaction_amount'] = $this->models->get_transactionAmount();
			$var['transaction_total'] = $this->models->get_transactionTotal();
			$var['transaction_discount'] = $this->models->get_transactionDiscount();
			$var['transaction_payment'] = $this->models->get_transactionPayment();
		} else {
			$var['transaction'] = $this->models->get_transaction2($start_date, $end_date);
			$var['transaction_amount'] = $this->models->get_transactionAmount2($start_date, $end_date);
			$var['transaction_total'] = $this->models->get_transactionTotal2($start_date, $end_date);
			$var['transaction_discount'] = $this->models->get_transactionDiscount2($start_date, $end_date);
			$var['transaction_payment'] = $this->models->get_transactionPayment2($start_date, $end_date);
		}
		// var_dump($var['transaction_total']);die;
		$this->load->view('admin/report/transaction_report', $var);
	}
	
	public function print_transactionreport_pdf()
	{
		$start_date = $this->input->get('start_date');
		$end_date = $this->input->get('end_date');
		$var['start_date'] = $start_date;
		$var['end_date'] = $end_date;
		if(empty($start_date) && empty($end_date)) {
			$var['transaction'] = $this->models->get_transaction();
			$var['transaction_amount'] = $this->models->get_transactionAmount();
			$var['transaction_total'] = $this->models->get_transactionTotal();
			$var['transaction_discount'] = $this->models->get_transactionDiscount();
			$var['transaction_payment'] = $this->models->get_transactionPayment();
		} else {
			$var['transaction'] = $this->models->get_transaction2($start_date, $end_date);
			$var['transaction_amount'] = $this->models->get_transactionAmount2($start_date, $end_date);
			$var['transaction_total'] = $this->models->get_transactionTotal2($start_date, $end_date);
			$var['transaction_discount'] = $this->models->get_transactionDiscount2($start_date, $end_date);
			$var['transaction_payment'] = $this->models->get_transactionPayment2($start_date, $end_date);
		}

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "laporan-transaksi.pdf";
		$this->pdf->load_view('admin/report/pdf_transaction_report', $var);
	}

	public function print_transactionreport_excel()
	{
		$start_date = $this->input->get('start_date');
		$end_date = $this->input->get('end_date');
		$th = [
			'font' => [
				'color' => [
					'rgb' => 'FFFFFF'
				],
				'bold' => true,
				'size'=> 11
			],
			'fill' => [
				'fillType' => Fill::FILL_SOLID,
				'startColor' => [
					'rgb' => '0077b6'
				],
			],
		];

		$td1 = [
			'fill' => [
				'fillType' => Fill::FILL_SOLID,
				'startColor' => [
					'rgb' => 'caf0f8'
				],
			],
		];

		$td2 = [
			'fill' => [
				'fillType' => Fill::FILL_SOLID,
				'startColor' => [
					'rgb' => '90e0ef'
				],
			],
		];

		$td3 = [
			'fill' => [
				'fillType' => Fill::FILL_SOLID,
				'startColor' => [
					'rgb' => 'ffd60a'
				],
			],
		];

		if(empty($start_date) && empty($end_date)) {
			$periode = 'All';
		} else {
			$periode = $start_date .'-'. $end_date;
		}

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		
		//title
		$sheet->setCellValue('A1', 'Transaction Report');
		$sheet->mergeCells('A1:I1');
		$sheet->getStyle('A1')->getFont()->setSize('20');
		$sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

		//width column
		$sheet->getColumnDimension('A')->setWidth(8);
		$sheet->getColumnDimension('B')->setWidth(31);
		$sheet->getColumnDimension('C')->setWidth(25);
		$sheet->getColumnDimension('D')->setWidth(12);
		$sheet->getColumnDimension('E')->setWidth(9);
		$sheet->getColumnDimension('F')->setWidth(16);
		$sheet->getColumnDimension('G')->setWidth(11);
		$sheet->getColumnDimension('H')->setWidth(15);
		$sheet->getColumnDimension('I')->setWidth(17);

		//period
		$sheet->setCellValue('A2', 'Period');
		$sheet->setCellValue('B2', $periode);
		// $sheet->mergeCells('A2:B2');

		//title head
		$sheet->setCellValue('A3', 'No');
		$sheet->setCellValue('B3', 'Code');
		$sheet->setCellValue('C3', 'Customer');
		$sheet->setCellValue('D3', 'Date');
		$sheet->setCellValue('E3', 'Total Qty');
		$sheet->setCellValue('F3', 'Total Transaction');
		$sheet->setCellValue('G3', 'Discount');
		$sheet->setCellValue('H3', 'Total Payment');
		$sheet->setCellValue('I3', 'Payment Methods');
		$sheet->getStyle('A3:I3')->applyFromArray($th);

		if(empty($start_date) && empty($end_date)) {
			$transaction = $this->models->get_transaction();
			$transaction_amount = $this->models->get_transactionAmount();
			$transaction_total = $this->models->get_transactionTotal();
			$transaction_discount = $this->models->get_transactionDiscount();
			$transaction_payment = $this->models->get_transactionPayment();
		} else {
			$transaction = $this->models->get_transaction2($start_date, $end_date);
			$transaction_amount = $this->models->get_transactionAmount2($start_date, $end_date);
			$transaction_total = $this->models->get_transactionTotal2($start_date, $end_date);
			$transaction_discount = $this->models->get_transactionDiscount2($start_date, $end_date);
			$transaction_payment = $this->models->get_transactionPayment2($start_date, $end_date);
		}

		$no = 1;
		$row = 4;
		$total_row = 4;

		foreach($transaction as $value) {
			
			$sheet->setCellValue('A'. $row, $no++);
			$sheet->setCellValue('B'. $row, $value->code_trans);
			$sheet->setCellValue('C'. $row, $value->name_customer);
			$sheet->setCellValue('D'. $row, date('d-m-Y', strtotime($value->date_trans)));
			$sheet->setCellValue('E'. $row, $value->totally_qty);
			$sheet->setCellValue('F'. $row, $value->transaction_total);
			$sheet->setCellValue('G'. $row, $value->discount);
			$sheet->setCellValue('H'. $row, $value->totally_payment);
			$sheet->setCellValue('I'. $row, $value->payment_name);

			if( $row % 2 == 0) {
				$sheet->getStyle('A'. $row. ':I' . $row)->applyFromArray($td1);
			} else {
				$sheet->getStyle('A'. $row. ':I' . $row)->applyFromArray($td2);

			}

			$row++;

		}

		// var_dump($row);die;
		$row_trans_amount = $row + 1;
		$row_trans_total = $row + 2;
		$row_trans_disc = $row + 3;
		$row_trans_pay = $row + 4;
		$sheet->setCellValue('B'. $row_trans_amount, 'Transaction Amount');
		$sheet->setCellValue('F'. $row_trans_amount, $transaction_amount);
		$sheet->setCellValue('B'. $row_trans_total, 'Transaction Total');
		$sheet->setCellValue('F'. $row_trans_total, $transaction_total);
		$sheet->setCellValue('B'. $row_trans_disc, 'Transaction Discount');
		$sheet->setCellValue('F'. $row_trans_disc, $transaction_discount);
		$sheet->setCellValue('B'. $row_trans_pay, 'Transaction Payment');
		$sheet->setCellValue('F'. $row_trans_pay, $transaction_payment);
		$sheet->getStyle('B'. $row_trans_amount. ':F' . $row_trans_amount)->applyFromArray($td3);
		$sheet->getStyle('B'. $row_trans_total. ':F' . $row_trans_total)->applyFromArray($td3);
		$sheet->getStyle('B'. $row_trans_disc. ':F' . $row_trans_disc)->applyFromArray($td3);
		$sheet->getStyle('B'. $row_trans_pay. ':F' . $row_trans_pay)->applyFromArray($td3);

		$writer = new Xlsx($spreadsheet);
		$filename = 'laporan-transaksi';
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');

	}

	public function testimony()
	{
		$var['title'] = 'Testimony';
		$var['testimony'] = $this->models->get_testimony();
		$var['customer'] = $this->models->get_customer();
		$this->load->view('admin/menu/testimony', $var);
	}

	public function save_testimony()
	{
		var_dump('v');die;
		$this->models->save_testimony();
		$this->session->set_flashdata('success_insert', true);
		redirect('Admin/testimony');
	}

	public function update_testimony()
	{
		$this->models->update_testimony();
		$this->session->set_flashdata('success_update', true);
		redirect('Admin/testimony');
	}

	public function delete_testimony($id)
	{
		$query = $this->db->get_where('testimony', ['id' => $id])->row();
		if(!empty($query->image)) {
			$this->delete_testimony_image($id);
		}
		$this->db->delete('testimony', ['id' => $id]);
		$this->session->set_flashdata('success_delete', true);
		redirect('Admin/testimony');
	}

	public function delete_testimony_image($id)
	{
		$images = $this->db->get_where('testimony', ['id' => $id])->row();
        if ($images->images != "01.jpg") {
            $filename = explode(".", $images->images)[0];
            return array_map('unlink', glob(FCPATH . "/layouts/images/testimony/$filename.*"));
        }
	}

}
