<!DOCTYPE html>
<html>

<head>


    <link rel="stylesheet" href="css/store-redactor-styles.css">
    <link rel="stylesheet" href="/css/page-styles.css">
    <link rel="stylesheet" href="/css/category-list-styles.css">

    <!-- jQuery Library -->
    <script src="/libs/jquery-3.6.0.js"></script>

    <!-- jQuery Sidebar Plugin -->
    <script src="/plugins/jQuery-sidebar/jquery.sidebar.js"></script>
    <script src="/plugins/jQuery-sidebar/jquery.sidebar.handler.js"></script>
    <link rel="stylesheet" href="/plugins/jQuery-sidebar/jquery.sidebar.css">

    <script src="/js/category-list-script.js"></script>
</head>

<body>
    <div class="main">
        <div class="sidebar left">
            <div class="slider-header">
                <button class="btn sidebar-toggle button-rounded" data-action="toggle" data-side="left">Redactor Panel</button>
            </div>
            <div class="sidebar-section-container">

                <div id="test" class="category-container">
                    <div class="category-heading">
                        Store Information
                        <div class="arrow"></div>
                    </div>
                    <div class="category-list">
                        <div class="category-list-item">
                            <h4>Store Title</h4>
                            <input type="text" placeholder="Enter your store's title ...">
                        </div>
                        <div class="category-list-item">
                            <h4>Store Slogan</h4>
                            <textarea id="store-slogan" placeholder="Enter your store's slogan ..."></textarea>
                        </div>
                        <div class="category-list-item">
                            <h4>Store Description</h4>
                            <textarea id="store-desc" placeholder="Enter your store's desctiption ..."></textarea>
                        </div>
                    </div>
                </div>

                <div id="test1" class="category-container">
                    <div class="category-heading">
                        Logo and Banner
                        <div class="arrow"></div>
                    </div>
                    <div class="category-list">
                        <div class="category-list-item">
                            <h4>Logo</h4>
                        </div>
                        <div class="category-list-item">
                            <h4>Banner</h4>
                        </div>
                    </div>
                </div>

                <div id="test2" class="category-container">
                    <div class="category-heading">
                        Header
                        <div class="arrow"></div>
                    </div>
                    <div class="category-list">
                        <div class="category-list-item">
                            <h4>Design</h4>
                        </div>
                        <div class="category-list-item">
                            <h4>Design</h4>
                        </div>
                    </div>
                </div>

                <div id="test3" class="category-container">
                    <div class="category-heading">
                        Background
                        <div class="arrow"></div>
                    </div>
                    <div class="category-list">
                        <div class="category-list-item">
                            <h4>Preset Background</h4>
                        </div>
                        <div class="category-list-item">
                            <h4>Upload the Background</h4>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>