<?php include 'header.php'; ?>

<!-- banner -->
<div class="banner">
    <img src="images/photos/banner.jpg" class="img-responsive" alt="slide">
    <div class="welcome-message">
        <div class="wrap-info">
            <div class="information">
                <h1 class="animated fadeInDown">Khách Sạn Tốt Nhất Dành Cho Bạn </h1>
                <p class="animated fadeInUp">Khách sạn sang trọng nhất Việt Nam với các phương pháp điều trị hoàng gia và dịch vụ khách hàng tuyệt vời.</p>
            </div>
            <a href="#information" class="arrow-nav scroll wowload fadeInDownBig"><i class="fa fa-angle-down"></i></a>
        </div>
    </div>
</div>
<!-- banner-->
<!-- reservation-information -->
<div id="information" class="spacer reserve-info ">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="embed-responsive embed-responsive-16by9 wowload fadeInLeft"><iframe class="embed-responsive-item" src="//player.vimeo.com/video/55057393?title=0" width="100%" height="400" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>
            </div>
        </div>
    </div>
</div>
<!-- reservation-information -->
<!-- services -->
<div class="spacer services wowload fadeInUp">
    <div class="container">
        <div class="text-center" style="margin-bottom: 50px;">
            <h1>Trải nghiệm đặc biệt tại khách sạn Holiday Crown</h1>
        </div>
        <div class="row">
            <?php
            $selectProduct = "SELECT * from img_product, product,categories WHERE categories.catId =product.catId and 
													product.productId = img_product.productId and 
													categories.catName= 'Phòng ở'
													group by img_product.productId";
            $queryProduct = mysqli_query($conn, $selectProduct);

            $path = '../admin/';
            while ($row = mysqli_fetch_assoc($queryProduct)) {
            ?>
                <div class="col-sm-6" style="margin-bottom: 30px; padding:0 15px;">
                    <!-- RoomCarousel -->
                    <div id="RoomCarousel<?php echo $row['productId']; ?>" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active"><img src="<?php echo $path . $row['img'] ?>" class="img-responsive" alt="slide"></div>
                            <?php
                            $id_pro = $row['productId'];
                            $select_img_product = "SELECT * FROM img_product where productId = '$id_pro' limit 1,10";
                            $img_product = mysqli_query($conn, $select_img_product);
                            while ($row_img = mysqli_fetch_assoc($img_product)) {
                            ?>
                                <div class="item  height-full"><img src="<?php echo $path . $row_img['img'] ?>" class="img-responsive" alt="slide"></div>
                            <?php } ?>
                        </div>
                        <!-- Controls -->
                        <a class="left carousel-control" href="#RoomCarousel<?php echo $row['productId']; ?>" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                        <a class="right carousel-control" href="#RoomCarousel<?php echo $row['productId']; ?>" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
                    </div>
                    <!-- RoomCarousel-->
                    <div class="caption"><?php echo $row['productName'] ?>
                        <a href="room-details.php?id=<?php echo $row['productId'] ?>" class="pull-right">
                            <button class="btn btn-warning book-now" style="border-radius: 15px; background-color:rgb(253,126,20);">Đặt ngay</button>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<div class="comment">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <div class="text-center cmt">
                                <img src="./images/photos/incognito.png" alt="picture" class="img_user">
                                <div class="cmtText">
                                    adkal;ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssskadl;sklad
                                </div>
                            </div>

                        </div>
                        <div class="item">
                            <div class="text-center cmt">
                                <img src="./images/photos/incognito.png" alt="picture" class="img_user">
                                <div class="cmtText">
                                    phần 2
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <!-- <span class="sr-only">Previous</span> -->
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <!-- <span class="sr-only">Next</span> -->
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- services -->


<?php include 'footer.php'; ?>