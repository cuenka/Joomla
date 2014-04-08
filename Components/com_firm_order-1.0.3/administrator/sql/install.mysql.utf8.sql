CREATE TABLE IF NOT EXISTS `#__com_firm_order` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`asset_id` int(10) unsigned zerofill NOT NULL DEFAULT '0000000001',
`ordering` int(11) NOT NULL DEFAULT '1',
`state` tinyint(1) NOT NULL DEFAULT '1',
`checked_out` int(11) NOT NULL DEFAULT '1',
`checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
`created_by` int(11) NOT NULL DEFAULT '1',
`manufacturer` VARCHAR(255)  NOT NULL ,
`variant` VARCHAR(255)  NOT NULL ,
`customer` VARCHAR(255)  NOT NULL ,
`orderdate` VARCHAR(255)  NOT NULL ,
`noofaircraft` VARCHAR(255)  NOT NULL ,
`engines` VARCHAR(255)  NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;

