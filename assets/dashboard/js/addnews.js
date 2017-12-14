$(function () {
    $('#filestatus').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%'
    });
    $('#filestatus').on('ifChecked', function(event){
        console.log('checked');
        document.getElementById("file").removeAttribute('disabled','');
    });
    $('#filestatus').on('ifUnchecked', function(event){
        console.log('unchecked');
        document.getElementById("file").setAttribute('disabled','disabled');
    });
});