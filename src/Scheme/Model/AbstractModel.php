<?php

namespace Scheme\Model;

abstract class AbstractModel
{
    private $dbName = 'electromechanikas';
    /** @var  \MongoClient */
    private $client;
    private $class;
    /** @var  \MongoId */
    protected $_id;
    public function __construct()
    {
        $this->class = self::getClass();

    }
    /**
     * @return string MongoDB collection name where model will be stored
     */
    public function getModelCollectionName()
    {
        $classParts = explode('\\', $this->class);
        $className = array_pop($classParts);
        return $this->fromCamelCase($className);
    }

    public static function findOne($leng)
    {
        $class = self::getClass();
        /** @var AbstractARModel $model */
        $model = new $class;
        return $model->getCollection()->findOne( $leng );
    }

    /**
     * @return string
     */
    public static function getClass()
    {
        return get_called_class();
    }
    /**
     * @return \MongoClient
     */
    private function getClient()
    {
        if (!$this->client) {
            $this->client = new \MongoClient();
        }
        return $this->client;
    }
    /**
     * @return \MongoCollection
     */
    private function getCollection()
    {
        return $this->getClient()->selectCollection($this->dbName, $this->getModelCollectionName());
    }
    private function fromCamelCase($input)
    {
        preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $input, $matches);
        $ret = $matches[0];
        foreach ($ret as &$match) {
            $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
        }
        return implode('_', $ret);
    }
}