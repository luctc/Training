<?php
$title = 'Create Student';
include_once __DIR__ . '/../layouts/header.php';

?>

<form class="w-50 m-auto p-4 border rounded mt-4">
    <h2 class="text-center">Create Students</h2>
    <div class="row">
        <div class="col">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Nhập Name"> 
            </div>
        </div>
        <div class="col">
            <div class="mb-3">
                <label for="Email" class="form-label">Email</label>
                <input type="email" class="form-control" id="Email" placeholder="Nhập Email">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="mb-3">
                <label for="Phone" class="form-label">Phone</label>
                <input type="tel" class="form-control" id="Phone" placeholder="Nhập Phone">
            </div>
        </div>
        <div class="col">
            <div class="mb-3">
                <label class="form-label">Classes</label>
                <select class="form-select" aria-label="Default select example">
                    <?php foreach ($classes as $class) : ?>
                        <option value="<?=  $class['id']; ?>">
                            <?= $class['class_name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <label for="address" class="form-label">Address 2</label>
            <input type="text" class="form-control" id="address" placeholder="Thanh Oai, Hà Nội">
        </div>
    </div>

    <div class="mt-3">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="index.php?act=students" class="btn btn-info text-white">List Students</a>
    </div>
</form>

<?php
include_once __DIR__ . '/../layouts/footer.php';
?>