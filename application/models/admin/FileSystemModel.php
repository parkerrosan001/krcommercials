<?php

class FileSystemModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function createFolder($data)
    {

        $result = $this->db->insert('folders_tbl', $data);

        if ($result ==  true) {
            return true;
        } else {

            return false;
        }
    }

    public function fetchAllFolders()
    {
        $this->db->select("*");
        $this->db->from('folders_tbl');
        $this->db->order_by('id', 'DESC');
        $result = $this->db->get();
        $folders_data =  $result->result();

        if (!empty($folders_data)) {

            return $folders_data;
        } else {

            return false;
        }
    }

    public function fetchFolderName($id)
    {
        $this->db->select("folder_name");
        $this->db->from('folders_tbl');
        $this->db->where('unique_id', $id);
        $result = $this->db->get();
        $folder_name =  $result->row();

        if (!empty($folder_name)) {

            return $folder_name;
        } else {

            return false;
        }
    }

    public function fetchSubFolderName($id)
    {
        $this->db->select("display_name");
        $this->db->from('files_tbl');
        $this->db->where('unique_id', $id);
        $result = $this->db->get();
        $sub_folder_name =  $result->row();

        if (!empty($sub_folder_name)) {

            return $sub_folder_name;
        } else {

            return false;
        }
    }

    public function fetchRecentFiles()
    {
        $this->db->select("*");
        $this->db->from('files_tbl');
        $this->db->where('type', 'File');
        $this->db->order_by('id', 'DESC');
        $this->db->limit('12');
        $result = $this->db->get();
        $recent_files_data =  $result->result();

        if (!empty($recent_files_data)) {

            return $recent_files_data;
        } else {

            return false;
        }
    }

    public function sortRootFolders($column, $order_by)
    {
        $this->db->select("*");
        $this->db->from('folders_tbl');
        $this->db->order_by($column, $order_by);
        $result = $this->db->get();
        $folders_data =  $result->result();

        if (!empty($folders_data)) {

            return $folders_data;
        } else {

            return false;
        }
    }

    public function searchRootFolders($search)
    {
        $this->db->select("*");
        $this->db->from('folders_tbl');
        $this->db->like('folder_name', $search);
        $result = $this->db->get();
        $folders_data =  $result->result();

        if (!empty($folders_data)) {

            return $folders_data;
        } else {

            return false;
        }
    }

    public function renameFolder($id, $data)
    {
        $this->db->where('unique_id', $id);
        $result = $this->db->update('folders_tbl', $data);

        if ($result == true) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteFolder($id)
    {
        $this->db->where('unique_id', $id);
        $result = $this->db->delete('folders_tbl');

        if ($result == true) {

            $this->db->where('parrent_unique_id', $id);
            $this->db->delete('files_tbl');
            return true;
        } else {
            return false;
        }
    }

    public function deleteSubFolder($id)
    {
        $this->db->where('unique_id', $id);
        $this->db->where('type', 'Folder');
        $result = $this->db->delete('files_tbl');

        if ($result == true) {

            $this->db->where('parrent_unique_id', $id);
            $this->db->delete('files_tbl');
            return true;
        } else {
            return false;
        }
    }

    public function fetchFolderFiles($folders_id)
    {
        $this->db->select("*");
        $this->db->from('files_tbl');
        $this->db->where('parrent_unique_id', $folders_id);
        $this->db->order_by('id', 'DESC');
        $result = $this->db->get();
        $files_data =  $result->result();

        if (!empty($files_data)) {

            return $files_data;
        } else {

            return false;
        }
    }

    public function fetchSubFolderFiles($folders_id)
    {
        $this->db->select("*");
        $this->db->from('files_tbl');
        $this->db->where('parrent_unique_id', $folders_id);
        $this->db->order_by('id', 'DESC');
        $result = $this->db->get();
        $files_data =  $result->result();

        if (!empty($files_data)) {

            return $files_data;
        } else {

            return false;
        }
    }

    public function uploadFiles($data)
    {

        $result = $this->db->insert('files_tbl', $data);

        if ($result ==  true) {
            return true;
        } else {

            return false;
        }
    }

    public function sortFolderFiles($column, $order_by, $folder_id)
    {
        $this->db->select("*");
        $this->db->from('files_tbl');
        $this->db->where('parrent_unique_id', $folder_id);
        $this->db->order_by($column, $order_by);
        $result = $this->db->get();
        $files_data =  $result->result();

        if (!empty($files_data)) {

            return $files_data;
        } else {

            return false;
        }
    }

    public function searchFolderFiles($search, $folder_id)
    {
        $this->db->select("*");
        $this->db->from('files_tbl');
        $this->db->where('parrent_unique_id', $folder_id);
        $this->db->like('display_name', $search);
        $result = $this->db->get();
        $files_data =  $result->result();

        if (!empty($files_data)) {

            return $files_data;
        } else {

            return false;
        }
    }

    public function deleteFile($id)
    {
        $this->db->where('id', $id);
        $result = $this->db->delete('files_tbl');

        if ($result == true) {
            return true;
        } else {
            return false;
        }
    }

    public function renameFile($id, $data)
    {
        $this->db->where('unique_id', $id);
        $result = $this->db->update('files_tbl', $data);

        if ($result == true) {
            return true;
        } else {
            return false;
        }
    }

    public function createSubFolder($data)
    {
        $result = $this->db->insert('files_tbl', $data);

        if ($result ==  true) {
            return true;
        } else {

            return false;
        }
    }
}
