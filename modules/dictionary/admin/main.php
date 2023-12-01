<?php
$page_title = $lang_module['main'];

$data_folder = NV_ROOTDIR . '/modules/' . $module_file . '/data';

if (!file_exists($data_folder)) {
    @mkdir($data_folder, 0755);
}

function writeCache($folder, $file, $data) {
    $file_path = $folder . '/' . $file;
    return file_put_contents($file_path, serialize($data)) !== false;
}

function readCache($folder, $file) {
    $file_path = $folder . '/' . $file;
    if (file_exists($file_path)) {
        return unserialize(file_get_contents($file_path));
    }
    return false;
}

$search_word = isset($_GET['search_word']) ? $_GET['search_word'] : '';
$found_word = [];
$word = '';
$translation = '';
$description = '';
$spelling='';
$audioPath = '';
$loaitu = ''; // Thêm biến cho loại từ

if ($search_word) {
    $dictionary_list = readCache($data_folder, 'dictionary_list.txt') ?: [];
    foreach ($dictionary_list as $id => $entry) {
        if ($entry['words'] === $search_word) {
            $found_word = $entry;
            $word = $entry['words'];
            $translation = $entry['translation'];
            $spelling = $entry['spelling'];
            $description = $entry['description'];
            $audioPath = $entry['audioPath'] ?? '';
            $loaitu = $entry['loaitu'] ?? ''; // Lấy giá trị loại từ
            break;
        }
    }
}

$error = '';
$success = '';

if ($nv_Request->isset_request('submit', 'post')) {
    $word = $nv_Request->get_title('words', 'post', '');
    $translation = $nv_Request->get_title('translation', 'post', '');
    $description = $nv_Request->get_title('description', 'post', '');
    $spelling = $nv_Request->get_title('spelling', 'post', '');
    $loaitu = $nv_Request->get_title('loaitu', 'post', ''); // Lấy giá trị loại từ từ biểu mẫu

    if (empty($word) || empty($translation) || empty($description) || empty($spelling) || empty($loaitu)) {
        $error = $lang_module['error_required_translate'];
    } else {
        if (isset($_FILES['audioFile']) && $_FILES['audioFile']['error'] == 0) {
            $audio_file = $_FILES['audioFile'];
            $audio_file_name = time() . '_' . $audio_file['name'];
            $audio_file_tmp_path = $audio_file['tmp_name'];
            $audio_file_new_path = $data_folder . '/' . $audio_file_name;

            if (in_array(strtolower(pathinfo($audio_file_name, PATHINFO_EXTENSION)), ['mp3', 'wav', 'ogg'])) {
                if (move_uploaded_file($audio_file_tmp_path, $audio_file_new_path)) {
                    $audioPath = $audio_file_new_path;
                } else {
                    $error = "Không thể tải lên file âm thanh.";
                }
            } else {
                $error = "Định dạng file không được hỗ trợ.";
            }
        }

        $dictionary_list = readCache($data_folder, 'dictionary_list.txt') ?: [];
        $dictionary_id = array_key_exists('id', $found_word) ? $found_word['id'] : count($dictionary_list) + 1;

        $dictionary_list[$dictionary_id] = [
            'id' => $dictionary_id,
            'words' => $word,
            'translation' => $translation,
            'spelling' => $spelling,
            'description' => $description,
            'audioPath' => $audioPath,
            'loaitu' => $loaitu
        ];

        $result = writeCache($data_folder, 'dictionary_list.txt', $dictionary_list);
        $message = $result ? "Dữ liệu đã được lưu thành công!" : "Có lỗi xảy ra khi lưu dữ liệu!";
        $type = $result ? "success" : "error";
    }
}

$xtpl = new XTemplate('main.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
$xtpl->assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
$xtpl->assign('MODULE_NAME', $module_name);
$xtpl->assign('OP', $op);
$xtpl->assign('WORD', $word);
$xtpl->assign('TRANSLATION', $translation);
$xtpl->assign('DESCRIPTION', $description);
$xtpl->assign('SPELLING', $spelling);
$xtpl->assign('LOAITU', $loaitu); // Truyền giá trị loại từ cho biểu mẫu
$xtpl->assign('ALERT_MESSAGE', $message);
$xtpl->assign('ALERT_TYPE', $type);
$loai_tus = [
    'Tính từ' => 'Tính từ (Adjective)',
    'Động từ ' => 'Động từ (Verb)',
    'Danh từ' => 'Danh từ (Noun)',
    'Trạng từ' => 'Trạng từ (Adverb)',
    'Đại từ' => 'Đại từ (Pronoun)',
    'Liên từ' => 'Liên từ (Conjunction)',
    'Giới từ' => 'Giới từ (Preposition)'
];

foreach ($loai_tus as $key => $text) {
    $selected = ($loaitu == $key) ? 'selected' : '';
    $xtpl->assign('OPTION_VALUE', $key);
    $xtpl->assign('OPTION_TEXT', $text);
    $xtpl->assign('SELECTED', $selected);
    $xtpl->parse('main.loaitu_option');
}
if (!empty($found_word)) {
    $xtpl->parse('main.edit_form');
} else if ($search_word) {
    $xtpl->assign('NOT_FOUND', 'Không tìm thấy từ: ' . $search_word);
    $xtpl->parse('main.not_found');
}

// Hiển thị file âm thanh nếu có
if (!empty($audioPath)) {
    $audio_url = NV_BASE_SITEURL . 'modules/' . $module_file . '/data/' . basename($audioPath);
    $xtpl->assign('AUDIO_PATH', $audio_url);
    $xtpl->parse('main.has_audio');
}

$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
