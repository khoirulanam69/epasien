const ktp = document.getElementById('ktp');
const errMessage = document.getElementById('errMessage');
const btnSubmit = document.getElementById('btnSubmit');

// validation
ktp.addEventListener('keyup', function (e) {
    const value = ktp.value;
    if (value.length == 0) {
        errMessage.innerText = "No KTP tidak boleh kosong";
        btnSubmit.disabled = true;
    } else if (value.length < 16 || value.length > 16) {
        errMessage.innerText = "No KTP harus 16 digit";
        btnSubmit.disabled = true;
    } else {
        errMessage.innerText = "";
        btnSubmit.disabled = false;
    }
})

const cekRegisteredLabel = document.getElementById('cekRegisteredLabel');
const modalBody = document.querySelector('.modal-body');
const modalFooter = document.querySelector('.modal-footer');

btnSubmit.addEventListener('click', function () {
    const ajax = new XMLHttpRequest();

    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            const res = JSON.parse(ajax.response);
            cekRegisteredLabel.innerText = res.title;
            modalBody.innerText = res.body;
            modalFooter.innerHTML = res.footer;
        }
    }

    ajax.open('GET', '/send/' + ktp.value, true);
    ajax.send();
})