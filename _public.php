<?php
/**
 * @brief domino, a theme for Dotclear 2
 *
 * @package Dotclear
 * @subpackage Themes
 *
 * @copyright Olivier Meunier & Association Dotclear
 * @copyright GPL-2.0-only
 */

namespace themes\domino;

if (!defined('DC_RC_PATH')) {return;}

\l10n::set(dirname(__FILE__) . '/locales/' . $_lang . '/main');

$core->addBehavior('templateBeforeBlock', array(__NAMESPACE__ . '\behaviorDominoTheme', 'templateBeforeBlock'));

class behaviorDominoTheme
{
    public static function templateBeforeBlock($core, $b, $attr)
    {
        if ($b == 'Entries' && isset($attr['exclude_current']) && $attr['exclude_current'] == 1) {
            if (!isset($params['sql'])) {
                $params['sql'] = '';
            }
            return
                "<?php\n" .
                '@$params["sql"] .= "AND P.post_url != \'".$_ctx->posts->post_url."\' ";' . "\n" .
                "?>\n";
        }
    }
}
