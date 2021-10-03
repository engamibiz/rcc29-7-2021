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
    echo 'add page';
}elseif($do == 'insert'){
    echo 'insert page';
}elseif($do == 'edit'){
    echo 'edit page';
}elseif($do == 'update'){
    echo 'update page';
}elseif($do == 'delete'){
    echo 'delete page';
}else{
    echo 'you are not authorized';
}
include 'footer.php';