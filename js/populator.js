/**
 * Created by Dip on 10/19/2015.
 */

var items = [];


var showMask = function(src){
    $('#manip-board').html('');
    var htmlStr = '<p><form class="form-horizontal"><div class="form-group">'+
        '<label for="select" class="col-lg-2 control-label">First Dataset</label>'+
        '<div class="col-lg-8"><select class="form-control" id="mask-dataset-select">';
    var dataItems = $('.hard-data');
    items = [];
    for(var i =0; i< dataItems.length; i++)
    {
        items[$(dataItems[i]).data('fname')] = {
            "names": $(dataItems[i]).data('names'),
            "types": $(dataItems[i]).data('types'),
            "desc" : $(dataItems[i]).data('descs')
        };

    }
    for (var key in items) {
        if (items.hasOwnProperty(key)) {
            htmlStr+='<option>'+ key +'</option>';
        }
    }

    htmlStr+='</select> <br><div class="form-group">'+
    ''+
    '<div class="col-lg-12"><select class="form-control" id="mask-dataset-cols">';
    htmlStr+='</select> <br>'+
    '</div><div style="margin-left: 0%;" class="col-lg-12"><input type="text" class="form-control" id="inputEmail" '+
    'placeholder="Write your mask expression"></div>';
    var newP = $(htmlStr).hide();
    $('#manip-board').append(newP);
    newP.show('normal');
    $('#dialog').show('normal');

    $('#resultset-name').attr('placeholder', 'dataset_' + name_markar);

    $('#mask-dataset-select').on('change', function(event) {
        var targetData = this.value;
        var names = items[targetData].names.split(',');
        var types = items[targetData].types.split(',');
        $('#mask-dataset-cols').html('');
        for(var i = 0; i< names.length; i++)
        {
            $('#mask-dataset-cols').append($('<option>', {
                value: names[i],
                text: names[i]
            }));
        }

    });
    $('#save-data').attr('data-ops','mask');

};

var showFilter = function(src){
    $('#manip-board').html('');
    var htmlStr = '<p><form class="form-horizontal"><div class="form-group">'+
        '<label for="select" class="col-lg-2 control-label">First Dataset</label>'+
        '<div class="col-lg-8"><select class="form-control" id="filter-dataset-select">';
    var dataItems = $('.hard-data');
    items = [];
    for(var i =0; i< dataItems.length; i++)
    {
        items[$(dataItems[i]).data('fname')] = {
            "names": $(dataItems[i]).data('names'),
            "types": $(dataItems[i]).data('types'),
            "desc" : $(dataItems[i]).data('descs')
        };

    }
    for (var key in items) {
        if (items.hasOwnProperty(key)) {
            htmlStr+='<option>'+ key +'</option>';
        }
    }
    htmlStr+='</select>  <br>'+
    '</div><div style="margin-left: 17%;" class="col-lg-8"><input type="text" class="form-control" id="filter-condition" '+
    'placeholder="Write your filter expression"></div>';
    var newP = $(htmlStr).hide();
    $('#manip-board').append(newP);
    newP.show('normal');
    $('#dialog').show('normal');
    $('#save-data').attr('data-ops','filter');
    $('#resultset-name').attr('placeholder', 'dataset_' + name_markar);

};



