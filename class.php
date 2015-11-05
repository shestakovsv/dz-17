<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors', 1);
header('Content-type: text/html; charset=utf-8');

class advertisement_class {

    public $id;
    public $private;
    public $manager;
    public $email;
    public $seller_name;
    public $phone;
    public $location_id;
    public $category_id;
    public $title;
    public $description;
    public $price;
    public $allow_mails;

    function __construct($post_date) {
        if (isset($post_date["id"])) { // проверка наличия id в форме
            $this->id = $post_date["id"];
        }
        $this->private = $post_date["private"];
        $this->manager = $post_date["manager"];
        $this->email = $post_date["email"];
        $this->seller_name = $post_date["seller_name"];
        $this->phone = $post_date["phone"];
        $this->location_id = $post_date["location_id"];
        $this->category_id = $post_date["category_id"];
        $this->title = $post_date["title"];
        $this->description = $post_date["description"];
        $this->price = $post_date["price"];
        $this->allow_mails = $post_date["allow_mails"];

        $writer = repositoryAds::getinstance();
        $writer->addAdvertisement($this);
    }

    public function sql_INSERT($bd, $adv) {
        $object_array = get_object_vars($adv);
        $bd->query('INSERT INTO form(?#) VALUES(?a)', array_keys($object_array), array_values($object_array));
    }

    static public function sql_DELETE($bd, $id_del) {
        $bd->select('DELETE FROM form WHERE id = ?', $id_del);
    }

    public function sql_UPDATE($bd, $id, $adv) {
        $object_array = get_object_vars($adv);
        $bd->query('UPDATE form SET ?a WHERE id =?', $object_array, $id);
        if (empty($object_array["allow_mails"])) {
            $value = '';
            $bd->query('UPDATE form SET allow_mails=? WHERE id =?', $value, $id);
        }
    }

    public function getId() {
        return $this->id;
    }

}

class repositoryAds {

    private static $instance = NULL;
    private $ads = array();

    public static function getinstance() {
        if (self::$instance == NULL) {
            self::$instance = new repositoryAds();
        }
        return self::$instance;
    }

    public function addAdvertisement(advertisement_class $advertisement_class) {
        if (!($this instanceof repositoryAds)) {
            die('нельзя использовать этот класс');
        }
        $this->ads[$advertisement_class->id] = $advertisement_class;
    }

    public function repositoryGet() {
        return ($this->ads);
//        foreach ($this as $key => $value) {
//            foreach ($value as $key => $value1) {
//                var_dump($value1);
//            }
//        }
    }

}
