<?php

class DashboardModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function fetchAdminProfile()
    {
        $this->db->select("accounts_tbl.*,admins_tbl.admin_full_name,admins_tbl.admin_phone,admins_tbl.admin_address,admins_tbl.admin_pic,");
        $this->db->where('accounts_tbl.id', $_SESSION['logged_in_admin_id']);
        $this->db->from('accounts_tbl')
            ->join('admins_tbl', 'accounts_tbl.id=admins_tbl.acc_id', 'left');
        $result = $this->db->get();
        $admin_profile_data =  $result->row();

        if (!empty($admin_profile_data)) {

            return $admin_profile_data;
        } else {

            return false;
        }
    }

    public function updateAdminProfile($admin_account_data, $admin_profile_data, $admin_id)
    {

        $this->db->where('id', $admin_id);
        $value = $this->db->update('accounts_tbl', $admin_account_data);

        if ($value == true) {

            $this->db->where('acc_id', $admin_id);
            $this->db->update('admins_tbl', $admin_profile_data);

            return true;
        } else {

            return false;
        }
    }

    public function updateAdminPassword($password_data, $admin_id)
    {

        $this->db->where('id', $admin_id);
        $value = $this->db->update('accounts_tbl', $password_data);

        if ($value == true) {

            return true;
        } else {

            return false;
        }
    }

    // public function fetchTotalSubscriptionsCount()
    // {

    //     $this->db->select("count(*) as total_subscriptions_count");
    //     $this->db->from('subscriptions_tbl');
    //     $result = $this->db->get();
    //     $total_subscriptions_count =  $result->row();

    //     if (!empty($total_subscriptions_count)) {

    //         return $total_subscriptions_count;
    //     } else {

    //         return false;
    //     }
    // }

    // public function fetchTotalUsersCount()
    // {

    //     $this->db->select("count(*) as total_users_count");
    //     $this->db->from('accounts_tbl');
    //     $this->db->where('role', 'User');
    //     $result = $this->db->get();
    //     $total_users_count =  $result->row();

    //     if (!empty($total_users_count)) {

    //         return $total_users_count;
    //     } else {

    //         return false;
    //     }
    // }

    // public function fetchTotalCustomerSubscriptionsCount()
    // {

    //     $this->db->select("count(*) as total_customer_subscriptions_count");
    //     $this->db->from('user_subscriptions_tbl');
    //     $result = $this->db->get();
    //     $total_customer_subscriptions_count =  $result->row();

    //     if (!empty($total_customer_subscriptions_count)) {

    //         return $total_customer_subscriptions_count;
    //     } else {

    //         return false;
    //     }
    // }

    // public function fetchTotalSubscriptionOrdersCount()
    // {

    //     $this->db->select("count(*) as total_subscription_orders_count");
    //     $this->db->from('user_subscription_orders_tbl');
    //     $result = $this->db->get();
    //     $total_subscription_orders_count =  $result->row();

    //     if (!empty($total_subscription_orders_count)) {

    //         return $total_subscription_orders_count;
    //     } else {

    //         return false;
    //     }
    // }
}
