-- BEGIN TABLE codes
CREATE TABLE `codes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `code` varchar(60) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `claimed` int(1) NOT NULL,
  PRIMARY KEY (`id`)
);

-- END TABLE codes

-- BEGIN TABLE listing_stats
CREATE TABLE `listing_stats` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `peerID` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `slug` text NOT NULL,
  PRIMARY KEY (`id`)
);

-- END TABLE listing_stats

-- BEGIN TABLE posts
CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);

-- END TABLE posts

-- BEGIN TABLE stores
CREATE TABLE `stores` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `guid` text NOT NULL,
  `profile` json DEFAULT NULL,
  `created` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `peerID` (`guid`(60))
);

-- END TABLE stores

