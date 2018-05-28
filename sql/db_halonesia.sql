-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2017 at 01:02 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_halonesia`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `admin_login` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_region` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `admin_login`, `admin_email`, `admin_password`, `admin_name`, `id_role`, `id_region`, `created_at`, `updated_at`) VALUES
(17, 'super_admin', 'super@4nesia.com', 'ed49c3fed75a513a79cb8bd1d4715d57', 'SUPER ADMIN', 1, NULL, '2017-07-13 06:00:54', '2017-08-02 14:29:44'),
(18, 'admin_mks', 'adminmks@4nesia.com', 'f6acdfeafe6aa84004631145bd0cd9d4', 'Admin Makassar', 2, 1, '2017-07-13 06:02:01', '2017-08-02 14:33:46'),
(22, 'dishub_mks', 'dishubmksku@gmail.com', '200c6d6ea7beec2852b6b121da001986', 'Admin Dinas Perhubungan Makassar', 3, 1, '2017-07-13 06:02:01', '2017-08-02 15:58:43'),
(30, 'admin_bdg', 'bandung@gmail.com', '59ef3010a4709e785eced1dc57829168', 'Admin Bandung', 2, 2, '2017-07-15 16:24:05', '2017-08-02 08:49:23'),
(33, 'admin_jkt', 'adminjtk@gmail.com', 'c3241626ae48d6f8caf80af28b2fe8c2', 'Admin Jakarta', 2, 5, '2017-08-02 08:49:04', '2017-08-02 08:49:04'),
(34, 'rs_ibnusina', 'rs_ibnusina@gmail.com', '6bbadf79f972ddb6e060bebd52f9fb8d', 'Admin Rumah Sakit Ibnu Sina', 3, 1, '2017-08-02 09:18:02', '2017-08-02 09:18:02'),
(35, 'dishub_bdg', 'dishub_bdg@gmail.com', 'e3d79a5efdbd8ecc819d999d640e0167', 'Admin Dinas Perhubungan Kota Bandung', 3, 2, '2017-08-02 09:21:27', '2017-08-02 09:21:27'),
(36, 'dishub_jkt', 'dishub_jkt@gmail.com', '0615d04a4047c6d9ddb9cf807b7c93e4', 'Admin Dinas Perhubungan Kota Jakarta', 3, 5, '2017-08-02 09:25:41', '2017-08-02 09:25:41');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_code` varchar(3) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_description` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_code`, `category_name`, `category_description`, `created_at`, `updated_at`) VALUES
(1, 'GOV', 'Pemerintahan', '0', '2017-05-24 08:31:10', '2017-07-13 08:58:59'),
(2, 'HLT', 'Kesehatan', '0', '2017-05-24 08:31:10', '2017-08-02 09:22:50');

-- --------------------------------------------------------

--
-- Table structure for table `coba`
--

CREATE TABLE `coba` (
  `id` int(11) NOT NULL,
  `file_url` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coba`
--

INSERT INTO `coba` (`id`, `file_url`) VALUES
(1, 'seagate_with_usb33.PNG'),
(2, 'seagate_with_usb34.PNG'),
(3, 'seagate_with_usb35.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `comment_author` text NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment_content` text NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id_file` int(11) NOT NULL,
  `file_url` text NOT NULL,
  `id_post` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `id_place` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `id_reg_category` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`id_place`, `name`, `description`, `phone_number`, `address`, `latitude`, `longitude`, `id_admin`, `id_reg_category`, `created_at`, `updated_at`) VALUES
