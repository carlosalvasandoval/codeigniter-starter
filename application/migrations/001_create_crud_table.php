<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_crud_table extends CI_Migration
{

    public function up()
    {
        $this->db->query("CREATE TABLE `crud` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `is_married` char(1) DEFAULT 0,
  `sex` char(1) DEFAULT NULL,
  `preferences` set('Fulbol', 'Voley', 'Tenis', 'Ping Pong', 'Basket') DEFAULT NULL,
  `birth_date`  date DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telephone` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `img_profile` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;");
    }

    public function down()
    {
        $this->db->query(
            "DROP TABLE `crud`;");
    }

}
