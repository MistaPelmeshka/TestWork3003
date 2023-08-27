<?php
/*
template Name: Главная страница132123
*/
?>

<?php get_header(); ?>
<div class="title"> <h1> <?=get_the_title()?></h1></div>
<div class="section__form">


    <form method="post" class="production_form" id="production_form" enctype="multipart/form-data">
        <div>
            <label for="product_image">Введите название продукта</label>
            <input type="text" name="post_title" value="" id="title_prod" spellcheck="true" autocomplete="off">

            <p>Выбирите фото продукта</p>
            <label class="product_image-block" for="product_image">
                <span class="product_image-text">Нет Изображения</span>
                <span class="product_image-text2">Картинка выбрана</span>
                <span class="product_image-button">Выбрать</span>
            </label>
            <input type="file" name="product_image" id="product_image" class="product_image" accept="image/*" onchange="readURL(this)">
            <img id="see_img" width="300" height="250">
        </div>
        <div>
            <label for="regular_price">Введите стоимость продукта</label>
            <span>Базовая цена: <input type="number" name="regular_price" id="regular_price" value=""></span>
            <span>Акционная цена:<input type="number" name="sale_price" id="sale_price" value=""> </span>

            <label for="product_date">Введите время создания продукта</label>
            <input type="date" name="product_date" id="product_date" value="" placeholder="">

            <label for="product_type">Выбирите тип продукта</label>
            <select id="product_type" name="product_type">
                <option value="rare" selected="selected">rare</option>
                <option value="frequent">frequent</option>
                <option value="unusual" >unusual</option>
            </select>
        </div>
        <div>
            <input id="add_production" type="submit" name="add_production" value="Submit" />
        </div>
    </form>
</div>
<?php get_footer(); ?>