TRUNCATE TABLE Camara ;
TRUNCATE TABLE Video ;
TRUNCATE TABLE SegmentoVideo ;
TRUNCATE TABLE Local ;
TRUNCATE TABLE Vigia ;
TRUNCATE TABLE EventoEmergencia ;
TRUNCATE TABLE ProcessoSocorro ;
TRUNCATE TABLE EntidadeMeio ;
TRUNCATE TABLE Meio ;
TRUNCATE TABLE MeioCombate ;
TRUNCATE TABLE MeioApoio ;
TRUNCATE TABLE MeioSocorro ;
TRUNCATE TABLE Transporta ;
TRUNCATE TABLE Alocado ;
TRUNCATE TABLE Acciona ;
TRUNCATE TABLE Coordenador ;
TRUNCATE TABLE Audita ;
TRUNCATE TABLE Solicita ;


INSERT INTO Camara (numCamara) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36),
(37),
(38),
(39),
(40),
(41),
(42),
(43),
(44),
(45),
(46),
(47),
(48),
(49),
(50),
(51),
(52),
(53),
(54),
(55),
(56),
(57),
(58),
(59),
(60),
(61),
(62),
(63),
(64),
(65),
(66),
(67),
(68),
(69),
(70),
(71),
(72),
(73),
(74),
(75),
(76),
(77),
(78),
(79),
(80),
(81),
(82),
(83),
(84),
(85),
(86),
(87),
(88),
(89),
(90),
(91),
(92),
(93),
(94),
(95),
(96),
(97),
(98),
(99),
(100);

INSERT INTO Local (moradaLocal) VALUES
("local1"),
("local2"),
("local3"),
("local4"),
("local5"),
("local6"),
("local7"),
("local8"),
("local9"),
("local10"),
("local11"),
("local12"),
("local13"),
("local14"),
("local15"),
("local16"),
("local17"),
("local18"),
("local19"),
("local20"),
("local21"),
("local22"),
("local23"),
("local24"),
("local25"),
("local26"),
("local27"),
("local28"),
("local29"),
("local30"),
("local31"),
("local32"),
("local33"),
("local34"),
("local35"),
("local36"),
("local37"),
("local38"),
("local39"),
("local40"),
("local41"),
("local42"),
("local43"),
("local44"),
("local45"),
("local46"),
("local47"),
("local48"),
("local49"),
("local50"),
("local51"),
("local52"),
("local53"),
("local54"),
("local55"),
("local56"),
("local57"),
("local58"),
("local59"),
("local60"),
("local61"),
("local62"),
("local63"),
("local64"),
("local65"),
("local66"),
("local67"),
("local68"),
("local69"),
("local70"),
("local71"),
("local72"),
("local73"),
("local74"),
("local75"),
("local76"),
("local77"),
("local78"),
("local79"),
("local80"),
("local81"),
("local82"),
("local83"),
("local84"),
("local85"),
("local86"),
("local87"),
("local88"),
("local89"),
("local90"),
("local91"),
("local92"),
("local93"),
("local94"),
("local95"),
("local96"),
("local97"),
("local98"),
("local99"),
("local100");

INSERT INTO Vigia(moradaLocal,numCamara) VALUES
("local78", 18),
("local5", 44),
("local58", 57),
("local42", 28),
("local23", 3),
("local76", 31),
("local55", 12)
("local2", 24),
("local16", 47),
("local25", 43),
("local29", 4),
("local35", 62),
("local91", 41),
("local46", 90),
("local4", 24),
("local57", 90),
("local63", 67),
("local86", 83),
("local9", 17),
("local79", 77),
("local17", 58),
("local45", 98),
("local67", 20),
("local44", 71),
("local73", 13),
("local50", 11)
("local66", 22),
("local32", 78),
("local49", 77),
("local73", 49),
("local6", 80),
("local69", 61),
("local75", 98),
("local41", 64),
("local74", 6),
("local45", 55),
("local34", 37)
("local98", 60),
("local39", 42),
("local86", 79),
("local60", 78),
("local94", 56)
("local64", 56),
("local6", 7),
("local65", 4),
("local76", 69),
("local37", 14),
("local49", 69),
("local43", 13),
("local70", 71),
("local11", 15),
("local98", 88),
("local27", 82),
("local94", 16),
("local23", 79),
("local17", 34),
("local97", 7),
("local77", 64),
("local17", 33),
("local28", 93),
("local97", 46),
("local14", 15),
("local32", 61),
("local33", 23),
("local66", 88),
("local37", 60),
("local24", 57),
("local23", 6),
("local96", 5),
("local23", 28),
("local52", 51),
("local24", 48),
("local72", 19),
("local33", 8),
("local74", 30),
("local37", 21)
("local83", 14),
("local90", 75),
("local2", 19),
("local13", 1),
("local50", 17),
("local27", 50),
("local56", 93),
("local62", 32),
("local22", 70),
("local98", 99),
("local22", 12),
("local92", 66),
("local15", 49),
("local47", 4),
("local54", 43),
("local26", 85),
("local55", 31),
("local41", 69),
("local18", 55),
("local68", 55),
("local33", 42),
("local98", 63),
("local14", 17);
