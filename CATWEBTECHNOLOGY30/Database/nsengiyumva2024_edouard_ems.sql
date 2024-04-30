-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2024 at 01:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nsengiyumva2024_edouard_ems`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteEmployee` (IN `emp_id` INT)   BEGIN
    DELETE FROM Employee
    WHERE employee_id = emp_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteManager` (IN `mgr_id` INT)   BEGIN
    DELETE FROM Manager
    WHERE manager_id = mgr_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DisplayAllBanks` ()   BEGIN
    SELECT * FROM Bank;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DisplayAllDepartments` ()   BEGIN
    SELECT * FROM Department;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DisplayAllEmployees` ()   BEGIN
    SELECT * FROM Employee;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DisplayAllEmployers` ()   BEGIN
    SELECT * FROM Employer;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DisplayAllManagers` ()   BEGIN
    SELECT * FROM Manager;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DisplayAllRegisterInsurance` ()   BEGIN
    SELECT * FROM RegisterInsurance;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertBank` (IN `bank_name` VARCHAR(50), IN `account_number` VARCHAR(20), IN `branch_name` VARCHAR(50))   BEGIN
    INSERT INTO Bank (bank_name, account_number, branch_name)
    VALUES (bank_name, account_number, branch_name);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertDepartment` (IN `department_name` VARCHAR(50), IN `location` VARCHAR(50), IN `budget` DECIMAL(12,2))   BEGIN
    INSERT INTO Department (department_name, location, budget)
    VALUES (department_name, location, budget);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertEmployee` (IN `employee_name` VARCHAR(50), IN `department_id` INT, IN `manager_id` INT, IN `position` VARCHAR(50), IN `salary` DECIMAL(10,2), IN `date_of_hire` DATE)   BEGIN
    INSERT INTO Employee (employee_name, department_id, manager_id, position, salary, date_of_hire)
    VALUES (employee_name, department_id, manager_id, position, salary, date_of_hire);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertEmployer` (IN `employer_name` VARCHAR(50), IN `bank_id` INT, IN `contact_number` VARCHAR(15), IN `address` VARCHAR(100))   BEGIN
    INSERT INTO Employer (employer_name, bank_id, contact_number, address)
    VALUES (employer_name, bank_id, contact_number, address);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertManager` (IN `mgr_name` VARCHAR(50), IN `dept_id` INT, IN `mgr_salary` DECIMAL(10,2), IN `hire_date` DATE)   BEGIN
    INSERT INTO Manager (manager_name, department_id, salary, date_of_hire)
    VALUES (mgr_name, dept_id, mgr_salary, hire_date);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertRegisterInsurance` (IN `insurance_name` VARCHAR(50), IN `insurance_type` VARCHAR(50), IN `coverage_amount` DECIMAL(10,2))   BEGIN
    INSERT INTO RegisterInsurance (insurance_name, insurance_type, coverage_amount)
    VALUES (insurance_name, insurance_type, coverage_amount);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateEmployeeInfo` (IN `emp_id` INT, IN `new_employee_name` VARCHAR(50), IN `new_department_id` INT, IN `new_manager_id` INT, IN `new_position` VARCHAR(50), IN `new_salary` DECIMAL(10,2), IN `new_date_of_hire` DATE)   BEGIN
    UPDATE Employee
    SET
        employee_name = new_employee_name,
        department_id = new_department_id,
        manager_id = new_manager_id,
        position = new_position,
        salary = new_salary,
        date_of_hire = new_date_of_hire
    WHERE employee_id = emp_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateManagerInfo` (IN `mgr_id` INT, IN `new_manager_name` VARCHAR(50), IN `new_department_id` INT, IN `new_salary` DECIMAL(10,2), IN `new_date_of_hire` DATE)   BEGIN
    UPDATE Manager
    SET
        manager_name = new_manager_name,
        department_id = new_department_id,
        salary = new_salary,
        date_of_hire = new_date_of_hire
    WHERE manager_id = mgr_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ViewManagersWithHigherSalary` ()   BEGIN
    SELECT *
    FROM Manager
    WHERE salary > (
        SELECT AVG(salary)
        FROM Manager
    );
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `contact` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `email`, `username`, `password`, `contact`) VALUES
(1, 'Root', 'edouardnsengiyumva51@gmail.com', '$2y$10$lvjNyZbGTej0s', '0729364990'),
(4, 'Edouard NSENGIYUMVA', 'edouardnsengiyumva51@gmail.com', '$2y$10$hoFi2qT9S5QdC', '0780000120'),
(5, 'nsengiyumva', 'edouardnsengiyumva51@gmail.com', '$2y$10$Yz7mWyUQnHrTw', '0780000120'),
(6, 'Edouard', 'jean@gmail.com', '$2y$10$g.9zINN5Rb2X3', '0729364990'),
(7, 'edouardnsengiyumva@gmail.com', 'root', '$2y$10$sOu46dsAKOOAu', '0780000120'),
(8, 'edouardnsengiyumva51@gmail.com', 'root', '$2y$10$/J7amJV19187q', '0780000120'),
(9, 'nsengiyumva222001639@gmail.com', 'Edouard', '$2y$10$FMCIiXIm7PACD', '0780000120'),
(10, 'edouardnsengiyumva51@gmail.com', 'root', '$2y$10$/PpUGVLVxNxuB', '0780000120'),
(11, 'edouardnsengiyumva51@gmail.com', 'root', '$2y$10$WQ.uD5wKH4WLy', '0780000120'),
(12, 'edouardnsengiyumva51@gmail.com', 'root', '$2y$10$f43ZYyfiUeoEu', '0786407569'),
(13, 'edouardnsengiyumva51@gmail.com', 'jean', '1234', '0786407569'),
(14, 'edouardnsengiyumva51@gmail.com', 'Jean', '12345', '0780000120'),
(15, 'edouardnsengiyumva51@gmail.com', 'niyori', '$2y$10$Oe3tuUQ3zIGnI', '0780000120');

