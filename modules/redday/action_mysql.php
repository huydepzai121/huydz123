<?php

/**
 * @Project Module Nukeviet 4.x
 * @Author Webvang.vn (hoang.nguyen@webvang.vn)
 * @copyright 2014 J&A.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @createdate 08/10/2014 09:47
 */
if (!defined('NV_IS_FILE_MODULES'))
    die('Stop!!!');

$sql_drop_module = array();
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data;
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_city";

$sql_create_module = $sql_drop_module;
$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . " (
    id mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
    id_city mediumint(8) NOT NULL,
    date_forecast date NOT NULL,
    description varchar(255) NOT NULL,
    wind_speed int(11) NOT NULL,
    high_temperature float NOT NULL,
    low_temperature float NOT NULL,
    weight tinyint(4) NOT NULL,
    alias varchar(255) NOT NULL,
    avatar varchar(255) DEFAULT NULL,
    rain int(11) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=MyISAM;";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_city (
    id mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    ma_vung varchar(10) NOT NULL,
    quoc_gia varchar(255) NOT NULL,
    alias varchar(255) DEFAULT NULL
    PRIMARY KEY (id)
) ENGINE=MyISAM;";

// Thêm dữ liệu mẫu vào bảng city
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_city (`id`, `name`, `ma_vung`, `quoc_gia`,`alias`) VALUES
(1, 'Hà Nội', '01', 'Việt Nam', 'ha-noi'),
    (2, 'Hồ Chí Minh', '08', 'Việt Nam', 'ho-chi-minh'),
    (3, 'Đà Nẵng', '05', 'Việt Nam', 'da-nang'),
    (4, 'Hải Phòng', '03', 'Việt Nam', 'hai-phong'),
    (5, 'Cần Thơ', '07', 'Việt Nam', 'can-tho'),
    (6, 'An Giang', '15', 'Việt Nam', 'an-giang'),
    (7, 'Bà Rịa - Vũng Tàu', '16', 'Việt Nam', 'ba-ria-vung-tau'),
    (8, 'Bắc Giang', '17', 'Việt Nam', 'bac-giang'),
    (9, 'Bắc Kạn', '18', 'Việt Nam', 'bac-kan'),
    (10, 'Bạc Liêu', '19', 'Việt Nam', 'bac-lieu'),
    (11, 'Bắc Ninh', '20', 'Việt Nam', 'bac-ninh'),
    (12, 'Bến Tre', '21', 'Việt Nam', 'ben-tre'),
    (13, 'Bình Định', '22', 'Việt Nam', 'binh-dinh'),
    (14, 'Bình Dương', '23', 'Việt Nam', 'binh-duong'),
    (15, 'Bình Phước', '24', 'Việt Nam', 'binh-phuoc'),
    (16, 'Bình Thuận', '25', 'Việt Nam', 'binh-thuan'),
    (17, 'Cà Mau', '26', 'Việt Nam', 'ca-mau'),
    (18, 'Cao Bằng', '27', 'Việt Nam', 'cao-bang'),
    (19, 'Đắk Lắk', '28', 'Việt Nam', 'dak-lak'),
    (20, 'Đắk Nông', '29', 'Việt Nam', 'dak-nong'),
    (21, 'Điện Biên', '30', 'Việt Nam', 'dien-bien'),
    (22, 'Đồng Nai', '31', 'Việt Nam', 'dong-nai'),
    (23, 'Đồng Tháp', '32', 'Việt Nam', 'dong-thap'),
    (24, 'Gia Lai', '33', 'Việt Nam', 'gia-lai'),
    (25, 'Hà Giang', '34', 'Việt Nam', 'ha-giang'),
    (26, 'Hà Nam', '35', 'Việt Nam', 'ha-nam'),
    (27, 'Hà Tĩnh', '36', 'Việt Nam', 'ha-tinh'),
    (28, 'Hải Dương', '37', 'Việt Nam', 'hai-duong'),
    (29, 'Hậu Giang', '38', 'Việt Nam', 'hau-giang'),
    (30, 'Hòa Bình', '39', 'Việt Nam', 'hoa-binh'),
    (31, 'Hưng Yên', '40', 'Việt Nam', 'hung-yen'),
    (32, 'Khánh Hòa', '41', 'Việt Nam', 'khanh-hoa'),
    (33, 'Kiên Giang', '42', 'Việt Nam', 'kien-giang'),
    (34, 'Kon Tum', '43', 'Việt Nam', 'kon-tum'),
    (35, 'Lai Châu', '44', 'Việt Nam', 'lai-chau'),
    (36, 'Lâm Đồng', '45', 'Việt Nam', 'lam-dong'),
    (37, 'Lạng Sơn', '46', 'Việt Nam', 'lang-son'),
    (38, 'Lào Cai', '47', 'Việt Nam', 'lao-cai'),
    (39, 'Long An', '48', 'Việt Nam', 'long-an'),
    (40, 'Nam Định', '49', 'Việt Nam', 'nam-dinh'),
    (41, 'Nghệ An', '50', 'Việt Nam', 'nghe-an'),
    (42, 'Ninh Bình', '51', 'Việt Nam', 'ninh-binh'),
    (43, 'Ninh Thuận', '52', 'Việt Nam', 'ninh-thuan'),
    (44, 'Phú Thọ', '53', 'Việt Nam', 'phu-tho'),
    (45, 'Phú Yên', '54', 'Việt Nam', 'phu-yen'),
    (46, 'Quảng Bình', '55', 'Việt Nam', 'quang-binh'),
    (47, 'Quảng Nam', '56', 'Việt Nam', 'quang-nam'),
    (48, 'Quảng Ngãi', '57', 'Việt Nam', 'quang-ngai'),
    (49, 'Quảng Ninh', '58', 'Việt Nam', 'quang-ninh'),
    (50, 'Quảng Trị', '59', 'Việt Nam', 'quang-tri'),
    (51, 'Sóc Trăng', '60', 'Việt Nam', 'soc-trang'),
    (52, 'Sơn La', '61', 'Việt Nam', 'son-la'),
    (53, 'Tây Ninh', '62', 'Việt Nam', 'tay-ninh'),
    (54, 'Thái Bình', '63', 'Việt Nam', 'thai-binh'),
    (55, 'Thái Nguyên', '64', 'Việt Nam', 'thai-nguyen'),
    (56, 'Thanh Hóa', '65', 'Việt Nam', 'thanh-hoa'),
    (57, 'Thừa Thiên Huế', '66', 'Việt Nam', 'thua-thien-hue'),
    (58, 'Tiền Giang', '67', 'Việt Nam', 'tien-giang'),
    (59, 'Trà Vinh', '68', 'Việt Nam', 'tra-vinh'),
    (60, 'Tuyên Quang', '69', 'Việt Nam', 'tuyen-quang'),
    (61, 'Vĩnh Long', '70', 'Việt Nam', 'vinh-long'),
    (62, 'Vĩnh Phúc', '71', 'Việt Nam', 'vinh-phuc'),
