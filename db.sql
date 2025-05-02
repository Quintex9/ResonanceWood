SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE wood_types (
                            id INT AUTO_INCREMENT PRIMARY KEY,
                            name VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                            image VARCHAR(255) NOT NULL,
                            link VARCHAR(255) NOT NULL,
                            description TEXT NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

INSERT INTO wood_types ( `name`, image, link, description) VALUES
('Smrek','Images/smrek.jpg','smrek.php','Náš smrek je presne to, čo potrebujete pre dokonalú rezonanciu! Ľahký, pružný a s nádhernou akustikou – ideálny na výrobu rezonančných dosiek pre kvalitné hudobné nástroje.'),
('Jaseň','Images/jaseň.jpg','jasen.php','Hľadáte pevné a odolné drevo s výbornou odozvou? Náš jaseň je skvelou voľbou pre gitarové krky a telá.'),
('Jelša','Images/jelsa.jpg','jelsa.php','Jelša je tajnou ingredienciou mnohých ikonických elektrických gitár – a my vám prinášame tú najlepšiu kvalitu!'),
('Javor','Images/javor.png','javor.php','Náš javor je synonymom precíznosti a čistoty zvuku. Vďaka svojej hustote a tvrdosti je ideálny na hmatníky a kobylky.');


CREATE TABLE products (
                          id INT AUTO_INCREMENT PRIMARY KEY,
                          wood_type_id INT NOT NULL,
                          name VARCHAR(255) NOT NULL,
                          image VARCHAR(255),
                          price DECIMAL(10,2) NOT NULL,
                          rok  DECIMAL(10) NOT NULL,
                          FOREIGN KEY (wood_type_id) REFERENCES wood_types(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO products (wood_type_id, name, image, price, rok) VALUES
(1, 'Smrek pre violončelo', 'images/smrek1.jpg', 500,2000),
(1, 'Smrekové husle jednodielne', 'images/smrek2.jpg', 450, 1999),
(1, 'Smrek na kontrabas', 'images/smrek3.jpg', 850, 2011),
(1, 'Smrek Archtop', 'images/smrek4.jpg', 390, 2015);

INSERT INTO products (wood_type_id, name, image, price, rok) VALUES
(2, 'AX11 flambovaný jaseň na gitaru', 'images/jasen1.jpg', 710,2020),
(2, 'AX21 flambovaný jaseň na gitaru', 'images/jasen2.jpg', 820, 2024),
(2, 'EG1 flambovaný jaseň na gitaru', 'images/jasen3.jpg', 900, 2013);

INSERT INTO products (wood_type_id, name, image, price, rok) VALUES
(3, 'Flambovaná jelša gitara 25', 'images/jelsa1.jpg', 900,2020),
(3, 'Flambovaná jelša gitara 23', 'images/jelsa2.jpg', 1100,2020),
(3, 'Flambovaná jelša gitara 30', 'images/jelsa3.jpg', 550, 2024),
(3, 'Flambovaná jelša gitara 37', 'images/jelsa4.jpg', 980, 2013);

INSERT INTO products (wood_type_id, name, image, price, rok) VALUES
(4, 'Javorové drevo, Crazy tonewood', 'images/javor1.jpeg', 1400,2025),
(4, 'Javorové drevo, Husle', 'images/javor2.jpeg', 1200,2022),
(4, 'Javorové drevo, Husle', 'images/javor3.jpeg', 1440, 2022),
(4, 'Javorové drevo, Husle', 'images/javor4.jpeg', 980, 2012);

CREATE TABLE `users` (
                         `id` INT(11) NOT NULL AUTO_INCREMENT,
                         `name` VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                         `email` VARCHAR(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                         `password` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                         `role` INT(11) NOT NULL,
                         `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                         PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;


--
-- Sťahujem dáta pre tabuľku `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
                                                                                  (5, 'admin', 'admin@example.com', '$2y$10$D70SoY/KX7O0w2w/CJi97.JbqCJ1dwTP6F.w24sMBVFlrxSF8gSCC', 0, '2025-04-28 21:30:33'),
                                                                                  (6, 'user', 'user@example.com', '$2y$10$G2GzEDQtlA.32.FFiNyV1.uMgAxdD7jmm40jdNKFVrSSodTqLp2q2', 1, '2025-04-28 21:30:49');

CREATE TABLE `contact` (
                           `id` int(11) NOT NULL AUTO_INCREMENT,
                           `name` varchar(150) NOT NULL,
                           `phone` int(100) NOT NULL,
                           `email` varchar(150) NOT NULL,
                           `message` text NOT NULL,
                           PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `contact` (`id`, `name`,`phone`, `email`, `message`) VALUES
                                                             (1, 'michal', 0944425090,'michal.smatana@gmail.com', 'halo'),
                                                             (2, 'a', 0908157986,'a.a@gmail.com', 'a');
