
<?php get_header();?>

<?php 
$product_id = get_the_ID();
$product_price = carbon_get_post_meta($product_id,'product_price');
//$top_img_id = carbon_get_post_meta( $page_id,'top_img');
$product_img_src = get_the_post_thumbnail_url( $product_id, 'full');

$product_categories = get_the_terms($product_id, 'products-categories');
$product_categories_str = '';




foreach ($product_categories as $category) {
    $product_categories_str .= "$category->slug,";
  }


$product_categories_str = substr($product_categories_str,0,-1);
?>


<section class="section single-page">
<div class="container single-page-container">
<?php if ( have_posts() ) : ?>


<div class="single-page-content">

<div class="product">

<img src="<?php echo $product_img_src;?>" alt="" class="product-img">
    <div class="product-content">
        <h1 class="page-title">
            <?php the_title();?>
        </h1>
        <p class="product-description">
        <?php while ( have_posts() ) : the_post(); ?>
    <?php the_content();?>

       <?php endwhile; ?>  
        </p>
    </div>
    <footer class="product-footer">

    
        <div class="product-bottom">
            <div class="product-price">
                <span class="product-price-value">
                    <?php echo $product_price;?>
                </span>
                <br>
                <button class="btn product-btn js-btn-add-to-cart" type="button">
                               Заказать
                           </button>
            </div>
        </div>
    </footer>
</div>

</div>
        <?php endif; ?>
    </div>
</section>


<?php get_footer();?>