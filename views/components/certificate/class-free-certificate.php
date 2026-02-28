<!-- ==================== CERTIFICATE COMPONENT ==================== -->
<div class="certificate-free-wrapper">
            <div class="certificate-free-wrap" id="printable-certificate-free">
                <div class="certificate-free">
                    <div class="cert-free-outer-border">
                        <div class="cert-free-inner-border">

                            <!-- Header: Logo Left, Kingdom Right -->
                            <div class="cert-free-header">
                                <div class="cert-free-header-left">
                                    <div class="cert-free-logo-box">
                                        <img src="assets/Images/logo.png" alt="">
                                    </div>
                                    <div class="cert-free-motto">"Build your IT Skill"</div>
                                </div>
                                <div class="cert-free-header-right">
                                    <div class="cert-free-kingdom">
                                        <div>KINGDOM OF CAMBODIA</div>
                                        <div>NATION&nbsp; RELIGION &nbsp;KING</div>
                                        <img src="assets/Images/border.png" alt="">
                                    </div>

                                </div>
                            </div>

                            <div class="cert-free-title">
                                Certificate of Completion
                            </div>

                            <div class="cert-free-certify">
                                This is to certify that
                            </div>

                            <div class="cert-free-student-name" id="cert_student_name">
                              <?php echo ! empty($displayName) ? htmlspecialchars($displayName) : 'PHEAROM RATHA' ?>
                            </div>

                            <div class="cert-free-desc">
                                has successfully completed all requirements for completion of the  <br> I.T Training Courses in
                            </div>

                            <div class="cert-free-course" id="cert_course">
                                <?php echo ! empty($displayCourse) ? htmlspecialchars($displayCourse) : 'FREE HTML CSS TAILWIND' ?>
                            </div>

                            <div class="cert-free-granted">
                                Granted: <span id="cert_time"><?php echo ! empty($displayDate) ? htmlspecialchars($displayDate) : 'Auguest 15,2025' ?></span>
                            </div>

                            <div class="cert-free-footer">
                                <div class="cert-free-signature">
                                    <div class="cert-free-sig-line"></div>
                                    <div class="cert-free-sig-name">
                                        Mr. Heng Pheakna
                                    </div>
                                    <div class="cert-free-sig-role">
                                        Director
                                    </div>
                                </div>
                            </div>

                            <div class="cert-free-id-bottom">
                               <font color="black">ID: </font> <span id="cert_id_val"><?php echo ! empty($displayId) ? htmlspecialchars($displayId) : '0987654' ?></span>
                            </div>

                        </div>
                    </div>
                </div>

    </div>



</div>

