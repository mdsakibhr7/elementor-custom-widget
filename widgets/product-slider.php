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
class Elementor_Product_grid_Widget extends \Elementor\Widget_Base {


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
		return 'product grid';
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
		return esc_html__( 'Product grid', 'elementor-list-widget' );
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
		return 'eicon-products';
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
		return [ 'product grid' ];
	}

	/**
	 * Render list widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'mShop' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'product-image',
			[
				'label'   => esc_html__( 'Image', 'mShop' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);

		$repeater->add_control(
			'product-title',
			[
				'label'   => esc_html__( 'Product Title', 'mShop' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => 'Product Title',
			]
		);

		$repeater->add_control(
			'product-price',
			[
				'label'   => esc_html__( 'Product Price', 'mShop' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '$99', 'mShop' ),
			]
		);

		$repeater->add_control(
			'button_text',
			[
				'label'   => esc_html__( 'Button Text', 'mShop' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Click me', 'mShop' ),
			]
		);

		$repeater->add_control(
			'btn_url_1',
			[
				'label' => esc_html__( 'Button URL', 'mShop' ),
				'type'  => \Elementor\Controls_Manager::URL,
			]
		);

		$this->add_control(
			'products',
			[
				'label'  => esc_html__( 'Repeater List', 'mShop' ),
				'type'   => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
//				'title_field' => '{{{ product_title }}}',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

        <div class="product-grid">
			<?php
			foreach ( $settings['products'] as $product ) { ?>
                <div class="product-box">
                    <div class="product-image">
                        <img src="<?php
						echo $product['product-image']['url']; ?>" alt="">
                    </div>
                    <div class="product-content">
                        <h3 class="title"><?php
							echo $product['product-title']; ?></h3>
                        <div class="price"><?php
							echo $product['product-price']; ?></div>
                        <button class="product-button"><?php
							echo $product['button_text'] ?></button>
                    </div>
                </div>
			<?php
			} ?>
        </div>

        <style>

            .product-grid {
                text-align: center;
                border-radius: 8px;
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                width: 1290px;
            }

            .product-image {
                width: 240px;
            }

            .product-box {
                background-color: #F9FAFC;
                padding: 30px !important;
                margin-bottom: 30px;
                border-radius: 8px;
            }


            .product-content .title {
                color: #00051E;
                font-family: Inria Serif;
                font-size: 18px;
                font-style: normal;
                font-weight: 700;
                line-height: 28px;
                padding-top: 30px;
            }

            .product-content .price {
                color: #ED4923;
                font-family: DM Sans;
                font-size: 18px;
                font-style: normal;
                font-weight: 400;
                line-height: 28px;
                padding-bottom: 15px;

            }

            .product-content .product-button {
                font-family: DM Sans;
                font-size: 18px;
                font-weight: 400;
                line-height: 28px;
                border-radius: 8px;
                border: 1px solid #ED4923;
                padding: 10px 70px 10px 70px;

            }

            .product-grid .product-links {
                padding: 0;
                margin: 0;
                list-style: none;
                position: absolute;
                bottom: 50px;
                right: 10px;
            }

            img.pic-1 {
                width: 140px;
                height: 192px;
            }

            .product-grid .price {

            }

            .elementor-column-gap-default > .elementor-column > .elementor-element-populated {
                padding: 0px;
            }

            @media screen and (max-width: 990px) {
                .product-grid {
                    margin-bottom: 30px;
                }
            }

        </style>


		<?php
	}


}