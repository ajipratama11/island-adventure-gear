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
		$query = $this->db->select('product.*, category.name_category')
						->from('product')
						->join('category', 'product.category_id = category.id')
						// ->join('sub_category', 'product.subcategory_id = sub_category.id')
						->order_by('product.id', 'desc')
						->get()->result();
		return $query;
	}

	public function save_product()
	{
		$name = [strtoupper($this->input->post('product_name'))];
		$pecahan_nama = explode(" ", $name[0]);
		$kata = explode(" ", $name[0])[0];

		$max_code = $this->db->query("SELECT max(product_code) as code FROM product order by id desc")->row();
		// $query = $this->db->select('product_name')->from('product')->order_by('id', 'desc')->get()->row();
		// $product_nameLast = [strtoupper($query->product_name)];
		// $kataLast = explode(" ", $product_nameLast[0])[0];
		// $pecahKata = str_split($kataLast);
		// $jml_kataLast = count($pecahKata);

		$cek_code = $max_code->code;
		$urutan = (int) substr($cek_code, 7, 3);
		$urutan++;
		$product_code = 'PRODUCT' . sprintf("%03s", $urutan);
		// var_dump($product_code);die;
		
		$post = $this->input->post();
		$this->product_name = $post['product_name'];
		$this->product_code = $product_code;
		$this->slug = $post['slug'];
		$this->stock = $post['stock'];
		$this->description = $post['description'];
		$this->price = str_replace(",","", $post['price']);
		$this->category_id = $post['category_id'];
		if(!empty($post['subcategory_id'])) {
			$this->subcategory_id = $post['subcategory_id'];
		}
		$this->image = $this->upload_imageProduct();
		$this->sold = '0';
		$this->db->insert('product', $this);
	}

	public function update_product()
	{
		$post = $this->input->post();
		$id = $post['id'];
		$this->product_name = $post['product_name'];
		$this->slug = $post['slug'];
		$this->stock = $post['stock'];
		$this->description = $post['description'];
		$this->price = str_replace(",","", $post['price']);
		$this->category_id = $post['category_id'];
		if(!empty($post['subcategory_id'])) {
			$this->subcategory_id = $post['subcategory_id'];
		}
		if (!empty($_FILES["image"]["name"])) {
            $this->image = $this->upload_imageCategory();
        } else {
            $this->image = $post["old_image"];
        }
		$this->db->update('product', $this, ['id' => $id]);
	}

	private function upload_imageProduct()
	{
		$config['upload_path']          = './layouts/images/product/';
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

	public function get_detailProduct($slug)
	{
		$info = $this->db->get_where('product', ['slug' => $slug])->row();

		if(empty($info->subcategory_id)) {
			$query = $this->db->select('product.*, category.name_category')
							->from('product')
							->join('category', 'product.category_id = category.id')
							// ->join('sub_category', 'product.subcategory_id = sub_category.id')
							->where('product.slug', $slug)
							->order_by('product.id', 'desc')
							->get()->row();
		} else {
			$query = $this->db->select('product.*, category.name_category')
							->from('product')
							->join('category', 'product.category_id = category.id')
							->join('sub_category', 'product.subcategory_id = sub_category.id')
							->where('product.slug', $slug)
							->order_by('product.id', 'desc')
							->get()->row();
		}
		return $query;
	}

	public function get_productPhoto()
	{
		$query = $this->db->select('product_photo.*, product.product_name')
						->from('product_photo')
						->join('product', 'product.id = product_photo.product_id')
						->order_by('product_photo.id', 'desc')
						->get()->result();
		return $query;
	}

	public function save_productPhoto()
	{
		$this->product_id = $this->input->post('product_id');
		$this->photo = $this->upload_photoProduct();
		$this->db->insert('product_photo', $this);
	}

	public function update_productPhoto()
	{
		$id = $this->input->post('id');
		$this->product_id = $this->input->post('product_id');
		$this->photo = $this->upload_photoProduct();
		$this->db->update('product_photo', $this, ['id' => $id]);
	}

	private function upload_photoProduct()
	{
		$config['upload_path']          = './layouts/images/product_photo/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $nama_lengkap = $_FILES['photo']['name'];
        $config['file_name']            = $nama_lengkap;
        $config['overwrite']            = true;
        $config['max_size']             = 3024;

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('photo')) {
            return $this->upload->data("file_name");
        }
        print_r($this->upload->display_errors());
	}

	public function get_transaction()
	{
		$query = $this->db->select('transaction.*, payment_methods.payment_name')
						->from('transaction')
						->join('payment_methods', 'transaction.payment_methods_id = payment_methods.id')
						->order_by('transaction.id', 'desc')
						->get()->result();
		return $query;
	}

	public function max_transCode()
	{
		return $this->db->query('SELECT code_trans AS maxs FROM transaction order by code_trans desc limit 1');
	}

	// var $barang = 'barang';
    var $column_orderid = array('a.id', 'a.product_name', 'a.price', 'a.image', null); //set column field database for datatable orderable
    var $column_searchid = array('a.id', 'a.product_name', 'a.price', 'a.image'); //set column field database for datatable searchable just title , author , category are searchable
    var $orderid = array('a.id' => 'asc'); // default order

    public function get_datatablesid()
    {
        $this->_get_datatables_queryid();
        if ($_REQUEST['length'] != -1) {
            $this->db->limit($_REQUEST['length'], $_REQUEST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    private function _get_datatables_queryid()
    {
        $this->db->select('*');
        $this->db->from("product a");
		$this->db->where("stock !=", 0);
        $i = 0;


        foreach ($this->column_searchid as $item) {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    // $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_searchid) - 1 == $i); //last loop
                // $this->db->group_end(); //close bracket


            }

            $i++;
        }

        if (isset($_REQUEST['order'])) {
            $this->db->order_by($this->column_orderid[$_REQUEST['order']['0']['column']], $_REQUEST['order']['0']['dir']);
        } else if (isset($this->orderid)) {
            $order = $this->orderid;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function count_filteredid()
    {
        $this->_get_datatables_queryid();
        //$this->db->where('orde_sungai',$id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_allid()
    {
        $this->db->from('product');
        return $this->db->count_all_results();
    }

	public function get_detailTransaction($code)
	{
		$query = $this->db->select('transaction.*, payment_methods.payment_name')
						->from('transaction')
						->join('payment_methods', 'transaction.payment_methods_id = payment_methods.id')
						->order_by('transaction.date_trans', 'desc')
						->where('transaction.code_trans', $code)
						->get()->row();
		return $query;
	}

	public function get_productTrans($code)
	{
		$query = $this->db->select('detail_transaction.*, product.product_name')
						->from('detail_transaction')
						->join('product', 'detail_transaction.product_id = product.id')
						->where('detail_transaction.trans_code', $code)
						->get()->result();
		return $query;
	}

	public function get_article()
	{
		return $this->db->get('article')->result();
	}

	public function save_article()
	{
		date_default_timezone_set('Asia/Jakarta');
		$post = $this->input->post();
		$this->title = $post['title'];
		$this->slug = $post['slug'];
		$this->topic_article = $post['topic_article'];
		$this->date = date('Y-m-d');
		$this->description = $post['description'];
		$this->author = $post['author'];
		$this->images = $this->upload_imageArticle();
		$this->db->insert('article', $this);
	}

	public function update_article()
	{
		date_default_timezone_set('Asia/Jakarta');
		$post = $this->input->post();
		$id = $post['id'];
		$this->title = $post['title'];
		$this->slug = $post['slug'];
		$this->topic_article = $post['topic_article'];
		$this->date = date('Y-m-d');
		$this->description = $post['description'];
		$this->author = $post['author'];
		if (!empty($_FILES["images"]["name"])) {
            $this->images = $this->upload_imageArticle();
        } else {
            $this->images = $post["old_image"];
        }
		$this->db->update('article', $this, ['id' => $id]);
	}

	private function upload_imageArticle()
	{
		$config['upload_path']          = './layouts/images/article/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $nama_lengkap = $_FILES['images']['name'];
        $config['file_name']            = $nama_lengkap;
        $config['overwrite']            = true;
        $config['max_size']             = 3024;

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('images')) {
            return $this->upload->data("file_name");
        }
        print_r($this->upload->display_errors());
	}

	public function get_transactionAmount()
	{
		$query = $this->db->from('transaction')->count_all_results();
		return $query;
	}

	public function get_transactionAmount2($start_date, $end_date)
	{
		$query = $this->db->from('transaction')
						->where('date_trans >=', $start_date)
						->where('date_trans <=', $end_date)
						->count_all_results();
		return $query;
	}

	public function get_transactionTotal()
	{
		$query = $this->db->select('SUM(transaction_total) as total_transaction')
						->get('transaction')->row()->total_transaction;
		return $query;
	}

	public function get_transactionTotal2($start_date, $end_date)
	{
		$query = $this->db->select('SUM(transaction_total) as total_transaction')
						->where('date_trans >=', $start_date)
						->where('date_trans <=', $end_date)
						->get('transaction')->row()->total_transaction;
		return $query;
	}

	public function get_transactionDiscount()
	{
		$query = $this->db->select('SUM(discount) as discount')
						->get('transaction')->row()->discount;
		return $query;
	}

	public function get_transactionDiscount2($start_date, $end_date)
	{
		$query = $this->db->select('SUM(discount) as discount')
						->where('date_trans >=', $start_date)
						->where('date_trans <=', $end_date)
						->get('transaction')->row()->discount;
		return $query;
	}

	public function get_transactionPayment()
	{
		$query = $this->db->select('SUM(totally_payment) as totally_payment')
						->get('transaction')->row()->totally_payment;
		return $query;
	}

	public function get_transactionPayment2($start_date, $end_date)
	{
		$query = $this->db->select('SUM(totally_payment) as totally_payment')
						->where('date_trans >=', $start_date)
						->where('date_trans <=', $end_date)
						->get('transaction')->row()->totally_payment;
		return $query;
	}

	public function get_transaction2($start_date, $end_date)
	{
		$query = $this->db->select('transaction.*, payment_methods.payment_name')
						->from('transaction')
						->join('payment_methods', 'transaction.payment_methods_id = payment_methods.id')
						->where('date_trans >=', $start_date)
						->where('date_trans <=', $end_date)
						->order_by('transaction.id', 'desc')
						->get()->result();
		return $query;
	}

	public function get_productAmount()
	{
		$query = $this->db->from('product')->count_all_results();
		return $query;
	}

	public function get_customerAmount()
	{
		$query = $this->db->distinct()->select('name_customer')->from('transaction')->count_all_results();
		return $query;
	}

	public function grafik_pengunjung()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tahun = date('Y');
        $bc = $this->db->query("
        SELECT
            ifnull((SELECT sum(transaction_total) FROM (transaction)WHERE((Month(date_trans)=01)AND (YEAR(date_trans)='$tahun'))),0) AS `Januari`,
            ifnull((SELECT sum(transaction_total) FROM (transaction)WHERE((Month(date_trans)=02)AND (YEAR(date_trans)='$tahun'))),0) AS `Februari`,
            ifnull((SELECT sum(transaction_total) FROM (transaction)WHERE((Month(date_trans)=03)AND (YEAR(date_trans)='$tahun'))),0) AS `Maret`,
            ifnull((SELECT sum(transaction_total) FROM (transaction)WHERE((Month(date_trans)=04)AND (YEAR(date_trans)='$tahun'))),0) AS `April`,
            ifnull((SELECT sum(transaction_total) FROM (transaction)WHERE((Month(date_trans)=05)AND (YEAR(date_trans)='$tahun'))),0) AS `Mei`,
            ifnull((SELECT sum(transaction_total) FROM (transaction)WHERE((Month(date_trans)=06)AND (YEAR(date_trans)='$tahun'))),0) AS `Juni`,
            ifnull((SELECT sum(transaction_total) FROM (transaction)WHERE((Month(date_trans)=07)AND (YEAR(date_trans)='$tahun'))),0) AS `Juli`,
            ifnull((SELECT sum(transaction_total) FROM (transaction)WHERE((Month(date_trans)=08)AND (YEAR(date_trans)='$tahun'))),0) AS `Agustus`,
            ifnull((SELECT sum(transaction_total) FROM (transaction)WHERE((Month(date_trans)=09)AND (YEAR(date_trans)='$tahun'))),0) AS `September`,
            ifnull((SELECT sum(transaction_total) FROM (transaction)WHERE((Month(date_trans)=10)AND (YEAR(date_trans)='$tahun'))),0) AS `Oktober`,
            ifnull((SELECT sum(transaction_total) FROM (transaction)WHERE((Month(date_trans)=11)AND (YEAR(date_trans)='$tahun'))),0) AS `November`,
            ifnull((SELECT sum(transaction_total) FROM (transaction)WHERE((Month(date_trans)=12)AND (YEAR(date_trans)='$tahun'))),0) AS `Desember`
            from transaction GROUP BY YEAR(date_trans) 
        ");
        return $bc;
    }

    public function filter_grafik_pengunjung()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tahun = $this->input->get('tahun');
        $bc = $this->db->query("
        SELECT
            ifnull((SELECT sum(transaction_total) FROM (transaction)WHERE((Month(date_trans)=01)AND (YEAR(date_trans)='$tahun'))),0) AS `Januari`,
            ifnull((SELECT sum(transaction_total) FROM (transaction)WHERE((Month(date_trans)=02)AND (YEAR(date_trans)='$tahun'))),0) AS `Februari`,
            ifnull((SELECT sum(transaction_total) FROM (transaction)WHERE((Month(date_trans)=03)AND (YEAR(date_trans)='$tahun'))),0) AS `Maret`,
            ifnull((SELECT sum(transaction_total) FROM (transaction)WHERE((Month(date_trans)=04)AND (YEAR(date_trans)='$tahun'))),0) AS `April`,
            ifnull((SELECT sum(transaction_total) FROM (transaction)WHERE((Month(date_trans)=05)AND (YEAR(date_trans)='$tahun'))),0) AS `Mei`,
            ifnull((SELECT sum(transaction_total) FROM (transaction)WHERE((Month(date_trans)=06)AND (YEAR(date_trans)='$tahun'))),0) AS `Juni`,
            ifnull((SELECT sum(transaction_total) FROM (transaction)WHERE((Month(date_trans)=07)AND (YEAR(date_trans)='$tahun'))),0) AS `Juli`,
            ifnull((SELECT sum(transaction_total) FROM (transaction)WHERE((Month(date_trans)=08)AND (YEAR(date_trans)='$tahun'))),0) AS `Agustus`,
            ifnull((SELECT sum(transaction_total) FROM (transaction)WHERE((Month(date_trans)=09)AND (YEAR(date_trans)='$tahun'))),0) AS `September`,
            ifnull((SELECT sum(transaction_total) FROM (transaction)WHERE((Month(date_trans)=10)AND (YEAR(date_trans)='$tahun'))),0) AS `Oktober`,
            ifnull((SELECT sum(transaction_total) FROM (transaction)WHERE((Month(date_trans)=11)AND (YEAR(date_trans)='$tahun'))),0) AS `November`,
            ifnull((SELECT sum(transaction_total) FROM (transaction)WHERE((Month(date_trans)=12)AND (YEAR(date_trans)='$tahun'))),0) AS `Desember`
            from transaction GROUP BY YEAR(date_trans) 
        ");
        return $bc;
    }

	public function get_productHome()
	{
		$query = $this->db->query("SELECT * FROM product ORDER BY sold DESC limit 3")->result();
		return $query;
	}

	public function get_testimony()
	{
		return $this->db->order_by('id', 'desc')->get('testimony')->result();
	}

	public function get_customer()
	{
		$query = $this->db->distinct()->select('name_customer')->from('transaction')->get()->result();
		return $query;
	}

	public function save_testimony()
	{
		$post = $this->input->post();
		$this->customer = $post['customer'];
		$this->content_testimony = $post['content_testimony'];
		$this->image = $this->upload_imageTesti();
		$this->db->insert('testimony', $this);
	}

	public function update_testimony()
	{
		$post = $this->input->post();
		$id = $post['id'];
		$this->customer = $post['customer'];
		$this->content_testimony = $post['content_testimony'];
		if(!empty($post['image']) || !empty($post['old_image']))
		{
			if (!empty($_FILES["image"]["name"])) {
				$this->image = $this->upload_imageTesti();
			} else {
				$this->image = $post["old_image"];
			}
		}
		$this->db->update('testimony', $this, ['id' => $id]);
	}

	private function upload_imageTesti()
	{
		$config['upload_path']          = './layouts/images/article/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $nama_lengkap = $_FILES['images']['name'];
        $config['file_name']            = $nama_lengkap;
        $config['overwrite']            = true;
        $config['max_size']             = 3024;

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('images')) {
            return $this->upload->data("file_name");
        }
        print_r($this->upload->display_errors());
	}

	public function get_user_subCategory($category)
	{
		$query = $this->db->select('sub_category.*, category.name_category')
					->from('sub_category')
					->join('category', 'sub_category.category_id = category.id')
					->where('sub_category.category_id', $category)
					->order_by('id', 'desc')
					->get()->result();
		return $query;
	}

	public function get_userProduct($category)
	{
		$query = $this->db->select('product.*, category.name_category')
						->from('product')
						->join('category', 'product.category_id = category.id')
						->where('product.category_id', $category)
						->order_by('product.id', 'desc')
						->get()->result();
		return $query;
	}

	public function get_productPhoto2($id)
	{
		return $this->db->get_where('product_photo', ['product_id' => $id])->result();
	}

	public function get_cart($ip)
	{
		$query = $this->db->select('cart.*, product.product_name, product.price, product.price, product.image')
						->from('cart')
						->join('product', 'cart.product_id = product.id')
						->where('cart.ip_address', $ip)
						->order_by('cart.id', 'desc')
						->get()->result();
		return $query;
	}

	
	public function get_product_by_id($id)
	{
		$query = $this->db->select('cart.*, product.product_name, product.price, product.price, product.image')
						->from('cart')
						->join('product', 'cart.product_id = product.id')
						->where('cart.id', $id)
						->order_by('cart.id', 'desc')
						->get()->result();
		return $query;
	}
}
