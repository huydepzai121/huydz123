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



function nv_theme_dictionary_main($search_word, $found_words, $is_submit)
{
    global $module_info, $module_file;

    $xtpl = new XTemplate('main.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
    $xtpl->assign('SEARCH_WORD', htmlspecialchars($search_word, ENT_QUOTES));

    if ($is_submit) {
        if (!empty($found_words)) {
            foreach ($found_words as $word) {
                // Gán giá trị cho từng thuộc tính của word
                $xtpl->assign('WORD', array(
                    'words' => $word['words'],
                    'translation' => $word['translation'],
                    'loaitu' => $word['loaitu'],
                    'description' => $word['description']
                ));
                $xtpl->parse('main.result.word');
            }
            $xtpl->parse('main.result');
        } else {
            $xtpl->parse('main.no_result');
        }
    }

    $xtpl->parse('main');
    return $xtpl->text('main');
}




