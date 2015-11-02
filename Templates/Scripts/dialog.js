var Dialog = new Object();
//DUCNV: Hàm Set dialog
//e: value(e or null) - có hủy bỏ liên kết hay không(bỏ dấu #)
//dialog: value("#dialog") - tên thẻ div dialog cần mở
//mask: value("#mask") - tên thẻ div nền dialog cần mở
//left: value("100" or "auto") - căn left cho dialog("auto" sẽ tự căn giữa)
//top: value("100" or "auto") - căn top cho dialog("auto" sẽ tự căn giữa)
Dialog.Set = function (e,dialog, mask, left, top) {

    //hủy bỏ các link liên kết,"bỏ dấu #"
    if (e != null) {
        e.preventDefault();
    }

    //Set các thuộc tính của thẻ
    $(dialog).css({ 'position': 'fixed', 'left': 0, 'top': 0, 'z-index': 99999 });
    $(mask).css({ 'position': 'fixed', 'left': 0, 'top': 0, 'z-index': 9000 });

    //lấy chiều dài và chiều rộng(full) của trang web hiển thị
    var maskHeight = $(document).height();
    var maskWidth = $(window).width();

    //Set chiều cao chiều dài cho hình nền
    $(mask).css({ 'width': maskWidth, 'height': maskHeight });

    //lấy chiều dài chiều rộng của trang web hiển thị
    var winH = $(window).height();
    var winW = $(window).width();

    //Set vị trí left cho dialog
    if (left == 'auto') {
        $(dialog).css('left', winW / 2 - $(dialog).width() / 2);
    } else {
        $(dialog).css('left', parseInt(left));
    }

    //set vị trí top cho dialog
    if (top == 'auto') {
        $(dialog).css('top', winH / 2 - $(dialog).height() / 2);
    } else {
        $(dialog).css('top', parseInt(top));
    }
}