<?php

namespace PixelPerfect;

/**
 * Dialog class.
 *
 * @since 1.0
 */
class Dialog {

	/**
	 * Register hooks.
	 *
	 * @since 1.0
	 */
	public function hooks() {

		add_action( 'wp_footer', [ $this, 'add_dialog' ] );
		add_action( 'admin_footer', [ $this, 'add_dialog' ] );

		add_action( 'admin_enqueue_scripts' , [ $this, 'enqueue_styles' ] );
		add_action( 'wp_enqueue_scripts' , [ $this, 'enqueue_styles' ] );
	}

	/**
	 * Enqueue scripts.
	 *
	 * @since 1.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style(
			'pixel-perfect-dialog',
			PP_PLUGIN_URL . 'assets/css/dialog.css',
			[],
			'1.0'
		);
	}

	/**
	 * Add dialog.
	 *
	 * @since 1.0
	 */
	public function add_dialog() {

		?>
		<dialog id="pixel-perfect-dialog"
			open
			draggable="true"
			data-image="<?php echo WP_SITEURL . '/image.png'; ?>"
			></dialog>

		<script>
		const element = document.getElementById('pixel-perfect-dialog');
		let isDragging = false;
		let currentX;
		let currentY;
		let initialX;
		let initialY;
		let xOffset = 0;
		let yOffset = 0;

		// set element image from data attribute.
		element.style.backgroundImage = `url( ${element.dataset.image} )`;

		// set element width and height from image dimensions.
		const image = new Image();
		image.src = element.dataset.image;
		image.onload = function() {
			element.style.width = `${image.width}px`;
			element.style.height = `${image.height}px`;
			element.style.left = `${(window.innerWidth - image.width) / 2}px`;
			element.style.top = `${(window.innerHeight - image.height) / 2}px`;
		};

		// append dialog directly to body.
		document.body.appendChild(element);

		element.addEventListener('mousedown', dragStart);
		document.addEventListener('mousemove', drag);
		document.addEventListener('mouseup', dragEnd);

		element.addEventListener('click', function() {
			this.focus();
		});

		document.addEventListener('keydown', function(e) {
			if (!element.matches(':focus')) return;

			const moveAmount = e.shiftKey ? 100 : 1;

			switch(e.key) {
				case 'ArrowUp':
					yOffset -= moveAmount;
					break;
				case 'ArrowDown':
					yOffset += moveAmount;
					break;
				case 'ArrowLeft':
					xOffset -= moveAmount;
					break;
				case 'ArrowRight':
					xOffset += moveAmount;
					break;
				default:
					return;
			}

			e.preventDefault();
			setTranslate(xOffset, yOffset, element);
		});

		function dragStart(e) {
			initialX = e.clientX - xOffset;
			initialY = e.clientY - yOffset;

			if (e.target === element) {
				isDragging = true;
			}
		}

		function drag(e) {
			if (isDragging) {
				e.preventDefault();

				currentX = e.clientX - initialX;
				currentY = e.clientY - initialY;

				xOffset = currentX;
				yOffset = currentY;

				setTranslate(currentX, currentY, element);
			}
		}

		function dragEnd(e) {
			initialX = currentX;
			initialY = currentY;
			isDragging = false;
		}

		function setTranslate(xPos, yPos, el) {
			el.style.transform = `translate(${xPos}px, ${yPos}px)`;
		}
	</script>
		<?php
	}
}
