// var base_url = window.location.origin+'/lrs-project';
var base_url = window.location.origin;
$(function () {
    $('#tablehistorylawyer').bootstrapTable({
        url: base_url+'/Dashboard/getHistorylawyerjson',
        columns: [{
            field: 'state',
            checkbox: 'true',
            valign: 'middle',
        }, {
            field: 'lawyer_id',
            title: 'ลำดับ',
            sortable: 'true',
            valign: 'middle',
            align: 'center'
        }, {
            field: 'information_idcard',
            title: 'บัตรประชาชน',
            sortable: 'true',
            valign: 'middle',
            align: 'center',
        }, {
            field: 'information_name',
            title: 'ชื่อ',
            sortable: 'true',
            valign: 'middle',
            halign: 'center',
            width: '20%',

        }, {
            field: 'information_lastname',
            title: 'นามสกุล',
            sortable: 'true',
            valign: 'middle',
            halign: 'center',
            width: '20%'
        }, {
            field: 'information_phonenumber',
            title: 'เบอร์',
            sortable: 'true',
            valign: 'middle',
            align: 'center',
        }, {
            field: 'lawyer_ban_detail',
            title: 'แบล็คลิสต์',
            sortable: 'true',
            valign: 'middle',
            align: 'center',
            width: '25%'
        }, {
            field: 'clinic_name',
            title: 'ประจำที่',
            sortable: 'true',
            valign: 'middle',
            align: 'center',
            width: '20%'
        }, {
            field: 'lawyer_status',
            title: 'สถานะที่ปรึกษา',
            sortable: 'true',
            valign: 'middle',
            align: 'center',
        }, {
            field: 'lawyer_date_start',
            title: 'วันที่เริ่มงาน',
            sortable: 'true',
            valign: 'middle',
            align: 'center',
        }, {
            field: 'action',
            title: 'จัดการี่ปรึกษา',
            valign: 'middle',
            align: 'center',
            formatter: 'actionFormatter',
            events: 'actionEvents',
        }]
    });
});

function actionFormatter(value, row, index) {
    return [
        '<a class="btn btn-primary print" href="javascript:void(0)" title="พิมพ์">',
        '<i class="fa fa-print fa-lg" aria-hidden="true"></i>',
        '</a>',
    ].join('');
}

window.actionEvents = {
    'click .print': function (e, value, row, index) {
            alert('You click del icon, row: ' + JSON.stringify(row));
        
    }
};


$(function () {
    var $table = $('#tablehistorylawyer');
    $('#toolbar').find('select').change(function () {
    $table.bootstrapTable('refreshOptions', {
      exportDataType: $(this).val()
    });
  });
});

window.icons = {
  export: 'fa-download',
  columns: 'fa-eye'
};