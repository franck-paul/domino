<?php
# -- BEGIN LICENSE BLOCK ----------------------------------
# This file is part of Domino, a theme for Dotclear 2.
#
# Copyright (c) Franck Paul and contributors
# carnet.franck.paul@gmail.com
#
# Licensed under the GPL version 2.0 license.
# A copy of this license is available in LICENSE file or at
# http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
# -- END LICENSE BLOCK ------------------------------------

if (!defined('DC_RC_PATH')) { return; }

$core->addBehavior('publicPrepend',array('behaviorDominoTheme','publicPrepend'));
$core->addBehavior('templateBeforeBlock',array('behaviorDominoTheme','templateBeforeBlock'));

class behaviorDominoTheme
{
	public static function publicPrepend($core)
	{
		$core->themes->loadModuleL10N($GLOBALS['__theme'],$GLOBALS['_lang'],'main');
	}

	public static function templateBeforeBlock($core,$b,$attr)
	{
	       if ($b == 'Entries' && isset($attr['exclude_current']) && $attr['exclude_current'] == 1)
	       {
				if( !isset($params['sql']) ) {
					$params['sql'] = '';
				}
		       return
		       "<?php\n".
		       '@$params["sql"] .= "AND P.post_url != \'".$_ctx->posts->post_url."\' ";'."\n".
		       "?>\n";
	       }
	}
}
