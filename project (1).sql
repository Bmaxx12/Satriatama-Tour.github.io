-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2024 at 04:51 PM
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `aid` int(11) NOT NULL,
  `afname` varchar(100) NOT NULL,
  `alname` varchar(100) NOT NULL,
  `phone` char(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `identity_id` char(16) NOT NULL,
  `dob` date NOT NULL,
  `username` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`aid`, `afname`, `alname`, `phone`, `email`, `identity_id`, `dob`, `username`, `gender`, `password`) VALUES
(5, 'Muhammad', 'Haryanto', '03150100830', 'iciwkir@gmail.com', '3530231218003', '2023-05-03', 'admin1', 'M', 'admin123'),
(21, 'Muhammad', 'Daffa Alwafi', '081806336701', 'daffaalwafi369@gmail.com', '3175092511050003', '2005-11-25', 'i7s', 'M', 'alwapi7s');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `aid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `cqty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`aid`, `pid`, `cqty`) VALUES
(21, 53, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order-details`
--

CREATE TABLE `order-details` (
  `oid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oid` int(11) NOT NULL,
  `dateod` date NOT NULL,
  `datedel` date DEFAULT NULL,
  `aid` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(100) NOT NULL,
  `account` char(16) DEFAULT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `dateod`, `datedel`, `aid`, `address`, `city`, `country`, `account`, `total`) VALUES
(44, '2024-06-02', NULL, 21, 'jl kh raiman no 27 rt 08 rw 03 kelurahan balekambang kec kramat jati jakarta timur', 'Jakarta', 'Indonesia', NULL, 8000000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `qtyavail` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `brand` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `pname`, `category`, `description`, `price`, `qtyavail`, `img`, `brand`) VALUES
(30, 'Razer BlackWidow V4 Pro', 'keyboard', ' Take your gaming experience to the next level with the Razer BlackWidow V4 Pro! This mechanical gaming keyboard features Razer signature green switches, providing tactile feedback and optimized actua', 20000000, 14, 'x3.jpeg', 'Razor'),
(38, 'MageGee Mechanical Gaming Keyboard', 'keyboard', 'Upgrade your gaming setup with the MageGee Mechanical Gaming Keyboard. Built with high-quality and durable materials, this keyboard features mechanical switches that provide a tactile and satisfying t', 500000, 5, 'no.jpeg', 'MageGee'),
(44, 'ASUS ROG Strix GeForce RTX 4090 24GB OC Edition', 'gpu', 'Graphic Engine NVIDIA® GeForce RTX® 4090  Bus Standard PCI Express 4.0  OpenGL OpenGL®4.6  Video Memory 24GB GDDR6X  Engine Clock OC mode: 2640 MHz Gaming mode: 2610 MHz (Boost Clock)  CUDA Core 16384', 40000000, 4, '96bcfdea-f74a-4ead-afee-1375501e1af9.png', 'Asus'),
(45, 'Monitor Samsung Oddysey 49\" G9', 'monitor', 'Quantum Mini LEDs and HDR2000 delivers exceptional picture quality True immersion by 1000R display with 32:9 aspect ratio Flawless smooth gameplay with 240hz refresh rate, 1ms response time, G-Sync an', 20000000, 3, 'download.jpeg', 'Samsung'),
(47, 'Deepcool CH560 DIGITAL WHITE Mid-Tower', 'case', 'The next generation of airflow cases from DeepCool has arrived, and they are indeed glorious. The CH560 DIGITAL WH is a newly designed mid-tower case with a concentrated focus on increased airflow thr', 1600000, 19, '01.webp', 'DeepCool'),
(48, 'LIAN LI - Strimer 24pin', 'sleeve_cable', 'RGB 24 PIN cable.Glamorous Neon lights effects, Ultimate Faith in PC DIY,Strimer has two thick layers up to 1.5cm,Two Ways:Support Motherboard the same lighting effect,Strimer packed with the PCI brac', 500000, 20, 'shopping.webp', 'LIAN LI'),
(49, 'Deepcool ASSASSIN IV', 'air_cooler', 'The ASSASSIN returns with a new aesthetic and efficient cooling capacity. The ASSASSIN IV provides exceptional performance and is armed with seven heat pipes and newly designed 120 and 140mm FDB fans.', 800000, 28, '06.webp', 'Deepcool'),
(50, 'ASUS ROG RYUJIN III 360', 'water_cooler', 'Go cooler than cool with the ROG Ryujin III. Its roomy 3.5-inch LCD screen displays live system stats or your custom artwork and animated GIFs. Underneath, an embedded fan upgraded with Axial-tech imp', 40000000, 9, 'w273.png', 'Asus'),
(51, 'ROG RYUJIN III 360 ARGB White Edition', 'water_cooler', 'Go cooler than cool with the Ryujin III White Edition. Its pristine frame houses an expansive 3.5-inch LCD screen that displays live system stats, animated GIFs, or even your own custom artwork. Under', 5000000, 6, 'w273 (1).png', 'Asus'),
(52, 'SSD Samsung 990 PRO 1TB - SSD M.2 Nvme PCIE Gen 4 - HEATSINK', 'ssd', 'PCIe 4.0 speed maximized Huge speed boost. 40% and 55% faster random read/write speeds than 980 PRO - up to 1400K/1550K IOPS, while sequential read/write speeds up to 7450/6900 MB/s reach near the max', 2300000, 29, 'download (1).jpeg', 'Samsung'),
(53, 'PNY SSD NVME 1TB CS2241 PCIE Gen 4x4 3x4 M.2 2280 HIGH SPEED', 'ssd', 'NVMe Gen4 up from a SATA based SSD in an NVMe enabled computerHigh performance SSD with up to double the performance as compared to entry Gen3 x4 based SSDsTransfer speedÂ up to 3,600 MB/sFaster boot-', 1500000, 30, 'no-brand_no-brand_full02.webp', 'PNY'),
(54, 'Corsair RM Series RM750', 'psu', 'ATX Connector 1 Adjustable Single/Multi 12V Rail No ATX12V Version v2.52 Continuous output rated temperature C 50°C Continuous power W 750 Watts Fan bearing technology Rifle Bearing Fan size mm 135mm ', 1800000, 200, '6a9ec624-bbcd-4a27-beb7-2a30377cfb34.jpg', 'Corsair'),
(55, 'ZOTAC GAMING GeForce RTX 4080 SUPER Trinity OC White Edition ', 'gpu', 'The RTX 4080 graphics card delivers high performance and utilizes the state-of-the-art NVIDIA Ada Lovelace architecture to give gamers cutting-edge features such as DLSS 3.5 and real-time raytracing.', 15000000, 100, 'zt-d40820q-10p-image01_0.jpg', 'ZOTAC'),
(56, 'COLORFUL iGame GeForce RTX 4080 SUPER ULTRA W OC 16GB GDDR6X', 'gpu', 'The RTX 4080 TI graphics card provides super-fast performance and high-quality graphics for professional gamers and creative users.', 20000000, 80, '61496ec2-558d-48ee-ab72-0eb5b1560605.jpg', 'iGame'),
(57, 'ZOTAC GAMING GeForce RTX 4070 Twin Edge OC', 'gpu', 'The ZOTAC GAMING GeForce RTX 4070 Twin Edge OC is a compact and powerful graphics card, featuring the NVIDIA Ada Lovelace architecture and an aerodynamic-inspired design.', 12000000, 120, 'zt-d40700h-10m-image01.jpg', 'ZOTAC'),
(58, 'AORUS GeForce RTX™ 4070 Ti MASTER 12G', 'gpu', 'The RTX 4070 TI graphics card comes with advanced cooling system to keep temperatures low and performance optimal in intense usage scenarios.', 17000000, 90, 'kf-card.png', 'GIGABYTE'),
(59, 'ROG Strix GeForce RTX™ 4070 SUPER 12GB GDDR6X OC Edition', 'gpu', 'The RTX 4070 SUPER graphics card offers significant performance improvements over the previous model, designed to deliver an exceptional and smooth gaming experience.', 14000000, 110, 'Img_34144070.jpg', 'Asus ROG'),
(60, 'GeForce RTX™ 4060 GAMING X 8G', 'gpu', 'The RTX 4060 graphics card delivers powerful performance at an affordable price, suitable for users looking to upgrade from entry-level graphics cards.', 8000000, 149, '1024.png', 'MSI'),
(61, 'ZOTAC RTX 4060 TI', 'gpu', 'The RTX 4060 TI graphics card offers higher performance than the standard model, at an affordable price for users who need more performance from their graphics card.', 9000000, 140, 'ef7de2ba-ef85-4781-a157-9bc54a659c38.jpg', 'ZOTAC'),
(62, 'Corsair RM550x', 'psu', 'Fully modular PSU with 80 PLUS Gold certification', 1500000, 101, '27420346_5f19a938-2aae-41e5-b5ad-758e85196eb0_700_510.jpg', 'Corsair'),
(63, 'Corsair RM650x', 'psu', 'Fully modular PSU with 80 PLUS Gold certification', 1750000, 100, '17785097_e9fb511c-fb30-4579-988e-f73cf4a3b3c3_960_700.png', 'Corsair'),
(64, 'Corsair RM850x', 'psu', 'Fully modular PSU with 80 PLUS Gold certification', 2500000, 102, 'images (1).jpeg', 'Corsair'),
(65, 'Corsair RM1000x', 'psu', 'Fully modular PSU with 80 PLUS Gold certification', 3000000, 100, 'corsair_psu_corsair_rm1000x_shift_80_plus_gold_fully_modular_full25_iwti12vy.webp', 'Corsair'),
(66, 'Steelseries Apex 7 TKL', 'keyboard', 'Durable mechanical keyboard with OLED Smart Display and RGB lighting', 2500000, 100, 'images (2).jpeg', 'Steelseries'),
(67, 'Steelseries Apex 7 TKL Ghost Edition', 'keyboard', 'Limited edition design with linear red mechanical switches, OLED Smart Display, and double shot PBT pudding keycaps', 3000000, 100, 'S4e085fd8b63640d3a137079aed42f5fdu.jpg_640x640Q90.jpg_.webp', 'Steelseries'),
(68, 'Razer BlackWidow V3', 'keyboard', 'Mechanical gaming keyboard with Razer Green switches and customizable RGB lighting', 2800000, 100, 'BLACKWIDOW-V3-PRO.jpg', 'Razer'),
(69, 'Gamen Titan GT-200', 'keyboard', 'Mechanical gaming keyboard with RGB lighting and blue switches', 1200000, 100, '7741183b-9649-4a8f-9a20-3d1d840fab22.jpg', 'Gamen'),
(70, 'Gamen Titan GT-300', 'keyboard', 'Mechanical gaming keyboard with programmable keys and customizable RGB lighting', 1500000, 100, 'b1b21c35-a523-43d5-9719-11e5ea0bbeb7.jpg', 'Gamen'),
(76, 'Fantech Aria XD7', 'mouse', 'Mouse gaming dengan desain ergonomis dan sensor presisi tinggi', 700000, 100, 'FANTECH-ARIA-XD7-Mouse-Gaming-PIXART3395-Mouse-kabel-BT-nirkabel-26000DPI-enkoder-emas-TTC-80-juta.webp', 'Fantech'),
(77, 'Logitech G Pro Mouse Gaming', 'mouse', 'Mouse gaming dengan performa tinggi, digunakan oleh atlet e-sports profesional', 2200000, 100, 'plasma-hero-carbon-gallery-4.png', 'Logitech'),
(78, 'ASUS ROG Spatha', 'mouse', 'Wireless gaming mouse dengan 12 tombol yang dapat diprogram dan RGB lighting', 2500000, 100, '5215b2ad-5b99-4b31-adf8-1e9125ca41b6.jpg', 'ASUS'),
(79, 'Logitech G502 X Plus', 'mouse', 'Mouse gaming wireless RGB dengan HERO 25K DPI sensor', 2209000, 100, 'dc4fc56f-44ef-43e2-8ee3-1c1f78192008.jpg', 'Logitech'),
(80, 'Razer Basilisk X Hyperspeed', 'mouse', 'Wireless gaming mouse dengan 16000 DPI sensor dan koneksi HyperSpeed', 659000, 100, '11008526_044da5dc-3703-4533-8ec0-4ba139ca1572_1499_1499.jpeg', 'Razer'),
(81, 'ASRock B660M Pro RS', 'Motherboard', 'Micro ATX motherboard with Intel B660 chipset, supports Intel 12th, 13th, and 14th Gen CPUs', 1800000, 30, '', 'ASRock'),
(82, 'MSI MAG Z690 Tomahawk WiFi', 'Motherboard', 'ATX motherboard with Intel Z690 chipset, supports Intel 12th, 13th, and 14th Gen CPUs, advanced overclocking', 3750000, 20, '', 'MSI'),
(83, 'Gigabyte Z690 AORUS Master', 'Motherboard', 'High-end ATX motherboard with Intel Z690 chipset, supports Intel 12th, 13th, and 14th Gen CPUs, advanced cooling solutions', 6000000, 10, '', 'Gigabyte'),
(84, 'ASUS Prime Z690-P', 'Motherboard', 'ATX motherboard with Intel Z690 chipset, supports Intel 12th, 13th, and 14th Gen CPUs, optimized power design', 3300000, 25, '', 'ASUS'),
(85, 'ROG Strix Z690-E Gaming WiFi', 'Motherboard', 'Premium ATX motherboard with Intel Z690 chipset, supports Intel 12th, 13th, and 14th Gen CPUs, gaming-optimized', 6750000, 15, '', 'ASUS ROG'),
(86, 'MSI PRO B650M-A WiFi', 'Motherboard', 'Micro ATX motherboard with AMD B650 chipset, supports AMD Ryzen 7000 series processors', 2250000, 30, '', 'MSI'),
(87, 'ASRock B650 Steel Legend', 'Motherboard', 'ATX motherboard with AMD B650 chipset, supports AMD Ryzen 7000 series processors', 2700000, 20, '', 'ASRock'),
(88, 'Gigabyte X670 AORUS Elite AX', 'Motherboard', 'ATX motherboard with AMD X670 chipset, supports AMD Ryzen 7000 series processors, advanced thermal design', 4200000, 15, '', 'Gigabyte'),
(89, 'ASUS TUF Gaming X670E-PLUS WiFi', 'Motherboard', 'ATX motherboard with AMD X670E chipset, supports AMD Ryzen 7000 series processors, military-grade components', 4650000, 25, '', 'ASUS TUF'),
(90, 'ROG Crosshair X670E Hero', 'Motherboard', 'Premium ATX motherboard with AMD X670E chipset, supports AMD Ryzen 7000 series processors, advanced gaming features', 7500000, 10, '', 'ASUS ROG'),
(91, 'Intel Core i9-12900K', 'CPU', '12th Gen, 16 Cores/24 Threads, 3.2 GHz Base Clock, 5.2 GHz Max Turbo Clock', 7000000, 10, '', 'Intel'),
(92, 'Intel Core i7-12700K', 'CPU', '12th Gen, 12 Cores/20 Threads, 3.6 GHz Base Clock, 5.0 GHz Max Turbo Clock', 5500000, 15, '', 'Intel'),
(93, 'Intel Core i5-12600K', 'CPU', '12th Gen, 10 Cores/16 Threads, 3.7 GHz Base Clock, 4.9 GHz Max Turbo Clock', 4000000, 20, '', 'Intel'),
(94, 'Intel Core i9-13900K', 'CPU', '13th Gen, 24 Cores/32 Threads, 3.0 GHz Base Clock, 5.8 GHz Max Turbo Clock', 8000000, 8, '', 'Intel'),
(95, 'Intel Core i7-13700K', 'CPU', '13th Gen, 16 Cores/24 Threads, 3.4 GHz Base Clock, 5.4 GHz Max Turbo Clock', 6000000, 12, '', 'Intel'),
(96, 'Intel Core i5-13600K', 'CPU', '13th Gen, 14 Cores/20 Threads, 3.5 GHz Base Clock, 5.1 GHz Max Turbo Clock', 4500000, 18, '', 'Intel'),
(97, 'Intel Core i9-14900K', 'CPU', '14th Gen, 24 Cores/32 Threads, 3.2 GHz Base Clock, 6.0 GHz Max Turbo Clock', 9000000, 5, '', 'Intel'),
(98, 'Intel Core i7-14700K', 'CPU', '14th Gen, 20 Cores/28 Threads, 3.6 GHz Base Clock, 5.6 GHz Max Turbo Clock', 6500000, 10, '', 'Intel'),
(99, 'Intel Core i5-14600K', 'CPU', '14th Gen, 16 Cores/24 Threads, 3.5 GHz Base Clock, 5.2 GHz Max Turbo Clock', 5000000, 15, '', 'Intel'),
(100, 'Intel Core i3-12100F', 'CPU', '12th Gen, 4 Cores/8 Threads, 3.3 GHz Base Clock, 4.3 GHz Max Turbo Clock', 3000000, 25, '', 'Intel'),
(101, 'AMD Ryzen 9 7950X', 'CPU', '7000 Series, 16 Cores/32 Threads, 4.5 GHz Base Clock, 5.7 GHz Max Turbo Clock', 10000000, 7, '', 'AMD'),
(102, 'AMD Ryzen 7 7700X', 'CPU', '7000 Series, 8 Cores/16 Threads, 4.5 GHz Base Clock, 5.4 GHz Max Turbo Clock', 7000000, 10, '', 'AMD'),
(103, 'AMD Ryzen 5 7600X', 'CPU', '7000 Series, 6 Cores/12 Threads, 4.7 GHz Base Clock, 5.3 GHz Max Turbo Clock', 5000000, 20, '', 'AMD'),
(104, 'AMD Ryzen 9 7900', 'CPU', '7000 Series, 12 Cores/24 Threads, 4.0 GHz Base Clock, 5.4 GHz Max Turbo Clock', 8500000, 12, '', 'AMD'),
(105, 'AMD Ryzen 7 7800X', 'CPU', '7000 Series, 8 Cores/16 Threads, 4.2 GHz Base Clock, 5.0 GHz Max Turbo Clock', 6500000, 15, '', 'AMD'),
(106, 'Cooler Master Hyper 212 EVO', 'air_cooler', '120mm single-fan, versatile all-in-one cooling system, Intel/AMD support', 450000, 20, '', 'Cooler Master'),
(107, 'Noctua NH-D15', 'air_cooler', 'Dual-tower, dual-fan, premium heatsink, Intel/AMD support', 1250000, 15, '', 'Noctua'),
(108, 'be quiet! Dark Rock Pro 4', 'air_cooler', 'Dual-tower, dual-fan, virtually inaudible, Intel/AMD support', 1350000, 12, '', 'be quiet!');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `oid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `rtext` varchar(1000) DEFAULT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `aid` int(11) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`aid`),
  ADD UNIQUE KEY `cnic` (`identity_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`aid`,`pid`),
  ADD KEY `cartfk2` (`pid`);

--
-- Indexes for table `order-details`
--
ALTER TABLE `order-details`
  ADD PRIMARY KEY (`oid`,`pid`),
  ADD KEY `orderdtfk2` (`pid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `ordersfk` (`aid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`oid`,`pid`),
  ADD KEY `reviewsfk2` (`pid`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`aid`,`pid`),
  ADD KEY `wishlistfk2` (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cartfk1` FOREIGN KEY (`aid`) REFERENCES `accounts` (`aid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cartfk2` FOREIGN KEY (`pid`) REFERENCES `products` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order-details`
--
ALTER TABLE `order-details`
  ADD CONSTRAINT `orderdtfk1` FOREIGN KEY (`oid`) REFERENCES `orders` (`oid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderdtfk2` FOREIGN KEY (`pid`) REFERENCES `products` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `ordersfk` FOREIGN KEY (`aid`) REFERENCES `accounts` (`aid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviewsfk1` FOREIGN KEY (`oid`) REFERENCES `orders` (`oid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviewsfk2` FOREIGN KEY (`pid`) REFERENCES `products` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlistfk1` FOREIGN KEY (`aid`) REFERENCES `accounts` (`aid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlistfk2` FOREIGN KEY (`pid`) REFERENCES `products` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
