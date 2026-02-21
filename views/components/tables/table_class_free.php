<?php
// Get certificates from controller
$certificates = $certificates ?? [];
?>

<div class="table-card mt-4">
    <div class="table-card-header">
        <div class="d-flex align-items-center gap-3">
            <div class="table-icon"><i class="bi bi-card-list"></i></div>
            <div>
                <div class="table-title">បញ្ជីស្នើរសុំសញ្ញាប័ត្រ</div>
                <div class="table-sub">Certificate Request List</div>
            </div>
        </div>
        <span class="count-badge">
            <?php echo count($certificates); ?> នាក់
        </span>
    </div>

    <div class="table-responsive">
        <table class="student-table">
            <thead>
                <tr>
                    <th class="col-no">ល.រ</th>
                    <th class="col-name">ឈ្មោះសិស្ស</th>
                    <th class="col-course">វគ្គសិក្សា</th>
                    <th class="col-date">ថ្ងៃបញ្ចប់</th>
                    <th class="col-action">សកម្មភាព</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($certificates)): ?>
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">
                            <i class="bi bi-inbox fs-2 d-block mb-2 opacity-25"></i>
                            មិនមានទន្និន័យ
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($certificates as $index => $cert): ?>
                        <tr>
                            <td class="text-center">
                                <span class="row-no"><?php echo $index + 1; ?></span>
                            </td>
                            <td>
                                <div class="student-name">
                                    
                                    <span class="student-name-text"><?php echo htmlspecialchars($cert['student_name'] ?? ''); ?></span>
                                </div>
                            </td>
                            <td>
                                <span class="course-badge"><?php echo htmlspecialchars($cert['course'] ?? ''); ?></span>
                            </td>
                            <td>
                                <span class="date-badge">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    <?php echo htmlspecialchars($cert['end_date'] ?? ''); ?>
                                </span>
                            </td>
                            <td class="text-center">
                                <button class="btn-print-cert text-white" 
                                    onclick="openCertificate('<?php echo htmlspecialchars($cert['student_name'] ?? ''); ?>', '<?php echo htmlspecialchars($cert['course'] ?? ''); ?>', '', '', 0)">
                                    <i class="bi bi-printer-fill"></i>
                                    បោះពុម្ព
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
