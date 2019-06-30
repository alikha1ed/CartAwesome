<?php require 'app/views/layout/header.php';?>

<div class="container">
    <h2 class="mt-5 text-center">Vendor Dashboard</h2>
    <form action="/profile/admin" method="POST">
        <h3 class="mt-5">Add Product</h3>
        <hr>
        <div class="form-row justify-content-center">
            <div class="form-group col-md-5">
                <label>Name</label>
                <input type="text" class="form-control" name="name" required
                    value="<?=isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''?>">
                <br>
            </div>
            <div class="col-md-3">
                <label for="priceFormInputGroup">Price</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">EGP</div>
                    </div>
                    <input type="text" class="form-control" id="priceFormInputGroup">
                </div>
            </div>
        </div>
        <div class="form-row justify-content-center">
            <div class="form-group custom-file col-md-8 mb-4">
                <input type="file" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choose image</label>
            </div>
        </div>
       
        <div class="mx-auto" style="width: 200px;">
            <button type="submit" class="btn btn-primary">Add Product</button>
        </div>

    </form>

    <?php require 'app/views/layout/errorMessage.php'?>

</div>

<?php require 'app/views/layout/footer.php';?>