/** 
  * Template Name: Daily Shop
  * Version: 1.0  
  * Template Scripts
  * Author: MarkUps
  * Author URI: http://www.markups.io/

  Custom JS
  

  1. CARTBOX
  2. TOOLTIP
  3. PRODUCT VIEW SLIDER 
  4. POPULAR PRODUCT SLIDER (SLICK SLIDER) 
  5. FEATURED PRODUCT SLIDER (SLICK SLIDER)
  6. LATEST PRODUCT SLIDER (SLICK SLIDER) 
  7. TESTIMONIAL SLIDER (SLICK SLIDER)
  8. CLIENT BRAND SLIDER (SLICK SLIDER)
  9. PRICE SLIDER  (noUiSlider SLIDER)
  10. SCROLL TOP BUTTON
  11. PRELOADER
  12. GRID AND LIST LAYOUT CHANGER 
  13. RELATED ITEM SLIDER (SLICK SLIDER)

  
**/
///csrf token cache out
  $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });


jQuery(function($){


  /* ----------------------------------------------------------- */
  /*  1. CARTBOX 
  /* ----------------------------------------------------------- */
    
     jQuery(".aa-cartbox").hover(function(){
      jQuery(this).find(".aa-cartbox-summary").fadeIn(500);
    }
      ,function(){
          jQuery(this).find(".aa-cartbox-summary").fadeOut(500);
      }
     );   
  
  /* ----------------------------------------------------------- */
  /*  2. TOOLTIP
  /* ----------------------------------------------------------- */    
    jQuery('[data-toggle="tooltip"]').tooltip();
    jQuery('[data-toggle2="tooltip"]').tooltip();

  /* ----------------------------------------------------------- */
  /*  3. PRODUCT VIEW SLIDER 
  /* ----------------------------------------------------------- */    

    jQuery('#demo-1 .simpleLens-thumbnails-container img').simpleGallery({
        loading_image: 'demo/images/loading.gif'
    });

    jQuery('#demo-1 .simpleLens-big-image').simpleLens({
        loading_image: 'demo/images/loading.gif'
    });

  /* ----------------------------------------------------------- */
  /*  4. POPULAR PRODUCT SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */      

    jQuery('.aa-popular-slider').slick({
      dots: false,
      infinite: false,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 4,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    }); 

  
  /* ----------------------------------------------------------- */
  /*  5. FEATURED PRODUCT SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */      

    jQuery('.aa-featured-slider').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
    });
    
  /* ----------------------------------------------------------- */
  /*  6. LATEST PRODUCT SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */      
    jQuery('.aa-latest-slider').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
    });

  /* ----------------------------------------------------------- */
  /*  7. TESTIMONIAL SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */     
    
    jQuery('.aa-testimonial-slider').slick({
      dots: true,
      infinite: true,
      arrows: false,
      speed: 300,
      slidesToShow: 1,
      adaptiveHeight: true
    });

  /* ----------------------------------------------------------- */
  /*  8. CLIENT BRAND SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */  

    jQuery('.aa-client-brand-slider').slick({
        dots: false,
        infinite: false,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 2000,
        slidesToShow: 5,
        slidesToScroll: 1,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 4,
              slidesToScroll: 4,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
    });

  /* ----------------------------------------------------------- */
  /*  9. PRICE SLIDER  (noUiSlider SLIDER)
  /* ----------------------------------------------------------- */        

    jQuery(function(){
      if($('body').is('.productPage')){
       var skipSlider = document.getElementById('skipstep');
       var min_filter_price = $('#min_filter_price').val();
       var max_filter_price = $('#max_filter_price').val();
       if (min_filter_price == '' || max_filter_price == '') {
        var min_filter_price = 100;
        var max_filter_price = 1700
       }
        noUiSlider.create(skipSlider, {
            range: {
                'min': 0,
                '10%': 100,
                '20%': 250,
                '30%': 300,
                '40%': 350,
                '50%': 400,
                '60%': 500,
                '70%': 600,
                '80%': 800,
                '90%': 1200,
                'max': 1500
            },
            snap: true,
            connect: true,
            start: [min_filter_price, max_filter_price]
        });
        // for value print
        var skipValues = [
          document.getElementById('skip-value-lower'),
          document.getElementById('skip-value-upper')
        ];

        skipSlider.noUiSlider.on('update', function( values, handle ) {
          skipValues[handle].innerHTML = values[handle];
        });
      }
    });


    
  /* ----------------------------------------------------------- */
  /*  10. SCROLL TOP BUTTON
  /* ----------------------------------------------------------- */

  //Check to see if the window is top if not then display button

    jQuery(window).scroll(function(){
      if ($(this).scrollTop() > 300) {
        $('.scrollToTop').fadeIn();
      } else {
        $('.scrollToTop').fadeOut();
      }
    });
     
    //Click event to scroll to top

    jQuery('.scrollToTop').click(function(){
      $('html, body').animate({scrollTop : 0},800);
      return false;
    });
  
  /* ----------------------------------------------------------- */
  /*  11. PRELOADER
  /* ----------------------------------------------------------- */

    jQuery(window).load(function() { // makes sure the whole site is loaded      
      jQuery('#wpf-loader-two').delay(200).fadeOut('slow'); // will fade out      
    })

  /* ----------------------------------------------------------- */
  /*  12. GRID AND LIST LAYOUT CHANGER 
  /* ----------------------------------------------------------- */

  jQuery("#list-catg").click(function(e){
    e.preventDefault(e);
    jQuery(".aa-product-catg").addClass("list");
  });
  jQuery("#grid-catg").click(function(e){
    e.preventDefault(e);
    jQuery(".aa-product-catg").removeClass("list");
  });


  /* ----------------------------------------------------------- */
  /*  13. RELATED ITEM SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */      

    jQuery('.aa-related-item-slider').slick({
      dots: false,
      infinite: false,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 4,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    }); 


    
});


