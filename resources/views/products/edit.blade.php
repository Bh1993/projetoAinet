<?php
if (count($errors) > 0) {
    require 'src/views/products/partials/errors.view.php';
}
?>
<form action="products-edit.php" method="post" class="form-group">
    <input type="hidden" name="product_id" value="<?= $product->product_id ?>" />
    <?php require('src/views/products/partials/add.view.php') ?>
    <div class="form-group">
        <button type="submit" class="btn btn-success" name="ok">Save</button>
        <button type="submit" class="btn btn-default" name="cancel">Cancel</button>
    </div>
</form>
