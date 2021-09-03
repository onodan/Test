<?php get_header();?>

<section class="section section-catalog js-section-catalog" id="section-catalog">
<div class="container">
   <header class="section-header">
       <h2 class="page-title">
        Каталог

       <?php echo carbon_get_post_meta( $page_id, 'catalog_title' );?>
       </h2>
       <nav class="catalog-nav">

                <?php
                $catalog_nav = carbon_get_post_meta ($page_id,'catalog_nav');
                $catalog_nav_ids = wp_list_pluck($catalog_nav,'id');
                $catalog_nav_items = get_terms([
                    'taxonomy' => 'products-categories',
                                    ]);
               // print_r($catalog_nav_items);
                ?>

           <ul class="catalog-nav-wrapper">
               <li class="catalog-nav-item">
                   <button class="catalog-nav-btn is-active" type="button" data-filter="all"> Все </button>
               </li>
               <?php
               foreach ($catalog_nav_items as $item):
               ?>
                <li class="catalog-nav-item">
                   <button class="catalog-nav-btn " type="button" data-filter="<?php echo $item-> slug; ?>"> <?php echo $item->name; ?> </button>
               </li>
               <?php endforeach;?>
           </ul>
       </nav>
   </header>

<?php
    $catalog_products = carbon_get_post_meta( $page_id, 'catalog_products' );
    $catalog_products_ids = wp_list_pluck($catalog_products, 'id');

    $catalog_product_query_args = [
        'post_type' => 'product',
        'post_in' =>  $catalog_products_ids
    ];
    $catalog_product_query = new WP_Query( $catalog_product_query_args ); 

  
?>



<div class="catalog">
 
<?php if ( $catalog_product_query->have_posts() ) : ?>
	<!-- пагинация -->

	<!-- цикл -->
	<?php while ( $catalog_product_query->have_posts() ) : $catalog_product_query->the_post(); ?>
        <?php echo get_template_part('product-content');?>
       <?php endwhile; ?>
 

    </div>
<?php endif; ?>

</div>
</section>

<?php get_footer();?>