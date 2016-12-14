
function CheckMultiple(frm, name) {
    for (var i = 0; i < frm.length; i++) {
        fldObj = frm.elements[i];
        fldId = fldObj.id;
        if (fldId) {
            var fieldnamecheck = fldObj.id.indexOf(name);
            if (fieldnamecheck != -1) {
                if (fldObj.checked) {
                    return true;
                }
            }
        }
    }
    return false;
}

function CheckForm(f) {
    var email_re = /[a-z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/i;
    if (!email_re.test(f.email.value)) {
        f.email.focus();
        return false;
    }

    return true;
}