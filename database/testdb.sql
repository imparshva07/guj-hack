-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2018 at 10:27 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `primary` int(11) NOT NULL,
  `hid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`primary`, `hid`, `uid`, `score`) VALUES
(1, 2, 1, 153),
(2, 2, 2, 86),
(3, 2, 3, 57),
(10, 5, 4, 385),
(16, 3, 27, 57);

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `id` int(150) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`id`, `name`, `email`, `password`) VALUES
(1, 'Pratik', 'Pratik@gmail.com', '$2y$10$0Hd7S6Fb8P0Ra1iy3fsuCukNrDnyt34.W2QYL7Y.dKhaEGOwn/xpK'),
(2, 'Parshva', 'parshvashah@gmail.com', '$2y$10$deKb1TlNcZE4Z91h4O9s2ejf.Gr6bqTUh6WN4LpJJqzt5SInf1cmy'),
(3, 'Nancy', 'nancygarala@gmail.com', '$2y$10$c46eobEnfe7V63Dojttk4.4XfhjQOAo549BxRfBfbuqmO0lZF7A0O'),
(4, 'Nisarg Patel', 'nisarg@gmail.com', '$2y$10$Tj91jpmG5hRVrT9WfkTxDu0EArvD.h5up6234gYKrYwcWv6VdHWru'),
(5, 'varshit', 'varshit@gmail.com', '$2y$10$7wMM0w8mvl5jrgVloBqVae/imc7gRRzGvPTFN3X9TjRupWIOy3.06'),
(6, 'Varshit Shah', 'varshit@gmail.com', '$2y$10$1WIH5uFTJZgdbtnucHZCNupte2Ht.M7aMGErQ29JI8d1WNonb5suy'),
(25, 'Vishv', 'vishv43@gmail.com', '$2y$10$jn3PjD7VHO7bAp3ww8X9IevKfXxfn17PyuksZop9PcE4chuaHuC1.'),
(26, 'Pratik', 'gadhiya@gmail.com', '$2y$10$0lDB7lx5PsQLbjXfWIshA.4Edkr8SpL960NwUT3x7RBV9/RDBweri'),
(27, 'Vishv', 'Trivedi@gmail.com', '$2y$10$RAWUJ8HPo/qpvPMDpaIXuupQowFKfb2Wq8mirhtBW/RkSnUpJSVsa'),
(28, 'Vishv', 'Trivedi@gmail.com', '$2y$10$rBS31sZ/quqoLu62bIK/UeomT9ZQKZ1HluuK2NH1OpshTPtP6BlSW');

-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--

CREATE TABLE `hostel` (
  `hid` int(150) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(150) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `fees` int(150) NOT NULL,
  `vacancies` int(11) NOT NULL,
  `mess` varchar(150) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hostel`
--

INSERT INTO `hostel` (`hid`, `name`, `gender`, `address`, `city`, `contact`, `fees`, `vacancies`, `mess`, `startdate`, `enddate`) VALUES
(2, 'GCET Boys Hostel', 'Male', 'Opp GCET College, Vallabh Vidyanagar, Anand, Gujarat 388120', 'Vallabh Vidyanagar', 2692232928, 32000, 2, 'Yes', '0000-00-00', '0000-00-00'),
(3, 'Surajba Girls Hostel', 'Female', 'Behind G H Patel College of Engineering and Technology', 'Vallabh Vidyanagar', 269223223, 32000, 1, 'Yes', '0000-00-00', '0000-00-00'),
(4, 'Sheth R.V.K.K.P. Girls Hostel', 'Female', 'Arogyanagar Road, Athwalines, Athwa, Surat, Gujarat 395001', 'Surat', 8989787856, 50000, 2, 'No', '0000-00-00', '0000-00-00'),
(5, 'BVM Boys Hostel', 'Male', 'Nr. Shastri ground, Vallabh Vidyanagar', 'Vallabh Vidyanagar', 269124124, 18000, 1, 'No', '0000-00-00', '0000-00-00'),
(6, 'Lounge Gov boys hostel', 'Male', 'Suryoday Society, Nalanda Society, Rajkot, Gujarat 360001', 'Rajkot', 9033676485, 35000, 0, 'Yes', '0000-00-00', '0000-00-00'),
(7, 'Shivam Hostel', 'Male', 'Near New Parimal School, Opposite Atmiya Collage, Kalavad Rd, Laxmi Nagar, Chandreshnagar, Rajkot, Gujarat 360005', 'Rajkot', 9724312901, 52000, 0, 'Yes', '0000-00-00', '0000-00-00'),
(8, 'Nest Hostel', 'Male', 'Mota Bazaar, Vallabh Vidyanagar, Anand, Gujarat 388120', 'Anand', 2692233359, 15000, 0, 'No', '0000-00-00', '0000-00-00'),
(9, 'Kamya  Girls Hostel', 'Female', 'Near Soumil Flats, Iskon Temple Road, Karmsad Road Crossing,mota Bazar, Vallabh Vidyanagar, Gujarat 388120', 'Anand', 9537853888, 25000, 0, 'Yes', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `uid` int(150) NOT NULL,
  `marksheet` longblob NOT NULL,
  `address` longblob NOT NULL,
  `caste` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(150) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(150) NOT NULL,
  `caste` varchar(255) NOT NULL,
  `percentage` int(150) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `uaddress` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `distance` int(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `name`, `gender`, `caste`, `percentage`, `contact`, `uaddress`, `city`, `distance`) VALUES
(1, 'Pratik', 'Male', 'SC', 89, 7894561230, 'jashbcnc', 'fhbhijhb', 80),
(2, 'Parshva', 'Male', 'Open', 78, 7894561230, 'wfhwjnvw', 'haefjnj', 90),
(3, 'Frank', 'Male', 'Open', 86, 7894561230, 'gchqbkjq', 'sahdiqjf', 45),
(4, 'Nisarg Patel', 'Female', 'OBC', 10, 7894564561, 'dfsdgdg', 'Anand', 546),
(26, 'Pratik', '', '', 0, 0, '', '', 0),
(27, 'Vishv', 'Female', 'Open', 85, 78919873297, 'ggdgdgdfd', 'Anand', 45);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`primary`);

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hostel`
--
ALTER TABLE `hostel`
  ADD PRIMARY KEY (`hid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `primary` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `credentials`
--
ALTER TABLE `credentials`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `hostel`
--
ALTER TABLE `hostel`
  MODIFY `hid` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `credentials` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
