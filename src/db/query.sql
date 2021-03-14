-- SQL for musickorong DB --

-- Adatbázis eldobása --
DROP DATABASE IF EXISTS musickorong;

-- Adatbázis létrehozása --
CREATE DATABASE musickorong
	CHARACTER SET utf8
	COLLATE utf8_hungarian_ci;

-- Táblák --
CREATE TABLE `Artist` 
( 
	`id` INT NOT NULL AUTO_INCREMENT , 
	`name` VARCHAR(100) NOT NULL , 
	PRIMARY KEY (`id`)
);
CREATE TABLE `Album` 
( 
	`id` INT NOT NULL AUTO_INCREMENT, 
	`artistId` INT,
	`title` VARCHAR(150),
  `category` INT,
  `cover` VARCHAR(250),
  `releaseDate` DATE,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`artistId`) REFERENCES `Artist`(`id`)
);
CREATE TABLE `Product`
( 
	`id` INT NOT NULL AUTO_INCREMENT, 
	`formatId` INT,
	`condition` VARCHAR(5),
	`price` INT,
	`albumId` INT,
  `description` VARCHAR(250) DEFAULT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (albumId) REFERENCES `Album`(`id`)
);
ALTER TABLE Product AUTO_INCREMENT = 10000;

CREATE TABLE `Tracklist`
( 
	`productId` INT, 
	`numberOfTrack` INT,
	`title` VARCHAR(150),
	`length` VARCHAR(50),
	FOREIGN KEY (productId) REFERENCES `Product`(`id`)
);
CREATE TABLE `User` 
( 
	`id` INT NOT NULL AUTO_INCREMENT, 
	`username` VARCHAR(25) NOT NULL,
  `email` VARCHAR(60) DEFAULT NULL,
	`password` VARCHAR(250) NOT NULL,
  `permission` VARCHAR(20) DEFAULT NULL,
	PRIMARY KEY (`id`)
);
CREATE TABLE `Format`
(
  `id` INT NOT NULL AUTO_INCREMENT,
  `format` VARCHAR(10),
  PRIMARY KEY (`id`)
);
CREATE TABLE `Category` 
( 
	`id` INT NOT NULL AUTO_INCREMENT, 
	`category` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`id`)
);
CREATE TABLE `Order` 
( 
	`orderId` INT NOT NULL, 
  `productId` INT NOT NULL,
  `quantity` INT NOT NULL
);
CREATE TABLE `OrderDetails` 
( 
	`id` INT NOT NULL AUTO_INCREMENT, 
  `userId` INT DEFAULT NULL,
  `name` VARCHAR(60),
  `phone` VARCHAR(20),
  `postcode` INT,
  `city` VARCHAR(60),
  `address` VARCHAR(60),
  `email` VARCHAR(60),
  `takeover` INT,
  `dateOfOrder` DATE,
  `status` VARCHAR(250),
  PRIMARY KEY (`id`)
);
CREATE TABLE `Takeover` 
( 
	`id` INT NOT NULL AUTO_INCREMENT, 
  `name` VARCHAR(120),
  PRIMARY KEY (`id`)
);

-- Adatok --
INSERT INTO artist (`name`) VALUES
  ('Bill Withers'),
  ('Eminem'),
  ('Linkin Park'),
  ('Yelawolf'),
  ('Eagles'),
  ('Kids See Ghosts'),
  ('Asaf Avidan'),
  ('Queen'),
  ('Joyner Lucas'),
  ('Gorillaz'),
  ('Eric Clapton'),
  ('Funktasztikus');

 INSERT INTO artist (`name`) VALUES
  ('Rolling Stones');

INSERT INTO album (`artistId`, `title`, `category`, `cover`, `releaseDate`) VALUES
  (1, 'Just As I Am', 3, 'justAsIAm.jpg', '1971-05-01'),
  (1, 'Still Bill', 3, '', '1972-05-01'),
  (2, 'The Eminem Show', 1, 'eminemShow.jpg', '2002-05-26'),
  (2, 'The Marshall Mathers LP', 1, 'mmlp.jpg', '2000-05-23'),
  (2, 'Music To Be Murdered By', 1, 'mtbmb.jpg', '2020-01-17'),
  (3, 'Hybrid Theory', 2, 'hybridTheory.jpg', '2000-10-24'),
  (3, 'Living Things', 2, 'livingThings.jpg', '2012-06-20'),
  (4, 'Trunk Muzik 0-60', 1, 'trunkMuzik0-60.jpg', '2010-01-01'),
  (4, 'Love Story', 1,'loveStory.jpg', '2015-04-21'),
  (5, 'Hotel California', 2,'hotelCalifornia.jpg', '1976-12-08'),
  (6, 'Kids See Ghosts', 1, 'kidsseeghosts.jpg', '2018-06-08'),
  (7, 'The Reckoning', 2, 'theReckoning.jpg', '2010-01-15'),
  (7, 'Gold Shadow', 2, 'goldShadow.jpg', '2015-01-12'),
  (8, 'A Night At The Opera', 2, 'Queen_A_Night_At_The_Opera.png', '1975-11-21'),
  (8, 'Greatest Hits II', 2, 'Queen_Greatest_Hits_2.png', '1991-10-28'),
  (8, 'The Miracle', 2, 'queenTheMiracle.jpg', '1989-05-22'),
  (9, 'ADHD', 1, 'Joyner_Lucas_ADHD.jpg', '2020-03-27'),
  (9, 'Evolution', 1, 'joyner-evolution.png', '2020-10-23'),
  (10, 'Demon Days', 2, 'gorillazDemonDays.jpg', '2008-05-23'),
  (10, 'Gorillaz', 2, 'GorillazAlbum.jpg', '2001-03-26'),
  (11, 'Slowhand', 2, 'EricClapton-Slowhand.jpg', '1977-11-25'),
  (12, 'Rezonancia avagy a próféta alvilági zarándoklata', 1, 'rezonanciaFunk.jpg', '2019-12-18'),
  (12, 'Táncdalok, Sanzonok, Melodrámák', 1, 'funktasztikus-tancdalok-sanzonok-melodramak-Cover-Art.png', '2011-10-01');

