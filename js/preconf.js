/**
 * Created by Gourab on 10/23/2015.
 */

$.get('list.php', function(data){
    if(data == "[][]")
    {
        $('#user-dataset-header').html('Custom Datasets: &nbsp; &nbsp; <span class="caret"></span>');
        return;
    }
    data = eval(data);
    var htmStr = '';
    for(var i = 0; i < data.length; i++)
    {
        used_name[data[i].name] = 1;
        var cols = data[i].columns;
        var names = [];
        var types = [];
        var descs = [];
        for(var j = 0; j< cols.length; j++)
        {
            names.push(cols[j].name);
            types.push(cols[j].type);
            descs.push(cols[j].name);
        }
        htmStr+='<li><a class="hard-data meta-data" data-fname="' + data[i].name +
        '" data-names="'+ names.join(",") +'" data-types="'+ types.join(",") +'" data-descs="'+ descs.join(",") +'" href="#"> <i style="color: #1cbc96;" class="fa fa-table"></i> &nbsp; &nbsp;'+ data[i].name +'</a></li>';

        $('#user-dataset-header').html('Custom Datasets: &nbsp; &nbsp; <span class="caret"></span>');

    }
    $('#user-datasets').append($(htmStr));
    $('.meta-data').click(function(){
        var names = $(this).data('names').split(",");
        var types = $(this).data('types').split(",");
        var descs = $(this).data('descs').split(",");
        var selfName= $(this).data('fname');
        var target = $('#meta-table');
        target.html('');
        var htmlStr = '<thead><tr><th>#</th><th>Name</th><th>Type</th><th>Description</th></tr></thead><tbody>';
        for(var i =0; i< names.length; i++)
        {
            var current = '<tr class="active"><td style="width: 5%">'+ (i+1)+
                '</td><td style="width:15%">'+ names[i] +
                '</td><td style="width: 15% ">'+ types[i]+
                '</td><td>'+ descs[i] +
                '</td></tr>';
            htmlStr+=current;
        }
        htmlStr+='</tbody>';
        var newP = $(htmlStr).hide();
        target.append(newP);
        newP.show('normal');
        $('#data-dialog').show('normal');
        $('#data-prev').attr('data-fname', selfName );
        $('#data-prev').unbind('click');
        $('#data-prev').click(function(){
            var tabName = $('#data-prev').attr('data-fname');
            getPreview(tabName);
        });
    });

});