<?php require_once VIEW_PATH . '/partials/header.php'; ?>

<h1 class="p-3 text-center">Create a new submission</h1>

<!-- Back Button -->
<a href="/" class="btn btn-secondary mb-3">Back</a>

<!-- Submission Form -->
<form id="submissionForm" method="post" action="/create">
    <div class="form-group my-3">
        <label for="amount">Amount *</label>
        <input type="number" class="form-control" id="amount" name="amount" required>
    </div>
    <div class="form-group my-3">
        <label for="buyer">Buyer *</label>
        <input type="text" class="form-control" id="buyer" name="buyer" maxlength="20" required>
    </div>
    <div class="form-group my-3">
        <label for="receipt_id">Receipt ID *</label>
        <input type="text" class="form-control" id="receipt_id" name="receipt_id" maxlength="20" required>
    </div>
    <div class="form-group my-3">
        <label for="items">Items *</label>
        <input type="text" class="form-control" id="items" name="items"  maxlength="255" required>
    </div>
    <div class="form-group my-3">
        <label for="buyer_email">Buyer Email *</label>
        <input type="email" class="form-control" id="buyer_email" name="buyer_email"  maxlength="50" required>
    </div>
    <div class="form-group my-3">
        <label for="note">Note *</label>
        <textarea class="form-control" id="note" name="note" rows="3" required></textarea>
    </div>
    <div class="form-group my-3">
        <label for="city">City *</label>
        <input type="text" class="form-control" id="city" name="city"  maxlength="20" required>
    </div>
    <div class="form-group my-3">
        <label for="phone">Phone *</label>
        <div class="input-group">
            <input type="text" class="form-control" id="phone" name="phone" value="880"  maxlength="20" required>
        </div>
    </div>
    <div class="form-group my-3">
        <label for="entry_by">Entry By *</label>
        <input type="number" class="form-control" id="entry_by" name="entry_by" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>

    <div class="m-5"></div>
</form>

<script>

</script>
<?php require_once VIEW_PATH . '/partials/footer.php'; ?>