-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2019 at 06:52 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `UserID` int(11) NOT NULL,
  `EmployeeID` int(11) NOT NULL,
  `Date_Hired` date NOT NULL,
  `Password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`UserID`, `EmployeeID`, `Date_Hired`, `Password`) VALUES
(4, 1, '2019-04-08', 'pass4'),
(10, 6, '2019-04-11', 'pass10'),
(11, 5, '2019-03-20', 'pass11'),
(12, 4, '2017-07-11', 'pass12');

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `First_Name` varchar(50) NOT NULL,
  `Middle_Name` varchar(15) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Date_Born` date NOT NULL,
  `Date_Died` date DEFAULT NULL,
  `Origin_Country` varchar(50) NOT NULL,
  `Writing_Style` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`First_Name`, `Middle_Name`, `Last_Name`, `Date_Born`, `Date_Died`, `Origin_Country`, `Writing_Style`) VALUES
('Bruce', 'S', 'Davie', '1955-03-07', NULL, 'Canada', 'Informational'),
('Doug', 'A', 'Lowe', '1980-05-25', NULL, 'Australia', 'Informational'),
('Larry', 'L', 'Peterson', '1958-05-08', NULL, 'United States', 'Informational');

-- --------------------------------------------------------

--
-- Table structure for table `available`
--

