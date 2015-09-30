<?php

namespace Poirot\AuthSystem\Authenticate;


use Poirot\AuthSystem\Authenticate\Interfaces\iIdentifier;
use Poirot\Storage\Adapter\SessionStorage;


/**
 * Class AbstractIdentifier
 * @package Poirot\AuthSystem\Authenticate
 *
 */

abstract class AbstractIdentifier implements iIdentifier
{
    protected $identity;
    protected $isLogin;
    protected $storage;


    function __construct()
    {

    }

    function login()
    {
        if($this->isLogin == true)
            throw new \Exception('the Identity is already loggedIn');

        $this->__getStorage()->set('identity' , $this->identity);
    }


    function logout()
    {
        if(!$this->storage)
            throw new \Exception('user already is not loggedIn');
        $this->storage->destroy();
    }

    function isLogin()
    {
        return $this->isLogin;
    }

    function identity()
    {
        /**
         * This method return identity instance registered
         * within this class
         * @return iIdentity|false
         */
        if($this->identity)
            return $this->identity;
        return false;
    }

    protected function __getStorage()
    {
        if (!$this->storage)
            $this->storage = $this::insStorage();

        return $this->storage;
    }

    protected abstract static function insStorage();

}