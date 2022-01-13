$('#cnpj').mask("99.999.999/9999-99");

$("#phone").mask("(00) 0000-00009")
.focusout(function (event) {  
    var target, phone, element;  
    target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
    phone = target.value.replace(/\D/g, '');
    element = $(target);  
    element.unmask();  
    if(phone.length > 10) {  
        element.mask("(00) 00000-0000");  
    } else {  
        element.mask("(00) 0000-0000");  
    }  
});