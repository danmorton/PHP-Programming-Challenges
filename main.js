/**
 * Dynamic form will submit the form via ajax and then populate result div
 * @param string form_selector is a jquery compatible selector for our form
 * @param string response_selector is a jquery compatible selector for the element to populate with our response.
 */
function dynamicForm(form_slct, response_slct)
{
	$(form_slct).on('submit', function (e) {
		//first lets get our data for the ajax request
		var postData = $(form_slct).serialize(); //if you disabled the form before this you will have nothing...
		//we don't want the user trying to resubmit our form while we are working
		$(form_slct).find(':input:not(:disabled)').prop('disabled',true);
		$(response_slct).hide();//hide last repsonse
	    var action = $(form_slct).attr('action'), method = $(form_slct).attr('method');
	    if (action != undefined && method != undefined)
	    {
			$.ajax({
				type: method,
				url: action,
				data: postData,
				dataType: "json",
				success: function (r) {
					//lets give the user some feedback and show it...
					if (r.error)					
						$(response_slct).html("<span class=\"bad_response\">"+r.description+"</span>" + r.content);
					else
						$(response_slct).html("<span class=\"good_response\">"+r.description+"</span><br/><div class=\"response_content\">" + r.content + "</div>");
					$(response_slct).show();
				},
				error: function (r) {
					$(response_slct).html("<span class=\"bad_response\">Error:</span><br/><div class=\"response_content\">" + r + "</div>");				
				},
				complete: function()
				{
					$(form_slct).find(':input:disabled').prop('disabled',false); //re-enable our form
				}
			});
			e.preventDefault(); //so the form is not submitted traditionally...
		}
		else 
		{
			//lets give the user some feedback and show it...
			$(response_slct).html("<span class=\"bad_response\">Error:</span> unable to submit form via ajax.");
			$(response_slct).show(); 
			$(form_slct).find(':input:disabled').prop('disabled',false); //re-enable our form
			e.preventDefault(); //so the form is not submitted traditionally...
		}
	});


}

/**
 * Sets up our ajax for all of our forms...
 */
$(function () {
	dynamicForm("#ent_form", "#ent_response");
	dynamicForm("#fib_form", "#fib_response");
	dynamicForm("#kap_form", "#kap_response");
	dynamicForm("#aln_form", "#aln_response");
	dynamicForm("#hpy_form", "#hpy_response");
	dynamicForm("#grp_form", "#grp_response");
});
