-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 05, 2025 at 07:31 AM
-- Server version: 10.6.19-MariaDB
-- PHP Version: 8.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `connect5_dec4`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email_address`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', 'admin123', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `business_registrations`
--

CREATE TABLE `business_registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `BusinessName` varchar(255) DEFAULT NULL,
  `Industry` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `PhoneNumber` varchar(255) DEFAULT NULL,
  `Education` varchar(255) DEFAULT NULL,
  `Experience` varchar(255) DEFAULT NULL,
  `Website` varchar(255) DEFAULT NULL,
  `Country` varchar(255) DEFAULT NULL,
  `State` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `StreetName` varchar(255) DEFAULT NULL,
  `BuildingNumber` varchar(255) DEFAULT NULL,
  `GoodsServices` text DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_registrations`
--

INSERT INTO `business_registrations` (`id`, `BusinessName`, `Industry`, `Email`, `PhoneNumber`, `Education`, `Experience`, `Website`, `Country`, `State`, `City`, `StreetName`, `BuildingNumber`, `GoodsServices`, `profile_picture`, `Password`, `created_at`, `updated_at`) VALUES
(60, 'Signal Band', 'Arts/ Music/Entertainment', 'signaltheband@gmail.com', '+17672778400', 'Master’s Degree', '0-5 Years', 'www.connect767.com', 'Dominica', 'Saint Andrew', 'Marigot', 'Bayview Avenue', '23', 'Signal Band is a vibrant music group specializing in the Bouyon genre, a musical style originating from Dominica. Since its formation, the band has been captivating audiences with its high-energy performances, blending traditional Caribbean rhythms with modern influences.', NULL, '$2y$10$Wn.SR4GAQ.XelHA3ECwdDeW/W8CR4VSjI8IqdyKXLamxhqznJ4mJC', '2024-12-10 18:32:48', '2024-12-10 18:32:48'),
(61, 'Yuri A Jones', 'Arts/ Music/Entertainment', 'yuri@yuriajones.com', '+1767-616-1234', 'Doctorate', '10-20 Years', 'www.connect767.com', 'Dominica', 'Saint George', 'Kings Hill', 'Lower Kings Hill', '45', 'At Yuri A. Jones Photography & Videography, we specialize in capturing life\'s most beautiful moments with precision, creativity, and heart. From weddings and corporate events to personal portraits and special occasions, our brand is dedicated to telling your unique story through stunning imagery and cinematic videos.', NULL, '$2y$10$Evwk6n8Jti7btSP6pzI9Cu.w7BoSc.PT4i/vQieYlkf5J10QIb5Zq', '2024-12-10 18:49:04', '2024-12-10 18:49:04'),
(62, 'Nadja Odi Thomas', 'TV/Film/Video', 'nadjao.thomas@gmail.com', '+17672950869', 'Master’s Degree', '5-10 Years', 'www.connect767.com', 'Dominica', 'Saint Andrew', 'Wesley', 'Sunset Drive', '87', 'At Nadja Odi Thomas, we specialize in creating compelling visual stories through expert cinematography, editing, and reporting services. Our goal is to bring your vision to life with stunning imagery, seamless edits, and insightful storytelling.', NULL, '$2y$10$rXCERRQiy81HGzWC0z5XKOkp..rdeKN5QfG9vLKe9nWY.GCwFh1gu', '2024-12-10 19:07:50', '2024-12-10 19:07:50'),
(63, 'CORISAV INC.', 'Architecture/Engineering/Technical Services', 'info@corisav.com', '+17674401200', 'Doctorate', '5-10 Years', 'www.connect767.com', 'Dominica', 'Saint George', 'Pottersville', 'Goodwill Road', '33', 'At CORISAV INC., we specialize in delivering innovative and high-quality solutions in architectural design, structural engineering, and construction management. Our team of experienced professionals is committed to creating functional, aesthetically pleasing, and sustainable designs tailored to meet your specific needs.', NULL, '$2y$10$xf6XRjjnMWCCmZrDXr7C2.OSAa8puGQgmsYpvGffq9rDpn6iMxjti', '2024-12-10 19:16:29', '2024-12-10 19:16:29'),
(64, 'Arnold Johnson', 'Automotive/Transportation', 'worldwidespareparts@hotmail.com', '+17673156214', 'Associates Degree', '0-5 Years', 'www.connect767.com', 'Dominica', 'Saint George', 'Roseau', 'Bath Road', '15', 'At Arnold Johnson, we specialize in the importation of high-quality vehicles and spare parts to meet the diverse needs of our customers. Whether you\'re looking for reliable cars, trucks, or genuine replacement parts, we offer a wide selection sourced from trusted manufacturers around the world.', NULL, '$2y$10$kl8EHwaejjMoUsvyvnGtGOY48suK1SPruLIOlOiBtYPSTZXQGGA1q', '2024-12-10 19:22:58', '2024-12-10 19:22:58'),
(65, 'Gremophoto', 'Arts/ Music/Entertainment', 'mrcrushiaal@hotmail.com', '+17672765575', 'Associates Degree', '5-10 Years', 'www.connect767.com', 'Dominica', 'Saint George', 'Roseau', 'upper kingshill', '6', 'At Gremophoto, we specialize in delivering stunning photography, cutting-edge graphic design, and dynamic video production services. Our mission is to bring your creative visions to life through visually compelling and professionally crafted content.', NULL, '$2y$10$VvnX/JnIMkBfRC8iLTRygO2TmH/5fh9lVmxIvFUQXMmLcEnIhX./q', '2024-12-10 19:39:24', '2024-12-10 19:39:24'),
(66, 'Calide Abdul winston', 'Education/ Professional/Scientific', 'The_bess_87@hotmail.com', '+17672778893', 'Associates Degree', '0-5 Years', 'https://www.connect767.com', 'Dominica', 'Saint David', 'Petite Soufriere', 'Rainforest Lane', '34', 'At Calide Abdul Winston, we combine a passion for education with a flair for marketing to inspire and empower the next generation. With a focus on innovative teaching strategies and creative marketing solutions, we aim to bridge the gap between knowledge and application.', NULL, '$2y$10$2dEWd8DiNa2vPQKkMwKiyOIqF4mmcGqNJ1sFLZA/7G1QpnIZ9QYQS', '2024-12-10 19:50:28', '2024-12-10 19:50:28'),
(67, 'A Lil\\\' Touch', 'Cosmetic/Beauty/Barber', 'aliltouch@hotmail.com', '+17676123719', 'Associates Degree', '5-10 Years', 'www.connect767.com', 'Dominica', 'Saint Andrew', 'Portsmouth', 'Paix Bouche', '23', 'A Lil\' Touch is your one-stop destination for all things beauty and style! We specialize in custom tailoring, expert hair braiding, and flawless acrylic nails, offering services that enhance your natural beauty and personal style.', NULL, '$2y$10$f5kQYCVce9AG1NGomcbuWOZ5I7HTMEO.r9IzdefhqtuRt5e4bu7qm', '2024-12-10 20:13:18', '2024-12-10 20:13:18'),
(68, 'Keda cakes and Delights', 'Food Services/Beverage', 'ambarrie50@gmail.com', '+17676165464', 'Associates Degree', '0-5 Years', 'www.connect767.com', 'Dominica', 'Saint George', 'Roseau', 'Riverbank Avenue', '29', 'At Keda Cakes and Delights, we bring sweetness and joy to your special moments with our delectable cakes, pastries, and treats. Each creation is crafted with love, using the finest ingredients to ensure exceptional taste and quality.', NULL, '$2y$10$spDL3hwX0yWQqanQVXwuBejcIX/gnX9qqX2zFOZFDYO1Qn9O/5abS', '2024-12-10 20:24:37', '2024-12-10 20:24:37'),
(69, 'PAXIS', 'Automotive/Transportation', 'yourpaxis@gmail.com', '+17671155454', 'Master’s Degree', '5-10 Years', 'www.connect767.com', 'Dominica', 'Saint George', 'Roseau', 'Pine Street', '56', 'At PAXIS, we are the leading importer of both new and used vehicles from Japan, Thailand, and the USA. Our commitment is to provide top-quality, reliable vehicles that meet the diverse needs of our customers.', NULL, '$2y$10$sXjvPG.8yCBkTAgB5DYYHu.qiPBZ0.rZo9XACB.fxFCzWRmjAzRhS', '2024-12-10 20:39:56', '2024-12-10 20:39:56'),
(70, 'Calixte Davis', 'Construction/Plumbing/ Mining', 'calixteid@gmail.com', '+17673179443', 'Master’s Degree', '0-5 Years', 'https://www.connect767.com', 'Dominica', 'Saint George', 'Roseau', 'Bayview Road', '42', 'Calixte Davis specializes in delivering top-tier Design & Build and Project Management services, transforming construction projects from vision to reality. Whether creating custom homes, commercial spaces, or large-scale developments, the team offers expert design solutions and seamless project execution.', NULL, '$2y$10$AuEm0R.0N4erF0SIeQpNyOINJCVjYn5SBx8KtkyCSc5e.0AMYBwPC', '2024-12-10 21:32:49', '2024-12-10 21:32:49'),
(71, 'Aubrey Frederick', 'Salon/Spa/Fitness', 'info@harlemplaza.com', '+17676176180', 'Associates Degree', '0-5 Years', 'www.connect767.com', 'Dominica', 'Saint George', '87', 'Roseau', '24', 'Aubrey Frederick offers a unique blend of salon, spa, and fitness services designed to enhance beauty, wellness, and overall vitality. Our salon provides expert hair care and styling, tailored to highlight your natural beauty.', NULL, '$2y$10$9ghcLkCgcTmpinR8nSdWbO5si9iZb6uyqgSVxled6WaCZroA1x6oW', '2024-12-11 17:35:44', '2024-12-11 17:35:44'),
(72, 'Meraki Designs', 'Skills/Trade/Craft/Utilities', 'merakidesigns767@gmail.com', '+17672765913', 'Associates Degree', '0-5 Years', 'www.connect767.com', 'Dominica', 'Saint George', 'Roseau', 'Coconut Grove', '15', 'Meraki Designs specializes in creating unique, customized gifts and high-quality printing solutions that add a personal touch to every occasion. Whether it’s a heartfelt present for a loved one or branded merchandise for your business, our products are designed with care and creativity to reflect your style and message.', NULL, '$2y$10$UNnwDSVRJ.ABdsDL71eerudptwhl.819jw/x6hTF7g92/.KYdSV8.', '2024-12-11 17:41:02', '2024-12-11 17:41:02'),
(73, 'YOUnique Paints', 'Arts/ Music/Entertainment', 'stilljay01@gmail.com', '+17673150712', 'Associates Degree', '0-5 Years', 'www.connect767.com', 'Dominica', 'Saint John', 'Penville', 'Sunrise Boulevard', '48', 'YOUnique Paints specializes in crafting personalized gifts and providing high-quality printing services that add a distinctive touch to every occasion. From custom-designed keepsakes and unique home décor to branded merchandise and tailored gift items, our creations reflect your individuality and style.', NULL, '$2y$10$.litHFYAhC3pLl.KqG9nU.9CQRxyIGgDl04Eq.5UpG/2bvudRJX7S', '2024-12-11 17:55:43', '2024-12-11 17:55:43'),
(74, 'N&N Products', 'Customer Service/ Consumer Goods & Services', 'n.npunches@gmail.com', '+17672451808', 'Master’s Degree', '5-10 Years', 'www.connect767.com', 'Dominica', 'Saint Paul', 'Mahaut', 'Oceanview Lane', '12', 'N&N Products specializes in crafting premium liqueurs and delicious probiotic yogurts that enhance both flavor and health. Our liqueurs are expertly blended using high-quality ingredients to offer a unique and smooth taste, perfect for any occasion.', NULL, '$2y$10$TxJ.XpqlWxS3Oo/D/A31OOJiLgFlN5fE1VYBuQ6nbNM0NjXtTS2BG', '2024-12-11 18:00:03', '2024-12-11 18:00:03'),
(75, 'Choice Brick Factory', 'Construction/Plumbing/ Mining', 'yokho@live.com', '+1767-352-9816', 'Doctorate', '10-20 Years', 'www.connect767.com', 'Dominica', 'Saint John', 'Mahaut', 'Zabrico', '63', 'Choice Brick Factory is a trusted manufacturer of high-quality blocks and pavers, providing durable and reliable construction materials for a variety of projects. Our blocks and pavers are made with precision and the finest materials, ensuring strength, longevity, and aesthetic appeal.', NULL, '$2y$10$GDS9XfhxM5wkuqYZAs80N.otSE44pg4LCRLxHAclPCm2ktLZeeO.m', '2024-12-11 18:46:41', '2024-12-11 18:46:41'),
(76, 'Maxo’s Appliance Repair', 'Skills/Trade/Craft/Utilities', 'maxene.cerat@yahoo.com', '+1767-352-9816', 'Associates Degree', '10-20 Years', 'www.connect767.com', 'Dominica', 'Saint George', 'Roseau', 'Silver Sands Road', '34', 'Maxo’s Appliance Repair specializes in the reliable and efficient repair of household appliances, including washing machines, microwaves, blenders, vacuums, irons, fans, and more. We offer expert services for all your electrical and plumbing needs, ensuring your appliances and systems run smoothly and efficiently.', NULL, '$2y$10$ZKdftJr0DptuBGFj4XYyXO74Lbruu6p9lgSvNF1HJSmp0nQdCPz2G', '2024-12-11 19:10:01', '2024-12-11 19:10:01'),
(77, 'Budgeat', 'Technology/ Technical Support/Web', 'info@budgeat.com', '+17676144347', 'Master’s Degree', '5-10 Years', 'www.connect767.com', 'Dominica', 'Saint George', 'Roseau', 'Palm Grove Avenue', '45', 'Budgeat specializes in providing cutting-edge web and mobile app development services tailored specifically for local small and medium-sized businesses (SMBs). Our team offers forward-thinking solutions that are designed to streamline operations, enhance customer engagement, and drive growth.', NULL, '$2y$10$FxvR.lSrKw6lc8CDO6ci7u8YJ3yT5jCRcaXyqaplg5uCQCe9aMeUy', '2024-12-11 19:16:02', '2024-12-11 19:16:02'),
(78, 'Taza Electrical', 'Skills/Trade/Craft/Utilities', 'fred@tazaelectrical.com', '+1767-452-9831', 'Associates Degree', '0-5 Years', 'www.connect767.com', 'Dominica', 'Saint George', 'Roseau', 'Garden View Street', '58', 'Taza Electrical offers comprehensive electrical services for homes, businesses, and industrial properties. Specializing in home wiring and testing, our team ensures safe and efficient electrical systems for your home. We also provide expert commercial and industrial wiring services, delivering reliable, high-performance electrical solutions for various business needs.', NULL, '$2y$10$1svt3XxU7V8a87wokss3qONjU5n9l2gfFCleY77sQtJ/eawxS2skq', '2024-12-11 19:21:39', '2024-12-11 19:21:39'),
(79, 'Craig', 'Retail/Wholesale/Trade', 'cityoutlet31@yahoo.com', '+17676166575', 'Master’s Degree', '5-10 Years', 'www.connect767.com', 'Dominica', 'Saint George', 'Roseau', 'Sunset Boulevard', '72', 'Craig is a trusted leader in retail and wholesale trade, offering a wide range of high-quality products at competitive prices. Whether you\'re a business in need of bulk supplies or an individual seeking great deals, Craig provides an extensive selection of goods across various industries.', NULL, '$2y$10$J4r9Qi9ryj5YxER390FJVOOW4fwQl9QjydF4Sr/e2.G1TlbDsdIjG', '2024-12-11 19:28:17', '2024-12-11 19:28:17'),
(80, 'Robinson & Associates', 'Business Administration/Office', 'info@robinsonassc.com', '+17674408458', 'Master’s Degree', '5-10 Years', 'www.connect767.com', 'Dominica', 'Saint George', 'Roseau', 'Maple Street', '101', 'Robinson & Associates offers expert business administration and office management services designed to help companies operate more efficiently and effectively. Specializing in streamlining office processes, managing daily operations, and providing administrative support, we ensure that your business runs smoothly.', NULL, '$2y$10$8fPRenMgQhBg61IzTlf2oupLKtIF1i4I1rl7t5dMd02bLhkkGOoVe', '2024-12-11 19:42:20', '2024-12-11 19:42:20'),
(81, 'Birdeye custom designs & Prints', 'Manufacturing/ Industrial Machinery/ Gas/ Chemicals', 'birdeyes832@gmail.com', '+17676145722', 'Master’s Degree', '5-10 Years', 'www.connect767.com', 'Dominica', 'Saint George', 'Manaut', 'Ocean Breeze Avenue', '56', 'Birdeye Custom Designs & Prints specializes in high-quality vinyl printing for a variety of products, including t-shirts, mugs, cups, vehicles, and more. Whether you\'re looking to personalize apparel, create branded merchandise, or add custom designs to vehicles, we offer durable and vibrant prints that stand out.', NULL, '$2y$10$9VnhQjL.6NNU0xFHcaKDMunmQllzZ/20mNIgry6GLvfRRyPBzUHc2', '2024-12-11 20:20:57', '2024-12-11 20:20:57'),
(82, 'Prime Auto Dealer', 'Automotive/Transportation', 'telthm@aol.com', '+17185649524', 'Associates Degree', '5-10 Years', 'www.connect767.com', 'UnitedStates', 'New York', 'Brooklyn', 'Maplewood Street', '123', 'Prime Auto Dealer is your trusted destination for new, used, and salvage cars, offering a wide selection of vehicles to suit every budget and need. Whether you\'re looking for a reliable commuter car, a luxury model, or affordable options for restoration, we have the perfect vehicle for you.', NULL, '$2y$10$2C.JRBFBVaFxvtJ58I8rUOxpoT/1.lvWBlXx4nQORKbm7PDZ6U/be', '2024-12-11 20:52:13', '2024-12-11 20:52:13'),
(83, 'Kalingo Tours', 'Hospitality/Tourism/Accommodation', 'kdangleben@gmail.com', '7185649524', 'Associates Degree', '10-20 Years', 'www.connect767.com', 'Dominica', 'Saint George', 'Kalinago Territory', 'Riverside Drive', '256', 'Kalinago Tours offers a complete range of services to make your trip unforgettable, including accommodation arrangements, taxi services, and guided tours. We pride ourselves on offering personalized experiences that allow visitors to explore the rich history and culture of Dominica.', NULL, '$2y$10$cr.iV0zmjAKGBzJCtIDgQ.Y1jZ0EHoQuHoGb/KPypfU/c.tr.n9Uy', '2024-12-11 21:26:40', '2024-12-11 21:26:40'),
(84, 'Lamar Construction', 'Construction/Plumbing/ Mining', 'lamarconstructionlc@icloud.com', '7896541236', 'Master’s Degree', '10-20 Years', 'www.connect767.com', 'UnitedStates', 'Massachusetts', 'Pembroke', 'Oakwood Road', '212', 'Lamar Construction is a premier provider of top-quality new construction, renovation, and interior design services across the state of Massachusetts. Whether you\'re building a brand-new home, renovating an existing property, or transforming your space with stunning interior designs, we offer tailored solutions to meet your specific needs.', NULL, '$2y$10$R4S.9LN6vFeO739ODQIHdu/45Vpm9FQlTO8Jy4F4Wb4kXFB25ppvu', '2024-12-11 21:54:40', '2024-12-11 21:54:40'),
(85, 'Cashwiz Dominica', 'Retail/Wholesale/Trade', 'demo@cashwiz.com', '+1767-440-5555', 'Master’s Degree', '5-10 Years', 'www.connect767.com', 'Dominica', 'Saint George', 'Roseau', 'Rosehill Avenue', '22', 'Cashwiz Dominica specializes in buying and selling new and used products at competitive prices, providing our customers with a wide range of affordable options. Whether you\'re looking to upgrade your home, find great deals on electronics, or purchase gently used furniture, we offer quality products that meet your needs and budget.', NULL, '$2y$10$.Y6w2xIrwf8mgqRkq.swvewVK70sK2VVOsO/MsKOkZCbdgJLjKmqq', '2024-12-11 22:16:06', '2024-12-11 22:16:06'),
(86, 'Mcpherson Florant', 'Automotive/Transportation', 'florant@demo.com', '+1721-526-3003', 'High School Diploma', '10-20 Years', 'www.connect767.com', 'SintMaarten', 'Dutch Side', 'Cole Bay', 'Pelican Drive', '45', 'McPherson Florant offers exclusive VIP transportation services, catering to high-end clients who value comfort, reliability, and discretion. Our fleet of luxury vehicles and professional chauffeurs ensure a first-class travel experience tailored to your needs.', NULL, '$2y$10$MKZEQC4ZC9M4UKtf6BI6NuoQ2YsXN9dValgypz4DEzackfdShu2ci', '2024-12-12 17:05:59', '2024-12-12 17:05:59'),
(87, 'Caranel Sensations', 'Food Services/Beverage', 'caramels767@gmail.com', '+17672454887', 'Master’s Degree', '0-5 Years', 'www.connect767.com', 'Dominica', 'Saint George', 'Roseau', 'Valley View Crescent', '89', 'Caramel Sensations creates the most scrumptious and fluffiest homemade cheesecakes, crafted with care and the finest ingredients. Each cheesecake is a perfect blend of creamy texture and rich flavor, ideal for any occasion or as a special treat.', NULL, '$2y$10$ffZ1xMw4A50AFgfpVWKdieHqabKkwqCqmjZZCdrTzJ1ZHAVHRhU4G', '2024-12-12 17:11:07', '2024-12-12 17:11:07'),
(88, 'KayDee Graphics', 'Graphic Design/Media Design', 'demo@demo.com', '+17673245619', 'Master’s Degree', '0-5 Years', 'www.connect767.com', 'Dominica', 'Saint George', 'Roseau', 'Garden Street', '112', 'KayDee Graphics specializes in digital graphic design, offering creative and visually striking designs tailored to your specific needs. Whether you\'re looking for logos, social media graphics, marketing materials, or custom artwork, we bring your vision to life from any location.', NULL, '$2y$10$PZyjKKfOEZ/uKQbo8LsRr.Y7Itj.XlYzCUWUg7bYKqVfUI.vQOfty', '2024-12-12 17:28:48', '2024-12-12 17:28:48'),
(89, 'Daniel Pond', 'Technology/ Technical Support/Web', 'daniel23nk@gmail.com', '+1767-553-8291', 'Master’s Degree', '5-10 Years', 'www.connect767.com', 'Dominica', 'Saint George', 'Roseau', 'Tech Avenue', '67', 'Daniel Pond provides expert services in network administration, ensuring seamless and secure connectivity for businesses and individuals alike. As a skilled web developer, we create dynamic, user-friendly websites that enhance your online presence.', NULL, '$2y$10$giYfvevitmjtxmcsFaWTyucUm.wS6l1vp39cx6T0OFLh5EZaiInxa', '2024-12-12 17:54:36', '2024-12-12 17:54:36'),
(90, 'Eric Winston', 'Human Resource/Marketing/PR/Advertising', 'knutkase@gmail.com', '+176727755177', 'Master’s Degree', '5-10 Years', 'www.connect767.com', 'Dominica', 'Saint George', 'Stock Farm', 'Bayview Crescent', '45', 'Eric Winston specializes in producing high-quality visual and audio adverts, designed to capture attention and engage audiences. Whether you need compelling video content, radio spots, or multimedia campaigns, we deliver creative and effective advertising solutions that elevate your brand.', NULL, '$2y$10$Wht/dP8kU9HE2ZD3fhldO.fM74uyuohsSbmC.eSnpN2ssGawO/epa', '2024-12-12 17:59:37', '2024-12-12 17:59:37'),
(91, 'Finance Focus Consultancy', 'Accounting/ Financial Services/Insurance', 'lulaurent001@gmail.com', '+17672760347', 'Master’s Degree', '5-10 Years', 'www.connect767.com', 'Dominica', 'Saint George', 'Roseau', 'Wallhouse', '36', 'Finance Focus Consultancy offers expert personal finance and business consultation services, helping individuals and businesses achieve financial success. We specialize in crafting detailed business plans and providing financial projections that guide strategic decisions and foster growth.', NULL, '$2y$10$J6rwuSKVyzrx89D7ngjPkuhNpSWEQUaL4ZYBDad1llJygUScb5pXO', '2024-12-12 18:05:44', '2024-12-12 18:05:44'),
(92, 'MIKEY\\\'S BUSINESS AND WELDING ENTERPRISES', 'Manufacturing/ Industrial Machinery/ Gas/ Chemicals', 'mikeygarage@hotmail.com', '+17672454030', 'Associates Degree', '0-5 Years', 'www.connect767.com', 'Dominica', 'Saint George', 'Roseau', 'Riverside Street', '28', 'Mikey\'s Business and Welding Enterprises specializes in the design and fabrication of metal gates, railings, burglar bars, doors, and hurricane window shutters. Our high-quality, custom-made metalwork provides security, durability, and aesthetic appeal to your property.', NULL, '$2y$10$GwYVfAlt9KqxUBSOJNm.E.fojP78uSfBJBwu11sQt519vKd1A1oU6', '2024-12-12 18:10:15', '2024-12-12 18:10:15'),
(93, 'Kerrison George', 'Arts/ Music/Entertainment', 'kerrisong92@gmail.com', '+17673152106', 'Master’s Degree', '0-5 Years', 'www.connect767.com', 'Dominica', 'Saint John', 'Bayview Avenue', 'Bayview Avenue', '72', 'Kerrison George specializes in personalized cartoon art, unique designs, and music. Whether you\'re looking to transform yourself or others into whimsical cartoon characters, create custom artwork, or need original music compositions, we provide creative solutions tailored to your vision.', NULL, '$2y$10$VEhppbKDCZsDCq.VgNZr.uHqIleypkMnAOOuaYxxgf6FaIfsxUlIi', '2024-12-12 18:18:45', '2024-12-12 18:18:45'),
(94, 'Anguilla', 'Arts/ Music/Entertainment', 'anguillamusicacademy@gmail.com', '+12644987812', 'Doctorate', '10-20 Years', 'www.connect767.com', 'Anguilla', 'South Hill District', 'South Hill', 'Coral Ridge Drive', '15', 'Darius James provides a premier recording school and recording studio, catering to individuals passionate about music and sound production. The recording school offers comprehensive training in audio engineering, music production, and studio management, empowering students to master the skills needed for success in the industry.', NULL, '$2y$10$rsG2H2TZVXE2mJs0Z/2Ay.6FuSU/mwhYCMLw3r2xs2IrDCd5QHVUe', '2024-12-12 22:12:10', '2024-12-12 22:12:10'),
(104, 'Eugenia Allison', 'Human Resource/Marketing/PR/Advertising', 'williamgabriel199812@gmail.com', '+1 (795) 879-4132', 'Primary School', '5-10 Years', 'www.cyqypixa.me', 'Yemen', 'Al Bayda', 'Dolores Nam ratione', 'Delilah Petty', '129', 'Voluptatem Rerum lo', NULL, '$2y$10$SIDN5K.ug1mGxO68f55nXuG1eoVnuOnUu5GzEEniZqVm2B46cRHSO', '2025-02-04 22:23:02', '2025-02-04 22:23:02'),
(121, 'Sure Time Market', 'Retail/Wholesale/Trade', 'katashaw@hotmail.com', '+17676178966', 'Associates Degree', '5-10 Years', 'www.connect767.com', 'Dominica', 'Saint George', 'Roseau', 'Pottersville', '14', 'Sure Time Market is a trusted local retailer distributing high-quality, locally produced goods from 767 (Dominica). Dedicated to supporting local manufacturers and artisans, Sure Time Market offers a wide selection of authentic Dominican products, from fresh produce to handcrafted items. With a commitment to quality and community, the market ensures that customers get the best homegrown products while helping to sustain local businesses.', NULL, '$2y$10$WaSigreJmXs/K//UapNYju8P1g9h1MF.NUXbgfIK7qU615TSiSGb6', '2025-02-07 14:58:01', '2025-02-07 14:58:01'),
(122, 'Basic Art', 'TV/Film/Video', 'tapradrigo@gmail.com', '+15559876543', 'Doctorate', '10-20 Years', 'www.rashimdrigo5.wixsite.com/basicart', 'United States', 'Texas', 'Houston', 'Maple Avenue', '742', 'Basic Art is where simplicity meets creativity. Whether you’re looking for a custom masterpiece, minimalist decor, or unique designs that speak volumes, we bring your vision to life with precision and passion.', NULL, '$2y$10$7/aUJ8IeosxRXT8Z1C697.8PGLEDne6lszM5KLBeNl1e9IESuFTJy', '2025-02-07 15:07:33', '2025-02-07 15:07:33'),
(123, 'Flomovers', 'Customer Service/ Consumer Goods & Services', 'flomovers@gmail.com', '3464482724', 'Associates Degree', '0-5 Years', 'www.flomovers.wixsite.com/my-site', 'United States', 'Texas', 'Houston', 'Oak Street', '1123', 'Flomovers is your trusted moving partner in the Houston area, offering reliable and professional moving services to make your relocation stress-free. We specialize in packing, unpacking, loading, and unloading, ensuring that every step of your move is handled with care and efficiency.', NULL, '$2y$10$ZWSBnQnEfhsLx3aVL4wNlOt6Nq.0j4i7ls8cWoukT9P/avN2kAcXG', '2025-02-07 15:13:00', '2025-02-07 15:13:00'),
(124, 'Blue Million Tax Professionals Inc', 'Accounting/ Financial Services/Insurance', 'avictor@bluemilliontaxpros.com', '8007679436', 'Doctorate', '10-20 Years', 'www.bluemilliontaxpros.com', 'United States', 'New York', 'Brooklyn', 'Prince Street Brooklyn NY 11201', '147', 'Blue Million Tax Professionals Inc. is your trusted partner for all your tax and financial service needs. Whether you\'re in Brooklyn or anywhere across the U.S., we offer personalized, expert services to meet your unique financial situation.', NULL, '$2y$10$ntIjtc444Vl8FYCUimkQLu.oWkrdQHs1zLdNZ.6cOTGQgHZ473nvW', '2025-02-07 15:17:56', '2025-02-07 15:17:56'),
(125, 'ELICON', 'Construction/Plumbing/ Mining', 'info@elicondb.com', '+17672656868', 'Master’s Degree', '5-10 Years', 'www.elicondb.com', 'Dominica', 'Saint George', 'Goodwill', 'Jolly Lane', '35', 'ELICON is a leading brand specializing in a wide range of construction and engineering services. With a focus on delivering innovative and efficient solutions, ELICON stands at the forefront of the Design-Build (D&B) industry, offering a comprehensive approach to both new construction and renovations.', NULL, '$2y$10$18.orJJSkV/bpC5NYZMSM.GstjJV7YZSvgCFTswfCn14wNQte2axq', '2025-02-07 15:25:21', '2025-02-07 15:25:21'),
(126, 'Sonya R. Gaines, Realtor', 'Real Estate/Rental/Leasing', 'sonyagsoldit@gmail.com', '2254540226', 'Master’s Degree', '0-5 Years', 'www.sonyagsoldit.com', 'United States', 'Texas', 'Houston', 'W. 19th Street', '373 1/2', 'Sonya R. Gaines, a Realtor is a trusted and dedicated real estate professional serving Houston and the surrounding areas. With years of experience and a deep understanding of the local market, Sonya offers a full range of real estate services designed to meet the unique needs of buyers, sellers, investors, and builders.', NULL, '$2y$10$.ycejKLT4GNHyV6O40W.e.fPFgE7QaUtdJa8Twg7qjbvoH0DvloW2', '2025-02-07 15:31:47', '2025-02-07 15:31:47'),
(127, 'IneedAJobDominica', 'Human Resource/Marketing/PR/Advertising', 'ineedajobdominica@gmail.com', '+17675489234', 'Master’s Degree', '10-20 Years', 'www.connect767.com/', 'Dominica', 'Saint George', 'Roseau', 'Oakridge Avenue', '42', 'IneedAJobDominica is a dedicated platform designed to connect job seekers in Dominica and the broader Caribbean region with exciting employment opportunities. Our core service revolves around sharing up-to-date job listings across various industries, helping individuals take the next step in their careers.', NULL, '$2y$10$wmQiL8umkB6wQ9.ao9gsjuJETzivZ5f8RZ3RK1R//Po0qSd/vbLAS', '2025-02-07 15:39:22', '2025-02-07 15:39:22'),
(128, 'Scentsual Soaps', 'Cosmetic/Beauty/Barber', 'luxuryscentsuals@gmail.com', '8022666909', 'Master’s Degree', '5-10 Years', 'www.etsy.com/shop/ScentsualSoaps', 'United States', 'New Jersey', 'Newark', 'Birchwood Drive', '584', 'Scentsual Soaps offers an indulgent collection of artisan soaps and luxury skincare products, crafted with love and care in small batches. We believe in the power of nature’s finest ingredients to nourish and pamper your skin, leaving you feeling refreshed, rejuvenated, and beautifully scented.', NULL, '$2y$10$eNvvBFFKmP5XSrDb873twO05CdtAdapuE5w6trn1nFgCQhdPkIiCG', '2025-02-07 16:11:23', '2025-02-07 16:11:23'),
(129, 'Lesley-Ann Waldron/ Clinical Psychologist', 'Healthcare/Social Assistance/Medical', 'lesleyann-waldron@hotmail.com', '+17672757444', 'Master’s Degree', '5-10 Years', 'www.connect767.com', 'Dominica', 'Saint George', 'Roseau', 'King George V Street', '56', 'Lesley-Ann Waldron | Clinical Psychologist is a compassionate and experienced mental health professional offering psychotherapy services to individuals, couples, and groups. Specializing in a variety of therapeutic areas, Lesley-Ann Waldron provides effective treatments for depression, anxiety disorders, relational and marriage challenges, as well as grief and acute stress.', NULL, '$2y$10$vc91eAMxQftvdKN9KfJDjOYAO0kHr3ZtM2NjjEAqKXJrv6s/HXZse', '2025-02-07 16:17:20', '2025-02-07 16:17:20'),
(130, 'Headsup Barbers & Beauty Salon', 'Cosmetic/Beauty/Barber', 'headsupbarbersbeauty@gmail.com', '+12462455263', 'Associates Degree', '5-10 Years', 'www.connect767.com', 'Barbados', 'Saint Michael', 'Bridgetown', 'Broad street', '247', 'Headsup Barbers & Beauty Salon is your go-to destination for top-notch grooming and beauty services in Dominica. Our salon offers a wide range of professional services tailored to meet the needs of every client, from haircuts and manicures to massages and natural beauty treatments.', NULL, '$2y$10$jh3pr6T5nmE7FJI24OWQguSSoSE4JETiW67IgfrCFKPtSxP2AF9/.', '2025-02-07 16:22:29', '2025-02-07 16:22:29'),
(131, 'Clean Craft Services', 'General Labor/Warehouse', 'cleancraftservices1@gmail.com', '+17672659955', 'Associates Degree', '0-5 Years', 'www.connect767.com', 'Dominica', 'Saint David', 'Trafalgar', 'Trafalgar Main Road', '56', 'Clean Craft Services offers a top-tier eco-friendly sanitization and disinfection solution for homes, offices, and commercial spaces. Our service utilizes non-toxic and non-hazardous cleaning agents that are safe for both the environment and your health.', NULL, '$2y$10$.mibFqHS8zu74ZAwg.fKpumbV8/YIITrstqjnwrukzsng2JSPYzwu', '2025-02-07 16:28:48', '2025-02-07 16:28:48'),
(132, 'Girls with Goals 767', 'Sales/Business Development', 'girlswithgoalsteam@gmail.com', '+17673159549', 'Master’s Degree', '10-20 Years', 'www.facebook.com/officialgirlswithgoals767', 'Dominica', 'Saint George', 'Roseau', 'King George V Street', '23', 'Girls with Goals 767 is an empowering platform designed to celebrate and support the growth of young women in Dominica and beyond. As a dynamic business incubator and support service, Girls with Goals 767 is committed to promoting the skills, achievements, and brands of young women, effectively showcasing their talents and entrepreneurial spirit.', NULL, '$2y$10$imW9g7syp/MbO9RBO3qRiuVkYQYIwKh.11OVRdeYP86T1R2bLn.l.', '2025-02-07 16:47:46', '2025-02-07 16:47:46'),
(133, 'Properties of St. Maarten', 'Real Estate/Rental/Leasing', 'laurentnatasha@gmail.com', '+17215240640', 'Master’s Degree', '10-20 Years', 'www.propertiesofsxm.com', 'SintMaarten', 'Dutch Side', 'Simpson Bay', 'Welfare Road', 'Unit 1.5', 'Properties of St. Maarten is a premier real estate agency based in Simpson Bay, St. Maarten, offering comprehensive services for all your property needs. Whether you\'re looking to buy, sell, rent, or manage the property, Properties of St. Maarten delivers a professional, personalized approach to ensure the best results for every client.', NULL, '$2y$10$2w12e5lfyVTQX.CtDnbHqeCKDQL0wtRUIhN/Jg/E4YEvNKKykZuli', '2025-02-07 16:55:47', '2025-02-07 16:55:47'),
(134, 'Cedella Popo Beauty', 'Cosmetic/Beauty/Barber', 'cedellapopo@gmail.com', '+17672762762', 'Associates Degree', '10-20 Years', 'www.connect767.com', 'Dominica', 'Saint George', 'Roseau', 'Sunset Boulevard', '28', 'Cedella Popo Beauty is a premier beauty brand specializing in a range of personalized makeup services and beauty consultations. Offering a holistic approach to enhancing natural beauty, Cedella Popo Beauty provides expert makeup services for all occasions, from everyday looks to glamorous transformations for special events, photo shoots, or weddings.', NULL, '$2y$10$y5C7KkclBmvKyAx223.O/eVlDDGX0P0zXJcRDmBJ4GowrCmSaZq66', '2025-02-07 17:40:05', '2025-02-07 17:40:05'),
(135, 'Heather’s Events and Decor', 'Hospitality/Tourism/Accommodation', 'heatherseventsdm@gmail.com', '+17672454415', 'Professional Certificate', '20+ Years', 'www.connect767.com', 'Dominica', 'Saint George', 'Roseau', 'Portsmouth', '34', 'Heather’s Events and Decor is a premier event planning and management brand dedicated to bringing your dream events to life with impeccable attention to detail and a personal touch. Specializing in event planning, event management, and coordinating, we take the stress out of your event, ensuring a seamless experience from start to finish.', NULL, '$2y$10$OnDUD5SdUZoakk3u8aggzOgSZwEOyeV1mq9R9iUNGNEbLVCLIEElG', '2025-02-07 17:43:14', '2025-02-07 17:43:14'),
(136, 'Talk de Ting', 'TV/Film/Video', 'talkdeting767@gmail.com', '7139826512', 'Associates Degree', '0-5 Years', 'www.connect767.com', 'United States', 'New Jersey', 'Somerset County', 'Cedarwood Lane', '842', 'Talk de Ting is a dynamic podcast that celebrates and highlights excellence within the young professional community. We’re here to amplify the voices, stories, and achievements of individuals who are making waves across various industries, from entrepreneurship to the arts, technology, education, and beyond', NULL, '$2y$10$e3RO6wAjKBnRe5NN57LFTuaLtv1MysU5wzFXKQ7QTOEgUz0gp/2bK', '2025-02-07 17:46:53', '2025-02-07 17:46:53'),
(137, 'Kinte Serrant', 'Government/Non-Profit', 'kinte.serrant@gmail.com', '4157829301', 'Master’s Degree', '0-5 Years', 'www.connect767.com', 'United States', 'New York', 'Brooklyn', 'Oakwood Tower', '582', 'Kinte Serrant is a dedicated nonprofit business consultation service that focuses on empowering and supporting nonprofit organizations in their mission to create lasting positive change.', NULL, '$2y$10$.CGbyBNbYjCvujoFzkaUSuSCbqTMBu9SM/IpWHhTSUPkRkchDOVn6', '2025-02-07 17:51:16', '2025-02-07 17:51:16'),
(138, 'Gremophoto', 'TV/Film/Video', 'gremophoto@gmail.com', '+17672765575', 'High School Diploma', '5-10 Years', 'www.connect767.com', 'Dominica', 'Saint George', 'Roseau', 'Upper kingshill', '6', 'Gremophoto is a creative agency that blends the art of photography, graphic design, and video production to capture the essence of your brand, event, or personal moment.', NULL, '$2y$10$x3f5C5n0FNGHuT18cni/d..NnBtr2D2WtsxT0PLa10fr5QfBsqk6q', '2025-02-07 17:57:02', '2025-02-07 17:57:02'),
(139, 'Techda', 'Technology/ Technical Support/Web', 'mprosper@techworda.com', '+13476945525', 'Master’s Degree', '5-10 Years', 'www.connect767.com', 'Dominica', 'Saint David', 'Petite Soufriere', 'Main Street', '12', 'Techda is a cutting-edge brand specializing in routing and switching network solutions for businesses and individuals looking to optimize their network infrastructure. As a professional network service provider, Techda delivers expert services in the design, installation, and maintenance of routing and switching systems that ensure seamless and secure communication across your network.', NULL, '$2y$10$Z8dqzWdz561x6AklvO4qAuz0J9iPiuAkf.TDwQgKu/eNIGw4h2K0i', '2025-02-07 18:09:39', '2025-02-07 18:09:39'),
(140, 'P.Media', 'TV/Film/Video', 'punchmedia442@gmail.com', '7541956474', 'Master’s Degree', '5-10 Years', 'www.connect767.com', 'Netherlands', 'North Holland', 'Amsterdam', 'Crystal Tower', '56', 'P.Media is an all-in-one media streaming service designed to provide users with a seamless, high-quality entertainment experience across various platforms. With P.Media, you gain access to a vast library of movies, TV shows, music, podcasts, live broadcasts, and exclusive content all in one place.', NULL, '$2y$10$S4d22Yun5ot9lY3BUpg59uIjQHnVxkxAcXS2FEniE25jrRBYfyRtm', '2025-02-07 18:15:05', '2025-02-07 18:15:05'),
(141, 'Cuthbert Joseph', 'Healthcare/Social Assistance/Medical', 'bdgganeral@yahoo.com', '6172823146', 'Master’s Degree', '5-10 Years', 'www.connect767.com', 'United States', 'Massachusetts', 'Dorchester', 'Blue Hill Ave', '1026', 'Cuthbert Joseph Dental Practice is a trusted and professional dental clinic dedicated to providing high-quality oral care in a comfortable and friendly environment. Led by Dr. Cuthbert Joseph, an experienced and compassionate dentist, the practice offers a full range of services designed to meet the needs of patients of all ages.', NULL, '$2y$10$fd98oSvovPEFboOWCBCYa.3EF3C8QMXlwuDmGPoi26VB4UcSXs9j.', '2025-02-07 18:18:33', '2025-02-07 18:18:33'),
(142, 'Giftus John', 'Arts/ Music/Entertainment', 'geejayartsandphoto@msn.com', '5553468291', 'Master’s Degree', '5-10 Years', 'www.connect767.com', 'United States', 'New Jersey', 'Union', 'Lentz Avenue', '2086', 'Giftus John is a multidisciplinary artist known for blending the worlds of writing, painting, and photography. With a passion for capturing the beauty of life in various forms, Giftus John creates evocative, thought-provoking works that span across different mediums.', NULL, '$2y$10$sGz.7qTtbGOYLVKSZbeqau3.pkSCwJWmt3MXuODutAPNHgothsHnC', '2025-02-07 18:23:07', '2025-02-07 18:23:07'),
(143, 'Shermaine A. Edmonds', 'Real Estate/Rental/Leasing', 'shermaine.Edmonds@gmail.com', '2036062752', 'Master’s Degree', '5-10 Years', 'www.connect767.com', 'United States', 'Connecticut', 'Bridgeport', 'P.O. Box 6776, Hamden', '6776', 'Shermaine A. Edmonds is a dedicated and highly professional real estate agent, known for her unparalleled knowledge of the market and a deep passion for helping clients achieve their real estate goals. Serving both buyers and sellers, Shermaine prides herself on offering personalized, client-focused services, ensuring each real estate transaction is as smooth and successful as possible.', NULL, '$2y$10$Jakoj.WZVAYgXrdco6WoRebessvUMLsCG04USVPCsmP0uSf2LKxuK', '2025-02-07 18:27:06', '2025-02-07 18:27:06'),
(144, 'Chosen 1 Heavy Equipment, LLC', 'Construction/Plumbing/ Mining', 'jfrederick@chosen1vi.com', '5558249176', 'Master’s Degree', '5-10 Years', 'www.connect767.com', 'United States', 'Virginia', 'Frenchman Bay', 'Bay Road', '04609', 'Chosen 1 Heavy Equipment, LLC is a trusted name in the heavy equipment and trucking industry, providing reliable, top-quality services across demolition, road construction, excavation, and land clearing. With years of experience, state-of-the-art equipment, and a team of skilled professionals, we are committed to delivering exceptional service to meet all your construction and development needs.', NULL, '$2y$10$StFRA.F.20qei5K0tw0Sfupe0J42fDLZ.3QLl2Jcc.PJx/k3OuUhO', '2025-02-07 18:47:33', '2025-02-07 18:47:33'),
(145, 'Cranberry TV', 'TV/Film/Video', 'crandallregy@gmail.com', '5551327645', 'Master’s Degree', '5-10 Years', 'www.connect767.com', 'Martinique', 'Fort-de-France', 'Case Pilote', 'Bayview Street', '456', 'Cranberry TV is the leading media platform dedicated to bringing the vibrant culture, entertainment, and lifestyle of Dominica and the Caribbean region to the world. Through high-quality content, engaging storytelling, and dynamic visuals, we offer a fresh perspective on Caribbean life, highlighting the rich diversity and unique experiences that make this region truly special.', NULL, '$2y$10$VH23BIOGO4.sRAwlwus4FOqHXMyWrZR5SFmxCUjVquKPH.HEMxtnq', '2025-02-07 19:06:26', '2025-02-07 19:06:26'),
(146, 'Craig Barry', 'TV/Film/Video', 'Barrymajik@gmail.com', '5558479321', 'Associates Degree', '5-10 Years', 'www.connect767.com', 'United States', 'Georgia', 'Atlanta', 'Maple Avenue', '1423', 'Craig Barry is a talented and passionate filmmaker specializing in capturing powerful, emotional, and visually stunning content. With years of experience in the industry, Craig has built a reputation for producing high-quality films, videos, and documentaries that tell stories in the most engaging and impactful way.', NULL, '$2y$10$RWPYSatMILYedF71hRL2cuVF28aZoBe8efhWb4IT.sRoeqtvdnygq', '2025-02-07 19:10:24', '2025-02-07 19:10:24'),
(147, 'ALWIN RICHARDS', 'Manufacturing/ Industrial Machinery/ Gas/ Chemicals', 'twiceclothing@gmail.com', '5558479321', 'Associates Degree', '10-20 Years', 'www.connect767.com', 'Canada', 'Ontario', 'Toronto', 'Oakwood Drive', '2176', 'Alwin Richards is a cutting-edge clothing and branding brand that embodies creativity, style, and individuality. Dedicated to providing high-quality fashion and impactful branding, Alwin Richards is more than just a brand – it’s a statement. Whether it’s ready-to-wear apparel, custom designs, or personalized branding services, Alwin Richards offers a unique approach that blends contemporary trends with timeless elegance.', NULL, '$2y$10$eZE8jjHzRME0iavJeYBsTeL0nIkloW00YDPKiO.XBOau9hIQ/R2Ci', '2025-02-07 19:13:05', '2025-02-07 19:13:05'),
(148, 'Evericka Messias', 'Business Administration/Office', 'waltsever@gmail.com', '5559124732', 'Associates Degree', '0-5 Years', 'www.connect767.com', 'United States', 'New York', 'Brooklyn', 'Willow Creek Road', '7425', 'Evericka Messias is a beauty and health brand dedicated to promoting self-care, wellness, and confidence. With a holistic approach to beauty, Evericka Messias blends luxurious skincare, innovative treatments, and personalized wellness services that empower individuals to look and feel their absolute best.', NULL, '$2y$10$m0jWOSsphhQEmprLnI6Q..Ks3oXWhWkoSVQAYAk.vTcF5ujYkJ2vW', '2025-02-07 19:19:50', '2025-02-07 19:19:50'),
(149, 'Jamie St Rose', 'Manufacturing/ Industrial Machinery/ Gas/ Chemicals', 'jamie.st.rose@gmail.com', '5554387216', 'Associates Degree', '5-10 Years', 'www.connect767.com', 'United States', 'New York', 'Bronx', 'Ely Ave', '547', 'amie St Rose is a highly skilled and experienced mechanical engineer specializing in aircraft launch and recovery systems. With years of experience in the aerospace industry, Jamie St Rose brings exceptional expertise and a passion for precision engineering to the design, maintenance, and optimization of critical systems that ensure the safe and efficient operation of aircraft launch and recovery processes.', NULL, '$2y$10$GQMq58dEpMYvSsZKPV.8s.dMpdGdDknD4F.fbpiiABWOHEh6BQTwO', '2025-02-07 19:24:43', '2025-02-07 19:24:43'),
(150, 'Aliyah Jervier', 'Government/Non-Profit', 'jervieraliyah@gmail.com', '5559834526', 'Associates Degree', '0-5 Years', 'www.linkedin.com/in/aliyahjervier', 'United States', 'Illinois', 'Chicago', 'Pinebrook Lane', '876', 'Aliyah Jervier is a dedicated social impact professional focused on transforming communities through strategic philanthropy, impact investing, and innovative youth engagement. With a passion for creating sustainable change, Aliyah has made it her mission to empower underrepresented communities, foster youth leadership, and drive meaningful social impact that extends beyond monetary contributions.', NULL, '$2y$10$0NWuABoQ0DeXBHM.rc7yDuPtQi4CPJn1UTZrKbFEikFStVTOsAZYe', '2025-02-07 19:27:32', '2025-02-07 19:27:32'),
(151, 'Arthlene Legair Lawrence', 'TV/Film/Video', 'Info@legairbrandltd.com', '5554837291', 'Associates Degree', '5-10 Years', 'www.connect767.com', 'United States', 'Georgia', 'Fayetteville', 'Fayette Pl', '387', 'Arthlene Legair Lawrence is an internationally recognized, award-winning fashion designer known for her innovative approach to contemporary fashion. As a renowned celebrity designer, she has had the honor of styling some of the most iconic figures in the entertainment industry.', NULL, '$2y$10$KQ9GAhqwip/DrbZb0B7U1eWDIUm1bH2LUjqh6EgxT/u.Ns3r9EuRe', '2025-02-07 19:33:56', '2025-02-07 19:33:56'),
(152, 'Earl', 'TV/Film/Video', 'earlw54@yahoo.ca', '3125557896', 'Associates Degree', '5-10 Years', 'www.connect767.com', 'Canada', 'Ontario', 'Toronto', 'Oakwood Avenue', '1527', 'Earl is a premium film and digital media production brand dedicated to creating visually stunning and emotionally compelling content. With a focus on high-end storytelling, cutting-edge technology, and innovative filmmaking techniques, Earl delivers top-tier production services for brands, businesses, artists, and individuals seeking to elevate their visual presence.', NULL, '$2y$10$9PbxQ4jgSgGWblHObxt90OBSvvVCtGe4N/0fAxelOdIu4XaSiOQx2', '2025-02-07 19:37:53', '2025-02-07 19:37:53'),
(153, 'Arthur Pemberton', 'Technology/ Technical Support/Web', 'arthur@arthurpemberton.com', '4155553628', 'Associates Degree', '5-10 Years', 'arthurpemberton.com', 'United States', 'Florida', 'Tampa', 'Maplewood Drive', '2845', 'Earl is a premier provider of WordPress and web development services, specializing in crafting high-performance, visually stunning, and fully optimized websites tailored to your business needs. With a keen eye for design and a deep understanding of the latest web technologies, Earl delivers custom WordPress themes, responsive website development, e-commerce solutions, and SEO-friendly platforms that enhance user experience and drive engagement.', NULL, '$2y$10$MxDzTzcBF9R3c82XLX.UG.IaAGgpL6dZP7mb1zpMfmI/eaEhwZvsG', '2025-02-07 19:41:16', '2025-02-07 19:41:16'),
(154, 'Compulse Solutions', 'Retail/Wholesale/Trade', 'compulsesolutions@gmail.com', '+17672857807', 'Associates Degree', '0-5 Years', 'www.connect767.com', 'Dominica', 'Saint John', 'Portsmouth', 'Crestwood Avenue', '1742', 'Compulse Solutions is a comprehensive service provider that offers a wide range of business solutions designed to streamline operations, enhance productivity, and boost growth. With expertise in hardware, IT services, web design, procurement, marketing, and tool rental, we tailor our services to meet the needs of businesses across various industries.', NULL, '$2y$10$x9VbEGHDE.FMNp9Qk.Go..lg5Wd7gB0bZYuiz3Y89xL/xZC7j.X0u', '2025-02-07 19:46:43', '2025-02-07 19:46:43'),
(155, 'MF Consultancy Ltd', 'Business Administration/Office', 'hello@merlindafrancois.com', '+17672950707', 'Associates Degree', '5-10 Years', 'www.connect767.com', 'Dominica', 'Saint George', 'Roseau', 'Oakwood Avenue', '47', 'MF Consultancy Ltd is a dynamic and forward-thinking consultancy firm specializing in career development, business consulting, digital creation, and project management. With a keen focus on empowering professionals and businesses, MF Consultancy Ltd provides expert guidance to individuals and companies looking to achieve their career and business goals.', NULL, '$2y$10$7VxktetW5CWYh9K7ML4uL.GXHk7ZzA82VHKDW9HNG9scLDNsl4Jeu', '2025-02-07 19:58:05', '2025-02-07 19:58:05'),
(156, 'Kirvis Gage', 'Construction/Plumbing/ Mining', 'info@richdominica.com', '+17672766534', 'Associates Degree', '0-5 Years', 'www.connect767.com', 'Dominica', 'Saint George', 'Roseau', 'Maple Lane', '152', 'Kirvis Gage is a premier brand specializing in building completion and finishings, landscaping and maintenance care services, and a variety of other construction and infrastructure services. With a commitment to quality and precision, Kirvis Gage delivers exceptional results for residential, commercial, and industrial projects.', NULL, '$2y$10$OSR9c6LXRISvfvnp2AuotuK41B1KMtmQXH.gqUU5ypJ4Paqo6gRbW', '2025-02-07 20:01:24', '2025-02-07 20:01:24'),
(157, 'Abraham J. Durand', 'Education/ Professional/Scientific', 'kalbozo@yahoo.com', '+176722500008', 'Associates Degree', '10-20 Years', 'www.connect767.com', 'Dominica', 'Saint George', 'Roseau', 'Pinecrest Drive', '26', 'Abraham J. Durand is a highly respected Workforce Development Consultant specializing in helping organizations and individuals enhance their skills, grow professionally, and achieve long-term career success. With a deep understanding of the changing labor market and workforce trends, Abraham J. Durand provides tailored solutions that address the unique needs of businesses, government agencies, and educational institutions.', NULL, '$2y$10$jLb5nEnjUEQ3/OnA3SH6y.WR6bqEqM5kRQs1d0RAEpD1kUV6BYftS', '2025-02-07 20:05:51', '2025-02-07 20:05:51'),
(158, 'Natasha Green', 'Hospitality/Tourism/Accommodation', 'littlecanoe767@gmail.com', '+17673171680', 'Associates Degree', '0-5 Years', NULL, 'Dominica', 'Saint David', 'Kalinago Territory', 'Salybia', '58', 'Natasha Green is a multifaceted brand offering a unique blend of restaurant, gift shop, and tour services designed to deliver an exceptional experience for both locals and visitors. With a strong commitment to customer satisfaction, Natasha Green combines delicious cuisine, curated gifts, and personalized tours to create unforgettable moments for every guest.', NULL, '$2y$10$fDIaTGHtSlvosPWOr.7DVeW9aMcQlWjfDBfQej06l8fP8JSImVXRC', '2025-02-07 20:08:52', '2025-02-07 20:08:52'),
(159, 'Jeff', 'General Labor/Warehouse', 'popiee17@hotmail.com', '+17676159051', 'Associates Degree', '0-5 Years', 'www.connect767.com', 'Dominica', 'Saint George', 'Roseau', 'Sunset Boulevard', '74', 'Jeff is a professional brand specializing in pressure cleaning services, dedicated to providing high-quality cleaning solutions for residential, commercial, and industrial properties. With a focus on efficiency, reliability, and customer satisfaction, Jeff offers comprehensive pressure washing services to restore the cleanliness and appearance of surfaces, leaving them looking fresh and revitalized.', NULL, '$2y$10$xgUnh.WT.b.25ygklN6QmecU4hjDW0sj43h6rM5G69uBLMlmQvStq', '2025-02-07 20:12:37', '2025-02-07 20:12:37'),
(160, 'Linkup', 'Human Resource/Marketing/PR/Advertising', 'irus1@hotmail.com', '+17672772338', 'Associates Degree', '5-10 Years', 'www.connect767.com', 'Dominica', 'Saint George', 'Roseau', 'Bath Estate', '183', 'Jeff is a vibrant and dynamic brand specializing in providing comprehensive information about parties, events, and fetes. Whether you\'re looking to attend, plan, or promote an event, Jeff is your go-to platform for discovering the best social gatherings, celebrations, and entertainment in the area.', NULL, '$2y$10$alCACimxFRWy3vxEE2EPo.UlhFbgSMdoqC4NeAhBJoSBQyGUf0gfe', '2025-02-07 20:15:41', '2025-02-07 20:15:41'),
(175, 'BreakFree Therapy & Coaching', 'Healthcare/Social Assistance/Medical', 'info@breakfreetherapycoaching.com', '+17672952207', 'Master’s Degree', '5-10 Years', 'www.breakfreetherapycoaching.com', 'UnitedKingdom', 'England', 'London', '2-8 Victoria Avenue', 'Remote', 'Counseling\r\nPsychotherapy\r\nLife/Personal Development Coaching\r\nOffending Management Support Services', 'profile_pictures/mh8CHYYbNW03nRrc9pf0MT87xs4IO9EEazU0OOaB.jpg', '$2y$10$298AsVmxvFszUleWgTBkleA2v1OAcLthGrxf9SW5K170LSO42mPUu', '2025-02-22 01:48:23', '2025-02-22 01:48:23');
INSERT INTO `business_registrations` (`id`, `BusinessName`, `Industry`, `Email`, `PhoneNumber`, `Education`, `Experience`, `Website`, `Country`, `State`, `City`, `StreetName`, `BuildingNumber`, `GoodsServices`, `profile_picture`, `Password`, `created_at`, `updated_at`) VALUES
(178, 'Dreams Business Consulting LLC', 'other', 'dreamsbusinessconsultingllc@gmail.com', '678-599-5962', 'Associates Degree', '10-20 Years', NULL, 'United States', 'Georgia', 'Atlanta', '3762 CAMPBELLTON RD SW', '3764', 'Lifestyle and Business Consulting.', NULL, '$2y$10$cwd7NpAJ8xU0YGW5QiPz2OZmfGR/BtMXu3nNkub9S9A5K/pRhBV4a', '2025-03-11 20:10:27', '2025-03-11 20:10:27');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reviewer_name` varchar(255) NOT NULL,
  `review_title` varchar(255) NOT NULL,
  `review_description` text NOT NULL,
  `date_of_experience` date NOT NULL,
  `review_stars` int(11) NOT NULL,
  `directory_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `reviewer_name`, `review_title`, `review_description`, `date_of_experience`, `review_stars`, `directory_id`, `created_at`, `updated_at`) VALUES
(23, 'Hiram Burks', 'Expedita suscipit eo', 'Maiores fuga Cupida', '2000-05-22', 4, 5, '2024-11-27 05:14:11', '2024-11-27 05:14:11');

-- --------------------------------------------------------

--
-- Table structure for table `custome_payments`
--

CREATE TABLE `custome_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `p_email` varchar(255) DEFAULT NULL,
  `delivery_country` varchar(255) DEFAULT NULL,
  `delivery_first_name` varchar(255) DEFAULT NULL,
  `delivery_last_name` varchar(255) DEFAULT NULL,
  `delivery_company` varchar(255) DEFAULT NULL,
  `delivery_address` varchar(255) DEFAULT NULL,
  `delivery_apartment` varchar(255) DEFAULT NULL,
  `delivery_city` varchar(255) DEFAULT NULL,
  `delivery_state` varchar(255) DEFAULT NULL,
  `delivery_zip_code` varchar(255) DEFAULT NULL,
  `delivery_phone` varchar(255) DEFAULT NULL,
  `account_holder_name` varchar(255) DEFAULT NULL,
  `billing_first_name` varchar(255) DEFAULT NULL,
  `billing_last_name` varchar(255) DEFAULT NULL,
  `billing_company` varchar(255) DEFAULT NULL,
  `billing_address` varchar(255) DEFAULT NULL,
  `billing_apartment` varchar(255) DEFAULT NULL,
  `billing_city` varchar(255) DEFAULT NULL,
  `billing_state` varchar(255) DEFAULT NULL,
  `billing_zip_code` varchar(255) DEFAULT NULL,
  `billing_phone` varchar(255) DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `total_quantity` int(11) DEFAULT NULL,
  `payment` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custome_payments`
--

INSERT INTO `custome_payments` (`id`, `customer_id`, `p_email`, `delivery_country`, `delivery_first_name`, `delivery_last_name`, `delivery_company`, `delivery_address`, `delivery_apartment`, `delivery_city`, `delivery_state`, `delivery_zip_code`, `delivery_phone`, `account_holder_name`, `billing_first_name`, `billing_last_name`, `billing_company`, `billing_address`, `billing_apartment`, `billing_city`, `billing_state`, `billing_zip_code`, `billing_phone`, `price`, `total_quantity`, `payment`, `created_at`, `updated_at`) VALUES
(54, 1, 'jawo@mailinator.com', 'united states', 'Christian', 'Bradshaw', 'Fatima Mays', 'Nulla sunt architec', 'Et vel qui minima no', 'Aperiam qui sed dolo', 'Meta', '12345', '7485994988', 'jack', 'Idona', 'Burch', 'Fatima Mays', 'Nulla sunt architec', 'Et vel qui minima no', 'Aperiam qui sed dolo', 'Meta', '12346', '7485994988', 50.00, 12, 600.00, '2025-02-15 20:06:59', '2025-02-15 20:06:59'),
(55, 173, 'cynuru@mailinator.com', 'united states', 'Lucas', 'Bradshaw', 'Tad Malone', 'Nam dolore tempora s', 'Fugit assumenda sun', 'Quis reprehenderit', 'Meta', '12345', '4663861523', 'Freya Schroeder', 'Idona', 'Burch', 'Fatima Mays', 'Nulla sunt architec', 'Et vel qui minima no', 'Aperiam qui sed dolo', 'Meta', '52411', '7485994988', 39.00, 12, 468.00, '2025-02-15 20:49:16', '2025-02-15 20:49:16'),
(56, 173, 'pewup@mailinator.com', 'united states', 'Christian', 'Page', 'Fatima Mays', 'Nulla sunt architec', 'Et vel qui minima no', 'Aperiam qui sed dolo', 'Meta', '12345', '7485994988', 'Jack Sellers', 'Kyra', 'Waller', 'Fatima Mays', 'Nulla sunt architec', 'Et vel qui minima no', 'Aperiam qui sed dolo', 'Meta', '92980', '7485994988', 45.00, 8, 360.00, '2025-02-17 18:56:24', '2025-02-17 18:56:24');

-- --------------------------------------------------------

--
-- Table structure for table `custom_products`
--

CREATE TABLE `custom_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `sleeve_length` varchar(255) DEFAULT NULL,
  `team_logo` varchar(255) DEFAULT NULL,
  `collar_type` varchar(255) DEFAULT NULL,
  `kit` varchar(255) DEFAULT NULL,
  `fit_type` varchar(255) DEFAULT NULL,
  `inside_collar_message` varchar(255) DEFAULT NULL,
  `socks` varchar(255) DEFAULT NULL,
  `collar_text` varchar(255) DEFAULT NULL,
  `socks_color` varchar(255) DEFAULT NULL,
  `goalkeeper_kit` varchar(255) DEFAULT NULL,
  `padded` varchar(255) DEFAULT NULL,
  `goalkeeper_sleeve` varchar(255) DEFAULT NULL,
  `goalkeeper_jersey_design` varchar(255) DEFAULT NULL,
  `jersey_color` varchar(255) DEFAULT NULL,
  `staff_other` varchar(255) DEFAULT NULL,
  `staff_kit` varchar(255) DEFAULT NULL,
  `staff_collar_type` varchar(255) DEFAULT NULL,
  `staff_fit_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `custom_image` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custom_products`
