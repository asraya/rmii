<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('layout/admin/header') ?>
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Navbar Header -->
			<?php $this->load->view('layout/admin/navbar') ?>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<?php $this->load->view('layout/admin/sidebar') ?>
		<!-- End Sidebar -->
        <div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Dashboard</h2>
								<h5 class="text-white op-7 mb-2">RMII-Officialsite</h5>
							</div>
							<div class="ml-md-auto py-2 py-md-0">
							</div>
						</div>
					</div>
				</div>
        <div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Overall statistics</div>
									<div class="card-category">Daily information about statistics in system</div>
									<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-1"></div>
											<h6 class="fw-bold mt-3 mb-0">New Users</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-2"></div>
											<h6 class="fw-bold mt-3 mb-0">Sales</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-3"></div>
											<h6 class="fw-bold mt-3 mb-0">Subscribers</h6>
										</div>
									</div>
								</div>
							</div>
                        </div>
		            </div>
                </div>
		    </div>




        	<!-- load footer -->
			<?php $this->load->view('layout/admin/footer') ?>
		</div>
	</div>
<script type="text/javascript">
$(document).ready(function(){

	$('.dropify').dropify({
            messages: {
                default: 'Drag or drop for choose image',
                replace: 'change image',
                remove:  'delete image',
                error:   'error'
            }
    });

	base_url = $('#base_url').val();

    dataTable = $('#shop_table').DataTable({ 

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('backend/shop/Shop/datatables')?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [
            { 
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
            },
            ],

    });

    $('#form_create').submit(function(e) {
        e.preventDefault();      
        var form = $('#form_create').serialize();
        var blob = $(".dropify-render").find('img').attr('src')
 
        form += '&photo='+btoa(blob)
        console.log(form)
        // return false;
        $.ajax({
            url: "<?php echo base_url('backend/shop/Shop/store/') ?>", 
            method: 'POST',
            data: form,
            success: function(data){
                data = JSON.parse(data);
                console.log(data);
                if (data.error) {
                    swal.fire(
                        'Opss...!',
                        data.error,
                        'warning'
                    )
                }
                if (data.success) {
                    swal.fire(
                        'Success!',
                        data.success,
                        // conn.send(JSON.stringify(abcd)),
                        'success'
                    )
                   dataTable.ajax.reload();
                }
                $('#form_create')[0].reset();
                $('#modal-create').modal('hide');
            }
        });
    });


});
</script>
</body>
</html>
