<?php
include 'header.php';
if(isset($_GET['do'])){
$do=$_GET['do'];
}else{
    $do='select';
}

if($do == 'select'){
    $categories=$categoryObject->all();
    ?>
    <div class="container mt-5 pt-5">
        <a href="categories.php?do=add" class="btn btn-info text-white">ADD</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">category Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($categories as $category){ ?>
        <tr>
            <th scope="row"><?php echo $category['id'] ?></th>
            <td><?php echo $category['name'] ?></td>

            <td>
<a href="categories.php?do=single&id=<?php echo $category['id'] ?>" class="btn btn-info">View</a>
        <?php if($loginUser['userGroup'] == 'admin'){ ?>

            <a href="categories.php?do=edit&id=<?php echo $category['id'] ?>" class="btn btn-warning">Edit</a>
<a href="categories.php?do=delete&id=<?php echo $category['id'] ?>" class="btn btn-danger">Delete</a>

        <?php } ?>

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
    $category=$categoryObject->find($id);
    ?>
    <div class="container mt-5 pt-5 text-center">
        <h1><?php echo $category['name']; ?></h1>

    </div>
<?php
    }else{
        header("Location:categories.php");
    }
}elseif($do == 'add'){
   ?>
        <div class="container mt-5 pt-5">
    <form class="row g-3 needs-validation" novalidate method="post" action="categories.php?do=insert">
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">category name</label>
            <input type="text" class="form-control" name="name"  id="validationCustom01" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please choose a categoryname.
            </div>
        </div>


        <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
    </form>
        </div>
<?php
}elseif($do == 'insert'){
    $name=$_POST['name'];

    if(empty($name)){
        $errors[]= 'category name can not be empty';
    }

    if(isset($errors)){
        foreach ($errors as $error){
            echo '<div class="alert alert-danger">' . $error . '</div>';
        }
    }else{
        $categoryObject->insert("name='$name'");
        echo '<div class="alert alert-success">Added Successfully</div>';
    }
    header("Refresh:2;url=categories.php");
}elseif($do == 'edit'){
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $category=$categoryObject->find($id);
    }else{
        header("Location:categories.php");
    }
    ?>
    <div class="container mt-5 pt-5">
        <form class="row g-3 needs-validation" novalidate method="post" action="categories.php?do=update">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">category name</label>
                <input type="text" class="form-control" value="<?php echo $category['name']; ?>" name="name"  id="validationCustom01" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please choose a categoryname.
                </div>
            </div>


            <div class="col-12">
                <button class="btn btn-primary" type="submit">Submit form</button>
            </div>
        </form>
    </div>
    <?php
}elseif($do == 'update'){
    $id=$_POST['id'];
    $name=$_POST['name'];
    if(empty($name)){
        $errors[]='categoryname can not be empty';
    }

    if(isset($errors)){
        foreach ($errors as $error){
            echo '<div class="alert alert-danger">' . $error . '</div>';
        }
    }else{ // no errors

            $categoryObject->update("name='$name'",$id);

        echo '<div class="alert alert-success">updated successflly </div>';
        header("Refresh:3;url=categories.php");
    }
}elseif($do == 'delete'){
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $categoryObject->delete($id);
        header("Location:categories.php");
    }else{
        header("Location:categories.php");
    }
}else{
    echo 'you are not authorized';
}
include 'footer.php';