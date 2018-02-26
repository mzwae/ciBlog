<?php

class Posts extends CI_Controller
{
    public function index($offset = 0)
    {
        // Pagination Config
        $config['base_url'] = base_url() . 'posts/index/';
        $config['total_rows'] = $this->db->count_all('posts');
        $config['per_page'] = 2;
        $config['uri_segment'] = 3;
        $config['attributes'] = array('class' => 'pagination-links' );
        // Init Pagination
        $this->pagination->initialize($config);

        $data['title'] = 'Latest Posts';
        $data['posts'] = $this->post_model->get_posts(FALSE, $config['per_page'], $offset);

        $this->load->view('templates/header');
        $this->load->view('posts/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($slug = null)
    {
        $data['post'] = $this->post_model->get_posts($slug);
        $post_id = $data['post']['id'];
        $data['comments'] = $this->comment_model->get_comments($post_id);

        if (empty($data['post'])) {
            show_404();
        }
        $data['title'] = $data['post']['title'];
        $this->load->view('templates/header');
        $this->load->view('posts/view', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }
        $data['title'] = 'Create Post';
        $data['categories'] = $this->post_model->get_categories();
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');

        if ($this->form_validation->run() === false) {
            $this->load->view('templates/header');
            $this->load->view('posts/create', $data);
            $this->load->view('templates/footer');
        } else {
            //Upload image
            $config['upload_path'] = './assets/images/posts';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '20000';
            $config['max_width'] = '5000';
            $config['max_height'] = '5000';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {
                $errors = array('error' => $this->upload->display_errors());
                $post_image = 'noimage.jpg';
                print $errors['error'];
                print $config['upload_path'];
            } else {
                $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['userfile']['name'];
            }
            // end of image upload


            $this->post_model->create_post($post_image);

            //Set messages
            $this->session->set_flashdata('post_created', 'Your post has been created!');

            redirect('posts');
        }
    }

    public function delete($id)
    {
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        $this->post_model->delete_post($id);

        //Set messages
        $this->session->set_flashdata('post_deleted', 'Your post has been deleted!');

        redirect('posts');
    }

    public function edit($slug)
    {
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }
        $data['post'] = $this->post_model->get_posts($slug);

        // Check whether logged in user is the owner of the post
        if ($this->session->userdata('user_id') != $this->post_model->get_posts($slug)['user_id']) {
            redirect('posts');
        }
        $data['categories'] = $this->post_model->get_categories();

        if (empty($data['post'])) {
            show_404();
        }
        $data['title'] = 'Edit Post';
        $this->load->view('templates/header');
        $this->load->view('posts/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }
        $this->post_model->update_post();
        $slug = url_title($this->input->post('title'));

        //Set messages
        $this->session->set_flashdata('post_updated', 'Your post has been updated!');

        redirect('posts/' . $slug);
    }
}
