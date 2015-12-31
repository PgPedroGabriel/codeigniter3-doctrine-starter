jQuery(document).ready(function($) {
	
	setTimeout(function(){
		$('.callout').fadeOut('slow');
	}, 2000);



	var Functions = function () {
		
		var that = this;
		var executor = null;
		var eventCalled = null;

		this.updateStatus = function (e) {
			that.executor = $(this);
			that.eventCalled = e;

			var request = {
				url: moduleUrl+'/update_status',
				type: 'POST',
				dataType: 'json',
				data: {id: $(that.executor).attr('data-id')},
			}

			that.runAjax(request, function(result){
				if(result) {
					$(that.executor).html(result.data.html);
				}
				else {
					that.showError(result.message, result.code);
				}
			}) ;
		},

		this.runAjax = function(objRequest, callBackSuccess, callBackFail, callBackAlways){

			$(that.executor).unbind(that.eventCalled.type);
			that.runLoader();

			if(typeof(callBackAlways) == "undefined" || typeof(callBackAlways) != "function")
			{
				callBackAlways = that.defaultCallBackAlways(); 
			}

			if(typeof(callBackFail) == "undefined" || typeof(callBackFail) != "function")
			{
				callBackFail = that.defaultCallBackFail(); 
			}

			$.ajax(objRequest)
			.done(callBackSuccess)
			.fail(callBackFail)
			.always(callBackAlways);	

		},
		this.defaultCallBackFail = function() {
			return function() {
				that.showError("Ocorreu um erro em sua requisição.", 100);
			}
		},
		this.defaultCallBackAlways = function() {
			return function() {
				that.closeLoaders();					
				$(that.executor).bind(that.eventCalled.type, that.eventCalled.handleObj.handler);
			}
		},
		this.runLoader = function(){
			$('.overlay').show();
		},
		this.closeLoaders = function(){
			$('.overlay').hide();
		}
		this.showError = function(message, code)
		{
			$('#errorMessage').text(message);
			$('#errorCode').text("Código: "+code);
			$('.errorMessage').fadeIn();
		}
	}

	var Functions = new Functions();

	$('.update-status').bind('click',Functions.updateStatus);
});