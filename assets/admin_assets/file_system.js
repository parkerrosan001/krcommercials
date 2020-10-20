$(document).on("click", ".editFolder", function () {
	var folder_id = $(this).attr("id");
	var folder_name = $(this).attr("base_url");

	$("#renameFolderForm").trigger("reset");
	$("#renameFolder").modal("show");
	$("#id_field").val(folder_id);
	$("#rename_folder_name_field").val(folder_name);
});
