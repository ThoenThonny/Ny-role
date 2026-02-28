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
<title>Certificate of Completion</title>

<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=Cinzel:wght@400;600;700&family=Dancing+Script:wght@700&display=swap" rel="stylesheet">

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

@page {
    size: A4 landscape;
    margin: 0;
}

html, body {
    margin: 0;
    padding: 0;
    -webkit-print-color-adjust: exact !important;
    print-color-adjust: exact !important;
}

/* ===== MAIN A4 PAGE ===== */
.a4-page {
    width: 297mm;
    height: 210mm;
    overflow: hidden;
    background: #fff;
}

/* ===== BORDERS (NO HEIGHT 100%) ===== */
.outer-border {
    border: 20px solid #20215f;
    padding: 4px;
    width: 100%;
    height: 100%;
}

.inner-border {
    border: 10px solid #5e5f65b2;
    padding: 35px 40px 30px;
    width: 100%;
    height: calc(100% - 0px); /* safe */
}

/* ===== HEADER ===== */
.header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 20px;
}

.logo-box {
    width: 132px;
    height: 132px;
}

.logo-box img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.motto {
    font-size: .84rem;
    font-weight: bold;
    font-family: Arial, sans-serif;
    margin-top: 4px;
    text-align: center;
}

.kingdom {
    text-align: center;
    font-size: .90rem;
    font-weight: 700;
    letter-spacing: .22em;
    line-height: 2;
    text-transform: uppercase;
    font-family: 'Courier New', monospace;
}

.kingdom img {
    display: block;
    max-width: 132px;
    margin: 8px auto 0;
}

/* ===== TITLE ===== */
.title {
    text-align: center;
    font-family: 'Dancing Script', cursive;
    font-size: 4.2rem;
    font-weight: 700;
    color: #20215f;
    margin: 8px 0 18px;
}

/* ===== CONTENT ===== */
.center {
    text-align: center;
}

.certify {
    font-size: 1.2rem;
    letter-spacing: .12em;
    font-weight: bold;
    margin-bottom: 16px;
    font-family: 'Courier New', monospace;
}

.student-name {
    font-size: 1.74rem;
    font-weight: 700;
    text-transform: uppercase;
    margin-bottom: 20px;
    font-family: 'Courier New', monospace;
}

.description {
    font-size: 1.2rem;
    line-height: 2;
    margin-bottom: 14px;
    font-family: Arial, sans-serif;
}

.course {
    font-size: 1.8rem;
    font-weight: 900;
    margin-bottom: 20px;
    font-family: 'Courier New', monospace;
}

.granted {
    font-size: 1.2rem;
    font-weight: 700;
    margin-bottom: 36px;
    font-family: Arial, sans-serif;
}

/* ===== FOOTER ===== */
.footer {
    position: absolute;
    bottom: 80px;
    right: 60px;
    text-align: right;
}

.signature-line {
     width: 160px; 
    height: 1px;
    background: #cea324;
    margin-bottom: 4px;
}

.sig-name {
    font-size: .936rem;
    font-weight: 900;
    font-family: 'Courier New', monospace;
}

.sig-role {
    font-size: .888rem;
    text-align:center;
    margin-top:10px;
    font-family: 'Courier New', monospace;
}

/* ===== CERT ID ===== */
.cert-id {
    position: absolute;
    bottom: 20px;
    left: 0;
    width: 100%;
    text-align: center;
    font-size: .672rem;
    letter-spacing: .04em;
    font-family: 'Courier New', monospace;
}

</style>
</head>

<body>

<div class="a4-page">
    <div class="outer-border">
        <div class="inner-border">

            <div class="header">
                <div style="display:flex;flex-direction:column;align-items:center;">
                    <div class="logo-box">
                        <img src="${logoUrl}">
                    </div>
                    <div class="motto">"Build your IT Skill"</div>
                </div>

                <div class="kingdom">
                    <div>KINGDOM OF CAMBODIA</div>
                    <div>NATION RELIGION KING</div>
                    <img src="${borderUrl}">
                </div>
            </div>

            <div class="title">Certificate of Completion</div>

            <div class="center certify">This is to certify that</div>

            <div class="center student-name">${studentName}</div>

            <div class="center description">
                has successfully completed all requirements for completion of the <br>
                I.T Training Courses in
            </div>

            <div class="center course">${courseName}</div>

            <div class="center granted">
                Granted: ${grantedDate}
            </div>

            <div class="footer">
                <div class="signature-line"></div>
                <div class="sig-name">Mr. Heng Pheakna</div>
                <div class="sig-role">Director</div>
            </div>

            <div class="cert-id">
                ID: ${certId}
            </div>

        </div>
    </div>
</div>

<script>
window.onload = function() {
    setTimeout(function() {
        window.print();
    }, 800);
}
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
