var muaSp = document.querySelector('.mua-san-pham')
var modal = document.querySelector('.js-modal')
var cl = document.querySelector('.button-close')

var ten_sp = document.querySelector('.ten-sp').innerHTML
var gia_ban = document.querySelector('.gia-ban').innerHTML

function showModal() {
    muaSp.addEventListener('click', modal.classList.add('open'))
    document.querySelector('.ten-san-pham').innerHTML = ten_sp
    document.querySelector('.gia-ban-sp').innerHTML = gia_ban
}
function hideModal() {
    cl.addEventListener('click', modal.classList.remove('open'))
}

function xu_ly_tt () {
    var thong_bao_chua_nhap = "(*) Mục này đang trống";
    var nhap_khong_dung = "Nhập không đúng định dạng";

    var flag = 0;

    // Số họ và tên
    var hvt = document.querySelector('.hvt').value
    var regex_hvt = /^[aAàÀảẢãÃáÁạẠăĂằẰẳẲẵẴắẮặẶâÂầẦẩẨẫẪấẤậẬbBcCdDđĐeEèÈẻẺẽẼéÉẹẸêÊềỀểỂễỄếẾệỆfFgGhHiIìÌỉỈĩĨíÍịỊjJkKlLmMnNoOòÒỏỎõÕóÓọỌôÔồỒổỔỗỖốỐộỘơƠờỜởỞỡỠớỚợỢpPqQrRsStTuUùÙủỦũŨúÚụỤưƯừỪửỬữỮứỨựỰvVwWxXyYỳỲỷỶỹỸýÝỵỴzZ\s]{4,100}$/;
    var kq_hvt = regex_hvt.test(hvt);
    if (hvt.length == 0 ) {
        document.querySelector('.er_hvt').innerHTML = thong_bao_chua_nhap;
        flag++;
    }
    else if (kq_hvt == false) {
        document.querySelector('.er_hvt').innerHTML = nhap_khong_dung;
        flag++;
    }
    else {
        document.querySelector('.er_hvt').innerHTML = "";
    }

    // Số điện thoại
    var sdt = document.querySelector('.sdt').value
    var regex_sdt = /^0[0-9]{9,10}$/;
    var kq_sdt = regex_sdt.test(sdt);
    if (sdt.length == 0 ) {
        document.querySelector('.er_sdt').innerHTML = thong_bao_chua_nhap;
        flag++;
    }
    else if (kq_sdt == false) {
        document.querySelector('.er_sdt').innerHTML = nhap_khong_dung;
        flag++;
    }
    else {
        document.querySelector('.er_sdt').innerHTML = "";
    }

    // Địa chỉ
    var dc = document.querySelector('.dc').value
    var regex_dc = /^[aAàÀảẢãÃáÁạẠăĂằẰẳẲẵẴắẮặẶâÂầẦẩẨẫẪấẤậẬbBcCdDđĐeEèÈẻẺẽẼéÉẹẸêÊềỀểỂễỄếẾệỆfFgGhHiIìÌỉỈĩĨíÍịỊjJkKlLmMnNoOòÒỏỎõÕóÓọỌôÔồỒổỔỗỖốỐộỘơƠờỜởỞỡỠớỚợỢpPqQrRsStTuUùÙủỦũŨúÚụỤưƯừỪửỬữỮứỨựỰvVwWxXyYỳỲỷỶỹỸýÝỵỴzZ\s0-9]{10,100}$/;
    var kq_dc = regex_dc.test(dc);

    if (dc.length == 0 ) {
        document.querySelector('.er_dc').innerHTML = thong_bao_chua_nhap;
        flag++;
    }
    else if (kq_dc == false) {
        document.querySelector('.er_dc').innerHTML = nhap_khong_dung;
        flag++;
    }
    else {
        document.querySelector('.er_dc').innerHTML = "";
    }

    if (flag != 0) {
        return false;
    }  
    else  {
        alert('Bạn đã đặt hàng thành công! cảm ơn bạn đã ủng hộ \nchúng tôi sẽ giao hàng cho bạn trong thời gian sớm nhất');
        return true;
    }
}
