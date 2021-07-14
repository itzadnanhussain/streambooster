<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Posts extends CI_Controller
{
    // ///check login
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('en/admin/login');
        }
    }

    ///LoadPostMainView
    public function index()
    {
        $data = array();
        $title['title'] = 'Posts Managment';
        $data['article'] = getByWhere('article');
        $page = 'admin/posts';
        AdminView($page, $data, $title);
    }


    ///New Articles
    public function AddNewPost()
    {
        if ($this->input->is_ajax_request()) {
            extract($_POST);


            ///check form validation
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'title', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');

            // if (empty($_FILES['photo']['name'])) {
            //     $this->form_validation->set_rules('photo', 'Document', 'required');
            // }


            if ($this->form_validation->run() == TRUE) {
                $postData = array();
                $title =  strtoupper($title); 
                $postData['title'] = $title;
                $postData['description'] = $description;
                
                ///image 
                // if (isset($_FILES['photo']) && $_FILES['photo']['name'] != "") {
                //     $path = 'assets/articles/';
                //     if (!is_dir($path)) {
                //         mkdir($path, 0777, true);
                //     }
                //     $config['upload_path'] = FCPATH . $path;
                //     $config['allowed_types'] = 'gif|jpg|png|jpeg';
                //     $this->load->library('upload', $config);
                //     if (!$this->upload->do_upload('photo')) {
                //         $error = array('error' => $this->upload->display_errors());
                //         echo $error;
                //         die;
                //     } else {
                //         $data1 = $this->upload->data();
                //         $postData['photo'] = $path . $data1['file_name'];
                //     }
                // }




                ////findData
                $findData = getByWhere('article', '*', array('title' => $title));
                if (empty($findData)) {
                    addNew('article', $postData);
                    ///Success
                    $data = array('code' => 'success', 'message' => 'Added New Post Successfully!');
                    echo json_encode($data);
                    die;
                } else {
                    ///credential not correct
                    $data = array('code' => 'warning', 'message' => 'Post With Same Title Already Exists!');
                    echo json_encode($data);
                    die;
                }
            } else {
                ///validation errors
                $error_array = array();
                foreach (array_merge($_POST, $_FILES) as $key => $value) {
                    if (form_error($key)) {
                        $error_array[] = array($key, form_error($key, null, null));
                    }
                }
                $data = array('code' => 'error', 'message' => $error_array);
                echo json_encode($data);
                die;
            }
        }
    }

    ///UpdateUser
    public function UpdateArticles()
    {

        if ($this->input->is_ajax_request()) {
            extract($_POST); 

              ///check form validation
              $this->load->library('form_validation');
              $this->form_validation->set_rules('title', 'title', 'required');
              $this->form_validation->set_rules('description', 'Description', 'required');
  
              // if (empty($_FILES['photo']['name'])) {
              //     $this->form_validation->set_rules('photo', 'Document', 'required');
              // }
  
  
              if ($this->form_validation->run() == TRUE) {
                  $postData = array();
                  $title =  strtoupper($title); 
                  $postData['title'] = $title;
                  $postData['description'] = trim($description);
                  
                  ///image 
                  // if (isset($_FILES['photo']) && $_FILES['photo']['name'] != "") {
                  //     $path = 'assets/articles/';
                  //     if (!is_dir($path)) {
                  //         mkdir($path, 0777, true);
                  //     }
                  //     $config['upload_path'] = FCPATH . $path;
                  //     $config['allowed_types'] = 'gif|jpg|png|jpeg';
                  //     $this->load->library('upload', $config);
                  //     if (!$this->upload->do_upload('photo')) {
                  //         $error = array('error' => $this->upload->display_errors());
                  //         echo $error;
                  //         die;
                  //     } else {
                  //         $data1 = $this->upload->data();
                  //         $postData['photo'] = $path . $data1['file_name'];
                  //     }
                  // }
  
  
  
  
                  ////findData
                  $findData = getByWhere('article', '*', array('article_id' => $article_id));
                  if ($findData) {
                      updateByWhere('article', $postData,array('article_id' => $article_id));
                      ///Success
                      $data = array('code' => 'success', 'message' => 'Updated Post Successfully!');
                      echo json_encode($data);
                      die;
                  } else {
                      ///credential not correct
                      $data = array('code' => 'warning', 'message' => 'Post Not Exists!');
                      echo json_encode($data);
                      die;
                  }
              } else {
                  ///validation errors
                  $error_array = array();
                  foreach (array_merge($_POST, $_FILES) as $key => $value) {
                      if (form_error($key)) {
                          $error_array[] = array($key, form_error($key, null, null));
                      }
                  }
                  $data = array('code' => 'error', 'message' => $error_array);
                  echo json_encode($data);
                  die;
              }


            
        }
    }

    ///GetArticlesTableRecordById
    public function GetArticlesTableRecordById()
    {
        if ($this->input->is_ajax_request()) {
            extract($_POST);
            
            $findData = getByWhere('article', '*', array('article_id' => $article_id));

            if ($findData) {

                ///Success
                $data = array('code' => 'success', 'data' => $findData);
                echo json_encode($data);
                die;
            } else {
                ///credential not correct
                $data = array('code' => 'warning', 'message' => 'Record Not Found!');
                echo json_encode($data);
                die;
            }
        }
    }
}
