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
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_time_period";

$sql_create_module = $sql_drop_module;
$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . " (
    id mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
    id_city mediumint(8) NOT NULL,
    id_time_period mediumint(8) NOT NULL,
    date_forecast datetime NOT NULL,
    description varchar(255) NOT NULL,
    wind_speed int(11) NOT NULL,
    temperature_note varchar(255) NOT NULL,
    temperature_value float NOT NULL,
    weight tinyint(4) NOT NULL,
    avatar varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
) ENGINE=MyISAM;";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_city (
    id mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    ma_vung varchar(10) NOT NULL,
    quoc_gia varchar(255) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=MyISAM;";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_time_period (
    id mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
    time_period varchar(255) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=MyISAM;";

// Thêm dữ liệu mẫu vào bảng city
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_city (`id`, `name`, `ma_vung`, `quoc_gia`) VALUES
(1, 'Hà Nội', '01', 'Việt Nam'),
(2, 'Hồ Chí Minh', '08', 'Việt Nam'),
(3, 'Đà Nẵng', '05', 'Việt Nam'),
(4, 'Hải Phòng', '03', 'Việt Nam'),
(5, 'Cần Thơ', '07', 'Việt Nam'),
(6, 'An Giang', '15', 'Việt Nam'),
(7, 'Bà Rịa - Vũng Tàu', '16', 'Việt Nam'),
(8, 'Bắc Giang', '17', 'Việt Nam'),
(9, 'Bắc Kạn', '18', 'Việt Nam'),
(10, 'Bạc Liêu', '19', 'Việt Nam'),
(11, 'Bắc Ninh', '20', 'Việt Nam'),
(12, 'Bến Tre', '21', 'Việt Nam'),
(13, 'Bình Định', '22', 'Việt Nam'),
(14, 'Bình Dương', '23', 'Việt Nam'),
(15, 'Bình Phước', '24', 'Việt Nam'),
(16, 'Bình Thuận', '25', 'Việt Nam'),
(17, 'Cà Mau', '26', 'Việt Nam'),
(18, 'Cao Bằng', '27', 'Việt Nam'),
(19, 'Đắk Lắk', '28', 'Việt Nam'),
(20, 'Đắk Nông', '29', 'Việt Nam'),
(21, 'Điện Biên', '30', 'Việt Nam'),
(22, 'Đồng Nai', '31', 'Việt Nam'),
(23, 'Đồng Tháp', '32', 'Việt Nam'),
(24, 'Gia Lai', '33', 'Việt Nam'),
(25, 'Hà Giang', '34', 'Việt Nam'),
(26, 'Hà Nam', '35', 'Việt Nam'),
(27, 'Hà Tĩnh', '36', 'Việt Nam'),
(28, 'Hải Dương', '37', 'Việt Nam'),
(29, 'Hậu Giang', '38', 'Việt Nam'),
(30, 'Hòa Bình', '39', 'Việt Nam'),
(31, 'Hưng Yên', '40', 'Việt Nam'),
(32, 'Khánh Hòa', '41', 'Việt Nam'),
(33, 'Kiên Giang', '42', 'Việt Nam'),
(34, 'Kon Tum', '43', 'Việt Nam'),
(35, 'Lai Châu', '44', 'Việt Nam'),
(36, 'Lâm Đồng', '45', 'Việt Nam'),
(37, 'Lạng Sơn', '46', 'Việt Nam'),
(38, 'Lào Cai', '47', 'Việt Nam'),
(39, 'Long An', '48', 'Việt Nam'),
(40, 'Nam Định', '49', 'Việt Nam'),
(41, 'Nghệ An', '50', 'Việt Nam'),
(42, 'Ninh Bình', '51', 'Việt Nam'),
(43, 'Ninh Thuận', '52', 'Việt Nam'),
(44, 'Phú Thọ', '53', 'Việt Nam'),
(45, 'Phú Yên', '54', 'Việt Nam'),
(46, 'Quảng Bình', '55', 'Việt Nam'),
(47, 'Quảng Nam', '56', 'Việt Nam'),
(48, 'Quảng Ngãi', '57', 'Việt Nam'),
(49, 'Quảng Ninh', '58', 'Việt Nam'),
(50, 'Quảng Trị', '59', 'Việt Nam'),
(51, 'Sóc Trăng', '60', 'Việt Nam'),
(52, 'Sơn La', '61', 'Việt Nam'),
(53, 'Tây Ninh', '62', 'Việt Nam'),
(54, 'Thái Bình', '63', 'Việt Nam'),
(55, 'Thái Nguyên', '64', 'Việt Nam'),
(56, 'Thanh Hóa', '65', 'Việt Nam'),
(57, 'Thừa Thiên Huế', '66', 'Việt Nam'),
(58, 'Tiền Giang', '67', 'Việt Nam'),
(59, 'Trà Vinh', '68', 'Việt Nam'),
(60, 'Tuyên Quang', '69', 'Việt Nam'),
(61, 'Vĩnh Long', '70', 'Việt Nam'),
(62, 'Vĩnh Phúc', '71', 'Việt Nam'),
(63, 'Yên Bái', '72', 'Việt Nam');";

$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_time_period (`id`, `time_period`) VALUES
(1, 'Sáng'),
(2, 'Chiều'),
(3, 'Tối'),
(10, 'Đêm');";

