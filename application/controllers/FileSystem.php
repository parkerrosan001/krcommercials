<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FileSystem extends MY_Controller
{
    public $contact_us_data;

    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['logged_in_id'])) {
            redirect('account', 'refresh');
        }
        $this->session->set_userdata('current_page', 'File System');
        $this->load->model("admin/FileSystemModel", "file_m");
        $this->load->model('admin/ContentModel', 'content_m');

        if (isset($_SESSION['selected_branch'])) {
            if ($_SESSION['selected_branch'] == 'FL') {
                $this->contact_us_data = $this->content_m->fetchFlContactUsContent();
            } else {
                $this->contact_us_data = $this->content_m->fetchCalContactUsContent();
            }
        } else {
            $this->contact_us_data = $this->content_m->fetchFlContactUsContent();
        }
    }

    public function index()
    {

        $folders_data = $this->file_m->fetchAllFolders();
        $recent_files_data = $this->file_m->fetchRecentFiles();

        $data['view_to_load'] = "user/pages/files_system";
        $data['page_title'] = "File System";
        $data['folders_data'] = $folders_data;
        $data['recent_files_data'] = $recent_files_data;
        $data['contact_us_data'] = $this->contact_us_data;
        $this->load->view('user/layouts/main_layout', $data);
    }

    public function createFolder()
    {

        if (isset($_POST['create_folder_btn'])) {
            $folder_name = $this->input->post('folder_name_field');

            $data = array(
                'acc_id' => $_SESSION['logged_in_id'],
                'folder_name' => $folder_name,
                'branch' => $_SESSION['logged_in_user_branch']
            );

            $result = $this->file_m->createFolder($data);

            if ($result == false) {

                $this->session->set_flashdata("folder_err", "Oh Snap! Folder creation failed. Please try again!");
                redirect('FileSystem', 'refresh');
            } else {

                $this->session->set_flashdata("folder_succ", "Heads Up! Folder created successfully.");
                redirect('FileSystem', 'refresh');
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

            $data = array(
                'folder_name' => $folder_name
            );

            $result = $this->file_m->renameFolder($id, $data);

            if ($result == false) {

                $this->session->set_flashdata("folder_rename_err", "Oh Snap! Folder rename failed. Please try again!");
                redirect('FileSystem', 'refresh');
            } else {

                $this->session->set_flashdata("folder_rename_succ", "Heads Up! Folder renamed successfully.");
                redirect('FileSystem', 'refresh');
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
            redirect('FileSystem', 'refresh');
        } else {
            $this->session->set_flashdata('folder_delete_err', '<b>Oh Snap!</b> Folder not is deleted. Please try again!');
            redirect('FileSystem', 'refresh');
        }
    }

    public function deleteSubFolder($id, $parrent_id, $directory)
    {

        $value = $this->file_m->deleteSubFolder($id);

        if ($value == true) {
            $this->session->set_flashdata('folder_delete_succ', '<b>Heads up!</b> Folder deleted successfully.');
            if ($directory == 'viewFolder') {
                redirect('FileSystem/viewFolder/' . $parrent_id, 'refresh');
            } else {
                redirect('FileSystem/viewSubFolder/' . $parrent_id, 'refresh');
            }
        } else {
            $this->session->set_flashdata('folder_delete_err', '<b>Oh Snap!</b> Folder not is deleted. Please try again!');
            if ($directory == 'viewFolder') {
                redirect('FileSystem/viewFolder/' . $parrent_id, 'refresh');
            } else {
                redirect('FileSystem/viewSubFolder/' . $parrent_id, 'refresh');
            }
        }
    }

    public function filterFolders()
    {

        $filter = $this->input->post('sort_field');

        if ($filter == 'ASC_DATE') {

            $column = 'created_at';
            $order_by = 'ASC';
        } elseif ($filter == 'DESC_DATE') {
            $column = 'created_at';
            $order_by = 'DESC';
        } elseif ($filter == 'ASC_NAME') {
            $column = 'folder_name';
            $order_by = 'ASC';
        } else {
            $column = 'folder_name';
            $order_by = 'DESC';
        }

        $folders_data = $this->file_m->sortFolders($column, $order_by);

        $data['view_to_load'] = "user/pages/files_system";
        $data['page_title'] = "File System";
        $data['folders_data'] = $folders_data;
        $data['contact_us_data'] = $this->contact_us_data;
        $this->load->view('user/layouts/main_layout', $data);
    }

    public function searchFolders()
    {

        $search = $this->input->post('search_field');

        $folders_data = $this->file_m->searchFolders($search);

        $data['view_to_load'] = "user/pages/files_system";
        $data['page_title'] = "File System";
        $data['folders_data'] = $folders_data;
        $data['contact_us_data'] = $this->contact_us_data;
        $this->load->view('user/layouts/main_layout', $data);
    }

    public function viewFolder($id)
    {

        $files_data = $this->file_m->fetchFolderFiles($id);
        $folder_name = $this->file_m->fetchFolderName($id);

        $data['view_to_load'] = "user/pages/folder_files";
        $data['page_title'] = "File System";
        $data['files_data'] = $files_data;
        $data['folder_id'] = $id;
        $data['folder_name'] = $folder_name->folder_name;
        $data['contact_us_data'] = $this->contact_us_data;
        $this->load->view('user/layouts/main_layout', $data);
    }


    public function uploadFiles()
    {

        if (isset($_POST['files_upload_btn'])) {

            $folder_id = $this->input->post('folder_id_field');
            $controller = $this->input->post('controller_field');

            if (!empty($_FILES['images']['name'][0])) {
                if ($this->upload_files($folder_id, $_FILES['images']) === FALSE) {
                    $this->session->set_flashdata('file_upload_err', '<b>Heads up!</b> Files are not uploaded to folder. Please try again!');
                    if ($controller == 'viewFolder') {
                        redirect('FileSystem/viewFolder/' . $folder_id, 'refresh');
                    } else {
                        redirect('FileSystem/viewSubFolder/' . $folder_id, 'refresh');
                    }
                } else {
                    $this->session->set_flashdata('file_upload_succ', '<b>Heads up!</b> Files uploaded to folder successfully.');
                    if ($controller == 'viewFolder') {
                        redirect('FileSystem/viewFolder/' . $folder_id, 'refresh');
                    } else {
                        redirect('FileSystem/viewSubFolder/' . $folder_id, 'refresh');
                    }
                }
            } else {
                $this->session->set_flashdata('file_upload_err', '<b>Heads up!</b> Files are not uploaded to folder. Please try again!');
                if ($controller == 'viewFolder') {
                    redirect('FileSystem/viewFolder/' . $folder_id, 'refresh');
                } else {
                    redirect('FileSystem/viewSubFolder/' . $folder_id, 'refresh');
                }
            }
        } else {
            $this->index();
        }
    }

    public function upload_files($folder_id, $files)
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
                    'acc_id' => $_SESSION['logged_in_id'],
                    'folder_id' => $folder_id,
                    'file_name' => $attachmentData['file_name'],
                    'display_name' => $attachmentData['file_name'],
                    'file_ext' => pathinfo($image, PATHINFO_EXTENSION),
                    'file_size' => $files['size'][$key],
                    'branch' => $_SESSION['logged_in_user_branch']
                );

                $this->file_m->uploadFiles($data);
            } else {
                return false;
            }
        }
        return true;
    }

    public function filterFiles()
    {

        $filter = $this->input->post('sort_field');
        $folder_id = $this->input->post('folder_id_field');

        if ($filter == 'ASC_DATE') {

            $column = 'created_at';
            $order_by = 'ASC';
        } elseif ($filter == 'DESC_DATE') {
            $column = 'created_at';
            $order_by = 'DESC';
        } elseif ($filter == 'ASC_NAME') {
            $column = 'file_name';
            $order_by = 'ASC';
        } else {
            $column = 'file_name';
            $order_by = 'DESC';
        }

        $files_data = $this->file_m->sortFiles($column, $order_by, $folder_id);
        $folder_name = $this->file_m->fetchFolderName($folder_id);

        $data['view_to_load'] = "user/pages/folder_files";
        $data['page_title'] = "File System";
        $data['files_data'] = $files_data;
        $data['folder_id'] = $folder_id;
        $data['folder_name'] = $folder_name->folder_name;
        $data['contact_us_data'] = $this->contact_us_data;
        $this->load->view('user/layouts/main_layout', $data);
    }

    public function searchFiles()
    {

        $search = $this->input->post('search_field');
        $folder_id = $this->input->post('folder_id_field');

        $files_data = $this->file_m->searchFiles($search, $folder_id);
        $folder_name = $this->file_m->fetchFolderName($folder_id);

        $data['view_to_load'] = "user/pages/folder_files";
        $data['page_title'] = "File System";
        $data['files_data'] = $files_data;
        $data['folder_id'] = $folder_id;
        $data['folder_name'] = $folder_name->folder_name;
        $data['contact_us_data'] = $this->contact_us_data;
        $this->load->view('user/layouts/main_layout', $data);
    }

    public function deleteFile($id, $folder_id, $directory)
    {

        $value = $this->file_m->deleteFile($id);

        if ($value == true) {
            $this->session->set_flashdata('file_delete_succ', '<b>Heads up!</b> File deleted successfully.');
            if ($directory == 'viewFolder') {
                redirect('FileSystem/viewFolder/' . $folder_id, 'refresh');
            } else {
                redirect('FileSystem/viewSubFolder/' . $folder_id, 'refresh');
            }
        } else {
            $this->session->set_flashdata('file_delete_err', '<b>Oh Snap!</b> File not is deleted. Please try again!');
            if ($directory == 'viewFolder') {
                redirect('FileSystem/viewFolder/' . $folder_id, 'refresh');
            } else {
                redirect('FileSystem/viewSubFolder/' . $folder_id, 'refresh');
            }
        }
    }

    public function renameFile()
    {

        if (isset($_POST['rename_file_btn'])) {
            $file_name = $this->input->post('rename_file_name_field');
            $id = $this->input->post('f_id_field');
            $folder_id = $this->input->post('fol_id_field');
            $controller = $this->input->post('controller_field');

            $data = array(
                'display_name' => $file_name
            );

            $result = $this->file_m->renameFile($id, $data);

            if ($result == false) {

                $this->session->set_flashdata("file_rename_err", "Oh Snap! File rename failed. Please try again!");
                if ($controller == 'viewFolder') {
                    redirect('FileSystem/viewFolder/' . $folder_id, 'refresh');
                } else {
                    redirect('FileSystem/viewSubFolder/' . $folder_id, 'refresh');
                }
            } else {

                $this->session->set_flashdata("file_rename_succ", "Heads Up! File renamed successfully.");
                if ($controller == 'viewFolder') {
                    redirect('FileSystem/viewFolder/' . $folder_id, 'refresh');
                } else {
                    redirect('FileSystem/viewSubFolder/' . $folder_id, 'refresh');
                }
            }
        } else {
            $this->index();
        }
    }

    public function createSubFolder()
    {

        if (isset($_POST['create_sub_folder_btn'])) {

            $parrent_folder = $this->input->post('parrent_folder_field');
            $folder_name = $this->input->post('folder_name_field');
            $controller = $this->input->post('controller_field');

            $data = array(
                'acc_id' => $_SESSION['logged_in_id'],
                'folder_id' => $parrent_folder,
                'display_name' => $folder_name,
                'type' => 'Folder',
                'branch' => $_SESSION['logged_in_user_branch']
            );

            $result = $this->file_m->createSubFolder($data);

            if ($result == false) {

                $this->session->set_flashdata("sub_folder_err", "Oh Snap! Sub-Folder creation failed. Please try again!");
                if ($controller == 'viewFolder') {
                    redirect('FileSystem/viewFolder/' . $parrent_folder, 'refresh');
                } else {
                    redirect('FileSystem/viewSubFolder/' . $parrent_folder, 'refresh');
                }
            } else {

                $this->session->set_flashdata("sub_folder_succ", "Heads Up! Sub-Folder created successfully.");
                if ($controller == 'viewFolder') {
                    redirect('FileSystem/viewFolder/' . $parrent_folder, 'refresh');
                } else {
                    redirect('FileSystem/viewSubFolder/' . $parrent_folder, 'refresh');
                }
            }
        } else {
            $this->index();
        }
    }

    public function viewSubFolder($id)
    {

        $files_data = $this->file_m->fetchSubFolderFiles($id);
        $sub_folder_name = $this->file_m->fetchSubFolderName($id);

        $data['view_to_load'] = "user/pages/view_sub_folder";
        $data['page_title'] = "File System";
        $data['files_data'] = $files_data;
        $data['folder_id'] = $id;
        $data['sub_folder_name'] = $sub_folder_name->display_name;
        $data['contact_us_data'] = $this->contact_us_data;
        $this->load->view('user/layouts/main_layout', $data);
    }
}
