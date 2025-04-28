<?php
$title = 'Edit Student';
include_once __DIR__ . '/../layouts/header.php';

?>

<form class="w-50 m-auto p-4 border rounded mt-4" action="index.php?act=students/update" method="post">
    <h2 class="text-center">Edit Students</h2>
    <input type="hidden" name="id" value="<?= $student['student_id'] ?>">
    <div class="row">
        <div class="col">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nhập Name" value="<?= $student['name'] ?>">
                <span class="text-danger"><?= !empty($error['name']) ? $error['name'] : false   ?> </span>
            </div>
        </div>
        <div class="col">
            <div class="mb-3">
                <label for="Email" class="form-label">Email</label>
                <input type="text" class="form-control" id="Email" name="email" placeholder="Nhập Email" value="<?= $student['email'] ?>">
                <span class="text-danger"><?= !empty($error['email']) ? $error['email'] : false   ?> </span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="mb-3">
                <label for="Phone" class="form-label">Phone</label>
                <input type="tel" class="form-control" id="Phone" name="phone" placeholder="Nhập Phone" value="<?= $student['phone'] ?>">
                <span class="text-danger"><?= !empty($error['phone']) ? $error['phone'] : false   ?> </span>
            </div>
        </div>
        <div class="col">
            <div class="mb-3">
                <label class="form-label">Classes</label>
                <select class="form-select" aria-label="Default select example name" name="class_id">
                    <?php foreach ($classes as $class) : ?>
                        <option value="<?= $class['id']; ?>" <?= isset($student['class_id']) && $student['class_id'] == $class['id'] ? 'selected' : '' ?>>
                            <?= $class['class_name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Thanh Oai, Hà Nội" value="<?= $student['address'] ?>">
            <span class="text-danger"><?= !empty($error['address']) ? $error['address'] : false   ?> </span>
        </div>
    </div>

    <div class="mt-3">
        <a href="index.php?act=students" class="btn btn-primary text-white">List Students</a>
        <button type="submit" class="btn btn-success">Submit</button>

    </div>
</form>

<?php
include_once __DIR__ . '/../layouts/footer.php';
?>