//custom js code
    function chage_product_color_image(img,color)
      {
        jQuery('#color_id').val(color);
        jQuery('.simpleLens-big-image-container').html('<div class="simpleLens-big-image-container"><a data-lens-image="'+img+'" class="simpleLens-lens-image"><img src="'+img+'" class="simpleLens-big-image"></a></div>');
      }
//size by product color show
  function showColor(size)
    {
      jQuery('#size_id').val(size);
      jQuery('.product_color').hide();
      jQuery('.size_'+size).show();
      jQuery('.size_border_hide').css('border','1px solid #ddd');
      jQuery('#size_'+size).css('border','1px solid black');
    }
///home add to cart
  function home_add_to_cart(id,size_attr_id,color_attr_id)
    {
      jQuery('#size_id').val(size_attr_id);
      jQuery('#color_id').val(color_attr_id);
      add_to_cart(id,size_attr_id,color_attr_id);
    }
///single page add to cart

  function add_to_cart(id,size_attr_id,color_attr_id)
    {
      jQuery('#add_to_card_msg').html('');
      var size_id = jQuery('#size_id').val();
      var color_id = jQuery('#color_id').val();
      //color and size blank
      if (size_attr_id==0 && color_attr_id==0) {
        size_id = 'no';
        color_id = 'no';
      }else{

      }
      if (size_id =='' && size_id != 'no') {
        jQuery('#add_to_card_msg').html('<div class="alert alert-danger" role="alert"><h4>Please Choose Size !</h4></div>');
      }else if (color_id =='' && color_id != 'no') {
        jQuery('#add_to_card_msg').html('<div class="alert alert-danger" role="alert"><h4>Please Choose Color !</h4></div>');
      }else{
        jQuery('#product_id').val(id);
        jQuery('#pqty').val(jQuery('#qty').val());

        jQuery.ajax({
          url:'/add_to_cart',
          data:jQuery('#frmSAddToCart').serialize(),
          type:'post',
          success:function(result){
            var totalPrice = 0;
          ///noty message
          if (result.msg) {
               new Noty({
                theme:'sunset',
                type:'success',
                timeout:1500,
                layout:'topRight',
                text: result.msg,  
              }).show();
            }

            if(result.status == 'del') {
               new Noty({
                theme:'sunset',
                type:'warning',
                timeout:1500,
                layout:'topRight',
                text: result.del_msg,  
              }).show();
            }

          /// end noty message

            if (result.TotalItem == 0) {
              jQuery('.aa-cart-notify').html('0');
              jQuery('.aa-cartbox-summary').remove();
            }else{
              jQuery('.aa-cart-notify').html(result.TotalItem);
              var html = '<div class="aa-cartbox-summary"><ul>';
              jQuery.each(result.data, function(arrKey,arrVal){
                totalPrice=totalPrice+(parseInt(arrVal.qty) * parseInt(arrVal.price));
               html+='<li> <a class="aa-cartbox-img"><img src="'+ImageUrl+'/'+arrVal.attr_image+'" alt="img"></a><div class="aa-cartbox-info"><h4><a href="#">'+arrVal.name+'</a></h4><p>'+arrVal.qty+' x $'+arrVal.price+'</p></div></li>';
              });
              html+='<li><span class="aa-cartbox-total-title">Total</span><span class="aa-cartbox-total-price">$'+totalPrice+'</span></li>';
              html+='</ul>';
              html+='<a class="aa-cartbox-checkout aa-primary-btn" href="/cart">Cart</a>';
              html+='</div>';
              }
             
               jQuery('#nav-cart-summr').html(html);
            }
        });
      }
    }