--

INSERT INTO `custom_products` (`id`, `customer_id`, `sleeve_length`, `team_logo`, `collar_type`, `kit`, `fit_type`, `inside_collar_message`, `socks`, `collar_text`, `socks_color`, `goalkeeper_kit`, `padded`, `goalkeeper_sleeve`, `goalkeeper_jersey_design`, `jersey_color`, `staff_other`, `staff_kit`, `staff_collar_type`, `staff_fit_type`, `created_at`, `updated_at`, `custom_image`) VALUES
(101, '1', 'long', 'embroidered', 'round-neck', 'full-kit', 'men', 'yes', 'yes', 'Team', 'black', 'yes', 'Yes', 'long-sleeve', 'same', 'red', 'yes', 'yes', 'vneck', '', '2025-02-15 20:06:59', '2025-02-15 20:06:59', 'storage/uploads/custom_image_1739630777.png'),
(102, '173', 'short', 'sublimated', '', 'shirt-only', 'men', 'yes', '', '', '', '', '', '', '', '', 'yes', 'yes', 'round', 'slim', '2025-02-15 20:49:16', '2025-02-15 20:49:16', 'storage/uploads/custom_image_1739634014.png'),
(103, '173', 'long', 'embroidered', 'round-neck', 'full-kit', 'women', 'yes', '', '', '', '', '', '', '', '', 'no', '', '', '', '2025-02-17 18:56:24', '2025-02-17 18:56:24', 'storage/uploads/custom_image_1739800181.png');

