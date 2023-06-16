@extends('layouts.site')
@section('content')
<div class="nov-productlist  productlist-rows     col-xl-8 col-lg-8 col-md-8 col-xs-12 col-md-12">
    <div class="block block-product clearfix">
        <h2 class="title_block">
         something 
        </h2>
        <div class="block_content">
            <div id="productlist1693764381" class="product_list grid owl-carousel owl-theme multi-row" data-autoplay="false" data-autoplayTimeout="6000" data-loop="false" data-margin="30" data-dots="false" data-nav="true" data-items="2" data-items_large="2" data-items_tablet="3" data-items_mobile="1" >
                <div class="item  text-center">
                    @isset($products)
                        @foreach ($products as $product)
                        <div class="d-flex flex-wrap align-items-center product-miniature js-product-miniature item-row first_item" data-id-product="1" data-id-product-attribute="40" itemscope itemtype="http://schema.org/Product">
                            <div class="col-12 col-w40 pl-0">
                                <div class="thumbnail-container">
    
                                    <a href="http://demo.bestprestashoptheme.com/savemart/ar/smartphone-tablet/1-40-hummingbird-printed-t-shirt.html#/1-الحجم-ص/6-اللون_-رمادي_داكن" class="thumbnail product-thumbnail two-image">
                                        <img
                                            class="img-fluid image-cover"
                                            src = "http://demo.bestprestashoptheme.com/savemart/24-home_default/hummingbird-printed-t-shirt.jpg"
                                            alt = ""
                                            data-full-size-image-url = "http://demo.bestprestashoptheme.com/savemart/24-large_default/hummingbird-printed-t-shirt.jpg"
                                            width="600"
                                            height="600"
                                        >
                                        <img
                                            class="img-fluid image-secondary"
                                            src = "http://demo.bestprestashoptheme.com/savemart/25-home_default/hummingbird-printed-t-shirt.jpg"
                                            alt = ""
                                            data-full-size-image-url = "http://demo.bestprestashoptheme.com/savemart/25-large_default/hummingbird-printed-t-shirt.jpg"
                                            width="600"
                                            height="600"
                                        >
                                    </a>
    
                                </div>
                            </div>
                            <div class="col-12 col-w60 no-padding">
                                <div class="product-description">
                                    <div class="product-groups">
    
                                        <!-- begin modules/novproductcomments/novproductcomments_reviews.tpl -->
                                        <div class="product-comments">
                                            <div class="star_content">
                                                <div class="star star_on"></div>
                                                <div class="star star_on"></div>
                                                <div class="star star_on"></div>
                                                <div class="star star_on"></div>
                                                <div class="star star_on"></div>
                                            </div>
                                            <span>5 review</span>
                                        </div>
                                        <!-- end modules/novproductcomments/novproductcomments_reviews.tpl -->
    
                                        <!-- begin /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/jmarketplace/views/templates/hook/product-list.tpl -->
                                        <p class="seller_name">
                                            <a title="View seller profile"
                                             href="http://demo.bestprestashoptheme.com/savemart/ar/jmarketplace/1_david-james/">
                                                <i class="fa fa-user"></i>
                                                David James
                                            </a>
                                        </p>
    
                                        <!-- end /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/jmarketplace/views/templates/hook/product-list.tpl -->
    
    
                                        <div class="product-title" itemprop="name">
                                            <a href= "{{route('product.info' , $product->id)}}">
                                         
                                         </a>
                                       </div>
    
                                        <div class="product-group-price">
    
                                            <div class="product-price-and-shipping">
    
    
    
                                                <span itemprop="price" class="price"> {{$product->special_price ? $product->special_price.' ' . __('messages.special_price') : $product->price . ' '. __('messages.price')}} </span>
    
    
    
    
    
                                            </div>
    
                                        </div>
                                    </div>
                                    {{-- <div class="product-buttons d-flex justify-content-center" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                        <form action="http://demo.bestprestashoptheme.com/savemart/ar/عربة التسوق" method="post" class="formAddToCart">
                                            <input type="hidden" name="token" value="28add935523ef131c8432825597b9928">
                                            <input type="hidden" name="id_product" value="1">
                                            <a class="add-to-cart" href="#" data-button-action="add-to-cart"><i class="novicon-cart"></i><span>أضف للسلة</span></a>
                                        </form>
    
                                        <!-- begin /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/novblockwishlist/novblockwishlist_button.tpl -->
                                     
                                        <a class="addToWishlist wishlistProd_1" 
                                       
                                            tagrget-product ="{{$product->id}}" data-rel="1">
                                            <i class="fa fa-heart"></i>
                                            <span>Add to Wishlist</span>
                                        </a>
                                        <!-- end /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/novblockwishlist/novblockwishlist_button.tpl -->
    
                                        <a href="" class="quick-view hidden-sm-down"
                                         data-product-id="{{$product->id}}" data-link-action="quickview">
                                            <i class="fa fa-search"></i>
                                            <span> نظرة سريعة</span>
                                        </a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                          {{-- @include('front.modal' , $product) --}}
                        @endforeach
                    @endisset
            
                </div>

       
         
            </div>
        </div>
    </div>
</div>

@endsection

 <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" integrity="sha256-a2yjHM4jnF9f54xUQakjZGaqYs/V1CYvWpoqZzC2/Bw=" crossorigin="anonymous"></script>

<script> 



    $(document).on('click' , '.addToWishlist' , function(e)
     {
     e.preventDefault();
   
    console.log( $(this).attr('tagrget-product'));
     $.ajax({
      type:'POST',  
      url : "{{route('wishList.add')}}", 
      data:  {
       "product_id":  $(this).attr('tagrget-product'), 
       '_token': $('meta[name="csrf-token"]').attr('content'),


      
      }, 

      success: function (data){
        
        console.log(data.respons);
      },
    //   error : 
    //    (error)  => console.log(error);

     });

    });
</script> 
