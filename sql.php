
CREATE TABLE `category` (
`id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `meta_title` varchar(255) NULL,
  `meta_description` varchar(255) NULL,
  `short_content` text NULL,
  `content` text NULL,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `product` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`meta_title` varchar(255) NOT NULL,
`meta_description` varchar(255) NULL,
`name` varchar(255) NOT NULL,
`category_id` int(11) NOT NULL,
`short_content` text NULL,
`content` text NOT NULL,
`price` float NOT NULL,
`stock` int(11) NOT NULL,
`new` int(11) NOT NULL,
`status` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `order` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`user_id` int(11) NULL,
`qty` int(11) NULL,
`sum` float  NULL,
`status` enum ('0','1') NOT NULL,
`name` varchar(255) NULL,
`email` varchar(255)  NULL,
`phone` varchar(255)  NULL,
`create_at` text  NULL,
`update_at` text  NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `order_items` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`order_id` int(11) NULL,
`product_id` int(11) NULL,
`name` varchar(255) NULL,
`price` float  NULL,
`qty_item` int(11) NULL,
`sum_item` float  NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `user` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`username` varchar(255) NOT NULL,
`password` varchar(255) NOT NULL,
`auth_key` varchar(255) NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `setting` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`logo` varchar(255) NOT NULL,
`phones` text NOT NULL,
`email` varchar(255) NULL,
`title` varchar(255) NULL,
`currency` varchar(255) NULL,
`type` varchar(255) DEFAULT "site",
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `comments` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`user_id` int(11)  NULL,
`product_id` int(11)  NULL,
`comment` text  NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
