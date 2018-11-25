<?php
/**
 * Created by PhpStorm.
 * User: supersu
 * Date: 11/24/18
 * Time: 12:31 PM
 */

class DB extends SQLite3
{

    public function __construct($file = 'config/db/phpadmilite.sqlite')
    {
        $this->open($file);
    }
}