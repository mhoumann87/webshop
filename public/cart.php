<?php
include_once ('../includes/header.inc.php');

if (isset($_SESSION['cart'])) {

    $user = mysqli_fetch_assoc(getUser($_SESSION['id']));

    echo '
    <p>'.$user['user_name'].'</p>
    <p>'.$user['user_street'].' '.$user['user_houseno'].'</p>
    <p>'.$user['user_street2'].'</p>
    <p>'.$user['user_postno'].' '.$user['user_city'].'</p>
    <br>
    <br>
    <p>'.date('l j. F Y').'</p>
    <br>
    <br>
    <br>
    <br>
    <br>
    <table class="invoice">
    <thead>
        <tr class="headerRow">
            <th>Product Number</th>
            <th>Artist</th>
            <th>Title</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total Price</th>
        </tr>
    </thead>
    <tbody>
  ';
reset($_SESSION['cart']);
$total = 0;
while (list($key, $val) = each($_SESSION['cart'])) {
    echo "$key => $val\n";
    $product = mysqli_fetch_assoc(findProduct($key));
    $subtotal = $val * $product['prod_price'];
    $total = $total + $subtotal;

    $postage = 0;
    if ($total > 750) {
        $postage = 0;
    } else {
        $postage = 40;
    }
    $newTotal = $total + $postage;
    echo '
  <tr>
    <td>'.$product['prod_number'].'</td>
    <td>'.$product['prod_artist'].'</td>
    <td>'.$product['prod_title'].'</td>
    <td>' . $val . '</td>
    <td>'.$product['prod_price'].'</td>
    <td>'.$subtotal.'</td>
';
}

echo '
  </tr>
  <tr class="emptyRow">
  
</tr>
  <tr>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>Total</td>
  <td>'.$total.'</td>
</tr>
</tr>
  <tr>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>Postage</td>
  <td>'.$postage.'</td>
</tr>
</tr>
  <tr>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>To Pay</td>
  <td>'.$newTotal.'</td>
</tr>
</tbody>
</table>
  
    
    
    ';


}else {
    redirect('./not_found_404.php');
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {


  $_SESSION['cart'] = null;
  redirect('./index.php');
}

echo '
    <form action="./cart.php" method="post">
        <input type="submit" value="Send Order">
    </form>
';









include_once ('../includes/footer.inc.php'); ?>
