-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2024 at 11:59 AM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Username`, `Password`) VALUES
(1, 'admin', 'admin'),
(2, 'admin1', 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `grade_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`grade_id`, `type`) VALUES
(1, 'Beginner'),
(2, 'Advanced'),
(3, 'Expert');

-- --------------------------------------------------------

--
-- Table structure for table `guides`
--

CREATE TABLE `guides` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guides`
--

INSERT INTO `guides` (`ID`, `Name`, `Description`, `Image`) VALUES
(1, 'Counselor Elara Khan', 'The Insightful Counselor. Offering emotional support and guidance, Elara helps the crew cope with the stresses of space exploration.', 'T.jpg'),
(2, 'Lieutenant Jackson Hayes', 'The Skilled Navigator. With precision and nerve, Jackson pilots the ship through treacherous terrain, navigating asteroid fields.', 'o.jpg'),
(3, 'Ensign Kira Vasquez', 'The Multilingual Diplomat. Fluent in various languages and communication protocols, Kira bridges cultural gaps and facilitates diplomacy.', 'Y.jpg'),
(4, 'Commander Rylan Pierce', 'The Strategic Thinker. Quick to assess threats and devise solutions, Commander Pierce excels in combat and defense.', 'p.jpg'),
(5, 'Lieutenant Commander Liara Sato', 'The Compassionate Healer. Skilled in both medicine and psychology, Liara offers care and support to the crew.', 'p1.jpg'),
(6, 'Dr. Aiden Patel', 'The Technological Genius. Masterful with machinery and technology, Dr. Patel keeps the ship running smoothly.', 'no.jpg'),
(7, 'Captain Marcus Kane', 'The Charismatic Leader. Commanding respect with his presence, Captain Kane leads the crew with a blend of charisma and authority.', 'lo.jpg'),
(8, 'Talara N\'Vek', 'The Logical Analyst. Always equipped with a tricorder, Talara approaches new worlds with a logical and inquisitive mindset.', 'mo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `include_exclude`
--

CREATE TABLE `include_exclude` (
  `id` int(11) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `include_exclude`
--

INSERT INTO `include_exclude` (`id`, `category`, `details`) VALUES
(1, 'Included', 'Arrival & Departure: Airport - Hotel transfers – Airport (Pick Up and Drop)\nHotel Accommodation in Kathmandu: 4 nights hotel in Kathmandu on bed & breakfast Basis- Twin Bedroom\nWelcome Dinner: One Welcome Dinner in Kathmandu with the Office’s Staffs\nPermit: All necessary paper works: Sagarmatha National Park permits, TIMS permit & conservation entry fee\nInsurance: Insurance for all involved Nepalese staffs during\nTrekking Map: Everest Region Trekking map\nMember transportation: Air Transportation: (Domestic Flight) Fly from Kathmandu – Lukla & returning Lukla - Kathmandu, with Guide as per itinerary. Stuffs Transportation: Necessary all equipment Transportation for all.\nMember Luggage: Up to 15 Kg per member for personal baggage during the trek carrying by porters\nLodging & Food: Food 3 meals a day (BDL; including tea and coffee) along with accessible accommodation at Hotel/Lodge during the trek\nPorter: Porters (2 trekkers: 1 porter) during the trek\nStaff Salary and allowance\nComprehensive Medical kit'),
(2, 'Not-included', 'Air Fare: International flight fare (to/from Kathmandu) Personal transportation beyond the aforementioned programs\r\nNepal entry Visa fee\r\nLunch & Dinner: Lunch & dinner in during the stay in Kathmandu (also in case of early return from Trekking than the scheduled itinerary)\r\nExtra night in Kathmandu: Extra nights’ accommodation in Kathmandu. In case of early arrival or late departure, early return from Trekking (due to any reason) than the scheduled itinerary\r\nRescue Evacuation: Medical Insurance and emergency rescue evacuation cost if required. (Rescue, Repatriation, Medication, Medical Tests and Hospitalization costs.)\r\nPersonal Expenses: Telephone, Internet, battery recharge, shower, Laundry, any Alcoholic beverages, Boiled water, beer, coke, and Clothing, Packing Items or Bags, Personal Medical Kit, Insurance, Personal Trekking Gears & Equipment\r\n$50 USD for extra porter per day (If extra porter demanded)\r\nTips: Tips for Guide, porters and staffs\r\nNote: At times Climbers have been delayed in Lukla awaiting return to KTM. During these times when Airplane cannot fly, Helicopter flight can be arranged (subject to their availability). The cost is approximately $400 paid by the trekker\r\nAny other item not listed in “Price Includes” section');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `package_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `facility` varchar(2255) DEFAULT NULL,
  `price` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`package_id`, `name`, `facility`, `price`) VALUES
