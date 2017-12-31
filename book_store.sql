-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2017 at 08:53 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_name` varchar(10) NOT NULL,
  `admin_password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_name`, `admin_password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `fileupload`
--

CREATE TABLE `fileupload` (
  `book_id` int(5) NOT NULL,
  `book_name` varchar(40) NOT NULL,
  `author` varchar(40) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `book_path` varchar(100) NOT NULL,
  `img_path` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fileupload`
--

INSERT INTO `fileupload` (`book_id`, `book_name`, `author`, `description`, `genre`, `book_path`, `img_path`) VALUES
(1, 'Art of Comedy Writing', 'Mel Helitzer', 'An art of comedy writing is an intuitive book written by Mel which outlines how to write anything in a humorous way.', 'comedy', 'uploads/comedy-writing.pdf', 'uploadsImages/comedy-writing img.JPG'),
(2, 'Man vs Superman', 'Bernard Shaw', 'It is a very humorous novel in which Bernard compares a normal man with a super man. ', 'comedy', 'uploads/mansuperman.pdf', 'uploadsImages/mansuperman image.JPG'),
(3, 'Divine Drama of Love', 'James Foler', 'The author shows how love revolves around people and how it binds the people together.', 'drama', 'uploads/Divine Drama of Love.pdf', 'uploadsImages/Divine Drama of Love image.JPG'),
(4, 'A Stranger Beside Me', 'Helix RayMond', 'Its a Thriller Drama where the author takes the readers on a thrilling live experience.', 'drama', 'uploads/the stranger beside me.pdf', 'uploadsImages/the stranger beside me image.JPG'),
(8, 'of Honor and Love', 'S.J Frost', 'Love is always write', 'romance', 'uploads/love.pdf', 'uploadsImages/love.JPG'),
(9, 'Last one in', 'Nicolus', 'The sympathy sharply written', 'satire', 'uploads/satire.pdf', 'uploadsImages/satire.JPG'),
(10, 'The Best Ghost stories', 'Arthur B. Reeve', ' feel for the mystery of the ghost story', 'horror', 'uploads/The-Best-Ghost-Stories.pdf', 'uploadsImages/horror.JPG'),
(11, 'Astounding sifi', 'Murray Leinster', 'The human race was expanding through the galaxy', 'sifi', 'uploads/Murray-Leinster-The_Aliens.pdf', 'uploadsImages/sifi.JPG'),
(12, 'The Arabian Nights', 'Andrew Lang', ' chronicles of the ancient dynasty of the Sassanidae', 'fantasy', 'uploads/Andrew-Lang-The_Arabian_Nights.pdf', 'uploadsImages/f1.JPG'),
(13, 'The Avalanche', 'Gertrude Atherton', 'Atherton, was an American Feminist and writer of social and historical fiction, much of it set in California', 'mythology', 'uploads/Gertrude-Atherton-The-Avalanche.pdf', 'uploadsImages/m.JPG'),
(14, 'Love Sweet Love', 'Sammy Mrvan', 'If you personify love even in times of trouble, of hardship or war, then you are truly one of the mighty.', 'romance', 'uploads/love-sweet-love.pdf', 'uploadsImages/love sweet love.PNG'),
(15, 'Three Men in a Boat', 'Jerome K Jerome', 'The novel, narrated by Jerome, tells of a boat trip in Thames River with his friends George and William Samuel Harris. ', 'comedy', 'uploads/Three-Men-in-a-Boat.pdf', 'uploadsImages/Three-Men-in-a-Boat img.JPG'),
(17, '2 States', 'Chethan Bhagat', 'The story is about a couple, Krish and Ananya, who fall from two different states of India, Punjab and Tamil Nadu respectively, are deeply in love and want to get married.', 'romance', 'uploads/2 States.pdf', 'uploadsImages/2 States.PNG'),
(18, '13 Reasons Why', 'Chuck Lorrey', 'It is a spooky novel that ravels and unravels the mysterious of Pristine College.', 'horror', 'uploads/13 Reasons Why.pdf', 'uploadsImages/Capture.PNG'),
(20, 'One Indian Girl', 'Chethan Bhagat', 'One Indian Girl is the story of Radhika Mehta, a worker at the Distressed Debt group of Goldman Sachs, an investment bank.', 'drama', 'uploads/one indian girl pdf.pdf', 'uploadsImages/one indian girl.PNG'),
(21, 'Vampire Diaries', 'Roosey Zane', 'The series is set in the fictional town of Mystic Falls, Virginia, a town charged with supernatural history since its settlement of migrants from New England in the late 19th century.', 'horror', 'uploads/vampire diaries.pdf', 'uploadsImages/vampire dairies.PNG'),
(23, 'dsadasd', 'xzc', 'czxczx', 'comedy', 'uploads/five-point-someone-chetan-bhagat_ebook.pdf', 'uploadsImages/5 point someone.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `book_id` int(5) NOT NULL,
  `downloads` int(10) NOT NULL,
  `views` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`book_id`, `downloads`, `views`) VALUES
(1, 15, 37),
(2, 10, 25),
(3, 10, 22),
(4, 4, 24),
(8, 0, 1),
(9, 0, 0),
(10, 0, 0),
(11, 1, 0),
(12, 0, 0),
(13, 0, 0),
(14, 0, 1),
(15, 1, 2),
(17, 45, 1),
(18, 0, 0),
(20, 0, 21),
(21, 26, 14),
(23, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `requestbooks`
--

CREATE TABLE `requestbooks` (
  `reqid` int(11) NOT NULL,
  `uname` varchar(10) NOT NULL,
  `bname` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `requestbooks`
--

INSERT INTO `requestbooks` (`reqid`, `uname`, `bname`, `description`) VALUES
(502, 'rajath', 'sachin\'s autobiography', 'this book must be there in every book store'),
(504, 'shiv', 'Half Girlfriend', 'After watching the movie i want to read this novel.'),
(505, 'ajay', 'Humour is Fun', 'This is an amazing laughter riot, please upload'),
(506, 'arpith', 'The Hunger Games', 'Can you plz upload this book?'),
(510, 'virat', 'Tom and Jerry', 'My brother loves reading this book so please upload.');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `subid` int(11) NOT NULL,
  `substart` date NOT NULL,
  `subend` date NOT NULL,
  `subtype` int(11) NOT NULL,
  `downloads` int(5) NOT NULL,
  `maxdownloads` int(5) NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`subid`, `substart`, `subend`, `subtype`, `downloads`, `maxdownloads`, `cid`) VALUES
(22277314, '2017-12-03', '2018-01-01', 499, 1, 400, 130),
(41356086, '2017-12-01', '2017-12-31', 299, 148, 150, 123),
(58997782, '2017-12-03', '2018-01-01', 299, 3, 150, 119),
(90158066, '2017-12-03', '2018-01-01', 499, 0, 400, 120),
(99026282, '2017-12-01', '2017-12-31', 499, 3, 400, 118);

-- --------------------------------------------------------

--
-- Table structure for table `trial`
--

CREATE TABLE `trial` (
  `cid` int(5) NOT NULL,
  `trialcount` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trial`
--

INSERT INTO `trial` (`cid`, `trialcount`) VALUES
(118, 0),
(119, 2),
(120, 2),
(123, 0),
(125, 20),
(126, 20),
(129, 2),
(130, 2),
(131, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `cid` int(4) NOT NULL,
  `name` varchar(20) NOT NULL,
  `phno` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`cid`, `name`, `phno`, `email`, `pwd`, `date`) VALUES
(118, 'rajath', '9036085800', 'rajath@gmail.com', 'rajath', '2017-11-24'),
(119, 'manoj', '9654123475', 'manoj@gmail.com', 'manoj', '2017-11-24'),
(120, 'shiv', '7760934320', 'shivgoudpatil@gmail.com', '123', '2017-11-26'),
(123, 'ajay', '9854745632', 'ajay@gmail.com', 'ajay', '2017-12-01'),
(125, 'suhas', '9854653212', 'suhas@gmail.com', 'suhas', '2017-12-01'),
(126, 'arpith', '7795557437', 'arpith@gmail.com', 'arpith', '2017-12-01'),
(129, 'Arjun', '9365451214', 'arjun@gmail.com', 'Password', '2017-12-29'),
(130, 'virat', '9656451232', 'virat@gmail.com', 'virat', '2017-12-03'),
(131, 'rama', '7854652132', 'rama@gmail.com', 'rama', '2017-12-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fileupload`
--
ALTER TABLE `fileupload`
  ADD PRIMARY KEY (`book_id`,`book_name`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `requestbooks`
--
ALTER TABLE `requestbooks`
  ADD PRIMARY KEY (`reqid`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`subid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `trial`
--
ALTER TABLE `trial`
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fileupload`
--
ALTER TABLE `fileupload`
  MODIFY `book_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `requestbooks`
--
ALTER TABLE `requestbooks`
  MODIFY `reqid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=511;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `cid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `fileupload` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subscription`
--
ALTER TABLE `subscription`
  ADD CONSTRAINT `subscription_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `user` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trial`
--
ALTER TABLE `trial`
  ADD CONSTRAINT `trial_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `user` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
