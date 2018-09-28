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
    <form method="post" action="/cp/doInsertALC" class="card cp-container">
        <div class="form-cat">
            <div class="form-group input-field col s12">
                    <select id="menu-cat" name="menu-cat">
                        <?php foreach ($categories AS $category): ?>
                        <optgroup label="<?=$category->name?>">
                            <?php foreach ($subcat AS $scat):
                                if($scat->cat_id == $category->catid):?>
                            <option value="<?=$scat->scatid?>"><?=$scat->name?></option>
                            <?php endif; endforeach;?>
                        </optgroup>
                        <?php endforeach;?>
                    </select>
                    <label>Kategorie</label>
            </div>
            <div class="form-group">
                <div class="input-field col s12">
                    <input id="menu-name" name="menu-name" type="text" placeholder="Name" class="form-control input-md">
                </div>
            </div>
            <div class="form-group">
                <div class="input-field col s12">
                    <input id="menu-beschreibung" name="menu-beschreibung" type="text" placeholder="Beschreibung" class="form-control input-md">
                </div>
            </div>
            <div class="form-group">
                <div class="input-field col s12">
                    <input id="menu-preis" name="menu-preis" type="text" placeholder="Preis" class="form-control input-md">
                </div>
            </div>
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