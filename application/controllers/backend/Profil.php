<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');

        $this->load->model('ProfilModel');

    }

    public function index()
    {
        $this->load->view('backend/cms/profil');
    }

    public function datatables()
    {
        $list = $this->ProfilModel->get_datatables();

        $data = array();
        $no = $_POST['start'];
        
        foreach ($list as $apps) {
            $no++;
            $row = array();
            $row[] = $apps->title;
            $row[] = $apps->link;
            $row[] = substr($apps->description, 0, 50);

            if ($apps->image) {
                $row[] = '<img src="'.base_url('assets/upload/img/'.$apps->image).'" class="img-responsive img-profile rounded-circle" style="width: 50px; height: 50px;" />';
            }else{
                $row[] = '(No Image)';
            }
            //add html for action
            $row[] = '<a class="btn btn-link btn-warning btn-sm" href="javascript:void(0)" 
                                title="Edit" onclick="ajax_edit('."'".$apps->id."'".')">
                                <i class="fa fa-edit"></i>
                         </a>
                         <a class="btn btn-link btn-danger btn-sm" href="javascript:void(0)" 
                                title="Hapus" onclick="ajax_delete('."'".$apps->id."'".')">
                                <i class="fa fa-trash"></i>
                         </a>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->ProfilModel->count_all(),
                        "recordsFiltered" => $this->ProfilModel->count_filtered(),
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
 
        if($this->input->post('title') == '')
        {
            $data['inputerror'][] = 'title';
            $data['error_string'][] = 'App name is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('link') == '')
        {
            $data['inputerror'][] = 'link';
            $data['error_string'][] = 'Link is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('description') == '')
        {
            $data['inputerror'][] = 'description';
            $data['error_string'][] = 'Date of Birth is required';
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
        $path = 'assets/upload/img';
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
        $data = $this->ProfilModel->get_by_id($id);
        // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }
 
    public function store()
    {
        $this->_validate();

        $data = array(
                'title' => $this->input->post('title'),
                'link' => $this->input->post('link'),
                // 'image' => $this->input->post('image'),
                'description' => $this->input->post('description')
                
        );

        if (!empty($_FILES['image']['name'])) {
                $upload  = $this->do_upload();
                $data['image'] = $upload;
            }

        $insert = $this->ProfilModel->save($data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function update()
    {
        $this->_validate();
        $data = array(
                'title' => $this->input->post('title'),
                'link' => $this->input->post('link'),
                // 'image' => $this->input->post('image'),
                'description' => $this->input->post('description')  
            );
        $this->ProfilModel->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function destroy($id)
    {
        
        $this->db->delete('t_apps', ['id' => $id]);
        
        // $this->ProfilModel->delete_by_id($id);

        echo json_encode(array("status" => TRUE));
    }
 
}
