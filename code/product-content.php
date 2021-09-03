<?php 
$product_id = get_the_ID();
$product_price = carbon_get_post_meta($product_id,'product_price');
//$top_img_id = carbon_get_post_meta( $page_id,'top_img');
$product_img_src = get_the_post_thumbnail_url( $product_id, 'product');

$product_categories = get_the_terms($product_id, 'products-categories');
$product_categories_str = '';




foreach ($product_categories as $category) {
    $product_categories_str .= "$category->slug,";
  }


$product_categories_str = substr($product_categories_str,0,-1);
?>


<div class="catalog-item" data-category="<?php echo $product_categories_str;?>">
           <div class="product js-product" 
           data-product-name="<?php the_title();?>" 
           data-product-price="<?php echo $product_price;?>" 
           data-product-src="<?php echo get_the_post_thumbnail_url( $product_id, 'product');?>">
                <a class="product-img-link" href="<?php  the_permalink();?>">
                <img src="<?php echo $product_img_src;?>" alt="" class="product-img">
                </a>
               <div class="product-content">
                    <a class="product-link"  href="<?php the_permalink(); ?>">
                        <h3 class="product-title">
                            <?php the_title();?>
                        </h3>
                    </a>
                   <p class="product-description">
                        <?php the_excerpt();?>      
                   </p>
               </div>
               <footer class="product-footer">
                   <div class="product-bottom">
                       <div class="product-price">
                           <span class="product-price-value js-product-price-value">
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
       