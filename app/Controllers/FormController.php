<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\CertificateModel;

final class FormController extends Controller
{
    private CertificateModel $certificateModel;

    public function __construct()
    {
        $this->certificateModel = new CertificateModel();
    }

    // Show the class-free form
    public function index(): void
    {
        $csrfToken = $_SESSION['csrf_token'] ?? bin2hex(random_bytes(32));
        $_SESSION['csrf_token'] = $csrfToken;

        // Get certificates from database
        $certificates = $this->certificateModel->getAll();

        $this->view('Form/class-free-form', [
            'csrfToken' => $csrfToken,
            'errors' => [],
            'old' => [],
            'certificates' => $certificates
        ]);
    }

    // Handle form submission
    public function submit(): void
    {
        $studentName = trim($_POST['student_name'] ?? '');
        $course      = trim($_POST['course'] ?? '');
        $endDate     = trim($_POST['end_date'] ?? '');
        $token       = $_POST['csrf_token'] ?? '';

        // CSRF validation
        if (!hash_equals($_SESSION['csrf_token'] ?? '', $token)) {
            $this->redirectWithMessage('form', 'Invalid CSRF token!');
            return;
        }

        $errors = [];
        if ($studentName === '') $errors['student_name'] = 'Full Name is required!';
        if ($course === '') $errors['course'] = 'Course is required!';
        if ($endDate === '') $errors['end_date'] = 'End Date is required!';

        $certificates = $this->certificateModel->getAll();

        if (!empty($errors)) {
            $csrfToken = $_SESSION['csrf_token'] ?? bin2hex(random_bytes(32));
            $_SESSION['csrf_token'] = $csrfToken;

            $this->view('Form/class-free-form', [
                'csrfToken' => $csrfToken,
                'errors' => $errors,
                'old' => [
                    'student_name' => $studentName,
                    'course' => $course,
                    'end_date' => $endDate
                ],
                'certificates' => $certificates
            ]);
            return;
        }

        // Validation passed - save to database
        $csrfToken = $_SESSION['csrf_token'] ?? bin2hex(random_bytes(32));
        $_SESSION['csrf_token'] = $csrfToken;

        // Save to database
        $result = $this->certificateModel->create(
            strtoupper($studentName),
            $course,
            $endDate
        );

        if ($result === false) {
            $this->view('Form/class-free-form', [
                'csrfToken' => $csrfToken,
                'errors' => ['general' => 'Failed to save certificate request!'],
                'old' => [
                    'student_name' => $studentName,
                    'course' => $course,
                    'end_date' => $endDate
                ],
                'certificates' => $certificates
            ]);
            return;
        }

        // Get updated certificates from database
        $certificates = $this->certificateModel->getAll();

        // Show form with success message and updated table
        $this->view('Form/class-free-form', [
            'csrfToken' => $csrfToken,
            'errors' => [],
            'old' => [],
            'certificates' => $certificates,
            'message' => 'Certificate request submitted successfully!'
        ]);
    }

    // Redirect with message
    private function redirectWithMessage(string $route, string $message): void
    {
        $_SESSION['form_message'] = $message;
        header("Location: /{$route}", true, 302);
        exit;
    }
}
