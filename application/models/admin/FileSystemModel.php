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
        $this->db->where('id', $id);
        $result = $this->db->get();
        $folder_name =  $result->row();

        if (!empty($folder_name)) {

            return $folder_name;
        } else {

            return false;
        }
    }

    public function fetchRecentFiles()
    {
        $this->db->select("*");
        $this->db->from('files_tbl');
        $this->db->where('type','File');
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

    public function sortFolders($column, $order_by)
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

    public function searchFolders($search)
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
        $this->db->where('id', $id);
        $result = $this->db->update('folders_tbl', $data);

        if ($result == true) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteFolder($id)
    {
        $this->db->where('id', $id);
        $result = $this->db->delete('folders_tbl');

        if ($result == true) {

            $this->db->where('folder_id', $id);
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
        $this->db->where('folder_id', $folders_id);
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

    public function sortFiles($column, $order_by, $folder_id)
    {
        $this->db->select("*");
        $this->db->from('files_tbl');
        $this->db->where('folder_id', $folder_id);
        $this->db->order_by($column, $order_by);
        $result = $this->db->get();
        $files_data =  $result->result();

        if (!empty($files_data)) {

            return $files_data;
        } else {

            return false;
        }
    }

    public function searchFiles($search, $folder_id)
    {
        $this->db->select("*");
        $this->db->from('files_tbl');
        $this->db->where('folder_id', $folder_id);
        $this->db->like('file_name', $search);
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
        echo $id;
        exit;
        $this->db->where('id', $id);
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