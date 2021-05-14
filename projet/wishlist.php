<?php require'header.php';?>
<!-- Wishlist Start -->
<div class="wishlist-page">
            <div class="container-fluid">
                <div class="wishlist-page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Add to Cart</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                    $ids = array_keys($_SESSION['panier']);
                                    if(empty($ids)){
                                    $products = array();
                                    }else{
                                    $products = $DB->query('SELECT * FROM products WHERE id IN ('.implode(',',$ids).')');
                                    }
                                    foreach($products as $product): 
                                    ?>                                    
                                    <tbody class="align-middle">
                                        <tr>
                                            <td>
                                                <div class="img">
                                                    <a href="#"><img src="img/<?= $product->id; ?>.jpg" alt="Image"></a>
                                                    <p><?= $product->name; ?></p>
                                                </div>
                                            </td>
                                            <td><?= $product->Prix; ?>$</td>
                                            <td><button class="btn-cart"><a href ="cart.php">Add to Cart</a></button></td>
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
                </div>
            </div>
        </div>
        <!-- Wishlist End -->
        <?php require 'footer.php';?>  