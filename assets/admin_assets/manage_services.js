// CKEDITOR.replace("services_description_field");
// CKEDITOR.replace("service_edit_description_field");

/*  edit Event form pop-up rendering starts */

$(document).on("click", ".editService", function () {
	var service_id;
	var base_url;

	service_id = $(this).attr("id");
	base_url = $(this).attr("base_url");

	$("#" + service_id + "service_edit_link").hide();
	$("#" + service_id + "service_edit_waiting").show();

	$.ajax({
		url: base_url + "admin/services/fetchSingleService",
		method: "POST",
		data: {
			id: service_id,
		},
		dataType: "json",
		success: function (data) {
			$("#editServiceForm").trigger("reset");
			$("#editServiceModal").modal("show");

			$("#" + service_id + "service_edit_link").show();
			$("#" + service_id + "service_edit_waiting").hide();

			$("#id_field").val(data.single_service_data.id);
			$("#services_edit_type_field").val(data.single_service_data.service_type);
			$("#service_edit_title_field").val(
				data.single_service_data.service_title
			);
			$("#service_edit_description_field").val(
				data.single_service_data.service_description
			);
			$("#service_edit_branch_field").val(data.single_service_data.branch);
			// CKEDITOR.instances.service_edit_description_field.setData(
			// 	data.single_service_data.service_description
			// );
		},
	});
});

/*  edit Event form pop-up rendering ends */

/*  edit Event form submission starts */

$("#editServicesForm").on("submit", function (event) {
	$(this).find("input[type=submit]").prop("disabled", true);

	var base_url = $("#base_url_field").val();
	event.preventDefault();

	$.ajax({
		url: base_url + "admin/services/updateServices",
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
