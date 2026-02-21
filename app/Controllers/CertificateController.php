<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\ClassModel;
use App\Models\StudentModel;

final class CertificateController extends Controller
{
    // Show the main certificate page
    public function index(): void
    {
        $type = $_GET['type'] ?? 'free';

        // If type is 'free', show the free form
        if ($type === 'free') {
            $csrfToken = $_SESSION['csrf_token'] ?? bin2hex(random_bytes(32));
            $_SESSION['csrf_token'] = $csrfToken;

            // Get certificates from session
            $certificates = $_SESSION['certificates'] ?? [];

            $this->view('Form/class-free-form', [
                'csrfToken' => $csrfToken,
                'errors' => [],
                'old' => [],
                'certificates' => $certificates
            ]);
            return;
        }

        // If type is 'normal', show the teachers table
        if ($type === 'normal') {
            $this->view('components/tables/table_teacher', [
                'title' => 'Certificate',
                'type' => $type
            ]);
        } else {
            $this->view('certificate/error', [
                'message' => 'Invalid certificate type.'
            ]);
        }
    }

    // Return JSON of finished classes
    public function getClasses(): void
    {
        try {
            $type = (string)($_GET['type'] ?? 'free');
            $course = (string)($_GET['course'] ?? '');

            $model = new ClassModel();
            $classes = $model->getFinishedClasses($type, $course);

            $this->jsonResponse(true, $classes);

        } catch (\Throwable $e) {
            $this->jsonResponse(false, [], $e->getMessage(), 500);
        }
    }

    // Return JSON of students by class
    public function getStudents(): void
    {
        try {
            $classId = (int)($_GET['class_id'] ?? 0);
            if ($classId <= 0) {
                throw new \RuntimeException('Invalid class_id');
            }

            $model = new StudentModel();
            $students = $model->getStudentsByClassId($classId);

            $this->jsonResponse(true, $students);
        } catch (\Throwable $e) {
            $this->jsonResponse(false, [], $e->getMessage(), 500);
        }
    }

    // Show the students table page
    public function students(): void
{
    $this->view('certificate/index', [
        'title' => 'liststudents',
        'type'  => $_GET['type'] ?? 'free'
    ]);
}
}