-- --------------------------------------------------------

--
-- Stand-in structure for view `all_information`
-- (See below for the actual view)
--
CREATE TABLE `all_information` (
`Table_Name` varchar(17)
,`ID` int(11)
,`employee_Name` varchar(50)
,`position` varchar(100)
,`salary` varchar(50)
,`date_of_hire` date
);

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `bank_id` int(11) NOT NULL,
  `bank_name` varchar(50) DEFAULT NULL,
  `account_number` varchar(20) DEFAULT NULL,
  `branch_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bank_id`, `bank_name`, `account_number`, `branch_name`) VALUES
(1, 'BK', 'BK0000888', 'MUSANZE'),
(2, 'equit', '0798765432', 'HUYE'),
(3, 'sacco GATARE', '0781595255', 'NYAMAGABE'),
(4, 'bk', '0791046216', 'KIGALI'),
(5, 'equit', '0798765432', 'HUYE'),
(6, 'sacco GATARE', '0781595255', 'NYAMAGABE');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(50) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `budget` decimal(12,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `location`, `budget`) VALUES
(1, 'Marketing', 'kigali', 50000.00),
(2, 'Sales', 'Musanze', 60000.00),
(3, 'IT', 'Ruhango', 70000.00),
(4, 'Marketing', 'kigali', 50000.00),
(5, 'Sales', 'Musanze', 60000.00),
(6, 'IT', 'Ruhango', 70000.00),
(7, 'umuhinzi', 'kigali', 12000000.00);

