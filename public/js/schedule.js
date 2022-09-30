const keyword = document.getElementById('keyword');
const scheduleTable = document.getElementById('scheduleTable');
keyword.addEventListener('keyup', function () {
    if (keyword.value != '') {
        const ajax = new XMLHttpRequest();

        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4 && ajax.status == 200) {
                scheduleTable.innerHTML = `<thead>
                                            <tr>
                                                <th scope="col">Hari Kerja</th>
                                                <th scope="col">Nama Dokter</th>
                                                <th scope="col">Jam Mulai</th>
                                                <th scope="col">Jam Selesai</th>
                                                <th scope="col">Kuota</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                            ${ajax.responseText}
                                        </tbody>`
            }
        }

        ajax.open('GET', "search/" + keyword.value, true);
        ajax.send();
    }
})