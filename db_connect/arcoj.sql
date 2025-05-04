-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2025 at 10:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arcoj`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `title`, `description`, `image`) VALUES
(1, 'How To Setup Clangd With GCC Headers and Neovim LSP for Competitive Programming', 'I recently got frustrated with ccls because it was the only thing slowing down my blazingly fast Neovim experience. Don’t get me wrong it’s a great tool, however, the gripe I had with it is that it didn’t have single-file support, which… in competitive programming is almost always the case. Single-file support means that clangd or ccls won’t index anything. This was partially possible with ccls, however, indexing would still use an excessive amount of resources.', 'pc.png'),
(2, 'The Ultimate Guide to Competitive Programming', 'Competitive coding holds a special place in my heart. I am currently rated as an expert on Codeforces and a 4-star coder on Codechef. With constant practice and being consistent, I was able to secure a rank of Global Rank 369 in Google Code Jam I/O Women 2020 and a rank of Global Rank 1114 in Google Kickstart Round C 2020. Apart from this, I have secured Global Ranks of 97, 462 in CodeForces round 713 and 642 (Div 3) and 140, 220 in CodeChef July and Feb cook-off rounds 2020(Div 2) respectively.', 'blog.png'),
(3, 'Test', 'Test check', 'blog.png');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `message` text NOT NULL,
  `from_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `problem`
--

