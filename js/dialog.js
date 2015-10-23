/**
 * Created by Dip on 10/19/2015.
 */

var closeDialog = function(selector){
    selector.hide();
};
$(document).ready(function(){
    $('#dialog-close').click(function(){
        $('#dialog').hide('normal');
    });

});


