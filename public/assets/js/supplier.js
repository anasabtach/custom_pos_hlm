$(document).ready(function() {
    var table = jQuery('#supplier_datatable').DataTable({
        dom: 'Bfrtip',  // This controls the placement of the buttons
        buttons: [
            'copy',        // Copy to clipboard
            'csv',         // Export to CSV
            'excel',       // Export to Excel
            'pdf',         // Export to PDF
            'print'        // Print the table
        ]
    });

    jQuery.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
        var fromDate = $('#from_date').val();
        var toDate = $('#to_date').val();
        var columnData = data[10]; // Adjust to your date column index

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