-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 16, 2016 at 11:00 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vietsoulhome`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_ID` int(2) NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(255) NOT NULL,
  `cat_short_hint` varchar(255) NOT NULL,
  `cat_description` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_ID`, `cat_title`, `cat_short_hint`, `cat_description`) VALUES
(1, 'Hunger Starters', 'Fresh and Delicious', ''),
(2, 'Build-a-Pho', 'Most Famous Dish', 'Our acclaimed soup base is the quintessence of fresh meats, bones and \nPho''s spices which altogether are stewed for ten hours. Each bowl is \nserved with fresh bean sprouts, basil, limes and thin sliced jalapenos.'),
(3, 'Bowl / Platter', 'Feed your Hunger', 'Serve with your choices of rice plate or noodle (vermicelli) bowl, two choices of meat, eggroll, salad, and ground peanut'),
(4, 'Sandwiches', 'Fast and Furious Taste', 'Our traditional street food which is popular for its nutrition, freshness, and fine taste. Served with pate, house butter, carrot, cucumber, cilantro, jalapeño, and your choice of meat'),
(5, 'Specials', 'Try and Be in Love', ''),
(6, 'Beverage', 'Refresh your Taste', ''),
(7, 'Desserts', 'Finish-Line with Pleasure', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_ID` int(3) NOT NULL AUTO_INCREMENT,
  `cat_ID` int(3) NOT NULL,
  `product_title` varchar(50) NOT NULL,
  `product_viet_title` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `product_quantity` varchar(20) NOT NULL,
  `product_description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `product_recommend` bit(1) NOT NULL,
  PRIMARY KEY (`product_ID`),
  KEY `fk_product_cat` (`cat_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_ID`, `cat_ID`, `product_title`, `product_viet_title`, `product_quantity`, `product_description`, `product_img`, `product_price`, `product_recommend`) VALUES
(1, 1, 'Vietnamese Egg Rolls', 'Chả Giò', '2 rolls', 'Perfect mix of ground pork and vegetable wrapped in a thin rice paper and deep-fried, served with fish sauce', '7259997654_6098e9c793_b.jpg', 3.5, b'0'),
(2, 1, 'Fresh Spring Rolls', 'Gỏi Cuốn', '2 rolls', 'Sliced shrimp, vermicelli, lettuce and bean sprouts wrapped in a thin rice paper, served with peanut sauce', 'goi_cuon_tom_thit1.jpg', 3.5, b'0'),
(3, 1, 'Grilled Meat Spring Rolls', 'Gỏi Cuốn Thịt Nướng', '2 rolls', 'Choice of charcoal grilled pork / chicken / beef, vermicelli, lettuce and bean sprouts wrapped in a thin rice paper, served with peanut sauce', 'song-vu-A08-thit-nuong-cuon.jpg', 3.75, b'0'),
(4, 1, 'Kimchi''s Fries', 'Khoai Tây Chiên Kim Chi', '', 'Golden crispy fries are covered with cheese powder, kimchi, and BBQ beef', 'kimchifries_large.jpg', 4.95, b'0'),
(5, 1, 'Calamari', 'Mực Chiên Giòn', '', 'Crispy fried calamari served with house sauce', 'Fried-Calamari.jpg', 4.95, b'0'),
(6, 1, 'Popcorn Chicken', 'Gà Chiên Lúc Lắc', '', 'Fried chicken cubes served with house sauce', 'popcorn.jpeg', 4.95, b'0'),
(7, 1, 'Fried Fish Tofu', 'Tàu Hủ Cá Chiên', '', 'Fried fish tofu is served with house sauce', 'deep-fried-tofu-recipe.jpg', 4.95, b'0'),
(8, 1, 'Fried Tofu', 'Tàu Hủ Chiên', '', 'Smooth and silky cubes of tofu with crispy skin', 'fried-tofu-1.jpg', 4.95, b'0'),
(9, 2, 'Chicken based Pho', 'Phở Gà', 'Small', 'Chicken broth noodle soup with your choice of:<br>White meat chicken (Thịt Gà Trắng)<br>Brown meat chicken (Thịt Gà Nâu)<br>', 'maxresdefault.jpg', 7.95, b'1'),
(10, 2, 'Chicken based Pho', 'Phở Gà', 'Large', 'Chicken broth noodle soup with your choice of:<br>White meat chicken (Thịt Gà Trắng)<br>Brown meat chicken (Thịt Gà Nâu)<br>', 'maxresdefault.jpg', 8.95, b'1'),
(11, 2, 'Beef based Pho', 'Phở Bò', 'Small', 'Regular Pho noodle soup with your choice (up to 3) of toppings:<br>Ribeye (Tái/Chín)<br>Flank (Nạm)<br>Tripe (Sách)<br>Meat balls (Bò viên)<br>Soft Tendon (Gân)<br>Brisket (Gầu)', '17677_l.jpg', 7.95, b'1'),
(12, 2, 'Beef based Pho', 'Phở Bò', 'Large', 'Regular Pho noodle soup with your choice (up to 3) of toppings:<br>Ribeye (Tái/Chín)<br>Flank (Nạm)<br>Tripe (Sách)<br>Meat balls (Bò viên)<br>Soft Tendon (Gân)<br>Brisket (Gầu)', '17677_l.jpg', 8.95, b'1'),
(13, 3, 'Rice Platter', '', '', 'Choose between:<br>Grilled Sliced Pork (Thịt Nướng)<br>Grilled Beef (Bò Nướng)<br>Grilled Chicken (Gà Nướng)<br>Grilled Shrimps (Tôm Nướng)', 'thumb_600.jpg', 8.75, b'0'),
(14, 3, 'Noodle (Vermicelli) Bowl', '', '', 'Choose between:<br>Grilled Sliced Pork (Thịt Nướng)<br>Grilled Beef (Bò Nướng)<br>Grilled Chicken (Gà Nướng)<br>Grilled Shrimps (Tôm Nướng)', '5723237.jpg', 8.75, b'1'),
(15, 5, 'Butter Chicken Wings', 'Cánh Gà Chiên Bơ', '7 - 8 pieces', 'Crispy chicken wings tossed with house special butter sauce', 'canh-ga-chien-bo-toi.jpg', 8.75, b'1'),
(16, 5, 'Sizzling Beefsteak, Eggs and Salads', 'Bò Né', '', 'Tender steak cooked to your degree, served with sunshine eggs, pate, butter, and salads', '7719253776_04c67f1e76_z.jpg', 11, b'1'),
(17, 4, 'Grilled Sliced Pork Sandwich', 'Bánh Mì Thịt Nướng', '', 'Sandwich served with thin slices of grilled pork marinated with onion, lemon grass, and pepper', 'lemongrass-pork-banhmi-3b.jpg', 4.5, b'1'),
(18, 4, 'Grilled Beef Sandwich', 'Bánh Mì Bò Nướng', '', 'Sandwich served with thin slices of beef marinated with special house sauce and grilled to for juicy flavor and tenderness', 'banh mi thit nuong_24147157.jpg', 4.5, b'0'),
(19, 4, 'Grilled Chicken Sandwich', 'Bánh Mì Gà Nướng', '', 'Sandwich served with strips of chicken breast marinated with special house sauce and full of flavor', 'o.jpg', 4.5, b'0'),
(20, 6, 'Soft Drink', 'Nước Ngọt', '', 'Coke, Diet Coke, Sprite, Dr Pepper, Root Beer', '268730_1_default.jpg', 1.25, b'0'),
(21, 6, 'Tea', 'Trà', 'Hot / Iced', 'Jasmine tea to freshen your taste', 'peach-syrup-iced-tea-640.jpg', 1.55, b'0'),
(22, 6, 'Vietnamese Coffee', 'Cà Phê Sữa Đá', 'Iced', '<span class="st">A traditional <em>Vietnamese coffee </em></span><span class="st">mixed with a right measure of condensed milk to form a perfection of sweetness and strong coffee flavor<br></span>', 'coffee.jpg', 3.25, b'1'),
(23, 7, 'Caramel Flan Pudding', '', '', 'a custard dessert with a layer of soft caramel on top', 'Krieger-Pumpkin-Pie-Flan_xlg.jpg', 3.75, b'0'),
(24, 7, 'Tofu Cheese Cake', '', '', '<span class="st">Silken tofu makes a delightfully light and creamy filling for this vegan version of <em>cheesecake</em></span>', 'recipe-tofu-cheesecake-photo.png', 3.75, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_ID` int(5) NOT NULL AUTO_INCREMENT,
  `user_phone_no` varchar(15) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_img` varchar(255) NOT NULL,
  `user_role` int(1) NOT NULL DEFAULT '4',
  `user_hash` varchar(255) NOT NULL,
  PRIMARY KEY (`user_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_ID`, `user_phone_no`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_img`, `user_role`, `user_hash`) VALUES
(1, '(291) 310-2913', '5006bf155157f0991045fa0bc317abcf', 'Taylor', 'Swift', 'phuduc1193@yahoo.com.vn', 'id_7', 1, '8c2aed0a2a6ea23ec4e1bc99f1d4fa30');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE IF NOT EXISTS `user_roles` (
  `user_role_ID` int(1) NOT NULL AUTO_INCREMENT,
  `user_role` varchar(50) NOT NULL,
  PRIMARY KEY (`user_role_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`user_role_ID`, `user_role`) VALUES
(1, 'Admin'),
(2, 'Employee'),
(3, 'Subriber'),
(4, 'Unapproved');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_product_cat` FOREIGN KEY (`cat_ID`) REFERENCES `categories` (`cat_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
