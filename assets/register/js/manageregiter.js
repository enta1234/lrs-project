var base_url = window.location.origin;
// var base_url = window.location.origin+'/lrs-project';
$(function () {
    $('#table').bootstrapTable({
        url: base_url+'/Registed/getregisters',
        columns: [{
            field: 'registers_id',
            title: 'ลำดับ',
            sortable: 'true',
            valign: 'middle',
            align: 'center',
        }, {
            field: 'information_idcard',
            title: 'เลขบัตรประชาชน',
            valign: 'middle',
            align: 'center',
        }, {
            field: 'information_name',
            title: 'ชื่อ',
            valign: 'middle',
            halign: 'center',   
            align: 'center',
            width: '23%',

        },{
            field: 'clinic_name',
            title: 'คลินิกที่สมัคร',
            sortable: 'true',
            valign: 'middle',
            halign: 'center',
            width: '30%',
        }, {
            field: 'registers_status',
            title: 'สถานะการสมัคร',
            sortable: 'true',
            valign: 'middle',
            align: 'center',
        },
        {
            field: 'registers_timeregister',
            title: 'เวลาที่สมัคร',
            sortable: 'true',
            valign: 'middle',
            align: 'center',
        }, {
            field: 'action',
            title: '',
            valign: 'middle',
            align: 'center',
            formatter: 'actionFormatter',
            events: 'actionEvents',
            width: '25%',
        }]
    });
});

function actionFormatter(value, row, index) {
    return [
        '<a class="btn btn-info print" href="javascript:void(0)" title="Print">',
        '<i class="fa fa-print" aria-hidden="true"></i>',
        '</a>&nbsp&nbsp&nbsp',
        '<a class="btn btn-danger del" href="javascript:void(0)" title="Delete">',
        '<i class="fa fa-trash-o" aria-hidden="true"></i>',
        '</a>',
    ].join('');
}

window.actionEvents = {
    'click .del': function (e, value, row, index) {
        swal({
          title: 'ต้องการลบใช่ไหม',
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
                url: base_url+"/registed/delregister",
                data: {data: JSON.stringify(row)},
                dataType: 'json'
            });
            swal({
              title: 'สำเร็จ',
              text: 'ลบรายชื่อจ้าหน้าที่สำเร็จ',
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
    'click .print': function (e, value, row, index) {
        window.print();
    }
   
};
window.icons = {
        refresh: 'fa-refresh'
      };