//update product cart quantity
  function updateQty(pid,size,color,attr_id,price)
    {
      jQuery('#size_id').val(size);
      jQuery('#color_id').val(color);
      var qty = jQuery('#qty'+attr_id).val();
      jQuery('#qty').val(qty);
      
      jQuery('#row_total_price'+attr_id).html(qty*price);
      add_to_cart(pid,size,color);

    }

//Delete cart product
  function delCartProduct(pid,size,color,attr_id)
    {
      jQuery('#size_id').val(size);
      jQuery('#color_id').val(color);
      //var qty = jQuery('#qty'+attr_id).val();
      
      jQuery('#qty').val(0);
      add_to_cart(pid,size,color);
      jQuery('#cart_box'+attr_id).remove();

    }

  //sorting product
  function sort_by()
    {
      var sort_by_product = jQuery('#sort_by_product').val();
      jQuery('#sort').val(sort_by_product)
      jQuery('#categoryFilter').submit();
      
    }

//price fltering
  function price_filter()
    {
      var min_price = $('#skip-value-lower').html();
      var max_price = $('#skip-value-upper').html();
      $('#min_filter_price').val(min_price);
      $('#max_filter_price').val(max_price);
      $('#categoryFilter').submit();

    }

//color fltering
  function setColor(color_id,type)
    {
      var color_str = jQuery('#color_filter').val();
      if (type == 1) {
        var remove_color = color_str.replace(color_id+':','')
        jQuery('#color_filter').val(remove_color);
      }else{
        jQuery('#color_filter').val(color_id+':'+color_str);
        jQuery('#categoryFilter').submit();

      }
      
      jQuery('#categoryFilter').submit();
    }
//end color fltering

//product search
  function funSearch()
    {
      var search_str = $('#search_str').val();
      if (search_str != '') {
        window.location.href='/search/'+search_str;
      }
    }
//registration
  jQuery('#frmRegistration').submit(function(e){
    e.preventDefault();
    $('#success_msg').html('Please Waiting....');
    jQuery('.field_error').html('');
    jQuery.ajax({
      url:'registration_process',
      data:jQuery('#frmRegistration').serialize(),
      type:'post',
      success:function(result){
        if (result.status == 'error') {
          jQuery.each(result.error,function(key,val){
            $('#'+key+'_error').html('<div class="alert alert-danger" role="alert"><span>'+val[0]+'</span></div>');
          });
        }
        if (result.status == 'success') {
          jQuery('#frmRegistration')[0].reset();
            $('#success_msg').html('<div class="alert alert-danger" role="alert"><span>'+result.msg+'</span></div>');
        }
      }
    });
  });