-- --------------------------------------------------------

--
-- Table structure for table `custom_products_size_guides`
--

CREATE TABLE `custom_products_size_guides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `size_guide_name` varchar(255) DEFAULT NULL,
  `size_guide_number` varchar(255) DEFAULT NULL,
  `size_guide_short_size` varchar(255) DEFAULT NULL,
  `size_guide_shirt_size` varchar(255) DEFAULT NULL,
  `size_guide_quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custom_products_size_guides`
--

INSERT INTO `custom_products_size_guides` (`id`, `customer_id`, `size_guide_name`, `size_guide_number`, `size_guide_short_size`, `size_guide_shirt_size`, `size_guide_quantity`, `created_at`, `updated_at`) VALUES
(737, 1, 'Isabella Morton', '371', 'youth-xs', 'youth-xs', 1, '2025-02-15 20:06:59', '2025-02-15 20:06:59'),
(738, 1, 'Shafira Page', '371', 'youth-s', 'youth-s', 1, '2025-02-15 20:06:59', '2025-02-15 20:06:59'),
(739, 1, 'Shafira Page', '858', 'youth-xs', 'youth-xl', 1, '2025-02-15 20:06:59', '2025-02-15 20:06:59'),
(740, 1, 'Shafira Page', '858', 'youth-xs', 'youth-s', 1, '2025-02-15 20:06:59', '2025-02-15 20:06:59'),
(741, 1, 'Shafira Page', '858', 'youth-xs', 'youth-xs', 1, '2025-02-15 20:06:59', '2025-02-15 20:06:59'),
(742, 1, 'Shafira Page', '858', 'youth-xs', 'youth-xs', 1, '2025-02-15 20:06:59', '2025-02-15 20:06:59'),
(743, 1, 'Isabella Morton', '371', 'adult-xl', 'adult-l', 1, '2025-02-15 20:06:59', '2025-02-15 20:06:59'),
(744, 1, 'Isabella Morton', '371', 'adult-xl', 'adult-xl', 1, '2025-02-15 20:06:59', '2025-02-15 20:06:59'),
(745, 173, 'Isabella Morton', '371', 'youth-m', 'youth-xs', 1, '2025-02-15 20:49:16', '2025-02-15 20:49:16'),
(746, 173, 'Isabella Morton', '371', 'youth-s', 'youth-l', 1, '2025-02-15 20:49:16', '2025-02-15 20:49:16'),
(747, 173, 'Isabella Morton', '371', 'youth-s', 'youth-s', 1, '2025-02-15 20:49:16', '2025-02-15 20:49:16'),
(748, 173, 'Isabella Morton', '371', 'youth-xs', 'youth-l', 1, '2025-02-15 20:49:16', '2025-02-15 20:49:16'),
(749, 173, 'Isabella Morton', '371', 'youth-xs', 'youth-xs', 1, '2025-02-15 20:49:16', '2025-02-15 20:49:16'),
(750, 173, 'Isabella Morton', '371', 'adult-xl', 'adult-xl', 1, '2025-02-15 20:49:16', '2025-02-15 20:49:16'),
(751, 173, 'Shelly Whitney', '295', 'adult-xl', 'adult-xl', 1, '2025-02-15 20:49:16', '2025-02-15 20:49:16'),
(752, 173, 'Shelly Whitney', '295', 'adult-xl', 'adult-xl', 1, '2025-02-15 20:49:16', '2025-02-15 20:49:16'),
(753, 173, 'Shafira Page', '371', 'youth-xs', 'youth-xs', 1, '2025-02-17 18:56:24', '2025-02-17 18:56:24'),
(754, 173, 'Isabella Morton', '162', 'youth-s', 'youth-xs', 1, '2025-02-17 18:56:24', '2025-02-17 18:56:24'),
(755, 173, 'Isabella Morton', '858', 'youth-xs', 'youth-xs', 1, '2025-02-17 18:56:24', '2025-02-17 18:56:24'),
(756, 173, 'Isabella Morton', NULL, 'youth-xs', 'youth-xs', 1, '2025-02-17 18:56:24', '2025-02-17 18:56:24'),
(757, 173, 'Isabella Morton', '371', 'youth-xs', 'youth-s', 1, '2025-02-17 18:56:24', '2025-02-17 18:56:24'),
(758, 173, 'Isabella Morton', '501', 'adult-xl', 'adult-xl', 1, '2025-02-17 18:56:24', '2025-02-17 18:56:24'),
(759, 173, 'Shelly Whitney', '295', 'adult-xl', 'adult-xl', 1, '2025-02-17 18:56:24', '2025-02-17 18:56:24'),
(760, 173, 'Shelly Whitney', '295', 'adult-xl', 'adult-xl', 1, '2025-02-17 18:56:24', '2025-02-17 18:56:24');

-- --------------------------------------------------------

--
-- Table structure for table `custom_products_size_staff`
--

CREATE TABLE `custom_products_size_staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `staff_name` varchar(255) DEFAULT NULL,
  `staff_sleeves_length` varchar(255) DEFAULT NULL,
  `staff_pants_length` varchar(255) DEFAULT NULL,
  `staff_shirt_size` varchar(255) DEFAULT NULL,
  `staff_pants_size` varchar(255) DEFAULT NULL,
  `staff_quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custom_products_size_staff`