(63, 'Yên Bái', '72', 'Việt Nam', 'yen-bai');";

$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . " (`id`, `id_city`, `date_forecast`, `description`, `wind_speed`, `high_temperature`, `low_temperature`, `weight`, `alias`, `avatar`, `rain`) VALUES
(1, 1, '2023-11-16', '', 30, 19, 15, 1, 'ha-noi', '/huydz/uploads/weather/32_1.png', 0),
(2, 1, '2023-11-17', '', 56, 20, 17, 2, 'ha-noi', '/huydz/uploads/weather/32_2.png', 0),
(3, 1, '2023-11-18', '', 26, 22, 15, 3, 'ha-noi', '/huydz/uploads/weather/32_3.png', 0),
(4, 1, '2023-11-19', '', 21, 23, 16, 4, 'ha-noi', '/huydz/uploads/weather/32_4.png', 0),
(5, 1, '2023-11-20', '', 16, 25, 16, 5, 'ha-noi', '/huydz/uploads/weather/30_1.png', 0),
(6, 1, '2023-11-21', '', 12, 23, 18, 6, 'ha-noi', '/huydz/uploads/weather/32_5.png', 0),
(7, 1, '2023-11-22', '', 15, 27, 20, 7, 'ha-noi', '/huydz/uploads/weather/32_6.png', 0),
(8, 1, '2023-11-23', '', 17, 27, 20, 8, 'ha-noi', '/huydz/uploads/weather/44_3.png', 0),
(9, 1, '2023-11-24', '', 22, 26, 19, 9, 'ha-noi', '/huydz/uploads/weather/34_2.png', 0),
(10, 1, '2023-11-25', '', 31, 26, 19, 10, 'ha-noi', '/huydz/uploads/weather/30_2.png', 0),
(11, 1, '2023-11-26', '', 23, 24, 17, 11, 'ha-noi', '/huydz/uploads/weather/32_8.png', 0),
(12, 1, '2023-11-27', '', 22, 23, 17, 12, 'ha-noi', '/huydz/uploads/weather/32_12.png', 0),
(13, 1, '2023-11-28', '', 29, 26, 20, 13, 'ha-noi', '/huydz/uploads/weather/44_4.png', 0),
(14, 1, '2023-11-29', '', 28, 24, 18, 14, 'ha-noi', '/huydz/uploads/weather/32_10.png', 0),
(15, 1, '2023-11-30', '', 24, 21, 18, 15, 'ha-noi', '/huydz/uploads/weather/32_11.png', 0),
(16, 2, '2023-11-16', '', 29, 31, 22, 16, 'ho-chi-minh', '/huydz/uploads/weather/10.png', 13),
(17, 2, '2023-11-17', '', 29, 32, 22, 17, 'ho-chi-minh', '/huydz/uploads/weather/28_1.png', 1),
(18, 2, '2023-11-18', '', 26, 32, 22, 18, 'ho-chi-minh', '/huydz/uploads/weather/32_13.png', 0),
(19, 2, '2023-11-19', '', 23, 32, 22, 19, 'ho-chi-minh', '/huydz/uploads/weather/32_14.png', 0),
(20, 2, '2023-11-20', '', 16, 32, 23, 20, 'ho-chi-minh', '/huydz/uploads/weather/34_4.png', 2),
(21, 2, '2023-11-21', '', 16, 32, 23, 21, 'ho-chi-minh', '/huydz/uploads/weather/32_15.png', 0),
(22, 2, '2023-11-22', '', 17, 31, 22, 22, 'ho-chi-minh', '/huydz/uploads/weather/44_5.png', 0),
(23, 2, '2023-11-23', '', 14, 31, 23, 23, 'ho-chi-minh', '/huydz/uploads/weather/32_16.png', 0),
(24, 2, '2023-11-24', '', 15, 32, 23, 24, 'ho-chi-minh', '/huydz/uploads/weather/6.png', 26),
(25, 2, '2023-11-25', '', 13, 31, 23, 25, 'ho-chi-minh', '/huydz/uploads/weather/18.png', 14),
(26, 2, '2023-11-26', '', 14, 31, 23, 26, 'ho-chi-minh', '/huydz/uploads/weather/45.png', 14),
(27, 2, '2023-11-27', '', 15, 32, 23, 27, 'ho-chi-minh', '/huydz/uploads/weather/32_17.png', 0),
(28, 2, '2023-11-28', '', 29, 31, 23, 28, 'ho-chi-minh', '/huydz/uploads/weather/32_18.png', 0),
(29, 2, '2023-11-29', '', 20, 31, 23, 29, 'ho-chi-minh', '/huydz/uploads/weather/32_19.png', 0),
(30, 2, '2023-11-30', '', 16, 31, 23, 30, 'ho-chi-minh', '/huydz/uploads/weather/9_1.png', 12);
(31, 3, '2023-11-16', '', 31, 24, 20, 31, 'da-nang', '/huydz/uploads/weather/10_1.png', 21),
(32, 3, '2023-11-17', '', 31, 21, 20, 32, 'da-nang', '/huydz/uploads/weather/8_2.png', 10),
(33, 3, '2023-11-18', '', 25, 22, 21, 33, 'da-nang', '/huydz/uploads/weather/9_2.png', 12),
(34, 3, '2023-11-19', '', 23, 23, 21, 34, 'da-nang', '/huydz/uploads/weather/9_3.png', 10),
(35, 3, '2023-11-20', '', 25, 24, 21, 35, 'da-nang', '/huydz/uploads/weather/8_3.png', 9),
(36, 3, '2023-11-21', '', 20, 26, 21, 36, 'da-nang', '/huydz/uploads/weather/8_4.png', 6),
(37, 3, '2023-11-22', '', 19, 26, 21, 37, 'da-nang', '/huydz/uploads/weather/28_2.png', 3),
(38, 3, '2023-11-23', '', 20, 26, 21, 38, 'da-nang', '/huydz/uploads/weather/28_3.png', 3),
(39, 3, '2023-11-24', '', 22, 25, 21, 39, 'da-nang', '/huydz/uploads/weather/28_5.png', 4),
(40, 3, '2023-11-25', '', 24, 25, 22, 40, 'da-nang', '/huydz/uploads/weather/8_5.png', 8),
(41, 3, '2023-11-26', '', 29, 25, 23, 41, 'da-nang', '/huydz/uploads/weather/17.png', 28),
(42, 3, '2023-11-27', '', 22, 26, 23, 42, 'da-nang', '/huydz/uploads/weather/35.png', 43),
(43, 3, '2023-11-28', '', 22, 27, 24, 43, 'da-nang', '/huydz/uploads/weather/35_1.png', 47),
(44, 3, '2023-11-29', '', 20, 25, 23, 44, 'da-nang', '/huydz/uploads/weather/35_2.png', 61),
(45, 3, '2023-11-30', '', 22, 25, 23, 45, 'da-nang', '/huydz/uploads/weather/35_3.png', 70),
(46, 4, '2023-11-16', '', 30, 19, 15, 46, 'hai-phong', '/huydz/uploads/weather/32_27.png', 0),
(47, 4, '2023-11-17', '', 30, 21, 15, 47, 'hai-phong', '/huydz/uploads/weather/32_28.png', 0),
(48, 4, '2023-11-18', '', 26, 22, 15, 48, 'hai-phong', '/huydz/uploads/weather/32_29.png', 0),
(49, 4, '2023-11-19', '', 21, 23, 16, 49, 'hai-phong', '/huydz/uploads/weather/32_30.png', 0),
(50, 4, '2023-11-20', '', 16, 25, 16, 50, 'hai-phong', '/huydz/uploads/weather/32_31.png', 0),
(51, 4, '2023-11-21', '', 12, 27, 18, 51, 'hai-phong', '/huydz/uploads/weather/32_32.png', 0),
(52, 4, '2023-11-22', '', 15, 27, 20, 52, 'hai-phong', '/huydz/uploads/weather/32_33.png', 1),
(53, 4, '2023-11-23', '', 17, 26, 19, 53, 'hai-phong', '/huydz/uploads/weather/32_34.png', 0),
(54, 4, '2023-11-24', '', 22, 26, 19, 54, 'hai-phong', '/huydz/uploads/weather/32_35.png', 0),
(55, 4, '2023-11-25', '', 31, 24, 17, 55, 'hai-phong', '/huydz/uploads/weather/32_36.png', 0),
(56, 4, '2023-11-26', '', 33, 23, 17, 56, 'hai-phong', '/huydz/uploads/weather/32_37.png', 0),
(57, 4, '2023-11-27', '', 22, 26, 18, 57, 'hai-phong', '/huydz/uploads/weather/32_38.png', 0),
(58, 4, '2023-11-28', '', 29, 24, 18, 58, 'hai-phong', '/huydz/uploads/weather/32_39.png', 0),
(59, 4, '2023-11-29', '', 28, 21, 18, 59, 'hai-phong', '/huydz/uploads/weather/32_40.png', 0),
(60, 4, '2023-11-30', '', 24, 21, 18, 60, 'hai-phong', '/huydz/uploads/weather/32_41.png', 0);";
