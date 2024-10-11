$(document).ready(function() {
	$('.sortable').nestedSortable({
		forcePlaceholderSize: true,
		items: 'li',
		handle: 'a',
		placeholder: 'menu-highlight',
		listType: 'ul',
		maxLevels: 4,
		opacity: .6,
		update: function(event, ui) {
			var arr   = [];
			let order = 0
			$('.menu-list li').each(function() {
				var itemId = $(this).data('id'); // Get the ID of the current item
				var parentId = $(this).closest('ul').parent().data('id'); // Get the ID of the parent item
				
				arr.push({id:itemId, parent_id:parentId, order:++order});
			});
			$.ajax({
				url   : update_list,
				data  : "GET",
				data  : {data:arr},
				success:function(){
					$.toast({
						heading: 'Updated',
						text: 'Categories updated successfully',
						position: 'top-right',
						loaderBg: '#fff',
						icon: 'success',
						hideAfter: 3500,
						stack: 6
					});
				},
				error:function(){
					$.toast({
						heading: 'Error',
						text: 'Some error occured while updating categories',
						position: 'top-right',
						loaderBg: '#fff',
						icon: 'error',
						hideAfter: 3500,
						stack: 6
					});
				}
			});
		}
	});
});