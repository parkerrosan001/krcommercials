function employee_preview_image(event) {
	var reader = new FileReader();
	reader.onload = function () {
		var output = document.getElementById("employee_output_image");
		output.src = reader.result;
	};
	reader.readAsDataURL(event.target.files[0]);
}

function preview_image_edit_staff(event) {
	var reader = new FileReader();
	reader.onload = function () {
		var output = document.getElementById("output_image_edit_staff");
		output.src = reader.result;
	};
	reader.readAsDataURL(event.target.files[0]);
}

CKEDITOR.replace("fl_sub_text_field");

CKEDITOR.replace("cal_sub_text_field");

/*  edit Event form pop-up rendering starts */

$(document).on("click", ".editStaff", function () {
	var staff_id;
	var base_url;

	staff_id = $(this).attr("id");
	base_url = $(this).attr("base_url");

	$("#" + staff_id + "staff_edit_link").hide();
	$("#" + staff_id + "staff_edit_waiting").show();

	$.ajax({
		url: base_url + "admin/staff/fetchSingleStaff",
		method: "POST",
		data: {
			id: staff_id,
		},
		dataType: "json",
		success: function (data) {
			$("#editStaffForm").trigger("reset");
			$("#editStaffModal").modal("show");

			$("#" + staff_id + "staff_edit_link").show();
			$("#" + staff_id + "staff_edit_waiting").hide();

			$("#id_field").val(data.single_staff_data.id);
			$("#staff_edit_full_name_field").val(data.single_staff_data.full_name);
			$("#staff_edit_designation_field").val(data.single_staff_data.designation);
			$("#staff_edit_facebook_field").val(data.single_staff_data.facebook);
			$("#staff_edit_twitter_field").val(data.single_staff_data.twitter);
			$("#staff_edit_google_plus_field").val(data.single_staff_data.google_plus);
			$("#staff_edit_branch_field").val(data.single_staff_data.branch);

			var image = base_url + "uploads/" + data.single_staff_data.staff_image;
			$("#output_image_edit_staff").attr("src", image);
			$("#staff_old_pic_field").val(data.single_staff_data.staff_image);
		},
	});
});

/*  edit Event form pop-up rendering ends */

/*  edit Event form submission starts */

$("#editStaffForm").on("submit", function (event) {
	$(this).find("input[type=submit]").prop("disabled", true);

	var base_url = $("#base_url_field").val();
	event.preventDefault();

	$.ajax({
		url: base_url + "admin/staff/updateStaff",
		method: "POST",
		data: new FormData(this),
		contentType: false,
		cache: false,
		processData: false,
		dataType: "json",
		success: function (data) {
			if (data.status) {
				location.reload();
			} else {
				location.reload();
			}
		},
	});
});

/*  edit Event form submission ends */
