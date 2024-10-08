<?php
require 'users/users.php';

$users = getUsers();

include 'partials/header.php';
?>


<div class="container">
    <p>
        <a class="btn btn-success" href="create.php">Create new User</a>
    </p>

    <table class="table">
        <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Website</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td>
                    <?php if (isset($user['extension'])): ?>
                        <img style="width: 60px" src="<?= "users/images/".$user['id'].'.'.$user['extension'] ?>" alt="">
                    <?php endif; ?>
                </td>
                <td><?= $user['name'] ?></td>
                <td><?=  $user['username'] ?></td>
                <td><?=  $user['email'] ?></td>
                <td><?=  $user['phone'] ?></td>
                <td>
                    <a target="_blank" href="http://<?= $user['website'] ?>">
                        <?= $user['website'] ?>
                    </a>
                </td>
                <td>
                    <a href="view.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-outline-info">View</a>
                    <a href="update.php?id=<?= $user['id'] ?>"
                       class="btn btn-sm btn-outline-secondary">Update</a>
                    <form method="POST" action="delete.php">
                        <input type="hidden" name="id" value="<?= $user['id'] ?>">
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach;; ?>
        </tbody>
    </table>
</div>

<?php include 'partials/footer.php' ?>