(2, 'Dishub Makassar', 'inni description', '010101201291', 'jalan dishub Makassar', 2323232, 119.440117, 22, 1, '2017-07-13 06:20:10', '2017-08-02 09:10:47'),
(24, 'Rumah Sakit Ibnu Sina', 'ini adalah rumah sakit', '0411', 'jl. jendral m yusuf', -5.132794, 119.416496, 34, 8, '2017-08-02 09:14:34', '2017-08-02 09:18:02'),
(25, 'Dinas Perhubungan Kota Bandung', 'ini adalah dinas perhubungan kota bandung', '021', 'jl. dago', 10101010, 101010101, 35, 5, '2017-08-02 09:20:32', '2017-08-02 09:21:27'),
(26, 'Dinas Perhubungan Kota Jakarta', 'ini adalah dinasnya jakarta', '022', 'jl jakarta', 191919191, 919191919, 36, 11, '2017-08-02 09:24:58', '2017-08-02 09:25:41'),
(28, 'Kementrian Perhubungan Makassar', 'ini description kementrian', '0818181881', 'jalan kementrian', 1919191, 1919191, NULL, 1, '2017-08-02 14:57:58', '2017-08-02 15:33:32');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id_post` int(11) NOT NULL,
  `post_author` varchar(100) NOT NULL,
  `post_title` varchar(100) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_content` text NOT NULL,
  `post_category` varchar(100) DEFAULT NULL,
  `id_place` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id_post`, `post_author`, `post_title`, `post_date`, `post_content`, `post_category`, `id_place`, `created_at`, `updated_at`) VALUES
(16, 'Admin Dinas Perhubungan Makassarr', 'Title Postingan Dishub Makassarr', '2017-07-25 06:02:42', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'cateegory postt', 2, '2017-07-25 06:02:42', '2017-08-02 16:03:31'),
(18, 'Admin Dinas Perhubungan Makassarr', 'Title Postingan Dishub Makassar Ke-3 edited', '2017-07-25 06:05:02', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'cateegory post', 2, '2017-07-25 06:05:02', '2017-07-28 15:07:07');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `region_code` varchar(3) NOT NULL,
  `region_name` varchar(100) NOT NULL,
  `region_description` varchar(1000) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `region_code`, `region_name`, `region_description`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 'MKS', 'Makassar', 'City of Makassarr', -5.147665, 119.432731, '2017-05-24 08:30:45', '2017-08-02 14:03:12'),
(2, 'BDG', 'Bandung', 'City of Bandung', -6.917464, 107.619123, '2017-05-24 08:30:45', '2017-07-15 16:24:17'),
(5, 'CGK', 'Jakarta', 'Jakarta              ', 1212, 1212, '2017-07-15 16:27:02', '2017-07-15 16:27:02');

-- --------------------------------------------------------

--
-- Table structure for table `reg_category`
--

CREATE TABLE `reg_category` (
  `id` int(11) NOT NULL,
  `id_region` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg_category`
--

INSERT INTO `reg_category` (`id`, `id_region`, `id_category`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2017-05-24 08:31:25', '2017-05-24 08:31:25'),
(5, 2, 1, '2017-07-13 06:25:39', '2017-07-13 06:25:39'),
(8, 1, 2, '2017-07-13 14:11:33', '2017-07-13 14:11:33'),
(11, 5, 1, '2017-07-15 16:27:33', '2017-07-15 16:27:33');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id_review` int(11) NOT NULL,
  `content` text NOT NULL,
  `rating` int(11) NOT NULL,
  `photo` text NOT NULL,
  `id_place` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role_admin`
--

CREATE TABLE `role_admin` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_admin`
--

INSERT INTO `role_admin` (`id`, `type`) VALUES
(1, 'Super Admin'),
(2, 'Region Admin'),
(3, 'Place Admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_nickname` varchar(50) NOT NULL,
  `user_url` text NOT NULL,
  `user_status` varchar(50) NOT NULL,
  `display_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `admin_login` (`admin_login`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_region` (`id_region`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_code` (`category_code`);

--
-- Indexes for table `coba`
--
ALTER TABLE `coba`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_post` (`id_post`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id_file`),
  ADD KEY `id_post` (`id_post`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`id_place`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_reg_category` (`id_reg_category`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_place` (`id_place`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reg_category`
--
ALTER TABLE `reg_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_index` (`id_region`,`id_category`),
  ADD KEY `id_region` (`id_region`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `id_place` (`id_place`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `role_admin`
--
ALTER TABLE `role_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `coba`
--
ALTER TABLE `coba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `id_place` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `reg_category`
--
ALTER TABLE `reg_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `role_admin`
--
ALTER TABLE `role_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_region_fk` FOREIGN KEY (`id_region`) REFERENCES `region` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admin_role_fk` FOREIGN KEY (`id_role`) REFERENCES `role_admin` (`id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_posts_fk` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id_post`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_users_fk` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_posts_fk` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id_post`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `place`
--
ALTER TABLE `place`
  ADD CONSTRAINT `place_admin_fk` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `place_regcategory_fk` FOREIGN KEY (`id_reg_category`) REFERENCES `reg_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_place_fk` FOREIGN KEY (`id_place`) REFERENCES `place` (`id_place`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reg_category`
--
ALTER TABLE `reg_category`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `fk_region` FOREIGN KEY (`id_region`) REFERENCES `region` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_place_fk` FOREIGN KEY (`id_place`) REFERENCES `place` (`id_place`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_users_fk` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
