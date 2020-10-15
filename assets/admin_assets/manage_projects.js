function fl_preview_image(event) {
	var reader = new FileReader();
	reader.onload = function () {
		var output = document.getElementById("fl_output_image");
		output.src = reader.result;
	};
	reader.readAsDataURL(event.target.files[0]);
}

function cal_preview_image(event) {
	var reader = new FileReader();
	reader.onload = function () {
		var output = document.getElementById("cal_output_image");
		output.src = reader.result;
	};
	reader.readAsDataURL(event.target.files[0]);
}

function project_preview_image(event) {
	var reader = new FileReader();
	reader.onload = function () {
		var output = document.getElementById("project_output_image");
		output.src = reader.result;
	};
	reader.readAsDataURL(event.target.files[0]);
}

function preview_image_edit_project(event) {
	var reader = new FileReader();
	reader.onload = function () {
		var output = document.getElementById("output_image_edit_project");
		output.src = reader.result;
	};
	reader.readAsDataURL(event.target.files[0]);
}

CKEDITOR.replace("fl_sub_text_field");

CKEDITOR.replace("cal_sub_text_field");

// CKEDITOR.replace("project_description_field");

// CKEDITOR.replace("project_edit_description_field");

/*  edit Event form pop-up rendering starts */

$(document).on("click", ".editProject", function () {
	var project_id;
	var base_url;

	project_id = $(this).attr("id");
	base_url = $(this).attr("base_url");

	$("#" + project_id + "project_edit_link").hide();
	$("#" + project_id + "project_edit_waiting").show();

	$.ajax({
		url: base_url + "admin/projects/fetchSingleProject",
		method: "POST",
		data: {
			id: project_id,
		},
		dataType: "json",
		success: function (data) {
			$("#editProjectForm").trigger("reset");
			$("#editProjectModal").modal("show");

			$("#" + project_id + "project_edit_link").show();
			$("#" + project_id + "project_edit_waiting").hide();

			$("#id_field").val(data.single_project_data.id);
			$("#project_edit_title_field").val(
				data.single_project_data.project_title
			);
			$("#project_edit_description_field").val(data.single_project_data.project_description);
			// CKEDITOR.instances.project_edit_description_field.setData(
			// 	data.single_project_data.project_description
			// );
			$("#project_edit_branch_field").val(data.single_project_data.branch);

			var image =
				base_url + "uploads/" + data.single_project_data.project_image;
			$("#output_image_edit_project").attr("src", image);
			$("#project_old_pic_field").val(data.single_project_data.project_image);
		},
	});
});

/*  edit Event form pop-up rendering ends */

/*  edit Event form submission starts */

$("#editProjectForm").on("submit", function (event) {
	$(this).find("input[type=submit]").prop("disabled", true);

	var base_url = $("#base_url_field").val();
	event.preventDefault();

	$.ajax({
		url: base_url + "admin/projects/updateProject",
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
