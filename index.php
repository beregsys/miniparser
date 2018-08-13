<?php
require_once 'parser.php'
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Сковороды блинные</title>
</head>
<body>
<h2>Пример парсера</h2>
<ul class="products">
    <?php for($i = 0; $i < 4; $i++):?>
    <li class="product-item">
        <div class="image-section">
            <a href="<?php echo $large_image_link[$i]; ?>" class="image-section__link image-popup-no-margins">
                <img src="<?php echo $products['images'][$i]; ?>" alt=""></a>
        </div>
        <div class="brand-section">
            <span class="brand-section__link">
                <?php echo $products['brands'][$i]; ?>
            </span>
        </div>
        <div class="name-section">
            <span class="name-section__link">
                <?php echo $products['names'][$i]; ?>
            </span>
        </div>
        <div class="artnumber-section">
            <span class="artnumber-section__link">
                <?php echo $products['art_number'][$i]; ?>
            </span>
        </div>
        <div class="price-and-button">
            <div class="section-price">
                <span class="section-price__link">
                    <?php echo $products['prices'][$i] . 'руб'; ?>
                </span>
            </div>
            <div class="products__button__container">
                <a href="#testform" class="popup-with-form products__button__link" id="<?php echo $i; ?>">Купить</a>
            </div>
        </div>
    </li>
    <?php endfor; ?>
</ul>

<div class="form__container">
    <form id="testform" class="white-popup-block mfp-hide" action="mail.php">
        <input type="text" name="name" id="name" placeholder="Введите ваше имя...">
        <input type="phone" name="phone" id="phone" placeholder="+7 (888) 888-88-88">
        <input type="email" name="email" id="email" placeholder="Введите вашу почту">
        <input type="hidden" id="product-id" name="product_id" value="">
        <input type="hidden" id="product-sum" name="product_sum" value="">
        <input type="submit" value="Купить" class="buy-button">
    </form>
    <div id="result"></div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>