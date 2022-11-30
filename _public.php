<?php
/**
 * @brief domino, a theme for Dotclear 2
 *
 * @package Dotclear
 * @subpackage Themes
 *
 * @copyright Franck Paul (carnet.franck.paul@gmail.com)
 * @copyright GPL-2.0
 */

namespace themes\domino;

if (!defined('DC_RC_PATH')) {
    return;
}

use l10n;
use dcCore;

l10n::set(__DIR__ . '/locales/' . \dcCore::app()->lang . '/main');

dcCore::app()->addBehavior('templateBeforeBlockV2', [__NAMESPACE__ . '\behaviorDominoTheme', 'templateBeforeBlock']);

class behaviorDominoTheme
{
    public static function templateBeforeBlock($b, $attr)
    {
        $params = [];
        if ($b == 'Entries' && isset($attr['exclude_current']) && $attr['exclude_current'] == 1) {
            if (!isset($params['sql'])) {
                $params['sql'] = '';
            }

            return
                "<?php\n" .
                '@$params["sql"] .= "AND P.post_url != \'".dcCore::app()->ctx->posts->post_url."\' ";' . "\n" .
                "?>\n";
        }
    }
}