--

INSERT INTO `custom_products_size_staff` (`id`, `customer_id`, `staff_name`, `staff_sleeves_length`, `staff_pants_length`, `staff_shirt_size`, `staff_pants_size`, `staff_quantity`, `created_at`, `updated_at`) VALUES
(203, 1, 'Joel Roberson', 'Long sleeves', 'short sleeves', 'youth-xs', 'youth-xs', 1, '2025-02-15 20:06:59', '2025-02-15 20:06:59'),
(204, 1, 'Joel Roberson', 'long sleeves', 'Long sleeves', 'adult-xl', 'adult-xl', 1, '2025-02-15 20:06:59', '2025-02-15 20:06:59'),
(205, 1, 'Mary Conrad', 'long sleeves', 'Long sleeves', 'adult-xl', 'adult-xl', 1, '2025-02-15 20:06:59', '2025-02-15 20:06:59'),
(206, 1, 'Christopher Montgomery', 'short sleeves', 'Long sleeves', 'adult-xl', 'adult-xl', 1, '2025-02-15 20:06:59', '2025-02-15 20:06:59'),
(207, 173, 'Kiona Greene', 'Long sleeves', 'Long sleeves', 'youth-xs', 'youth-xs', 1, '2025-02-15 20:49:16', '2025-02-15 20:49:16'),
(208, 173, 'Joel Roberson', 'short sleeves', 'Long sleeves', 'adult-xl', 'adult-xl', 1, '2025-02-15 20:49:16', '2025-02-15 20:49:16'),
(209, 173, 'Joel Roberson', 'long sleeves', 'Long sleeves', 'adult-xl', 'adult-xl', 1, '2025-02-15 20:49:16', '2025-02-15 20:49:16'),
(210, 173, 'dfdgdfgsdf', 'short sleeves', 'Long sleeves', 'adult-xl', 'adult-l', 1, '2025-02-15 20:49:16', '2025-02-15 20:49:16');

