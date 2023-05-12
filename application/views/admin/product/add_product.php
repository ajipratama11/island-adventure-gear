<?php $this->load->view('partials/header.php'); ?>

<div class="container-fluid" id="container-wrapper">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-primary fw-bold"><?= $title ?></h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Admin</a></li>
			<li class="breadcrumb-item active" aria-current="page">Product</li>
			<li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
		</ol>
	</div>
	<div class="row">
		<div class="col-lg-6 mb-3">
			<a href="<?= base_url('Admin/product') ?>" class="btn btn-primary btn-sm col-md-3"><i class="fa fa-arrow-alt-circle-left"></i> Kembali</a>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Form Add Product</h6>
				</div>
				<div class="card-body">
                	<form action="<?= base_url('Admin/save_product') ?>" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="exampleInputEmail1">Product Name</label>
							<input type="text" class="form-control" name="product_name" id="product_name" value="<?= set_value('product_name') ?>" placeholder="Enter Product Name" onkeyup="createTextSlug()">
							<!-- <?= form_error('', '<small class="text-danger pl-3">', '</small>'); ?> -->
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Slug</label>
							<input type="text" class="form-control" name="slug" id="slug" value="<?= set_value('slug') ?>" placeholder="" readonly>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Stock</label>
							<input type="number" class="form-control" name="stock" value="<?= set_value('stock') ?>" placeholder="Enter Stock">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Price</label>
							<input type="text" class="form-control" name="price" value="<?= set_value('price') ?>" id="currency-field" data-type="currency" placeholder="Enter Price">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Description</label>
							<textarea class="summernote" name="description"><?= set_value('description') ?></textarea>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Category</label>
							<select id="category_id" class="form-control" style="width: 100%" name="category_id">
								<option></option>
								<?php foreach($category as $value) { ?>
									<option value="<?= $value->id ?>"><?= $value->name_category ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Category</label>
							<select id="subcategory_id" class="form-control" style="width: 100%" name="subcategory_id">
								<option></option>
							</select>
							<!-- <img src="<?= base_url() ?>assets/image/loading.gif" width="35" id="load1" style="display:none;" /> -->
						</div>
						<div class="form-group">
							<label>Image</label>
							<input type="file" name="image" class="form-control" accept="image/*" id="imgInp" placeholder="Full Name.">
							<p>maximum size 3MB</p>
							<img id="blah" class="mt-2 mb-3" height="200" width="200" src="#" alt="preview photo" />
						</div>
						<hr>
						<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
						<button type="reset" class="btn btn-warning"><i class="fa fa-refresh"></i> Reset</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('partials/footer.php'); ?>

<script>

		function createTextSlug()
		{
			var product_name = document.getElementById("product_name").value;
			document.getElementById("slug").value = generateSlug(product_name);
		}

		function generateSlug(text)
		{
			return text.toString().toLowerCase()
				.replace(/^-+/, '')
				.replace(/-+$/, '')
				.replace(/\s+/g, '-')
				.replace(/\-\-+/g, '-')
				.replace(/[^\w\-]+/g, '');
		}

	$(document).ready(function() {

		$('#category_id').select2({
			placeholder: 'Choose Category',
		});

		$('#subcategory_id').select2({
			placeholder: 'Choose Sub Category',
		});

		imgInp.onchange = evt => {
			const [file] = imgInp.files
			if (file) {
				blah.src = URL.createObjectURL(file)
			}
		}

		$("#category_id").change(function() {
            let category_id = $(this).val();
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "<?= base_url('Admin/sub_categoryAjax') ?>",
                data: "category_id=" + category_id,
                success: function(msg) {
                    $("select#subcategory_id").html(msg);
                    // $("img#load1").hide();
                    // getAjaxKota();
                }
            });
        });

	})

	$("input[data-type='currency']").on({
        keyup: function() {
            formatCurrency($(this));
        },
        blur: function() {
            formatCurrency($(this), "blur");
        }
    });


    function formatNumber(n) {
        // format number 1000000 to 1,234,567
        return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    }


    function formatCurrency(input, blur) {
        // appends $ to value, validates decimal side
        // and puts cursor back in right position.

        // get input value
        var input_val = input.val();

        // don't validate empty input
        if (input_val === "") {
            return;
        }

        // original length
        var original_len = input_val.length;

        // initial caret position 
        var caret_pos = input.prop("selectionStart");

        // check for decimal
        if (input_val.indexOf(".") >= 0) {
            var decimal_pos = input_val.indexOf(".");
            left_side = formatNumber(left_side);

            // validate right side
            right_side = formatNumber(right_side);
            input_val = left_side;

        } else {
            input_val = formatNumber(input_val);
        }

        // send updated string to input
        input.val(input_val);

        // put caret back in the right position
        var updated_len = input_val.length;
        caret_pos = updated_len - original_len + caret_pos;
        input[0].setSelectionRange(caret_pos, caret_pos);
    }
</script>
