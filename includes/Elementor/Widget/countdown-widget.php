<?php
namespace Elementor; 

if ( ! defined( 'ABSPATH' ) ) exit; 

class Countdown_Widget extends Widget_Base {
	
	public function get_name() {
		return __( 'Countdown Widget', 'creatrix' );
	}
	
	public function get_title() {
		return __( 'Creatrix Countdown', 'creatrix' );
	}

	public function get_categories() {
		return [ 'creatrix' ];
	}

	public function get_icon() {
		return ' eicon-countdown';
	}

	protected function _register_controls() {

        $this->start_controls_section(
			'section_blog',
			[
				'label' => __( 'Countdown Style', 'creatrix' ),
			]
		);	

		$this->add_control(
            'counter_style',
            [
                'label'      => __('Choose Style', 'creatrix'),
                'type'       => Controls_Manager::SELECT,
                'default'    => 'style_1',
                'options'    => [
                    'style_1'          => __('Style 1', 'creatrix'),
                    'style_2'          => __('Style 2', 'creatrix'),
                ],
            ]
        );

		$this->end_controls_section();

        $this->start_controls_section(
			'section',
			[
				'label' => __( 'Count Down Timer', 'creatrix' ),
			]
		);

		$this->add_control(
			'timer_title',
			[
				'label' => __( 'Title', 'creatrix' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __( 'Default title', 'creatrix' ),
				'placeholder' => __( 'Type your title here', 'creatrix' ),
			]
		);

		$this->add_control(
            'title_tag',
            [
                'label'      => __('Title Tag', 'creatrix'),
                'type'       => Controls_Manager::SELECT,
                'default'    => 'h2',
                'options'    => [
                    'h1'          => __('h1', 'creatrix'),
                    'h2'          => __('h2', 'creatrix'),
                    'h3'          => __('h3', 'creatrix'),
                    'h4'          => __('h4', 'creatrix'),
                    'h5'          => __('h5', 'creatrix'),
                    'h6'          => __('h6', 'creatrix'),
                ],
            ]
        );

        $this->add_control(
			'future_date',
			[
				'label' => __( 'Select Date', 'creatrix' ),
				'type' => Controls_Manager::DATE_TIME,
				'dynamic' => [
					'active' => true,
				],
                'label_block' => true,
                'picker_options' => ['enableTime' => true]
			]
		);

		$this->add_control(
			'timer_format',
			[
				'label'      => __( 'Select Format', 'creatrix' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => 'YODHMS',
				'options'    => [					
					'YODHMS'          => __( 'Year / Month / Day / Hour / Minute / Second', 'creatrix' ),					
					'ODHMS'          => __( 'Month / Day/ Hour / Minute / Second', 'creatrix' ),					
					'DHMS'          => __( 'Day / Hour / Minute / Second', 'creatrix' ),
					'HMS'          => __( ' Hour / Minute / Second', 'creatrix' ),
					'MS'          => __( 'Minute / Second', 'creatrix' ),			
					'S'          => __( ' Second', 'creatrix' ),			
				],
			]
		);

        $this->add_control(
			'show_label',
			[
				'label' => __( 'Show Labels', 'creatrix' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'creatrix' ),
				'label_off' => __( 'Hide', 'creatrix' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);
       
		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'creatrix' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'text-left' => [
						'title' => __( 'Left', 'creatrix' ),
						'icon' => 'eicon-text-align-left',
					],
					'text-center' => [
						'title' => __( 'Center', 'creatrix' ),
						'icon' => 'eicon-text-align-center',
					],
					'text-right' => [
						'title' => __( 'Right', 'creatrix' ),
						'icon' => 'eicon-text-align-right',
					]
				]
			]
		);
		
		$this->end_controls_section();

        $this->start_controls_section(
			'section_count_down_title',
			[
				'label' => __( 'Title', 'creatrix' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'counter_style' => 'style_1',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( ' Title Typography', 'creatrix' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .creatrix-title.creatrix-heading-title',
			]
		);

		$this->add_control(
			'timer_title_color',
			[
				'label' => __( 'Title Color', 'creatrix' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .creatrix-title.creatrix-heading-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'timer_title_hover_color',
			[
				'label' => __( 'Title Hover Color', 'creatrix' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .creatrix-title.creatrix-heading-title:hover' => 'color: {{VALUE}};',
				],
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'section_count_down_style',
			[
				'label' => __( 'Timer Text', 'creatrix' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'numbers_typography',
				'label' => __( ' Number Typography', 'creatrix' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .numberDisplay',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'periods_typography',
				'label' => __( ' Period Typography', 'creatrix' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .periodDisplay',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Timer Color', 'creatrix' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .numberDisplay' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'label_color',
			[
				'label' => __( 'Text Color', 'creatrix' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .creatrix-count-down .creatrix-data-countdown-timer .periodDisplay' => 'color: {{VALUE}};',
					
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'flip_back_back',
				'types' => [ 'classic', 'gradient' ],			

				'selector' => '{{WRAPPER}} .creatrix-count-down .creatrix-data-countdown-timer .numberDisplay',
				'fields_options' => [
					'background' => [
						'frontend_available' => true,
					]
				],
			]
		);
		
        $this->end_controls_section();
		
        $this->start_controls_section(
			'section_count_timecrad',
			[
				'label' => __( 'Time Card', 'creatrix' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'counter_style' => 'style_2',
				],
			]
		);

		

		$this->start_controls_tabs(
			'style_timecard_tabs'
		);

		$this->start_controls_tab(
			'style_timecardnormal_tab',
			[
				'label' => __( 'Normal', 'creatrix' ),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'timecard_bg_normal',
				'label' => __( 'Background', 'creatrix' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .displaySection',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'style_timecardhover_tab',
			[
				'label' => __( 'Hover', 'creatrix' ),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'timecard_bg_hover',
				'label' => __( 'Background', 'creatrix' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .displaySection:hover',
			]
		);
		
		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

        $this->start_controls_section(
			'section_border_style',
			[
				'label' => __( 'Border', 'creatrix' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'has_border',
			[
				'label' => __( 'Border?', 'creatrix' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'label_off',
				'yes' => __( 'yes', 'creatrix' ),
				'no' => __( 'no', 'creatrix' ),
			]
        );

        $this->add_control(
			'border_style',
				[
					'label' => __( 'Border Style', 'creatrix' ),
					'type' => Controls_Manager::SELECT,
					'default' => 'none',
					'options' => [
						'solid'  => __( 'Solid', 'creatrix' ),
						'dashed' => __( 'Dashed', 'creatrix' ),
						'dotted' => __( 'Dotted', 'creatrix' ),
						'double' => __( 'Double', 'creatrix' ),
						'outset' => __( 'outset', 'creatrix' ),
						'groove' => __( 'groove', 'creatrix' ),
						'ridge' => __( 'ridge', 'creatrix' ),
						'inset' => __( 'inset', 'creatrix' ),
						'hidden' => __( 'hidden', 'creatrix' ),
						'none' => __( 'none', 'creatrix' ),
					],
					'condition' => [
					'has_border' => 'yes',
					],
					'selectors' => [
						'{{WRAPPER}} .creatrix-count-down .numberDisplay' => 'border-style: {{VALUE}};',
					],
				]
			);

		$this->add_control(
			'border_color',
			[
				'label' => __( 'Color', 'creatrix' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .creatrix-count-down .numberDisplay' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'has_border' => 'yes',
				],
			]
		);

		
		
		$this->add_control(
			'border_width',
			[
				'label' => __( 'Border Width', 'creatrix' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .creatrix-count-down .numberDisplay' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'has_border' => 'yes',
				],
			]
		);

		$this->add_control(
			'count_down_padding',
			[
				'label' => __( 'Padding', 'creatrix' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .creatrix-count-down .numberDisplay' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'has_border' => 'yes',
				],
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'creatrix' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .creatrix-count-down .numberDisplay' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'has_border' => 'yes',
				],
			]
		);

		$this->end_controls_section();

        $this->start_controls_section(
			'section_custom_code',
			[
				'label' => __( 'Custom Code', 'creatrix' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'custom_css',
			[
				'label' => __( 'Custom HTML', 'creatrix' ),
				'type' => \Elementor\Controls_Manager::CODE,
				'language' => 'css',
				'rows' => 20,
			]
		);

		$this->end_controls_section();
	}
	
	protected function render() {
		require_once plugin_dir_path( __FILE__ ) . '../render/countdown-render.php';
        /**
         * For editor preview mode
         */
        if(Plugin::$instance->editor->is_edit_mode()) { ?>
			<script>
				jQuery('.creatrix-data-countdown-timer').each(function() {
					var future_date = jQuery(this).attr('data-date') ;
					var label = jQuery(this).attr('data-labels') ;
					var displayFormat = jQuery(this).attr('data-format') ;
					var l=true;
					if(label == "true") {
						l= true;
					} else {
						l = false;
					}
					jQuery(this).countdowntimer({
						dateAndTime : future_date,
						labelsFormat : l,                
						displayFormat : displayFormat,
					});

				});
			</script> <?php
    	}
    }	    
}

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Countdown_Widget() );
?>