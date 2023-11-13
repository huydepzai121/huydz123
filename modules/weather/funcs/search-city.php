<?php
/**
 * NukeViet Content Management System
 * @version 4.x
 * @copyright VINADES.,JSC
 * @license GNU/GPL version 2 or any later version
 * @see https://github.com/nukeviet/nukeviet
 */

if (!defined('NV_IS_MOD_WEATHER')) {
    exit('Stop!!!');
}

$selectedCityName = '';
$array_data = array();

$selectedCityName = '';
$array_data = array();

// Kiểm tra xem có dữ liệu POST gửi lên từ form chưa
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy tên thành phố được chọn từ dữ liệu POST
    $selectedCityName = isset($_POST['id_city']) ? $_POST['id_city'] : '';
}

// Truy vấn dữ liệu thời tiết từ cơ sở dữ liệu dựa trên $cityName
$stmt = $db->prepare('SELECT ' . NV_PREFIXLANG . '_' . $module_data . '.id, ' . NV_PREFIXLANG . '_' . $module_data . '_city.name, date_forecast, description, wind_speed, high_temperature, low_temperature, avatar, rain FROM ' . NV_PREFIXLANG . '_' . $module_data . '
        INNER JOIN ' . NV_PREFIXLANG . '_' . $module_data . '_city 
        ON ' . NV_PREFIXLANG . '_' . $module_data . '.id_city=' . NV_PREFIXLANG . '_' . $module_data . '_city.id
        WHERE ' . NV_PREFIXLANG . '_' . $module_data . '_city.name LIKE :city_name');
$stmt->bindParam(':city_name', $selectedCityName, PDO::PARAM_STR);
$stmt->execute();
$array_data = $stmt->fetchAll();

$citys = $db->query('SELECT id, name FROM ' . NV_PREFIXLANG . '_' . $module_data . '_city')->fetchAll();

// Gọi hàm theme để xử lý và hiển thị dữ liệu
$contents = nv_theme_weather_search($array_data, $citys, $selectedCityName);

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
