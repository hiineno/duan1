<script>
        function validate(){
            var name = document.getElementById("name").value;
            var price = document.getElementById("price").value;
            var soluong = document.getElementById("soluong").value;
            var description = document.getElementById("description").value;

            if(name == ""){
                document.getElementById("loiname").innerHTML =" Không được để trống ";
                return false;
            }
            else document.getElementById("loiname").innerHTML = "";
            if(price == ""){
                document.getElementById("loiprice").innerHTML = "Không được để trống";
                return false;
            }
            else document.getElementById("loiprice").innerHTML ="";
            if(soluong == ""){
                document.getElementById("loisoluong").innerHTML = " Không được để trống ";
                return false;
            }
            else document.getElementById("loisoluong").innerHTML ="";
            if(description == ""){
                document.getElementById("loides").innerHTML =" Không được để trống";
                return false;
            }
            else document.getElementById("loides").innerHTML ="";
            return true;
        }
    
</script>
<main>
    <link rel="stylesheet" href="./src/css/kkk.css">
    <h1>Add Product</h1>
 
    <div class="add_product">

        <form action="" method="POST" enctype="multipart/form-data">

            <label for="">Product Name</label> <br>
            <input type="text" id="name" name="name" >
            <p id="loiname" style="color: red"></p>
            <br>
            
            <label for=""> Image:</label> <br>
            <input type="file" class="image" id="image" name="image" multiple>
            <p id="loiname" style="color: red"></p>
            <br>
           

            <label for="">Price:</label> <br>
            <input type="number" name="price" id="price">
            <p id="loiprice" style="color: red"></p>
            <br>
            <label for="">Số lượng</label><br>
            <input type="number" name="soluong" id="soluong">
            <p id="loisoluong" style="color: red"></p>

            <br>
            <label for="">Categorie</label> <br>
            <select class="form-select" aria-label="Default select example" name="type">
            <p id="loiname" style="color: red"></p>
            <?php
                $sql = "SELECT * FROM `type` ";
                $kq = getAll($sql);
                 foreach ($kq as $cate) {
                 ?>
                    <option value="<?= $cate['type_id'] ?>"> <?= $cate['type_name']?> </option>
                <?php
                }
                ?>
            </select>
            <br>
            
            <label for="">Desciption:</label> <br>
            <textarea class="form-control" placeholder="Leave a comment here" id="description" name="description"></textarea>
            <p id="loides" style="color: red"></p>
            <br>
                
            <Label>Time:</Label> <br>
            <input type="text" name="view" readonly placeholder="Tự động">
            <br>

            <button onclick="return validate()" type="submit" class="btn" style="margin-top:20px ;" name="submit">Thêm</button>

                

        </form>

    </div>

</main>
