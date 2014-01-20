var faceboxOptions = {settings:{ overlay: true, opacity: 0.95, modal:true, closeImage : '/img/closelabel.png', loadingImage: '/img/loading.gif' }};

$.facebox.settings.closeImage = '/img/closelabel.png';
$.facebox.settings.loadingImage = '/img/loading.gif';
		
$('a[rel*=facebox]').live("mouseup", function() {
    if($(this).data('fb') == undefined) 
            $(this).facebox(faceboxOptions); // this should do, you don't need all links
    $(this).data('fb', true);
});
