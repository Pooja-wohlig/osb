-- phpMyAdmin SQL Dump
-- version 4.4.1.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2015 at 02:56 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wohligco_osb`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesslevel`
--

CREATE TABLE IF NOT EXISTS `accesslevel` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accesslevel`
--

INSERT INTO `accesslevel` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'Operator'),
(3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=240 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'COTE D''IVOIRE', 'Cote D''Ivoire', 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE''S REPUBLIC OF', 'Korea, Democratic People''s Republic of', 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE''S DEMOCRATIC REPUBLIC', 'Lao People''s Democratic Republic', 'LAO', 418, 856),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263);

-- --------------------------------------------------------

--
-- Table structure for table `logintype`
--

CREATE TABLE IF NOT EXISTS `logintype` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logintype`
--

INSERT INTO `logintype` (`id`, `name`) VALUES
(1, 'Facebook'),
(2, 'Twitter'),
(3, 'Email'),
(4, 'Google');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `linktype` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `isactive` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `description`, `keyword`, `url`, `linktype`, `parent`, `isactive`, `order`, `icon`) VALUES
(1, 'Users', '', '', 'site/viewusers', 1, 0, 1, 1, 'icon-user'),
(2, 'Dashboard', '', '', 'site/index', 1, 0, 1, 0, 'icon-dashboard'),
(3, 'Category', '', '', 'site/viewcategory', 1, 0, 1, 2, 'icon-laptop'),
(5, 'Area', '', '', 'site/viewarea', 1, 0, 1, 3, 'icon-map-marker'),
(7, 'Request of admin', '', '', 'site/viewrequestadmin', 1, 0, 1, 4, 'icon-star'),
(9, 'Transaction of admin', '', '', 'site/viewtransactionadmin', 1, 0, 1, 6, 'icon-dollar'),
(10, 'Request of user', '', '', 'site/viewrequest', 1, 0, 1, 5, 'icon-spinner'),
(11, 'Transaction of user', '', '', 'site/viewtransaction', 1, 0, 1, 7, 'icon-money'),
(12, 'User Category', '', '', 'site/viewusercategory', 1, 0, 1, 8, 'icon-book'),
(13, 'User Order', '', '', 'site/vieworder', 1, 0, 1, 9, 'icon-book'),
(14, 'User Notification', '', '', 'site/viewnotification', 1, 0, 1, 10, 'icon-book'),
(15, 'User Product', '', '', 'site/viewproduct', 1, 0, 1, 8, 'icon-book');

-- --------------------------------------------------------

--
-- Table structure for table `menuaccess`
--

CREATE TABLE IF NOT EXISTS `menuaccess` (
  `menu` int(11) NOT NULL,
  `access` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menuaccess`
--

INSERT INTO `menuaccess` (`menu`, `access`) VALUES
(1, 1),
(4, 1),
(2, 1),
(3, 1),
(5, 1),
(6, 1),
(7, 1),
(7, 3),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `user`, `type`, `timestamp`, `message`) VALUES
(1, 5, '2', '2015-06-09 08:29:01', 'abc'),
(2, 11, '1', '2015-06-08 09:33:36', 'fanreh');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `billingaddress` text NOT NULL,
  `billingcity` varchar(255) NOT NULL,
  `billingstate` varchar(255) NOT NULL,
  `billingcountry` varchar(255) NOT NULL,
  `billingpincode` varchar(255) NOT NULL,
  `shippingaddress` text NOT NULL,
  `shippingcity` varchar(255) NOT NULL,
  `shippingcountry` varchar(255) NOT NULL,
  `shippingstate` varchar(255) NOT NULL,
  `shippingpincode` varchar(255) NOT NULL,
  `transactionid` varchar(255) NOT NULL,
  `trackingcode` varchar(255) NOT NULL,
  `orderstatus` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user`, `name`, `email`, `billingaddress`, `billingcity`, `billingstate`, `billingcountry`, `billingpincode`, `shippingaddress`, `shippingcity`, `shippingcountry`, `shippingstate`, `shippingpincode`, `transactionid`, `trackingcode`, `orderstatus`, `timestamp`) VALUES
