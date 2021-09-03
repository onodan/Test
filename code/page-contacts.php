<?php
/*
Template Name: Контакты
*/
?>

<?php $page_id = get_the_ID(); ?>
<?php get_header();?>

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