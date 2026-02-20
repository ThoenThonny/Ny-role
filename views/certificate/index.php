<?php if ($type === 'normal'): ?>

    <?php include './views/components/tables/table_teacher.php'; ?>

<?php elseif ($type === 'scholarship'): ?>

    <?php include './views/certificate/scholarship.php'; ?>

<?php else : ?>

    <p>Invalid certificate type.</p>
    
<?php endif; ?>