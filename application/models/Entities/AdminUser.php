<?php
namespace Entities;

/**
 * @Entity
 * @Table(name="admin_users")
 **/
class AdminUser extends Base
{

    /**
    * @Column(type="string")
    **/
    private $password;

    /**
    * @Column(type="string")
    **/
    private $name;

    /**
    * @Column(type="string", unique=true)
    **/
    private $email;

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = \password_hash($password, PASSWORD_BCRYPT, ["cost" => 12]);
        return $this;
    }

    public function getMat()
    {
        return $this->mat;
    }

    public function setMat($mat)
    {
        $this->mat = $mat;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function verifyPassword($password)
    {
        return \password_verify($password, $this->password);
    }
}