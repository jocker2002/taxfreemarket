@extends('layouts.editor')

@section('page_title', 'Store Editor')

@section('page_css')
<link rel="stylesheet/less" href="/css/store/store-styles.less">
<link rel="stylesheet/less" href="/css/store/store-header-styles.less">
@endsection

@section('page_js')
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

<script>

/*
    $("#save").on("click", function() {
        var test = $(".store-body .container-fluid").html();

        //ajax call 
        $.ajax({
        type: "POST",
        url: "test.php",
        data: {
            test: test
        },
        cache: false,
        success: function(responseText) {
            alert(responseText);
        }
    })
    });
    */
</script>

<script src="./plugins/color-picker/color-picker.js"></script>
@endsection

@section('sidebar_menu')
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
                                            <?php include_once("profile/store/plugins/color-picker/color-picker.html") ?>
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
@endsection

@section('store_content')
<div class="store-content">

    <button id="save">Save Store</button>

    <?php
    print_r(session()->get("test"))
    ?>

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
@endsection