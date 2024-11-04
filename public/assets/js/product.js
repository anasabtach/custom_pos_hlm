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
});