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
$search_type = $nv_Request->get_int('rdb', 'post', 0); // 0 for exact phrase, 1 for any word
$found_words = [];
$is_submit = !empty($search_word);

if ($is_submit) {
    $dictionary_list = readCache($data_folder, 'dictionary_list.txt');

    if ($search_type == 0) {
        // Exact phrase search
        foreach ($dictionary_list as $word_arr) {
            if (strcasecmp($word_arr['words'], $search_word) === 0) {
                $found_words[] = $word_arr;
                break;
            }
        }
    } else {
        // Search for any word
        $search_words = explode(' ', $search_word);
        foreach ($dictionary_list as $word_arr) {
            foreach ($search_words as $word) {
                if (stripos($word_arr['words'], $word) !== false) {
                    $found_words[] = $word_arr;
                    break;
                }
            }
        }
    }
}

$contents = nv_theme_dictionary_main($search_word, $found_words, $is_submit);

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';

