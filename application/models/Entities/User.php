<?php
namespace Entities;

/**
 * @Entity
 * @Table(name="users")
 **/
class User extends Base
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
    * @Column(type="string")
    **/
    private $email;

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;

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

}