<div class="booking-wrapper">
    <div class="booking-container">
        <div class="booking-image-container">
            <?php echo wp_get_attachment_image($settings['image']['id'], 'full', '', ['class'=>'booking-room-image'])?>
           <?php if(!empty($settings['badge'])){?>
            <span class="booking-badge"><?php echo esc_html($settings['badge']);?></span>
            <?php }?>
        </div>
        <div class="booking-details-container">
            <select id="booking-room-dropdown" data-currency="<?php echo esc_attr($settings['currency']);?>">
                <?php foreach ($options as $option){?>
                    <option
                            value="<?php echo esc_attr($option['_id']);?>"
                            data-regular-price="<?php echo esc_attr($option['regular_price']);?>"
                            data-sale-price="<?php echo esc_attr($option['sale_price']);?>"
                            data-link="<?php echo esc_attr($option['link']['url']);?>">
                        <?php echo esc_html($option['option_title']);?>
                    </option>
                <?php } ?>
            </select>
            <div class="booking-price-details">
                <h3 class="r_title"><?php echo esc_html($settings['r_title']);?></h3>
                <p class="r_price" id="booking-regular-price">0</p>
                <h3 class="s_title"><?php echo esc_html($settings['s_title']);?></h3>
                <p class="s_price" id="booking-sale-price">0</p>
                <h3 class="sv_title"><?php echo esc_html($settings['sv_title']);?></h3>
                <p class="sv_price" id="booking-savings-amount">0</p>
            </div>
            <div class="booking-buttons">
                <a href="<?php echo esc_attr($settings['button2_url']['url']);?>"><button id="booking-inquiry-button"><?php echo esc_html($settings['button1']);?></button></a>
                <a href="#" id="booking-book-button"><button><?php echo esc_html($settings['button2']);?></button></a>
            </div>
        </div>
    </div>
</div>