(1, 'Basic', '- Accommodation: Upgraded accommodation options, including better-equipped lodges or standard hotels at certain points of the trek.                                 \n                                                                   - Meals: More variety in meals, including additional snacks and beverages.\n- Guide and Porter: Experienced guide with more extensive knowledge of the region and additional porter support for comfort.\n- Permits and Fees: Necessary permits and entry fees to national parks or conservation areas.\n- Transportation: Basic transportation arrangements to and from the trekking starting point.\n- Safety Gear: Basic safety equipment and first aid supplies\n', '999$'),
(2, 'Advanced', 'Accommodation: Upgraded accommodation options, including better-equipped lodges or standard hotels at certain points of the trek.\nMeals: More variety in meals, including additional snacks and beverages.\nGuide and Porter: Experienced guide with more extensive knowledge of the region and additional porter support for comfort.', '1999$'),
(3, 'Premium', 'Accommodation: Premium accommodation options, such as luxury lodges or boutique hotels with better amenities.\nMeals: High-quality meals with more extensive menu options, including special dietary preferences catered for.\nGuide and Porter: Highly experienced and knowledgeable guide with personalized attention and dedicated porter service.\nPermits and Fees: VIP processing for permits and fees, including exclusive access to certain areas.\nTransportation: Luxury transportation options, such as private vehicles or chartered flights.\nGear Rental: Comprehensive gear rental service with top-of-the-line equipment included.\nAdditional Activities: Exclusive guided tours, cultural experiences, or adventure activities.\nWellness Services: Spa treatments, yoga sessions, or other wellness activities for relaxation and rejuvenation after trekking.\nSouvenirs and Gifts: Complimentary souvenirs or gifts as part of the package.', '2999$');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNum` bigint(20) NOT NULL,
  `birthDate` date NOT NULL,
  `gender` char(1) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `postalCode` int(11) NOT NULL,
  `extraFacilities` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `selected_trek` varchar(255) DEFAULT NULL,
  `selected_package` varchar(255) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  `rejection_reason` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`id`, `fullName`, `email`, `phoneNum`, `birthDate`, `gender`, `address1`, `address2`, `country`, `city`, `region`, `postalCode`, `extraFacilities`, `created_at`, `selected_trek`, `selected_package`, `status`, `rejection_reason`) VALUES
(1, 'Aayush', 'khadgiayush418@gmail.com', 98227328299, '2024-05-01', 'm', 'Shivapuri', '', 'Nepal', 'Kathmandu', 'Bagmati', 44600, '', '2024-05-13 09:51:27', NULL, NULL, 'Confirm', NULL),
(2, 'Aayush Khadgi', 'khadgiayush418@gmail.com', 9813700762, '2024-05-07', 'm', 'Kathmandu', 'Kathmandu', 'Nepal', 'Kathmandu', 'Bagmati', 44600, 'I want to extend my trekking days for two or one day extra.', '2024-05-15 12:24:24', 'Everest Base Camp Trek', '2', 'Pending', NULL),
(3, 'Pemba Sherpa', 'hello123@gmail.com', 1234567890, '2024-05-01', 'm', 'Kathmandu', 'Kathmandu', 'Nepal', 'Kathmandu', 'Bagmati', 44600, 'I want to extra trekking products.', '2024-05-17 06:43:27', 'Dolpo Trek', '1', 'Pending', NULL),
(4, 'Pemba Sherpa', 'pembasherpa@gmail.com', 9282192892, '2024-05-14', 'f', 'Kathmandu', 'Kathmandu', 'Malaysia', 'Kathmandu', 'Bagmati', 44600, 'I want to extra trekking products.', '2024-05-18 17:03:24', 'Makalu Base Camp Trek', '3', 'Reject', 'Dont know'),
(7, 'Pemba Sherpa', 'pembasherpa@gmail.com', 9282192892, '2024-04-30', 'm', 'Kathmandu', 'Kathmandu', 'Malaysia', 'Kathmandu', 'Bagmati', 44600, '', '2024-05-19 05:50:49', 'Manasalu Trek', '2', 'Pending', NULL),
(9, 'Test', 'testa@gmail.com', 9282192892, '2024-05-02', 'm', 'Kathmandu', 'Kathmandu', 'Malaysia', 'Kathmandu', 'Bagmati', 44600, 'test', '2024-05-19 06:11:33', 'Langtang Valley Trek', '2', 'Confirm', NULL),
(11, 'Aayush', 'khadgiayush418@gmail.com', 98227328299, '2024-04-29', 'm', 'Shivapuri', 'Kathmandu', 'Nepal', 'Kathmandu', 'Bagmati', 44600, 'Test', '2024-05-19 06:13:00', 'Langtang Valley Trek', '3', 'Reject', 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `trek_destinations`
--

CREATE TABLE `trek_destinations` (
  `id` int(11) NOT NULL,
  `active` tinyint(4) DEFAULT 1,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `daily_activity` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `page_filename` varchar(255) DEFAULT NULL,
  `best_time` varchar(100) DEFAULT NULL,
  `transportation` text DEFAULT NULL,
  `background_video` varchar(255) DEFAULT NULL,
  `map_image` varchar(100) DEFAULT NULL,
  `daily_schedule` text DEFAULT NULL,
  `icon_Image` varchar(30) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `Accommodation` varchar(20) DEFAULT NULL,
  `Max_Altitude` int(11) DEFAULT NULL,
  `grade_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trek_destinations`
--

INSERT INTO `trek_destinations` (`id`, `active`, `name`, `description`, `location`, `duration`, `daily_activity`, `image`, `page_filename`, `best_time`, `transportation`, `background_video`, `map_image`, `daily_schedule`, `icon_Image`, `package_id`, `Accommodation`, `Max_Altitude`, `grade_id`, `status`) VALUES
(1, 1, 'Everest Base Camp Trek', 'Everest Base Camp trek offers breathtaking scenery, from lush forests to rugged mountain terrain. Starting with a flight to Lukla, trekkers pass through iconic stops like Namche Bazaar, Tengboche Monastery, and Dingboche.', 'Solukhumbu, Nepal', '17-18 days', '4-6 hrs', 'everest.jpg', 'Everest.php', 'spring, autumn', 'flight, Jeep', 'Everest.mp4', 'mapEverest.png', '\r\n    *       Day 01 Arrival In Tribhuvan International Airport, Kathmandu and transfer to Hotel\r\n    *       Day 02 Preparation day in Kathmandu, Gear check and safety/trip briefing, Team meal\r\n    *       Day 03 Flight to Lukla at 2846m and then a stunning short trek to Phakding 3-4 hours\r\n    *       Day 04 Trek from Phakding to Namche 5-6 hours, crossing the famous hillary bridge with a nice climb into Namche Bazaar for a team dinner.\r\n    *       Day 05 Acclimatise day in Namche, a short 2-3 hour Hike to Everest View Hotel for lunch, and then a visit to Sagarmatha National Park Museum 1-2 hours,\r\n    *       Day 06 Trek from Namche to Debuche via a visit to Tengbouche Monastery 4-6 hours with a lunch, approx 1 hour\r\n    *       Day 07 Trek from Debuche to Dingbouche 4-6 hours with a lunch stop, approx 1 hour\r\n    *       Day 08 Acclimatize day in Dingbouche; Hike up to Nagarjun Hill 4-5 hours with an incredible view of Ama Dablam reaching 5000+meters in elevation this day, followed by team dinner and rest in Dingbouche.\r\n    *       Day 09 Trek from Dingbouche to Lobouche via Thukla Everest Memorial Pass, 4-6 hours with a lunch, approx 1 hour\r\n    *       Day 10 Early morning trek from Lobouche to Gorakshep to Everest Basecamp 5364meters and back to Gorakshep for overnight stay 6-8 hours\r\n    *       Day 11 Early morning hike to Kalapathar and trek to Pheriche 4-6 hours with a lunch, approx 1 hour\r\n    *       Day 12 Trek from Pheriche to Namche 6-8 hours with a lunch, approx 1 hour\r\n    *       Day 13 Trek from Namche to Lukla 4-6 hours with a lunch, approx 1 hour spend the night in Lukla the worlds highest running airport.\r\n    *       Day 14 Fly back to Kathmandu and relax and unwind from a memorable trip\r\n    *       Day 15 Leisure day in Kathmandu sightseeing and exploring.\r\n    *       Day 16 Departure day and dropp off at Tribhuvan International Airport\r\n', 'location.png', 2, 'Hotels, Lodges', 5545, 3, 1),
(2, 1, 'Annapurna Circuit Trek', 'Situated in Nepal\'s Himalayas, boasts some of the world\'s highest peaks, including Annapurna at 8,091 meters. Its stunning landscapes, diverse flora and fauna, and rich cultural heritage make it a prime destination for trekkers.', 'Annapurna, Nepal', '10-12 days', '4-7 hrs', 'annapurna.jpg', 'Ac.php', 'spring, autumn', 'Jeep', '', 'AnnapurnaMap.png', '\r\n    * Day 01: Arrival In Tribhuvan International Airport, Kathmandu and transfer to Hotel\r\n    * Day 02: Fly to Pokhara and drive to Syauli Bazzar and trek to Ghandruk\r\n    * Day 03: Trek from Ghandruk to Chhomrong\r\n    * Day 04: Trek from Chhomrong to Dovan\r\n    * Day 05: Trek from Dovan to Macchapuchre Base Camp (MBC)\r\n    * Day 06: Trek from Macchapuchre Base Camp (MBC) to Annapurna Base Camp (ABC); explore Annapurna South Basecamp\r\n    * Day 07: Early morning sunrise view on Annapurna range and trek back to Bamboo\r\n    * Day 08: Trek from Bamboo to Jhinu Danda; Visit Jhinu Danda Hot Spring\r\n    * Day 09: Trek from Jhinu Danda to Siwai and drive back to Pokhara; transfer to Hotel\r\n    * Day 10: Leisure day in Pokhara; Sightseeing in Pokhara city\r\n    * Day 11: Fly back to Kathmandu and transfer to Hotel; free day\r\n    * Day 12: Final departure', 'accomodation.png', 2, 'Hotels', 5416, 2, 1),
(3, 1, 'Langtang Valley Trek', 'Langtang is a region in the Himalayas of Nepal, known for its breathtaking landscapes, alpine forests, and majestic peaks. Langtang National Park, one of the country\\\'s first designated national parks, renowned for its rich biodiversity.', 'Langtang, Nepal', '13-15 days', '4-5 hrs', 'langtang.jpg', 'LV.php', 'spring, autumn', 'Jeep', '', 'AnnapurnaMap.png', '*       Day 01 ARRIVE IN KATHMANDU, All trekkers need to organise their own flights to Kathmandu International Airport (KTM). From Kathmandu Airport we will arrange a private transfer to your hotel. That night you will meet your local Kandoo representative and have a full pre-trek briefing.\n*       Day 02 DRIVE TO SYABRU BESI, 8 hours drive to Syabru Besi. After driving for 30km, we approach pristine villages on the banks of the river Trishuli.\n*       Day 03 TREK TO LAMA HOTEL, start our trek by traversing the ridge on Syabru Besi\'\'s main road and soon reach Ghopcha Khola. we will cross to the north bank of the Langtang Khola amid the spectacular vistas of cascading waterfalls. On reaching 2748 metres, we arrive at Lama Hotel where we will spend the night.\n*       Day 04 TREK TO LANGTANG VILLAGE, we ascend above the Langtang Khola where the trail becomes steeper. From here we can see the beautiful Langtang Lirung rising up to 7246m.\n*       Day 05 TREK TO KYANGJIN, Today, the trail skirts gradually through rich yak pastures and interesting traditional villages of Muna and Singdun. We cross a wooden cantilever bridge and reach a wide valley after climbing across the glacial moraine. Finally, we climb up through the mountain pass to reach Kyangjin Gompa where there is a small monastery and a cheese factory.\n*       Day 06 EXPLORATION OF KYANGJIN, The furthest point of our trek, we will spend the day in Kyangjin where you will get the opportunity to explore the ancient monastery and cheese factory and just generally soak up the atmosphere. If you are feeling strong you can choose to climb Kyangjin Ri (4600m) from where you will get amazing views of the snow-capped peaks and glaciers.\n*       Day 07 TREK TO LAMA HOTEL, From Kyangjin, we take the route back to Lama Hotel. As we retrace our steps, we follow the Langtang Khola to Langtang village and on to Ghora Tabela. We stop briefly for lunch and thereafter continue the steep descent to Lama Hotel.\n*       Day 08 TREK TO SYABRU BESI, From Lama Hotel, we head back to Syabru Besi where we will have the opportunity to get an insight into the ancient culture and customs of the Tamang community.\n*       Day 09 DRIVE TO KATHMANDU, Today we will drive back to Kathmandu. You stay overnight in a hotel in Kathmandu.\n*       Day 10 DEPARTURE FROM KATHMANDU, We will collect you from your hotel and transfer you to Kathmandu Airport for your departing flight.', 'grade.png', 3, 'Hotels, Lodges', 7227, 2, 1),
(4, 1, 'Makalu Base Camp Trek', 'Makalu is the fifth highest mountain in the world, located on the border between Nepal and Tibet. Standing at 8,485 meters (27,838 feet) above sea level, it is part of the Mahalangur Himalaya range in the eastern Himalayas.', 'Makalu, Nepal', '17-18 days', '4-6 hrs', 'makalu.jpg', 'MBC.php', 'spring, autumn', 'Jeep', NULL, 'makaluMap.png', '\n*       Day 01 ARRIVE IN KATHMANDU,      \n        \nAll trekkers need to organise their own flights to Kathmandu International Airport (KTM). From Kathmandu Airport we will arrange a private transfer to your hotel. That night you will meet your local Kandoo representative and have a full pre-trek briefing.\n*       Day 02 Fly to Tumlingtar and Drive to Num (1505m.|4937ft.)\n*       Day 03 Trek from Num to Seduwa (1530m.|5019ft., 6-7 hours)\n*       Day 04 Trek to Tashi Goan (2065m|6774ft., 5 hour)\n*       Day 05 Trek to Khongma Danda (3562m.|11686ft., 6-7 hours)\n*       Day 06 Trek to Khongma Danda to Dobate (3550m.| 11646ft., 6-7 hours)\n*       Day 07 Trek to Dobate to Yangle Kharka (3610m.|1184ft., 5-6 hours)\n*       Day 08 Trek from Yangle Kharka to Langmale Kharka (4510m.|14796ft., 7-8 hours)\n*       Day 09 Acclimatization Day\n*       Day 10 Langmale Kharka to Makalu Base Camp (4870m.|15977ft., 6-7 hours)\n*       Day 11 Explore Makalu Base Camp (4870m.|15977ft)\n*       Day 12 Trek back to Yangle Kharka (3610m.|11843ft., 6-7 hours)\n*       Day 13 Trek from Yangle Kharka to Dobate (3550m.|11646ft., 6 hours)\n*       Day 14 Dobate to Khongma Danda/ Danda Kharka (3562m.|11686ft., 6-7 hours)\n*       Day 15 Khongma Danda to Seduwa (1530m.|5019ft., 6-7 hours)\n*       Day 16 Trek and Drive to Tumlingtar (518m.|1699ft., 7-8 hours) Fly back to Kathmandu (1400m.|4592ft).', 'duration.png', 2, 'Hotels, Lodges', 8485, 3, 1),
(5, 1, 'Rara Lake Trek', 'Located in the remote Karnali Province of Nepal, Rara Lake is the largest and deepest freshwater lake in the country. Situated at an altitude of approximately 2,990 meters (9,810 feet) above sea level, this pristine lake offers stunning natural beauty.', 'Rara, Nepal', '8-9 days', '4-5 hrs', 'rara.jpg', 'rara.php', 'spring, autumn', 'flight, Jeep', '', 'raraMap.png', '\r\n*       Day 01 ARRIVE IN KATHMANDU, All trekkers need to organise their own flights to Kathmandu International Airport (KTM). From Kathmandu Airport we will arrange a private transfer to your hotel. That night you will meet your local Kandoo representative and have a full pre-trek briefing.\r\n*       Day 02 Half day sightseeing tour of Kathmandu. Hotel Accommodation.\r\n*       Day 04 Fly from Kathmandu to Nepalgunj (150 m/490 ft) 1 hr, Hotel Accommodation.\r\n*       Day 05 Fly from Nepalgunj to Jumla (2,540 m/8,334 ft) 20 minutes, Tea House Accommodation.\r\n*       Day 06 Trek from Jumla to Chere Chaur (3055 m/10,023 ft) Tea House Accommodation\r\n*       Day 07 Chere Chaur to Chalachaur (2980 m/9,777 ft) 5-6 hrs, Tea House Accommodation.\r\n*       Day 08 Chalachaur to Sinja Valley (2490 m/ 8167 ft) Tea House Accommodation.\r\n*       Day 09 Sinja to Ghorosingha (3050 m/10007 ft) Tea House Accommodation.\r\n*       Day 10 Ghorosingha to Rara Lake (3010 m/9876 ft) 6-7 hrs, Tea House Accommodation.\r\n*       Day 11 Explore Rara Lake to explore the beauty of the lake and backdrop of the lake, communicate with the local people and learn their culture and ethnicity in detail. Tea House Accommodation.\r\n*       Day 12 Rara Lake to Pina (2440 m/ 8006 ft) 4-5 hrs, Tea House Accommodation.\r\n*       Day 13 Trek ends: Bumra to Jumla (2540 m/8334 ft) 5-6 hrs, Tea House Accommodation.\r\n*       Day 14 Fly to Nepalgunj, Fly to Kathmandu, Hotel Accommodation.\r\n*       Day 15 Final departure\r\n', 'daily-activity.png', 2, 'Lodges', 2990, 1, 1),
(6, 1, 'Dolpo Trek', 'Dolpa is a remote and culturally rich region located in the northwestern part of Nepal, bordering Tibet. Renowned for its rugged landscapes, ancient Tibetan Buddhist monasteries, and unique cultural heritage, Upper Mustang offers a glimpse.', 'Dolpo, Nepal', '19-23 days', '4-7 hrs', 'dolpo.jpg', 'dolpo.php', 'spring, autumn', 'flight, Jeep', '', 'dolpoMap.png', '\n*Day 01 Arrival In Tribhuvan International Airport, Kathmandu and transfer to Hotel\n*Day 02 Preparation day in Kathmandu, Gear check and safety/trip briefing, Team meal\n*Day 03 Fly Kathmandu to Nepalgunj.\n*Day 04 Fly Nepalgunj to Juphal (2475 m); Trek to Dunai (2140m/ 3hrs).\n* Day 05 Trek Dunai to Chhepka (2687 m/ 6hrs)\n*       Day 06 Trek Chhepka to Chunuwar / Amchi Hospital (3000 m/ 6hrs).\n*       Day 07 Trek to Phoksundo Lake (3600m/ 5-6hrs).\n*       Day 08 Rest day at Phoksundo Lake.\n*       Day 09 Trek Phoksundo to Sallaghari (3630m/ 5-6 hrs).\n*       Day 10 Trek Sallaghari to Nangdala High Camp (4717m/ 5-6 hrs).\n*       Day 11 Trek Nangdala H.C. to Shey Gompa (4343m) via Nangda LA pass (5350m/ 5-6hrs).\n*       Day 12 Trek Shey Gompa to Namgung Gompa (4360m) via Shey La Pass (5100m/ 6-7hrs).\n*       Day 13 Trek Namgong Gompa to Saldang (3770m/ 4-5hrs).\n*       Day 14 Rest day at Saldang; hike to Yangjer Gumba (4590m).\n*       Day 15 Trek to Komash Village (4060m/ 6 hrs).\n*       Day 16 Trek Komash Village to Shimen (3850m/ 6hrs).\n*       Day 17 Trek to Tinje village (4110m).\n*       Day 18 Trek Tinje Village to Yak Kharka.\n*       Day 19 Trek to Tokyu (4240m).\n*       Day 20 Trek to Juphal\n*       Day 20 Final Departure.\n', 'max-altitude.png', 3, 'Hotels', 5500, 3, 1),
(7, 1, 'Manasalu Trek', 'The Manasalu Circuit Trek is one of the most secluded Nepal treks leading to the border area of Nepal and China. It has been gaining steady popularity among trekkers but has yet to be unspoiled and is off-beat compared to other trekking trails in Nepal.', 'Manasalu, Nepal', '17-18 days', '4-6 hrs', 'M.jpg', 'manaslu.php', 'spring, autumn', 'Jeep', '', 'mapEverest.png', '*       Day 01 Arrival in Tribhuvan International Airport, Kathmandu and transfer to Hotel\n*       Day 02 Preparation day in Kathmandu, Gear check and safety/trip briefing, Team meal\n*       Day 03 Drive from Kathmandu to Soti Khola (700m) by private vehicle or bus - Approx. 7-8 hours\n*       Day 04 Trek from Soti Khola to Machha Khola (869m) - Approx. 6-7 hours\n*       Day 05 Trek from Machha Khola to Jagat (1340m) - Approx. 6-7 hours\n*       Day 06 Trek from Jagat to Deng (1860m) - Approx. 6-7 hours\n*       Day 07 Trek from Deng to Namrung (2630m) - Approx. 6-7 hours\n*       Day 08 Trek from Namrung to Samagaon (3530m) - Approx. 6-7 hours\n*       Day 09 Acclimatization day in Samagaon, optional hike to Pungyen Gompa or Manaslu Base Camp\n*       Day 10 Trek from Samagaon to Samdo (3860m) - Approx. 3-4 hours\n*       Day 11 Acclimatization day in Samdo, optional hike to Tibetan border\n*       Day 12 Trek from Samdo to Dharamsala/Larkya Phedi (4460m) - Approx. 4-5 hours\n*       Day 13 Trek from Dharamsala to Larkya La Pass (5160m) and then to Bimthang (3590m) - Approx. 8-9 hours\n*       Day 14 Trek from Bimthang to Tilije (2300m) - Approx. 5-6 hours\n*       Day 15 Trek from Tilije to Tal (1700m) - Approx. 5-6 hours\n*       Day 16 Trek from Tal to Syange and drive back to Besisahar by private vehicle\n*       Day 17 Drive from Besisahar to Kathmandu by private vehicle - Approx. 6-7 hours\n*       Day 18 Final Departure day', 'season.png', 2, 'Hotels, Lodges', 8156, 2, 1),
(8, 1, 'Mardi Himal Trek', 'Mardi Himal Trek is a less strenuous trek. It is one of the shorter Treks in Nepal. It is suitable for those who wish to enjoy nature up close at a comfortable pace. It is perfect for anyone seeking a more moderate hike.', 'Mardi Himal, Nepal', '10-12 days', '3-4 hrs', 'MH.jpg', 'mardi.php', 'spring, autumn', 'Jeep', '', 'mapEverest.png', '\r\n*       Day 01 Arrival in Tribhuvan International Airport, Kathmandu and transfer to Hotel\r\n*       Day 02 Preparation day in Kathmandu, Gear check and safety/trip briefing, Team meal\r\n*       Day 03 Drive from Kathmandu to Kande (1770m) by private vehicle or bus - Approx. 6-7 hours\r\n*       Day 04 Trek from Kande to Forest Camp (2550m) - Approx. 6-7 hours\r\n*       Day 05 Trek from Forest Camp to Low Camp (2970m) - Approx. 5-6 hours\r\n*       Day 06 Trek from Low Camp to High Camp (3540m) - Approx. 3-4 hours\r\n*       Day 07 Acclimatization day in High Camp, optional hike to Mardi Himal Base Camp (4500m) - Approx. 6-7 hours\r\n*       Day 08 Trek from High Camp to Siding Village (1280m) via Low Camp - Approx. 5-6 hours\r\n*       Day 09 Trek from Siding Village to Lumre and drive back to Pokhara by private vehicle or bus - Approx. 3-4 hours\r\n*       Day 10 Drive from Pokhara to Kathmandu by tourist bus or flight - Approx. 6-7 hours by bus or 25 minutes by flight\r\n*       Day 11 Leisure day in Kathmandu, sightseeing and exploring\r\n*       Day 12 Departure day and drop off at Tribhuvan International Airport\r\n', 'transportation.png', 3, 'Lodges', 5587, 2, 1),
(9, 1, 'Kanchanjunga Trek', 'Kanchenjunga is ideal for trekkers seeking an off-the-beaten-path adventure. Due to its remoteness, the trekking trails offer an authentic feel of the Himalayas with breathtaking natural views.', 'Kanchanjunga, Nepal', '13-15 days', '4-6 hrs', 'K.jpg', 'k.php', 'spring, autumn', 'flight, Jeep', '', 'mapEverest.png', '\n*       Day 01 Arrival In Tribhuvan International Airport, Kathmandu and transfer to Hotel\n*       Day 02 Preparation day in Kathmandu, Gear check and safety/trip briefing, Team meal\n*       Day 03 Fly Kathmandu to Nepalgunj.\n*       Day 04 Fly Nepalgunj to Juphal (2475 m); Trek to Dunai (2140m/ 3hrs).\n*       Day 05 Trek Dunai to Chhepka (2687 m/ 6hrs)\n*       Day 06 Trek Chhepka to Chunuwar / Amchi Hospital (3000 m/ 6hrs).\n*       Day 07 Trek to Phoksundo Lake (3600m/ 5-6hrs).\n*       Day 08 Rest day at Phoksundo Lake.\n*       Day 09 Trek Phoksundo to Sallaghari (3630m/ 5-6 hrs).\n*       Day 10 Trek Sallaghari to Nangdala High Camp (4717m/ 5-6 hrs).\n                                *       Day 11 Acclimatization day in Samdo, optional hike to Tibetan border.\n                                *       Day 12 Trek from Samdo to Dharamsala/Larkya Phedi (4460m) - Approx. 4-5 hours\n                                *       Day 13 Trek from Dharamsala to Larkya La Pass (5160m) and then to Bimthang (3590m) - Approx. 8-9 hours\n                                *       Day 14 Trek from Bimthang to Tilije (2300m) - Approx. 5-6 hours\n                                *       Day 15 Trek from Tilije to Tal (1700m) - Approx. 5-6 hours\n                                *       Day 16 Trek from Tal to Syange and drive back to Besisahar by private vehicle or bus - Approx. 7-8 hours\n                                *       Day 17 Drive from Besisahar to Kathmandu by private vehicle or bus - Approx. 6-7 hours\n                                *       Day 18 Leisure day in Kathmandu.                      *       Day 19 Final Departure day.', NULL, 2, 'Hotels, Lodges', 8586, 2, 1),
(10, 1, 'Peaky Pikey', 'The Pikey Peak Trek is an underrated trek of the Everest region. It remains a primarily untouched track, with very few people trailing these paths. It offers a unique experience with minimal accommodation facilities compared to other trekking routes in Nepal.', 'Pikey Peak, Nepal', '7-8 days', '4-5 hrs', 'PP.jpg', 'pikey.php', 'spring, autumn', 'Jeep', '', 'mapEverest.png', '                            *       Day 01 Arrival in Tribhuvan International Airport, Kathmandu and transfer to Hotel\n                                *       Day 02 Preparation day in Kathmandu, Gear check and safety/trip briefing, Team meal\n                                *       Day 03 Drive from Kathmandu to Dhap via Jiri (2850m) by private vehicle or bus - Approx. 8-9 hours\n                                *       Day 04 Trek from Dhap to Japre (2820m) - Approx. 5-6 hours\n                                *       Day 05 Trek from Japre to Pikey Base Camp (3600m) - Approx. 5-6 hours\n                                *       Day 06 Trek from Pikey Base Camp to Pikey Peak (4065m) and descend to Loding (2740m) - Approx. 7-8 hours\n                                *       Day 07 Trek from Loding to Junbesi (2675m) - Approx. 6-7 hours\n                                *       Day 08 Trek from Junbesi to Thuptenchholing (2930m) - Approx. 5-6 hours\n                                *       Day 09 Trek from Thuptenchholing to Phaplu (2413m) - Approx. 5-6 hours\n                                *       Day 10 Drive from Phaplu to Kathmandu by private vehicle or bus - Approx. 9-10 hours\n                                *       Day 11 Leisure day in Kathmandu, sightseeing and exploring', NULL, 3, 'Lodges', 4068, 2, 1),
(11, 1, 'Lhotuse', 'mhdsbjbhd', NULL, NULL, NULL, 'makalu.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1),
(12, 0, 'Kolpa', 'kolpa', NULL, NULL, NULL, 'rara.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1),
(13, 0, 'Test', 'Test', NULL, NULL, NULL, 'rara.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `userqueries`
--

CREATE TABLE `userqueries` (
  `Name` varchar(20) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Subject` varchar(100) DEFAULT NULL,
  `Message` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userqueries`
--

INSERT INTO `userqueries` (`Name`, `Email`, `Subject`, `Message`) VALUES
('Aayush', 'khadgiayush418@gmail.com', 'About Package Price', 'How are the Package Prices are determined?'),
('Nijal', 'nsshankar968@gmail.com', 'About Website', 'The website can be better.'),
('Nijal', 'nsshankar968@gmail.com', 'About Guides', 'Nice'),
('Aayush', 'khadgiayush418@gmail.com', 'test', 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `guides`
--
ALTER TABLE `guides`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `include_exclude`
--
ALTER TABLE `include_exclude`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trek_destinations`
--
ALTER TABLE `trek_destinations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_trek_destination_package` (`package_id`),
  ADD KEY `fk_grade_id` (`grade_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `guides`
--
ALTER TABLE `guides`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `include_exclude`
--
ALTER TABLE `include_exclude`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `trek_destinations`
--
ALTER TABLE `trek_destinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `trek_destinations`
--
ALTER TABLE `trek_destinations`
  ADD CONSTRAINT `fk_grade_id` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`grade_id`),
  ADD CONSTRAINT `fk_trek_destination_package` FOREIGN KEY (`package_id`) REFERENCES `package` (`package_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
