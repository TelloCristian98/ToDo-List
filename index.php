<?php 
include("db.php"); 
include("./includes/header.php");?>

<div class="container">
    <div class="row py-lg-3">
        <div class="col-md-4">
            <!-- Alertas que se guardan en SESSION -->
            <?php if (isset($_SESSION['message'])) {?>
            <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php session_unset(); } ?>

            <div class="card card-body">
                <form action="save_task.php" method="POST">
                    <div class="form-group mb-4">
                        <input type="text" name="title" class="form-control" placeholder="Task Title" autofocus>
                    </div>
                    <div class="form-group mb-4">
                        <textarea name="description" rows="2" class="form-control" placeholder="Task Description"></textarea>
                    </div>
                    <div class="d-grid gap-2">
                        <input type="submit" class="btn btn-success btn-primary" name=save_task value="Save Task">
                    </div>
                    
                </form>
            </div>
        </div>
        <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $query = "SELECT * FROM task";
                    $result_task = mysqli_query($db, $query);
                    while ($row = mysqli_fetch_array($result_task)) { ?>    
                        <tr>
                            <td><?php echo $row['title'] ?></td>
                            <td><?php echo $row['description'] ?></td>
                            <td><?php echo $row['created_date'] ?></td>
                            <td>
                                <a href="edit_task.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a href="delete_task.php?id=<?php echo $row['id']?>&title=<?php echo $row['title']?>" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>                                
                    <?php } ?>
                    </tbody>
                </table>
        </div>
    </div>
</div>


<?php include("./includes/footer.php");?>

