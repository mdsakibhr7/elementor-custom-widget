<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor List Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Our_Team_Widget extends \Elementor\Widget_Base {


	/**
	 * Get widget name.
	 *
	 * Retrieve list widget name.
	 *
	 * @return string Widget name.
	 * @since 1.0.0
	 * @access public
	 */
	public function get_name() {
		return 'team';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve list widget title.
	 *
	 * @return string Widget title.
	 * @since 1.0.0
	 * @access public
	 */
	public function get_title() {
		return esc_html__( 'team', 'elementor-list-widget' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve list widget icon.
	 *
	 * @return string Widget icon.
	 * @since 1.0.0
	 * @access public
	 */
	public function get_icon() {
		return 'eicon-bullet-list';
	}

	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @return string Widget help URL.
	 * @since 1.0.0
	 * @access public
	 */
	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the list widget belongs to.
	 *
	 * @return array Widget categories.
	 * @since 1.0.0
	 * @access public
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the list widget belongs to.
	 *
	 * @return array Widget keywords.
	 * @since 1.0.0
	 * @access public
	 */
	public function get_keywords() {
		return [ 'team' ];
	}

	/**
	 * Register list widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Our Team', 'elementor-list-widget' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'image',
			[
				'label'   => esc_html__( 'Choose Image', 'textdomain' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'title-name',
			[
				'label'       => esc_html__( 'Name', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter your name', 'textdomain' ),
				'default' => 'DavidM. Cooper',
			]
		);
        $this->add_control(
			'title',
			[
				'label'       => esc_html__( 'Title', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter your title', 'textdomain' ),
				'default' => 'CEO & Founder',
			]
		);
		$this->add_control(
			'sub_title',
			[
				'label'       => esc_html__( 'Title', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter your title', 'textdomain' ),
				'default' => '01830108132',
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'social_icon',
			[
				'label'            => esc_html__( 'Icon', 'elementor' ),
				'type'             => \Elementor\Controls_Manager::ICONS,
				'fa4compatibility' => 'social',
				'default'          => [
					'value'   => 'fab fa-wordpress',
					'library' => 'fa-brands',
				],
				'recommended'      => [
					'fa-brands' => [
						'android',
						'apple',
						'behance',
						'bitbucket',
						'codepen',
						'delicious',
						'deviantart',
						'digg',
						'dribbble',
						'elementor',
						'facebook',
						'flickr',
						'foursquare',
						'free-code-camp',
						'github',
						'gitlab',
						'globe',
						'houzz',
						'instagram',
						'jsfiddle',
						'linkedin',
						'medium',
						'meetup',
						'mix',
						'mixcloud',
						'odnoklassniki',
						'pinterest',
						'product-hunt',
						'reddit',
						'shopping-cart',
						'skype',
						'slideshare',
						'snapchat',
						'soundcloud',
						'spotify',
						'stack-overflow',
						'steam',
						'telegram',
						'thumb-tack',
						'tripadvisor',
						'tumblr',
						'twitch',
						'twitter',
						'viber',
						'vimeo',
						'vk',
						'weibo',
						'weixin',
						'whatsapp',
						'wordpress',
						'xing',
						'yelp',
						'youtube',
						'500px',
					],
					'fa-solid'  => [
						'envelope',
						'link',
						'rss',
					],
				],
			]
		);

		$repeater->add_control(
			'link',
			[
				'label'       => esc_html__( 'Link', 'elementor' ),
				'type'        => \Elementor\Controls_Manager::URL,
				'default'     => [
					'is_external' => 'true',
				],
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => esc_html__( 'https://your-link.com', 'elementor' ),
			]
		);

		$this->add_control(
			'list',
			[
				'label'   => esc_html__( 'Repeater List', 'textdomain' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => [
					[
						'social_icon'  => esc_html__( 'Title #1', 'textdomain' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'textdomain' ),
					]
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render list widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings    = $this->get_settings_for_display();
		$social_item = $settings['list'];
		?>

        <div class="demo">
            <div class="our-team">
                <div class="team_img">
	                <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings ); ?>
                    <ul class="social">
		                <?php
		                foreach ( $social_item as $item ) { ?>
                            <li>
                                <a href="<?php
				                echo esc_url( $item['link']['url'] ) ?>"><i class="<?php echo esc_html( $item['social_icon']['value'] ) ?>"></i></a>
                            </li>
			                <?php
		                } ?>
                    </ul>
                </div>
                <div class="team-content">

	                <?php
	                $settings    = $this->get_settings_for_display();
	                echo '<h3 class="title-name">'. $settings['title-name'] .'</h3>';
	                ?>

                    <?php
                    $settings    = $this->get_settings_for_display();
                    echo '<h4 class="title">'. $settings['title'] .'</h4>';
                    ?>

	                <?php
	                $settings    = $this->get_settings_for_display();
	                echo '<h4 class="post">'. $settings['sub_title'] .'</h4>';
	                ?>

                </div>
            </div>
        </div>


        <style>
            .our-team{
                text-align: center;
            }
            .our-team .team_img{
                position: relative;
                overflow: hidden;
            }
            .our-team .team_img:after{
                content: "";
                width: 100%;
                height: 100%;
                background-color: rgba(255,255,255,0.2);
                position: absolute;
                bottom: -100%;
                left: 0;
                transition: all 0.3s ease 0s;
            }
            .our-team:hover .team_img:after{
                bottom: 0;
            }
            .our-team img{
                width: 100%;
                height: auto;
            }
            .our-team .social{
                padding: 0 0 18px 0;
                margin: 0;
                list-style: none;
                position: absolute;
                top: -100%;
                right: 10px;
                background: #f76c5e;
                border-radius: 0 0 20px 20px;
                z-index: 1;
                transition: all 0.3s ease 0s;
            }
            .our-team:hover .social{
                top: 0;
            }
            .our-team .social li a{
                display: block;
                padding: 15px;
                font-size: 15px;
                color: #fff;
            }
            .our-team:hover .social li a:hover{
                color: #2a4284;
            }
            .our-team .team-content{
                background: #fff;
            }

            .our-team .title-name {
                font-size: 24px;
                font-weight: 600;
                font-family: sans-serif;
                color: #2a4284;
                margin: 0;
                text-transform: capitalize;
            }

            .our-team .title{
                font-size: 18px;
                font-weight: 400;
                color: #2a4284;
                text-transform: capitalize;
                margin: 0 0 20px;
                position: relative;
            }

            .our-team .title:before{
                content: "";
                width: 25px;
                height: 1px;
                background: #27ae61;
                position: absolute;
                bottom: -10px;
                right: 50%;
                margin-right: 9px;
                transition-duration: 0.25s;
            }
            .our-team .title:after{
                content: "";
                width: 25px;
                height: 1px;
                background: #27ae61;
                position: absolute;
                bottom: -10px;
                left: 50%;
                margin-left: 9px;
                transition-duration: 0.25s;
            }
            .our-team:hover .title:before,
            .our-team:hover .title:after{
                width: 50px;
            }
            .our-team .post{
                display: inline-block;
                font-size: 15px;
                color:  #f76c5e;
                text-transform: capitalize;
            }
            .our-team .post:before{
                content: "";
                display: block;
                width: 7px;
                height: 7px;
                border-radius: 50%;
                background: #27ae61;
                margin: 0 auto;
                position: relative;
                top: -13px;
            }
            @media only screen and (max-width: 990px){
                .our-team{ margin-bottom: 30px; }
            }
        </style>

		<?php
	}


}