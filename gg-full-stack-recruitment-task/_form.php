<?php

$company = [
    "name" => ""
    // "catchPhrase" => "",
    // "bs" => ""
];

$address = [
    "street"=> "",
    "suite"=> "",
    "city"=> ""
]   
?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>
                <?= $user['id'] ? 'Update user <b>'.$user['name'].'</b>' : 'Create New User' ?>
            </h3>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="">
                <div class="form-group mb-3">
                    <label  class="form-label">Name</label>
                    <input name="name" value="<?= $user['name'] ?>" class="form-control <?= $errors['name'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= $errors['name'] ?>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label  class="form-label">Username</label>
                    <input name="username" value="<?= $user['username'] ?>" class="form-control <?= $errors['username'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= $errors['username'] ?>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label  class="form-label">Email</label>
                    <input name="email" value="<?= $user['email'] ?>" class="form-control <?= $errors['email'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= $errors['email'] ?>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label  class="form-label">Address</label>
                    <div class="row">
                        <div class="col">
                            <input name="address[street]" value="<?= $address['street'] ?>" class="form-control" placeholder="Street">
                        </div>
                        <div class="col">
                            <input name="address[suite]" value="<?= $address['suite'] ?>" class="form-control" placeholder="Suite">
                        </div>
                        <div class="col">
                            <input name="address[city]" value="<?= $address['city'] ?>" class="form-control" placeholder="City">
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Phone</label>
                    <input name="phone" value="<?= $user['phone'] ?>" class="form-control <?= $errors['phone'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= $errors['phone'] ?>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label  class="form-label">Company</label>
                    <input name="company[name]" value="<?= $company['name'] ?>" class="form-control">
                </div>
                <button class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>