CREATE TABLE `link` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `favorite` enum('Y','N') NOT NULL,
  `fromUrl` varchar(500) DEFAULT NULL,
  `toUrl` varchar(500) DEFAULT NULL,
  `anchorText` varchar(255) DEFAULT NULL,
  `linkStatus` varchar(100) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `blDom` bigint(15) DEFAULT '0',
  `domPop` int(10) DEFAULT '0',
  `power` int(10) DEFAULT '0',
  `trust` int(10) DEFAULT '0',
  `powerTrust` int(10) DEFAULT '0',
  `alexa` varchar(75) DEFAULT NULL,
  `ip` varchar(15) DEFAULT NULL,
  `countryCode` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8