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

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
        </tr>
        </tbody>
    </table>
    </div>
<?php
}elseif($do == 'single'){
    echo 'single page';
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