CREATE TABLE IF NOT EXISTS `#__floorplan_booth` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`asset_id` INT(10) UNSIGNED NOT NULL DEFAULT '0',

`ordering` INT(11)  NOT NULL ,
`state` TINYINT(1)  NOT NULL ,
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
`created_by` INT(11)  NOT NULL ,
`boothnumber` INT(11)  NOT NULL ,
`type` VARCHAR(255)  NOT NULL ,
`company` VARCHAR(80)  NOT NULL ,
`website` VARCHAR(255)  NOT NULL ,
`logo` VARCHAR(255)  NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;

