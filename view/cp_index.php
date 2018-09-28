<?php session_start(); if(isset($_SESSION['uid'])):?>
    <div class="card navbar-left">
        <div id="logo">
            <a href="/user/logout"><img src="/images/Logo.png"/></a>
        </div>
        <nav>
            <ul>
                <li><a href="/cp/liste">Liste</a></li>
                <li><a href="/cp/a_la_carte">À la Carte Menü</a></li>
                <li><a href="/cp/tagesmenu">Tages Menü</a></li>
            </ul>
        </nav>
    </div>
<?php else:?>
<h1 class="center">Acces Denied!</h1>
<?php endif;?>