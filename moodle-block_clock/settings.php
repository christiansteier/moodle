<?php

	$settings->add(new admin_setting_heading(
	            'headerconfig',
	            get_string('headerconfig', 'block_clock'),
	            get_string('descconfig', 'block_clock')
	        ));
	 
	$settings->add(new admin_setting_configcheckbox(
	            'clock/Allow_HTML',
	            get_string('labelallowhtml', 'block_clock'),
	            get_string('descallowhtml', 'block_clock'),
	            '0'
	        ));


?>