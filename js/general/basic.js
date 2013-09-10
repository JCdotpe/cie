function urlRoot(){
	pos_array=0;
	var delimiter="cie/";
	var loc = document.location.href;
	var url = loc.split(delimiter);

	return url[pos_array]+delimiter;	
				
}

(function($){

    var imported = [];

    $.extend(true,
    {
        import : function(script)
        {
            var found = false;
            for (var i = 0; i < imported.length; i++)
                if (imported[i] == script) {
                    found = true;
                    break;
                }

            if (found == false) {
                $("head").append('<script type="text/javascript" src="' + urlRoot() + script + '"></script>');
                imported.push(script);
            }
        }
        
    });

})(jQuery);