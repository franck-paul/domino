<?php
# -- BEGIN LICENSE BLOCK ----------------------------------
#
# This file is part of Domino, a Dotclear 2 theme.
#
# Copyright (c) Franck Paul and contributors
# http://open-time.net/
#
#
# Licensed under the GPL version 2.0 license.
# See LICENSE file or
# http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
#
# -- END LICENSE BLOCK ------------------------------------

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

?>