<?php
session_start();
if(isset($_SESSION['login'])){
    header("Location:users.php");
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include 'connect.php';
    $email= $_POST['email'];
    $password= $_POST['password'];
    $stmt=$conn->prepare("SELECT * FROM users WHERE email='$email'");
    $stmt->execute();
    $count=$stmt->rowCount();
    if($count > 0 ){ // mail is found
        $user=$stmt->fetch();
        if(password_verify($password,$user['password'])){ //right password
            $_SESSION['login']=$email;
            $_SESSION['id']=$user['id'];
            header("Location:users.php");
        }else{ // wrong password
            $msg= '<div class="alert alert-danger">Wrong Password</div>';
        }
    }else{ // mail not found
        $msg= '<div class="alert alert-danger">Email is not found</div>';
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>

<form class="row g-3 needs-validation d-block mx-auto w-50 border p-5 my-5" method="post" novalidate>
    <?php if(isset($msg)){
        echo $msg;
    }
    ?>
    <div class="col-md-12">
        <label for="validationCustom01" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="validationCustom01"  required>
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>
    <div class="col-md-12">
        <label for="validationCustom02" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="validationCustom02"  required>
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>

    <div class="col-12">
        <button class="btn btn-primary" type="submit">Submit form</button>
    </div>
</form>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
</body>
</html>