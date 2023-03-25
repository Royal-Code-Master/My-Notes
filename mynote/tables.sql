CREATE TABLE `login` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
 `emails` varchar(100) NOT NULL,
 `passwords` varchar(100) NOT NULL,
 `joined` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
 PRIMARY KEY (`id`),
 UNIQUE KEY `emails` (`emails`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4


CREATE TABLE `notebook` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
 `mt` text NOT NULL,
 `note` text NOT NULL,
 `mails` varchar(50) NOT NULL,
 `joined` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4
