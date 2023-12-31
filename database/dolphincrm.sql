DROP DATABASE IF EXISTS dolphincrm;
CREATE DATABASE dolphincrm;
USE dolphincrm;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `firstname` varchar(35) NOT NULL default '',
  `lastname` varchar(35) NOT NULL default '',
  `role` varchar(35) NOT NULL default '',
  `created_at` varchar(35) NOT NULL default '',
  `password` varchar(35) NOT NULL default '',
  `email` varchar(35) NOT NULL default '',
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4080 DEFAULT CHARSET=utf8mb4;


--
-- Mock data for `users`
--

INSERT INTO users (firstname, lastname, email, role, created_at)
VALUES
    ('Sophia', 'Anderson', 'sophia.anderson@example.com', 'user', '2023-11-27 08:00:00'),
    ('Liam', 'Garcia', 'liam.garcia@example.com', 'admin', '2023-11-27 09:15:00'),
    ('Emma', 'Martinez', 'emma.martinez@example.com', 'user', '2023-11-27 10:30:00'),
    ('Noah', 'Taylor', 'noah.taylor@example.com', 'admin', '2023-11-27 11:45:00'),
    ('Ava', 'Brown', 'ava.brown@example.com', 'user', '2023-11-27 12:30:00'),
    ('Isabella', 'Jones', 'isabella.jones@example.com', 'admin', '2023-11-27 13:15:00'),
    ('Jackson', 'Moore', 'jackson.moore@example.com', 'user', '2023-11-27 14:00:00'),
    ('Sophie', 'White', 'sophie.white@example.com', 'admin', '2023-11-27 15:15:00'),
    ('Daniel', 'Allen', 'daniel.allen@example.com', 'user', '2023-11-27 16:30:00'),
    ('Emily', 'Ward', 'emily.ward@example.com', 'user', '2023-11-27 17:45:00'),
    ('Mia', 'Turner', 'mia.turner@example.com', 'admin', '2023-11-27 18:30:00'),
    ('Alexander', 'King', 'alexander.king@example.com', 'user', '2023-11-27 19:15:00'),
    ('Ella', 'Baker', 'ella.baker@example.com', 'admin', '2023-11-27 20:00:00'),
    ('Oliver', 'Hill', 'oliver.hill@example.com', 'user', '2023-11-27 21:15:00'),
    ('Chloe', 'Wright', 'chloe.wright@example.com', 'admin', '2023-11-27 22:30:00'),
    ('Jacob', 'Cook', 'jacob.cook@example.com', 'user', '2023-11-27 23:45:00'),
    ('Aria', 'Fisher', 'aria.fisher@example.com', 'user', '2023-11-28 00:30:00'),
    ('Logan', 'Evans', 'logan.evans@example.com', 'admin', '2023-11-28 01:15:00'),
    ('Grace', 'Perez', 'grace.perez@example.com', 'user', '2023-11-28 02:00:00');



--
-- Table structure for table `contacts`
--



DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` int(11) NOT NULL auto_increment,
  `firstname` varchar(35) NOT NULL default '',
  `lastname` varchar(35) NOT NULL default '',
  `company` varchar(35) NOT NULL default '',
  `type` varchar(35) NOT NULL default '',
  `assigned_to` int(35) NOT NULL ,
  `created_by`  int(35) NOT NULL ,
  `created_on` DATETIME NOT NULL ,
  `updated_at` DATETIME NOT NULL ,
  `telephone` varchar(35) NOT NULL default '',
  `email` varchar(35) NOT NULL default '',
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4080 DEFAULT CHARSET=utf8mb4;


--
-- Mock data for `contacts`
--

INSERT INTO `contacts` (`firstname`, `lastname`, `company`, `type`, `assigned_to`, `created_by`, `created_on`, `updated_at`, `telephone`, `email`)
VALUES
    ('Eva', 'Miller', 'Tech Innovators', 'Client', 11, 12,'2023-12-02' ,'2023-12-02', '555-1111', 'eva.miller@example.com'),
    ('David', 'Clark', 'Data Solutions', 'Vendor', 13, 14,'2023-12-02' ,'2023-12-03', '555-2222', 'david.clark@example.com'),
    ('Grace', 'Taylor', 'Web Developers', 'Supplier', 15, 16,'2023-12-02' ,'2023-12-04', '555-3333', 'grace.taylor@example.com'),
    ('Oliver', 'White', 'Creative Minds', 'Partner', 17, 18,'2023-12-02' ,'2023-12-05', '555-4444', 'oliver.white@example.com'),
    ('Sophie', 'Anderson', 'Digital Services', 'Client', 19, 20,'2023-12-02' ,'2023-12-06', '555-5555', 'sophie.anderson@example.com'),
    ('Liam', 'Garcia', 'Tech Solutions', 'Vendor', 21, 22, '2023-12-02','2023-12-07', '555-6666', 'liam.garcia@example.com'),
    ('Ava', 'Brown', 'Innovate IT', 'Supplier', 23, 24, '2023-12-02','2023-12-08', '555-7777', 'ava.brown@example.com'),
    ('Logan', 'Evans', 'Data Insights', 'Partner', 25, 26, '2023-12-02','2023-12-09', '555-8888', 'logan.evans@example.com'),
    ('Chloe', 'Wright', 'Global Solutions', 'Client', 27, 28,'2023-12-02' ,'2023-12-10', '555-9999', 'chloe.wright@example.com'),
    ('Mia', 'Turner', 'Tech Innovators', 'Vendor', 29, 30, '2023-12-02','2023-12-11', '555-0000', 'mia.turner@example.com'),
    ('Jack', 'Perez', 'Creative Minds', 'Supplier', 31, 32,'2023-12-02' ,'2023-12-12', '555-1234', 'jack.perez@example.com'),
    ('Emma', 'Martinez', 'Web Developers', 'Partner', 33, 34,'2023-12-02' ,'2023-12-13', '555-5678', 'emma.martinez@example.com'),
    ('Noah', 'King', 'Data Solutions', 'Client', 35, 36, '2023-12-02','2023-12-14', '555-9876', 'noah.king@example.com'),
    ('Aria', 'Fisher', 'Tech Solutions', 'Vendor', 37, 38, '2023-12-02','2023-12-15', '555-5432', 'aria.fisher@example.com'),
    ('Jacob', 'Cook', 'Innovate IT', 'Supplier', 39, 40, '2023-12-02','2023-12-16', '555-8765', 'jacob.cook@example.com'),
    ('Sophia', 'Ward', 'Digital Services', 'Partner', 41, 42, '2023-12-02','2023-12-17', '555-9876', 'sophia.ward@example.com'),
    ('Ethan', 'Allen', 'Data Insights', 'Client', 43, 44,'2023-12-02' ,'2023-12-18', '555-7654', 'ethan.allen@example.com'),
    ('Avery', 'Parker', 'Global Solutions', 'Vendor', 45, 46, '2023-12-02','2023-12-19', '555-8765', 'avery.parker@example.com'),
    ('Lily', 'Turner', 'Tech Innovators', 'Supplier', 47, 48,'2023-12-02' ,'2023-12-20', '555-9876', 'lily.turner@example.com'),
    ('Jackson', 'Baker', 'Creative Minds', 'Partner', 49, 50,'2023-12-02' ,'2023-12-21', '555-5432', 'jackson.baker@example.com');

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
CREATE TABLE `notes` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_by` int(11) NOT NULL,
 `created_at` DATE NOT NULL DEFAULT '0000-00-00' '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4080 DEFAULT CHARSET=utf8mb4;

--
-- Mock data for `notes`
--

INSERT INTO `notes` (`contact_id`, `comment`, `created_by`, `created_at`) VALUES
(1, 'This is a sample note for contact 1.', 101, '2023-12-01 10:15:00'),
(2, 'A note about contact 2.', 102, '2023-12-02 12:30:00'),
(3, 'Reminder for contact 3.', 103, '2023-12-03 15:45:00'),
(1, 'Additional note for contact 1.', 104, '2023-12-04 08:00:00'),
(2, 'Important information for contact 2.', 105, '2023-12-05 09:30:00'),
(3, 'Follow-up task for contact 3.', 106, '2023-12-06 11:45:00');
