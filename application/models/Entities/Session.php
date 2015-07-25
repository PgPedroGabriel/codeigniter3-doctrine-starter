<?php

namespace Entities;

use Doctrine\ORM\EntityRepository;

/**
 * @Entity(repositoryClass="Entities\SessionRepository")
 * @Table(name="session")
 */
class Session
{
	/**
     * @Id
	 * @Column(type="string", length=40, nullable=false)
	 */
    private $id = 0;

    /**
     * @Column(type="string", length=45, nullable=false)
     */
    private $ip_address = 0;

    /**
     * @Column(type="integer", length=10, nullable=false)
     */
    private $timestamp = 0;

    /**
     * @Column(type="blob", nullable=true)
     */
    private $data = '';

    /**
     * @Column(type="datetime", nullable=true)
     */
    private $date_created = null;

    /**
     * @Column(type="datetime", nullable=true)
     */
    private $date_modify = null;

    /**
     * Set id
     *
     * @param string $Id
     * @return Session
     */
    public function setId($Id)
    {
        $this->id = $Id;

        return $this;
    }

    /**
     * Get id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set ip_address
     *
     * @param string $ipAddress
     * @return Session
     */
    public function setIpAddress($ipAddress)
    {
        $this->ip_address = $ipAddress;

        return $this;
    }

    /**
     * Get ip_address
     *
     * @return string
     */
    public function getIpAddress()
    {
        return $this->ip_address;
    }

    /**
     * Set user_agent
     *
     * @param string $userAgent
     * @return Session
     */
    public function setUserAgent($userAgent)
    {
        $this->user_agent = $userAgent;

        return $this;
    }

    /**
     * Get user_agent
     *
     * @return string
     */
    public function getUserAgent()
    {
        return $this->user_agent;
    }

    /**
     * Set timestamp
     *
     * @param integer $TimeStamp
     * @return Session
     */
    public function setTimeStamp($TimeStamp)
    {
        $this->timestamp = $TimeStamp;

        return $this;
    }

    /**
     * Get timestamp
     *
     * @return integer
     */
    public function getTimeStamp()
    {
        return $this->timestamp;
    }

    /**
     * Set data
     *
     * @param string $Data
     * @return Session
     */
    public function setData($Data)
    {
        $this->data = $Data;

        return $this;
    }

    /**
     * Get data
     *
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

}

class SessionRepository extends EntityRepository
{
}