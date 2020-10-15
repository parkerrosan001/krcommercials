<?php

class ProjectModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function fetchFLProjectPageContent()
    {

        $this->db->select("*");
        $this->db->from('project_page_content_tbl');
        $this->db->where('branch', 'FL');
        $result = $this->db->get();
        $fl_page_data =  $result->row();

        if (!empty($fl_page_data)) {

            return $fl_page_data;
        } else {

            return false;
        }
    }

    public function fetchCALProjectPageContent()
    {

        $this->db->select("*");
        $this->db->from('project_page_content_tbl');
        $this->db->where('branch', 'CAL');
        $result = $this->db->get();
        $fl_page_data =  $result->row();

        if (!empty($fl_page_data)) {

            return $fl_page_data;
        } else {

            return false;
        }
    }

    public function updateFlProjectPageContent($data, $id)
    {

        $this->db->where('id', $id);
        $result = $this->db->update('project_page_content_tbl', $data);

        if ($result == true) {
            return true;
        } else {
            return false;
        }
    }

    public function updateCALProjectPageContent($data, $id)
    {

        $this->db->where('id', $id);
        $result = $this->db->update('project_page_content_tbl', $data);

        if ($result == true) {
            return true;
        } else {
            return false;
        }
    }

    public function addProject($data)
    {

        $result = $this->db->insert('projects_tbl', $data);

        if ($result == true) {

            return true;
        } else {
            return false;
        }
    }

    public function fetchAllProjects()
    {

        $this->db->select("*");
        $this->db->from('projects_tbl');
        $this->db->order_by('id', 'DESC');
        $result = $this->db->get();
        $projects_data =  $result->result();

        if (!empty($projects_data)) {

            return $projects_data;
        } else {

            return false;
        }
    }

    public function fetchAllProjectsByBranch($branch)
    {

        $this->db->select("*");
        $this->db->from('projects_tbl');
        $this->db->where('branch',$branch);
        $this->db->order_by('id', 'DESC');
        $result = $this->db->get();
        $projects_data =  $result->result();

        if (!empty($projects_data)) {

            return $projects_data;
        } else {

            return false;
        }
    }

    public function deleteProject($id)
    {

        $this->db->where('id', $id);
        $result = $this->db->delete('projects_tbl');

        if ($result == true) {

            return true;
        } else {
            return false;
        }
    }

    public function fetchSingleProject($id)
    {

        $this->db->select("*");
        $this->db->from('projects_tbl');
        $this->db->where('id', $id);
        $result = $this->db->get();
        $single_project_data =  $result->row();

        if (!empty($single_project_data)) {

            return $single_project_data;
        } else {

            return false;
        }
    }

    public function updateProject($project_data, $id)
    {

        $this->db->where('id', $id);
        $value = $this->db->update('projects_tbl', $project_data);

        if ($value == true) {

            return true;
        } else {

            return false;
        }
    }
}
