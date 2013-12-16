<form id="contact_form" name="contact_form" method="post" action="">
            <div class="row">
                <div class="six columns b0">
                    <div class="form-row field_text">
                        <label for="contact_first_name"><?php _e('First Name','smooththemes'); ?> </label><em>(<?php _e('required','smooththemes'); ?>)</em><br>
                        <input id="contact_first_name" class="input_text required" type="text" value="" tabindex="10" name ="contact_first_name" required="required">
                    </div>
                    <div class="form-row field_text">
                        <label for="contact_phone"><?php _e('Your Phone Number','smooththemes'); ?> </label><em>(<?php _e('optional','smooththemes'); ?>)</em><br>
                        <input id="contact_phone" class="input_text" type="text" value="" name ="contact_phone" tabindex="13" required="required">
                    </div>
                </div>
                <div class="six columns b0">
                    <div class="form-row field_text">
                        <label for="contact_last_name"><?php _e('Last Name','smooththemes'); ?> </label><em>(<?php _e('required','smooththemes'); ?>)</em><br>
                        <input id="contact_last_name" class="input_text required" type="text" value="" name ="contact_last_name" tabindex="12" required="required">
                    </div>
                    <div class="form-row field_text">
                        <label for="contact_email"><?php _e('Your E-Mail Address','smooththemes'); ?> </label><em>(<?php _e('required','smooththemes'); ?>)</em><br>
                        <input id="contact_email" class="input_text required" type="text" value="" tabindex="14" name ="contact_email" required="required">
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="row">
                <div class="four columns b0">
                    <div class="form-row field_text">
                        <label for="type_of_room"><?php _e("Type of Room", "smooththemes"); ?> </label><em>(<?php _e('optional','smooththemes'); ?>)</em><br>
                        <select style="width:100%" id="type_of_room" name="type_of_room" title="Room type" tabindex="15">
                            <option value="">--None--</option>
                            <option value="Pool View Suite">Pool View Suite</option>
                            <option value="Ocean View Suite">Ocean View Suite</option>
                            <option value="Garden Suite">Garden Suite</option>
                        </select>
                    </div>
                </div>
                <div class="four columns b0">
                    <div class="form-row field_text">
                        <label for="number_of_rooms"><?php _e("# of Rooms", "smooththemes"); ?> </label><em>(<?php _e('optional','smooththemes'); ?>)</em><br>
                        <select style="width:100%" id="number_of_rooms" name="number_of_rooms" title="# of Rooms" tabindex="16">
                            <option value="">--None--</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                        </select>
                    </div>
                </div>                
                <div class="four columns b0">
                    <div class="form-row field_text">
                        <label for="number_of_people"><?php _e("# of People", "smooththemes"); ?> </label><em>(<?php _e('optional','smooththemes'); ?>)</em><br>
                        <select style="width:100%" id="number_of_people" name="number_of_people" title="# of People" tabindex="17">
                            <option value="">--None--</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                        </select>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="row">
                <div class="six columns b0">
                    <div class="form-row field_text">
                        <label for="arrival"><?php _e('Arrival','smooththemes'); ?> </label><em>(<?php _e('optional','smooththemes'); ?>)</em><br>
                        <input id="arrival" class="input_text input_date" type="text" value="" tabindex="18" name ="arrival">
                    </div>
                    <div class="form-row field_text">
                        <label for="departure"><?php _e('Departure','smooththemes'); ?> </label><em>(<?php _e('optional','smooththemes'); ?>)</em><br>
                        <input id="departure" class="input_text input_date" type="text" value="" tabindex="19" name ="departure">
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="form-row field_textarea">
                <label for="contact_message"><?php _e('Message:','smooththemes'); ?> </label><br>
                <textarea id="contact_message" class="input_textarea" type="text" tabindex="20" value="" name ="contact_message" style="height:100px;"></textarea>
            </div>
            <div class="form-row field_submit">
                <input type="submit" value="<?php _e('Submit Now','smooththemes'); ?>" id="contact_submit" class="btn" tabindex="21">
                <span class="loading hide"><img src="<?php echo st_img('loader.gif'); ?>"></span>
            </div>
            <div class="form-row notice_bar">
                <p class="notice notice_ok hide"><?php _e('Thank you for contacting us. We will get back to you as soon as possible.','smooththemes'); ?></p>
                <p class="notice notice_error hide"><?php _e('Due to an unknown error, your form was not submitted. Please resubmit it or try later.','smooththemes'); ?></p>
            </div>
            <input type="hidden" name="to_email" value="<?php echo esc_attr($data['to_email']); ?>" />
</form> <!-- END #contact_form -->
<script>
(function($, window) {
    $(document).ready(function() {
        $('.input_date').datepicker();
    });
})(jQuery, window)
</script>