CREATE TABLE `available` (
  `Room_Number` varchar(11) NOT NULL,
  `Date_Available` date NOT NULL,
  `Time_Available` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `ISBN` varchar(13) NOT NULL,
  `Item_ID` varchar(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Edition` tinyint(4) NOT NULL,
  `Language` varchar(25) NOT NULL,
  `Publisher_Name` varchar(50) NOT NULL,
  `Publisher_ID` int(11) NOT NULL,
  `Publish_Date` date NOT NULL,
  `Lendable` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`ISBN`, `Item_ID`, `Title`, `Edition`, `Language`, `Publisher_Name`, `Publisher_ID`, `Publish_Date`, `Lendable`) VALUES
('1111111111111', '2', 'Harry Potter and The Deathly Demos', 2, 'English', 'Pearson', 1, '2019-03-04', 1),
('978012385091', '4', 'Computer Networks: A System\'s Approach', 8, 'English', 'Emerald Group Publishing', 3, '1997-09-15', 1),
('9780470179154', '4', 'Networking for Dummies', 4, 'English', 'Macmillan Learning', 4, '2019-04-16', 1),
('9999999999999', '1', 'Fundamentals of Database Systems', 7, 'English', 'Pearson', 1, '2019-04-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `booked`
--

CREATE TABLE `booked` (
  `Room_Number` varchar(11) NOT NULL,
  `Date_Booked` date NOT NULL,
  `Time_Booked` time NOT NULL,
  `Booking_Duration` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booked`
--

INSERT INTO `booked` (`Room_Number`, `Date_Booked`, `Time_Booked`, `Booking_Duration`) VALUES
('101', '2019-04-12', '06:14:00', 1),
('105', '2019-04-21', '14:16:00', 1),
('202', '2019-04-27', '18:15:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `borrows`
--

CREATE TABLE `borrows` (
  `UserID` int(11) NOT NULL,
  `ISBN` varchar(13) NOT NULL,
  `Date_Borrowed` date NOT NULL,
  `Date_Returned` date DEFAULT NULL,
  `Borrow_Duration` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `borrows`
--

INSERT INTO `borrows` (`UserID`, `ISBN`, `Date_Borrowed`, `Date_Returned`, `Borrow_Duration`) VALUES
(1, '9999999999999', '2019-04-12', '0000-00-00', 2),
(2, '9999999999999', '2019-04-12', '2019-04-15', 4),
(6, '1111111111111', '2019-04-12', '0000-00-00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `UserID` int(11) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `ISBN` varchar(13) NOT NULL,
  `Genre` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `Item_ID` varchar(11) NOT NULL,
  `Item_Type` varchar(50) NOT NULL,
  `Item_Location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`Item_ID`, `Item_Type`, `Item_Location`) VALUES
('1', 'Book', 'main'),
('2', 'Book', 'SecondFloor'),
('3', 'Book', 'ThirdFloor'),
('4', 'Book', 'SecondFloor');

-- --------------------------------------------------------

--
-- Table structure for table `lends`
--

CREATE TABLE `lends` (
  `UserID` int(11) NOT NULL,
  `EmployeeID` int(11) NOT NULL,
  `ISBN` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `librarian`
--

CREATE TABLE `librarian` (
  `UserID` int(11) NOT NULL,
  `EmployeeID` int(11) NOT NULL,
  `Date_Hired` date NOT NULL,
  `Password` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `librarian`
--

INSERT INTO `librarian` (`UserID`, `EmployeeID`, `Date_Hired`, `Password`) VALUES
(3, 1, '2019-05-12', 'pass'),
(9, 2, '2019-01-14', 'pass9'),
(13, 3, '2018-06-04', 'pass1');

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `Name` varchar(50) NOT NULL,
  `Location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`Name`, `Location`) VALUES
('Doucette', 'University of Calgary'),
('Gallagher', 'University of Calgary'),
('TFDL', 'University of Calgary'),
('TITL', 'University of Calgary');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `UserID` int(11) NOT NULL,
  `Num_Of_Books_Borrowed` int(11) NOT NULL DEFAULT '0',
  `Password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`UserID`, `Num_Of_Books_Borrowed`, `Password`) VALUES
(1, 0, 'pass1'),
(2, 0, 'pass2'),
(6, 0, 'pass6');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `Name` varchar(50) NOT NULL,
  `ID` int(11) NOT NULL,
  `Location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`Name`, `ID`, `Location`) VALUES
('Cengage Learning', 2, 'Boston, United States'),
('Emerald Group Publishing', 3, 'Bingly, United Kingdom'),
('Macmillan Learning', 4, 'London, United Kingdom'),
('McGraw-Hill Education', 5, 'New York, United States'),
('Pearson', 1, 'Canada'),
('Routledge Taylor & Francis', 6, 'New York, United States'),
('Wiley', 7, 'San Francisco, United States'),
('Wolters Kluwer', 8, 'South Holland, Netherlands');

-- --------------------------------------------------------

--
-- Table structure for table `reserves`
--

CREATE TABLE `reserves` (
  `UserID` int(11) NOT NULL,
  `Room_Number` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reserves`
--

INSERT INTO `reserves` (`UserID`, `Room_Number`) VALUES
(1, '101'),
(5, '202'),
(15, '105');

-- --------------------------------------------------------

--
-- Table structure for table `study_rooms`
--

CREATE TABLE `study_rooms` (
  `Room_Number` varchar(11) NOT NULL,
  `Capacity` int(11) NOT NULL,
  `Lib_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `study_rooms`
--

INSERT INTO `study_rooms` (`Room_Number`, `Capacity`, `Lib_Name`) VALUES
('100', 5, 'TFDL'),
('101', 5, 'TFDL'),
('102', 5, 'TFDL'),
('103', 5, 'TFDL'),
('105', 5, 'TFDL'),
('106', 5, 'TFDL'),
('107', 6, 'TFDL'),
('108', 6, 'TFDL'),
('109', 6, 'TFDL'),
('110', 6, 'TFDL'),
('201', 8, 'TITL'),
('202', 8, 'TITL'),
('203', 8, 'TITL'),
('204', 8, 'TITL'),
('205', 8, 'TITL'),
('301', 4, 'Gallagher'),
('302', 4, 'Gallagher'),
('303', 4, 'Gallagher'),
('304', 4, 'Gallagher'),
('305', 4, 'Gallagher'),
('401', 12, 'Doucette'),
('402', 12, 'Doucette'),
('403', 6, 'Doucette'),
('404', 4, 'Doucette'),
('405', 10, 'Doucette');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Middle_Name` varchar(15) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Street_Name` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `Phone_Number` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `First_Name`, `Middle_Name`, `Last_Name`, `Street_Name`, `City`, `Country`, `Phone_Number`) VALUES
(1, 'Dan', 'M', 'Trump', '135', 'Calgary', 'Canada', '4829119'),
(2, 'Edward', 'M', 'Macadamia', '1234', 'Calgary', 'Canada', '4829119'),
(3, 'Narshbla', 'Da', 'librar', '135', 'Calgary', 'Canada', '4829119'),
(4, 'Kashfia', 'S', 'Sailunaz', 'demo street', 'Calgary', 'Canada', '1234567890'),
(5, 'Pavol', 'T', 'Federl', 'Rue Sherbrooke', 'Montreal', 'Canada', '4035236666'),
(6, 'Eddy', 'X', 'Qiang', 'SaddleTowne', 'calgary', 'canada', '4031234567'),
(7, 'Karim', 'K', 'Beyk', 'Argyle Street', 'Halifax', 'Canada', '5876365555'),
(8, 'Rogers', 'G', 'Goodman', 'Aspen Meadows', 'Calgary', 'Canada', '5874123456'),
(9, 'Billy', 'D', 'Richman', 'Abalone Street', 'Calgary', 'Canada', '9856321047'),
(10, 'Trilok', 'K', 'Patel', 'Cedarwood', 'Calgary', 'Canada', '5874632588'),
(11, 'Muhammad', 'G', 'Saadan', 'Citadel Pass', 'Calgary', 'Canada', '5874123690'),
(12, 'Trevor', 'H', 'Boyd', 'Deerside', 'Calgary', 'Canada', '1587412201'),
(13, 'Shuji', 'J', 'Chen', 'Copperstone', 'Calgary', 'Canada', '5878222077'),
(14, 'Kim', 'D', 'Jong', 'Coral Shores', 'Calgary', 'Canada', '4032382901'),
(15, 'Jose', 'O', 'Mourinho', 'Parkridge', 'Calgary', 'Canada', '4032016325');

-- --------------------------------------------------------

--
-- Table structure for table `writes`
--

CREATE TABLE `writes` (
  `Author_Fname` varchar(50) NOT NULL,
  `Author_Mname` varchar(15) NOT NULL,
  `Author_Lname` varchar(50) NOT NULL,
  `ISBN` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `writes`
--

INSERT INTO `writes` (`Author_Fname`, `Author_Mname`, `Author_Lname`, `ISBN`) VALUES
('Bruce', 'S', 'Davie', '978012385091'),
('Doug', 'A', 'Lowe', '9780470179154'),
('Larry', 'L', 'Peterson', '978012385091');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`UserID`,`EmployeeID`) USING BTREE,
  ADD KEY `EmployeeID` (`EmployeeID`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`First_Name`,`Middle_Name`,`Last_Name`),
  ADD KEY `Middle_Name` (`Middle_Name`),
  ADD KEY `Last_Name` (`Last_Name`);

--
-- Indexes for table `available`
--
ALTER TABLE `available`
  ADD PRIMARY KEY (`Room_Number`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`ISBN`),
  ADD KEY `Item_ID` (`Item_ID`),
  ADD KEY `Publisher_Name` (`Publisher_Name`),
  ADD KEY `Publisher_ID` (`Publisher_ID`);

--
-- Indexes for table `booked`
--
ALTER TABLE `booked`
  ADD PRIMARY KEY (`Room_Number`);

--
-- Indexes for table `borrows`
--
ALTER TABLE `borrows`
  ADD PRIMARY KEY (`UserID`,`ISBN`),
  ADD KEY `ISBN` (`ISBN`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`UserID`,`Type`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`ISBN`,`Genre`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`Item_ID`);

--
-- Indexes for table `lends`
--
ALTER TABLE `lends`
  ADD PRIMARY KEY (`UserID`,`EmployeeID`,`ISBN`),
  ADD KEY `EmployeeID` (`EmployeeID`),
  ADD KEY `lends_ibfk_3` (`ISBN`);

--
-- Indexes for table `librarian`
--
ALTER TABLE `librarian`
  ADD PRIMARY KEY (`UserID`,`EmployeeID`),
  ADD KEY `EmployeeID` (`EmployeeID`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`Name`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`Name`,`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `reserves`
--
ALTER TABLE `reserves`
  ADD PRIMARY KEY (`UserID`,`Room_Number`),
  ADD KEY `reserves_ibfk_1` (`Room_Number`);

--
-- Indexes for table `study_rooms`
--
ALTER TABLE `study_rooms`
  ADD PRIMARY KEY (`Room_Number`),
  ADD KEY `Lib_Name` (`Lib_Name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `writes`
--
ALTER TABLE `writes`
  ADD PRIMARY KEY (`Author_Fname`,`Author_Mname`,`Author_Lname`,`ISBN`),
  ADD KEY `Author_Mname` (`Author_Mname`),
  ADD KEY `Author_Lname` (`Author_Lname`),
  ADD KEY `ISBN` (`ISBN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `librarian`
--
ALTER TABLE `librarian`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrator`
--
ALTER TABLE `administrator`
  ADD CONSTRAINT `administrator_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `available`
--
ALTER TABLE `available`
  ADD CONSTRAINT `available_ibfk_1` FOREIGN KEY (`Room_Number`) REFERENCES `study_rooms` (`Room_Number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`Item_ID`) REFERENCES `inventory` (`Item_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`Publisher_Name`) REFERENCES `publisher` (`Name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_ibfk_3` FOREIGN KEY (`Publisher_ID`) REFERENCES `publisher` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `booked`
--
ALTER TABLE `booked`
  ADD CONSTRAINT `booked_ibfk_1` FOREIGN KEY (`Room_Number`) REFERENCES `study_rooms` (`Room_Number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `borrows`
--
ALTER TABLE `borrows`
  ADD CONSTRAINT `borrows_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `member` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borrows_ibfk_2` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fees`
--
ALTER TABLE `fees`
  ADD CONSTRAINT `fees_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `genre`
--
ALTER TABLE `genre`
  ADD CONSTRAINT `genre_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lends`
--
ALTER TABLE `lends`
  ADD CONSTRAINT `lends_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `librarian` (`UserID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lends_ibfk_2` FOREIGN KEY (`EmployeeID`) REFERENCES `librarian` (`EmployeeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lends_ibfk_3` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `librarian`
--
ALTER TABLE `librarian`
  ADD CONSTRAINT `librarian_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reserves`
--
ALTER TABLE `reserves`
  ADD CONSTRAINT `reserves_ibfk_1` FOREIGN KEY (`Room_Number`) REFERENCES `study_rooms` (`Room_Number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reserves_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `study_rooms`
--
ALTER TABLE `study_rooms`
  ADD CONSTRAINT `study_rooms_ibfk_1` FOREIGN KEY (`Lib_Name`) REFERENCES `library` (`Name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `writes`
--
ALTER TABLE `writes`
  ADD CONSTRAINT `writes_ibfk_1` FOREIGN KEY (`Author_Fname`) REFERENCES `author` (`First_Name`),
  ADD CONSTRAINT `writes_ibfk_3` FOREIGN KEY (`Author_Mname`) REFERENCES `author` (`Middle_Name`),
  ADD CONSTRAINT `writes_ibfk_4` FOREIGN KEY (`Author_Lname`) REFERENCES `author` (`Last_Name`),
  ADD CONSTRAINT `writes_ibfk_5` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
