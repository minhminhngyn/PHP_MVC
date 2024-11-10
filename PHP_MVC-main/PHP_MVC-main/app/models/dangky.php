<?php
    class dangky{
        var $mamoi;
        var $username;
        var $hashed_password;
        var $create_time;
        var $create_by;
        var $update_time;
        var $update_by;
        var $role;
        var $is_active;
        var $is_verify;
        var $token_email;
        var $send_token_time;
        var $expiration_time;

        function __construct($mamoi,$username,$hashed_password,$create_time,$create_by,
                            $update_time,$update_by,$role,$is_active,$is_verify,$token_email,
                            $send_token_time,$expiration_time)
        {
            $this->mamoi = $mamoi;
            $this->username = $username;
            $this->hashed_password = $hashed_password;
            $this->create_time = $create_time;
            $this->create_by = $create_by;
            $this->update_time = $update_time;
            $this->update_by = $update_by;
            $this->role = $role;
            $this->is_active = $is_active;
            $this->is_verify = $is_verify;
            $this->token_email = $token_email;
            $this->send_token_time = $send_token_time;
            $this->expiration_time = $expiration_time;
        }
    }
?>