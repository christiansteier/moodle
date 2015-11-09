<?php
class block_clock extends block_base {
    public function init() {
        $this->title = get_string('clock', 'block_clock');
    }
	public function get_content() {
	    if ($this->content !== null) {
	      return $this->content;
	    }
	 
	    $this->content         =  new stdClass;
	    if (! empty($this->config->text)) {
	    	$this->content->text = $this->config->text;
		}
		else {
			$this->content->text   = 'The content of our SimpleHTML block!';
		}
	    
	    $this->content->footer = '';
	 
	    return $this->content;
  }
	
	public function specialization() {
	  if (!empty($this->config->title)) {
	    $this->title = $this->config->title;
	  } else {
	    $this->config->title = '';
	  }
	 
	  if (empty($this->config->text)) {
	    $this->config->text = '<p><embed src="/moodle/blocks/clock/clock.swf" wmode="transparent" type="application/x-shockwave-flash" height="150" width="150" /></p>';
	  }    
	}
	
	public function instance_allow_multiple() {
  		return true;
	}
	
/* TODO: Tweak options to activate these
	public function instance_config_save($data) {
	   if(get_config('clock', 'Allow_HTML') == '1') {
	     $data->text = strip_tags($data->text);
	   }

	  // And now forward to the default implementation defined in the parent class
	   return parent::instance_config_save($data);
	}

// OR This one
 	public function instance_config_save($data) {
	   $data = stripslashes_recursive($data);
	   $this->config = $data;
	   return set_field('block_instance', 
	                    'configdata',
	                     base64_encode(serialize($data)),
	                    'id', 
	                    $this->instance->id);
	 }
*/
	public function hide_header() {
  		return false;
	}

	// change CSS/HTML
	public function html_attributes() {
    	$attributes = parent::html_attributes(); // Get default values
    	$attributes['class'] .= ' block_'. $this->name(); // Append our class to class attribute
    	return $attributes;
	}
	
	// control visibility
	public function applicable_formats() {
	  return array(
	           'site-index' => true,
	          'course-view' => true, 
	   'course-view-social' => false,
	                  'mod' => true, 
	             'mod-quiz' => false
	  );
	}
	
	//control cron
	public function cron() {
	    mtrace( "Hey, my cron script is running" );
	 
	    global $DB; // Global database object
 
	    // Get the instances of the block
	    $instances = $DB->get_records( 'block_instance', array('blockid'=>'clock') );
	 
	    // Iterate over the instances
	    foreach ($instances as $instance) {
	 
	        // Recreate block object
	        $block = block_instance('clock', $instance);
	 
	        // $block is now the equivalent of $this in 'normal' block
	        // usage, e.g.
	        $someconfigitem = $block->config->item2;
	    }
	}

} 

?>