//login
  jQuery('#frmLogin').submit(function(e){
    e.preventDefault();
    $('#login_msg').html('');
    jQuery.ajax({
      url:'/login_process',
      data:jQuery('#frmLogin').serialize(),
      type:'post',
      success:function(result){
        if (result.status == 'error') {
          $('#login_msg').html('<div class="alert alert-danger" role="alert"><span>'+result.msg+'</span></div>');
        }
        if(result.status == 'success') {
           window.location.href = window.location.href;
           ///noty message
           new Noty({
            theme:'sunset',
            type:'success',
            timeout:30000,
            layout:'topRight',
            text: 'Your Account Successfully Login',  
          }).show();
          /// end noty message
        }
      }
    });
  });

///forgot password
  function forgot_password()
    {
      $('#popup_forgot').show();
      $('#popup_login').hide();
    }

///show login frm to forgot frm
  function show_login_popup()
    {
      $('#popup_forgot').hide();
      $('#popup_login').show();
    }

///show login frm to forgot frm end
  jQuery('#frmforgot').submit(function(e){
    e.preventDefault();
    $('#forgot_msg').html('');
    jQuery.ajax({
      url:'/forgot_password',
      data:jQuery('#frmforgot').serialize(),
      type:'post',
      success:function(result){
        if (result.status == 'error') {
          $('#forgot_msg').html('<div class="alert alert-danger" role="alert"><span>'+result.msg+'</span></div>');
        }
        if(result.status == 'success') {
           window.location.href = "/";
           ///noty message
           new Noty({
            theme:'sunset',
            type:'success',
            timeout:30000,
            layout:'topRight',
            text: 'Your Account Successfully Login',  
          }).show();
          /// end noty message
        }
      }
    });
  });
///forgot password end

//create new password
jQuery('#frmChangePassword').submit(function(e){
    e.preventDefault();
    $('#success_msg').html('');
    jQuery.ajax({
      url:'/create_new_password_process',
      data:jQuery('#frmChangePassword').serialize(),
      type:'post',
      success:function(result){
        if(result.status == 'success') {
          $('#success_msg').html('<div class="alert alert-danger" role="alert"><span>'+result.msg+'</span></div>');
        }
      }
    });
  });

//coupon code apply
  function ApplyCoponCode()
    {
      jQuery('#cupon_code_msg').html('');
      jQuery('#order_place_msg').html('');

      var cupon_code = jQuery('#cupon_code').val();
      if (cupon_code != '') {
        jQuery.ajax({
          type:'get',
          url:'/apply_cupon_code',
          data:'cupon_code='+cupon_code+'&_token'+jQuery("[name='_token']").val(),
          success:function(result){
            if (result.status == 'success' ) {
              $('.cupon_code_box').removeClass('hide');
              $('#cupon_code_value').html(cupon_code);
              $('#total_price').html(result.totalPrice +' '+'Tk');
              $('#total_price').css('color','red');
              $('.cupon_code_apply').hide();
              $('#cupon_code_msg').html('<div class="alert alert-success p-3" role="alert"><span>'+result.msg+'</span></div>');
            }else{
              $('#cupon_code_msg').html('<div class="alert alert-danger p-3" role="alert"><span>'+result.msg+'</span></div>');

            }
          }
        });
      }else{
        $('#cupon_code_msg').html('<div class="alert alert-danger p-3" role="alert"><span>Please Enter Coupon Code</span></div>');
      }
    }

///remove coupon code
  function remove_cupon_code()
    {
      jQuery('#cupon_code_msg').html('Please Wait.....');

      var cupon_code = jQuery('#cupon_code').val();
      jQuery('#cupon_code').val('');
      if (cupon_code != '') {
        jQuery.ajax({
          type:'get',
          url:'/remove_cupon_code',
          data:'cupon_code='+cupon_code+'&_token'+jQuery("[name='_token']").val(),
          success:function(result){
            if (result.status == 'success' ) {
              $('.cupon_code_box').addClass('hide');
              $('#cupon_code_value').html('');
              $('#total_price').html(result.totalPrice +' '+'Tk');
              $('.cupon_code_apply').show();
              $('#cupon_code_msg').html('<div class="alert alert-success p-3" role="alert"><span>'+result.msg+'</span></div>');
            }else{
              $('#cupon_code_msg').html('<div class="alert alert-danger p-3" role="alert"><span>'+result.msg+'</span></div>');

            }
          }
        });
      }else{
        $('#cupon_code_msg').html('<div class="alert alert-danger p-3" role="alert"><span>Please Enter Coupon Code</span></div>');
      }
    }


