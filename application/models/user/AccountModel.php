<?php

class AccountModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function userLoginValidate($data)
    {

        $this->db->select("accounts_tbl.*,users_tbl.user_full_name,users_tbl.user_pic,users_tbl.user_phone,users_tbl.user_branch");
        $this->db->from('accounts_tbl')
            ->join('users_tbl', 'accounts_tbl.id = users_tbl.acc_id', 'left');
        $this->db->where($data);
        $result = $this->db->get();
        $user_data =  $result->row();

        if (!empty($user_data)) {

            return $user_data;
        } else {

            return false;
        }
    }

    public function checkEmailAddress($email)
    {

        $this->db->select("accounts_tbl.*,users_tbl.user_full_name");
        $this->db->from('accounts_tbl')
            ->join('users_tbl', 'accounts_tbl.id = users_tbl.acc_id', 'left');
        $this->db->where('email', $email);
        $result = $this->db->get();
        $user_data =  $result->row();

        if (!empty($user_data)) {

            return $user_data;
        } else {

            return false;
        }
    }

    public function fetchUserData($order_no)
    {

        $this->db->select("acc_id");
        $this->db->from('user_subscription_orders_tbl');
        $this->db->where('order_no', $order_no);
        $result = $this->db->get();
        $data =  $result->row();

        if (!empty($data)) {

            $acc_id = $data->acc_id;

            $this->db->select("*");
            $this->db->from('accounts_tbl')
                ->join('users_tbl', 'accounts_tbl.id = users_tbl.acc_id', 'left');
            $this->db->where('accounts_tbl.id', $acc_id);
            $result = $this->db->get();
            $user_data =  $result->row();

            if (!empty($user_data)) {
                return $user_data;
            } else {
                return false;
            }
        } else {

            return false;
        }
    }

    public function resetUserPassword($password, $user_email)
    {

        $data = array(
            'password' => md5($password)
        );

        $this->db->where('email', $user_email);
        $result = $this->db->update('accounts_tbl', $data);

        if ($result == true) {

            return true;
        } else {

            return false;
        }
    }

    public function registerUser($email, $password, $user_full_name, $user_phone, $branch_field)
    {

        $account_data = array(
            'email' => $email,
            'password' => md5($password),
            'role' => 'User',
            'status' => 'Active'
        );

        $result = $this->db->insert('accounts_tbl', $account_data);

        if ($result == true) {
            $last_inserted_id = $this->db->insert_id();

            $profile_data = array(
                'acc_id' => $last_inserted_id,
                'user_full_name' => $user_full_name,
                'user_phone' => $user_phone,
                'user_branch' => $branch_field
            );

            $result1 = $this->db->insert('users_tbl', $profile_data);

            if ($result1 == true) {

                $data = array(
                    'email' => $email,
                    'password' => md5($password)
                );

                $user_data = $this->userLoginValidate($data);

                return $user_data;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function fetchMyProfile($acc_id)
    {
        $this->db->select("*");
        $this->db->from('accounts_tbl')
            ->join('users_tbl', 'accounts_tbl.id = users_tbl.acc_id', 'left');
        $this->db->where('accounts_tbl.id', $acc_id);
        $result = $this->db->get();
        $user_details =  $result->row();

        if (!empty($user_details)) {

            return $user_details;
        } else {

            return false;
        }
    }

    public function updateMyProfile($full_name, $email, $phone, $branch, $address)
    {

        $account_data = array(
            'email' => $email,
        );

        $this->db->where('id', $_SESSION['logged_in_id']);
        $result = $this->db->update('accounts_tbl', $account_data);

        if ($result == true) {

            $profile_data = array(
                'user_full_name' => $full_name,
                'user_branch' => $branch,
                'user_phone' => $phone,
                'user_address' => $address
            );

            $this->db->where('acc_id', $_SESSION['logged_in_id']);
            $result1 = $this->db->update('users_tbl', $profile_data);

            if ($result1 == true) {

                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function updateMyProfileImage($profile_pic)
    {

        $data = array(
            'user_pic' => $profile_pic
        );

        $this->db->where('acc_id', $_SESSION['logged_in_id']);
        $result = $this->db->update('users_tbl', $data);

        if ($result == true) {

            return true;
        } else {

            return false;
        }
    }

    public function validateCurrentPassword($acc_id, $password)
    {

        $data = array(
            'id' => $acc_id,
            'password' => md5($password)
        );

        $this->db->select("*");
        $this->db->from('accounts_tbl');
        $this->db->where($data);
        $result = $this->db->get();
        $user_data =  $result->row();

        if (!empty($user_data)) {

            return true;
        } else {

            return false;
        }
    }

    public function updatePassword($acc_id, $new_pass)
    {

        $data = array(
            'password' => md5($new_pass)
        );

        $this->db->where('id', $acc_id);
        $result = $this->db->update('accounts_tbl', $data);

        if ($result == true) {

            return true;
        } else {

            return false;
        }
    }
}
