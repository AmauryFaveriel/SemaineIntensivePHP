USE `ok`;
CREATE TABLE `voitures` (
  `id` INT AUTO_INCREMENT NOT NULL,
  `marque` VARCHAR(50) NOT NULL,
  `modele` VARCHAR(50) NOT NULL,
  `couleur` VARCHAR(50) NOT NULL,
  `annee` INT NOT NULL,
  `gamme` VARCHAR(50) NOT NULL,
  `paysdorigine` VARCHAR(50) NOT NULL,
  `plaque` VARCHAR(15) NOT NULL,
  `kilometrage` INT NOT NULL,
  `nbrPossesseur` INT NOT NULL,
  `vendeur` VARCHAR(50) NOT NULL,
  `etat` VARCHAR(50) NOT NULL,
  `prix` INT NOT NULL,
  `img` VARCHAR(50) NOT NULL,
  PRIMARY KEY(`id`)
);


INSERT INTO
`ok`.`voitures` (`marque`, `modele`, `couleur`, `annee`, `gamme`, `paysdorigine`, `plaque`, `kilometrage`, `nbrPossesseur`, `vendeur`, `etat`, `prix`, `img`)
VALUES
('Fiat', '500', 'Rouge', '1968', '500-500C-595', 'france', 'AB-344-CA', '27133', '4', 'Dupont', 'occasion', '12000', 'FIAT 500.jpg'),
('MGD B', 'Roadster', 'bleu marine', '1990', 'classe C cabriolet-classe S cabriolet-SLC', 'allemagne', 'AA-725-AD', '31229', '2', 'Dunkerque', 'occasion', '70000', 'MGD B ROADSTER.jpg'),
('Volkswagen', 'Combi', 'jaune', '1947', 'polo-golf-up', 'allemagne', 'AA-123-AA', '12340', '3', 'Chapon', 'occasion', '25000', 'VOLSKWAGEN COMBI.jpg'),
('Porsche', '911', 'blanche', '1974', 'boxster-cayman-carreira', 'france', 'DE-307-SU', '21220', '3', 'Texeira', 'occasion', '60000', 'PORSCHE 911.jpg'),
('Buik', 'Riviera', 'taupe', '1977', 'century-regal-cascada', 'americain', 'AB-405-HG', '11243', '2', 'blok', 'occasion', '150000', 'BUIK RIVIERA.jpg'),
('Ferrari', '335 S', 'rouge', '1957', 'gtb-spider-lusso', 'italie', 'BL-654-LG', '7560', '1', 'Rossi', 'occasion', '140000', 'FERRARI 335 S.jpg'),
('Rolls Royce', 'Phantom', 'noir', '1975', 'camargue-corniche-shadow', 'anglais', 'AA-555-AA', '10144', '1', 'Blandford', 'occasion', '230000', 'ROLLS ROYCE PHANTOM.jpg');

CREATE TABLE `adminLogin` (
  `id` INT AUTO_INCREMENT NOT NULL,
  `login` VARCHAR(50) NOT NULL,
  `password` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO
`ok`.`adminLogin` (`login`, `password`)
VALUES
('admin', 'password');