(1, 1, 'admin admin', 'admin@admin.com', 'address', 'city', 'state', 'country', 'pincode', 'address', 'city', 'country', 'state', 'code', 'tid', 'tcode', '1', '2015-06-09 08:58:53'),
(2, 14, 'Avinash', 'a@email.com', '1', '1', '1', 'ANDORRA', '', '1', '1', 'ANGUILLA', '1', '1', '1', '1', '1', '2015-06-09 09:49:02');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE IF NOT EXISTS `orderitems` (
  `id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL,
  `finalprice` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`id`, `order`, `product`, `quantity`, `price`, `discount`, `finalprice`) VALUES
(2, 2, 2, 100, 1000, 0, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `orderstatus`
--

CREATE TABLE IF NOT EXISTS `orderstatus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderstatus`
--

INSERT INTO `orderstatus` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Shipping'),
(4, 'Delivered'),
(5, 'Cancel');

-- --------------------------------------------------------

--
-- Table structure for table `osb_area`
--

CREATE TABLE IF NOT EXISTS `osb_area` (
  `id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `osb_area`
--

INSERT INTO `osb_area` (`id`, `order`, `status`, `name`) VALUES
(1, 1, 2, 'Mumbai'),
(2, 2, 2, 'Navi Mumbai'),
(3, 3, 2, 'bandra'),
(4, 4, 1, 'ghatkopar'),
(5, 5, 1, 'thane');

-- --------------------------------------------------------

--
-- Table structure for table `osb_category`
--

CREATE TABLE IF NOT EXISTS `osb_category` (
  `id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `osb_category`
--

INSERT INTO `osb_category` (`id`, `order`, `status`, `name`, `parent`) VALUES
(1, 1, 2, 'Mobile', 0),
(2, 2, 1, 'Personal computer', 0),
(3, 3, 2, 'Laptops', 0);

-- --------------------------------------------------------

--
-- Table structure for table `osb_request`
--

CREATE TABLE IF NOT EXISTS `osb_request` (
  `id` int(11) NOT NULL,
  `userfrom` int(11) NOT NULL,
  `userto` int(11) NOT NULL,
  `requeststatus` int(11) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `approvalreason` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `requestid` int(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `osb_request`
--

INSERT INTO `osb_request` (`id`, `userfrom`, `userto`, `requeststatus`, `amount`, `reason`, `approvalreason`, `timestamp`, `requestid`) VALUES
(156, 11, 10, 2, '6500', '', 'Paid Through Payment Gateway', '2015-06-08 07:30:30', 0),
(157, 11, 8, 1, '5000', '', '', '2015-06-03 07:29:29', 0),
(158, 11, 10, 2, '3000', 'i want to buy phone', '', '2015-06-02 11:47:20', 0),
(159, 1, 11, 2, '10400', 'Need some balance', 'take it!!!', '2015-06-02 11:42:18', 0),
(160, 1, 11, 2, '4000', 'Again i need', 'again take it', '2015-06-02 11:43:27', 0),
(161, 10, 11, 2, '6000', 'lappy', '', '2015-06-02 11:50:26', 0),
(162, 10, 11, 2, '8000', 'ipad', '', '2015-06-02 11:50:31', 0),
(163, 1, 11, 2, '0', '', '', '2015-06-02 16:24:36', 0),
(164, 1, 11, 2, '0', '', '', '2015-06-03 14:51:27', 0),
(165, 1, 11, 2, '0', '', '', '2015-06-03 14:51:32', 0),
(166, 11, 5, 2, '0', '', 'Paid Through Payment Gateway', '2015-06-08 07:24:16', 0),
(167, 7, 8, 2, '50000', 'pls', '', '2015-06-03 07:29:23', 0),
(168, 8, 10, 2, '100', 'demmmmmm', 'hey', '2015-06-05 05:50:44', 0),
(169, 1, 10, 1, '60000', 'For timepass', '', '2015-06-05 05:52:34', 0),
(170, 1, 10, 1, '2000', 'demo', '', '2015-06-05 10:23:48', 0),
(171, 1, 10, 2, '2000', 'heyyy', 'approved jagruti', '2015-06-05 10:37:33', 0),
(172, 1, 10, 1, '1000', 'demo', '', '2015-06-05 10:49:03', 0),
(173, 1, 10, 1, '1000', 'demo', '', '2015-06-05 10:49:24', 0),
(174, 1, 10, 1, '1000', 'hellooouu', '', '2015-06-05 11:20:04', 0),
(175, 1, 10, 1, '1000', '', '', '2015-06-05 11:36:38', 0),
(176, 1, 10, 1, '1000', '', '', '2015-06-05 11:38:47', 0),
(177, 1, 10, 1, '1900', '', '', '2015-06-05 12:10:15', 0),
(178, 1, 10, 1, '100', 'hoho', '', '2015-06-05 12:11:27', 0),
(179, 1, 10, 1, '20', 'opop', '', '2015-06-05 12:14:51', 0),
(180, 1, 10, 1, '20', 'iuyt', '', '2015-06-05 12:16:46', 0),
(181, 1, 10, 1, '90', '', '', '2015-06-05 12:18:20', 0),
(182, 1, 10, 1, '89', '', '', '2015-06-05 12:19:26', 0),
(183, 1, 10, 1, '60', '', '', '2015-06-05 12:24:05', 0),
(184, 1, 10, 1, '20', '', '', '2015-06-05 12:35:18', 0),
(185, 1, 10, 1, '23', '', '', '2015-06-05 12:40:02', 0),
(186, 1, 10, 1, '67', '', '', '2015-06-05 12:42:53', 0),
(187, 1, 10, 1, '56', '', '', '2015-06-05 12:47:55', 0),
(188, 1, 10, 1, '6', '', '', '2015-06-05 12:51:52', 0),
(189, 1, 10, 1, '2', '', '', '2015-06-05 13:02:08', 0),
(190, 1, 10, 1, '2', '', '', '2015-06-05 13:11:13', 0),
(191, 1, 10, 1, '23', '', '', '2015-06-08 04:49:32', 0),
(192, 1, 10, 1, '1', '', '', '2015-06-08 05:06:26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `osb_requeststatus`
--

CREATE TABLE IF NOT EXISTS `osb_requeststatus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `osb_requeststatus`
--

INSERT INTO `osb_requeststatus` (`id`, `name`) VALUES
(1, 'pending'),
(2, 'accepted'),
(3, 'rejected');

-- --------------------------------------------------------

--
-- Table structure for table `osb_shopphoto`
--

CREATE TABLE IF NOT EXISTS `osb_shopphoto` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `osb_shopphoto`
--

INSERT INTO `osb_shopphoto` (`id`, `user`, `photo`) VALUES
(16, 3, 'image11.jpg'),
(17, 3, 'images_(4).jpg'),
(18, 3, 'image8.jpg'),
(19, 4, 'images.jpg'),
(20, 4, 'image6.jpg'),
(21, 1, 'Computer_system2.jpg'),
(22, 1, 'BJW_Elecronics_SF.jpg'),
(23, 1, 'samsung-electronics-marketing-blitz-stirs-debate-over-innovation2.jpg'),
(25, 4, 'images_(1)1.jpg'),
(26, 5, 'images_(2)1.jpg'),
(28, 5, 'japanese-english-electronic-dictionary-canon-wordtank-z410-black-touch-panel-01.jpg'),
(29, 5, 'ipod-car-audio-nav-tv.png'),
(30, 6, 'savingspromo_onlinespecial.jpg'),
(31, 6, 'webuy.png'),
(32, 6, 'images_(1)2.jpg'),
(33, 7, 'images2.jpg'),
(34, 7, 'webuy1.png'),
(35, 7, 'images_(1)3.jpg'),
(36, 8, 'japanese-english-electronic-dictionary-canon-wordtank-z410-black-touch-panel-011.jpg'),
(37, 8, 'images_(2)2.jpg'),
(42, 8, 'Aluminium-ultrabook-laptop-computer-Intel-Celeron-1037U-dual-core-webcam-WIFI-W-option-8GB-ram-128GB_350x350_3.jpg'),
(43, 10, 'image20.jpg'),
(44, 10, 'image21.jpg'),
(45, 10, 'image22.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `osb_shopproductphoto`
--

CREATE TABLE IF NOT EXISTS `osb_shopproductphoto` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `osb_shopproductphoto`
--

INSERT INTO `osb_shopproductphoto` (`id`, `user`, `photo`) VALUES
(12, 1, 'images3.jpg'),
(13, 1, 'ee-cash-on-tap-2.jpg'),
(14, 1, 'MS-Nokia.jpg'),
(21, 4, 'aorus_x7_laptop_nvidia_g_sync_geforce-1024x571.jpg'),
(22, 4, 'download1.jpg'),
(23, 4, 'images4.jpg'),
(24, 5, 'picture-23.png'),
(25, 5, 'download2.jpg'),
(26, 5, 'images_(1)6.jpg'),
(27, 6, 'aorus_x7_laptop_nvidia_g_sync_geforce-1024x5711.jpg'),
(28, 6, 'images5.jpg'),
(29, 6, 'download3.jpg'),
(30, 7, '14754a7c5c2d1c692df435f1b6336e8a_icon_127x127.png'),
(31, 7, 'How-to-Speed-Up-a-Slow-Computer-for-Free.gif'),
(32, 7, 'Computer_system.jpg'),
(33, 8, 'Aluminium-ultrabook-laptop-computer-Intel-Celeron-1037U-dual-core-webcam-WIFI-W-option-8GB-ram-128GB.jpg_350x350_.jpg'),
(34, 8, 'How-to-Speed-Up-a-Slow-Computer-for-Free1.gif'),
(35, 8, 'Computer_system1.jpg'),
(36, 3, 'image15.jpg'),
(37, 3, 'image18.jpg'),
(38, 3, 'image17.jpg'),
(39, 10, ''),
(40, 10, 'image23.jpg'),
(41, 10, 'image24.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `osb_transaction`
--

CREATE TABLE IF NOT EXISTS `osb_transaction` (
  `id` int(11) NOT NULL,
  `userto` int(11) NOT NULL,
  `userfrom` int(11) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `payableamount` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `requestid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `osb_transaction`
--

INSERT INTO `osb_transaction` (`id`, `userto`, `userfrom`, `reason`, `amount`, `payableamount`, `timestamp`, `requestid`) VALUES
(114, 10, 11, '', '6500', '', '2015-06-01 11:13:16', 0),
(115, 11, 1, '', '5200.0', '10400', '2015-06-02 11:42:39', 159),
(116, 11, 1, '', '2000.0', '4000', '2015-06-02 11:43:44', 160),
(117, 10, 11, '', '3000', '', '2015-06-02 11:45:43', 0),
(120, 11, 10, '', '6000', '', '2015-06-02 11:50:26', 0),
(121, 11, 10, '', '8000', '', '2015-06-02 11:50:31', 0),
(122, 11, 1, '', '0', '', '2015-06-02 16:24:36', 0),
(123, 8, 7, '', '50000', '', '2015-06-03 07:29:23', 0),
(124, 11, 1, '', '0', '', '2015-06-03 14:51:27', 0),
(125, 11, 1, '', '0', '', '2015-06-03 14:51:32', 0),
(126, 10, 8, '', '100', '', '2015-06-05 05:50:44', 0),
(127, 10, 1, '', '1000.0', '2000', '2015-06-05 11:09:27', 171);

-- --------------------------------------------------------

--
-- Table structure for table `osb_transactionstatus`
--

CREATE TABLE IF NOT EXISTS `osb_transactionstatus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `osb_transactionstatus`
--

INSERT INTO `osb_transactionstatus` (`id`, `name`) VALUES
(1, 'internal purchase'),
(2, 'admin to store');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `sku`, `price`, `description`, `status`) VALUES
(1, 'Pen', 'Pen123', '250', 'Pen is for writting purpose', 1),
(2, 'Samsung', 's12', '20000', 'samsung is mobile brand', 1);

-- --------------------------------------------------------

--
-- Table structure for table `productcategory`
--

CREATE TABLE IF NOT EXISTS `productcategory` (
  `id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productcategory`
--

INSERT INTO `productcategory` (`id`, `product`, `category`) VALUES
(6, 2, 1),
(7, 2, 2),
(8, 2, 3),
(9, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `productimage`
--

CREATE TABLE IF NOT EXISTS `productimage` (
  `id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `order` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productimage`
--

INSERT INTO `productimage` (`id`, `product`, `image`, `order`) VALUES
(1, 1, 'UK_Creative_462809583.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE IF NOT EXISTS `statuses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(1, 'inactive'),
(2, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `accesslevel` int(11) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `socialid` varchar(255) NOT NULL,
  `logintype` int(11) NOT NULL,
  `json` text NOT NULL,
  `shopname` varchar(255) NOT NULL,
  `membershipno` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `website` varchar(255) NOT NULL,
  `shopcontact1` varchar(255) NOT NULL,
  `shopcontact2` varchar(255) NOT NULL,
  `shopemail` varchar(255) NOT NULL,
  `purchasebalance` varchar(255) NOT NULL,
  `salesbalance` double NOT NULL DEFAULT '0',
  `area` int(11) NOT NULL,
  `shoplogo` varchar(255) NOT NULL,
  `percentpayment` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL DEFAULT '0',
  `billingaddress` text NOT NULL,
  `billingcity` varchar(255) NOT NULL,
  `billingstate` varchar(255) NOT NULL,
  `billingcountry` varchar(255) NOT NULL,
  `billingpincode` varchar(255) NOT NULL,
  `shippingaddress` text NOT NULL,
  `shippingcity` varchar(255) NOT NULL,
  `shippingcountry` varchar(255) NOT NULL,
  `shippingstate` varchar(255) NOT NULL,
  `shippingpincode` varchar(255) NOT NULL,
  `onlinestatus` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `message`, `accesslevel`, `timestamp`, `status`, `image`, `username`, `socialid`, `logintype`, `json`, `shopname`, `membershipno`, `address`, `description`, `website`, `shopcontact1`, `shopcontact2`, `shopemail`, `purchasebalance`, `salesbalance`, `area`, `shoplogo`, `percentpayment`, `token`, `billingaddress`, `billingcity`, `billingstate`, `billingcountry`, `billingpincode`, `shippingaddress`, `shippingcity`, `shippingcountry`, `shippingstate`, `shippingpincode`, `onlinestatus`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'admin@admin.com', '', 1, '0000-00-00 00:00:00', 1, 'download_(1).jpg', '', '', 1, 'wohlig', 'wohlig technologies', '100', 'Rk cinema near NMMC, sector-19, Kharghar Navimumbai 455666', 'shop having electronic gadgets', 'www.wohlig.com', '987456313', '02245679789', 'support@wohlig.com', '-39182', 10000, 2, 'download_(1).jpg', '50', '0', '', '', '', '', '', '', '', '', '', '', ''),
(2, 'pratik', '3644a684f98ea8fe223c713b77189a77', 'pratik@wohlig.com', 'hii', 1, '2014-05-12 06:52:44', 1, 'download1.png', 'pratik', '1', 1, '', 'Facebook LLC.', '200', '', '', 'www.facebook.com', '78456963', '02287687897', 'support@issac.com', '995701', 954031, 0, 'download1.png', '50', '296fbeb76f8709ce', '', '', '', '', '', '', '', '', '', '', '1'),
(3, 'Priyanka', '94f6d7e04a4d452035300f18b984988c', 'priya@rocketmail.com', '', 1, '2014-05-12 06:52:44', 1, 'download_(1).png', 'wohlig123', '', 1, '', 'techno shop', '300', 'somaiya vidyavihar, near andheri kurla road, 400658.', 'Shop having all electronics gadgets including mobiles,tv,radio,lcds etc.', 'www.technoshop.com', '98456322', '022456789', 'sales@slash.com', '6900', 7800, 0, 'image.jpg', '50', '0', '', '', '', '', '', '', '', '', '', '', ''),
(4, 'pooja', '18d8042386b79e2c279fd162df0205c8', 'puja@gmail.com', '', 1, '2015-04-18 09:41:38', 1, 'download4.jpg', '', '2', 1, 'abc', 'Pancharatna', '400', 'Mahatma Gandhi lane, off-Thane Belapur Road, Seawoods 4002356', 'Shop having all electronics gadgets including mobiles,tv,radio,lcds etc.', 'www.pancharatna.com', '987456333', '0225467877', 'service@bhavana.com', '29000', 35000, 0, 'download4.jpg', '50', '0', '', '', '', '', '', '', '', '', '', '', ''),
(5, 'jagruti', 'cee631121c2ec9232f3a2f028ad5c89b', 'jag@gmail.com', '', 1, '2015-04-18 11:35:01', 1, 'images.png', '', 'abc', 1, 'kjehjegrh', 'Vijay Sales', '500', 'Nakshatra Arcade, ram maruti road, MD lane, Ghatkopar(W) 400856', 'Vijay Sales bring to you the best online shopping deals and offers on Mobile Phones, Digital Cameras, Laptops, Televisions, Refrigerators, Air-Conditioners.', 'www.vijaysales.com', '9874563586', '022-7894568', 'support@vijaysales.com', '50000', 40000, 4, 'images.png', '50', '0', '', '', '', '', '', '', '', '', '', '', ''),
(6, 'sneha', 'd490d7b4576290fa60eb31b5fc917ad1', 'snehamalankar@gmail.com', '', 1, '2015-04-20 06:50:48', 1, 'images_(1).png', '', '6', 1, 'kdjfjrhej', 'snehashop', '600', 'Sai seva appt, sector-17, Mulund(W) 400336', '', 'www.sneha.com', '022-27766568', '720456893', 'snehacomp@gmail.com', '20000', 30000, 5, 'images_(1).png', '50', '0', '', '', '', '', '', '', '', '', '', '', ''),
(7, 'sohan', 'e5841df2166dd424a57127423d276bbe', 'shn619@gmail.com', '', 1, '2015-04-22 13:07:57', 1, 'images1.png', '', 'j', 1, 'ju', 'korum', '700', 'Shiv Shankar Plaza, Vaishali Nagar, Mahim Mumbai 400256', '', 'www.wohlig.com', '022-27568943', '8868126555', 'korum@gmail.com', '450000', 499000, 4, 'images1.png', '50', '6f40a4942e3f9ecb', '', '', '', '', '', '', '', '', '', '', ''),
(8, 'pratiksha', '7a53928fa4dd31e82c6ef826f341daec', 'pra@gmail.com', '', 1, '2015-04-29 09:44:11', 1, 'images_(1)7.jpg', '1', '1', 1, '1', 'pratiskha stores', '800', 'Yash Paradise Building, near JN road, Kisan Nagar Mumbai 400569', '', 'www.pratiksha.com', '022-27568943', '7889556524', 'support@pratisksha.com', '876368', 34768, 4, 'images_(1)7.jpg', '50', '296fbeb76f8709ce', '', '', '', '', '', '', '', '', '', '', ''),
(10, 'Ramesh', 'a9b7ba70783b617e9998dc4dd82eb3c5', 'pooja.wohlig@gmail.com', '', 1, '2015-05-28 07:18:09', 1, '', '', '', 1, '', 'Kings Electronics', '1000', '1st Floor,\nDurga Prasad Co-op Society,\nV.B. Phadke Road, M.C.C.H Society,\nPanvel', 'Kings a noted name in Navi Mumbai & Raigad. Our aim is clear & logical, to provide the best to the customers and value for their money.', 'www.kingselectronics.in', '022-27568943', '9845633330', 'support@kingselectronics.com', '18267', 56603, 0, 'image19.jpg', '50', 'null', '', '', '', '', '', '', '', '', '', '', ''),
(11, 'Suresh', '08f90c1a417155361a5c4b8d297e0d78', 'suresh@gmail.com', '', 1, '2015-05-28 07:25:57', 1, 'images11.png', '', '', 1, '', 'Croma', '2000', 'Palm Beach Road, Sector 15, CBD Belapur, Navi Mumbai, Maharashtra 400614', 'Croma Retail is one stop destination for online shopping in India. Buy online all the products that you need here.', 'www.croma.com', '1800 258 3636', '984566333', 'support@croma.com', '46148', 400, 2, 'download5.jpg', '50', '0', '', '', '', '', '', '', '', '', '', '', ''),
(12, 'Vijay', 'e93028bdc1aacdfb3687181f2031765d', 'vijay@gmail.com', '', 1, '2015-05-28 07:32:27', 1, '', '', '', 1, '', 'Arcee Electronics', '3000', '7, Kashi Niketan Building, N G Acharya Marg, Near Chembur Railway Station, Chembur\nMumbai, Maharashtra', 'ARCEE ELECTRONICS is in the field of trading consumer electronics items since 1964.ARCEE ELECTRONICS has six branches in mumbai', 'www.arcee.com', '022 2521 5901', '022 2521 1235', 'sales@arcee.com', '90000', 74000, 1, 'furnace-skate-shop.jpg', '50', '0', '', '', '', '', '', '', '', '', '', '', ''),
(13, 'dchjc', 'edfd115cee58063dedcf2226339d6998', 'chirag@wohlig.com', '', 1, '2015-06-03 07:25:30', 2, '', '', '', 1, '', '', '555', '', '', '', '', '', '', '100000', 100000, 0, '', '', '0', '', '', '', '', '', '', '', '', '', '', ''),
(14, 'Avvvv', 'a208e5837519309129fa466b0c68396b', 'avinashghare@email.com', '', 1, '2015-06-03 08:08:56', 1, '1024.png', '', '1', 1, 'json', 'Avinash', '898345', '', '', 'avinash.com', 'demo', 'demo', 'demo@email.com', '123', 123, 1, '1024.png', '10', '0', 'abc', 'abc', 'abc', 'abcdsd', 'hku', 'ghu', 'ghj', 'ghj', 'gyui', 'ghj', 'ghj'),
(17, 'jhdajgy', 'db5f1fd72d915c4bb080f2675b3ee190', 'jhsd@jhafu.jhdu', '', 1, '2015-06-09 06:12:35', 1, '', '', '', 1, 'fghj', 'g', '232', 'h', 'fghu', 'yg', 'ghj', 'y', 'jdhj@fku.com', 'iyu', 545, 3, '', '20', '0', 'hjk', 'hi', 'h', 'j', 'ui', 'ui', 'ioi', 'u', 'i', 'ui', '2');

-- --------------------------------------------------------

--
-- Table structure for table `usercategory`
--

CREATE TABLE IF NOT EXISTS `usercategory` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usercategory`
--

INSERT INTO `usercategory` (`id`, `user`, `category`) VALUES
(1, 1, 2),
(2, 2, 0),
(3, 3, 0),
(6, 4, 5),
(7, 5, 3),
(8, 6, 3),
(9, 10, 2),
(10, 11, 1),
(11, 12, 3);

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE IF NOT EXISTS `userlog` (
  `id` int(11) NOT NULL,
  `onuser` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `onuser`, `status`, `description`, `timestamp`) VALUES
(1, 1, 1, 'User Address Edited', '2014-05-12 06:50:21'),
(2, 1, 1, 'User Details Edited', '2014-05-12 06:51:43'),
(3, 1, 1, 'User Details Edited', '2014-05-12 06:51:53'),
(4, 4, 1, 'User Created', '2014-05-12 06:52:44'),
(5, 4, 1, 'User Address Edited', '2014-05-12 12:31:48'),
(6, 23, 2, 'User Created', '2014-10-07 06:46:55'),
(7, 24, 2, 'User Created', '2014-10-07 06:48:25'),
(8, 25, 2, 'User Created', '2014-10-07 06:49:04'),
(9, 26, 2, 'User Created', '2014-10-07 06:49:16'),
(10, 27, 2, 'User Created', '2014-10-07 06:52:18'),
(11, 28, 2, 'User Created', '2014-10-07 06:52:45'),
(12, 29, 2, 'User Created', '2014-10-07 06:53:10'),
(13, 30, 2, 'User Created', '2014-10-07 06:53:33'),
(14, 31, 2, 'User Created', '2014-10-07 06:55:03'),
(15, 32, 2, 'User Created', '2014-10-07 06:55:33'),
(16, 33, 2, 'User Created', '2014-10-07 06:59:32'),
(17, 34, 2, 'User Created', '2014-10-07 07:01:18'),
(18, 35, 2, 'User Created', '2014-10-07 07:01:50'),
(19, 34, 2, 'User Details Edited', '2014-10-07 07:04:34'),
(20, 18, 2, 'User Details Edited', '2014-10-07 07:05:11'),
(21, 18, 2, 'User Details Edited', '2014-10-07 07:05:45'),
(22, 18, 2, 'User Details Edited', '2014-10-07 07:06:03'),
(23, 7, 6, 'User Created', '2014-10-17 06:22:29'),
(24, 7, 6, 'User Details Edited', '2014-10-17 06:32:22'),
(25, 7, 6, 'User Details Edited', '2014-10-17 06:32:37'),
(26, 8, 6, 'User Created', '2014-11-15 12:05:52'),
(27, 9, 6, 'User Created', '2014-12-02 10:46:36'),
(28, 9, 6, 'User Details Edited', '2014-12-02 10:47:34'),
(29, 4, 6, 'User Details Edited', '2014-12-03 10:34:49'),
(30, 4, 6, 'User Details Edited', '2014-12-03 10:36:34'),
(31, 4, 6, 'User Details Edited', '2014-12-03 10:36:49'),
(32, 8, 6, 'User Details Edited', '2014-12-03 10:47:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesslevel`
--
ALTER TABLE `accesslevel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logintype`
--
ALTER TABLE `logintype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderstatus`
--
ALTER TABLE `orderstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `osb_area`
--
ALTER TABLE `osb_area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `osb_category`
--
ALTER TABLE `osb_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `osb_request`
--
ALTER TABLE `osb_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `osb_requeststatus`
--
ALTER TABLE `osb_requeststatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `osb_shopphoto`
--
ALTER TABLE `osb_shopphoto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `osb_shopproductphoto`
--
ALTER TABLE `osb_shopproductphoto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `osb_transaction`
--
ALTER TABLE `osb_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `osb_transactionstatus`
--
ALTER TABLE `osb_transactionstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productcategory`
--
ALTER TABLE `productcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productimage`
--
ALTER TABLE `productimage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usercategory`
--
ALTER TABLE `usercategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accesslevel`
--
ALTER TABLE `accesslevel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=240;
--
-- AUTO_INCREMENT for table `logintype`
--
ALTER TABLE `logintype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `orderstatus`
--
ALTER TABLE `orderstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `osb_area`
--
ALTER TABLE `osb_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `osb_category`
--
ALTER TABLE `osb_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `osb_request`
--
ALTER TABLE `osb_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=193;
--
-- AUTO_INCREMENT for table `osb_requeststatus`
--
ALTER TABLE `osb_requeststatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `osb_shopphoto`
--
ALTER TABLE `osb_shopphoto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `osb_shopproductphoto`
--
ALTER TABLE `osb_shopproductphoto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `osb_transaction`
--
ALTER TABLE `osb_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=128;
--
-- AUTO_INCREMENT for table `osb_transactionstatus`
--
ALTER TABLE `osb_transactionstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `productcategory`
--
ALTER TABLE `productcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `productimage`
--
ALTER TABLE `productimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `usercategory`
--
ALTER TABLE `usercategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
