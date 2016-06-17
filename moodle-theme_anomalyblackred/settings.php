<?php

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {

    // Tagline setting
    $name = 'theme_anomalyblackred/tagline';
    $title = get_string('tagline','theme_anomalyblackred');
    $description = get_string('taglinedesc', 'theme_anomalyblackred');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $settings->add($setting);

    // Custom CSS file
    $name = 'theme_anomalyblackred/customcss';
    $title = get_string('customcss','theme_anomalyblackred');
    $description = get_string('customcssdesc', 'theme_anomalyblackred');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $settings->add($setting);

}
