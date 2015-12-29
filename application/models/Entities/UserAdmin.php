<?php
namespace Entities;

use Doctrine\ORM\EntityRepository;

/**
 * @Entity(repositoryClass="Entities\UserAdminRepository")
 * @Table(name="admin_user")
 **/
class UserAdmin extends BaseAdmin
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

    /**
    * @Column(type="string", nullable=true)
    **/
    private $picture;

    /**
    * @Column(type="text")
    **/
    private $bio;

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

    /**
     * Gets the value of bio.
     *
     * @return mixed
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * Sets the value of bio.
     *
     * @param mixed $bio the bio
     *
     * @return self
     */
    public function setBio($bio)
    {
        $this->bio = $bio;

        return $this;
    }

    /**
     * Gets the value of picture.
     *
     * @return mixed
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Sets the value of picture.
     *
     * @param mixed $picture the picture
     *
     * @return self
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }
}

class UserAdminRepository extends BaseAdminRepository
{
}