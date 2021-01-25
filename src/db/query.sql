-- SQL for musickorong DB --

CREATE TABLE `Artist` 
( 
	`id` INT NOT NULL AUTO_INCREMENT , 
	`name` VARCHAR(100) NOT NULL , 
	PRIMARY KEY (`id`)
);

CREATE TABLE `Album` 
( 
	`id` INT NOT NULL AUTO_INCREMENT, 
	`artist_id` INT,
	`name` VARCHAR(50),
  `img` VARCHAR(250),
	PRIMARY KEY (`id`),
	FOREIGN KEY (`artist_id`) REFERENCES `Artist`(`id`)
);

CREATE TABLE `Product`
( 
	`prodNum` INT NOT NULL, 
	`format` VARCHAR(20),
	`condition` VARCHAR(5),
	`price` INT,
	`album_id` INT,
  `releaseDate` DATE,
	PRIMARY KEY (`prodNum`),
	FOREIGN KEY (album_id) REFERENCES `Album`(`id`)
);


INSERT INTO artist (`name`) VALUES
  ('Eminem'),
  ('Linkin Park'),
  ('Yelawolf');

INSERT INTO album (`artist_id`, `name`, `img`) VALUES
  (1, 'The Eminem Show', 'eminemShow.jpg'),
  (1, 'The Marshall Mathers LP', 'mmlp.jpg'),
  (1, 'Music To Be Murdered By', 'mtbmb.jpg'),
  (2, 'Hybrid Theory', 'hybridTheory.jpg'),
  (2, 'Living Things', 'livingThings.jpg'),
  (3, 'Trunk Muzik 0-60', 'trunkMuzik0-60.jpg'),
  (3, 'Love Story', 'loveStory.jpg');

INSERT INTO Product VALUES
  (775484, 'Vinyl LP', 'M', 8500, 8, '2002-05-05'),
  (548542, 'CD', 'NM', 6000, 8, '2002-05-05'),
  (458522, 'CD', 'M', 4000, 9, '2000-05-23'),
  (574888, 'Vinyl LP', 'M', 5900, 9, '2000-05-23'),
  (859422, 'Kazetta', 'VG+', 3000, 9, '2000-05-23'),
  (324585, 'Vinyl LP', 'M', 10800, 10, '2020-04-12'),
  (456422, 'CD', 'NM', 2950, 10, '2020-04-12'),
  (855652, 'Vinyl LP', 'M', 8950, 12, '2020-01-01'),
  (756222, 'Vinyl LP', 'M', 7600, 14, '2015-06-09');