-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2024 at 09:54 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trek_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `trek_destinations`
--

CREATE TABLE `trek_destinations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `daily_activity` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `page_filename` varchar(255) DEFAULT NULL,
  `best_time` varchar(100) DEFAULT NULL,
  `transportation` text DEFAULT NULL,
  `grade_id` int(11) DEFAULT NULL,
  `background_video` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trek_destinations`
--

INSERT INTO `trek_destinations` (`id`, `name`, `description`, `location`, `duration`, `daily_activity`, `image`, `page_filename`, `best_time`, `transportation`, `grade_id`, `background_video`) VALUES
(1, 'Everest Base Camp Trek', 'Everest Base Camp Trek: Offering breathtaking scenery, the Everest Base Camp Trek takes you from lush forests to rugged mountain terrain.  Starting with a thrilling flight to Lukla, trekkers embark on a journey through iconic stops like Namche Bazaar, Tengboche Monastery, and Dingboche.', 'Solukhumbu, Nepal', '17-18 days', '4-6 hrs', 'everest.jpg', 'Everest.php', 'spring, autumn', 'flight, Jeep', 3, 'Everest.mp4'),
(2, 'Annapurna Circuit Trek', 'Situated in Nepal\'s Himalayas, boasts some of the world\'s highest peaks, including Annapurna at 8,091 meters. Its stunning landscapes, diverse flora and fauna, and rich cultural heritage make it a prime destination for trekkers.', 'Annapurna, Nepal', '10-12 days', '4-7 hrs', 'annapurna.jpg', 'Ac.php', 'spring, autumn', 'Jeep', 2, ''),
(3, 'Langtang Valley Trek', 'This region is in the Himalayas of Nepal, known for its breathtaking landscapes, alpine forests, and majestic peaks. Langtang National Park, one of the country\'s first designated national parks, is renowned for its rich biodiversity.', 'Langtang, Nepal', '13-15 days', '4-5 hrs', 'langtang.jpg', 'LV.php', 'spring, autumn', 'Jeep', 2, ''),
(4, 'Makalu Base Camp Trek', 'Makalu is the fifth highest mountain in the world, located on the border between Nepal and Tibet. Standing at 8,485 meters (27,838 feet) above sea level, it is part of the Mahalangur Himalaya range in the eastern Himalayas.', 'Makalu, Nepal', '17-18 days', '4-6 hrs', 'makalu.jpg', 'MBC.php', 'spring, autumn', 'Jeep', 3, ''),
(5, 'Rara Lake Trek', 'Located in the remote Karnali Province of Nepal, Rara Lake is the largest and deepest freshwater lake in the country. Situated at an altitude of approximately 2,990 meters (9,810 feet) above sea level, this pristine lake offers stunning natural beauty.', 'Rara, Nepal', '8-9 days', '4-5 hrs', 'rara.jpg', 'rara.php', 'spring, autumn', 'flight, Jeep', 2, ''),
(6, 'Dolpo Trek', 'Dolpa is a remote and culturally rich region located in the northwestern part of Nepal, bordering Tibet. Renowned for its rugged landscapes, ancient Tibetan Buddhist monasteries, and unique cultural heritage, Upper Mustang offers a glimpse into a bygone era.', 'Dolpo, Nepal', '19-23 days', '4-7 hrs', 'dolpo.jpg', 'dolpo.php', 'spring, autumn', 'flight, Jeep', 3, ''),
(7, 'Manasalu Trek', 'The ... Circuit Trek is one of the most secluded Nepal treks leading to the border area of Nepal and China. It has been gaining steady popularity among trekkers but has yet to be unspoiled and is off-beat compared to other trekking trails in Nepal.', 'Manasalu, Nepal', '17-18 days', '4-6 hrs', 'M.jpg', NULL, 'spring, autumn', 'Jeep', 3, ''),
(8, 'Mardi Himal Trek', 'Mardi Himal Trek is a less strenuous trek. It is one of the shorter Treks in Nepal. It is suitable for those who wish to enjoy nature up close at a comfortable pace. It is perfect for anyone seeking a more moderate hike.', 'Mardi Himal, Nepal', '10-12 days', '3-4 hrs', 'MH.jpg', NULL, 'spring, autumn', 'Jeep', 2, ''),
(9, 'Kanchanjunga Trek', 'kanchenjunga is ideal for trekkers seeking an off-the-beaten-path adventure. Due to its remoteness, the trekking trails offer an authentic feel of the Himalayas with breathtaking natural views.', 'Kanchanjunga, Nepal', '13-15 days', '4-6 hrs', 'K.jpg', NULL, 'spring, autumn', 'flight, Jeep', 2, ''),
(10, 'Pikey Peak Trek', 'The Pikey Peak Trek is an underrated trek of the Everest region. It remains a primarily untouched track, with very few people trailing these paths. It offers a unique experience with minimal accommodation facilities compared to other trekking routes in Nepal.', 'Pikey Peak, Nepal', '7-8 days', '4-5 hrs', 'PP.jpg', NULL, 'spring, autumn', 'Jeep', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trek_destinations`
--
ALTER TABLE `trek_destinations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grade_id` (`grade_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trek_destinations`
--
ALTER TABLE `trek_destinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
