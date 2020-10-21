<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FileSystem extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['logged_in_admin_id'])) {
            redirect('admin/login', 'refresh');
        }
        $this->session->set_userdata('current_page', 'File System');
        $this->load->model("admin/FileSystemModel", "file_m");
    }

    public function index()
    {

        $folders_data = $this->file_m->fetchAllFolders();

        $data['view_to_load'] = "admin/pages/manage_folders";
        $data['page_title'] = "Manage Folders";
        $data['folders_data'] = $folders_data;
        $this->load->view('admin/layouts/dashboard_layout', $data);
    }

    public function createFolder()
    {

        if (isset($_POST['create_folder_btn'])) {
            $folder_name = $this->input->post('folder_name_field');
            $branch = $this->input->post('branch_field');

            $data = array(
                'acc_id' => $_SESSION['logged_in_admin_id'],
                'folder_name' => $folder_name,
                'branch' => $branch
            );

            $result = $this->file_m->createFolder($data);

            if ($result == false) {

                $this->session->set_flashdata("folder_err", "Oh Snap! Folder creation failed. Please try again!");
                redirect('admin/FileSystem', 'refresh');
            } else {

                $this->session->set_flashdata("folder_succ", "Heads Up! Folder created successfully.");
                redirect('admin/FileSystem', 'refresh');
            }
        } else {
            $this->index();
        }
    }

    public function renameFolder()
    {

        if (isset($_POST['rename_folder_btn'])) {
            $folder_name = $this->input->post('rename_folder_name_field');
            $id = $this->input->post('id_field');
            $branch = $this->input->post('folder_edit_branch_field');

            $data = array(
                'folder_name' => $folder_name,
                'branch' => $branch
            );

            $result = $this->file_m->renameFolder($id, $data);

            if ($result == false) {

                $this->session->set_flashdata("folder_rename_err", "Oh Snap! Folder renamed failed. Please try again!");
                redirect('admin/FileSystem', 'refresh');
            } else {

                $this->session->set_flashdata("folder_rename_succ", "Heads Up! Folder renamed successfully.");
                redirect('admin/FileSystem', 'refresh');
            }
        } else {
            $this->index();
        }
    }

    public function deleteFolder($id)
    {

        $value = $this->file_m->deleteFolder($id);

        if ($value == true) {
            $this->session->set_flashdata('folder_delete_succ', '<b>Heads up!</b> Folder deleted successfully.');
            redirect('admin/FileSystem', 'refresh');
        } else {
            $this->session->set_flashdata('folder_delete_err', '<b>Oh Snap!</b> Folder not is deleted. Please try again!');
            redirect('admin/FileSystem', 'refresh');
        }
    }

    public function viewFolder($id)
    {

        $files_data = $this->file_m->fetchFolderFiles($id);

        $data['view_to_load'] = "admin/pages/view_folder";
        $data['page_title'] = "Manage Folder Files";
        $data['files_data'] = $files_data;
        $data['folder_id'] = $id;
        $this->load->view('admin/layouts/dashboard_layout', $data);
    }


    public function uploadFiles()
    {
        $folder_id = $this->input->post('folder_id_field');
        $branch = $this->input->post('branch_field');

        if (isset($_POST['files_upload_btn'])) {

            if (!empty($_FILES['images']['name'][0])) {
                if ($this->upload_files($branch, $folder_id, $_FILES['images']) === FALSE) {
                    $this->session->set_flashdata('file_upload_err', '<b>Heads up!</b> Files are not uploaded to folder. Please try again!');
                    redirect('admin/FileSystem/viewFolder/' . $folder_id, 'refresh');
                } else {
                    $this->session->set_flashdata('file_upload_succ', '<b>Heads up!</b> Files uploaded to folder successfully.');
                    redirect('admin/FileSystem/viewFolder/' . $folder_id, 'refresh');
                }
            } else {
                $this->session->set_flashdata('file_upload_err', '<b>Heads up!</b> Files are not uploaded to folder. Please try again!');
                redirect('admin/FileSystem/viewFolder/' . $folder_id, 'refresh');
            }
        } else {
            $this->viewFolder($folder_id);
        }
    }

    public function upload_files($branch, $folder_id, $files)
    {
        $config = array(
            'upload_path'   => 'uploads',
            'allowed_types' => '*',
            'overwrite'     => 1,
        );

        $this->load->library('upload', $config);

        foreach ($files['name'] as $key => $image) {
            $_FILES['images[]']['name'] = $files['name'][$key];
            $_FILES['images[]']['type'] = $files['type'][$key];
            $_FILES['images[]']['tmp_name'] = $files['tmp_name'][$key];
            $_FILES['images[]']['error'] = $files['error'][$key];
            $_FILES['images[]']['size'] = $files['size'][$key];

            $config['file_name'] = $image;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('images[]')) {
                $attachmentData = $this->upload->data();

                $data = array(
                    'acc_id' => $_SESSION['logged_in_admin_id'],
                    'folder_id' => $folder_id,
                    'file_name' => $attachmentData['file_name'],
                    'display_name' => $attachmentData['file_name'],
                    'file_ext' => pathinfo($image, PATHINFO_EXTENSION),
                    'file_size' => $files['size'][$key],
                    'branch' => $branch
                );

                $this->file_m->uploadFiles($data);
            } else {
                return false;
            }
        }
        return true;
    }

    public function deleteFile($id, $folder_id)
    {

        $value = $this->file_m->deleteFile($id);

        if ($value == true) {
            $this->session->set_flashdata('file_delete_succ', '<b>Heads up!</b> File deleted successfully.');
            redirect('admin/FileSystem/viewFolder/' . $folder_id, 'refresh');
        } else {
            $this->session->set_flashdata('file_delete_err', '<b>Oh Snap!</b> File not is deleted. Please try again!');
            redirect('admin/FileSystem/viewFolder/' . $folder_id, 'refresh');
        }
    }

    public function renameFile()
    {
        $folder_id = $this->input->post('fol_id_field');

        if (isset($_POST['rename_file_btn'])) {
            $file_name = $this->input->post('rename_file_name_field');
            $id = $this->input->post('id_field');
            $branch = $this->input->post('folder_edit_branch_field');

            $data = array(
                'display_name' => $file_name,
                'branch' => $branch
            );

            $result = $this->file_m->renameFile($id, $data);

            if ($result == false) {

                $this->session->set_flashdata("file_rename_err", "Oh Snap! File rename failed. Please try again!");
                redirect('admin/FileSystem/viewFolder/' . $folder_id, 'refresh');
            } else {

                $this->session->set_flashdata("file_rename_succ", "Heads Up! File renamed successfully.");
                redirect('admin/FileSystem/viewFolder/' . $folder_id, 'refresh');
            }
        } else {
            $this->viewFolder($folder_id);
        }
    }
}