<script>
// Print Certificate Function - A4 Landscape
document.addEventListener('DOMContentLoaded', function() {
    const printBtn = document.getElementById('btnPrintCertificate');
    if (!printBtn) {
        console.log('Print button not found, skipping print initialization');
        return;
    }

    printBtn.addEventListener('click', function() {
        console.log('Print button clicked');

        // Get certificate element
        const certificate = document.getElementById('printable-certificate-free');
        if (!certificate) {
            console.error('Certificate element not found');
            alert('Certificate element not found');
            return;
        }

        // Get all dynamic values from the preview
        const studentName = document.getElementById('cert_student_name').textContent;
        const courseName = document.getElementById('cert_course').textContent;
        const grantedDate = document.getElementById('cert_time').textContent;
        const certId = document.getElementById('cert_id_val').textContent;

        console.log('Certificate data:', { studentName, courseName, grantedDate, certId });

        // Get base URL
        const baseUrl = window.location.origin + '/';
        const cssUrl = baseUrl + 'assets/css/certificate-class-free.css';
        const logoUrl = baseUrl + 'assets/Images/logo.png';
        const borderUrl = baseUrl + 'assets/Images/border.png';

        console.log('Base URL:', baseUrl);

        // Build the print document with A4 Landscape - Same styles as screen
        const printContent = `
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Certificate of Completion</title>
                <link rel="stylesheet" href="${cssUrl}">
                <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400&family=Cinzel:wght@400;600;700&display=swap" rel="stylesheet">
                <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
                <style>
                    * { margin: 0; padding: 0; box-sizing: border-box; }

                    @page {
                        size: A4 landscape;
                        margin: 0;
                    }

                    @media print {
                        html, body {
                            margin: 0;
                            padding: 0;
                            width: 297mm;
                            height: 210mm;
                            -webkit-print-color-adjust: exact !important;
                            print-color-adjust: exact !important;
                        }
                    }

                    @media screen {
                        html, body {
                            background: #ccc;
                            padding: 20px;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            min-height: 100vh;
                        }
                        .cert-free-print-container {
                            background: white;
                            box-shadow: 0 0 20px rgba(0,0,0,0.3);
                        }
                    }
                </style>
            </head>
            <body>
                <div class="cert-free-print-container" style="width:297mm;height:210mm;">
                    <div class="certificate-free-wrap" style="padding:0;background:#fff;">
                        <div class="certificate-free">
                            <div class="cert-free-outer-border" style="border:20px solid #20215f;padding:4px;">
                                <div class="cert-free-inner-border" style="border:10px solid #5e5f65b2;padding:35px 40px 30px;height:100%;">

                                    <!-- Header: Logo Left, Kingdom Right -->
                                    <div class="cert-free-header" style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:20px;">
                                        <div class="cert-free-header-left" style="display:flex;flex-direction:column;align-items:center;">
                                            <div class="cert-free-logo-box" style="width:132px;height:132px;">
                                                <img src="${logoUrl}" alt="" style="width:100%;height:100%;object-fit:contain;">
                                            </div>
                                            <div class="cert-free-motto" style="font-size:.84rem;color:#333;margin-top:4px;font-weight:bold;font-family:Arial,sans-serif;white-space:nowrap;">"Build your IT Skill"</div>
                                        </div>
                                        <div class="cert-free-header-right" style="display:flex;flex-direction:column;align-items:flex-end;">
                                            <div class="cert-free-kingdom" style="text-align:center;margin-bottom:20px;font-size:.90rem;font-weight:700;letter-spacing:.22em;color:#222;line-height:2;text-transform:uppercase;font-family:'Courier New',monospace;white-space:nowrap;">
                                                <div>KINGDOM OF CAMBODIA</div>
                                                <div>NATION&nbsp; RELIGION &nbsp;KING</div>
                                                <img src="${borderUrl}" alt="" style="display:block;max-width:132px;height:auto;margin:8px auto 0;object-fit:contain;">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cert-free-title" style="text-align:center;font-family:'Dancing Script','Brush Script MT',cursive;font-size:4.2rem;font-weight:700;color:#20215f;margin:8px 0 18px;white-space:nowrap;">
                                        Certificate of Completion
                                    </div>

                                    <div class="cert-free-certify" style="text-align:center;font-size:1.2rem;color:#20215f;letter-spacing:.12em;margin-bottom:16px;font-family:'Courier New',monospace;font-weight:bold;white-space:nowrap;">
                                        This is to certify that
                                    </div>

                                    <div class="cert-free-student-name" style="text-align:center;font-size:1.74rem;font-weight:700;color:#111;letter-spacing:.1em;text-transform:uppercase;margin-bottom:20px;font-family:'Courier New',monospace;font-weight:bold;white-space:nowrap;">
                                        ${studentName}
                                    </div>

                                    <div class="cert-free-desc" style="text-align:center;font-size:1.2rem;color:#20215f;line-height:2;margin-bottom:14px;font-family:Arial,sans-serif;letter-spacing:.01em;white-space:nowrap;">
                                        has successfully completed all requirements for completion of the <br> I.T Training Courses in
                                    </div>

                                    <div class="cert-free-course" style="text-align:center;font-size:1.8rem;color:black;letter-spacing:.07em;margin-bottom:20px;font-family:'Courier New',monospace;font-weight:900;white-space:nowrap;">
                                        ${courseName}
                                    </div>

                                    <div class="cert-free-granted" style="text-align:center;font-size:1.2rem;font-weight:700;color:#2d2e81;letter-spacing:.05em;margin-bottom:36px;font-family:Arial,sans-serif;white-space:nowrap;">
                                        Granted: <span style="font-weight:600;">${grantedDate}</span>
                                    </div>

                                    <div class="cert-free-footer" style="display:flex;align-items:flex-end;justify-content:space-between;padding-top:8px;position:relative;">
                                        <div class="cert-free-signature" style="text-align:right;margin-left:auto;">
                                            <div class="cert-free-sig-line" style="height:1px;background:#cea324;width:128px;margin-left:auto;margin-bottom:4px;"></div>
                                            <div class="cert-free-sig-name" style="font-size:.936rem;font-weight:900;color:#111;font-family:'Courier New',monospace;letter-spacing:.05em;white-space:nowrap;">Mr. Heng Pheakna</div>
                                            <div class="cert-free-sig-role" style="font-size:.888rem;color:#333;font-family:'Courier New',monospace;letter-spacing:.07em;white-space:nowrap;">Director</div>
                                        </div>
                                    </div>

                                    <div class="cert-free-id-bottom" style="text-align:center;font-size:.672rem;color:red;font-family:'Courier New',monospace;letter-spacing:.04em;margin-top:20px;white-space:nowrap;">
                                        <font color="black">ID:</font> <span style="font-weight:600;">${certId}</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    window.onload = function() {
                        console.log('Print window loaded');
                        // Wait for images and fonts to load
                        setTimeout(function() {
                            console.log('Calling window.print()');
                            window.print();
                        }, 1000);
                    };
                <\/script>
            </body>
            </html>
        `;

        // Create a new window for printing
        const printWindow = window.open('', '_blank', 'width=1000,height=700,scrollbars=yes');

        if (!printWindow) {
            // Popup blocked - try alternative method
            alert('Popup blocked! Please allow popups for this site to print the certificate.\n\nAlternatively, you can:\n1. Press Ctrl+P (or Cmd+P on Mac)\n2. Select "Save as PDF" as the destination');
            return;
        }

        printWindow.document.write(printContent);
        printWindow.document.close();

        // Focus the print window
        printWindow.focus();
        console.log('Print window opened');
    });
});
</script>
