-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 26 2019 г., 17:03
-- Версия сервера: 5.7.20
-- Версия PHP: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shophia`
--

-- --------------------------------------------------------

--
-- Структура таблицы `blog`
--

CREATE TABLE `blog` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `blog`
--

INSERT INTO `blog` (`id`, `title`, `content`, `slug`, `created_at`, `image`) VALUES
(1, 'Leader shop', 'Robin Mathews will manage the day-to-day operations including supervising staff, maintaining inventory and bookkeeping. Mathews worked ten years in the retail industry including four years as a manager of an antique furniture shop. Mathews earned a BA degree in finance from Britannica College in Tampa, Florida.\r\n\r\nJoanna Jensen will oversee the merchandise buying for the store as well as maintain a keen awareness of trends within the industry. She will also work with our public relations firm to ensure superior marketing plans are in place and implemented. Jensen worked in the fashion industry in various capacities working with designers, wholesalers and retailers for 20 years. She earned a BA in fashion merchandising from Colliers Fashion Institute in Miami, Florida.', 'leader-shop', '2019-02-14 11:11:44', 'QZM8EOlJsJR-hut716PURoaEfW17-3RV.jpg'),
(2, 'Retail Clothing', 'Booming Boutique is a start-up retail establishment that will sell fashionable clothing to women of the Baby Boom generation. We will locate Booming Boutique in downtown Pleasantville, Florida, which is a popular retirement and tourist destination. While our initial goal is to open one boutique, expansion plans include potentially franchising our retail store and/or building a well-recognized brand name. In turn, we would hope to penetrate a sizable portion of the online retail market.\r\n\r\n1.2 PRODUCTS & SERVICES\r\n\r\n \r\nThe fashion and retail industry tends to be overly youth focused. However, by closely following generational fashion trends as well as our own customers’ purchasing preferences, we will tailor our inventory to meet the specific needs of our clientele. We will solely focus on the our styles, colors and fits to flatter the lady Baby Boomer/ Meeting the needs of her figure will be our specialty.', 'retail-clothing', '2019-02-17 17:02:29', 'iGFp71FP6IOSCYSaUZHojWua1jv8GnwJ.jpg'),
(3, ' Clothing Store Employee', 'Retail stores rely on their employees to greet customers, keep the store tidy and to make sales. A clothing retail job description includes helping customers, maintaining in-store stock and processing payments. It’s a position that requires a lot of patience, the ability to be personable and to be comfortable with a variety of customers and to have a flair for fashion. It often means that you\'ll be standing long hours on your feet, but working in a clothing store is a great way to gain work experience and perhaps work your way up to a management position.', 'clothing-store-employee', '2019-02-18 18:00:18', 'oQtgI-cTyUuJtAIaVpR5sA7j266jzxep.jpg'),
(4, 'Holiday Shopping', 'This year shoppers will go about their business in a retail environment where online commerce has taken a bigger piece of the holiday sales pie.\r\n\r\nCustomers are clearly appreciating the frictionless shopping experience that online platforms and payment providers can offer. It also doesn’t hurt that 59 percent of people, according to a PayPal study, would rather do almost anything than deal with holiday shopping crowds. That includes shoveling snow for a quarter of that group.\r\n\r\nHere are six points that highlight how technology has reshaped holiday shopping—and the perceptions of those doing the shopping.\r\n\r\n1. Online Holiday Sales This Year Will Rise 17 to 22 Percent\r\n\r\nIf this prediction announced by Deloitte in September comes to fruition, then online holiday sales will beat last year’s increase of 16.6 percent. All told, e-commerce sales are expected to reach as high as $134 billion—that’s a 22 percent increase year over year—during the 2018 holiday season.\r\n\r\nThat’s a strong growth rate, but the numbers associated with mobile may eclipse it as we look ahead to 2020 and beyond. Which brings us to point number 2.', 'holiday-shopping', '2019-02-18 18:00:32', '_oqnsTy_HkFKw1DwD8lv8WgywdU3Y3r-.jpg'),
(5, 'Manegment', 'Booming Boutique requires $282,000 to launch successfully. We’ve already raised $62,000 through personal investments and a small community grant.\r\n\r\nWe are currently seeking additional funding from outside angel investors and business loans. Start-up funds will be used for renovations, inventory and operating expenses such as rent, utilities and payroll.\r\n\r\nFurther, most of our initial investment will also be used to purchase retail equipment and inventory software – all of which will produce future benefits for the company.\r\n\r\nA small portion of our investment will be used to create an online clothing store. There are inexpensive e-commerce tools that provide a very easy way to create an online boutique store where we can sell our fashions all over the world.', 'manegment', '2019-02-18 18:23:09', 'h7qNhzaD1Nwb-styg7khSwcSuOp_3816.jpeg'),
(6, 'Sed ut perspiciatis ', '\r\nSed ut perspiciatis \r\nunde omnis iste natus error sit voluptatet accusantium doloremque', 'sed-ut-perspiciatis', '2019-02-24 21:41:58', 'l8Hdz1YRhLucgweBnA_07edI7H1sIeSl.png'),
(7, 'Shaheer Sheikh DESIGNER', 'Sed ut perspiciatis \r\nunde omnis iste natus error sit voluptatet accusantium doloremque\r\nShaheer Sheikh\r\nDESIGNER', 'shaheer-sheikh-designer', '2019-02-24 21:42:41', 'nC0ddADtwQGtN724_Ql24p_1OKNscnHi.png');

-- --------------------------------------------------------

--
-- Структура таблицы `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `title` varchar(120) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(120) NOT NULL,
  `slug` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `brands`
