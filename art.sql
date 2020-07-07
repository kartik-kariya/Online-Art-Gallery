-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2018 at 10:01 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `art`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_artist`
--

CREATE TABLE `tbl_artist` (
  `artist_id` int(11) NOT NULL,
  `artist_firstname` text NOT NULL,
  `artist_lastname` text NOT NULL,
  `artist_username` text NOT NULL,
  `artist_password` text NOT NULL,
  `artist_email` text NOT NULL,
  `artist_contactnumber` varchar(13) NOT NULL,
  `artist_dob` varchar(20) NOT NULL,
  `artist_city` int(11) NOT NULL,
  `artist_qrimg` text NOT NULL,
  `artist_qrcode` text NOT NULL,
  `artist_profileimage` text NOT NULL,
  `artist_idproof` text NOT NULL,
  `artist_legalname` text NOT NULL,
  `artist_streetaddress` text NOT NULL,
  `artist_state` int(11) NOT NULL,
  `artist_country` int(11) NOT NULL,
  `artist_zipcode` int(11) NOT NULL,
  `artist_about` text NOT NULL,
  `artist_education` text NOT NULL,
  `artist_googleplus` text NOT NULL,
  `artist_twitter` text NOT NULL,
  `artist_facebook` text NOT NULL,
  `artist_instagram` text NOT NULL,
  `artist_website` text NOT NULL,
  `artist_status` varchar(10) NOT NULL,
  `artist_verification` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_artist`
--

