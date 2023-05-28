<header>
    <div class="header">
        <div class="header-container">
            <a class="header-logo" href="/"></a>
            <form method="get" action="/search" class="header-search">
                <div class="search-magnifier"></div>
                <input type="text" class="search-input" name="k" value="<?php if (isset($_GET['k'])) echo $_GET['k'] ?>" ) placeholder="Search for goods ...">
                <button type="submit" class="search-action button-background button-orange button-hover-black">Search</button>
            </form>
            <div class="header-user-interaction">
                <!-- <div class="header-region"></div> -->
                @guest
                <a class="guest button-background button-white button-hover-black" href="/signin">Sign In</a>
                <a class="guest button-background button-orange button-hover-black" href="/register">Register</a>
                @endguest

                @auth
                <a class="auth button-background button-white button-hover-black" id="auth-cart" href="/private/cart">
                    <span>Cart</span>
                    <div class="auth-logo"></div>
                    <div class="auth-notification">
                        <span>{{ $cartNumber }}</span>
                    </div>
                </a>
                <!--
                <a class="auth button-background button-white button-hover-black" id="auth-wishlist" href="/private/wishlist">
                    <span>Wishlist</span>
                    <div class="auth-logo"></div>
                    <div class="auth-notification">
                        0
                    </div>
                </a>
                -->
                <a class="auth button-background button-white button-hover-black" id="auth-profile" href="/private">
                    <span>Profile</span>
                    <div class="auth-logo"></div>
                </a>
                <a class="auth button-background button-white button-hover-black" id="auth-signout" href="/signout">
                    <span>Sign&nbspout</span>
                    <div class="auth-logo"></div>
                </a>
                @endauth
            </div>
            <div class="categories">
                <ul>
                    <li class="dropdown">
                        
                        <div class="dropbtn">
                            <a href="/search/categories">Categories</a>
                        </div>
                        <div class="dropdown-content">
                            <ul>
                                @foreach($categories as $category)
                                <li>
                                    <a href="/search/{{ $category->value }}">{{ $category->value }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        
                    </li>
                    <!--
                    <li class="dropdown">
                        <div class="dropbtn">
                            <a>Brands</a>
                        </div>
                        <div class="dropdown-content">
                            <ul>
                                <li>
                                    <a>Nike</a>
                                </li>
                                <li>
                                    <a>Adidas</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    -->
                </ul>
            </div>

        </div>
    </div>
</header>

<div class="dropped-menu">
    <div class="menu-container">
        <form action="#!">
            <!--
            <label for="region">Country</label>
            <select id="region" name="region">
                <option value="USA">USA</option>
                <option value="UK">UK</option>
                <option value="Germany">Germany</option>
                <option value="Spain">Spain</option>
                <option value="Russia">Russia</option>
            </select>
            -->
            <label for="language">Language</label>
            <select id="language" name="language">
                <option value="English">English</option>
                <option value="German">German</option>
                <option value="Spanish">Spanish</option>
                <option value="Russian">Russian</option>
            </select>
            <label for="currency">Currency</label>
            <select id="currency" name="currency">
                <option value="us-dollar">US Dollar, $</option>
                <option value="euro">Euro, €</option>
                <option value="rus-rubles">Russian rubles, ₽</option>
            </select>
        </form>
    </div>
</div>