var System = System || {};
System.Example2 = {
		
		Options: {
			Lang: ''
		},
		
		Start: function(){
			System.Example2.Options.Lang = $('#locale').val().toLowerCase();
			this.Binds.BindCallback('#load_data', this.LoadData);
		},
		
		//******************************************
		// *  Load Data
		//****************************************** 
		LoadData: function(){
			var lang = System.Example2.Options.Lang;
			$('#language').text(System.Messages[lang].Language);
			$('#success').text(System.Messages[lang].Success);
			$('#usage').text(System.Messages[lang].Usage);
			$('#usage').show();
		},
		
		//******************************************
		// *  Binds
		//******************************************
		Binds: {			
			BindCallback: function(btnId, callBack){
				$(btnId).click(function(){
					callBack(this);
				});
			}
		}
};
/**************************************************************/
$(document).ready(function(){
	System.Example2.Start();
});
/**************************************************************/