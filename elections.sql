CREATE TABLE `users` (
  `id` int PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `role_id` int NOT NULL,
  `nim` varchar(10) UNIQUE NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` boolean,
  `created_at` datetime NOT NULL
);

CREATE TABLE `user_roles` (
  `id` int PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `role` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime
);

CREATE TABLE `user_details` (
  `id` int PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `generation_id` int NOT NULL,
  `major_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `hp` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime
);

CREATE TABLE `user_logs` (
  `id` int PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `deleted_at` datetime
);

CREATE TABLE `elections` (
  `id` int PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `candidate_id` int NOT NULL,
  `status` boolean NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime
);

CREATE TABLE `votes` (
  `id` int PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `election_id` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` datetime NOT NULL
);

CREATE TABLE `candidates` (
  `id` int PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `user_id` int NOT NULL,
  `picture` varchar(255) NOT NULL,
  `misi` text NOT NULL,
  `visi` text NOT NULL,
  `created_at` datetime NOT NULL
);

CREATE TABLE `feedbacks` (
  `id` int PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `deleted_at` datetime
);

CREATE TABLE `majors` (
  `id` int PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `major` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` datetime
);

CREATE TABLE `generations` (
  `id` int PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `generation` char(4) NOT NULL,
  `created_at` datetime
);