$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . " (`id`, `id_city`, `date_forecast`, `id_time_period`, `description`, `wind_speed`, `temperature_note`, `temperature_value`, `weight`, `avatar`) VALUES
(1, 1, '2016-10-19', 1, 'Trời quang đãng, Gió mạnh', 25, 'Nhiệt độ cao hôm nay', 23, 1, '/nuke-viet/uploads/weather/rain-30203_5.jpg'),
(2, 1, '2016-10-19', 10, 'Trời quang đãng', 20, 'Nhiệt độ ctrung bình', 22, 2, '/nuke-viet/uploads/weather/rain-30203_8.jpg'),
(3, 1, '2016-10-20', 1, 'Trời trong', 16, 'Ngày mai ấm hơn,nhiệt độ tăng', 30, 3, '/nuke-viet/uploads/weather/rain-30203_9.jpg'),
(4, 1, '2016-10-20', 10, 'Trời trong, Gió nhẹ', 19, 'Nhiệt độ thấp vào đêm', 23, 4, '/nuke-viet/uploads/weather/rain-30203_10.jpg'),
(5, 1, '2016-10-21', 1, 'Trời trong, yên tĩnh', 4, 'Nhiệt độ cao', 30, 5, '/nuke-viet/uploads/weather/rain-30203_11.jpg'),
(6, 1, '2016-10-21', 10, 'Trời trong, yên tĩnh', 6, 'Nhiệt độ trung bình', 23, 6, '/nuke-viet/uploads/weather/rain-30203_12.jpg'),
(7, 2, '2016-10-19', 1, 'Mưa dông 20mm, Có mây, Gió nhẹ', 16, 'Nhiệt độ cao', 31, 7, '/nuke-viet/uploads/weather/rain-30203_13.jpg'),
(8, 2, '2016-10-19', 10, 'Mưa rào kèm sấm chớp 9 mm', 19, 'Nhiệt độ trung bình', 23, 8, '/nuke-viet/uploads/weather/rain-30203_14.jpg'),
(9, 2, '2016-10-20', 1, 'Mưa rào kèm sấm sét 9 mm', 19, 'Nhiệt độ trung bình', 23, 9, '/nuke-viet/uploads/weather/rain-30203_15.jpg'),
(10, 2, '2016-10-20', 10, 'Có mây rải rác, gió nhẹ', 11, 'Nhiệt độ thấp về đêm', 22, 10, '/nuke-viet/uploads/weather/rain-30203_16.jpg'),
(11, 2, '2016-10-21', 1, 'Mưa rào kèm sấm sét 3 mm', 18, 'Nhiệt độ cao', 31, 11, '/nuke-viet/uploads/weather/rain-30203_17.jpg'),
(12, 2, '2016-10-21', 10, 'Trời trong, gió nhẹ', 17, 'Nhiệt độ trung bình', 23, 12, '/nuke-viet/uploads/weather/rain-30203_18.jpg'),
(13, 3, '2016-10-19', 1, '&nbsp;\r\nTrời trong, gió nhẹ\r\n&nbsp;', 9, 'Nhiệt độ cao', 30, 13, '/nuke-viet/uploads/weather/rain-30203_19.jpg'),
(14, 3, '2016-10-19', 10, '&nbsp;\r\nTrời trong, gió nhẹ\r\n&nbsp;', 7, 'Nhiệt độ trung bình', 23, 14, '/nuke-viet/uploads/weather/rain-30203_20.jpg'),
(15, 3, '2016-10-20', 1, '&nbsp;\r\nTrời trong, gió nhẹ\r\n&nbsp;', 4, 'Nhiệt độ cao', 31, 15, '/nuke-viet/uploads/weather/rain-30203_21.jpg'),
(16, 3, '2016-10-20', 10, '&nbsp;\r\nTrời trong, gió nhẹ\r\n&nbsp;', 21, 'Nhiệt độ trung bình', 25, 16, '/nuke-viet/uploads/weather/rain-30203_22.jpg'),
(17, 3, '2016-10-21', 1, 'Mưa rào kèm sấm sét 3 mm,&nbsp;Có mây rải rác', 18, 'Nhiệt độ cao', 32, 17, '/nuke-viet/uploads/weather/rain-30203_23.jpg'),
(18, 3, '2016-10-21', 10, '&nbsp;\r\nTrời trong, gió nhẹ\r\n&nbsp;', 16, 'Nhiệt độ trung bình', 24, 18, '/nuke-viet/uploads/weather/rain-30203_24.jpg'),
(19, 4, '2016-10-19', 1, '&nbsp;\r\nTrời trong, gió nhẹ', 19, 'Nhiệt độ cao', 28, 19, '/nuke-viet/uploads/weather/rain-30203_25.jpg'),
(20, 4, '2016-10-19', 10, '&nbsp;\r\nTrời trong, gió nhẹ\r\n&nbsp;', 18, 'Nhiệt độ trung bình', 23, 20, '/nuke-viet/uploads/weather/rain-30203_26.jpg'),
(21, 4, '2016-10-20', 1, '&nbsp;\r\nTrời trong, gió nhẹ\r\n&nbsp;', 15, 'Nhiệt độ cao trong ngày', 32, 21, '/nuke-viet/uploads/weather/rain-30203_27.jpg'),
(22, 4, '2016-10-20', 10, '&nbsp;\r\nTrời trong, gió nhẹ\r\n&nbsp;', 19, 'Nhiệt độ trung bình', 23, 22, '/nuke-viet/uploads/weather/rain-30203_28.jpg'),
(23, 4, '2016-10-21', 1, '&nbsp;\r\nTrời trong, yên tĩnh\r\n&nbsp;', 5, 'Nhiệt độ cao trong ngày', 33, 23, '/nuke-viet/uploads/weather/rain-30203_29.jpg'),
(24, 4, '2016-10-21', 10, '&nbsp;\r\nTrời trong, gió nhẹ\r\n&nbsp;', 10, 'Nhiệt độ giảm so với ban ngày', 26, 24, '/nuke-viet/uploads/weather/rain-30203_30.jpg');";

