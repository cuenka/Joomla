CREATE TABLE IF NOT EXISTS `#__com_list_prices_and_lease_rate` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`asset_id` int(10) unsigned zerofill NOT NULL DEFAULT '0000000001',
`ordering` int(11) NOT NULL DEFAULT '1',
`state` tinyint(1) NOT NULL DEFAULT '1',
`checked_out` int(11) NOT NULL DEFAULT '1',
`checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
`created_by` int(11) NOT NULL DEFAULT '1',
`manufacturer` VARCHAR(255)  NOT NULL ,
`avglistprice` VARCHAR(255)  NOT NULL ,
`type` VARCHAR(255)  NOT NULL ,
`cmv_oldest` VARCHAR(255)  NOT NULL ,
`cmv_newest` VARCHAR(255)  NOT NULL ,
`cmv_change` VARCHAR(255)  NOT NULL ,
`dlr_oldest` VARCHAR(255)  NOT NULL ,
`dlr_newest` VARCHAR(255)  NOT NULL ,
`dlr_change` VARCHAR(255)  NOT NULL ,

`date` VARCHAR(255)  NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;