<?php
    $title = 'Show Students';
    include_once __DIR__ . '/../layouts/header.php';
?>

<form class="w-50 m-auto p-4 border rounded mt-4">
    <h2 class="text-center">Show Students</h2>
    <div class="row">
        <div class="col">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nhập Name" value="<?= $student['name'] ?>" disabled>
            </div>
        </div>
        <div class="col">
            <div class="mb-3">
                <label for="Email" class="form-label">Email</label>
                <input type="text" class="form-control" id="Email" name="email" placeholder="Nhập Email" value="<?= $student['email'] ?>" disabled>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="mb-3">
                <label for="Phone" class="form-label">Phone</label>
                <input type="tel" class="form-control" id="Phone" name="phone" placeholder="Nhập Phone" value="<?= $student['phone'] ?>" disabled>
            </div>
        </div>
        <div class="col">
            <div class="mb-3">
                <label class="form-label">Classes</label>
                <input type="text" class="form-control" value="<?= $student['class_name'] ?>" disabled>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Thanh Oai, Hà Nội" value="<?= $student['address'] ?>" disabled>
        </div>
    </div>

    <div class="mt-3">
        <a href="index.php?act=students" class="btn btn-primary text-white">List Students</a>
        <a href="index.php?act=students/edit&id=<?= $student['student_id'] ?>" class="btn btn-warning text-white">Edit</a>
    </div>
</form>











<?php 
    include_once __DIR__ . '/../layouts/footer.php';
?>