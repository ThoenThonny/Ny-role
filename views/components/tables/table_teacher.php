<div class="container py-2">

    <h2 class="mb-4 text-center fw-bold">Certificate Table</h2>

    <div id="tables_container"></div>

</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
$(document).ready(function() {
    loadClasses();
});

function loadClasses() {

    const container = $('#tables_container');
    container.html('<p>Loading...</p>');

    const urlParams = new URLSearchParams(window.location.search);
    const type = urlParams.get('type') || 'normal';

    $.ajax({
        url: "<?= base_url('api/classes') ?>",
        method: "GET",
        data: { type: type },
        dataType: "json",
        success: function(result) {

            console.log(result);
            
            if (!result.data || result.data.length === 0) {
                container.html('<p>No data found</p>');
                return;
            }

            container.html('');

            // GROUP BY category + course
            const grouped = {};

            result.data.forEach(item => {

                const category = item.category || 'Other';
                const course = item.course || 'No Course';

                if (!grouped[category]) {
                    grouped[category] = {};
                }

                if (!grouped[category][course]) {
                    grouped[category][course] = [];
                }

                grouped[category][course].push(item);
            });

            // RENDER TABLES
            for (let category in grouped) {

                for (let course in grouped[category]) {

                    let rows = grouped[category][course].map(item => `
                        <tr>
                            <td>${item.id}</td>
                            <td>${item.teacher_name 
                                ? item.teacher_name 
                                : '<span class="badge bg-danger">No Teacher</span>'}
                            </td>
                            <td>${item.course ?? '-'}</td>
                            <td>${item.time ?? '-'}</td>
                        </tr>
                    `).join('');

                    container.append(`
                        <div class="card mb-4 shadow-sm">
                            <div class="card-header fs-5 bg-primary text-white fw-semibold">
                                ${category} - ${course}
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-bordered text-center align-middle mb-0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>ID</th>
                                            <th>Teacher Name</th>
                                            <th>Course</th>
                                            <th>Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        ${rows}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    `);
                }
            }
        },
        error: function(xhr, status, error) {
            console.error(error);
            container.html('<p>Server Error</p>');
        }
    });
}
</script>
