<?php
/**
 * Created by PhpStorm.
 * User: cpuscas
 * Date: 9/5/2018
 * Time: 12:39 PM
 */

namespace App\Entity;


class Competences
{
    private $id;
    private $user_name;
    private $technology_name;
    private $handled_name;
    private $level;
    private $type;
    private $event_date;
    private $since;

//    public function __construct($id,$user_name,$technology_name,$handled_name,$level,$type,$event_date,$since)
//    {
//        $this->level=$level;
//        $this->user_name=$user_name;
//        $this->technology_name=$technology_name;
//        $this->type=$type;
//        $this->id=$id;
//        $this->event_date=$event_date;
//        $this->handled_name=$handled_name;
//        $this->since=$since;
//    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->user_name;
    }

    /**
     * @param mixed $user_name
     */
    public function setUserName($user_name): void
    {
        $this->user_name = $user_name;
    }

    /**
     * @return mixed
     */
    public function getTechnologyName()
    {
        return $this->technology_name;
    }

    /**
     * @param mixed $technology_name
     */
    public function setTechnologyName($technology_name): void
    {
        $this->technology_name = $technology_name;
    }

    /**
     * @return mixed
     */
    public function getHandledName()
    {
        return $this->handled_name;
    }

    /**
     * @param mixed $handled_name
     */
    public function setHandledName($handled_name): void
    {
        $this->handled_name = $handled_name;
    }

    /**
     * @return mixed
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param mixed $level
     */
    public function setLevel($level): void
    {
        $this->level = $level;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getEventDate()
    {
        return $this->event_date;
    }

    /**
     * @param mixed $event_date
     */
    public function setEventDate($event_date): void
    {
        $this->event_date = $event_date;
    }

    /**
     * @param mixed $since
     */
    public function setSince($since): void
    {
        $this->since = $since;
    }

    /**
     * @return mixed
     */
    public function getSince()
    {
        return $this->since;
    }
}