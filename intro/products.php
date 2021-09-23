<?php
$products=[
    ['name'=>'tshirt','price'=>90,'qnt'=>10],
    ['name'=>'short','price'=>50,'qnt'=>3],
    ['name'=>'cap','price'=>30,'qnt'=>2],
    ['name'=>'glasses','price'=>80,'qnt'=>0],
];
//
//foreach ($products as $product){
//    echo '<h1>' . $product['name'] . '</h1>';
//    echo '<h2 style="color:red"> Price :' . $product['price'] . '</h2>';
//    echo '<h3> QNT :' . $product['qnt'] . '</h3>';
//}

$total=0;
foreach ($products as $product) {
    $total+=$product['price'];
?>
    <h1><?php echo $product['name'] ; ?></h1>
    <h2 style="color:red"> Price :<?php echo $product['price'] ; ?></h2>
    <h3 > QNT :<?php echo $product['qnt'] ;
    if($product['qnt'] == 0){
        echo ' <span>Out of Stock</span>';
    }
    ?></h3>
<?php
}
?>
<div style="position: fixed;right:100px;top:40%;font-size: 50px">
    Total : <?php echo $total; ?>
</div>
