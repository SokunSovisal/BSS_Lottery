
	// Alert Fucntion
	function alertDelete(id) {
		var ftitle = $('#swalDeleteLang').data('ftitle');
		var ftext = $('#swalDeleteLang').data('ftext');
		var ftype = $('#swalDeleteLang').data('ftype');
		var fbtnyes = $('#swalDeleteLang').data('fbtnyes');
		var fbtncancel = $('#swalDeleteLang').data('fbtncancel');
		var rstitle = $('#swalDeleteLang').data('rstitle');
		var rstext = $('#swalDeleteLang').data('rstext');
		var rstype = $('#swalDeleteLang').data('rstype');
		swal({
			title: ftitle,
			text: ftext,
			type: ftype,
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: fbtnyes,
		cancelButtonText: fbtncancel
		}).then((result) => {
			if (result.value) {
				let timerInterval
				swal({
				title: rstitle,
				text: rstext,
				type: rstype,
				showConfirmButton: false,
					timer: 800,
					onOpen: () => {
						timerInterval = setInterval(() => { }, 100)
					},
					onClose: () => {
						clearInterval(timerInterval)
					}
				}).then((result) => {
					if (
					result.dismiss === swal.DismissReason.timer
					) {
						$('#form_delete').attr('action', '/admin/users/'+id);
						// alert($('#form_delete').attr('action'));
						$('#form_delete').submit();
					}
				})
			}
		})
	}

	$('#dataTable').DataTable({
			"language": {
				"decimal":        "",
				"emptyTable":     "No data available in table",
				"info":           "Showing _START_ to _END_ of _TOTAL_ entries",
				"infoEmpty":      "Showing 0 to 0 of 0 entries",
				"infoFiltered":   "(filtered from _MAX_ total entries)",
				"infoPostFix":    "",
				"thousands":      ",",
				"lengthMenu":     "Show _MENU_ entries",
				"loadingRecords": "Loading...",
				"processing":     "Processing...",
				"search":         "Search:",
				"zeroRecords":    "No matching records found",
				"paginate": {
						"first":      "First",
						"last":       "Last",
						"next":       "Next",
						"previous":   "Previous"
				},
				"aria": {
						"sortAscending":  ": activate to sort column ascending",
						"sortDescending": ": activate to sort column descending"
				}
		}
	});