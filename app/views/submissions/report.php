<?php require_once VIEW_PATH . '/partials/header.php'; ?>

<h1>Data List</h1>

<!-- Filter Form -->
<form class="mb-3">
    <div class="form-row">
        <div class="col">
            <input type="text" class="form-control" placeholder="Search by ID" name="search_id">
        </div>
        <div class="col">
            <input type="date" class="form-control" name="from_date">
        </div>
        <div class="col">
            <input type="date" class="form-control" name="to_date">
        </div>
        <div class="col">
            <button type="submit" class="btn btn-primary">Apply Filters</button>
        </div>
    </div>
</form>

<!-- Data Table -->
<table class="table table-bordered">
    <thead>
    <tr>
        <th>ID</th>
        <th>Amount</th>
        <th>Buyer</th>
        <th>Receipt ID</th>
        <!-- Add more columns here -->
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $row): ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['amount']; ?></td>
            <td><?= $row['buyer']; ?></td>
            <td><?= $row['receipt_id']; ?></td>
            <!-- Add more cells here based on your data -->
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>