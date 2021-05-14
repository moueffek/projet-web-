<?php require'header.php';?>
    <!-- Cart Start -->
        <div class="cart-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart-page-inner">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                    /*$ids = array_keys($_SESSION['panier']);
                                    if(empty($ids)){
                                    $products = array();
                                    }else{
                                    $products = $DB->query('SELECT * FROM products WHERE id IN ('.implode(',',$ids).')');
                                    }*/
                                    $products = $panier->getProducts();
                                    foreach($products as $product): 
                                    ?>
                                    <tbody class="align-middle">
                                        <tr>
                                            <td>
                                                <div class="img">
                                                    <a href="#"><img src="img/<?= $product->id; ?>.jpg" alt="Image"></a>
                                                    <?= $product->name; ?>
                                                </div>
                                            </td>
                                            <td><?= $product->Prix; ?>$</td>
                                            <td>
                                                <div class="qty">
                                                    <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                                    <input type="text" value="<?= $product->quantite; ?>">
                                                    <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </td>
                                            <td><?= $product->Prix * $product->quantite;?>$</td>
                                            <td>
                                            <button><a href="cart.php?delpanier=<?= $product->id; ?>" class="del"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="cart-page-inner">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="cart-summary">
                                        <div class="cart-content">
                                            <h1>Cart Summary</h1>
                                            <p>Sub Total<span><?= number_format($panier->total()); ?>$</span></p>
                                            <p>Shipping Cost<span>40$</span></p>
                                            <h2>Grand Total<span><?= number_format($panier->total()+40); ?> $</span></h2>
                                        </div>
                                        <div class="cart-btn">
                                            <button><a href="index.php">Update Cart</a></button>
                                            <button><a href="checkout.php">Checkout</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart End -->
        <?php require 'footer.php';?>  
       