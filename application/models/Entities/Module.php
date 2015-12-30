<?php
namespace Entities;

use Doctrine\Commons\Collections\ArrayCollection;
use Doctrine\ORM\EntityRepository;

/**
 * @Entity(repositoryClass="Entities\ModuleRepository")
 * @Table(name="module")
 **/
class Module extends BaseAdmin
{
    /**
    * @Column(type="string", length=100)
    **/
    private $name;

    /**
    * @Column(type="string", length=25, nullable=true)
    **/
    private $class;

    /**
    * @Column(type="string", length=25, nullable=true)
    **/
    private $controller;

    /**
    * @Column(type="string", length=25, nullable=true)
    **/
    private $fontAwesomeClass;

    /**
    * @Column(type="string", length=4)
    **/
    private $version;

    /**
    * @Column(type="string", length=50)
    **/
    private $adminUrl;

    /**
    * @Column(type="integer")
    **/
    private $sequence;

    /**
     * @ManyToMany(targetEntity="UserAdmin", mappedBy="modules")
     */
    private $users;

    public function __construct()
    {
        parent::__construct();
        $this->users = new ArrayCollection();
    }

    /**
     * Gets the value of name.
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the value of name.
     *
     * @param mixed $name the name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

        /**
     * Gets the value of name.
     *
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * Sets the value of controller.
     *
     * @param mixed $controller the controller
     *
     * @return self
     */
    public function setController($controller)
    {
        $this->controller = $controller;

        return $this;
    }


    /**
     * Gets the value of class.
     *
     * @return mixed
     */
    public function getFontAwesomeClass()
    {
        return $this->fontAwesomeClass;
    }

    /**
     * Sets the value of fontAwesomeClass.
     *
     * @param mixed $fontAwesomeClass the fontAwesomeClass
     *
     * @return self
     */
    public function setFontAwesomeClass($fontAwesomeClass)
    {
        $this->fontAwesomeClass = $fontAwesomeClass;

        return $this;
    }

    /**
     * Gets the value of class.
     *
     * @return mixed
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Sets the value of class.
     *
     * @param mixed $class the class
     *
     * @return self
     */
    public function setClass($class)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * Gets the value of version.
     *
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Sets the value of version.
     *
     * @param mixed $version the version
     *
     * @return self
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Gets the value of adminUrl.
     *
     * @return mixed
     */
    public function getAdminUrl()
    {
        return $this->adminUrl;
    }

    /**
     * Sets the value of adminUrl.
     *
     * @param mixed $adminUrl the admin url
     *
     * @return self
     */
    public function setAdminUrl($adminUrl)
    {
        $this->adminUrl = $adminUrl;

        return $this;
    }

    /**
     * Gets the value of sequence.
     *
     * @return mixed
     */
    public function getSequence()
    {
        return $this->sequence;
    }

    /**
     * Sets the value of sequence.
     *
     * @param mixed $sequence the sequence
     *
     * @return self
     */
    public function setSequence($sequence)
    {
        $this->sequence = $sequence;

        return $this;
    }

    /**
     * Gets the value of users.
     *
     * @return mixed
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Sets the value of users.
     *
     * @param mixed $users the users
     *
     * @return self
     */
    public function setUsers($users)
    {
        $this->users = $users;

        return $this;
    }


    public function getUrl()
    {
        return base_url().'admin-cms/'.$this->adminUrl;
    }

    public function isModule(Module $module)
    {
        return $this->getId() == $module->getId();
    }
}

class ModuleRepository extends BaseAdminRepository
{
}