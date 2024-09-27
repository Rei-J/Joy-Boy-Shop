-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2024 at 01:26 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `joyboy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT curtime()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `name`, `lastname`, `email`, `pwd`, `created_at`) VALUES
(1, 'king', 'chad', 'king@gmail.com', '$2y$12$V/ipR2yTtuJpLBT38y4sN.H574q1D6ZUncoJ48FyAbwgYL5vy7hVy', '2023-12-22 11:32:53');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `name`, `price`, `quantity`, `image`) VALUES
(80, 4, 'gran turismo', 13, 1, 'gran turismo.jpg'),
(81, 4, 'captain america', 14, 1, 'captain america.jpg'),
(82, 4, 'boruto', 12, 1, 'boruto.jpg'),
(83, 4, 'loki', 13, 1, 'loki.jpg'),
(84, 4, 'arrow', 15, 1, 'arrow.jpg'),
(85, 4, 'game of thrones', 15, 1, 'game of thrones.jpg'),
(86, 4, 'vikings', 15, 1, 'vikings.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_phone` varchar(12) NOT NULL,
  `messagebox` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT curtime()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `email`, `no_phone`, `messagebox`, `created_at`) VALUES
(1, 4, 'nunchuck', 'ban@gmail.com', '0795487632', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2024-01-19 16:27:03'),
(2, 4, 'nunchuck', 'ban@gmail.com', '9875676432', 'aaaaaaaaaaaaaaaaaa', '2024-01-19 16:38:18'),
(3, 4, 'nunchuck', 'ban@gmail.com', '0796534532', 'hello', '2024-01-22 11:17:56');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(4, 4, 'nunchuck', '9764356721', 'ban@gmail.com', 'cash on delivery', '11-deshmoret-vlore-albania-albania-9402', 'boruto (1) ', 12, '2024-01-19 10:57:51', 'completed'),
(5, 4, 'nunchuck', '0985475632', 'ban@gmail.com', 'paypal', '11-deshmoret-vlore-albania-albania-9402', 'captain america (1) , gran turismo (1) , uncharted (1) , loki (1) ', 53, '2024-01-22 16:58:29', 'completed'),
(6, 4, 'nunchuck', '0987564323', 'ban@gmail.com', 'paytm', '11-deshmoret-vlore-albania-albania-9402', 'gran turismo (1) ', 13, '2024-01-22 17:26:16', 'pending'),
(9, 4, 'nunchuck', '6785434532', 'ban@gmail.com', 'cash on delivery', '11-deshmoret-vlore-albania-albania-9402', 'gran turismo (1) ', 13, '2024-01-23 16:29:40', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT curtime()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `created_at`) VALUES
(23, 'arrow', 15, 'arrow.jpg', '2024-01-12 10:10:21'),
(24, 'boruto', 12, 'boruto.jpg', '2024-01-12 13:31:09'),
(25, 'captain america', 14, 'captain america.jpg', '2024-01-12 13:31:30'),
(26, 'gran turismo', 13, 'gran turismo.jpg', '2024-01-12 13:31:55'),
(27, 'jujutsu kaisen', 14, 'jujutsu kaisen.jpg', '2024-01-12 13:32:23'),
(28, 'man vs bee', 12, 'Man-vs-Bee-poster-Netflix.jpg', '2024-01-12 13:32:40'),
(29, 'loki', 13, 'loki.jpg', '2024-01-12 13:32:51'),
(30, 'uncharted', 13, 'uncharted.jpg', '2024-01-12 13:33:33'),
(31, 'vikings', 15, 'vikings.jpg', '2024-01-12 13:41:20'),
(32, 'blue beetle', 10, 'blue-beetle.jpg', '2024-01-12 13:43:54'),
(33, 'avengers end game', 15, 'avengers end game.jpg', '2024-01-12 13:44:28'),
(35, 'the flash', 12, 'the flash.jpg', '2024-01-12 13:44:58'),
(37, 'dragon ball super', 14, 'dragon ball super.jpg', '2024-01-13 14:36:58'),
(38, 'attack on titan', 12, 'attack on titan.jpg', '2024-01-19 16:45:26'),
(39, 'black clover', 14, 'black clover.jpg', '2024-01-19 16:46:20'),
(40, 'game of thrones', 15, 'game of thrones.jpg', '2024-01-19 16:47:13'),
(41, 'mission impossible', 14, 'mission impossible dead reckoning.jpg', '2024-01-19 16:47:41'),
(42, 'naruto', 17, 'naruto.jpg', '2024-01-19 16:49:28'),
(43, 'obi-wan kenobi', 13, 'obi-wan kenobi.jpg', '2024-01-19 16:49:50'),
(44, 'one piece', 17, 'one-piece.jpg', '2024-01-19 16:50:02'),
(45, 'oppenheimer', 16, 'oppenheimer.jpg', '2024-01-19 17:05:06'),
(46, 'seven deadly sins', 13, 'seven deadly sins.jpg', '2024-01-19 17:05:29'),
(47, 'spider-man', 16, 'spider-man no way home.jpg', '2024-01-19 17:05:54'),
(48, 'sword art online', 14, 'sword art online.jpg', '2024-01-19 17:06:18'),
(49, 'slime', 13, 'That-Time-I-Got-Reincarnated-as-a-Slime-season-1.jpg', '2024-01-19 17:06:33'),
(50, 'the devil is a part timer', 12, 'the devil is a part timer.jpg', '2024-01-19 17:06:56'),
(51, 'the lord of the rings', 14, 'the lord of the rings.jpg', '2024-01-19 17:07:32'),
(52, 'the meg 2', 12, 'the meg 2.jpg', '2024-01-19 17:08:10'),
(53, 'the witcher', 14, 'the witcher.jpg', '2024-01-19 17:08:31'),
(54, 'transformers', 13, 'transformers rise of the beasts.jpg', '2024-01-19 17:09:03'),
(55, 'iron man', 14, 'iron man 3.jpg', '2024-01-19 17:10:20'),
(56, 'wednesday', 15, 'wednesday.jpg', '2024-01-19 17:13:08'),
(58, 'demon slayer', 14, 'demon slayer.jpg', '2024-01-23 16:49:08'),
(59, 'house of dragon', 14, 'house of dragon.jpg', '2024-01-23 16:51:33'),
(60, 'peaky blinders', 15, 'peaky blinders.jpg', '2024-01-23 16:52:44'),
(61, 'venom', 12, 'venom.jpg', '2024-01-23 16:53:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(200) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT curtime()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `pwd`, `birthday`, `gender`, `created_at`) VALUES
(1, 'the one', 'escanor', 'escanor@gmail.com', '$2y$12$FocDzFuDcuWSixJUNifefuale775GJdyuCr9W7BzMmf6Z/qEm.T.e', '2023-01-01', 'male', '2023-12-09 16:13:31'),
(2, 'the one', 'ultimate escanor', 'ultimate_escanor@gmail.com', '$2y$12$j5e1lJSvB6i8P4UoCsuPQeUo/YWf9.iGu1o6kWZAI9vF.dSFVjc6u', '2023-01-02', 'male', '2023-12-09 16:46:00'),
(3, 'lostvayne', 'meliodas', 'meliodas@gmail.com', '$2y$12$9G62NUdibJA4uEtQbvJiyOcO8y/EaZ6mULc9UTWCs3NpX8iLqcdde', '2023-02-03', 'male', '2023-12-09 16:51:34'),
(4, 'nunchuck', 'ban', 'ban@gmail.com', '$2y$12$vSOikt2FC6GWe69xWFaHteZRyb/lh3hNgxHSrruanQOAihGKS.RPa', '2023-03-07', 'male', '2023-12-09 17:54:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
