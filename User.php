<?php

class User
{
    public $id;
    public $name;
    public $username;
    public $email;
    public $is_admin;
    public $is_active;
    public $password;

    /**
     * @param $userId
     * @return void
     */
    public function find($userId)
    {
        
    }

    /**
     * @return void
     */
    public function save()
    {

    }

    /**
     * @return bool
     */
    public function isAdmin()
    {
        return $this->is_admin === true;
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->is_active === true;
    }
}