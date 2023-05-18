<footer class="sticky-footer" style="background-color: #0077b6">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; 2023 - Website
              <b><a href="https://indrijunanda.gitlab.io/" target="_blank">Island Adventure Gear</a></b>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="<?= base_url() ?>layouts/admin/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>layouts/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>layouts/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?= base_url() ?>layouts/admin/js/ruang-admin.min.js"></script>
  <script src="<?= base_url() ?>layouts/admin/vendor/chart.js/Chart.min.js"></script>
  <script src="<?= base_url() ?>layouts/admin/js/demo/chart-area-demo.js"></script>
  <script src="<?= base_url() ?>layouts/js/sweetalert2-all.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> 
  <script src="<?= base_url() ?>layouts/admin/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>layouts/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
	<script src="<?= base_url() ?>layouts/js/summernote/js/summernote.min.js"></script>
	<!-- Summernote init -->
	<script src="<?= base_url() ?>layouts/js/plugin/summernote-init.js"></script>
	<script src="<?= base_url() ?>layouts/js/sprintf.js"></script>

  <!-- Page level custom scripts -->
  	<script>
		$(document).ready(function () {
			$('#dataTable').DataTable(); // ID From dataTable 
			$('#dataTableHover').DataTable({
				scrollX: true,
			}); // ID From dataTable with Hover
		});
	</script>
</body>

</html>
