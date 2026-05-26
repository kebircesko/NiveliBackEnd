-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2026 at 01:04 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `steakhouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(1, 'ejmen', '$2y$10$CEm4YHKRL4jELmNBI53J2O1SgnzXkYy1ifXhkzO1n6EXIHmMig8pq');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `category` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `name`, `description`, `price`, `category`, `image_url`) VALUES
(1, 'Filet Mignon', 'Filet mignon is a premium, highly tender steak cut from the smaller end of the beef tenderloin (psoas major) along the cow\'s backbone.', 34.5, 'steaks', 'uploads/1775152577_69ceadc1373ae.jpg'),
(2, 'Elk Steak', 'Elk steak is a highly nutritious, lean red meat with a mild, slightly sweet, and tender flavor often described as superior to grass-fed beef.', 26, 'steaks', 'uploads/1775153677_69ceb20db6658.webp'),
(3, 'Ribeye', 'Ribeye is a premium, highly marbled beef steak cut from the cow’s rib primal section (ribs 6–12), known for its intense flavor, tenderness, and juiciness.', 30, 'steaks', 'uploads/1775154053_69ceb3855c291.jpg'),
(4, 'Sirloin Steak', 'Sirloin is a versatile, lean, and flavorful beef cut located between the short loin and the round (rump). It is prized for having a good balance of tenderness and robust beefy flavor at a generally better value than premium steaks like ribeye', 33, 'steaks', 'uploads/1775153854_69ceb2be30d47.jpg'),
(5, 'T-bone steak', 'The T-bone and porterhouse are steaks of beef cut from the short loin. Both steaks include a T-shaped lumbar vertebra with sections of abdominal internal oblique muscle on each side.', 32.5, 'steaks', 'uploads/1775154495_69ceb53f57ca8.jpg'),
(6, 'Caesar ', 'A Caesar salad, also known as Caesar\'s salad, is a green salad of romaine lettuce and croutons commonly dressed with lemon juice, olive oil, eggs, Worcestershire sauce, anchovies, garlic, Dijon mustard, Parmesan and black pepper', 5.5, 'salads', 'uploads/1775154231_69ceb4371caa3.jpg'),
(7, 'Shrimp ', 'Shrimp salad is a versatile, chilled dish typically combining boiled or grilled shrimp with crunchy celery, red onion, and herbs like dill, all bound in a creamy mayonnaise or Greek yogurt dressing', 8, 'salads', 'uploads/1775154443_69ceb50bf182e.jpeg'),
(8, 'Garden', 'A garden salad is a versatile, refreshing dish typically made with a base of raw leafy greens (lettuce, romaine, spinach) combined with chopped vegetables like tomatoes, cucumbers, carrots, and onions', 6, 'salads', 'uploads/1775154674_69ceb5f289c9e.png'),
(9, 'Arugula', 'Arugula salad is a quick, peppery, and nutritious dish featuring arugula (or rocket), a Mediterranean green from the mustard family. Often served with parmesan cheese, lemon juice, olive oil, and toasted nuts, its sharp taste is favored in salads and as a topping for pastas or pizzas', 9, 'salads', 'uploads/1775154775_69ceb657dd7e8.jpg'),
(10, 'Caprese', 'Caprese salad is a simple, classic Italian dish originating from the Isle of Capri, designed to showcase fresh, high-quality ingredients. ', 5, 'salads', 'uploads/1775154859_69ceb6abe4fed.jpg'),
(11, 'Tiramisu', 'Tiramisu is an Italian dessert made with coffee-soaked ladyfingers covered with a cream of egg yolks, sugar, mascarpone, and cocoa powder', 3, 'desserts', 'uploads/1775154922_69ceb6ea00841.jpg'),
(12, 'Cheesecake', 'Cheesecake is a dessert made with a soft fresh cheese (typically cottage cheese, cream cheese, quark or ricotta), eggs, and sugar. It may have a crust or base made from crushed cookies (or digestive biscuits), graham crackers, pastry, or sometimes sponge cake.', 3.5, 'desserts', 'uploads/1775155072_69ceb780b7d53.jpg'),
(13, 'Soufflé', 'A soufflé is a baked egg dish. Combined with various other ingredients, it can be served as a savoury main dish or sweetened as a dessert', 3, 'desserts', 'uploads/1775155225_69ceb8190791f.jpeg'),
(14, 'Trileqe', 'Trileçe consists of a standard cake base that is soaked in three kinds of milk.  The milks used are evaporated, condensed, and whole milks', 2.7, 'desserts', 'uploads/1775155393_69ceb8c125bb8.webp'),
(15, 'Cupcake', 'Cupcakes are small, individual-sized cakes designed for one person, typically baked in muffin tins with paper liners and topped with frosting', 1.5, 'desserts', 'uploads/1775155460_69ceb9044ac6c.jpg'),
(16, 'Coca Cola', '', 1.2, 'drinks', 'uploads/1775155556_69ceb964e9a9e.jpg'),
(17, 'Sprite', '', 1.2, 'drinks', 'uploads/1775155628_69ceb9ac89884.webp'),
(18, 'Water (500ml)', '', 1, 'drinks', 'uploads/1775155747_69ceba2318810.jpg'),
(19, 'Fanta', '', 1.2, 'drinks', 'uploads/1775155817_69ceba696ec41.jpg'),
(20, 'Red Bull', '', 2, 'drinks', 'uploads/1775155866_69ceba9a75768.webp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
