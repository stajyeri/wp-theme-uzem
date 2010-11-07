<?php
/*---------------------------------------------------------------------------------*/
/* Categories widget */
/*---------------------------------------------------------------------------------*/
class TJ_Widget_Categories extends WP_Widget {

	function TJ_Widget_Categories() {

		$widget_ops = array( 'classname' => 'categories widget_categories', 'description' => __( 'An advanced widget that gives you more control over the output of your category links.', 'themejunkie' ) );
		$this->WP_Widget( "theme-junkie-categories", __( 'ThemeJunkie - Categories', 'themejunkie' ), $widget_ops);
	}


	function widget( $args, $instance ) {
		extract( $args );

		$args = array();
		$args['orderby'] = $instance['orderby'];
		$args['order'] = $instance['order'];
		$args['include'] = ( is_array( $instance['include'] ) ? join( ', ', $instance['include'] ) : $instance['include'] );
		$args['hierarchical'] = isset( $instance['hierarchical'] ) ? $instance['hierarchical'] : false;
		$args['show_count'] = isset( $instance['show_count'] ) ? $instance['show_count'] : false;
		$args['hide_empty'] = isset( $instance['hide_empty'] ) ? $instance['hide_empty'] : false;
		$args['title_li'] = false;
		$args['echo'] = false;

		echo $before_widget;

		if ( $instance['title'] )
			echo $before_title . apply_filters( 'widget_title',  $instance['title'], $instance, $this->id_base ) . $after_title;

		$categories = str_replace( array( "\r", "\n", "\t" ), '', wp_list_categories( $args ) );

		$categories = '<ul>' . $categories . '</ul>';

		echo $categories;

		echo $after_widget;
	}


	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance = $new_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['hierarchical'] = ( isset( $new_instance['hierarchical'] ) ? 1 : 0 );
		$instance['use_desc_for_title'] = ( isset( $new_instance['use_desc_for_title'] ) ? 1 : 0 );
		$instance['show_last_update'] = ( isset( $new_instance['show_last_update'] ) ? 1 : 0 );
		$instance['show_count'] = ( isset( $new_instance['show_count'] ) ? 1 : 0 );
		$instance['hide_empty'] = ( isset( $new_instance['hide_empty'] ) ? 1 : 0 );

		return $instance;
	}


	function form( $instance ) {

		$defaults = array(
			'title' => __( 'Categories', 'themejunkie' ),
			'include' => array(),
			'hierarchical' => true,
			'hide_empty' => true,
			'order' => 'ASC',
			'orderby' => 'name'
		);
		$instance = wp_parse_args( (array) $instance, $defaults );

		$terms = get_terms( 'category' );
		$order = array( 'ASC' => __( 'Ascending', 'themejunkie' ), 'DESC' => __( 'Descending', 'themejunkie' ) );
		$orderby = array( 'count' => __( 'Count', 'themejunkie' ), 'ID' => __( 'ID', 'themejunkie' ), 'name' => __( 'Name', 'themejunkie' ), 'slug' => __( 'Slug', 'themejunkie' ), 'term_group' => __( 'Term Group', 'themejunkie' ) );

		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'themejunkie' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'order' ); ?>"><code>order</code></label> 
			<select class="widefat" id="<?php echo $this->get_field_id( 'order' ); ?>" name="<?php echo $this->get_field_name( 'order' ); ?>">
				<?php foreach ( $order as $option_value => $option_label ) { ?>
					<option value="<?php echo $option_value; ?>" <?php selected( $instance['order'], $option_value ); ?>><?php echo $option_label; ?></option>
				<?php } ?>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'orderby' ); ?>"><code>orderby</code></label> 
			<select class="widefat" id="<?php echo $this->get_field_id( 'orderby' ); ?>" name="<?php echo $this->get_field_name( 'orderby' ); ?>">
				<?php foreach ( $orderby as $option_value => $option_label ) { ?>
					<option value="<?php echo $option_value; ?>" <?php selected( $instance['orderby'], $option_value ); ?>><?php echo $option_label; ?></option>
				<?php } ?>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'include' ); ?>"><code>include</code></label> 
			<select style="height:60px;" class="widefat" id="<?php echo $this->get_field_id( 'include' ); ?>" name="<?php echo $this->get_field_name( 'include' ); ?>[]" size="4" multiple="multiple">
				<?php foreach ( $terms as $term ) { ?>
					<option value="<?php echo $term->term_id; ?>" <?php echo ( in_array( $term->term_id, (array) $instance['include'] ) ? 'selected="selected"' : '' ); ?>><?php echo $term->name; ?></option>
				<?php } ?>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'hierarchical' ); ?>">
			<input class="checkbox" type="checkbox" <?php checked( $instance['hierarchical'], true ); ?> id="<?php echo $this->get_field_id( 'hierarchical' ); ?>" name="<?php echo $this->get_field_name( 'hierarchical' ); ?>" /> <?php _e( 'Hierarchical?', 'themejunkie' ); ?> <code>hierarchical</code></label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'show_count' ); ?>">
			<input class="checkbox" type="checkbox" <?php checked( $instance['show_count'], true ); ?> id="<?php echo $this->get_field_id( 'show_count' ); ?>" name="<?php echo $this->get_field_name( 'show_count' ); ?>" /> <?php _e( 'Show count?', 'themejunkie' ); ?> <code>show_count</code></label>
		</p>
	<?php
	}
}

register_widget('TJ_Widget_Categories');
?>