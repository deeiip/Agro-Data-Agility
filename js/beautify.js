/**
 * Created by Dip on 10/22/2015.
 */

var showNass = function(){

};

var showArms = function(){

};


$('#resultset-name').on('change', function(event){
    $('#duplicate-name-err').attr('class', 'col-lg-8');
    if($('#resultset-name').val().trim() in used_name)
    {
        $('#duplicate-name-err').addClass('has-error');
        $('#duplicate-name-err').effect('shake');
        $.notify({
            // options
            message: 'Duplicate names of dataset is not allowed'
        },{
            // settings
            type: 'warning',
            placement: {
                from: "bottom",
                align: "right"
            }
        });
    }
    else
    {
        $('#duplicate-name-err').addClass('has-success');
    }


});


