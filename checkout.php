<?php session_start() ?>
<?php
include("shoppingCartClass.php");
$ob = new shopping();
if (isset($_REQUEST['addToCart'])) {
    $pid = $_REQUEST['pid'];
    $uid = $_REQUEST['userid'];
    $ob->addToCart($pid, $uid);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>ENEST-3</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC|Catamaran&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="main-div">
        <?php
        include("header.php");
        ?>
        <div class="home-page">
            <?php
            include("menu.php");
            ?>
        </div>
        <div class="null">

        </div>
        <div class="main-categorious">
            <div class="footer">
                <div class="categorious">
                    <div class="cate-heading">
                        <p>CATEGORIES</p>
                    </div>
                    <div class="items">
                        <ul>
                            <?php
                            $categories = $ob->categoryDisplay();
                            foreach ($categories as $category) {
                            ?>
                                <a href="products.php?cid=<?php echo $category['id'] ?>" style="text-decoration: none;">
                                    <li><?php echo $category['category'] ?></li>
                                </a>
                            <?php
                            }

                            ?>
                        </ul>
                    </div>
                </div>
                <div class="contact">

                    <div class="contact-us">
                    </div>
                    <div class="dish-info">
                        <table>
                            <tr>
                                <th>ID</th>
                                <th>USER ID</th>
                                <th>PRODUCT ID</th>
                                <th>QUANTITY</th>
                            </tr>
                            <?php
                            $datas = $ob->checkoutDisplay();
                            foreach ($datas as $data) {
                            ?>
                                <tr>
                                    <td><?php echo $data['id'] ?></td>
                                    <td><?php echo $data['userid'] ?></td>
                                    <td><?php echo $data['productid'] ?></td>
                                    <td><?php echo $data['quantity'] ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>

            </div>
            <?php
            include("footer.php");
            ?>
        </div>
    </div>
    </div>
</body>

</html>