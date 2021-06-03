<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mst_blog extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('BlogModel');

    }

    public function index()
    {
        $this->load->view('backend/view_table_blog');
    }

    public function datatables()
    {
        $list = $this->BlogModel->get_datatables();

        $data = array();
        $no = $_POST['start'];
        
        foreach ($list as $blog) {
            $no++;
            $row = array();
            $row[] = $blog->blog_title;
            $row[] = $blog->category;
            $row[] = $blog->post_by;
            $row[] = $blog->created_on;
            $row[] = substr($blog->blog_content, 0, 50);

            if ($blog->image) {
                $row[] = '<img src="'.base_url('assets/upload/img/blog/'.$blog->image).'" class="img-responsive img-profile rounded-circle" style="width: 50px; height: 50px;" />';
            }else{
                $row[] = '(No Image)';
            }
            //add html for action
            $row[] = '<a class="btn btn-link btn-warning btn-sm" href="javascript:void(0)" 
                                title="Edit" onclick="ajax_edit('."'".$blog->id."'".')">
                                <i class="fa fa-edit"></i>
                         </a>
                         <a class="btn btn-link btn-danger btn-sm" href="javascript:void(0)" 
                                title="Hapus" onclick="ajax_delete('."'".$blog->id."'".')">
                                <i class="fa fa-trash"></i>
                         </a>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->BlogModel->count_all(),
                        "recordsFiltered" => $this->BlogModel->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('blog_title') == '')
        {
            $data['inputerror'][] = 'blog_title';
            $data['error_string'][] = 'Blog title is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('blog_content') == '')
        {
            $data['inputerror'][] = 'blog_content';
            $data['error_string'][] = 'Blog Content is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('category') == '')
        {
            $data['inputerror'][] = 'category';
            $data['error_string'][] = 'Category is required';
            $data['status'] = FALSE;
        }
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    public function do_upload()
    {
        $path = 'assets/upload/img/blog';
        $config['upload_path']          = $path; //$_SERVER['DOCUMENT_ROOT'].'/eo-master/assets/upload/img';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['max_size']             = 5000; //set max size allowed in Kilobyte
        $config['max_width']            = 5000; // set max width image allowed
        $config['max_height']           = 5000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

        // $this->load->library('upload',$config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('image')) {
            $data['inputerror'][] = 'image';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }

        return $this->upload->data('file_name');
    }
 
    public function edit($id)
    {
        $data = $this->BlogModel->get_by_id($id);
        // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }
 
    public function store()
    {
        $this->_validate();

        $data = array(
                'blog_title' => $this->input->post('blog_title'),
                'blog_slug' => strtolower(str_replace(' ', '-', $this->input->post('blog_title'))),
                'category' => $this->input->post('category'),
                'blog_content' => $this->input->post('blog_content'),
                'created_on' => date('Y-m-d H:i:s'),
                'post_by' => $this->session->userdata('fullname')
                
        );

        if (!empty($_FILES['image']['name'])) {
                $upload  = $this->do_upload();
                $data['image'] = $upload;
            }

        $insert = $this->BlogModel->save($data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function update()
    {
        $this->_validate();
        $data = array(
                'blog_title' => $this->input->post('blog_title'),
                'blog_slug' => strtolower(str_replace(' ', '-', $this->input->post('blog_title'))),
                'category' => $this->input->post('category'),
                'blog_content' => $this->input->post('blog_content'),
                'created_on' => date('Y-m-d H:i:s'),
                'post_by' => $this->session->userdata('fullname')  
            );
            if (!empty($_FILES['image']['name'])) {
                $upload  = $this->do_upload();
                $data['image'] = $upload;
            }

        $this->BlogModel->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function destroy($id)
    {
        
        $this->db->delete('t_blog', ['id' => $id]);
        
        // $this->BlogModel->delete_by_id($id);

        echo json_encode(array("status" => TRUE));
    }

    public function ckimage_upload()
    {
            if(isset($_FILES['upload']['name']))
            {
                 $file = $_FILES['upload']['tmp_name'];
                 $file_name = $_FILES['upload']['name'];
                 $file_name_array = explode(".", $file_name);
                 $extension = end($file_name_array);
                 $new_image_name = rand() . '.' . $extension;
                 $allowed_extension = array("jpg", "jpeg", "png","PNG","JPEG","JPG");
                 if(in_array($extension, $allowed_extension))
                    {
                       move_uploaded_file($file, './assets/upload/img/blog/' . $new_image_name);
                       $function_number = $_GET['CKEditorFuncNum'];
                       $url = base_url().'assets/upload/img/blog/' . $new_image_name;
                       $message = '';
                       echo"";

                     }
            }
    }
 
}