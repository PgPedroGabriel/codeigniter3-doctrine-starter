<?php
namespace Entities;

abstract class Base
{
    /**
    * @Id
    * @GeneratedValue
    * @Column(type="integer")
    **/
    protected $id;

    /**
    * @Column(type="datetime", nullable=false)
    **/
    protected $date_created = null;

    /**
    * @Column(type="datetime", nullable=true)
    **/
    protected $date_updated = null;

    public function __construct() {
        $this->date_created = new \DateTime();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDateCreated()
    {
        return $this->date_created;
    }
}