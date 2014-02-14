CREATE TABLE IF NOT EXISTS `#__clientsdisplay_client` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`ordering` INT(11)  NOT NULL ,
`state` TINYINT(1)  NOT NULL ,
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
`created_by` INT(11)  NOT NULL ,
`client` VARCHAR(60)  NOT NULL ,
`description` TEXT NOT NULL ,
`logo` VARCHAR(255)  NOT NULL ,
`clientwebsite` VARCHAR(60)  NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;