--
-- Triggers `department`
--
DELIMITER $$
CREATE TRIGGER `AfterDeletedepartment` AFTER DELETE ON `department` FOR EACH ROW BEGIN
  UPDATE club SET budget = budget - 1 WHERE department_id = department_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `employee_name` varchar(50) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `date_of_hire` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_name`, `department_id`, `manager_id`, `position`, `salary`, `date_of_hire`) VALUES
(2, 'Kazungu Roberts', 2, 5, 'Marketing Specialist', 4500.00, '2021-02-20'),
(3, 'NYIRAMANA Cloudine', 3, 5, 'xxxx', 1000000.00, '0000-00-00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `employee_to_delete`
-- (See below for the actual view)
--
CREATE TABLE `employee_to_delete` (
`employee_id` int(11)
,`employee_name` varchar(50)
,`department_id` int(11)
,`manager_id` int(11)
,`position` varchar(50)
,`salary` decimal(10,2)
,`date_of_hire` date
);

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `employer_id` int(11) NOT NULL,
  `employer_name` varchar(50) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `contact_number` varchar(15) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`employer_id`, `employer_name`, `bank_id`, `contact_number`, `address`) VALUES
(2, ' Makangu jean', 2, '+250780258391', 'Butare'),
(3, ' Mayira enock', 3, '+250785024661', 'Kamonyi'),
(4, 'kabugas', 3, '07800000876', 'mubuga'),
(5, ' Makangu jean', 2, '+250780258391', 'Butare'),
(6, ' Mayira enock', 3, '+250785024661', 'Kamonyi'),
(9, 'iradunda', 1, '078650000', 'huye'),
(10, 'koloneli', 1, '0780000000', 'kivuye'),
(11, 'koli', 2, '078888888888', 'kigali'),
(12, 'iradunda', 4, '078650000', 'huye');

-- --------------------------------------------------------

--
-- Stand-in structure for view `insert_bankrview`
-- (See below for the actual view)
--
CREATE TABLE `insert_bankrview` (
`bank_id` int(11)
,`bank_name` varchar(50)
,`account_number` varchar(20)
,`branch_name` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `insert_departmentrview`
-- (See below for the actual view)
--
CREATE TABLE `insert_departmentrview` (
`department_id` int(11)
,`department_name` varchar(50)
,`location` varchar(50)
,`budget` decimal(12,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `insert_employeerview`
-- (See below for the actual view)
--
CREATE TABLE `insert_employeerview` (
`employee_id` int(11)
,`employee_name` varchar(50)
,`department_id` int(11)
,`manager_id` int(11)
,`position` varchar(50)
,`salary` decimal(10,2)
,`date_of_hire` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `insert_employerrview`
-- (See below for the actual view)
--
CREATE TABLE `insert_employerrview` (
`employer_id` int(11)
,`employer_name` varchar(50)
,`bank_id` int(11)
,`contact_number` varchar(15)
,`address` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `insert_managerrview`
-- (See below for the actual view)
--
CREATE TABLE `insert_managerrview` (
`manager_id` int(11)
,`manager_name` varchar(50)
,`department_id` int(11)
,`salary` decimal(10,2)
,`date_of_hire` date
);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `manager_id` int(11) NOT NULL,
  `manager_name` varchar(50) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `date_of_hire` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`manager_id`, `manager_name`, `department_id`, `salary`, `date_of_hire`) VALUES
(4, 'John karara', 1, 5000.00, '2021-01-01'),
(5, 'leo kazi', 2, 6000.00, '2021-02-15'),
(6, ' Davis', 3, 5500.00, '2021-03-10'),
(7, 'John karara', 1, 5000.00, '2021-01-01'),
(8, 'leo kazi', 2, 6000.00, '2021-02-15'),
(9, ' Davis', 3, 5500.00, '2021-03-10'),
(12, 'kamana', 3, 1000000.00, '2024-04-27');

-- --------------------------------------------------------

--
-- Stand-in structure for view `manager_to_delete`
-- (See below for the actual view)
--
CREATE TABLE `manager_to_delete` (
`manager_id` int(11)
,`manager_name` varchar(50)
,`department_id` int(11)
,`salary` decimal(10,2)
,`date_of_hire` date
);

-- --------------------------------------------------------

--
-- Table structure for table `registerinsurance`
--

CREATE TABLE `registerinsurance` (
  `insurance_id` int(11) NOT NULL,
  `insurance_name` varchar(50) DEFAULT NULL,
  `insurance_type` varchar(50) DEFAULT NULL,
  `coverage_amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registerinsurance`
--

INSERT INTO `registerinsurance` (`insurance_id`, `insurance_name`, `insurance_type`, `coverage_amount`) VALUES
(1, 'Life Insurance', 'RAMA ', 100000.00),
(2, 'Auto Insurance', 'Comprehensive', 50000.00),
(3, 'Health Insurance', 'Family Coverage', 200000.00),
(4, 'RSB', 'RAMA', 12000000.00);

-- --------------------------------------------------------

--
-- Structure for view `all_information`
--
DROP TABLE IF EXISTS `all_information`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `all_information`  AS SELECT 'employee' AS `Table_Name`, `employee`.`employee_id` AS `ID`, `employee`.`employee_name` AS `employee_Name`, `employee`.`position` AS `position`, `employee`.`salary` AS `salary`, `employee`.`date_of_hire` AS `date_of_hire` FROM `employee`union all select 'manager' AS `manager`,`manager`.`manager_id` AS `manager_id`,`manager`.`manager_name` AS `manager_name`,`manager`.`salary` AS `salary`,`manager`.`date_of_hire` AS `date_of_hire`,NULL AS `NULL` from `manager` union all select 'employer' AS `employer`,`employer`.`employer_id` AS `employer_id`,`employer`.`contact_number` AS `contact_number`,`employer`.`address` AS `address`,NULL AS `NULL`,NULL AS `NULL` from `employer` union all select 'bank' AS `bank`,`bank`.`bank_id` AS `bank_id`,`bank`.`bank_name` AS `bank_name`,`bank`.`account_number` AS `account_number`,`bank`.`branch_name` AS `branch_name`,NULL AS `NULL` from `bank` union all select 'registerinsurance' AS `registerinsurance`,`registerinsurance`.`insurance_id` AS `insurance_id`,`registerinsurance`.`insurance_name` AS `insurance_name`,`registerinsurance`.`insurance_type` AS `insurance_type`,`registerinsurance`.`coverage_amount` AS `coverage_amount`,NULL AS `NULL` from `registerinsurance` union all select 'department' AS `department`,`department`.`department_id` AS `department_id`,`department`.`department_name` AS `department_name`,`department`.`location` AS `location`,`department`.`budget` AS `budget`,NULL AS `NULL` from `department`  ;

-- --------------------------------------------------------

--
-- Structure for view `employee_to_delete`
--
DROP TABLE IF EXISTS `employee_to_delete`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `employee_to_delete`  AS SELECT `employee`.`employee_id` AS `employee_id`, `employee`.`employee_name` AS `employee_name`, `employee`.`department_id` AS `department_id`, `employee`.`manager_id` AS `manager_id`, `employee`.`position` AS `position`, `employee`.`salary` AS `salary`, `employee`.`date_of_hire` AS `date_of_hire` FROM `employee` WHERE `employee`.`employee_id` = 33 ;

-- --------------------------------------------------------

--
-- Structure for view `insert_bankrview`
--
DROP TABLE IF EXISTS `insert_bankrview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `insert_bankrview`  AS SELECT `bank`.`bank_id` AS `bank_id`, `bank`.`bank_name` AS `bank_name`, `bank`.`account_number` AS `account_number`, `bank`.`branch_name` AS `branch_name` FROM `bank` WHERE `bank`.`bank_id` = 22 ;

