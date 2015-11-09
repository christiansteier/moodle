What is Jappix-mini?
-------

See project website: https://mini.jappix.com

Installation
-------------

Replace 'YOURTHEME' with real name of your theme.

Moodle 2.5
--------------
First download and unzip the archive.
```bash
wget https://github.com/christiansteier/moodle-theme_jappix_mini/archive/master.zip
unzip master.zip
```
Or use git.
```bash
git clone https://github.com/christiansteier/moodle-theme_jappix_mini.git
```
copy jquery folder to /moodle/theme/YOURTHEME/.
```bash
cp moodle-theme_jappix_mini/jquery /moodle/theme/YOURTHEME/
```
Open /moodle/theme/YOURTHEME/lib.php and and paste the following code into head section: 

```bash
function theme_YOURTHEME_page_init(moodle_page $page) {
    $page->requires->jquery();
    $page->requires->jquery_plugin('username', 'theme_YOURTHEME');
}
```
Open /moodle/theme/YOURTHEME/layout/general.php and paste the following code into head section:
```bash
<!-- Jappix Mini start -->
    
<script type="text/javascript">
$(function() {
        jQuery.ajaxSetup({cache: true});
        jQuery.getScript("https://static.jappix.com/php/get.php?l=en&t=js&g=mini.xml", function() {
        $(".chatbutton").on("click", "#startchat", function(event){
        disconnectMini();
        resetDB();
        MINI_GROUPCHATS = ["<?$search = array(" ","/");$replace = array("_","_");$text = "$COURSE->shortname";$text = str_replace($search,$replace,$text); echo $text;?>"];
        MINI_ANIMATE = true;
        MINI_NICKNAME = "<?php echo $USER->firstname; ?> <?php echo $USER->lastname; ?>";
        launchMini(false, true, "anonymous.jappix.com");
        });
    });
});
</script>

<!-- Jappix Mini end -->
```
Then find the line:
```bash
<div class="navbutton"><?php echo $PAGE->button; ?></div>
```
and change it to:
```bash
<div class="navbutton"><div class="chatbutton"><input id="startchat" value="Chat" type="button" /></div><?php echo $PAGE->button; ?></div>
```