--

INSERT INTO `brands` (`id`, `title`, `content`, `image`, `slug`) VALUES
(1, 'zara', 'k', 'IbpA88Zu-J19DdPB-lu9Xdd72hhF4ukX.jpg', 'zara'),
(2, 'burberry', 'Burberry. Burberry Group PLC is a British', 'HsFxLMGv8r8LyVH1_0XJFB16YpeqIyVl.jpg', 'burberry'),
(3, 'boss', 'c', 'o2KENH2HDyK8dXneCErYzEfhsvAZhkYR.jpg', 'boss'),
(4, 'cucci', 'Eclectic, contemporary, romantic—Gucci products represent the pinnacle of Italian ', '-FiTDcVZQwMsfz_4feeB3Z9dDYKUvMzL.jpg', 'cucci'),
(5, 'chanel ', ' c', 'Ky_rjmNuflOD6knk_GhPLTXwZJpgCmI2.jpg', 'chanel'),
(6, 'dolchegabanna', 'd', 'hdARsE0k9uBvM9Ja6H1TZ6n2YhTJcb_v.jpg', 'dolchegabanna'),
(8, 'armani', 'armani', 'VLU-iShnwmsBjgQnlOYdzr2BwQuQduuT.png', 'armani');

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `user_id`, `quantity`, `created_at`, `update_at`) VALUES
(123, 17, 3, 4, '2019-02-18 22:56:07', '2019-02-18 22:56:07'),
(124, 7, 5, 1, '2019-02-19 20:30:25', '2019-02-19 20:30:25'),
(125, 17, 5, 1, '2019-02-19 20:40:41', '2019-02-19 20:40:41'),
(161, 8, 3, 1, '2019-02-21 09:44:23', '2019-02-21 09:44:23'),
(162, 7, 3, 1, '2019-02-21 09:44:29', '2019-02-21 09:44:29'),
(207, 32, 2, 1, '2019-02-25 12:16:47', '2019-02-25 12:16:47');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(120) NOT NULL,
  `content` text,
  `image` varchar(255) DEFAULT NULL,
  `slug` varchar(120) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`, `content`, `image`, `slug`, `parent_id`) VALUES
(1, 'Women', 'women fashion', 'mxGuycgKSIoYXFUnZdd7dudvckSvapMH.png', 'women', 0),
(2, 'Men', 'vvvvvvvvvv', '5nVw0SLB5x2GVNzrK-PYqAbFbsAGMQrP.jpg', 'men', 0),
(3, 'Kids', '', '_ab2qUOCAwddieyMv8gh9Ips41Bw1zfK.jpg', 'kids', 0),
(4, 'newborn', '', 'ypcZQcpy7Y0F-zyhPsJsTnhxPh1SZytJ.jpg', 'newborn', 0),
(8, 'accessories', 'f', '-FUuQbQ7DSH6JDBl3TS-ltqggQAEE6G9.jpg', 'accessories', 0),
(9, 'pregnant', 'pregnant', '_n5ig4QKuU-kahvTODhfOGYJbSNKewat.jpg', 'pregnant', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(255) NOT NULL,
  `blog_id` int(255) NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `blog_id`, `comment`, `user_id`, `created_at`) VALUES
(1, 1, 'cccccc', 2, '2019-02-14 11:15:28'),
(2, 1, 'chello', 2, '2019-02-14 11:15:39'),
(3, 1, 'xxxxxxxxxxxxx', 2, '2019-02-18 19:11:48'),
(4, 2, 'jkhkjhkj\r\n', 2, '2019-02-18 20:00:57'),
(5, 5, 'barev', 5, '2019-02-19 09:22:06'),
(6, 5, 'barev', 5, '2019-02-19 09:22:09'),
(7, 4, 'xxxxxxxxxxxx', 2, '2019-02-20 19:09:25'),
(8, 4, 'cccccccccc', 2, '2019-02-20 19:10:30'),
(9, 5, 'hello world', 2, '2019-02-21 20:07:27'),
(10, 4, 'helllo', 2, '2019-02-22 21:02:08'),
(11, 7, 'fh', 2, '2019-02-24 21:45:42');

-- --------------------------------------------------------

--
-- Структура таблицы `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject` text NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `contact`
--

INSERT INTO `contact` (`id`, `email`, `name`, `subject`, `body`, `created_at`) VALUES
(1, 'mirijanyan91@mail.ru', 'astghik', 'barev', 'dsfffffffff', '2019-02-24 08:44:25'),
(2, 'mirijanyan91@mail.ru', 'astghik', 'cc', 'geffffffffffffffr', '2019-02-24 10:30:37'),
(3, 'karengasparyan.a@gmail.com', 'karen', 'barev', '11 мая 2017 г. - В частности, для фильтрации удобнее использовать пример \"Advanced configuration using separate start and end attributes to store ', '2019-02-24 23:38:12');

-- --------------------------------------------------------

--
-- Структура таблицы `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `info`
--

