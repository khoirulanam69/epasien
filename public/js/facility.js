const keyword = document.getElementById('keyword');
const facilityTable = document.getElementById('facilityTable');

keyword.addEventListener('keyup', function () {
    if (keyword.value != '') {
        const ajax = new XMLHttpRequest();

        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4 && ajax.status == 200) {
                facilityTable.innerHTML = `<thead>
                                                <tr>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Kelas</th>
                                                    <th scope="col">Tarif</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-group-divider">
                                                ${ajax.responseText}
                                            </tbody>`
            }
        }

        ajax.open('GET', "facility/" + keyword.value, true);
        ajax.send();
    }
})