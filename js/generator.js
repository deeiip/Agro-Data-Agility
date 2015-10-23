/**
 * Created by Dip on 10/22/2015.
 */


var createVeiw = function(qry, name, names, types, descs) {
    var success;
    $.post("create.php", {
        query: qry,
        view_name: name
    }, function(data)
    {
        console.log(data);
        var result = data;
        if(result == "success")
        {
            var htmlStr = '<li data-name="'+ 'set34' +'" data-query="'+ qry +'"><a class="meta-data hard-data"' +
                'data-fname="'+name+'" data-names="'+ names +
                '" data-types="'+ types +'" data-descs="'+ descs +'" href="#">'+ name+'</a></li>';
            $('#user-datasets').append($(htmlStr));
            $('#dialog').hide('normal');
        }
        $('#resultset-name').val('');
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
    });
    return success;
};
var used_name = [];
var name_markar = 339;
var createSet = function(qry, names, types, descs){
    var fname = $('#resultset-name').val().trim();


    if(fname == null || fname == "")
    {
        fname = 'dataset_' + name_markar;
        name_markar++;
    }
    var result = '';
    if(fname in used_name)
    {
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
        result = "duplicate name";
    }
    else
    {
        used_name[fname] = 1;
        var result = createVeiw(qry, fname, names, types, descs);
    }


};

$('#save-data').click(function(event){

    if($(this).attr('data-ops') == 'select')
    {
        var data1_name = $('#select-dataset-select').val();

        var names1 = items[data1_name].names;
        var types1 = items[data1_name].types;
        var desc1 = items[data1_name].desc;
        var names = '';
        var types = '';
        var descs = '';
        var st = 'select ';
        var columns = $('.select-box :checked');
        for(var i = 0; i< columns.length; i++)
        {
            names += $(columns[i]).attr('data-col')+',';
            types += $(columns[i]).attr('data-type') +',';
            descs += $(columns[i]).attr('data-desc') +',';

            st+= $(columns[i]).attr('data-col') + ', ';
        }
        var fname = $('#resultset-name').val().trim();
        if(fname == null || fname == "")
        {
            fname = 'dataset_' + name_markar;
            //name_markar++;
        }
        names = names.substring(0, names.length - 1);
        types = types.substring(0, types.length - 1);
        descs = descs.substring(0, descs.length - 1);
        st = st.substring(0, st.length - 2);
        var qry = 'create view ' + fname +' as ' + st + ' from ' + $('#select-dataset-select').val() + '';
        createSet(qry, names, types, descs);

    }
    else if($(this).attr('data-ops') == 'join')
    {
        var fname = $('#resultset-name').val().trim();
        if(fname == null || fname == "")
        {
            fname = 'dataset_' + name_markar;
            //name_markar++;
        }
        var data1_name = $('#data1-select').val();
        var data2_name = $('#data2-select').val();
        var names1 = items[data1_name].names;
        var types1 = items[data1_name].types;
        var names2 = items[data2_name].names;
        var types2 = items[data2_name].types;
        var desc1 = items[data1_name].desc;
        var desc2 = items[data2_name].desc;
        var selectStr = '';
        var name1Arr = names1.split(',');
        var name2Arr = names2.split(',');
        for(var i = 0; i< name1Arr.length; i++)
        {
            selectStr+= data1_name.trim()+ '.' + name1Arr[i] +' as ' + data1_name.trim()+'_'+name1Arr[i] +' , ';
        }
        for(var i =0 ; i < name2Arr.length; i++)
        {
            selectStr+= data2_name.trim()+ '.' + name2Arr[i] +' as ' + data2_name.trim() + '_' + name2Arr[i] +' , ';
        }
        var fname = $('#resultset-name').val().trim();
        if(fname == null || fname == "")
        {
            fname = 'dataset_' + name_markar;
            //name_markar++;
        }
        selectStr = selectStr.substring(0, selectStr.length -2);
        var qry = 'create view ' + fname +' as select ' + selectStr + ' from '+ $('#data1-select').val() + ' join '+ $('#data2-select').val() + ' on '+
            $('#data1-select').val() + '.' + $('#select-data1-col').val() + ' = ' +
            $('#data2-select').val() + '.' + $('#select-data2-col').val() + '';
        createSet(qry, names1+','+names2, types1+','+types2, desc1+','+desc2 );
        //$('#dialog').hide('normal');
    }
    else if( $(this).attr('data-ops') == 'filter')
    {

        var data1_name = $('#filter-dataset-select').val();
        var fname = $('#resultset-name').val().trim();
        if(fname == null || fname == "")
        {
            fname = 'dataset_' + name_markar;
            //name_markar++;
        }
        var names = items[data1_name].names;
        var types = items[data1_name].types;
        var desc = items[data1_name].desc;
        var qry = 'create view '+ fname +' as select * from '+ $('#filter-dataset-select').val()+
                ' where ' + $('#filter-condition').val();
        createSet(qry, names, types, desc );
        //$('#dialog').hide('normal');
    }
    else if($(this).attr('data-ops') == 'mask')
    {

        var qry = 'create view as  select ';
        createSet(qry, names1+','+names2, types1+','+types2, desc1+','+desc2 );
        //$('#dialog').hide('normal');
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
});
$('#data-discard').click(function(data){
    $('#dialog').hide('normal');
    $('#resultset-name').val('');
});