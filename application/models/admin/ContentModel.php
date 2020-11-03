<?php

class ContentModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function fetchFLSliders()
    {

        $this->db->select("*");
        $this->db->from('sliders_content_tbl');
        $this->db->where('branch', 'FL');
        $result = $this->db->get();
        $fl_sliders_data =  $result->result();

        if (!empty($fl_sliders_data)) {

            return $fl_sliders_data;
        } else {

            return false;
        }
    }

    public function fetchCALSliders()
    {

        $this->db->select("*");
        $this->db->from('sliders_content_tbl');
        $this->db->where('branch', 'CAL');
        $result = $this->db->get();
        $cal_sliders_data =  $result->result();

        if (!empty($cal_sliders_data)) {

            return $cal_sliders_data;
        } else {

            return false;
        }
    }

    public function addFlSlider($data)
    {

        $result = $this->db->insert('sliders_content_tbl', $data);

        if ($result == true) {

            return true;
        } else {
            return false;
        }
    }

    public function addCalSlider($data)
    {

        $result = $this->db->insert('sliders_content_tbl', $data);

        if ($result == true) {

            return true;
        } else {
            return false;
        }
    }

    public function deleteSlide($id)
    {

        $this->db->where('id', $id);
        $result = $this->db->delete('sliders_content_tbl');

        if ($result == true) {

            return true;
        } else {
            return false;
        }
    }

    public function fetchFLWelcomeSectionContent()
    {

        $this->db->select("*");
        $this->db->from('home_page_content_tbl');
        $this->db->where('section', 'welcome');
        $this->db->where('branch', 'FL');
        $result = $this->db->get();
        $fl_welcome_section_data =  $result->row();

        if (!empty($fl_welcome_section_data)) {

            return $fl_welcome_section_data;
        } else {

            return false;
        }
    }

    public function fetchCALWelcomeSectionContent()
    {

        $this->db->select("*");
        $this->db->from('home_page_content_tbl');
        $this->db->where('section', 'welcome');
        $this->db->where('branch', 'CAL');
        $result = $this->db->get();
        $cal_welcome_section_data =  $result->row();

        if (!empty($cal_welcome_section_data)) {

            return $cal_welcome_section_data;
        } else {

            return false;
        }
    }

    public function updateFlWelcomeSectionContent($data, $id)
    {

        $this->db->where('id', $id);
        $result = $this->db->update('home_page_content_tbl', $data);

        if ($result == true) {
            return true;
        } else {
            return false;
        }
    }

    public function updateCalWelcomeSectionContent($data, $id)
    {

        $this->db->where('id', $id);
        $result = $this->db->update('home_page_content_tbl', $data);

        if ($result == true) {
            return true;
        } else {
            return false;
        }
    }

    public function fetchFLSpecialSectionContent()
    {

        $this->db->select("*");
        $this->db->from('home_page_content_tbl');
        $this->db->where('section', 'specialization');
        $this->db->where('branch', 'FL');
        $result = $this->db->get();
        $fl_special_section_data =  $result->row();

        if (!empty($fl_special_section_data)) {

            return $fl_special_section_data;
        } else {

            return false;
        }
    }

    public function fetchCALSpecialSectionContent()
    {

        $this->db->select("*");
        $this->db->from('home_page_content_tbl');
        $this->db->where('section', 'specialization');
        $this->db->where('branch', 'CAL');
        $result = $this->db->get();
        $cal_special_section_data =  $result->row();

        if (!empty($cal_special_section_data)) {

            return $cal_special_section_data;
        } else {

            return false;
        }
    }

    public function updateFlSpecialSectionContent($data, $id)
    {

        $this->db->where('id', $id);
        $result = $this->db->update('home_page_content_tbl', $data);

        if ($result == true) {
            return true;
        } else {
            return false;
        }
    }

    public function updateCalSpecialSectionContent($data, $id)
    {

        $this->db->where('id', $id);
        $result = $this->db->update('home_page_content_tbl', $data);

        if ($result == true) {
            return true;
        } else {
            return false;
        }
    }

    public function fetchCalContactUsContent()
    {

        $this->db->select("*");
        $this->db->from('contact_us_content_tbl');
        $this->db->where('branch', 'CAL');
        $result = $this->db->get();
        $cal_contact_us_data =  $result->row();

        if (!empty($cal_contact_us_data)) {

            return $cal_contact_us_data;
        } else {

            return false;
        }
    }

    public function fetchFlContactUsContent()
    {

        $this->db->select("*");
        $this->db->from('contact_us_content_tbl');
        $this->db->where('branch', 'FL');
        $result = $this->db->get();
        $fl_contact_us_data =  $result->row();

        if (!empty($fl_contact_us_data)) {

            return $fl_contact_us_data;
        } else {

            return false;
        }
    }

    public function updateFlContactUsContent($data, $id)
    {

        $this->db->where('id', $id);
        $result = $this->db->update('contact_us_content_tbl', $data);

        if ($result == true) {
            return true;
        } else {
            return false;
        }
    }

    public function updateCalContactUsContent($data, $id)
    {

        $this->db->where('id', $id);
        $result = $this->db->update('contact_us_content_tbl', $data);

        if ($result == true) {
            return true;
        } else {
            return false;
        }
    }
}
