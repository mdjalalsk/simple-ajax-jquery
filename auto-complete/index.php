<?php

// Create connection
$conn = new mysqli('localhost', 'root', '', 'ajax_test');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto Complete</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <div class="container">
        <div class="row">

            <div class="col-10 mt-5">
                <h1 class="text-center">Student Form</h1>

                <form action="" method="post" class="border p-2">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">name</label>
                        <input type="name" class="form-control" id="name" name="n" placeholder="Enter your name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                        <input type="email" class="form-control" name="password" id="password" placeholder="Enter your password">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Degree</label>
                        <select name="degree" id="degree" class="form-control">
                         <option value="-1">Select</option>
                            <?php
                            $q="select * from degree";

                            $degree=$conn->query($q);
                            if ($degree) {
                                while ($row = $degree->fetch_assoc()) {
                             ?>
                             <option value="<?= $row['id'] ?>"><?=$row['name'] ?></option>
         
                            <?php     
                                }
                            }
                            ?>
                        
                        
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Year</label>
                        <select name="year" id="year" class="form-control">
                        <option value="-1">Select</option>
                       
                        </select>
                    </div>
                    <button class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
       $(document).ready(function(){
        $("#degree").change(function(){
            var selectedDegree=$(this).val();
            // console.log(selectedDegree);
      
        if(selectedDegree !=="-1"){
            $.ajax({
                type: "POST",
                url:'year.php',
                data:{degree:selectedDegree},
              
                success:function(data){
                    $('#year').html(data);
                    // console.log(data)
                }
            })
        }else{
            $('#year').html('<option value="-1">Select</option>');
        }

    });

       });
    </script>

</body>

</html>