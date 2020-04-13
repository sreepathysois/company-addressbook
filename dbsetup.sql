--
-- Table structure for table `organisations`
--

CREATE TABLE `organisations` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `organisation` varchar(100) NOT NULL,
  `organisation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `organisations`
--
ALTER TABLE `organisations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organisation_id` (`organisation_id`),
  ADD KEY `organisation` (`organisation`);

--
-- AUTO_INCREMENT for table `organisations`
--
ALTER TABLE `organisations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--

--
-- Constraints for table `people`
--
ALTER TABLE `people`
  ADD CONSTRAINT `people_ibfk_2` FOREIGN KEY (`organisation`) REFERENCES `organisations` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `people_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
--
-- Dumping data for table `organisations`
--

INSERT INTO `organisations` (`id`, `name`, `email`) VALUES
(1, 'Bloomberg', 'blbrg@bloomberg.net'),
(2, 'Google', 'ggl@gmail.com'),
(3, 'Amazon', 'amazon@gmail.com'),
(4, 'AMD', 'amd@amd.com'),
(5, 'Intel', 'intel@intel.com');

-- --------------------------------------------------------


--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `name`, `phone`, `organisation`, `organisation_id`) VALUES
(2, 'Lamar Wolfe', '012449420', 'AMD', 4),
(4, 'Brian Mcpherson', '055 3322 4467', 'Google', 2),
(5, 'Drew Conner', '0801 652 2441', 'Amazon', 3),
(6, 'Austin Dickerson', '055 4990 9805', 'Intel', 5),
(7, 'Camden Mason', '07995 803810', 'Intel', 5),
(8, 'Ivor Goff', '055 3921 9696', 'Bloomberg', 1),
(9, 'Gannon Jacobson', '(01953) 71229', 'Bloomberg', 1),
(12, 'Connor Sharpe', '123456878', 'Bloomberg', 1),
(16, 'Jeremy Jones', '213321321', 'Amazon', 3);

