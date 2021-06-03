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
                                <h2 class="text-white pb-2 fw-bold">layanan Page </h2>
                                <!-- <h5 class="text-white op-7 mb-2">Officialsite Project</h5> -->
                            </div>
                            <div class="ml-md-auto py-2 py-md-0">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-inner mt--5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Tables of layanan</h4>
                                    <button class="btn btn-primary btn-round ml-auto" onclick="add_data()">
                                        <i class="fa fa-plus"></i>
                                        Add Data
                                    </button>
                                    <!-- data-toggle="modal" data-target="#modal-create" id="btn_create" -->
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="show_table" class="display table table-striped table-hover" style="width:100%">
                                        <!-- class="display table table-striped table-hover" -->
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Link</th>
                                                <th>Description</th>
                                                <th>Image</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <!-- Modal -->
        <div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header no-bd">
                        <h5 class="modal-title">
                            <span class="fw-mediumbold">Create New Data</span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="form_create">
                            <input type="hidden" class="form-control" id="id" name="id">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="title">Kode apps</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="App Name">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="link">Link</label>
                                        <input type="text" class="form-control" id="link" name="link" placeholder="Link">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description" placeholder="Description"></textarea>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="image">Photo</label>
                                        <input type="file" class="form-control dropify" id="image" name="image">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer no-bd">
                        <button type="button" class="btn btn-sm btn-primary" id="btn_save" onclick="ajax_save()">Save</button>
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


            <!-- load footer -->
            <?php $this->load->view('layout/admin/footer') ?>
        </div>
    </div>
<script type="text/javascript">
    var table;
    var save_method; //for save method string
    var base_url = '<?php echo base_url();?>';

    
$(document).ready(function() {

        //datatables
        table = $('#show_table').DataTable({ 

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('backend/layanan/datatables')?>",
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

        $("input").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("textarea").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("select").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
    
}); 
    // dokumen ready function

    // ckeditor for content
    $('textarea.texteditor').ckeditor();
    
    $(function () {
                CKEDITOR.replace('ckeditor',{
                    filebrowserImageBrowseUrl : '<?php echo base_url('assets/kcfinder/browse.php');?>',
                    height: '400px'             
                });
    });
    // ckeditor for content

    $('.dropify').dropify({
            messages: {
                default: 'Drag or drop for choose image',
                replace: 'change image',
                remove:  'delete image',
                error:   'error'
            }
    });

    function reload_table()
    {
        table.ajax.reload(null,false); //reload datatable ajax 
    }

    function add_data()
    {
        save_method = 'add';
        $('#form_create')[0].reset(); // reset form on modals
        
        $('#modal-create').modal('show'); // show bootstrap modal
        $('.modal-title').text('Add Data'); // Set Title to Bootstrap modal title
        
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        // $('#photo-preview').hide(); // hide photo preview modal
        // $('#label-photo').text('Upload Photo');
    }

    function ajax_save()
    {
        $('#btn_save').text('saving...'); //change button text
        $('#btn_save').attr('disabled',true); //set button disable 
        var url;
     
        if(save_method == 'add') {
            url = "<?php echo site_url('backend/layanan/store')?>";
        } else {
            url = "<?php echo site_url('backend/layanan/update')?>";
        }
     
        // ajax adding data to database
        var formData = new FormData($('#form_create')[0]);
        // formData.append('content', CKEDITOR.instances['content'].getData());

        $.ajax({
            url : url,
            type: "POST",
            data: formData, //$('#form_blog').serialize(),
            contentType : false, 
            processData : false,
            dataType: "JSON",
            success: function(data)
            {
     
                if(data.status) //if success close modal and reload ajax table
                {
                    iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                        title: 'Data Successfully Added',
                        message: "<?php echo $this->session->flashdata('success'); ?>",
                        position: 'topRight'
                        
                    });
                    $('#modal-create').modal('hide');
                    reload_table();
                }else{
                    
                    for (var i = 0; i < data.inputerror.length; i++) 
                    {
                        $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                        $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                
                }
                $('#btn_save').text('Save'); //change button text
                $('#btn_save').attr('disabled',false); //set button enable 
     
     
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                iziToast.error({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                        title: 'Error Adding / Update Data',
                        message: "<?php echo $this->session->flashdata('success'); ?>",
                        position: 'topRight'
                        
                });
                // alert('Error adding / update data');
                $('#btn_save').text('Save'); //change button text
                $('#btn_save').attr('disabled',false); //set button enable 
     
            }
        });
    }

    function ajax_edit(id)
    {
        save_method = 'update';
        $('#form_create')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        
        $.ajax({
            url : "<?php echo site_url('backend/layanan/edit')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('[name="id"]').val(data.id);
                $('[name="title"]').val(data.title);
                $('[name="link"]').val(data.link);
                $('[name="description"]').val(data.description);
                
                $('#modal-create').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Data'); // Set title to Bootstrap modal title
                
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                iziToast.error({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                        title: 'Error get data from ajax',
                        message: "<?php echo $this->session->flashdata('success'); ?>",
                        position: 'topRight'
                        
                });
                // alert('Error get data from ajax');
            }
        });
    }

    

    function ajax_delete(id)
    {

        iziToast.question({
            timeout: 20000,
            close: false,
            overlay: true,
            displayMode: 'once',
            id: 'question',
            zindex: 999,
            title: 'Hey',
            message: 'Are you sure about that?',
            position: 'center',
            buttons: [
                ['<button><b>YES</b></button>', function (instance, toast) {
                    $.ajax({
                        url : "<?php echo site_url('backend/layanan/destroy')?>/"+id,
                        type: "POST",
                        dataType: "JSON",
                        success: function(data)
                        {
                            //if success reload ajax table

                            iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                                    title: 'Data Successfully Deleted',
                                    message: "<?php echo $this->session->flashdata('success'); ?>",
                                    position: 'topRight'
                                    
                            });
                            $('#modal-create').modal('hide');
                            reload_table();
                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            iziToast.warning({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                                    title: 'Error deleting data',
                                    message: "<?php echo $this->session->flashdata('success'); ?>",
                                    position: 'topRight'
                                    
                            });
                            // alert('Error deleting data');
                        }
                    });

                    instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
         
                }, true],
                ['<button>NO</button>', function (instance, toast) {
         
                    instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
         
                }],
            ],
            onClosing: function(instance, toast, closedBy){
                console.info('Closing | closedBy: ' + closedBy);
            },
            onClosed: function(instance, toast, closedBy){
                console.info('Closed | closedBy: ' + closedBy);
            }
        });
        // if(confirm('Are you sure delete this data?'))
        // {
        //     // ajax delete data to database
            // $.ajax({
            //     url : "<?php echo site_url('backend/pegawai/pegawai/destroy')?>/"+id,
            //     type: "POST",
            //     dataType: "JSON",
            //     success: function(data)
            //     {
            //         //if success reload ajax table
            //         $('#modal-create').modal('hide');
            //         reload_table();
            //     },
            //     error: function (jqXHR, textStatus, errorThrown)
            //     {
            //         alert('Error deleting data');
            //     }
            // });
     
        // }
    }
</script>
</body>
</html>