-- --------------------------------------------------------

--
-- Table structure for table `directory_table`
--

CREATE TABLE `directory_table` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `register_table_id` int(11) DEFAULT 0,
  `professional_or_business_name` varchar(255) DEFAULT 'Default Business Name',
  `email` varchar(255) DEFAULT 'default@example.com',
  `cell_number` varchar(20) DEFAULT '0000000000',
  `building_number` varchar(255) DEFAULT NULL,
  `industry` varchar(255) DEFAULT 'Industry',
  `website` varchar(255) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `experience` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT 'Country',
  `state` varchar(255) DEFAULT 'State',
  `city` varchar(255) DEFAULT 'City',
  `street_address` varchar(255) DEFAULT 'Street',
  `goods_or_services_provided` text DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `directory_table`
--

INSERT INTO `directory_table` (`id`, `register_table_id`, `professional_or_business_name`, `email`, `cell_number`, `building_number`, `industry`, `website`, `education`, `experience`, `country`, `state`, `city`, `street_address`, `goods_or_services_provided`, `profile_picture`, `created_at`, `updated_at`) VALUES
(54, 26, 'A Lil\' Touch', 'aliltouch@hotmail.com', '7676123719', NULL, 'Cosmetic/Beauty/Barber', NULL, NULL, NULL, 'dominican republic', NULL, NULL, NULL, NULL, NULL, '2024-10-24 06:35:44', '2024-10-24 06:35:44'),
(55, 27, 'Keda cakes and Delights', 'ambarrie50@gmail.com', '17676165464', NULL, 'Food Services/Beverage', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-24 06:35:44', '2024-10-24 06:35:44'),
(56, 28, 'PAXIS', 'yourpaxis@gmail.com', NULL, NULL, 'Automotive/Transportation', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-24 06:35:44', '2024-10-24 06:35:44'),
(57, 29, 'Calixte Davis', 'calixteid@gmail.com', '17673179443', NULL, 'Construction/Plumbing/Mining', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-24 06:35:44', '2024-10-24 06:35:44'),
(58, 30, 'Aubrey Frederick', 'info@harlemplaza.com', '7676176180', NULL, 'Salon/Spa/Fitness', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-24 06:35:44', '2024-10-24 06:35:44'),
(59, 31, 'Meraki Designs', 'merakidesigns767@gmail.com', '17672765913', NULL, 'Skills/Trade/Craft/Utilities', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-24 06:35:44', '2024-10-24 06:35:44'),
(60, 32, 'YOUnique Paints', 'stilljay01@gmail.com', '17673150712', NULL, 'Arts/Music/Entertainment', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-24 06:35:44', '2024-10-24 06:35:44'),
(61, 33, 'N&N Products', 'n.npunches@gmail.com', '7672451808', NULL, 'Customer Service/Consumer Goods & Services', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-24 06:35:44', '2024-10-24 06:35:44'),
(62, 34, 'Choice Brick Factory', 'yokho@live.com', NULL, NULL, 'Construction/Plumbing/Mining', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-24 06:35:44', '2024-10-24 06:35:44'),
(63, 35, 'Maxo’s Appliance Repair', 'maxene.cerat@yahoo.com', NULL, NULL, 'Skills/Trade/Craft/Utilities', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-24 06:35:44', '2024-10-24 06:35:44'),
(64, 36, 'Budgeat', 'info@budgeat.com', '7676144347', NULL, 'Technology/Technical Support/Web', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-24 06:35:44', '2024-10-24 06:35:44'),
(65, 37, 'Taza Electrical', 'fred@tazaelectrical.com', NULL, NULL, 'Skills/Trade/Craft/Utilities', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-24 06:35:44', '2024-10-24 06:35:44'),
(66, 38, 'Craig', 'cityoutlet31@yahoo.com', '7676166575', NULL, 'Retail/Wholesale/Trade', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-24 06:35:44', '2024-10-24 06:35:44'),
(67, 39, 'Robinson & Associates', 'info@robinsonassc.com', '7674408458', NULL, 'Business Administration/Office', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-24 06:35:44', '2024-10-24 06:35:44'),
(68, 40, 'Revern Bontiff', 'birdeye832@gmail.com', '17676145722', NULL, 'Manufacturing/Industrial Machinery/Gas/Chemicals', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-24 06:35:44', '2024-10-24 06:35:44'),
(69, 41, 'Birdeye custom designs & Prints', 'birdeyes832@gmail.com', '17676145722', NULL, 'Manufacturing/Industrial Machinery/Gas/Chemicals', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-24 06:35:44', '2024-10-24 06:35:44'),
(70, 42, 'Nadja Odi Thomas', 'nadjao.thomas@gmail.com', '17672950869', NULL, 'Arts/Music/Entertainment', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-24 06:35:44', '2024-10-24 06:35:44'),
(71, 43, 'Prime Auto Dealer', 'telthm@aol.com', '7185649524', NULL, 'Automotive/Transportation', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-24 06:35:44', '2024-10-24 06:35:44'),
(72, 44, 'Kalingo Tours', 'kdangleben@gmail.com', NULL, NULL, 'Hospitality/Tourism/Accommodation', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-24 06:35:44', '2024-10-24 06:35:44'),
(73, 45, 'Lamar Construction', 'lamarconstructionlc@icloud.com', NULL, NULL, 'Construction/Plumbing/Mining', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-24 06:35:44', '2024-10-24 06:35:44'),
(74, 46, 'Cashwiz Dominica', 'demo@cashwiz.com', '767-440-5555', NULL, 'Retail/Wholesale/Trade', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-24 06:35:44', '2024-10-24 06:35:44'),
(75, 47, 'Mcpherson Florant', 'florant@demo.com', '721-526-3003', NULL, 'Automotive/Transportation', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-24 06:35:44', '2024-10-24 06:35:44'),
(76, 48, 'Caramel Sensations', 'demo@demo.com', '767- 245- 4887', NULL, 'Food Services/Beverage', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-24 06:35:44', '2024-10-24 06:35:44'),
(77, NULL, 'KayDee Graphics', 'demo@demo.com', '9856478965', NULL, 'Graphic Design/Media Design', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-24 06:35:44', '2024-10-24 06:35:44'),
(78, 49, 'Daniel Pond', 'daniel23nk@gmail.com', NULL, NULL, 'Technology/Technical Support/Web', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-24 06:35:44', '2024-10-24 06:35:44'),
(79, 50, 'Eric Winston', 'knutkase@gmail.com', '176727755177', NULL, 'Human Resource/Marketing/PR/Advertising', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-24 06:35:44', '2024-10-24 06:35:44'),
(80, 51, 'Finance Focus Consultancy', 'lulaurent001@gmail.com', NULL, NULL, 'Accounting/Financial Services/Insurance', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-24 06:35:44', '2024-10-24 06:35:44'),
(81, 52, 'MIKEY\'S BUSINESS AND WELDING ENTERPRISES', 'mikeygarage@hotmail.com', '17672454030', NULL, 'Manufacturing/Industrial Machinery/Gas/Chemicals', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-24 06:35:44', '2024-10-24 06:35:44'),
(82, 53, 'Kerrison George', 'kerrisong92@gmail.com', '7673152106', NULL, 'Arts/Music/Entertainment', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-24 06:35:44', '2024-10-24 06:35:44'),
(83, 54, 'Darius James', 'anguillamusicacademy@gmail.com', '12644987812', NULL, 'Arts/Music/Entertainment', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-24 06:35:44', '2024-10-24 06:35:44'),
(84, 55, 'Calide Abdul winston', 'The_bess_87@hotmail.com', '9856478965', NULL, 'Education/Professional/Scientific', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-24 06:35:44', '2024-10-24 06:35:44'),
(85, 56, 'gremophoto', 'mrcrushiaal@hotmail.com', '7672765575', NULL, 'Arts/Music/Entertainment', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-24 06:35:44', '2024-10-24 06:35:44'),
(86, 57, 'Arnold Johnson', 'worldwidespareparts@hotmail.com', '7673156214', NULL, 'Automotive/Transportation', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-24 06:35:44', '2024-10-24 06:35:44'),
(87, 58, 'CORISAV INC.', 'info@corisav.com', '7674401200', NULL, 'Architecture/Engineering/Technical Services', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-24 06:35:44', '2024-10-24 06:35:44'),
(88, NULL, 'Nadja Odi Thomas', 'nadjao.thomas@gmail.com', '17672950869', NULL, 'TV/Film/Video', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-24 06:35:44', '2024-10-24 06:35:44'),
(89, 59, 'Yuri A Jones', 'yuri@yuriajones.com', NULL, NULL, 'Arts/Music/Entertainment', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-24 06:35:44', '2024-10-24 06:35:44'),
(90, 60, 'Signal Band', 'signaltheband@gmail.com', '17672778400', NULL, 'Arts/Music/Entertainment', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-24 06:35:44', '2024-10-24 06:35:44');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_09_06_123314_create_register_table_table', 2),
(6, '2024_09_07_114842_add_columns_to_register_table', 3),
(7, '2024_09_09_112850_create_directory_table_table', 4),
(8, '2024_09_11_072722_add_street_address_to_directory_table', 5),
(9, '2024_09_12_155232_rename_work_number_to_building_number_in_directory_table', 6),
(10, '2024_09_14_123310_add_register_table_id_to_directory_table', 7),
(11, '2024_09_14_124816_create_admin_table', 8),
(12, '2024_10_25_082151_create_custom_products_table', 9),
(13, '2024_10_25_125519_create_custom_products_size_guides_table', 10),
(14, '2024_10_25_140911_create_custom_products_size_staff_table', 11),
(15, '2024_10_26_105931_create_custome_payments_table', 12),
(16, '2024_10_26_141838_add_payment_to_custome_payments_table', 13),
(18, '2024_10_26_154721_add_total_quantity_to_custome_payments_table', 14),
(19, '2024_10_29_142203_add_price_to_custome_payments_table', 15),
(20, '2024_10_30_082045_create_products_table', 16),
(21, '2024_10_30_120616_add_category_to_products_table', 17),
(22, '2024_10_31_083759_add_stock_quantity_to_products_table', 18),
(23, '2024_10_31_101238_create_variations_table', 19),
(24, '2024_10_31_102156_create_variation_images_table', 20),
(25, '2024_11_04_094159_create_shop_products_table', 21),
(26, '2024_11_04_110919_add_columns_to_shop_products_table', 22),
(27, '2024_11_04_112936_update_shop_products_table', 23),
(28, '2024_11_08_080342_create_comments_table', 24),
(29, '2024_11_13_120616_add_two_factor_columns_to_register_table', 24),
(30, '2024_11_13_134833_add_size_to_variations_table', 25),
(31, '2024_11_20_101520_add_custom_image_to_custom_products_table', 26),
(32, '2024_11_25_150356_create_business_registrations_table', 27),
(33, '2024_11_29_093936_add_profile_picture_to_business_registrations_table', 28);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `stock_quantity` int(11) NOT NULL DEFAULT 0,
  `category` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `stock_quantity`, `category`, `image`, `created_at`, `updated_at`) VALUES
(28, '\"Lasting Impression\" Shy Guy Tours Unisex T-Shirt', 'Fitted, comfortable, and soft—this t-shirt was made just for you. And it can withstand several washings while maintaining its shape, so it\'s great for everyday wear!\r\n\r\n100% fine jersey cotton\r\nHeather grey is 90% cotton, 10% polyester\r\nFabric weight: 4.3 oz/y² (146 g/m²)\r\nShoulder-to-shoulder taping\r\n100% fine jersey cotton\r\nBlank products stocked in the US are made in USA\r\nBlank products stocked in the EU are sourced worldwide', 26.00, 0, 'Shirts', 'images/Kj26IkS6kL0HwcukeZAPFc8tsvn4ZecIkPTIhjGl.webp', '2024-10-31 07:52:09', '2024-10-31 07:52:09'),
(29, 'Shy Guy Tours Ladies\' V-Neck T-Shirt', NULL, 26.00, 100, 'Shirts', 'images/ILjYFTfHrWosysdrbALMMaqCenBcKDNsTGAwWAgp.webp', '2024-10-31 08:15:20', '2024-10-31 08:15:20'),
(31, 'Lasting Impression\" Shy Guy Tours Unisex T-Shirt', NULL, 50.00, 100, 'Shirts', 'images/CXZPwMaUoqXdLnOt3cT1gfjiw73Wh5jsdVe8GeO2.webp', '2025-01-06 21:28:58', '2025-01-06 21:28:58'),
(32, 'Shy Guy Tours Short-Sleeve Unisex T-Shirt', NULL, 56.00, 100, 'Men', 'images/WN06K7RMO0TljHyUvgLTpqUcqE9jopi8Pn8dUovY.webp', '2025-01-06 21:33:46', '2025-01-06 21:33:46'),
(33, 'My People\" Shy Guy Tours Unisex T-Shirt', NULL, 60.00, 100, 'Men', 'images/hc05aJ7VIIPryjurcyNHWB38g0KoxYMZgsh50XHQ.webp', '2025-01-06 21:39:02', '2025-01-06 21:39:02'),
(35, 'Unisex Stay Connected T-Shirt', NULL, 55.00, 100, 'Men', 'images/QOBqVhoMFbn9nIdsEaTekYUNhHEH6WJ7jsfoCI4w.webp', '2025-01-06 21:44:41', '2025-01-06 21:44:41'),
(36, 'Moonlight High Waisted Leggings', NULL, 70.00, 100, 'Women', 'images/fDh0NAN3yHodHKKVlvpJdUf7kB73Dooo2wBal66r.webp', '2025-01-06 21:48:59', '2025-01-06 21:48:59'),
(37, 'Midnight Bodysuit', NULL, 50.00, 100, 'Women', 'images/tVfxnwptMMJcexGVBYdBkwsEJ1VZLrJ8I9TMEAWM.webp', '2025-01-06 21:51:29', '2025-01-06 21:51:29'),
(38, 'Berry High Waisted Biker Shorts', NULL, 50.00, 100, 'Women', 'images/3AsA2K9V2SxhpFXapg2KRAlti4068de6rmpKWRAp.webp', '2025-01-06 21:55:23', '2025-01-06 21:55:23'),
(39, 'Onesie', NULL, 30.00, 100, 'Toddlers', 'images/zsTnvk7z0wLL9YNshn6t51EllyyE33GVszk1px0R.webp', '2025-01-06 22:01:59', '2025-01-06 22:01:59'),
(40, 'Baby Jersey Short Sleeve Tee', NULL, 100.00, 100, 'Toddlers', 'images/2uynnnKtIPEQ7yRBXepwcx0xol3HXn5qrQvfjFWd.webp', '2025-01-06 22:05:22', '2025-01-06 22:05:22'),
(41, 'Baby Jersey Short Sleeve Tee', NULL, 60.00, 100, 'Toddlers', 'images/VGJvhHpREypo1FQSx1kufurLNRjgIdfU7Bd2VUfB.webp', '2025-01-06 22:08:15', '2025-01-06 22:08:15'),
(42, 'Classic CONNECT767 Hoodies', NULL, 80.00, 50, 'Sweaters', 'images/BEEpTBpJgWu6D9nQQ2D6BLfVpYY2VIOYUBziKp33.webp', '2025-01-06 22:12:30', '2025-01-06 22:12:30'),
(43, 'Unisex Sisserou Sweater', NULL, 80.00, 100, 'Sweaters', 'images/J4HEQVhVVindsAv43LPF9xz3VBPBRHrxD55Nixuu.webp', '2025-01-06 22:22:11', '2025-01-06 22:22:11'),
(44, 'Embossed CONNECT767 Hoodie', NULL, 60.00, 100, 'Sweaters', 'images/SamjqjCmQslFcRAAWyqXWMSdLXWp9ufXhyRW3f9t.webp', '2025-01-06 22:24:05', '2025-01-06 22:24:05');

-- --------------------------------------------------------

--
-- Table structure for table `register_table`
--

CREATE TABLE `register_table` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `two_factor_method` varchar(255) DEFAULT NULL,
  `two_factor_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `register_table`
--

INSERT INTO `register_table` (`id`, `email_address`, `password`, `created_at`, `updated_at`, `first_name`, `last_name`, `display_name`, `two_factor_method`, `two_factor_code`) VALUES
(24, 'zen@gmail.com', '123', '2024-09-27 09:43:59', '2024-09-27 09:43:59', NULL, NULL, NULL, NULL, NULL),
(25, 'ali@gmail.com', '123', '2024-10-18 05:31:24', '2024-10-18 05:31:24', NULL, NULL, NULL, NULL, NULL),
(26, 'aliltouch@hotmail.com', 'connect767', '2024-11-07 04:38:58', '2024-11-07 04:38:58', NULL, NULL, NULL, NULL, NULL),
(27, 'ambarrie50@gmail.com', 'connect767', '2024-11-07 04:41:36', '2024-11-07 04:41:36', NULL, NULL, NULL, NULL, NULL),
(28, 'yourpaxis@gmail.com', 'connect767', '2024-11-07 04:44:24', '2024-11-07 04:44:24', NULL, NULL, NULL, NULL, NULL),
(29, 'calixteid@gmail.com', 'connect767', '2024-11-07 04:47:24', '2024-11-07 04:47:24', NULL, NULL, NULL, NULL, NULL),
(30, 'info@harlemplaza.com', 'connect767', '2024-11-07 04:51:06', '2024-11-07 04:51:06', NULL, NULL, NULL, NULL, NULL),
(31, 'merakidesigns767@gmail.com', 'connect767', '2024-11-07 04:52:09', '2024-11-07 04:52:09', NULL, NULL, NULL, NULL, NULL),
(32, 'stilljay01@gmail.com', 'connect767', '2024-11-07 04:53:12', '2024-11-07 04:53:12', NULL, NULL, NULL, NULL, NULL),
(33, 'n.npunches@gmail.com', 'connect767', '2024-11-07 04:56:06', '2024-11-07 04:56:06', NULL, NULL, NULL, NULL, NULL),
(34, 'yokho@live.com', 'connect767', '2024-11-07 04:58:05', '2024-11-07 04:58:05', NULL, NULL, NULL, NULL, NULL),
(35, 'maxene.cerat@yahoo.com', 'connect767', '2024-11-07 05:00:23', '2024-11-07 05:00:23', NULL, NULL, NULL, NULL, NULL),
(36, 'info@budgeat.com', 'connect767', '2024-11-07 05:06:07', '2024-11-07 05:06:07', NULL, NULL, NULL, NULL, NULL),
(37, 'fred@tazaelectrical.com', 'connect767', '2024-11-07 05:07:56', '2024-11-07 05:07:56', NULL, NULL, NULL, NULL, NULL),
(38, 'cityoutlet31@yahoo.com', 'connect767', '2024-11-07 05:09:05', '2024-11-07 05:09:05', NULL, NULL, NULL, NULL, NULL),
(39, 'info@robinsonassc.com', 'connect767', '2024-11-07 05:10:19', '2024-11-07 05:10:19', NULL, NULL, NULL, NULL, NULL),
(40, 'birdeye832@gmail.com', 'connect767', '2024-11-07 05:11:11', '2024-11-07 05:11:11', NULL, NULL, NULL, NULL, NULL),
(41, 'birdeyes832@gmail.com', 'connect767', '2024-11-07 05:12:21', '2024-11-07 05:12:21', NULL, NULL, NULL, NULL, NULL),
(42, 'nadjao.thomas@gmail.com', 'connect767', '2024-11-07 05:13:09', '2024-11-07 05:13:09', NULL, NULL, NULL, NULL, NULL),
(43, 'telthm@aol.com', 'connect767', '2024-11-07 05:13:52', '2024-11-07 05:13:52', NULL, NULL, NULL, NULL, NULL),
(44, 'kdangleben@gmail.com', 'connect767', '2024-11-07 05:53:46', '2024-11-07 05:53:46', NULL, NULL, NULL, NULL, NULL),
(45, 'lamarconstructionlc@icloud.com', 'connect767', '2024-11-07 05:56:49', '2024-11-07 05:56:49', NULL, NULL, NULL, NULL, NULL),
(46, 'demo@cashwiz.com', 'connect767', '2024-11-07 06:03:16', '2024-11-07 06:03:16', NULL, NULL, NULL, NULL, NULL),
(47, 'florant@demo.com', 'connect767', '2024-11-07 06:04:41', '2024-11-07 06:04:41', NULL, NULL, NULL, NULL, NULL),
(48, 'demo@demo.com', 'connect767', '2024-11-07 06:06:02', '2024-11-07 06:06:02', NULL, NULL, NULL, NULL, NULL),
(49, 'daniel23nk@gmail.com', 'connect767', '2024-11-07 06:08:52', '2024-11-07 06:08:52', NULL, NULL, NULL, NULL, NULL),
(50, 'knutkase@gmail.com', 'connect767', '2024-11-07 06:10:41', '2024-11-07 06:10:41', NULL, NULL, NULL, NULL, NULL),
(51, 'lulaurent001@gmail.com', 'connect767', '2024-11-07 06:11:46', '2024-11-07 06:11:46', NULL, NULL, NULL, NULL, NULL),
(52, 'mikeygarage@hotmail.com', 'connect767', '2024-11-07 06:13:47', '2024-11-07 06:13:47', NULL, NULL, NULL, NULL, NULL),
(53, 'kerrisong92@gmail.com', 'connect767', '2024-11-07 06:15:20', '2024-11-07 06:15:20', NULL, NULL, NULL, NULL, NULL),
(54, 'anguillamusicacademy@gmail.com', 'connect767', '2024-11-07 06:17:25', '2024-11-07 06:17:25', NULL, NULL, NULL, NULL, NULL),
(55, 'The_bess_87@hotmail.com', 'connect767', '2024-11-07 06:19:33', '2024-11-07 06:19:33', NULL, NULL, NULL, NULL, NULL),
(56, 'mrcrushiaal@hotmail.com', 'connect767', '2024-11-07 06:21:51', '2024-11-07 06:21:51', NULL, NULL, NULL, NULL, NULL),
(57, 'worldwidespareparts@hotmail.com', 'connect767', '2024-11-07 06:24:58', '2024-11-07 06:24:58', NULL, NULL, NULL, NULL, NULL),
(58, 'info@corisav.com', 'connect767', '2024-11-07 06:26:54', '2024-11-07 06:26:54', NULL, NULL, NULL, NULL, NULL),
(59, 'yuri@yuriajones.com', 'connect767', '2024-11-07 06:33:07', '2024-11-07 06:33:07', NULL, NULL, NULL, NULL, NULL),
(60, 'signaltheband@gmail.com', 'connect767', '2024-11-07 06:34:26', '2024-11-07 06:34:26', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shop_products`
--

CREATE TABLE `shop_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `delivery_country` varchar(255) DEFAULT NULL,
  `delivery_first_name` varchar(255) DEFAULT NULL,
  `delivery_last_name` varchar(255) DEFAULT NULL,
  `delivery_company` varchar(255) DEFAULT NULL,
  `delivery_address` varchar(255) DEFAULT NULL,
  `delivery_apartment` varchar(255) DEFAULT NULL,
  `delivery_city` varchar(255) DEFAULT NULL,
  `delivery_state` varchar(255) DEFAULT NULL,
  `delivery_zip_code` varchar(255) DEFAULT NULL,
  `delivery_phone` varchar(255) DEFAULT NULL,
  `billing_first_name` varchar(255) DEFAULT NULL,
  `billing_last_name` varchar(255) DEFAULT NULL,
  `billing_company` varchar(255) DEFAULT NULL,
  `billing_address` varchar(255) DEFAULT NULL,
  `billing_apartment` varchar(255) DEFAULT NULL,
  `billing_city` varchar(255) DEFAULT NULL,
  `billing_state` varchar(255) DEFAULT NULL,
  `billing_zip_code` varchar(255) DEFAULT NULL,
  `account_holder_name` varchar(255) DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `total_price` decimal(10,2) DEFAULT NULL,
  `product_title` varchar(255) DEFAULT NULL,
  `product_color` varchar(255) DEFAULT NULL,
  `product_size` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_products`
--

INSERT INTO `shop_products` (`id`, `customer_id`, `email`, `delivery_country`, `delivery_first_name`, `delivery_last_name`, `delivery_company`, `delivery_address`, `delivery_apartment`, `delivery_city`, `delivery_state`, `delivery_zip_code`, `delivery_phone`, `billing_first_name`, `billing_last_name`, `billing_company`, `billing_address`, `billing_apartment`, `billing_city`, `billing_state`, `billing_zip_code`, `account_holder_name`, `price`, `quantity`, `total_price`, `product_title`, `product_color`, `product_size`, `created_at`, `updated_at`) VALUES
(16, 24, 'viler@mailinator.com', 'canada', 'Jada', 'Silva', 'Alvarez and Black Associates', 'Facilis fugit eiusm', 'Totam illo et fuga', NULL, 'Impedit voluptatum', '15834', '+1 (487) 929-2773', 'Dale', 'Young', 'Wood Houston Co', 'Quis quam aute volup', 'Quo aute atque est e', 'Ipsum vitae consequa', 'Sed porro quaerat en', '26544', 'Tanner Haynes', 26.00, 2, 364.00, 'Shy Guy Tours Ladies\' V-Neck T-Shirt', 'True Royal', '2XL', '2024-11-05 11:48:29', '2024-11-05 11:48:29'),
(17, 24, 'viler@mailinator.com', 'canada', 'Jada', 'Silva', 'Alvarez and Black Associates', 'Facilis fugit eiusm', 'Totam illo et fuga', NULL, 'Impedit voluptatum', '15834', '+1 (487) 929-2773', 'Dale', 'Young', 'Wood Houston Co', 'Quis quam aute volup', 'Quo aute atque est e', 'Ipsum vitae consequa', 'Sed porro quaerat en', '26544', 'Tanner Haynes', 26.00, 1, 364.00, 'Shy Guy Tours Ladies\' V-Neck T-Shirt', 'Navy', 'L', '2024-11-05 11:48:29', '2024-11-05 11:48:29'),
(18, 24, 'viler@mailinator.com', 'canada', 'Jada', 'Silva', 'Alvarez and Black Associates', 'Facilis fugit eiusm', 'Totam illo et fuga', NULL, 'Impedit voluptatum', '15834', '+1 (487) 929-2773', 'Dale', 'Young', 'Wood Houston Co', 'Quis quam aute volup', 'Quo aute atque est e', 'Ipsum vitae consequa', 'Sed porro quaerat en', '26544', 'Tanner Haynes', 26.00, 2, 364.00, 'Shy Guy Tours Ladies\' V-Neck T-Shirt', 'Navy', 'L', '2024-11-05 11:48:29', '2024-11-05 11:48:29'),
(19, 24, 'viler@mailinator.com', 'canada', 'Jada', 'Silva', 'Alvarez and Black Associates', 'Facilis fugit eiusm', 'Totam illo et fuga', NULL, 'Impedit voluptatum', '15834', '+1 (487) 929-2773', 'Dale', 'Young', 'Wood Houston Co', 'Quis quam aute volup', 'Quo aute atque est e', 'Ipsum vitae consequa', 'Sed porro quaerat en', '26544', 'Tanner Haynes', 26.00, 1, 364.00, 'Shy Guy Tours Ladies\' V-Neck T-Shirt', 'Navy', 'L', '2024-11-05 11:48:29', '2024-11-05 11:48:29'),
(20, 24, 'viler@mailinator.com', 'canada', 'Jada', 'Silva', 'Alvarez and Black Associates', 'Facilis fugit eiusm', 'Totam illo et fuga', NULL, 'Impedit voluptatum', '15834', '+1 (487) 929-2773', 'Dale', 'Young', 'Wood Houston Co', 'Quis quam aute volup', 'Quo aute atque est e', 'Ipsum vitae consequa', 'Sed porro quaerat en', '26544', 'Tanner Haynes', 26.00, 1, 364.00, 'Shy Guy Tours Ladies\' V-Neck T-Shirt', 'True Royal', 'L', '2024-11-05 11:48:29', '2024-11-05 11:48:29'),
(21, 24, 'viler@mailinator.com', 'canada', 'Jada', 'Silva', 'Alvarez and Black Associates', 'Facilis fugit eiusm', 'Totam illo et fuga', NULL, 'Impedit voluptatum', '15834', '+1 (487) 929-2773', 'Dale', 'Young', 'Wood Houston Co', 'Quis quam aute volup', 'Quo aute atque est e', 'Ipsum vitae consequa', 'Sed porro quaerat en', '26544', 'Tanner Haynes', 26.00, 1, 364.00, 'Shy Guy Tours Ladies\' V-Neck T-Shirt', 'Red', 'XL', '2024-11-05 11:48:29', '2024-11-05 11:48:29'),
(22, 24, 'viler@mailinator.com', 'canada', 'Jada', 'Silva', 'Alvarez and Black Associates', 'Facilis fugit eiusm', 'Totam illo et fuga', NULL, 'Impedit voluptatum', '15834', '+1 (487) 929-2773', 'Dale', 'Young', 'Wood Houston Co', 'Quis quam aute volup', 'Quo aute atque est e', 'Ipsum vitae consequa', 'Sed porro quaerat en', '26544', 'Tanner Haynes', 26.00, 1, 364.00, 'Shy Guy Tours Ladies\' V-Neck T-Shirt', 'White', '2XL', '2024-11-05 11:48:29', '2024-11-05 11:48:29'),
(23, 24, 'viler@mailinator.com', 'canada', 'Jada', 'Silva', 'Alvarez and Black Associates', 'Facilis fugit eiusm', 'Totam illo et fuga', NULL, 'Impedit voluptatum', '15834', '+1 (487) 929-2773', 'Dale', 'Young', 'Wood Houston Co', 'Quis quam aute volup', 'Quo aute atque est e', 'Ipsum vitae consequa', 'Sed porro quaerat en', '26544', 'Tanner Haynes', 26.00, 2, 364.00, 'Shy Guy Tours Ladies\' V-Neck T-Shirt', 'Leaf', 'S', '2024-11-05 11:48:29', '2024-11-05 11:48:29'),
(24, 24, 'viler@mailinator.com', 'canada', 'Jada', 'Silva', 'Alvarez and Black Associates', 'Facilis fugit eiusm', 'Totam illo et fuga', NULL, 'Impedit voluptatum', '15834', '+1 (487) 929-2773', 'Dale', 'Young', 'Wood Houston Co', 'Quis quam aute volup', 'Quo aute atque est e', 'Ipsum vitae consequa', 'Sed porro quaerat en', '26544', 'Tanner Haynes', 26.00, 3, 364.00, 'Shy Guy Tours Ladies\' V-Neck T-Shirt', 'Red', 'M', '2024-11-05 11:48:29', '2024-11-05 11:48:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `variations`
--

CREATE TABLE `variations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(255) NOT NULL,
  `size` varchar(50) NOT NULL,
  `stock_quantity` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `variations`
--

INSERT INTO `variations` (`id`, `product_id`, `color`, `size`, `stock_quantity`, `created_at`, `updated_at`) VALUES
(4, 28, 'white', '', 0, '2024-10-31 07:52:09', '2024-10-31 07:52:09'),
(5, 28, 'Black', '', 0, '2024-10-31 07:52:09', '2024-10-31 07:52:09'),
(6, 28, 'Army', '', 0, '2024-10-31 07:52:09', '2024-10-31 07:52:09'),
(7, 28, 'Asphalt', '', 0, '2024-10-31 07:52:09', '2024-10-31 07:52:09'),
(8, 28, 'Forest', '', 0, '2024-10-31 07:52:09', '2024-10-31 07:52:09'),
(9, 28, 'Navy', '', 0, '2024-10-31 07:52:09', '2024-10-31 07:52:09'),
(10, 28, 'Kelly Green', '', 0, '2024-10-31 07:52:09', '2024-10-31 07:52:09'),
(11, 29, 'White', '', 15, '2024-10-31 08:15:20', '2024-10-31 08:15:20'),
(12, 29, 'Black', '', 15, '2024-10-31 08:15:20', '2024-10-31 08:15:20'),
(13, 29, 'Leaf', '', 15, '2024-10-31 08:15:20', '2024-10-31 08:15:20'),
(14, 29, 'True Royal', '', 15, '2024-10-31 08:15:20', '2024-10-31 08:15:20'),
(15, 29, 'Red', '', 15, '2024-10-31 08:15:20', '2024-10-31 08:15:20'),
(16, 29, 'Dark Grey Heather', '', 0, '2024-10-31 08:15:20', '2024-10-31 08:15:20'),
(17, 29, 'Navy', '', 10, '2024-10-31 08:15:20', '2024-10-31 08:15:20'),
(20, 31, 'White', 'S', 20, '2025-01-06 21:28:58', '2025-01-06 21:28:58'),
(21, 31, 'Black', 'M', 20, '2025-01-06 21:28:58', '2025-01-06 21:28:58'),
(22, 31, 'Army', 'L', 20, '2025-01-06 21:28:58', '2025-01-06 21:28:58'),
(23, 32, 'Navy', 'S', 20, '2025-01-06 21:33:46', '2025-01-06 21:33:46'),
(24, 32, 'Kelly', 'M', 20, '2025-01-06 21:33:46', '2025-01-06 21:33:46'),
(25, 32, 'Light Blue', 'L', 20, '2025-01-06 21:33:46', '2025-01-06 21:33:46'),
(26, 33, 'White', 'M', 20, '2025-01-06 21:39:02', '2025-01-06 21:39:02'),
(27, 33, 'Navy', 'M', 20, '2025-01-06 21:39:02', '2025-01-06 21:39:02'),
(28, 33, 'Kelly', 'L', 20, '2025-01-06 21:39:02', '2025-01-06 21:39:02'),
(32, 35, 'Black', 'S', 20, '2025-01-06 21:44:41', '2025-01-06 21:44:41'),
(33, 35, 'Navy', 'M', 20, '2025-01-06 21:44:41', '2025-01-06 21:44:41'),
(34, 35, 'Chocolate', 'L', 20, '2025-01-06 21:44:41', '2025-01-06 21:44:41'),
(35, 36, 'White', 'S', 20, '2025-01-06 21:48:59', '2025-01-06 21:48:59'),
(36, 36, 'White', 'M', 20, '2025-01-06 21:48:59', '2025-01-06 21:48:59'),
(37, 36, 'White', 'L', 20, '2025-01-06 21:48:59', '2025-01-06 21:48:59'),
(38, 37, 'Black', 'S', 20, '2025-01-06 21:51:29', '2025-01-06 21:51:29'),
(39, 37, 'Black', 'M', 20, '2025-01-06 21:51:29', '2025-01-06 21:51:29'),
(40, 37, 'Black', 'L', 20, '2025-01-06 21:51:29', '2025-01-06 21:51:29'),
(41, 38, 'Red', 'S', 20, '2025-01-06 21:55:23', '2025-01-06 21:55:23'),
(42, 38, 'Red', 'M', 20, '2025-01-06 21:55:23', '2025-01-06 21:55:23'),
(43, 38, 'Red', 'L', 20, '2025-01-06 21:55:23', '2025-01-06 21:55:23'),
(44, 39, 'Black', 'S', 20, '2025-01-06 22:01:59', '2025-01-06 22:01:59'),
(45, 39, 'Dark Grey Heather', 'M', 20, '2025-01-06 22:01:59', '2025-01-06 22:01:59'),
(46, 39, 'Heather Columbia Blue', 'L', 20, '2025-01-06 22:01:59', '2025-01-06 22:01:59'),
(47, 40, 'Heather Columbia Blue', 'S', 20, '2025-01-06 22:05:22', '2025-01-06 22:05:22'),
(48, 40, 'Pink', 'M', 20, '2025-01-06 22:05:22', '2025-01-06 22:05:22'),
(49, 41, 'Black', 'S', 20, '2025-01-06 22:08:15', '2025-01-06 22:08:15'),
(50, 41, 'White', 'M', 20, '2025-01-06 22:08:15', '2025-01-06 22:08:15'),
(51, 42, 'Black', 'S', 20, '2025-01-06 22:12:30', '2025-01-06 22:12:30'),
(52, 42, 'Navy Blazer', 'M', 20, '2025-01-06 22:12:30', '2025-01-06 22:12:30'),
(53, 42, 'Maroon', 'L', 20, '2025-01-06 22:12:30', '2025-01-06 22:12:30'),
(54, 43, 'Black', 'S', 20, '2025-01-06 22:22:11', '2025-01-06 22:22:11'),
(55, 43, 'GREEN', 'M', 20, '2025-01-06 22:22:11', '2025-01-06 22:22:11'),
(56, 44, 'Black', 'S', 20, '2025-01-06 22:24:05', '2025-01-06 22:24:05'),
(57, 44, 'Black', 'M', 20, '2025-01-06 22:24:05', '2025-01-06 22:24:05'),
(58, 44, 'Black', 'L', 20, '2025-01-06 22:24:05', '2025-01-06 22:24:05');

-- --------------------------------------------------------

--
-- Table structure for table `variation_images`
--

CREATE TABLE `variation_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `variation_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `variation_images`
--

INSERT INTO `variation_images` (`id`, `variation_id`, `image`, `created_at`, `updated_at`) VALUES
(3, 4, 'variations/JbyjlLHH4VNuiqAkN9Fh62ZT5RA6MrqhhtEKrKJp.webp', '2024-10-31 07:52:09', '2024-10-31 07:52:09'),
(4, 5, 'variations/jcW8cl6bidYoWbvuYn50OSFkq68fCBQ6BOy7mLcv.webp', '2024-10-31 07:52:09', '2024-10-31 07:52:09'),
(5, 6, 'variations/PuX2niBGwTIfi6tIXgQMFinwXKbeYUQFFRjjREqn.webp', '2024-10-31 07:52:09', '2024-10-31 07:52:09'),
(6, 7, 'variations/qKfQNkXZbpmiL1dz6yOWXBQMK4yjJMcvIyufPWH1.webp', '2024-10-31 07:52:09', '2024-10-31 07:52:09'),
(7, 8, 'variations/8JvY9z7iPkDl5XZC5rpwgsL13Dloe9o1u77ReX1G.webp', '2024-10-31 07:52:09', '2024-10-31 07:52:09'),
(8, 9, 'variations/uBbXYDOHrK5j23o28Bwbbbmv0hZ7VqczyqFjvFgU.webp', '2024-10-31 07:52:09', '2024-10-31 07:52:09'),
(9, 10, 'variations/Xr3xP56xKRMauvK27qysIShdEjuEPX8ejanjOX1Z.webp', '2024-10-31 07:52:09', '2024-10-31 07:52:09'),
(10, 11, 'variations/9EhdZ7WIy35P7OKVoqnmPAbmGoccTb4jU7Rq99Ck.webp', '2024-10-31 08:15:20', '2024-10-31 08:15:20'),
(11, 12, 'variations/kvlH12PuM44NgFil53d7Oz5qACCUZkdogPRBm27S.webp', '2024-10-31 08:15:20', '2024-10-31 08:15:20'),
(12, 13, 'variations/N2B237GVXdalelk2De6Qnfsmj5qMeaVnQqzdMGkg.webp', '2024-10-31 08:15:20', '2024-10-31 08:15:20'),
(13, 14, 'variations/phqLDEAsDetNMS7rhg6qmx53M9nhtMRBBRvB8dyo.webp', '2024-10-31 08:15:20', '2024-10-31 08:15:20'),
(14, 15, 'variations/3T72qaIFS1VuOsz4PqBaD1iuwdiQ9GAzxp1zTAwh.webp', '2024-10-31 08:15:20', '2024-10-31 08:15:20'),
(15, 16, 'variations/pJPnF08IyxDEb0Sn02g8n980TzRDI4iCLMEe4ry8.webp', '2024-10-31 08:15:20', '2024-10-31 08:15:20'),
(16, 17, 'variations/IrVWIbRkJ9ujTicohcmlhHPPmMEj1jxD6FB8tWpZ.webp', '2024-10-31 08:15:20', '2024-10-31 08:15:20'),
(19, 20, 'variations/gXE3kApLjWIQIxfVRRQo8xUHsYzEmEDEqmFkfJS4.webp', '2025-01-06 21:28:58', '2025-01-06 21:28:58'),
(20, 21, 'variations/jvcbKM94DJ5QpDc7jg0S2L1v9Az0FzbQGrPuP5up.webp', '2025-01-06 21:28:58', '2025-01-06 21:28:58'),
(21, 22, 'variations/5w6cw3GZ1Vevi8yqFFW6R0Dhes2OHF3HBfPD7vQ9.webp', '2025-01-06 21:28:58', '2025-01-06 21:28:58'),
(22, 23, 'variations/AI66xijnGz91HpkAbDCqPcByzV3JXCndHLt9xTmh.webp', '2025-01-06 21:33:46', '2025-01-06 21:33:46'),
(23, 24, 'variations/Y4Tz8ygt0OjTReH7JcVvBHxLeXgWCm4GYrbcrS6y.webp', '2025-01-06 21:33:46', '2025-01-06 21:33:46'),
(24, 25, 'variations/CNZTehCR1COzmHO9bKvFMkqzmn9HTiRznEyvXJzr.webp', '2025-01-06 21:33:46', '2025-01-06 21:33:46'),
(25, 26, 'variations/RDJTf3Cp7AhFvV29H9go9P48UMYoNx0flqo7PNUm.webp', '2025-01-06 21:39:02', '2025-01-06 21:39:02'),
(26, 27, 'variations/F5tTJ3gQTydnq0Il5jSjC2SU1q2AvuVD7gQhI26o.webp', '2025-01-06 21:39:02', '2025-01-06 21:39:02'),
(27, 28, 'variations/9bJJJcPrVW1EJJi4kgobKVb1PxrWoJVHfM5NM13k.webp', '2025-01-06 21:39:02', '2025-01-06 21:39:02'),
(31, 32, 'variations/CoO5jhEZAyyUmz4gmxblPHdpl388i2YKxH9D2sUh.webp', '2025-01-06 21:44:41', '2025-01-06 21:44:41'),
(32, 33, 'variations/kEEqrnLdUbKf4Gzv9BM9UAds5Ko3gfGPsrZ6BvfG.webp', '2025-01-06 21:44:41', '2025-01-06 21:44:41'),
(33, 34, 'variations/5KzkgP55d61xIzuvdnJcO403Svvl1uIljzGx2u1c.webp', '2025-01-06 21:44:41', '2025-01-06 21:44:41'),
(34, 35, 'variations/9iPc0ZmaPk9IJ1oIfM8E2gryOlkrZQs6ytOiyLqU.webp', '2025-01-06 21:48:59', '2025-01-06 21:48:59'),
(35, 36, 'variations/MCqjlDMR8UYQ0CxmPWYyWvrZfg50FdQKhgeFxGA4.webp', '2025-01-06 21:48:59', '2025-01-06 21:48:59'),
(36, 37, 'variations/cDLHIHpVDGL5s5SIaQLdJ53EyTSjFdJJO0eg7H5a.webp', '2025-01-06 21:48:59', '2025-01-06 21:48:59'),
(37, 38, 'variations/1XxK3cr9iYYyMkiRFv55A7G1fPL5nloZssxozdxX.webp', '2025-01-06 21:51:29', '2025-01-06 21:51:29'),
(38, 39, 'variations/p0FcTH3183YLbF5GjhsLbToWzHlP28GqqyX2AYIr.webp', '2025-01-06 21:51:29', '2025-01-06 21:51:29'),
(39, 40, 'variations/nlSHihRlpcqJ6PPogzFXBKqv9GpJD7Hdi3qovG5N.webp', '2025-01-06 21:51:29', '2025-01-06 21:51:29'),
(40, 41, 'variations/nuH6lOh7S1ErdAGxWy2rilwA8KaE4k8IhFVCbmtp.webp', '2025-01-06 21:55:23', '2025-01-06 21:55:23'),
(41, 42, 'variations/FnwYmfILEUVRHfKIzYf6FBFSjlieuhGi9U3v9nbq.webp', '2025-01-06 21:55:23', '2025-01-06 21:55:23'),
(42, 43, 'variations/db8CvWKbWOR8tR5lNWap4J3hliodfxAZMJN5tk3b.webp', '2025-01-06 21:55:23', '2025-01-06 21:55:23'),
(43, 44, 'variations/2Ic4qedoIyA2BaoGekJOZOFpCy4tBBjDL4NQRN8j.webp', '2025-01-06 22:01:59', '2025-01-06 22:01:59'),
(44, 45, 'variations/GylXzH61Tmvlz8S299GCSsS9y2moexnve8H1jw5W.jpg', '2025-01-06 22:01:59', '2025-01-06 22:01:59'),
(45, 46, 'variations/4JqMWx1EHTHcc1ZiUX94PqSeTHfmwJqUHzNPspcD.webp', '2025-01-06 22:01:59', '2025-01-06 22:01:59'),
(46, 47, 'variations/bhbBl0SDRYJ1lbN15WeoksE8vC2efKJtidTrdzs2.webp', '2025-01-06 22:05:22', '2025-01-06 22:05:22'),
(47, 48, 'variations/Vh4XaG71EBszrWKSl1StkbSU74V64fo1PEBpdFCQ.webp', '2025-01-06 22:05:23', '2025-01-06 22:05:23'),
(48, 49, 'variations/bK3RNhNtSeMcB5OIKPtoxfLlibHgJdiTRxTklnYb.webp', '2025-01-06 22:08:15', '2025-01-06 22:08:15'),
(49, 50, 'variations/cLZtdzgx9JtpQdC9ROubHHp1s5Z28nLuHJC6pCtD.webp', '2025-01-06 22:08:15', '2025-01-06 22:08:15'),
(50, 51, 'variations/VEoCILqTFv3l4hAKQIBhBNojpyk9NdU63J6rmXvp.webp', '2025-01-06 22:12:30', '2025-01-06 22:12:30'),
(51, 52, 'variations/9G5yQBfpGeKFfZLJSnqb7UIcYqd5kFgLufNOHzyt.webp', '2025-01-06 22:12:30', '2025-01-06 22:12:30'),
(52, 53, 'variations/HaXQ9ShlfnNs5dVhKiB7C3LKZkS5dj9Px0XZ7L7H.webp', '2025-01-06 22:12:30', '2025-01-06 22:12:30'),
(53, 54, 'variations/MWRtoWgPAANzDUbIdcNUPlbffqGvHdKgHaz2xSJ3.webp', '2025-01-06 22:22:11', '2025-01-06 22:22:11'),
(54, 55, 'variations/vqTTON3dHR51R0JUkhS9ivK9YFxXPpGnutfyhUkP.webp', '2025-01-06 22:22:11', '2025-01-06 22:22:11'),
(55, 56, 'variations/Hz84KNNYlWFmWCD3rTQnRj25eGz2D29WRbYZAItr.webp', '2025-01-06 22:24:05', '2025-01-06 22:24:05'),
(56, 57, 'variations/mc0AXveVD8KaBHBikNywfmdXwFyOKPRA9zWUihNe.webp', '2025-01-06 22:24:05', '2025-01-06 22:24:05'),
(57, 58, 'variations/FD2XpnsN64nrjUiKtKY77KRXb1rUV3ochmMS8keQ.webp', '2025-01-06 22:24:05', '2025-01-06 22:24:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email_address_unique` (`email_address`);

--
-- Indexes for table `business_registrations`
--
ALTER TABLE `business_registrations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `business_registrations_email_unique` (`Email`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custome_payments`
--
ALTER TABLE `custome_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_products`
--
ALTER TABLE `custom_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_products_size_guides`
--
ALTER TABLE `custom_products_size_guides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_products_size_staff`
--
ALTER TABLE `custom_products_size_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `directory_table`
--
ALTER TABLE `directory_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register_table`
--
ALTER TABLE `register_table`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `register_table_email_address_unique` (`email_address`);

--
-- Indexes for table `shop_products`
--
ALTER TABLE `shop_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `variations`
--
ALTER TABLE `variations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `variations_product_id_foreign` (`product_id`);

--
-- Indexes for table `variation_images`
--
ALTER TABLE `variation_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `variation_images_variation_id_foreign` (`variation_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `business_registrations`
--
ALTER TABLE `business_registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `custome_payments`
--
ALTER TABLE `custome_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `custom_products`
--
ALTER TABLE `custom_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `custom_products_size_guides`
--
ALTER TABLE `custom_products_size_guides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=761;

--
-- AUTO_INCREMENT for table `custom_products_size_staff`
--
ALTER TABLE `custom_products_size_staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `directory_table`
--
ALTER TABLE `directory_table`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `register_table`
--
ALTER TABLE `register_table`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `shop_products`
--
ALTER TABLE `shop_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `variations`
--
ALTER TABLE `variations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `variation_images`
--
ALTER TABLE `variation_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `variations`
--
ALTER TABLE `variations`
  ADD CONSTRAINT `variations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `variation_images`
--
ALTER TABLE `variation_images`
  ADD CONSTRAINT `variation_images_variation_id_foreign` FOREIGN KEY (`variation_id`) REFERENCES `variations` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
