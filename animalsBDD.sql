
CREATE TABLE `type` (
  `num` smallint(6) NOT NULL auto_increment,
  `libelle` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=34 ;

INSERT INTO `type` VALUES (1, 'Chien');
INSERT INTO `type` VALUES (2, 'Chat');
INSERT INTO `type` VALUES (3, 'Lapin');
INSERT INTO `type` VALUES (4, 'Hamster');
INSERT INTO `type` VALUES (5, 'Cheval');

CREATE TABLE `animale` (
  `num` smallint(6) NOT NULL auto_increment,
  `nom` varchar(25) NOT NULL default '',
  `situation boolean not null default 0,
  `int_type` smallint(6) default NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(80) not null default 'images/images.jpg',
  PRIMARY KEY  (`num`),
  CONSTRAINT `animale_fk_1` FOREIGN KEY (`int_type`) REFERENCES type(`num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=34 ;

-- 
-- Contenu de la table `animale`
-- 

INSERT INTO `animale` VALUES (1, 'Doby', 0, 1, CURRENT_TIMESTAMP, 'images/poppy.jpg');
INSERT INTO `animale` VALUES (2, 'Shebby', 0, 2, CURRENT_TIMESTAMP, 'images/cat-blue-eyes.jpg');
INSERT INTO `animale` VALUES (3, 'Tolstoï', 0, 1, CURRENT_TIMESTAMP, 'images/608046b9058ef_chien_10-5283486.jpg');
INSERT INTO `animale` VALUES (4, 'Steinbeck', 0, 3,CURRENT_TIMESTAMP, 'images/caractere-lapin-065522.jpg' );
INSERT INTO `animale` VALUES (5, 'Ferro', 0, 4, CURRENT_TIMESTAMP, 'images/hamster-de-chine-084138-650-400.jpg');
INSERT INTO `animale` VALUES (6, 'Stocker', 1, 5, CURRENT_TIMESTAMP, 'images/accueillir-cheval-064246.jpg');
INSERT INTO `animale` VALUES (7, 'Shelley', 0, 1, CURRENT_TIMESTAMP, 'images/confinement-consequences-chiens-hd.jpg');
INSERT INTO `animale` VALUES (8, 'King', 0, 3,CURRENT_TIMESTAMP, 'images/comportement-lapin-nain.jpeg' );
INSERT INTO `animale` VALUES (9, 'Grass', 1, 1, CURRENT_TIMESTAMP, 'images/pop1.jpg');
INSERT INTO `animale` VALUES (10, 'Barjavel', 0, 4,CURRENT_TIMESTAMP, 'images/gettyimages-641028084-625x410.jpg' );
INSERT INTO `animale` VALUES (11, 'Simmons', 1, 3,CURRENT_TIMESTAMP, 'images/lapin-nain-074103-650-400.jpg' );
INSERT INTO `animale` VALUES (12, 'Herbert', 0, 3, CURRENT_TIMESTAMP, 'images/lapin-nain-bélier-1.jpeg');
INSERT INTO `animale` VALUES (13, 'Clarke', 0, 3, CURRENT_TIMESTAMP, 'images/lapin-tout-mignon-lapinou.jpg');










