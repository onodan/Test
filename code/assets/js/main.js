//;(function(){

//var lazyLoadInstance = new LazyLoad({
  //  elements_selector: ".lazy"
  //});
//})();

//------------------------------------------mylib.js--------------------------//

;(function(){
    window.mylib = {};
    window.mylib.body = document.querySelector('body');

    
    window.mylib.closesAttr = function(item, attr){
        var node = item;
        while(node){
            var attrValue = node.getAttribute(attr);
            if(attrValue){
                return attrValue;
            }
            node = node.parentElement;
        }  
        return null;
      };


      window.mylib.closesItemByClass = function(item, className){
        var node = item;
        while(node){
 
            if(node.classList.contains(className)){
                return node;
            }
            node = node.parentElement;
        }  
        return null;
      };

      window.mylib.togglescroll = function(){
        mylib.body.classList.toggle('no-scroll');
    };

})();


//------------------------------------------catalog.js--------------------------//

;(function(){
    var catalogSection = document.querySelector('.js-section-catalog');
    if(catalogSection === null){
        return;
    }
    var removeChildren = function(item){
        while(item.firstChild){
            item.removeChild(item.firstChild);
        }
    };
    var updateChildren = function(item, children){
        removeChildren(item);
        for(var i = 0; i<children.length; i+=1){
            item.appendChild(children[i]);
        }
    };
    var catalog = catalogSection.querySelector('.catalog');
    var catalogNav = catalogSection.querySelector('.catalog-nav');
    var catalogItems = catalogSection.querySelectorAll('.catalog-item');

    catalogNav.addEventListener('click', function(e){
        var target = e.target;
        var item = mylib.closesItemByClass(target, 'catalog-nav-btn');

        if(item === null || item.classList.contains('is-active')){
            return;
        }

        e.preventDefault();
        var filterValue = item.getAttribute('data-filter');
        var previusBtnctive = catalogNav.querySelector('.catalog-nav-btn.is-active');
        previusBtnctive.classList.remove('is-active');
        item.classList.add('is-active');

        if(filterValue ==='all'){
            updateChildren(catalog,catalogItems);
            return;
        }
        var filteredItems = [];
        for (var i = 0; i<catalogItems.length; i+=1){
            var current = catalogItems[i];
            if(current.getAttribute('data-category')=== filterValue){
                filteredItems.push(current);
            }
        }

        updateChildren(catalog , filteredItems);
        console.log(filterValue);
    });
})();

//------------------------------------------form.js--------------------------//

;(function(){
    var forms = document.querySelectorAll('.form-send');
    if(forms.length ===0){
        return;
    }

    var serialize  = function(form){
        var items = form.querySelectorAll('input, select, textarea');
        var str = ' ';
        for (var i=0; i<items.length; i+=1){
            var item = items [i];
            var name = item.name;
            var value = item.value;
            var separator = i === 0 ?'':'&';
            if(name){
                str += separator + name + '=' + value;
            }
        }
        return str;

    }
    //'name=value&name2=value2'
var formSend = function(form)
{
    var data = serialize(form);


    var xhr = new XMLHttpRequest();
    var url = 'mail/mail.php';

    xhr.open('POST', url);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        var activePopup = document.querySelector('.popup.is-active');
        if(activePopup){
            activePopup.classList.remove('is-active');
        }else{
            mylib.togglescroll();
        }
     //   console.log(xhr.response);
     if(xhr.response === 'success'){
        document.querySelector('.popup-thanks').classList.add('is-active');

     }else{
         document.querySelector('.popup-error').classList.add('is-active');
     }
     form.reset();
    };
    xhr.send(data);
};


for (var i=0; i<forms.length; i+=1){
    forms[i].addEventListener('submit', function(e){
        e.preventDefault();
        var form = e.currentTarget;
        formSend(form);
    });
  }
})();

//------------------------------------------header.js--------------------------//
;(function(){
    if(window.matchMedia('(max-width: 992px)').matches){
        return;
    }
  var headerPage = document.querySelector('.header-page');

  window.addEventListener('scroll', function(){
    if(window.pageYOffset>0){
        headerPage.classList.add('is-active');
    }else{
        headerPage.classList.remove('is-active');
    }
  });
})();


