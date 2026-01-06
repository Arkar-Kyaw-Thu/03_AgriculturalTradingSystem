<!DOCTYPE html>
<?php
  include 'header.php';
  $user_id = $_SESSION['user_id'];
if(isset($_GET['deleteItem'])){
    $item=$_GET['deleteItem'];
    $deleteQuery="DELETE FROM shoppingcart WHERE uid='$user_id' AND pid='$item';";
    mysqli_query($conn,$deleteQuery);
}
if (isset($_GET['plusitemName'])) {
  $itemName=$_GET['plusitemName'];
  $res = mysqli_query($conn,"SELECT * FROM product WHERE pid='$itemName'");
  $product = mysqli_fetch_array($res);
  $rqty = $product['qty'];
  $query1="SELECT * FROM shoppingcart WHERE uid='$user_id' AND pid='$itemName'";
  $result1=mysqli_query($conn,$query1);
  $row1=mysqli_fetch_array($result1);
  if($result1){
    $value=(int)$row1['Qty'];
    if($value<$rqty){
      $final=$row1['Price'];
      $finalvalue=$value+1;
      $finalprice=$final*$finalvalue;
 
      $update="UPDATE shoppingcart SET Qty='$finalvalue',Totalprice='$finalprice' WHERE uid='$user_id' AND pid='$itemName';"; 
      $re=mysqli_query($conn,$update);
    }
    else{
      echo "<script>alert('သင်လိုချင်သောပမာဏမရှိပါ။');</script>";
    }
  }
}

if (isset($_GET['minusitemName'])) {
  $itemName=$_GET['minusitemName'];
  $query1="SELECT * FROM shoppingcart WHERE uid='$user_id' AND pid='$itemName'";
  $result1=mysqli_query($conn,$query1);
  $row1=mysqli_fetch_array($result1);
  if($result1){
    $value=(int)$row1['Qty'];
  }

  if($value!=0){
    $final=$row1['Totalprice'];
    $price=$row1['Price'];
    $finalvalue=$value-1;
    $finalprice=$final-$price;
 
    $update="UPDATE shoppingcart SET Qty='$finalvalue',Totalprice='$finalprice' WHERE uid='$user_id' AND pid='$itemName'"; 
    $re=mysqli_query($conn,$update);
  }
}

?>

<html>
  <head>
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- font awesome cdn link -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- bootstrap cdn link JS -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="buynowpage.css" />
    <!-- custom css file link -->
    <link rel="stylesheet" href="khin.css" />
  </head>
 
  <body>
    <div class="card">
      <div class="row">
        <div class="col-md-8 cart">
          <div class="title">
            <div class="row">
<?php
  if(!isset($_COOKIE['fullname'])){
?>
              <div class="col">
                <a href="address.html">
                  <h3>
                    <i class="fa fa-plus"></i>
                    Shipping Address
                  </h3>
                </a>
              </div>
<?php
}else{
?>
              <div class="col">
                <br>
                <h3>
                  <i class="fa-solid fa-user"></i><?=$_COOKIE['fullname']?><br><br>
                  <i class="fa-solid fa-envelope"></i><?=$_COOKIE['email']?>

                </h3>
              </div>
              <div class="col">
                <br>
                <h3>
                  <i class="fa-solid fa-address-book"></i><?=$_COOKIE['country']?>, <?=$_COOKIE['street']?><br><br>
                  <i class="fa-solid fa-phone"></i><?=$_COOKIE['phone']?>
                </h3>
              </div>
              <div class="col">
                <br>
                <a href="address.html">
                  <h3>
                    <i class="fa-solid fa-pen-to-square"></i>
                    Edit Address
                  </h3>
                </a>
              </div>
<?php
}
?>
              <!--<div class="col text-right">
                <a href="payment.html">
                  <h3>
                    <i class="fa-solid fa-credit-card"></i>
                    Payment Method
                  </h3>
                </a>
              </div>-->
            </div>
          </div>
          <div class="back-to-shop">
            <a href="productPage.php"
              >&leftarrow; <span class="text-muted">Back to shop</span></a
            >
          </div>
<?php
  $query1="SELECT * FROM shoppingcart WHERE uid='$user_id';";
  $result1=mysqli_query($conn,$query1);
  $num1=mysqli_num_rows($result1);

  for($i=1;$i<=$num1;$i++){
    $row1=mysqli_fetch_array($result1);
    $item=$row1['pid'];
    $query="SELECT * FROM product WHERE pid='$item';";
    $result=mysqli_query($conn,$query);
    $num=mysqli_num_rows($result);
    $row=mysqli_fetch_array($result);
?>


          <div id="myDiv" class="row border-top border-bottom">
            <div class="row main align-items-center">
              <div class="col-2">
                <!--<input
                  type="checkbox"
                  class="radio-input"
                  name="itemName[]"
                  value="<?=$row['itemName']?>"
                />-->
                <img class="img-fluid" src="images/<?=$row['img']?>" class="product_img" />
              </div>
              <div class="col">
                <div class="row text-muted"><?=$row['itemBrand']?></div>
                <div class="row"><?=$row['itemName']?></div>
              </div>
              <!-- brain-increment-&-decrement -->
              <div class="col">
                <div class="counter">
                 <a href="buynowpage.php? minusitemName=<?=$row['pid']?>"> <button class="decrementBtn">-</button></a>
                  <span class="count" name="value"><?=$row1['Qty']?></span>
                  <input type="text" class="iPrice" value="10000" style="display: none;">
                 <a href="buynowpage.php? plusitemName=<?=$row['pid']?>"><button class="incrementBtn"> +</button></a>
                </div>
              </div>
              <div class="col">
                <div class="row">
                  <div class="col-8">
                    <div><?=$row['price']?></div>
                  </div>

                  <div class="col">
                    <a href="buynowpage.php? deleteItem=<?=$row['pid']?>"><i class="fa-solid fa-trash remove-icon"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
<?php
  }
