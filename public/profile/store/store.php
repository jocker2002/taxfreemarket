<!DOCTYPE html>
<html>

<head>

    <!-- <link rel="stylesheet" href="/css/page-styles.css"> -->
    <link rel="stylesheet/less" href="/profile/store/css/store-styles.less">
    <link rel="stylesheet/less" href="/profile/store/css/store-header-styles.less">

    <!-- jQuery Library -->
    <script src="/libs/jquery-3.6.0.js"></script>

    <!-- Less Language -->
    <link rel="stylesheet/less" href="/profile/store/css/store-styles.less">
    <script src="/libs/less.js"></script>

</head>

<body>
    <div class="main">

        <?php include_once("./store-header.php") ?>


        <div class="store-content">

            <div class="box bg-white store-banner">
                <h2>Sample Text</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Harum repudiandae, totam alias vero dolore esse ullam corrupti sunt pariatur, quis dolores illum voluptatem repellendus eveniet illo atque deserunt quas porro laborum minima voluptatum modi. Veritatis, distinctio maiores fugit repellat obcaecati enim consequatur sapiente suscipit nulla eligendi eius, molestias repudiandae alias!</p>
            </div>

            <div class="box bg-white store-catalog-container">
                <div class="store-catalog-filter">
                    <div class="filter-field">
                        <label for="select-category">Category</label>
                        <select id="select-category">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                        </select>
                    </div>
                    <div class="filter-field">
                        <label for="select-category">Category</label>
                        <select id="select-category">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                        </select>
                    </div>
                    <div class="filter-field">
                        <label for="select-category">Category</label>
                        <select id="select-category">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                        </select>
                    </div>
                    <div class="filter-field">
                        <label for="select-category">Category</label>
                        <select id="select-category">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                        </select>
                    </div>
                </div>
                <div class="store-catalog">
                    <?php for ($i = 0; $i < 15; $i++) { ?>
                        <div class="item">
                            <div class="image">
                                <img src="data/adidas-sneakers.jpg">
                            </div>
                            <h4 class="item-title">2020 Adidas Originals ZX 750 Men's (UK 6 - 12) Navy-White Colour Brand New</h4>
                            <span class="price-retail">Retail price: <span class="price-value">$79.00</span></span>
                            <button class="price-wholesale">Show the wholesale price</button>
                        </div>
                    <?php } ?>
                </div>
            </div>


        </div>
    </div>
</body>

</html>