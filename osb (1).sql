-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2016 at 05:45 AM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `osb`
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
(2, 'Admin'),
(1, 'Super Admin'),
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `description`, `keyword`, `url`, `linktype`, `parent`, `isactive`, `order`, `icon`) VALUES
(1, 'Users', '', '', 'site/viewusers', 1, 0, 1, 1, 'icon-user'),
(2, 'Dashboard', '', '', 'site/index', 1, 0, 1, 0, 'icon-dashboard'),
(3, 'Category', '', '', 'site/viewcategory', 1, 0, 1, 2, 'icon-laptop'),
(5, 'Area', '', '', 'site/viewarea', 1, 0, 1, 3, 'icon-map-marker'),
(7, 'Admin Requests', '', '', 'site/viewrequestadmin', 1, 0, 1, 4, 'icon-star'),
(9, 'Admin Transactions', '', '', 'site/viewtransactionadmin', 1, 0, 1, 6, 'icon-dollar'),
(10, 'User Requests', '', '', 'site/viewrequest', 1, 0, 1, 5, 'icon-spinner'),
(11, 'User Transactions', '', '', 'site/viewtransaction', 1, 0, 1, 7, 'icon-money'),
(12, 'User Category', '', '', 'site/viewusercategory', 1, 0, 1, 8, 'icon-book'),
(13, 'User Order', '', '', 'site/vieworder', 1, 0, 1, 9, 'icon-tasks'),
(14, 'User Notification', '', '', 'site/viewnotification', 1, 0, 1, 10, 'icon-rocket'),
(15, 'User Product', '', '', 'site/viewproduct', 1, 0, 1, 8, 'icon-mobile-phone'),
(16, 'Register', '', '', 'site/viewregister', 1, 0, 1, 8, 'icon-male'),
(17, 'Suggestion', '', '', 'site/viewsuggestion', 1, 0, 1, 11, 'icon-dropbox');

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
(16, 1),
(0, 1),
(0, 1),
(17, 1),
(18, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=294 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `user`, `type`, `timestamp`, `message`) VALUES
(20, 1, '2', '2015-07-01 10:09:31', 'Your Purchase Request for Amount: 5000 is declined'),
(21, 1, '2', '2015-07-01 10:09:36', 'Your Purchase Request for Amount: 5000 is declined'),
(22, 1, '2', '2015-07-01 10:09:41', 'Your Purchase Request for Amount: 5000 is declined'),
(23, 1, '2', '2015-07-01 10:10:22', 'Your Purchase Request for Amount: 5000 is declined'),
(24, 31, '2', '2015-07-01 10:19:11', 'You have a new Purchase Request for Amount: 10000'),
(25, 31, '2', '2015-07-01 10:20:36', 'You have a new Purchase Request for Amount: 10000'),
(26, 31, '2', '2015-07-01 10:21:06', 'You have a new Purchase Request for Amount: 10000'),
(27, 30, '2', '2015-07-01 10:21:55', 'Your Purchase Request for Amount:10000is accepted'),
(28, 30, '2', '2015-07-01 10:21:57', 'Your Sell balance is too low please recharge your Account!!!'),
(29, 30, '2', '2015-07-01 10:22:01', 'Your Purchase Request for Amount:10000is accepted'),
(30, 30, '2', '2015-07-01 10:22:02', 'Your Sell balance is too low please recharge your Account!!!'),
(31, 33, '2', '2015-07-01 10:22:06', 'Your Purchase Request for Amount: 10000 is declined'),
(32, 31, '2', '2015-07-01 11:01:08', 'Your Purchase Request for Amount:80000is accepted'),
(33, 33, '2', '2015-07-01 11:01:34', 'You have a new Purchase Request for Amount: 80000'),
(34, 31, '2', '2015-07-01 11:01:37', 'Your Sell balance is too low please recharge your Account!!!'),
(35, 31, '2', '2015-07-01 11:33:41', 'You have a new Purchase Request for Amount: 5000'),
(36, 31, '2', '2015-07-01 11:34:10', 'You have a new Purchase Request for Amount: 2000'),
(37, 31, '2', '2015-07-01 11:34:25', 'You have a new Purchase Request for Amount: 2000'),
(38, 31, '2', '2015-07-01 11:35:33', 'You have a new Purchase Request for Amount: 1500'),
(39, 31, '2', '2015-07-01 11:47:50', 'You have a new Purchase Request for Amount: 1000'),
(40, 30, '2', '2015-07-01 11:49:10', 'Your Purchase Request for Amount:1000is accepted'),
(41, 30, '2', '2015-07-01 11:49:12', 'Your Sell balance is too low please recharge your Account!!!'),
(42, 30, '2', '2015-07-01 12:19:34', 'You have a new Purchase Request for Amount: 15000'),
(43, 33, '2', '2015-07-01 12:20:31', 'Your Purchase Request for Amount:15000is accepted'),
(44, 33, '2', '2015-07-01 12:23:22', 'You have a new Purchase Request for Amount: 7000'),
(45, 33, '2', '2015-07-01 12:23:37', 'You have a new Purchase Request for Amount: 0'),
(46, 30, '2', '2015-07-01 12:24:15', 'Your Purchase Request for Amount:7000is accepted'),
(47, 30, '2', '2015-07-01 12:24:16', 'Your Sell balance is too low please recharge your Account!!!'),
(48, 30, '2', '2015-07-01 12:24:25', 'Your Purchase Request for Amount:7000is accepted'),
(49, 30, '2', '2015-07-01 12:24:26', 'Your Sell balance is too low please recharge your Account!!!'),
(50, 1, '2', '2015-07-01 12:25:26', 'Your Purchase Request for Amount: 5000 is declined'),
(51, 33, '2', '2015-07-01 12:29:29', 'You have a new Purchase Request for Amount: 100'),
(52, 30, '2', '2015-07-01 12:29:48', 'Your Purchase Request for Amount: 100 is declined'),
(53, 30, '2', '2015-07-02 11:39:28', 'Your Purchase Request for Amount:0is accepted'),
(54, 30, '2', '2015-07-02 11:39:29', 'Your Sell balance is too low please recharge your Account!!!'),
(55, 30, '2', '2015-07-02 11:39:38', 'Your Purchase Request for Amount:0is accepted'),
(56, 30, '2', '2015-07-02 11:39:39', 'Your Sell balance is too low please recharge your Account!!!'),
(57, 30, '2', '2015-07-02 11:39:40', 'Your Purchase Request for Amount:0is accepted'),
(58, 30, '2', '2015-07-02 11:39:42', 'Your Sell balance is too low please recharge your Account!!!'),
(59, 30, '2', '2015-07-02 11:55:58', 'Your Purchase Request for Amount:0is accepted'),
(60, 30, '2', '2015-07-02 11:56:00', 'Your Sell balance is too low please recharge your Account!!!'),
(61, 30, '2', '2015-07-02 11:56:10', 'Your Purchase Request for Amount: 0 is declined'),
(62, 35, '2', '2015-07-02 11:59:18', 'You have a new Purchase Request for Amount: 30000'),
(63, 33, '2', '2015-07-02 12:00:44', 'Your Purchase Request for Amount:30000is accepted'),
(64, 33, '2', '2015-07-02 12:00:45', 'Your Sell balance is too low please recharge your Account!!!'),
(65, 33, '2', '2015-07-02 12:02:49', 'Your Purchase Request for Amount:30000is accepted'),
(66, 33, '2', '2015-07-02 12:02:50', 'Your Sell balance is too low please recharge your Account!!!'),
(67, 33, '2', '2015-07-02 12:06:17', 'You have a new Purchase Request for Amount: 500'),
(68, 35, '2', '2015-07-02 12:06:40', 'Your Purchase Request for Amount:500is accepted'),
(69, 35, '2', '2015-07-02 12:06:42', 'Your Sell balance is too low please recharge your Account!!!'),
(70, 33, '2', '2015-07-02 12:19:55', 'You have a new Purchase Request for Amount: 2000'),
(71, 35, '2', '2015-07-02 12:20:55', 'Your Purchase Request for Amount:2000is accepted'),
(72, 35, '2', '2015-07-02 12:20:56', 'Your Sell balance is too low please recharge your Account!!!'),
(73, 33, '2', '2015-07-02 12:45:27', 'You have a new Purchase Request for Amount: 2000'),
(74, 33, '2', '2015-07-02 14:00:52', 'You have a new Purchase Request for Amount: 500'),
(75, 35, '2', '2015-07-04 07:03:02', 'You have a new Purchase Request for Amount: 1000'),
(76, 43, '2', '2015-07-04 07:04:37', 'Your Purchase Request for Amount:1000is accepted'),
(77, 43, '2', '2015-07-04 07:04:39', 'Your Sell balance is too low please recharge your Account!!!'),
(78, 35, '2', '2015-07-04 07:34:05', 'You have a new Purchase Request for Amount: 500'),
(79, 43, '2', '2015-07-04 07:37:51', 'Your Purchase Request for Amount:500is accepted'),
(80, 43, '2', '2015-07-04 07:37:52', 'Your Sell balance is too low please recharge your Account!!!'),
(81, 37, '2', '2015-07-04 08:05:02', 'You have a new Purchase Request for Amount: 2000'),
(82, 34, '2', '2015-07-04 08:05:56', 'Your Purchase Request for Amount:2000is accepted'),
(83, 34, '2', '2015-07-04 08:05:58', 'Your Sell balance is too low please recharge your Account!!!'),
(84, 34, '2', '2015-07-04 09:51:54', 'You have a new Purchase Request for Amount: 500'),
(85, 34, '2', '2015-07-04 11:39:33', 'You have a new Purchase Request for Amount: 2000'),
(86, 34, '2', '2015-07-04 11:53:28', 'You have a new Purchase Request for Amount: 5000'),
(87, 34, '2', '2015-07-04 12:18:01', 'You have a new Purchase Request for Amount: NaN'),
(88, 30, '2', '2015-07-04 12:18:32', 'Your Purchase Request for Amount: NaN is declined'),
(89, 1, '2', '2015-07-06 07:25:20', 'Your Purchase Request for Amount:80000is accepted'),
(90, 1, '2', '2015-07-06 07:25:21', 'Your Sell balance is too low please recharge your Account!!!'),
(91, 1, '2', '2015-07-06 07:45:19', 'Your Purchase Request for Amount:10000is accepted'),
(92, 1, '2', '2015-07-06 07:45:20', 'Your Sell balance is too low please recharge your Account!!!'),
(93, 34, '2', '2015-07-06 07:56:13', 'You have a new Purchase Request for Amount: 7500'),
(94, 30, '2', '2015-07-06 07:56:58', 'Your Purchase Request for Amount:7500is accepted'),
(95, 30, '2', '2015-07-06 07:56:59', 'Your Sell balance is too low please recharge your Account!!!'),
(96, 34, '2', '2015-07-06 13:10:59', 'You have a new Purchase Request for Amount: 20000'),
(97, 30, '2', '2015-07-06 13:14:39', 'You have a new Purchase Request for Amount: 30000'),
(98, 34, '2', '2015-07-06 13:17:15', 'Your Purchase Request for Amount:30000is accepted'),
(99, 34, '2', '2015-07-06 13:17:16', 'Your Sell balance is too low please recharge your Account!!!'),
(100, 30, '2', '2015-07-06 13:19:19', 'Your Purchase Request for Amount:20000is accepted'),
(101, 30, '2', '2015-07-06 13:19:20', 'Your Sell balance is too low please recharge your Account!!!'),
(102, 31, '2', '2015-07-07 06:35:04', 'You have a new Purchase Request for Amount: NaN'),
(103, 30, '2', '2015-07-07 09:32:49', 'You have a new Purchase Request for Amount: NaN'),
(104, 35, '2', '2015-07-07 09:33:17', 'Your Purchase Request for Amount: NaN is declined'),
(105, 30, '2', '2015-07-07 09:33:57', 'You have a new Purchase Request for Amount: 10000'),
(106, 34, '2', '2015-07-07 09:34:30', 'Your Purchase Request for Amount:10000is accepted'),
(107, 34, '2', '2015-07-07 09:34:32', 'Your Sell balance is too low please recharge your Account!!!'),
(108, 34, '2', '2015-07-07 09:54:28', 'You have a new Purchase Request for Amount: 10000'),
(109, 1, '2', '2015-07-07 09:55:02', 'Your Purchase Request for Amount: 100000 is declined'),
(110, 30, '2', '2015-07-07 09:55:35', 'Your Purchase Request for Amount:10000is accepted'),
(111, 30, '2', '2015-07-07 09:55:36', 'Your Sell balance is too low please recharge your Account!!!'),
(112, 1, '2', '2015-07-07 10:01:14', 'Your Purchase Request for Amount: 80000 is declined'),
(113, 33, '2', '2015-07-07 11:29:59', 'You have a new Purchase Request for Amount: 7500'),
(114, 33, '2', '2015-07-07 11:30:57', 'You have a new Purchase Request for Amount: 500'),
(115, 30, '2', '2015-07-07 11:31:16', 'Your Purchase Request for Amount: 7500 is declined'),
(116, 30, '2', '2015-07-07 11:31:24', 'Your Purchase Request for Amount: 500 is declined'),
(117, 33, '2', '2015-07-07 11:35:14', 'You have a new Purchase Request for Amount: 500'),
(118, 33, '2', '2015-07-07 11:35:45', 'You have a new Purchase Request for Amount: 985'),
(119, 33, '2', '2015-07-07 11:36:17', 'You have a new Purchase Request for Amount: 632'),
(120, 30, '2', '2015-07-07 11:36:27', 'Your Purchase Request for Amount: 500 is declined'),
(121, 30, '2', '2015-07-07 11:36:30', 'Your Purchase Request for Amount: 632 is declined'),
(122, 30, '2', '2015-07-07 11:36:33', 'Your Purchase Request for Amount: 985 is declined'),
(123, 37, '2', '2015-07-07 12:19:39', 'You have a new Purchase Request for Amount: 8500'),
(124, 30, '2', '2015-07-07 12:20:10', 'Your Purchase Request for Amount: 8500 is declined'),
(125, 37, '2', '2015-07-07 12:36:46', 'You have a new Purchase Request for Amount: 5000'),
(126, 33, '2', '2015-07-07 12:37:17', 'Your Purchase Request for Amount:5000is accepted'),
(127, 33, '2', '2015-07-07 12:37:18', 'Your Sell balance is too low please recharge your Account!!!'),
(128, 33, '2', '2015-07-07 12:38:01', 'You have a new Purchase Request for Amount: 5000'),
(129, 37, '2', '2015-07-07 12:38:40', 'Your Purchase Request for Amount:5000is accepted'),
(130, 37, '2', '2015-07-07 12:38:41', 'Your Sell balance is too low please recharge your Account!!!'),
(131, 37, '2', '2015-07-07 12:59:25', 'You have a new Purchase Request for Amount: 94500'),
(132, 34, '2', '2015-07-07 13:00:23', 'Your Purchase Request for Amount:94500is accepted'),
(133, 34, '2', '2015-07-07 13:00:24', 'Your Sell balance is too low please recharge your Account!!!'),
(134, 37, '2', '2015-07-08 06:31:22', 'Your Product asdfghj is purchased byVijay Communication Center<br>Quantity:1<br>Order id:155'),
(135, 37, '2', '2015-07-08 06:35:27', 'Your Product Apple is purchased by Vijay Communication Center<br>Quantity : 3<br>Order Id : 156'),
(136, 34, '2', '2015-07-08 06:42:48', 'Your Product Lenovo is purchased by My Shop<br>Quantity : 1<br>Order Id : 157'),
(137, 1, '2', '2015-07-08 08:44:49', 'Your Purchase Request for Amount: 1000 is declined'),
(138, 1, '2', '2015-07-08 08:45:01', 'Your Purchase Request for Amount: 10000 is declined'),
(139, 1, '2', '2015-07-08 08:45:03', 'Your Purchase Request for Amount: 20000 is declined'),
(140, 1, '2', '2015-07-08 08:45:06', 'Your Purchase Request for Amount: 1000 is declined'),
(141, 30, '2', '2015-07-08 08:46:12', 'You have a new Purchase Request for Amount: 500'),
(142, 34, '2', '2015-07-08 08:46:58', 'Your Purchase Request for Amount:500is accepted'),
(143, 34, '2', '2015-07-08 08:50:44', 'Your Product Lenovo is purchased by BBX<br>Quantity : 1<br>Order Id : 158'),
(144, 34, '2', '2015-07-08 09:04:23', 'Your Product Lenovo is purchased by BBX<br>Quantity : 1<br>Order Id : 159'),
(145, 37, '2', '2015-07-08 09:07:00', 'Your Product Apple is purchased by BBX<br>Quantity : 1<br>Order Id : 160'),
(146, 37, '2', '2015-07-08 09:07:41', 'You have a new Purchase Request for Amount: 500'),
(147, 30, '2', '2015-07-08 09:09:01', 'Your Purchase Request for Amount:500is accepted'),
(148, 1, '2', '2015-07-08 11:15:57', 'Your Purchase Request for Amount: 100000 is declined'),
(149, 1, '2', '2015-07-08 11:15:59', 'Your Purchase Request for Amount: 100000 is declined'),
(150, 1, '2', '2015-07-08 11:16:00', 'Your Purchase Request for Amount: 100000 is declined'),
(151, 40, '2', '2015-07-08 13:17:20', 'You have a new Purchase Request for Amount: NaN'),
(152, 1, '2', '2015-07-08 13:37:37', 'Your Purchase Request for Amount: 95000 is declined'),
(153, 1, '2', '2015-07-08 13:37:41', 'Your Purchase Request for Amount: 95000 is declined'),
(154, 43, '2', '2015-07-08 13:38:37', 'You have a new Purchase Request for Amount: 1000'),
(155, 30, '2', '2015-07-08 13:38:50', 'Your Purchase Request for Amount:1000is accepted'),
(156, 42, '2', '2015-07-08 16:34:34', 'You have a new Purchase Request for Amount: NaN'),
(157, 43, '2', '2015-07-09 06:01:06', 'You have a new Purchase Request for Amount: 500'),
(158, 30, '2', '2015-07-09 06:01:52', 'Your Purchase Request for Amount:500is accepted'),
(159, 1, '1', '2015-07-09 07:42:01', 'hello'),
(160, 31, '1', '2015-07-09 07:42:42', 'hi'),
(161, 37, '2', '2015-07-09 10:43:27', 'Your Purchase Request for Amount: NaN is declined'),
(162, 42, '2', '2015-07-09 11:20:24', 'Your request is accepted by admin of amount100000'),
(163, 42, '2', '2015-07-09 11:24:33', 'Your request is accepted by admin of amount10000'),
(164, 42, '2', '2015-07-09 11:30:43', 'Your request is rejected by admin of amount500'),
(165, 35, '2', '2015-08-04 06:51:18', 'Your Product Add me again is purchased by My Shop<br>Quantity : 2<br>Order Id : 161'),
(166, 37, '2', '2015-08-04 06:53:21', 'Your Product Apple is purchased by Croma<br>Quantity : 1<br>Order Id : 162'),
(167, 35, '2', '2015-08-04 06:54:22', 'You have a new Purchase Request for Amount: 1000'),
(168, 37, '2', '2015-08-04 06:55:30', 'Your Purchase Request for Amount:1000is accepted'),
(169, 37, '2', '2015-08-04 06:56:23', 'You have a new Purchase Request for Amount: 9000'),
(170, 37, '2', '2015-08-04 06:57:30', 'You have a new Purchase Request for Amount: 5000'),
(171, 35, '2', '2015-08-04 07:37:10', 'Your Purchase Request for Amount:9000is accepted'),
(172, 35, '2', '2015-08-04 07:37:14', 'Your Purchase Request for Amount: 5000 is declined'),
(173, 37, '2', '2015-08-04 07:38:31', 'You have a new Purchase Request for Amount: 7000'),
(174, 35, '2', '2015-08-04 07:49:54', 'Your request is accepted by admin of amount80000'),
(175, 37, '2', '2015-08-04 07:51:03', 'Your request is accepted by admin of amount4000'),
(176, 30, '2', '2015-08-17 12:42:51', 'You have a new Purchase Request for Amount: 100'),
(177, 30, '2', '2015-08-17 12:45:08', 'Your Product iPhone 5C is purchased by My Shop<br>Quantity : 1<br>Order Id : 163'),
(178, 34, '2', '2015-08-20 05:02:12', 'Your Product named as: Pushwoosh price: 1000 quantity 1 is approved 1000'),
(179, 34, '2', '2015-08-20 05:06:24', 'Your Product named as:Such price: 1000 quantity 1 is rejected and Rs. 1000 is added to your sales balance'),
(180, 34, '2', '2015-08-20 06:16:56', 'Your Product named as:Test price: Rs 5000 quantity 5 is rejected and Rs. 25000 is added to your sales balance'),
(181, 34, '2', '2015-10-13 07:16:53', 'Your Product My first Product is purchased by BBX Quantity : 1 Order Id : 164'),
(182, 46, '2', '2015-11-26 13:24:24', 'You have a new Purchase Request for Amount: 2000'),
(183, 47, '2', '2015-11-26 13:32:51', 'You have a new Purchase Request for Amount: 1000'),
(184, 45, '2', '2015-11-26 13:33:08', 'Your Purchase Request for Amount:1000is accepted'),
(185, 37, '2', '2015-11-26 13:41:53', 'Your Product Wohlig is purchased by Mera Shop Quantity : 1 Order Id : 165'),
(186, 45, '2', '2015-11-26 14:04:04', 'Your Product named as: Xiomi price: Rs 1000 quantity 45 is approved '),
(187, 47, '2', '2015-11-26 14:04:14', 'Your Product named as: Sony Xperia z price: Rs 4000 quantity 5 is approved '),
(188, 47, '2', '2015-11-26 14:11:11', 'Your Product Sony Xperia z is purchased by Mera Shop Quantity : 3 Order Id : 166'),
(189, 45, '2', '2015-11-27 10:37:26', 'Your Product Xiomi is purchased by Harsh Electronics Quantity : 3 Order Id : 167'),
(190, 45, '2', '2015-11-27 10:40:01', 'Your Product Xiomi is purchased by Harsh Electronics Quantity : 2 Order Id : 168'),
(191, 43, '2', '2015-11-27 13:59:45', 'Your Product Kirloskar is purchased by My Shop Quantity : 1 Order Id : 169'),
(192, 34, '2', '2015-11-28 13:31:37', 'Your request is accepted by admin of amount20000'),
(193, 34, '2', '2015-11-28 13:32:11', 'Your request is accepted by admin of amount5000'),
(194, 34, '2', '2015-11-30 06:22:20', 'Your Product Pushwoosh is purchased by Croma Quantity : 1 Order Id : 170'),
(195, 34, '2', '2015-11-30 06:26:16', 'Your Product My first Product is purchased by Croma Quantity : 98 Order Id : 171'),
(196, 35, '2', '2015-11-30 06:28:15', 'Your Product 9000 is purchased by Vijay Communication Center Quantity : 1 Order Id : 172'),
(197, 35, '2', '2015-11-30 06:33:35', 'You have a new Purchase Request for Amount: 5000'),
(198, 34, '2', '2015-11-30 06:34:11', 'Your Purchase Request for Amount:5000is accepted'),
(199, 35, '2', '2015-11-30 06:42:57', 'You have a new Purchase Request for Amount: 5000'),
(200, 35, '2', '2015-12-01 13:35:12', 'Your request is accepted by admin of amount5000'),
(201, 35, '2', '2015-12-01 13:36:43', 'Your request is accepted by admin of amount100000'),
(202, 35, '2', '2015-12-01 13:37:00', 'Your request is accepted by admin of amount100000'),
(203, 35, '2', '2015-12-01 13:38:03', 'Your request is accepted by admin of amount100000'),
(204, 35, '2', '2015-12-01 13:38:16', 'Your request is accepted by admin of amount100000'),
(205, 35, '2', '2015-12-01 13:40:43', 'Your request is accepted by admin of amount100000'),
(206, 35, '2', '2015-12-01 13:41:45', 'Your request is accepted by admin of amount100000'),
(207, 35, '2', '2015-12-01 13:43:19', 'Your request is accepted by admin of amount100000'),
(208, 30, '2', '2015-12-02 06:58:14', 'Your Purchase Request for Amount:2000is accepted'),
(209, 47, '2', '2015-12-02 07:01:22', 'You have a new Purchase Request for Amount: 5200'),
(210, 47, '2', '2015-12-02 07:01:56', 'You have a new Purchase Request for Amount: 5200'),
(211, 47, '2', '2015-12-02 07:02:33', 'You have a new Purchase Request for Amount: 200'),
(212, 35, '2', '2015-12-02 07:04:36', 'You have a new Purchase Request for Amount: 200'),
(213, 35, '2', '2015-12-02 07:06:11', 'You have a new Purchase Request for Amount: 200'),
(214, 35, '2', '2015-12-03 13:34:23', 'Your request is accepted by admin of amount100000'),
(215, 30, '2', '2015-12-03 13:36:11', 'Your request is accepted by admin of amount100000'),
(216, 30, '2', '2015-12-03 13:36:13', 'Your request is accepted by admin of amount100000'),
(217, 34, '2', '2015-12-03 13:36:36', 'Your request is accepted by admin of amount100000'),
(218, 37, '2', '2015-12-03 13:45:46', 'Your Product 43000 is purchased by Vijay Communication Center Quantity : 1 Order Id : 173'),
(219, 34, '2', '2015-12-03 13:51:13', 'You have a new Purchase Request for Amount: 5000'),
(220, 30, '2', '2015-12-03 13:51:27', 'Your Purchase Request for Amount:5000is accepted'),
(221, 37, '2', '2015-12-03 13:57:01', 'Your Product Apple is purchased by Croma Quantity : 1 Order Id : 174'),
(222, 43, '2', '2015-12-03 14:04:23', 'Your Product check note is purchased by Croma Quantity : 1 Order Id : 175'),
(223, 47, '2', '2015-12-04 04:55:13', 'You have a new Purchase Request for Amount: NaN'),
(224, 43, '2', '2015-12-04 05:35:54', 'Your Product nexus is purchased by My Shop Quantity : 1 Order Id : 176'),
(225, 40, '2', '2015-12-04 07:25:20', 'You have a new Purchase Request for Amount: 0'),
(226, 30, '2', '2015-12-04 09:49:38', 'Your Product named as: Sagar price: Rs 2000 quantity 10 is approved '),
(227, 34, '2', '2015-12-04 13:26:41', 'Your Product named as: Iphone price: Rs 50000 quantity 10 is approved '),
(228, 35, '2', '2015-12-04 13:28:13', 'Your Product named as: iPhone 6 price: Rs 50000 quantity 1 is approved '),
(229, 35, '2', '2015-12-04 13:28:51', 'Your Product iPhone 6 is purchased by SR Communication Center Quantity : 1 Order Id : 177'),
(230, 30, '2', '2015-12-05 06:44:48', 'Your request is accepted by admin of amount10000'),
(231, 37, '2', '2015-12-08 08:10:28', 'You have a new Purchase Request for Amount: 10000'),
(232, 35, '2', '2015-12-08 08:10:45', 'Your Purchase Request for Amount:10000is accepted'),
(233, 34, '2', '2015-12-08 09:58:04', 'Your request is accepted by admin of amount1000'),
(234, 30, '2', '2015-12-08 10:27:37', 'Your request is accepted by admin of amount28000'),
(235, 30, '2', '2015-12-08 11:09:41', 'Your request is accepted by admin of amount68700'),
(236, 34, '2', '2015-12-08 11:20:08', 'Your Purchase Request for Amount:5000is accepted'),
(237, 34, '2', '2015-12-08 11:22:38', 'Your Purchase Request for Amount:200is accepted'),
(238, 34, '2', '2015-12-08 11:25:31', 'Your Purchase Request for Amount:200is accepted'),
(239, 34, '2', '2015-12-08 11:27:32', 'Your Product named as: Notification Test price: Rs 100 quantity 1 is approved '),
(240, 35, '2', '2015-12-08 11:40:01', 'Your Product named as: Android Test price: Rs 1500 quantity 10 is approved '),
(241, 35, '2', '2015-12-08 11:40:36', 'Your Product named as: Image Test price: Rs 400 quantity 10 is approved '),
(242, 30, '2', '2015-12-08 12:14:20', 'You have a new Purchase Request for Amount: 2000'),
(243, 30, '2', '2015-12-08 12:16:44', 'You have a new Purchase Request for Amount: 2000'),
(244, 33, '2', '2015-12-15 10:31:40', 'You have a new Purchase Request for Amount: 100'),
(245, 34, '2', '2015-12-15 10:33:24', 'You have a new Purchase Request for Amount: 1200'),
(246, 31, '2', '2015-12-15 10:33:54', 'Your Purchase Request for Amount:1200is accepted'),
(247, 31, '2', '2015-12-15 10:36:49', 'Your request is accepted by admin of amount1000000'),
(248, 34, '2', '2015-12-15 10:39:46', 'Your Product My first Product is purchased by My Holiday Quantity : 1 Order Id : 178'),
(249, 31, '2', '2015-12-17 07:19:03', 'You have a new Purchase Request for Amount: 50000'),
(250, 34, '2', '2015-12-17 07:19:34', 'Your Purchase Request for Amount:50000is accepted'),
(251, 34, '2', '2015-12-17 07:20:47', 'You have a new Purchase Request for Amount: 5000'),
(252, 48, '2', '2015-12-17 07:34:57', 'You have a new Purchase Request for Amount: 5000'),
(253, 49, '2', '2015-12-17 07:35:45', 'Your Purchase Request for Amount:5000is accepted'),
(254, 48, '2', '2015-12-17 07:37:24', 'You have a new Purchase Request for Amount: 95000'),
(255, 49, '2', '2015-12-17 07:42:25', 'Your Product named as: Watch price: Rs 25000 quantity 2 is approved '),
(256, 49, '2', '2015-12-17 07:43:46', 'Your Product named as:Aaaaa price: Rs 5000 quantity 2 is rejected and Rs. 10000 is added to your sales balance'),
(257, 49, '2', '2015-12-17 07:46:00', 'Your Product Watch is purchased by ABCD Quantity : 2 Order Id : 179'),
(258, 49, '2', '2015-12-17 07:50:38', 'Your request is accepted by admin of amount200000'),
(259, 35, '2', '2015-12-17 08:28:15', 'You have a new Purchase Request for Amount: 99'),
(260, 49, '2', '2015-12-18 07:29:09', 'Your Purchase Request for Amount:95000is accepted'),
(261, 49, '2', '2015-12-18 07:29:09', 'Your Sell balance is too low please recharge your Account!!!'),
(262, 48, '2', '2015-12-18 07:31:27', 'You have a new Purchase Request for Amount: 100000'),
(263, 49, '2', '2015-12-18 07:43:31', 'Your Purchase Request for Amount:100000is accepted'),
(264, 49, '2', '2015-12-18 07:43:32', 'Your Sell balance is too low please recharge your Account!!!'),
(265, 49, '2', '2015-12-18 07:48:02', 'You have a new Purchase Request for Amount: 50000'),
(266, 48, '2', '2015-12-18 07:53:17', 'Your Purchase Request for Amount:50000is accepted'),
(267, 49, '2', '2015-12-18 07:55:01', 'You have a new Purchase Request for Amount: 10000'),
(268, 48, '2', '2015-12-18 07:55:39', 'Your Purchase Request for Amount:10000is accepted'),
(269, 48, '2', '2015-12-18 07:55:39', 'Your Sell balance is too low please recharge your Account!!!'),
(270, 48, '2', '2015-12-18 08:07:43', 'You have a new Purchase Request for Amount: 50000'),
(271, 49, '2', '2015-12-18 08:08:26', 'Your Purchase Request for Amount:50000is accepted'),
(272, 49, '2', '2015-12-18 08:08:26', 'Your Sell balance is too low please recharge your Account!!!'),
(273, 48, '2', '2015-12-18 08:09:41', 'You have a new Purchase Request for Amount: 50000'),
(274, 49, '2', '2015-12-18 08:11:51', 'Your Purchase Request for Amount:50000is accepted'),
(275, 49, '2', '2015-12-18 10:20:05', 'You have a new Purchase Request for Amount: 1000'),
(276, 48, '2', '2015-12-18 10:20:21', 'Your Purchase Request for Amount:1000is accepted'),
(277, 49, '2', '2015-12-18 10:22:04', 'Your Product named as: One Plus price: Rs 17000 quantity 2 is approved by SWAPP '),
(278, 49, '2', '2015-12-18 10:22:33', 'Your Product named as: One Plus price: Rs 17000 quantity 2 is approved by SWAPP '),
(279, 49, '2', '2015-12-18 10:22:39', 'Your Product named as: One Plus price: Rs 17000 quantity 2 is approved by SWAPP '),
(280, 49, '2', '2015-12-18 10:25:02', 'Your Product One Plus is purchased by ABCD Quantity : 1 Order Id : 180'),
(281, 34, '2', '2015-12-18 10:31:45', 'Your Product My first Product is purchased by 1234 Quantity : 1 Order Id : 181'),
(282, 49, '2', '2015-12-18 10:39:54', 'Your Product One Plus is purchased by ABCD Quantity : 1 Order Id : 182'),
(283, 49, '2', '2015-12-18 12:25:23', 'You have a new Purchase Request for Amount: 4000'),
(284, 48, '2', '2015-12-18 12:25:53', 'Your Purchase Request for Amount:4000is accepted'),
(285, 48, '2', '2015-12-18 12:31:01', 'Your Product named as: Cassandra price: Rs 5000 quantity 15 is approved by SWAPP '),
(286, 49, '2', '2015-12-18 12:35:24', 'Your Product named as: Phone 75 price: Rs 5000 quantity 10 is approved by SWAPP '),
(287, 49, '2', '2015-12-18 12:36:55', 'Your Product Phone 75 is purchased by ABCD Quantity : 2 Order Id : 183'),
(288, 48, '1', '2015-12-18 12:41:20', 'cnwljncjwjcw'),
(289, 1, '1', '2015-12-18 12:42:02', 'fernernjvnejrgve'),
(290, 44, '1', '2015-12-18 12:43:01', 'fervreveve'),
(291, 30, '1', '2015-12-19 05:15:12', 'Hello!'),
(292, 31, '2', '2015-12-19 18:00:45', 'Your Purchase Request for Amount:5000is accepted'),
(293, 43, '2', '2015-12-23 06:25:48', 'Your Product nexus is purchased by ABCD Quantity : 1 Order Id : 184');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactno` int(11) NOT NULL,
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
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `logisticcharge` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=185 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user`, `name`, `email`, `contactno`, `billingaddress`, `billingcity`, `billingstate`, `billingcountry`, `billingpincode`, `shippingaddress`, `shippingcity`, `shippingcountry`, `shippingstate`, `shippingpincode`, `transactionid`, `trackingcode`, `orderstatus`, `timestamp`, `logisticcharge`) VALUES
(150, 30, 'BBX', 'mumbaibbx@gmail.com', 2147483647, 'Sion', 'Mumbai', 'Maharashtra', 'India', '400808', '', '', '', '', '', '', '', '1', '2015-07-06 13:12:30', '0'),
(151, 34, 'Vijay Communication Center', 'sr@gmail.com', 2147483647, 'kalyan', 'Mumbai', 'Maharashtra', 'India', '400745', '', '', '', '', '', '', '', '1', '2015-07-06 13:12:33', '1'),
(152, 34, 'Vijay Communication Center', 'sr@gmail.com', 2147483647, 'kalyan', 'Mumbai', 'Maharashtra', 'India', '400745', '', '', '', '', '', '', '', '1', '2015-07-06 13:13:22', '1'),
(153, 34, 'Vijay Communication Center', 'sr@gmail.com', 2147483647, 'kalyan', 'Mumbai', 'Maharashtra', 'India', '400745', '', '', '', '', '', '', '', '1', '2015-07-07 09:39:40', ''),
(154, 30, 'BBX', 'mumbaibbx@gmail.com', 2147483647, 'Sion', 'Mumbai', 'Maharashtra', 'India', '400808', '', '', '', '', '', '', '', '1', '2015-07-07 09:48:45', ''),
(155, 34, 'Vijay Communication Center', 'sr2@gmail.com', 2147483647, 'kalyan west', 'Mumbai', 'Maharashtra', 'India', '400745', '', '', '', '', '', '', '', '1', '2015-07-08 06:31:20', '0'),
(156, 34, 'Vijay Communication Center', 'sr2@gmail.com', 2147483647, 'kalyan west', 'Mumbai', 'Maharashtra', 'India', '400745', '', '', '', '', '', '', '', '1', '2015-07-08 06:35:25', '0'),
(157, 37, 'Dhaval', 'dhavalwohlig@gmail.com', 2147483647, 'Nerul', 'Navi Mumbai', 'Maharashtra', 'India', '400056', '', '', '', '', '', '', '', '1', '2015-07-08 06:42:47', '0'),
(158, 30, 'BBX', 'mumbaibbx@gmail.com', 2147483647, 'Sion mumbai', 'Mumbai', 'Maharashtra', 'India', '400808', '', '', '', '', '', '', '', '1', '2015-07-08 08:50:42', ''),
(159, 30, 'BBX', 'mumbaibbx@gmail.com', 2147483647, 'Sion mumbai', 'Mumbai', 'Maharashtra', 'India', '400808', '', '', '', '', '', '', '', '1', '2015-07-08 09:04:21', ''),
(160, 30, 'BBX', 'mumbaibbx@gmail.com', 2147483647, 'Sion mumbai', 'Mumbai', 'Maharashtra', 'India', '400808', '', '', '', '', '', '', '', '1', '2015-07-08 09:06:45', ''),
(161, 37, 'Dhaval', 'dhavalwohlig@gmail.com', 2147483647, 'Nerul', 'Navi Mumbai', 'Maharashtra', 'India', '400056', '', '', '', '', '', '', '', '1', '2015-08-04 06:51:17', '66'),
(162, 35, 'Croma Shop', 'pooja.wohlig@gmail.com', 2147483647, 'Chembur', 'Mumbai', 'Maharashtra', 'India', '400322', '', '', '', '', '', '', '', '1', '2015-08-04 06:53:20', '0'),
(163, 37, 'Dhaval', 'dhavalwohlig@gmail.com', 2147483647, 'Nerul', 'Navi Mumbai', 'Maharashtra', 'India', '400056', '', '', '', '', '', '', '', '1', '2015-08-17 12:45:06', ''),
(164, 30, 'BBX', 'mumbaibbx@gmail.com', 2147483647, 'Sion mumbai', 'Mumbai', 'Maharashtra', 'India', '400808', '', '', '', '', '', '', '', '1', '2015-10-13 07:16:52', ''),
(165, 45, 'Tushar', 't@s.com', 1245346523, 'Sion', 'Mumbai', 'Maharashtra', 'India', '400022', '', '', '', '', '', '', '', '1', '2015-11-26 13:41:52', '100'),
(166, 45, 'Tushar', 't@s.com', 1245346523, 'Panch Gali, Manpada Road, Cinchpokli', 'Mumbai', 'Maharashtra', 'India', '245139', '', '', '', '', '', '', '', '1', '2015-11-26 14:11:10', ''),
(167, 47, 'Harsh', 'harsh@wohlig.in', 2147483647, 'Dombivli', 'Mumbai', 'Mumbai', 'India', '400022', '', 'Mumbai', '', '', '', '', '', '1', '2015-11-27 10:37:25', '120'),
(168, 47, 'Harsh', 'harsh@wohlig.in', 2147483647, 'Dombivli', 'Mumbai', 'Maharashtra', 'India', '123455', '', 'Mumbai', '', '', '', '', '', '1', '2015-11-27 10:40:00', '1000'),
(169, 37, 'Dhaval', 'dhavalwohlig@gmail.com', 2147483647, 'Nerul', 'Navi Mumbai', 'Maharashtra', 'India', '400056', '', '', '', '', '', '', '', '1', '2015-11-27 13:59:44', ''),
(170, 35, 'Croma Shop', 'pooja.wohlig@gmail.com', 2147483647, 'Chembur', 'Mumbai', 'Maharashtra', 'India', '400322', '', '', '', '', '', '', '', '1', '2015-11-30 06:22:20', '10'),
(171, 35, 'Croma Shop', 'pooja.wohlig@gmail.com', 2147483647, 'Chembur', 'Mumbai', 'Maharashtra', 'India', '400322', '', '', '', '', '', '', '', '1', '2015-11-30 06:26:15', '0'),
(172, 34, 'Vijay Communication Center', 'sr2@gmail.com', 2147483647, 'kalyan west', 'Mumbai', 'Maharashtra', 'India', '400745', '', '', '', '', '', '', '', '1', '2015-11-30 06:28:15', '0'),
(173, 34, 'Vijay Communication Center', 'sr2@gmail.com', 2147483647, 'kalyan west', 'Mumbai', 'Maharashtra', 'India', '400745', '', '', '', '', '', '', '', '1', '2015-12-03 13:45:45', ''),
(174, 35, 'Croma Shop', 'pooja.wohlig@gmail.com', 2147483647, 'Chembur', 'Mumbai', 'Maharashtra', 'India', '400322', '', '', '', '', '', '', '', '1', '2015-12-03 13:57:00', ''),
(175, 35, 'Croma Shop', 'pooja.wohlig@gmail.com', 2147483647, 'Chembur', 'Mumbai', 'Maharashtra', 'India', '400322', '', '', '', '', '', '', '', '1', '2015-12-03 14:04:23', ''),
(176, 37, 'Dhaval', 'dhavalwohlig@gmail.com', 2147483647, 'Nerul', 'Navi Mumbai', 'Maharashtra', 'India', '400056', '', '', '', '', '', '', '', '1', '2015-12-04 05:35:53', '0'),
(177, 33, 'SR Communication Center', 'sr@gmail.com', 2147483647, 'Grant Road', 'Mumbai', 'Maharashtra', 'India', '400415', '', '', '', '', '', '', '', '1', '2015-12-04 13:28:51', '0'),
(178, 31, 'My Holiday', 'myholiday@gmail.com', 2147483647, 'Chembur', 'Mumbai', 'Maharashtra', 'India', '400745', '', '', '', '', '', '', '', '1', '2015-12-15 10:39:46', '0'),
(179, 48, 'Dhaval', 'aaa@gmail.com', 999999999, 'Gain', 'Mumbsi', 'Mah', '', '400007', 'Gain', 'Mumbsi', '', 'Mah', '', '', '', '2', '2015-12-17 07:47:32', '0'),
(180, 48, 'Dhaval', 'aaa@gmail.com', 999999999, 'G', 'Gg', 'Hhhh', 'Gggg', '400022', '', '', '', '', '', '', '', '1', '2015-12-18 10:25:01', ''),
(181, 49, 'Chirag Shah', 'abab@gmail.com', 999999999, 'dvdsfas', 'DFVSACX', 'GBDXA', 'tdrfgyhs', 'GBDSDV', '', '', '', '', '', '', '', '1', '2015-12-18 10:31:44', ''),
(182, 48, 'Dhaval', 'aaa@gmail.com', 999999999, 'Gwaghfg', 'Wgwgw', 'Wgrwrg', 'Wgerwgrwg', 'gwrrwg', '', '', '', '', '', '', '', '1', '2015-12-18 10:39:53', ''),
(183, 48, 'Dhaval', 'aaa@gmail.com', 999999999, 'Hhjjj', 'Bhnjjbhj', 'Hhjjj', '', '400081', 'Hhjjj', 'Bhnjjbhj', '', 'Hhjjj', '', '', '', '3', '2015-12-18 12:40:23', ''),
(184, 48, 'Dhaval', 'aaa@gmail.com', 999999999, 'Airoli', 'Mumbai', 'Maharashtra', 'India', '400708', '', '', '', '', '', '', '', '1', '2015-12-23 06:25:48', '20');

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
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`id`, `order`, `product`, `quantity`, `price`, `discount`, `finalprice`) VALUES
(111, 150, 73, 2, 1000, 0, 2000),
(112, 151, 70, 1, 10000, 0, 10000),
(113, 152, 70, 1, 10000, 0, 10000),
(114, 153, 76, 4, 2000, 0, 8000),
(115, 154, 77, 5, 10000, 0, 50000),
(116, 155, 75, 1, 500, 0, 500),
(117, 156, 75, 3, 500, 0, 1500),
(118, 157, 73, 1, 1000, 0, 1000),
(119, 158, 73, 1, 1000, 0, 1000),
(120, 159, 73, 1, 1000, 0, 1000),
(121, 160, 75, 1, 500, 0, 500),
(122, 161, 71, 2, 500, 0, 1000),
(123, 162, 75, 1, 500, 0, 500),
(124, 163, 70, 1, 10000, 0, 10000),
(125, 164, 99, 1, 1000, 0, 1000),
(126, 165, 79, 1, 200, 0, 200),
(127, 166, 101, 3, 4000, 0, 12000),
(128, 167, 102, 3, 1000, 0, 3000),
(129, 168, 102, 2, 1000, 0, 2000),
(130, 169, 84, 1, 100, 0, 100),
(131, 170, 100, 1, 1000, 0, 1000),
(132, 171, 99, 98, 1000, 0, 98000),
(133, 172, 95, 1, 9000, 0, 9000),
(134, 173, 94, 1, 3000, 0, 3000),
(135, 174, 75, 1, 500, 0, 500),
(136, 175, 81, 1, 500, 0, 500),
(137, 176, 78, 1, 150, 0, 150),
(138, 177, 109, 1, 50000, 0, 50000),
(139, 178, 99, 1, 1000, 0, 1000),
(140, 179, 113, 2, 25000, 0, 50000),
(141, 180, 116, 1, 17000, 0, 17000),
(142, 181, 99, 1, 1000, 0, 1000),
(143, 182, 116, 1, 17000, 0, 17000),
(144, 183, 118, 2, 5000, 0, 10000),
(145, 184, 78, 1, 150, 0, 150);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `osb_area`
--

