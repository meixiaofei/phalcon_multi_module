<?php

use Phalcon\Mvc\Model\Resultset\Simple as Resultset;

class Base extends \Phalcon\Mvc\Model
{
    public function initialize()
    {

    }

    /**
     * set the unified prefix
     * @param string $table the table name
     * @param null $prefix
     */
    protected function setSourcePrefix($table, $prefix = null)
    {
        empty($prefix) && $prefix = $this->di->get('config')->database->prefix;
        $this->setSource($prefix. $table);
    }

    /**
     * query with the native sql
     * @param string $sql sql statement
     * @param null $params bind param
     * @return mixed
     */
    public static function sqlQuery($sql, $params = null)
    {
        $mod = new self();

        $db = $mod->getReadConnection();

        /*$res = $db->query($sql, $params);

        $res->setFetchMode(\Phalcon\Db::FETCH_ASSOC);

        $res = $res->fetchAll();

        return $res;*/

        return new Resultset(null, $mod, $db->query($sql, $params));
    }

    /**
     * get the sql statement
     * @param bool $getAll weather get all statement
     * @return array
     */
    public function sql($getAll = true)
    {
        $profiles = $this->di->get('profiler')->getProfiles();

        $sqlArr = [];
        foreach ($profiles as $profile) {
            $sql = $profile->getSqlStatement();
            if (!$getAll) {
                return $sql;
            }
            $sqlArr[] = $sql;
        }
        return $sqlArr;
    }
}