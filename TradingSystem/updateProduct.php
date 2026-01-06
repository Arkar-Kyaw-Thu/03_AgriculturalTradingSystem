<!DOCTYPE html>
<?php
  $conn=mysqli_connect("localhost","root","","tradingsystem")or die("cann't connect to database");
    $item=$_GET['item'];
    $query2="SELECT * FROM product WHERE pid='$item';";
    $result2=mysqli_query($conn,$query2);
    $row=mysqli_fetch_array($result2);
    $oImg=$row['img'];
    $oItemName=$row['itemName'];
    $oItemBrand=$row['itemBrand'];
    $oItemqty=$row['qty'];
    $oItemPrice=$row['price'];

  if(isset($_POST['update'])){
    $filename = $_FILES['uploadfile']['name'];
    $tempname = $_FILES['uploadfile']['tmp_name'];
    $folder = "./images/".$filename;
    $nItemName=$_POST['itemName'];
    $nItemBrand=$_POST['itemBrand'];
    $nItemqty=$_POST['itemqty'];
    $nItemPrice=$_POST['itemPrice'];

    $sql = "UPDATE `product` SET `img`='$filename',`itemName`='$nItemName',`itemBrand`='$nItemBrand',`Price`='$nItemPrice',`qty`='$nItemqty' WHERE pid='$item';";

    mysqli_query($conn,$sql);

    if(!file_exists($folder)){
      move_uploaded_file($tempname , $folder);
    }
    else{
      
    }
    if ($sql==true) {
      header('Location:adminProduct.php');
    }
    else{
      header('Location:updateProduct.php');
    }
  }
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Update Page</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <!-- Bootstrap Font Icon CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
        <!-- Bootstrap CSS Link -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <style>
@import url('https://fonts.googleapis.com/css2?family=Gemunu+Libre:wght@300&family=Open+Sans:ital,wght@0,400;1,300;1,400&family=Passions+Conflict&family=Poppins:wght@100;300;400;500;600&family=Roboto+Slab:wght@300;400;500;600&display=swap');
/* *{
  font-family: 'Poppins', sans-serif;
  font-size: large;
  margin: 0; padding: 0;
  box-sizing: border-box;
  outline: none; border: none;
  text-decoration: none;
} */
.custom-button {
        background-color: #5cb418; /* Your custom color code */
        color: #000; /* Text color */
        border: none; /* Remove border if needed */
    }
    .custom-button:hover {
        background-color: #fff; /* Your custom color code */
        color: #5cb418; 
        border-radius: 5px;
        border:.1rem solid #5cb418; /* Remove border if needed */
    }

            
    </style>
    </head>
    <body 
    style="font-family: 'Poppins', sans-serif; 
           font-size: large;
           margin: 0; padding: 0;
           height: 100%;
           background-color: rgb(240, 251, 241);


    ">

    <!-- Update Form Start -->
    <div class="container mt-5 mb-5" >
      <div class="row">
          <div class="col-md-8 offset-md-2">
              <div class="card">
                  <div class="card-header h-75 d-inline-block" >
                      <h4 class="text-center" ><a href="adminProduct.php" style="text-decoration: none; color: black;float: left;"><i class="fa-solid fa-arrow-left"></i></a><i class="fa-brands fa-pagelines" style="color: #5cb418;"></i>
                        Update your products data<i class="fa-brands fa-pagelines" style="color: #5cb418;"></i></h4>
                  </div>
                    <div class="card-body">
                      <form id="updateForm" method="post" enctype="multipart/form-data">
                          
                          <div class="mb-3">
                            <label for="formFile" class="form-label">Choose Your Photo</label>
                            <input class="form-control" type="file" id="formFile" name="uploadfile" value="<?=$oImg?>">
                          </div> 

                          <div class="mb-3">
                            <label for="title" class="form-label">Item Name</label>
                            <input type="text" class="form-control" id="n1" name="itemName" value="<?=$oItemName?>">
                          </div>

                          <div class="mb-3">
                            <label for="title" class="form-label">Item Brand</label>
                            <input type="text" class="form-control" id="n1" name="itemBrand" value="<?=$oItemBrand?>">
                          </div>

                          <div class="mb-3">
                            <label for="title" class="form-label">Item Qty</label>
                            <input type="text" class="form-control" id="n1" name="itemqty" value="<?=$oItemqty?>">
                          </div>

                          <div class="mb-3">
                            <label for="title" class="form-label">Item Price</label>
                            <input type="text" class="form-control" id="n1" name="itemPrice" value="<?=$oItemPrice?>">
                          </div>

                          <button type="submit"  class="btn custom-button " name="update">Update Data</button>
                        
                      </form>
                    
                  </div>
              </div>
          </div>
      </div>
    </div>
    <!-- Profile end -->

 
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/4eb603963b.js" crossorigin="anonymous"></script>
    <script>  const fileInput = document.querySelector('input[type="file"]');  const myFile = new File(['Hello World!'], '<?=$oImg?>', { type: 'images', lastModified: new Date(), });
 const dataTransfer = new DataTransfer(); 
dataTransfer.items.add(myFile); 
fileInput.files = dataTransfer.files;
 </script>

</body>
</html>
