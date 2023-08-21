<?php require_once VIEW_PATH . '/partials/header.php'; ?>

<div class="row">
    <div class="col-md-6 mt-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Create a Submission</h5>
                <p class="card-text">Click the link below to create a submission.</p>
                <a href="/submissions/create" class="btn btn-primary">Create Submission</a>
            </div>
        </div>
    </div>
    <div class="col-md-6 mt-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">View Submissions</h5>
                <p class="card-text">Click the link below to view submissions reports.</p>
                <a href="/reports" class="btn btn-primary">View Submissions</a>
            </div>
        </div>
    </div>
</div>

<!--js-->
<script>
    // jQuery(document).ready(function($) {
    //     alert("js is working");
    // });
</script>

<?php require_once VIEW_PATH . '/partials/footer.php'; ?>