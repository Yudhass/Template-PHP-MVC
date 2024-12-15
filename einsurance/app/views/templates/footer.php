
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script>
    new DataTable('#data_asuransi');
</script>
<script src="<?= BASEURL; ?>/js/bootstrap.js"></script>
<?php if (!empty($data['asset_js'])): ?>
    <?php foreach ($data['asset_js'] as $script): ?>
        <script src="<?= BASEURL . $script ?>"></script>
    <?php endforeach; ?>
<?php endif; ?>
</body>
</html>