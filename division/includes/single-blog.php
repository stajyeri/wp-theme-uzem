<?php get_header(); ?><div id="container"><div class="inner">		<div id="content">		<?php the_post(); ?>		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>						<h1 class="entry-title"><?php the_title(); ?></h1>						<div class="entry-meta">				<span class="meta-date"><?php the_time(get_option('date_format')); ?></span>				<?php printf(__('by %1$s in %2$s with ','themejunkie'),'<span class="meta-author">'.get_the_author().'</span>','<span class="meta-cat">'.get_the_category_list(', ').'</span>'); ?><span class="meta-comments"><?php comments_popup_link( __( '0 comment', 'themejunkie' ), __( '1 Comment', 'themejunkie' ), __( '% Comments', 'themejunkie' ) ); ?></span> <?php edit_post_link( __( 'Edit', 'themejunkie' ), '(<span class="meta-edit">', '</span>)' ); ?>			</div>			<div class="entry entry-content">				<?php the_content(); ?>				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'themejunkie' ), 'after' => '</div>' ) ); ?>			</div> <!--end .entry-->			<?php printf(the_tags('<div class="entry-tags">Tags: ',', ','</div>')); ?>		</div>				<?php comments_template( '', true ); ?>			</div><!--end #content -->	<?php get_sidebar(); ?></div><!--end #container .inner --></div><!--end #container --><?php get_footer(); ?>