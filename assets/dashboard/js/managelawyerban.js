var base_url = window.location.origin+'/lrs-project';
$(function () {
    $('#tablelawyerban').bootstrapTable({
        url: base_url+'/Dashboard/getLawyerbanpagejson',
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
            title: 'เหตุผลทของแบล็คลิสต์',
            sortable: 'true',
            valign: 'middle',
            halign: 'center',
            width: '25%'
        }, {
            field: 'clinic_name',
            title: 'ประจำที่',
            sortable: 'true',
            valign: 'middle',
            align: 'center',
            width: '20%'
        }, {
            field: 'action',
            title: 'จัดการที่ปรึกษา',
            valign: 'middle',
            align: 'center',
            formatter: 'actionFormatter',
            events: 'actionEvents',
            width: '12%'
        }]
    });
});

function actionFormatter(value, row, index) {
    return [
        '<a class="btn btn-success ban" href="javascript:void(0)" title="แบล็คลิสต์">',
        '<i class="fa fa-unlock fa-lg" aria-hidden="true"></i>',
        '</a>&nbsp&nbsp&nbsp',
        '<a class="btn btn-danger remove" href="javascript:void(0)" title="พ้นสภาพ">',
        '<i class="fa fa-calendar-times-o fa-lg" aria-hidden="true"></i>',
        '</a>&nbsp&nbsp&nbsp',
        '<a class="btn btn-primary print" href="javascript:void(0)" title="พิมพ์">',
        '<i class="fa fa-print fa-lg" aria-hidden="true"></i>',
        '</a>',
    ].join('');
}

window.actionEvents = {
    'click .ban': function (e, value, row, index) {
        swal({
          title: 'ยกเลิกสถานะแบล็คลิสต์',
          text: "คุณไม่สามารถแก้ไขได้!",
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
                url: base_url+"/Dashboard/lawyerunban",
                data: {data: JSON.stringify(row)},
                dataType: 'json',
                complete: function(){
                  swal({
                    title: 'สำเร็จ',
                    text: '',
                    type: 'success',
                    confirmButtonText: 'ปิด'
                  }).then((result) => {
                      if (result.value) {
                          location.reload();
                      }
                  })
               }
            });
          }
        })    
    },
    'click .remove': function (e, value, row, index) {
        swal({
          title: 'ต้องการให้พ้นสภาพ',
          text: "คุณไม่สามารถแก้ไขได้!",
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
                url: base_url+"/Dashboard/lawyerremove",
                data: {data: JSON.stringify(row)},
                dataType: 'json',
                complete: function(){
                  swal({
                    title: 'สำเร็จ',
                    text: '',
                    type: 'success',
                    confirmButtonText: 'ปิด'
                  }).then((result) => {
                      if (result.value) {
                          location.reload();
                      }
                  })
               }
            });
          }
        })    
    },
    'click .print': function (e, value, row, index) {
            alert('You click del icon, row: ' + JSON.stringify(row));
        
    }
};


$(function () {
    var $table = $('#tablelawyerban');
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