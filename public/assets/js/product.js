$(document).ready(function() {
    var table = jQuery('#product_table').DataTable();

    // Apply category filter
    jQuery('#brandFilter').on('change', function() {
        var selectedCategory = $(this).val();
        table.column(1).search(selectedCategory).draw();
    });
    jQuery('#categoryFilter').on('change', function() {
        var selectedCategory = $(this).val();
        table.column(2).search(selectedCategory).draw();
    });
    jQuery('#variationFilter').on('change', function() {
        var selectedVariation = $(this).val();
        table.column(10).search(selectedVariation).draw();
    });
    jQuery('#unitFilter').on('change', function() {
        var selectedUnit = $(this).val();
        table.column(3).search(selectedUnit).draw();
    });
    jQuery('#expirationFilter').on('change', function() {
        var selectedUnit = $(this).val();
        table.column(9).search(selectedUnit).draw();
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
        var columnData = data[14]; // Adjust to your date column index

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