var showJoin = function(src){
    $('#manip-board').html('');
    var htmlStr = ' <p><div class="form-horizontal"><div class="form-group"><label for="data1-select" class="col-lg-2 control-label">First Dataset</label>'+
    '<div class="col-lg-4"><select class="form-control" id="data1-select">';

    var current = $(htmlStr);
    var dataItems = $('.hard-data');
    items = [];
    for(var i =0; i< dataItems.length; i++)
    {
        items[$(dataItems[i]).data('fname')] = {
            "names": $(dataItems[i]).data('names'),
            "types": $(dataItems[i]).data('types'),
            "desc" : $(dataItems[i]).data('descs')
        };
        /*items.push({
            "d_name": $(dataItems[i]).data('fname'),
            "names": $(dataItems[i]).data('names'),
            "types": $(dataItems[i]).data('types')
        });*/
    }
    for (var key in items) {
        if (items.hasOwnProperty(key)) {
            htmlStr+='<option>'+ key +'</option>';
        }
    }


    htmlStr+='</select></div><label for="data2-select" class="col-lg-2 control-label">Second Dataset</label><div class="col-lg-4"><select class="form-control" id="data2-select">';
    for (var key in items) {
        if (items.hasOwnProperty(key)) {
            htmlStr+='<option>'+ key +'</option>';
        }
    }
    htmlStr+='</select></div><br></div><div class="form-group"><label for="select" class="col-lg-2 control-label">First Dataset</label>'+
    '<div class="col-lg-4"><select class="form-control" id="select-data1-col"></select></div>'+
    '<label for="select" class="col-lg-2 control-label">Second Dataset</label>'+
    '<div class="col-lg-4"><select class="form-control" id="select-data2-col">'+
    '</select></div><br></div></div></p>';

    /*for(var i = 0; i< items.length; i++)
    {
        current.find('#data1-select').html(current.find('#data1-select').append($('<option>', {
            value: 1,
            text: 'My option'
        })));
    }*/

    var newP = $(htmlStr).hide();
    $('#manip-board').append(newP);
    newP.show('normal');

    $('#resultset-name').attr('placeholder', 'dataset_' + name_markar);
    $('#dialog').show('normal');
    $('#data1-select').on('change', function(event) {
        var targetData = this.value;
        var names = items[targetData].names.split(',');
        var types = items[targetData].types.split(',');


        $('#select-data1-col').html('');
        for(var i = 0; i< names.length; i++)
        {
            $('#select-data1-col').append($('<option>', {
                value: names[i],
                text: names[i]
            }));
        }

    });
    $('#data2-select').on('change', function(event) {
        var targetData = this.value;
        var names = items[targetData].names.split(',');
        var types = items[targetData].types.split(',');
        $('#select-data2-col').html('');
        for(var i = 0; i< names.length; i++)
        {
            $('#select-data2-col').append($('<option>', {
                value: names[i],
                text: names[i]
            }));
        }

    });
    $('#save-data').attr('data-ops','join');


};
var showSelect = function(data){
    $('#manip-board').html('');
    var htmlStr = '<p><form class="form-horizontal"><div class="form-group">'+
        '<label for="select" class="col-lg-2 control-label">First Dataset</label>'+
        '<div class="col-lg-8"><select class="form-control" id="select-dataset-select">';
    var dataItems = $('.hard-data');
    items = [];
    for(var i =0; i< dataItems.length; i++)
    {
        items[$(dataItems[i]).data('fname')] = {
            "names": $(dataItems[i]).data('names'),
            "types": $(dataItems[i]).data('types'),
            "desc" : $(dataItems[i]).data('descs')
        };
        /*items.push({
         "d_name": $(dataItems[i]).data('fname'),
         "names": $(dataItems[i]).data('names'),
         "types": $(dataItems[i]).data('types')
         });*/
    }
    for (var key in items) {
        if (items.hasOwnProperty(key)) {
            htmlStr+='<option>'+ key +'</option>';
        }
    }
        htmlStr+='</select> <br>'+
        '</div><div id="select-what" style="margin-left: 13px;" class="form-group">'
        +'</div></div></form></p>';
    var newP = $(htmlStr).hide();
    $('#manip-board').append(newP);
    newP.show('normal');
    $('#dialog').show('normal');

    $('#resultset-name').attr('placeholder', 'dataset_' + name_markar);

    $('#select-dataset-select').on('change', function(event) {
        var targetData = this.value;
        var names = items[targetData].names.split(',');
        var types = items[targetData].types.split(',');
        var descs = items[targetData].desc.split(',');
        $('#select-data2-col').html('');
        $('#select-what').html('');
        var chks = '';
        for(var i = 0; i< names.length; i++)
        {
            chks+='<div class="col-lg-3">'+
            '<div class="checkbox select-box">'+
            '<label><input data-type="' + types[i] + '" data-desc="'+ descs[i]+'" data-col="'+ names[i]+'" type="checkbox">'+
            names[i] +'</label></div></div>';

        }
        $('#select-what').append($(chks));

    });

    $('#save-data').attr('data-ops','select');

};

$.get('data/ops.json', function(data){
    for(var i = 0; i< data.length; i++)
    {
        var target = $('#ops-panel');
        var name = data[i].title;
        var desc = data[i].desc;
        var htmlStr = '<div data-op="'+ name +'" onclick="'+ data[i].handler +'(this)" style="text-align: center;" class="col-md-3 container showcase"><h5><a href="#">'+ name +'</a></h5>'+
            '<p style="text-align: center;"><i style="text-align: center; font-size: 50px; color: #269abc;" class="glyphicon '
            + data[i].icon + '"></i><br>'+
            desc + '</p></div>';
        var newP = $(htmlStr).hide();
        target.append(newP);
        newP.show('normal');
    }
    /*$('.showcase').click(function(){
        $('#dialog').show('normal');
    });*/
});

$.get('data/meta.json', function(data){
    for(var i = 0; i< data.length; i++)
    {
        var target = data[i];
        var htmlStr = '<li class="sidebar-brand"><a href="#">'+
        target.name +'&nbsp; &nbsp; &nbsp; <span class="caret"></span></a></li>';
        for(var j =0 ; j< target.dataset.length ; j++)
        {
            var names = [];
            var types = [];
            var desc = [];
            for(var k = 0; k< target.dataset[j].cols.length; k++)
            {
                var current = target.dataset[j].cols[k];
                names.push(current.name);
                types.push(current.type);
                desc.push(current.description);
            }
            htmlStr+='<li><a class="hard-data meta-data" data-fname="'+ target.dataset[j].name +'" data-names="'+ names.join(",") +
            '" data-types="'+ types.join(",") +
            '" data-descs="' + desc.join(",") + '" href="#">'+ target.dataset[j].name +'</a></li>';
        }
        var newP = $(htmlStr).hide();
        $('#data-sets').append(newP);
        newP.show('normal');
    }
    $('.meta-data').click(function(){
        var names = $(this).data('names').split(",");
        var types = $(this).data('types').split(",");
        var descs = $(this).data('descs').split(",");
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

    });
    $('#data-dialog-close').click(function(){
        $('#data-dialog').hide('normal');
    });
    $('#data-close').click(function(){

        $('#data-dialog').hide('normal');
    });
});