const keyword = document.getElementById('keyword');
const dokterTable = document.getElementById('dokterTable');

keyword.addEventListener('keyup', function () {
    if (keyword.value != '') {
        const ajax = new XMLHttpRequest();

        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4 && ajax.status == 200) {
                dokterTable.innerHTML = `<tbody class="table-group-divider">
                                            ${ajax.responseText}
                                        </tbody>`
            }
        }

        ajax.open('GET', "dokter/" + keyword.value, true);
        ajax.send();
    }
})