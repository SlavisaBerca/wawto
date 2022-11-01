@extends('layouts.platform.frontend')
<?php 
$gs=generalsetting();
$suppliers = getSuppliers();
?>
@section('content')
                    <div class="col-lg-9">
                        <div class="main-content">
                          
               
                        <div class="category-banner banner text-uppercase" style="height:300px;background: no-repeat 60%/cover url('{{URL::to('platform/frontend/assets/images/banners/banner.jpg')}}');">
                            <div class="row">
                              
                                <div class="col-sm-4 offset-sm-0 offset-1">
                                   
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="sticky-wrapper"><nav class="toolbox sticky-header mt-2" data-sticky-options="{'mobile': true}">
                            <div class="toolbox-left">
                                <a href="#" class="sidebar-toggle"><svg data-name="Layer 3" id="Layer_3" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
										<line x1="15" x2="26" y1="9" y2="9" class="cls-1"></line>
										<line x1="6" x2="9" y1="9" y2="9" class="cls-1"></line>
										<line x1="23" x2="26" y1="16" y2="16" class="cls-1"></line>
										<line x1="6" x2="17" y1="16" y2="16" class="cls-1"></line>
										<line x1="17" x2="26" y1="23" y2="23" class="cls-1"></line>
										<line x1="6" x2="11" y1="23" y2="23" class="cls-1"></line>
										<path d="M14.5,8.92A2.6,2.6,0,0,1,12,11.5,2.6,2.6,0,0,1,9.5,8.92a2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
										<path d="M22.5,15.92a2.5,2.5,0,1,1-5,0,2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
										<path d="M21,16a1,1,0,1,1-2,0,1,1,0,0,1,2,0Z" class="cls-3"></path>
										<path d="M16.5,22.92A2.6,2.6,0,0,1,14,25.5a2.6,2.6,0,0,1-2.5-2.58,2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
									</svg>
									<span>Filter</span>
								</a>

                                <div class="toolbox-item toolbox-sort">
                                    <label>Sort By:</label>

                                    <div class="select-custom">
                                        <select name="orderby" class="form-control">
											<option value="menu_order" selected="selected">Default sorting</option>
											<option value="popularity">Sort by popularity</option>
											<option value="rating">Sort by average rating</option>
											<option value="date">Sort by newness</option>
											<option value="price">Sort by price: low to high</option>
											<option value="price-desc">Sort by price: high to low</option>
										</select>
                                    </div>
                                    <!-- End .select-custom -->


                                </div>
                                <!-- End .toolbox-item -->
                            </div>
                            <!-- End .toolbox-left -->

                            <div class="toolbox-right">
                                <div class="toolbox-item toolbox-show">
                                    <label>Show:</label>

                                    <div class="select-custom">
                                        <select name="count" class="form-control">
											<option value="12">12</option>
											<option value="24">24</option>
											<option value="36">36</option>
										</select>
                                    </div>
                                    <!-- End .select-custom -->
                                </div>
                                <!-- End .toolbox-item -->

                                <div class="toolbox-item layout-modes">
                                    <a href="category.html" class="layout-btn btn-grid active" title="Grid">
                                        <i class="icon-mode-grid"></i>
                                    </a>
                                    <a href="category-list.html" class="layout-btn btn-list" title="List">
                                        <i class="icon-mode-list"></i>
                                    </a>
                                </div>
                                <!-- End .layout-modes -->
                            </div>
                            <!-- End .toolbox-right -->
                        </nav></div>

                        <div class="row">
                            <div class="col-6 col-sm-4">
                                <div class="product-default">
                                    <figure>
                                        <a href="product.html">
                                            <img src="assets/images/products/product-1.jpg" width="280" height="280" alt="product">
                                            <img src="assets/images/products/product-1-2.jpg" width="280" height="280" alt="product">
                                        </a>

                                        <div class="label-group">
                                            <div class="product-label label-hot">HOT</div>
                                            <div class="product-label label-sale">-20%</div>
                                        </div>
                                    </figure>

                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="category.html" class="product-category">category</a>
                                            </div>
                                        </div>

                                        <h3 class="product-title"> <a href="product.html">Ultimate 3D Bluetooth
												Speaker</a> </h3>

                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span>
                                                <!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <!-- End .product-ratings -->
                                        </div>
                                        <!-- End .product-container -->

                                        <div class="price-box">
                                            <span class="old-price">$90.00</span>
                                            <span class="product-price">$70.00</span>
                                        </div>
                                        <!-- End .price-box -->

                                        <div class="product-action">
                                            <a href="wishlist.html" class="btn-icon-wish" title="wishlist"><i class="icon-heart"></i></a>
                                            <a href="product.html" class="btn-icon btn-add-cart"><i class="fa fa-arrow-right"></i><span>SELECT
													OPTIONS</span></a>
                                            <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                        </div>
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                            </div>
                            <!-- End .col-sm-4 -->

                            <div class="col-6 col-sm-4">
                                <div class="product-default">
                                    <figure>
                                        <a href="product.html">
                                            <img src="assets/images/products/product-2.jpg" width="280" height="280" alt="product">
                                            <img src="assets/images/products/product-2-2.jpg" width="280" height="280" alt="product">
                                        </a>
                                    </figure>

                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="category.html" class="product-category">category</a>
                                            </div>
                                        </div>

                                        <h3 class="product-title"> <a href="product.html">Brown Women Casual HandBag</a>
                                        </h3>

                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span>
                                                <!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <!-- End .product-ratings -->
                                        </div>
                                        <!-- End .product-container -->

                                        <div class="price-box">
                                            <span class="product-price">$33.00</span>
                                        </div>
                                        <!-- End .price-box -->

                                        <div class="product-action">
                                            <a href="wishlist.html" class="btn-icon-wish" title="wishlist"><i class="icon-heart"></i></a>
                                            <a href="product.html" class="btn-icon btn-add-cart"><i class="fa fa-arrow-right"></i><span>SELECT
													OPTIONS</span></a>
                                            <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                        </div>
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                            </div>
                            <!-- End .col-sm-4 -->

                            <div class="col-6 col-sm-4">
                                <div class="product-default">
                                    <figure>
                                        <a href="product.html">
                                            <img src="assets/images/products/product-3.jpg" width="280" height="280" alt="product">
                                            <img src="assets/images/products/product-3-2.jpg" width="280" height="280" alt="product">
                                        </a>

                                        <div class="label-group">
                                            <div class="product-label label-sale">-20%</div>
                                        </div>
                                    </figure>

                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="category.html" class="product-category">category</a>
                                            </div>
                                        </div>

                                        <h3 class="product-title"> <a href="product.html">Circled Ultimate 3D
												Speaker</a> </h3>

                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span>
                                                <!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <!-- End .product-ratings -->
                                        </div>
                                        <!-- End .product-container -->

                                        <div class="price-box">
                                            <span class="old-price">$90.00</span>
                                            <span class="product-price">$70.00</span>

                                        </div>
                                        <!-- End .price-box -->
                                        <div class="product-action">
                                            <a href="wishlist.html" class="btn-icon-wish" title="wishlist"><i class="icon-heart"></i></a>
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i class="icon-shopping-cart"></i>ADD TO CART</a>
                                            <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                        </div>
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                            </div>
                            <!-- End .col-sm-4 -->

                            <div class="col-6 col-sm-4">
                                <div class="product-default">
                                    <figure>
                                        <a href="product.html">
                                            <img src="assets/images/products/product-4.jpg" width="280" height="280" alt="product">
                                            <img src="assets/images/products/product-4-2.jpg" width="280" height="280" alt="product">
                                        </a>

                                        <div class="label-group">
                                            <div class="product-label label-sale">-30%</div>
                                        </div>
                                    </figure>

                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="category.html" class="product-category">category</a>
                                            </div>
                                        </div>

                                        <h3 class="product-title"> <a href="product.html">Blue Backpack for the Young -
												S</a> </h3>

                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span>
                                                <!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <!-- End .product-ratings -->
                                        </div>
                                        <!-- End .product-container -->

                                        <div class="price-box">
                                            <span class="old-price">$90.00</span>
                                            <span class="product-price">$70.00</span>
                                        </div>
                                        <!-- End .price-box -->

                                        <div class="product-action">
                                            <a href="wishlist.html" class="btn-icon-wish" title="wishlist"><i class="icon-heart"></i></a>
                                            <a href="product.html" class="btn-icon btn-add-cart"><i class="fa fa-arrow-right"></i><span>SELECT
													OPTIONS</span></a>
                                            <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                        </div>
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                            </div>
                            <!-- End .col-sm-4 -->

                            <div class="col-6 col-sm-4">
                                <div class="product-default">
                                    <figure>
                                        <a href="product.html">
                                            <img src="assets/images/products/product-5.jpg" width="280" height="280" alt="product">
                                            <img src="assets/images/products/product-5-2.jpg" width="280" height="280" alt="product">
                                        </a>

                                        <div class="label-group">
                                            <div class="product-label label-hot">HOT</div>
                                        </div>
                                    </figure>

                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="category.html" class="product-category">category</a>
                                            </div>
                                        </div>

                                        <h3 class="product-title"> <a href="product.html">Casual Spring Blue Shoes</a>
                                        </h3>

                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span>
                                                <!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <!-- End .product-ratings -->
                                        </div>
                                        <!-- End .product-container -->

                                        <div class="price-box">
                                            <span class="old-price">$90.00</span>
                                            <span class="product-price">$70.00</span>
                                        </div>
                                        <!-- End .price-box -->

                                        <div class="product-action">
                                            <a href="wishlist.html" class="btn-icon-wish" title="wishlist"><i class="icon-heart"></i></a>
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i class="icon-shopping-cart"></i>ADD TO CART</a>
                                            <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                        </div>
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                            </div>
                            <!-- End .col-sm-4 -->

                            <div class="col-6 col-sm-4">
                                <div class="product-default">
                                    <figure>
                                        <a href="product.html">
                                            <img src="assets/images/products/product-6.jpg" width="280" height="280" alt="product">
                                            <img src="assets/images/products/product-6-2.jpg" width="280" height="280" alt="product">
                                        </a>

                                        <div class="label-group">
                                            <div class="product-label label-sale">-8%</div>
                                        </div>
                                    </figure>

                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="category.html" class="product-category">category</a>
                                            </div>
                                        </div>

                                        <h3 class="product-title"> <a href="product.html">Men Black Gentle Belt</a>
                                        </h3>

                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span>
                                                <!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <!-- End .product-ratings -->
                                        </div>
                                        <!-- End .product-container -->

                                        <div class="price-box">
                                            <span class="old-price">$90.00</span>
                                            <span class="product-price">$70.00</span>
                                        </div>
                                        <!-- End .price-box -->

                                        <div class="product-action">
                                            <a href="wishlist.html" class="btn-icon-wish" title="wishlist"><i class="icon-heart"></i></a>
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i class="icon-shopping-cart"></i>ADD TO CART</a>
                                            <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                        </div>
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                            </div>
                            <!-- End .col-sm-4 -->

                            <div class="col-6 col-sm-4">
                                <div class="product-default">
                                    <figure>
                                        <a href="product.html">
                                            <img src="assets/images/products/product-7.jpg" width="280" height="280" alt="product">
                                            <img src="assets/images/products/product-7-2.jpg" width="280" height="280" alt="product">
                                        </a>

                                        <div class="label-group">
                                            <div class="product-label label-sale">-8%</div>
                                        </div>
                                    </figure>

                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="category.html" class="product-category">category</a>
                                            </div>
                                        </div>

                                        <h3 class="product-title"> <a href="product.html">Brown-Black Men Casual
												Glasses</a> </h3>

                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span>
                                                <!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <!-- End .product-ratings -->
                                        </div>
                                        <!-- End .product-container -->

                                        <div class="price-box">
                                            <span class="old-price">$90.00</span>
                                            <span class="product-price">$70.00</span>
                                        </div>
                                        <!-- End .price-box -->

                                        <div class="product-action">
                                            <a href="wishlist.html" class="btn-icon-wish" title="wishlist"><i class="icon-heart"></i></a>
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i class="icon-shopping-cart"></i>ADD TO CART</a>
                                            <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                        </div>
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                            </div>
                            <!-- End .col-sm-4 -->

                            <div class="col-6 col-sm-4">
                                <div class="product-default">
                                    <figure>
                                        <a href="product.html">
                                            <img src="assets/images/products/product-8.jpg" width="280" height="280" alt="product">
                                            <img src="assets/images/products/product-8-2.jpg" width="280" height="280" alt="product">
                                        </a>

                                        <div class="label-group">
                                            <div class="product-label label-sale">-40%</div>
                                        </div>
                                    </figure>

                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="category.html" class="product-category">category</a>
                                            </div>
                                        </div>

                                        <h3 class="product-title"> <a href="product.html">Brown-Black Men Casual
												Glasses</a> </h3>

                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span>
                                                <!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <!-- End .product-ratings -->
                                        </div>
                                        <!-- End .product-container -->

                                        <div class="price-box">
                                            <span class="old-price">$90.00</span>
                                            <span class="product-price">$70.00</span>
                                        </div>
                                        <!-- End .price-box -->

                                        <div class="product-action">
                                            <a href="wishlist.html" class="btn-icon-wish" title="wishlist"><i class="icon-heart"></i></a>
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i class="icon-shopping-cart"></i>ADD TO CART</a>
                                            <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                        </div>
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                            </div>
                            <!-- End .col-sm-4 -->

                            <div class="col-6 col-sm-4">
                                <div class="product-default">
                                    <figure>
                                        <a href="product.html">
                                            <img src="assets/images/products/product-9.jpg" width="280" height="280" alt="product">
                                            <img src="assets/images/products/product-9-2.jpg" width="280" height="280" alt="product">
                                        </a>
                                    </figure>

                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="category.html" class="product-category">category</a>
                                            </div>
                                        </div>

                                        <h3 class="product-title"> <a href="product.html">Black Men Casual Glasses</a>
                                        </h3>

                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span>
                                                <!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <!-- End .product-ratings -->
                                        </div>
                                        <!-- End .product-container -->

                                        <div class="price-box">
                                            <span class="old-price">$90.00</span>
                                            <span class="product-price">$70.00</span>
                                        </div>
                                        <!-- End .price-box -->

                                        <div class="product-action">
                                            <a href="wishlist.html" class="btn-icon-wish" title="wishlist"><i class="icon-heart"></i></a>
                                            <a href="product.html" class="btn-icon btn-add-cart"><i class="fa fa-arrow-right"></i><span>SELECT
													OPTIONS</span></a>
                                            <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                        </div>
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                            </div>
                            <!-- End .col-sm-4 -->

                            <div class="col-6 col-sm-4">
                                <div class="product-default">
                                    <figure>
                                        <a href="product.html">
                                            <img src="assets/images/products/product-10.jpg" width="280" height="280" alt="product">
                                            <img src="assets/images/products/product-10-2.jpg" width="280" height="280" alt="product">
                                        </a>

                                        <div class="label-group">
                                            <div class="product-label label-sale">-30%</div>
                                        </div>
                                    </figure>

                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="category.html" class="product-category">category</a>
                                            </div>
                                        </div>

                                        <h3 class="product-title"> <a href="product.html">Basketball Sports Blue
												Shoes</a> </h3>

                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span>
                                                <!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <!-- End .product-ratings -->
                                        </div>
                                        <!-- End .product-container -->

                                        <div class="price-box">
                                            <span class="old-price">$90.00</span>
                                            <span class="product-price">$70.00</span>
                                        </div>
                                        <!-- End .price-box -->

                                        <div class="product-action">
                                            <a href="wishlist.html" class="btn-icon-wish" title="wishlist"><i class="icon-heart"></i></a>
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i class="icon-shopping-cart"></i>ADD TO CART</a>
                                            <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                        </div>
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                            </div>
                            <!-- End .col-sm-4 -->

                            <div class="col-6 col-sm-4">
                                <div class="product-default">
                                    <figure>
                                        <a href="product.html">
                                            <img src="assets/images/products/product-11.jpg" width="280" height="280" alt="product">
                                            <img src="assets/images/products/product-11-2.jpg" width="280" height="280" alt="product">
                                        </a>
                                    </figure>

                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="category.html" class="product-category">category</a>
                                            </div>
                                        </div>

                                        <h3 class="product-title"> <a href="product.html">Men Sports Travel Bag</a>
                                        </h3>

                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span>
                                                <!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <!-- End .product-ratings -->
                                        </div>
                                        <!-- End .product-container -->

                                        <div class="price-box">
                                            <span class="old-price">$90.00</span>
                                            <span class="product-price">$70.00</span>
                                        </div>
                                        <!-- End .price-box -->

                                        <div class="product-action">
                                            <a href="wishlist.html" class="btn-icon-wish" title="wishlist"><i class="icon-heart"></i></a>
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i class="icon-shopping-cart"></i>ADD TO CART</a>
                                            <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                        </div>
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                            </div>
                            <!-- End .col-sm-4 -->

                            <div class="col-6 col-sm-4">
                                <div class="product-default">
                                    <figure>
                                        <a href="product.html">
                                            <img src="assets/images/products/product-12.jpg" width="280" height="280" alt="product">
                                            <img src="assets/images/products/product-12-2.jpg" width="280" height="280" alt="product">
                                        </a>

                                        <div class="label-group">
                                            <div class="product-label label-hot">HOT</div>
                                        </div>
                                    </figure>

                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="category.html" class="product-category">category</a>
                                            </div>
                                        </div>

                                        <h3 class="product-title"> <a href="product.html">Brown HandBag</a> </h3>

                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span>
                                                <!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <!-- End .product-ratings -->
                                        </div>
                                        <!-- End .product-container -->

                                        <div class="price-box">
                                            <span class="old-price">$90.00</span>
                                            <span class="product-price">$70.00</span>
                                        </div>
                                        <!-- End .price-box -->

                                        <div class="product-action">
                                            <a href="wishlist.html" class="btn-icon-wish" title="wishlist"><i class="icon-heart"></i></a>
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i class="icon-shopping-cart"></i>ADD TO CART</a>
                                            <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                        </div>
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                            </div>
                            <!-- End .col-sm-4 -->
                        </div>
                        <!-- End .row -->

                        <nav class="toolbox toolbox-pagination">
                            <div class="toolbox-item toolbox-show">
                                <label>Show:</label>

                                <div class="select-custom">
                                    <select name="count" class="form-control">
										<option value="12">12</option>
										<option value="24">24</option>
										<option value="36">36</option>
									</select>
                                </div>
                                <!-- End .select-custom -->
                            </div>
                            <!-- End .toolbox-item -->

                            <ul class="pagination toolbox-item">
                                <li class="page-item disabled">
                                    <a class="page-link page-link-btn" href="#"><i class="icon-angle-left"></i></a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><span class="page-link">...</span></li>
                                <li class="page-item">
                                    <a class="page-link page-link-btn" href="#"><i class="icon-angle-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                   

@endsection
