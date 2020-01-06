function SubmitFormData() {
	$("#loadingimg").show();
	
    var name = $("#rpt_name").val();
	var sid = $("#sid").val();
	var events = $("#event").val();
    $.post("my-content/report/routes.php", { rpt_name: name, rpt_sid: sid, rpt_event:events },
    function(data) {
		$("#loadingimg").hide();
	 	$('#show_rptparam').html(data);
	 	$('#myReport')[0].reset();
    });
}