CREATE TABLE `problem` (
  `problem_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `input` text NOT NULL,
  `output` text NOT NULL,
  `test_input` text NOT NULL,
  `test_output` text NOT NULL,
  `difficulty` varchar(55) NOT NULL,
  `example` text NOT NULL,
  `editorial` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `problem`
--

INSERT INTO `problem` (`problem_id`, `title`, `description`, `input`, `output`, `test_input`, `test_output`, `difficulty`, `example`, `editorial`) VALUES
(1, 'Subtraction', 'Subtract two numbers.', 'The first row will take two integers.', 'second row will print their subtraction.', '15 -64', '79', 'Easy', 'Sample Input: 10 3 Sample Output: 7', 'link to editorial page'),
(2, 'multiplication', 'multiply two numbers.', 'The first row will take two integers.', 'second row will print their multiplication.', '15 4', '60', 'Easy', 'Sample Input: 10 3 Sample Output: 30', 'link to editorial page'),
(3, 'Division', 'Divide two numbers.', 'The first row will take two integers.', 'second row will print their Division.', '60 4', '15', 'Easy', 'Sample Input: 30 3 Sample Output: 10', 'link to editorial page'),
(4, 'Addition', 'Add two numbers.', 'The first row will take two integers.', 'second row will print their sum.', '15 -64', '-49', 'Easy', 'Sample Input: 2 3 Sample Output: 5', 'link to editorial page'),
(5, 'Watermelon', 'One hot summer day Pete and his friend Billy decided to buy a watermelon. They chose the biggest and the ripest one, in their opinion. After that the watermelon was weighed, and the scales showed w kilos. They rushed home, dying of thirst, and decided to divide the berry, however they faced a hard problem.\r\n\r\nPete and Billy are great fans of even numbers, that\'s why they want to divide the watermelon in such a way that each of the two parts weighs even number of kilos, at the same time it is not obligatory that the parts are equal. The boys are extremely tired and want to start their meal as soon as possible, that\'s why you should help them and find out, if they can divide the watermelon in the way they want. For sure, each of them should get a part of positive weight.\r\n\r\n\r\nInput:\r\nThe first (and the only) input line contains integer number w (1 ≤ w ≤ 100) — the weight of the watermelon bought by the boys.\r\n\r\nOutput:\r\nPrint YES, if the boys can divide the watermelon into two parts, each of them weighing even number of kilos; and NO in the opposite case.', '8', 'YES', '2', 'NO', 'Easy', 'For example, the boys can divide the watermelon into two parts of 2 and 6 kilos respectively (another variant — two parts of 4 and 4 kilos).', 'Problem Summary:\r\nPete and Billy want to divide a watermelon weighing w kilos into two positive parts, both of which must be even numbers. Your task is to determine if it\'s possible to divide the watermelon in this manner.\r\n\r\nKey Observations:\r\nEven Numbers: Only even numbers can be divided further into other even numbers (e.g., 6 can be split into 2 and 4).\r\nMinimum Weight: The smallest even watermelon weight that can be split into two positive even parts is 4 (2 + 2). Any weight less than 4 or an odd weight cannot satisfy the condition.\r\n\r\nApproach:\r\nCheck if w is even (w % 2 == 0) and greater than or equal to 4 (w >= 4).\r\nIf both conditions are true, print YES; otherwise, print NO.\r\n\r\nCode:(python)\r\n\r\nw = int(input())\r\nif w % 2 == 0 and w >= 4:\r\n    print(\"YES\")\r\nelse:\r\n    print(\"NO\")\r\n\r\n\r\n\r\nExplanation of Example:\r\nFor w = 8:\r\n8 is even (8 % 2 == 0).\r\n8 is greater than or equal to 4.\r\nSo, it\'s possible to divide 8 into two even parts (e.g., 2 and 6 or 4 and 4).\r\nOutput: YES\r\n'),
(6, 'Soldier and Bananas', 'A soldier wants to buy w bananas in the shop. He has to pay k dollars for the first banana, 2k dollars for the second one and so on (in other words, he has to pay i·k dollars for the i-th banana).\r\n\r\nHe has n dollars. How many dollars does he have to borrow from his friend soldier to buy w bananas?', 'The first line contains three positive integers k, n, w (1  ≤  k, w  ≤  1000, 0 ≤ n ≤ 109), the cost of the first banana, initial number of dollars the soldier has and number of bananas he wants.', 'Output one integer — the amount of dollars that the soldier must borrow from his friend. If he doesn\'t have to borrow money, output 0.', '1 2 1', '0', 'Medium', 'Input: 3 17 4\r\nOutput: 13', 'We can easily calculate the sum of money that we need to buy all the bananas that we want, let\'s name it x.\r\n\r\nIf n >  = x the answer is 0, because we don\'t need to borrow anything.\r\n\r\nOtherwise the answer is x - n.');

-- --------------------------------------------------------

--
-- Table structure for table `problem_status`
--

CREATE TABLE `problem_status` (
  `id` int(11) NOT NULL,
  `problem_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `verdict` varchar(30) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `problem_status`
--

INSERT INTO `problem_status` (`id`, `problem_id`, `user_id`, `verdict`, `time`) VALUES
(50, 4, 11, 'Wrong Answer', '2025-01-29 03:10:05'),
(51, 4, 11, 'Accepted', '2025-01-29 03:10:14'),
(52, 2, 11, 'Accepted', '2025-01-29 03:24:53'),
(53, 2, 11, 'Wrong Answer', '2025-01-29 03:25:11'),
(54, 2, 11, 'Wrong Answer', '2025-01-29 03:25:39'),
(55, 2, 11, 'Wrong Answer', '2025-01-29 03:25:49'),
(56, 2, 11, 'Accepted', '2025-01-29 03:26:02'),
(57, 2, 11, 'Accepted', '2025-01-29 03:33:55'),
(58, 1, 11, 'Accepted', '2025-01-29 03:34:11'),
(59, 3, 11, 'Accepted', '2025-01-29 03:34:27'),
(60, 5, 11, 'Wrong Answer', '2025-01-29 05:55:11'),
(61, 5, 11, 'Wrong Answer', '2025-01-29 05:55:11'),
(62, 4, 11, 'Accepted', '2025-01-29 05:56:33'),
(63, 5, 11, 'Accepted', '2025-01-29 06:04:01'),
(64, 6, 11, 'Wrong Answer', '2025-01-29 06:10:04'),
(65, 6, 11, 'Accepted', '2025-01-29 06:10:20'),
(66, 4, 1, 'Accepted', '2025-01-29 08:34:40'),
(67, 6, 6, 'Accepted', '2025-01-29 08:36:56'),
(68, 5, 6, 'Accepted', '2025-01-29 08:39:42'),
(69, 5, 6, 'Accepted', '2025-01-29 08:40:09'),
(70, 5, 6, 'Wrong Answer', '2025-01-29 08:40:21'),
(71, 5, 1, 'Accepted', '2025-01-29 09:16:27'),
(72, 5, 1, 'Accepted', '2025-01-29 09:34:00'),
(73, 5, 1, 'Accepted', '2025-01-29 09:34:29'),
(74, 5, 1, 'Accepted', '2025-01-29 09:34:32'),
(75, 5, 1, 'Accepted', '2025-01-29 09:34:35'),
(76, 5, 1, 'Wrong Answer', '2025-01-29 09:34:56'),
(77, 5, 4, 'Accepted', '2025-01-29 10:00:56'),
(78, 5, 4, 'Wrong Answer', '2025-01-29 10:01:06'),
(79, 1, 1, 'Accepted', '2025-05-04 06:15:05'),
(80, 2, 1, 'Accepted', '2025-05-04 08:11:19'),
(81, 2, 1, 'Wrong Answer', '2025-05-04 08:11:28'),
(82, 1, 1, 'Accepted', '2025-05-04 08:17:08'),
(83, 1, 1, 'Accepted', '2025-05-04 08:19:45');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `handle` varchar(25) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `university` varchar(55) NOT NULL,
  `picture` text NOT NULL,
  `name` varchar(55) NOT NULL,
  `rating` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `handle`, `email`, `password`, `university`, `picture`, `name`, `rating`, `date`) VALUES