INSERT INTO album (`artistId`, `title`, `category`, `cover`, `releaseDate`) VALUES
  (13, 'Aftermath', 2, 'aftermath.jpg', '1966-04-15');

INSERT INTO Product (`formatId`, `condition`, `price`, `albumId`, `description`) VALUES
  (2, 'M', 8500, 1, NULL),
  (1, 'M', 3000, 1, NULL),
  (2, 'NM', 8500, 2, NULL),
  (2, 'M', 9875, 3, NULL),
  (2, 'NM', 7500, 3, NULL),
  (1, 'M', 5200, 3, NULL),
  (2, 'VG+', 7900, 4, NULL),
  (1, 'M', 4600, 4,NULL),
  (2, 'M', 8500, 5, 'Limited Edition, Red w/ Black Splatter, Alternate Cover'),
  (2, 'NM', 12500, 5, 'Deluxe edition'),
  (3, 'M', 7400, 5, NULL),
  (1, 'M', 4890, 5, NULL),
  (2, 'VG', 9400, 6, NULL),
  (1, 'M', 5000, 6, NULL),
  (2, 'M', 11900, 7, NULL),
  (1, 'M', 7400, 7, NULL),
  (2, 'M', 8500, 8, NULL),
  (1, 'M', 2700, 8, NULL),
  (2, 'NM', 7400, 9, NULL),
  (1, 'M', 4700, 9, NULL),
  (2, 'VG+', 4900, 10, NULL),
  (2, 'M', 6400, 11, NULL),
  (2, 'NM', 7400, 12, NULL),
  (2, 'M', 12700, 13, NULL),
  (2, 'NM', 2990, 14, NULL),
  (2, 'M', 8900, 14, NULL),
  (3, 'VG+', 4200, 14, NULL),
  (1, 'M', 5020, 14, NULL),
  (2, 'M', 8500, 15, NULL),
  (2, 'NM', 6400, 16, NULL),
  (2, 'M', 9700, 17, 'Limited Edition, Red Translucent'),
  (1, 'M', 4800, 17, NULL),
  (1, 'M', 5120, 18, NULL),
  (2, 'M', 8520, 19, NULL),
  (2, 'M', 7890, 20, NULL),
  (1, 'M', 4820, 20, NULL),
  (2, 'M', 6700, 21, NULL),
  (1, 'M', 4750, 22, NULL),
  (1, 'M', 6250, 23, NULL);

INSERT INTO Product (`formatId`, `condition`, `price`, `albumId`, `description`) VALUES
  (2, 'M', 8500, 24, 'Limited Edition, Reissue, Stereo');

INSERT INTO Format (`format`) VALUES 
('CD'),
('Vinyl LP'),
('Kazetta');

INSERT INTO `tracklist` (`productId`, `numberOfTrack`, `title`, `length`) VALUES 
(10001, 1, 'Harlem', '3:23'),
(10001, 2, 'Ain\'t No Sunshine', '2:04'),
(10001, 3, 'Grandma\'s Hand\'s', '2:00'),
(10001, 4, 'Sweet Wanomi', '2:30'),
(10001, 5, 'Everybody\'s Talkin\'', '3:21'),
(10001, 6, 'Do It Good', '2:52'),
(10001, 7, 'Hope She\'ll Be Happier', '3:48'),
(10001, 8, 'Let It Be', '2:37'),
(10001, 9, 'I\'m Her Daddy', '3:19'),
(10001, 10, 'In My Heart', '4:19'),
(10001, 11, 'Moanin\' and Groanin\'', '2:57'),
(10001, 12, 'Better Off Dead', '2:13');

INSERT INTO `tracklist` (`productId`, `numberOfTrack`, `title`, `length`) VALUES 
(10000, 1, 'Harlem', '3:23'),
(10000, 2, 'Ain\'t No Sunshine', '2:04'),
(10000, 3, 'Grandma\'s Hand\'s', '2:00'),
(10000, 4, 'Sweet Wanomi', '2:30'),
(10000, 5, 'Everybody\'s Talkin\'', '3:21'),
(10000, 6, 'Do It Good', '2:52'),
(10000, 7, 'Hope She\'ll Be Happier', '3:48'),
(10000, 8, 'Let It Be', '2:37'),
(10000, 9, 'I\'m Her Daddy', '3:19'),
(10000, 10, 'In My Heart', '4:19'),
(10000, 11, 'Moanin\' and Groanin\'', '2:57'),
(10000, 12, 'Better Off Dead', '2:13');

