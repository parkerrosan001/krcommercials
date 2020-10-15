<?php

class ServiceModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function fetchFLServicesPageContent()
    {

        $this->db->select("*");
        $this->db->from('services_page_content_tbl');
        $this->db->where('branch', 'FL');
        $result = $this->db->get();
        $fl_page_data =  $result->row();

        if (!empty($fl_page_data)) {

            return $fl_page_data;
        } else {

            return false;
        }
    }

    public function fetchCALServicesPageContent()
    {

        $this->db->select("*");
        $this->db->from('services_page_content_tbl');
        $this->db->where('branch', 'CAL');
        $result = $this->db->get();
        $fl_page_data =  $result->row();

        if (!empty($fl_page_data)) {

            return $fl_page_data;
        } else {

            return false;
        }
    }

    public function updateFlServicesPageContent($data, $id)
    {

        $this->db->where('id', $id);
        $result = $this->db->update('services_page_content_tbl', $data);

        if ($result == true) {
            return true;
        } else {
            return false;
        }
    }

    public function updateCALServicesPageContent($data, $id)
    {

        $this->db->where('id', $id);
        $result = $this->db->update('services_page_content_tbl', $data);

        if ($result == true) {
            return true;
        } else {
            return false;
        }
    }

    public function addServices($data)
    {

        $result = $this->db->insert('services_tbl', $data);

        if ($result == true) {

            return true;
        } else {
            return false;
        }
    }

    public function fetchAllServices()
    {

        $this->db->select("*");
        $this->db->from('services_tbl');
        $this->db->order_by('id', 'DESC');
        $result = $this->db->get();
        $services_data =  $result->result();

        if (!empty($services_data)) {

            return $services_data;
        } else {

            return false;
        }
    }

    public function fetchAllProjectServicesByBranch()
    {

        $this->db->select("*");
        $this->db->from('services_tbl');
        $this->db->where('branch',$_SESSION['selected_branch']);
        $this->db->where('service_type', 'Project Services');
        $this->db->order_by('id', 'DESC');
        $result = $this->db->get();
        $services_data =  $result->result();

        if (!empty($services_data)) {

            return $services_data;
        } else {

            return false;
        }
    }

    public function fetchAllSkilledTradeServicesByBranch()
    {

        $this->db->select("*");
        $this->db->from('services_tbl');
        $this->db->where('branch',$_SESSION['selected_branch']);
        $this->db->where('service_type', 'Skilled Trade Services');
        $this->db->order_by('id', 'DESC');
        $result = $this->db->get();
        $services_data =  $result->result();

        if (!empty($services_data)) {

            return $services_data;
        } else {

            return false;
        }
    }

    public function deleteService($id)
    {

        $this->db->where('id', $id);
        $result = $this->db->delete('services_tbl');

        if ($result == true) {

            return true;
        } else {
            return false;
        }
    }

    public function fetchSingleService($id)
    {

        $this->db->select("*");
        $this->db->from('services_tbl');
        $this->db->where('id', $id);
        $result = $this->db->get();
        $single_service_data =  $result->row();

        if (!empty($single_service_data)) {

            return $single_service_data;
        } else {

            return false;
        }
    }

    public function updateService($services_data, $id)
    {

        $this->db->where('id', $id);
        $value = $this->db->update('services_tbl', $services_data);

        if ($value == true) {

            return true;
        } else {

            return false;
        }
    }
}