INSERT INTO `info` (`id`, `type`, `content`) VALUES
(1, 'phone', '+374555555555'),
(2, 'email', 'shophia@gmail.com'),
(3, 'info', 'xxx'),
(4, 'language', 'EN, AM, RU');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1546961441),
('m130524_201442_init', 1546961726),
('m180604_202836_create_cart_items_table', 1549736165);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `qty` int(11) NOT NULL,
  `total` float DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8 NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `created_at`, `updated_at`, `qty`, `total`, `status`, `name`, `email`, `phone`, `address`, `user_id`) VALUES
(48, '2019-02-16 17:05:42', '2019-02-13 08:12:00', 2, NULL, '0', 'Astghik', 'mirijanyan91@mail.ru', '13456', 'sssssssssc', 3),
(57, '2019-02-16 20:26:21', '2019-02-16 20:26:21', 1, NULL, '0', 'Astghik', 'dddd@ddd.com', '13456', 'sssssssssc', 3),
(65, '2019-02-16 21:11:01', '2019-02-16 21:11:01', 1, NULL, '0', 'aram', 'mirijanyan91@mail.ru', '+37494737123', 'sssssssssc', 3),
(67, '2019-02-16 21:12:22', '2019-02-16 21:12:22', 1, NULL, '0', 'aram', 'mirijanyan91@mail.ru', '+37494737123', 'sssssssssc', 3),
(68, '2019-02-16 21:23:10', '2019-02-16 21:23:10', 1, NULL, '0', 'Astghik', 'mirijanyan91@mail.ru', '+37494737123', 'sssssssssc', 3),
(70, '2019-02-17 11:40:23', '2019-02-17 11:40:23', 4, NULL, '0', 'Astghik', 'hambardzum1991@mail.ru', '13456', 'sssssssssc', 3),
(71, '2019-02-17 11:40:50', '2019-02-17 11:40:50', 4, NULL, '0', 'Astghik', 'hambardzum1991@mail.ru', '13456', 'sssssssssc', 3),
(72, '2019-02-17 17:15:07', '2019-02-17 17:15:07', 4, NULL, '0', 'Astghik', 'mirijanyan91@mail.ru', '13456', '21', 3),
(73, '2019-02-17 17:22:34', '2019-02-17 17:22:34', 4, NULL, '0', 'Astghik', 'mirijanyan91@mail.ru', '56', 'skdfkdod', 3),
(74, '2019-02-17 17:23:36', '2019-02-17 17:23:36', 4, NULL, '0', 'Astghik', 'mirijanyan91@mail.ru', '56', 'skdfkdod', 3),
(75, '2019-02-17 17:24:34', '2019-02-17 17:24:34', 4, NULL, '0', 'Astghik', 'mirijanyan91@mail.ru', '78', 'skdfkdod', 3),
(76, '2019-02-17 17:25:24', '2019-02-17 17:25:24', 4, NULL, '0', 'Astghik', 'mirijanyan91@mail.ru', '78', 'skdfkdod', 3),
(77, '2019-02-17 17:26:31', '2019-02-17 17:26:31', 4, NULL, '0', 'Astghik', 'mirijanyan91@mail.ru', '78', 'sssssssssc', 3),
(78, '2019-02-17 17:30:09', NULL, 4, NULL, '1', 'karen', 'mirijanyan91@mail.ru', '56', 'sssssssssc', 3),
(79, '2019-02-17 17:33:05', '2019-02-17 17:33:05', 1, NULL, '0', 'aram', 'mirijanyan91@mail.ru', '56', 'sssssssssc', 3),
(83, '2019-02-17 18:35:14', '2019-02-17 18:35:14', 1, NULL, '0', 'Astghik', 'mirijanyan91@mail.ru', '13456', 'sssssssssc', 3),
(95, '2019-02-17 23:40:05', '2019-02-17 23:40:05', 1, NULL, '0', 'ARAM', 'astghiak.mirijanyan@gmail.com', '+37494737123', 'sssssssssc', 3),
(96, '2019-02-18 09:30:05', '2019-02-18 09:30:05', 3, NULL, '0', 'ASTGHIK', 'astghik.mirijanyan@gmail.com', '<script>alert(\'hello\')</script>', 'sssssssssc', 2),
(97, '2019-02-18 09:30:14', '2019-02-18 09:30:14', 0, NULL, '0', 'ASTGHIK', 'astghik.mirijanyan@gmail.com', '<script>alert(\'hello\')</script>', 'sssssssssc', 2),
(98, '2019-02-19 22:37:29', '2019-02-19 22:37:29', 8, NULL, '0', 'saaaaaa', 'mirijanyan91@mail.ru', '+37494737123', 'sssssssssc', 2),
(99, '2019-02-20 11:00:17', '2019-02-20 11:00:17', 6, NULL, '0', 'ASTGHIK', 'astghik.mirijanyan@gmail.com', '56', 'sssssssssc', 2),
(100, '2019-02-21 20:16:05', '2019-02-21 20:16:05', 6, NULL, '0', 'ASTGHIK', 'karengasparyan.a@gmail.com', '13456', 'sssssssssc', 2),
(101, '2019-02-21 20:19:28', '2019-02-21 20:19:28', 4, NULL, '0', 'ASTGHIK', 'karengasparyan.a@gmail.com', '+37494737123', 'sssssssssc', 2),
(102, '2019-02-21 20:23:52', '2019-02-21 20:23:52', 3, NULL, '0', 'ASTGHIK', 'karengasparyan.a@gmail.com', '13456', 'sssssssssc', 2),
(103, '2019-02-23 11:50:47', '2019-02-23 11:50:47', 7, NULL, '0', 'ASTGHIK', 'astghik.mirijanyan@gmail.com', '13456', 'sssssssssc', 2),
(104, '2019-02-23 11:53:50', '2019-02-23 11:53:50', 1, NULL, '0', 'ASTGHIK', 'astghik.mirijanyan@gmail.com', '13456', 'sssssssssc', 2),
(105, '2019-02-24 21:17:53', '2019-02-24 21:17:53', 4, NULL, '0', 'ASTGHIK', 'karengasparyan.a@gmail.com', '13456', 'sssssssssc', 2),
(106, '2019-02-25 12:09:03', '2019-02-25 12:09:03', 5, NULL, '0', 'ASTGHIK', 'astghik.mirijanyan@gmail.com', '13456', 'sssssssssc', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `price` float DEFAULT NULL,
  `qty_item` int(11) DEFAULT NULL,
  `sum_item` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `order_items`
--

INSERT INTO `order_items` (`id`, `orders_id`, `product_id`, `title`, `price`, `qty_item`, `sum_item`) VALUES
(80, 48, 4, 'dasdsad', 16, 48, 768),
(81, 48, 25, 'kids sviter', 54, 1, 54),
(94, 57, 16, 'sortc', 54, 2, 108),
(102, 65, 4, 'dasdsad', 16, 1, 16),
(104, 67, 4, 'dasdsad', 16, 1, 16),
(105, 68, 4, 'dasdsad', 16, 1, 16),
(110, 70, 4, 'dasdsad', 16, 2, 32),
(111, 70, 9, 'women', 1250, 1, 1250),
(112, 70, 16, 'sortc', 54, 1, 54),
(113, 70, 27, 'DESIGNER BAGS WORTH THE INVESTMENT', 125, 1, 125),
(114, 71, 4, 'dasdsad', 16, 2, 32),
(115, 71, 9, 'women', 1250, 1, 1250),
(116, 71, 16, 'sortc', 54, 1, 54),
(117, 71, 27, 'DESIGNER BAGS WORTH THE INVESTMENT', 125, 1, 125),
(118, 72, 4, 'dasdsad', 16, 2, 32),
(119, 72, 9, 'women', 1250, 1, 1250),
(120, 72, 16, 'sortc', 54, 1, 54),
(121, 72, 27, 'DESIGNER BAGS WORTH THE INVESTMENT', 125, 1, 125),
(122, 73, 4, 'dasdsad', 16, 2, 32),
(123, 73, 9, 'women', 1250, 1, 1250),
(124, 73, 16, 'sortc', 54, 1, 54),
(125, 73, 27, 'DESIGNER BAGS WORTH THE INVESTMENT', 125, 1, 125),
(126, 74, 4, 'dasdsad', 16, 2, 32),
(127, 74, 9, 'women', 1250, 1, 1250),
(128, 74, 16, 'sortc', 54, 1, 54),
(129, 74, 27, 'DESIGNER BAGS WORTH THE INVESTMENT', 125, 1, 125),
(130, 75, 4, 'dasdsad', 16, 2, 32),
(131, 75, 9, 'women', 1250, 1, 1250),
(132, 75, 16, 'sortc', 54, 1, 54),
(133, 75, 27, 'DESIGNER BAGS WORTH THE INVESTMENT', 125, 1, 125),
(134, 76, 4, 'dasdsad', 16, 2, 32),
(135, 76, 9, 'women', 1250, 1, 1250),
(136, 76, 16, 'sortc', 54, 1, 54),
(137, 76, 27, 'DESIGNER BAGS WORTH THE INVESTMENT', 125, 1, 125),
(138, 77, 4, 'dasdsad', 16, 2, 32),
(139, 77, 9, 'women', 1250, 1, 1250),
(140, 77, 16, 'sortc', 54, 1, 54),
(141, 77, 27, 'DESIGNER BAGS WORTH THE INVESTMENT', 125, 1, 125),
(142, 78, 4, 'dasdsad', 16, 2, 32),
(143, 78, 9, 'women', 1250, 1, 1250),
(144, 78, 16, 'sortc', 54, 1, 54),
(145, 78, 27, 'DESIGNER BAGS WORTH THE INVESTMENT', 125, 1, 125),
(146, 79, 8, 'dressess', 15, 1, 15),
(150, 83, 25, 'kids sviter', 54, 1, 54),
(162, 95, 4, 'dasdsad', 16, 1, 16),
(163, 96, 17, 'short', 125, 1, 125),
(164, 96, 16, 'sortc', 54, 1, 54),
(165, 96, 18, 'short', 54, 1, 54),
(166, 98, 25, 'kids sviter', 54, 1, 54),
(167, 98, 12, 'dresses', 150, 10, 1500),
(168, 98, 8, 'dressess', 15, 6, 90),
(169, 98, 17, 'short', 125, 4, 500),
(170, 98, 9, 'women', 1250, 2, 2500),
(171, 98, 4, 'dasdsad', 16, 2, 32),
(172, 98, 27, 'DESIGNER BAGS WORTH THE INVESTMENT', 125, 2, 250),
(173, 98, 3, 'Dresses', 14, 3, 42),
(174, 99, 8, 'dressess', 15, 1, 15),
(175, 99, 9, 'women', 1250, 1, 1250),
(176, 99, 7, 'new product', 23, 6, 138),
(177, 99, 17, 'short', 125, 8, 1000),
(178, 99, 18, 'short', 54, 3, 162),
(179, 99, 16, 'sortc', 54, 1, 54),
(180, 100, 7, 'new product', 23, 5, 115),
(181, 100, 19, ' Henley handmade ', 54, 2, 108),
(182, 100, 29, 'baby clothes', 125, 1, 125),
(183, 100, 16, 'Track Suits', 54, 1, 54),
(184, 100, 8, 'Boxy T-Shirt with Roll Sleeve Detail', 15, 3, 45),
(185, 100, 34, 'Louis Vuitton Handbags ', 1200, 8, 9600),
(186, 101, 32, 'black band watch', 341, 1, 341),
(187, 101, 29, 'baby clothes', 125, 1, 125),
(188, 101, 34, 'Louis Vuitton Handbags ', 1200, 1, 1200),
(189, 101, 8, 'Boxy T-Shirt with Roll Sleeve Detail', 15, 1, 15),
(190, 102, 34, 'Louis Vuitton Handbags ', 1200, 1, 1200),
(191, 102, 8, 'Boxy T-Shirt with Roll Sleeve Detail', 15, 1, 15),
(192, 102, 7, 'new product', 23, 1, 23),
(193, 103, 7, 'new product', 23, 5, 115),
(194, 103, 8, 'Boxy T-Shirt with Roll Sleeve Detail', 15, 13, 195),
(195, 103, 34, 'Louis Vuitton Handbags ', 1200, 69, 82800),
(196, 103, 19, ' Henley handmade ', 54, 17, 918),
(197, 103, 32, 'black band watch', 341, 10, 3410),
(198, 103, 29, 'baby clothes', 125, 3, 375),
(199, 103, 9, 'Dresses Bohemian', 1250, 7, 8750),
(200, 104, 34, 'Louis Vuitton Handbags ', 1200, 1, 1200),
(201, 105, 32, 'black band watch', 341, 10, 3410),
(202, 105, 29, 'baby clothes', 125, 5, 625),
(203, 105, 34, 'Louis Vuitton Handbags ', 1200, 3, 3600),
(204, 105, 17, 'Van Heusen Men Slim Fit Casual', 72222, 1, 72222),
(205, 106, 7, 'new product', 23, 1, 23),
(206, 106, 19, ' Henley handmade ', 54, 27, 1458),
(207, 106, 32, 'black band watch', 341, 4, 1364),
(208, 106, 29, 'baby clothes', 125, 2, 250),
(209, 106, 34, 'Louis Vuitton Handbags ', 1200, 2, 2400);

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` int(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text,
  `larg_image` varchar(255) DEFAULT NULL,
  `small_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `slug`, `description`, `larg_image`, `small_image`) VALUES
