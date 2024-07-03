<?php
namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class ufo_booking_addons extends Widget_Base
{

    public function get_name()
    {
        return 'ufo-booking-addons';
    }

    public function get_title()
    {
        return __('UFO Booking Addons', 'ufo');
    }

    public function get_categories()
    {
        return ['basic'];
    }

    public function get_icon()
    {
        return 'eicon-posts-group';
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Booking', 'ufo'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'currency',
            [
                'label' => esc_html__('Currency', 'ufo'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('€', 'ufo'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'r_title',
            [
                'label' => esc_html__('Regular Title', 'ufo'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Regular Price', 'ufo'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            's_title',
            [
                'label' => esc_html__('Sale Title', 'ufo'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Sale Price', 'ufo'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'sv_title',
            [
                'label' => esc_html__('Save Title', 'ufo'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('You Save', 'ufo'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'badge',
            [
                'label' => esc_html__('Badge', 'ufo'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Special Offer!', 'ufo'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'button1',
            [
                'label' => esc_html__('Inquiry Button Text', 'ufo'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Inquiry', 'ufo'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'button2_url',
            [
                'label' => esc_html__('Inquiry URL', 'ufo'),
                'type' => Controls_Manager::URL,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'button2',
            [
                'label' => esc_html__('Book Button Text', 'ufo'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Book Now', 'ufo'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'image',
            [
                'label' => esc_html__('Image', 'ufo'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control(
            'option_title',
            [
                'label' => esc_html__('Title', 'ufo'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Standard Room - $100', 'ufo'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'regular_price',
            [
                'label' => esc_html__('Regular Price', 'ufo'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('400', 'ufo'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'sale_price',
            [
                'label' => esc_html__('Sale Price', 'ufo'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('200', 'ufo'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'link',
            [
                'label' => esc_html__('Link', 'ufo'),
                'type' => Controls_Manager::URL,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'options',
            [
                'label' => esc_html__('Options', 'ufo'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'option_title' => esc_html__('Standard Room - $100', 'ufo'),
                    ],
                    [
                        'option_title' => esc_html__('Standard Room - $100', 'ufo'),
                    ],
                    [
                        'option_title' => esc_html__('Standard Room - $100', 'ufo'),
                    ],
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'booking_section_style',
            [
                'label' => __('Booking Content', 'ufo'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        ); // start style section
        $this->add_control(
            'title_colorv',
            [
                'label' => __('Regular Title Color', 'ufo'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .booking-price-details h3.r_title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ttypographyh',
                'label' => __('Regular Title Typography', 'ufo'),
                'selector' => '{{WRAPPER}} .booking-price-details h3.r_title',
            ]
        );
        $this->add_control(
            'stitle_colorv',
            [
                'label' => __('Sale Title Color', 'ufo'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .booking-price-details h3.s_title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sttypographyh',
                'label' => __('Sale Title Typography', 'ufo'),
                'selector' => '{{WRAPPER}} .booking-price-details h3.s_title',
            ]
        );
        $this->add_control(
            'svtitle_colorv',
            [
                'label' => __('Save Title Color', 'ufo'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .booking-price-details h3.sv_title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'svttypographyh',
                'label' => __('Save Title Typography', 'ufo'),
                'selector' => '{{WRAPPER}} .booking-price-details h3.sv_title',
            ]
        );
        $this->add_control(
            'rprice_colorv',
            [
                'label' => __('Regular Price Color', 'ufo'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .booking-price-details p.r_price' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'rpricetypographyh',
                'label' => __('Regular Price Typography', 'ufo'),
                'selector' => '{{WRAPPER}} .booking-price-details p.r_price',
            ]
        );
        $this->add_control(
            'sprice_colorv',
            [
                'label' => __('Sale Price Color', 'ufo'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .booking-price-details p.s_price' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'spricetypographyh',
                'label' => __('Sale Price Typography', 'ufo'),
                'selector' => '{{WRAPPER}} .booking-price-details p.s_price',
            ]
        );
        $this->add_control(
            'svprice_colorv',
            [
                'label' => __('Save Price Color', 'ufo'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .booking-price-details p.sv_price' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'svpricetypographyh',
                'label' => __('Save Price Typography', 'ufo'),
                'selector' => '{{WRAPPER}} .booking-price-details p.sv_price',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wrapper-Image-Bordernv',
                'label' => __('Wrapper Shadow', 'textdomain'),
                'selector' => '{{WRAPPER}} .booking-container',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'wrapper-backgroundv',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .booking-container',
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__('Wrapper Background', 'pixel-gallery'),
                    ],
                ],
            ]
        );
        $this->start_controls_tabs(
            'style_tabsav'
        );

        $this->start_controls_tab(
            'style_normal_tabav',
            [
                'label' => esc_html__('Button Normal', 'textdomain'),
            ]
        );
        $this->add_control(
            'nav_colorv',
            [
                'label' => __('Color', 'ufo'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .booking-buttons button' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ttttypographyh',
                'label' => __('Typography', 'ufo'),
                'selector' => '{{WRAPPER}} .booking-buttons button',
            ]
        );
        $this->add_responsive_control(
            'item-image-paddingnv',
            [
                'label' => esc_html__('Padding', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .booking-buttons button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'item-Image-Bordernv',
                'label' => __('Border', 'textdomain'),
                'selector' => '{{WRAPPER}} .booking-buttons button',
            ]
        );
        $this->add_responsive_control(
            'border-Image-radiusnv',
            [
                'label' => esc_html__('Border Radius', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .booking-buttons button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'slidernav-backgroun-hoverdva',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .booking-buttons button',
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__('Background', 'pixel-gallery'),
                    ],
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'style_hover_tabav',
            [
                'label' => esc_html__('Button Hover', 'textdomain'),
            ]
        );

        $this->add_control(
            'navh_colorv',
            [
                'label' => __('Color', 'ufo'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .booking-buttons button:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'slidernav-backgroun-hoverdv',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .booking-buttons button:hover',
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__('Background', 'pixel-gallery'),
                    ],
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'item-Image-Bordernhv',
                'label' => __('Border', 'textdomain'),
                'selector' => '{{WRAPPER}} .booking-buttons button:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $options = $settings['options'];

        include dirname(__FILE__) . '/layout.php';
    }

}

Plugin::instance()->widgets_manager->register(new ufo_booking_addons());