//place order
jQuery('#frmPlaceOrder').submit(function(e){
    e.preventDefault();
   
    jQuery.ajax({
      url:'/place_order',
      data:jQuery('#frmPlaceOrder').serialize(),
      type:'post',
      success:function(result){
        if (result.status == 'error') {
          $('#order_place_msg').html('Please Wait.....');
          $('#order_place_msg').html('<div class="alert alert-danger" role="alert"><span>'+result.msg+'</span></div>');
           
        }
        //input field validation
        else if (result.status == 'valid_error') {
          jQuery.each(result.valid_error,function(key,val){
            $('#'+key+'_error').html('<div class="alert alert-danger" role="alert"><span>'+val[0]+'</span></div>');
          });
          $('#order_place_msg').html('Someting Wrong.....');
        }else if(result.pay_succes != ''){
           window.location.href = result.payment_url;
        }
        if(result.status == 'success') {
          window.location.href = "/order_success";
           ///noty message
           new Noty({
            theme:'sunset',
            type:'success',
            timeout:30000,
            layout:'topRight',
            text: 'Order Placed Successfully',  
          }).show();
          /// end noty message   
           $('#order_place_msg').html('Please Wait.....');
        }
      }
    });
  }); //place order end

///get product id by review
  getReview();
  function getReview()
    {
      var product_id = $('#rating_pro_id').val();
      $.ajax({
          url:'/get/product/review/'+product_id,
          type:'get',
          dataType:'JSON',
          success:function(result){
            var html = '<h4>('+result.total_rating+') Reviews for T-Shirt</h4> <ul class="aa-review-nav">';
              jQuery.each(result.ratings, function(arrKey,arrVal){
                // totalPrice=totalPrice+(parseInt(arrVal.qty) * parseInt(arrVal.price));
               // html+='<li> <a class="aa-cartbox-img"><img src="'+ImageUrl+'/'+arrVal.attr_image+'" alt="img"></a><div class="aa-cartbox-info"><h4><a href="#">'+arrVal.name+'</a></h4><p>'+arrVal.qty+' x $'+arrVal.price+'</p></div></li>';
                html+='<li><div class="media"><div class="media-left">';
                html+='<a href="#"><img class="media-object" src="/Frontend/img/testimonial-img-3.jpg" alt="girl image"></a>';
                html+='</div>';
                
                html+='<div class="media-body"><h4 class="media-heading"><strong>'+arrVal.customer_name+'</strong> - <span>March 26, 2016</span></h4>';
                html+='<div class="aa-product-rating">';
                if (arrVal.rating === 1) {
                  html+='<span class="fa fa-star"></span>';
                  html+='<span class="fa fa-star-o"></span>';
                  html+='<span class="fa fa-star-o"></span>';
                  html+='<span class="fa fa-star-o"></span>';
                  html+='<span class="fa fa-star-o"></span>';
                }else if(arrVal.rating === 2){
                  html+='<span class="fa fa-star"></span>';
                  html+='<span class="fa fa-star"></span>';
                  html+='<span class="fa fa-star-o"></span>';
                  html+='<span class="fa fa-star-o"></span>';
                  html+='<span class="fa fa-star-o"></span>';
                }else if(arrVal.rating === 3){
                  html+='<span class="fa fa-star"></span>';
                  html+='<span class="fa fa-star"></span>';
                  html+='<span class="fa fa-star"></span>';
                  html+='<span class="fa fa-star-o"></span>';
                  html+='<span class="fa fa-star-o"></span>';
                }else if(arrVal.rating === 4){
                  html+='<span class="fa fa-star"></span>';
                  html+='<span class="fa fa-star"></span>';
                  html+='<span class="fa fa-star"></span>';
                  html+='<span class="fa fa-star"></span>';
                  html+='<span class="fa fa-star-o"></span>';
                }else if(arrVal.rating === 5){
                  html+='<span class="fa fa-star"></span>';
                  html+='<span class="fa fa-star"></span>';
                  html+='<span class="fa fa-star"></span>';
                  html+='<span class="fa fa-star"></span>';
                  html+='<span class="fa fa-star"></span>';
                }
                
                html+='</div>';
                html+='<p>'+arrVal.comment+'.</p>';
                html+='</div></div></li>';
              });
              html+='</ul>';
            $('#show_review').html(html);
          }
        });
    }///get product id by review end

