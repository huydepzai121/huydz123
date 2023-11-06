<?php

/**
 * NukeViet Content Management System
 * @version 4.x
 * @author VINADES.,JSC <contact@vinades.vn>
 * @copyright (C) 2009-2021 VINADES.,JSC. All rights reserved
 * @license GNU/GPL version 2 or any later version
 * @see https://github.com/nukeviet The NukeViet CMS GitHub project
 */

if (!defined('NV_IS_FILE_ADMIN')) {
    exit('Stop!!!');
}

$xtpl = new XTemplate('main.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$page_title = $lang_module['main'];
$message = "";
$type = "success";
$weather = [];
// Thêm cache
$city_cache_file = NV_LANG_DATA . '_' . $module_name . '_city_data_' . NV_CACHE_PREFIX . '.cache';
$time_cache_file = NV_LANG_DATA . '_' . $module_name . '_time_period_data_' . NV_CACHE_PREFIX . '.cache';
$weather_cache_file = NV_LANG_DATA . '_' . $module_name . '_weather_data_' . NV_CACHE_PREFIX . '.cache';
    $cache_ttl = 600; // Thời gian cache là 600 giây = 10 phút

// Cache cho bảng city
if (($cache = $nv_Cache->getItem($module_name, $city_cache_file)) != false) {
    $citys = unserialize($cache);
} else {
    $citys = $db->query("SELECT id, name FROM " . NV_PREFIXLANG . "_" . $module_data. "_city")->fetchAll();
    $cache = serialize($citys);
    $nv_Cache->setItem($module_name, $city_cache_file, $cache, $cache_ttl);
}

// Cache cho bảng time
if (($cache = $nv_Cache->getItem($module_name, $time_cache_file)) != false) {
    $times = unserialize($cache);
} else {
    $times = $db->query("SELECT * FROM " . NV_PREFIXLANG . "_" . $module_data. "_time_period")->fetchAll();
    $cache = serialize($times);
    $nv_Cache->setItem($module_name, $time_cache_file, $cache, $cache_ttl);
}

$id = $nv_Request->get_int('id', 'get', 0);
$isEditing = $id > 0;

if ($nv_Request->get_int('submit', 'post', 0)) {
    $data = [
        'id_city' => $nv_Request->get_int('id_city', 'post', 0),
        'date_forecast' => $nv_Request->get_title('date_forecast', 'post', ''),
        'id_time_period' => $nv_Request->get_title('id_time_period', 'post', 0),
        'description' => $nv_Request->get_title('description', 'post', ''),
        'wind_speed' => $nv_Request->get_int('wind_speed', 'post', 0),
        'temperature_note' => $nv_Request->get_title('temperature_note', 'post', ''),
        'temperature_value' => $nv_Request->get_int('temperature_value', 'post', 0),
    ];
    if (isset($_FILES['avatar']) && !empty($_FILES['avatar']['name'])) {
        $upload = new NukeViet\Files\Upload($admin_info['allow_files_type'], $global_config['forbid_extensions'], $global_config['forbid_mimes'], NV_UPLOAD_MAX_FILESIZE, NV_MAX_WIDTH, NV_MAX_HEIGHT);
        $upload->setLanguage($lang_global);
        $path = NV_UPLOADS_REAL_DIR . '/' . $module_upload;

        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }

        // Xử lý file tải lên và lưu vào thư mục.
        $upload_info = $upload->save_file($_FILES['avatar'], $path, false, $global_config['nv_auto_resize']);

        if (!empty($upload_info['complete'])) {
            // Lưu đường dẫn tương đối của ảnh vào mảng $data.
            $data['avatar'] = NV_BASE_SITEURL . 'uploads/' . $module_upload . '/' . $upload_info['basename'];
        } else {
            // Xử lý lỗi tải lên, set 'avatar' thành chuỗi rỗng hoặc ghi log lỗi tùy bạn.
            $data['avatar'] = '';
        }
    } else {
        // Nếu không có file được tải lên, giữ nguyên giá trị avatar hiện tại hoặc set thành chuỗi rỗng.
        $data['avatar'] = isset($weather['avatar']) ? $weather['avatar'] : '';
    }
    if ($isEditing) {
        $sql = "UPDATE " . NV_PREFIXLANG . "_" . $module_data . " SET 
                `id_city` = :id_city,          
                `date_forecast` = :date_forecast,
                `id_time_period` = :id_time_period,
                `description` = :description,
                `wind_speed` = :wind_speed,
                `temperature_note` = :temperature_note,
                `temperature_value` = :temperature_value,
                `avatar`=:avatar
            WHERE 
                `id` = :id";
        $sth = $db->prepare($sql);
        $sth->bindParam(':id', $id, PDO::PARAM_INT);
    } else {
        $weight_query = $db->query("SELECT MAX(weight) as max_weight FROM " . NV_PREFIXLANG . "_" . $module_data);
        $max_weight = $weight_query->fetch();
        $new_weight = $max_weight['max_weight'] + 1;
        $sql = "INSERT INTO " . NV_PREFIXLANG . "_" . $module_data . " (
            `id_city`, `date_forecast`, `id_time_period`, `description`, 
            `wind_speed`, `temperature_note`, `temperature_value`, `weight`,`avatar`
        ) VALUES (
            :id_city, :date_forecast, :id_time_period, :description, 
            :wind_speed, :temperature_note, :temperature_value, :new_weight, :avatar
        )";
        $sth = $db->prepare($sql);
        $sth = $db->prepare($sql);
        // Bổ sung tham số mới cho weight
        $sth->bindParam(':new_weight', $new_weight, PDO::PARAM_INT);
    }

    foreach ($data as $key => $value) {
        $sth->bindParam(':' . $key, $data[$key]);
    }

    if ($sth->execute()) {
        $message = ($isEditing) ? "Cập nhật thành công!" : "Thêm mới thành công!";

        $weather_data = $db->query("SELECT * FROM " . NV_PREFIXLANG . "_" . $module_data)->fetchAll();
        $cache = serialize([$weather_data]);
        $nv_Cache->setItem($module_name, $weather_cache_file, $cache, $cache_ttl);
    } else {
        $message = "Có lỗi xảy ra: " . implode(' ', $sth->errorInfo());
        $type = "error";
    }
}

