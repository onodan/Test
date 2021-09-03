<?php get_header();?>

<section class="section section-catalog" id="section-catalog">
<div class="container">
   <header class="section-header">
       <h2 class="page-title">Каталог</h2>
       <nav class="catalog-nav">
                <?php
            
                $catalog_nav_items = get_terms([
                    'taxonomy' => 'products-categories',
                    ]);
                ?>

           <ul class="catalog-nav-wrapper">
               <li class="catalog-nav-item">
                   <a href =" <?php echo get_site_url() . '/product';?> " class="catalog-nav-btn " > Все </a>
               </li>
               <?php
               foreach ($catalog_nav_items as $item):
                $product_active = strpos($_SERVER['REQUEST_URI'], "$item->slug");
                print_r($product_active);

               ?>
                <li class="catalog-nav-item">
                   <a href=" <?php echo get_site_url() . '/product-categories/' . $item->slug;?>" class="catalog-nav-btn "> <?php echo $item->name; ?> </a>
               </li>
               <?php endforeach;?>
           </ul>
       </nav>
   </header>

<?php


    $catalog_product_query_args = [
        'post_type' => 'product',
        'post_in' =>  $catalog_products_ids
    ];
    $catalog_product_query = new WP_Query( $catalog_product_query_args ); 

  
?>



<div class="catalog">

<?php if ( $catalog_product_query->have_posts() ) : ?>
	<?php while ( $catalog_product_query->have_posts() ) : $catalog_product_query->the_post(); ?>
        <?php echo get_template_part('product-content');?>
       <?php endwhile; ?>

<?php endif; ?>
</div>


<?php the_posts_pagination(); ?>

<nav class="navigation pagination" role="navigation">
 <h2 class="screen-reader-text">Навигация по записям</h2>
 <div class="nav-links"><span class="page-numbers current">1</span>
  <a class="page-numbers" href="http://domainname.tld/page/2/">2</a>
  <span class="page-numbers dots">…</span>
  <a class="page-numbers" href="http://domainname.tld/page/98/">98</a>
  <a class="page-numbers" href="http://domainname.tld/page/99/">99</a>
  <a class="next page-numbers" href="http://domainname.tld/page/2/">Следующая страница</a>
 </div>
</nav>

</div>
</section>

<?php get_footer();?>