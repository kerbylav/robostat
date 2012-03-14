CREATE TABLE IF NOT EXISTS `prefix_robostat_robots` (
  `robot_id` int(11) unsigned NOT NULL,
  `robot_today_date` datetime NOT NULL,
  `robot_today` int(11) NOT NULL DEFAULT 0,
  `robot_yesterday` int(11) NOT NULL DEFAULT 0,
  `robot_total` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`robot_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
