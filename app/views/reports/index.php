<?php require_once VIEW_PATH . '/partials/header.php'; ?>

<h1 class="text-center mb-5">Data List</h1>

<!-- Filter Form -->
<form class="mb-3" action="/reports" method="GET">
    <div class="row">
        <div class="col-4">
            <input type="text" class="form-control" placeholder="Search by ID" name="id" value="<?= $_GET['id'] ?? ''; ?>">
        </div>
        <div class="col-4">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">From</span>
                </div>
                <input type="date" class="form-control" name="fromDate" value="<?= $_GET['fromDate'] ?? ''; ?>">
            </div>
        </div>
        <div class="col-4">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">To</span>
                </div>
                <input type="date" class="form-control" name="toDate" value="<?= $_GET['toDate'] ?? ''; ?>">
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary my-3">Apply Filters</button>
</form>


<!-- Data Table -->
<table class="table table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>ID</th>
        <th>Amount</th>
        <th>Buyer</th>
        <th>Receipt ID</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $tblRwIteration = 1;
    if (empty($data)): ?>
        <tr>
            <td colspan="5">No data found</td>
        </tr>
    <?php endif; ?>


    <?php foreach ($data as $row): ?>
        <tr>
            <td><?= $tblRwIteration++;?></td>
            <td><?= $row['id']; ?></td>
            <td><?= $row['amount']; ?></td>
            <td><?= $row['buyer']; ?></td>
            <td><?= $row['receipt_id']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>