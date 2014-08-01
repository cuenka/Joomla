CREATE TABLE IF NOT EXISTS `#__timeline_portfolio` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`ordering` INT(11)  NOT NULL ,
`state` TINYINT(1)  NOT NULL ,
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
`created_by` INT(11)  NOT NULL ,
`project` VARCHAR(255)  NOT NULL ,
`type` VARCHAR(255)  NOT NULL ,
`information` TEXT NOT NULL ,
`date` DATE NOT NULL DEFAULT '2014-01-01',
`website` VARCHAR(255)  NOT NULL ,
`image` VARCHAR(255)  NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;

