-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 10, 2020 at 11:32 AM
-- Server version: 5.5.62
-- PHP Version: 7.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hovercraft`
--

-- --------------------------------------------------------

--
-- Table structure for table `airmar`
--

CREATE TABLE `airmar` (
  `journey_date` date NOT NULL,
  `journey_time` time NOT NULL,
  `hover_crafthull_ID` int(3) NOT NULL,
  `altitude` double DEFAULT NULL,
  `roll` double DEFAULT NULL,
  `pitch` double DEFAULT NULL,
  `heading` double DEFAULT NULL,
  `speed` double DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `long` double DEFAULT NULL,
  `course` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ballast`
--

CREATE TABLE `ballast` (
  `journey_date` date NOT NULL,
  `journey_time` time NOT NULL,
  `hover_crafthull_ID` int(3) NOT NULL,
  `stbd_fwd` double DEFAULT NULL,
  `port_fuel` double DEFAULT NULL,
  `port_fwd` double DEFAULT NULL,
  `port_aft` double DEFAULT NULL,
  `stbd_aft` double DEFAULT NULL,
  `stbd_fuel` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `battery`
--

CREATE TABLE `battery` (
  `journey_date` date NOT NULL,
  `journey_time` time NOT NULL,
  `hover_crafthull_ID` int(3) NOT NULL,
  `stbd dc_current` double DEFAULT NULL,
  `port dc_current` double DEFAULT NULL,
  `stbd dc_volts` double DEFAULT NULL,
  `port dc_voltage` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bearing`
--

CREATE TABLE `bearing` (
  `journey_date` date NOT NULL,
  `journey_time` time NOT NULL,
  `hover_crafthull-ID` int(3) NOT NULL,
  `Port b/cage lower Fwd Vel` double DEFAULT NULL,
  `Port b/cage lower Fwd Temp` double DEFAULT NULL,
  `Port b/cage lower Aft Vel` double DEFAULT NULL,
  `Port b/cage lower Aft Temp` double DEFAULT NULL,
  `Stbd b/cage lower Fwd Vel` double DEFAULT NULL,
  `Stbd b/cage lower Fwd Temp` double DEFAULT NULL,
  `Stbd b/cage lower Aft Vel` double DEFAULT NULL,
  `Stbd b/cage lower Aft Temp` double DEFAULT NULL,
  `Port b/cage top Fwd Vel` double DEFAULT NULL,
  `Port b/cage top Fwd Temp` double DEFAULT NULL,
  `Port b/cage top Aft Vel` double DEFAULT NULL,
  `Port b/cage top Aft Temp` double DEFAULT NULL,
  `Stbd b/cage top Fwd Vel` double DEFAULT NULL,
  `Stbd b/cage top Fwd Temp` double DEFAULT NULL,
  `Stbd b/cage top Aft bearing Vel` double DEFAULT NULL,
  `Stbd b/cage top Aft bearing Temp` double DEFAULT NULL,
  `Port b/cage o/b Fwd Vel` double DEFAULT NULL,
  `Port b/cage o/b Fwd Temp` double DEFAULT NULL,
  `Port b/cage o/b Aft Vel` double DEFAULT NULL,
  `Port b/cage o/b Aft Temp` double DEFAULT NULL,
  `Stbd b/cage o/b Fwd Vel` double DEFAULT NULL,
  `Stbd b/cage o/b Fwd Temp` double DEFAULT NULL,
  `Stbd b/cage o/b Aft Vel` double DEFAULT NULL,
  `Stbd b/cage o/b Aft Temp` double DEFAULT NULL,
  `Port prop housing Vel` double DEFAULT NULL,
  `Port prop housing Temp` double DEFAULT NULL,
  `Stbd prop housing Vel` double DEFAULT NULL,
  `Stbd prop housing Temp` double DEFAULT NULL,
  `Port lift fan Fwd Vel` double DEFAULT NULL,
  `Port lift fan Fwd Temp` double DEFAULT NULL,
  `Port lift fan Aft Vel` double DEFAULT NULL,
  `Port lift fan Aft Temp` double DEFAULT NULL,
  `Stbd lift fan Fwd Vel` double DEFAULT NULL,
  `Stbd lift fan Fwd Temp` double DEFAULT NULL,
  `Stbd lift fan Aft Vel` double DEFAULT NULL,
  `Stbd lift fan Aft Temp` double DEFAULT NULL,
  `Port aux drive Vel` double DEFAULT NULL,
  `Port aux drive Temp` double DEFAULT NULL,
  `Stbd aux drive Vel` double DEFAULT NULL,
  `Stbd aux drive Temp` double DEFAULT NULL,
  `Port aux gen Vel` double DEFAULT NULL,
  `Port aux gen Temp` double DEFAULT NULL,
  `Stbd aux gen Vel` double DEFAULT NULL,
  `Stbd aux gen Temp` double DEFAULT NULL,
  `Port B-thruster Vel` double DEFAULT NULL,
  `Port B-thruster Temp` double DEFAULT NULL,
  `Stbd B-thruster Vel` double DEFAULT NULL,
  `Stbd B-thruster Temp` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `craft`
--

CREATE TABLE `craft` (
  `journey_date` date NOT NULL,
  `journey_time` time NOT NULL,
  `hover_crafthull_ID` int(3) NOT NULL,
  `Port_Prop_Pitch_Hydraulic_Temperature` int(1) DEFAULT NULL,
  `STBD_Prop_Pitch_Hydraulic_Temperature` int(1) DEFAULT NULL,
  `Windscreen_Heater` int(1) DEFAULT NULL,
  `Shore_Supply_Connected` int(1) DEFAULT NULL,
  `Port_Prop_Pitch` double DEFAULT NULL,
  `STBD_Prop_Pitch` double DEFAULT NULL,
  `Port_Rudder_Angle` double DEFAULT NULL,
  `STBD_Rudder_Angle` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `engine`
--

CREATE TABLE `engine` (
  `journey_date` date NOT NULL,
  `journey_time` time NOT NULL,
  `hover_crafthull_ID` int(3) NOT NULL,
  `STBD Fuel Rate` double DEFAULT NULL,
  `Port Fuel Rate` double DEFAULT NULL,
  `STBD Percent Load` int(3) DEFAULT NULL,
  `Port Percent Load` int(3) DEFAULT NULL,
  `STBD Percent Torque` int(3) DEFAULT NULL,
  `Port Percent Torque` int(3) DEFAULT NULL,
  `STBD_Tachometer` int(4) DEFAULT NULL,
  `Port_Tachometer` int(4) DEFAULT NULL,
  `fdgfd-fjgh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `environment`
--

CREATE TABLE `environment` (
  `journey_date` date NOT NULL,
  `journey_time` time NOT NULL,
  `hover_crafthull-ID` int(3) NOT NULL,
  `bar` double DEFAULT NULL,
  `True Wind Angle` double DEFAULT NULL,
  `Apparent Wind Angle` double DEFAULT NULL,
  `True Wind Speed` double DEFAULT NULL,
  `Apparent Wind Speed` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hover_craft`
--

CREATE TABLE `hover_craft` (
  `id` int(3) NOT NULL,
  `customer` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hover_craft`
--

INSERT INTO `hover_craft` (`id`, `customer`, `name`) VALUES
(160, 'Hovertravel', 'Solent Flyer'),
(161, 'Hovertravel', 'Island Flyer');

-- --------------------------------------------------------

--
-- Table structure for table `pressure`
--

CREATE TABLE `pressure` (
  `journey_date` date NOT NULL,
  `journey_time` time NOT NULL,
  `hover_crafthull_ID` int(3) NOT NULL,
  `fwd C` double DEFAULT NULL,
  `aft C` double DEFAULT NULL,
  `aft B` double DEFAULT NULL,
  `port B` double DEFAULT NULL,
  `stbd B` double DEFAULT NULL,
  `fwd B` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_ID` int(3) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `Fname` varchar(30) NOT NULL,
  `Lname` varchar(30) NOT NULL,
  `isAdmin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users_hover_craft`
--

CREATE TABLE `users_hover_craft` (
  `usersuser_ID` int(3) NOT NULL,
  `hover_crafthull-ID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airmar`
--
ALTER TABLE `airmar`
  ADD PRIMARY KEY (`journey_date`,`journey_time`,`hover_crafthull_ID`),
  ADD KEY `FKairmar623627` (`hover_crafthull_ID`);

--
-- Indexes for table `ballast`
--
ALTER TABLE `ballast`
  ADD PRIMARY KEY (`journey_date`,`journey_time`,`hover_crafthull_ID`),
  ADD KEY `FKballast26886` (`hover_crafthull_ID`);

--
-- Indexes for table `battery`
--
ALTER TABLE `battery`
  ADD PRIMARY KEY (`journey_date`,`journey_time`,`hover_crafthull_ID`),
  ADD KEY `FKbattery396564` (`hover_crafthull_ID`);

--
-- Indexes for table `bearing`
--
ALTER TABLE `bearing`
  ADD PRIMARY KEY (`journey_date`,`journey_time`,`hover_crafthull-ID`),
  ADD KEY `FKbearing482642` (`hover_crafthull-ID`);

--
-- Indexes for table `craft`
--
ALTER TABLE `craft`
  ADD PRIMARY KEY (`journey_date`,`journey_time`,`hover_crafthull_ID`),
  ADD KEY `FKcraft234967` (`hover_crafthull_ID`);

--
-- Indexes for table `engine`
--
ALTER TABLE `engine`
  ADD PRIMARY KEY (`journey_date`,`journey_time`,`hover_crafthull_ID`),
  ADD KEY `FKengine820454` (`hover_crafthull_ID`);

--
-- Indexes for table `environment`
--
ALTER TABLE `environment`
  ADD PRIMARY KEY (`journey_date`,`journey_time`,`hover_crafthull-ID`),
  ADD KEY `FKenvironmen61273` (`hover_crafthull-ID`);

--
-- Indexes for table `hover_craft`
--
ALTER TABLE `hover_craft`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `pressure`
--
ALTER TABLE `pressure`
  ADD PRIMARY KEY (`journey_date`,`journey_time`,`hover_crafthull_ID`),
  ADD KEY `FKpressure399949` (`hover_crafthull_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `user_ID` (`user_ID`);

--
-- Indexes for table `users_hover_craft`
--
ALTER TABLE `users_hover_craft`
  ADD PRIMARY KEY (`usersuser_ID`,`hover_crafthull-ID`),
  ADD KEY `FKusers_hove826557` (`hover_crafthull-ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hover_craft`
--
ALTER TABLE `hover_craft`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `airmar`
--
ALTER TABLE `airmar`
  ADD CONSTRAINT `FKairmar623627` FOREIGN KEY (`hover_crafthull_ID`) REFERENCES `hover_craft` (`id`);

--
-- Constraints for table `ballast`
--
ALTER TABLE `ballast`
  ADD CONSTRAINT `FKballast26886` FOREIGN KEY (`hover_crafthull_ID`) REFERENCES `hover_craft` (`id`);

--
-- Constraints for table `battery`
--
ALTER TABLE `battery`
  ADD CONSTRAINT `FKbattery396564` FOREIGN KEY (`hover_crafthull_ID`) REFERENCES `hover_craft` (`id`);

--
-- Constraints for table `bearing`
--
ALTER TABLE `bearing`
  ADD CONSTRAINT `FKbearing482642` FOREIGN KEY (`hover_crafthull-ID`) REFERENCES `hover_craft` (`id`);

--
-- Constraints for table `craft`
--
ALTER TABLE `craft`
  ADD CONSTRAINT `FKcraft234967` FOREIGN KEY (`hover_crafthull_ID`) REFERENCES `hover_craft` (`id`);

--
-- Constraints for table `engine`
--
ALTER TABLE `engine`
  ADD CONSTRAINT `FKengine820454` FOREIGN KEY (`hover_crafthull_ID`) REFERENCES `hover_craft` (`id`);

--
-- Constraints for table `environment`
--
ALTER TABLE `environment`
  ADD CONSTRAINT `FKenvironmen61273` FOREIGN KEY (`hover_crafthull-ID`) REFERENCES `hover_craft` (`id`);

--
-- Constraints for table `pressure`
--
ALTER TABLE `pressure`
  ADD CONSTRAINT `FKpressure399949` FOREIGN KEY (`hover_crafthull_ID`) REFERENCES `hover_craft` (`id`);

--
-- Constraints for table `users_hover_craft`
--
ALTER TABLE `users_hover_craft`
  ADD CONSTRAINT `FKusers_hove556453` FOREIGN KEY (`usersuser_ID`) REFERENCES `users` (`user_ID`),
  ADD CONSTRAINT `FKusers_hove826557` FOREIGN KEY (`hover_crafthull-ID`) REFERENCES `hover_craft` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
