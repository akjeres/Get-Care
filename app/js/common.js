function openModal() {
    setTimeout(function(){
        $('.modal').fadeIn(300);
        $('body').css('overflow', 'hidden');
        $('.modal-body').focus();
    }, 100);

}
function closeModal() {
    $('.modal').fadeOut(300);
    $('body').css('overflow', '');
}

$('.modal-close').on('click', closeModal);
$(document).on('mouseup', function (e) {
    var container = $(".modal-body");
    if (container.has(e.target).length === 0){
        closeModal();
    }
});

$('.footer-form').on('submit', function(e) {
    e.preventDefault();
    var t = $(this);
    var form = new FormData($(t).get(0));

    $.ajax({
        url: t.prop('action'),
        type: 'POST',
        data: form,
        processData: false,
        contentType: false,
        success:function(data){
            if (data === '0') {
                $(t)[0].reset();
                openModal();
            }
        }
    });
});

/* Smooth scroll starts */
$(document).on('click', 'a[href^="#"]', function (event) {
    event.preventDefault();

    $('html, body').animate({
        scrollTop: $($.attr(this, 'href')).offset().top
    }, 750);
});
/* Smooth scroll ends */

/* Phone validation Starts*/
function getCaretPosition (ctrl) {
    if (document.selection) {
        ctrl.focus();
        var range = document.selection.createRange();
        var rangelen = range.text.length;
        range.moveStart ('character', -ctrl.value.length);
        var start = range.text.length - rangelen;
        return {'start': start, 'end': start + rangelen };
    } else if (ctrl.selectionStart || ctrl.selectionStart == '0') {
        return {'start': ctrl.selectionStart, 'end': ctrl.selectionEnd };
    } else {
        return {'start': 0, 'd': 0};
    }
}
function setCaretPosition(ctrl, start, end) {
    if(ctrl.setSelectionRange) {
        ctrl.focus();
        ctrl.setSelectionRange(start, end);
    } else if (ctrl.createTextRange) {
        var range = ctrl.createTextRange();
        range.collapse(true);
        range.moveEnd('character', end);
        range.moveStart('character', start);
        range.select();
    }
}
function DigitTel(input) {
    this.input = input;
    var self = this;
    self.input.addEventListener('input', function(){
        var prevPosition = getCaretPosition(self.input);
        var inputVal = self.input.value;
        var inputArr = inputVal.split('');
        var result = new String();
        for (var i = 0; i < inputArr.length; i++) {
            if (/\d/.test(inputArr[i])) {
                result += inputArr[i];
            } else {
                --prevPosition.start;
                continue;
            }
        }
        self.input.value = result;
        setCaretPosition(self.input, prevPosition.start, prevPosition.start);
    });
}
var inputs = document.querySelectorAll('input[type="tel"]');
var digitInputsArr = [];
for (var inputsCount = 0; inputsCount < inputs.length; inputsCount++) {
    digitInputsArr.push(inputs[inputsCount]);
    digitInputsArr[inputsCount] = new DigitTel(inputs[inputsCount]);
}
/* Phone validation Ends*/