(1, 'k', 'k', '', ''),
(2, 'k', 'k', '', ''),
(3, 'c', 'c', '', ''),
(4, 'newborn', 'newborn', 'yrpWVDmZ-_4gDn5yr1kGMSyzebpRlJom.jpg', '');

-- --------------------------------------------------------

--
-- Структура таблицы `pictures`
--

CREATE TABLE `pictures` (
  `id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pictures`
--

INSERT INTO `pictures` (`id`, `product_id`, `image`) VALUES
(1, 23, '1549658300100.jpg'),
(2, 23, '1549658300100.jpg'),
(3, 23, '1549658410100.jpg'),
(4, 23, '1549658410100.jpg'),
(8, 4, '1549660179783.jpg'),
(9, 4, '1549660179157.jpg'),
(10, 4, '1549660179899.jpg'),
(11, 3, '1550742714218.jpg'),
(12, 3, '1550742714556.jpg'),
(13, 3, '1550742714323.jpg'),
(14, 8, '1550743002886.jpg'),
(15, 8, '1550743002490.jpg'),
(16, 8, '1550743002903.jpg'),
(18, 9, '1550744025961.jpg'),
(19, 9, '1550744246886.jpg'),
(20, 9, '1550744246725.jpg'),
(21, 15, '1550744820660.jpg'),
(22, 15, '1550744820651.jpg'),
(23, 28, '1550745282814.jpg'),
(24, 28, '1550745282329.jpg'),
(25, 28, '1550745282693.jpg'),
(26, 34, '1550749826494.jpg'),
(27, 34, '1550749826500.jpg'),
(28, 34, '1550749949372.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` float DEFAULT NULL,
  `sale_price` float DEFAULT NULL,
  `content` text,
  `image` varchar(255) DEFAULT NULL,
  `sku` varchar(120) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `is_new` enum('0','1') NOT NULL DEFAULT '0',
  `slug` varchar(255) NOT NULL,
  `is_feature` enum('0','1') NOT NULL DEFAULT '0',
  `available_stock` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `for_stylish` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `sale_price`, `content`, `image`, `sku`, `cat_id`, `brand_id`, `is_new`, `slug`, `is_feature`, `available_stock`, `quantity`, `for_stylish`) VALUES
(3, 'Denim jacket blue', 14, 12, 'Women\'s Dresses\r\nNail your on and off duty style with our new season collection of women’s dresses. Going out-out? Turn heads with statement sleeves, romantic ruffles and bardot necklines in mini, midi and maxi styles. By day, layer a frill-hemmed slip dress over a long-sleeved T-shirt for a feminine take on ‘90s grunge, or turn to our ribbed jersey bodycon dresses for easy everyday styling.', '31BGr-rHmrLZrnkGpLgYxLw_Q1ImrRKn.jpg', 'h01', 1, 2, '0', 'denim-jacket-blue', '1', 12, 1, '1'),
(4, 'dasdsad', 16, NULL, '', 'v8CvtAOEdj7B-X6vT34Q1l2vnFeEpFiI.png', 'asdsadsad', 2, NULL, '0', 'dasdsad', '0', 0, 0, '0'),
(7, 'new product', 23, NULL, 'adfasd', 'IFcHVPRJAVGdD10XPOweSQVSP7dhiFXg.jpg', 'adfasdsad', NULL, NULL, '0', 'fil', '1', 0, 0, '0'),
(8, 'Boxy T-Shirt with Roll Sleeve Detail', 15, 12, 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.', 'la37dTFCYQ3LSXwYwktTejA6QqnXCpZ0.jpg', 'h02', 1, 4, '0', 'boxy-t-shirt-with-roll-sleeve-detail', '1', 50, 1, '0'),
(9, 'Dresses Bohemian', 1250, 1100, '\r\nA perfect-fitting dress starts with perfect measurements. Before ordering a made-to-measure dress from DHgate.com, we strongly encourage finding a professional local tailor who can help you measure accurately. Here, we&\'ll show you which measurements are needed and how to correctly take them. Warning: measuring yourself at home is trickier than you think! For best results, always have your measurements taken by a proffesional local tailor.\r\n', '76URAdVSfkZeYhWLoGtSPJZpd6lxM_BO.jpg', 'h04', 1, 1, '0', 'dresses-bohemian', '1', 12, 11, '1'),
(12, 'dresses', 150, 110, '', 's_a8c_LKiAmfXPmjIDox8QsIRWDYVWlJ.jpg', 'fds', 3, 4, '1', 'dresses', '0', 12, 0, '1'),
(14, 'sort', 54, 52, '', 'aBakQQOBRNCxvoPgAL2ybhBaQ0KeGoYY.jpg', 'dfg', 2, 6, '1', 'ff', '0', 12, 1, '0'),
(15, 'Frayed denim shorts', 54, 52, ',Petite High Waisted Extreme Frey Hem Denim Short', 'TdglCAR3P79MVhfeN5b5i-ekOGJmbZHc.jpg', 'h05', 1, 6, '0', 'frayed-denim-shorts', '0', 12, 1, '0'),
(16, 'Track Suits', 54, 52, 's', 'PSkYkZJIZUwisrT0vYawPux5Q3QfbgAe.jpg', 'h08', 2, 8, '0', 'track-suits', '0', 12, 1, '0'),
(17, 'Van Heusen Men Slim Fit Casual', 72222, 120, 'Pack A Fusion Of Substance And Style With This Black Shirt From V Dot By Van Heusen. Made From A Blend Of Cotton And Linen;This Design Is Cut In A Slim Fit And Features A Subtle Textured Pattern. Don This Full Sleeve Piece With A Grey Tie;Matching Trousers;And Polished Lace-ups For A Party.', 'TAX1jLTPj7M1LQaSMTLgMM_BnYPREhOl.jpg', 'h07', 2, 3, '0', 'van-heusen-men-slim-fit-casual', '1', 12, 1, '0'),
(18, 'Polo Assn. Men Slim Fit Casual ', 54, 52, '', 'XDHP-ek2JcNnzICdViYaTEmDDE34k_ky.jpg', 'gdfdffffsd', 2, 1, '0', 'polo-assn-men-slim-fit-casual', '0', 12, 1, '1'),
(19, ' Henley handmade ', 54, 52, '', 'HMj0abW23gh9uLJv3M5Ur8hWqqxesZxP.jpg', 'gdfdfffffffffff', 2, 5, '0', 'henley-handmade', '0', 12, 1, '0'),
(20, 'sort', 54, 52, '', 'OGOlxPkTIbYoSCnuMAvl8cyM-bO55nme.jpg', 'ss', 9, 5, '0', 'c', '0', 12, 1, '0'),
(21, 'pregnantss', 54, 52, 's', 'bwVHWyAAIVlP_dMDAP6xSqfOA2OxCrqK.jpg', 'd', 9, 3, '0', 'pr', '0', 12, 1, '0'),
(22, 'pregnant', 54, 52, '', 'DtG1RXEkmGLbNvtjrTaK-2_Xy8p5RPcb.jpg', 'dx', 9, 3, '0', 'pr', '0', 12, 1, '0'),
(23, 'kids dress', 125, NULL, 'c', 'GgYnWfJP-3wifCr14NPju7skewzkX_k-.jpg', 'c', 3, 2, '0', 'kids-dress', '0', 12, 1, '0'),
(24, 'pregnant', 54, 52, 'l', 'aDRSUxuk9A5tTq3nqeMJluhZOUMIYtt3.jpg', 'm', NULL, NULL, '0', 'd', '0', 12, 1, '0'),
(25, 'kids sviter', 54, 52, 'k', 'hi1rYdIph8VzNuT5xJCkFDb7_H_Y3Y7k.jpg', 'kh', 3, 8, '0', 'kids-sviter', '0', 12, 1, '0'),
(26, 'sort', 54, 52, 'erg', 'vYIgtfz13ffKsKXJKPvU8pVcxwYd_JJs.jpg', 'ff', 3, 5, '0', 'sort', '0', 12, 1, '0'),
(27, 'DESIGNER BAGS WORTH THE INVESTMENT', 125, NULL, 'DESIGNER BAGS WORTH THE INVESTMENT', '8M9CRr65Dl8BdFyQhAaEacpbICJhYWEX.jpg', 'dd', 8, 3, '0', 'designer-bags-worth-the-investment', '0', 12, 1, '0'),
(28, 'Daisy Fit New York Jersey Sports Set', 40000, NULL, 'We hope you are satisfied with all of your purchases but if you ever need to return an item, you can do so within 14 days from the date your parcel was dispatched.\r\n\r\nPlease note, we cannot offer refunds on cosmetics and pierced jewellery or on swimwear and lingerie if the hygiene seal is not in place or has been broken.', 'ESg0ieV_cpsUE67A9xDEUcwlPkKbjPfe.jpg', 'h06', 1, 8, '0', 'daisy-fit-new-york-jersey-sports-set', '0', 50, 1, '1'),
(29, 'baby clothes', 125, 120, 'baby clothesbaby clothesbaby clothes', 'olz0KdqRLtXZ45AWUYPCCNbIf61UN5j4.jpg', 'h09', 4, 1, '0', 'baby-clothes', '1', 50, 1, '1'),
(30, 'Rabbit Jumpsuit - Pink ', 200, NULL, 'Rabbit Jumpsuit - Pink - Atelier by Garance | Spring / Summer 2018 ||| Winter Rompers Warm Rabbit Ear Baby Romper Fleece Jumpsuit Cute Infant Clothing Newborn Boys Girl Clothes', 'PosgSn4S2FmQLbqpxJxx2ekHqGQnGnX5.jpg', 'h10', 4, 8, '1', 'rabbit-jumpsuit---pink', '0', 50, 1, '0'),
(31, 'Next Bear Denim Dungarees ', 625, 120, 'Newborn Clothing - Baby Clothes and Infantwear - Next Bear Denim Dungarees - EziBuy Australia More', 'ncpOefKFQ_E0B-2ttI192JYwnabevh99.jpg', 'h11', 4, NULL, '0', 'next-bear-denim-dungarees', '0', 12, 1, '0'),
(32, 'black band watch', 341, NULL, 'Neutrals + gold. black band watch with gold rim, ideal with pastel nails and knits', 'N95P3-9FSv0NfZLTMo6VV_AkMhp2kCd0.jpg', 'h12', 8, NULL, '0', 'black-band-watch', '1', 50, 1, '1'),
(33, 'Mirrored Sunglasses', 500, 410, 'Silver mirrored sunglasses Very stylish and in trend Uv protection', 'UbxfVBD4w4aphkNTLFFgraUtUg95x7Vw.jpg', 'h13', 8, NULL, '0', 'mirrored-sunglasses', '0', 50, 1, '0'),
(34, 'Louis Vuitton Handbags ', 1200, 590, '«#PurseLyfe»\r\n122\r\nLV Shoulder Tote #Louis #Vuitton#Handbags Louis Vuitton Handbags New Collection to Have', 'NpO5s7XyldN4f-ZuASPH-BbzLhPg4k85.jpg', 'h14', 8, NULL, '0', 'louis-vuitton-handbags', '1', 50, 1, '0');

-- --------------------------------------------------------

--
-- Структура таблицы `rules`
--

CREATE TABLE `rules` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `rules`
--

INSERT INTO `rules` (`id`, `brand_id`, `cat_id`) VALUES
(1, 2, 1),
(2, 4, 1),
(3, 1, 4),
(4, 2, 3),
(5, 4, 3),
(6, 5, 2),
(7, 3, 2),
(8, 3, 8),
(9, 3, 2),
(10, 8, 4),
(11, 3, 9),
(12, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `text` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `is_admin` enum('0','1') COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'admin', 'f-xMBt7KRm-LWCzOSkHWMxPIWQ-MvgbR', '$2y$13$n6B2fvtLIToORYV8Zv5RYeXyB7KcMiqoU1ueomRro1PeNm2TNR7.K', NULL, 'annag9090@mail.ru', 10, 1546962457, 1546962457, NULL),
(2, 'Astghik', 'VmFSsmfST0jkvdUPcgVi15vOsfgHo73j', '$2y$13$nPFua5XNxDbZgonW5BAptemjndmQbfuu8987vJSNhqi2PH8meGehK', NULL, 'astghik.mirijanyan@gmail.com', 10, 1548058634, 1548058634, '1'),
(3, 'aram', 'm5kAIa7SH1E6fVRalW1P_LhieoQQw_Kp', '$2y$13$bt43ehQUUrbJB4Ig5ANRr.zACco3ul0Eb9iGmg5ShoZbqKPQQnVLW', NULL, 'astghiak.mirijanyan@gmail.com', 10, 1548864216, 1548864216, NULL),
(4, 'Astghikk', 'dPAR_3lxlTDFBfmKfZqrVb236tS1tVf5', '$2y$13$aRVsReNzAkwYmD04FjHageDiytsZReznD.TioONjmD4xp3fiphXM2', NULL, 'astghhiak.mirijanyan@gmail.com', 10, 1550128949, 1550128949, NULL),
(5, 'Karen', 'nMHFDmgdsq0eE7Q_dD1KijL9GLbi-AID', '$2y$13$c.ApP0/GweZmURNfPaURneL3Vn7qwm4iNXeR.WuG3EOkVVY6bl4Nq', NULL, 'karen@gmail.com', 10, 1550173565, 1550173565, NULL),
(6, 'aaaaa', 'J9Y2TwQXNjtK12CsCCrNKfL3CMBeecxn', '$2y$13$X1f/PbYEl1QHy9UvmDjCSukKYeaOlnGUZRZUh1N3nZY4WEP1WZi1K', NULL, 'aaaaaaaaaaaa@gmail.com', 10, 1550181846, 1550181846, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `product_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `wishlist`
--

INSERT INTO `wishlist` (`id`, `product_id`, `user_id`) VALUES
(556, 8, 2),
(557, 28, 2),
(561, 19, 2),
(562, 34, 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `id_2` (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `blog_id` (`blog_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Индексы таблицы `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `orders_id` (`orders_id`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sku_2` (`sku`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `sku` (`sku`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `brand_id_2` (`brand_id`);

--
-- Индексы таблицы `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Индексы таблицы `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Индексы таблицы `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT для таблицы `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT для таблицы `rules`
--
ALTER TABLE `rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=563;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `pictures_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `productsCatgroyFK` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `rules`
--
ALTER TABLE `rules`
  ADD CONSTRAINT `rules_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rules_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
