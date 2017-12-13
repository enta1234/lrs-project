var base_url = window.location.origin+'/lrs-project';
$(function () {
    $('#table').bootstrapTable({
        url: base_url+'/Dashboard/getofficerjson',
        columns: [{
            field: 'state',
            checkbox: 'true',
            valign: 'middle',
        }, {
            field: 'officer_id',
            title: 'รหัสเจ้าหน้าที่',
            sortable: 'true',
            valign: 'middle',
            align: 'center'
        }, {
            field: 'clinic_name',
            title: 'พื้นที่รับผิดชอบ',
            sortable: 'true',
            valign: 'middle',
            align: 'center',
            width: '25%',
        }, {
            field: 'officer_name',
            title: 'ชื่อ',
            sortable: 'true',
            valign: 'middle',
            halign: 'center',
            width: '25%',

        }, {
            field: 'officer_lastname',
            title: 'นามสกุล',
            sortable: 'true',
            valign: 'middle',
            halign: 'center',
            width: '25%'
        }, {
            field: 'officer_username',
            title: 'อีเมล',
            sortable: 'true',
            valign: 'middle',
            halign: 'center',
            width: '20%'
        }, {
            field: 'officer_status',
            title: 'สิทธ์ผู้ใช้งาน',
            sortable: 'true',
            valign: 'middle',
            align: 'center',
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
        '<a class="edit ml10" href="javascript:void(0)" title="Edit">',
        '<i class="fa fa-pencil fa-lg" aria-hidden="true"></i>',
        '</a>&nbsp&nbsp&nbsp',
        '<a class="del" href="javascript:void(0)" title="Del">',
        '<i class="fa fa-trash fa-lg" aria-hidden="true"></i>',
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
                url: base_url+"/Dashboard/staffdelete",
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
    'click .edit': function (e, value, row, index) {
        swal({
          title: 'ต้องการแก้ไขใช่ไหม',
          text: "",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'ยืนยัน',
          cancelButtonText: 'ยกเลิก'
        }).then((result) => {
          if (result.value) {
            // alert('You click del icon, row: ' + JSON.stringify(row));
            $.ajax({
                type:"POST",
                url: base_url+"/Dashboard/staffedit",
                data: {data: JSON.stringify(row)},
                dataType: 'json'
            });
            window.location.href = base_url+'/Dashboard/staffedit';
          }
        })    
    }
};


$(function () {
    var $table = $('#table');
    $('#toolbar').find('select').change(function () {
    $table.bootstrapTable('refreshOptions', {
      exportDataType: $(this).val()
    });
  });
});

window.icons = {
  export: 'fa-download'
};
