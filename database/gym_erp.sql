-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2026 at 09:03 PM
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
-- Database: `gym_erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `vendor_name` varchar(150) NOT NULL,
  `vendor_phone` varchar(100) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `delete_status` tinyint(1) DEFAULT 0,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `cate_id`, `name`, `price`, `vendor_name`, `vendor_phone`, `photo`, `description`, `delete_status`, `created_at`) VALUES
(1, 5, '5kg', 200.00, 'Suhas', '3465465464', '1770202860_project6.webp', 'best', 0, '2026-02-04'),
(2, 0, '', 0.00, '', '', '', '', 1, '2026-02-05'),
(3, 3, '10kg Plates', 5000.00, 'Pratik patil', '9898989898', '1771242203_team4.webp', 'total 2 plates', 0, '2026-02-16');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `description` longtext NOT NULL,
  `blog_date` date DEFAULT NULL,
  `delete_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `name`, `photo`, `description`, `blog_date`, `delete_status`) VALUES
(1, 'Why Personal Training Can Transform Your Fitness Journey', '1770709805_blog-2.jpg', '<p>Personal training plays a vital role in achieving fitness goals efficiently and safely. This article explains how professional personal trainers at Bodytone Fitness create customized workout plans based on individual body types, fitness levels, and goals. With expert supervision, proper technique guidance, and continuous motivation, personal training helps members stay disciplined and achieve long-term fitness success.</p>', '2026-01-28', 0),
(2, '5 Effective Workouts to Build Strength and Endurance', '1770709712_blog-1.jpg', '<p>Building strength and endurance requires a balanced mix of resistance training and cardiovascular exercises. In this blog, we highlight five effective workouts that target major muscle groups, improve stamina, and enhance overall body performance. These workouts are designed to help beginners build a strong foundation while also challenging experienced gym members to push their limits safely and consistently.</p>', '2026-01-12', 0),
(3, 'Nutrition Tips to Support Your Gym Workouts', '1770709834_blog-3.jpg', '<p>Nutrition is an essential part of any successful fitness journey. In this blog, we discuss practical and easy-to-follow nutrition tips that support workout performance and muscle recovery. From understanding the importance of protein intake to maintaining hydration and balanced meals, these tips help gym members fuel their bodies correctly and maintain energy levels throughout their fitness routine.</p>', '2026-02-05', 0),
(4, 'Blog', '1771240947_tall-stylish-shirtless-bodybuilder-dressed-sports-shorts-doing-exercise-bicep-with-barbell-standing-studio-isolated-dark-background.jpg', '<p>Best blog adfvdsf &nbsp;wefsfwes fsd</p>', '2026-02-17', 1),
(5, 'Test blog', '1771243463_tall-stylish-shirtless-bodybuilder-dressed-sports-shorts-doing-exercise-bicep-with-barbell-standing-studio-isolated-dark-background.jpg', '<p>Best <a href=\"http://localhost/gym_erp/blog.php#\"><strong>5 Effective Workouts to Build Strength and Endurance</strong></a></p>', '2026-02-18', 1),
(6, 'demo', '1771244481_tall-stylish-shirtless-bodybuilder-dressed-sports-shorts-doing-exercise-bicep-with-barbell-standing-studio-isolated-dark-background.jpg', '<p>demo data fger ergerge ergerge wefdsed</p>', '2026-02-18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `delete_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `status`, `delete_status`) VALUES
(1, 'Branding', 1, 1),
(2, 'Web Design', 1, 1),
(3, 'plates', 1, 0),
(4, 'sdfv', 1, 1),
(5, 'Dumbells', 0, 0),
(6, 'Graphic Design', 0, 1),
(7, 'dvddd', 0, 1),
(8, 'Bench', 0, 0),
(9, 'Big Machine', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `from_time` time NOT NULL,
  `to_time` time NOT NULL,
  `title` varchar(150) NOT NULL,
  `trainer` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `delete_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `cate_id`, `from_time`, `to_time`, `title`, `trainer`, `created_at`, `delete_status`) VALUES
(1, 1, '06:00:00', '07:00:00', 'Power Lifting', '1', '2026-02-09 11:28:18', 0),
(2, 1, '08:00:00', '10:00:00', 'Body Building', '2', '2026-02-09 11:29:01', 0),
(3, 1, '10:00:00', '12:00:00', 'Cardio Program', '2', '2026-02-09 11:29:48', 0),
(4, 2, '12:00:00', '14:00:00', 'Weight Loose', '1', '2026-02-09 11:30:32', 0),
(5, 2, '14:00:00', '16:00:00', 'Fitness Program', '2', '2026-02-09 11:30:58', 0),
(6, 3, '16:00:00', '18:00:00', 'Crossfit Class', '2', '2026-02-09 11:31:30', 0),
(7, 4, '18:00:00', '20:00:00', 'Muscle Building', '2', '2026-02-09 11:32:00', 0),
(8, 4, '20:00:00', '22:00:00', 'Yoga Class', '2', '2026-02-09 11:32:35', 0),
(9, 5, '08:00:00', '10:00:00', 'Body Building', '1', '2026-02-09 11:33:09', 0),
(10, 6, '22:00:00', '12:00:00', 'Cardio Program', '2', '2026-02-09 11:33:43', 0),
(11, 6, '06:00:00', '08:00:00', 'Power Lifting', '2', '2026-02-09 11:34:13', 0),
(12, 7, '08:00:00', '10:00:00', 'Body Building', '4', '2026-02-09 11:34:45', 0),
(13, 3, '10:00:00', '12:00:00', 'Cardio Program', '1', '2026-02-09 11:35:39', 0),
(14, 3, '16:00:00', '18:00:00', 'Crossfit Class', '2', '2026-02-09 11:36:11', 0),
(15, 2, '10:00:00', '12:00:00', 'Aerobic Class', '1', '2026-02-16 11:27:19', 0),
(16, 5, '14:00:00', '16:00:00', 'Aerobic class', '1', '2026-02-16 12:02:35', 0),
(17, 4, '16:00:00', '18:00:00', 'Aerobic class', '1', '2026-02-16 12:19:08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `class_category`
--

CREATE TABLE `class_category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `delete_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_category`
--

INSERT INTO `class_category` (`id`, `name`, `delete_status`) VALUES
(1, 'Monday', 0),
(2, 'Tuesday', 0),
(3, 'Wednesday', 0),
(4, 'Thursday', 0),
(5, 'Friday', 0),
(6, 'Saturday', 0),
(7, 'Sunday', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `phone`, `subject`, `message`) VALUES
(1, 'nn', 'nr@gmaill.com', '', 'subject', 'hii test'),
(2, 'user', 'user@gmail.com', '', 'test', 'hiii'),
(3, 'walkers', 'walkers@gmail.com', '', 'test', 'this test message');

-- --------------------------------------------------------

--
-- Table structure for table `emailsending`
--

CREATE TABLE `emailsending` (
  `id` int(11) NOT NULL,
  `host` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `port` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emailsending`
--

INSERT INTO `emailsending` (`id`, `host`, `username`, `password`, `port`) VALUES
(1, 'smtp.gmail.com', 'nirdeore@gmail.com', 'iztd lchl yseo oazh', 587);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `date` date DEFAULT current_timestamp(),
  `delete_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `photo`, `comment`, `status`, `date`, `delete_status`) VALUES
(1, 'nita', 'tita@gmail.com', '1770720446_team1.webp', 'best blog', 1, '2026-02-10', 0),
(2, 'test', 'test@gmail.com', '1771239976_team4.webp', 'best blog ever', 1, '2026-02-16', 0),
(3, 'user', 'user@gmail.com', '1771241410_6.png', 'best blog ever', 0, '2026-02-16', 0),
(4, 'john', 'jn@gmail.com', '1771243590_1.png', 'best blog ever', 1, '2026-02-16', 0),
(5, 'smith', 'smith@gmail.com', '1771244605_team4.webp', 'this is the best blog for health', 0, '2026-02-16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `delete_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `photo`, `delete_status`) VALUES
(1, '1770662400_tall-stylish-shirtless-bodybuilder-dressed-sports-shorts-doing-exercise-bicep-with-barbell-standing-studio-isolated-dark-background.jpg', 0),
(2, '1770662850_daniel-apodaca-WdoQio6HPVA-unsplash.jpg', 0),
(3, '1770662863_danielle-cerullo-CQfNt66ttZM-unsplash.jpg', 0),
(4, '1770662875_john-arano-h4i9G-de7Po-unsplash.jpg', 0),
(5, '1770662889_danielle-cerullo-CQfNt66ttZM-unsplash (1).jpg', 0),
(6, '1770662905_cathy-pham-3jAN9InapQI-unsplash.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `delete_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `password`, `photo`, `address`, `phone`, `created_at`, `delete_status`) VALUES
(1, 'BODYTONE', 'admin@gmail.com', '$2y$10$xvqndaYRBNzysrjNd2hz9OwYncqeY32dnEKcqGZkB5SG8oYoy6idi', '1769157073_p_b54c1656-6563-11ef-8f1c-4e94e7820b81.png', 'Pune', '9898989898', '0000-00-00', 0),
(2, 'Rani Sahane', 'rani@gmail.com', '$2y$10$b2C9olqUFbiO5AYBpRe89.aECBu4vaG9YT4JuWshDUBKHS2QFTHei', '1766050754_testimonial1.jpg', 'Pune ', '9898989898', '0000-00-00', 0),
(3, 'meera', 'meera@gmail.com', '$2y$10$/IjIDsiwYX1898QYhv5DS.tJ4bXnHK.jNwhXvJLBfDnuRpmwkZscS', '', 'nsk pune', '9898989898', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address` text DEFAULT NULL,
  `photo` varchar(500) NOT NULL,
  `status` tinyint(1) DEFAULT 1 COMMENT '1 = Active, 0 = Inactive',
  `payment_mode` varchar(100) NOT NULL,
  `date` date DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  `delete_status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `plan_id`, `price`, `phone`, `email`, `address`, `photo`, `status`, `payment_mode`, `date`, `exp_date`, `delete_status`, `created_at`, `updated_at`) VALUES
(1, 'Nita Patil', 1, 4800.00, '567657655645', 'nn@gmail.com', 'nadhik', '1770281850_project3.webp', 1, 'Cash', '2026-02-16', '2026-05-16', 0, '2026-02-05 08:57:30', '2026-02-16 08:42:46'),
(2, 'Prashant Patil', 1, 4800.00, '989899898', '', '', '', 1, '', '2026-02-17', '2026-05-17', 0, '2026-02-05 08:58:28', '2026-02-16 11:35:29'),
(3, '', 0, 0.00, '', '', '', '', 1, '', '0000-00-00', '0000-00-00', 1, '2026-02-05 09:46:39', '2026-02-05 09:46:47'),
(4, 'Mitali Patil', 2, 1200.00, '9898989898', 'mp@gmail.com', 'Main Road, Pune', '1771241978_team1.webp', 1, 'Cash', '2026-02-17', '2026-03-17', 0, '2026-02-16 11:38:11', '2026-02-16 11:39:38');

-- --------------------------------------------------------

--
-- Table structure for table `member_sessions`
--

CREATE TABLE `member_sessions` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `login_time` datetime DEFAULT NULL,
  `logout_time` datetime DEFAULT NULL,
  `session_duration` int(11) DEFAULT 90,
  `session_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member_sessions`
--

INSERT INTO `member_sessions` (`id`, `member_id`, `login_time`, `logout_time`, `session_duration`, `session_date`) VALUES
(1, 1, '2026-02-16 16:28:05', '2026-02-16 16:28:09', 90, '2026-02-16'),
(2, 2, '2026-02-16 16:34:05', '2026-02-16 17:10:38', 90, '2026-02-16'),
(3, 4, '2026-02-16 17:10:17', '2026-02-16 17:10:32', 90, '2026-02-16');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `plan_type` enum('monthly','quarterly','yearly') NOT NULL,
  `duration` int(11) NOT NULL COMMENT 'Duration in months',
  `price` decimal(10,2) NOT NULL,
  `status` tinyint(1) DEFAULT 1 COMMENT '1 = Active, 0 = Inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `plan_type`, `duration`, `price`, `status`, `created_at`, `updated_at`, `delete_status`) VALUES
(1, 'Quarter plan', 'quarterly', 3, 4800.00, 1, '2026-01-29 11:46:39', '2026-02-16 11:36:24', 0),
(2, 'Regular', 'monthly', 1, 1200.00, 1, '2026-01-30 09:17:00', '2026-02-10 12:13:47', 0),
(3, 'yearly', 'yearly', 12, 10000.00, 1, '2026-02-05 08:51:09', '2026-02-05 08:51:09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `short_content` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `delete_status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `name`, `photo`, `icon`, `short_content`, `description`, `delete_status`, `created_at`) VALUES
(1, 'Body Building', '1770637678_tall-stylish-shirtless-bodybuilder-dressed-sports-shorts-doing-exercise-bicep-with-barbell-standing-studio-isolated-dark-background.jpg', '1770637678_icons8-body-building-48.png', 'Body Building is a strength-training program focused on muscle growth, power, and body aesthetics through structured workouts and nutrition.', '<p><strong>Body Building</strong> is a disciplined fitness program designed to increase muscle mass, strength, and overall physical appearance. It involves a combination of resistance training, progressive overload, and targeted exercises that work on specific muscle groups such as chest, back, arms, legs, and shoulders.</p><p>This program emphasizes proper workout techniques, training splits, and recovery periods to ensure safe and effective muscle development. Along with training, nutrition plays a vital role—balanced intake of protein, carbohydrates, healthy fats, and hydration helps fuel workouts and support muscle repair.</p><p>Bodybuilding is suitable for individuals aiming to improve their physique, enhance strength, boost confidence, and maintain a healthy lifestyle. Whether you are a beginner or an advanced athlete, bodybuilding can be customized to meet personal fitness goals.</p>', 0, '2026-02-09 11:47:58'),
(2, 'Weight Training', '1770638446_bodybuilder-training-biceps-with-barbell.jpg', '1770638446_icons8-deadlift-skin-type-3-96.png', 'Weight Training focuses on improving strength, endurance, and muscle tone using free weights and machines.', '<p><strong>Weight Training</strong> is a structured fitness program that uses dumbbells, barbells, resistance machines, and bodyweight exercises to enhance muscle strength and endurance. This training method targets specific muscle groups and allows gradual progression by increasing weight and repetitions over time.</p><p>It helps in improving posture, boosting metabolism, strengthening bones, and reducing body fat. Suitable for beginners and advanced members, weight training programs are customized based on fitness level, goals, and physical condition to ensure safe and effective results.</p>', 0, '2026-02-09 12:00:46'),
(3, 'Yoga & Flexibility Training', '1770638716_young-yogi-doing-astavakrasana-exercise-gym.jpg', '1770638716_icons8-yoga-100.png', 'Yoga & Flexibility Training improves flexibility, balance, and mental well-being through guided poses and breathing techniques.', '<p><strong>Yoga &amp; Flexibility Training</strong> is a holistic fitness service that combines physical postures, stretching exercises, and controlled breathing to enhance flexibility, balance, and inner calm. It helps reduce stress, improve posture, and increase joint mobility.</p><p>This program is ideal for all age groups and fitness levels. Regular yoga practice supports injury prevention, improves focus, promotes relaxation, and complements high-intensity workouts, making it an essential part of a healthy lifestyle.</p>', 0, '2026-02-09 12:05:16');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `role` varchar(150) NOT NULL,
  `feedback` text NOT NULL,
  `delete_status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `name`, `photo`, `role`, `feedback`, `delete_status`, `created_at`) VALUES
(1, 'Rahul Mehta', '1770708943_team4.webp', 'UX Designer', '<p>Bodytone Fitness has completely transformed my lifestyle. The trainers are extremely professional and motivating. The gym environment is clean, energetic, and well-equipped. I’ve gained strength, confidence, and consistency in my workouts.</p>', 0, '2026-01-22 11:26:01'),
(2, 'David Rodriguez', '1769081192_testi2.webp', 'Software Engineer', '<p>Bodytone Fitness stands out because of its discipline, hygiene, and expert trainers. Within a few months, I noticed visible changes in my stamina and body strength. Highly recommended for anyone serious about fitness.</p>', 0, '2026-01-22 11:26:32'),
(3, 'Amanda Wilson', '1769081228_testi3.webp', 'College Student', '<p>As a beginner, I was nervous joining a gym, but Bodytone Fitness made me feel comfortable from day one. The trainers are friendly and supportive, and the workout routines are easy to follow yet effective.</p>', 0, '2026-01-22 11:27:08'),
(4, 'Ryan Thompson', '1769081265_testi4.webp', 'Business Analyst', '<p>Bodytone Fitness provides a perfect balance of strength training and cardio workouts. The trainers focus on correct form and safety, which makes a big difference. It’s the best gym experience I’ve had so far.</p>', 0, '2026-01-22 11:27:45'),
(5, 'Rachel Chen', '1769081297_testi5.webp', 'Project Manager', '<p>Very reliable and easy to work with. From the first discussion to the final delivery, everything was handled with professionalism and transparency.</p>', 1, '2026-01-22 11:28:17');

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `salary` decimal(10,2) NOT NULL,
  `assign` varchar(100) NOT NULL,
  `delete_status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`id`, `name`, `photo`, `phone`, `email`, `address`, `description`, `status`, `salary`, `assign`, `delete_status`, `created_at`) VALUES
(1, 'Michael Anderson', '1770636156_sportive-man-black-shirt-closing-his-arm-muscles.jpg', '9876543210', 'rahul.sharma@gmail.com', 'Andheri East, Mumbai', '<p>Certified gym trainer with 5+ years of experience in weight training and fitness coaching.</p>', 'Active', 25000.00, '', 0, '2026-02-09 11:22:36'),
(2, 'Daniel Thompson', '1770636309_handsome-man-is-engaged-gym.jpg', '9123456780', 'amit.verma@gmail.com', 'Rohini, Delhi', '<p>Strength and conditioning expert specializing in muscle building and fat loss programs.</p>', 'Active', 30000.00, '', 0, '2026-02-09 11:25:09'),
(3, 'Neha Patel', '1770636369_beautiful-sportive-girl-posing-with-crossed-arms-dark-wall.jpg', '9988776655', 'neha.patel@gmail.com', 'Satellite, Ahmedabad', '<p>Yoga and flexibility trainer focused on posture correction and stress relief.</p>', 'Active', 28000.00, '', 1, '2026-02-09 11:26:09'),
(4, 'James Walker', '1770659750_tall-stylish-shirtless-bodybuilder-dressed-sports-shorts-doing-exercise-bicep-with-barbell-standing-studio-isolated-dark-background.jpg', '9012345678', 'karan.mehta@gmail.com', 'Vastrapur, Ahmedabad', '<p>Cross-fit and functional training specialist with strong client transformation results.</p>', 'Active', 35000.00, '', 1, '2026-02-09 11:27:02'),
(5, 'John', '1771243155_5.png', '9898998989', 'jj@gmail.com', 'Pune ', '<p>5+ years of experiance. best trainer</p>', 'Active', 10000.00, '', 1, '2026-02-16 11:59:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_category`
--
ALTER TABLE `class_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emailsending`
--
ALTER TABLE `emailsending`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_sessions`
--
ALTER TABLE `member_sessions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `member_id` (`member_id`,`session_date`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `class_category`
--
ALTER TABLE `class_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `emailsending`
--
ALTER TABLE `emailsending`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `member_sessions`
--
ALTER TABLE `member_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