if ($isEditing) {
    $sql = "SELECT * FROM " . NV_PREFIXLANG . "_" . $module_data . " WHERE id=:id";
    $sth = $db->prepare($sql);
    $sth->bindParam(':id', $id, PDO::PARAM_INT);
    $sth->execute();
    $weather = $sth->fetch();
    $xtpl->assign('WEATHER', $weather);
} else {
    $weather = [
        'id_city' => 0,
        'date_forecast' => '',
        'id_time_period' => 0,
        'description' => '',
        'wind_speed' => '',
        'temperature_note' => '',
        'temperature_value' => '',
        'avatar'=>''
    ];
    $xtpl->assign('WEATHER', $weather);
}

foreach ($citys as $city) {
    $xtpl->assign('CITY_ID', $city['id']);
    $xtpl->assign('CITY_NAME', $city['name']);
    if ($weather['id_city'] == $city['id']) {
        $xtpl->assign('SELECTED_CITY', 'selected="selected"');
    } else {
        $xtpl->assign('SELECTED_CITY', '');
    }
    $xtpl->parse('main.city_loop');
}
foreach ($times as $time) {
    $xtpl->assign('TIME_ID', $time['id']);
    $xtpl->assign('TIME_NAME', $time['time_period']);
    if ($weather['id_time_period'] == $time['id']) {
        $xtpl->assign('SELECTED_TIME', 'selected="selected"');
    } else {
        $xtpl->assign('SELECTED_TIME', '');
    }
    $xtpl->parse('main.time_loop');
}
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('ALERT_MESSAGE', $message);
$xtpl->assign('ALERT_TYPE', $type);

$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';