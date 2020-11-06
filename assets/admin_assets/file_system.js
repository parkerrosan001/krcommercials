$(document).on("click", ".editFolder", function () {
	var folder_id = $(this).attr("id");
	var folder_name = $(this).attr("base_url");

	$("#renameFolderForm").trigger("reset");
	$("#renameFolder").modal("show");
	$("#id_field").val(folder_id);
	$("#rename_folder_name_field").val(folder_name);
});

$(document).on("click", ".editFile", function () {
	var id = $(this).attr("id");
	var folder_id = $(this).attr("folder_id");
	var file_name = $(this).attr("base_url");

	$("#renameFileForm").trigger("reset");
	$("#renameFile").modal("show");

	$("#id_field").val(id);
	$("#fol_id_field").val(folder_id);
	$("#rename_file_name_field").val(file_name);
});

$(document).on("click", ".renameFolder", function () {
	var folder_id = $(this).attr("id");
	var folder_name = $(this).attr("base_url");
	var branch = $(this).attr("branch");

	$("#editFolderForm").trigger("reset");
	$("#editFolderModal").modal("show");
	$("#id_field").val(folder_id);
	$("#rename_folder_name_field").val(folder_name);
	$("#folder_edit_branch_field").val(branch);
});

$(document).on("click", ".renameFile", function () {
	var id = $(this).attr("id");
	var folder_id = $(this).attr("folder_id");
	var file_name = $(this).attr("base_url");
	var branch = $(this).attr("branch");

	$("#editFileForm").trigger("reset");
	$("#editFileModal").modal("show");

	$("#id_field").val(id);
	$("#fol_id_field").val(folder_id);
	$("#rename_file_name_field").val(file_name);
	$("#folder_edit_branch_field").val(branch);
});

$(document).on("click", ".createSubFolder", function () {
	var parrent_folder = $(this).attr("parrent_folder_id");

	$("#SubFolderForm").trigger("reset");
	$("#SubFolder").modal("show");
	$("#parrent_folder_field").val(parrent_folder);
});
