<?php

$a = array(12,23,3,42,5);
var_dump($a);


$i = 0;
$glued = '';
$trimmed = rtrim($glued,",");
foreach($a as $value) {

    $glued = $glued."$value".',';
    $i++;
    $trimmed = trim($glued,",");
}
var_dump($trimmed);



$glued2 = implode(',',$a);
var_dump($glued2);

$exploded = explode(',',$glued2);
var_dump($exploded);


$exploded[] = 22;
var_dump($exploded);

$glued3 = implode(',', $exploded);
var_dump($glued3);

$b = array(12,23,3,42,5);

$serialized = serialize($b);
var_dump($serialized);
$deserialized = unserialize($serialized);
var_dump($deserialized);

$c = array (
    array('dupa' => 1,'cycki' =>2),
    array('a','b'),
    array(1,'a')
);

$serialized1 = serialize($c);
var_dump($serialized1);
$deserialized1 = unserialize($serialized1);
var_dump($deserialized1);

session_start();

$_SESSION['a'] = 'abc';
$_SESSION['b'] = 'def';
$_SESSION['c'] = 'ghi';
$_SESSION['d'] = array(1,2,3);

//
//<article>
//    <h2 style="text-align: center">Zawartość koszyka</h2>
//</article>
//
//<?php
//if(isset($_POST['addToCart'])){
//    if(isset($_COOKIE['cart'])) {
//        $cookieValue = $_COOKIE['cart'];
//        $cookieArray = explode(',', $cookieValue);
//        } else {
//        $cookieValue = '';
//        $cookieArray = [];
//        }
//
//
// //   var_dump($cookieArray); die;
//        $cookieArray[] = $_POST['addToCart'];
//        $products = array_unique($cookieArray);
//        $imploded = implode(',', $products);
//        setcookie('cart', $imploded);
//        header('Location: /?page=shoppingCart');
//}
//
//if (isset($_COOKIE['cart']))
//{
//    $cart = $_COOKIE['cart'];
//    var_dump($cart);
//    $exploded = explode(',',$cart);
//    $stmt1 = $pdo->query('SELECT * FROM products WHERE ID IN ('.implode(',',$exploded).')');
//    if($stmt1 == false){
//        echo "Error connecting to database";
//    } else {
//        $cartProducts = $stmt1->fetchAll(PDO::FETCH_OBJ);
//        foreach ($cartProducts as $cartProduct) {
//            //   var_dump($cartProduct);
//            echo '<article>'.htmlEscape($cartProduct->content).' '.
//                '<img src='.htmlEscape($cartProduct->img).' '.'class = "imgView">'.' '.
//                '<p class="price">'.' '.'Cena'.' '.htmlEscape($cartProduct->price).' '.'zł'.'</p>'.
//                '<form action="/?page=shoppingCart" method="post">'.
//                '<button type="submit" name="deleteFromCart"  value="'.$cartProduct->ID.'">Usuń z koszyka</button>'.
//                '</form>'.
//                '</article>';
//        }
//    }
//} else {
//    echo 'Koszyk jest pusty';
//}
//
//if(isset($_POST['deleteFromCart'])){
//    $cookieArray = explode(',',$_COOKIE['cart']);
//    if(($key = array_search($_POST['deleteFromCart'],$cookieArray)) !== false){
//        unset($cookieArray[$key]);
//    }
//var_dump($cookieArray);
//    $imploded = implode(',', $cookieArray);
//    setcookie('cart',$imploded);
//    header('Location: /?page=shoppingCart');
//}
//
