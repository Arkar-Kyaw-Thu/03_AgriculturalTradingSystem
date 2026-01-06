<?php
include("connection.php");
$date=date('d-m-Y');

$title="";
$photo="";
$color="";
$body="";
if(isset($_GET['id']))
{
  $id=$_GET['id'];
  $sql = "SELECT * FROM  knowledge WHERE kid='$id'";
  $delete=$db->query($sql);
  $row = $delete->fetch();
  if($row){
    $title=$row->knowledgeTitle;
    $photo=$row->knowledgePhoto;
    $body=$row->knowledgeDescript;
  }
}


if(isset($_POST['submit']) && isset($_FILES['my_image']))
{
  echo "<pre>";
  print_r($_FILES['my_image']);
  echo "</pre>";
  $uname=$_POST['uname'];
  
  
  $mnumber=$_POST['mnumber'];
  $number=$_POST['number'];
  echo "$number";
  echo " $mnumber";

  $img_name=$_FILES['my_image']['name'];
  
  $img_size=$_FILES['my_image']['size'];
  $tmp_name=$_FILES['my_image']['tmp_name'];
  $error=$_FILES['my_image']['error'];
  if($error === 0)
  {
    if ($img_size> 125000000) {
      $em="unknown error occurred!";
    header("Location: Addpage2.php?error=$em");
          
    }else{
      $img_ex=pathinfo($img_name, PATHINFO_EXTENSION);
      $img_ex_lc=strtolower($img_ex);

      $allowed_exs=array("jpg", "jpeg", "png");

      if(in_array($img_ex_lc, $allowed_exs))
      {
        $new_img_name=uniqid("IMG-",true).'.'.$img_ex_lc;
        $img_upload_path = 'img/'.$new_img_name;
        move_uploaded_file($tmp_name, $img_upload_path);
        //Insert into Database
               
        if(isset($_GET['id']))
        {
          $sql ="UPDATE knowledge SET knowledgeTitle='$uname', knowledgePhoto='$new_img_name', knowledgeDescript='$mnumber',CurrentDate='$date' WHERE kid= '$id'";

        }else{
          $sql = "INSERT INTO knowledge( knowledgeTitle, knowledgePhoto, knowledgeDescript,CurrentDate) VALUES ('$uname', '$new_img_name','$mnumber','$date')";
        }

        $insert=$db->query($sql);
        if($insert){
          header("Location:adminKnowledgepage.php");
        }else{
          header("Location:aa.php");
        }
      }else{
        $em="You can't upload files of this type";
        header("Location: admin.php?error=$em");
      }
    }
  }else{
    $em="unknown error occurred!";
    header("Location: admin.php?error=$em");
  }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Update Page</title>
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
    <form action="" method="post" enctype="multipart/form-data">
    <div class="container mt-5 mb-5" >
      <div class="row">
          <div class="col-md-8 offset-md-2">
              <div class="card">
                  <div class="card-header h-75 d-inline-block" >
                      <h4 class="text-center" ><i class="fa-brands fa-pagelines" style="color: #5cb418;"></i>
                        Update your informations<i class="fa-brands fa-pagelines" style="color: #5cb418;"></i></h4>
                  </div>
                    <div class="card-body">
                      <form id="updateForm">

                          <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="n1" placeholder="Enter your title.." required name="uname" value="<?php echo $title;?>">
                          </div>
                          
                          <div class="mb-3">
                            <label for="formFile" class="form-label">Choose Your Photo</label>
                            <input class="form-control" type="file" id="formFile" name="my_image" value="uploads/<?php echo $photo;?>">
                          </div> 

                          
                          <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter your Description.." name="mnumber"><?php echo $body;?></textarea>
                          </div>
                          <button type="submit"  class="btn custom-button " name="submit">Update Data</button>
                        
                      </form>
                    
                  </div>
              </div>
          </div>
      </div>
    </div>
    <!-- Profile end -->
  </form>

 
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/4eb603963b.js" crossorigin="anonymous"></script>
    <script>  const fileInput = document.querySelector('input[type="file"]');  const myFile = new File(['Hello World!'], '<?php echo $photo;?>', { type: 'image', lastModified: new Date(), });
 const dataTransfer = new DataTransfer(); 
dataTransfer.items.add(myFile); 
fileInput.files = dataTransfer.files;
 </script>



</body>
</html>