INSERT INTO `tracklist` (`productId`, `numberOfTrack`, `title`, `length`) VALUES 
(10008, 1, 'Permonition - Intro', '2:53'),
(10008, 2, 'Unaccommodating (feat. Young M.A)', '3:36'),
(10008, 3, 'You Gon\' Learn (feat. Royce Da 5\'9" & White Gold)', '3:54'),
(10008, 4, 'Alfred - Interlude', '0:30'),
(10008, 5, 'Those Kinda Nights (feat. Ed Sheeran)', '2:57'),
(10008, 6, 'In Too Deep', '3:14'),
(10008, 7, 'Godzilla (feat. Juice WRLD)', '3:30'),
(10008, 8, 'Darkness', '5:37'),
(10008, 9, 'Leaving Heaven (feat. Skylar Grey)', '4:25'),
(10008, 10, 'Yah Yah (feat. Royce Da 5\'9", Black Thought, Q-Tip & Denaun)', '4:46'),
(10008, 11, 'Stepdad - Intro', '0:15'),
(10008, 12, 'Stepdad', '3:33'),
(10008, 13, 'Marsh', '3:20'),
(10008, 14, 'Never Love Again', '2:57'),
(10008, 15, 'Little Engine', '2:57'),
(10008, 16, 'Lock It Up (feat. Anderson .Paak)', '2:50'),
(10008, 17, 'Farewell', '4:07'),
(10008, 18, 'No Regrets (feat. Don Toliver)', '3:20'),
(10008, 19, 'I WIll (feat. KXNG Crooked, Royce Da 5\'9" & Joell Ortiz)', '5:03'),
(10008, 20, 'Alfred - Outro', '0:39');

INSERT INTO `tracklist` (`productId`, `numberOfTrack`, `title`, `length`) VALUES 
(10009, 1, 'Alfred - Intro', '0:17'),
(10009, 2, 'Black Magic (feat. Skylar Grey)', '2:54'),
(10009, 3, 'Alfred\'s theme', '5:39'),
(10009, 4, 'Tone Deaf', '4:50'),
(10009, 5, 'Book of Rhymes (feat. DJ Premier)', '4:49'),
(10009, 6, 'Favorite Bitch (feat. Ty Dolla $ign)', '3:56'),
(10009, 7, 'Guns Blazing (feat. Dr. Dre & Sly Pyper)', '3:16'),
(10009, 8, 'Gnat', '3:44'),
(10009, 9, 'Higher', '3:42'),
(10009, 10, 'These Demons (feat. MAJ)', '3:27'),
(10009, 11, 'Key - Skit', '0:57'),
(10009, 12, 'She Loves Me', '3:24'),
(10009, 13, 'Killer', '3:15'),
(10009, 14, 'Zeus (feat. White Gold)', '3:50'),
(10009, 15, 'Thus Far - Interlude', '0:16'),
(10009, 16, 'Discombobulated', '4:12'),
(10009, 17, 'Permonition - Intro', '2:53'),
(10009, 18, 'Unaccommodating (feat. Young M.A)', '3:36'),
(10009, 19, 'You Gon\' Learn (feat. Royce Da 5\'9" & White Gold)', '3:54'),
(10009, 20, 'Alfred - Interlude', '0:30'),
(10009, 21, 'Those Kinda Nights (feat. Ed Sheeran)', '2:57'),
(10009, 22, 'In Too Deep', '3:14'),
(10009, 23, 'Godzilla (feat. Juice WRLD)', '3:30'),
(10009, 24, 'Darkness', '5:37'),
(10009, 25, 'Leaving Heaven (feat. Skylar Grey)', '4:25'),
(10009, 26, 'Yah Yah (feat. Royce Da 5\'9", Black Thought, Q-Tip & Denaun)', '4:46'),
(10009, 27, 'Stepdad - Intro', '0:15'),
(10009, 28, 'Stepdad', '3:33'),
(10009, 29, 'Marsh', '3:20'),
(10009, 30, 'Never Love Again', '2:57'),
(10009, 31, 'Little Engine', '2:57'),
(10009, 32, 'Lock It Up (feat. Anderson .Paak)', '2:50'),
(10009, 33, 'Farewell', '4:07'),
(10009, 34, 'No Regrets (feat. Don Toliver)', '3:20'),
(10009, 35, 'I WIll (feat. KXNG Crooked, Royce Da 5\'9" & Joell Ortiz)', '5:03'),
(10009, 36, 'Alfred - Outro', '0:39');

INSERT INTO `Category` (`category`) VALUES
('hiphop'),
('rock'),
('R&B');

INSERT INTO `Takeover` (`name`) VALUES
('Házhoz szállítás'),
('Személyes átvétel üzletünkben');