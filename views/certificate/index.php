<?php if ($type === 'normal'): ?>

    <?php include './views/components/tables/table_teacher.php'; ?>

<?php elseif ($type === 'free'): ?>
    
    <?php include './views/components/tables/table_free.php'; ?>

<?php elseif ($type === 'scholarship'): ?>

    <?php include './views/components/tables/table_scholarship.php'; ?>

<?php else: ?>

    <p>Invalid certificate type.</p>

<?php endif; ?>
