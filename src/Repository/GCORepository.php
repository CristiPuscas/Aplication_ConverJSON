<?php

namespace App\Repository;


use Doctrine\DBAL\Connection;
use Doctrine\DBAL\FetchMode;

class GCORepository
{
    /**
     * @var Connection
     */
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function get_current_competences($id)
    {
        $qb = $this->connection->createQueryBuilder();

        $result=$qb->select('u.name as user_name','t.name as technology_name','level','since')
            ->from('current_competences','cc')
            ->join('cc','users','u','u.id=cc.user_id')
            ->join('cc','technologies','t','cc.technology_id=t.id')
            ->where('u.id=:id')
            ->setParameter('id',$id)
            ->execute()
            ->fetchAll(FetchMode::ASSOCIATIVE);
        return $result;
    }

    public function get_older_competences($id){
        $qb=$this->connection->createQueryBuilder();
        $result=$qb->select('u.name as user_name','uv.name as handled_name','t.name as technology_name','hc.level','event_date','type')
            ->from('users','u')
            ->join('u','history_competences','hc','hc.user_id=u.id')
            ->join('hc','users','uv','hc.handled_by=uv.id')
            ->join('hc','technologies','t','hc.technology_id=t.id')
            ->join('t','technology_tags','tt','tt.technology_id=t.id')
            ->join('tt','tags','tg','tg.id=tt.tag_id')
            ->where('u.id=:id')
            ->setParameter('id',$id)
            ->execute()
            ->fetchALL(FetchMode::ASSOCIATIVE);
        return $result;
    }
    public function get_pending_competences($id){
        $qb=$this->connection->createQueryBuilder();
        $result=$qb->select('u.name as user_name','t.name as technology_name','level')
            ->from('pending_competences','pc')
            ->join('pc','users','u','pc.user_id=u.id')
            ->join('pc','technologies','t','pc.technology_id=t.id')
            ->where('u.id=:id')
            ->setParameter('id',$id)
            ->execute()
            ->fetchAll(FetchMode::ASSOCIATIVE);
        return $result;
    }


}