INSERT INTO `osb_area` (`id`, `order`, `status`, `name`) VALUES
(1, 1, 2, 'Mumbai'),
(6, 2, 1, 'NaviMumbai');

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `osb_category`
--

INSERT INTO `osb_category` (`id`, `order`, `status`, `name`, `parent`) VALUES
(1, 1, 2, 'Mobile', 0),
(2, 2, 1, 'Personal computer', 0),
(3, 3, 2, 'Laptops', 0),
(4, 4, 2, 'Baby', 1),
(5, 4, 1, 'Beauty', 1),
(6, 5, 1, 'Books', 1),
(7, 5, 1, 'Car & Motorbike', 1),
(8, 4, 1, 'Clothing & Accessories', 1),
(9, 4, 1, 'Computers & Accessories', 1),
(10, 0, 1, 'Electronics', 1),
(11, 0, 1, 'Gift Cards', 1),
(12, 0, 1, 'Gourment & Speciality Foods', 1),
(13, 0, 1, 'Health & Personal Care', 1),
(14, 0, 1, 'Home & Kitchen', 1),
(15, 0, 1, 'Jewellery', 1),
(16, 0, 1, 'Kindle Store', 1),
(17, 0, 1, 'KiranaNow', 1),
(18, 0, 1, 'Luggage & Bags', 1),
(19, 0, 1, 'Movies & TV Shows', 1),
(20, 0, 1, 'Music', 1),
(21, 0, 1, 'Musical Instruments', 1),
(22, 0, 1, 'Office Products', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=462 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `osb_request`
--

INSERT INTO `osb_request` (`id`, `userfrom`, `userto`, `requeststatus`, `amount`, `reason`, `approvalreason`, `timestamp`, `requestid`) VALUES
(374, 1, 30, 2, '100000', '', '', '2015-07-08 11:12:16', 0),
(375, 1, 37, 2, '10000', '', '', '2015-07-08 11:13:11', 0),
(376, 1, 30, 3, '100000', '', '', '2015-07-08 11:16:00', 0),
(377, 1, 30, 3, '100000', '', '', '2015-07-08 11:15:57', 0),
(378, 37, 40, 1, 'NaN', 'undefined', '', '2015-07-08 13:17:19', 0),
(379, 1, 30, 2, '5000', 'Add bal', 'leeeeeeeeeeee', '2015-07-08 13:34:12', 0),
(380, 1, 30, 3, '95000', '', '', '2015-07-08 13:37:37', 0),
(381, 1, 40, 3, '95000', '', '', '2015-07-09 04:59:36', 0),
(382, 30, 43, 2, '1000', 'Jan', '', '2015-07-08 13:38:49', 0),
(383, 37, 42, 3, 'NaN', 'undefined', '', '2015-07-09 10:43:27', 0),
(384, 1, 30, 3, '7500', 'Gv it', '', '2015-07-09 04:53:06', 0),
(385, 1, 30, 1, '9500', 'Test apprvl', '', '2015-07-09 05:01:15', 0),
(386, 30, 43, 2, '500', 'Tryyyy', '', '2015-07-09 06:01:51', 0),
(387, 1, 30, 1, '150000', '', '', '2015-07-09 07:30:02', 0),
(388, 1, 30, 1, '150000', '', '', '2015-07-09 07:30:12', 0),
(389, 1, 30, 1, '6500', 'Test notifi', '', '2015-07-09 11:05:52', 0),
(390, 1, 42, 2, '100000', '', '', '2015-07-09 11:19:42', 0),
(391, 1, 42, 2, '10000', '', '', '2015-07-09 11:23:17', 0),
(392, 1, 42, 3, '500', 'Test dec', 'not interested', '2015-07-09 11:29:39', 0),
(393, 37, 35, 2, '1000', 'Give me an apple', 'Accept', '2015-08-04 06:55:28', 0),
(394, 35, 37, 2, '9000', 'Fgdgfyffg', '', '2015-08-04 07:37:08', 0),
(395, 35, 37, 3, '5000', 'Teat', '', '2015-08-04 07:37:14', 0),
(396, 35, 37, 2, '7000', 'Something', 'Ohk tk it last', '2015-08-04 07:38:29', 0),
(397, 1, 35, 2, '80000', '', 'last test', '2015-08-04 07:42:17', 0),
(398, 1, 37, 2, '4000', 'Gv me balanfe', 'Lastttttttttttttttt', '2015-08-04 07:42:27', 0),
(399, 37, 30, 1, '100', 'Fhsvsdh', '', '2015-08-17 12:42:50', 0),
(400, 1, 35, 1, '30000', '', '', '2015-08-27 05:35:25', 0),
(401, 1, 35, 1, '20000', '', '', '2015-08-27 05:58:53', 0),
(402, 1, 35, 1, '20000', '', '', '2015-08-27 06:00:07', 0),
(403, 1, 30, 1, '2220', '', '', '2015-11-23 09:57:45', 0),
(404, 45, 46, 1, '2000', 'Xyz', '', '2015-11-26 13:24:24', 0),
(405, 45, 47, 2, '1000', 'Rrr', 'Rrr', '2015-11-26 13:33:07', 0),
(406, 1, 37, 1, '100000', '', '', '2015-11-27 13:58:10', 0),
(407, 1, 34, 1, '20000', 'Test', '', '2015-11-28 11:53:02', 0),
(408, 1, 34, 2, '20000', 'Test', 'Approved', '2015-11-28 13:20:42', 0),
(409, 1, 34, 2, '5000', 'Test', 'Le le', '2015-11-28 13:30:58', 0),
(410, 34, 35, 2, '5000', 'Test', 'Accept', '2015-11-30 06:34:11', 0),
(411, 34, 35, 2, '5000', 'Badge', 'Accept', '2015-12-08 11:20:08', 0),
(412, 1, 34, 1, '5000', '', '', '2015-11-30 09:07:05', 0),
(413, 1, 35, 2, '5000', '', '', '2015-12-01 13:33:26', 0),
(414, 1, 35, 2, '100000', '', '', '2015-12-01 13:35:59', 0),
(415, 1, 35, 2, '100000', '', '', '2015-12-01 13:36:03', 0),
(416, 1, 35, 2, '100000', '', '', '2015-12-01 13:36:06', 0),
(417, 1, 35, 2, '100000', '', '', '2015-12-01 13:42:20', 0),
(418, 0, 0, 2, '100000', 'svadv', 'avds', '2015-12-01 13:45:17', 0),
(419, 1, 34, 1, '10000', '', '', '2015-12-02 06:45:55', 0),
(420, 1, 34, 1, '5000', 'grerg', '', '2015-12-02 06:51:46', 0),
(421, 30, 34, 2, '2000', 'Test', 'mg', '2015-12-02 06:58:13', 0),
(422, 34, 47, 1, '5200', '', '', '2015-12-02 07:01:21', 0),
(423, 34, 47, 1, '5200', '', '', '2015-12-02 07:01:56', 0),
(424, 34, 47, 1, '200', '', '', '2015-12-02 07:02:33', 0),
(425, 34, 35, 2, '200', 'rgerg', 'Noti', '2015-12-08 11:22:38', 0),
(426, 34, 35, 2, '200', 'uydghtb', 'noti icon', '2015-12-08 11:25:31', 0),
(427, 0, 0, 3, '20000', '', '', '2015-12-03 13:27:42', 0),
(428, 0, 0, 2, '100000', '', '', '2015-12-03 13:28:58', 0),
(429, 0, 0, 2, '10000', '', '', '2015-12-03 13:30:21', 0),
(430, 0, 0, 2, '100000', '', '', '2015-12-03 13:30:33', 0),
(431, 0, 0, 2, '10000', '', '', '2015-12-03 13:30:34', 0),
(432, 1, 30, 1, '10000', '', '', '2015-12-03 13:32:09', 0),
(433, 1, 30, 2, '100000', '', '', '2015-12-03 13:35:57', 0),
(434, 1, 34, 2, '100000', '', '', '2015-12-03 13:35:57', 0),
(435, 30, 34, 2, '5000', 'Shirt', '', '2015-12-03 13:51:26', 0),
(436, 37, 47, 1, 'NaN', '', '', '2015-12-04 04:55:12', 0),
(437, 30, 40, 1, '0', '', '', '2015-12-04 07:25:20', 0),
(438, 1, 30, 2, '10000', 'Done', '', '2015-12-05 06:31:22', 0),
(439, 35, 37, 2, '10000', '', 'Ydyfuuf', '2015-12-08 08:10:44', 0),
(440, 1, 34, 2, '1000', 'kpokpk', '', '2015-12-08 09:55:47', 0),
(441, 1, 37, 1, '100000', '', '', '2015-12-08 10:05:09', 0),
(442, 1, 30, 2, '28000', 'Want balance', 'ok jst tk it', '2015-12-08 10:26:42', 0),
(443, 1, 30, 2, '68700', 'Heyyyyy gv me balnace', 'tk ittttttttttttttt', '2015-12-08 11:09:11', 0),
(444, 35, 30, 1, '2000', 'Notification test', '', '2015-12-08 12:14:19', 0),
(445, 35, 30, 1, '2000', 'Hshs', '', '2015-12-08 12:16:44', 0),
(446, 31, 33, 1, '100', 'Gsggd', '', '2015-12-15 10:31:38', 0),
(447, 31, 34, 2, '1200', 'Ask', 'He''ll', '2015-12-15 10:33:53', 0),
(448, 1, 31, 2, '1000000', 'Dummy', 'le le', '2015-12-15 10:34:52', 0),
(449, 34, 31, 2, '50000', '', 'Dn', '2015-12-17 07:19:34', 0),
(450, 31, 34, 2, '5000', '', '', '2015-12-19 18:00:44', 0),
(451, 49, 48, 2, '5000', '', '', '2015-12-17 07:35:45', 0),
(452, 49, 48, 2, '95000', '', '', '2015-12-18 07:29:09', 0),
(453, 1, 49, 2, '200000', '', '', '2015-12-17 07:50:19', 0),
(454, 31, 35, 1, '99', '', '', '2015-12-17 08:28:15', 0),
(455, 49, 48, 2, '100000', 'My', '', '2015-12-18 07:43:31', 0),
(456, 48, 49, 2, '50000', '', '', '2015-12-18 07:53:16', 0),
(457, 48, 49, 2, '10000', '', '', '2015-12-18 07:55:39', 0),
(458, 49, 48, 2, '50000', '', '', '2015-12-18 08:08:25', 0),
(459, 49, 48, 2, '50000', '', '', '2015-12-18 08:11:51', 0),
(460, 48, 49, 2, '1000', '', '', '2015-12-18 10:20:21', 0),
(461, 48, 49, 2, '4000', 'Mobile', '', '2015-12-18 12:25:52', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `osb_shopphoto`
--

INSERT INTO `osb_shopphoto` (`id`, `user`, `photo`) VALUES
(1, 43, 'image-89788-43-1435992876.jpg'),
(2, 43, 'image-29354-43-1435992880.jpg'),
(3, 43, 'image-78150-43-1435992883.jpg'),
(4, 35, 'image-47183-35-1448954686.jpg'),
(5, 35, 'image-16078-35-1448954721.jpg'),
(6, 35, 'image-15314-35-1448954733.jpg'),
(7, 30, 'image-65591-30-1448272531.jpg'),
(8, 30, 'image-34146-30-1448272547.jpg'),
(9, 30, 'image-26916-30-1448272577.jpg'),
(10, 45, 'download12.jpg'),
(11, 45, 'images_(1)14.jpg'),
(12, 45, 'images_(2)11.jpg'),
(13, 45, 'images_(3)3.jpg'),
(14, 34, 'image-79355-34-1448861491.jpg'),
(15, 37, 'image-99298-37-1448958098.jpg'),
(16, 37, 'image-9976-37-1448958057.jpg'),
(17, 37, 'image-400-37-1448954239.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `osb_shopproductphoto`
--

CREATE TABLE IF NOT EXISTS `osb_shopproductphoto` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `osb_shopproductphoto`
--

INSERT INTO `osb_shopproductphoto` (`id`, `user`, `photo`) VALUES
(1, 43, 'image-41884-43-1435992887.jpg'),
(2, 43, 'image-45693-43-1435992891.jpg'),
(3, 43, 'image-40684-43-1435992894.jpg'),
(4, 35, 'image-10566-35-1448955175.jpg'),
(5, 35, 'image-95978-35-1448955180.jpg'),
(6, 35, 'image-4828-35-1448955184.jpg'),
(7, 45, 'lenovo-vibe-p1m-pa1g0034in-400x400-imaec3g3m9sfwdwj.jpeg'),
(8, 45, 'mi-4i-mzb4343in-400x400-imae6zxfgr4xmme7.jpeg'),
(9, 45, 'motorola-moto-g-2nd-gen-lte-xt1068-400x400-imaebywmj4avpjwq.jpeg'),
(10, 34, 'image-39827-34-1448860487.jpg'),
(11, 37, 'image-51564-37-1448955079.jpg'),
(12, 37, 'image-84519-37-1448955090.jpg'),
(13, 37, 'image-22936-37-1448955097.jpg');

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
  `requestid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=319 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `osb_transaction`
--

INSERT INTO `osb_transaction` (`id`, `userto`, `userfrom`, `reason`, `amount`, `payableamount`, `timestamp`, `requestid`, `orderid`) VALUES
(217, 34, 1, '', '5000.0', '50000', '2015-07-06 13:10:55', 342, 0),
(218, 34, 30, 'ORDER ID: 150', '2000', '', '2015-07-06 13:12:30', 0, 150),
(219, 30, 34, 'ORDER ID: 151', '10000', '', '2015-07-06 13:12:33', 0, 151),
(220, 30, 34, 'ORDER ID: 152', '10000', '', '2015-07-06 13:13:22', 0, 152),
(221, 30, 34, 'Accepted', '30000', '', '2015-07-06 13:17:13', 0, 0),
(222, 30, 1, '', '2000.0', '20000', '2015-07-06 13:18:21', 344, 0),
(223, 34, 30, 'Ok but don''t forget next time to write tour reason', '20000', '', '2015-07-06 13:19:17', 0, 0),
(224, 30, 34, 'Did did', '10000', '', '2015-07-07 09:34:29', 0, 0),
(225, 30, 34, 'ORDER ID: 153', '8000', '', '2015-07-07 09:39:40', 0, 153),
(226, 34, 1, '', '10000.0', '100000', '2015-07-07 09:46:31', 349, 0),
(227, 34, 30, 'ORDER ID: 154', '50000', '', '2015-07-07 09:48:45', 0, 154),
(228, 34, 30, 'ttffhu', '10000', '', '2015-07-07 09:55:34', 0, 0),
(229, 37, 33, 'Handled', '5000', '', '2015-07-07 12:37:16', 0, 0),
(230, 33, 37, 'Happens', '5000', '', '2015-07-07 12:38:38', 0, 0),
(231, 37, 34, 'OK error push', '94500', '', '2015-07-07 13:00:22', 0, 0),
(232, 37, 34, 'ORDER ID: 155', '500', '', '2015-07-08 06:31:20', 0, 155),
(233, 37, 34, 'ORDER ID: 156', '1500', '', '2015-07-08 06:35:25', 0, 156),
(234, 34, 37, 'ORDER ID: 157', '1000', '', '2015-07-08 06:42:47', 0, 157),
(235, 30, 34, 'Ohkk', '500', '', '2015-07-08 08:46:57', 0, 0),
(236, 34, 30, 'ORDER ID: 158', '1000', '', '2015-07-08 08:50:42', 0, 158),
(237, 34, 30, 'ORDER ID: 159', '1000', '', '2015-07-08 09:04:21', 0, 159),
(238, 37, 30, 'ORDER ID: 160', '500', '', '2015-07-08 09:06:45', 0, 160),
(239, 37, 30, 'Hai', '5050', '', '2015-07-08 09:09:00', 0, 0),
(240, 30, 1, '', '10000.0', '100000', '2015-07-08 11:12:39', 374, 0),
(241, 37, 1, '', '5000.0', '10000', '2015-07-08 11:16:09', 375, 0),
(242, 30, 1, '', '500.0', '5000', '2015-07-08 13:36:31', 379, 0),
(243, 43, 30, '', '1000', '', '2015-07-08 13:38:49', 0, 0),
(244, 30, 31, 'amt', 'rean', 'pay', '2015-07-09 05:21:35', 0, 0),
(245, 30, 1, 'amt', 'reans', 'pay', '2015-07-09 05:22:50', 0, 0),
(246, 35, 1, 'reasn', '210', '410', '2015-07-09 05:50:05', 0, 0),
(247, 33, 34, 'test', '150', '300', '2015-07-09 05:51:00', 0, 0),
(248, 43, 30, '', '500', '', '2015-07-09 06:01:51', 0, 0),
(249, 42, 1, '', '10000.0', '100000', '2015-07-09 11:20:24', 390, 0),
(250, 42, 1, '', '1000.0', '10000', '2015-07-09 11:24:33', 391, 0),
(251, 35, 37, 'ORDER ID: 161', '1000', '', '2015-08-04 06:51:17', 0, 161),
(252, 37, 35, 'ORDER ID: 162', '500', '', '2015-08-04 06:53:20', 0, 162),
(253, 35, 37, 'Accept', '1000', '', '2015-08-04 06:55:28', 0, 0),
(254, 37, 35, '', '9000', '', '2015-08-04 07:37:08', 0, 0),
(255, 35, 1, '', '8000.0', '80000', '2015-08-04 07:49:54', 397, 0),
(256, 37, 1, '', '2000.0', '4000', '2015-08-04 07:51:03', 398, 0),
(257, 30, 37, 'ORDER ID: 163', '10000', '', '2015-08-17 12:45:06', 0, 163),
(258, 34, 30, 'ORDER ID: 164', '1000', '', '2015-10-13 07:16:52', 0, 164),
(259, 47, 45, 'Rrr', '1000', '', '2015-11-26 13:33:07', 0, 0),
(260, 37, 45, 'ORDER ID: 165', '200', '', '2015-11-26 13:41:52', 0, 165),
(261, 47, 45, 'ORDER ID: 166', '12000', '', '2015-11-26 14:11:10', 0, 166),
(262, 45, 47, 'ORDER ID: 167', '3000', '', '2015-11-27 10:37:25', 0, 167),
(263, 45, 47, 'ORDER ID: 168', '2000', '', '2015-11-27 10:40:00', 0, 168),
(264, 43, 37, 'ORDER ID: 169', '100', '', '2015-11-27 13:59:44', 0, 169),
(265, 34, 1, '', '2000.0', '20000', '2015-11-28 13:31:37', 408, 0),
(266, 34, 1, '', '500.0', '5000', '2015-11-28 13:32:11', 409, 0),
(267, 34, 35, 'ORDER ID: 170', '1000', '', '2015-11-30 06:22:20', 0, 170),
(268, 34, 35, 'ORDER ID: 171', '98000', '', '2015-11-30 06:26:15', 0, 171),
(269, 35, 34, 'ORDER ID: 172', '9000', '', '2015-11-30 06:28:15', 0, 172),
(270, 35, 34, 'Accept', '5000', '', '2015-11-30 06:34:11', 0, 0),
(271, 35, 1, '', '500.0', '5000', '2015-12-01 13:35:12', 413, 0),
(272, 35, 1, '', '10000.0', '100000', '2015-12-01 13:36:43', 414, 0),
(273, 35, 1, '', '10000.0', '100000', '2015-12-01 13:37:00', 414, 0),
(274, 35, 1, '', '10000.0', '100000', '2015-12-01 13:38:04', 414, 0),
(275, 35, 1, '', '10000.0', '100000', '2015-12-01 13:38:17', 414, 0),
(276, 35, 1, '', '10000.0', '100000', '2015-12-01 13:40:43', 415, 0),
(277, 35, 1, '', '10000.0', '100000', '2015-12-01 13:41:45', 416, 0),
(278, 35, 1, '', '10000.0', '100000', '2015-12-01 13:43:19', 417, 0),
(279, 34, 30, 'mg', '2000', '', '2015-12-02 06:58:13', 0, 0),
(280, 35, 1, '', '10000.0', '100000', '2015-12-03 13:34:23', 417, 0),
(281, 30, 1, '', '10000.0', '100000', '2015-12-03 13:36:11', 433, 0),
(282, 30, 1, '', '10000.0', '100000', '2015-12-03 13:36:13', 433, 0),
(283, 34, 1, '', '10000.0', '100000', '2015-12-03 13:36:36', 434, 0),
(284, 37, 34, 'ORDER ID: 173', '3000', '', '2015-12-03 13:45:45', 0, 173),
(285, 34, 30, '', '5000', '', '2015-12-03 13:51:26', 0, 0),
(286, 37, 35, 'ORDER ID: 174', '500', '', '2015-12-03 13:57:00', 0, 174),
(287, 43, 35, 'ORDER ID: 175', '500', '', '2015-12-03 14:04:23', 0, 175),
(288, 43, 37, 'ORDER ID: 176', '150', '', '2015-12-04 05:35:53', 0, 176),
(289, 35, 33, 'ORDER ID: 177', '50000', '', '2015-12-04 13:28:51', 0, 177),
(290, 30, 1, '', '1000.0', '10000', '2015-12-05 06:44:48', 438, 0),
(291, 37, 35, 'Ydyfuuf', '10000', '', '2015-12-08 08:10:44', 0, 0),
(292, 34, 1, '', '100.0', '1000', '2015-12-08 09:58:04', 440, 0),
(293, 30, 1, '', '2800.0', '28000', '2015-12-08 10:27:37', 442, 0),
(294, 30, 1, '', '6870.0', '68700', '2015-12-08 11:09:41', 443, 0),
(295, 35, 34, 'Accept', '5000', '', '2015-12-08 11:20:08', 0, 0),
(296, 35, 34, 'Noti', '200', '', '2015-12-08 11:22:38', 0, 0),
(297, 35, 34, 'noti icon', '200', '', '2015-12-08 11:25:31', 0, 0),
(298, 34, 31, 'He''ll', '1200', '', '2015-12-15 10:33:53', 0, 0),
(299, 31, 1, '', '100000.0', '1000000', '2015-12-15 10:36:49', 448, 0),
(300, 34, 31, 'ORDER ID: 178', '1000', '', '2015-12-15 10:39:46', 0, 178),
(301, 31, 34, 'Dn', '50000', '', '2015-12-17 07:19:34', 0, 0),
(302, 48, 49, '', '5000', '', '2015-12-17 07:35:45', 0, 0),
(303, 49, 48, 'ORDER ID: 179', '50000', '', '2015-12-17 07:46:00', 0, 179),
(304, 49, 1, '', '10000.00', '200000', '2015-12-17 07:50:38', 453, 0),
(305, 48, 49, '', '95000', '', '2015-12-18 07:29:09', 0, 0),
(306, 48, 49, '', '100000', '', '2015-12-18 07:43:31', 0, 0),
(307, 49, 48, '', '50000', '', '2015-12-18 07:53:16', 0, 0),
(308, 49, 48, '', '10000', '', '2015-12-18 07:55:39', 0, 0),
(309, 48, 49, '', '50000', '', '2015-12-18 08:08:25', 0, 0),
(310, 48, 49, '', '50000', '', '2015-12-18 08:11:51', 0, 0),
(311, 49, 48, '', '1000', '', '2015-12-18 10:20:21', 0, 0),
(312, 49, 48, 'ORDER ID: 180', '17000', '', '2015-12-18 10:25:01', 0, 180),
(313, 34, 49, 'ORDER ID: 181', '1000', '', '2015-12-18 10:31:44', 0, 181),
(314, 49, 48, 'ORDER ID: 182', '17000', '', '2015-12-18 10:39:53', 0, 182),
(315, 49, 48, '', '4000', '', '2015-12-18 12:25:52', 0, 0),
(316, 49, 48, 'ORDER ID: 183', '10000', '', '2015-12-18 12:36:54', 0, 183),
(317, 34, 31, '', '5000', '', '2015-12-19 18:00:44', 0, 0),
(318, 43, 48, 'ORDER ID: 184', '150', '', '2015-12-23 06:25:48', 0, 184);

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
  `status` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `onlinestatus` varchar(255) NOT NULL,
  `moderated` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `sku`, `price`, `description`, `status`, `user`, `quantity`, `image`, `onlinestatus`, `moderated`) VALUES
(69, 'Trail', '', '2000', 'Lets try', 1, 33, 10, '', '', 0),
(70, 'iPhone 5C', '', '10000', 'Awesome Condition', 1, 30, 10, '', '', 1),
(71, 'Add me again', '', '500', 'description again', 1, 35, 10, 'image-58820--1448955836.jpg', '', 0),
(72, 'New Product', '', '3000', 'New', 1, 33, 10, '', '', 0),
(75, 'Apple', '', '500', 'dfghjk', 1, 37, 9, 'image-76915--1448955671.jpg', '', 1),
(76, 'New mobile', '', '2000', 'Nice condition', 1, 30, 10, 'image-34624-30-1436261875.jpg', '', 0),
(78, 'nexus', '', '150', 'nexus 6 by moto', 1, 43, 9, '', '1', 1),
(79, 'Wohlig', '', '200', 'Wohlig description', 1, 37, 10, 'image-94163--1448958118.jpg', '1', 1),
(80, 'Last search try', '', '130', 'Do DJ CH', 1, 37, 10, '', '1', 1),
(81, 'check note', '', '500', 'hiii', 1, 43, 10, '', '1', 1),
(82, 'Kenstar', '', '500', 'See Ifgg', 1, 37, 10, '', '1', 1),
(83, 'Onida', '', '200', 'Fuhdbd', 1, 37, 10, '', '', 0),
(84, 'Kirloskar', '', '100', 'drtgyh', 1, 43, 10, '', '1', 1),
(86, 'Cell phone', '', '3870', 'Dygg', 1, 37, 10, '', '', 0),
(87, 'Pop-up test', '', '500', 'Digging yay v', 1, 37, 10, '', '1', 0),
(88, 'sssss', '', '12', 'dsdgfd', 1, 43, 10, '', '', 0),
(89, 'Ushhs', '', '500', 'Tusvxu', 1, 37, 10, '', '1', 1),
(90, 'Test product', '', '5000', 'Desc', 1, 37, 10, '', '1', 1),
(91, 'Pd', '', '4000', 'Such that ettg', 1, 37, 10, '', '1', 1),
(92, 'Try last', '', '1000', 'Do go tr', 1, 37, 10, '', '1', 0),
(94, '43000', '', '3000', 'Fyjhehs', 1, 37, 10, '', '1', 1),
(95, '9000', '', '9000', 'xrdtgh', 1, 35, 10, 'image-90614--1448719141.jpg', '1', 1),
(97, 'Testing', '', '500', 'Ha n', 1, 37, 10, '', '', 0),
(98, 'Gsjakq days', '', '500', 'Gajahaf', 1, 37, 10, '', '1', 1),
(99, 'My first Product', '', '1000', 'kjksbwgjbsb', 1, 34, 8, '', '1', 1),
(100, 'Pushwoosh', '', '1000', 'Sigh gdtgv', 1, 34, 10, '', '1', 1),
(101, 'Sony Xperia z', '', '4000', 'Vvvvvv', 1, 47, 10, '', '1', 1),
(102, 'Xiomi', '', '1000', 'Ybg', 1, 45, 10, '', '1', 1),
(103, 'Test', '', '2000', 'Using', 1, 35, 10, 'image-57035--1448719360.jpg', '', 0),
(104, 'Buy Now', '', '1000', 'HSBC an HD', 1, 35, 10, 'image-58119--1448865085.jpg', '', 0),
(105, 'Image Test', '', '400', 'Dyfigyirtydutg', 1, 35, 10, 'image-69147--1448955736.jpg', '1', 1),
(106, 'Android Test', '', '1500', 'Kal Seen', 1, 35, 10, 'image-70376--1448955891.jpg', '1', 1),
(107, 'Iphone', '', '50000', 'Apple iphone', 0, 34, 10, '', '1', 1),
(108, 'Sagar', '', '2000', 'Shirts', 1, 30, 10, '', '1', 1),
(109, 'iPhone 6', '', '50000', 'Gold iphone 6', 1, 35, 0, '', '1', 1),
(112, 'Dhaval', '', '200', 'Hshs', 1, 35, 1, '', '', 0),
(113, 'Watch', '', '25000', 'I watch', 1, 49, 0, 'image-25696--1450338059.jpg', '1', 1),
(116, 'One Plus', '', '17000', 'Fun', 1, 49, 0, 'image-92282--1450434064.jpg', '1', 1),
(117, 'Cassandra', '', '5000', '28 pcs Dinner set', 0, 48, 10, 'image-39900--1450441781.jpg', '1', 1),
(118, 'Phone 75', '', '5000', 'Buy it', 1, 49, 8, '', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `productcategory`
--

CREATE TABLE IF NOT EXISTS `productcategory` (
  `id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=197 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productcategory`
--

INSERT INTO `productcategory` (`id`, `product`, `category`) VALUES
(96, 69, 2),
(97, 70, 1),
(98, 71, 3),
(99, 72, 1),
(102, 75, 2),
(103, 76, 1),
(106, 78, 1),
(108, 79, 2),
(110, 80, 2),
(113, 81, 2),
(116, 82, 2),
(117, 83, 1),
(120, 86, 1),
(122, 88, 1),
(124, 84, 2),
(125, 89, 1),
(126, 87, 1),
(132, 90, 1),
(135, 91, 1),
(138, 92, 1),
(143, 94, 1),
(145, 95, 14),
(148, 96, 3),
(149, 97, 1),
(151, 98, 2),
(152, 85, 1),
(154, 99, 1),
(155, 77, 1),
(157, 100, 2),
(163, 104, 2),
(166, 102, 1),
(167, 101, 1),
(168, 103, 1),
(169, 104, 1),
(174, 108, 8),
(175, 107, 1),
(177, 109, 1),
(181, 106, 2),
(182, 105, 2),
(183, 112, 3),
(185, 113, 1),
(187, 114, 1),
(192, 116, 1),
(194, 117, 14),
(196, 118, 1);

-- --------------------------------------------------------

--
-- Table structure for table `productimage`
--

CREATE TABLE IF NOT EXISTS `productimage` (
  `id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `personalcontact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `email`, `message`, `personalcontact`, `status`) VALUES
(1, 'srdtyui', 'dsfdw@jgdh.dvcag', 'xdcfgvhbjn', '8789798789', '2'),
(2, 'oiuyd', 'kjhgf@dfghj.gf', 'oiutrs', '9999999999', '2'),
(3, 'Dhaval', 'dhaval@wohlig.com', 'Test', '9029145088', '2'),
(5, 'Mahesh', 'mahesh@wohlig.com', 'M', '123456789', '1'),
(6, 'Dhaval', 'dhaval@wohlig.com', 'Hi', '9029145077', '1');

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
(1, 'Active'),
(2, 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `suggestion`
--

CREATE TABLE IF NOT EXISTS `suggestion` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `suggestion`
--

INSERT INTO `suggestion` (`id`, `user`, `message`, `timestamp`) VALUES
(1, 33, 'aaaaaaaaaaaaaa', '2015-07-06 05:38:54'),
(2, 30, 'Want Moto X 2nd Gen', '2015-07-06 09:49:14'),
(3, 30, 'test', '2015-07-06 10:00:18'),
(4, 34, 'fffbtbd dc cdg s d', '2015-07-07 09:42:49');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text,
  `personalcontact` varchar(50) NOT NULL,
  `accesslevel` int(11) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `socialid` varchar(255) DEFAULT NULL,
  `logintype` int(11) DEFAULT NULL,
  `json` text,
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
  `onlinestatus` varchar(255) NOT NULL,
  `shopstatus` varchar(50) NOT NULL,
  `os` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `message`, `personalcontact`, `accesslevel`, `timestamp`, `status`, `image`, `username`, `socialid`, `logintype`, `json`, `shopname`, `membershipno`, `address`, `description`, `website`, `shopcontact1`, `shopcontact2`, `shopemail`, `purchasebalance`, `salesbalance`, `area`, `shoplogo`, `percentpayment`, `token`, `billingaddress`, `billingcity`, `billingstate`, `billingcountry`, `billingpincode`, `shippingaddress`, `shippingcity`, `shippingcountry`, `shippingstate`, `shippingpincode`, `onlinestatus`, `shopstatus`, `os`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'admin@admin.com', '', '9867451212', 1, '2015-07-01 08:59:41', 1, NULL, '', '', 1, '', 'Admin Shop', '100', '', '', '', '', '', '', '100000', 100000, 0, '', '5', '0', '', '', '', '', '', '', '', '', '', '', '1', '1', ''),
(30, 'BBX', '81dc9bdb52d04dc20036dbd8313ed055', 'mumbaibbx@gmail.com', '', '9820035098', 2, '2015-07-01 09:14:21', 1, '', '', '', 1, '', 'BBX', '1234', 'Same as above', 'none', '', '655555554', '888888', 'bbx@gmail.com', '100000', 100000, 1, '', '10', 'e7NslPxjmdo:APA91bF3f51W03Z-oZ2cDMTB1SJ0n5z9tRZH9C6dx0WmFTgwJB6-y1dl89P-IikhQjlbuC4xesyW7297uugwwWYl77bZPC76aI_mWKbAABY7mMr61TuwdevyWw1DV7Pgz_XF8XUGCBdT', 'Sion mumbai', 'Mumbai', 'Maharashtra', 'India', '400808', '', '', '', '', '', '0', '2', 'Android'),
(31, 'My Holiday', '6562c5c1f33db6e05a082a88cddab5ea', 'myholiday@gmail.com', '', '9898989898', 3, '2015-07-01 09:19:38', 2, '', '', '', 1, '', 'My Holiday', '4567', 'Chembur', 'none', '', '55555555', '64545547', 'myhoilday@gmail.com', '1092800', 1049990, 6, '', '10', '0', 'Chembur', 'Mumbai', 'Maharashtra', 'India', '400745', '', '', '', '', '', '0', '2', 'null'),
(33, 'SR Communication Center', 'cdaeb1282d614772beb1e74c192bebda', 'sr@gmail.com', '', '9654873214', 3, '2015-07-01 09:21:55', 1, '', '', '', 1, '', 'SR Communication Center', '7890', 'Grant Road', 'none', '', '55555555', '64545547', 'sr@gmail.com', '50000', 100000, 1, 'image-93947-33-1448885489.jpg', '10', 'cN2DjPqa1Kk:APA91bHunRdiqHnY5eUTkFUKr-OO4Cth0_2cWaE_7rGdvJRQwDJQXlWtf0pxbKptayvnPsQr-Vu5Aa6zLFvcIxO5Q7Gm9Lo9yksVIqn7BdTUL7UgaeI5vE2ai31xLPLAPVAZYfwPKTcF', 'Grant Road', 'Mumbai', 'Maharashtra', 'India', '400415', '', '', '', '', '', '0', '1', 'Android'),
(34, 'Vijay Communication Center', 'a9b7ba70783b617e9998dc4dd82eb3c5', 'sr2@gmail.com', '', '9654873214', 3, '2015-07-01 09:21:55', 1, '', '', '', 1, '', 'Vijay Communication Center', '1000', 'Kalyan', 'none', '', '55555555', '64545547', 'sr1@gmail.com', '153600', 112800, 1, 'image-71084-34-1449979780.jpg', '10', 'ecc0247144b9d4338d07157a6162fc21e6e97c7661722462d7cb38af8b248310', 'kalyan west', 'Mumbai', 'Maharashtra', 'India', '400745', '', '', '', '', '', '0', '2', 'iOS'),
(35, 'Croma Shop', '08f90c1a417155361a5c4b8d297e0d78', 'pooja.wohlig@gmail.com', '', '9898989898', 3, '2015-07-01 09:19:38', 2, '', '', '', 1, '', 'Croma', '2000', 'Chembur', 'none', '', '55555555', '64545547', 'myhoilday@gmail.com', '795000', 825900, 1, 'image-89554-35-1449558762.jpg', '10', 'cN2DjPqa1Kk:APA91bHunRdiqHnY5eUTkFUKr-OO4Cth0_2cWaE_7rGdvJRQwDJQXlWtf0pxbKptayvnPsQr-Vu5Aa6zLFvcIxO5Q7Gm9Lo9yksVIqn7BdTUL7UgaeI5vE2ai31xLPLAPVAZYfwPKTcF', 'Chembur', 'Mumbai', 'Maharashtra', 'India', '400322', '', '', '', '', '', '0', '2', 'Android'),
(37, 'Dhaval', '1bd69c7df3112fb9a584fbd9edfc6c90', 'dhavalwohlig@gmail.com', 'Test', '9029145077', 3, '2015-07-04 04:25:18', 2, '', '', '', 1, '', 'My Shop', '4000', 'Nerul', 'Test', 'www.dhavalwohlig.com', '23232323', '64545547', 'dhavalwohlig@gmail.com', '99750', 90100, 6, 'image-91562-37-1448954247.jpg', '10', 'cABiMRVSVsU:APA91bFuilWpmBB2tnhLvQskGQxoofQeoX2vbv38KK-6BQzTw3XqngafBKVaWe-wgj9UoWyktEgTxTLSwWayIseyjcbLVusZs6kKdkKey7HKarlMVVhHpHgMTR5q0ZotwUBfjAePlXzI', 'Nerul', 'Navi Mumbai', 'Maharashtra', 'India', '400056', '', '', '', '', '', '0', '2', ''),
(40, 'asdfghj', 'a8b57189ddf86fb8b20bcafc00da3bec', 'avinash@wohlig.com', 'cvgbhjn', '89789789', 3, '2015-07-04 04:53:56', 1, '', '', '', 1, '', 'Triveni', '1245', '', '', '', '', '', '', '100000', 100000, 0, '', '50', '0', '', '', '', '', '', '', '', '', '', '', '0', '1', ''),
(42, 'sneha', 'e93028bdc1aacdfb3687181f2031765d', 'sneha@gmail.com', 'xdcvghj', '9898798787', 3, '2015-07-04 05:35:30', 1, '', '', '', 1, '', 'Metro', '3000', '', '', '', '', '', '', '100000', 100000, 0, '', '10', '0', '', '', '', '', '', '', '', '', '', '', '0', '1', 'Android'),
(43, 'trail new', '3644a684f98ea8fe223c713b77189a77', 'pratik@wohlig.com', 'cvbhn', '84545', 3, '2015-07-04 05:55:00', 1, '', '', '', 1, '', 'Axis', '200', '', 'A very good shop', 'www.axis.com', '9875696969', '0228564976', 'support@axis.com', '100000', 100000, 1, '', '50', '6ad8edf213c4a508b0a4bfa94458c85f75599f47284908c70cc81c0c40026168', 'Near sion Stn(east) Mumbai 400546', '', '', '', '', '', '', '', '', '', '0', '1', 'iOS'),
(44, 'Chirag', '21218cca77804d2ba1922c33e0151105', 'chirag.9966@gmail.com', 'cwcbw', '999999999', 3, '2015-11-23 09:04:38', 2, '', '', '', 1, '', 'chirag', '8888', 'bhbhbc', 'bkhjbhb', '', '', '', '', '100000', 100000, 1, '', '', 'null', '', '', '', '', '', '', '', '', '', '', '1', '2', ''),
(45, 'Tushar', '202cb962ac59075b964b07152d234b70', 't@s.com', '', '1245346523', 1, '2015-11-25 10:59:58', 2, 'images13.jpg', '', '', 1, '', 'Mera Shop', '9811', '', '', '', '', '', '', '86800', 55000, 1, '', '', 'null', '', '', '', '', '', '', '', '', '', '', '1', '0', ''),
(46, 'Mahesh', 'e10adc3949ba59abbe56e057f20f883e', 'mahesh@wohlig.com', '123', '12345678', 1, '2015-11-26 12:58:24', 1, 'banner2.jpg', '', '', 1, '', 'Mahesh Store', '8888', '', '', 'wohlig.com', '1234567', '1234567', 'mahesh@wohlig.com', '3000000', 3000, 0, 'banner2.jpg', '60', 'null', 'Sion West', 'Mumbai', 'Maharashtra', 'India', '400022', 'Mumbai sion', '', '', '', '', '1', '2', ''),
(47, 'Harsh', 'e10adc3949ba59abbe56e057f20f883e', 'harsh@wohlig.in', '123', '9999999999', 1, '2015-11-26 13:19:11', 1, '', '', '', 1, '', 'Harsh Electronics', '5555', 'Dombivli', '', '', '', '', '', '99995000', 99959000, 1, '', '', '4ed6e8f6c563c068', 'Dombivli', 'Mumbai', '', '', '', '', 'Mumbai', '', '', '', '1', '2', ''),
(48, 'Dhaval', 'd4a973e303ec37692cc8923e3148eef7', 'aaa@gmail.com', 'kjancjkc hbvjhsdbhvbs', '999999999', 3, '2015-12-17 07:30:06', 2, '', '', '0', 0, '0', 'ABCD', '8080', '', '', '', '', '', '', '50850', 100000, 0, 'image-60234-48-1450435702.jpg', '5', 'ecc0247144b9d4338d07157a6162fc21e6e97c7661722462d7cb38af8b248310', '', '', '', '', '', '', '', '', '', '', '0', '2', 'iOS'),
(49, 'Chirag Shah', 'df780a97b7d6a8f779f14728bccd3c4c', 'abab@gmail.com', '', '999999999', 1, '2015-12-17 07:32:40', 2, '', '', '0', 0, '0', '1234', '9090', '', '', '', '', '', '', '99000', 11000, 0, '', '5', 'e7NslPxjmdo:APA91bF3f51W03Z-oZ2cDMTB1SJ0n5z9tRZH9C6dx0WmFTgwJB6-y1dl89P-IikhQjlbuC4xesyW7297uugwwWYl77bZPC76aI_mWKbAABY7mMr61TuwdevyWw1DV7Pgz_XF8XUGCBdT', '', '', '', '', '', '', '', '', '', '', '0', '2', 'Android'),
(50, 'pooja', '4bcc674371a91bf32377cd878d754527', 'pooja@wohlig.com', '', '9594390024', 3, '2015-12-18 06:16:47', 1, 't5.jpg', '', '0', 0, '0', 'Hardwell', '5678', 'airoli', 'good', 'www.wohlig.com', '0227968451', '0227960000', 'abcsupport@email.com', '500', 700, 6, 't5.jpg', '10', '0', 'sec-4', 'navimumbai', 'maharashtra', 'india', '400708', 'aiorli', 'navimumbai', 'india', 'maharashtra', '400709', '1', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `usercategory`
--

CREATE TABLE IF NOT EXISTS `usercategory` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usercategory`
--

INSERT INTO `usercategory` (`id`, `user`, `category`) VALUES
(1, 43, 1),
(2, 35, 2),
(3, 37, 2);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesslevel`
--
ALTER TABLE `accesslevel`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`);

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
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suggestion`
--
ALTER TABLE `suggestion`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=294;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=185;
--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=146;
--
-- AUTO_INCREMENT for table `orderstatus`
--
ALTER TABLE `orderstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `osb_area`
--
ALTER TABLE `osb_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `osb_category`
--
ALTER TABLE `osb_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `osb_request`
--
ALTER TABLE `osb_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=462;
--
-- AUTO_INCREMENT for table `osb_requeststatus`
--
ALTER TABLE `osb_requeststatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `osb_shopphoto`
--
ALTER TABLE `osb_shopphoto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `osb_shopproductphoto`
--
ALTER TABLE `osb_shopproductphoto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `osb_transaction`
--
ALTER TABLE `osb_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=319;
--
-- AUTO_INCREMENT for table `osb_transactionstatus`
--
ALTER TABLE `osb_transactionstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=119;
--
-- AUTO_INCREMENT for table `productcategory`
--
ALTER TABLE `productcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=197;
--
-- AUTO_INCREMENT for table `productimage`
--
ALTER TABLE `productimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `suggestion`
--
ALTER TABLE `suggestion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `usercategory`
--
ALTER TABLE `usercategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
