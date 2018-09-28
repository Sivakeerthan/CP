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
    <form method="post" action="/cp/doInsertTages" class="card cp-container">
        <div class="form-cat">
            <div class="col-md-4">
                <p>Tag</p>
                <input id="tag" name="tag" type="date" class="form-control input-md">
            </div>
        </div>
        <div class="form-cat">
            <h2>Menü1</h2>
            <div class="form-group">
                <div class="col-md-4">
                    <input id="menu1-name" name="menu1-name" type="text" placeholder="Name" class="form-control input-md">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4">
                    <input id="menu1-beschreibung" name="menu1-beschreibung" type="text" placeholder="Beschreibung" class="form-control input-md">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4">
                    <input id="menu1-preis" name="menu1-preis" type="text" placeholder="Preis" class="form-control input-md">
                </div>
            </div>

        </div>
        <div class="form-cat">
            <h2>Menü2</h2>
            <div class="form-group">
                <div class="col-md-4">
                    <input id="menu2-name" name="menu2-name" type="text" placeholder="Name" class="form-control input-md">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4">
                    <input id="menu2-beschreibung" name="menu2-beschreibung" type="text" placeholder="Beschreibung" class="form-control input-md">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4">
                    <input id="menu2-preis" name="menu2-preis" type="text" placeholder="Preis" class="form-control input-md">
                </div>
            </div>

        </div>
        <div class="form-cat">
            <h2>Tages-Hit</h2>
            <div class="form-group">
                <div class="col-md-4">
                    <input id="thit-name" name="thit-name" type="text" placeholder="Name" class="form-control input-md">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4">
                    <input id="thit-beschreibung" name="thit-beschreibung" type="text" placeholder="Beschreibung" class="form-control input-md">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4">
                    <input id="thit-preis" name="thit-preis" type="text" placeholder="Preis" class="form-control input-md">
                </div>
            </div>

        </div>
        <div class="form-cat">
            <div class="form-group">
                <button class="btn form-btn waves-effect waves-light" type="submit" name="submit">Speichern
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </div>
    </form>
<?php else:?>
<h1 class="center">Acces Denied!</h1>
<?php endif;?>