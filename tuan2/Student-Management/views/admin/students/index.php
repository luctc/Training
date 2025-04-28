<?php
    $title = 'List Students';
    include_once __DIR__ . '/../layouts/header.php';
?>


<div class="d-flex justify-content-between align-items-center my-3">
    <h1 class="mb-0">List Students</h1>
    <a href="index.php?act=students/create" class="btn btn-primary">Create</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Class</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($students as $student) : ?>
            <tr>
                <th scope="row"><?= $student['student_id'] ?></th>
                <td><?= $student['name'] ?></td>
                <td><?= $student['email'] ?></td>
                <td><?= $student['phone'] ?></td>
                <td><?= $student['address'] ?></td>
                <td><?= $student['class_name'] ?></td>
                <td class="d-flex">
                    <a href="index.php?act=students/show&id=<?= $student['student_id'] ?>" class="btn btn-success"><i class="bi bi-eye"></i></a>
                    <a href="index.php?act=students/edit&id=<?= $student['student_id'] ?>" class="btn btn-warning mx-2"><i class="bi bi-pencil-square text-light"></i></a>
                    <!-- <a href="index.php?act=students/destroy&id=<?= $student['student_id'] ?>" class="btn btn-danger">Delete</a> -->
                    <form action="index.php?act=students/destroy" method="post">
                        <input type="hidden" name="id" value="<?= $student['student_id'] ?>">
                        <button type="submit" onclick="return confirm('Bạn có muốn xóa hay không?')" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<?php
    include_once __DIR__ . '/../layouts/footer.php';
?>