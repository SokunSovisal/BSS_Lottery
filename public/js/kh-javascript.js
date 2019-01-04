
	// Alert Fucntion
	function alertDelete(id) {
		swal({
			title: 'តើអ្នកប្រាកដ ឬទេ?',
			text: 'អ្នកកំពុងរៀបនឹងលុបទិន្នន័យមួយនេះ',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'យល់ព្រម',
		cancelButtonText:  'មិនព្រម'
		}).then((result) => {
			if (result.value) {
				let timerInterval
				swal({
				title: 'ជោគជ័យ',
				text: 'ទិន្នន័យត្រូវបានលុបដោយជោគជ័យ',
				type: 'success',
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
      "emptyTable":     "ពុំមានទិន្នន័យឡើយ",
      "info":           "បង្ហាញ _START_ ដល់ _END_ នៃ _TOTAL_ ជួរ",
      "infoEmpty":      "បង្ហាញ 0 ដល់ 0 នៃ 0 ជួរ",
      "infoFiltered":   "(filtered ពី _MAX_ សរុប ជួរ)",
      "infoPostFix":    "",
      "thousands":      ",",
      "lengthMenu":     "បង្ហាញ _MENU_ ជួរ",
      "loadingRecords": "កំពុងដំណើរការ...",
      "processing":     "កំពុងដំណើរការ...",
      "search":         "ស្វែងរក:",
      "zeroRecords":    "ពុំមានទិន្នន័យឡើយ",
      "paginate": {
          "first":      "ដំបូង",
          "last":       "ចុងក្រោយ",
          "next":       "បន្ទាប់",
          "previous":   "ថយ"
      },
      "aria": {
          "sortAscending":  ": activate to sort column ascending",
          "sortDescending": ": activate to sort column descending"
      }
    }
	});