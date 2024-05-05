CREATE TABLE users (
    user_id INT AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    phone VARCHAR(20),
    PRIMARY KEY (user_id)
);

INSERT INTO users (username, email, phone) VALUES 
('yousuf', 'yousuf@gmail.com', '9736464'),
('ibrahim', 'ibrahim@gmail.com', '9333455'),
('ahmed', 'ahmed@gmail.com', '97364755'),
('Sarah', 'sarah@gmail.com', '9274644'),
('reem', 'reem@gmail.com',  '93478444'),
('mohammed', 'mohammed@gmail.com','93738433'),
('Bob', 'bob@gmail.com','73848493');


CREATE TABLE tickets (
    ticket_id INT AUTO_INCREMENT,
    user_id INT,
    race VARCHAR(100) NOT NULL,
    quantity INT NOT NULL,
    stand CHAR(1) NOT NULL,
    price FLOAT NOT NULL,
    PRIMARY KEY (ticket_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

INSERT INTO tickets (user_id, race, quantity, stand, price) VALUES 
(1, 'Bahrain Grand Prix', 2, 'A', 55.30),
(2, 'Monaco Grand Prix', 1, 'B', 27.65),
(3, 'Abu Dhabi Grand Prix', 3, 'C', 74.74),
(4, 'Silverstone Grand Prix', 4, 'A', 110.60),
(5, 'Imola Grand Prix', 1, 'B', 27.65),
(6, 'Spa Grand Prix', 2, 'C', 55.30),
(7, 'Monza Grand Prix', 3, 'A', 82.95);

CREATE TABLE `races` (
  `round` varchar(50) NOT NULL,
  `circuit` varchar(100) NOT NULL,
  `date` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `races` (`round`, `circuit`, `date`) VALUES
('Round 1', 'Bahrain International Circuit', '29 FEB - 02 MAR'),
('Round 2', 'Jedda Cornich Circuit, Saudi Arabia', '07 MAR - 09 MAR'),
('Round 3', 'Melbourne Grand Prix Circuit, Australia', '22 MAR - 24 MAR'),
('Round 4', 'Suzuka International Racing Course, Japan', '05 APR - 07 APR'),
('Round 5', 'Shanghai International Circuit, China', '19 APR - 21 APR'),
('Round 6', ' Miami International Autodrome, United States', '03 MAY - 06 MAY'),
('Round 7', 'Autodromo Enzo e Dino Ferrari, Italy', '17 MAY - 19 MAY'),
('Round 8', 'Circuit de Monaco, Monaco', '24 MAY - 26 MAY'),
('Round 9', 'Circuit Gilles-Villeneuve, Canada', '07 JUN - 09 JUN'),
('Round 10', 'Circuit de Barcelona-Catalunya, Spain', '21 JUN - 23 JUN'),
('Round 11', 'Red Bull Ring, Austria', '28 JUN - 30 JUN'),
(' Round 12', 'Silverstone Circuit, Great Britain', '05 JUL - 07 JUL'),
('Round 13', 'Hungaroring, Hungary', '19 JUL - 21 JUL'),
('Round 14', 'Circuit de Spa-Francorchamps, Belgium', '26 JUL - 28 JUL'),
('Round 15', ' Circuit Zandvoort, Netherlands', '23 AUG - 25 AUG'),
('Round 16', 'Autodromo Nazionale Monza, Italy', '30 AUG - 01 SEP'),
('Round 17', 'Baku City Circuit, Azerbaijan', '13 SEP - 15 SEP'),
('Round 18', 'Marina Bay Street Circuit, Singapore', '20 SEP - 22 SEP'),
('Round 19', 'Circuit of the Americas, United States', '18 OCT - 20 OCT'),
('Round 20', 'Autódromo Hermanos Rodríguez, Mexico', '25 OCT - 27 OCT'),
('Round 21', 'Autódromo José Carlos Pace, Brazil', '01 NOV - 03 NOV'),
('Round 22', 'Las Vegas Strip Circuit, United States', '21 NOV - 23 NOV'),
('Round 23', 'Lusail International Circuit, Qatar', '29 NOV - 01 DEC'),
('Round 24', 'Yas Marina Circuit, Abu Dhabi', '06 DEC - 08 DEC');
COMMIT;
