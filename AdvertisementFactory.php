<?php

class AdvertisementFactory {

    public static function build($avertisementType, $post_date) {
        $product = $avertisementType;

        if (class_exists($product)) {
            return new $product($post_date);
        } else {
            throw new \Exception("Неверный тип продукта");
        }
    }

}