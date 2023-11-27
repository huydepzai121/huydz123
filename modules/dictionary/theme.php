<?php
if (!defined('NV_IS_MOD_DICTIONARY')) {
    die('Stop!!!');
}

/**
 * nv_theme_dictionary_main()
 *
 * @param mixed $array_data
 * @return string
 */



function nv_theme_dictionary_main($search_word, $found_word, $is_submit)
{
    global $module_info, $module_file;

    $xtpl = new XTemplate('main.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
    $xtpl->assign('SEARCH_WORD', htmlspecialchars($search_word, ENT_QUOTES));

    if ($is_submit) {
        if ($found_word) {
            $xtpl->assign('FOUND_WORD', $found_word);
            $xtpl->parse('main.result');
        } else {
            $xtpl->parse('main.no_result');
        }
    }

    $xtpl->parse('main');
    return $xtpl->text('main');
}



