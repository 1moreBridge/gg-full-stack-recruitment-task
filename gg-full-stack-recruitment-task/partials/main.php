<div class="container text-center"><h1>Backend/Full-stack recruitment task</h1></div>

<div class="container">
    <p>
        <a class="btn btn-success" href="create.php">Create New User</a>
    </p>

    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Company</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['name'] ?></td>
                <td><?php echo $user['username'] ?></td>
                <td>
                  <a href="mailto:<?php echo $user['email'] ?>">
                  <?php echo $user['email'] ?>
                  </a>
                </td>
                <td>
                    <?php
                    foreach ($user['address'] as $key => $value) {
                      if ($key !== 'geo' && $key !== 'zipcode') {
                          echo $value . '<br>';
                      }
                  } ?>
                </td>
                <td><?php echo $user['phone'] ?>                
                <td>
                    <?php echo $user['company']['name']; ?>
                </td>
                <td>

                    <form method="POST" action="delete.php">
                        <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
                        <button class="btn btn-sm btn-outline-danger">Remove</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>