-- --------------------------------------------------------

--
-- Structure for view `insert_departmentrview`
--
DROP TABLE IF EXISTS `insert_departmentrview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `insert_departmentrview`  AS SELECT `department`.`department_id` AS `department_id`, `department`.`department_name` AS `department_name`, `department`.`location` AS `location`, `department`.`budget` AS `budget` FROM `department` WHERE `department`.`department_id` = 11 ;

-- --------------------------------------------------------

--
-- Structure for view `insert_employeerview`
--
DROP TABLE IF EXISTS `insert_employeerview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `insert_employeerview`  AS SELECT `employee`.`employee_id` AS `employee_id`, `employee`.`employee_name` AS `employee_name`, `employee`.`department_id` AS `department_id`, `employee`.`manager_id` AS `manager_id`, `employee`.`position` AS `position`, `employee`.`salary` AS `salary`, `employee`.`date_of_hire` AS `date_of_hire` FROM `employee` WHERE `employee`.`employee_id` = 33 ;

-- --------------------------------------------------------

--
-- Structure for view `insert_employerrview`
--
DROP TABLE IF EXISTS `insert_employerrview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `insert_employerrview`  AS SELECT `employer`.`employer_id` AS `employer_id`, `employer`.`employer_name` AS `employer_name`, `employer`.`bank_id` AS `bank_id`, `employer`.`contact_number` AS `contact_number`, `employer`.`address` AS `address` FROM `employer` WHERE `employer`.`employer_id` = 99 ;

-- --------------------------------------------------------

--
-- Structure for view `insert_managerrview`
--
DROP TABLE IF EXISTS `insert_managerrview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `insert_managerrview`  AS SELECT `manager`.`manager_id` AS `manager_id`, `manager`.`manager_name` AS `manager_name`, `manager`.`department_id` AS `department_id`, `manager`.`salary` AS `salary`, `manager`.`date_of_hire` AS `date_of_hire` FROM `manager` WHERE `manager`.`manager_id` = 33 ;

-- --------------------------------------------------------

--
-- Structure for view `manager_to_delete`
--
DROP TABLE IF EXISTS `manager_to_delete`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `manager_to_delete`  AS SELECT `manager`.`manager_id` AS `manager_id`, `manager`.`manager_name` AS `manager_name`, `manager`.`department_id` AS `department_id`, `manager`.`salary` AS `salary`, `manager`.`date_of_hire` AS `date_of_hire` FROM `manager` WHERE `manager`.`manager_id` = 11 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `manager_id` (`manager_id`);

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`employer_id`),
  ADD KEY `bank_id` (`bank_id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`manager_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `registerinsurance`
--
ALTER TABLE `registerinsurance`
  ADD PRIMARY KEY (`insurance_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employer`
  MODIFY `employer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `manager_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `registerinsurance`
--
ALTER TABLE `registerinsurance`
  MODIFY `insurance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`manager_id`) REFERENCES `manager` (`manager_id`);

--
-- Constraints for table `employer`
--
ALTER TABLE `employer`
  ADD CONSTRAINT `employer_ibfk_1` FOREIGN KEY (`bank_id`) REFERENCES `bank` (`bank_id`);

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
