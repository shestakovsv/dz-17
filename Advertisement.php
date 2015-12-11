<?php

//include 'RepositoryAds.php';

abstract class Advertisement {

    public $id;
    public $manager;
    public $email;
    public $seller_name;
    public $phone;
    public $location_id;
    public $category_id;
    public $title;
    public $description;
    public $price;
    public $allow_mails = 0;

    function __construct($postDate) {
        if (isset($postDate["id"])) { // проверка наличия id в форме
            $this->id = $postDate["id"];
        }
        $this->manager = $postDate["manager"];
        $this->email = $postDate["email"];
        $this->seller_name = $postDate["seller_name"];
        $this->phone = $postDate["phone"];
        $this->location_id = $postDate["location_id"];
        $this->category_id = $postDate["category_id"];
        $this->title = $postDate["title"];
        $this->description = $postDate["description"];
        $this->price = $postDate["price"];
        $this->allow_mails = $postDate["allow_mails"];

        $repository = repositoryAds::getinstance();
        $repository->addAdvertisement($this);
    }

    public function sql_INSERT($bd, $adv) {
        $object_array = get_object_vars($adv);
        $bd->query('INSERT INTO form(?#) VALUES(?a)', array_keys($object_array), array_values($object_array));
    }

    static public function sql_DELETE($bd, $id_del) {
        $bd->select('DELETE FROM form WHERE id = ?', $id_del);
        ?>
        <script>
            $(table tbody td#del)
            
        </script>
        <?
    }

    public function sql_UPDATE($bd, $adv) {
        $object_array = get_object_vars($adv);
        $id = $object_array["id"];
        $bd->query('UPDATE form SET ?a WHERE id =?', $object_array, $id);
    }

    public function getId() {
        return $this->id;
    }

    public function repository() {
        $repository = RepositoryAds::getinstance();
        $repository->addAdvertisement($this);
    }

    public function save($bd, $adv) {
        if (isset($this->id)) {
            $this->sql_UPDATE($bd, $adv);
        } else {
            $this->sql_INSERT($bd, $adv);
        }
    }

}