?>
<?php
$count=0;
$price=0;
$q="SELECT * FROM shoppingcart WHERE uid='$user_id' order by cid desc;";
$result=mysqli_query($conn,$q);

while($row=mysqli_fetch_array($result))
{
  $num=$row['Qty'];
  $count=$count+$num;
  $p=$row['Totalprice'];
  $price=$price+$p;

}

?>
        </div>
        <div class="col-sm summary border-left">
          <div class="">
            <h5><b>Summary</b></h5>
          </div>
          <hr />
          <div class="row">
            <div class="col" style="padding-left: 0">Quantity</div>
            <div class="col-8 text-right"><span id="summaryQty"><?php echo $count;?></span> Items</div>
          </div>
          <form>
            <div class="row">
              <div class="col" style="padding-left: 0">Total item costs</div>
              <div class="col text-right"><span id="summaryCost"><?php echo $price;?></span> Ks</div>
            </div>
            <div class="row mt-3">
              <div class="col" style="padding-left: 0">
                Tax included
                <br />
                <h4>(GST 5.0%)</h4>
              </div>
              <div class="col text-right">3000 Ks</div>
            </div>
            <div class="row mt-3">
              <div class="col" style="padding-left: 0">Delivery Fees</div>
              <div class="col text-right">Free</div>
            </div>
          </form>
          <div
            class="row"
            style="border-top: 1px solid rgba(0, 0, 0, 0.1); padding: 2.8vh 0"
          >
            <div class="col">TOTAL PRICE</div>
            <div class="col text-right">MMK <span id="summaryTotal"><?php echo $price+3000;?></span></div>
          </div>
<?php
  if(!isset($_COOKIE['fullname'])){
?>
            <a href="address.html">
              <p class="btn-custom-buynow">Buy Now</p>
            </a>
<?php
}else{
?>
          <a href="payment.php">
            <p class="btn-custom-buynow">Buy Now</p>
          </a>
<?php } ?>
        </div>
      </div>
    </div>

    <script>
     /* const incrementBtns = document.querySelectorAll(".incrementBtn");
      const decrementBtns = document.querySelectorAll(".decrementBtn");

      incrementBtns.forEach((btn) => {
        btn.addEventListener("click", function () {

          let countSpan = this.parentElement.querySelector(".count");
          let count = parseInt(countSpan.textContent);
          count++;
          countSpan.textContent = String(count);

          var summaryQtySpan = document.getElementById("summaryQty");
          var summaryQty = parseInt(summaryQtySpan.innerHTML);
          summaryQty++;
          summaryQtySpan.innerHTML = String(summaryQty);

          let priceSpan = this.parentElement.querySelector(".iPrice");
          let price = parseInt(priceSpan.value);

          var summaryCostSpan = document.getElementById("summaryCost");
          var summaryCost = parseInt(summaryCostSpan.innerHTML);
          summaryCost+=price;
          summaryCostSpan.innerHTML = String(summaryCost);

          var summaryTotalSpan = document.getElementById("summaryTotal");
          var summaryTotal = parseInt(summaryTotalSpan.innerHTML);
          summaryTotal+=price;
          summaryTotalSpan.innerHTML = String(summaryTotal);

        });
      });

      decrementBtns.forEach((btn) => {
        btn.addEventListener("click", function () {

          let countSpan = this.parentElement.querySelector(".count");
          let count = parseInt(countSpan.textContent);
          if (count > 0) {
            count--;
            countSpan.textContent = String(count);

          var summaryQtySpan = document.getElementById("summaryQty");
          var summaryQty = parseInt(summaryQtySpan.innerHTML);
          summaryQty--;
          summaryQtySpan.innerHTML = String(summaryQty);

          let priceSpan = this.parentElement.querySelector(".iPrice");
          let price = parseInt(priceSpan.value);

          var summaryCostSpan = document.getElementById("summaryCost");
          var summaryCost = parseInt(summaryCostSpan.innerHTML);
          summaryCost-=price;
          summaryCostSpan.innerHTML = String(summaryCost);

          var summaryTotalSpan = document.getElementById("summaryTotal");
          var summaryTotal = parseInt(summaryTotalSpan.innerHTML);
          summaryTotal-=price;
          summaryTotalSpan.innerHTML = String(summaryTotal);
          }
        });
      });

        /*function mToE(num){
          var rNum=new String();
          const mNumber=new Array("၀","၁","၂","၃","၄","၅","၆","၇","၈","၉");
          const eNumber=new Array("0","1","2","3","4","5","6","7","8","9");
          for(var i=0;i<num.length;i++){
              for(var j=0;j<mNumber.length;j++){
                if(num[i]==mNumber[j]){
                  rNum+=eNumber[j];
                }
              }
          }
          return rNum;
        }

        function eToM(num){
          var rNum=new String();
          const mNumber=new Array("၀","၁","၂","၃","၄","၅","၆","၇","၈","၉");
          const eNumber=new Array("0","1","2","3","4","5","6","7","8","9");
          for(var i=0;i<num.length;i++){
              for(var j=0;j<eNumber.length;j++){
                if(num[i]==eNumber[j]){
                  rNum+=mNumber[j];
                }
              }
          }
          return rNum;
        }
        */
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  </body>
</html>
