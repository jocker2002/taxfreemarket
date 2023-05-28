<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-store" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="/css/fancy-buttons.css">
    <link rel="stylesheet/less" href="/profile/store/css/store-styles.less">
    <link rel="stylesheet/less" href="/profile/store/css/store-header-styles.less">

    <link rel="stylesheet" href="./css/sidebar.menu.css">
    <link rel="stylesheet" href="./css/sidebar.menu.white.css">
    <link rel="stylesheet" href="./css/sidebar.menu.dark.css">


    <script src="/libs/jquery-3.6.0.js"></script>

    <!-- Less Language -->
    <script src="/libs/less.js"></script>

    <!-- Color Picker Plugin -->
    <link rel="stylesheet" href="/profile/store/plugins/color-picker/color-picker.css">

    <title>Bootstrap 4 Sidebar Push Navigation</title>
</head>

<style>

</style>

<body>
    <div class="navbar-container">
        <nav class="navbar navbar-expand-lg fixed-top bg-white-2">
            <a id="sidebar-title" class="navbar-brand navbar-title button-rounded" href="#">Sidebar menu</a>
            <span class="navbar-text">
                <a href="#" id="sidebar-bars" class="bars">
                    Pages
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </a>
            </span>
        </nav>
    </div>

    <div class="d-flex" id="wrapper">

        <!-- navbar menu -->


        <!-- sidebar menu -->
        <div class="sidebar bg-white-2">
            <div class="menu">

                <!-- menu -->
                <ul class="menu scrollbar">

                    <!-- simple menu -->
                    <li>
                        <span class="name">Store Configuration</span>
                        <ul>
                            <li class="parent">
                                <a href="#" class="employ">Information</a>
                                <ul class="submenu">
                                    <li>
                                        <span>Title</span>
                                        <input type="text" placeholder="Enter your store's title ...">
                                    </li>
                                    <li>
                                        <span>Slogan</span>
                                        <textarea id="store-slogan" placeholder="Enter your store's slogan ..."></textarea>
                                    </li>
                                    <li>
                                        <span>Description</span>
                                        <textarea id="store-desc" placeholder="Enter your store's desctiption ..."></textarea>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul>
                            <li class="parent">
                                <a href="#" class="employ">Main Appearance</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="#" class="employ">Color</a>
                                        <ul class="submenu">
                                            <li>
                                                <span>Border Color</span>
                                                <div id="store-main-app-color-border" data-value="">
                                                    <?php include("plugins/color-picker/color-picker.html") ?>
                                                </div>


                                                <div class="expand-container">
                                                    <div class="expand-button rotate">
                                                        <span>Some text</span>
                                                    </div>
                                                    <div class="expand-box">
                                                        123
                                                    </div>
                                                </div>

                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <span class="name">Header</span>
                        <ul>
                            <li class="parent">
                                <a href="#" class="employ">Layout</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="#" class="employ">Element Position</a>
                                        <ul class="submenu">
                                            <li>
                                                <span>Element Position</span>

                                            </li>
                                            <li>
                                                <span>Element Visibility</span>
                                            </li>
                                            <li>
                                                <span>Margins</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" class="employ">Design</a>
                                        <ul class="submenu">
                                            <li>
                                                <span>Logo</span>
                                                <span>Background</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" class="employ">Search Section</a>
                                        <ul class="submenu">
                                            <li>
                                                <span>Text</span>
                                                <span>Border</span>
                                                <span>Button</span>
                                                <span>Input Field</span>
                                                <span>Magnifier</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" class="employ">Color</a>
                                        <ul class="submenu">
                                            <li>
                                                <span>Text Color</span>
                                                <span>Image Color</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <!-- dropdown menu -->
                    <li>
                        <span class="name">Dashboard</span>
                        <ul>
                            <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
                            <li class="parent">
                                <a href="#" class="employ"><i class="fa fa-cog" aria-hidden="true"></i>Settings</a>
                                <ul class="submenu">
                                    <li><a href="#">Timezone</a></li>
                                    <li><a href="#">Permissions</a></li>
                                    <li><a href="#">Maintenance</a></li>
                                </ul>
                            </li>

                            <!-- notice info -->
                            <li>
                                <a href="#" class="clearfix">
                                    <div class="float-left"><i class="fa fa-exclamation" aria-hidden="true"></i>Notice</div>
                                    <div class="float-right">
                                        <span class="badge badge-pill badge-danger">3</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- dropdown menu -->
                    <li>
                        <span class="name">Coments</span>
                        <ul>
                            <li><a href="#"><i class="fa fa-plus" aria-hidden="true"></i>New</a></li>
                            <li class="parent">
                                <a href="#" class="employ"><i class="fa fa-comments-o" aria-hidden="true"></i>Settings comments</a>
                                <ul class="submenu">
                                    <li><a href="#">Disable</a></li>
                                    <li><a href="#">Enable</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <!-- simple menu -->
                    <li>
                        <span class="name">Blog</span>
                        <ul>
                            <li><a href="#"><i class="fa fa-plus" aria-hidden="true"></i>Add</a></li>
                            <li><a href="#"><i class="fa fa-table" aria-hidden="true"></i>List</a></li>
                        </ul>
                    </li>

                    <!-- simple menu -->
                    <li>
                        <span class="name">Blog</span>
                        <ul>
                            <li><a href="#"><i class="fa fa-plus" aria-hidden="true"></i>Add</a></li>
                            <li><a href="#"><i class="fa fa-table" aria-hidden="true"></i>List</a></li>
                        </ul>
                    </li>


                    <!-- simple menu -->
                    <li>
                        <span class="name">Blog</span>
                        <ul>
                            <li><a href="#"><i class="fa fa-plus" aria-hidden="true"></i>Add</a></li>
                            <li><a href="#"><i class="fa fa-table" aria-hidden="true"></i>List</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>

        <!-- website content -->
        <div class="content store-body">
            <div class="container-fluid">
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

                <!--
                    <div class="row">
                        <div class="col-6 col-md-6">
                            <div class="box bg-white">
                                <h3>Website content</h3>
                                <p>Here is content this website page.</p>
                            </div>
                        </div>
                        <div class="col-6 col-md-6">
                            <div class="box bg-white">
                                <h3>Website content</h3>
                                <p>Here is content this website page.</p>
                            </div>
                        </div>
                    </div>
                    -->

                <div class="hello" style="border: 1px solid red; width: 300px; height: 100px">
                    <button>Change Magnifier</button>
                </div>
            </div>

        </div>

    </div>


    <!-- javascript library -->

    <!--
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/perfect-scrollbar.min.js"></script>
    -->
    <script src="/profile/store/js/sidebar-script.js"></script>
    <script>
        $(".hello button").on("click", function() {

            var magnifier_filename = "2.svg";
            var main_color = "orange";

            var svg_content = "";

            function readTextFile(file) {
                var rawFile = new XMLHttpRequest();
                rawFile.open("GET", file, false);
                rawFile.onreadystatechange = function() {
                    if (rawFile.readyState === 4) {
                        if (rawFile.status === 200 || rawFile.status == 0) {
                            var allText = rawFile.responseText;
                            svg_content = allText;
                        }
                    }
                };
                rawFile.send(null);
            };

            var svg = readTextFile("img/magnifier/" + magnifier_filename);
            console.log("svg_content = " + svg_content);

            less.modifyVars({
                "@main-color": main_color,
                '@store-search-magnifier-img': '\'data:image/svg+xml;utf8,' + svg_content + '\''
            });

        });
    </script>
    <script src="./plugins/color-picker/color-picker.js"></script>
</body>

</html>