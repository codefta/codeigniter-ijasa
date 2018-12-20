<?php

if(! function_exists('auth_checker'))
{
    function auth_checker($roles){
        $_ci =& get_instance();

        $userdata = $_ci->session->userdata('logged_in');

        if(empty($userdata)){
            redirect('auth');
        }else if (!in_array($userdata->role, explode(',', $roles))){
            redirect('auth/error/403');
        }

        if(!function_exists('userdata')){
            function userdata(){
                $_ci =& get_instance();

                $userdata = $_ci->session->userdata('logged_in');

                if (empty($userdata)) return NULL;

                return $userdata;
            }
        }
    }
}