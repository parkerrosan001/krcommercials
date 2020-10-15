<?php

class StaffModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function fetchFLStaffPageContent()
    {

        $this->db->select("*");
        $this->db->from('staff_page_content_tbl');
        $this->db->where('branch', 'FL');
        $result = $this->db->get();
        $fl_page_data =  $result->row();

        if (!empty($fl_page_data)) {

            return $fl_page_data;
        } else {

            return false;
        }
    }

    public function fetchCALStaffPageContent()
    {

        $this->db->select("*");
        $this->db->from('staff_page_content_tbl');
        $this->db->where('branch', 'CAL');
        $result = $this->db->get();
        $fl_page_data =  $result->row();

        if (!empty($fl_page_data)) {

            return $fl_page_data;
        } else {

            return false;
        }
    }

    public function updateFlStaffPageContent($data, $id)
    {

        $this->db->where('id', $id);
        $result = $this->db->update('staff_page_content_tbl', $data);

        if ($result == true) {
            return true;
        } else {
            return false;
        }
    }

    public function updateCALStaffPageContent($data, $id)
    {

        $this->db->where('id', $id);
        $result = $this->db->update('staff_page_content_tbl', $data);

        if ($result == true) {
            return true;
        } else {
            return false;
        }
    }

    public function addStaff($data)
    {

        $result = $this->db->insert('staff_tbl', $data);

        if ($result == true) {

            return true;
        } else {
            return false;
        }
    }

    public function fetchAllStaff()
    {

        $this->db->select("*");
        $this->db->from('staff_tbl');
        $this->db->order_by('id','DESC');
        $result = $this->db->get();
        $staff_data =  $result->result();

        if (!empty($staff_data)) {

            return $staff_data;
        } else {

            return false;
        }
    }

    public function fetchAllStaffByBranch($branch)
    {

        $this->db->select("*");
        $this->db->from('staff_tbl');
        $this->db->where('branch',$branch);
        $this->db->order_by('id','DESC');
        $result = $this->db->get();
        $staff_data =  $result->result();

        if (!empty($staff_data)) {

            return $staff_data;
        } else {

            return false;
        }
    }

    public function deleteStaff($id)
    {

        $this->db->where('id', $id);
        $result = $this->db->delete('staff_tbl');

        if ($result == true) {

            return true;
        } else {
            return false;
        }
    }

    public function fetchSingleStaff($id)
    {

        $this->db->select("*");
        $this->db->from('staff_tbl');
        $this->db->where('id', $id);
        $result = $this->db->get();
        $single_staff_data =  $result->row();

        if (!empty($single_staff_data)) {

            return $single_staff_data;
        } else {

            return false;
        }
    }

    public function updateStaff($staff_data, $id)
    {

        $this->db->where('id', $id);
        $value = $this->db->update('staff_tbl', $staff_data);

        if ($value == true) {

            return true;
        } else {

            return false;
        }
    }
}
