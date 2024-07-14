<script>
    const locationSelect = (idProvince, idCity, idDistrict, idVillage) => {
        let province = `#${idProvince}`
        let city = `#${idCity}`
        let district = `#${idDistrict}`
        let village = `#${idVillage}`

        $(province).select2();
        $(city).select2();
        $(district).select2();
        $(village).select2();

        $(province).on('select2:select', function(e) {
            var provinceId = e.params.data.id;
            fetch(`/cities/${provinceId}`)
                .then(response => response.json())
                .then(data => {
                    let citySelect = document.querySelector(city);
                    citySelect.innerHTML = '<option value="">Pilih Kota</option>';
                    data.forEach(city => {
                        citySelect.innerHTML +=
                            `<option value="${city.id}">${city.name}</option>`;
                    });
                });
        });

        $(city).on('select2:select', function(e) {
            var cityId = e.params.data.id;
            fetch(`/districts/${cityId}`)
                .then(response => response.json())
                .then(data => {
                    let districtSelect = document.querySelector(district);
                    districtSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
                    data.forEach(district => {
                        districtSelect.innerHTML +=
                            `<option value="${district.id}">${district.name}</option>`;
                    });
                });
        });

        $(district).on('select2:select', function(e) {
            var districtId = e.params.data.id;
            fetch(`/villages/${districtId}`)
                .then(response => response.json())
                .then(data => {
                    let villageSelect = document.querySelector(village);
                    villageSelect.innerHTML = '<option value="">Pilih Kelurahan</option>';
                    data.forEach(village => {
                        villageSelect.innerHTML +=
                            `<option value="${village.id}">${village.name}</option>`;
                    });
                });
        });
    }
</script>
