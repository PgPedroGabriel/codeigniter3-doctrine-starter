<?php
namespace Entities;

//use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityRepository;


abstract class Base
{

    CONST INACTIVED = 0;
    CONST ACTIVED = 1;
    CONST DELETED = 3;

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

    /**
    * @Column(type="smallint", nullable=false)
    **/
    protected $status = self::ACTIVED;

    public function __construct() {
        $this->date_created = new \DateTime();
        $this->date_updated = new \DateTIme();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDateCreated()
    {
        return $this->date_created;
    }

    public function isActive()
    {
        return $this->status == Base::ACTIVED;
    }
}

class BaseRepository extends EntityRepository
{
    public function getActiveEntries()
    {
        return $this->findBy(['status' => Base::ACTIVED]);
    }

    public function getInactiveEntries()
    {
        return $this->findBy(['status' => Base::INACTIVED]);
    }

    public function getVisibleEntries()
    {
        return $this->findBy(['status' => [Base::ACTIVED, Base::INACTIVED]]);
    }
}