SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- --------------------------------------------------------
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL, 
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- Dumping data for table `tbladmin`
INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 1234567890, 'test@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2021-01-01 05:38:23');

-- --------------------------------------------------------
-- Table structure for table `tblcategory`
CREATE TABLE `tblcategory` (
  `ID` int(10) NOT NULL,
  `VehicleCat` varchar(120) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- Dumping data for table `tblcategory`
INSERT INTO `tblcategory` (`ID`, `VehicleCat`, `CreationDate`) VALUES
(1, 'Four Wheeler', '2021-01-01 11:06:50'),
(2, 'Two Wheeler', '2021-01-01 11:03:09'),
(3, 'Heavy Duty Four Wheeler', '2021-01-01 11:31:17');

-- --------------------------------------------------------
-- Table structure for table `tblvehicle`
CREATE TABLE `tblvehicle` (
  `ID` int(10) NOT NULL,
  `ParkingNumber` varchar(120) DEFAULT NULL,
  `VehicleCategory` varchar(120) NOT NULL,
  `VehicleCompanyname` varchar(120) DEFAULT NULL,
  `RegistrationNumber` varchar(120) DEFAULT NULL,
  `OwnerName` varchar(120) DEFAULT NULL,
  `OwnerContactNumber` bigint(10) DEFAULT NULL,
  `InTime` timestamp NULL DEFAULT current_timestamp(),
  `OutTime` timestamp NULL DEFAULT NULL,
  `ParkingCharge` varchar(120) NOT NULL,
  `Remark` mediumtext NOT NULL,
  `Status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- Dumping data for table `tblvehicle`
INSERT INTO `tblvehicle` (`ID`, `ParkingNumber`, `VehicleCategory`, `VehicleCompanyname`, `RegistrationNumber`, `OwnerName`, `OwnerContactNumber`, `InTime`, `OutTime`, `ParkingCharge`, `Remark`, `Status`) VALUES
(1, '521796069', 'Two Wheeler', 'Hyundai', 'DEL-678787', 'Rakesh Chandra', 8956232528, '2021-03-05 05:58:38', '2021-03-09 11:09:36', '50 Rs', 'NA', 'Out'),
(2, '469052796', 'Two Wheeler', 'Activa', 'DEL-895623', 'Pankaj', 8989898989, '2021-03-06 08:58:38', '2021-03-08 11:09:33', '35 Rs', 'NA', 'Out'),
(3, '734465023', 'Four Wheeler', 'Hondacity', 'DEL-562389', 'Avinash', 7845123697, '2021-03-06 08:58:38', '2021-03-07 08:59:36', '50 Rs', 'Vehicle Out', 'Out'),
(4, '432190880', 'Two Wheeler', 'Hero Honda', 'DEL-451236', 'Harish', 2132654447, '2021-03-06 08:58:38', '2021-03-06 09:53:35', '35 Rs', 'Vehicle Out', 'Out'),
(5, '486258836', 'Two Wheeler', 'Honda Activa', 'DL 1C TY2322', 'Test User', 1234567890, '2021-03-03 11:32:02', '2021-03-03 11:32:42', '40 Rs', 'Vehicle Out', 'Out');

-- --------------------------------------------------------
--
-- Indexes for dumped tables

-- Indexes for table `tbladmin`
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

-- Indexes for table `tblcategory`
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`ID`);

-- Indexes for table `tblvehicle`
ALTER TABLE `tblvehicle`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--
-- AUTO_INCREMENT for table `tbladmin`
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

-- AUTO_INCREMENT for table `tblcategory`
ALTER TABLE `tblcategory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

  -- AUTO_INCREMENT for table `tblvehicle`
  ALTER TABLE `tblvehicle`
    MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
    

-- trigger to update OutTime

CREATE TRIGGER out_time_upd
BEFORE UPDATE ON `tblvehicle`
FOR EACH ROW
SET NEW.OutTime= current_timestamp(); 
COMMIT;