//------------------------------------------map.js--------------------------//
;(function()
{
    ymaps.ready(function () {
        var myMap = new ymaps.Map('ymap', {
                center: [53.347994, 83.671179],
                zoom: 18
            }, {
                searchControlProvider: 'yandex#search'
            }),
    
            // Создаём макет содержимого.
            MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
                '<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
            ),
    
            myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
                hintContent: 'Собственный значок метки',
                balloonContent: 'г. Барнаул, Попова 158'
            }, {
                // Опции.
                // Необходимо указать данный тип макета.
                iconLayout: 'default#image',
                // Своё изображение иконки метки.
                iconImageHref: 'images/myIcon.gif',
                // Размеры метки.
                iconImageSize: [30, 42],
                // Смещение левого верхнего угла иконки относительно
                // её "ножки" (точки привязки).
                iconImageOffset: [-5, -38]
            }),
    
            myPlacemarkWithContent = new ymaps.Placemark([55.661574, 37.573856], {
                hintContent: 'Собственный значок метки с контентом',
                balloonContent: 'А эта — новогодняя',
                iconContent: '12'
            }, {
                // Опции.
                // Необходимо указать данный тип макета.
                iconLayout: 'default#imageWithContent',
                // Своё изображение иконки метки.
                iconImageHref: 'images/ball.png',
                // Размеры метки.
                iconImageSize: [48, 48],
                // Смещение левого верхнего угла иконки относительно
                // её "ножки" (точки привязки).
                iconImageOffset: [-24, -24],
                // Смещение слоя с содержимым относительно слоя с картинкой.
                iconContentOffset: [15, 15],
                // Макет содержимого.
                iconContentLayout: MyIconContentLayout
            });
    
        myMap.geoObjects
            .add(myPlacemark)
            .add(myPlacemarkWithContent);
    });
})();

//------------------------------------------popup.js--------------------------//

;(function()
{

    var showPopup = function(target){
        target.classList.add('is-active');
    }
    
    var closePopup = function(target){
        target.classList.remove('is-active');
    }
    
    mylib.body.addEventListener('click',function(e){
            var target = e.target;
            var popupClass = mylib.closesAttr(target, 'data-popup');
    
            if(popupClass == null){
                return;
            }
            e.preventDefault();
            var popup = document.querySelector('.'+popupClass);
    
            if(popup) {
                showPopup(popup);
                mylib.togglescroll();
            }
        });
    
    
        mylib.body.addEventListener('click',function(e){
        var target = e.target;
        if(target.classList.contains('popup-btn-close')||target.classList.contains('popup-inner')){
           var popup = mylib.closesItemByClass(target, 'popup');
         closePopup(popup);
         mylib.togglescroll();
        }
          });
    
    
          mylib.body.addEventListener('keydown',function(e){
          if(e.keyCode!==27){
              return;
          }
          var popup = document.querySelector('.popup.is-active');
          if(popup){
              closePopup(popup);
              mylib.togglescroll();
          }
        });
    })();

    //------------------------------------------product.js--------------------------//

    ;(function()
    {
        var catalog = document.querySelector('.catalog');
        if(catalog === null){
            return;
    
        }
    
        var changeProductSize = function(target){
            var product = mylib.closesItemByClass(target , 'product');
            var previusBtnActive = product.querySelector('.product-size.is-active');
    
            previusBtnActive.classList.remove('is-active');
            target.classList.add('is-active');
        };
    
        var changeProductOrderInfo = function(target){
            var product = mylib.closesItemByClass(target , 'product');
            var order = document.querySelector('.popup-order');
    
            var productTitle = product.querySelector('.product-title').textContent;
           // var productSize = product.querySelector('.product-size.is-active').textContent;
            var productPrice = product.querySelector('.product-price-value').textContent;
            var productImgSrc = product.querySelector('.product-img').getAttribute('src');
    
            order.querySelector('.order-info-title').setAttribute('value', productTitle);
            order.querySelector('.order-info-price').setAttribute('value', productPrice);
    
            order.querySelector('.order-product-title').textContent= productTitle;    
            order.querySelector('.order-product-price').textContent= productPrice;
            order.querySelector('.order-img').setAttribute('src', productImgSrc);
            ;
    
            console.log(productTitle);
        };
        catalog.addEventListener('click', function(e){
            var target = e.target;
            if(target.classList.contains('product-size')&& !target.classList.contains('is-active')){
                e.preventDefault();
                changeProductSize(target);
            }
    
            if(target.classList.contains('product-btn')){
                e.preventDefault();
                changeProductOrderInfo(target);
            }
        });
    })();
    

    //------------------------------------------scrollTo.js--------------------------//

    ;(function(){

        var scroll = function(target){
            var targetTop=target.getBoundingClientRect().top;
            var scrollTop = window.pageYOffset;
            var targetOffsetTop = targetTop + scrollTop;
            var headerOffset = document.querySelector('.header-page').clientHeight;
            window.scrollTo(0, targetOffsetTop - headerOffset);
        }
  
        mylib.body.addEventListener('click', function(e){
          var target = e.target;
          var scrollToItemClass = mylib.closesAttr(target, 'data-scroll-to');
          if(scrollToItemClass === null){
              return;
          }
          e.preventDefault();
          var scrollToItem = document.querySelector('.'+ scrollToItemClass);
  
          if(scrollToItem){
              scroll(scrollToItem);
          }
          console.log(scrollToItemClass);
      });

/*
      mylib.body.addEventListener('click', function(e){
        var target = e.target;
        var href = mylib.closesAttr(target, 'href');

        if(href === null || href[0] !== '#'){
            return;
        }
        e.preventDefault();
        var scrollToItemClass = href.slice(1);
        var scrollToItem = document.querySelector('.'+ scrollToItemClass);

        if(scrollToItem){
            scroll(scrollToItem);
        }
    });
    */
  })();
