const ktp = document.getElementById('ktp');
const errMessage = document.getElementById('errMessage');
const btnCek = document.getElementById('btnCek');
const btnSubmit = document.getElementById('btnSubmit');
const formHidden = document.getElementById('formHidden');

// validation
ktp.addEventListener('keyup', function (e) {
    e.preventDefault();
    const value = ktp.value;
    if (value.length == 0) {
        formHidden.style.display = 'none';
        errMessage.innerText = "No KTP tidak boleh kosong";
        btnCek.disabled = true;
        btnCek.setAttribute('type', 'button');
        btnCek.innerText = "Cek";
    } else if (value.length < 16 || value.length > 16) {
        formHidden.style.display = 'none';
        errMessage.innerText = "No KTP harus 16 digit";
        btnCek.disabled = true;
        btnCek.setAttribute('type', 'button');
        btnCek.innerText = "Cek";
    } else {
        errMessage.innerText = "";
        btnCek.disabled = false;
    }
})

btnCek.addEventListener('click', function () {
    const ajax = new XMLHttpRequest();

    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            const res = JSON.parse(ajax.response);
            if (res.status == false) {
                alert(res.message);
            }
            else {
                formHidden.style.display = 'block';
                btnCek.setAttribute('type', 'submit');
                btnCek.innerText = "Submit"
            }
        }
    }

    ajax.open('GET', '/cek/' + ktp.value, true);
    ajax.send();
})