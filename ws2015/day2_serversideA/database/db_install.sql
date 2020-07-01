create table if not exists `d2_ssa_users` (
  `id` int unsigned not null primary key auto_increment,
  `uniqid` varchar(23) not null unique,
  `avatar_set` boolean not null default 0
);

create table if not exists `d2_ssa_matches` (
  `id` int unsigned not null primary key auto_increment,
  `started` timestamp not null default current_timestamp,
  `last_move` timestamp not null default current_timestamp,
  `ended` boolean not null default 0,
  `user_id` int unsigned not null,
  foreign key (`user_id`) references `d2_ssa_users`(`id`) on delete cascade
);

create table if not exists `d2_ssa_moves` (
  `id` int unsigned not null primary key auto_increment,
  `square` int unsigned not null,
  `match_id` int unsigned not null,
  `is_player` boolean not null,
  foreign key (`match_id`) references `d2_ssa_matches`(`id`) on delete cascade
);

create table if not exists `d2_ssa_scores` (
  `id` int unsigned not null primary key auto_increment,
  `nickname` varchar(50) not null,
  `game_clock` int unsigned not null,
  `score` int unsigned not null,
  `date` date not null,
  `match_id` int unsigned not null,
  `user_id` int unsigned not null,
  foreign key (`match_id`) references `d2_ssa_matches`(`id`) on delete cascade,
  foreign key (`user_id`) references `d2_ssa_users`(`id`) on delete cascade
);
