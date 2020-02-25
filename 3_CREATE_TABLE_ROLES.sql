CREATE TABLE IF NOT EXISTS `UserRoles` (
`id` int auto)increment not null,
`role_id` int not null,
`user_id` int not null
`date created` timestamp not null default
current_time,
`date modified` timestamp not null default
current_time on update current_time,
`is active` boolean dafault 1,
PRIMARY KEY (`id`)
) CHARACTER SET utf8 COLLATE utf8_general_ci