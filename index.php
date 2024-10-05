<!DOCTYPE html>
<html lang="az">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restoran İdarə Sistemi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container-fullscreen {
            height: 100vh;
            display: flex;
        }

        /* Sol Bölmə (Zallar) */
        .left-section {
            width: 50%; /* 50% yer */
            background-color: #f8f9fa;
            display: flex;
            padding: 20px;
            border-right: 2px solid #dee2e6;
        }

        /* Masalar Hissəsi */
        .masalar-section {
            width: 25%; /* 25% yer */
            padding: 10px;
        }

        /* Kassa Hissəsi */
        .kassa-section {
            width: 75%; /* 75% yer */
            padding: 10px;
            border-left: 2px solid #dee2e6;
        }

        /* Sağ Bölmə (Menyular) */
        .right-section {
            width: 50%; /* 50% yer */
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        .right-sub-section {
            height: 100%;
            display: flex;
        }

        /* Menyu Sol Alt Bölmə */
        .right-sub-section-left {
            width: 25%; /* Menyu hissəsinin 25% */
            background-color: #f1f3f5;
            padding: 20px;
            border-right: 2px solid #dee2e6;
        }

        /* Menyu Sağ Alt Bölmə */
        .right-sub-section-right {
            width: 75%; /* Menyu hissəsinin 75% */
            padding: 20px;
        }

        .menu-tab-content {
            display: none;
        }

        .menu-tab-content.active {
            display: block;
        }

        .menu-item {
            margin: 10px 0;
            display: flex;
            align-items: center;
            border: 2px solid #007bff; /* Çərçivə rəngi */
            border-radius: 8px; /* Kənarları yumşaltmaq üçün */
            padding: 10px; /* Daxili boşluq */
            background-color: #f8f9fa; /* Arxa fon */
            transition: transform 0.2s; /* Animasiya */
        }

        .menu-item:hover {
            transform: scale(1.05); /* Üzərinə gələndə böyümə */
        }

        .menu-item img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-right: 10px;
        }

        .menu-item h5 {
            margin: 0;
        }

        .kassa-table {
            margin-top: 20px;
        }

        .kassa-table th, .kassa-table td {
            text-align: center;
        }

        .checkout-table {
            margin-top: 20px;
        }

        .checkout-table th, .checkout-table td {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container-fullscreen">
    <!-- Sol Bölmə (Zallar) -->
    <div class="left-section">
        <div class="masalar-section">
            <h3>Zallar</h3>
            <ul class="list-group">
                <li class="list-group-item"><a href="#" class="zal-link" data-zal="1">Zal 1</a></li>
                <li class="list-group-item"><a href="#" class="zal-link" data-zal="2">Zal 2</a></li>
            </ul>
            <div id="masalar" class="mt-4">
                <!-- Zallar üzrə masalar burada göstəriləcək -->
            </div>
        </div>
        <div class="kassa-section">
            <h3>Kassa</h3>
            <ul class="nav nav-tabs" id="kassa-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#" data-tab="mehsullar">Məhsullar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-tab="cek">Çek</a>
                </li>
            </ul>
            <div id="kassa-content">
                <div id="mehsullar" class="kassa-tab-content active">
                    <table class="table kassa-table">
                        <thead>
                        <tr>
                            <th>Məhsulun Adı</th>
                            <th>Məhsulun Sayı</th>
                            <th>Qiyməti</th>
                        </tr>
                        </thead>
                        <tbody id="kassa-content-body">
                        <!-- Kassa cədvəli burada göstəriləcək -->
                        </tbody>
                    </table>
                </div>
                <div id="cek" class="kassa-tab-content" style="display:none;">
                    <table class="table checkout-table">
                        <thead>
                        <tr>
                            <th>Məhsulun Adı</th>
                            <th>Məhsulun Sayı</th>
                            <th>Qiyməti</th>
                            <th>Ümumi Qiymət</th>
                        </tr>
                        </thead>
                        <tbody id="cek-content">
                        <!-- Çek cədvəli burada göstəriləcək -->
                        </tbody>
                    </table>
                    <h5>Ümumi: <span id="total-amount">0.00 AZN</span></h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Sağ Bölmə (Menyular) -->
    <div class="right-section">
        <h3>Menyu Seçimi</h3>
        <div class="right-sub-section">
            <div class="right-sub-section-left">
                <ul class="nav nav-tabs" id="menu-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#" data-menu="soyuq-icikler">Soyuq İçkilər</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-menu="isti-icikler">İsti İçkilər</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-menu="milli-yemekler">Milli Yeməklər</a>
                    </li>
                </ul>
            </div>
            <div class="menu-tab-content" id="soyuq-icikler">
                <div class="menu-item" data-name="Coca Cola" data-price="1.50">
                    <img src="https://bazarstore.az/cdn/shop/products/30009475_3bde13a5-6a8c-412e-9b97-111f72c6173a.jpg?v=1693743404" alt="Coca Cola">
                    <h5>Coca Cola - 1.50 AZN</h5>
                </div>
                <div class="menu-item" data-name="Fanta" data-price="1.50">
                    <img src="https://bazarstore.az/cdn/shop/products/30009477.jpg?v=1693743383" alt="Fanta">
                    <h5>Fanta - 1.50 AZN</h5>
                </div>
                <div class="menu-item" data-name="Sprite" data-price="1.50">
                    <img src="https://bazarstore.az/cdn/shop/products/30009466_8a19ee40-8c30-419b-a76f-ff66e1e666ac.jpg?v=1693554282" alt="Sprite">
                    <h5>Sprite - 1.50 AZN</h5>
                </div>
            </div>
            <div class="menu-tab-content" id="isti-icikler">
                <div class="menu-item" data-name="Çay" data-price="1.00">
                    <img src="https://i.nefisyemektarifleri.com/2023/09/28/cay-kac-kalori.jpg" alt="Çay">
                    <h5>Çay - 1.00 AZN</h5>
                </div>
                <div class="menu-item" data-name="Kofe" data-price="1.50">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/45/A_small_cup_of_coffee.JPG/1200px-A_small_cup_of_coffee.JPG" alt="Kofe">
                    <h5>Kofe - 1.50 AZN</h5>
                </div>
            </div>
            <div class="menu-tab-content" id="milli-yemekler">
                <div class="menu-item" data-name="Plov" data-price="5.00">
                    <img src="https://e-derslik.edu.az/books/477/assets/img/page110/1.jpg" alt="Plov">
                    <h5>Plov - 5.00 AZN</h5>
                </div>
                <div class="menu-item" data-name="Yarpaq Dolması" data-price="6.00">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQBhX8gpkKmHMx7AbzOODIdSLosqvbwxzDfveZTVuuC-3DcEGhnpi4Ud23tkHAP0566Zlo&usqp=CAU" alt="Yarpaq Dolması">
                    <h5>Yarpaq Dolması - 6.00 AZN</h5>
                </div>
            </div>
        </div>
    </div></div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Zal seçimləri
    $(document).on('click', '.zal-link', function(e) {
        e.preventDefault();
        const zal = $(this).data('zal');
        if (zal === 1) {
            $('#masalar').html('<h4>Zal 1 Masalar:</h4><ul class="list-group"><li class="list-group-item">Masa 1</li><li class="list-group-item">Masa 2</li></ul>');
        } else if (zal === 2) {
            $('#masalar').html('<h4>Zal 2 Masalar:</h4><ul class="list-group"><li class="list-group-item">Masa 3</li><li class="list-group-item">Masa 4</li></ul>');
        }
    });

    // Menyu tab seçimləri
    $(document).on('click', '.nav-link', function(e) {
        e.preventDefault();
        const menu = $(this).data('menu');
        $('.menu-tab-content').removeClass('active');
        $('#' + menu).addClass('active');
        $('.nav-link').removeClass('active');
        $(this).addClass('active');
    });

    // Kassa hissəsinə məhsul əlavə etmə
    $(document).on('click', '.menu-item', function() {
        const productName = $(this).data('name');
        const productPrice = parseFloat($(this).data('price'));

        // Kassa cədvəlinə əlavə
        const $kassaContent = $('#kassa-content-body');
        let rowExists = false;

        $kassaContent.find('tr').each(function() {
            if ($(this).find('td:first').text() === productName) {
                const countCell = $(this).find('td:nth-child(2)');
                const currentCount = parseInt(countCell.text());
                countCell.text(currentCount + 1); // Sayı artır
                rowExists = true;
            }
        });

        if (!rowExists) {
            $kassaContent.append('<tr><td>' + productName + '</td><td>1</td><td>' + productPrice.toFixed(2) + ' AZN</td></tr>');
        }

        // Çekdəki cəmi yenilə
        updateCheckout();
    });

    // Kassa tabı dəyişməsi
    $(document).on('click', '#kassa-tabs .nav-link', function(e) {
        e.preventDefault();
        const tab = $(this).data('tab');
        $('.kassa-tab-content').hide();
        $('#' + tab).show();
        $('#kassa-tabs .nav-link').removeClass('active');
        $(this).addClass('active');
    });

    // Çekdəki cəmi yeniləmək üçün funksiya
    function updateCheckout() {
        const $checkoutContent = $('#cek-content');
        $checkoutContent.empty();
        let total = 0;

        $('#kassa-content-body tr').each(function() {
            const productName = $(this).find('td:first').text();
            const quantity = parseInt($(this).find('td:nth-child(2)').text());
            let price = parseFloat($(this).find('td:nth-child(3)').text());

            // Qiyməti düzəldin (çünki "Qiymət" sütununda " AZN" var, onu çıxartmalıyıq)
            price = parseFloat($(this).find('td:nth-child(3)').text().replace(' AZN', '').trim());

            const subtotal = quantity * price;
            total += subtotal;
            $checkoutContent.append('<tr><td>' + productName + '</td><td>' + quantity + '</td><td>' + price.toFixed(2) + ' AZN</td><td>' + subtotal.toFixed(2) + ' AZN</td></tr>');
        });

        $('#total-amount').text(total.toFixed(2) + ' AZN');
    }
</script>
</body>
</html>