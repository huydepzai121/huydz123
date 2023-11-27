<?php
if (!defined('NV_IS_MOD_DICTIONARY')) {
    die('Stop!!!');
}

// Hàm đọc cache
function readCache($folder, $file) {
    $file_path = $folder . '/' . $file;
    if (file_exists($file_path)) {
        return unserialize(file_get_contents($file_path));
    }
    return [];
}

$data_folder = NV_ROOTDIR . '/modules/' . $module_file . '/data';

$search_word = $nv_Request->get_title('search_word', 'post,get', '');
$found_word = null;
$is_submit = !empty($search_word);

if ($is_submit) {
    $dictionary_list = readCache($data_folder, 'dictionary_list.txt');
    foreach ($dictionary_list as $word_arr) {
        if (strcasecmp($word_arr['words'], $search_word) === 0) {
            $found_word = $word_arr;
            break;
        }
    }
}


$contents = nv_theme_dictionary_main($search_word, $found_word, $is_submit);

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';