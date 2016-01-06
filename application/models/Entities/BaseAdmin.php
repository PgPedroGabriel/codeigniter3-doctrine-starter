<?php
namespace Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityRepository;


abstract class BaseAdmin
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

    /**
     * @ManyToOne(targetEntity="UserAdmin")
     */
    protected $owner = null;

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
        return $this->status == BaseAdmin::ACTIVED;
    }

    public function getOwner()
    {
        return $this->owner;
    }

    public function isDeleted()
    {
        return $this->status == BaseAdmin::DELETED;
    }

    public function setOwner($owner)
    {
        $this->owner = $owner;

        return $this;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function setDateCreated($date_created)
    {
        $this->date_created = $date_created;

        return $this;
    }

  
    public function getDateUpdated()
    {
        return $this->date_updated;
    }

    public function setDateUpdated($date_updated)
    {
        $this->date_updated = $date_updated;

        return $this;
    }

  
    public function getStatus()
    {
        return $this->status;
    }


    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    public function getStatusHtml()
    {
        switch ($this->status) {
            case self::ACTIVED:
                return '<span class="label label-success">Ativo</span>';
            case self::INACTIVED:
                return '<span class="label label-warning">Inativo</span>';
            default:
                return '<span class="label label-danger">Deletado</span>';
        }
    }

    public function getDateCreatedFormated()
    {
        return $this->getDateCreated()->format('d/m/Y H:i');
    }

    public function switchStatus()
    {
        $this->status = !$this->status;
        return;
    }
}

class BaseAdminRepository extends EntityRepository
{
    public function getActiveEntries($offset = 0, $limit = 30, $order = ['date_created' => 'DESC'])
    {
        return $this->findBy(['status' => BaseAdmin::ACTIVED], $order, $limit, $offset);
    }

    public function getInactiveEntries($offset = 0, $limit = 30, $order = ['date_created' => 'DESC'])
    {
        return $this->findBy(['status' => BaseAdmin::INACTIVED], $order, $limit, $offset);
    }

    public function getVisibleEntries($offset = 0, $limit = 30, $order = ['date_created' => 'DESC'])
    {
        return $this->findBy(['status' => [BaseAdmin::ACTIVED, BaseAdmin::INACTIVED]], $order, $limit, $offset);
    }


    public function getCount()
    {
        $qb = parent::createQueryBuilder('object');
        
        $qb->select('count(object)');
        $qb->where("object.status = :actived OR object.status = :inactived");
        $qb->setParameter("actived", BaseAdmin::ACTIVED);
        $qb->setParameter("inactived", BaseAdmin::INACTIVED);

        return $qb->getQuery()->getSingleScalarResult();
    }

    public function searchInAllColumns($criteria, $onlyVisibles = false, $offset = null, $limit = null)
    {
        $columns = $this->getClassMetadata()->getColumnNames();
        $columns = array_flip($columns);

        unset($columns['password'], $columns['date_updated'], $columns['status']);

        $queryBuilder = parent::createQueryBuilder('object');

        $whereString = "";

        $queryBuilder->select('object');

        foreach ($columns as $column => $index) {
            $whereString .= "object.".$column." LIKE '%{$criteria}%' OR ";
        }

        $whereString = substr($whereString, 0, -4);

        if($onlyVisibles)
        {
            $whereString .= "AND object.status IN (".BaseAdmin::ACTIVED.",".BaseAdmin::INACTIVED.")";
        }

        $queryBuilder->where($whereString);

        if($offset)
            $queryBuilder->setFirstResult($offset);

        return ['objects' => $queryBuilder->setMaxResults($limit)->getQuery()->execute(), 
                'count' => count($queryBuilder->setMaxResults(null)->getQuery()->getScalarResult()) ];
    }
}