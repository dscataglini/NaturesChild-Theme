<?php if ($options['section_display']==1): ?><h2><?php echo $options['section_title']?></h2><?php endif;?>
<div class="FA_overall_container_ncschool FA_slider" style="<?php echo $styles['x'];?>"  id="<?php echo $FA_slider_id;?>">	
	<div class="FA_featured_articles" style="<?php echo $styles['y'];?>">
	<?php foreach ($postslist as $post):?>
		<?php
			$image = FA_article_image($post, $slider_id);
        	$background = $image ? ' style="background:url('.$image.') no-repeat left top"' : '';				
		?>
        <div class="FA_article"<?php echo $background;?>>
        	<div class="FA_wrap">	
				<h2><?php if( $options['title_click'] ):?><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php endif;?><?php the_title();?><?php if( $options['title_click'] ):?></a><?php endif;?></h2>
                <span class="FA_date"><?php the_time(get_option('date_format')); ?></span>
                <p><?php echo FA_truncate_text($post->FA_post_content, $image ? $options['desc_truncate'] : $options['desc_truncate_noimg']);?></p>	
                <a class="FA_read_more" href="<?php the_permalink();?>" title="<?php the_title();?>"><?php echo $options['read_more'];?></a>
            </div>			
		</div>
	<?php endforeach;?>	
	<?php if( $options['sideways_nav'] && count($postslist) > 1 ):?>
        <a href="#" title="<?php __('Previous post');?>" class="FA_back">&lt;</a>
        <a href="#" title="<?php __('Next post');?>" class="FA_next">&gt;</a>
    <?php endif;?>        	
	</div>		
</div>