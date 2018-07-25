<?php
	$htmlhead_typekit = option('bnomei.htmlhead.typekit');
	if($htmlhead_typekit && str::length(trim($htmlhead_typekit)) > 0) {
		$typekiturl = 'https://use.typekit.net/'.$htmlhead_typekit;
		if(\Kirby\Toolkit\V::url($typekiturl)) {
			echo brick('script')
				->attr('src', $typekiturl).PHP_EOL;
			echo brick('script', 'try{Typekit.load({ async: true });}catch(e){}').PHP_EOL;
		}
	}
?>
