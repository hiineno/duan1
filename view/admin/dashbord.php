<?php
                                    $sqlsalengay = "select SUM(bill_price) as tongngay from bill where bill_date like '2022-12-18'";
                                    $kq = connect($sqlsalengay);
                                    foreach ($kq as $key);
                                 ?>
<main>
<script src="https://cdn.tailwindcss.com"></script>
            <h1>Dashboard</h1>
            
            
            <div class="insights">
                <div class="sales">
                    <span class="material-symbols-outlined">monitoring</span>
                    <div class="middle">
                        <div class="left">
                            <h3 class=" text-blue-500 font-bold text-[15px] mt-[-20px]">
                                Tổng Sale
                            </h3>
                            <h1>
                                 <?php
                                    $sqlsaletong = "select SUM(cart_total) as tong from cart ";
                                    $kq = connect($sqlsaletong);
                                    foreach ($kq as $key);
                                 ?>
                                 <p class="text-red-500 text-[20px]"> <?php echo $key['tong'] ?> </p> 
                            </h1>
                        </div>

                        <div class="progress">
                        <svg>
                                <!-- <circle cx='38' cy='38' r="36"></circle> -->
                            </svg>
                            <div class="number">
                                <p class="text-red-500 text-[30px]">Đ</p>
                            </div>
                        </div>
                    </div>

                    <small class="text-muted">Tất cả sản phẩm đã bán từ trước đến nay</small>


                </div>
                <!-- end sale  -->

                <div class="expenses">
                    <span class="material-symbols-outlined">show_chart</span>
                    <div class="middle">
                        <div class="left">
                        <h3 class=" text-blue-500 font-bold text-[15px] mt-[-20px]">
                                Tổng Ngày
                            </h3>
                            <h1>
                                 <?php
                                    $sqlsalengay = "select SUM(cart_total) as tongngay from cart where cart_date like '2022-12-18%'";
                                    $kq = connect($sqlsalengay);
                                    foreach ($kq as $key);
                                 ?>
                                 <p class="text-red-500 text-[20px]"> <?php echo $key['tongngay'] ?> </p> 
                            </h1>
                        </div>

                        <div class="progress">
                            <svg>
                                <!-- <circle cx='38' cy='38' r="36"></circle> -->
                            </svg>
                            <div class="number">
                            <p class="text-red-500 text-[30px]">Đ</p>
                            </div>
                        </div>
                    </div>
                
                    <small class="text-muted">chọn ngày muốn xem</small>
                    <small class="text-muted">Tổng tiền trong ngày hôm đấy</small>
                


                </div>
                <!-- end expensive  -->

                <div class="income">
                    <span class="material-symbols-outlined"> signal_cellular_alt</span>


                    <div class="middle">
                        <div class="left">
                        <h3 class=" text-blue-500 font-bold text-[15px] mt-[-20px]">
                                 Sản Phẩm 
                            </h3>
                            <h1>
                                 <?php
                                    $sqlsoluong = "select product_id  , SUM(bill_quantity) as soluong from bill group by bill_quantity "  ;
                                    $kq = connect($sqlsoluong);
                                    foreach ($kq as $key);
                                 ?>
                                 <p class="text-red-500 text-[20px]"> <?php echo $key['soluong'] ?> </p> 
                            </h1>
                        </div>

                        <div class="progress">
                            <svg>
                                <!-- <circle cx='38' cy='38' r="36"></circle> -->
                            </svg>
                            <div class="number">
                            <!-- <p class="text-red-500 text-[30px]">Sản Phẩm</p> -->
                            </div>
                        </div>
                    </div>
                  
                    <small class="text-muted">Chọn ngày muốn xem</small>
                    <small class="text-muted">Tổng các sản phẩm đã bán ngày hôm đấy</small>


                </div>
                <!-- end income  -->



            </div>
            <!-- end insights  -->

            <div class="recent-order">
                <h2 class="text-blue-500 text-[20px]">
                    Sản phẩm được mua gần đây
                </h2>

                <table>
               

                        <tr>
                            <th>Sản Phẩm </th>
                            <th>Ảnh</th>
                            <th>Người mua</th>
                            <th>Tổng tiền </th>
                            <th>Tình trạng </th>
                           
                        </tr>
                            
                
                 
                     
             

                        <?php 
                            $sql = " select product_name , product_avatar , bill_price ,user_id , bill.cart_id ,cart_status from (bill inner join product on
                                                                               bill.product_id  = product.product_id )
                                                                               inner join cart on bill.cart_id = cart.cart_id ";
                            
                            $result = connect($sql);
                            foreach($result as $row){ ?>
                            <tr>

                                <td class="font-bold"> <?php echo $row['product_name'] ?> </td>
                                <td class="w-[60px]"> <img src="./src/imgs/img_product/<?php echo $row['product_avatar'] ?>" alt="">  </td>
                                <td class="font-bold"><?php echo $row['user_id'] ?></td>
                                <td class="text-red-500"><?php echo $row['bill_price'] ?>Đ</td>
                                <td class="text-green-500"><?php echo $row['cart_status'] ?></td>
                                <td>
                                    <a href="index.php?act=admin_bill_detail&cart_id=<?=$row['cart_id'] ?>">Chi tiết</a>
                                    |
                                
                            </tr>
                        <?php    }
                        
                        ?>
                 
                 


                </table>
                <div class="show-all">
                    <a href="#">Show All</a>
                </div>

            </div>




        </main>
        <!-- End Main  -->

        