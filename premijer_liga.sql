--
-- Database: `premijer_liga`
--

-- --------------------------------------------------------

--
-- Table structure for table `arbitar`
--

CREATE TABLE `arbitar` (
  `id_arbitar` int(10) NOT NULL,
  `ime_arbitar` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prezime_arbitar` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `arbitar`
--

INSERT INTO `arbitar` (`id_arbitar`, `ime_arbitar`, `prezime_arbitar`) VALUES
(1, 'Goran', 'ParadÅ¾ik'),
(2, 'Irfan', 'Peljto'),
(3, 'Ognjen', 'ValiÄ‡'),
(4, 'Vladimir', 'Bjelica'),
(5, 'Zoran', 'GrbiÄ‡'),
(6, 'Edin', 'JakupoviÄ‡'),
(7, 'Dragan', 'PetroviÄ‡'),
(8, 'Adis', 'MulahasanoviÄ‡'),
(9, 'Darko', 'ObradoviÄ‡'),
(10, 'Antoni', 'BandiÄ‡'),
(11, 'Elvis', 'MujiÄ‡'),
(12, 'Admir', 'Å ehoviÄ‡'),
(13, 'Haris', 'Kaljanac'),
(14, 'Emir', 'SpahaliÄ‡'),
(15, 'Ermin', 'Sivac'),
(16, 'MiloÅ¡', 'GigoviÄ‡'),
(17, 'Tomislav', 'ÄŒuiÄ‡'),
(18, 'Dragan', 'SkakiÄ‡'),
(19, 'Zoran', 'SokniÄ‡'),
(20, 'Ilija', 'Å½ivkoviÄ‡'),
(21, 'Husein', 'TerziÄ‡'),
(22, 'Mateo', 'Musa');

-- --------------------------------------------------------

--
-- Table structure for table `dogadaj`
--

CREATE TABLE `dogadaj` (
  `id_dogadaj` int(10) NOT NULL,
  `utakmica_id` int(10) NOT NULL,
  `tip` varchar(50) NOT NULL,
  `igrac_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dogadaj`
--

INSERT INTO `dogadaj` (`id_dogadaj`, `utakmica_id`, `tip`, `igrac_id`) VALUES
(2, 3, 'gol', 10),
(3, 3, 'gol', 23),
(5, 1, 'gol', 77),
(14, 1, 'gol', 138),
(15, 1, 'gol', 132),
(16, 1, 'gol', 138),
(17, 2, 'gol', 57),
(18, 2, 'gol', 57),
(19, 2, 'gol', 52),
(20, 4, 'gol', 125),
(21, 4, 'gol', 146),
(22, 5, 'gol', 66),
(23, 5, 'gol', 117),
(24, 6, 'gol', 44),
(25, 6, 'gol', 42),
(26, 6, 'gol', 93),
(27, 7, 'gol', 146),
(28, 7, 'gol', 148),
(29, 8, 'gol', 10),
(30, 8, 'gol', 4),
(31, 9, 'gol', 122),
(32, 9, 'gol', 115),
(33, 10, 'gol', 93),
(34, 10, 'gol', 71),
(35, 10, 'gol', 76),
(36, 10, 'gol', 77),
(37, 11, 'gol', 19),
(38, 11, 'gol', 23),
(39, 12, 'gol', 67),
(40, 12, 'gol', 63),
(41, 12, 'gol', 55),
(42, 12, 'gol', 57),
(43, 13, 'gol', 50),
(44, 14, 'gol', 31),
(45, 14, 'gol', 80),
(46, 15, 'gol', 146),
(47, 15, 'gol', 146),
(48, 15, 'gol', 95),
(49, 15, 'gol', 93),
(50, 16, 'gol', 10),
(51, 16, 'gol', 24),
(52, 17, 'gol', 43),
(53, 17, 'gol', 43),
(54, 17, 'gol', 43),
(55, 17, 'gol', 36),
(56, 17, 'gol', 109),
(57, 18, 'gol', 127),
(58, 18, 'gol', 129),
(59, 18, 'gol', 129),
(60, 18, 'gol', 131),
(61, 18, 'gol', 131),
(62, 3, 'Å¾uti karton', 5),
(63, 3, 'Å¾uti karton', 10),
(64, 3, 'Å¾uti karton', 14),
(65, 3, 'Å¾uti karton', 23),
(66, 3, 'Å¾uti karton', 19),
(67, 5, 'crveni karton', 60),
(68, 5, 'Å¾uti karton', 59),
(69, 5, 'Å¾uti karton', 67);

-- --------------------------------------------------------

--
-- Table structure for table `igraci`
--

CREATE TABLE `igraci` (
  `id_igrac` int(10) NOT NULL,
  `ime_igrac` varchar(50) NOT NULL,
  `prezime_igrac` varchar(50) NOT NULL,
  `pozicija` varchar(30) NOT NULL,
  `broj` int(10) NOT NULL,
  `drzavljanstvo` varchar(50) NOT NULL,
  `klub_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `igraci`
--

INSERT INTO `igraci` (`id_igrac`, `ime_igrac`, `prezime_igrac`, `pozicija`, `broj`, `drzavljanstvo`, `klub_id`) VALUES
(1, 'Vedran', 'Kjosevski', 'golman', 13, 'BiH', 1),
(2, 'Kerim', 'Memija', 'bek', 6, 'BiH', 1),
(3, 'SiniÅ¡a', 'StevanoviÄ‡', 'bek', 2, 'Srbija', 1),
(4, 'Matteo', 'Boccaccini', 'Å¡toper', 4, 'Italija', 1),
(5, 'Aleksandar', 'KosoriÄ‡', 'Å¡toper', 5, 'BiH', 1),
(6, 'Jovan', 'BlagojeviÄ‡', 'vezni', 11, 'Srbija', 1),
(7, 'Miroslav', 'StevanoviÄ‡', 'krilo', 88, 'BiH', 1),
(8, 'Samir', 'BekriÄ‡', 'vezni', 10, 'BiH', 1),
(9, 'SrÄ‘an', 'StaniÄ‡', 'krilo', 16, 'BiH', 1),
(10, 'Ivan', 'LendriÄ‡', 'napadaÄ', 24, 'Hrvatska', 1),
(11, 'UgljeÅ¡a', 'RadinoviÄ‡', 'vezni', 25, 'Srbija', 1),
(12, 'Bojan', 'PavloviÄ‡', 'golman', 30, 'Srbija', 2),
(13, 'Almir', 'BekiÄ‡', 'bek', 19, 'BiH', 2),
(14, 'Advan', 'KaduÅ¡iÄ‡', 'bek', 3, 'BiH', 2),
(15, 'Marko', 'MihojeviÄ‡', 'Å¡toper', 16, 'BiH', 2),
(16, 'Adnan', 'KovaÄeviÄ‡', 'Å¡toper', 5, 'BiH', 2),
(17, 'Edin', 'RustemoviÄ‡', 'vezni', 4, 'BiH', 2),
(18, 'Samir', 'Radovac', 'vezni', 15, 'BiH', 2),
(19, 'Haris', 'DuljeviÄ‡', 'krilo', 7, 'BiH', 2),
(20, 'Nermin', 'CrnkiÄ‡', 'krilo', 9, 'BiH', 2),
(21, 'Amer', 'BekiÄ‡', 'napadaÄ', 33, 'BiH', 2),
(23, 'Mersudin', 'AhmetoviÄ‡', 'napadaÄ', 24, 'BiH', 2),
(24, 'Stevo', 'NikoliÄ‡', 'napadaÄ', 23, 'BiH', 1),
(25, 'Darko', 'MarkoviÄ‡', 'vezni', 8, 'Crna Gora', 1),
(26, 'Sandi', 'KriÅ¾man', 'napadaÄ', 80, 'Hrvatska', 1),
(27, 'SaÅ¡a', 'BaliÄ‡', 'Å¡toper', 14, 'Crna Gora', 2),
(28, 'SaÅ¡a', 'NovakoviÄ‡', 'Å¡toper', 6, 'Hrvatska', 2),
(29, 'Elvis', 'SariÄ‡', 'vezni', 8, 'BiH', 2),
(30, 'Anel', 'HebiboviÄ‡', 'krilo', 13, 'BiH', 2),
(31, 'Marko', 'Ä†etkoviÄ‡', 'vezni', 20, 'Crna Gora', 2),
(32, 'Dalibor', 'KoziÄ‡', 'golman', 30, 'BiH', 3),
(33, 'Pero', 'StojkiÄ‡', 'bek', 16, 'BiH', 3),
(34, 'Benjamin', 'ÄŒoliÄ‡', 'bek', 15, 'BiH', 3),
(35, 'Mario', 'BariÄ‡', 'bek', 9, 'Hrvatska', 3),
(36, 'Matija', 'Katanec', 'Å¡toper', 32, 'Hrvatska', 3),
(37, 'Oliver', 'Petrak', 'vezni', 25, 'Hrvatska', 3),
(38, 'Tomislav', 'TomiÄ‡', 'vezni', 7, 'BiH', 3),
(39, 'Ognjen', 'TodoroviÄ‡', 'krilo', 17, 'BiH', 3),
(40, 'Danijel', 'StojanoviÄ‡', 'bek', 20, 'Hrvatska', 3),
(41, 'Ivan', 'Peko', 'krilo', 4, 'Hrvatska', 3),
(42, 'Nemanja', 'Bilbija', 'napadaÄ', 99, 'BiH', 3),
(43, 'Jasmin', 'MeÅ¡anoviÄ‡', 'napadaÄ', 21, 'BiH', 3),
(44, 'Slobodan', 'JakovljeviÄ‡', 'Å¡toper', 27, 'Srbija', 3),
(45, 'MiloÅ¡', 'FilipoviÄ‡', 'vezni', 55, 'Srbija', 3),
(46, 'Kenan', 'PiriÄ‡', 'golman', 1, 'BiH', 4),
(47, 'Amer', 'OrdagiÄ‡', 'vezni', 19, 'BiH', 4),
(48, 'Samir', 'MerziÄ‡', 'Å¡toper', 28, 'BiH', 4),
(49, 'Asim', 'Zec', 'napadaÄ', 26, 'BiH', 4),
(50, 'Mladen', 'VeselinoviÄ‡', 'krilo', 27, 'BiH', 4),
(51, 'Nemanja', 'StepanoviÄ‡', 'vezni', 20, 'BiH', 4),
(52, 'Ivan', 'KostiÄ‡', 'Å¡toper', 3, 'Srbija', 4),
(53, 'Samir', 'EfendiÄ‡', 'bek', 8, 'BiH', 4),
(54, 'Aleksandar', 'SubiÄ‡', 'bek', 11, 'BiH', 4),
(55, 'Mahir', 'KariÄ‡', 'napadaÄ', 7, 'BiH', 4),
(56, 'Haris', 'MehmedagiÄ‡', 'Å¡toper', 17, 'BiH', 4),
(57, 'Sulejman', 'KrpiÄ‡', 'napadaÄ', 9, 'BiH', 4),
(58, 'Antonio', 'Soldo', 'golman', 23, 'BiH', 5),
(59, 'Boris', 'PandÅ¾a', 'Å¡toper', 5, 'BiH', 5),
(60, 'Zoran', 'PlazoniÄ‡', 'vezni', 8, 'Hrvatska', 5),
(61, 'Dino', 'Ä†oriÄ‡', 'bek', 7, 'BiH', 5),
(62, 'Jure', 'IvankoviÄ‡', 'vezni', 10, 'BiH', 5),
(63, 'Santos Lago', 'Wagner', 'vezni', 15, 'Brazil', 5),
(64, 'Ivan', 'Sesar', 'vezni', 19, 'BiH', 5),
(65, 'Luka', 'Menalo', 'krilo', 17, 'BiH', 5),
(66, 'Ivan', 'KrstanoviÄ‡', 'napadaÄ', 9, 'BiH', 5),
(67, 'Ivan', 'Baraban', 'krilo', 11, 'Hrvatska', 5),
(68, 'Stipo', 'MarkoviÄ‡', 'bek', 33, 'BiH', 5),
(69, 'Branislav', 'RuÅ¾iÄ‡', 'golman', 89, 'BiH', 6),
(70, 'Anes', 'HaurdiÄ‡', 'krilo', 8, 'BiH', 6),
(71, 'Semir', 'Pezer', 'vezni', 19, 'BiH', 6),
(72, 'Fenan', 'SalÄinoviÄ‡', 'vezni', 10, 'BiH', 6),
(73, 'Almir', 'Pliska', 'krilo', 23, 'BiH', 6),
(74, 'Bojan', 'MarkoviÄ‡', 'Å¡toper', 22, 'BiH', 6),
(75, 'Haris', 'HeÄ‡o', 'vezni', 20, 'BiH', 6),
(76, 'Marin', 'PopoviÄ‡', 'krilo', 7, 'BiH', 6),
(77, 'Danijal', 'BrkoviÄ‡', 'napadaÄ', 11, 'BiH', 6),
(78, 'Dino', 'HasanoviÄ‡', 'vezni', 6, 'BiH', 6),
(79, 'Goran', 'PopoviÄ‡', 'bek', 14, 'BiH', 6),
(80, 'Jasmin', 'Smriko', 'napadaÄ', 90, 'BiH', 6),
(83, 'Mladen', 'LuÄiÄ‡', 'golman', 1, 'BiH', 7),
(84, 'Ivan', 'JakovljeviÄ‡', 'Å¡toper', 4, 'Srbija', 7),
(85, 'Mladen', 'ZeljkoviÄ‡', 'bek', 12, 'Srbija', 7),
(86, 'Deni', 'SimeunoviÄ‡', 'krilo', 7, 'BiH', 7),
(87, 'Velibor', 'ÄuriÄ‡', 'vezni', 22, 'BiH', 7),
(88, 'Å evko', 'OkiÄ‡', 'napadaÄ', 25, 'BiH', 7),
(89, 'DuÅ¡an', 'MartinoviÄ‡', 'vezni', 6, 'Srbija', 7),
(90, 'Dejan', 'JankoviÄ‡', 'vezni', 17, 'Srbija', 7),
(91, 'Dino', 'BeÅ¡ireviÄ‡', 'vezni', 8, 'BiH', 7),
(92, 'Demir', 'Peco', 'krilo', 14, 'BiH', 7),
(93, 'Marko', 'ObradoviÄ‡', 'napadaÄ', 16, 'Srbija', 7),
(94, 'Stanko', 'OstojiÄ‡', 'krilo', 18, 'Srbija', 7),
(95, 'Jovo', 'KojiÄ‡', 'Å¡toper', 13, 'BiH', 7),
(96, 'Delimir', 'BajiÄ‡', 'Å¡toper', 21, 'BiH', 7),
(97, 'Dejan', 'BandoviÄ‡', 'golman', 1, 'BiH', 8),
(98, 'Rijad', 'Kobiljar', 'vezni', 8, 'BiH', 8),
(99, 'Mile', 'Pehar', 'krilo', 11, 'BiH', 8),
(100, 'Mario', 'Vrdoljak', 'vezni', 89, 'Hrvatska', 8),
(101, 'Sanjin', 'LeliÄ‡', 'krilo', 24, 'BiH', 8),
(102, 'Eldin', 'MaÅ¡iÄ‡', 'bek', 23, 'BiH', 8),
(103, 'Tarik', 'IsiÄ‡', 'Å¡toper', 20, 'BiH', 8),
(104, 'Sandi', 'ZulÄiÄ‡', 'bek', 14, 'BiH', 8),
(105, 'Adnan', 'OsmanoviÄ‡', 'napadaÄ', 11, 'BiH', 8),
(106, 'Armin', 'MahoviÄ‡', 'napadaÄ', 9, 'BiH', 8),
(107, 'Bojan', 'Regoje', 'Å¡toper', 6, 'BiH', 8),
(108, 'Amir', 'Zolj', 'Å¡toper', 33, 'BiH', 8),
(109, 'Emir', 'HadÅ¾iÄ‡', 'napadaÄ', 15, 'BiH', 8),
(110, 'David Samuel', 'Nwolokor', 'golman', 12, 'Nigerija', 9),
(111, 'Milan', 'MuminoviÄ‡', 'vezni', 8, 'BiH', 9),
(112, 'Zoran', 'Kokot', 'napadaÄ', 9, 'BiH', 9),
(113, 'Ivan', 'MamiÄ‡', 'krilo', 16, 'BiH', 9),
(114, 'Anel', 'DediÄ‡', 'vezni', 10, 'BiH', 9),
(115, 'Nermin', 'Varupa', 'vezni', 14, 'BiH', 9),
(116, 'Marko', 'JevtiÄ‡', 'Å¡toper', 5, 'Srbija', 9),
(117, 'Armin', 'Kapetan', 'vezni', 21, 'BiH', 9),
(118, 'Hrvoje', 'BariÅ¡iÄ‡', 'vezni', 19, 'Hrvatska', 9),
(119, 'Adnan', 'HadÅ¾iÄ‡', 'golman', 1, 'BiH', 10),
(120, 'Anel', 'HusiÄ‡', 'napadaÄ', 7, 'BiH', 10),
(121, 'Aladin', 'IsakoviÄ‡', 'Å¡toper', 99, 'BiH', 10),
(122, 'Mirza', 'RizvanoviÄ‡', 'bek', 20, 'BiH', 10),
(123, 'Aladin', 'Å iÅ¡iÄ‡', 'vezni', 10, 'BiH', 10),
(124, 'Dejan', 'MaksimoviÄ‡', 'krilo', 21, 'BiH', 10),
(125, 'Sinan', 'RamoviÄ‡', 'krilo', 77, 'BiH', 10),
(126, 'Neven', 'LaÅ¡tro', 'Å¡toper', 5, 'Hrvatska', 10),
(127, 'Nemanja', 'AsanoviÄ‡', 'napadaÄ', 9, 'Crna Gora', 10),
(128, 'MiÄ‡o', 'KuzmanoviÄ‡', 'napadaÄ', 11, 'BiH', 10),
(129, 'Goran', 'BrkiÄ‡', 'vezni', 29, 'Srbija', 10),
(130, 'Nevres', 'FejziÄ‡', 'golman', 1, 'BiH', 11),
(131, 'Aleksandar', 'RaduloviÄ‡', 'vezni', 24, 'BiH', 11),
(132, 'NebojÅ¡a', 'PopoviÄ‡', 'napadaÄ', 77, 'Hrvatska', 11),
(133, 'Danijel', 'RaÅ¡iÄ‡', 'bek', 22, 'Hrvatska', 11),
(134, 'Sulejman', 'SmajiÄ‡', 'krilo', 11, 'BiH', 11),
(135, 'Stefan', 'SmiljaniÄ‡', 'krilo', 23, 'Slovenija', 11),
(136, 'Mirza', 'KovaÄ', 'krilo', 9, 'BiH', 11),
(137, 'Toni', 'Pezo', 'vezni', 31, 'Hrvatska', 11),
(138, 'SiniÅ¡a', 'DujakoviÄ‡', 'bek', 18, 'BiH', 11),
(139, 'Mladen', 'IliÄ‡', 'golman', 1, 'BiH', 12),
(140, 'Irfan', 'JaÅ¡areviÄ‡', 'vezni', 6, 'BiH', 12),
(141, 'Ajdin', 'RedÅ¾iÄ‡', 'vezni', 4, 'BiH', 12),
(142, 'Zoran', 'MilutinoviÄ‡', 'vezni', 13, 'BiH', 12),
(143, 'UroÅ¡', 'MirkoviÄ‡', 'vezni', 88, 'Srbija', 12),
(144, 'Nikola', 'DujakoviÄ‡', 'vezni', 10, 'BiH', 12),
(145, 'Miljan', 'LjubenoviÄ‡', 'krilo', 8, 'Slovenija', 12),
(146, 'Elvir', 'KoljiÄ‡', 'napadaÄ', 7, 'BiH', 12),
(147, 'SaÅ¡a', 'Kajkut', 'napadaÄ', 12, 'BiH', 12),
(148, 'Ozren', 'PeriÄ‡', 'napadaÄ', 9, 'BiH', 12),
(149, 'Zoran', 'MaruÅ¡iÄ‡', 'vezni', 52, 'Srbija', 12);

-- --------------------------------------------------------

--
-- Table structure for table `klub`
--

CREATE TABLE `klub` (
  `id_klub` int(10) NOT NULL,
  `naziv` varchar(50) NOT NULL,
  `god_osnivanja` year(4) NOT NULL,
  `grad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `klub`
--

INSERT INTO `klub` (`id_klub`, `naziv`, `god_osnivanja`, `grad`) VALUES
(1, 'FK Å½eljezniÄar', 1921, 'Sarajevo'),
(2, 'FK Sarajevo', 1946, 'Sarajevo'),
(3, 'HÅ K Zrinjski', 1905, 'Mostar'),
(4, 'FK Sloboda', 1919, 'Tuzla'),
(5, 'NK Å iroki Brijeg', 1948, 'Å iroki Brijeg'),
(6, 'NK ÄŒelik', 1945, 'Zenica'),
(7, 'FK Radnik', 1945, 'Bijeljina'),
(8, 'FK Olimpic', 1993, 'Sarajevo'),
(9, 'NK Vitez', 1947, 'Vitez'),
(10, 'FK Mladost', 1959, 'Doboj-Kakanj'),
(11, 'NK Metalleghe BSI', 2009, 'Jajce'),
(12, 'FK Krupa', 1983, 'Krupa na Vrbasu');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id_korisnik` int(10) NOT NULL,
  `naziv_korisnik` varchar(50) NOT NULL,
  `pass_korisnik` varchar(50) NOT NULL,
  `email_korisnik` varchar(100) NOT NULL,
  `klub_id` int(10) NOT NULL,
  `tip_korisnika` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id_korisnik`, `naziv_korisnik`, `pass_korisnik`, `email_korisnik`, `klub_id`, `tip_korisnika`) VALUES
(1, 'emir', '1234', 'emir-bender@hotmail.com', 1, 1),
(3, 'test', '1234', 'testtest@test', 4, 0),
(4, 'samel', '1234', 'saammeell@hotmail.com', 1, 0),
(5, 'kemo', '1234', 'emir-bender@hotmai.com', 12, 0);

-- --------------------------------------------------------

--
-- Table structure for table `trener`
--

CREATE TABLE `trener` (
  `id_trener` int(10) NOT NULL,
  `trener_ime` varchar(50) NOT NULL,
  `trener_prezime` varchar(50) NOT NULL,
  `klub_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trener`
--

INSERT INTO `trener` (`id_trener`, `trener_ime`, `trener_prezime`, `klub_id`) VALUES
(1, 'Mehmed', 'JanjoÅ¡', 2),
(2, 'Slavko', 'PetroviÄ‡', 1),
(3, 'Vinko', 'MarinoviÄ‡', 3),
(4, 'Vlado', 'JagodiÄ‡', 4),
(5, 'Denis', 'Ä†oriÄ‡', 5),
(6, 'Nedim', 'JusufbegoviÄ‡', 6),
(7, 'NebojÅ¡a', 'MiloÅ¡eviÄ‡', 7),
(8, 'Faruk', 'KuloviÄ‡', 8),
(9, 'Slaven', 'Musa', 9),
(10, 'Husref', 'MusemiÄ‡', 10),
(11, 'Mato', 'Neretljak', 11),
(12, 'Slobodan', 'StarÄeviÄ‡', 12);

-- --------------------------------------------------------

--
-- Table structure for table `utakmica`
--

CREATE TABLE `utakmica` (
  `id_utakmica` int(10) NOT NULL,
  `odigrana` tinyint(1) NOT NULL,
  `datum` date NOT NULL,
  `kolo` int(10) NOT NULL,
  `gol_dom` int(10) DEFAULT NULL,
  `gol_gost` int(10) DEFAULT NULL,
  `domacin_id` int(10) NOT NULL,
  `gost_id` int(10) NOT NULL,
  `arbitar_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utakmica`
--

INSERT INTO `utakmica` (`id_utakmica`, `odigrana`, `datum`, `kolo`, `gol_dom`, `gol_gost`, `domacin_id`, `gost_id`, `arbitar_id`) VALUES
(1, 1, '2016-07-23', 1, 1, 3, 6, 11, 1),
(2, 1, '2016-07-23', 1, 3, 0, 4, 8, 2),
(3, 1, '2016-07-23', 1, 1, 1, 1, 2, 3),
(4, 1, '2016-07-24', 1, 1, 1, 12, 10, 4),
(5, 1, '2016-07-24', 1, 1, 1, 5, 9, 5),
(6, 1, '2016-07-24', 1, 2, 1, 3, 7, 6),
(7, 1, '2016-07-30', 2, 0, 2, 11, 12, 1),
(8, 1, '2016-07-30', 2, 0, 2, 8, 1, 2),
(9, 1, '2016-07-30', 2, 1, 1, 9, 10, 3),
(10, 1, '2016-07-31', 2, 2, 3, 7, 6, 4),
(11, 1, '2016-07-31', 2, 2, 0, 2, 3, 5),
(12, 1, '2016-07-31', 2, 2, 2, 5, 4, 6),
(13, 1, '2016-08-05', 3, 1, 0, 4, 9, 1),
(14, 1, '2016-08-06', 3, 1, 1, 6, 2, 2),
(15, 1, '2016-08-06', 3, 2, 2, 12, 7, 3),
(16, 1, '2016-08-06', 3, 2, 0, 1, 5, 4),
(17, 1, '2016-08-06', 3, 4, 1, 3, 8, 5),
(18, 1, '2016-08-07', 3, 3, 2, 10, 11, 6),
(19, 1, '2016-08-10', 4, 3, 0, 8, 6, 1),
(20, 1, '2016-08-10', 4, 1, 0, 9, 11, 2),
(21, 1, '2016-08-10', 4, 0, 0, 7, 10, 3),
(22, 1, '2016-08-10', 4, 3, 2, 2, 12, 4),
(23, 1, '2016-08-10', 4, 2, 0, 4, 1, 5),
(24, 1, '2016-08-10', 4, 1, 1, 5, 3, 6),
(25, 1, '2016-08-13', 5, 2, 0, 12, 8, 1),
(26, 1, '2016-08-13', 5, 0, 0, 10, 2, 2),
(27, 1, '2016-08-13', 5, 0, 1, 6, 5, 3),
(28, 1, '2016-08-13', 5, 2, 0, 3, 4, 4),
(29, 1, '2016-08-14', 5, 1, 2, 11, 7, 5),
(30, 1, '2016-08-14', 5, 0, 2, 1, 9, 6),
(31, 1, '2016-08-20', 6, 2, 3, 8, 10, 1),
(32, 1, '2016-08-20', 6, 2, 0, 4, 6, 2),
(33, 1, '2016-08-20', 6, 0, 1, 1, 3, 3),
(34, 1, '2016-08-21', 6, 1, 4, 9, 7, 4),
(35, 1, '2016-08-21', 6, 3, 1, 5, 12, 5),
(36, 1, '2016-08-22', 6, 1, 2, 2, 11, 6),
(37, 0, '2016-08-27', 7, 0, 0, 11, 8, 1),
(38, 0, '2016-08-27', 7, 0, 0, 12, 4, 2),
(39, 0, '2016-08-27', 7, 0, 0, 7, 2, 3),
(40, 0, '2016-08-27', 7, 0, 0, 6, 1, 4),
(41, 0, '2016-08-27', 7, 0, 0, 3, 9, 5),
(42, 0, '2016-08-28', 7, 0, 0, 10, 5, 6),
(43, 0, '2016-09-10', 8, 0, 0, 3, 6, 1),
(44, 0, '2016-09-10', 8, 0, 0, 1, 12, 2),
(45, 0, '2016-09-11', 8, 0, 0, 8, 7, 3),
(46, 0, '2016-09-11', 8, 0, 0, 9, 2, 4),
(47, 0, '2016-09-11', 8, 0, 0, 4, 10, 5),
(48, 0, '2016-09-11', 8, 0, 0, 5, 11, 6),
(49, 0, '2016-09-17', 9, 0, 0, 10, 1, 1),
(50, 0, '2016-09-17', 9, 0, 0, 6, 9, 2),
(51, 0, '2016-09-17', 9, 0, 0, 12, 3, 3),
(52, 0, '2016-09-17', 9, 0, 0, 7, 5, 4),
(53, 0, '2016-09-18', 9, 0, 0, 11, 4, 5),
(54, 0, '2016-09-18', 9, 0, 0, 2, 8, 6),
(55, 0, '2016-09-24', 10, 0, 0, 9, 8, 1),
(56, 0, '2016-09-24', 10, 0, 0, 4, 7, 2),
(57, 0, '2016-09-24', 10, 0, 0, 6, 12, 3),
(58, 0, '2016-09-24', 10, 0, 0, 3, 10, 4),
(59, 0, '2016-09-25', 10, 0, 0, 1, 11, 5),
(60, 0, '2016-09-25', 10, 0, 0, 5, 2, 6),
(61, 0, '2016-09-30', 11, 0, 0, 10, 6, 1),
(62, 0, '2016-10-01', 11, 0, 0, 2, 4, 2),
(63, 0, '2016-10-01', 11, 0, 0, 8, 5, 3),
(64, 0, '2016-10-01', 11, 0, 0, 12, 9, 4),
(65, 0, '2016-10-01', 11, 0, 0, 7, 1, 5),
(66, 0, '2016-10-01', 11, 0, 0, 11, 3, 6),
(67, 0, '2016-10-15', 12, 0, 0, 8, 4, 1),
(68, 0, '2016-10-15', 12, 0, 0, 9, 5, 2),
(69, 0, '2016-10-15', 12, 0, 0, 7, 3, 3),
(70, 0, '2016-10-15', 12, 0, 0, 11, 6, 4),
(71, 0, '2016-10-15', 12, 0, 0, 10, 12, 5),
(72, 0, '2016-10-16', 12, 0, 0, 2, 1, 6),
(73, 0, '2016-10-22', 13, 0, 0, 10, 9, 1),
(74, 0, '2016-10-22', 13, 0, 0, 12, 11, 2),
(75, 0, '2016-10-22', 13, 0, 0, 4, 5, 3),
(76, 0, '2016-10-22', 13, 0, 0, 3, 2, 4),
(77, 0, '2016-10-22', 13, 0, 0, 1, 8, 5),
(78, 0, '2016-10-23', 13, 0, 0, 6, 7, 6),
(79, 0, '2016-10-29', 14, 0, 0, 11, 10, 1),
(80, 0, '2016-10-29', 14, 0, 0, 9, 4, 2),
(81, 0, '2016-10-29', 14, 0, 0, 8, 3, 3),
(82, 0, '2016-10-29', 14, 0, 0, 7, 12, 4),
(83, 0, '2016-10-30', 14, 0, 0, 2, 6, 5),
(84, 0, '2016-10-30', 14, 0, 0, 5, 1, 6),
(85, 0, '2016-11-05', 15, 0, 0, 11, 9, 1),
(86, 0, '2016-11-05', 15, 0, 0, 12, 2, 2),
(87, 0, '2016-11-05', 15, 0, 0, 3, 5, 3),
(88, 0, '2016-11-05', 15, 0, 0, 1, 4, 4),
(89, 0, '2016-11-06', 15, 0, 0, 6, 8, 5),
(90, 0, '2016-11-06', 15, 0, 0, 10, 7, 6),
(91, 0, '2016-11-19', 16, 0, 0, 9, 1, 1),
(92, 0, '2016-11-19', 16, 0, 0, 4, 3, 2),
(93, 0, '2016-11-19', 16, 0, 0, 7, 11, 3),
(94, 0, '2016-11-20', 16, 0, 0, 8, 12, 4),
(95, 0, '2016-11-20', 16, 0, 0, 2, 10, 5),
(96, 0, '2016-11-20', 16, 0, 0, 5, 6, 6),
(97, 0, '2016-11-26', 17, 0, 0, 7, 9, 1),
(98, 0, '2016-11-26', 17, 0, 0, 12, 5, 2),
(99, 0, '2016-11-26', 17, 0, 0, 6, 4, 3),
(100, 0, '2016-11-26', 17, 0, 0, 10, 8, 4),
(101, 0, '2016-11-26', 17, 0, 0, 3, 1, 5),
(102, 0, '2016-11-27', 17, 0, 0, 11, 2, 6),
(103, 0, '2016-12-02', 18, 0, 0, 9, 3, 1),
(104, 0, '2016-12-03', 18, 0, 0, 1, 6, 2),
(105, 0, '2016-12-03', 18, 0, 0, 8, 11, 3),
(106, 0, '2016-12-03', 18, 0, 0, 4, 12, 4),
(107, 0, '2016-12-04', 18, 0, 0, 2, 7, 5),
(108, 0, '2016-12-04', 18, 0, 0, 5, 10, 6),
(109, 0, '2017-02-25', 19, 0, 0, 10, 4, 1),
(110, 0, '2017-02-25', 19, 0, 0, 7, 8, 2),
(111, 0, '2017-02-25', 19, 0, 0, 11, 5, 3),
(112, 0, '2017-02-25', 19, 0, 0, 6, 3, 4),
(113, 0, '2017-02-26', 19, 0, 0, 2, 9, 5),
(114, 0, '2017-02-26', 19, 0, 0, 12, 1, 6),
(115, 0, '2017-03-04', 20, 0, 0, 9, 6, 1),
(116, 0, '2017-03-04', 20, 0, 0, 4, 11, 2),
(117, 0, '2017-03-04', 20, 0, 0, 3, 12, 3),
(118, 0, '2017-03-04', 20, 0, 0, 5, 7, 4),
(119, 0, '2017-03-04', 20, 0, 0, 1, 10, 5),
(120, 0, '2017-03-04', 20, 0, 0, 8, 2, 6),
(121, 0, '2017-03-11', 21, 0, 0, 8, 9, 1),
(122, 0, '2017-03-11', 21, 0, 0, 11, 1, 2),
(123, 0, '2017-03-11', 21, 0, 0, 2, 5, 3),
(124, 0, '2017-03-11', 21, 0, 0, 10, 3, 4),
(125, 0, '2017-03-11', 21, 0, 0, 7, 4, 5),
(126, 0, '2017-03-11', 21, 0, 0, 12, 6, 6),
(127, 0, '2017-03-18', 22, 0, 0, 9, 12, 1),
(128, 0, '2017-03-18', 22, 0, 0, 1, 7, 2),
(129, 0, '2017-03-18', 22, 0, 0, 6, 10, 3),
(130, 0, '2017-03-18', 22, 0, 0, 4, 2, 4),
(131, 0, '2017-03-18', 22, 0, 0, 3, 11, 5),
(132, 0, '2017-03-18', 22, 0, 0, 5, 8, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arbitar`
--
ALTER TABLE `arbitar`
  ADD PRIMARY KEY (`id_arbitar`);

--
-- Indexes for table `dogadaj`
--
ALTER TABLE `dogadaj`
  ADD PRIMARY KEY (`id_dogadaj`),
  ADD KEY `utakmica_id` (`utakmica_id`) USING BTREE,
  ADD KEY `igrac_id` (`igrac_id`);

--
-- Indexes for table `igraci`
--
ALTER TABLE `igraci`
  ADD PRIMARY KEY (`id_igrac`),
  ADD KEY `klub_id` (`klub_id`);

--
-- Indexes for table `klub`
--
ALTER TABLE `klub`
  ADD PRIMARY KEY (`id_klub`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id_korisnik`),
  ADD KEY `klub_id` (`klub_id`);

--
-- Indexes for table `trener`
--
ALTER TABLE `trener`
  ADD PRIMARY KEY (`id_trener`),
  ADD KEY `klub_id` (`klub_id`) USING BTREE;

--
-- Indexes for table `utakmica`
--
ALTER TABLE `utakmica`
  ADD PRIMARY KEY (`id_utakmica`),
  ADD KEY `domacin_id` (`domacin_id`,`gost_id`),
  ADD KEY `strani_kljuc6` (`gost_id`),
  ADD KEY `arbitar_id` (`arbitar_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arbitar`
--
ALTER TABLE `arbitar`
  MODIFY `id_arbitar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `dogadaj`
--
ALTER TABLE `dogadaj`
  MODIFY `id_dogadaj` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `igraci`
--
ALTER TABLE `igraci`
  MODIFY `id_igrac` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;
--
-- AUTO_INCREMENT for table `klub`
--
ALTER TABLE `klub`
  MODIFY `id_klub` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id_korisnik` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `trener`
--
ALTER TABLE `trener`
  MODIFY `id_trener` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `utakmica`
--
ALTER TABLE `utakmica`
  MODIFY `id_utakmica` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `dogadaj`
--
ALTER TABLE `dogadaj`
  ADD CONSTRAINT `strani_kljuc1` FOREIGN KEY (`utakmica_id`) REFERENCES `utakmica` (`id_utakmica`),
  ADD CONSTRAINT `strani_kljuc2` FOREIGN KEY (`igrac_id`) REFERENCES `igraci` (`id_igrac`);

--
-- Constraints for table `igraci`
--
ALTER TABLE `igraci`
  ADD CONSTRAINT `strani_kljuc3` FOREIGN KEY (`klub_id`) REFERENCES `klub` (`id_klub`);

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `strani_kljuc4` FOREIGN KEY (`klub_id`) REFERENCES `klub` (`id_klub`);

--
-- Constraints for table `trener`
--
ALTER TABLE `trener`
  ADD CONSTRAINT `strani_kljuc7` FOREIGN KEY (`klub_id`) REFERENCES `klub` (`id_klub`);

--
-- Constraints for table `utakmica`
--
ALTER TABLE `utakmica`
  ADD CONSTRAINT `strani_kljuc5` FOREIGN KEY (`domacin_id`) REFERENCES `klub` (`id_klub`),
  ADD CONSTRAINT `strani_kljuc6` FOREIGN KEY (`gost_id`) REFERENCES `klub` (`id_klub`),
  ADD CONSTRAINT `strani_kljuc9` FOREIGN KEY (`arbitar_id`) REFERENCES `arbitar` (`id_arbitar`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
