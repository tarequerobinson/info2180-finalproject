DROP DATABASE IF EXISTS dolphincrm;
CREATE DATABASE dolphincrm;
USE dolphincrm;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `firstname` varchar(35) NOT NULL,
  `lastname` varchar(35) NOT NULL,
  `role` varchar(35) NOT NULL,
  `created_at` DATETIME NOT NULL,
  `password` varchar(255) NOT NULL, 
  `email` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4080 DEFAULT CHARSET=utf8mb4;



INSERT INTO `users` (`firstname`, `lastname`, `role`, `created_at`, `password`, `email`) VALUES
( 'John', 'Doe', 'admin', '2021-09-16 10:30:00', '$2y$10$ihlHAvXlLn3CDLqy4cZQwOQdsLTuSFY2VRYOcdPpc2ZyLK4B4pMja', 'john.doe@example.com'),
( 'Jane', 'Smith', 'user', '2021-09-16 11:30:00', '$2y$10$ywZsP0Cy23j0V0mjjLzBnu7NegMmJS8o/SwajQ7LfXsfbDztKXPCy', 'jane.smith@example.com'),
('Sam', 'Johnson', 'user', '2021-09-16 12:30:00', '$2y$10$76Nf9YI9QT1kLJVUfRfATueogOSaC313SoonY.DujAogwhXqNVlia', 'sam.johnson@example.com'),
('Sarah', 'Williams', 'user', '2021-09-16 13:30:00', '$2y$10$MfyxDYH5QQ4GtH0P0MIuhe.j98pji3pb.SNLuoJsroo1/CT4Wp0.2', 'sarah.williams@example.com');




DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(35) NOT NULL ,
  `firstname` varchar(35) NOT NULL ,
  `lastname` varchar(35) NOT NULL ,
  `company` varchar(35) NOT NULL ,
  `type` varchar(35) NOT NULL,
  `assigned_to` int(35) NOT NULL ,
  `created_by`  int(35) NOT NULL ,
  `created_on` DATETIME NOT NULL ,
  `updated_at` DATETIME NOT NULL ,
  `telephone` varchar(35) NOT NULL ,
  `email` varchar(35) NOT NULL ,
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4080 DEFAULT CHARSET=utf8mb4;


--
-- Mock data for `contacts`
--

INSERT INTO `contacts` ( `title`,`firstname`, `lastname`, `company`, `type`, `assigned_to`, `created_by`, `created_on`, `updated_at`, `telephone`, `email`)
VALUES
    ('Mr','Eva', 'Miller', 'Tech Innovators', 'Support', 4081, 4080,'2023-12-02' ,'2023-12-02', '555-1111', 'eva.miller@example.com'),
    ('Mr','David', 'Clark', 'Data Solutions', 'Sales Lead', 4082, 4085,'2023-12-02' ,'2023-12-03', '555-2222', 'david.clark@example.com'),
    ('Mr','Grace', 'Taylor', 'Web Developers', 'Supplier', 4081, 4085,'2023-12-02' ,'2023-12-04', '555-3333', 'grace.taylor@example.com'),
    ('Mr','Oliver', 'White', 'Creative Minds', 'Sales Lead', 4081, 4080,'2023-12-02' ,'2023-12-05', '555-4444', 'oliver.white@example.com'),
    ('Mr','Sophie', 'Anderson', 'Digital Services', 'Sales Lead', 4085, 4083,'2023-12-02' ,'2023-12-06', '555-5555', 'sophie.anderson@example.com'),
    ('Mr','Liam', 'Garcia', 'Tech Solutions', 'Sales Lead', 4086, 4085, '2023-12-02','2023-12-07', '555-6666', 'liam.garcia@example.com'),
    ('Mr','Ava', 'Brown', 'Innovate IT', 'Sales Lead', 4085, 4088, '2023-12-02','2023-12-08', '555-7777', 'ava.brown@example.com'),
    ( 'Mr','Logan', 'Evans', 'Data Insights', 'Support', 4086, 4083, '2023-12-02','2023-12-09', '555-8888', 'logan.evans@example.com'),
    ('Mr','Chloe', 'Wright', 'Global Solutions', 'Support', 4085, 4083,'2023-12-02' ,'2023-12-10', '555-9999', 'chloe.wright@example.com'),
    ('Mrs' ,'Mia', 'Turner', 'Tech Innovators', 'Support', 4086, 4085, '2023-12-02','2023-12-11', '555-0000', 'mia.turner@example.com'),
    ('Mrs','Jack', 'Perez', 'Creative Minds', 'Sales Lead', 4088, 4085,'2023-12-02' ,'2023-12-12', '555-1234', 'jack.perez@example.com'),
    ('Mrs','Emma', 'Martinez', 'Web Developers', 'Support', 4086, 4085,'2023-12-02' ,'2023-12-13', '555-5678', 'emma.martinez@example.com'),
    ('Mrs','Noah', 'King', 'Data Solutions', 'Sales Lead', 4085, 4088, '2023-12-02','2023-12-14', '555-9876', 'noah.king@example.com'),
    ('Mrs','Aria', 'Fisher', 'Tech Solutions', 'Support', 4086, 4088, '2023-12-02','2023-12-15', '555-5432', 'aria.fisher@example.com'),
    ('Mrs','Jacob', 'Cook', 'Innovate IT', 'Support', 4083, 4088, '2023-12-02','2023-12-16', '555-8765', 'jacob.cook@example.com'),
    ('Mrs','Sophia', 'Ward', 'Digital Services', 'Support', 4088, 4088, '2023-12-02','2023-12-17', '555-9876', 'sophia.ward@example.com'),
    ('Mrs','Ethan', 'Allen', 'Data Insights', 'Support', 4083, 4087,'2023-12-02' ,'2023-12-18', '555-7654', 'ethan.allen@example.com'),
    ('Mrs','Avery', 'Parker', 'Global Solutions', 'Sales Lead', 4086, 4087, '2023-12-02','2023-12-19', '555-8765', 'avery.parker@example.com'),
    ('Mrs','Lily', 'Turner', 'Tech Innovators', 'Sales Lead', 4083, 4088,'2023-12-02' ,'2023-12-20', '555-9876', 'lily.turner@example.com'),
    ('Mrs','Jackson', 'Baker', 'Creative Minds', 'Sales Lead', 4087, 4088,'2023-12-02' ,'2023-12-21', '555-5432', 'jackson.baker@example.com'),
    ('Mrs','Jack', 'Bake', 'Creative Minds', 'Support', 4087, 4088,'2023-12-02' ,'2023-12-21', '555-5432', 'jack.baker@example.com');

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
CREATE TABLE `notes` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` DATETIME NOT NULL ,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4080 DEFAULT CHARSET=utf8mb4;

--
-- Mock data for `notes`
--

INSERT INTO `notes` (`contact_id`, `comment`, `created_by`, `created_at`) VALUES
(4080, 'This is a sample note for contact 1.', 4081, '2023-12-01 10:15:00'),
(4080, 'A note about contact 2.', 4082, '2023-12-02 12:30:00'),
(4081, 'Reminder for contact 3.', 4083, '2023-12-03 15::00'),
(4084, 'Additional note for contact 1.', 4084, '2023-12-04 08:00:00'),
(4080, 'Important information for contact 2.', 4081, '2023-12-05 09:30:00'),
(4082, 'Follow-up task for contact 3.', 4083, '2023-12-06 11:45:00');

