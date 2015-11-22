<?php

class RepositoryAds {

    private static $instance = NULL;
    private $repository = array();

    public static function getinstance() {
        if (self::$instance == NULL) {
            self::$instance = new RepositoryAds();
        }
        return self::$instance;
    }

    public function addAdvertisement(Advertisement $Advertisement) {
        if (!($this instanceof RepositoryAds)) {
            die('нельзя использовать этот класс');
        }
        $this->repository[$Advertisement->id] = $Advertisement;
    }

    public function repositoryGet() {
        return $this->repository;
    }

}