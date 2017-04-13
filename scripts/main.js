$( document ).ready(function() {
    $("#ref").hide();
});

 function toggle(id) {
    $(id).slideToggle();
}

function markRead(id){
	$.ajax({
		url: "scripts/updates/mark-read.php",
		type: "POST",
		data: "message_id="+id,
		success: function() {
			$("#messageStatus"+id).removeClass("blue").text("Lido").addClass("green");
		}
	});
}