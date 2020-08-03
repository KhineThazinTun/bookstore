$(document).ready(function () {
	$(".del").click(function(e){
        if(!confirm('Are you sure to delete?')){
            e.preventDefault();
            return false;
        }
        return true;
    });
});
// -------------------------------
