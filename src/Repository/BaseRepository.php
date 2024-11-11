<?php
namespace Hong\Repository;

abstract class BaseRepository {
    
    protected final function getEm(){
        $instance = DbManager::getInstance();
        $em = $instance->getEntityManager();
        return $em;
    }

    // abstract protected function get($uniqueKey);
    // abstract protected function insert(array $values);
    // abstract protected function update($id, array $values);
    // abstract protected function delete($uniqueKey);
}