(1, 'tourist', 'tourist@gmail.com', 'tourist007', '', '', '', 80, '2025-05-04 08:11:19'),
(2, 'jiangly', 'jiangly@gmail.com', 'jiangly007', '', '', '', 20, '2025-01-29 08:31:27'),
(3, 'Benq', 'Benq@gmail.com', 'Benq007', '', '', '', 30, '2025-01-29 08:31:47'),
(4, 'Ormlis', 'Ormlis@gmail.com', 'Ormlis007', '', '', '', 10, '2025-01-29 10:00:56'),
(5, 'Um_nik', 'Um_nik@gmail.com', 'Um_nik007', '', '', '', 10, '2025-01-29 08:31:31'),
(6, 'awoo', 'awoo@gmail.com', 'awoo007', '', '', '', 20, '2025-01-29 08:39:42'),
(7, 'ksun48', 'ksun48@gmail.com', 'ksun48007', '', '', '', 20, '2025-01-29 08:31:34'),
(8, 'TheScrasse', 'TheScrasse@gmail.com', 'TheScrasse', '', '', '', 0, '2025-01-28 20:11:40'),
(9, 'gamegame', 'gamegame@gmail.com', 'gamegame007', '', '', '', 50, '2025-01-29 08:31:41'),
(10, 'YouKn0wWho', 'YouKn0wWho@gmail.com', 'YouKn0wWho007', '', '', '', 0, '2025-01-28 20:11:48'),
(11, 'ecnerwala', 'ecnerwala@gmail.com', 'ecnerwala007', '', '', '', 60, '2025-01-29 06:10:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `from_id` (`from_id`);

--
-- Indexes for table `problem`
--
ALTER TABLE `problem`
  ADD PRIMARY KEY (`problem_id`);

--
-- Indexes for table `problem_status`
--
ALTER TABLE `problem_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prblem_id` (`problem_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `problem`
--
ALTER TABLE `problem`
  MODIFY `problem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `problem_status`
--
ALTER TABLE `problem_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`from_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `problem_status`
--
ALTER TABLE `problem_status`
  ADD CONSTRAINT `problem_status_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `problem_status_ibfk_2` FOREIGN KEY (`problem_id`) REFERENCES `problem` (`problem_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
