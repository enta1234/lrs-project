var base_url = window.location.origin+'/lrs-project';
$(function () {
    $('#tablehistoryregister').bootstrapTable({
        url: base_url+'/Dashboard/getHistoryregisterjson',
        columns: [{
            field: 'state',
            checkbox: 'true',
            valign: 'middle',
        }, {
            field: 'registers_id',
            title: 'เลขที่',
            sortable: 'true',
            valign: 'middle',
            align: 'center',
            width: '1%',
        }, {
            field: 'information_idcard',
            title: 'บัตรประชาชน',
            sortable: 'true',
            valign: 'middle',
            align: 'center'
        }, {
            field: 'information_name',
            title: 'ชื่อ',
            sortable: 'true',
            valign: 'middle',
            halign: 'center',
            width: '25%',
        }, {
            field: 'information_lastname',
            title: 'นามสกุล',
            sortable: 'true',
            valign: 'middle',
            halign: 'center',
            width: '25%',

        }, {
            field: 'information_phonenumber',
            title: 'เบอร์ติดต่อ',
            sortable: 'true',
            valign: 'middle',
            align: 'center',
            width: '5%'
        }, {
            field: 'clinic_name',
            title: 'คลินิกที่สมัคร',
            sortable: 'true',
            valign: 'middle',
            align: 'center',
            width: '25%'
        }, {
            field: 'ever_clinic_name',
            title: 'เคยเป็นที่ปรึกษาที่',
            sortable: 'true',
            valign: 'middle',
            align: 'center',
            width: '25%'
        }, {
            field: 'lawyer_ban_status',
            title: 'สถานะแบล็กลิสต์',
            sortable: 'true',
            valign: 'middle',
            align: 'center',
            width: '5%'
        }, {
            field: 'registers_timeregister',
            title: 'วันที่สมัคร',
            sortable: 'true',
            valign: 'middle',
            align: 'center',
            width: '5%'
        }, {
            field: 'registers_status',
            title: 'ผลการสมัคร',
            sortable: 'true',
            valign: 'middle',
            align: 'center',
            width: '5%'
        }, {
            field: 'action',
            title: 'จัดการพนักงาน',
            valign: 'middle',
            align: 'center',
            formatter: 'actionFormatter',
            events: 'actionEvents',
        }]
    });
});

function actionFormatter(value, row, index) {
    return [
        '<a class="print" href="javascript:void(0)" title="พิมพ์">',
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
    var $table = $('#tablehistoryregister');
    $('#toolbar').find('select').change(function () {
    $table.bootstrapTable('refreshOptions', {
      exportDataType: $(this).val()
    });
  });
});

window.icons = {
  export: 'fa-download'
};