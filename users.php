<?php
include 'header.php';
if(isset($_GET['do'])){
$do=$_GET['do'];
}else{
    $do='select';
}

if($do == 'select'){
    $users=$userObject->all();
    ?>
    <div class="container mt-5 pt-5">
        <a href="users.php?do=add" class="btn btn-info text-white">ADD</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">User Name</th>
            <th scope="col">Email</th>
            <th scope="col">Registration Date</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user){ ?>
        <tr>
            <th scope="row"><?php echo $user['id'] ?></th>
            <td><?php echo $user['userName'] ?></td>
            <td><?php echo $user['email'] ?></td>
            <td><?php echo $user['regDate'] ?></td>
            <td>
<a href="users.php?do=single&id=<?php echo $user['id'] ?>" class="btn btn-info">View</a>
<a href="users.php?do=edit&id=<?php echo $user['id'] ?>" class="btn btn-warning">Edit</a>
<a href="users.php?do=delete&id=<?php echo $user['id'] ?>" class="btn btn-danger">Delete</a>


            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    </div>
<?php
}elseif($do == 'single'){
    if(isset($_GET['id']) AND !empty($_GET['id'])){
    $id=$_GET['id'];
    $user=$userObject->find($id);
    ?>
    <div class="container mt-5 pt-5 text-center">
        <h1><?php echo $user['userName']; ?></h1>
        <h2><?php echo $user['email']; ?></h2>
        <h3><?php echo $user['regDate']; ?></h3>
    </div>
<?php
    }else{
        header("Location:users.php");
    }
}elseif($do == 'add'){
   ?>
        <div class="container mt-5 pt-5">
    <form class="row g-3 needs-validation" novalidate method="post" action="users.php?do=insert">
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">User name</label>
            <input type="text" class="form-control" name="userName"  id="validationCustom01" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please choose a username.
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="validationCustom02"  required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please choose a email.
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustomUsername" class="form-label">Password</label>
            <div class="input-group has-validation">
                <input type="password" class="form-control" name="password" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please choose a password.
                </div>
            </div>
        </div>

        <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
    </form>
        </div>
<?php
}elseif($do == 'insert'){
    $userName=$_POST['userName'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $passhash=password_hash($password,PASSWORD_BCRYPT);

    if(empty($userName)){
        $errors[]= 'user name can not be empty';
    }
    if(empty($email)){
        $errors[]=  'email can not be empty';
    }
    if(empty($password)){
        $errors[]=  'password can not be empty';
    }
    $count=$userObject->unique("userName='$userName'");
    if($count > 0 ){
        $errors[]=  'User Name is already registered';
    }
    $count=$userObject->unique("email='$email'");
    if($count > 0 ){
        $errors[]=  'email is already registered';
    }
    if(isset($errors)){
        foreach ($errors as $error){
            echo '<div class="alert alert-danger">' . $error . '</div>';
        }
    }else{
        $userObject->insert("userName='$userName',email='$email',password='$passhash'");
        echo '<div class="alert alert-success">Added Successfully</div>';
    }
    header("Refresh:2;url=users.php");
}elseif($do == 'edit'){
    echo 'edit page';
}elseif($do == 'update'){
    echo 'update page';
}elseif($do == 'delete'){
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $userObject->delete($id);
        header("Location:users.php");
    }else{
        header("Location:users.php");
    }
}else{
    echo 'you are not authorized';
}
include 'footer.php';