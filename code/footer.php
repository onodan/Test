<footer class="footer-page">
    <div class="container">
        <div class="footer-page-text">
            <?php echo carbon_get_theme_option('site-footer-text');?>
    
</footer>


<!--popup-->

<div class="popup popup-menu">
  <div class="popup-wrapper">
      <div class="popup-inner">
          <div class="popup-content">
              <button class="btn-close popup-btn-close"></button>


              <nav class="mobile-menu">
              <?php wp_nav_menu( [
                'theme_location'  => 'menu-main-header',
                'container'       => null, 
                'menu_class'      => 'mobile-menu_ul', 
                ] );
            ?>
                
            </nav>
            <div class="phone">
                <a  class="phone_item  phone_item--accent " href="79039496829"><?php echo $GLOBALS['kak_doma']['phone'];?></a>
            </div>
            <ul class="socials">
                           <li class="socials-item">
                               <a href="<?php echo $GLOBALS['kak_doma']['instagram'];?>" class="socials-link">
                                   <img src="<?php echo get_template_directory_uri();?>/assets/img/instagram.png" alt="">
                               </a>
                           </li>
                       </ul>
          </div>
      </div>
  </div>
</div>





<div class="popup popup-order">
    <div class="popup-wrapper">
        <div class="popup-inner">
            <div class="popup-content">
                <button class="btn-close popup-btn-close"></button>
                <div class="cart js-cart-wrapper">
          <form class="form cart__form" method ="POST" action="cart">
            <div class="cart__items js-cart">
              <div data-product-id="Сок-Маленький" class="js-cart-item">
                <div class="cart-item cart__item">
                  <div class="cart-item__main">
                    <div class="cart-item__start">
                 <!--     <button class="cart-item__btn cart-item__btn--remove js-btn-cart-item-remove" type="button"></button> -->
                    </div>
                    <div class="cart-item__img-wrapper">
                      <img class="cart-item__img" src="img/bottle.png" alt="">
                    </div>
                    <div class="cart-item__content">
                      <h3 class="cart-item__title"></h3>
                      <input type="hidden" name="Сок-Маленький-Товар" value="">
                      <input class="js-cart-input-quantity" type="hidden" name="Сок-Маленький-Количество" value="1">
                      <input class="js-cart-input-price" type="hidden" name="Сок-Маленький-Цена" value="50">
                    </div>
                  </div> 
                  <div class="cart-item__end">
                    <div class="cart-item__actions">
                    <!--  <button class="cart-item__btn js-btn-product-decrease-quantity" type="button"></button> -->
                <!--      <span class="cart-item__quantity js-cart-item-quantity"></span>-->
              <!--        <button class="cart-item__btn js-btn-product-increase-quantity" type="button"></button> -->
                    </div>
                    <p class="cart-item__price"><span class="js-cart-item_price"></span> </p> 
                  </div>
                </div>
                </div>
            </div>
           <div class="cart__totals">
              <div>Итого: <span class="cart__bold"><span class="js-cart-total-price"></span> ₽</span></div>
            </div> 
            <h3 class="title">Заполните форму</h3>
            <div class="form-main">
              <input class="form-input" type="text" name="Имя" placeholder="Имя" required="">
              <input class="form-input" type="text" name="Телефон" placeholder="Телефон" required="">
              <input class="form-input" type="text" name="Адрес" placeholder="Адрес" required="">
              <input class="js-cart-total-price-input" type="hidden" name="Общая сумма">
              <select class="form-input" name="оплата">
                <option value="Оплата наличными">Оплата наличными</option>
                <option value="Оплата картой">Оплата картой</option>
              </select>
              <button class="btn form-btn" type="submit">Отправить</button>
            </div>
          </form>
          <div class="cart__empty">
            <p class="cart__info">Нет товаров</p>
          </div>
        </div>
             
            </div>
        </div>
    </div>
  </div>

  <div class="popup popup-thanks">
    <div class="popup-wrapper">
        <div class="popup-inner">
            <div class="popup-content">
                <button class="btn-close popup-btn-close"></button>
                <h2 class="page-title popup-title">Ваш заказ принят</h2>
                <p class="popup-subtitle">Мы уже начали готовить ваш заказ</p>
            </div>
        </div>
    </div>
  </div>

  <div class="popup popup-error">
    <div class="popup-wrapper">
        <div class="popup-inner">
            <div class="popup-content">
                <button class="btn-close popup-btn-close"></button>
                    <h2 class="page-title popup-title">Упс... Произошла ошибка</h2>
                        <p class="popup-subtitle">Пожалуйста сделайте заказ по номеру <a><?php echo $GLOBALS['kak_doma']['phone'];?></a></p>
            </div>
        </div>
    </div>
  </div>

  <button class="cart-btn" data-popup="popup-order">
  <span class="cart-btn-cointer js-cart-total-count-items">0</span>
  <svg class="cart-btn-icon" viewBox="0 -31 512.00026 512" xmlns="http://www.w3.org/2000/svg">
    <path d="m164.960938 300.003906h.023437c.019531 0 .039063-.003906.058594-.003906h271.957031c6.695312 0 12.582031-4.441406 14.421875-10.878906l60-210c1.292969-4.527344.386719-9.394532-2.445313-13.152344-2.835937-3.757812-7.269531-5.96875-11.976562-5.96875h-366.632812l-10.722657-48.253906c-1.527343-6.863282-7.613281-11.746094-14.644531-11.746094h-90c-8.285156 0-15 6.714844-15 15s6.714844 15 15 15h77.96875c1.898438 8.550781 51.3125 230.917969 54.15625 243.710938-15.941406 6.929687-27.125 22.824218-27.125 41.289062 0 24.8125 20.1875 45 45 45h272c8.285156 0 15-6.714844 15-15s-6.714844-15-15-15h-272c-8.269531 0-15-6.730469-15-15 0-8.257812 6.707031-14.976562 14.960938-14.996094zm312.152343-210.003906-51.429687 180h-248.652344l-40-180zm0 0" />
    <path d="m150 405c0 24.8125 20.1875 45 45 45s45-20.1875 45-45-20.1875-45-45-45-45 20.1875-45 45zm45-15c8.269531 0 15 6.730469 15 15s-6.730469 15-15 15-15-6.730469-15-15 6.730469-15 15-15zm0 0" />
    <path d="m362 405c0 24.8125 20.1875 45 45 45s45-20.1875 45-45-20.1875-45-45-45-45 20.1875-45 45zm45-15c8.269531 0 15 6.730469 15 15s-6.730469 15-15 15-15-6.730469-15-15 6.730469-15 15-15zm0 0" />
  </svg>
</button>

<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
<script src="https://unpkg.com/focus-visible"></script>

<script src="<?php echo get_template_directory_uri();?>/assets/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@17.3.1/dist/lazyload.min.js"></script>

    </body>
</html>