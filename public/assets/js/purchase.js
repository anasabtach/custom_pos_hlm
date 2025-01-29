$(document).ready(function() {

    var table = jQuery('#purchase_table').DataTable({
        dom: '<"top"lfB>rt<"bottom"ip><"clear">', // Includes length menu and buttons
        buttons: [
            'copy',        // Copy to clipboard
            'csv',         // Export to CSV
            'excel',       // Export to Excel
            'pdf',         // Export to PDF
            'print'        // Print the table
        ],
        lengthMenu: [10, 25, 50, 100], // Options for the number of rows to display
        pageLength: 10,                  // Default number of rows to display
    });
    jQuery('#supplierFilter').on('change', function() {
        var selectedCategory = $(this).val();
        table.column(2).search(selectedCategory).draw();
    });
});