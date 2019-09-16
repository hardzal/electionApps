CREATE TABLE `users` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `role_id` int,
  `nim` varchar(10) UNIQUE,
  `password` varchar(255),
  `created_at` datetime
);

CREATE TABLE `user_roles` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `role` varchar(255),
  `description` text,
  `created_at` datetime,
  `updated_at` datetime
);

CREATE TABLE `user_details` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `generation_id` int,
  `major_id` int,
  `name` varchar(255),
  `hp` varchar(255),
  `address` text,
  `created_at` datetime,
  `updated_at` datetime
);

CREATE TABLE `user_logs` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int,
  `title` varchar(255),
  `description` varchar(255),
  `created_at` datetime,
  `deleted_at` datetime
);

CREATE TABLE `elections` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `candidate_id` int,
  `status` boolean
);

CREATE TABLE `votes` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `election_id` int,
  `vote_id` int,
  `created_at` datetime
);

CREATE TABLE `candidates` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int,
  `picture` varchar(255),
  `misi` text,
  `visi` text,
  `created_at` datetime
);

CREATE TABLE `feedbacks` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int,
  `title` varchar(255),
  `description` varchar(255),
  `created_at` datetime,
  `deleted_at` datetime
);

CREATE TABLE `majors` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `major` varchar(255),
  `description` varchar(255),
  `created_at` datetime
);

CREATE TABLE `generations` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `generation` char(4),
  `created_at` datetime
);
