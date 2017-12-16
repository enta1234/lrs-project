// var base_url = window.location.origin+'/lrs-project';
var base_url = window.location.origin;
$(function () {
    $('#tablenews').bootstrapTable({
        url: base_url+'/Dashboard/getNewsjson',
        columns: [{
            field: 'news_id',
            title: 'ลำดับ',
            sortable: 'true',
            valign: 'middle',
            align: 'center',
            width: '5%',
        }, {
            field: 'news_name',
            title: 'หัวข้อข่าว',
            sortable: 'true',
            valign: 'middle',
            halign: 'center',
        }, {
            field: 'news_otherfile',
            title: 'เอกสารที่เกี่ยวข้อง',
            sortable: 'true',
            valign: 'middle',
            align: 'center',
            width: '20%',

        }, {
            field: 'news_postdate',
            title: 'วันที่เผยแพร่',
            sortable: 'true',
            valign: 'middle',
            align: 'center',
            width: '10%'
        },{
            field: 'officer_name',
            title: 'ผู้เผยแพร่',
            sortable: 'true',
            valign: 'middle',
            halign: 'center',
            width: '15%'
        }, {
            field: 'action',
            title: 'จัดการข่าว',
            valign: 'middle',
            align: 'center',
            formatter: 'actionFormatter',
            events: 'actionEvents',
            width: '10%'
        }]
    });
});

function actionFormatter(value, row, index) {
    return [
        '<a class="edit ml10" href="javascript:void(0)" title="Edit">',
        '<i class="fa fa-pencil fa-lg" aria-hidden="true"></i>',
        '</a>',
    ].join('');
}

window.actionEvents = {
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
            $.ajax({
                type:"POST",
                url: base_url+"/Dashboard/editnews",
                data: {data: JSON.stringify(row)},
                dataType: 'json'
            });
            window.location.href = base_url+'/Dashboard/editnews';
          }
        })    
    }
};
console.log('managenews.js');