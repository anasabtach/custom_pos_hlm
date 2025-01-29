$(document).ready(function() {

    var table = jQuery('#sale_table').DataTable({
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
    jQuery('#customerFilter').on('change', function() {
        var selectedCustomer = $(this).val();
        table.column(2).search(selectedCustomer).draw();
    });

    // var table = jQuery('#sale_table').DataTable();

    jQuery.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
        var fromDate = $('#from_date').val();
        var toDate = $('#to_date').val();
        var columnData = data[7]; // Adjust to your date column index

        if (!fromDate && !toDate) {
            return true; // Show all rows if no date filters are set
        }

        var rowDate = new Date(columnData);
        if (fromDate && rowDate < new Date(fromDate)) {
            return false;
        }
        if (toDate && rowDate > new Date(toDate)) {
            return false;
        }

        return true;
    });

    $('#from_date, #to_date').on('change', function() {
        table.draw(); // Redraw the table with the applied filters
    });
});