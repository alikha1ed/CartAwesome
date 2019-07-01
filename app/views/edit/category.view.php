<?php require 'app/views/layout/header.php'; ?>

<div class="container" style="margin-left: 35%;margin-top: 50px;margin-bottom:50px;">
    <form action="/save/category" method="POST">
        <label>Category Name: </label>
        <input type="text" value="<?= $_POST['name']; ?>" name="name">
        <input type="text" value="<?= $_POST['id']; ?>" name="id" hidden>
        <br><br>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </form>    
</div>

<?php require 'app/views/layout/error-message.php' ?>
<br><br>
<?php require 'app/views/layout/footer.php'; ?>
