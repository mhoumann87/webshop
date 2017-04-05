<?php
include_once ('../includes/header.inc.php');

if (isset($_SESSION['cart'])) {

    $user = mysqli_fetch_assoc(getUser($_SESSION['id']));

    echo '
 <main>   
    <div class="orderBox">
        <h2>Shopping Cart</h2>
       <div class="invoiceHead">
            <div class="address">
            <p>'.$user['user_name'].'</p>
            <p>'.$user['user_street'].' '.$user['user_houseno'].'</p>
            <p>'.$user['user_street2'].'</p>
            <p>'.$user['user_postno'].' '.$user['user_city'].'</p>
       </div>
       <div class="invoiceDate">
            <p>'.date('l j. F Y G:i').'</p>
       </div>
    </div>
    <div class="tableBox">
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
            <td>'.number_format((float)$product['prod_price'], 2, ',', '').'</td>
            <td>'.number_format((float)$subtotal, 2, ',', '').'</td>
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
            <td>'.number_format((float)$total, 2, ',', '').'</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Postage</td>
            <td>'.number_format((float)$postage, 2, ',', '').'</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>To Pay</td>
            <td>'.number_format((float)$newTotal, 2, ',', '').'</td>
        </tr>
    </tbody>
    </table>
    </div>
    ';

} else {
    redirect('./not_found_404.php');
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_SESSION['cart'] = null;
      redirect('./index.php');

}
echo '
    <div class="sendOrder">
    <form action="./cart.php" method="post">
        <input type="submit" value="Send Order">
    </form>
</div>
    </div>
    </main>
';




include_once ('../includes/footer.inc.php'); ?>
