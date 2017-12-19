var base_url = window.location.origin+'/lrs-project';
$(function () {
    $('#tableregister').bootstrapTable({
        url: base_url+'/Dashboard/getRegisterjson',
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
            field: 'registers_clinic_name',
            title: 'คลินิกที่สมัคร',
            sortable: 'true',
            valign: 'middle',
            align: 'center',
            width: '25%'
        }, {
            field: 'clinic_name',
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
        '<a class="pass ml10" href="javascript:void(0)" title="ผ่าน">',
        '<i class="fa fa-check fa-lg" aria-hidden="true"></i>',
        '</a>&nbsp&nbsp&nbsp',
        '<a class="fail" href="javascript:void(0)" title="ไม่ผ่าน">',
        '<i class="fa fa-times fa-lg" aria-hidden="true"></i>',
        '</a>&nbsp&nbsp&nbsp',
        '<a class="print" href="javascript:void(0)" title="พิมพ์">',
        '<i class="fa fa-print fa-lg" aria-hidden="true"></i>',
        '</a>',
    ].join('');
}

window.actionEvents = {
    'click .pass': function (e, value, row, index) {
        swal({
          title: 'ให้ผ่านการสัมภาษณ์',
          text: "คุณไม่สามารถย้อนกลับได้!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'ยืนยัน',
          cancelButtonText: 'ยกเลิก'
        }).then((result) => {
          if (result.value) {
            $.ajax({
                type:"POST",
                url: base_url+"/Dashboard/registerpass",
                data: {data: JSON.stringify(row)},
                dataType: 'json'
            });
            swal({
              title: 'สำเร็จ',
              text: 'เพิ่มที่ปรึกษาเรียบร้อย',
              type: 'success',
              confirmButtonText: 'ปิด'
            }).then((result) => {
                if (result.value) {
                    location.reload();
                }
            })
          }
        })
        
    },
    'click .fail': function (e, value, row, index) {
        swal({
          title: 'ไม่ให้ผ่านการสัมภาษณ์',
          text: "",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'ยืนยัน',
          cancelButtonText: 'ยกเลิก'
        }).then((result) => {
          if (result.value) {
            $.ajax({
                type:"POST",
                url: base_url+"/Dashboard/registerfail",
                data: {data: JSON.stringify(row)},
                dataType: 'json'
            });
            swal({
              title: 'สำเร็จ',
              text: 'ไม่ผ่านการสัมภาษณ์',
              type: 'error',
              confirmButtonText: 'ปิด'
            }).then((result) => {
                if (result.value) {
                    location.reload();
                }
            })
          }
        })
        
    },
    'click .print': function (e, value, row, index) {
            alert('You click del icon, row: ' + JSON.stringify(row));
        
    }
};


$(function () {
    var $table = $('#tableregister');
    $('#toolbar').find('select').change(function () {
    $table.bootstrapTable('refreshOptions', {
      exportDataType: $(this).val()
    });
  });
});

window.icons = {
  export: 'fa-download'
};
console.log('manageregister.js');