INSERT INTO `tbl_artist` (`artist_id`, `artist_firstname`, `artist_lastname`, `artist_username`, `artist_password`, `artist_email`, `artist_contactnumber`, `artist_dob`, `artist_city`, `artist_qrimg`, `artist_qrcode`, `artist_profileimage`, `artist_idproof`, `artist_legalname`, `artist_streetaddress`, `artist_state`, `artist_country`, `artist_zipcode`, `artist_about`, `artist_education`, `artist_googleplus`, `artist_twitter`, `artist_facebook`, `artist_instagram`, `artist_website`, `artist_status`, `artist_verification`) VALUES
(11, 'Hussain', 'Khan', 'hussain007', 'Hussain007', 'kariya.kartik.17@gmail.com', '9990099900', '', 1, './arts_files/Artist/hussain007/QRCODE/hussain007.png', 'hussain007', './arts_files/Artist/hussain007/Profile-Image/68e074b6-photo.jpg', './arts_files/Artist/hussain007/Id-Proof/3bf3c2e8-photo.jpg', 'Riyaz Khan', '', 1, 1, 100100, '', '', '', '', '', '', '', 'active', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_artistrating`
--

CREATE TABLE `tbl_artistrating` (
  `artistrating_id` int(11) NOT NULL,
  `customer_username` text NOT NULL,
  `artist_id` int(11) NOT NULL,
  `artistrating_ratings` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_artsgallery`
--

CREATE TABLE `tbl_artsgallery` (
  `artgallery_id` int(11) NOT NULL,
  `file` text NOT NULL,
  `status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_artsgallery`
--

INSERT INTO `tbl_artsgallery` (`artgallery_id`, `file`, `status`) VALUES
(1, './arts_files/Arts_Gallery/5095a4f1-7c03f8b0e9a44f8304c189ebb55b57e7.jpg', 'active'),
(2, './arts_files/Arts_Gallery/277bc3bc-540888b67215d6d59d4929c2266e2b0c.jpg', 'active'),
(3, './arts_files/Arts_Gallery/e1c26467-Modern-Art-HD-Wallpaper-Free-amazing-colorful-artworks-best-arts-ever-historical-images-cool-paints-widescreen-art-wallpapers-for-windows-2406x1504.jpg', 'active'),
(4, './arts_files/Arts_Gallery/1f456bfc-Nature-Yellow-flower-in-vally-91745800.jpg', 'active'),
(5, './arts_files/Arts_Gallery/ed2b2504-Nature-Yellow-flower-in-vally-91745800.jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_artsrating`
--

CREATE TABLE `tbl_artsrating` (
  `artsrating_id` int(11) NOT NULL,
  `customer_username` text NOT NULL,
  `shop_id` int(11) NOT NULL,
  `artsrating_ratings` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_artsrating`
--

INSERT INTO `tbl_artsrating` (`artsrating_id`, `customer_username`, `shop_id`, `artsrating_ratings`) VALUES
(1, 'jason007', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `blog_id` int(11) NOT NULL,
  `blog_username` text NOT NULL,
  `blog_title` text NOT NULL,
  `blog_description` text NOT NULL,
  `blog_status` varchar(8) NOT NULL,
  `blog_image` text NOT NULL,
  `blog_date` date NOT NULL,
  `blog_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` double NOT NULL,
  `cart_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `shop_id`, `customer_id`, `qty`, `price`, `cart_status`) VALUES
(2, 1, 1, 1, 2000, 1),
(3, 1, 1, 1, 2000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_image` text NOT NULL,
  `category_status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_image`, `category_status`) VALUES
(1, 'Painting', './arts_files/Arts_Category/0c7fac27-artistic-hd-wallpaper-1.jpg', 'active'),
(2, 'Photography', './arts_files/Arts_Category/88ab1bd8-wp1813229.jpg', 'active'),
(3, 'Sculpture', './arts_files/Arts_Category/1bcb5f45-Birdman.jpg', 'active'),
(4, 'Collage', './arts_files/Arts_Category/79ff5e79-9691847-letter-a-with-food-collage-concept-art.jpg', 'active'),
(5, 'Collage', './arts_files/Arts_Category/bd903c54-9691847-letter-a-with-food-collage-concept-art.jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE `tbl_city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(20) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`city_id`, `city_name`, `state_id`, `city_status`) VALUES
(1, 'Ahemdabad', 1, 'active'),
(2, 'Vadodara', 1, 'active'),
(3, 'Rajkot', 1, 'active'),
(4, 'Mumbai', 2, 'active'),
(5, 'Amritsar', 3, 'active'),
(6, 'Jaipur', 4, 'active'),
(7, 'Udaipur', 4, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `body` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `date` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

CREATE TABLE `tbl_country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_country`
--

INSERT INTO `tbl_country` (`country_id`, `country_name`) VALUES
(1, 'India');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(11) NOT NULL,
  `customer_firstname` text NOT NULL,
  `customer_lastname` text NOT NULL,
  `customer_username` text NOT NULL,
  `customer_password` text NOT NULL,
  `customer_emailid` text NOT NULL,
  `customer_contactnumber` varchar(13) NOT NULL,
  `customer_favorites` text NOT NULL,
  `customer_profileimage` text NOT NULL,
  `customer_status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_firstname`, `customer_lastname`, `customer_username`, `customer_password`, `customer_emailid`, `customer_contactnumber`, `customer_favorites`, `customer_profileimage`, `customer_status`) VALUES
(1, 'Jason', 'Roy', 'jason007', 'jason007', 'kariya.kartik.17@gmail.com', '9990099900', '', './arts_files/Customer/jason007/Profile-Image/4432d329-Co5MtRRVUAEO7if.jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shop`
--

CREATE TABLE `tbl_shop` (
  `shop_id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `arttitle` text NOT NULL,
  `artfile` text NOT NULL,
  `artcategory` text NOT NULL,
  `artsubject` text NOT NULL,
  `yearofcreation` varchar(4) NOT NULL,
  `available_copies` int(11) NOT NULL,
  `artmediums` text NOT NULL,
  `artmaterials` text NOT NULL,
  `artstyles` text NOT NULL,
  `artkeywords` text NOT NULL,
  `height` double NOT NULL,
  `width` double NOT NULL,
  `description` text NOT NULL,
  `zipcode` int(11) NOT NULL,
  `streetaddress` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `country` text NOT NULL,
  `price` double NOT NULL,
  `shipcost` double NOT NULL,
  `date` varchar(12) NOT NULL,
  `time` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_shop`
--

INSERT INTO `tbl_shop` (`shop_id`, `artist_id`, `arttitle`, `artfile`, `artcategory`, `artsubject`, `yearofcreation`, `available_copies`, `artmediums`, `artmaterials`, `artstyles`, `artkeywords`, `height`, `width`, `description`, `zipcode`, `streetaddress`, `city`, `state`, `country`, `price`, `shipcost`, `date`, `time`) VALUES
(1, 11, 'Work', './arts_files/Artist/hussain007/Shop/Work/c3e92268-9e6238698f069bc67354945255de1364.jpg', 'Painting', 'Body', '2015', 0, 'Brush,Paint', 'Canvas', 'Abstract', 'Abstract,Canvas,Painting', 40, 48, '<p>Collectors tend to appreciate works more if they know the &ldquo;story&rdquo; behind them, so be sure to write<br />informative artwork descriptions. Great descriptions not only provide useful information<br />(e.g. physical texture, whether hanging hardware is included, quality of materials),</p>', 100100, 'A.k Road', 'Ahemdabad', 'Gujarat', 'India', 2000, 100, '05-05-2018', '11:01 am');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shoporder`
--

CREATE TABLE `tbl_shoporder` (
  `shoporder_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `shop_emailid` text NOT NULL,
  `shop_contactnumber` text NOT NULL,
  `shop_streetaddress` text NOT NULL,
  `shop_city` text NOT NULL,
  `shop_state` text NOT NULL,
  `shop_country` text NOT NULL,
  `shop_zipcode` int(11) NOT NULL,
  `shop_amount` text NOT NULL,
  `shop_paymentmode` text NOT NULL,
  `shop_paymentstatus` text NOT NULL,
  `shop_orderstatus` text NOT NULL,
  `shop_date` text NOT NULL,
  `shop_time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_shoporder`
--

INSERT INTO `tbl_shoporder` (`shoporder_id`, `cart_id`, `shop_emailid`, `shop_contactnumber`, `shop_streetaddress`, `shop_city`, `shop_state`, `shop_country`, `shop_zipcode`, `shop_amount`, `shop_paymentmode`, `shop_paymentstatus`, `shop_orderstatus`, `shop_date`, `shop_time`) VALUES
(1, 2, 'kariya.kartik.17@gmail.com', '9990099900', 'a.k road', 'Ahemdabad', 'Gujarat', 'India', 100100, '2100', 'OnlinePay', 'Done', 'Cancelled', '05-05-2018', '11:11 am'),
(2, 3, 'a@g.com', '9990099900', 'R.K Road', 'Ahemdabad', 'Gujarat', 'India', 395007, '2100', 'OnlinePay', 'Done', 'Pending', '05-05-2018', '12:11 pm');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE `tbl_state` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(20) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`state_id`, `state_name`, `country_id`) VALUES
(1, 'Gujarat', 1),
(2, 'Maharashtra', 1),
(3, 'Punjab', 1),
(4, 'Rajasthan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(30) NOT NULL,
  `subject_status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`subject_id`, `subject_name`, `subject_status`) VALUES
(1, 'Abstract', 'active'),
(2, 'Animal', 'active'),
(3, 'Architecture', 'active'),
(4, 'Body', 'active'),
(5, 'Bike', 'active'),
(6, 'Car', 'active'),
(7, 'Nature', 'active'),
(8, 'Education', 'active'),
(9, 'Interior', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_artist`
--
ALTER TABLE `tbl_artist`
  ADD PRIMARY KEY (`artist_id`);

--
-- Indexes for table `tbl_artistrating`
--
ALTER TABLE `tbl_artistrating`
  ADD PRIMARY KEY (`artistrating_id`);

--
-- Indexes for table `tbl_artsgallery`
--
ALTER TABLE `tbl_artsgallery`
  ADD PRIMARY KEY (`artgallery_id`);

--
-- Indexes for table `tbl_artsrating`
--
ALTER TABLE `tbl_artsrating`
  ADD PRIMARY KEY (`artsrating_id`);

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_country`
--
ALTER TABLE `tbl_country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_shop`
--
ALTER TABLE `tbl_shop`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indexes for table `tbl_shoporder`
--
ALTER TABLE `tbl_shoporder`
  ADD PRIMARY KEY (`shoporder_id`);

--
-- Indexes for table `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD PRIMARY KEY (`state_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_artist`
--
ALTER TABLE `tbl_artist`
  MODIFY `artist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_artistrating`
--
ALTER TABLE `tbl_artistrating`
  MODIFY `artistrating_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_artsgallery`
--
ALTER TABLE `tbl_artsgallery`
  MODIFY `artgallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_artsrating`
--
ALTER TABLE `tbl_artsrating`
  MODIFY `artsrating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_city`
--
ALTER TABLE `tbl_city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_country`
--
ALTER TABLE `tbl_country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_shop`
--
ALTER TABLE `tbl_shop`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_shoporder`
--
ALTER TABLE `tbl_shoporder`
  MODIFY `shoporder_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_state`
--
ALTER TABLE `tbl_state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
