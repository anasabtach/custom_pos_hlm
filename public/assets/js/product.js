$(document).ready(function() {
    var table = jQuery('#product_table').DataTable({
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

    // Apply category filter
    jQuery('#brandFilter').on('change', function() {
        var selectedCategory = $(this).val();
        table.column(2).search(selectedCategory).draw();
    });
    jQuery('#categoryFilter').on('change', function() {
        var selectedCategory = $(this).val();
        table.column(3).search(selectedCategory).draw();
    });
    jQuery('#variationFilter').on('change', function() {
        var selectedVariation = $(this).val();
        table.column(11).search(selectedVariation).draw();
    });
    jQuery('#unitFilter').on('change', function() {
        var selectedUnit = $(this).val();
        table.column(4).search(selectedUnit).draw();
    });
    jQuery('#expirationFilter').on('change', function() {
        var selectedUnit = $(this).val();
        table.column(10).search(selectedUnit).draw();
    });
    jQuery('#supplierFilter').on('change', function() {
        var selectedSupplier = $(this).val();
        table.column(1).search(selectedSupplier).draw();
    });
    // jQuery('#from_date, #to_date').on('change', function() {
    //     var fromDate = $('#from_date').val();
    //     var toDate = $('#to_date').val();
    
    //     if(fromDate !== "" && toDate !== ""){
    //         var dateFilter = fromDate + '|' + toDate;
    //         table.column(14).search(dateFilter, true, false).draw();
    //     }

    // });
    jQuery.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
        var fromDate = $('#from_date').val();
        var toDate = $('#to_date').val();
        var columnData = data[15]; // Adjust to your date column index

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