function success_alert_confirm(title, msg, footer) {
	Swal.fire({
		icon: 'success',
		title: title,
		text: msg,
		timer: 1500,
		footer: footer,
		showCancelButton: false,
		showConfirmButton: false
	})
}

function success_alert(title, msg, page, footer) {
	Swal.fire({
		icon: 'success',
		title: title,
		text: msg,
		timer: 1500,
		footer: footer,
		showCancelButton: false,
		showConfirmButton: false
	}).then(function () {
		window.location = base_url + page;
	})
}

function success_alert_nopage(title, msg, footer) {
	Swal.fire({
		icon: 'success',
		title: title,
		text: msg,
		timer: 1500,
		footer: footer,
		showCancelButton: false,
		showConfirmButton: false
	});
}

function error_alert(title, msg, footer) {
	Swal.fire({
		icon: 'error',
		title: title,
		text: msg,
		footer: footer
	})
}

function notify(message, type) {
	$.growl({
		message: message
	}, {
		type: type,
		allow_dismiss: true,
		label: 'Cancel',
		className: 'btn-xs btn-inverse',
		placement: {
			from: 'top',
			align: 'right'
		},
		delay: 2500,
		offset: {
			x: 30,
			y: 30
		}
	});
};