//review add 
jQuery('#addReview').submit(function(e){
    e.preventDefault();
    let formData = new FormData($('#addReview')[0]);
  // rating ajax request
      $.ajax({
      url:'/rating/insert/'+cliked_var,
      type:'post',
      data:formData,
      contentType:false,
      processData:false,
      cache:false,
      success:function(result){
          if (result.status == 'errors') {
          jQuery.each(result.errors,function(key,val){
            $('#'+key+'_error').html('<div class="alert alert-danger pt-3" role="alert"><span>'+val[0]+'</span></div>');
            });
          }else if(result.status == 'success'){
            getReview();
            $('#exampleModal').modal('hide');
            ('#rating_success').html('<div class="alert alert-success" role="alert"><span>'+result.msg+'</span></div>');
            
          }
        }
      });
  
}); // end review

// rating one start hover
  var cliked_var = 0;
      $('#1_star').hover(function(){
        $('#1_star').attr('src', '/Frontend/img/star.png');
        $('#2_star').attr('src', '/Frontend/img/blank_star.png');
        $('#3_star').attr('src', '/Frontend/img/blank_star.png');
        $('#4_star').attr('src', '/Frontend/img/blank_star.png');
        $('#5_star').attr('src', '/Frontend/img/blank_star.png');

      })
      // when click one start 
      $('#1_star').click(function(){
        cliked_var = 1;
        
      })
// rating two start hover
      $('#2_star').hover(function(){
        $('#1_star').attr('src', '/Frontend/img/star.png');
        $('#2_star').attr('src', '/Frontend/img/star.png');
        $('#3_star').attr('src', '/Frontend/img/blank_star.png');
        $('#4_star').attr('src', '/Frontend/img/blank_star.png');
        $('#5_star').attr('src', '/Frontend/img/blank_star.png');

      })
      // when click two start 
      $('#2_star').click(function(){
        cliked_var = 2;
        
      })
// rating three start hover
      $('#3_star').hover(function(){
        $('#1_star').attr('src', '/Frontend/img/star.png');
        $('#2_star').attr('src', '/Frontend/img/star.png');
        $('#3_star').attr('src', '/Frontend/img/star.png');
        $('#4_star').attr('src', '/Frontend/img/blank_star.png');
        $('#5_star').attr('src', '/Frontend/img/blank_star.png');

      })
      // when click three start 
      $('#3_star').click(function(){
        cliked_var = 3;
        
      })


// rating four start hover
      $('#4_star').hover(function(){
        $('#1_star').attr('src', '/Frontend/img/star.png');
        $('#2_star').attr('src', '/Frontend/img/star.png');
        $('#3_star').attr('src', '/Frontend/img/star.png');
        $('#4_star').attr('src', '/Frontend/img/star.png');
        $('#5_star').attr('src', '/Frontend/img/blank_star.png');

      })
      // when click three start 
      $('#4_star').click(function(){
        cliked_var = 4;
        
      })


// rating four start hover
      $('#5_star').hover(function(){
        $('#1_star').attr('src', '/Frontend/img/star.png');
        $('#2_star').attr('src', '/Frontend/img/star.png');
        $('#3_star').attr('src', '/Frontend/img/star.png');
        $('#4_star').attr('src', '/Frontend/img/star.png');
        $('#5_star').attr('src', '/Frontend/img/star.png');

      })
      // when click three start 
      $('#5_star').click(function(){
        cliked_var = 5;
        
      })

