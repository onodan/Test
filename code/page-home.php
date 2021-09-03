
<?php
/*
Template Name: Главная
*/
?>

<?php $page_id = get_the_ID(); ?>
<?php get_header();?>


<!--section-top-->
<section class="section-top" >

<img data-src="<?php echo get_template_directory_uri();?>/assets/img/bg.jpg" class="section-top">



<div class="container  section-top_container">
   <p class="section-top_info"><!--............--></p>
       <h1 class="section-top_title"><?php echo carbon_get_post_meta( $page_id, 'top_title' );?>
</h1>
       <div class="section-top_btn">
           <button class="btn" type="button" data-scroll-to="section-catalog">
                <?php echo carbon_get_post_meta( $page_id, 'top_btn_text' );?>
           </button>
       </div>
   </div>
</section>
<!--/section-top-->








<?php 
    $top_img_id = carbon_get_post_meta( $page_id,'top_img');
    $top_img_src = wp_get_attachment_image_url( $top_img_id, 'full');
?>
    <?php
        $test_gallery = carbon_get_post_meta( 19, 'gallery' );
    ?>
        <?php foreach($test_gallery as $gallery_id):
            $img_src = wp_get_attachment_image_url( $gallery_id, 'full');
        ?>
    
    <div class="catalog-item" data-category="bread">
        <div class="product">
            <img src="<?php echo wp_get_attachment_image_url(carbon_get_theme_option('site-logo'));?>" alt="" class="product-img">
        </div>
    </div>

    
<?php endforeach;?>


                                                            <!--section-catalog-->
<section class="section section-catalog js-section-catalog" id="section-catalog">
<div class="container">
   <header class="section-header">
       <h2 class="page-title">
            <?php echo carbon_get_post_meta( $page_id, 'catalog_title' );?>
       </h2>
       <nav class="catalog-nav">

                <?php
                    $catalog_nav = carbon_get_post_meta ($page_id,'catalog_nav');
                    $catalog_nav_ids = wp_list_pluck($catalog_nav,'id');
                    $catalog_nav_items = get_terms([
                        'taxonomy' => 'products-categories',]);
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

	<?php while ( $catalog_product_query->have_posts() ) : $catalog_product_query->the_post(); ?>
        <?php echo get_template_part('product-content');?>
       <?php endwhile; ?>
    </div>
<?php endif; ?>

</div>
<div class="section-catalog-footer">
        
        <a class="link" href="<?php echo get_site_url() . '/product';?>">перейти в каталог</a>

        </div>
</section>

<!--section about-->

<section class="section section-about">
<img src="<?php echo get_template_directory_uri();?>/assets/img/about.jpg" alt="" class="section-about_img">
   <div class="container section-about-container">
       <div class="section-about-content">
          <h1 class="sectoin-title secton-about-title">
          <?php echo carbon_get_post_meta( $page_id, 'about_title' );?>
          </h1>
               <p class="section-about-text">
               <?php echo carbon_get_post_meta( $page_id, 'about_text' );?>
               </p>
       </div>

   </div>

</section>


<section class="section section-contacts">
<div class="container section-contacts-container">
   <header class="section-header">
       <h2 class="page-title section-contacts-title">
       <?php echo carbon_get_post_meta( $page_id, 'contacts_title' );?>

       </h2>
   </header>
   <div class="contacts">
       <div class="contacts-start">
           <div class="contacts-map" id="ymap" data-coordinates="<?php echo $GLOBALS['kak_doma']['map-coordinates'];?>" 
           data-adress="<?php echo $GLOBALS['kak_doma']['adress'];?>">

           </div>
       </div>
           <div class="contacts-end">
               <div class="contacts-item">
                   <h3 class="contacts-title">
                       Адрес
                   </h3>
                   <p class="contacts-text">
                   <?php echo $GLOBALS['kak_doma']['adress'];?>
                   </p>
               </div>

               <div class="contacts-item">
                   <h3 class="contacts-title">
                       Телефон
                   </h3>
                   <p class="contacts-text">
                   <?php echo $GLOBALS['kak_doma']['phone'];?>
                   </p>
               </div>

               <div class="contacts-item">
                   <h3 class="contacts-title">
                       Социальные сети
                   </h3>
                   <p class="contacts-text">
                       <ul class="socials">
                           <li class="socials-item">
                               <a href="<?php echo $GLOBALS['kak_doma']['instagram'];?>" class="socials-link">
                                   <img src="<?php echo get_template_directory_uri();?>/assets/img/instagram.png" alt="">
                               </a>
                           </li>
                       </ul>
                   </p>
               </div>
           </div>
   </div>
</div>
</section>
<?php get_footer();?>