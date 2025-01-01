<?php


class My_Custom_Widget extends WP_Widget{
        public function __construct() {  
        parent::__construct(
            "my_custom_widget",
            "My Custom Widget",
            array(
                "description" => "Display recent post and a static message"
            )
        );
    }

    //display widget to admin panel
    public function form($instance)
    {
        ?>
<p>
    <label for="widget_title">Title: </label>
    <input type="text" name="" id="" value="">
</p>
<p>
    <label for="">Display Type</label>
    <select name="" id="">
        <option value="">Recent Post</option>
        <option value="">Static Message</option>
    </select>
</p>

<p id="mcw_display_recent_post">
    <label for="">Number Of Post</label>
    <input type="number" name="" id="" value="" class="">
</p>
<p id="mcw_display_custom_message">
    <label for="">Your Message</label>
    <input type="text" name="" id="" value="">
</p>
<?php
    }
    //save widget setting to wp
    public function update( $new_instance, $old_instance ) {
		//
	}


    //Display widget to frontend
    public function widget( $args, $instance ) {
        //
	}

   

}